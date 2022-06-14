<?php
session_start()

?>
<?php
if (isset($_REQUEST['Mabenhnhan'])) {
    $Mabenhnhan =  $_REQUEST['Mabenhnhan'];
} else {
    header("Location:danhsachbenhnhan.php");
}
if (isset($_REQUEST['tang'])) {
    $tang = $_REQUEST['tang'];
}
?>
<?php
$timezone = "Asia/Colombo";
date_default_timezone_set($timezone);
$today = date("Y-m-d");
?>

<body>
    <?php
    require("./header.php");
    ?>
    <?php
    //ket noi
    $layid = 0;
    if (isset($_REQUEST['id'])) {
        $layid = $_REQUEST['id'];
    }
    if (isset($_GET['Mabenhnhan'])) {
        $benhnhan = $p->get_benhnhan($Mabenhnhan);
    }
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
            <form action="" method="post">



                <table width="464" align="center" class="tableStyle">
                    <tr>
                        <th colspan="2" align="center" valign="middle" scope="col">
                            <h1 align="center"><strong>Giấy yêu cầu chuyển bệnh nhân</strong></h1>
                        </th>
                    </tr>
                    <tr>
                    </tr><br>
                    <tr height="30px">
                        <td width="173"><strong>Mã bệnh nhân</strong></td>
                        <td width="271" align="left">
                            <div align=""><strong>
                                    <input type="text" name="txtma" id="txtma" class="col-sm-12"
                                        value="<?php echo $benhnhan['MaBenhNhan'] ?>" disabled>
                                    <input type="hidden" name="MaBenhNhan" id="MaBenhNhan" class="col-sm-12"
                                        value="<?php echo $benhnhan['MaBenhNhan'] ?>">
                                </strong></div>
                        </td>
                    </tr>

                    <tr height="50px">

                        <td><strong name="txtten">Tên bệnh nhân</strong></td>
                        <td align="left">
                            <div><strong>
                                    <input type="text" name="txtten" id="txtten" class="col-sm-12"
                                        value="<?php echo $benhnhan['HoTen'] ?>" disabled>
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
                                        value="<?php echo $benhnhan['NamSinh'] ?>" disabled>
                                </strong></div>
                        </td>
                    </tr>
                    <tr height="50px">
                        <td valign=""><strong>Địa chỉ</strong></td>
                        <td align="left"><strong>
                                <input type="text" name="txtdiachi" id="txtdiachi" class="col-sm-12"
                                    value="<?php echo $benhnhan['DiaChi'] ?>" disabled>
                            </strong></td>
                    </tr>
                    <tr height="50px">
                        <td valign="">
                            <div align=""><strong>Số CMND</strong></div>
                        </td>
                        <td align="left">
                            <div align=""> <strong>
                                    <input type="text" name="CMND" id="CMND" class="col-sm-12"
                                        value="<?php echo $benhnhan['CMND_CCCD'] ?>" disabled>
                                </strong></div>
                        </td>
                    </tr>

                    <tr height="50px">
                        <td>
                            <div align=""><strong>Tầng đang điều trị</strong></div>
                        </td>
                        <td align="left">
                            <div align=""> <strong>
                                    <input type="text" name="txtdt" id="txtddt" class="col-sm-12"
                                        value="<?php echo $p->luachon("select TenTang from tang where MaTang ='" . $benhnhan['MaTang'] . "' ") ?>"
                                        disabled>
                                    <input type="hidden" name="MaTang" id="MaTang" class="col-sm-12"
                                        value="<?php echo $benhnhan['MaTang'] ?>">

                                </strong></div>
                        </td>
                    </tr>
                    <tr height="50px">
                        <td valign=""><strong>Bệnh viện đang điều trị</strong></td>
                        <td align="left"> <strong>
                                <input type="text" name="txtbvdtt" id="txtbvyc" class="col-sm-12"
                                    value="<?php echo $p->luachon("select TenBenhVien from benhvien where MaBenhVien ='" . $benhnhan['MaBenhVien'] . "' ") ?>"
                                    disabled>
                                <input type="hidden" name="MaBenhVien" id="MaBenhVien" class="col-sm-12"
                                    value="<?php echo $benhnhan['MaBenhVien'] ?>">
                            </strong></td>
                    </tr>
                    <tr height="50px">
                        <td valign=""><strong>Tầng yêu cầu</strong></td>
                        <td align="left"><strong>
                                <?php
                                $MaTangHienTai = $benhnhan['MaTang'];
                                $k = $p->loadcombo_tang1("select MaTang, TenTang from tang where MaTang>$MaTangHienTai"); ?>


                            </strong>

                    </tr>
                    <?php if ($_GET['tang'] != "") { ?>
                    <tr height="50px">
                        <td valign=""><strong>Bệnh viện yêu cầu</strong></td>
                        <td align="left"><strong>
                                <?php
                                    if (isset($_GET['tang']))
                                        $sql_tang = "where MaTang='" . $_GET['tang'] . "' and SoGiuongBenhTrong > 0";
                                    $k = $p->load_BV("select MaBenhVien,TenBenhVien from benhvien " . $sql_tang); ?>




                            </strong>

                    </tr>
                    <?php } ?>
                    <tr height="50px">
                        <td><strong>Thời gian gửi yêu cầu</strong></td>
                        <td align="left" id="hvn" class="ridge"><strong>
                                <input type="date" name="ngay" id="" value="<?php echo $today; ?>">

                            </strong></td>
                    </tr>

                    <tr>
                        <td colspan="2" align="center">
                            <div align="center">
                                <strong>
                                    <input type="submit" name="them" id="them" value="Gửi yêu cầu tiếp nhận"
                                        style="background-color:#73BE55; color:white;" />
                                    <input type="submit" name="them" id="them" href="danhsachbenhnhan.php" value="Hủy"
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

                case 'Gửi yêu cầu tiếp nhận': {

                        $MaTang_Moi = $_POST['tang'];
                        $MaBenhVien_Moi = $_POST['BV'];
                        $MaBenhNhan = $_POST['MaBenhNhan'];

                        $MaBenhVien = $_POST['MaBenhVien'];
                        $MaTang = $_POST['MaTang'];
                        $NgayChuyenVien = $_POST['ngay'];
                        if ($tang > $tanghientai) {
                            if ($p->loadten($MaBenhNhan) == 1) {
                                echo '<script>alert("Bệnh nhân này đã được gửi yêu cầu. Không được gửi lại.")</script>';

                                exit;
                            }



                            if ($p->themxoasua("INSERT INTO  phieuchuyenvien (NgayChuyenVien,MaTang,MaBenhVien,MaBenhNhan,MaTang_Moi,MaBenhVien_Moi) VALUES ('$NgayChuyenVien',  '$MaTang','$MaBenhVien','$MaBenhNhan', '$MaTang_Moi', '$MaBenhVien_Moi')") == 1) {


                                echo '<script type="text/javascript"> alert("Gửi yêu cầu thành công");
														   window.location.href="danhsachbenhnhan.php";

                                                          </script>';
                            }
                        } else {
                            echo '<script type="text/javascript"> alert("Gửi yêu cầu không thành công");
														   

                                                          </script>';
                        }

                        break;
                    }
                case 'Hủy': {
                        echo '<script type="text/javascript"> 
														   window.location.href="danhsachbenhnhan.php";

                                                          </script>';
                    }
            }



            ?>

        </div>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>


        <script>
        function loadcombo_tang() {
            var tang = $('#tang').val();

            window.location.href = "yeucauchuyenvien.php?Mabenhnhan=<?php echo $_GET['Mabenhnhan'] ?>&tang=" +
                tang;
        }
        </script>
        <?php
        require("./footer.php");
        ?>
</body>

</html>