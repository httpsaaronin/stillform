
<?php
session_start();
require "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    $stmt = $pdo->prepare(
        "SELECT id, name, email, password FROM users WHERE email = ?"
    );

    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        session_regenerate_id(true);

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        $_SESSION["user_email"] = $user["email"];

        header("Location: index.php");
        exit;
    } else {
        $error = "Incorrect email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | STILLFORM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">

    <div class="auth-container">

        <a href="index.php" class="auth-logo">STILLFORM.</a>

        <p class="eyebrow">WELCOME BACK</p>

        <h1>Log in.</h1>

        <p class="auth-subtitle">
            Sign in to your STILLFORM account.
        </p>

        <?php if (isset($_GET["registered"])): ?>
            <p class="auth-success">
                Account created successfully. Please log in.
            </p>
        <?php endif; ?>

        <?php if ($error): ?>
            <p class="auth-error">
                <?php echo htmlspecialchars($error); ?>
            </p>
        <?php endif; ?>

        <form method="POST" class="auth-form">

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
                placeholder="Your password"
                required
            >

            <button type="submit" class="auth-button">
                LOG IN ↗
            </button>

        </form>

        <p class="auth-switch">
            Don't have an account?
            <a href="signup.php">Sign up</a>
        </p>

        <a href="index.php" class="auth-back">
            ← Back to collection
        </a>

    </div>

</body>
</html>
