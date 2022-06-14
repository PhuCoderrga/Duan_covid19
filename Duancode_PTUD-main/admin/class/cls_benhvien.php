<?php
class BENHVIEN
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
	public function myupfile($name, $tmp_name, $folder)
	{
		if ($name != '' && $tmp_name != '' && $folder != '') {
			$newname = $folder . "/" . $name;
			if (move_uploaded_file($tmp_name, $newname)) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}
	public function loadcompo_tang($sql, $idchon)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="tang" id="tang">';
			echo '<option>Chọn tầng tương ứng</option>';
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaTang = $row['MaTang'];
				$TenTang = $row['TenTang'];
				if ($MaTang == $idchon) {
					echo '<option value="' . $MaTang . '" selected="selected">' . $TenTang . '</option>';
				} else {
					echo '<option value="' . $MaTang . '">' . $TenTang . '</option>';
				}
			}
			echo '</select>';
		} else {
			echo ' khong co du lieu';
		}
	}
	public function loadcompo_benhvien($sql, $idchon)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="benhvien" id="benhvien">';
			echo '<option>Chọn bệnh viện/phường tương ứng</option>';
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaBenhVien = $row['MaBenhVien'];
				$TenBenhVien = $row['TenBenhVien'];
				if ($MaBenhVien == $idchon) {
					echo '<option value="' . $MaBenhVien . '" selected="selected">' . $TenBenhVien . '</option>';
				} else {
					echo '<option value="' . $MaBenhVien . '">' . $TenBenhVien . '</option>';
				}
			}
			echo '</select>';
		} else {
			echo ' khong co du lieu';
		}
	}
	public function loadcompo_phuong($sql, $idchon)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="phuong" id="phuong">';
			echo '<option>Chọn bệnh viện/phường tương ứng</option>';
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaPhuong = $row['MaPhuong'];
				$TenPhuong = $row['TenPhuong'];
				if ($TenPhuong == $idchon) {
					echo '<option value="' . $MaPhuong . '" selected="selected">' . $TenPhuong . '</option>';
				} else {
					echo '<option value="' . $MaPhuong . '">' . $TenPhuong . '</option>';
				}
			}
			echo '</select>';
		} else {
			echo ' khong co du lieu';
		}
	}
	public function loadcompo_tinhtrang($sql, $idchon)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="tinhtrang" id="tinhtrang">';
			echo '<option>Chọn tình trạng mới</option>';
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaTinhTrang = $row['MaTinhTrang'];
				$TenTinhTrang = $row['TenTinhTrang'];
				if ($MaTinhTrang == $idchon) {
					echo '<option value="' . $MaTinhTrang . '" selected="selected">' . $TenTinhTrang . '</option>';
				} else {
					echo '<option value="' . $MaTinhTrang . '">' . $TenTinhTrang . '</option>';
				}
			}
			echo '</select>';
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
	public function loadds_benhvien($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '
			<form action="" method="post">
			<table width="100%" border="1px solid">
			<tr>
				<th align="center" style="font-size: 50px;" colspan="13" width="100%">QUẢN LÝ BỆNH VIỆN</th>
			</tr>
			<tr style= "font-size: 1rem;">
				<td width="5%" align="center"><strong>STT</strong></td>
				<td width="20%" align="center"><strong>Tên bệnh viện</strong></td>
				<td width="9%" align="center"><strong>Tầng</strong></td>
				<td width="9%" align="center"><strong>SL bác sĩ</strong></td>
				<td width="9%" align="center"><strong>SL Y Tá</strong></td>
				<td width="9%" align="center"><strong>SL giường Bệnh</strong></td>
				<td width="9%" align="center"><strong>SL giường trống</strong></td>
				<td width="9%" align="center"><strong>SL đang điều trị</strong></td>
				<td colspan="4" align="center"><strong>Chỉnh sửa</strong></td>
			</tr>';
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaBenhVien = $row['MaBenhVien'];
				$TenBenhVien = $row['TenBenhVien'];
				$MaTang = $row['MaTang'];
				$SLBacSi = $row['SLBacSi'];
				$SLYta = $row['SLYta'];
				$SLGiuongBenh = $row['SoGiuongBenh'];
				$SoGiuongBenhTrong = $row['SoGiuongBenhTrong'];
				$SoBenhNhanDangDieuTri = $row['SoBenhNhanDangDieuTri'];
				$TrangThai = $row['TrangThai'];
				if ($TrangThai != 0) {
					echo '
					<tr>
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $dem . '</a></td>
						<td style="font-size: 18px; padding-left: 10px;"><a href="suasp.php?id=' . $MaBenhVien . '">' . $TenBenhVien . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $MaTang . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $SLBacSi . '</a></td>	
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $SLYta . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $SLGiuongBenh . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $SoGiuongBenhTrong . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $SoBenhNhanDangDieuTri . '</a></td>
						<input type="hidden" name="id_product" value="' . $MaBenhVien . '">
						<td align="center" colspan="4">
						<a class="btn btn-danger" href="Delete_benhvien.php?id=' . $MaBenhVien . '" role="button">Xóa</a>
						<a class="btn btn-warning" href="Update_benhvien.php?id=' . $MaBenhVien . '" role="button">Sửa</a>
						</td>
						
					</tr>';
					$dem++;
				}
			}
			echo '
			</table>
			</form>';
		} else {
			echo 'Không có dữ liệu';
		}
	}
	public function loadds_tang($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '
			<form action="" method="post">
			<table width="100%" border="1px solid">
			<tr>
				<th align="center" style="font-size: 50px;" colspan="13" width="100%">QUẢN LÝ Tầng</th>
			</tr>
			<tr style= "font-size: 1rem;">
				<td width="10%" align="center"><strong>STT</strong></td>
				<td width="70%" align="center"><strong>Tên Tầng</strong></td>
				<td colspan="4" align="center"><strong>Chỉnh sửa</strong></td>
			</tr>';
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaTang = $row['MaTang'];
				$TenTang = $row['TenTang'];
				$TrangThai = $row['TrangThai'];
				if ($TrangThai != 0) {
					echo '
					<tr>
						<td align="center" height="50"><a href="?id=' . $MaTang . '">' . $dem . '</a></td>
						<td style="font-size: 18px; padding-left: 10px;" align="center"><a href="suasp.php?id=' . $MaTang . '">' . $TenTang . '</a></td>
						<input type="hidden" name="id_product" value="' . $MaTang . '">
						<td align="center" colspan="4">
						<a class="btn btn-danger" href="Delete_tang.php?id=' . $MaTang . '" role="button">Xóa</a>
						<a class="btn btn-warning" href="Update_tang.php?id=' . $MaTang . '" role="button">Sửa</a>
						</td>
					</tr>';
					$dem++;
				}
			}
			echo '
			</table>
			</form>';
		} else {
			echo 'Không có dữ liệu';
		}
	}
	public function loadds_hoso($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<form action="" method="post">
			<table width="100%" border="1px solid">
			<tr>
				<th align="center" style="font-size: 50px;" colspan="12" width="100%">DANH SÁCH HỒ SƠ BỆNH NHÂN</th>
			</tr>
			<tr style= "font-size: 1rem;">
				<td width="5%" align="center"><strong>STT</strong></td>
				<td width="15%" align="center"><strong>Tên Bệnh Nhân</strong></td>
				<td width="6%" align="center"><strong>Mã Hồ Sơ</strong></td>
				<td width="7%" align="center"><strong>Năm Sinh</strong></td>
				<td width="22%" align="center"><strong>Địa Chỉ</strong></td>
				<td width="11%" align="center"><strong>Bệnh Viện</strong></td>
				<td width="13%" align="center"><strong>Tình Trạng Bệnh</strong></td>
				<td width="22%" align="center" colspan="4"><strong>Chức Năng</strong></td>
			</tr>';
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaHoSo = $row['MaHoSo'];
				$MaBenhNhan = $row['MaBenhNhan'];
				$MaTinhTrang = $row['MaTinhTrang'];
				$MaBenhVien = $row['MaBenhVien'];
				$TenBenhNhan = $row['HoTen'];
				$NamSinh = $row['NamSinh'];
				$DiaChi = $row['DiaChi'];
				$TenBenhVien = $row['TenBenhVien'];
				$TinhTrang = $row['TenTinhTrang'];
				echo '
					<tr>
						<td align="center" height="50"><a href="?id=' . $MaHoSo . '">' . $dem . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaHoSo . '">' . $TenBenhNhan . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaHoSo . '">' . $MaHoSo . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaHoSo . '">' . $NamSinh . '</a></td>	
						<td align="center" height="50"><a href="?id=' . $MaHoSo . '">' . $DiaChi . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaHoSo . '">' . $TenBenhVien . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaHoSo . '">' . $TinhTrang . '</a></td>
						<input type="hidden" name="id_product" value="' . $MaHoSo . '">
						<td align="center" colspan="4">
						<a class="btn btn-success" href="Update_HoSoBenhAn.php?id=' . $MaHoSo . '" role="button">Cập Nhập Tình Trạng Sức Khỏe</a>
						<td>
					</tr>';
				$dem++;
			}
			echo '
			</table>
			</form>';
		}
	}
	public function loadds_taikhoan_BV($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<form action="" method="post">
			<table width="100%" border="1px solid">
			<tr>
				<th align="center" style="font-size: 50px;" colspan="9" width="100%">DANH SÁCH TÀI KHOẢN BỆNH VIỆN</th>
			</tr>
			<tr style= "font-size: 1rem;">
				<td width="5%" align="center"><strong>STT</strong></td>
				<td width="15%" align="center"><strong>Mã Nhân Viên</strong></td>
				<td width="25%" align="center"><strong>Tên Nhân Viên</strong></td>
				<td width="20%" align="center"><strong>Chức Vụ</strong></td>
				<td width="15%" align="center"><strong>Nơi Làm Việc</strong></td>
				<td width="20%" align="center" colspan="4"><strong>Chức Năng</strong></td>
			</tr>';
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaNhanVien = $row['TaiKhoan'];
				$TenNhanVien = $row['HoTen'];
				$PhanQuyen = $row['TenQuyen'];
				$NoiLamViec = $row['TenBenhVien'];

				echo '
					<tr>
						<td align="center" height="50"><a href="?id=' . $MaNhanVien . '">' . $dem . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaNhanVien . '">' . $MaNhanVien . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaNhanVien . '">' . $TenNhanVien . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaNhanVien . '">' . $PhanQuyen . '</a></td>	
						<td align="center" height="50"><a href="?id=' . $MaNhanVien . '">' . $NoiLamViec . '</a></td>
						<input type="hidden" name="id_product" value="' . $MaNhanVien . '">
						<td align="center" colspan="4">
						<a class="btn btn-danger" href="Delete_taikhoan.php?id=' . $MaNhanVien . '" role="button">Khóa Thông Tin Nhân Viên</a>
						<td>
					</tr>';
				$dem++;
			}
			echo '
			</table>
			</form>';
		}
	}
	public function loadds_taikhoan_P($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<form action="" method="post">
			<table width="100%" border="1px solid">
			<tr>
				<th align="center" style="font-size: 50px;" colspan="9" width="100%">DANH SÁCH TÀI KHOẢN PHƯỜNG</th>
			</tr>
			<tr style= "font-size: 1rem;">
				<td width="5%" align="center"><strong>STT</strong></td>
				<td width="15%" align="center"><strong>Mã Nhân Viên</strong></td>
				<td width="25%" align="center"><strong>Tên Nhân Viên</strong></td>
				<td width="20%" align="center"><strong>Chức Vụ</strong></td>
				<td width="15%" align="center"><strong>Nơi Làm Việc</strong></td>
				<td width="20%" align="center" colspan="4"><strong>Chức Năng</strong></td>
			</tr>';
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaNhanVien = $row['TaiKhoan'];
				$TenNhanVien = $row['HoTen'];
				$PhanQuyen = $row['TenQuyen'];
				$NoiLamViec = $row['TenPhuong'];

				echo '
					<tr>
						<td align="center" height="50"><a href="?id=' . $MaNhanVien . '">' . $dem . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaNhanVien . '">' . $MaNhanVien . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaNhanVien . '">' . $TenNhanVien . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaNhanVien . '">' . $PhanQuyen . '</a></td>	
						<td align="center" height="50"><a href="?id=' . $MaNhanVien . '">' . $NoiLamViec . '</a></td>
						<input type="hidden" name="id_product" value="' . $MaNhanVien . '">
						<td align="center" colspan="4">
						<a class="btn btn-danger" href="Delete_taikhoan.php?id=' . $MaNhanVien . '" role="button">Khóa Thông Tin Nhân Viên</a>
						<td>
					</tr>';
				$dem++;
			}
			echo '
			</table>
			</form>';
		}
	}
	public function loadds_SLdieutri($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<form action="" method="post">
			<table width="100%" border="1px solid">
			<tr>
				<th align="center" style="font-size: 50px;" colspan="9" width="100%">DANH SÁCH BỆNH VIỆN</th>
			</tr>
			<tr style= "font-size: 1rem;">
				<td width="5%" align="center"><strong>STT</strong></td>
				<td width="15%" align="center"><strong>Tên Bệnh Viện</strong></td>
				<td width="25%" align="center"><strong>Sức Chứa</strong></td>
				<td width="20%" align="center"><strong>Đang Điều Trị</strong></td>
				<td width="15%" align="center"><strong>Trống</strong></td>
				<td width="20%" align="center" colspan="4"><strong>Chức Năng</strong></td>
			</tr>';
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {
				$MaBenhVien = $row['MaHoSo'];
				$SoGiuongBenh = $row['SoGiuongBenh'];
				$TenBenhVien = $row['TenBenhVien'];
				$MaBenhVien = $row['MaBenhVien'];
				$SL = $row['Tong so'];
				$Trong = $SoGiuongBenh - $SL;
				echo '
					<tr>
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $dem . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $TenBenhVien . '</a></td>
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $SoGiuongBenh . '</a></td>

						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $SL . ' </a></td>	
						<td align="center" height="50"><a href="?id=' . $MaBenhVien . '">' . $Trong . '</a></td>
						<input type="hidden" name="id_product" value="' . $MaBenhVien . '">
						<td align="center" colspan="4">
						<a class="btn btn-warning" href="Update_benhvien.php?id=' . $MaBenhVien . '" role="button">Cập Nhật Thông Tin Bệnh Viện</a>
						<td>
					</tr>';
				$dem++;
			}
			echo '
			</table>
			</form>';
		}
	}
	// Khang //
	public function get_TenBenhVien($MaBenhVien)
	{

		$link = $this->connect();
		$sql = "select TenBenhVien from benhvien where MaBenhVien='" . $MaBenhVien . "'";
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			$row = mysqli_fetch_array($ketqua);
			return $row['TenBenhVien'];
		}
	}
	public function get_TenTinhTrang($MaTinhTrang)
	{

		$link = $this->connect();
		$sql = "select TenTinhTrang from tinhtrangsuckhoe where MaTinhTrang='" . $MaTinhTrang . "'";
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			$row = mysqli_fetch_array($ketqua);
			return $row['TenTinhTrang'];
		}
	}
	public function get_TenTang($MaTang)
	{

		$link = $this->connect();
		$sql = "select TenTang from tang where MaTang='" . $MaTang . "'";
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			$row = mysqli_fetch_array($ketqua);

			return $row['TenTang'];
		}
	}
	public function loadtintuc($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<table width="1045" height="216" class="table-striped" align="center">
                                         
                                          <tr>
                                            <th align="center" valign="middle" width="100"><div align="center">Mabenhnhan</div></th>
                                            <th align="center" valign="middle" width="400"><div align="center">TenBenhNhan</div></th>
                                            <th align="center" valign="middle" width="150"><div align="center">NgaySinh</div></th>
                                           
                                            <th align="center" valign="middle" width="300"><div align="center">Diachi</div></th>
											<th align="center" valign="middle" width="300"><div align="center">Số CMND</div></th>
											<th align="center" valign="middle" width="300"><div align="center">Tinh Trang</div></th>
                                            <th align="center" valign="middle" width="100"><div align="center">Tang</div></th>
                                            <th align="center" valign="middle" width="300"><div align="center">Benhvien</div></th>
											
											<th align="center" valign="middle" width="300"></th>
                                            
                                          </tr>';
			while ($row = mysqli_fetch_array($ketqua)) {

				$MaBenhNhan = $row['MaBenhNhan'];
				$TenBenhNhan = $row['HoTen'];
				$NgaySinh = $row['NamSinh'];
				$SoCMND = $row['CMND_CCCD'];
				$Diachi = $row['DiaChi'];
				$Tang = $this->get_TenTang($row['MaTang']);
				$Benhvien = $this->get_TenBenhVien($row['MaBenhVien']);
				$TinhTrang = $this->get_TenTinhTrang($row['MaTinhTrang']);
				echo '
            <tr>
                                           <td><div align="center">' . $MaBenhNhan . '</div></td>
                                           <td><div align="center">' . $TenBenhNhan . '</div></td>
                                           <td><div align="center">' . $NgaySinh . '</div></td>
                                           
										   <td><div align="center">' . $Diachi . '</div></td>
										   <td><div align="center">' . $SoCMND . '</div></td>
										   <td><div align="center">' . $TinhTrang . '</td>
                                           <td><div align="center">' . $Tang . '</div></td>
                                           <td><div align="center">' . $Benhvien . '</td>
										   <td>
										  
                                          <a href="yeucauchuyenvien.php?Mabenhnhan=' . $MaBenhNhan . '"><h6 style="color:#73BE55;width:100px ">chuyển bệnh nhân</h6>
										  
										  
                                        </td>
                                          </tr>';
			}
			echo '</table>';
		} else {
			echo 'khong co du lieu ket noi';
		}
	}
	public function get_benhnhan($Mabenhnhan)
	{
		$sql = "select * from benhnhan where MaBenhNhan='" . $Mabenhnhan . "'";
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
	public function loadcombo_tang1($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="tang" id="tang" onchange="loadcombo_tang();">';
			echo '<option value="">Vui lòng chọn tầng</option>';
			while ($row = mysqli_fetch_array($ketqua)) {
				$id = $row['MaTang'];
				$tentang = $row['TenTang'];
				if ($_GET['tang'] == $id) $selected = "selected";
				else $selected = "";
				echo '<option ' . $selected . ' value="' . $id . '">' . $tentang . '</option>';
			}
			echo ' </select>';
		}
	}
	public function loadten($Mabenhnhan)
	{

		$link = $this->connect();
		$sql = "select Mabenhnhan from phieuchuyenvien where MaBenhNhan='$Mabenhnhan'";
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i != '') {
			return 1;
		} else {
			return 0;
		}
	}
	public function load_BV($sql)
	{

		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);
		if ($i > 0) {
			echo '<select name="BV" id="BV" style="width:200px;">';
			while ($row = mysqli_fetch_array($ketqua)) {
				$mabenhvien = $row['MaBenhVien'];
				$tenbenhvien = $row['TenBenhVien'];

				echo '<option value="' . $mabenhvien . '">' . $tenbenhvien . '</option>';
			}
			echo ' </select>';
		}
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
		} else
			exit();
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
	public function get_phieuchuyenvien($maphieu)
	{
		$sql = "select * from phieuchuyenvien where MaPhieu='" . $maphieu . "'";

		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);


		if ($i > 0) {
			$kq = mysqli_fetch_array($ketqua);
			return $kq;
		} else exit();
	}
	public function loadds_f0($sql)
	{
		$link = $this->connect();
		$ketqua = mysqli_query($link, $sql);
		mysqli_close($link);
		$i = mysqli_num_rows($ketqua);

		if ($i > 0) {
			echo '
			<form action="" method="post">
			<table width="100%" border="1px solid">
			<tr>
				<th align="center" style="font-size: 30px;" colspan="13" width="100%">Danh sách yêu cầu chuyển viện</th>
			</tr>
			<tr style= "font-size: 1rem;">
				<td width="5%" align="center"><strong>STT</strong></td>
				<td width="9%" align="center"><strong>Mabenhnhan</strong></td>
				<td width="20%" align="center"><strong>Tên bệnh nhân</strong></td>
				<td width="9%" align="center"><strong>CMND</strong></td>
				<td width="9%" align="center"><strong>Ngaychuyenvien</strong></td>
				<td width="9%" align="center"><strong>Sotanghientai</strong></td>
				<td width="9%" align="center"><strong>Benhvienhientai</strong></td>
				
				<td width="9%" align="center"><strong>Tầng muốn chuyển</strong></td>
				<td width="21%" align="center" colspan="4"><strong>Bệnh viện muốn chuyển</strong></td>
			</tr>';
			$dem = 1;
			while ($row = mysqli_fetch_array($ketqua)) {

				$MaPhieu = $row['MaPhieu'];

				$benhnhan = $this->get_benhnhan($row['MaBenhNhan']);

				$benhvien = $this->get_benhvien($row['MaBenhVien']);


				$tang = $this->get_tang($row['MaTang']);
				$tang_moi = $this->get_tang($row['MaTang_Moi']);

				$benhvien_moi = $this->get_benhvien($row['MaBenhVien_Moi']);
				$TenBenhNhan = $benhnhan['HoTen'];

				$CMND = $benhnhan['CMND_CCCD'];
				$NgayChuyenVien = $row['NgayChuyenVien'];
				$TangHienTai = $tang['TenTang'];
				$BenhVienHienTai = $benhvien['TenBenhVien'];
				$MaBenhNhan = $benhnhan['MaBenhNhan'];
				$TangMuonChuyen = $tang_moi['TenTang'];
				$BenhVienMuonChuyen = $benhvien_moi['TenBenhVien'];

				echo '
					<tr>
						<td align="center" height="50">' . $dem . '</td>
						<td align="center" height="50">' . $MaBenhNhan . '</td>
						<td style="font-size: 18px; padding-left: 10px;">' . $TenBenhNhan . '</td>
						<td align="center" height="50">' . $CMND . '</td>
						<td align="center" height="50">' . $NgayChuyenVien . '</td>	
						<td align="center" height="50">' . $TangHienTai . '</td>
						<td align="center" height="50">' . $BenhVienHienTai . '</td>

						<td align="center" height="50">' . $TangMuonChuyen . '</td>
						<td align="center" height="50">' . $BenhVienMuonChuyen . '</td>
						<td align="center" colspan="4">
						

						<a class="btn btn-danger" href="tiepnhan.php?maphieu=' . $MaPhieu . '" role="button">Tiếp nhận</a>
						<a class="btn btn-warning" href="huytiepnhan.php?maphieu=' . $MaPhieu . '" role="button">Hủy</a>
							
							
							
					
						<td>
					</tr>';
				$dem++;
			}
			echo '
			</table>
			</form>';
		} else {
			echo 'Không có yêu cầu chuyển viện';
		}
	}
}