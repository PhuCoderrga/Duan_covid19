<?php
$_SESSION['TaiKhoan'];
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
                            $p->loadds_SLdieutri("SELECT benhvien.MaBenhVien, benhvien.TenBenhVien, benhvien.SoGiuongBenh, COUNT( benhvien.TenBenhVien ) AS 'Tong so'
                            FROM hosobenhan
                            INNER JOIN benhvien ON benhvien.MaBenhVien = hosobenhan.MaBenhVien
                            INNER JOIN tinhtrangsuckhoe ON tinhtrangsuckhoe.MaTinhTrang = hosobenhan.MaTinhTrang
                            WHERE benhvien.MaBenhVien = hosobenhan.MaBenhVien
                            AND hosobenhan.MaTinhTrang = 1
                            GROUP BY benhvien.TenBenhVien");
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