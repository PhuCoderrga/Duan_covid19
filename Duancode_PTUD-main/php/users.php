<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$MaPhuong = $_SESSION['MaPhuong'];
$sql = "
SELECT *
FROM taikhoan
INNER JOIN nhanvienytephuong ON nhanvienytephuong.MaNV = taikhoan.TaiKhoan
WHERE NOT taikhoan.unique_id = {$outgoing_id}
AND nhanvienytephuong.MaNV = taikhoan.TaiKhoan
AND nhanvienytephuong.MaPhuong = {$MaPhuong}
ORDER BY id DESC";
$query = mysqli_query($conn, $sql);
$output = "";
if (mysqli_num_rows($query) == 0) {
    $output .= "Không có bệnh nhân";
} elseif (mysqli_num_rows($query) > 0) {
    include_once "data.php";
}
echo $output;