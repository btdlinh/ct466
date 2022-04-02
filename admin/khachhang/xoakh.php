<?php
session_start();
require "../../db.php";
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();
$id=$_GET['id']; // lay bien idsach tren url (id can xoa)
$sql = "SELECT * FROM khach_hang WHERE  $id=kh_id";
$result = $conn->query($sql); // lay dong du lieu dua vao mang
$sql = "DELETE FROM khach_hang WHERE kh_id=$id";
$conn->query($sql) or die("err: ");
header('location: dskhachhang.php');
//echo "Thành Công";
$conn->close();
?>
