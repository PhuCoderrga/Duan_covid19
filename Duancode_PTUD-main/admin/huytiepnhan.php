<?php
if(isset($_REQUEST['maphieu']))

{

    include('class/cls_benhvien.php');
    $MaPhieu=$_REQUEST['maphieu'];
    $p=new BENHVIEN(); 
    
    $PhieuChuyenVien=$p->get_phieuchuyenvien($MaPhieu);
            if($p->themxoasua("delete from phieuchuyenvien WHERE MaPhieu='$MaPhieu'")==1){
                echo "<script>window.location.href='dsyeucauchuyenvien.php'</script>";
            }
        
    
}