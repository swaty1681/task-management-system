<?php
include_once "../config.php";
include_once "../secure.php";

$query = "SELECT * FROM `tasks` ORDER BY `tasks`.`slno` ASC";
$run_query = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Task</title>
    <link rel="shortcut icon" href="https://lyncdigit.com/wp-content/uploads/2021/11/logo-icon-png-300x300.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="https://lyncdigit.com/wp-content/uploads/2021/11/logo-icon-png-300x300.png">
    <link rel="stylesheet" href="<?=___ABS_PATH___?>styles/style001.css">
</head>

<body>

    <?php
    include_once "../assets/header.php";
    ?>

    <section>

        <?php
        include_once "../assets/sidebar.php";
        ?>


        <div class="tms-main-container">

            <h1>Add New Task</h1>
            <hr />

            <div class="task-posts-container">

                <form class="form-container" method="POST" action="./save-new-task/">

                    <div class="inputs-control">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" />
                    </div>

                    <div class="inputs-control">
                        <label for="details">Task Details</label>
                        <textarea id="details" name="description"></textarea>
                    </div>

                    <div class="inputs-control">
                        <label for="date">Task Date</label>
                        <input type="date" id="date" name="task_date" />
                    </div>

                    <div class="inputs-control">
                        <label for="time">Task Time</label>
                        <input type="time" id="time" name="task_time" />
                    </div>

                    <div class="inputs-control checkbox-control">
                        <input type="checkbox" id="time" name="is_completed" />
                        <label for="time">is Completed</label>
                    </div>

                    <div class="inputs-control">
                        <button>Save</button>
                    </div>
                </form>

            </div>





        </div>

    </section>

    <?php
    include_once "../assets/footer.php";
    ?>

</body>

</html>