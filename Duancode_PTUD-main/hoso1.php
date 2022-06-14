<?php

session_start();
if (isset($_SESSION['TaiKhoan'])) {
    $MaBenhNhan = $_SESSION['TaiKhoan'];
}
?>
<?php
$timezone = "Asia/Colombo";
date_default_timezone_set($timezone);
$today = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <?php
    require("./header.php");
    ?>
    <?php
    //ket noi
    include('class/cls_hosocanhan.php');
    $p = new HOSO();
    $benhnhan = $p->get_benhnhan($_SESSION['TaiKhoan']);
    $tinhtrang = $p->get_tinhtrang($benhnhan['MaTinhTrang']);
    $tang = $p->get_tang($benhnhan['MaTang']);
    $benhvien = $p->get_benhvien($benhnhan['MaBenhVien']);

    ?>
    <!-- start slider section -->

    <div id="about" class="about top_layer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pppp">
                    <div class="about_box">
                        <div class="about_box_text">
                            <div class="title">


                                <p>&nbsp;</p>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div>
            <form action="" method="post" style="padding-left: 500px; padding-bottom:-110px">



                <table width="464" align="center" class="tableStyle">
                    <tr>
                        <th colspan="2" align="center" valign="middle" scope="col">
                            <h1 align="center"><strong>Thông tin hồ sơ cá nhân</strong></h1>
                        </th>
                    </tr>
                    <tr>
                    </tr><br>
                    <tr height="30px">
                        <td width="173"><strong>Mã bệnh nhân</strong></td>
                        <td width="271" align="left">
                            <div align=""><strong>
                                    <input type="text" name="txtma" id="txtma" class="col-sm-12"
                                        value="<?php echo $benhnhan['MaBenhNhan']; ?>" disabled>
                                    <input type="hidden" name="MaBenhNhan" id="MaBenhNhan" class="col-sm-12"
                                        value="<?php echo $benhnhan['MaBenhNhan']; ?>">
                                </strong></div>
                        </td>
                    </tr>

                    <tr height="50px">

                        <td><strong>Tên bệnh nhân</strong></td>
                        <td align="left">
                            <div><strong>
                                    <input type="text" name="txtten" id="txtten" class="col-sm-12"
                                        value="<?php echo $benhnhan['HoTen']; ?>">
                                </strong></div>
                        </td>
                    </tr>
                    <tr height="30px">
                        <td>
                            <div align=""><strong>Ngày sinh</strong></div>
                        </td>
                        <td align="left">
                            <div><strong>
                                    <input type="text" name="txtngaysinh" id="txtngaysinh" class="col-sm-12"
                                        value="<?php echo $benhnhan['NamSinh']; ?>">
                                </strong></div>
                        </td>
                    </tr>
                    <tr height="50px">
                        <td valign=""><strong>Địa chỉ</strong></td>
                        <td align="left"><strong>
                                <input type="text" name="txtdiachi" id="txtdiachi" class="col-sm-12"
                                    value="<?php echo $benhnhan['DiaChi']; ?>">
                            </strong></td>
                    </tr>
                    <tr height="50px">
                        <td valign="">
                            <div align=""><strong>Số Điện Thoại</strong></div>
                        </td>
                        <td align="left">
                            <div align=""> <strong>
                                    <input type="text" name="SDT" id="SDT" class="col-sm-12"
                                        value="<?php echo $benhnhan['SDT']; ?>">
                                </strong></div>
                        </td>
                    </tr>
                    <tr height="50px">
                        <td valign="">
                            <div align=""><strong>Số CMND</strong></div>
                        </td>
                        <td align="left">
                            <div align=""> <strong>
                                    <input type="text" name="CMND" id="CMND" class="col-sm-12"
                                        value="<?php echo $benhnhan['CMND_CCCD']; ?>">
                                </strong></div>
                        </td>
                    </tr>
                    <tr height="50px">
                        <td valign="">
                            <div align=""><strong>Tình trạng</strong></div>
                        </td>
                        <td align="left">
                            <strong><input type="text" name="tinhtrang" id="tinhtrang" class="col-sm-12"
                                    value="<?php echo $tinhtrang['TenTinhTrang']; ?> " disabled></strong>
        </div>
        </td>
        </tr>
        <tr height="50px">
            <td>
                <div align=""><strong>Tầng đang điều trị</strong></div>
            </td>
            <td align="left">
                <div align=""> <strong>
                        <input type="text" name="txttdtt" id="txtddt" class="col-sm-12"
                            value="<?php echo $tang['TenTang']; ?>" disabled>
                    </strong></div>
            </td>
        </tr>
        <tr height="50px">
            <td valign=""><strong>Bệnh viện đang điều trị</strong></td>
            <td align="left"> <strong>
                    <input type="text" name="txtbvdtt" id="txtbvyc" class="col-sm-12"
                        value="<?php echo $benhvien['TenBenhVien']; ?>" disabled>
                </strong></td>
        </tr>


        <tr>
            <td colspan="2" align="center">
                <div align="center">
                    <strong>
                        <input type="submit" name="them" id="them" value="Sửa"
                            style="background-color:#73BE55; color:white;" />
                        <input type="submit" name="them" id="them" value="Hủy"
                            style="background-color:#990000;color:white;">

                    </strong>
                </div>
                <div align="center"></div>
            </td>
        </tr>
        </table>
        </form>

    </div>
    <div align="center">
        <?php
        switch ($_POST['them']) {
            case 'Sửa':
                $MaBenhNhan = $_REQUEST['MaBenhNhan'];
                $TenBenhNhan = $_REQUEST['txtten'];
                $NgaySinh = $_REQUEST['txtngaysinh'];
                $DiaChi = $_REQUEST['txtdiachi'];
                $SDT = $_REQUEST['SDT'];
                $SoCMND = $_REQUEST['CMND'];
                if (!$MaBenhNhan || !$TenBenhNhan || !$SoCMND || !$SDT ||  !$NgaySinh) {
                    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                //Kiểm tra cmnd có đúng định dạng hay không
                if (!eregi("^[0-9]{9}$", $SoCMND)) {
                    echo "CMND này không hợp lệ. Vui lòng nhập CMND khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }

                //Kiểm tra sdt
                if (!eregi("^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$", $SDT)) {
                    echo "SDT này không hợp lệ. Vui lòng nhập đúng SDT. <a href='javascript: history.go(-1)'>Trở lại</a>";
                    exit;
                }
                if ($p->themxoasua("UPDATE benhnhan set HoTen='" . ucwords($TenBenhNhan) . "', NamSinh='$NgaySinh', DiaChi='$DiaChi', SDT='$SDT', CMND_CCCD='$SoCMND' WHERE MaBenhNhan='$MaBenhNhan'") == 1) {
                    echo "<script>window.location.href='hoso.php';</script>";
                    echo 'Sửa thành công';
                } else {
                    echo 'Sửa không thành công';
                }


                break;

            case 'Hủy':
                echo "<script>window.location.href='index.php';</script>";
                break;
        }


        ?></div>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>



    <?php
    require("./footer.php");
    ?>
</body>

</html>