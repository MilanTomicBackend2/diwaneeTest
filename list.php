
<?php

session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

$conn = mysqli_connect('localhost', 'root', '', 'diwanee');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
    <head>        
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="content">
            <?php
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Order number: " . $row["id"] . " - Name: " . $row["username"] . "<br>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            ?>
            <button onclick="history.go(-1);">Back </button>
        </div>


    </body>
</html>