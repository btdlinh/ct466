<!--viết tất cả code php trên đầu file-->

<?php
session_start();
require "../../db.php";
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();
$idtacgia=$_GET['idtacgia']; // lay bien idsach tren url (id can xoa)
$sql = "SELECT * FROM tac_gia  WHERE  $idtacgia=tg_id";
$result = $conn->query($sql); // lay dong du lieu dua vao mang
$sql = "DELETE FROM tac_gia WHERE tg_id=$idtacgia";
$conn->query($sql) or die("err: ");
header('location: dstacgia.php');
$conn->close();
?>