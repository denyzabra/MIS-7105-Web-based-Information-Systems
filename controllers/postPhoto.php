<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../views/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $uploadDir = '../images/';

    if (!empty($_FILES['photo']['name'])) {
        $fileName = basename($_FILES['photo']['name']);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {
                $query = "INSERT INTO photos (user_id, file_name) VALUES (?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("is", $user_id, $fileName);

                if ($stmt->execute()) {
                    header("Location: ../views/userPhotos.php?id=$user_id");
                    exit();
                } else {
                    $error = "Failed to add photo to database.";
                }
            } else {
                $error = "Failed to upload photo.";
            }
        } else {
            $error = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
    } else {
        $error = "Please select a photo to upload.";
    }

    if (isset($error)) {
        header("Location: ../views/photoUpload.php?error=" . urlencode($error));
        exit();
    }
}

?>