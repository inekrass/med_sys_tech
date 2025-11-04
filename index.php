<?php
include 'db.php';

$sql = "SELECT * FROM tasks ORDER BY created_at DESC"; //Выводим список задач с самой поздней даты создания


$status = $_GET['status'] ?? ''; // " ?? '' " - необходим для того чтобы при первом открытии страницы выставлялся параметр ВСЕ
if ($status) {
    $sql = "SELECT * FROM tasks WHERE status='$status' ORDER BY created_at DESC";// выводим все задачи по выбранному статусу (с самой поздней даты создания)
} else {
    $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
}

$result = $conn->query($sql);//Отправляем запрос в базу данных

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тестовое задание</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            font-weight: bold;
            background-color: #f2f2f2;
        }
        .openFormBtn {
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1>Список задач</h1>

    <form method="GET">
        <select name="status" onchange="this.form.submit()">
            <option value="" <?php echo $status === '' ? 'selected' : '' ?>>Все</option>
            <option value="new" <?php echo $status === 'new' ? 'selected' : '' ?>>Новые</option>
            <option value="in_progress" <?php echo $status === 'in_progress' ? 'selected' : '' ?>>В процессе</option>
            <option value="done" <?php echo $status === 'done' ? 'selected' : '' ?>>Выполненные</option>
        </select>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя сотрудника</th>
            <th>Название задачи</th>
            <th>Статус</th>
            <th>Дата создания</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?> <!--метод котоый извлекает строку из результата запроса-->
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['employee_name'] ?></td>
            <td><?php echo $row['task_name'] ?></td>
            <td><?php echo $row['status'] ?></td>
            <td><?php echo $row['created_at'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    
    <button id="openFormBtn" class="openFormBtn">Добавить задачу</button>
    <div id="taskForm" style="display: none; margin-top: 10px;">
        <form action="add_task.php" method="POST">
            <input type="text" name="employee_name" placeholder="Имя сотрудника" required>
            <input type="text" name="task_name" placeholder="Название задачи" required>
            <button type="submit">Добавить</button>
            <button type="button" id="closeFormBtn">Отмена</button>
        </form>
    </div>
    
    <script>
        const openBtn = document.getElementById('openFormBtn');
        const closeBtn = document.getElementById('closeFormBtn');
        const taskForm = document.getElementById('taskForm');

        openBtn.addEventListener('click', () =>{
            taskForm.style.display = 'block';
            openBtn.style.display = 'none';
        });

        closeBtn.addEventListener('click', () =>{
            taskForm.style.display = 'none';
            openBtn.style.display = 'block';
        });
    </script>
    
</body>
</html>