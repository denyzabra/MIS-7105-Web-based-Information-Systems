<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/validation.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h1>Upload New Photo</h1>

        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <form method="post" action="../controllers/postPhoto.php" enctype="multipart/form-data" onsubmit="return validatePhotoForm()">
            <label for="photo">Choose a photo:</label>
            <input type="file" name="photo" id="photo" required accept="image/*">

            <input type="submit" value="Upload" class="btn">
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>