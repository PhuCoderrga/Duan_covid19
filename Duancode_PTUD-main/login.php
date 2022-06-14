<?php
session_start();
if (isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau'])) {
  header('location:./index.php');
} else {
  include('./class/clslogin.php');
  $p = new login();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Nhập</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</head>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <form method="post">
            <div class="user-box">
                <input type="text" name="TaiKhoan" required="" placeholder="Username">
            </div>
            <div class="user-box">
                <input type="password" name="MatKhau" placeholder="Mật Khẩu">
            </div>
            <a href="#">
                <span></span>
                <button class="" type="submit" id="btn_submit" name="btn_submit" value="Đăng nhập">
                    <b>Đăng Nhập</b>
                </button>
            </a>
            <a href="./dangky.php">
                <span></span>
                <b>Đăng Ký</b>
            </a>
            <?php
      switch ($_POST['btn_submit']) {
        case 'Đăng nhập': {
            $TaiKhoan = $_POST["TaiKhoan"];
            $MatKhau = $_POST["MatKhau"];
            $PhanQuyen = 4;
            if ($p->mylogin($TaiKhoan, $MatKhau, $PhanQuyen) == 1) {
              header('location:./index.php');
            } else {
              echo '<p style="color: while;" >Đăng Nhập Không Thành Công</p>';
            }
            break;
          }
      }
      ?>
        </form>
    </div>
</body>

</html>