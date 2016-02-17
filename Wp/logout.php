<?php
session_start();
	unset($_SESSION['username']);
	session_destroy();
session_unset();
$welcome="index.php";
header('Location: '.$welcome);
?>