<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $photo_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $user_id = $_SESSION['user_id'];
    $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);

    if (empty($text)) {
        header("Location: ../views/commentForm.php?id=$photo_id&error=Comment cannot be empty");
        exit();
    }

    $query = "INSERT INTO comments (photo_id, user_id, text) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iis", $photo_id, $user_id, $text);

    if ($stmt->execute()) {
        header("Location: ../views/userPhotos.php?id=" . $_SESSION['user_id']);
        exit();
    } else {
        header("Location: ../views/commentForm.php?id=$photo_id&error=Failed to add comment");
        exit();
    }
}
?>