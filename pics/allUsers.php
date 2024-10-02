<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h1>All Users</h1>
        <?php
        require '../controllers/db.php';
        $query = "SELECT id, first_name, last_name FROM users";
        $result = $conn->query($query);
        $users = $result->fetch_all(MYSQLI_ASSOC);
        $total_users = count($users);
        echo "<p>Total users: $total_users</p>";
        ?>

        <ul>
            <?php if ($total_users > 0): ?>
                <?php foreach ($users as $user): ?>
                    <li>
                        <a href="user.php?id=<?= htmlspecialchars($user['id']) ?>">
                            <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No users found.</li>
            <?php endif; ?>
        </ul>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
