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
    ?>
    <div class="content-wrapper" style="width: 82%; border: 1px solid;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="main-content" style="padding-left: 20px;">
                            <?php
                            $p->loadds_tang("select * from tang order by MaTang asc");
                            ?>
                            <div style="margin-top: 20px;">
                                <a href="./Insert_tang.php" style=" text-align: center; font-weight: bold; font-size: 25px; color:white;    background-color: #4CAF50;padding: 10px 20px;
    color: white;
                        border: 2px black solid; ">THÊM TẦNG MỚI MỚI</a>
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