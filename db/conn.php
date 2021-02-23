<?php

$host = 'localhost';
$db = 'attendance';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {

	$pdo = new PDO($dsn, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

	//echo '<h2 class="text-danger">Something went wrong, try again</h2>';
	throw new PDOException($e->getMessage());

}

require_once 'Crud.php';

$crud = new Crud($pdo);