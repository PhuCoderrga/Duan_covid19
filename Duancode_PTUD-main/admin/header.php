<?php
session_start();
include('./class/cls_benhvien.php');
$p = new BENHVIEN();
if ($_SESSION['MaBenhVien'] == 2) {
    $benhvien_nhanvien = $p->get_benhvien($_SESSION['MaBenhVien']);
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QUẢN LÝ BỆNH NHÂN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="Public/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="Public/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="Public/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="Public/admin/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="Public/admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="Public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="Public/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="Public/admin/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="css/custom.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Trang chủ</a>
                </li>
            </ul>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Tìm kiếm"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">Thông Tin Tài Khoản</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> Tài khoản cá nhân
                        </a>
                        <div class="dropdown-divider">

                        </div>
                        <a href="logout.php" class="dropdown-item" style="display: flex; justify-content: center;">

                            <button type="button" class="btn btn-success" id="logout" name="loguot">Đăng
                                Xuất</button>

                        </a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>


        <!-- Main Sidebar Container -->
        <?php if ($_SESSION['PhanQuyen'] == 1) { ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: black">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="./images/logo.png" style="width: 230px;" />
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">Xin Chào Nhà Quản Trị</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Trang chủ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ BỆNH VIỆN
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="./Insert_benhvien.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">THÊM BỆNH VIỆN</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./DS_BenhVien.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">DANH SÁCH BỆNH VIỆN</p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="./Insert_benhvien.php" class="nav-link"
                                                style="background-color: #007bff;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p style="color: white;">THÊM BỆNH VIỆN</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./DS_BenhVien.php" class="nav-link"
                                                style="background-color: #007bff;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p style="color: white;">DANH SÁCH BỆNH VIỆN</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ NHÂN VIÊN
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="./Insert_taikhoan_Phuong.php" class="nav-link"
                                        style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">THÊM NV PHƯỜNG</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./Insert_taikhoan_BV.php" class="nav-link"
                                        style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">THÊM NV BỆNH VIỆN</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./DS_taikhoan.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">DANH SÁCH TÀI KHOẢN</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ TẦNG
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="./Insert_tang.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">THÊM</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./DS_tang.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">DANH SÁCH TẦNG</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ SL ĐIỀU TRỊ
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="./DS_DIEUTRI.PHP" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Danh sách</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./ThongKe.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Thống kê</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <?php } elseif ($_SESSION['PhanQuyen'] == 2) { ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#3B5998;">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="./images/logo.png" style="width: 230px;" />
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="color: chartreuse;">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">Xin Chào Bác
                            Sĩ<br><?php echo $benhvien_nhanvien['TenBenhVien']; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Trang chủ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ BỆNH VIỆN
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="./dsdm.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">TRA CỨU BỆNH VIỆN</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ BỆNH NHÂN
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="./DS_HoSoBenhVien.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">HỒ SƠ BỆNH ÁN</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./danhsachbenhnhan.php" class="nav-link"
                                        style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">DS BỆNH NHÂN</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./dsyeucauchuyenvien.php" class="nav-link"
                                        style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">DS YC CHUYỂN VIỆN</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <?php } elseif ($_SESSION['PhanQuyen'] == 3) { ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: dimgray;">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="./images/logo.png" style="width: 230px;" />
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">Xin Chào Nhân Viên YT Phường</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Trang chủ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    QUẢN LÝ HỒ SƠ
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="./dshoso.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">DANH SÁCH</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">XÁC NHẬN KHỎI BỆNH</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    CHATBOX
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="users.php" class="nav-link" style="background-color: #007bff;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p style="color: white;">Danh sách chat</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <?php } ?>