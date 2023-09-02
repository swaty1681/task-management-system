<?php
include_once "secure.php";
include_once "config.php";

$query = "SELECT * FROM `tasks` ORDER BY `tasks`.`slno` ASC";
$run_query = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="https://lyncdigit.com/wp-content/uploads/2021/11/logo-icon-png-300x300.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="https://lyncdigit.com/wp-content/uploads/2021/11/logo-icon-png-300x300.png">
    <link rel="stylesheet" href="<?=___ABS_PATH___?>styles/style001.css">
</head>

<body>

    <?php
    include_once "assets/header.php";
    ?>

    <section>

        <?php
        include_once "assets/sidebar.php";
        ?>


        <div class="tms-main-container">

            <h1>Dashboard</h1>
            <hr />

            <div class="task-posts-container">

                <?php
                if (mysqli_num_rows($run_query) > 0) {
                    while ($row = mysqli_fetch_assoc($run_query)) {
                        echo '
                        <div class="a-task-post-wrapper">
                            <div class="task-post-title">
                                <span class="bold">#'.$row['taskid'].'</span>
                                <span>'.$row['title'].'</span>
                                <span>by</span>
                                <span class="italic"><a href="./users/?userid='.$row['userid'].'">'.$row['userid'].'</a></span>
                            </div>
                            <hr />
                            <div class="task-post-description">
                                <p>
                                    '.$row['description'].'
                                </p>
                            </div>
                            <hr>
                            <div class="status">';

                            if($row['is_completed'] == 1){
                                echo '<div class="task-current-status">&#10003; Completed</div>';
                            } else {
                                echo '<div class="task-current-status">&#33; Pending</div>';
                            }

                            $task_time = $row['task_time'];
                            $task_time = date('h:i a', strtotime($task_time));
                            
                            echo '
                                
                                <div class="task_time">'.$task_time.'</div>
                                <div class="task_date">'.$row['task_date'].'</div>
                            </div>
                        </div>
                        ';
                    }
                } else {
                    echo 'Nothing to show!';
                }
                ?>

            </div>





        </div>

    </section>

    <?php
    include_once "assets/footer.php";
    ?>

</body>

</html>