<?php

if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($fname, $lname, $email, $pwd, $pwdrepeat) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();    
    }
    if (invalidEmail($email) !== false) {
        header("location: ../login.php?error=invalidemail");
        exit();    
    }
    if (pwdMatch($pwd, $pwdrepeat) !== false) {
        header("location: ../login.php?error=passwordsdontmatch");
        exit();
    }
    if(emailExists($conn, $email) !== false) {
        header("location: ../login.php?error=emailtaken");
        exit();
    }

    createUser($conn, $fname, $lname, $email, $pwd);

}
else {
    header("location: ../login.php");
    exit();
}