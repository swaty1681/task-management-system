<?php
include_once "../config.php";
include_once "../secure.php";

$current_user = ___CURRENT_USER___;

$query = "SELECT * FROM `tasks` WHERE `tasks`.`userid` = '$current_user' ORDER BY `tasks`.`created_on` ASC";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= ___ABS_PATH___ ?>styles/style001.css">
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

            <h1>Manage my Tasks</h1>
            <hr />

            <div class="task-posts-container">

                <table>
                    <tr>
                        <th>Task Id</th>
                        <th>Ttile</th>
                        <th>Description</th>
                        <th>Task Date</th>
                        <th>Task Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($run_query) > 0) {
                        while ($row = mysqli_fetch_assoc($run_query)) {
                            echo '<tr>';
                            echo '<td>' . $row['taskid'] . '</td>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td>' . $row['task_date'] . '</td>';
                            echo '<td>' . $row['task_time'] . '</td>';
                            if($row['is_completed'] == 1){
                                echo '<td>Completed</td>';
                            } else {
                                echo '<td>Pending</td>';
                            }
                            echo '
                                <td>
                                    <div class="actions-column">
                                        <a href="./edit-task?taskid=' . $row['taskid'] . '"><i class="fa fa-pencil-square edit-square" aria-hidden="true"></i></a>
                                        <a href="./delete-task?taskid=' . $row['taskid'] . '"><i class="fa fa-minus-circle remove-circle" aria-hidden="true"></i></a>
                                    </div>
                                </td>
                            ';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">No tasks found to manage!</td></tr>';
                    }
                    ?>
                </table>

            </div>





        </div>

    </section>

    <?php
    include_once "../assets/footer.php";
    ?>

</body>

</html>