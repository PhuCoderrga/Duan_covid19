<?php
session_start();

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
    <?php
    require('./header.php');
    ?>
    <div class="content-wrapper" style="width: 82%; border: 1px solid;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="main-content" style="padding-left: 20px;">
                            <?php
                            $hoso = $_SESSION['TaiKhoan'];
                            $p->loadds_hoso("SELECT hosobenhan.MaHoSo, benhnhan.HoTen, benhnhan.DiaChi, benhnhan.NamSinh,
                            tinhtrangsuckhoe.TenTinhTrang, benhvien.TenBenhVien
                            FROM nhanvienytebenhvien
                            INNER JOIN benhvien ON nhanvienytebenhvien.MaBenhVien = benhvien.MaBenhVien
                            INNER JOIN hosobenhan ON benhvien.MaBenhVien = hosobenhan.MaBenhVien
                            INNER JOIN benhnhan ON hosobenhan.MaBenhNhan = benhnhan.MaBenhNhan
                            INNER JOIN tinhtrangsuckhoe ON tinhtrangsuckhoe.MaTinhTrang = hosobenhan.MaTinhTrang
                            WHERE nhanvienytebenhvien.MaBenhVien = hosobenhan.MaBenhVien
                            AND nhanvienytebenhvien.MaNV = '$hoso'");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    require('footer.php');

    ?>
</body>


</html>