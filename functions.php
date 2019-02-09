<?php

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';

    if (!is_readable($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

function get_number_of_tasks ($name, $tasks) {
    $count = 0;
    foreach ($tasks as $key => $value) {
        if ($value["category"] === $name and $value["is_done"] === "Нет") {
            $count++;
        }
    }
    return $count;
};

function check_time ($execution_date) {
    if ($execution_date === "Нет") {
        return false;
    };
    $task_date = strtotime($execution_date);
    $now = strtotime("now");
    $date_diff = $task_date - $now;
    $hour_diff = floor($date_diff/3600);
    if ($hour_diff > 24) {
        return false;
    } else {
        return true;
    }
}
?>
