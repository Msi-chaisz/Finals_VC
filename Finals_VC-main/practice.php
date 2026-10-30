
<?php
$systemName = "SignLearn";
$learnerName = "Student";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Mode | SignLearn</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .practice-hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 28px;
            margin-bottom: 24px;
            border-radius: 15px;
            color: white;
            background: linear-gradient(120deg, #252b48, #6658d9);
        }

        .practice-hero h2 {
            font-size: 25px;
            margin: 12px 0;
        }

        .practice-hero p {
            color: #e0def6;
            font-size: 13px;
            line-height: 1.7;
            max-width: 540px;
        }

        .practice-hero-icon {
            font-size: 65px;
        }

        .practice-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.7fr) minmax(240px, .8fr);
            align-items: start;
            gap: 22px;
        }

        .quiz-card {
            padding: 28px;
        }

        .quiz-topline {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .question-counter {
            color: #888;
            font-size: 12px;
        }

        .quiz-progress {
            height: 7px;
            background: #eeedf5;
            border-radius: 20px;
            overflow: hidden;
            margin-top: 15px;
        }

        .quiz-progress div {
            width: 0;
            height: 100%;
            background: #6658d9;
            transition: width .25s;
        }

        .question-area {
            text-align: center;
            padding: 30px 10px 24px;
        }

        .question-symbol {
            display: grid;
            place-items: center;
            width: 95px;
            height: 95px;
            margin: 0 auto 20px;
            border-radius: 22px;
            background: #efedff;
            font-size: 49px;
        }

        .question-area h2 {
            color: #252b48;
            font-size: 22px;
            line-height: 1.5;
        }

        .question-area p {
            color: #888;
            font-size: 12px;
            line-height: 1.7;
            margin-top: 10px;
        }

        .answer-list {
            display: grid;
            gap: 12px;
        }

        .answer-option {
            width: 100%;
            text-align: left;
            padding: 16px;
            border: 1px solid #e6e5ef;
            border-radius: 10px;
            color: #45455a;
            background: white;
            font-size: 13px;
            line-height: 1.6;
            cursor: pointer;
            transition: .2s;
        }

        .answer-option:hover:not(:disabled) {
            border-color: #6658d9;
            background: #faf9ff;
        }

        .answer-option.selected {
            border: 1px solid #6658d9;
            background: #f0efff;
            color: #5143c4;
        }

        .answer-option.correct {
            border-color: #55ad78;
            background: #effbf2;
            color: #267443;
        }

        .answer-option.incorrect {
            border-color: #e17b7b;
            background: #fff1f1;
            color: #a83232;
        }

        .answer-option:disabled {
            cursor: default;
        }

        .feedback-box {
            padding: 14px;
            margin-top: 17px;
            border-radius: 9px;
            font-size: 12px;
            line-height: 1.7;
        }

        .feedback-correct {
            background: #effbf2;
            color: #267443;
        }

        .feedback-incorrect {
            background: #fff4ed;
            color: #a45a29;
        }

        .quiz-actions {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-top: 25px;
        }

        .secondary-btn {
            padding: 11px 14px;
            background: white;
            color: #6658d9;
            border: 1px solid #dedafc;
            border-radius: 7px;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
        }

        .quiz-card .primary-btn:disabled {
            background: #b7b2e5;
            cursor: not-allowed;
            transform: none;
        }

        .practice-side .section-card {
            margin-bottom: 17px;
        }

        .side-card-icon {
            font-size: 30px;
            margin-bottom: 16px;
        }

        .score-card h2 {
            color: #252b48;
            font-size: 35px;
            margin: 10px 0;
        }

        .score-card h2 span {
            color: #aaa;
            font-size: 18px;
        }

        .score-card > p:not(.eyebrow) {
            color: #888;
            font-size: 12px;
        }

        .score-track {
            height: 8px;
            background: #eeedf5;
            border-radius: 20px;
            overflow: hidden;
            margin-top: 18px;
        }

        .score-track div {
            width: 0;
            height: 100%;
            background: #6658d9;
            transition: width .25s;
        }

        .tips-card h3 {
            color: #252b48;
            font-size: 16px;
            margin: 12px 0;
        }

        .tips-card > p:not(.eyebrow) {
            color: #888;
            font-size: 12px;
            line-height: 1.8;
        }

        .tip-divider {
            height: 1px;
            background: #eeeef4;
            margin: 17px 0;
        }

        .tips-card .tip-note {
            font-size: 11px;
            color: #9b91c5;
        }

        .back-to-lessons {
            display: block;
            padding: 16px;
            border: 1px solid #e7e4fb;
            border-radius: 10px;
            color: #6658d9;
            background: #f6f4ff;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
        }

        .back-to-lessons:hover {
            background: #efecff;
        }

        .quiz-result {
            padding: 22px;
            border-radius: 10px;
            background: #f2f0ff;
            color: #5143c4;
            font-size: 14px;
            line-height: 1.8;
            text-align: center;
        }

        @media (max-width: 1000px) {
            .practice-layout {
                grid-template-columns: minmax(0, 1fr);
            }

            .practice-side {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 15px;
            }

            .practice-side .section-card {
                margin-bottom: 0;
            }

            .back-to-lessons {
                align-self: start;
            }
        }

        @media (max-width: 600px) {
            .practice-hero {
                padding: 22px;
            }

            .practice-hero h2 {
                font-size: 21px;
            }

            .practice-hero-icon {
                font-size: 42px;
            }

            .quiz-card {
                padding: 18px;
            }

            .practice-side {
                grid-template-columns: minmax(0, 1fr);
            }

            .quiz-actions {
                flex-wrap: wrap;
            }

            .quiz-actions button {
                flex: 1;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="logo">
            <span class="logo-icon">🤟</span> SignLearn
        </div>

        <p class="menu-label">MAIN MENU</p>

        <nav class="side-menu">
            <a href="index.php">▦ <span>Dashboard</span></a>

            <!-- Direct link to the existing lesson -->
            <a href="basic-greetings.php">▤ <span>Sign Lessons</span></a>

            <a href="progress.php">◴ <span>My Progress</span></a>

            <a href="practice.php" class="active">✋ <span>Practice Mode</span></a>

            <a href="assistant.php">▢ <span>Learning Assistant</span></a>
        </nav>

        <div class="sidebar-bottom">
            <div class="help-icon">?</div>
            <strong>Keep practicing!</strong>
            <p>Every attempt is a chance to learn.</p>
            <a href="basic-greetings.php">Review lessons →</a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <header class="top-navbar">
            <div class="page-title">
                <p class="eyebrow">BUILD YOUR SKILLS</p>
                <h1>Practice Mode</h1>
                <p>Test your ASL knowledge and learn at your own pace.</p>
            </div>

            <div class="profile">
                <div class="profile-avatar">S</div>
                <div>
                    <strong><?= htmlspecialchars($learnerName, ENT_QUOTES, 'UTF-8') ?></strong>
                    <small>Learner account</small>
                </div>
            </div>
        </header>

        <!-- HERO -->
        <section class="practice-hero">
            <div>
                <span class="banner-label">ASL INTERACTIVE LEARNING</span>
                <h2>Ready for an ASL challenge?</h2>
                <p>
                    Learn about American Sign Language, identify common signs,
                    answer multiple-choice questions, and check your score.
                </p>
            </div>
            <div class="practice-hero-icon">🤟</div>
        </section>

        <!-- QUIZ AND SCORE -->
        <section class="practice-layout">

            <div class="section-card quiz-card">

                <div class="quiz-topline">
                    <span class="lesson-tag">ASL KNOWLEDGE CHECK</span>
                    <span class="question-counter" id="questionCounter">
                        Question 1 of 5
                    </span>
                </div>

                <div class="quiz-progress">
                    <div id="quizProgressBar"></div>
                </div>

                <div class="question-area">
                    <div class="question-symbol" id="questionSymbol">👋</div>
                    <h2 id="questionText"></h2>
                    <p id="questionHint"></p>
                </div>

                <div class="answer-list" id="answerList"></div>

                <div class="feedback-box"
                     id="feedbackBox"
                     hidden
                     aria-live="polite"></div>

                <div class="quiz-actions">
                    <button class="secondary-btn"
                            id="restartBtn"
                            type="button">
                        Restart quiz
                    </button>

                    <button class="primary-btn"
                            id="nextBtn"
                            type="button"
                            disabled>
                        Check answer
                    </button>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <aside class="practice-side">

                <section class="section-card score-card">
                    <div class="side-card-icon">🏆</div>
                    <p class="eyebrow">YOUR CURRENT SCORE</p>

                    <h2 id="scoreDisplay">
                        0 <span>/ 5</span>
                    </h2>

                    <p>Correct answers</p>

                    <div class="score-track">
                        <div id="scoreBar"></div>
                    </div>
                </section>

                <section class="section-card tips-card">
                    <p class="eyebrow">ASL LEARNING TIP</p>
                    <h3>Learn signs accurately</h3>

                    <p>
                        ASL means American Sign Language. When studying a sign,
                        pay attention to handshape, palm orientation, movement,
                        location, and facial expression.
                    </p>

                    <div class="tip-divider"></div>

                    <p class="tip-note">
                        Emoji are visual cues only, not exact ASL handshape
                        illustrations. Use trusted ASL demonstrations to
                        verify signs.
                    </p>
                </section>

                <a href="basic-greetings.php" class="back-to-lessons">
                    📚 &nbsp; Review sign lessons →
                </a>

            </aside>
        </section>

        <footer>© 2026 SignLearn · Learn. Sign. Connect.</footer>

    </main>
</div>

<script>
"use strict";

const questions = [
    {
        symbol: "👋",
        question: "In ASL, a flat hand starts near the forehead and moves outward. What does this sign commonly mean?",
        hint: "Think of a common greeting.",
        answers: [
            "Thank you",
            "Hello",
            "Sorry",
            "Please"
        ],
        correct: 1,
        explanation: "HELLO is a common ASL greeting. Study a trusted ASL demonstration to learn the exact handshape and movement."
    },
    {
        symbol: "🙏",
        question: "In ASL, the fingertips move outward from the chin or lips. What does this sign commonly mean?",
        hint: "You might use this after someone helps you.",
        answers: [
            "No",
            "Goodbye",
            "Thank you",
            "Please"
        ],
        correct: 2,
        explanation: "THANK YOU is commonly signed by moving the hand outward from the chin area. Handshape and movement are important."
    },
    {
        symbol: "💜",
        question: "In ASL, a flat hand makes a circular movement over the chest. What does this sign mean?",
        hint: "It is a polite word used when making a request.",
        answers: [
            "Please",
            "Hello",
            "Sorry",
            "Eat"
        ],
        correct: 0,
        explanation: "PLEASE is commonly signed with a flat hand moving in a circular motion on the chest."
    },
    {
        symbol: "💭",
        question: "In ASL, a closed fist makes a circular movement over the chest. What does this sign commonly mean?",
        hint: "You may say this after making a mistake.",
        answers: [
            "Help",
            "Thank you",
            "Sorry",
            "Goodbye"
        ],
        correct: 2,
        explanation: "SORRY is commonly signed with an S-handshape (closed fist) moving in a circular motion on the chest."
    },
    {
        symbol: "🤟",
        question: "Which handshape represents the ASL expression 'I love you'?",
        hint: "Look for three extended digits.",
        answers: [
            "Only the index finger is extended",
            "The thumb, index finger, and little finger are extended",
            "All five fingers are extended",
            "The thumb and little finger are the only extended digits"
        ],
        correct: 1,
        explanation: "The ASL I-LOVE-YOU handshape combines the I, L, and Y handshapes: the thumb, index finger, and little finger are extended."
    }
];

let currentQuestion = 0;
let score = 0;
let selectedAnswer = null;
let answered = false;
let finished = false;

const $ = id => document.getElementById(id);

// UPDATE SCORE
function updateScore() {
    const scoreDisplay = $("scoreDisplay");
    scoreDisplay.replaceChildren();

    const scoreText = document.createTextNode(String(score));
    const total = document.createElement("span");

    total.textContent = " / " + questions.length;

    scoreDisplay.append(scoreText, total);

    $("scoreBar").style.width =
        (score / questions.length * 100) + "%";
}

// DISPLAY QUESTION
function renderQuestion() {
    const q = questions[currentQuestion];

    selectedAnswer = null;
    answered = false;
    finished = false;

    $("questionCounter").textContent =
        `Question ${currentQuestion + 1} of ${questions.length}`;

    $("quizProgressBar").style.width =
        (currentQuestion / questions.length * 100) + "%";

    $("questionSymbol").textContent = q.symbol;
    $("questionText").textContent = q.question;
    $("questionHint").textContent = q.hint;

    $("feedbackBox").hidden = true;
    $("feedbackBox").textContent = "";
    $("feedbackBox").className = "feedback-box";

    $("nextBtn").disabled = true;
    $("nextBtn").textContent = "Check answer";

    const list = $("answerList");
    list.replaceChildren();

    q.answers.forEach((answer, index) => {
        const button = document.createElement("button");

        button.type = "button";
        button.className = "answer-option";
        button.textContent = answer;
        button.setAttribute("aria-pressed", "false");

        button.addEventListener("click", () => {
            selectAnswer(index);
        });

        list.appendChild(button);
    });

    updateScore();
}

// SELECT ANSWER
function selectAnswer(index) {
    if (answered || finished) return;

    selectedAnswer = index;

    document.querySelectorAll(".answer-option").forEach((button, i) => {
        const isSelected = i === index;

        button.classList.toggle("selected", isSelected);
        button.setAttribute("aria-pressed", String(isSelected));
    });

    $("nextBtn").disabled = false;
    $("nextBtn").textContent = "Check answer";
}

// CHECK ANSWER
function checkAnswer() {
    if (selectedAnswer === null || answered || finished) return;

    answered = true;

    const q = questions[currentQuestion];
    const correct = selectedAnswer === q.correct;

    if (correct) {
        score++;
    }

    document.querySelectorAll(".answer-option").forEach((button, index) => {
        button.disabled = true;

        if (index === q.correct) {
            button.classList.add("correct");
        } else if (index === selectedAnswer) {
            button.classList.add("incorrect");
        }
    });

    const feedback = $("feedbackBox");

    feedback.hidden = false;
    feedback.className = "feedback-box " +
        (correct ? "feedback-correct" : "feedback-incorrect");

    feedback.textContent =
        (correct ? "✓ Correct! " : "↻ Not quite. ") +
        q.explanation;

    $("quizProgressBar").style.width =
        ((currentQuestion + 1) / questions.length * 100) + "%";

    $("nextBtn").textContent =
        currentQuestion === questions.length - 1
            ? "View results →"
            : "Next question →";

    updateScore();
}

// SHOW FINAL RESULTS
function showResults() {
    finished = true;

    $("questionCounter").textContent = "Quiz completed";
    $("quizProgressBar").style.width = "100%";

    $("questionSymbol").textContent =
        score >= 4 ? "🏆" : "🌱";

    $("questionText").textContent =
        score >= 4
            ? "Excellent work!"
            : "Good effort! Keep learning.";

    $("questionHint").textContent =
        `You scored ${score} out of ${questions.length}.`;

    $("answerList").replaceChildren();

    const result = document.createElement("div");
    result.className = "quiz-result";

    result.textContent =
        Math.round(score / questions.length * 100) +
        "% score — " +
        (score === questions.length
            ? "Perfect! You answered every question correctly."
            : "Review what you learned and try again.");

    $("answerList").appendChild(result);

    $("feedbackBox").hidden = true;
    $("nextBtn").disabled = false;
    $("nextBtn").textContent = "Try again";
}

// RESTART QUIZ
function restartQuiz() {
    currentQuestion = 0;
    score = 0;
    selectedAnswer = null;
    answered = false;
    finished = false;

    renderQuestion();
}

// NEXT BUTTON
$("nextBtn").addEventListener("click", () => {
    if (finished) {
        restartQuiz();
    } else if (!answered) {
        checkAnswer();
    } else if (currentQuestion < questions.length - 1) {
        currentQuestion++;
        renderQuestion();
    } else {
        showResults();
    }
});

// RESTART BUTTON
$("restartBtn").addEventListener("click", restartQuiz);

// START QUIZ
renderQuestion();
</script>

</body>
</html>
