<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Comment</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/validation.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h1>Add Comment</h1>
        
        <?php
        require '../controllers/db.php';
        $photo_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM photos WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $photo_id);
        $stmt->execute();
        $photo = $stmt->get_result()->fetch_assoc();
        ?>

        <img src="../images/<?= htmlspecialchars($photo['file_name']) ?>" alt="Photo" width="200px">

        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <form method="post" action="../controllers/postComment.php?id=<?= $photo_id ?>" onsubmit="return validateCommentForm()">
            <label for="text">Comment:</label>
            <textarea name="text" id="text" required></textarea>

            <input type="submit" value="Submit Comment" class="btn">
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>