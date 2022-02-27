<?php

if (isset($_POST["submit"])) {
    session_start();
    $userid = $_SESSION["userid"];
    $quantity = $_POST["quantity"];
    $address = $_POST["address"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputBuy($quantity, $address) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();    
    }

    createOrder($conn, $userid, $quantity, $address);
}
else {
    header("location: ../login.php");
    exit();
}