<?php
session_start();
include_once 'cls_hosocanhan.php';
$p = new HOSO();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Khai báo F0</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../boostrap/fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/kiemtra.js"></script>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">

</head>

<body>
    <div>
        <header class="row form-group" style="margin-left: 0px;margin-bottom: 0px;margin-right: 0px;">
            <div class="col-md-6" id="logo">
                <img src="../hinh/logo.png">
            </div>
            <div class="col-md-2" id="call-telephone">
                <span><i class="fa fa-phone-square" aria-hidden="true"></i></span>&ensp;
                <span><a href="tel:800 123 456"><b>800 123 456</b></a></span>
            </div>
            <div class="col-md-2" id="email">
                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>&ensp;
                <span class="iconcont"><a data-scroll href="#"><b>healthylife@gmail.com</b></a></span>
            </div>
            <div class="col-md-2" id="time">
                <?php if (isset($_SESSION['TaiKhoan'])) { ?>
                <span><a data-scroll href="../logout.php"><i class="fa fa-user-circle"
                            aria-hidden="true"></i></a></span>&ensp;
                <?php } else { ?>
                <span><a data-scroll href="../login.php"><i class="fa fa-user-circle"
                            aria-hidden="true"></i></a></span>&ensp;
                <?php } ?>
            </div>
        </header>
        <nav class="menu">
            <ul>
                <li><a href="../index.php"><i class="fas fa-home"></i>&ensp; <b>Trang Chủ</b></a></li>
                <li><a href="../hoso.php"><i class="fa fa-address-book" aria-hidden="true"></i></i>&ensp; <b>Hồ
                            sơ</b></a>
                </li>
                <li><a href=""><i class="fa fa-file" aria-hidden="true"></i>&ensp; <b>Khai báo F0</b></a>
                </li>
                <li><a href="./TuVan.php"><i class="fa fa-envelope-open" aria-hidden="true"></i>&ensp; <b>Tư Vấn</b></a>
                </li>
                <li><a href="./TinTuc.php"><i class="far fa-newspaper">&ensp;</i><b>Tin Tức</b></a></li>
                <li><a href="GuiYeuCauDT.php"><i class="fas fa-stethoscope">&ensp;</i><b>Gửi yêu cầu</b></a></li>
            </ul>
        </nav>
        <section style="width: 100%; height: auto;">
            <div class="container" id="news">
                <div class="heading">
                    <div class="text-center"><img src="../hinh/icon-logo.png" alt="#"></div>
                    <h2>Thông tin khai báo</h2>
                </div>
                <div class="container-fluid border border-info" style="background-color: aliceblue;">
                    <?php
                    $p->LOAD_TT("SELECT * FROM benhnhan WHERE MaBenhNhan = '{$_SESSION['TaiKhoan']}'");
                    ?>
                </div>
            </div>
            <?php
            switch ($_POST['khaibao']) {
                case 'khaibao': {
                        //Lấy giá trị POST từ form vừa submit
                        $hoten = $_POST['txtHoten'];
                        $namsinh = $_POST['txtNamsinh'];
                        $cccd = $_POST['txtCccd'];
                        $gioitinh = $_POST['gioitinh'];
                        $quocgia = $_POST['txtQuocgia'];
                        $tinhthanh = $_POST['txtTinhthanh'];
                        $quanhuyen = $_POST['txtQuanhuyen'];
                        $phuongxa = $_POST['txtPhuongxa'];
                        $diachi = $_POST['txtDiachi'];
                        $sdt = $_POST['txtSdt'];
                        $email = $_POST['txtEmail'];
                        $nguonlay = $_POST['nguonlay'];
                        $ngay = $_POST['ngay'];
                        $testnhanh = $_POST['txttestnhanh'];
                        $testpcr = $_POST['txtTest1'];
                        $mota = $_POST['mota'];
                        $radio1 = $_POST['radio1'];
                        $radio2 = $_POST['radio2'];
                        $radio3 = $_POST['radio3'];
                        if ($hoten != '' || $diachi != '') {
                            if ($p->themxoasua("UPDATE benhnhan SET `HoTen`  = '$hoten', `NamSinh` = '$namsinh',`CMND_CCCD` = '$cccd',`GioiTinh` = '$gioitinh', `QuocGia` = '$quocgia', `TinhThanh` = '$tinhthanh', `QuanHuyen` = '$quanhuyen', `PhuongXa` = '  $phuongxa',`DiaChi` = '$diachi', `SDT` = '$sdt',  `Email` = '$email',`NguonLay` = '$nguonlay',`TestNhanh` = '$testnhanh', `TestPcr` = '$testpcr', `Mota` = '$mota', `LuaChon1` = '$radio1', `LuaChon2` = '$radio2', `LuaChon3` = '$radio3'
                            WHERE MaBenhNhan = '{$_SESSION['TaiKhoan']}'") == 1) {
                                echo '<script> alert("Thanh cong"); </script>';
                            } else {
                                echo '<script> alert("Khong Thanh cong"); </script>';
                            }
                        } else {
                            echo '<script> alert("nhap du thong tin"); </script>';
                        }
                    }
            }
            ?>
            <div class="footer2 mt-3">
                <div class="container">
                    <div class="row form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="footer-text">
                                <p>© 2022 healthylife@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-1"><a href="#"><img src="../hinh/facebook.png"></a></div>
                        <div class="col-md-1"><a href="#"><img src="../hinh/tt.png"></a></div>
                        <div class="col-md-1"><a href="#"><img src="../hinh/instagram.png"></a></div>
                        <div class="col-md-1"><a href="#"><img src="../hinh/youtobe.png"></a></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>


</html>