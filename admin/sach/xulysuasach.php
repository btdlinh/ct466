<?php
    require "../../db.php";

    session_start();
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else exit();
    // xu ly them sach
    $id=$_GET['idsach'];
    $tensach = $_POST["tensach"];
    $idloai = $_POST["idtheloai"];
    $idtacgia = $_POST["idtacgia"];
    $idnxb = $_POST["idnxb"];
    $gia = $_POST["giabansach"];
    $soluong = $_POST["slsach"];
    $mota = $_POST["motasach"];
    //   echo $tensach .'idloai: '. $idloai . 'idtg: '.$idtacgia . 'idnxb: '.$idnxb .'sl: '. $soluong . 'mota: '.$mota;
    // xu ly trung ten hinh anh
    $filename = $_FILES['hinhanhsach']['tmp_name'];
    $destination = "../../img/bookimg/". $_FILES['hinhanhsach']['name'];
    move_uploaded_file($filename, $destination);
    //echo $destination;
    $sql= "UPDATE sach SET  tensach='$tensach', 
                            idtheloai='$idloai', 
                            idtacgia='$idtacgia', 
                            idnxb='$idnxb', 
                            gia='$gia', 
                            soluong='$soluong', 
                            mota='$mota', 
                            hinhanh='$destination' 
                        WHERE (idsach='$id')";

    $conn->query($sql) or die("err: ");
    header('location: dssach.php');

//echo "Thành Công";
    $conn->close();

?>

