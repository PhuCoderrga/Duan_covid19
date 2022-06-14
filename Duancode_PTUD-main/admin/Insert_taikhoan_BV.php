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
                                    <th style="font-size: 50px; text-align:center" width="100%" colspan="2">THÊM NHÂN
                                        VIÊN MỚI</th>
                                </tr>
                                <tr>
                                    <td width="240" height="48" style="padding-left: 10px;"><strong>Tài Khoản Nhân
                                            Viên</strong>
                                    </td>
                                    <td width="488"><label for="TaiKhoan"></label>
                                        <input type="text" name="TaiKhoan" id="TaiKhoan" style="width: 95%;"
                                            placeholder="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="45" style="padding-left: 10px;"><strong>Phân Quyền</strong></td>
                                    <td>
                                        &ensp;Nhân Viên Y Tế Bệnh Viện
                                        <label for="txtid"></label>
                                        <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height=" 45" style="padding-left: 10px;"><strong>Bệnh Viện/Phường</strong></td>
                                    <td>
                                        <?php
                                        $p->loadcompo_benhvien("select MaBenhVien, TenBenhVien from benhvien order by MaBenhVien asc", $layid_Tang);
                                        ?>
                                        <label for="txtid"></label>
                                        <input name="txtid" type="hidden" id="txtid" value="<?php echo $layid; ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="115" colspan="2" align="center">
                                        <button
                                            style="background-color: #4CAF50; color: white; width: 50%; height: 65%; font-size: 50px"
                                            type="submit" name="nut" id="nut" value="Thêm sản phẩm">Thêm nhân
                                            viên</button>
                                </tr>
                                <tr>
                                    <td height="30" colspan="2" align="center" style=" font-weight: bold;"><span
                                            style="text-align: left;">Thông báo</span>
                                        <?php
                                        switch ($_POST['nut']) {
                                            case 'Thêm sản phẩm': {
                                                    $id_quyen = 2;
                                                    $id_benhvien = $_POST['benhvien'];
                                                    $TaiKhoan = $_POST['TaiKhoan'];
                                                    $MatKhau = 1;
                                                    $ran_id = rand(time(), 100000000);
                                                    $trangthai = "Offline";
                                                    if ($TaiKhoan != '') {
                                                        $conn = mysqli_connect('localhost', 'root', '', 'duan_ptud') or die('Lỗi kết nối');
                                                        mysqli_set_charset($conn, "utf8");
                                                        $sql = "SELECT * FROM taikhoan WHERE TaiKhoan= '$TaiKhoan' ";
                                                        $result = mysqli_query($conn, $sql);
                                                        if (mysqli_num_rows($result) > 0) {
                                                            echo 'Vui lòng sử dụng tên tài khoản khác!! Đã tồn tại';
                                                        } else {
                                                            if ($p->themxoasua("INSERT INTO taikhoan (TaiKhoan ,MatKhau ,PhanQuyen, unique_id, TrangThai, MaBenhVien ) VALUES ('$TaiKhoan', '$MatKhau', '$id_quyen', '$ran_id', '$trangthai', '$id_benhvien');") == 1) {
                                                                if ($p->themxoasua("INSERT INTO nhanvienytebenhvien (`MaNV` ,`HoTen` ,`SDT` ,`DiaChi` ,`MaBenhVien`)VALUES ('$TaiKhoan', '', '', '', '$id_benhvien' );") == 1) {
                                                                    echo 'Thêm nhân viên mới thành công';
                                                                }
                                                            } else {
                                                                echo 'Thêm nhân viên mới không thành công';
                                                            }
                                                        }
                                                    } else {
                                                        echo '<h1 style="color: red; text-transform: uppercase;">Chưa nhập đầy đủ thông tin nhân viên mới</h1>';
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