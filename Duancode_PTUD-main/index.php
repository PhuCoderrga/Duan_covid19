<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Trung tâm tiếp nhận điều trị covid-19</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</head>
</head>

<body>
    <div>
        <?php include('header.php'); ?>
        <section>
            <div class="slide">
                <article class="lever3">
                    <div class="huong">
                        <i class=" trai fas fa-caret-left" onclick="Back();"></i>
                        <i class=" phai fas fa-caret-right" onclick="Next();"></i>
                    </div>
                    <div class="lv3">
                        <img src="./hinh/banner1.png">
                        <img src="./hinh/banner2.png">
                        <img src="./hinh/banner3.png">
                    </div>
                </article>
                <script>
                var KichThuoc = document.getElementsByClassName("lever3")[0].clientWidth;
                var ChuyenSlide = document.getElementsByClassName("lv3")[0];
                var Img = ChuyenSlide.getElementsByTagName("img");
                var Max = KichThuoc * Img.length;
                Max -= KichThuoc;
                var Chuyen = 0;

                function Next() {
                    if (Chuyen < Max) Chuyen += KichThuoc;
                    else Chuyen = 0;
                    ChuyenSlide.style.marginLeft = '-' + Chuyen + 'px';
                }

                function Back() {
                    if (Chuyen == 0) Chuyen = Max;
                    else Chuyen -= KichThuoc;
                    ChuyenSlide.style.marginLeft = '-' + Chuyen + 'px';
                }

                setInterval(function() {
                    Next();
                }, 2500);
                </script>
            </div>
            <div class="container" id="news">
                <div class="heading">
                    <div class="text-center"><img src="./hinh/icon-logo.png" alt="#"></div>
                    <h2><b>Thông tin về covid-19</b></h2>
                </div>
                <div class="news_1">
                    <div class="row form-group">
                        <div class="col-md-6"
                            style="height: 315px; background-color: rgb(215, 207, 207); border-radius: 20px;box-shadow: 10px 10px 5px rgb(99, 166, 200);">
                            <h4>Giới thiệu về COVID-19</h4>
                            <p class="">COVID-19 (bệnh vi-rút corona 2019) là một bệnh do vi-rút có tên SARS-CoV-2 gây
                                ra và được phát hiện vào ​​​​​ tháng 12 năm 2019 ở Vũ Hán, Trung Quốc. Căn bệnh này rất
                                dễ lây lan và đã nhanh chóng lan ra khắp thế giới.</p>
                            <p class="">COVID-19 thường gây ra các triệu chứng hô hấp, có thể cảm thấy giống như cảm
                                lạnh, cúm hoặc viêm phổi. COVID-19 có thể tấn công không chỉ phổi và hệ hô hấp của quý
                                vị. Các bộ phận khác của cơ thể quý vị cũng có thể bị ảnh hưởng bởi căn bệnh này.</p>
                            <a href=""><button type="button" class="btn btn-primary">Learn More</button> </a>
                        </div>
                        <div class="col-md-6">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/AB3g8iyclG4"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                style="border-radius: 20px;box-shadow: 10px 10px 5px rgb(99, 166, 200);"></iframe>
                        </div>
                    </div>
                </div>
                <div class="new_2" style="padding-top: 25px;">
                    <div class="row form-group">
                        <div class="col-md-3">
                            <div id="news1">
                                <img src="./hinh/new1.png" class="tintuc"><br />
                                <a href="" style="color: black; "> <b> Cả nước ghi nhận 45.886 ca Covid-19 mới, 21
                                        trường hợp tử vong</b></a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="news1">
                                <img src="./hinh/new1.png" class="tintuc"><br />
                                <a href="" style="color: black;"> <b> Cả nước ghi nhận 45.886 ca Covid-19 mới, 21
                                        trường hợp tử vong</b></a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="news1">
                                <img src="./hinh/new1.png" class="tintuc"><br />
                                <a href="" style="color: black;"> <b> Cả nước ghi nhận 45.886 ca Covid-19 mới, 21
                                        trường hợp tử vong</b></a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="news1">
                                <img src="./hinh/new1.png" class="tintuc"><br />
                                <a href="" style="color: black;"> <b> Cả nước ghi nhận 45.886 ca Covid-19 mới, 21
                                        trường hợp tử vong</b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner_form">
                <div class="row form-group">
                    <div class="col-md-8">
                        <table class="banner-left">
                            <tr>
                                <td><span class="banner-left1"><img src="./hinh/service-icon1.png" alt="#" /></span>
                                    <h6>PREMIUM FACILITIES</h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                </td>
                                <td>
                                    <span class="banner-left1"><img src="./hinh/service-icon2.png" alt="#" /></span>
                                    <h6>LARGE LABORATORY</h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                </td>
                                <td>
                                    <span class="banner-left1"><img src="./hinh/service-icon3.png" alt="#" /></span>
                                    <h6>DETAILED SPECIALIST</h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="banner-left1"><img src="./hinh/service-icon4.png" alt="#" /></span>
                                    <h6>CHILDREN CARE CENTER</h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                </td>
                                <td>
                                    <span class="banner-left1"><img src="./hinh/service-icon5.png" alt="#" /></span>
                                    <h6>FINE INFRASTRUCTURE</h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                </td>
                                <td>
                                    <span class="banner-left1"><img src="./hinh/service-icon6.png" alt="#" /></span>
                                    <h6>ANYTIME BLOOD BANK</h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing.</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <form class="">
                            <table
                                style="width: 90%;background-color: aliceblue; margin-top: 30px; border-radius: 20px;"
                                id="form">
                                <tr>
                                    <td colspan="2">
                                        <h3
                                            style="text-align: center; color: #157fda;border: 1px solid #157fda; border-radius: 20px;">
                                            Gửi yêu cầu điều trị</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="fname">Họ và Tên:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="fname" name="fname" placeholder="Nguyễn Văn A">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="fname">Ngày sinh:</label>
                                    </td>
                                    <td>
                                        <input type="date" id="birthday" name="birthday">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="fname">CMND/CCCD:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="cmnd" name="cmnd" placeholder="381903485">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="fname">Địa chỉ:</label>
                                    </td>
                                    <td>
                                        <input type="text" id="diachi" name="diachi">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label for="fname">Tình trạng sức khỏe</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="checkbox" id="tinhtrang1" name="tinhtrang1" value="Ho">
                                        <label for="vehicle1"> Ho</label><br>
                                        <input type="checkbox" id="tinhtrang2" name="tinhtrang2" value="sot">
                                        <label for="vehicle2"> Sốt</label><br>
                                        <input type="checkbox" id="tinhtrang3" name="tinhtrang3" value="khotho">
                                        <label for="vehicle3"> Khó thở</label><br>
                                        <input type="checkbox" id="tinhtrang4" name="tinhtrang4" value="nhucdau">
                                        <label for="vehicle3"> Nhức đầu</label><br>
                                        <input type="checkbox" id="tinhtrang5" name="tinhtrang5" value="khac">
                                        <label for="vehicle3"> Khác</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <?php
                        if(isset($_REQUEST['guiyeucau'])){
                            if(!isset($_REQUEST['khaibao'])){
                                // if($_REQUEST['txtEmail'] == '' || $_REQUEST['txtPassword'] == '' || $_REQUEST['txtRePass'] == ''){
                                    echo '<script>alert("Chưa khai báo!");</script>';
                                    echo header("refresh:0;url='./php/Khaibao.php'");
                                //}
                                // else{
                                //     echo "Đăng ký thành công!";
                                //     $file = fopen("data.txt","w");
                                //     fwrite($file, $_POST['txtEmail']."\n");
                                //     fwrite($file, $_POST['txtPassword']);
                                //     fclose($file);
                                // }
                            }
                            else{
                                echo header("refresh:0;url='./php/GuiYeuCauDT.php'");
                            }
                        }
                        ?>
            <div class="benhvien">
                <div class="header_benhvien">
                    <div class="heading">
                        <div class="text-center"><img src="./hinh/icon-logo.png" alt="#"></div>
                        <h2>Các bệnh viện điều trị</h2>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-3">
                        <div id="benhvien_lv1">
                            <img src="./hinh/benhvien1.png" class="benhvien_lv2"><br />
                            <a href="" style="color: black; "> <b> Bệnh viện Phạm Ngọc Thạch</b></a>
                            <br>
                            <p>Địa chỉ: 120 Hồng Bàng, Phường 12, Quận 5, TP.HCM</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="benhvien_lv1">
                            <img src="./hinh/benhvien1.png" class="benhvien_lv2"><br />
                            <a href="" style="color: black; "> <b> Bệnh viện Phạm Ngọc Thạch</b></a>
                            <br>
                            <p>Địa chỉ: 120 Hồng Bàng, Phường 12, Quận 5, TP.HCM</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="benhvien_lv1">
                            <img src="./hinh/benhvien1.png" class="benhvien_lv2"><br />
                            <a href="" style="color: black; "> <b> Bệnh viện Phạm Ngọc Thạch</b></a>
                            <br>
                            <p>Địa chỉ: 120 Hồng Bàng, Phường 12, Quận 5, TP.HCM</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="benhvien_lv1">
                            <img src="./hinh/benhvien1.png" class="benhvien_lv2"><br />
                            <a href="" style="color: black; "> <b> Bệnh viện Phạm Ngọc Thạch</b></a>
                            <br>
                            <p>Địa chỉ: 120 Hồng Bàng, Phường 12, Quận 5, TP.HCM</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="phuongphap">
                <div class="header_phuongphap">
                    <div class="heading">
                        <div class="text-center"><img src="./hinh/icon-logo.png" alt="#"></div>
                        <h2>Phương pháp điều trị</h2>
                    </div>
                </div>
                <div class="row form-group" id="phuongphap1"
                    style="margin-left: 0px;margin-right: 0px;padding-top: 0px;margin-bottom: 0px; padding-top: 40px;">
                    <div class="col-md-6" id="phuongphap2">
                        <h4 style="text-align:center;">Các yếu tố xác định F0 </h4>
                        <div>
                            <ul>
                                <li>Có kết quả xét nghiệm dương tính COVID-19 bằng phương pháp PCR</li>
                                <li>Tiếp xúc gần (F1) và có kết quả xét nghiệm
                                    nhanh dương tính.</li>
                                <li>Có biểu hiện lâm sàng nghi mắc COVID-19
                                    (ca bệnh nghi ngờ và có kết quả xét
                                    nghiệm nhanh dương tính và có yếu tố
                                    dịch tễ (không bao gồm F1).
                                </li>
                                <li>Có kết quả xét nghiệm nhanh dương tính
                                    2 lần liên tiếp (xét nghiệm lần 2 trong vòng
                                    8 giờ kể từ khi có kết quả xét nghiệm lần 1)
                                    và có yếu tố dịch tễ (không bao gồm F1).</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6" style="text-align: center;">
                        <h4>Tháp 5 tầng điều trị bệnh nhân COVID-19 ở TPHCM </h4>
                        <img src="./hinh/banner4.png">
                    </div>
                </div>
            </div>
            <div class="thongke">
                <div class="header_thongke">
                    <div class="heading">
                        <div class="text-center"><img src="./hinh/icon-logo.png" alt="#"></div>
                        <h2>Thống kê dịch covid-19</h2>
                    </div>
                </div>
                <div style="padding-top: 20px;">
                    <div>
                        <iframe src="https://covid19.vnanet.vn/home/indexwigetsummary" frameborder="0" width="100%"
                            style="min-height: 200px;"> </iframe>
                    </div>
                    <div>
                        <iframe src="https://covid19.vnanet.vn/home/indexwiget" frameborder="0" width="100%"
                            style="min-height: 430px;"> </iframe>
                    </div>
                </div>
            </div>
        </section>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>