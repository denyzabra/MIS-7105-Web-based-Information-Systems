<?php
session_start();
session_destroy();
header("Location: ../pics/login.php");
exit();
?>