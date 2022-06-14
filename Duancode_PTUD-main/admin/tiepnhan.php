<?php
if (isset($_REQUEST['maphieu'])) {

    include('class/cls_benhvien.php');
    $MaPhieu = $_REQUEST['maphieu'];
    $p = new BENHVIEN();

    $PhieuChuyenVien = $p->get_phieuchuyenvien($MaPhieu);

    $MaTang_Moi = $PhieuChuyenVien['MaTang_Moi'];
    $MaBenhVien_Moi = $PhieuChuyenVien['MaBenhVien_Moi'];
    $MaTang = $phieuchuyenvien['MaTang'];
    $MaBenhVien = $PhieuChuyenVien['MaBenhVien'];
    $MaBenhNhan = $PhieuChuyenVien['MaBenhNhan'];
    if ($p->themxoasua("UPDATE benhnhan set MaTang='$MaTang_Moi', MaBenhVien='$MaBenhVien_Moi' WHERE MaBenhNhan='$MaBenhNhan'") == 1) {
        if ($p->themxoasua("UPDATE benhvien set SoGiuongBenhTrong=SoGiuongBenhTrong+1 WHERE MaBenhVien='$MaBenhVien_Moi'") == 1) {
            if ($p->themxoasua("UPDATE benhvien set SoGiuongBenhTrong=SoGiuongBenhTrong-1 WHERE MaBenhVien='$MaBenhVien'") == 1) {
                if ($p->themxoasua("delete from phieuchuyenvien WHERE MaPhieu='$MaPhieu'") == 1) {
                    echo "<script>window.location.href='dsyeucauchuyenvien.php'</script>";
                }
            }
        }
    }
}