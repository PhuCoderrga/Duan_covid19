<?php
session_start();
include_once "config.php";

$outgoing_id = $_SESSION['unique_id'];
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

$sql = "SELECT * FROM taikhoan
INNER JOIN benhnhan
ON taikhoan.TaiKhoan = benhnhan.MaBenhNhan
WHERE NOT unique_id = {$outgoing_id} AND (HoTen LIKE '%{$searchTerm}%') ";
$output = "";
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) > 0) {
    include_once "data.php";
} else {
    $output .= 'Không tìm thấy bệnh nhân';
}
echo $output;