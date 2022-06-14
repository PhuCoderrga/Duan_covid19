<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "class/config.php";
    $status = "Offline";
    echo $status;
    $sql = mysqli_query($conn, "SELECT * FROM taikhoan WHERE unique_id = {$_SESSION['unique_id']}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    }
    $sql = mysqli_query($conn, "UPDATE taikhoan SET TrangThai = '{$status}' WHERE unique_id={$row['unique_id']}");
    if ($sql) {
        session_unset();
        session_destroy();
        header("location: index.php");
    }
} else {
    header("location:index.php");
}