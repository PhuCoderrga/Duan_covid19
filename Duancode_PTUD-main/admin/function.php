<?php
class quanlyhoso
{
    private function connect()
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
    function taotk($TaiKhoan, $MatKhau)
    {
        $link = $this->connect();
        $sql = "select TaiKhoan, MatKhau from taikhoan_benhnhan where TaiKhoan !='$TaiKhoan' limit 1";
        $ketqua = mysqli_query($link, $sql);
        $i = mysqli_num_rows($ketqua);
        if ($i == 1) {
            while ($row = mysqli_fetch_array($ketqua)) {
            }
            return 1;
        } else {
            return 0;
        }
    }
    public function loadhoso($sql)
    {
        $link = $this->connect();
        $ketqua = mysqli_query($link, $sql);
        mysqli_close($link);
        $i = mysqli_num_rows($ketqua);
        if ($i >= 0) {
            while ($row = mysqli_fetch_array($ketqua)) {
                $mabenhnhan = $row['MaBenhNhan'];
                $hoten = $row['HoTen'];
                $cmnd = $row['CMND_CCCD'];
                $namsinh = $row['NamSinh'];
                $diachi = $row['DiaChi'];
                $sdt = $row['SDT'];
                $mahoso = $row['MaHoSo'];
                $matinhtrang = $row['MaTinhTrang'];
                $tentinhtrang = $row['TenTinhTrang'];
                echo '
            <table >
                <tr>
                    <td class="row-1">Mã Bệnh Nhân:</td>
                    <td>' . $mabenhnhan . '</td>
                </tr>
                <tr>
                    <td class="row-1">Họ và Tên:</td>
                    <td>' . $hoten . '</td>
                </tr>
                <tr>
                    <td class="row-1">CMND:</td>
                    <td>' . $cmnd . '</td>
                </tr>
                <tr>
                    <td class="row-1">Năm sinh:</td>
                    <td>' . $namsinh . '</td>
                </tr>
                <tr>
                    <td class="row-1">SĐT:</td>
                    <td>' . $sdt . '</td>
                </tr>
                <tr>
                    <td class="row-1">Địa chỉ:</td>
                    <td>' . $diachi . '</td>
                </tr>
                <tr>
                    <td class="row-1">Tình trạng sức khỏe:</td>
                    <td>' . $tentinhtrang . '</td>
                </tr>
                <tr>
                    <td><a href="" style="text-align:center;">Sửa</a></td>
                    <td><a href="">Hủy</a></td>
                </tr>
                </table>
            ';
            }
        } else {
            echo ' khong co du lieu';
        }
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
}