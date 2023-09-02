<?php
include_once "../../config.php";
include_once "../../secure.php";

$edit_task_id = isset($_GET['taskid'])?$_GET['taskid']:die('No task id found. <a href="../">Go Back</a>');

$query = "SELECT * FROM `tasks` WHERE `tasks`.`taskid`=".$edit_task_id;
$run_query = mysqli_query($conn, $query);
$fetch = mysqli_fetch_assoc($run_query);

if($fetch['userid'] != ___CURRENT_USER___){
    header("location: ../");
}

$checked = ($fetch['is_completed'] == 1) ? "checked" : '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="shortcut icon" href="https://lyncdigit.com/wp-content/uploads/2021/11/logo-icon-png-300x300.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="https://lyncdigit.com/wp-content/uploads/2021/11/logo-icon-png-300x300.png">
    <link rel="stylesheet" href="<?=___ABS_PATH___?>styles/style001.css">
</head>

<body>

    <?php
    include_once "../../assets/header.php";
    ?>

    <section>

        <?php
        include_once "../../assets/sidebar.php";
        ?>


        <div class="tms-main-container">

            <h1>Add New Task</h1>
            <hr />

            <div class="task-posts-container">

                <form class="form-container" method="POST" action="./update-task/">

                    <div class="inputs-control">
                        <label for="title">Task Id</label>
                        <input type="text" id="title" name="taskid" value="<?="#".$fetch['taskid']?>" readonly />
                        
                    </div>

                    <div class="inputs-control">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="<?=$fetch['title']?>"/>
                    </div>

                    <div class="inputs-control">
                        <label for="details">Task Details</label>
                        <textarea id="details" name="description"><?=$fetch['description']?></textarea>
                    </div>

                    <div class="inputs-control">
                        <label for="date">Task Date</label>
                        <input type="date" id="date" name="task_date" value="<?=$fetch['task_date']?>" />
                    </div>

                    <div class="inputs-control">
                        <label for="time">Task Time</label>
                        <input type="time" id="time" name="task_time" value="<?=$fetch['task_time']?>" />
                    </div>

                    <div class="inputs-control checkbox-control">
                        <input type="checkbox" id="time" name="is_completed" <?=$checked?> />
                        <label for="time">is Completed</label>
                    </div>

                    <div class="inputs-control">
                        <button>Update</button>
                    </div>
                </form>

            </div>





        </div>

    </section>

    <?php
    include_once "../../assets/footer.php";
    ?>

</body>

</html>
