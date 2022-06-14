<?php
class HOSO
{
    public function connect()
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "duan_ptud";
        $conn = mysqli_connect($hostname, $username, $password, $dbname);
        if (!$conn) {
            echo "Database connection error" . mysqli_connect_error();
            exit();
        } else {
            mysqli_select_db($conn, $dbname);
            mysqli_set_charset($conn, 'UTF8');
            return $conn;
        }
    }
    public function get_benhnhan($MaBenhNhan)
    {
        $sql = "select * from benhnhan where MaBenhNhan='" . $MaBenhNhan . "'";
        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);


        if ($i > 0) {
            $kq = mysqli_fetch_array($ketqua);
            return $kq;
        } else exit();
    }
    public function get_tinhtrang($MaTinhTrang)
    {
        $sql = "select * from tinhtrangsuckhoe where MaTinhTrang='" . $MaTinhTrang . "'";
        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);


        if ($i > 0) {
            $kq = mysqli_fetch_array($ketqua);
            return $kq;
        } else exit();
    }
    public function get_benhvien($MaBenhVien)
    {
        $sql = "select * from benhvien where MaBenhVien='" . $MaBenhVien . "'";
        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);


        if ($i > 0) {
            $kq = mysqli_fetch_array($ketqua);
            return $kq;
        } else exit();
    }
    public function get_tang($MaTang)
    {
        $sql = "select * from tang where MaTang='" . $MaTang . "'";

        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);


        if ($i > 0) {
            $kq = mysqli_fetch_array($ketqua);
            return $kq;
        } else exit();
    }
    public function luachon($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        $kq = '';
        if ($i > 0) {
            while ($row = mysqli_fetch_array($ketqua)) {
                $id = $row[0];
                $kq = $id;
            }
        }
        return $kq;
    }


    public function themxoasua($sql)
    {
        $link = $this->connect();
        if (mysqli_query($link, $sql)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function get_MaPhuong($outgoing_id)
    {

        $link = $this->connect();
        $sql = "SELECT hosobenhan.MaPhuong FROM hosobenhan
        INNER JOIN taikhoan ON taikhoan.TaiKhoan = hosobenhan.MaBenhNhan
        WHERE taikhoan.unique_id = {$outgoing_id}";
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysqli_fetch_array($ketqua)) {
                $MaPhuong = $row['MaPhuong'];
                session_start();
                $_SESSION['MaPhuong'] = $MaPhuong;
            }
        }
    }
}