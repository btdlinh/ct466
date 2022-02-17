<!--viết tất cả code php trên đầu file-->

<?php
session_start();
require "../../db.php";
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();
$idsach=$_GET['idsach']; // lay bien idsach tren url (id can xoa)
$sql = "SELECT * FROM sanpham  WHERE  $idsach=sp_id";
$result = $conn->query($sql); // lay dong du lieu dua vao mang
$sql = "DELETE FROM sanpham WHERE sp_id=$idsach";
$conn->query($sql) or die("err: ");
header('location: dssach.php');
$conn->close();
?>