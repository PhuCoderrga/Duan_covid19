<?php
session_start();
ob_start();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Trung tâm tiếp nhận điều trị covid-19</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</head>
</head>

<body>
    <div>
        <header class="row form-group" style="margin-left: 0px;margin-bottom: 0px;margin-right: 0px;">
            <div class="col-md-6" id="logo">
                <img src="./hinh/logo.png">
            </div>
            <div class="col-md-2" id="call-telephone">
                <span><i class="fa fa-phone-square" aria-hidden="true"></i></span>&ensp;
                <span><a href="tel:800 123 456"><b>800 123 4567</b></a></span>
            </div>
            <div class="col-md-2" id="email">
                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>&ensp;
                <span class="iconcont"><a data-scroll href="#"><b>healthylife@gmail.com</b></a></span>
            </div>
            <div class="col-md-2" id="time">
                <?php if (isset($_SESSION['TaiKhoan'])) { ?>
                <span><a data-scroll href="logout.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Đăng
                        Xuất</a></span>&ensp;
                <?php } else { ?>
                <span><a data-scroll href="login.php"><i class="fa fa-user-circle" aria-hidden="true"></i> Đăng
                        Nhập</a></span>&ensp;
                <?php } ?>
            </div>
        </header>
        <?php
        if (isset($_SESSION['TaiKhoan'])) {
            echo '
                <nav class="menu">
                <ul>
                    <li><a href="./index.php"><i class="fas fa-home"></i>&ensp; <b>Trang Chủ</b></a></li>
                    <li><a href="hoso.php"><i class="fa fa-address-book" aria-hidden="true"></i></i>&ensp; <b>Hồ
                                sơ</b></a>
                    </li>
                    <li><a href="./php/Khaibao.php"><i class="fa fa-file" aria-hidden="true"></i>&ensp; <b>Khai báo F0</b></a>
                    </li>
                    <li><a href="users.php"><i class="fa fa-envelope-open" aria-hidden="true"></i>&ensp; <b>Tư Vấn</b></a></li>
                    <li><a href=""><i class="far fa-newspaper">&ensp;</i><b>Tin Tức</b></a></li>
                    <li><a href="./php/GuiYeuCauDT.php"><i class="fas fa-stethoscope">&ensp;</i><b>Gửi yêu cầu</b></a></li>
                </ul>
                </nav>
              ';
        } else {
            echo '
                <nav class="menu">
                <ul>
                    <li><a href="./index.php"><i class="fas fa-home"></i>&ensp; <b>Trang Chủ</b></a></li>
                    <li><a href="login.php"><i class="fa fa-address-book" aria-hidden="true"></i></i>&ensp; <b>Hồ
                                sơ</b></a>
                    </li>
                    <li><a href="login.php"><i class="fa fa-file" aria-hidden="true"></i>&ensp; <b>Khai báo F0</b></a>
                    </li>
                    <li><a href="login.php"><i class="fa fa-envelope-open" aria-hidden="true"></i>&ensp; <b>Tư Vấn</b></a></li>
                    <li><a href="login.php"><i class="far fa-newspaper">&ensp;</i><b>Tin Tức</b></a></li>
                </nav> ';
        }
        ?>
    </div>
</body>

</html>