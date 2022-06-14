<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Thêm Nhân Viên</title>
</head>

<body>
    <?php
    require("./header.php");
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
                                    <th style="font-size: 50px; text-align:center" width="100%" colspan="2">THÊM TẦNG
                                        MỚI</th>
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>Tên Tầng</strong>
                                    </td>
                                    <td width="488"><label for="TenTang"></label>
                                        <input type="text" name="TenTang" id="TenTang" style="width: 95%;"
                                            placeholder="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="115" colspan="2" align="center">
                                        <button
                                            style="background-color: #4CAF50; color: white; width: 50%; height: 65%; font-size: 50px"
                                            type="submit" name="nut" id="nut" value="Thêm sản phẩm">Thêm tầng
                                            mới</button>
                                </tr>
                                <tr>
                                    <td height="30" colspan="2" align="center" style=" font-weight: bold;"><span
                                            style="text-align: left;">Thông báo</span>
                                        <?php
                                        switch ($_POST['nut']) {
                                            case 'Thêm sản phẩm': {
                                                    $TenTang = $_POST['TenTang'];
                                                    if ($TenTang != '') {
                                                        if ($p->themxoasua("INSERT INTO tang (TenTang) VALUES ('$TenTang');") == 1) {
                                                            echo 'Thêm tầng mới thành công';
                                                        } else {
                                                            echo 'Thêm tầng mới không thành công';
                                                        }
                                                    } else {
                                                        echo '<h1 style="color: red; text-transform: uppercase;">Chưa nhập đầy đủ thông tin tầng mới</h1>';
                                                    }

                                                    break;
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
    require("./footer.php");
    ?>
</body>

</html>