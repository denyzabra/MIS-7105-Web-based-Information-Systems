<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/validation.js"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="allUsers.php">All Users</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Register</h1>
        
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">Error: <?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <p style="color: green;"><?= htmlspecialchars($_GET['success']) ?></p>
        <?php endif; ?>

        <form method="post" action="../controllers/post_register.php">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" required><br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" required><br>

            <input type="submit" value="Register" class="btn">
        </form>
    </main>

    <footer>
        <p>&copy; <?= date('Y'); ?> Photo Sharing App</p>
    </footer>
</body>
</html>