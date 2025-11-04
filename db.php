<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "test_task";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Отсанавливает скрипт и выводит ошибку
} // Необходим для проверки соединения с БД
?>