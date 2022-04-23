<!--viết tất cả code php trên đầu file-->

<?php
session_start();
require "../../db.php";
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();
$email = $_SESSION['ad_email'];
$idsach=$_GET['idsach']; // lay bien idsach tren url (id can xoa)
$sql = "SELECT * FROM sanpham  WHERE  $idsach=sp_id";
$r = $conn->query($sql); // lay dong du lieu dua vao mang
$row= $r->fetch_assoc();
$slsp = $row['sp_soluong'];
$tensach = $row['sp_tensach'];
$idncc = $row['sp_idncc'];
$sql = "DELETE FROM sanpham WHERE sp_id=$idsach";
$conn->query($sql) or die("err: ");


$sql1= "INSERT INTO nhap_kho( `kho_idsp`,`kho_idncc`, `kho_tensach`,  `kho_hanhdong`, `kho_admin`,`kho_soluong`) 
            VALUES ( '$idsach','$idncc','$tensach', 'Xóa', ' $email', '$slsp')";
$conn->query($sql1) or die("err: ");
header('location: dssach.php');
$conn->close();
?>