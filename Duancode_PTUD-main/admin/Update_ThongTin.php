<?php
session_start();
$thongbao = '';
switch ($_POST['nut']) {
    case 'Cập Nhập': {
            $HoTen = $_POST['HoTen'];
            $SDT = $_POST['SDT'];
            $DiaChi = $_POST['DiaChi'];
            $name = $_FILES['hinh']['name'];
            $tmp_name = $_FILES['hinh']['tmp_name'];
            $type = $_FILES['hinh']['type'];
            $size = $_FILES['hinh']['size'];
            if ($HoTen != '' && $SDT != '' && $DiaChi != '') {
                $name = time() . "_" . $name;
                if ($name != '') {
                    if ($p->themxoasua("UPDATE nhanvienytebenhvien 
                    INNER JOIN taikhoan
                    ON taikhoan.TaiKhoan = nhanvienytebenhvien.MaNV
                    SET `HoTen` = '$HoTen',`SDT` = '$SDT', `DiaChi` = '$DiaChi', `Hinh` = '$name' 
                    WHERE unique_id = {$_SESSION['unique_id']}") == 1) {
                        $p->myupfile($name, $tmp_name, './images');
                        header("location: index.php");
                    }
                } else {
                    $thongbao = 'thất bại';
                }
            } else {
                $thongbao = 'Vui lòng nhập đủ thông tin';
            }
        }
}
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
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>Mã
                                            Nhân Viên</strong>
                                    </td>
                                    <td width="488" style="padding-left: 10px;">
                                        <?php echo $p->laycot("select TaiKhoan from taikhoan where unique_id = {$_SESSION['unique_id']}"); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>Họ và Tên</strong>
                                    </td>
                                    <td width="488"><label for="HoTen"></label>
                                        <input type="text" name="HoTen" id="HoTen" style="width: 95%;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>SDT</strong>
                                    </td>
                                    <td width="488"><label for="SDT"></label>
                                        <input type="text" name="SDT" id="SDT" style="width: 95%;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>Địa chỉ</strong>
                                    </td>
                                    <td width="488"><label for="DiaChi"></label>
                                        <input type="text" name="DiaChi" id="DiaChi" style="width: 95%;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="63" style="padding-left: 10px;"><strong>Ảnh Thẻ</strong>
                                    </td>
                                    <td>
                                        <input type="file" name="hinh" id="hinh" />
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
                                        echo $thongbao;
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