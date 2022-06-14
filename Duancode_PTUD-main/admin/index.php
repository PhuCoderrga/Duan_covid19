<?php
session_start();
include_once "./class/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && isset($_SESSION['PhanQuyen'])) {

	include("./class/clslogin.php");

	$q = new login();
	$q->confirmlogin($_SESSION['id'], $_SESSION['TaiKhoan'], $_SESSION['MatKhau'], $_SESSION['PhanQuyen']);
	if (($_SESSION['PhanQuyen'] == 1)) {

		require('header.php');

		require('pages/home.php');

		require('footer.php');
	} elseif (($_SESSION['PhanQuyen'] == 2)) {
		$sql = mysqli_query($conn, "SELECT *
		FROM nhanvienytebenhvien INNER JOIN taikhoan
		ON nhanvienytebenhvien.MaNV = taikhoan.TaiKhoan
		WHERE nhanvienytebenhvien.MaNV = taikhoan.TaiKhoan 
		AND taikhoan.unique_id = {$_SESSION['unique_id']}");
		if (mysqli_num_rows($sql) > 0) {
			$row = mysqli_fetch_assoc($sql);
			if (empty($row['HoTen']) || empty($row['SDT']) || empty($row['DiaChi']) || empty($row['Hinh'])) {
				header('location: Update_ThongTin.php');
			} else {
				require('header.php');
				require('pages/home.php');
				require('footer.php');
			}
		}
	} elseif (($_SESSION['PhanQuyen'] == 3)) {
		$sql = mysqli_query($conn, "SELECT *
		FROM nhanvienytephuong INNER JOIN taikhoan
		ON nhanvienytephuong.MaNV = taikhoan.TaiKhoan
		WHERE nhanvienytephuong.MaNV = taikhoan.TaiKhoan 
		AND taikhoan.unique_id = {$_SESSION['unique_id']}");
		if (mysqli_num_rows($sql) > 0) {
			$row = mysqli_fetch_assoc($sql);
			if (empty($row['HoTen']) || empty($row['SDT']) || empty($row['DiaChi']) || empty($row['Hinh'])) {
				header('location: Update_ThongTin.php');
			} else {
				require('header.php');
				require('pages/home.php');
				require('footer.php');
			}
		}
	} else {
		header('location: ERROR.php');
	}
} else {
	header('location:Login_admin.php');
}