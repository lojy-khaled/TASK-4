<?php

$host = 'localhost';
$pass = '';
$username = 'root';
$db = 'task 4';

try {
	$pdo = new PDO("mysql:host=$host;dbname=$db", $username, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    echo $err->getMessage();
}

?>