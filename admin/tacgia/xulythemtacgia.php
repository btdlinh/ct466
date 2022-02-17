
<?php
session_start();
//if(isset($_SESSION['email'])){
//    $email=$_SESSION['email'];
//}else exit();
// Create connection
$conn = new mysqli("localhost", "root", "", "ct466");
$conn->set_charset("utf8");

$tentg=$_POST["tentacgia"];
//$email=$_POST["emailtacgia"];
$diachi=$_POST["diachitacgia"];
//$sdt=$_POST["sdttacgia"];


$sql= "INSERT INTO tac_gia( tg_hoten, tg_diachi) 
                VALUES ( '$tentg', '$diachi' )";

$result = $conn->query($sql);
if($result == true){
    header('location:dstacgia.php');
}
else{
    echo"<h2> Thất Bại</h2>";    }
//    echo $sql;
//    echo $ten;
//    echo $email;
//    echo $pass;

$conn->close();



