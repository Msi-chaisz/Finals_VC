
<?php
session_start();

header("Content-Type: application/json");

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["error" => "Invalid request method."]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

$message = trim($data["message"] ?? "");
$history = $data["history"] ?? [];

if ($message === "") {
    http_response_code(400);
    echo json_encode(["error" => "Please enter a question."]);
    exit;
}

if (OPENAI_API_KEY === "PASTE_YOUR_API_KEY_HERE") {
    http_response_code(500);
    echo json_encode(["error" => "Please configure your OpenAI API key in config.php."]);
    exit;
}

if (!function_exists("curl_init")) {
    http_response_code(500);
    echo json_encode(["error" => "PHP cURL is not enabled in XAMPP."]);
    exit;
}

/*
 * AI PERSONALITY AND INSTRUCTIONS
 */
$instructions = "
You are SignLearn AI, a friendly and knowledgeable educational assistant
for students learning sign language.

YOUR RESPONSIBILITIES:

1. Answer student questions clearly and accurately.
2. Explain concepts in simple English. You may use Filipino when helpful.
3. Give practical examples whenever appropriate.
4. Use numbered steps for instructions.
5. Give sample conversations when students ask how to communicate.
6. Explain the difference between American Sign Language (ASL),
   Filipino Sign Language (FSL), and other sign languages.
7. Never claim that ASL and FSL are identical.
8. Explain that signs can have regional variations.
9. Do not invent hand movements or claim an unverified sign is correct.
10. If you are unsure about a particular sign, clearly say so.
11. Encourage students to practice and ask follow-up questions.
12. Stay focused on education and sign language learning.

ANSWER FORMAT:

For educational questions, try to include:

- Direct Answer
- Simple Explanation
- Example
- Practice Activity (when useful)

Do not force every section into simple questions.
Use friendly, natural conversational language.
Provide detailed answers when the student asks for examples or explanations.
";

/*
 * PREPARE CONVERSATION HISTORY
 */
$input = [];

if (is_array($history)) {
    $history = array_slice($history, -12);

    foreach ($history as $item) {
        if (
            !is_array($item) ||
            !isset($item["role"], $item["content"])
        ) {
            continue;
        }

        $role = $item["role"];

        if (!in_array($role, ["user", "assistant"], true)) {
            continue;
        }

        $content = trim((string)$item["content"]);

        if ($content === "") {
            continue;
        }

        $input[] = [
            "role" => $role,
            "content" => substr($content, 0, 5000)
        ];
    }
}

$input[] = [
    "role" => "user",
    "content" => substr($message, 0, 5000)
];

/*
 * OPENAI RESPONSES API REQUEST
 */
$payload = [
    "model" => OPENAI_MODEL,
    "instructions" => $instructions,
    "input" => $input,
    "max_output_tokens" => 1200
];

$ch = curl_init("https://api.openai.com/v1/responses");

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json",
        "Authorization: Bearer " . OPENAI_API_KEY
    ],
    CURLOPT_POSTFIELDS => json_encode($payload),
    CURLOPT_TIMEOUT => 60
]);

$response = curl_exec($ch);
$curlError = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($response === false) {
    http_response_code(500);
    echo json_encode([
        "error" => "Connection failed: " . $curlError
    ]);
    exit;
}

$result = json_decode($response, true);

if ($httpCode < 200 || $httpCode >= 300) {
    http_response_code(500);

    $apiError = $result["error"]["message"] ?? "The AI service returned an error.";

    echo json_encode([
        "error" => $apiError
    ]);
    exit;
}

/*
 * EXTRACT AI RESPONSE TEXT
 */
$answer = "";

foreach (($result["output"] ?? []) as $output) {
    if (($output["type"] ?? "") !== "message") {
        continue;
    }

    foreach (($output["content"] ?? []) as $content) {
        if (($content["type"] ?? "") === "output_text") {
            $answer .= $content["text"] ?? "";
        }
    }
}

if ($answer === "") {
    http_response_code(500);
    echo json_encode([
        "error" => "The AI returned an empty response. Please try again."
    ]);
    exit;
}

echo json_encode([
    "reply" => $answer
]);
