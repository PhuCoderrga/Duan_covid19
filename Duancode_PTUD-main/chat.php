<?php
session_start();
include_once "./class/config.php";
if (!isset($_SESSION['unique_id'])) {
    header("location:Login_admin.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHAT REAL TIME</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>


<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT *
                FROM nhanvienytephuong INNER JOIN taikhoan
                ON nhanvienytephuong.MaNV = taikhoan.TaiKhoan
                WHERE nhanvienytephuong.MaNV = taikhoan.TaiKhoan 
                AND taikhoan.unique_id = {$user_id}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                } else {
                    header("location: users.php");
                }
                ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="../Duancode_PTUD-main/admin/images/<?php echo $row['Hinh']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['HoTen'] ?></span>
                    <p><?php echo $row['TrangThai']; ?></p>
                </div>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Nhập tin nhắn..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="js/chat.js"></script>

</body>

</html>