<?php
include("./class/cls_benhvien.php");
$p = new BENHVIEN();
$id_nhanvien = $_REQUEST['id'];
$p->themxoasua('DELETE from taikhoan where Taikhoan="' . $id_nhanvien . '"');
$p->themxoasua('DELETE from nhanvienytebenhvien where MaNV="' . $id_nhanvien . '"');
header("Location:./DS_taikhoan.php");
?>
</body>

</html>