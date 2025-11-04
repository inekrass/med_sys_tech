# Тестовое задание (PHP + MySQL (+ JS + HTML))

## Как запустить проект

1. Установить **XAMPP**.  
2. Скопировать папку проекта в каталог: `C:\xampp\htdocs\`
3. Запустить XAMPP и включить модули:
- **Apache**
- **MySQL**
4. Открыть phpMyAdmin: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
5. Создать БД **test_task** с кодировкой `utf8mb4_general_ci`:
  - Импортировать БД (которую я предварительно пришлю)
  - Выполнить SQL-запрос к БД:
    ```sql
    CREATE TABLE `test_task`.`tasks` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `employee_name` VARCHAR(255) NOT NULL,
    `task_name` VARCHAR(255) NOT NULL,
    `status` ENUM('new','in_progress','done') NOT NULL DEFAULT 'new',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;

## Что реализовано
- Подключение к БД
- Вывод таблицы с задачами из БД
- Фильтрация по статусу задачи (`Все`, `Новые`, `В процессе`,`Выполненные`)
- Сортировка задач по дате (от новой к старой)
- Добавление задачи через форму
- Появление формы добавления задачи, реализованное с помощью JS
- Автоматическое обновление таблицы после добавления задачи

## Сколько времени ушло
**5-6 часов** вместе с изучением документации PHP и работы в XAMPP

## Что нового узнал
- Работа с админкой `phpMyAdmin`
- Итеграция БД в PHP (в том числе и фильтрация данных с сервера)
- Методы `$_GET`, `$_POST` в PHP
- Защита от повторной отправки формы с помощью
  ```php
  header("Location: index.php");
  exit;
