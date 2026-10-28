
<?php
$systemName = "SignLearn";
$learnerName = "Student";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($systemName) ?> | Dashboard</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .camera-practice .section-heading > div > p:not(.eyebrow) {
            color: #777d91;
            font-size: 14px;
            margin-top: 8px;
        }

        .camera-preview {
            position: relative;
            width: 100%;
            min-height: 280px;
            background: #252b48;
            border-radius: 14px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 18px 0;
        }

        .camera-preview video {
            display: block;
            width: 100%;
            max-height: 440px;
            object-fit: cover;
        }

        .camera-preview p {
            position: absolute;
            color: #fff;
            background: rgba(37, 43, 72, 0.85);
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            text-align: center;
        }

        .camera-actions {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 14px;
            margin-bottom: 14px;
        }

        .camera-actions .text-link {
            text-decoration: none;
            font-weight: 600;
        }

        .camera-actions .text-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .camera-preview {
                min-height: 220px;
            }

            .camera-actions {
                align-items: flex-start;
                flex-direction: column;
            }
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
            <a href="#dashboard" class="active">▦ <span>Dashboard</span></a>
            <a href="#lessons">▤ <span>Sign Lessons</span></a>
            <a href="#progress">◴ <span>My Progress</span></a>
            <a href="practice.php">✋ <span>Practice Mode</span></a>
            <a href="#chat">▢ <span>Learning Assistant</span></a>
        </nav>

        <div class="sidebar-bottom">
            <div class="help-icon">?</div>
            <strong>Need help?</strong>
            <p>Keep learning one sign at a time.</p>
            <a href="#chat">Open assistant →</a>
        </div>
    </aside>

    <main class="main-content">

        <header class="top-navbar" id="dashboard">
            <div class="page-title">
                <p class="eyebrow">LEARNING SPACE</p>
                <h1>Dashboard</h1>
                <p>
                    Welcome back, <?= htmlspecialchars($learnerName) ?>!
                    Ready to learn something new?
                </p>
            </div>

            <div class="navbar-actions">
                <a class="nav-progress" href="#progress">
                    <span>Overall progress</span>
                    <strong id="navPercent">0%</strong>
                    <div class="progress-bar">
                        <div class="progress-fill" id="navProgressBar"></div>
                    </div>
                </a>

                <div class="notification-wrap">
                    <button class="notification-btn" id="notificationBtn"
                            type="button" aria-label="Notifications">
                        ♧<span class="notification-dot"></span>
                    </button>

                    <div class="notification-panel" id="notificationPanel" hidden>
                        <h3>Notifications</h3>
                        <p>👋 Welcome to SignLearn!</p>
                        <p>📚 Choose a lesson to begin your learning journey.</p>
                        <p>🎯 Complete lessons to increase your progress.</p>
                    </div>
                </div>

                <div class="profile">
                    <div class="profile-avatar">S</div>
                    <div>
                        <strong><?= htmlspecialchars($learnerName) ?></strong>
                        <small>Learner account</small>
                    </div>
                </div>
            </div>
        </header>

        <section class="welcome-banner">
            <div class="welcome-copy">
                <span class="banner-label">YOUR LEARNING JOURNEY</span>
                <h2>Every sign brings us closer. 🤟</h2>
                <p>
                    Build your skills, practice with confidence, and make
                    communication more accessible.
                </p>
                <a class="banner-button" href="#lessons">
                    Explore lessons <span>→</span>
                </a>
            </div>

            <div class="banner-art" aria-hidden="true">🤟</div>
            <div class="banner-decoration"></div>
        </section>

        <section class="stats-grid">
            <article class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon purple">▤</div>
                    <span class="stat-caption">LEARNING LIBRARY</span>
                </div>
                <h2 id="totalLessons">3</h2>
                <p>Available lessons</p>
                <small>Start with the basics</small>
            </article>

            <article class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon green">✓</div>
                    <span class="stat-caption">YOUR ACHIEVEMENT</span>
                </div>
                <h2 id="completedLessons">0</h2>
                <p>Completed lessons</p>
                <small id="completionCaption">Your journey starts here</small>
            </article>

            <article class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon orange">◎</div>
                    <span class="stat-caption">WEEKLY TARGET</span>
                </div>
                <h2>
                    <span id="weeklyCount">0</span>
                    <span class="goal-total"> / 5</span>
                </h2>
                <p>Lessons this week</p>
                <small>Goal: practice consistently</small>
            </article>

            <article class="stat-card">
                <div class="stat-top">
                    <div class="stat-icon blue">★</div>
                    <span class="stat-caption">YOUR POINTS</span>
                </div>
                <h2 id="xpCount">0 XP</h2>
                <p>Learning points</p>
                <small>Earn points by completing lessons</small>
            </article>
        </section>

        <div class="dashboard-columns">

            <section class="section-card featured-section" id="lessons">
                <div class="section-heading">
                    <div>
                        <p class="eyebrow">PICK UP WHERE YOU LEFT OFF</p>
                        <h2>Continue Learning</h2>
                    </div>
                    <span class="section-symbol">📚</span>
                </div>

                <article class="featured-lesson">
                    <div class="lesson-illustration greeting-art">👋</div>

                    <div class="featured-details">
                        <span class="lesson-tag">BEGINNER · LESSON 01</span>
                        <h3 id="featuredTitle">Basic Greetings</h3>
                        <p id="featuredDescription">
                            Discover greetings and simple ways to introduce
                            yourself through signs.
                        </p>

                        <div class="featured-progress-label">
                            <span>Lesson completion</span>
                            <strong id="featuredStatus">Not started</strong>
                        </div>

                        <div class="progress-bar featured-bar">
                            <div class="progress-fill" id="featuredBar"></div>
                        </div>

                        <button class="primary-btn" id="continueBtn" type="button">
                            Start lesson →
                        </button>
                    </div>
                </article>

                <div class="section-heading lesson-heading">
                    <div>
                        <h2>Explore Lessons</h2>
                        <p>Learn useful signs step by step.</p>
                    </div>
                </div>

                <div class="lesson-list">
                    <article class="mini-lesson" data-lesson="1">
                        <div class="mini-lesson-icon lavender">👋</div>
                        <div class="mini-lesson-info">
                            <h3>Basic Greetings</h3>
                            <p>Greetings and introductions</p>
                        </div>
                        <button class="complete-btn" type="button">Start</button>
                    </article>

                    <article class="mini-lesson" data-lesson="2">
                        <div class="mini-lesson-icon peach">🔤</div>
                        <div class="mini-lesson-info">
                            <h3>Sign Language Alphabet</h3>
                            <p>Letters and fingerspelling</p>
                        </div>
                        <button class="complete-btn" type="button">Start</button>
                    </article>

                    <article class="mini-lesson" data-lesson="3">
                        <div class="mini-lesson-icon mint">🙋</div>
                        <div class="mini-lesson-info">
                            <h3>Everyday Expressions</h3>
                            <p>Common daily expressions</p>
                        </div>
                        <button class="complete-btn" type="button">Start</button>
                    </article>
                </div>
            </section>

            <div class="right-column">

                <section class="section-card daily-card">
                    <div class="section-heading">
                        <div>
                            <p class="eyebrow">DAILY PRACTICE</p>
                            <h2>Sign of the Day</h2>
                        </div>
                        <span class="daily-sparkle">✦</span>
                    </div>

                    <div class="daily-sign-visual">🤟</div>
                    <h3>Practice a greeting</h3>
                    <p>
                        Explore a greeting gesture and learn how it is used
                        in context.
                    </p>
                    <p class="sign-note">
                        Illustrative preview — verify the correct sign using
                        your chosen sign-language reference.
                    </p>
                    <a href="practice.php" class="text-link">Go to practice →</a>
                </section>

                <section class="section-card weekly-card" id="progress">
                    <div class="section-heading">
                        <div>
                            <p class="eyebrow">STAY CONSISTENT</p>
                            <h2>Weekly Goal</h2>
                        </div>
                        <span class="goal-icon">🎯</span>
                    </div>

                    <div class="weekly-number">
                        <strong id="weeklySummary">0/5</strong>
                        <span>lessons completed</span>
                    </div>

                    <div class="progress-bar weekly-bar">
                        <div class="progress-fill" id="weeklyProgressBar"></div>
                    </div>

                    <p id="weeklyMessage">
                        Complete lessons to reach your weekly target.
                    </p>
                </section>

                <section class="section-card activity-card">
                    <div class="section-heading">
                        <div>
                            <p class="eyebrow">YOUR JOURNEY</p>
                            <h2>Recent Activity</h2>
                        </div>
                    </div>

                    <div id="activityList" class="activity-list">
                        <p class="empty-activity">
                            Your completed lessons will appear here.
                        </p>
                    </div>
                </section>
            </div>
        </div>

        <!-- CAMERA PRACTICE -->
        <section class="section-card practice-card camera-practice" id="practice">
            <div class="section-heading">
                <div>
                    <p class="eyebrow">INTERACTIVE LEARNING</p>
                    <h2>Camera Practice</h2>
                    <p>Turn on your camera to practice your hand signs.</p>
                </div>
                <span class="practice-symbol">📷</span>
            </div>

            <div class="camera-preview">
                <video id="practiceCamera" autoplay muted playsinline></video>
                <p id="cameraMessage">Camera is currently off.</p>
            </div>

            <div class="camera-actions">
                <button type="button" class="primary-btn" id="cameraToggle">
                    📷 Turn Camera On
                </button>
                <a href="practice.php" class="text-link">
                    Take ASL Practice Quiz →
                </a>
            </div>

            <small class="chat-note">
                Camera preview only for now. Automatic sign recognition will
                be added when the group's recognition model is ready.
            </small>
        </section>

        <!-- LEARNING ASSISTANT -->
        <section class="section-card chat-section" id="chat">
            <div class="section-heading">
                <div>
                    <p class="eyebrow">NEED A HAND?</p>
                    <h2>Learning Assistant</h2>
                    <p>Ask about using SignLearn or navigating its lessons.</p>
                </div>
                <span class="chat-heading-icon">💬</span>
            </div>

            <div class="chat-messages" id="chatMessages" aria-live="polite">
                <div class="chat-message bot-message">
                    Hi! Welcome to SignLearn. You can ask me how to use
                    the dashboard or find lessons.
                </div>
            </div>

            <form class="chat-form" id="chatForm">
                <input type="text" id="chatInput"
                       placeholder="Ask a question..."
                       aria-label="Your message" required>
                <button class="primary-btn" type="submit">Send ➤</button>
            </form>

            <small class="chat-note">
                Prototype assistant: automated FAQ replies only, not an AI model.
            </small>
        </section>

        <footer>© 2026 SignLearn · Learn. Sign. Connect.</footer>

    </main>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const cards = [...document.querySelectorAll(".mini-lesson")];
    const storageKey = "signlearnCompletedLessons";
    const activityKey = "signlearnActivity";
    const completed = new Set();
    const activity = [];

    const $ = id => document.getElementById(id);

    // Lesson destinations.
    const lessonPages = {
        "1": "basic-greetings.php",
        "2": "alphabet.php"
    };

    const lessonDescriptions = {
        "1": {
            title: "Basic Greetings",
            description: "Discover greetings and simple ways to introduce yourself through signs.",
            icon: "👋",
            tag: "BEGINNER · LESSON 01"
        },
        "2": {
            title: "Sign Language Alphabet",
            description: "Learn letters A–Z and practice fingerspelling.",
            icon: "🔤",
            tag: "BEGINNER · LESSON 02"
        }
    };

    function readSavedArray(key) {
        try {
            const value = JSON.parse(localStorage.getItem(key) || "[]");
            return Array.isArray(value) ? value : [];
        } catch (error) {
            return [];
        }
    }

    function loadSavedProgress() {
        completed.clear();

        readSavedArray(storageKey).forEach(id => {
            completed.add(String(id));
        });

        activity.length = 0;
        activity.push(...readSavedArray(activityKey));

        completed.forEach(id => {
            const alreadyExists = activity.some(item => String(item.id) === id);
            const card = cards.find(item => item.dataset.lesson === id);

            if (!alreadyExists && card) {
                activity.unshift({
                    id: id,
                    title: card.querySelector("h3").textContent,
                    time: "Completed"
                });
            }
        });

        localStorage.setItem(activityKey, JSON.stringify(activity.slice(0, 5)));
    }

    function saveProgress() {
        localStorage.setItem(storageKey, JSON.stringify([...completed]));
        localStorage.setItem(activityKey, JSON.stringify(activity.slice(0, 5)));
    }

    function openLesson(lessonId) {
        const page = lessonPages[String(lessonId)];

        if (page) {
            window.location.href = page;
        } else {
            alert("Everyday Expressions lesson page is coming soon!");
        }
    }

    function updateFeaturedLesson() {
        // Prefer the first lesson that has not been completed yet.
        let nextId = "1";

        if (completed.has("1") && !completed.has("2")) {
            nextId = "2";
        } else if (completed.has("1") && completed.has("2")) {
            nextId = "2";
        }

        const info = lessonDescriptions[nextId];
        const isDone = completed.has(nextId);

        $("featuredTitle").textContent = info.title;
        $("featuredDescription").textContent = info.description;
        $("featuredBar").style.width = isDone ? "100%" : "0%";
        $("featuredStatus").textContent = isDone ? "Completed ✓" : "Not started";
        $("continueBtn").textContent = isDone ? "Review lesson →" : "Start lesson →";

        const illustration = document.querySelector(".lesson-illustration");
        if (illustration) {
            illustration.textContent = info.icon;
        }

        const tag = document.querySelector(".featured-details .lesson-tag");
        if (tag) {
            tag.textContent = info.tag;
        }

        $("continueBtn").dataset.lesson = nextId;
    }

    function updateDashboard() {
        const total = cards.length;
        const done = completed.size;
        const percent = total > 0 ? Math.round((done / total) * 100) : 0;
        const weekly = Math.min(done, 5);

        $("totalLessons").textContent = total;
        $("completedLessons").textContent = done;
        $("navPercent").textContent = percent + "%";
        $("navProgressBar").style.width = percent + "%";

        $("weeklyCount").textContent = weekly;
        $("weeklySummary").textContent = weekly + "/5";
        $("weeklyProgressBar").style.width = (weekly / 5 * 100) + "%";

        $("xpCount").textContent = (done * 50) + " XP";

        $("completionCaption").textContent =
            done === total
                ? "All sample lessons completed!"
                : (total - done) + " lessons remaining";

        $("weeklyMessage").textContent =
            weekly >= 5
                ? "Weekly target reached. Great work!"
                : "Complete " + (5 - weekly) +
                  " more lesson(s) to reach this sample goal.";

        cards.forEach(card => {
            const lessonId = String(card.dataset.lesson);
            const isDone = completed.has(lessonId);
            const button = card.querySelector(".complete-btn");

            card.classList.toggle("is-complete", isDone);
            button.textContent = isDone ? "Review ✓" : "Start";
        });

        updateFeaturedLesson();
        renderActivity();
    }

    function addActivity(lessonId, title) {
        const id = String(lessonId);
        const filtered = activity.filter(item => String(item.id) !== id);

        activity.length = 0;
        activity.push({
            id: id,
            title: title,
            time: new Date().toLocaleString()
        });
        activity.push(...filtered);
    }

    function renderActivity() {
        const list = $("activityList");
        list.replaceChildren();

        if (activity.length === 0) {
            const empty = document.createElement("p");
            empty.className = "empty-activity";
            empty.textContent = "Your completed lessons will appear here.";
            list.appendChild(empty);
            return;
        }

        activity.slice(0, 4).forEach(item => {
            const row = document.createElement("div");
            row.className = "activity-item";

            const icon = document.createElement("span");
            icon.className = "activity-check";
            icon.textContent = "✓";

            const detail = document.createElement("div");
            detail.className = "activity-detail";

            const title = document.createElement("strong");
            title.textContent = item.title || "Completed lesson";

            const time = document.createElement("small");
            time.textContent = "Completed: " + (item.time || "Saved");

            detail.append(title, time);
            row.append(icon, detail);
            list.appendChild(row);
        });
    }

    // Start/review the selected lesson.
    cards.forEach(card => {
        card.querySelector(".complete-btn").addEventListener("click", function () {
            openLesson(card.dataset.lesson);
        });
    });

    // Continue Learning opens the lesson selected by updateFeaturedLesson().
    $("continueBtn").addEventListener("click", function () {
        openLesson(this.dataset.lesson || "1");
    });

    // Notifications dropdown.
    $("notificationBtn").addEventListener("click", function () {
        const panel = $("notificationPanel");
        panel.hidden = !panel.hidden;
    });

    document.addEventListener("click", function (event) {
        const wrap = document.querySelector(".notification-wrap");

        if (wrap && !wrap.contains(event.target)) {
            $("notificationPanel").hidden = true;
        }
    });

    // Sidebar navigation highlighting.
    document.querySelectorAll(".side-menu a").forEach(link => {
        link.addEventListener("click", function () {
            document.querySelectorAll(".side-menu a").forEach(item => {
                item.classList.remove("active");
            });
            link.classList.add("active");
        });
    });

    // Learning Assistant prototype.
    $("chatForm").addEventListener("submit", function (event) {
        event.preventDefault();

        const input = $("chatInput");
        const message = input.value.trim();

        if (!message) return;

        addChatMessage(message, "user-message");
        input.value = "";

        const question = message.toLowerCase();
        let answer =
            "You can explore Sign Lessons, check My Progress, or visit Practice Mode. This prototype does not connect to an AI service yet.";

        if (question.includes("progress")) {
            answer = "Your progress is based on the sample lessons marked completed on this dashboard.";
        } else if (
            question.includes("alphabet") ||
            question.includes("letter") ||
            question.includes("a-z")
        ) {
            answer = "Open Sign Lessons, then click Start beside Sign Language Alphabet to open alphabet.php.";
        } else if (question.includes("lesson")) {
            answer = "Open the Sign Lessons section and select Start beside a lesson.";
        } else if (
            question.includes("camera") ||
            question.includes("recognition")
        ) {
            answer = "Use the Camera Practice section to turn on your camera. Automatic sign recognition is not integrated yet.";
        } else if (
            question.includes("hello") ||
            question.includes("hi")
        ) {
            answer = "Hello! Welcome to SignLearn. Ready to continue learning?";
        }

        addChatMessage(answer, "bot-message");
    });

    function addChatMessage(messageText, className) {
        const message = document.createElement("div");
        message.className = "chat-message " + className;
        message.textContent = messageText;

        $("chatMessages").appendChild(message);
        $("chatMessages").scrollTop = $("chatMessages").scrollHeight;
    }

    // CAMERA PRACTICE: turn the webcam on and off.
    const camera = $("practiceCamera");
    const cameraToggle = $("cameraToggle");
    const cameraMessage = $("cameraMessage");
    let cameraStream = null;

    cameraToggle.addEventListener("click", async function () {
        if (cameraStream) {
            cameraStream.getTracks().forEach(track => track.stop());
            cameraStream = null;
            camera.srcObject = null;

            cameraMessage.hidden = false;
            cameraMessage.textContent = "Camera is currently off.";
            cameraToggle.textContent = "📷 Turn Camera On";
            return;
        }

        if (
            !navigator.mediaDevices ||
            !navigator.mediaDevices.getUserMedia
        ) {
            cameraMessage.hidden = false;
            cameraMessage.textContent =
                "Camera is unavailable. Open this page through localhost and check browser permissions.";
            return;
        }

        try {
            cameraMessage.hidden = false;
            cameraMessage.textContent = "Requesting camera permission...";

            cameraStream = await navigator.mediaDevices.getUserMedia({
                video: true,
                audio: false
            });

            camera.srcObject = cameraStream;
            cameraMessage.hidden = true;
            cameraToggle.textContent = "⏹ Turn Camera Off";

        } catch (error) {
            cameraStream = null;
            cameraMessage.hidden = false;
            cameraMessage.textContent =
                "Camera access failed. Allow camera permission in your browser, then try again.";
            cameraToggle.textContent = "📷 Turn Camera On";
        }
    });

    window.addEventListener("beforeunload", function () {
        if (cameraStream) {
            cameraStream.getTracks().forEach(track => track.stop());
        }
    });

    // Load progress and refresh it when returning to the dashboard.
    loadSavedProgress();
    updateDashboard();

    window.addEventListener("pageshow", function () {
        loadSavedProgress();
        updateDashboard();
    });
});
</script>

</body>
</html>
