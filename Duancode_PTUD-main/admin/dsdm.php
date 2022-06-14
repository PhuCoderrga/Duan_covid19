<?php
include("./class/function.php");
$quanly = new quanly();
$layid_danhmuc = $_GET['id'];
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['TaiKhoan']) && isset($_SESSION['MatKhau']) && $_SESSION['PhanQuyen'] == 2) {

    include("./class/clslogin.php");
    $q = new login();
    $q->confirmlogin($_SESSION['id'], $_SESSION['TaiKhoan'], $_SESSION['MatKhau'], $_SESSION['PhanQuyen']);

    require('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dsdm.css">
</head>

<body>
    <div class="row form-group">
        <div class="col-md-2">

        </div>
        <div class="col-md-2">
            <div id="mainnav">
                <ul>
                    <?php
                        $quanly->loadtang("select * from tang order by TenTang asc");
                        ?>
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="">

                <?php
                    if (isset($_GET['id'])) {
                    ?>
                <table id="benhvien">
                    <tr>
                        <th>STT</th>
                        <th>Tên bệnh viện</th>
                        <th>Địa chỉ</th>
                        <th>Số lượng còn tiếp nhận</th>
                        <th>Đang điều trị</th>
                        <th>Chức năng</th>
                    </tr>
                    <tr>
                        <?php
                            $quanly->loadtentang("select * from tang where MaTang='$layid_danhmuc'");
                            $quanly->load_benhvien("select * from benhvien where MaTang='$layid_danhmuc'");
                        } else {
                            ?>
                        <h3 style='text-align: center;'>Chọn tầng</h3>
                        <?php
                        }
                            ?>
                    </tr>
                </table>
            </div>
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