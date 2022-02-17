<?php
/// luôn luôn có
session_start();
require "../../db.php";
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();
if(isset($_POST["tensach"])){
    $tensach = $_POST["tensach"];
    $idloai = $_POST["idtheloai"];
    $idtacgia = $_POST["idtacgia"];
    $idnxb = $_POST["idnxb"];
    $idnn = $_POST["idnn"];
    $idncc= $_POST["idncc"];
    $gia = $_POST["giabansach"];
    $soluong = $_POST["slsach"];
    $mota = $_POST["motasach"];
    //   echo $tensach .'idloai: '. $idloai . 'idtg: '.$idtacgia . 'idnxb: '.$idnxb .'sl: '. $soluong . 'mota: '.$mota;
    // xu ly trung ten hinh anh
    $filename = $_FILES['hinhanhsach']['tmp_name'];
    $destination = "../../img/bookimg/". $_FILES['hinhanhsach']['name'];
    move_uploaded_file($filename, $destination);
    //echo $destination;
    $sql= "INSERT INTO sanpham( sp_idtheloai, sp_idnxb, sp_idnn, sp_idncc, sp_idtg, sp_tensach, sp_gia, sp_hinhanh, sp_mota, sp_soluong ) 
                    VALUES ( '$idloai', '$idnxb', '$idnn', '$idncc', '$idtacgia', '$tensach', '$gia', '$destination', '$mota', '$soluong')";
    $conn->query($sql) or die("err: ");
    header('location: dssach.php');
    $conn->close();
}

