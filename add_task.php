<?php
include 'db.php';

$employee_name = $_POST['employee_name'];//Достаем данные из массива POST
$task_name = $_POST['task_name'];

$sql = "INSERT INTO tasks (employee_name, task_name) VALUES ('$employee_name', '$task_name')";// Добавляем задачу и имя в БД
$conn->query($sql);

header("Location: index.php");//
exit; // Для возвращения обратно на index. Если не сделать, есть риск, что при обновлении страницы будет повторная отправка формы
?>
