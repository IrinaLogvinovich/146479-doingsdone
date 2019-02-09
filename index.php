<?php

require_once("functions.php");

$show_complete_tasks = rand(0, 1);

$projects = ["Входящие", "Учеба", "Работа", "Домашние дела", "Авто"];

$tasks = [
    0 => [
        "name"           => "Собеседование в IT компании",
        "execution_date" => "11.02.2019",
        "category"       => "Работа",
        "is_done"        => "Нет"
    ],
    1 => [
        "name"           => "Выполнить тестовое задание",
        "execution_date" => "25.12.2018",
        "category"       => "Работа",
        "is_done"        => "Нет"
    ],
    2 => [
        "name"           => "Сделать задание первого раздела",
        "execution_date" => "21.12.2019",
        "category"       => "Учеба",
        "is_done"        => "Да"
    ],
    3 => [
        "name"           => "Встреча с другом",
        "execution_date" => "22.12.2019",
        "category"       => "Входящие",
        "is_done"        => "Нет"
    ],
    4 => [
        "name"           => "Купить корм для кота",
        "execution_date" => "Нет",
        "category"       => "Домашние дела",
        "is_done"        => "Нет"
    ],
    5 => [
        "name"           => "Заказать пиццу",
        "execution_date" => "Нет",
        "category"       => "Домашние дела",
        "is_done"        => "Нет"
    ]
];

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

