<?php

function emptyInputSignup($fname, $lname, $email, $pwd, $pwdrepeat) {
    $result;
    if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    }
    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat) {
    $result;
    if ($pwd !== $pwdrepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $email, $pwd) {
    $sql = "INSERT INTO users (usersFname, usersLname, usersEmail, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($conn ,$email, $pwd){
    $uidExists = emailExists($conn, $email);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useremail"] = $uidExists["usersEmail"];
        header("location: ../index.php");
        exit();
    }
}

function emptyInputBuy($quantity, $address) {
    $result;
    if (empty($quantity) || empty($address)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function createOrder($conn, $userid, $quantity, $address) {
    $sql = "INSERT INTO orders (usersId, ordersQuantity, ordersAddress) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $userid, $quantity, $address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../index.php");
    exit();
}
function emptyInputAddDevice($deviceid) {
    $result;
    if (empty($deviceid)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}
function deviceExists($conn, $deviceid) {
    $sql = "SELECT * FROM devices WHERE devicesId = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailedexit");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $deviceid);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
function addDevice($conn, $userid, $deviceid) {
    $sql1 = "INSERT INTO devices (usersId, devicesId) VALUES (?, ?);";
    $stmt1 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt1, "ii", $userid, $deviceid);
    mysqli_stmt_execute($stmt1);
    mysqli_stmt_close($stmt1);
    header("location: ../profile.php?error=none");
    exit();
}