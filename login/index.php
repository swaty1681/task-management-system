<?php

session_start();

if (isset($_SESSION['tms_userid'])) {
    //if session not exists, force to login
    header("location: ../");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/style001.css">
</head>

<body>
    <?php

    include_once "../assets/header.php";

    ?>

    <section>

        <div class="login-section">
            <form action="./login-auth/" method="POST">
                <h1>Login</h1>
                <input type="text" placeholder="User Id" name="userid">
                <input type="password" placeholder="Password" name="password">
                <input type="submit">
            </form>
        </div>

    </section>

    <?php

    include_once "../assets/footer.php";

    ?>
</body>

</html>