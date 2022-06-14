<?php
class HOSO
{
    public function connect()
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "duan_ptud";
        $conn = mysqli_connect($hostname, $username, $password, $dbname);
        if (!$conn) {
            echo "Database connection error" . mysqli_connect_error();
            exit();
        } else {
            mysqli_select_db($conn, $dbname);
            mysqli_set_charset($conn, 'UTF8');
            return $conn;
        }
    }
    public function get_benhnhan($MaBenhNhan)
    {
        $sql = "select * from benhnhan where MaBenhNhan='" . $MaBenhNhan . "'";
        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);


        if ($i > 0) {
            $kq = mysqli_fetch_array($ketqua);
            return $kq;
        } else exit();
    }
    public function get_tinhtrang($MaTinhTrang)
    {
        $sql = "select * from tinhtrangsuckhoe where MaTinhTrang='" . $MaTinhTrang . "'";
        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);


        if ($i > 0) {
            $kq = mysqli_fetch_array($ketqua);
            return $kq;
        } else exit();
    }
    public function get_benhvien($MaBenhVien)
    {
        $sql = "select * from benhvien where MaBenhVien='" . $MaBenhVien . "'";
        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);


        if ($i > 0) {
            $kq = mysqli_fetch_array($ketqua);
            return $kq;
        } else exit();
    }
    public function get_tang($MaTang)
    {
        $sql = "select * from tang where MaTang='" . $MaTang . "'";

        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);


        if ($i > 0) {
            $kq = mysqli_fetch_array($ketqua);
            return $kq;
        } else exit();
    }
    public function luachon($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        $kq = '';
        if ($i > 0) {
            while ($row = mysqli_fetch_array($ketqua)) {
                $id = $row[0];
                $kq = $id;
            }
        }
        return $kq;
    }


    public function themxoasua($sql)
    {
        $link = $this->connect();
        if (mysqli_query($link, $sql)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function get_MaPhuong($outgoing_id)
    {

        $link = $this->connect();
        $sql = "SELECT hosobenhan.MaPhuong FROM hosobenhan
        INNER JOIN taikhoan ON taikhoan.TaiKhoan = hosobenhan.MaBenhNhan
        WHERE taikhoan.unique_id = {$outgoing_id}";
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysqli_fetch_array($ketqua)) {
                $MaPhuong = $row['MaPhuong'];
                session_start();
                $_SESSION['MaPhuong'] = $MaPhuong;
            }
        }
    }
    public function LOAD_TT($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if ($i > 0) {
            while ($row = mysqli_fetch_array($ketqua)) {
                $MaBenhNhan = $row['MaBenhNhan'];
                $HoTen = $row['HoTen'];
                $NamSinh = $row['NamSinh'];
                $CMND_CCCD = $row['CMND_CCCD'];
                $GioiTinh = $row['GioiTinh'];
                $QuocGia = $row['QuocGia'];
                $TinhThanh = $row['TinhThanh'];
                $QuanHuyen = $row['QuanHuyen'];
                $PhuongXa = $row['PhuongXa'];
                $DiaChi = $row['DiaChi'];
                $SDT = $row['SDT'];
                $Email = $row['Email'];
                $NguonLay = $row['NguonLay'];
                $Ngay = $row['Ngay'];
                $TestNhanh = $row['TestNhanh'];
                $TestPcr = $row['TestPcr'];
                $Mota = $row['Mota'];
                $LuaChon1 = $row['LuaChon1'];
                $LuaChon2 = $row['LuaChon2'];
                $LuaChon3 = $row['LuaChon3'];
                $Checkbox = $row['Checkbox'];
                $MaTang = $row['MaTang'];
                $MaBenhVien = $row['MaBenhVien'];
                $MaTinhTrang = $row['MaTinhTrang'];
                $Hinh = $row['Hinh'];
                echo '                   
        <form action="" method="POST">
        <div class="row mt-5 form-group">
            <div class="col-3 text-right">
                <label for="txtHoten">Họ tên:</label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtHoten" value="' . $HoTen . '" required="required"
                    type="text" id="txtHoten" placeholder="Nhập vào họ và tên"
                    onblur="return kiemTraHoten();">
            </div>
            <div class="col-3">
                <span id="tbHoten" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtNamsinh">Năm sinh: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtNamsinh" value="' . $NamSinh . '" required="required" type="text"
                    id="txtNamsinh" placeholder="Nhập vào năm sinh" onblur="return kiemTraNamsinh();">
            </div>
            <div class="col-3">
                <span id="tbNamsinh" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtCccd">CCCD/CMND/Hộ chiếu: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtCccd" value="' . $CMND_CCCD . '" required="required"
                    type="text" id="txtCccd" placeholder="Nhập vào Căn cước công dân"
                    onblur="return kiemTraCccd();">
            </div>
            <div class="col-3">
                <span id="tbCccd" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label>Giới tính: </label>
            </div>
            <div class="col-6">
                <input type="radio" id="rdoNam" name="gioitinh" value="nam" checked="checked">
                <label for="rdoNam">Nam</label>
                <input type="radio" id="rdoNu" name="gioitinh" value="nữ">
                <label for="rdoNu">Nữ</label>
            </div>
            <div class="col-3">

            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtQuocgia">Quốc gia: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtQuocgia" value="' . $QuocGia . '" required="required"
                    type="text" id="txtQuocgia" placeholder="Nhập vào Quốc gia"
                    onblur="return kiemTraQuocgia();">
            </div>
            <div class="col-3">
                <span id="tbQuocgia" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtTinhthanh">Tỉnh/Thành phố: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtTinhthanh" value="' . $TinhThanh . '" required="required"
                    id="txtTinhthanh" placeholder="Nhập vào Tỉnh/thành"
                    onblur="return kiemTraTinhthanh();">
            </div>
            <div class="col-3">
                <span id="tbTinhthanh" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtQuanhuyen">Quận/huyện: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtQuanhuyen" value="' . $QuanHuyen . '" required="required"
                    id="txtQuanhuyen" placeholder="Nhập vào Quận/huyện"
                    onblur="return  kiemTraQuanhuyen();">
            </div>
            <div class="col-3">
                <span id="tbQuanhuyen" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtPhuongxa">Phường/xã: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtPhuongxa" value="' . $PhuongXa . '" required="required"
                    id="txtPhuongxa" placeholder="Nhập vào Phường/xã"
                    onblur="return kiemTraPhuongxa();">
            </div>
            <div class="col-3">
                <span id="tbPhuongxa" class="text-danger font-italic">*</span>
            </div>
        </div>
        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtDiachi">Địa chỉ cụ thể: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtDiachi"
                    value="' . $DiaChi . '" required="required"
                    type="text" id="txtDiachi" placeholder="Nhập vào địa chỉ"
                    onblur="return kiemTraDiachi();">
            </div>
            <div class="col-3">
                <span id="tbDiachi" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtQuocgia">Số điện thoại: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtSdt" value="' . $SDT . '" required="required"
                    type="number" id="txtSdt" placeholder="Nhập vào số điện thoại"
                    onblur="return kiemTraDienthoai();">
            </div>
            <div class="col-3">
                <span id="tbCccd" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtEmail">Email: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtEmail" value="' . $Email . '" type="email"
                    id="txtEmail" placeholder="Nhập vào email dạng ten@tencongty.com"
                    onblur="return kiemTraEmail();">
            </div>
            <div class="col-3">
                <span id="tbEmail" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtNguonlay">Nguồn lây: </label>
            </div>
            <div class="col-6">
                <select class="form-control" id="txtNguonlay" name="nguonlay">
                    <option value="0">Chọn...</option>
                    <option value="Ngoài cộng đồng">Ngoài cộng đồng</option>
                    <option value="Trong khu cách ly">Trong khu cách ly</option>
                </select>
            </div>
            <div class="col-3">
                <span id="tbNguonlay" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtDT">Ngày phát hiện dương tính: </label>
            </div>
            <div class="col-6">
                <input class="form-control" type="date" id="txtDT" name="ngay">
            </div>
            <div class="col-3">
                <span id="tbEmail" class="text-danger font-italic">*</span>
            </div>
        </div>
        <div class="row mt-2 form-group">
        <div class="col-3 text-right">
            <label for="txttestnhanh">Test nhanh: </label>
        </div>
        <div class="col-6">
            <select class="form-control" id="txttestnhanh" name="txttestnhanh">
                <option value="0">Chọn...</option>
                <option value="Duong Tinh">Duong Tinh</option>
            </select>
        </div>
        <div class="col-3">
            <span id="tbNguonlay" class="text-danger font-italic">*</span>
        </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtTest1">Test PCR: </label>
            </div>
            <div class="col-6">
                <select class="form-control" id="txtTest1" name="txtTest1">
                    <option value="0">Chọn...</option>
                    <option value="Dương tính">Dương tính</option>
                </select>
            </div>
            <div class="col-3">
                <span id="testpcr" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2">
            <div class="form-group">
                <label for="mota">Trước ngày phát hiện dương tính anh/chị đã đến tỉnh/thành phố,quốc
                    gia/vùng lãnh thổ nào (có thể đi qua nhiều nơi) (Trong vòng nửa tháng trở lại
                    đây)</label>
                <textarea class="form-control" id="mota" name="mota"
                    rows="4">Nhập vào đây chi tiết nguồn lây...</textarea>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Phát hiện tiếp xúc với:</th>
                            <th>Không</th>
                            <th>Có</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>Người trong nước có bệnh mắc covid-19 đã qua test nhanh-test pcr</p>
                            </td>
                            <td>
                                <input type="radio" name="radio1" value="Không" checked="checked">
                            </td>
                            <td>
                                <input type="radio" name="radio1" value="Có">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Người ngoài nước có bệnh mắc covid-19 đã qua test nhanh-test pcr</p>
                            </td>
                            <td>
                                <input type="radio" name="radio2" value="Không" checked="checked">
                            </td>
                            <td>
                                <input type="radio" name="radio2" value="Có">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Người có các biểu hiện sốt,ho,khó thở,viêm phổi nhưng chưa test</p>
                            </td>
                            <td>
                                <input type="radio" name="radio3" value="Không" checked="checked">
                            </td>
                            <td>
                                <input type="radio" name="radio3" value="Có">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <input type="checkbox" name="mang[]"
                    value="Mong muốn cách ly và theo dõi điều trị tại nhà">Mong muốn cách ly và theo dõi
                điều trị tại nhà
            </div>
        </div>


        <div class="row mt-2 form-group">
            <div class="col-9"></div>

            <div class="col-3">
                <button class="btn btn-success" id="khaibao" type="submit" name="khaibao" value="khaibao" ;>Gửi
                    tờ Khai báo</button>
                <button class="btn btn-danger" id="btnHuy" type="reset">Hủy</button>
            </div>
        </div>
    </form>';
            }
        }
    }
}