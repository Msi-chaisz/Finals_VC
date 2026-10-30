
<?php
$systemName = "SignLearn";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practice Mode | SignLearn</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f5fa;
            color: #252b48;
        }

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

        .help-card a {
            padding: 8px 0 0;
            margin: 0;
            color: white;
        }

        .main {
            margin-left: 250px;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h2 {
            font-size: 25px;
        }

        .status {
            background: #e7e4ff;
            color: #6658d9;
            padding: 9px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .hero {
            background: linear-gradient(120deg, #6658d9, #8c7df0);
            color: white;
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 25px;
        }

        .hero h1 {
            font-size: 27px;
            margin-bottom: 10px;
        }

        .hero p {
            line-height: 1.6;
            max-width: 650px;
            color: #f0efff;
        }

        .content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 22px;
        }

        .quiz-card,
        .score-card,
        .tip-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.04);
        }

        .quiz-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .quiz-header h3 {
            font-size: 19px;
        }

        .question-counter {
            color: #6658d9;
            font-size: 13px;
            font-weight: bold;
        }

        .progress-track {
            background: #eeeeF5;
            height: 8px;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 25px;
        }

        .progress-fill {
            height: 100%;
            width: 0%;
            background: #6658d9;
            transition: width 0.3s;
        }

        .tutor-label {
            display: inline-block;
            background: #eeeaff;
            color: #6658d9;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .question-symbol {
            font-size: 55px;
            margin-bottom: 15px;
        }

        .question-text {
            font-size: 19px;
            line-height: 1.5;
            margin-bottom: 12px;
        }

        .question-hint {
            color: #85899d;
            font-size: 13px;
            margin-bottom: 22px;
        }

        .answer-list {
            display: grid;
            gap: 12px;
        }

        .answer-option {
            border: 1px solid #e2e3ed;
            background: white;
            padding: 15px;
            border-radius: 10px;
            text-align: left;
            cursor: pointer;
            font-size: 14px;
            color: #252b48;
            transition: 0.2s;
        }

        .answer-option:hover {
            border-color: #6658d9;
            background: #f8f7ff;
        }

        .answer-option.selected {
            border: 2px solid #6658d9;
            background: #f0eeff;
        }

        .answer-option.correct {
            border: 2px solid #22a06b;
            background: #e9f8f0;
        }

        .answer-option.wrong {
            border: 2px solid #e05252;
            background: #fff0f0;
        }

        .answer-option:disabled {
            cursor: not-allowed;
        }

        .feedback-box {
            display: none;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            font-size: 14px;
            line-height: 1.6;
        }

        .feedback-box.good {
            display: block;
            background: #e9f8f0;
            color: #176b47;
        }

        .feedback-box.bad {
            display: block;
            background: #fff0f0;
            color: #a83232;
        }

        .quiz-buttons {
            display: flex;
            gap: 10px;
            margin-top: 22px;
        }

        .primary-btn,
        .secondary-btn {
            border: none;
            padding: 12px 20px;
            border-radius: 9px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
        }

        .primary-btn {
            background: #6658d9;
            color: white;
        }

        .primary-btn:hover {
            background: #5547c2;
        }

        .secondary-btn {
            background: #eeeeF5;
            color: #252b48;
        }

        .primary-btn:disabled {
            background: #aaa5d5;
            cursor: not-allowed;
        }

        .side-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .score-card h3,
        .tip-card h3 {
            margin-bottom: 15px;
        }

        .score-number {
            font-size: 40px;
            font-weight: bold;
            color: #6658d9;
            margin: 15px 0;
        }

        .score-track {
            background: #eeeeF5;
            height: 9px;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 12px;
        }

        .score-fill {
            height: 100%;
            width: 0%;
            background: #6658d9;
            transition: width 0.3s;
        }

        .score-info {
            color: #85899d;
            font-size: 13px;
            line-height: 1.6;
        }

        .tip-card p {
            color: #777c91;
            font-size: 14px;
            line-height: 1.7;
        }

        .quiz-result {
            display: none;
            text-align: center;
            padding: 25px 10px;
        }

        .quiz-result h2 {
            color: #6658d9;
            margin-bottom: 12px;
        }

        .quiz-result .final-score {
            font-size: 45px;
            font-weight: bold;
            margin: 15px 0;
        }

        @media (max-width: 900px) {
            .content {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .help-card {
                display: none;
            }

            .topbar {
                gap: 10px;
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="logo">🤟 SignLearn</div>
    <div class="subtitle">Sign Language System</div>

    <div class="menu-title">MAIN MENU</div>

    <a href="index.php">▦ Dashboard</a>
    <a href="basic-greetings.php">✋ Sign Lessons</a>
    <a href="practice.php" class="active">◉ Practice Mode</a>
    <a href="assistant.php">💬 Learning Assistant</a>
    <a href="student-account.php">👤 Student Account</a>

    <div class="help-card">
        <strong>Need help?</strong>
        <p>Ask our Learning Assistant if you need help learning sign language.</p>
        <a href="assistant.php">Open assistant →</a>
    </div>

</aside>

<main class="main">

    <div class="topbar">
        <h2>Practice Mode</h2>
        <div class="status">● Practice ON</div>
    </div>

    <section class="hero">
        <h1>Let's Practice Sign Language! 🤟</h1>
        <p>
            Welcome to your practice session! Your AI Tutor will ask you
            questions about sign language. Choose the best answer and
            learn from the feedback after every question.
        </p>
    </section>

    <div class="content">

        <section class="quiz-card">

            <div id="quizArea">

                <div class="quiz-header">
                    <h3>AI Tutor Quiz</h3>
                    <span class="question-counter" id="questionCounter">
                        Question 1 of 5
                    </span>
                </div>

                <div class="progress-track">
                    <div class="progress-fill" id="quizProgressBar"></div>
                </div>

                <div class="tutor-label">🤖 AI TUTOR IS ASKING</div>

                <div class="question-symbol" id="questionSymbol">👋</div>

                <h3 class="question-text" id="questionText">
                    Hello! Let's start learning. What does this sign mean?
                </h3>

                <p class="question-hint" id="questionHint">
                    Choose the correct answer below.
                </p>

                <div class="answer-list" id="answerList"></div>

                <div class="feedback-box" id="feedbackBox"></div>

                <div class="quiz-buttons">

                    <button class="primary-btn" id="checkBtn" disabled>
                        Check Answer
                    </button>

                    <button class="primary-btn" id="nextBtn" style="display:none;">
                        Next Question →
                    </button>

                </div>

            </div>

            <div class="quiz-result" id="quizResult">

                <h2>Practice Completed! 🎉</h2>

                <p>You have finished your sign language practice session.</p>

                <div class="final-score" id="finalScore">0/5</div>

                <h3 id="resultMessage">Good effort!</h3>

                <p id="resultDescription"></p>

                <button class="primary-btn" id="restartBtn" style="margin-top:20px;">
                    Try Again
                </button>

            </div>

        </section>

        <div class="side-column">

            <section class="score-card">

                <h3>⭐ Your Score</h3>

                <p class="score-info">Correct answers in this session</p>

                <div class="score-number" id="scoreDisplay">0 / 5</div>

                <div class="score-track">
                    <div class="score-fill" id="scoreBar"></div>
                </div>

                <p class="score-info" style="margin-top:12px;">
                    Keep practicing to improve your knowledge!
                </p>

            </section>

            <section class="tip-card">

                <h3>💡 Learning Tip</h3>

                <p>
                    Practice your hand movements regularly. Remember that
                    facial expressions and body movements are also important
                    parts of sign language communication.
                </p>

            </section>

        </div>

    </div>

</main>

<script>

    // SIGN LANGUAGE QUESTIONS

    const questions = [

        {
            symbol: "👋",
            topic: "Greetings",
            question: "Hi there, student! Let's start with something easy. When someone waves their hand to greet another person, what are they usually saying?",
            hint: "Think about a common greeting.",
            answers: [
                "Goodbye",
                "Hello",
                "Sorry",
                "Thank you"
            ],
            correct: 1,
            explanation: "Correct! A wave is commonly used to greet someone or say hello.",
            wrong: "Not quite! A hand wave is commonly used as a greeting to say hello."
        },

        {
            symbol: "🙏",
            topic: "Basic Expressions",
            question: "Great job! Now, imagine someone wants to politely show appreciation. Which expression should they communicate?",
            hint: "Think about what you say when someone helps you.",
            answers: [
                "Thank you",
                "Good morning",
                "I'm tired",
                "Goodbye"
            ],
            correct: 0,
            explanation: "That's right! This question is about expressing gratitude by saying thank you.",
            wrong: "The correct answer is Thank you. It is an expression used to show appreciation."
        },

        {
            symbol: "🤟",
            topic: "Sign Recognition",
            question: "Let's test your sign recognition! In American Sign Language, which phrase is commonly represented by the handshape with the thumb, index finger, and pinky extended?",
            hint: "This is a popular handshape often associated with a positive expression.",
            answers: [
                "I love you",
                "Goodbye",
                "Please",
                "Sorry"
            ],
            correct: 0,
            explanation: "Excellent! In ASL, this handshape represents 'I love you'.",
            wrong: "The correct answer is I love you. In ASL, the thumb, index finger, and pinky are extended."
        },

        {
            symbol: "🤝",
            topic: "Communication",
            question: "You're doing well! Let's talk about communication. Why is learning sign language important?",
            hint: "Think about how people communicate with one another.",
            answers: [
                "It is only used for entertainment.",
                "It helps people communicate with Deaf and hard-of-hearing people.",
                "It replaces every spoken language.",
                "It is only used in schools."
            ],
            correct: 1,
            explanation: "Exactly! Sign language helps people communicate and connect with Deaf and hard-of-hearing communities.",
            wrong: "The best answer is that sign language helps people communicate with Deaf and hard-of-hearing people."
        },

        {
            symbol: "😊",
            topic: "Facial Expressions",
            question: "Last question! Aside from hand movements, what else can help communicate meaning in sign language?",
            hint: "Think about expressions on your face and movements of your body.",
            answers: [
                "Facial expressions and body movements",
                "Only speaking loudly",
                "Closing your eyes",
                "Writing every word"
            ],
            correct: 0,
            explanation: "Amazing! Facial expressions and body movements can help show meaning, emotion, and grammar in sign language.",
            wrong: "The correct answer is facial expressions and body movements. They are important parts of signed communication."
        }

    ];

    let currentQuestion = 0;
    let score = 0;
    let selectedAnswer = null;
    let answered = false;

    const questionCounter = document.getElementById("questionCounter");
    const quizProgressBar = document.getElementById("quizProgressBar");
    const questionSymbol = document.getElementById("questionSymbol");
    const questionText = document.getElementById("questionText");
    const questionHint = document.getElementById("questionHint");
    const answerList = document.getElementById("answerList");
    const feedbackBox = document.getElementById("feedbackBox");
    const checkBtn = document.getElementById("checkBtn");
    const nextBtn = document.getElementById("nextBtn");
    const scoreDisplay = document.getElementById("scoreDisplay");
    const scoreBar = document.getElementById("scoreBar");
    const quizArea = document.getElementById("quizArea");
    const quizResult = document.getElementById("quizResult");

    function loadQuestion() {

        const question = questions[currentQuestion];

        selectedAnswer = null;
        answered = false;

        questionCounter.textContent =
            `Question ${currentQuestion + 1} of ${questions.length}`;

        quizProgressBar.style.width =
            `${(currentQuestion / questions.length) * 100}%`;

        questionSymbol.textContent = question.symbol;
        questionText.textContent = question.question;
        questionHint.textContent = question.hint;

        answerList.innerHTML = "";

        feedbackBox.style.display = "none";
        feedbackBox.className = "feedback-box";

        checkBtn.style.display = "inline-block";
        checkBtn.disabled = true;

        nextBtn.style.display = "none";

        question.answers.forEach((answer, index) => {

            const button = document.createElement("button");

            button.className = "answer-option";

            button.textContent =
                String.fromCharCode(65 + index) + ". " + answer;

            button.addEventListener("click", function() {
                selectAnswer(index);
            });

            answerList.appendChild(button);

        });

    }

    function selectAnswer(index) {

        if (answered) return;

        selectedAnswer = index;

        const options = document.querySelectorAll(".answer-option");

        options.forEach((option, i) => {

            option.classList.remove("selected");

            if (i === index) {
                option.classList.add("selected");
            }

        });

        checkBtn.disabled = false;

    }

    function checkAnswer() {

        if (selectedAnswer === null || answered) return;

        answered = true;

        const question = questions[currentQuestion];

        const options = document.querySelectorAll(".answer-option");

        const isCorrect = selectedAnswer === question.correct;

        options.forEach((option, index) => {

            option.disabled = true;

            if (index === question.correct) {
                option.classList.add("correct");
            }

            if (index === selectedAnswer && !isCorrect) {
                option.classList.add("wrong");
            }

        });

        if (isCorrect) {

            score++;

            feedbackBox.className = "feedback-box good";

            feedbackBox.innerHTML =
                "<strong>🤖 AI Tutor: Excellent work!</strong><br>" +
                question.explanation;

        } else {

            feedbackBox.className = "feedback-box bad";

            feedbackBox.innerHTML =
                "<strong>🤖 AI Tutor: Keep learning!</strong><br>" +
                question.wrong +
                "<br><br><strong>Explanation:</strong> " +
                question.explanation;

        }

        feedbackBox.style.display = "block";

        checkBtn.style.display = "none";

        scoreDisplay.textContent =
            `${score} / ${questions.length}`;

        scoreBar.style.width =
            `${(score / questions.length) * 100}%`;

        nextBtn.style.display = "inline-block";

        if (currentQuestion === questions.length - 1) {
            nextBtn.textContent = "See My Results →";
        }

    }

    function nextQuestion() {

        currentQuestion++;

        if (currentQuestion < questions.length) {

            nextBtn.textContent = "Next Question →";

            loadQuestion();

        } else {

            showResults();

        }

    }

    function showResults() {

        quizArea.style.display = "none";

        quizResult.style.display = "block";

        quizProgressBar.style.width = "100%";

        document.getElementById("finalScore").textContent =
            `${score} / ${questions.length}`;

        let message = "";
        let description = "";

        if (score === 5) {

            message = "Perfect Score! 🏆";

            description =
                "Amazing! You answered all the questions correctly. Keep up the great work!";

        } else if (score >= 3) {

            message = "Good Job! 🌟";

            description =
                "You understand the basics. Continue practicing to improve your sign language skills.";

        } else {

            message = "Keep Practicing! 💪";

            description =
                "Learning takes time. Review your lessons and try the quiz again.";

        }

        document.getElementById("resultMessage").textContent = message;

        document.getElementById("resultDescription").textContent =
            description;

    }

    function restartQuiz() {

        currentQuestion = 0;
        score = 0;
        selectedAnswer = null;
        answered = false;

        scoreDisplay.textContent =
            `0 / ${questions.length}`;

        scoreBar.style.width = "0%";

        quizArea.style.display = "block";

        quizResult.style.display = "none";

        loadQuestion();

    }

    checkBtn.addEventListener("click", checkAnswer);

    nextBtn.addEventListener("click", nextQuestion);

    document.getElementById("restartBtn").addEventListener(
        "click",
        restartQuiz
    );

    // START THE QUIZ
    loadQuestion();

</script>

</body>
</html>
