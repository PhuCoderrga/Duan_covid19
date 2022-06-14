<?php
require("./header.php");
?>
<?php
$connect = mysqli_connect("localhost", "root", "", "duan_ptud");
mysqli_set_charset($connect, 'UTF8');
$query = "SELECT benhvien . * , COUNT( hosobenhan.MaBenhVien ) AS 'number_cate'
FROM hosobenhan
INNER JOIN benhvien ON hosobenhan.MaBenhVien = benhvien.MaBenhVien
INNER JOIN tinhtrangsuckhoe ON tinhtrangsuckhoe.MaTinhTrang = hosobenhan.MaTinhTrang
WHERE hosobenhan.MaBenhVien = benhvien.MaBenhVien
AND hosobenhan.MaTinhTrang =1
GROUP BY MaBenhVien, TenBenhVien";
$result = mysqli_query($connect, $query);
//$data = [];
while ($row = mysqli_fetch_array($result)) {
  $data[] = $row;
}
// echo "<pre>";
// var_dump($data);
// echo "</pre>";
?>
<html>

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['TenBenhVien', 'number_cate'],
            <?php
        foreach ($data as $key) {
          echo "['" . $key['TenBenhVien'] . "' , " . $key['number_cate'] . "],";
        }
        ?>
        ]);

        var options = {
            title: 'Biểu đồ thống kê tỉ lệ % số lượng hồ sơ điều trị tại bệnh viện',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    </script>
</head>

<body>
    <div id="piechart_3d" style="width: 1500px; height: 800px; padding-left: 200px;"></div>
</body>
<?php
require("./footer.php");
?>

</html>