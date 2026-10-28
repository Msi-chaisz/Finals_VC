
<?php
$systemName = "SignLearn";
$learnerName = "Student";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Language Alphabet | <?= htmlspecialchars($systemName) ?></title>
    <link rel="stylesheet" href="style.css">

    <style>
        .lesson-welcome {
            background: linear-gradient(115deg, #252b48 0%, #403b7a 58%, #6658d9 100%);
            color: white;
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 24px;
        }

        .lesson-welcome .eyebrow { color: #c4bbff; }

        .lesson-welcome h2 {
            font-size: 27px;
            margin: 12px 0;
        }

        .lesson-welcome p {
            color: #deddf4;
            font-size: 13px;
            line-height: 1.8;
            max-width: 650px;
        }

        .lesson-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 18px;
        }

        .lesson-meta span {
            padding: 8px 12px;
            border-radius: 7px;
            background: #ffffff18;
            font-size: 11px;
        }

        .lesson-section {
            padding: 23px;
            background: white;
            border: 1px solid #eeeef4;
            border-radius: 13px;
            box-shadow: 0 4px 16px #252b4806;
            margin-bottom: 22px;
        }

        .lesson-section h2 {
            color: #252b48;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .lesson-subtitle {
            color: #888;
            font-size: 12px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .alphabet-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 13px;
        }

        .alphabet-card {
            border: 1px solid #eeeef4;
            border-radius: 12px;
            padding: 16px 12px;
            background: white;
            text-align: center;
            transition: transform .2s, box-shadow .2s, border-color .2s;
        }

        .alphabet-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px #252b4810;
            border-color: #c9c1ff;
        }

        .letter-visual {
            min-height: 85px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 39px;
            font-weight: bold;
            color: #6658d9;
            margin-bottom: 12px;
            background: linear-gradient(135deg, #f0edff, #e8e4ff);
        }

        .letter-tag {
            display: inline-block;
            color: #6658d9;
            background: #efedff;
            border-radius: 6px;
            padding: 5px 8px;
            font-size: 9px;
            font-weight: bold;
            letter-spacing: .5px;
            margin-bottom: 8px;
        }

        .alphabet-card h3 {
            color: #252b48;
            font-size: 15px;
            margin-bottom: 7px;
        }

        .alphabet-card p {
            color: #888;
            font-size: 11px;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .check-row {
            display: flex;
            gap: 7px;
            align-items: flex-start;
            padding-top: 10px;
            border-top: 1px solid #f0f0f5;
            color: #555;
            font-size: 10px;
            line-height: 1.6;
            text-align: left;
        }

        .check-row input {
            accent-color: #6658d9;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .practice-tip {
            padding: 17px;
            background: #f8f7ff;
            border: 1px solid #efedff;
            border-radius: 10px;
            color: #555;
            font-size: 12px;
            line-height: 1.8;
            margin-top: 20px;
        }

        .lesson-progress-label {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            color: #888;
            font-size: 11px;
            margin: 18px 0 8px;
        }

        .lesson-progress-label strong { color: #6658d9; }

        .lesson-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .lesson-secondary-btn {
            display: inline-block;
            text-decoration: none;
            border: 1px solid #dedafc;
            color: #6658d9;
            background: white;
            padding: 11px 15px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: bold;
        }

        .lesson-secondary-btn:hover { background: #f8f7ff; }

        .lesson-message {
            display: none;
            margin-top: 18px;
            padding: 17px;
            border: 1px solid #c7e9d2;
            border-radius: 10px;
            background: #f0fff4;
            color: #32885b;
            font-size: 12px;
            line-height: 1.8;
        }

        .lesson-message a {
            display: inline-block;
            color: #32885b;
            font-weight: bold;
            margin-top: 8px;
        }

        .lesson-footer {
            text-align: center;
            color: #999;
            font-size: 11px;
            padding: 10px 0 20px;
        }

        .alphabet-tools {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
        }

        .alphabet-tools input {
            flex: 1;
            min-width: 170px;
            padding: 11px 13px;
            border: 1px solid #e5e3f2;
            border-radius: 8px;
            outline: none;
            font-size: 12px;
        }

        .alphabet-tools input:focus { border-color: #6658d9; }

        .alphabet-tools button {
            border: 1px solid #dedafc;
            background: #f8f7ff;
            color: #6658d9;
            border-radius: 8px;
            padding: 10px 13px;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
        }

        .letter-detail {
            display: none;
            padding: 17px;
            margin-bottom: 18px;
            border-radius: 10px;
            border: 1px solid #dedafc;
            background: #f8f7ff;
            color: #555;
            font-size: 12px;
            line-height: 1.8;
        }

        .letter-detail strong {
            color: #6658d9;
            font-size: 17px;
        }

        @media (max-width: 850px) {
            .alphabet-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        }

        @media (max-width: 600px) {
            .alphabet-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .lesson-welcome { padding: 23px 20px; }
            .lesson-welcome h2 { font-size: 23px; }
            .lesson-section { padding: 17px; }
        }
    </style>
</head>

<body>
<div class="container">

    <aside class="sidebar">
        <div class="logo">
            <span class="logo-icon">🤟</span> SignLearn
        </div>

        <p class="menu-label">MAIN MENU</p>

        <nav class="side-menu">
            <a href="index.php#dashboard">▦ <span>Dashboard</span></a>
            <a href="index.php#lessons" class="active">▤ <span>Sign Lessons</span></a>
            <a href="index.php#progress">◴ <span>My Progress</span></a>
            <a href="practice.php">✋ <span>Practice Mode</span></a>
            <a href="index.php#chat">▢ <span>Learning Assistant</span></a>
        </nav>

        <div class="sidebar-bottom">
            <div class="help-icon">?</div>
            <strong>Need help?</strong>
            <p>Keep learning one sign at a time.</p>
            <a href="index.php#chat">Open assistant →</a>
        </div>
    </aside>

    <main class="main-content">

        <header class="top-navbar">
            <div class="page-title">
                <p class="eyebrow">LEARNING SPACE</p>
                <h1>Sign Language Alphabet</h1>
                <p>Explore letters A–Z and practice fingerspelling.</p>
            </div>

            <div class="navbar-actions">
                <a class="nav-progress" href="index.php#progress">
                    <span>Your lesson</span>
                    <strong id="headerProgress">0%</strong>
                    <div class="progress-bar">
                        <div class="progress-fill" id="headerProgressBar"></div>
                    </div>
                </a>

                <div class="profile">
                    <div class="profile-avatar">S</div>
                    <div>
                        <strong><?= htmlspecialchars($learnerName) ?></strong>
                        <small>Learner account</small>
                    </div>
                </div>
            </div>
        </header>

        <section class="lesson-welcome">
            <p class="eyebrow">BEGINNER · LESSON 02</p>
            <h2>🔤 Learn the Sign Language Alphabet!</h2>
            <p>
                Learn to recognize the letters from A to Z. Select a letter
                to see its name and practice guidance, then check each letter
                after practicing it with your teacher or a reliable visual reference.
            </p>

            <div class="lesson-meta">
                <span>🔤 26 letters</span>
                <span>⏱ 15–20 minutes</span>
                <span>⭐ 50 XP reward</span>
            </div>
        </section>

        <section class="lesson-section">
            <h2>Explore the Alphabet</h2>
            <p class="lesson-subtitle">
                Choose any letter to view its practice note. The large letters
                below are labels only; they are not hand-sign illustrations.
            </p>

            <div class="alphabet-tools">
                <input type="search" id="letterSearch" placeholder="Search a letter, e.g. A or Z..." maxlength="20" aria-label="Search alphabet">
                <button type="button" id="showAllButton">Show All Letters</button>
            </div>

            <div class="letter-detail" id="letterDetail" role="status"></div>

            <div class="alphabet-grid" id="alphabetGrid">
                <?php
                $letters = range('A', 'Z');
                foreach ($letters as $index => $letter):
                ?>
                    <article class="alphabet-card" data-letter="<?= $letter ?>">
                        <button
                            type="button"
                            class="letter-select"
                            data-select-letter="<?= $letter ?>"
                            style="all:unset;display:block;width:100%;cursor:pointer;"
                            aria-label="Learn letter <?= $letter ?>"
                        >
                            <div class="letter-visual"><?= $letter ?></div>
                            <span class="letter-tag">LETTER <?= $letter ?></span>
                            <h3><?= $letter ?></h3>
                            <p>Letter <?= $letter ?> in the alphabet.</p>
                        </button>

                        <label class="check-row">
                            <input type="checkbox" class="letter-check" value="<?= $letter ?>">
                            <span>I've practiced <?= $letter ?>.</span>
                        </label>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="practice-tip">
                <strong>💡 Important learning tip</strong>
                <p>
                    Sign languages differ by country and community. Filipino
                    Sign Language (FSL) and American Sign Language (ASL) are
                    different languages. This page currently provides alphabet
                    labels and a practice checklist, not verified hand-sign
                    pictures. Use the alphabet reference assigned by your teacher.
                </p>
            </div>
        </section>

        <section class="lesson-section">
            <div class="section-heading">
                <div>
                    <p class="eyebrow">YOUR ACHIEVEMENT</p>
                    <h2>Complete Your Lesson</h2>
                </div>
                <span class="section-symbol">🏆</span>
            </div>

            <p class="lesson-subtitle">
                Practice all 26 letters and check them off. Once all letters
                are checked, you can mark this lesson as completed.
            </p>

            <div class="lesson-progress-label">
                <span>Lesson progress</span>
                <strong id="lessonPercent">0%</strong>
            </div>

            <div class="progress-bar">
                <div class="progress-fill" id="lessonProgressBar"></div>
            </div>

            <p id="checklistCount" class="lesson-subtitle" style="margin-top:12px;margin-bottom:0">
                0 of 26 letters completed.
            </p>

            <div class="lesson-actions">
                <button type="button" class="primary-btn" id="completeLessonButton" disabled>
                    Mark Lesson as Completed ✓
                </button>

                <a class="lesson-secondary-btn" href="index.php#lessons">
                    ← Back to Dashboard
                </a>
                <a class="lesson-secondary-btn" href="basic-greetings.php">
                    ← Previous Lesson
                </a>
            </div>

            <div class="lesson-message" id="completionMessage" role="status">
                <strong>🎉 Lesson Completed!</strong>
                <p>
                    You completed the Sign Language Alphabet lesson and earned 50 XP.
                </p>
                <a href="index.php#lessons">Return to your dashboard →</a>
            </div>
        </section>

        <footer class="lesson-footer">
            SignLearn · Learn one sign at a time.
        </footer>

    </main>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const LESSON_ID = "2";
    const LESSON_TITLE = "Sign Language Alphabet";
    const XP_REWARD = 50;

    const COMPLETED_KEY = "signlearnCompletedLessons";
    const ACTIVITY_KEY = "signlearnActivity";

    const checks = Array.from(document.querySelectorAll(".letter-check"));
    const completeButton = document.getElementById("completeLessonButton");
    const checklistCount = document.getElementById("checklistCount");
    const lessonPercent = document.getElementById("lessonPercent");
    const lessonProgressBar = document.getElementById("lessonProgressBar");
    const headerProgress = document.getElementById("headerProgress");
    const headerProgressBar = document.getElementById("headerProgressBar");
    const completionMessage = document.getElementById("completionMessage");
    const letterDetail = document.getElementById("letterDetail");
    const letterSearch = document.getElementById("letterSearch");
    const cards = Array.from(document.querySelectorAll(".alphabet-card"));

    function readArray(key) {
        try {
            const value = JSON.parse(localStorage.getItem(key) || "[]");
            return Array.isArray(value) ? value : [];
        } catch (error) {
            return [];
        }
    }

    function getCompletedLessons() {
        return readArray(COMPLETED_KEY).map(String);
    }

    function updateProgress() {
        const completed = checks.filter(check => check.checked).length;
        const total = checks.length;
        const percent = Math.round((completed / total) * 100);

        checklistCount.textContent =
            completed + " of " + total + " letters completed.";

        lessonPercent.textContent = percent + "%";
        lessonProgressBar.style.width = percent + "%";

        headerProgress.textContent = percent + "%";
        headerProgressBar.style.width = percent + "%";

        completeButton.disabled =
            completed !== total ||
            getCompletedLessons().includes(LESSON_ID);
    }

    function showCompleted() {
        checks.forEach(function (check) {
            check.checked = true;
            check.disabled = true;
        });

        completeButton.disabled = true;
        completeButton.textContent = "Lesson Already Completed ✓";
        completionMessage.style.display = "block";

        checklistCount.textContent = "26 of 26 letters completed.";
        lessonPercent.textContent = "100%";
        lessonProgressBar.style.width = "100%";
        headerProgress.textContent = "100%";
        headerProgressBar.style.width = "100%";
    }

    document.querySelectorAll("[data-select-letter]").forEach(function (button) {
        button.addEventListener("click", function () {
            const letter = button.dataset.selectLetter;
            letterDetail.innerHTML =
                "<strong>Letter " + letter + "</strong>" +
                "<p>Practice recognizing and fingerspelling the letter " +
                letter + ". Follow your teacher's reference for the correct " +
                "hand position and movement.</p>";

            letterDetail.style.display = "block";
            letterDetail.scrollIntoView({ behavior: "smooth", block: "nearest" });
        });
    });

    letterSearch.addEventListener("input", function () {
        const query = letterSearch.value.trim().toUpperCase();

        cards.forEach(function (card) {
            card.style.display = card.dataset.letter.includes(query) ? "" : "none";
        });
    });

    document.getElementById("showAllButton").addEventListener("click", function () {
        letterSearch.value = "";
        cards.forEach(card => card.style.display = "");
    });

    checks.forEach(function (check) {
        check.addEventListener("change", updateProgress);
    });

    if (getCompletedLessons().includes(LESSON_ID)) {
        showCompleted();
    } else {
        updateProgress();
    }

    completeButton.addEventListener("click", function () {
        if (!checks.every(check => check.checked)) {
            alert("Please practice and check all 26 letters first.");
            return;
        }

        const completedLessons = getCompletedLessons();

        if (!completedLessons.includes(LESSON_ID)) {
            completedLessons.push(LESSON_ID);

            localStorage.setItem(
                COMPLETED_KEY,
                JSON.stringify(completedLessons)
            );

            const activities = readArray(ACTIVITY_KEY);
            activities.unshift({
                id: LESSON_ID,
                title: "Completed " + LESSON_TITLE,
                time: new Date().toISOString()
            });

            localStorage.setItem(
                ACTIVITY_KEY,
                JSON.stringify(activities.slice(0, 10))
            );
        }

        showCompleted();
        completeButton.textContent = "Lesson Completed ✓";

        alert("Congratulations! Sign Language Alphabet is completed. You earned " +
            XP_REWARD + " XP.");
    });
});
</script>

</body>
</html>
