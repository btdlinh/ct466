<?php
require "../../db.php";
session_start();
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();

$idtacgia=$_GET['idtacgia'];

$tentg = $_POST["tentacgia"];
//$email = $_POST["emailtacgia"];
$diachi = $_POST["diachitacgia"];
//$sdt = $_POST["sdttacgia"];
$sql= "UPDATE tac_gia SET    tg_hoten='$tentg', 
                            tg_diachi='$diachi'
                        WHERE (tg_id='$idtacgia')";

$conn->query($sql) or die("err: ");
header('location: dstacgia.php');

//echo "Thành Công";
$conn->close();

?>

