<?php
require_once 'controllers/db.php';

$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);

if ($path === '/users' || $path === '/') {
    displayAllUsers($conn);
} 
elseif (preg_match('/^\/pics\/user\/(\d+)$/', $path, $matches)) {
    $user_id = $matches[1];
    header("Location: /pics/user.php?id=$user_id");
    exit();
} 
else {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}
function displayAllUsers($conn) {
    $query = "SELECT id, first_name, last_name FROM users";
    $result = $conn->query($query);
    $users = $result->fetch_all(MYSQLI_ASSOC);
    include 'pics/user.php';
}
?>
