<?php

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && $_SESSION['PhanQuyen'] == 3) {

    include("./class/clslogin.php");
    $q = new login();
    $q->confirmlogin($_SESSION['id'], $_SESSION['TaiKhoan'], $_SESSION['MatKhau'], $_SESSION['PhanQuyen']);

    require('header.php');
    include('./class/function.php');
    $p = new quanly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dsdm.css">
</head>

<body>
    <div class="row form-group">
        <div class="col-md-9"> </div>
        <div class="col-md-3">
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3" method="get">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="text" name="search" placeholder="Tìm kiếm"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button type="submit" name="submit" value="Tìm Kiếm" class="btn btn-primary">Tìm Kiếm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-3">
        </div>
        <div class="col-md-9">
            <table id="benhvien">
                <tr>
                    <th>STT</th>
                    <th>Mã Hồ sơ</th>
                    <th>Tên bệnh nhân</th>
                    <th>Địa chỉ</th>
                    <th>Năm sinh</th>
                    <th>Tình trạng</th>
                    <th>Chức Năng</th>
                </tr>
                <tr>
                    <?php
                        $hoso = $_SESSION['TaiKhoan'];
                        if (isset($_GET['submit'])) {
                            switch ($_GET['submit']) {
                                case 'Tìm Kiếm': {
                                        if ($_GET["search"] != '') {
                                            $search = $_GET['search'];
                                            $p->load_dshoso("SELECT hosobenhan.MaHoSo, benhnhan.HoTen, benhnhan.DiaChi, benhnhan.NamSinh, tinhtrangsuckhoe.TenTinhTrang
                                            FROM nhanvienytephuong
                                            INNER JOIN phuong ON nhanvienytephuong.MaPhuong = phuong.MaPhuong
                                            INNER JOIN hosobenhan ON phuong.MaPhuong = hosobenhan.MaPhuong
                                            INNER JOIN benhnhan ON hosobenhan.MaBenhNhan = benhnhan.MaBenhNhan
                                            INNER JOIN tinhtrangsuckhoe ON tinhtrangsuckhoe.MaTinhTrang = hosobenhan.MaTinhTrang
                                            WHERE nhanvienytephuong.MaPhuong = hosobenhan.MaPhuong
                                            AND nhanvienytephuong.MaNV = '$hoso' AND  benhnhan.HoTen like '%$search%'");
                                        } else {
                                            echo 'Vui lòng nhập tên bệnh nhân';
                                        }
                                    }
                            }
                        } else {
                            $p->load_dshoso(" SELECT hosobenhan.MaHoSo, benhnhan.HoTen, benhnhan.DiaChi, benhnhan.NamSinh, tinhtrangsuckhoe.TenTinhTrang
                    FROM nhanvienytephuong
                    INNER JOIN phuong ON nhanvienytephuong.MaPhuong = phuong.MaPhuong
                    INNER JOIN hosobenhan ON phuong.MaPhuong = hosobenhan.MaPhuong
                    INNER JOIN benhnhan ON hosobenhan.MaBenhNhan = benhnhan.MaBenhNhan
                    INNER JOIN tinhtrangsuckhoe ON tinhtrangsuckhoe.MaTinhTrang = hosobenhan.MaTinhTrang
                    WHERE nhanvienytephuong.MaPhuong = hosobenhan.MaPhuong
                    AND nhanvienytephuong.MaNV = '$hoso'");
                        }
                        ?>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>

<?php
    require('footer.php');
} else {
    header('location:./Login_admin.php');
}
?>