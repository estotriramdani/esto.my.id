<?php 

session_start();
session_unset();
session_destroy();

session_start();
$_SESSION['message'] = '';
$_SESSION['role'] = '';
$_SESSION['username'] = '';

header("Location: login.php");
exit;

?>