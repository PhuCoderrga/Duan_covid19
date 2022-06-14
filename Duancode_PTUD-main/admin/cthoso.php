<?php

$layid = 0;
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && $_SESSION['PhanQuyen'] == 3) {

  include("./class/clslogin.php");
  $q = new login();
  $q->confirmlogin($_SESSION['id'], $_SESSION['TaiKhoan'], $_SESSION['MatKhau'], $_SESSION['PhanQuyen']);

  require('header.php');
  include("class/function.php");
  $p = new quanly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
    <style>
    #hoso {
        width: 100%;
        height: 600px;
    }

    table {
        width: 100%;
        font-size: 20px;

    }

    table tr .row-1 {
        width: 300px;

    }

    table tr td {
        height: 60px;
        line-height: 60px;

    }

    h2 {
        font-weight: bold;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="row form-group">
        <div class="col-md-5"> </div>
        <div class="col-md-5">
            <?php
        if (isset($_REQUEST['id'])) {
          $layid = $_REQUEST['id'];
        ?>
            <div id="hoso">
                <table>
                    <tr>
                        <td colspan="2">
                            <h2>Thông tin chi tiết hồ sơ bệnh nhân<h2>
                        </td>
                    </tr>
                    <?php
              $p->load_cthoso("SELECT benhnhan.MaBenhNhan, benhnhan.HoTen, benhnhan.CMND_CCCD, benhnhan.NamSinh, benhnhan.SDT, benhnhan.DiaChi,tinhtrangsuckhoe.TenTinhTrang FROM benhnhan INNER JOIN hosobenhan ON benhnhan.MaBenhNhan = hosobenhan.MaBenhNhan INNER JOIN tinhtrangsuckhoe ON hosobenhan.MaTinhTrang = tinhtrangsuckhoe.MaTinhTrang
        WHERE hosobenhan.	MaHoSo = '$layid'");
              ?>
                    </tr>
                    <form action="" method="post" name="form1" id="form1">
                        <tr>
                            <td colspan="2" align="center" class="row-1">
                                <button class="btn btn-primary" name="nut"><a href="./dshoso.php"
                                        style=" color: white;">Hủy</a></button>
                            </td>
                        </tr>

                    </form>
                </table>
            </div>
            <?php
        } else {
          return 0;
        }
        ?>
        </div>
        <div class="col-md-2">
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