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
$idncc=$_GET['idncc'];
$tenncc = $_POST["tenncc"];
//$email = $_POST["emailnxb"];
$sdt = $_POST["sdt"];
$diachi = $_POST["diachincc"];

$sql= "UPDATE nha_cung_cap SET  ncc_ten='$tenncc', 
                            ncc_sdt='$sdt', 
                            ncc_diachi='$diachi'
                        WHERE (ncc_id='$idncc')";

$conn->query($sql) or die("err: ");
header('location: dsncc.php');

//echo "Thành Công";
$conn->close();

?>

