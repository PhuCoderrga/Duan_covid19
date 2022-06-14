<?php
include("./class/cls_benhvien.php");
$p = new BENHVIEN();
$id_tang = $_REQUEST['id'];
$p->themxoasua('UPDATE tang set TrangThai = 0 where MaTang="' . $id_tang . '"');
header("Location:./DS_tang.php");
?>
</body>

</html>