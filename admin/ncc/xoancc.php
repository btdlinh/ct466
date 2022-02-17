<!--viết tất cả code php trên đầu file-->

<?php
session_start();
//    require "../../db.php";
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ct466';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname)
or die($conn->connect_error);

$conn -> set_charset('utf8');

//    if (isset($_SESSION['email'])) {
//        $email = $_SESSION['email'];
//    } else exit();
$idncc=$_GET['idncc']; // lay bien idsach tren url (id can xoa)
$sql = "SELECT * FROM nha_cung_cap  WHERE  $idncc=ncc_id";
$result = $conn->query($sql); // lay dong du lieu dua vao mang
$sql = "DELETE FROM nha_cung_cap WHERE ncc_id=$idncc";
$conn->query($sql) or die("err: ");
header('location: dsncc.php');
//echo "Thành Công";
$conn->close();
?>

