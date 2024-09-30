<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo App Home</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="views/allUsers.php">All Users</a></li>
                <li><a href="views/login.php">Login</a></li>
                <li><a href="views/register.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <h1>Welcome to the Photo Sharing App</h1>
            <p>Share your memories, upload photos, and leave comments for friends.</p>
            <a href="views/register.php" class="btn">Get Started</a>
        </section>

        <section class="features">
            <h2>Features</h2>
            <div class="feature">
                <h3>Upload Photos</h3>
                <p>Share your favorite moments by uploading photos and sharing them with friends.</p>
            </div>
            <div class="feature">
                <h3>Comment on Photos</h3>
                <p>Leave comments and connect with others by sharing your thoughts on their photos.</p>
            </div>
            <div class="feature">
                <h3>Explore Users</h3>
                <p>Browse through all registered users and see their uploaded photos.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?= date('Y'); ?> Photo Sharing App</p>
    </footer>
</body>
</html>
