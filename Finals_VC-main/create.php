<?php
$conn = mysqli_connect("localhost", "root", "", "users");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = "";
$success = "";

if (isset($_POST["register"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Please fill in all fields.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        // Check if username or email already exists in register_accounts
        $check_sql = "SELECT * FROM register_accounts WHERE username = '$username' OR email = '$email' LIMIT 1";
        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            $error = "Username or Email is already taken.";
        } else {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert into register_accounts table
            $sql = "INSERT INTO register_accounts (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            
            if (mysqli_query($conn, $sql)) {
                header("Location: index.php?success=registered");
                exit();
            } else {
                $error = "Error: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #2c1611, #1a0f0d);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ffffff;
        }
        .container {
            background: rgba(30, 20, 15, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 420px;
            padding: 30px;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            box-sizing: border-box;
        }
        h2 { margin-bottom: 5px; font-size: 28px; }
        p.subtitle { color: #b0a8a4; font-size: 14px; margin-bottom: 25px; }
        label { display: block; font-size: 13px; color: #d0c8c4; margin-bottom: 8px; font-weight: 600; }
        .input-group { position: relative; margin-bottom: 20px; }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            background: rgba(45, 35, 30, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            color: #fff;
            font-size: 14px;
            box-sizing: border-box;
            outline: none;
            transition: 0.3s;
        }
        input:focus { border-color: #ff8c37; }
        .terms { display: flex; align-items: center; font-size: 13px; color: #b0a8a4; margin-bottom: 25px; }
        .terms input { margin-right: 10px; accent-color: #ff8c37; }
        .terms a { color: #ff8c37; text-decoration: none; }
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #ffa247, #ff7b1a);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-submit:hover { opacity: 0.9; }
        .footer-text { text-align: center; margin-top: 20px; font-size: 14px; color: #b0a8a4; }
        .footer-text a { color: #ff8c37; text-decoration: none; font-weight: bold; }
        .alert-error { background: rgba(255, 68, 68, 0.2); border: 1px solid #ff4444; color: #ff8c8c; padding: 10px; border-radius: 8px; font-size: 13px; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Account</h2>
    <p class="subtitle">Sign up to continue</p>

    <?php if(!empty($error)) { echo "<div class='alert-error'>$error</div>"; } ?>

    <form action="" method="POST">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="Enter username" required>
        </div>

        <div class="input-group">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter email address" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Create password" required>
        </div>

        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Re-enter password" required>
        </div>

        <div class="terms">
            <input type="checkbox" required id="terms">
            <label for="terms" style="margin-bottom:0; display:inline; color:#b0a8a4;">I agree with <a href="#">Privacy Policy</a></label>
        </div>

        <button type="submit" name="register" class="btn-submit">Sign Up</button>
    </form>

    <div class="footer-text">
        Already have an account? <a href="index.php">Log in</a>
    </div>
</div>

</body>
</html>