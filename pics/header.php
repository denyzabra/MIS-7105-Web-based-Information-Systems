<?php
session_start();
?>
<header>
    <nav>
        <ul>
            <li><a href="allUsers.php">All Users</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="user.php?id=<?= $_SESSION['user_id'] ?>">My Photos</a></li>
                <li>Hi <?= htmlspecialchars($_SESSION['first_name']) ?>! <a href="../controllers/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>