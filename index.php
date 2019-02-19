<?php
require_once("init.php");

$projects = [];
$tasks = [];

$result = mysqli_query($connect, "SELECT p.name AS p_name, COUNT(t.project_id) AS p_count FROM projects p
    LEFT JOIN tasks t ON t.project_id = p.project_id WHERE p.user_id = 1 GROUP BY t.project_id");

if (!$result) {
    $error = mysqli_error($connect);
    print("Что-то пошло не так. Попробуйте еще раз.");
    exit();
};

$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

$result = mysqli_query($connect, "SELECT name, execution_date, status FROM tasks WHERE user_id = 1");

if (!$result) {
    $error = mysqli_error($connect);
    print("Что-то пошло не так. Попробуйте еще раз.");
    exit();
};

$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

$show_complete_tasks = rand(0, 1);

$title = "Дела в порядке";

$username = "Константин";

$content = include_template('index.php', [
    'show_complete_tasks' => $show_complete_tasks,
    'tasks' => $tasks,
]);

$layout = include_template('layout.php', [
    'title' => $title,
    'username' => $username,
    'projects' => $projects,
    'content'=> $content,
    'tasks'=>$tasks
]);

print($layout);
?>
