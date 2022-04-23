<?php
require "../../db.php";
session_start();
//    if (isset($_SESSION['email'])) {
//        $email = $_SESSION['email'];
//    } else exit();
// xu ly them sach
$id=$_GET['idsach'];
$idncc = $_POST["idncc"];
$soluong = $_POST["slsach"];
$slsachcu = $_POST["slsachcu"];
$email = $_SESSION['ad_email'];
//   echo $tensach .'idloai: '. $idloai . 'idtg: '.$idtacgia . 'idnxb: '.$idnxb .'sl: '. $soluong . 'mota: '.$mota;
// xu ly trung ten hinh anh

//echo $destination;
    $sql= "UPDATE sanpham SET  
                            sp_soluong= $soluong + $slsachcu 
                        WHERE sp_id='$id'";
$conn->query($sql) or die("err: ");
    $r = $conn->query("select * from sanpham where sp_id='$id'");

    $row = $r->fetch_assoc();
    $tensach = $row['sp_tensach'];
$sql1= "INSERT INTO nhap_kho( `kho_idncc`,`kho_idsp`,`kho_tensach`, `kho_hanhdong`, `kho_admin`,`kho_soluong`) 
            VALUES ( '$idncc','$id','$tensach', 'thêm', ' $email', '$soluong')";
$conn->query($sql1) or die("err: ");




header('location: dssach.php');

//echo "Thành Công";
$conn->close();

?>

