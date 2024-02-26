<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php'; 

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Invalid email format.";
    } else {
        try {
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $errorMessage = "Email already taken.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $insertStmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
                if ($insertStmt->execute([$firstName, $lastName, $email, $hashedPassword])) {

                    $userId = $conn->lastInsertId();


                    $_SESSION['user_id'] = $userId;


                    header("Location: home.php");
                    exit();
                } else {
                    $errorMessage = "Registration failed.";
                }
            }
        } catch (PDOException $e) {
            $errorMessage = "Database error: " . $e->getMessage();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="content">
        <h2>Sign Up</h2>
            <div class="register_content">
            <?php if (!empty($errorMessage)) echo "<p style='color:red;'>$errorMessage</p>"; ?>
                <form method="POST" action="register.php">
                    <label for="first_name">First Name:</label><br>
                    <input type="text" id="first_name" name="first_name" required><br>

                    <label for="last_name">Last Name:</label><br>
                    <input type="text" id="last_name" name="last_name" required><br>

                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br>

                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br><br>

                    <input type="submit" value="Register">
                </form>
                <button class="signin_btn"> already have an account? <a href="signin.php">Sign in</a></button>
        </div>
    </div>

</body>
</html>
