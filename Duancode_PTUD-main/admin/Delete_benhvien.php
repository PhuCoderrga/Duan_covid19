<?php
include("./class/cls_benhvien.php");
$p = new BENHVIEN();
$id_benhvien = $_REQUEST['id'];
$p->themxoasua('UPDATE benhvien set TrangThai = 0 where MaBenhVien="' . $id_benhvien . '"');
header("Location:./DS_BenhVien.php");
?>
</body>

</html>