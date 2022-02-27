<?php

if (isset($_POST["submit"])) {
    session_start();
    $userid = $_SESSION["userid"];
    $deviceid = $_POST["deviceid"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputAddDevice($deviceid) !== false) {
        header("location: ../profile.php?error=emptyinput");
        exit();    
    }
    if(deviceExists($conn, $deviceid) !== false) {
        header("location: ../profile.php?error=emailtaken");
        exit();
    }

    addDevice($conn, $userid, $deviceid);
}
else {
    header("location: ../profile.php");
    exit();
}