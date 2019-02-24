<?php
require_once("init.php");

$projects = [];
$tasks = [];

$result = mysqli_query($connect, "SELECT p.name AS p_name, (SELECT COUNT(*) FROM tasks WHERE project_id = p.project_id AND status = 0) AS p_count, p.project_id AS p_project_id FROM projects p
    LEFT JOIN tasks t ON t.project_id = p.project_id WHERE p.user_id = ".$user['user_id']." GROUP BY t.project_id");

if (!$result) {
    $error = mysqli_error($connect);
    print("Что-то пошло не так. Попробуйте еще раз.");
    exit();
};

$projects = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $result = mysqli_query($connect, "SELECT name, execution_date, status, project_id FROM tasks WHERE user_id = ".$user['user_id']." AND project_id = ".$id);
} else {
    $result = mysqli_query($connect, "SELECT name, execution_date, status, project_id FROM tasks WHERE user_id = ".$user['user_id']);
};

if (!$result) {
    $error = mysqli_error($connect);
    print("Что-то пошло не так. Попробуйте еще раз.");
    exit();
};

$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

$show_complete_tasks = rand(0, 1);

if ($tasks) {
    $content = include_template('index.php', [
        'show_complete_tasks' => $show_complete_tasks,
        'tasks' => $tasks,
    ]);
} else {
    $content = "По этому проекту нет задач";
}

$layout = include_template('layout.php', [
    'title' => $title,
    'user' => $user,
    'projects' => $projects,
    'content'=> $content,
    'tasks'=> $tasks
]);

print($layout);
?>
