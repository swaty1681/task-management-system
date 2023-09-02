<?php

    session_start();

    if (isset($_SESSION['tms_userid'])) {
        //if session not exists, force to login
        header("location: ../");
    }

    include_once "../../config.php";

    $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $query = 'SELECT * FROM `users` WHERE `userid` = "'.$userid.'"';
    $run_query = mysqli_query($conn, $query);

    if(mysqli_num_rows($run_query) <= 0){
        echo 'Incorrect User Credentials! <a href="../">Try again</a>';
        die();
    }

    $fetch = mysqli_fetch_assoc($run_query);

    if($password == $fetch['password']){
        $query1 = 'UPDATE `users` SET `no_of_logins` = '.(intval($fetch['no_of_logins'])+1).' WHERE `users`.`userid` = "'.$userid.'";';
        $run_query1 = mysqli_query($conn, $query1);
        $_SESSION['tms_userid'] = $userid;
        header("location: ../../");
    } else {
        echo 'Incorrect User Credentials! <a href="../">Try again</a>';
    }

?>