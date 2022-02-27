<?php
    require_once 'dbh.inc.php';

if(isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
    $sql1 = "SELECT * FROM users WHERE usersId = ?;";
    $stmt1 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt1, "s", $userid);
    mysqli_stmt_execute($stmt1);

    $resultData = mysqli_stmt_get_result($stmt1);
    $row = mysqli_fetch_assoc($resultData);
    $userFname = $row["usersFname"];
    $userLname = $row["usersLname"];
    $userEmail = $row["usersEmail"];

    //Orders Section
    $sql2 = "SELECT * FROM orders WHERE usersId = ?;";
    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt2, "s", $userid);
    mysqli_stmt_execute($stmt2);
    $data = mysqli_stmt_get_result($stmt2);
    $total = mysqli_num_rows($data);

    //Devices Section
    $sql3 = "SELECT * FROM devices WHERE usersId = ?;";
    $stmt3 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt3, $sql3)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt3, "s", $userid);
    mysqli_stmt_execute($stmt3);
    $datadevices = mysqli_stmt_get_result($stmt3);
    $totaldevices = mysqli_num_rows($datadevices);
}
else {
    header("location: ../login.php");
    exit();
}