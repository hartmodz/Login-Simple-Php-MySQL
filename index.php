<?php
session_start();
include 'db.php';
if (isset($_SESSION['user_logado'])) {
        header("Location: dashboard");
        exit();
}
if (empty($_SESSION['user_logado'])) {
	unset($_SESSION['user_logado']);
	header("Location: login");
}
?>
