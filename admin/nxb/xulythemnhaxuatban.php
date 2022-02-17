
<?php
session_start();
//if(isset($_SESSION['email'])){
//    $email=$_SESSION['email'];
//}else exit();
// Create connection
$conn = new mysqli("localhost", "root", "", "ct466");
$conn->set_charset("utf8");

$tennxb=$_POST["tennxb"];
//$email=$_POST["emailnxb"];
$diachi=$_POST["diachinxb"];
$sdt=$_POST["sdt"];


$sql= "INSERT INTO nha_xuat_ban( nxb_ten, nxb_sdt, nxb_diachi) 
                VALUES ( '$tennxb', '$sdt', '$diachi' )";

$result = $conn->query($sql);
if($result == true){

    header('location: dsnxb.php');

//    echo"<h2 style=\"align-items: center;'\"> Thêm NXB Thành Công</h2>";
}
else{
    echo"<h2> Thất Bại</h2>";    }
//    echo $sql;
//    echo $ten;
//    echo $email;
//    echo $pass;

$conn->close();



