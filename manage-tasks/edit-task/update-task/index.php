<?php

include_once "../../../config.php";
include_once "../../../secure.php";

$taskid = isset($_POST['taskid']) ? $_POST['taskid'] : "f";
$taskid = str_replace('#', '', $taskid);

$query = "SELECT * FROM `tasks` WHERE `tasks`.`taskid`=" . $taskid;
$run_query = mysqli_query($conn, $query);
$fetch = mysqli_fetch_assoc($run_query);

if ($fetch['userid'] != ___CURRENT_USER___) {
    header("location: ../../");
}

$title = isset($_POST['title']) ? $_POST['title'] : "f";
$description = isset($_POST['description']) ? $_POST['description'] : "f";
$task_date = isset($_POST['task_date']) ? $_POST['task_date'] : "f";
$task_time = isset($_POST['task_time']) ? $_POST['task_time'] : "f";
$is_completed = isset($_POST['is_completed']) ? $_POST['is_completed'] : "f";

if ($is_completed == "on") {
    $is_completed = 1;
} else {
    $is_completed = 0;
}

if ($title == "f" || $description == "f" || $task_date == "f" || $task_time == "f") {
    header("location: ../");
}

$userid = ___CURRENT_USER___;

$query2 = "UPDATE `tasks` SET `title` = '$title', `description` = '$description', `task_date` = '$task_date', `task_time` = '$task_time', `is_completed` = '$is_completed' WHERE `tasks`.`taskid` = $taskid;";
$run_query2 = mysqli_query($conn, $query2);

if ($run_query2 == 1) {
    header("location: ../../");
} else {
    echo "Unable to update the details. Contact Admin. <a href=\"../\">Go Back</a>";
}
