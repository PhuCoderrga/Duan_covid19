<?php
if (isset($_REQUEST['Mabenhnhan'])) {
    $Mabenhnhan = $_REQUEST['Mabenhnhan'];
}
?>

<body>
    <?php
    require("./header.php");
    include_once './class/cls_benhvien.php';
    $p = new BENHVIEN();
    ?>
    <?php
    //ket noi

    $layid = 0;
    if (isset($_REQUEST['id'])) {
        $layid = $_REQUEST['id'];
    }

    ?>
    <div id="about" class="about top_layer" style="margin-left:150px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pppp">
                    <div class="about_box">
                        <div class="about_box_text">
                            <div class="title">
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <h1 align="center"><strong>Danh sách bệnh nhân</strong></h1>
                                <p>
                                    <?php
                                    if ($_SESSION['MaBenhVien'] != 0) {
                                        $where = "where MaBenhVien='" . $_SESSION['MaBenhVien'] . "'";
                                    }
                                    $p->loadtintuc("select * from benhnhan " . $where . " order by MaBenhNhan asc"); ?>
                                </p>
                                <p>&nbsp;</p>
                                <p>&nbsp; </p>
                                <p>&nbsp;</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        require("./footer.php");
        ?>
</body>

</html>