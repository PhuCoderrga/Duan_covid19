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
                                    <td height="52" style="padding-left: 10px;"><strong>Tên Tầng</strong></td>
                                    <td>
                                        <input type="text" name="tang" id="tang" style="width: 95%;"
                                            value="<?php echo $p->laycot("select TenTang from tang where MaTang='$layid' limit 1"); ?>" />
                                        <span class="form-message">*</span>
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
                                                    $layid_tang = $_REQUEST['tang'];
                                                    if ($idsua > 0) {
                                                        $p->themxoasua("UPDATE tang SET `TenTang` = '$layid_tang' WHERE MaTang = '$layid' LIMIT 1 ;");
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