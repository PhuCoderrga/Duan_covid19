<?php
include('./class/function.php');
$p = new quanlyhoso();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Ký</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" type="text/css" href="./css/dangky.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.js"></script>

</head>

<body>
    <div class="login-box">
        <h2>Đăng ký</h2>
        <form method="post" action="#">
            <div class="user-box">
                <input type="text" name="hoten" placeholder="Họ và Tên">
                <div id="ht">(*)</div>
            </div>
            <div class="user-box">
                <input type="text" name="sdt" placeholder="SĐT">
            </div>
            <div class="user-box">
                <input type="text" name="TaiKhoan" required="" placeholder="Email là username đăng nhập">
                <div id="em">(*)</div>
            </div>
            <div class="user-box">
                <input type="password" name="MatKhau" placeholder="Mật Khẩu">
                <div id="ps">(*)</div>
            </div>
            <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button class="" type="submit" id="btn_submit" name="btn_submit" value="Đăng ký">
                    <b>Đăng Ký</b>
                </button>
            </a>
            <a href="./login.php">
                <span></span>
                <b>Đăng Nhập</b>
            </a>
            <?php
      if (isset($_POST['btn_submit'])) {
        $id_PhanQuyen = 4;
        $hoten = $_POST["hoten"];
        $sdt = $_POST["sdt"];
        $ran_id = rand(time(), 100000000);
        $TrangThai = "Offline";
        $TaiKhoan = $_POST["TaiKhoan"];
        $MatKhau = $_POST["MatKhau"];
        $conn = mysqli_connect('localhost', 'root', '', 'duan_ptud') or die('Lỗi kết nối');
        mysqli_set_charset($conn, "utf8");
        $sql = "SELECT * FROM taikhoan WHERE TaiKhoan = '$TaiKhoan' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          echo 'Email đã được đăng ký tài khoản';
        } else {
          $sql = "INSERT INTO taikhoan (TaiKhoan, MatKhau, PhanQuyen, unique_id, TrangThai) VALUES ('$TaiKhoan','$MatKhau','$id_PhanQuyen','$ran_id','$TrangThai')";
          if (mysqli_query($conn, $sql)) {
            echo 'đăng ký thành công';
            $sql1 = "INSERT INTO benhnhan (MaBenhNhan, HoTen, SDT, CMND_CCCD,DiaChi,NamSinh) VALUES ('$TaiKhoan','$hoten','$sdt','','','')";
            if (mysqli_query($conn, $sql1)) {
              $sql2 = "INSERT INTO hosobenhan (MaBenhNhan,MaTinhTrang, MaPhuong,MaBenhVien) VALUES ('$TaiKhoan',3,'','')";
              if (mysqli_query($conn, $sql2)) {
              }
            }
          } else {
            echo 'Có lỗi trong quá trình xử lý';
          }
        }
      } else {
        echo 'Thiếu thông tin';
      }
      ?>
        </form>
    </div>
</body>

</html>