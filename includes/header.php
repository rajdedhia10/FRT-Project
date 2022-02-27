<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&family=Raleway:wght@400;500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
        <title>AutoLeaf</title>
    </head>
    <body>
        <nav>
            <div class="logo">
                <h1>AutoLeaf</h1>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="about.php">About Us</a>
                </li>
                <?php
                        if (isset($_SESSION["userid"])) {
                            echo "<li><a href='profile.php'>Profile</a?</li>";
                            echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
                        }
                        else {
                            echo "<li><a href='login.php'>Login</a></li>";
                        }
                    ?>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>