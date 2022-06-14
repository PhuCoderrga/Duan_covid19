<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From Thêm Bệnh Viện</title>
    <style>
    .invalid {
        color: #FF0001;
    }
    </style>
</head>

<body>
    <?php
    //include("./class/cls_benhvien.php");
    // $p = new BENHVIEN();
    $layid = 0;
    if (isset($_REQUEST['id'])) {
        $layid = $_REQUEST['id'];
    }
    ?>
    <?php
    include_once 'header.php';
    ?>
    <div class="content-wrapper" style="min-height: 1203.6px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2" style="padding-left: 200px;">
                    <div class="col-sm-6">
                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <table width="813" border="1" align="center">
                                <tr>
                                    <th style="font-size: 50px; text-align:center" width="100%" colspan="2">THÊM BỆNH
                                        VIỆN MỚI</th>
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>Tên Bệnh
                                            Viện</strong>
                                    </td>
                                    <td width="200px">
                                        <div class="form-group invalid">
                                            <label for="TenBenhVien"></label>
                                            <input type="text" name="TenBenhVien" id="TenBenhVien" style="width: 95%;"
                                                placeholder="Nhập tên bệnh viện" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="45" style="padding-left: 10px;"><strong>Tầng</strong></td>
                                    <td>
                                        <?php
                                        if ($layid != 0) {
                                            $layid_Tang = $p->laycot("select MaTang from benhvien where MaTang=$layid limit 1");
                                        }
                                        $p->loadcompo_tang("select MaTang, TenTang from tang order by MaTang asc", $layid_Tang);
                                        ?>
                                        <label for="txtid"></label>
                                        <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số lượng bác sĩ</strong></td>
                                    <td>
                                        <div class="form-group invalid">
                                            <label for="SLBacSi"></label>
                                            <input type="text" name="SLBacSi" id="SLBacSi" style="width: 95%;" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số lượng y tá</strong></td>
                                    <td>
                                        <div class="form-group invalid">
                                            <label for="SLYta"></label>
                                            <input type="text" name="SLYta" id="SLYta" style="width: 95%;" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số giường bệnh</strong></td>
                                    <td>
                                        <div class="form-group invalid">
                                            <label for="SoGiuongBenh"></label>
                                            <input type="text" name="SoGiuongBenh" id="SoGiuongBenh"
                                                style="width: 95%;" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số giường bệnh chống</strong>
                                    </td>
                                    <td>
                                        <div class="form-group invalid">
                                            <label for="SoGiuongBenhTrong"></label>
                                            <input type="text" name="SoGiuongBenhTrong" id="SoGiuongBenhTrong"
                                                style="width: 95%;" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Số bệnh nhân đang điều
                                            trị</strong></td>
                                    <td>
                                        <div class="form-group invalid">
                                            <label for="SoBenhNhanDangDieuTri"></label>
                                            <input type="text" name="SoBenhNhanDangDieuTri" id="SoBenhNhanDangDieuTri"
                                                style="width: 95%;" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="63" style="padding-left: 10px;"><strong>Ảnh minh họa bệnh viện</strong>
                                    </td>
                                    <td>
                                        <div class="form-group invalid">
                                            <label for="anh"></label>
                                            <input type="file" name="hinh" id="hinh" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="52" style="padding-left: 10px;"><strong>Địa chỉ</strong></td>
                                    <td>
                                        <div class="form-group invalid">
                                            <label for="DiaChi"></label>
                                            <input type="text" name="DiaChi" id="DiaChi" style="width: 95%;" />
                                            <span class="form-message">*</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="92" style="padding-left: 10px;"><strong>Mô tả</strong></td>
                                    <td><label for="Mota"></label>
                                        <textarea name="Mota" id="Mota" cols="70%" rows="5"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="115" colspan="2" align="center">
                                        <button
                                            style="background-color: #4CAF50; color: white; width: 50%; height: 65%; font-size: 50px"
                                            type="submit" name="nut" id="nut" value="Thêm sản phẩm">Thêm bệnh
                                            viện</button>
                                </tr>
                                <tr>
                                    <td height="30" colspan="2" align="center" style=" font-weight: bold;"><span
                                            style="text-align: left;">Thông báo</span>
                                        <?php
                                        switch ($_POST['nut']) {
                                            case 'Thêm sản phẩm': {
                                                    $id_tang = $_REQUEST['tang'];
                                                    $TenBenhVien = $_REQUEST['TenBenhVien'];
                                                    $SLBacSi = $_REQUEST['SLBacSi'];
                                                    $SLYta = $_REQUEST['SLYta'];
                                                    $SoGiuongBenh = $_REQUEST['SoGiuongBenh'];
                                                    $SoGiuongBenhTrong = $_REQUEST['SoGiuongBenhTrong'];
                                                    $SoBenhNhanDangDieuTri = $_REQUEST['SoBenhNhanDangDieuTri'];
                                                    $DiaChi = $_REQUEST['DiaChi'];
                                                    $Mota = $_REQUEST['Mota'];
                                                    $name = $_FILES['hinh']['name'];
                                                    $tmp_name = $_FILES['hinh']['tmp_name'];
                                                    $type = $_FILES['hinh']['type'];
                                                    $size = $_FILES['hinh']['size'];
                                                    if ($TenBenhVien != '' &&  $SLBacSi != '' && $SLYta != '' && $SoGiuongBenh != '' && $SoGiuongBenhTrong != '' && $SoBenhNhanDangDieuTri != '' && $DiaChi != '') {
                                                        if ($id_tang != 0) {
                                                            if ($name != '') {
                                                                $name = time() . "_" . $name;
                                                                if ($p->myupfile($name, $tmp_name, './images')) {
                                                                    $conn = mysqli_connect('localhost', 'root', '', 'duan_ptud') or die('Lỗi kết nối');
                                                                    mysqli_set_charset($conn, "utf8");
                                                                    $sql = "SELECT * FROM benhvien WHERE TenBenhVien= '$TenBenhVien' ";
                                                                    $result = mysqli_query($conn, $sql);
                                                                    if (mysqli_num_rows($result) > 0) {
                                                                        echo 'Bệnh Viện Này Đã có';
                                                                    } else {
                                                                        if ($p->themxoasua("INSERT INTO benhvien (TenBenhVien,MaTang, SLBacSi, SLYta, SoGiuongBenh, SoGiuongBenhTrong, SoBenhNhanDangDieuTri, Hinh, DiaChi, MoTa) VALUES ('$TenBenhVien', '$id_tang', '$SLBacSi', '$SLYta', '$SoGiuongBenh', '$SoGiuongBenhTrong', '$SoBenhNhanDangDieuTri', '$name', '$DiaChi', '$Mota');") == 1) {
                                                                            echo 'Thêm bệnh viện mới thành công';
                                                                        } else {
                                                                            echo 'Thêm bệnh viện mới không thành công';
                                                                        }
                                                                    }
                                                                } else {
                                                                    echo 'không upload được hình đại diện';
                                                                }
                                                            } else {
                                                                echo 'Vui lòng chọn ảnh đại diện';
                                                            }
                                                        } else {
                                                            echo 'Chọn Tầng';
                                                        }
                                                    } else {
                                                        echo ' <h1 style="color: red; text-transform: uppercase;">Chưa nhập đầy đủ thông tin bệnh viện mới</h1>
                                                        ';
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
    require_once 'footer.php';
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

</html>