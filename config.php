<?php

    define('DB_HOST', 'localhost'); // host
    define('DB_USER', 'root'); // username
    define('DB_PASSWORD', ''); // password
    define('DB_NAME', 'tms'); // database name

    //Connecting to database
    if($conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD)){

        //connecting to table
        if(!mysqli_select_db($conn, DB_NAME)){

            echo "Error in connecting to database - ".mysqli_error($conn); // error message if database not found

        }
    } else {

        echo "Error in connection - ".mysqli_error($conn); // error message if host is not connected

    }

    if(!defined('___ABS_PATH___')){
        $abs_path_query = "SELECT * FROM `system` WHERE `system`.`variable` = 'dir_home'";
        $abs_path_run_query = mysqli_query($conn, $abs_path_query);
        $abs_path_fetch = mysqli_fetch_assoc($abs_path_run_query);
        define('___ABS_PATH___', $abs_path_fetch['value']);
    }
