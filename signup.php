
<?php
session_start();
require "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($name === "" || $email === "" || $password === "") {
        $error = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters.";
    } else {
        $check = $pdo->prepare(
            "SELECT id FROM users WHERE email = ?"
        );
        $check->execute([$email]);

        if ($check->fetch()) {
            $error = "An account with this email already exists.";
        } else {
            $hashedPassword = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $stmt = $pdo->prepare(
                "INSERT INTO users (name, email, password)
                 VALUES (?, ?, ?)"
            );

            $stmt->execute([
                $name,
                $email,
                $hashedPassword
            ]);

            header("Location: login.php?registered=1");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | STILLFORM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">

    <div class="auth-container">

        <a href="index.php" class="auth-logo">STILLFORM.</a>

        <p class="eyebrow">JOIN STILLFORM</p>

        <h1>Create account.</h1>

        <p class="auth-subtitle">
            Create your account for a more personal experience.
        </p>

        <?php if ($error): ?>
            <p class="auth-error">
                <?php echo htmlspecialchars($error); ?>
            </p>
        <?php endif; ?>

        <form method="POST" class="auth-form">

            <label for="name">Full Name</label>
            <input
                type="text"
                id="name"
                name="name"
                placeholder="Your name"
                required
            >

            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="you@example.com"
                required
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Minimum 8 characters"
                minlength="8"
                required
            >

            <button type="submit" class="auth-button">
                CREATE ACCOUNT ↗
            </button>

        </form>

        <p class="auth-switch">
            Already have an account?
            <a href="login.php">Log in</a>
        </p>

        <a href="index.php" class="auth-back">
            ← Back to collection
        </a>

    </div>

</body>
</html>
