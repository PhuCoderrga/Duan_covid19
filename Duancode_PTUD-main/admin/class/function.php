<?php
class quanly
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
	public function loadtang($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$matang = $row['MaTang'];
				$tentang = $row['TenTang'];
				echo '<li><a href="?id=' . $matang . '">' . $tentang . '</a></li>';
			}
		} else {
			echo ' khong co du lieu';
		}
	}
	public function loadtentang($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$matang = $row['MaTang'];
				$tentang = $row['TenTang'];
				echo '<h3 style="text-align: center;">Danh sách bệnh viện của ' . $tentang . '</h3>';
			}
		} else {
			echo ' khong co du lieu';
		}
	}
	public function load_ctbenhvien($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$mabenhvien = $row['MaBenhVien'];
				$tenbenhvien = $row['TenBenhVien'];
				$slbacsi = $row['SLBacSi'];
				$slyta = $row['SLYTa'];
				$diachi = $row['DiaChi'];
				$sogiuongbenh = $row['SoGiuongBenh'];
				$sogiuongtrong = $row['SoGiuongBenhTrong'];
				$sobenhnhandangdieutri = $row['SoBenhNhanDangDieuTri'];
				$tentang = $row['TenTang'];
				echo '
                <tr>
                    <td class="row-1">Mã Bệnh Viện:</td>
                    <td>' . $mabenhvien . '</td>
                </tr>
                <tr>
                    <td class="row-1">Tên bệnh viên:</td>
                    <td>' . $tenbenhvien . '</td>
                </tr>
                <tr>
                    <td class="row-1">Địa Chỉ:</td>
                    <td>' . $diachi . '</td>
                </tr>
                <tr>
                    <td class="row-1">Số lượng bác sĩ:</td>
                    <td>' . $slbacsi . '</td>
                </tr>
                <tr>
                    <td class="row-1">Số lượng y tá:</td>
                    <td>' . $slyta . '</td>
                </tr>
                <tr>
                    <td class="row-1">Sức chứa của bệnh viện:</td>
                    <td>' . $sogiuongbenh . '</td>
                </tr>
				<tr>
                    <td class="row-1">Số lượng còn có thể tiếp nhận:</td>
                    <td>' . $sogiuongtrong . '</td>
                </tr>
				<tr>
                    <td class="row-1">Số lượng bệnh nhân đang điều trị:</td>
                    <td>' . $sobenhnhandangdieutri . '</td>
                </tr>
				<tr>
                    <td class="row-1">Bệnh viện ở tầng:</td>
                    <td>' . $tentang . '</td>
                </tr>
            ';
			}
		} else {
			echo ' khong co du lieu';
		}
	}
	public function load_benhvien($sql)
	{
		$link = $this->connect();

		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				$mabenhvien = $row['MaBenhVien'];
				$tenbenhvien = $row['TenBenhVien'];
				$diachi = $row['DiaChi'];
				$sogiuongtrong = $row['SoGiuongBenhTrong'];
				$sobenhnhandangdieutri = $row['SoBenhNhanDangDieuTri'];
				$matang = $row['MaTang'];
				echo '
					<tr>
					<td>' . $dem . '</td>
                    <td>' . $tenbenhvien . '</td>
                    <td>' . $diachi . '</td>
                    <td>' . $sogiuongtrong . '</td>
                    <td>' . $sobenhnhandangdieutri . '</td>
					<td><a href="ctbenhvien.php?idbv=' . $mabenhvien . '">Xem</a>
					</tr>
					';
				$dem++;
			}
		}
	}
	public function load_dshoso($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				$mahoso = $row['MaHoSo'];
				$mabenhnhan = $row['MaBenhNhan'];
				$matinhtrang = $row['MaTinhTrang'];
				$maphuong = $row['MaPhuong'];
				$tenbenhnhan = $row['HoTen'];
				$namsinh = $row['NamSinh'];
				$diachi = $row['DiaChi'];
				$phuong = $row['TenPhuong'];
				$tinhtrang = $row['TenTinhTrang'];
				echo '
					<tr>
					<td>' . $dem . '</td>
					<td>' . $mahoso . '</td>
                    <td>' . $tenbenhnhan . '</td>
                    <td>' . $diachi . '</td>
                    <td>' . $namsinh . '</td>
                    <td>' . $tinhtrang . '</td>
					<td><a href="capnhaths.php?id=' . $mahoso . '">Cập nhật</a>&emsp;&emsp;&emsp;
					<a href="cthoso.php?id=' . $mahoso . '">Xem</a>
					</td>
					</tr>
					';
				$dem++;
			}
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
	public function loadcompo_trangthai($sql, $idchon)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="tt" id="trangthai">';
			echo '<option>Cập nhật tình trạng</option>';
			while ($row = mysqli_fetch_array($ketqua)) {
				$matinhtrang = $row['MaTinhTrang'];
				$tentinhtrang = $row['TenTinhTrang'];
				if ($matinhtrang == $idchon) {
					echo '<option value="' . $matinhtrang . '" selected="selected">' . $tentinhtrang . '</option>';
				} else {
					echo '<option value="' . $matinhtrang . '">' . $tentinhtrang . '</option>';
				}
			}
			echo '</select>';
		} else {
			echo ' khong co du lieu';
		}
	}
	public function load_cthoso($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
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
                    <td class="row-1">Tình trạng:</td>
                    <td>' . $tentinhtrang . '</td>
                </tr>
            ';
			}
		} else {
			echo ' khong co du lieu';
		}
	}
	public function laycot($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		$giaitri = '';
		if ($i > 0) {
			while ($row = mysqli_fetch_array($ketqua)) {
				$id = $row[0];
				$giaitri = $id;
			}
		}
		return $giaitri;
	}
	public function load_suahoso($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
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
            ';
			}
		} else {
			echo ' khong co du lieu';
		}
	}
}