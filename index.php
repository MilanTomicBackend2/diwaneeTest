<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Back Office</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

        <div class="header">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="list.php">List All Users</a></li>
                <li><a href="index.php?logout='1'" >Logout</a></li>
            </ul>

        </div>
        <div class="content">
            <!-- notification message -->
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success" >
                    <h3>
                        <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>
            <nav></nav>
            <!-- logged in user information -->
            <?php if (isset($_SESSION['username'])) : ?>
                <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>

            <?php endif ?>
        </div>

    </body>
</html>