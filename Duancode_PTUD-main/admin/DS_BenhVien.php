<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && $_SESSION['PhanQuyen'] != 1) {
    header('location:./ERROR.php');
}
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<TItle>QUẢN LÝ BỆNH VIỆN</TItle>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <style>
    table tr:hover {
        background-color: #FF6;
    }
    </style>
</head>

<body>
    <?php
    require('header.php');
    ?>
    <?php


    switch ($_POST['nut']) {
        case 'Xóa': {
                $idxoa = $_POST['id_product'];
                if ($idxoa > 0) {
                    if ($p->themxoasua("delete from sanpham where id='" . $idxoa . "' limit 1 ") == 1) {
                        header('location:dssp.php');
                    } else {
                        echo 'Xóa không thành công';
                    }
                } else {
                    echo 'Vui lòng chọn danh mục cần xóa';
                }
                break;
            }

        case 'Sửa': {
                $idsua = $_REQUEST['id'];
                if ($idsua > 0) {
                    header('location:suasp.php?id=' . $idsua . '');
                } else {
                    echo 'Không Thành Công';
                }
                break;
            }

        case 'Thêm Sản Phẩm': {
                header('location:themsp.php');
                break;
            }
    }
    ?>
    <div class="content-wrapper" style="width: 82%; border: 1px solid;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="main-content" style="padding-left: 20px;">
                            <?php
                            $p->loadds_benhvien("select * from benhvien order by MaBenhVien desc");
                            ?>
                            <div style="margin-top: 20px;">
                                <a href="./Insert_benhvien.php" style=" text-align: center; font-weight: bold; font-size: 25px; color:white;    background-color: #4CAF50;padding: 10px 20px;
    color: white;
                        border: 2px black solid; ">THÊM BỆNH VIỆN MỚI</a>
                            </div>
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