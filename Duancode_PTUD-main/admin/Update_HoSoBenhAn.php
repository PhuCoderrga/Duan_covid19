<?php
session_start();
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Form Sửa Thông Tin</title>

</head>

<body>
    <?php
    require('./header.php');
    ?>
    <?php
    $layid = 0;
    if (isset($_REQUEST['id'])) {
        $layid = $_REQUEST['id'];
    }
    ?>
    <div class="content-wrapper" style="min-height: 1203.6px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" style="padding-left: 200px;">
                    <div class="col-sm-6">
                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <table width="813" border="1" align="center">
                                <tr>
                                    <th style="font-size: 50px; text-align:center" width="100%" colspan="2">THÔNG TIN
                                        CHI TIẾT</th>
                                    <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>Tên Bệnh
                                            Nhân</strong>
                                    </td>
                                    <td width="488" style="padding-left: 10px;">
                                        <?php echo $p->laycot("select benhnhan.HoTen from benhnhan INNER JOIN hosobenhan on hosobenhan.MaBenhNhan = benhnhan.MaBenhNhan where hosobenhan.MaHoSo='$layid'"); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="45" style="padding-left: 10px;"><strong>Tình Trạng Bệnh</strong></td>
                                    <td>
                                        <?php
                                        $layid_tinhtrang = $p->laycot("select MaTinhTrang from hosobenhan where MaTinhTrang = $layid limit 1");
                                        $p->loadcompo_tinhtrang("SELECT MaTinhTrang, TenTinhTrang from tinhtrangsuckhoe order by MaTinhTrang asc", $layid_tinhtrang);
                                        ?>
                                        <label for="txtid"></label>
                                        <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Năm Sinh</strong></td>
                                    <td style="padding-left: 10px;">
                                        <?php echo $p->laycot("select benhnhan.NamSinh from benhnhan INNER JOIN hosobenhan on hosobenhan.MaBenhNhan = benhnhan.MaBenhNhan where hosobenhan.MaHoSo='$layid'"); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Địa chỉ</strong></td>
                                    <td style="padding-left: 10px;">
                                        <?php echo $p->laycot("select benhnhan.DiaChi from benhnhan INNER JOIN hosobenhan on hosobenhan.MaBenhNhan = benhnhan.MaBenhNhan where hosobenhan.MaHoSo='$layid'"); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="115" colspan="2" align="center">
                                        <button
                                            style="background-color: #4CAF50; color: white; width: 50%; height: 65%; font-size: 50px"
                                            name="nut" id="nut" value="Cập Nhập">Cập Nhập</button>
                                </tr>
                                <tr>
                                    <td height="30" colspan="2" align="center" style=" font-weight: bold;">
                                        <p style="text-align: center;">Thông Báo</p>
                                        <?php
                                        switch ($_POST['nut']) {
                                            case 'Cập Nhập': {
                                                    $idsua = $_REQUEST['txtid'];
                                                    $layid_tinhtrang = $_REQUEST['tinhtrang'];
                                                    if ($idsua > 0) {
                                                        $p->themxoasua("UPDATE hosobenhan SET `MaTinhTrang` = '$layid_tinhtrang' WHERE MaHoSo = '$layid' LIMIT 1 ;");
                                                        echo "Cập Nhập Thành Công";
                                                    } else {
                                                        echo 'Chọn Thông Tin Cần Sửa';
                                                    }
                                                }
                                        }
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    require('./footer.php');
    ?>
</body>

</html>