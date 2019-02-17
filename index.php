<?php
require_once("functions.php");

$connect = mysqli_connect("localhost", "root", "", "doingsdone_146479");
mysqli_set_charset($connect, "utf8");

$result = mysqli_query($connect, "SELECT name FROM projects WHERE user_id = 1");

if (!$result) {
    $error = mysqli_error($connect);
    print("Ошибка MySQL: ". $error);
};

$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

$result = mysqli_query($connect, "SELECT t.name AS t_name, execution_date, status, p.name AS p_name FROM tasks t
JOIN projects p
ON t.project_id = p.project_id WHERE t.user_id = 1");

if (!$result) {
    $error = mysqli_error($connect);
    print("Ошибка MySQL: ". $error);
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
