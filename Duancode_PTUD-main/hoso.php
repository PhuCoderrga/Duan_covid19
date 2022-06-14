<!DOCTYPE html>
<html>

<head>
    <title>Trung tâm tiếp nhận điều trị covid-19</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" type="text/css" href="./css/hoso.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</head>
</head>

<body>
    <?php
    include("./class/function.php");
    $p = new quanlyhoso();
    session_start();
    if (isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau'])) {

        include("./class/clslogin.php");
        $q = new login();
        $q->confirmlogin($_SESSION['TaiKhoan'], $_SESSION['MatKhau']);

        require('header.php');
        $mabn = $_SESSION['TaiKhoan'];
    ?>
    <div id="hoso">
        <h2>HỒ SƠ CÁ NHÂN<h2>
                <div class="row form-group">
                    <div class="col-md-4"></div>
                    <div class="col-md-5">
                        <?php
                            $p->loadhoso("SELECT benhnhan.MaBenhNhan, benhnhan.HoTen, benhnhan.CMND_CCCD, benhnhan.NamSinh, benhnhan.SDT, benhnhan.DiaChi, tinhtrangsuckhoe.TenTinhTrang FROM benhnhan INNER JOIN hosobenhan ON benhnhan.MaBenhNhan = hosobenhan.MaBenhNhan INNER JOIN tinhtrangsuckhoe ON hosobenhan.MaTinhTrang = tinhtrangsuckhoe.MaTinhTrang
        WHERE benhnhan.MaBenhNhan = '$mabn'");
                            ?>
                    </div>
                    <div class="col-md-3"></div>
                </div>
    </div>
    <?php
        require('footer.php');
    } else {
        header('location:./login.php');
    }
    ?>
</body>

</html>