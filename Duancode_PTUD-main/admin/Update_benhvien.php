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
                                    <th style="font-size: 50px; text-align:center" width="100%" colspan="2">CẬP NHẬP
                                        THÔNG TIN BỆNH
                                        VIỆN</th>
                                    <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>Tên Bệnh
                                            Viện</strong>
                                    </td>
                                    <td width="488">
                                        <label for="TenBenhVien"></label>
                                        <input type="text" name="TenBenhVien" id="TenBenhVien" style="width: 95%;"
                                            value="<?php echo $p->laycot("select TenBenhVien from benhvien where MaBenhVien='$layid' limit 1"); ?>" />
                                        <span class="form-message">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="45" style="padding-left: 10px;"><strong>Tầng</strong></td>
                                    <td>
                                        <?php
                                        $layid_Tang = $p->laycot("select MaTang from benhvien where MaBenhVien =$layid limit 1");
                                        $p->loadcompo_tang("select MaTang, TenTang from tang order by MaTang asc", $layid_Tang);
                                        ?>
                                        <label for="txtid"></label>
                                        <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số lượng bác sĩ</strong></td>
                                    <td>
                                        <input type="text" name="SLBacSi" id="SLBacSi" style="width: 95%;"
                                            value="<?php echo $p->laycot("select SLBacSi from benhvien where MaBenhVien='$layid' limit 1"); ?>" />
                                        <span class="form-message">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số lượng y tá</strong></td>
                                    <td><label for="giasp"></label>
                                        <input type="text" name="SLYta" id="SLYta" style="width: 95%;"
                                            value="<?php echo $p->laycot("select SLBacSi from benhvien where MaBenhVien='$layid' limit 1"); ?>" />
                                        <span class="form-message">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số gường bệnh</strong></td>
                                    <td><label for="giasp"></label>
                                        <input type="text" name="SoGiuongBenh" id="SoGiuongBenh" style="width: 95%;"
                                            value="<?php echo $p->laycot("select SoGiuongBenh from benhvien where MaBenhVien='$layid' limit 1"); ?>" />
                                        <span class="form-message">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số gường bệnh trống</strong>
                                    </td>
                                    <td><label for="giasp"></label>
                                        <input type="text" name="SoGiuongBenhTrong" id="SoGiuongBenhTrong"
                                            style="width: 95%;"
                                            value="<?php echo $p->laycot("select SoGiuongBenhTrong from benhvien where MaBenhVien='$layid' limit 1"); ?>" />
                                        <span class="form-message">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số bệnh nhân đang điều
                                            trị</strong></td>
                                    <td><label for="giasp"></label>
                                        <input type="text" name="SoBenhNhanDangDieuTri" id="SoBenhNhanDangDieuTri"
                                            style="width: 95%;"
                                            value="<?php echo $p->laycot("select SoBenhNhanDangDieuTri from benhvien where MaBenhVien='$layid' limit 1"); ?>" />
                                        <span class="form-message">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="63" style="padding-left: 10px;"><strong>Ảnh minh họa bệnh viện</strong>
                                    </td>
                                    <td>
                                        <input type="file" name="hinh" id="hinh"
                                            value="<?php echo $p->laycot("select Hinh from benhvien where MaBenhVien='$layid' limit 1"); ?>" />
                                        <span class="form-message">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Địa chỉ</strong></td>
                                    <td><label for="giasp"></label>
                                        <input type="text" name="DiaChi" id="DiaChi" style="width: 95%"
                                            value="<?php echo $p->laycot("select DiaChi from benhvien where MaBenhVien='$layid' limit 1"); ?>" />
                                        <span class="form-message">*</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="92" style="padding-left: 10px;"><strong>Mô tả</strong></td>
                                    <td><label for="MoTa"></label>
                                        <textarea name="MoTa" id="MoTa" cols="70%"
                                            rows="5"><?php echo $p->laycot("select MoTa from benhvien where MaBenhVien='$layid' limit 1"); ?></textarea>
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
                                                    $id_tang = $_REQUEST['tang'];
                                                    $TenBenhVien = $_REQUEST['TenBenhVien'];
                                                    $SLBacSi = $_REQUEST['SLBacSi'];
                                                    $SLYta = $_REQUEST['SLYta'];
                                                    $SoGiuongBenh = $_REQUEST['SoGiuongBenh'];
                                                    $SoGiuongBenhTrong = $_REQUEST['SoGiuongBenhTrong'];
                                                    $SoBenhNhanDangDieuTri = $_REQUEST['SoBenhNhanDangDieuTri'];
                                                    $DiaChi = $_REQUEST['DiaChi'];
                                                    $MoTa = $_REQUEST['MoTa'];
                                                    $name = $_FILES['hinh']['name'];
                                                    $tmp_name = $_FILES['hinh']['tmp_name'];
                                                    $type = $_FILES['hinh']['type'];
                                                    $size = $_FILES['hinh']['size'];
                                                    if ($idsua > 0) {
                                                        $name = time() . "_" . $name;
                                                        if ($name != '') {
                                                            $p->myupfile($name, $tmp_name, './images');
                                                            $p->themxoasua("UPDATE benhvien SET `TenBenhVien` = '$TenBenhVien',`MaTang` = '$id_tang',`SLBacSi` = '$SLBacSi',`SLYta` = '$SLYta',`SoGiuongBenh` = '$SoGiuongBenh',`SoGiuongBenhTrong` = '$SoGiuongBenhTrong',`SoBenhNhanDangDieuTri` = '$SoBenhNhanDangDieuTri',`Hinh` = '$name',`DiaChi` = '$DiaChi',`MoTa` = '$MoTa' WHERE MaBenhVien = '$idsua' LIMIT 1");
                                                            echo "Cập Nhập Thành Công";
                                                        } else {
                                                            $p->themxoasua("UPDATE benhvien SET `TenBenhVien` = '$TenBenhVien',`MaTang` = '$id_tang',`SLBacSi` = '$SLBacSi',`SLYta` = '$SLYta',`SoGiuongBenh` = '$SoGiuongBenh',`SoGiuongBenhTrong` = '$SoGiuongBenhTrong',`SoBenhNhanDangDieuTri` = '$SoBenhNhanDangDieuTri',`DiaChi` = '$DiaChi',`MoTa` = '$MoTa' WHERE MaBenhVien = '$idsua' LIMIT 1");
                                                            echo "Cập Nhập Thành Công";
                                                        }
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
<script src="./js/BENHVIEN.js"> </script>
<script>
// Mong muốn của chúng ta 
Validator({
    form: '#form1',
    errorSelector: '.form-message',
    rules: [
        Validator.isTenBenhVien('#TenBenhVien'),
        Validator.isSLBacSi('#SLBacSi'),
        Validator.isSLYta('#SLYta'),
        Validator.isSoGiuongBenh('#SoGiuongBenh'),
        Validator.isSoGiuongBenhTrong('#SoGiuongBenhTrong'),
        Validator.isSoBenhNhanDangDieuTri('#SoBenhNhanDangDieuTri'),
        Validator.isDiaChi('#DiaChi')

    ]
});
</script>
/html>