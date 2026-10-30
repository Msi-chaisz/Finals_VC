
<?php
$systemName = "SignLearn";
$learnerName = "Student";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Greetings | <?= htmlspecialchars($systemName) ?></title>
    <link rel="stylesheet" href="style.css">

    <style>
        /* Lesson page: follows the original SignLearn purple theme */
        .lesson-welcome {
            background: linear-gradient(115deg, #252b48 0%, #403b7a 58%, #6658d9 100%);
            color: white;
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 24px;
        }

        .lesson-welcome .eyebrow {
            color: #c4bbff;
        }

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

        .greeting-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .greeting-card {
            border: 1px solid #eeeef4;
            border-radius: 12px;
            padding: 20px;
            background: #fff;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .greeting-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px #252b4810;
        }

        .greeting-visual {
            min-height: 115px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 55px;
            margin-bottom: 16px;
            background: linear-gradient(135deg, #f0edff, #e8e4ff);
        }

        .greeting-tag {
            display: inline-block;
            color: #6658d9;
            background: #efedff;
            border-radius: 6px;
            padding: 6px 9px;
            font-size: 9px;
            font-weight: bold;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .greeting-card h3 {
            color: #252b48;
            font-size: 16px;
            margin-bottom: 9px;
        }

        .greeting-card p {
            color: #888;
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 12px;
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

        .check-row {
            display: flex;
            gap: 9px;
            align-items: flex-start;
            padding-top: 12px;
            border-top: 1px solid #f0f0f5;
            color: #555;
            font-size: 11px;
            line-height: 1.6;
        }

        .check-row input {
            accent-color: #6658d9;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .lesson-progress-label {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            color: #888;
            font-size: 11px;
            margin: 18px 0 8px;
        }

        .lesson-progress-label strong {
            color: #6658d9;
        }

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

        .lesson-secondary-btn:hover {
            background: #f8f7ff;
        }

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

        @media (max-width: 600px) {
            .greeting-grid {
                grid-template-columns: minmax(0, 1fr);
            }

            .lesson-welcome {
                padding: 23px 20px;
            }

            .lesson-welcome h2 {
                font-size: 23px;
            }

            .lesson-section {
                padding: 17px;
            }
        }
    </style>
</head>

<body>
<div class="container">

    <!-- ORIGINAL SIGNLEARN SIDEBAR -->
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

    <!-- MAIN CONTENT -->
    <main class="main-content">

        <header class="top-navbar">
            <div class="page-title">
                <p class="eyebrow">LEARNING SPACE</p>
                <h1>Basic Greetings</h1>
                <p>Learn common greetings and practice communicating through signs.</p>
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

        <!-- WELCOME BANNER -->
        <section class="lesson-welcome">
            <p class="eyebrow">BEGINNER · LESSON 01</p>
            <h2>👋 Let's Learn Basic Greetings!</h2>
            <p>
                Start your sign-language learning journey by exploring
                common greetings and polite expressions. Review each topic,
                practice using a trusted reference, and complete the checklist.
            </p>

            <div class="lesson-meta">
                <span>📚 4 topics</span>
                <span>⏱ 10–15 minutes</span>
                <span>⭐ 50 XP reward</span>
            </div>
        </section>

        <!-- LESSON CONTENT -->
        <section class="lesson-section">
            <h2>What You Will Learn</h2>
            <p class="lesson-subtitle">
                Study the meaning of each expression, then practice the correct
                sign from a reliable sign-language learning resource.
            </p>

            <div class="greeting-grid">

                <article class="greeting-card">
                    <div class="greeting-visual">👋</div>
                    <span class="greeting-tag">TOPIC 01</span>
                    <h3>Hello</h3>
                    <p>
                        A common greeting used when meeting someone or
                        starting a conversation.
                    </p>
                    <label class="check-row">
                        <input type="checkbox" class="lesson-check">
                        <span>I reviewed and practiced this greeting.</span>
                    </label>
                </article>

                <article class="greeting-card">
                    <div class="greeting-visual">🙂</div>
                    <span class="greeting-tag">TOPIC 02</span>
                    <h3>How Are You?</h3>
                    <p>
                        A friendly expression used to ask another person
                        about their well-being.
                    </p>
                    <label class="check-row">
                        <input type="checkbox" class="lesson-check">
                        <span>I reviewed and practiced this expression.</span>
                    </label>
                </article>

                <article class="greeting-card">
                    <div class="greeting-visual">🙏</div>
                    <span class="greeting-tag">TOPIC 03</span>
                    <h3>Thank You</h3>
                    <p>
                        A polite expression used to show appreciation
                        and gratitude.
                    </p>
                    <label class="check-row">
                        <input type="checkbox" class="lesson-check">
                        <span>I reviewed and practiced this expression.</span>
                    </label>
                </article>

                <article class="greeting-card">
                    <div class="greeting-visual">🤝</div>
                    <span class="greeting-tag">TOPIC 04</span>
                    <h3>Goodbye</h3>
                    <p>
                        An expression used when leaving or ending a
                        conversation with another person.
                    </p>
                    <label class="check-row">
                        <input type="checkbox" class="lesson-check">
                        <span>I reviewed and practiced this greeting.</span>
                    </label>
                </article>

            </div>

            <div class="practice-tip">
                <strong>💡 Learning tip</strong>
                <p>
                    Sign languages vary by country and community. Filipino
                    Sign Language (FSL) and American Sign Language (ASL), for
                    example, are different languages. Use the reference
                    specified by your teacher. The emojis on this page are
                    visual reminders, not demonstrations of the actual signs.
                </p>
            </div>
        </section>

        <!-- CHECKLIST AND COMPLETION -->
        <section class="lesson-section">
            <div class="section-heading">
                <div>
                    <p class="eyebrow">YOUR ACHIEVEMENT</p>
                    <h2>Complete Your Lesson</h2>
                </div>
                <span class="section-symbol">🏆</span>
            </div>

            <p class="lesson-subtitle">
                Check all four topics after reviewing them. When all are
                checked, you can mark the lesson as completed.
            </p>

            <div class="lesson-progress-label">
                <span>Lesson progress</span>
                <strong id="lessonPercent">0%</strong>
            </div>

            <div class="progress-bar">
                <div class="progress-fill" id="lessonProgressBar"></div>
            </div>

            <p id="checklistCount" class="lesson-subtitle" style="margin-top:12px;margin-bottom:0">
                0 of 4 topics completed.
            </p>

            <div class="lesson-actions">
                <button
                    type="button"
                    class="primary-btn"
                    id="completeLessonButton"
                    disabled
                >
                    Mark Lesson as Completed ✓
                </button>

                <a class="lesson-secondary-btn" href="index.php#lessons">
                    ← Back to Dashboard
                </a>
            </div>

            <div class="lesson-message" id="completionMessage" role="status">
                <strong>🎉 Lesson Completed!</strong>
                <p>
                    Your progress has been saved. You earned 50 XP for
                    completing Basic Greetings.
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
    const LESSON_ID = "1";
    const LESSON_TITLE = "Basic Greetings";
    const XP_REWARD = 50;

    const COMPLETED_KEY = "signlearnCompletedLessons";
    const ACTIVITY_KEY = "signlearnActivity";

    const checks = Array.from(document.querySelectorAll(".lesson-check"));
    const completeButton = document.getElementById("completeLessonButton");
    const checklistCount = document.getElementById("checklistCount");
    const lessonPercent = document.getElementById("lessonPercent");
    const lessonProgressBar = document.getElementById("lessonProgressBar");
    const headerProgress = document.getElementById("headerProgress");
    const headerProgressBar = document.getElementById("headerProgressBar");
    const completionMessage = document.getElementById("completionMessage");

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
            completed + " of " + total + " topics completed.";

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

        checklistCount.textContent = "4 of 4 topics completed.";
        lessonPercent.textContent = "100%";
        lessonProgressBar.style.width = "100%";
        headerProgress.textContent = "100%";
        headerProgressBar.style.width = "100%";
    }

    checks.forEach(function (check) {
        check.addEventListener("change", updateProgress);
    });

    // Load existing completion status from localStorage.
    if (getCompletedLessons().includes(LESSON_ID)) {
        showCompleted();
    } else {
        updateProgress();
    }

    completeButton.addEventListener("click", function () {
        if (!checks.every(check => check.checked)) {
            alert("Please review and check all four topics first.");
            return;
        }

        const completedLessons = getCompletedLessons();

        // Prevent duplicate completion and duplicate XP/activity.
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

        // XP is calculated by the dashboard from completed lessons.
        // This prevents XP being added twice on repeated clicks.
        alert("Congratulations! Basic Greetings is completed. You earned " +
            XP_REWARD + " XP.");
    });
});
</script>

</body>
</html>
