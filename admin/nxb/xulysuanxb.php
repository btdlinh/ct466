<?php
//require "../../db.php";
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ct466';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname)
or die($conn->connect_error);

$conn -> set_charset('utf8');

session_start();
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();

// xu ly them sach
$idnxb=$_GET['idnxb'];
$tennxb = $_POST["tennxb"];
//$email = $_POST["emailnxb"];
$sdt = $_POST["sdt"];
$diachi = $_POST["diachinxb"];

$sql= "UPDATE nha_xuat_ban SET  nxb_ten='$tennxb', 
                            nxb_sdt='$sdt', 
                            nxb_diachi='$diachi'
                        WHERE (nxb_id='$idnxb')";

$conn->query($sql) or die("err: ");
header('location: dsnxb.php');

//echo "Thành Công";
$conn->close();

?>

