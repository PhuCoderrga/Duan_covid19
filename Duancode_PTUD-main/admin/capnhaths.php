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
        <div class="col-md-4">
            <?php
        if (isset($_REQUEST['id'])) {
          $layid = $_REQUEST['id'];
        ?>
            <div id="hoso">
                <table>
                    <tr>
                        <td colspan="2">
                            <h2>Cập nhật trạng thái sức khỏe<h2>
                        </td>
                    </tr>
                    <?php
              $p->load_suahoso("SELECT benhnhan.MaBenhNhan, benhnhan.HoTen, benhnhan.CMND_CCCD, benhnhan.NamSinh, benhnhan.SDT, benhnhan.DiaChi FROM benhnhan INNER JOIN hosobenhan ON benhnhan.MaBenhNhan = hosobenhan.MaBenhNhan INNER JOIN tinhtrangsuckhoe ON hosobenhan.MaTinhTrang = tinhtrangsuckhoe.MaTinhTrang
        WHERE hosobenhan.MaHoSo = '$layid'");
              ?>
                    <tr>
                        <td class="row-1">Tình trạng sức khỏe:</td>
                        <td>
                            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <?php
                    $layid_trangthai = $p->laycot("SELECT tinhtrangsuckhoe.MaTinhTrang FROM benhnhan INNER JOIN hosobenhan ON benhnhan.MaBenhNhan = hosobenhan.MaBenhNhan INNER JOIN tinhtrangsuckhoe ON hosobenhan.MaTinhTrang = tinhtrangsuckhoe.MaTinhTrang
            WHERE hosobenhan.MaHoSo = '$layid' limit 1");
                    $p->loadcompo_trangthai("select MaTinhTrang , TenTinhTrang from tinhtrangsuckhoe order by MaTinhTrang asc", $layid_trangthai);
                    ?>
                                <label for="txtid"></label>
                                <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" class="row-1">
                            <button
                                style="background-color: #4CAF50; color: white; width: 100px; height: 50px; font-size: 20px ;line-height: 50px;"
                                name="nut" id="nut" value="Cập Nhập">Cập Nhập</button>
                        </td>
                    </tr>

                    </form>
                    <tr>
                        <td colspan="2" class="row-1">
                            <p style="text-align: center;">
                                <?php
                    switch ($_POST['nut']) {
                      case 'Cập Nhập': {
                          $id_tt = $_REQUEST['tt'];
                          $p->themxoasua("UPDATE`hosobenhan` SET `MaTinhTrang` = '$id_tt' where hosobenhan.MaHoSo= '$layid' LIMIT 1 ;");
                          echo "Cập Nhập Thành Công";
                        }
                        break;
                    }
                    ?>
                            </p>
                        </td>
                    </tr>
                    <?php

              ?>

                </table>
            </div>
            <?php
        } else {
          return 0;
        }
        ?>
        </div>
        <div class="col-md-3">
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