<?php

    include_once "../../config.php";
    include_once "../../secure.php";

    $title = isset($_POST['title']) ? $_POST['title'] : "f";
    $description = isset($_POST['description']) ? $_POST['description'] : "f";
    $task_date = isset($_POST['task_date']) ? $_POST['task_date'] : "f";
    $task_time = isset($_POST['task_time']) ? $_POST['task_time'] : "f";
    $is_completed = isset($_POST['is_completed']) ? $_POST['is_completed'] : "f";

    if($is_completed == "on"){
        $is_completed = 1;
    } else {
        $is_completed = 0;
    }

    if($title == "f" || $description == "f" || $task_date == "f" || $task_time == "f"){
        header("location: ../");
    }

    $query1 = "SELECT * FROM `system` WHERE `system`.`variable` = 'last_task_id';";
    $run_query1 = mysqli_query($conn, $query1);
    $fetch = mysqli_fetch_assoc($run_query1);
    $last_task_id = $fetch['value'];
    $new_task_id = $last_task_id + 1;

    $userid = $_SESSION['tms_userid'];

    $query2 = "INSERT INTO `tasks` (`taskid`, `userid`, `title`, `description`, `task_date`, `task_time`, `is_completed`) VALUES ('$new_task_id', '$userid', '$title', '$description', '$task_date', '$task_time', '$is_completed');";
    $run_query2 = mysqli_query($conn, $query2);

    if($run_query2 == 1){
        $query3 = "UPDATE `system` SET `value` = '$new_task_id' WHERE `system`.`variable` = 'last_task_id';"; 
        $run_query3 = mysqli_query($conn, $query3);
        if($run_query3 == 1){
            header("location: ../../");
        } else {
            echo "Unable to save complete details. Contact Admin <strong>urgently</strong>!. <a href=\"../\">Go Back</a>";
        }
    } else{
        echo "Unable to save the details. Contact Admin. <a href=\"../\">Go Back</a>";
    }
?>