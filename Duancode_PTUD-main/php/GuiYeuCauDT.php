<?php
session_start();
ob_start();
?>
<?php
include_once 'config.php';
//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$mabenhnhan = '';
$luachon1 = '';
$luachon2 = '';
$luachon3 = '';
$luachon4 = '';
$luachon5 = '';
$luachon6 = '';
$luachon7 = '';
$luachon8 = '';
$luachon9 = '';
$luachon10 = '';
$luachon11 = '';
$luachon12 = '';
$luachon13 = '';
$luachon14 = '';
$luachon15 = '';
//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["mabenhnhan"])) {
        $mabenhnhan = $_POST['mabenhnhan'];
    }
    if (isset($_POST["ma"])) {
        $ma = $_POST['ma'];
    }
    if (isset($_POST["luachon1"])) {
        $luachon1 = $_POST['luachon1'];
    }
    if (isset($_POST["luachon2"])) {
        $luachon2 = $_POST['luachon2'];
    }
    if (isset($_POST["luachon3"])) {
        $luachon3 = $_POST['luachon3'];
    }
    if (isset($_POST["luachon4"])) {
        $luachon4 = $_POST['luachon4'];
    }
    if (isset($_POST["luachon5"])) {
        $luachon5 = $_POST['luachon5'];
    }
    if (isset($_POST["luachon6"])) {
        $luachon6 = $_POST['luachon6'];
    }
    if (isset($_POST["luachon7"])) {
        $luachon7 = $_POST['luachon7'];
    }
    if (isset($_POST["luachon8"])) {
        $luachon8 = $_POST['luachon8'];
    }
    if (isset($_POST["luachon9"])) {
        $luachon9 = $_POST['luachon9'];
    }
    if (isset($_POST["luachon10"])) {
        $luachon10 = $_POST['luachon10'];
    }
    if (isset($_POST["luachon11"])) {
        $luachon11 = $_POST['luachon11'];
    }
    if (isset($_POST["luachon12"])) {
        $luachon12 = $_POST['luachon12'];
    }
    if (isset($_POST["luachon13"])) {
        $luachon13 = $_POST['luachon13'];
    }
    if (isset($_POST["luachon14"])) {
        $luachon14 = $_POST['luachon14'];
    }
    if (isset($_POST["luachon15"])) {
        $luachon15 = $_POST['luachon15'];
    }
    //insert dữ liệu vào database table

    $sql = "INSERT INTO guiyeucaudt (LuaChon1, LuaChon2, LuaChon3, LuaChon4, LuaChon5, LuaChon6, LuaChon7, LuaChon8, LuaChon9, LuaChon10, LuaChon11, LuaChon12, LuaChon13, LuaChon14, LuaChon15,MaBenhNhan)
     VALUES ('{$luachon1}', '{$luachon2}',  '{$luachon3}',  '{$luachon4}', '{$luachon5}', '{$luachon6}', '{$luachon7}','{$luachon8}', '{$luachon9}','{$luachon10}','{$luachon11}','{$luachon12}','{$luachon13}','{$luachon14}','{$luachon15}','{$mabenhnhan}')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Gửi yêu cầu thành công!");</script>';
    } else {
        //echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//Đóng database
?>
<!DOCTYPE html>
<html>

<head>
    <title>Gửi yêu cầu</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../boostrap/fonts/glyphicons-halflings-regular.eot">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/kiemtra.js"></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">

</head>

<body>
    <div>
        <header class="row form-group" style="margin-left: 0px;margin-bottom: 0px;margin-right: 0px;">
            <div class="col-md-6" id="logo">
                <img src="../hinh/logo.png">
            </div>
            <div class="col-md-2" id="call-telephone">
                <span><i class="fa fa-phone-square" aria-hidden="true"></i></span>&ensp;
                <span><a href="tel:800 123 456"><b>800 123 456</b></a></span>
            </div>
            <div class="col-md-2" id="email">
                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>&ensp;
                <span class="iconcont"><a data-scroll href="#"><b>healthylife@gmail.com</b></a></span>
            </div>
            <div class="col-md-2" id="time">
                <?php if (isset($_SESSION['TaiKhoan'])) { ?>
                <span><a data-scroll href="../logout.php"><i class="fa fa-user-circle" aria-hidden="true"></i>đăng
                        xuất</a></span>&ensp;
                <?php } else { ?>
                <span><a data-scroll href="../login.php"><i class="fa fa-user-circle" aria-hidden="true"></i>đăng
                        nhập</a></span>&ensp;
                <?php } ?>
            </div>
        </header>
        <nav class="menu">
            <ul>
                <li><a href="../index.php"><i class="fas fa-home"></i>&ensp; <b>Trang Chủ</b></a></li>
                <li><a href="../hoso.php"><i class="fa fa-address-book" aria-hidden="true"></i></i>&ensp; <b>Hồ
                            sơ</b></a>
                </li>
                <li><a href="./Khaibao.php"><i class="fa fa-file" aria-hidden="true"></i>&ensp; <b>Khai báo F0</b></a>
                </li>
                <li><a href="./TuVan.php"><i class="fa fa-envelope-open" aria-hidden="true"></i>&ensp; <b>Tư Vấn</b></a>
                </li>
                <li><a href="./TinTuc.php"><i class="far fa-newspaper">&ensp;</i><b>Tin Tức</b></a></li>
                <li><a href=""><i class="fas fa-stethoscope">&ensp;</i><b>Gửi yêu cầu</b></a></li>
            </ul>
        </nav>
        <section style="width: 100%; height: auto;">
            <div class="container" id="news">
                <div class="heading">
                    <div class="text-center"><img src="../hinh/icon-logo.png" alt="#"></div>
                    <h2>Mẫu đơn khám sàng lọc</h2>
                </div>
                <div class="row mt-2">
                    <form action="" method="POST">
                        <div class="col-12">
                            <div class="row mt-5 form-group">
                                <div class="col-3 text-right">
                                    <label for="txtMabenhnhan">ID:</label>
                                </div>
                                <div class="col-6">
                                    <input class="form-control" name="mabenhnhan"
                                        placeholder="Nhập vào ID mới được cung cấp VD: 1" required="required"
                                        value="<?php echo $_SESSION['TaiKhoan'] ?>" type="text" id="txtMabenhnhan">
                                </div>
                                <div class="col-3">
                                    <span id="tbHoten" class="text-danger font-italic">*</span>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Không</th>
                                        <th>Có</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>Bạn có tiêm chủng vacxin covid-19 hay chưa?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon1" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon1" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Bạn có bất kỳ bệnh trạng nào sau đây không? Ung Thư, Bệnh Thận Mạn Tính,
                                                COPD (Bệnh Tắc Nghẽn Phổi Mạn
                                                Tính), Bệnh Tim như suy tim, bệnh động mạch vành hoặc bệnh cơ tim, Suy
                                                Giảm Miễn Dịch do ghép tạng,
                                                Béo Phì = BMI>30 nhưng <40, béo phì nghiêm trọng BMI>40, Mang Thai, Bệnh
                                                    Hồng Cầu Liềm, Hút Thuốc,
                                                    Tiểu Đường Loại 2</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon2" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon2" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Bạn đã từng bị phản ứng dị ứng nghiêm trọng (ví dụ: sốc phản vệ) sau khi
                                                tiêm Vắc-xin COVID19?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon3" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon3" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Bạn có bị rối loạn chảy máu hoặc đang sử dụng thuốc chống đông máu không?
                                            </p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon4" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon4" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Bạn có bị sốt không?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon5" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon5" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Bạn có mang thai không?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon6" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon6" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Bạn có đang nuôi con (cho bú) bằng sữa mẹ không?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon7" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon7" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Bạn đã từng có phản ứng dị ứng nghiêm trọng với bất kỳ nguồn nào, bao gồm
                                                thức ăn, vật nuôi, chất gây dị ứng trong môi trường hoặc thuốc uống?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon8" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon8" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Quý vị đã từng có kết quả xét nghiệm dương tính với COVID-19 hoặc đã được
                                                một bác sĩ cho biết là quý vị mắc COVID-19?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon9" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon9" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Quý vị đã từng bị phản ứng dị ứng nghiêm trọng với một vắc-xin khác hoặc
                                                bất kỳ thuốc tiêm nào?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon10" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon10" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Quý vị có bị suy giảm miễn dịch (chẳng hạn như ung thư, bệnh bạch cầu,
                                                HIV/AIDS) hoặc đang sử dụng các thuốc ảnh hưởng đến hệ miễn dịch của quý
                                                vị?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon11" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon11" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Quý vị có cảm thấy bị bệnh không?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon12" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon12" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Quý vị đã được tiêm bất kỳ vắc-xin nào trong 14 ngày vừa qua?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon13" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon13" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Quý vị có từng có phản ứng dị ứng với một thành phần của một loại vắc-xin
                                                COVID-19 – bao gồm Polyethylene Glycol (PEG) (được tìm thấy trong một số
                                                thuốc như thuốc nhuận tràng) hoặc Polysorbate (được tìm thấy trong các
                                                viên nén phủ phim và thuốc steroid tiêm tĩnh mạch)?</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon14" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon14" value="Có">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Quý vị đã từng được trị liệu miễn dịch thụ động để điều trị COVID-19?</p>
                                        <td>
                                            <input type="radio" name="luachon15" value="Không" checked="checked">
                                        </td>
                                        <td>
                                            <input type="radio" name="luachon15" value="Có">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-2 form-group">
                            <div class="col-9"></div>
                            <div class="col-3">
                                <button class="btn btn-success" id="btnDangky" type="submit" name="guiyeucau" ;>Gửi yêu
                                    cầu</button>
                                <button class="btn btn-danger" id="btnHuy" type="reset">Hủy</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="footer2 mt-3">
                <div class="container">
                    <div class="row form-group">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="footer-text">
                                <p>© 2022 healthylife@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-1"><a href="#"><img src="../hinh/facebook.png"></a></div>
                        <div class="col-md-1"><a href="#"><img src="../hinh/tt.png"></a></div>
                        <div class="col-md-1"><a href="#"><img src="../hinh/instagram.png"></a></div>
                        <div class="col-md-1"><a href="#"><img src="../hinh/youtobe.png"></a></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>