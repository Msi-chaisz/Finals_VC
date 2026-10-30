
<?php
session_start();

/*
 * SignLearn - Student Account Dashboard
 * Frontend-ready version with working session logout.
 */

// LOGOUT FUNCTION
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["logout"])) {

    // Clear all session data
    $_SESSION = [];

    // Remove session cookie
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

    // Destroy session
    session_destroy();

    // Redirect to login page
    header("Location: login.php");
    exit;
}

// Temporary sample student information
$student = [
    "name" => $_SESSION["student_name"] ?? "Student Name",
    "username" => $_SESSION["username"] ?? "student123",
    "email" => $_SESSION["student_email"] ?? "student@email.com",
    "student_id" => $_SESSION["student_id"] ?? "SL-2026-001"
];

$message = "";
$messageType = "";

// Temporary session-based permission requests
if (!isset($_SESSION["permission_requests"])) {
    $_SESSION["permission_requests"] = [];
}

// Handle permission request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["submit_request"])) {

        $requestedInfo = trim($_POST["requested_info"] ?? "");
        $reason = trim($_POST["reason"] ?? "");

        if ($requestedInfo === "" || $reason === "") {
            $message = "Please complete all fields in your request.";
            $messageType = "error";
        } else {

            $_SESSION["permission_requests"][] = [
                "requested_info" => htmlspecialchars($requestedInfo, ENT_QUOTES, "UTF-8"),
                "reason" => htmlspecialchars($reason, ENT_QUOTES, "UTF-8"),
                "status" => "Pending",
                "date" => date("M d, Y h:i A")
            ];

            $message = "Your permission request has been submitted!";
            $messageType = "success";
        }
    }
}

$requests = $_SESSION["permission_requests"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Account | SignLearn</title>

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

/* LOGOUT BUTTON */

.logout-form {
    margin-top: 12px;
}

.logout-button {
    width: 100%;
    display: block;
    padding: 13px;
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 9px;
    background: #343b60;
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
    padding: 35px;
}

.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.topbar h1 {
    font-size: 26px;
}

.topbar p {
    color: #85899d;
    font-size: 14px;
    margin-top: 7px;
}

.account-badge {
    background: #e7e4ff;
    color: #6658d9;
    padding: 10px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: bold;
}

/* PROFILE CARD */

.profile-card {
    background: linear-gradient(120deg, #6658d9, #8c7df0);
    padding: 30px;
    border-radius: 16px;
    color: white;
    display: flex;
    align-items: center;
    gap: 22px;
    margin-bottom: 25px;
}

.avatar {
    width: 85px;
    height: 85px;
    background: rgba(255,255,255,0.2);
    border: 2px solid rgba(255,255,255,0.5);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 35px;
}

.profile-details h2 {
    margin-bottom: 8px;
}

.profile-details p {
    color: #eeeaff;
    font-size: 14px;
    margin-top: 5px;
}

/* GRID */

.account-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
}

.card {
    background: white;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 3px 15px rgba(0,0,0,0.04);
}

.card h3 {
    font-size: 18px;
    margin-bottom: 8px;
}

.card-description {
    font-size: 13px;
    color: #85899d;
    line-height: 1.6;
    margin-bottom: 22px;
}

/* INFORMATION */

.info-group {
    margin-bottom: 18px;
}

.info-group label {
    display: block;
    font-size: 13px;
    color: #85899d;
    margin-bottom: 8px;
}

.info-value {
    background: #f5f5fa;
    border: 1px solid #e7e8f0;
    border-radius: 8px;
    padding: 13px;
    font-size: 14px;
    color: #252b48;
    overflow-wrap: anywhere;
}

.read-only {
    font-size: 11px;
    color: #8b85d8;
    margin-top: 6px;
}

/* INPUTS */

.form-group {
    margin-bottom: 17px;
}

.form-group label {
    display: block;
    font-size: 13px;
    font-weight: bold;
    margin-bottom: 8px;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 13px;
    border: 1px solid #e0e1eb;
    border-radius: 8px;
    outline: none;
    font-size: 14px;
    background: white;
    color: #252b48;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    border-color: #6658d9;
}

.form-group textarea {
    min-height: 100px;
    resize: vertical;
}

/* BUTTONS */

.btn {
    border: none;
    padding: 12px 18px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.2s;
}

.btn-primary {
    background: #6658d9;
    color: white;
}

.btn-primary:hover {
    background: #5547c2;
}

.btn-secondary {
    background: #eeeeF5;
    color: #252b48;
}

.btn-secondary:hover {
    background: #e2e1ec;
}

.btn-full {
    width: 100%;
}

/* REQUEST SECTION */

.request-section {
    margin-top: 22px;
}

.request-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
    gap: 10px;
}

.request-item {
    border: 1px solid #e7e8f0;
    padding: 17px;
    border-radius: 10px;
    margin-top: 12px;
}

.request-item h4 {
    font-size: 14px;
    margin-bottom: 8px;
}

.request-item p {
    color: #85899d;
    font-size: 13px;
    line-height: 1.6;
    overflow-wrap: anywhere;
}

.status {
    display: inline-block;
    padding: 6px 11px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: bold;
    margin-top: 10px;
}

.pending {
    color: #a66b00;
    background: #fff2d5;
}

.approved {
    color: #16764b;
    background: #e4f7ed;
}

.rejected {
    color: #bd3636;
    background: #ffe8e8;
}

.empty-state {
    text-align: center;
    padding: 25px;
    background: #f8f8fc;
    border-radius: 10px;
    color: #85899d;
    font-size: 13px;
    line-height: 1.7;
}

/* ALERT */

.alert {
    padding: 14px 17px;
    border-radius: 9px;
    margin-bottom: 20px;
    font-size: 14px;
}

.alert.success {
    background: #e5f8ed;
    color: #176b47;
}

.alert.error {
    background: #ffeaea;
    color: #a83232;
}

/* MODAL */

.modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(20, 23, 42, 0.65);
    z-index: 1000;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.modal-overlay.show {
    display: flex;
}

.modal {
    width: 100%;
    max-width: 500px;
    background: white;
    padding: 27px;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    max-height: 90vh;
    overflow-y: auto;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.modal-header h2 {
    font-size: 20px;
}

.close-modal {
    border: none;
    background: none;
    font-size: 25px;
    cursor: pointer;
    color: #85899d;
}

.modal-description {
    font-size: 13px;
    color: #85899d;
    line-height: 1.6;
    margin-bottom: 22px;
}

.modal-buttons {
    display: flex;
    gap: 10px;
    margin-top: 20px;
}

.modal-buttons button {
    flex: 1;
}

/* RESPONSIVE */

@media (max-width: 1000px) {

    .account-grid {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 650px) {

    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    .help-card {
        display: none;
    }

    .main {
        margin-left: 0;
        padding: 20px;
    }

    .topbar {
        align-items: flex-start;
        flex-direction: column;
        gap: 12px;
    }

    .profile-card {
        flex-direction: column;
        text-align: center;
    }

    .request-header {
        flex-direction: column;
        align-items: flex-start;
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

    <a href="assistant.php">💬 Learning Assistant</a>

    <a href="student-account.php" class="active">
        👤 Student Account
    </a>

    <div class="help-card">

        <strong>Need help?</strong>

        <p>
            Ask our Learning Assistant if you need help learning sign language.
        </p>

        <a href="assistant.php">Open assistant →</a>

    </div>

    <!-- LOGOUT BUTTON -->

    <form method="POST" class="logout-form"
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

    <div class="topbar">

        <div>
            <h1>Student Account</h1>
            <p>Manage your account and personal information.</p>
        </div>

        <div class="account-badge">
            ● Student Account
        </div>

    </div>

    <?php if ($message !== ""): ?>

        <div class="alert <?= htmlspecialchars($messageType) ?>">
            <?= htmlspecialchars($message) ?>
        </div>

    <?php endif; ?>

    <!-- PROFILE -->

    <section class="profile-card">

        <div class="avatar">👤</div>

        <div class="profile-details">

            <h2>
                <?= htmlspecialchars($student["name"]) ?>
            </h2>

            <p>
                Student ID:
                <?= htmlspecialchars($student["student_id"]) ?>
            </p>

            <p>Welcome to your SignLearn account!</p>

        </div>

    </section>

    <div class="account-grid">

        <!-- PERSONAL INFORMATION -->

        <section class="card">

            <h3>👤 Personal Information</h3>

            <p class="card-description">
                Your registered account information. These details are
                protected and cannot be changed directly by students.
            </p>

            <div class="info-group">

                <label>Full Name</label>

                <div class="info-value">
                    <?= htmlspecialchars($student["name"]) ?>
                </div>

                <div class="read-only">View only</div>

            </div>

            <div class="info-group">

                <label>Username</label>

                <div class="info-value">
                    <?= htmlspecialchars($student["username"]) ?>
                </div>

                <div class="read-only">View only</div>

            </div>

            <div class="info-group">

                <label>Email Address</label>

                <div class="info-value">
                    <?= htmlspecialchars($student["email"]) ?>
                </div>

                <div class="read-only">View only</div>

            </div>

            <div class="info-group">

                <label>Student ID</label>

                <div class="info-value">
                    <?= htmlspecialchars($student["student_id"]) ?>
                </div>

                <div class="read-only">View only</div>

            </div>

            <button type="button"
                    class="btn btn-primary btn-full"
                    onclick="openRequestModal()">

                Request Permission to Edit

            </button>

        </section>

        <!-- CHANGE PASSWORD -->

        <section class="card">

            <h3>🔒 Change Password</h3>

            <p class="card-description">
                Keep your account secure by using a strong password.
                Change your password whenever necessary.
            </p>

            <form method="POST"
                  action="#"
                  onsubmit="return passwordNotConnected(event)">

                <div class="form-group">

                    <label>Current Password</label>

                    <input type="password"
                           name="current_password"
                           placeholder="Enter current password"
                           required>

                </div>

                <div class="form-group">

                    <label>New Password</label>

                    <input type="password"
                           name="new_password"
                           id="newPassword"
                           placeholder="Enter new password"
                           minlength="8"
                           required>

                </div>

                <div class="form-group">

                    <label>Confirm New Password</label>

                    <input type="password"
                           name="confirm_password"
                           id="confirmPassword"
                           placeholder="Confirm new password"
                           minlength="8"
                           required>

                </div>

                <button type="submit"
                        class="btn btn-primary btn-full">

                    Update Password

                </button>

            </form>

            <p class="card-description"
               style="margin-top:15px;margin-bottom:0;">

                <strong>Security:</strong>
                Password updates will be connected to the student database
                and secure password verification.

            </p>

        </section>

    </div>

    <!-- PERMISSION REQUEST HISTORY -->

    <section class="card request-section">

        <div class="request-header">

            <div>

                <h3>📋 Permission Requests</h3>

                <p class="card-description"
                   style="margin:7px 0 0;">

                    Check the status of your personal information change requests.

                </p>

            </div>

            <button class="btn btn-primary"
                    type="button"
                    onclick="openRequestModal()">

                + New Request

            </button>

        </div>

        <?php if (count($requests) > 0): ?>

            <?php foreach (array_reverse($requests) as $request): ?>

                <div class="request-item">

                    <h4>
                        <?= $request["requested_info"] ?>
                    </h4>

                    <p>
                        Reason: <?= $request["reason"] ?>
                    </p>

                    <p style="margin-top:6px;">

                        Submitted:
                        <?= htmlspecialchars($request["date"]) ?>

                    </p>

                    <span class="status pending">
                        <?= htmlspecialchars($request["status"]) ?>
                    </span>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="empty-state">

                <div style="font-size:35px;margin-bottom:10px;">
                    📨
                </div>

                <strong>No permission requests yet</strong>

                <p>
                    Your submitted requests will appear here.
                    You can request permission whenever you need to update
                    your personal information.
                </p>

            </div>

        <?php endif; ?>

    </section>

</main>

<!-- PERMISSION REQUEST MODAL -->

<div class="modal-overlay" id="requestModal">

    <div class="modal">

        <div class="modal-header">

            <h2>Request Permission</h2>

            <button type="button"
                    class="close-modal"
                    onclick="closeRequestModal()">

                &times;

            </button>

        </div>

        <p class="modal-description">

            Before changing your personal information, you must first
            request permission from the administrator. Explain which
            information you want to update and why.

        </p>

        <form method="POST" action="student-account.php">

            <div class="form-group">

                <label>Information You Want to Change</label>

                <select name="requested_info" required>

                    <option value="">Select information</option>

                    <option value="Full Name">Full Name</option>

                    <option value="Email Address">Email Address</option>

                    <option value="Username">Username</option>

                    <option value="Other Information">Other Information</option>

                </select>

            </div>

            <div class="form-group">

                <label>Reason for Request</label>

                <textarea name="reason"
                          placeholder="Explain why you want to change your information..."
                          required></textarea>

            </div>

            <div class="modal-buttons">

                <button type="button"
                        class="btn btn-secondary"
                        onclick="closeRequestModal()">

                    Cancel

                </button>

                <button type="submit"
                        name="submit_request"
                        class="btn btn-primary">

                    Submit Request

                </button>

            </div>

        </form>

    </div>

</div>

<script>

// OPEN PERMISSION REQUEST MODAL

function openRequestModal() {

    document.getElementById("requestModal").classList.add("show");

}

// CLOSE PERMISSION REQUEST MODAL

function closeRequestModal() {

    document.getElementById("requestModal").classList.remove("show");

}

// CLOSE MODAL WHEN CLICKING OUTSIDE

document.getElementById("requestModal").addEventListener("click", function(event) {

    if (event.target === this) {
        closeRequestModal();
    }

});

// PASSWORD FORM PLACEHOLDER

function passwordNotConnected(event) {

    event.preventDefault();

    const newPassword =
        document.getElementById("newPassword").value;

    const confirmPassword =
        document.getElementById("confirmPassword").value;

    if (newPassword !== confirmPassword) {

        alert("Your new password and confirmation do not match.");

        return false;

    }

    alert(
        "Password changing is not connected to the database yet. " +
        "This feature will be activated after backend integration."
    );

    return false;

}

</script>

</body>
</html>
