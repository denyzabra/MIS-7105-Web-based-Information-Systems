<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Photos</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <?php
        require '../controllers/db.php';
        $user_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $user_query = "SELECT first_name, last_name FROM users WHERE id = ?";
        $user_stmt = $conn->prepare($user_query);
        $user_stmt->bind_param("i", $user_id);
        $user_stmt->execute();
        $user = $user_stmt->get_result()->fetch_assoc();
        ?>

        <h1>Photos by <?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></h1>

        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $user_id): ?>
            <a href="photo.php" class="btn">Upload New Photo</a>
        <?php endif; ?>

        <?php
        $query = "SELECT * FROM photos WHERE user_id = ? ORDER BY created_at DESC";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0):
            while ($photo = $result->fetch_assoc()):
        ?>
            <div class="photo-container">
                <img src="../images/<?= htmlspecialchars($photo['file_name']) ?>" alt="User photo" width="200px">
                <p>Uploaded on: <?= htmlspecialchars($photo['created_at']) ?></p>

                <h3>Comments:</h3>
                <?php
                $comments_query = "SELECT c.text, c.created_at, u.first_name, u.last_name, u.id as user_id
                                   FROM comments c
                                   JOIN users u ON c.user_id = u.id
                                   WHERE photo_id = ?
                                   ORDER BY c.created_at DESC";
                $comments_stmt = $conn->prepare($comments_query);
                $comments_stmt->bind_param("i", $photo['id']);
                $comments_stmt->execute();
                $comments = $comments_stmt->get_result();

                while ($comment = $comments->fetch_assoc()):
                ?>
                    <div class="comment">
                        <p><?= htmlspecialchars($comment['text']) ?></p>
                        <p>By <a href="user.php?id=<?= htmlspecialchars($comment['user_id']) ?>"><?= htmlspecialchars($comment['first_name'] . ' ' . $comment['last_name']) ?></a></p>
                        <p>On <?= htmlspecialchars($comment['created_at']) ?></p>
                    </div>
                <?php endwhile; ?>

                <a href="comment.php?id=<?= htmlspecialchars($photo['id']) ?>" class="btn">Add Comment</a>
            </div>
        <?php
            endwhile;
        else:
        ?>
            <p>No photos found for this user.</p>
        <?php
        endif;
        ?>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>