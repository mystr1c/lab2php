<?php


$host = 'localhost';
$db = 'register_bd';
$user = 'root';
$pass = 'root';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
} catch (PDOException $e) {
    echo 'Ощибка соединения с БД'.$e->getMessage();
}