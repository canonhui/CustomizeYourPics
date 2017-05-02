<?php

$bdd = "mydb";
$user = "root";
$mdp = "";

$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', $user, $mdp);

try {
	$dns = 'mysql:host=localhost;dbname=mydb';
	$options = array (
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
	);
	$db = new PDO($dns, 'root', '');
	//echo 'Connect to Database successfully! <br/>';
} catch(Exception $e) {
	echo 'Failed to Connect to Database! <br>', $e -> getMessage();
	die();
}


?>