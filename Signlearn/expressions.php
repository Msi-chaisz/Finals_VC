
<?php
$currentPage = basename($_SERVER['PHP_SELF']);

$expressions = [
    ["phrase" => "Hello", "image" => "hello.png", "meaning" => "A friendly greeting."],
    ["phrase" => "Good Morning", "image" => "good-morning.png", "meaning" => "A greeting used in the morning."],
    ["phrase" => "How Are You?", "image" => "how-are-you.png", "meaning" => "Asking someone how they feel."],
    ["phrase" => "Thank You", "image" => "thank-you.png", "meaning" => "Showing appreciation."],
    ["phrase" => "Please", "image" => "please.png", "meaning" => "A polite way to make a request."],
    ["phrase" => "Sorry", "image" => "sorry.png", "meaning" => "Apologizing to someone."],
    ["phrase" => "Goodbye", "image" => "goodbye.png", "meaning" => "A word used when leaving."],
    ["phrase" => "Excuse Me", "image" => "excuse-me.png", "meaning" => "Getting someone's attention politely."],
    ["phrase" => "Help Me", "image" => "help-me.png", "meaning" => "Asking someone for assistance."],
    ["phrase" => "I Love You", "image" => "i-love-you.png", "meaning" => "Expressing love and affection."],
    ["phrase" => "Yes", "image" => "yes.png", "meaning" => "Showing agreement."],
    ["phrase" => "No", "image" => "no.png", "meaning" => "Showing disagreement."]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Everyday Expressions | SignLearn</title>

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
    z-index: 100;
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
    color: #c4c8d8;
    font-size: 12px;
    margin: 9px 0;
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
    min-height: 100vh;
}

.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
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
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

/* PAGE HEADER */
.page-header {
    background: linear-gradient(120deg, #6658d9, #8275ed);
    padding: 28px;
    border-radius: 15px;
    color: white;
    margin-bottom: 25px;
}

.page-header h1 {
    font-size: 26px;
    margin-bottom: 10px;
}

.page-header p {
    font-size: 14px;
    line-height: 1.6;
    opacity: 0.95;
}

/* SEARCH */
.search-container {
    margin-bottom: 25px;
}

.search-container input {
    width: 100%;
    padding: 14px 17px;
    border: 1px solid #e0e2eb;
    border-radius: 10px;
    outline: none;
    font-size: 14px;
    background: white;
}

.search-container input:focus {
    border-color: #6658d9;
}

/* EXPRESSION GRID */
.expression-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 20px;
}

.expression-card {
    background: white;
    border-radius: 13px;
    padding: 18px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.04);
    transition: 0.2s;
}

.expression-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 7px 18px rgba(0,0,0,0.08);
}

.expression-image {
    width: 100%;
    height: 175px;
    background: #f0efff;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin-bottom: 15px;
}

.expression-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.expression-card h3 {
    font-size: 17px;
    margin-bottom: 8px;
}

.expression-card p {
    color: #85899b;
    font-size: 13px;
    line-height: 1.5;
    min-height: 38px;
}

.practice-button {
    width: 100%;
    border: none;
    background: #6658d9;
    color: white;
    padding: 11px;
    border-radius: 8px;
    margin-top: 15px;
    cursor: pointer;
    font-size: 13px;
    font-weight: bold;
}

.practice-button:hover {
    background: #5143c2;
}

.no-results {
    display: none;
    text-align: center;
    padding: 30px;
    color: #85899b;
    grid-column: 1 / -1;
}

.footer {
    text-align: center;
    margin-top: 35px;
    color: #999;
    font-size: 12px;
}

/* RESPONSIVE */
@media (max-width: 1000px) {
    .expression-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 700px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    .main-content {
        margin-left: 0;
        padding: 18px;
    }

    .expression-grid {
        grid-template-columns: 1fr;
    }

    .topbar {
        align-items: flex-start;
        gap: 12px;
        flex-direction: column;
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

    <a href="basic-greetings.php" class="active">✋ Sign Lessons</a>

    <a href="practice.php">◉ Practice Mode</a>

    <a href="assistant.php">💬 Learning Assistant</a>

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
            <h2>Everyday Expressions</h2>
            <p>Learn common sign language expressions.</p>
        </div>

        <div class="profile">
            👤 Learner
        </div>

    </div>


    <section class="page-header">

        <h1>Everyday Expressions 🤟</h1>

        <p>
            Learn common everyday phrases using sign language.
            Practice each expression and improve your communication skills.
        </p>

    </section>


    <!-- SEARCH BAR -->
    <div class="search-container">

        <input
            type="text"
            id="searchInput"
            placeholder="Search an expression..."
            oninput="searchExpressions()"
        >

    </div>


    <!-- EXPRESSION CARDS -->
    <div class="expression-grid" id="expressionGrid">

        <?php foreach ($expressions as $expression): ?>

            <div class="expression-card"
                 data-phrase="<?= htmlspecialchars(strtolower($expression['phrase'])) ?>">

                <div class="expression-image">

                    <img
                        src="images/<?= htmlspecialchars($expression['image']) ?>"
                        alt="<?= htmlspecialchars($expression['phrase']) ?>"
                        onerror="this.style.display='none'; this.parentElement.innerHTML='<span>🤟 Image not found</span>';"
                    >

                </div>

                <h3>
                    <?= htmlspecialchars($expression['phrase']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($expression['meaning']) ?>
                </p>

                <button
                    class="practice-button"
                    onclick="showPhrase(<?= htmlspecialchars(json_encode($expression['phrase']), ENT_QUOTES) ?>)">
                    Practice Expression
                </button>

            </div>

        <?php endforeach; ?>

        <div class="no-results" id="noResults">
            No expressions found. Try another search.
        </div>

    </div>


    <div class="footer">
        © 2026 SignLearn | Sign Language Learning System
    </div>

</main>


<script>

function searchExpressions() {

    const searchValue = document
        .getElementById("searchInput")
        .value.toLowerCase();

    const cards = document.querySelectorAll(".expression-card");

    let visibleCount = 0;

    cards.forEach(function(card) {

        const phrase = card.getAttribute("data-phrase");

        if (phrase.includes(searchValue)) {

            card.style.display = "block";
            visibleCount++;

        } else {

            card.style.display = "none";

        }

    });

    document.getElementById("noResults").style.display =
        visibleCount === 0 ? "block" : "none";

}


function showPhrase(phrase) {

    alert(
        "Practice Mode\n\n" +
        "Expression: " + phrase +
        "\n\nStudy the sign language image and practice the hand movement."
    );

}

</script>

</body>
</html>
