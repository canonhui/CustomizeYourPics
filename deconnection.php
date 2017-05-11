<?php

	session_start();
	include 'config.php';

	unset($_SESSION['connected']);
	unset($_SESSION['pseudo']);
	unset($_SESSION['idUser']);
//	session_destroy();
	header('location:index.php');
   //header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location); //marche peut etre autre qu'en localhost
?>