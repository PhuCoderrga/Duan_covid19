<?php
session_start();
include_once "./class/config.php";
if (!isset($_SESSION['unique_id'])) {
    header("location: Login_admin.php");
}
include('./class/cls_hosocanhan.php');
$p = new HOSO();
$MaPhuong = $p->get_MaPhuong($_SESSION['unique_id']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHAT BOX REALTIME</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <?php
                    $sql = mysqli_query($conn, "SELECT *
                    FROM benhnhan INNER JOIN taikhoan
                    ON benhnhan.MaBenhNhan = taikhoan.TaiKhoan
                    WHERE benhnhan.MaBenhNhan = taikhoan.TaiKhoan 
                    AND taikhoan.unique_id = {$_SESSION['unique_id']}");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    }
                    ?>
                    <img src="../Duancode_PTUD-main/admin/images/<?php echo $row['Hinh']; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['HoTen'] ?></span>
                        <p><?php echo $row['TrangThai']; ?></p>
                    </div>
                </div>
                <a href="index.php" class="logout">Trở về</a>
            </header>
            <div class="search">
                <span class="text">Tìm kiếm một bệnh nhân</span>
                <input type="text" placeholder="Điền tên bệnh nhân">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">

            </div>
        </section>
    </div>

    <script src="js/users.js"></script>

</body>

</html>