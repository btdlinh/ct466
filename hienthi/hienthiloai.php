<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'CT466-01';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname)
or die($conn->connect_error);

$conn -> set_charset('utf8');
//    $query = "select * from theloaisach where status=0 ";
//    $rs = mysqli_query($conn,$query);
//?>
<!---->
<?php //foreach ($rs as $item): ?>
<!--    <section><a href="http://localhost/CT466/hienthi/hienthiloai_sp.php?idtheloai=--><?//= $item['idtheloai'] ?><!--"></a></section>-->
<?php //endforeach; ?>


<?php
$query1 = "select count(iddon) from dondathang  ";
$rs1 = mysqli_query($conn,$query1);
$row1 = mysqli_fetch_row($rs1);
print_r($row1[0]);

$query2 = "select count(idkh) from khachhang  ";
$rs2 = mysqli_query($conn,$query2);
$row2 = mysqli_fetch_row($rs2);
print_r($row2[0])."<br>";

$query3 = "select count(idsach) from sach  ";
$rs3 = mysqli_query($conn,$query3);
$row3 = mysqli_fetch_row($rs3);
print_r($row3[0])."<br>";
?>