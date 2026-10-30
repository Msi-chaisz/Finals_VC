
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Learning Assistant | SignLearn</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #f5f6fa;
    color: #252b48;
}

/* SIDEBAR - MATCHES student-account.php */
.sidebar {
    width: 250px;
    height: 100vh;
    background: #252b48;
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    padding: 25px 18px;
    display: flex;
    flex-direction: column;
}

.logo {
    font-size: 25px;
    font-weight: bold;
    margin-bottom: 5px;
}

.subtitle {
    font-size: 12px;
    color: #b8bdd3;
    margin-bottom: 40px;
}

.menu-title {
    color: #969db9;
    font-size: 11px;
    margin: 15px 10px;
    letter-spacing: 1px;
}

.sidebar a {
    display: block;
    text-decoration: none;
    color: #d6d9e8;
    padding: 14px 13px;
    margin-bottom: 7px;
    border-radius: 9px;
    font-size: 14px;
    transition: 0.2s;
}

.sidebar a:hover,
.sidebar a.active {
    background: #6658d9;
    color: white;
}

.help-card {
    margin-top: auto;
    background: #343b60;
    padding: 17px;
    border-radius: 12px;
    font-size: 13px;
    line-height: 1.5;
}

.help-card p {
    margin: 9px 0;
    color: #c4c8d8;
}

.help-card a {
    padding: 8px 0 0;
    margin: 0;
    color: white;
}

/* MAIN CONTENT */
.main-content {
    margin-left: 250px;
    padding: 30px;
}

.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.topbar h2 {
    font-size: 23px;
}

.topbar p {
    color: #85899b;
    font-size: 13px;
    margin-top: 6px;
}

.profile {
    background: white;
    padding: 11px 16px;
    border-radius: 10px;
    font-size: 13px;
}

.assistant-container {
    max-width: 950px;
    margin: auto;
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 3px 15px rgba(0,0,0,0.05);
}

.assistant-header {
    background: linear-gradient(120deg, #6658d9, #8275ed);
    padding: 23px;
    color: white;
    display: flex;
    align-items: center;
    gap: 15px;
}

.ai-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: rgba(255,255,255,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 25px;
}

.assistant-header h2 {
    font-size: 19px;
    margin-bottom: 5px;
}

.assistant-header p {
    font-size: 12px;
    opacity: 0.9;
}

.status {
    margin-left: auto;
    font-size: 12px;
}

.status span {
    color: #8cffb0;
}

.chat-area {
    height: 440px;
    overflow-y: auto;
    padding: 22px;
    background: #fafaff;
}

.message {
    display: flex;
    margin-bottom: 18px;
    gap: 10px;
}

.message.user {
    justify-content: flex-end;
}

.avatar {
    width: 32px;
    height: 32px;
    background: #eeeaff;
    color: #6658d9;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-shrink: 0;
}

.bubble {
    max-width: 80%;
    padding: 13px 16px;
    border-radius: 12px;
    background: white;
    box-shadow: 0 2px 7px rgba(0,0,0,0.04);
    font-size: 14px;
    line-height: 1.7;
    white-space: pre-wrap;
    overflow-wrap: anywhere;
}

.user .bubble {
    background: #6658d9;
    color: white;
}

.typing {
    color: #85899b;
    font-size: 12px;
    margin: 5px 0 15px 42px;
    display: none;
}

.suggestions {
    padding: 15px 20px;
    border-top: 1px solid #eeeef4;
}

.suggestions p {
    font-size: 12px;
    color: #85899b;
    margin-bottom: 10px;
}

.suggestion-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.suggestion-buttons button {
    border: 1px solid #ddd9ff;
    background: #f7f6ff;
    color: #6658d9;
    padding: 9px 12px;
    border-radius: 20px;
    cursor: pointer;
    font-size: 12px;
}

.suggestion-buttons button:hover {
    background: #6658d9;
    color: white;
}

.chat-input {
    display: flex;
    padding: 17px 20px;
    border-top: 1px solid #eeeef4;
    gap: 10px;
}

.chat-input input {
    flex: 1;
    padding: 14px;
    border: 1px solid #e0e2eb;
    border-radius: 9px;
    outline: none;
    font-size: 14px;
    min-width: 0;
}

.chat-input input:focus {
    border-color: #6658d9;
}

.send-button {
    background: #6658d9;
    color: white;
    border: none;
    padding: 0 22px;
    border-radius: 9px;
    cursor: pointer;
    font-weight: bold;
}

.send-button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.clear-button {
    background: transparent;
    border: none;
    color: #85899b;
    cursor: pointer;
    font-size: 12px;
    margin-top: 12px;
}

/* RESPONSIVE */
@media(max-width: 700px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    .main-content {
        margin-left: 0;
        padding: 15px;
    }

    .chat-area {
        height: 380px;
    }

    .topbar {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

    .status {
        display: none;
    }

    .assistant-header {
        flex-wrap: wrap;
    }
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<aside class="sidebar">

    <div class="logo">🤟 SignLearn</div>

    <div class="subtitle">Sign Language System</div>

    <div class="menu-title">MAIN MENU</div>

    <a href="index.php">▦ Dashboard</a>

    <a href="basic-greetings.php">✋ Sign Lessons</a>

    <a href="practice.php">◉ Practice Mode</a>

    <a href="assistant.php" class="active">💬 Learning Assistant</a>

    <a href="student-account.php">👤 Student Account</a>

    <div class="help-card">
        <strong>Need help?</strong>
        <p>Ask our Learning Assistant if you need help learning sign language.</p>
        <a href="assistant.php">Open assistant →</a>
    </div>

</aside>


<!-- MAIN CONTENT -->
<main class="main-content">

    <div class="topbar">
        <div>
            <h2>Learning Assistant</h2>
            <p>Ask questions and learn sign language with AI.</p>
        </div>

        <div class="profile">👤 Learner</div>
    </div>


    <div class="assistant-container">

        <div class="assistant-header">

            <div class="ai-icon">🤖</div>

            <div>
                <h2>SignLearn AI Assistant</h2>
                <p>Your personal sign language learning helper</p>
            </div>

            <div class="status">
                <span>●</span> AI Assistant
            </div>

        </div>


        <div class="chat-area" id="chatArea">

            <div class="message">
                <div class="avatar">🤖</div>

                <div class="bubble">
                    Hello, learner! 👋 Welcome to SignLearn!

                    I'm your AI learning assistant. Ask me about sign language, ASL, FSL, handshapes, greetings, or anything related to your lessons.

                    I'll explain the answer and give examples to help you understand.
                </div>
            </div>

        </div>

        <div class="typing" id="typing">
            AI is thinking...
        </div>


        <div class="suggestions">

            <p>Try asking:</p>

            <div class="suggestion-buttons">

                <button onclick="sendSuggestion('What is the difference between ASL and FSL?')">
                    ASL vs FSL
                </button>

                <button onclick="sendSuggestion('Teach me how to introduce myself using sign language.')">
                    Introduce myself
                </button>

                <button onclick="sendSuggestion('Give me five sign language practice questions with answers.')">
                    Practice questions
                </button>

                <button onclick="sendSuggestion('Give me examples of everyday sign language conversations.')">
                    Sample conversations
                </button>

            </div>

        </div>


        <div class="chat-input">

            <input
                type="text"
                id="userInput"
                placeholder="Ask anything about sign language..."
                onkeydown="if(event.key === 'Enter') sendMessage()"
            >

            <button class="send-button" id="sendButton" onclick="sendMessage()">
                Send ➤
            </button>

        </div>

    </div>

    <button class="clear-button" onclick="clearChat()">
        Clear conversation
    </button>

</main>


<script>
const chatArea = document.getElementById("chatArea");
const input = document.getElementById("userInput");
const typing = document.getElementById("typing");
const sendButton = document.getElementById("sendButton");

let conversationHistory = [];
let isWaiting = false;


function addMessage(message, sender) {

    const messageDiv = document.createElement("div");
    messageDiv.className = "message " + sender;

    if (sender === "assistant") {

        const avatar = document.createElement("div");
        avatar.className = "avatar";
        avatar.textContent = "🤖";

        messageDiv.appendChild(avatar);
    }

    const bubble = document.createElement("div");
    bubble.className = "bubble";
    bubble.textContent = message;

    messageDiv.appendChild(bubble);

    chatArea.appendChild(messageDiv);
    chatArea.scrollTop = chatArea.scrollHeight;
}


async function sendMessage() {

    const question = input.value.trim();

    if (question === "" || isWaiting) {
        return;
    }

    addMessage(question, "user");

    input.value = "";
    input.disabled = true;
    sendButton.disabled = true;
    isWaiting = true;

    typing.style.display = "block";

    try {

        const response = await fetch("ai-chat.php", {

            method: "POST",

            headers: {
                "Content-Type": "application/json"
            },

            body: JSON.stringify({
                message: question,
                history: conversationHistory
            })

        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.error || "AI request failed.");
        }

        const answer = data.reply;

        addMessage(answer, "assistant");

        conversationHistory.push(
            { role: "user", content: question },
            { role: "assistant", content: answer }
        );

        conversationHistory = conversationHistory.slice(-12);

    } catch (error) {

        addMessage(
            "Sorry, I couldn't connect to the AI assistant.\n\n" +
            error.message +
            "\n\nPlease check your API key, internet connection, and XAMPP configuration.",
            "assistant"
        );

    } finally {

        typing.style.display = "none";
        input.disabled = false;
        sendButton.disabled = false;
        isWaiting = false;
        input.focus();

    }

}


function sendSuggestion(question) {

    input.value = question;
    sendMessage();

}


function clearChat() {

    if (isWaiting) return;

    conversationHistory = [];

    chatArea.innerHTML = "";

    addMessage(
        "Hello again! 👋 I'm your SignLearn AI Assistant. What would you like to learn today?",
        "assistant"
    );

}
</script>

</body>
</html>
