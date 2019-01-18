<?php
	session_start();

	//Destruindo a sessão
	unset($_SESSION['banco']);
	header("Location: index.php");
	exit;
?>