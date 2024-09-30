<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/validation.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h1>Login</h1>
        
        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <p class="success"><?= htmlspecialchars($_GET['success']) ?></p>
        <?php endif; ?>

        <form method="post" action="../controllers/postLogin.php" onsubmit="return validateLoginForm()">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Login" class="btn">
        </form>

        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>