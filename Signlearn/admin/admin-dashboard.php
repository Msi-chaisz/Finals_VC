
<?php
session_start();

/*
|--------------------------------------------------------------------------
| SignLearn - Administrator Dashboard
|--------------------------------------------------------------------------
| Frontend-ready administrator dashboard.
| Statistics currently use sample data and session values.
| Database integration will be added later.
|--------------------------------------------------------------------------
*/

// LOGOUT FUNCTION
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["logout"])) {

    $_SESSION = [];

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            "",
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    session_destroy();

    header("Location: login.php");
    exit;
}

// ADMIN INFORMATION
$adminName = $_SESSION["admin_name"] ?? "Administrator";
$adminEmail = $_SESSION["admin_email"] ?? "admin@signlearn.com";

// SAMPLE DASHBOARD STATISTICS
$totalStudents = 250;
$totalTeachers = 12;
$totalLessons = 26;
$activeLearners = 185;
$pendingApprovals = 8;
$totalCompletedLessons = 1240;

// SAMPLE RECENT ACTIVITIES
$activities = [
    [
        "icon" => "👤",
        "title" => "New student registered",
        "description" => "A new student account was created.",
        "time" => "10 minutes ago",
        "type" => "student"
    ],
    [
        "icon" => "👩‍🏫",
        "title" => "Teacher account activity",
        "description" => "A teacher accessed the learning system.",
        "time" => "30 minutes ago",
        "type" => "teacher"
    ],
    [
        "icon" => "📚",
        "title" => "Lesson activity",
        "description" => "A student completed Basic Greetings.",
        "time" => "1 hour ago",
        "type" => "lesson"
    ],
    [
        "icon" => "📝",
        "title" => "New permission request",
        "description" => "A student submitted an account update request.",
        "time" => "2 hours ago",
        "type" => "request"
    ]
];

// SAMPLE PENDING APPROVALS
$pendingStudents = [
    [
        "name" => "Juan Dela Cruz",
        "email" => "juan@email.com",
        "date" => "Oct 30, 2026"
    ],
    [
        "name" => "Maria Santos",
        "email" => "maria@email.com",
        "date" => "Oct 30, 2026"
    ],
    [
        "name" => "Pedro Reyes",
        "email" => "pedro@email.com",
        "date" => "Oct 29, 2026"
    ]
];

// SAMPLE WEEKLY ACTIVITY
$weeklyActivity = [
    ["day" => "Mon", "value" => 45],
    ["day" => "Tue", "value" => 65],
    ["day" => "Wed", "value" => 50],
    ["day" => "Thu", "value" => 85],
    ["day" => "Fri", "value" => 70],
    ["day" => "Sat", "value" => 95],
    ["day" => "Sun", "value" => 60]
];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Administrator Dashboard | SignLearn</title>

<style>

/* GENERAL */

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

/* SIDEBAR */

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
    overflow-y: auto;
}

.logo {
    font-size: 25px;
    font-weight: bold;
    margin-bottom: 5px;
}

.subtitle {
    font-size: 12px;
    color: #b8bdd3;
    margin-bottom: 35px;
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
    padding: 13px 13px;
    margin-bottom: 7px;
    border-radius: 9px;
    font-size: 13px;
    transition: 0.2s;
}

.sidebar a:hover,
.sidebar a.active {
    background: #6658d9;
    color: white;
}

.sidebar-divider {
    height: 1px;
    background: rgba(255,255,255,0.12);
    margin: 15px 5px;
}

/* ADMIN PROFILE IN SIDEBAR */

.admin-profile {
    margin-top: auto;
    background: #343b60;
    padding: 13px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.admin-avatar {
    width: 38px;
    height: 38px;
    background: #6658d9;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
}

.admin-profile-info strong {
    display: block;
    font-size: 12px;
}

.admin-profile-info span {
    display: block;
    font-size: 10px;
    color: #b8bdd3;
    margin-top: 4px;
}

/* LOGOUT */

.logout-form {
    margin-top: 12px;
}

.logout-button {
    width: 100%;
    padding: 13px;
    background: #343b60;
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 9px;
    color: #ffb6b6;
    font-size: 14px;
    font-weight: bold;
    text-align: left;
    cursor: pointer;
    transition: 0.2s;
}

.logout-button:hover {
    background: #a83245;
    color: white;
}

/* MAIN CONTENT */

.main {
    margin-left: 250px;
    padding: 32px;
}

/* TOPBAR */

.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    gap: 15px;
}

.topbar h1 {
    font-size: 27px;
}

.topbar p {
    font-size: 13px;
    color: #85899d;
    margin-top: 7px;
}

.topbar-right {
    display: flex;
    align-items: center;
    gap: 12px;
}

.admin-badge {
    background: #e7e4ff;
    color: #6658d9;
    padding: 10px 15px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
}

.notification-button {
    width: 42px;
    height: 42px;
    border: none;
    border-radius: 10px;
    background: white;
    color: #252b48;
    font-size: 19px;
    cursor: pointer;
    position: relative;
}

.notification-button:hover {
    background: #e7e4ff;
}

.notification-dot {
    position: absolute;
    top: 8px;
    right: 9px;
    width: 8px;
    height: 8px;
    background: #e64c4c;
    border-radius: 50%;
}

/* WELCOME BANNER */

.welcome-banner {
    background: linear-gradient(120deg, #6658d9, #8c7df0);
    padding: 27px 30px;
    border-radius: 16px;
    color: white;
    margin-bottom: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.welcome-banner h2 {
    font-size: 23px;
    margin-bottom: 8px;
}

.welcome-banner p {
    font-size: 13px;
    color: #eeeaff;
    line-height: 1.6;
}

.welcome-icon {
    font-size: 55px;
    opacity: 0.9;
}

/* STATISTICS */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 25px;
}

.stat-card {
    background: white;
    padding: 21px;
    border-radius: 14px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.04);
}

.stat-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 17px;
}

.stat-icon {
    width: 43px;
    height: 43px;
    border-radius: 11px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 21px;
}

.purple {
    background: #eeebff;
}

.green {
    background: #e4f7ed;
}

.orange {
    background: #fff1dc;
}

.blue {
    background: #e5f2ff;
}

.stat-card h2 {
    font-size: 27px;
    margin-bottom: 5px;
}

.stat-card p {
    color: #85899d;
    font-size: 12px;
}

.stat-label {
    font-size: 11px;
    color: #198754;
    font-weight: bold;
}

/* SECTION GRID */

.dashboard-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 22px;
    margin-bottom: 22px;
}

.card {
    background: white;
    padding: 24px;
    border-radius: 15px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.04);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 22px;
    gap: 10px;
}

.card-header h3 {
    font-size: 17px;
}

.card-header p {
    font-size: 12px;
    color: #85899d;
    margin-top: 6px;
}

.view-link {
    color: #6658d9;
    font-size: 12px;
    font-weight: bold;
    text-decoration: none;
}

.view-link:hover {
    text-decoration: underline;
}

/* WEEKLY ACTIVITY CHART */

.chart {
    height: 210px;
    display: flex;
    align-items: flex-end;
    justify-content: space-around;
    gap: 12px;
    padding: 15px 5px 0;
    border-bottom: 1px solid #e7e8f0;
    background: repeating-linear-gradient(
        to bottom,
        transparent 0,
        transparent 48px,
        #f0f0f5 49px,
        transparent 50px
    );
}

.chart-column {
    flex: 1;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    gap: 8px;
}

.chart-bar {
    width: 70%;
    max-width: 38px;
    min-height: 5px;
    background: linear-gradient(180deg, #8c7df0, #6658d9);
    border-radius: 7px 7px 0 0;
    transition: 0.2s;
}

.chart-bar:hover {
    background: #493ab3;
}

.chart-column span {
    font-size: 11px;
    color: #85899d;
    padding-bottom: 5px;
}

/* APPROVALS */

.approval-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 13px 0;
    border-bottom: 1px solid #eeeeF5;
    gap: 10px;
}

.approval-item:last-child {
    border-bottom: none;
}

.approval-info {
    display: flex;
    align-items: center;
    gap: 10px;
}

.approval-avatar {
    width: 38px;
    height: 38px;
    background: #eeebff;
    color: #6658d9;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: bold;
}

.approval-info h4 {
    font-size: 12px;
    margin-bottom: 5px;
}

.approval-info p {
    font-size: 10px;
    color: #85899d;
}

.pending-label {
    background: #fff2d5;
    color: #a66b00;
    padding: 6px 9px;
    border-radius: 20px;
    font-size: 10px;
    font-weight: bold;
}

/* ACTIVITY */

.activity-item {
    display: flex;
    gap: 13px;
    padding: 14px 0;
    border-bottom: 1px solid #eeeeF5;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: #f0efff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.activity-info h4 {
    font-size: 13px;
    margin-bottom: 5px;
}

.activity-info p {
    font-size: 11px;
    color: #85899d;
    line-height: 1.5;
}

.activity-info span {
    display: block;
    font-size: 10px;
    color: #a0a2b1;
    margin-top: 6px;
}

/* QUICK ACTIONS */

.quick-actions {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 13px;
}

.action-button {
    text-decoration: none;
    border: 1px solid #e7e8f0;
    border-radius: 11px;
    padding: 17px 12px;
    text-align: center;
    color: #252b48;
    transition: 0.2s;
}

.action-button:hover {
    border-color: #6658d9;
    background: #f8f7ff;
    transform: translateY(-2px);
}

.action-button span {
    display: block;
    font-size: 25px;
    margin-bottom: 9px;
}

.action-button strong {
    font-size: 12px;
}

/* BOTTOM NOTE */

.system-note {
    margin-top: 22px;
    background: #eeebff;
    border-radius: 11px;
    padding: 15px 18px;
    color: #5547c2;
    font-size: 12px;
    line-height: 1.6;
}

/* RESPONSIVE */

@media (max-width: 1200px) {

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .dashboard-grid {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 700px) {

    .sidebar {
        position: relative;
        width: 100%;
        height: auto;
    }

    .admin-profile {
        margin-top: 15px;
    }

    .main {
        margin-left: 0;
        padding: 20px;
    }

    .topbar {
        align-items: flex-start;
        flex-direction: column;
    }

    .topbar-right {
        width: 100%;
        justify-content: space-between;
    }

    .welcome-banner {
        padding: 22px;
    }

    .welcome-banner h2 {
        font-size: 19px;
    }

    .welcome-icon {
        font-size: 40px;
    }

    .stats-grid {
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    .stat-card {
        padding: 15px;
    }

    .stat-card h2 {
        font-size: 22px;
    }

    .quick-actions {
        grid-template-columns: 1fr 1fr;
    }

}

@media (max-width: 400px) {

    .stats-grid {
        grid-template-columns: 1fr;
    }

}

</style>

</head>

<body>

<!-- SIDEBAR -->

<aside class="sidebar">

    <div class="logo">🤟 SignLearn</div>

    <div class="subtitle">Administrator Panel</div>

    <div class="menu-title">MAIN MENU</div>

    <a href="admin-dashboard.php" class="active">
        ▦ Dashboard
    </a>

    <a href="students.php">
        👥 Student Management
    </a>

    <a href="teachers.php">
        👩‍🏫 Teacher Management
    </a>

    <a href="lessons.php">
        📚 Lesson Management
    </a>

    <div class="sidebar-divider"></div>

    <div class="menu-title">MONITORING</div>

    <a href="reports.php">
        📊 Reports & Analytics
    </a>

    <a href="approvals.php">
        📋 Account Approvals
    </a>

    <a href="announcements.php">
        🔔 Announcements
    </a>

    <div class="sidebar-divider"></div>

    <div class="menu-title">SYSTEM</div>

    <a href="settings.php">
        ⚙️ System Settings
    </a>

    <a href="activity-logs.php">
        🕒 Activity Logs
    </a>

    <!-- ADMIN PROFILE -->

    <div class="admin-profile">

        <div class="admin-avatar">🛡️</div>

        <div class="admin-profile-info">

            <strong>
                <?= htmlspecialchars($adminName) ?>
            </strong>

            <span>Administrator</span>

        </div>

    </div>

    <!-- LOGOUT -->

    <form method="POST"
          class="logout-form"
          onsubmit="return confirm('Are you sure you want to log out?');">

        <button type="submit"
                name="logout"
                value="1"
                class="logout-button">

            ↪ Log Out

        </button>

    </form>

</aside>

<!-- MAIN CONTENT -->

<main class="main">

    <!-- TOPBAR -->

    <div class="topbar">

        <div>

            <h1>Administrator Dashboard</h1>

            <p>Monitor and manage your SignLearn learning system.</p>

        </div>

        <div class="topbar-right">

            <div class="admin-badge">
                🛡️ Administrator
            </div>

            <button class="notification-button"
                    type="button"
                    onclick="showNotifications()">

                ♧

                <span class="notification-dot"></span>

            </button>

        </div>

    </div>

    <!-- WELCOME -->

    <section class="welcome-banner">

        <div>

            <h2>
                Welcome back, <?= htmlspecialchars($adminName) ?>! 👋
            </h2>

            <p>
                Here's what's happening in your SignLearn system today.
                Manage your students, teachers, lessons, and learning activities.
            </p>

        </div>

        <div class="welcome-icon">
            🛡️
        </div>

    </section>

    <!-- STATISTICS -->

    <section class="stats-grid">

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon purple">👥</div>

                <span class="stat-label">Registered</span>

            </div>

            <h2><?= number_format($totalStudents) ?></h2>

            <p>Total Students</p>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon green">👩‍🏫</div>

                <span class="stat-label">Registered</span>

            </div>

            <h2><?= number_format($totalTeachers) ?></h2>

            <p>Total Teachers</p>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon orange">📚</div>

                <span class="stat-label">Available</span>

            </div>

            <h2><?= number_format($totalLessons) ?></h2>

            <p>Total Lessons</p>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon blue">📈</div>

                <span class="stat-label">Currently Active</span>

            </div>

            <h2><?= number_format($activeLearners) ?></h2>

            <p>Active Learners</p>

        </div>

    </section>

    <!-- SECONDARY STATISTICS -->

    <section class="stats-grid">

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon orange">⏳</div>

                <span class="stat-label">Needs review</span>

            </div>

            <h2><?= number_format($pendingApprovals) ?></h2>

            <p>Pending Approvals</p>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon green">🏆</div>

                <span class="stat-label">Learning activity</span>

            </div>

            <h2><?= number_format($totalCompletedLessons) ?></h2>

            <p>Completed Lessons</p>

        </div>

    </section>

    <!-- CHART AND APPROVALS -->

    <section class="dashboard-grid">

        <!-- WEEKLY ACTIVITY -->

        <div class="card">

            <div class="card-header">

                <div>

                    <h3>📊 Weekly Learning Activity</h3>

                    <p>Sample student activity for the current week.</p>

                </div>

                <a href="reports.php" class="view-link">
                    View Reports →
                </a>

            </div>

            <div class="chart">

                <?php foreach ($weeklyActivity as $activity): ?>

                    <div class="chart-column">

                        <div class="chart-bar"
                             style="height: <?= (int)$activity["value"] ?>%;"
                             title="<?= (int)$activity["value"] ?>% activity">
                        </div>

                        <span>
                            <?= htmlspecialchars($activity["day"]) ?>
                        </span>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

        <!-- PENDING APPROVALS -->

        <div class="card">

            <div class="card-header">

                <div>

                    <h3>⏳ Pending Approvals</h3>

                    <p>Recently registered students.</p>

                </div>

                <a href="approvals.php" class="view-link">
                    View All →
                </a>

            </div>

            <?php foreach ($pendingStudents as $student): ?>

                <div class="approval-item">

                    <div class="approval-info">

                        <div class="approval-avatar">

                            <?= strtoupper(substr($student["name"], 0, 1)) ?>

                        </div>

                        <div>

                            <h4>
                                <?= htmlspecialchars($student["name"]) ?>
                            </h4>

                            <p>
                                <?= htmlspecialchars($student["email"]) ?>
                            </p>

                        </div>

                    </div>

                    <span class="pending-label">
                        Pending
                    </span>

                </div>

            <?php endforeach; ?>

        </div>

    </section>

    <!-- ACTIVITY AND QUICK ACTIONS -->

    <section class="dashboard-grid">

        <!-- RECENT ACTIVITIES -->

        <div class="card">

            <div class="card-header">

                <div>

                    <h3>🕒 Recent System Activities</h3>

                    <p>Latest activity inside SignLearn.</p>

                </div>

                <a href="activity-logs.php" class="view-link">
                    View All →
                </a>

            </div>

            <?php foreach ($activities as $activity): ?>

                <div class="activity-item">

                    <div class="activity-icon">
                        <?= $activity["icon"] ?>
                    </div>

                    <div class="activity-info">

                        <h4>
                            <?= htmlspecialchars($activity["title"]) ?>
                        </h4>

                        <p>
                            <?= htmlspecialchars($activity["description"]) ?>
                        </p>

                        <span>
                            <?= htmlspecialchars($activity["time"]) ?>
                        </span>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <!-- QUICK ACTIONS -->

        <div class="card">

            <div class="card-header">

                <div>

                    <h3>⚡ Quick Actions</h3>

                    <p>Quickly access administrator tools.</p>

                </div>

            </div>

            <div class="quick-actions">

                <a href="students.php" class="action-button">

                    <span>👥</span>

                    <strong>Manage Students</strong>

                </a>

                <a href="teachers.php" class="action-button">

                    <span>👩‍🏫</span>

                    <strong>Manage Teachers</strong>

                </a>

                <a href="lessons.php" class="action-button">

                    <span>📚</span>

                    <strong>Manage Lessons</strong>

                </a>

                <a href="approvals.php" class="action-button">

                    <span>📋</span>

                    <strong>Review Requests</strong>

                </a>

            </div>

        </div>

    </section>

    <!-- SYSTEM INFORMATION -->

    <div class="system-note">

        <strong>🛡️ Administrator Notice</strong><br>

        You have access to the SignLearn administrator panel.
        Manage student and teacher accounts responsibly.
        All account changes should be recorded in the system activity logs.

    </div>

</main>

<script>

// NOTIFICATION BUTTON

function showNotifications() {

    alert(
        "SignLearn Notifications\n\n" +
        "You currently have pending account approvals.\n" +
        "Please visit Account Approvals to review them."
    );

}

</script>

</body>
</html>
