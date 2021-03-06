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
                <label for="txtHoten">H??? t??n:</label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtHoten" value="' . $HoTen . '" required="required"
                    type="text" id="txtHoten" placeholder="Nh???p v??o h??? v?? t??n"
                    onblur="return kiemTraHoten();">
            </div>
            <div class="col-3">
                <span id="tbHoten" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtNamsinh">N??m sinh: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtNamsinh" value="' . $NamSinh . '" required="required" type="text"
                    id="txtNamsinh" placeholder="Nh???p v??o n??m sinh" onblur="return kiemTraNamsinh();">
            </div>
            <div class="col-3">
                <span id="tbNamsinh" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtCccd">CCCD/CMND/H??? chi???u: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtCccd" value="' . $CMND_CCCD . '" required="required"
                    type="text" id="txtCccd" placeholder="Nh???p v??o C??n c?????c c??ng d??n"
                    onblur="return kiemTraCccd();">
            </div>
            <div class="col-3">
                <span id="tbCccd" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label>Gi???i t??nh: </label>
            </div>
            <div class="col-6">
                <input type="radio" id="rdoNam" name="gioitinh" value="nam" checked="checked">
                <label for="rdoNam">Nam</label>
                <input type="radio" id="rdoNu" name="gioitinh" value="n???">
                <label for="rdoNu">N???</label>
            </div>
            <div class="col-3">

            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtQuocgia">Qu???c gia: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtQuocgia" value="' . $QuocGia . '" required="required"
                    type="text" id="txtQuocgia" placeholder="Nh???p v??o Qu???c gia"
                    onblur="return kiemTraQuocgia();">
            </div>
            <div class="col-3">
                <span id="tbQuocgia" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtTinhthanh">T???nh/Th??nh ph???: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtTinhthanh" value="' . $TinhThanh . '" required="required"
                    id="txtTinhthanh" placeholder="Nh???p v??o T???nh/th??nh"
                    onblur="return kiemTraTinhthanh();">
            </div>
            <div class="col-3">
                <span id="tbTinhthanh" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtQuanhuyen">Qu???n/huy???n: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtQuanhuyen" value="' . $QuanHuyen . '" required="required"
                    id="txtQuanhuyen" placeholder="Nh???p v??o Qu???n/huy???n"
                    onblur="return  kiemTraQuanhuyen();">
            </div>
            <div class="col-3">
                <span id="tbQuanhuyen" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtPhuongxa">Ph?????ng/x??: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtPhuongxa" value="' . $PhuongXa . '" required="required"
                    id="txtPhuongxa" placeholder="Nh???p v??o Ph?????ng/x??"
                    onblur="return kiemTraPhuongxa();">
            </div>
            <div class="col-3">
                <span id="tbPhuongxa" class="text-danger font-italic">*</span>
            </div>
        </div>
        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtDiachi">?????a ch??? c??? th???: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtDiachi"
                    value="' . $DiaChi . '" required="required"
                    type="text" id="txtDiachi" placeholder="Nh???p v??o ?????a ch???"
                    onblur="return kiemTraDiachi();">
            </div>
            <div class="col-3">
                <span id="tbDiachi" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtQuocgia">S??? ??i???n tho???i: </label>
            </div>
            <div class="col-6">
                <input class="form-control" name="txtSdt" value="' . $SDT . '" required="required"
                    type="number" id="txtSdt" placeholder="Nh???p v??o s??? ??i???n tho???i"
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
                    id="txtEmail" placeholder="Nh???p v??o email d???ng ten@tencongty.com"
                    onblur="return kiemTraEmail();">
            </div>
            <div class="col-3">
                <span id="tbEmail" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtNguonlay">Ngu???n l??y: </label>
            </div>
            <div class="col-6">
                <select class="form-control" id="txtNguonlay" name="nguonlay">
                    <option value="0">Ch???n...</option>
                    <option value="Ngo??i c???ng ?????ng">Ngo??i c???ng ?????ng</option>
                    <option value="Trong khu c??ch ly">Trong khu c??ch ly</option>
                </select>
            </div>
            <div class="col-3">
                <span id="tbNguonlay" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2 form-group">
            <div class="col-3 text-right">
                <label for="txtDT">Ng??y ph??t hi???n d????ng t??nh: </label>
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
                <option value="0">Ch???n...</option>
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
                    <option value="0">Ch???n...</option>
                    <option value="D????ng t??nh">D????ng t??nh</option>
                </select>
            </div>
            <div class="col-3">
                <span id="testpcr" class="text-danger font-italic">*</span>
            </div>
        </div>

        <div class="row mt-2">
            <div class="form-group">
                <label for="mota">Tr?????c ng??y ph??t hi???n d????ng t??nh anh/ch??? ???? ?????n t???nh/th??nh ph???,qu???c
                    gia/v??ng l??nh th??? n??o (c?? th??? ??i qua nhi???u n??i) (Trong v??ng n???a th??ng tr??? l???i
                    ????y)</label>
                <textarea class="form-control" id="mota" name="mota"
                    rows="4">Nh???p v??o ????y chi ti???t ngu???n l??y...</textarea>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Ph??t hi???n ti???p x??c v???i:</th>
                            <th>Kh??ng</th>
                            <th>C??</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p>Ng?????i trong n?????c c?? b???nh m???c covid-19 ???? qua test nhanh-test pcr</p>
                            </td>
                            <td>
                                <input type="radio" name="radio1" value="Kh??ng" checked="checked">
                            </td>
                            <td>
                                <input type="radio" name="radio1" value="C??">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Ng?????i ngo??i n?????c c?? b???nh m???c covid-19 ???? qua test nhanh-test pcr</p>
                            </td>
                            <td>
                                <input type="radio" name="radio2" value="Kh??ng" checked="checked">
                            </td>
                            <td>
                                <input type="radio" name="radio2" value="C??">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Ng?????i c?? c??c bi???u hi???n s???t,ho,kh?? th???,vi??m ph???i nh??ng ch??a test</p>
                            </td>
                            <td>
                                <input type="radio" name="radio3" value="Kh??ng" checked="checked">
                            </td>
                            <td>
                                <input type="radio" name="radio3" value="C??">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <input type="checkbox" name="mang[]"
                    value="Mong mu???n c??ch ly v?? theo d??i ??i???u tr??? t???i nh??">Mong mu???n c??ch ly v?? theo d??i
                ??i???u tr??? t???i nh??
            </div>
        </div>


        <div class="row mt-2 form-group">
            <div class="col-9"></div>

            <div class="col-3">
                <button class="btn btn-success" id="khaibao" type="submit" name="khaibao" value="khaibao" ;>G???i
                    t??? Khai b??o</button>
                <button class="btn btn-danger" id="btnHuy" type="reset">H???y</button>
            </div>
        </div>
    </form>';
            }
        }
    }
}