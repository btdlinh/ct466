<?php
    require "../../db.php";

    session_start();
//    if (isset($_SESSION['email'])) {
//        $email = $_SESSION['email'];
//    } else exit();
    // xu ly them sach
    $id=$_GET['idsach'];
    $tensach = $_POST["tensach"];
    $idloai = $_POST["idtheloai"];
    $idtacgia = $_POST["idtacgia"];
    $idnxb = $_POST["idnxb"];
    $idnn = $_POST["idnn"];
    $idncc = $_POST["idncc"];
    $gia = $_POST["giabansach"];
    $soluong = $_POST["slsach"];
    $mota = $_POST["motasach"];
    //   echo $tensach .'idloai: '. $idloai . 'idtg: '.$idtacgia . 'idnxb: '.$idnxb .'sl: '. $soluong . 'mota: '.$mota;
    // xu ly trung ten hinh anh
    $filename = $_FILES['hinhanhsach']['tmp_name'];
    $destination = "../../img/bookimg/". $_FILES['hinhanhsach']['name'];
    move_uploaded_file($filename, $destination);
    //echo $destination;
    if(empty($filename)){
        $sql= "UPDATE sanpham SET  sp_tensach='$tensach', 
                            sp_idtheloai='$idloai', 
                            sp_idtg='$idtacgia', 
                            sp_idnxb='$idnxb', 
                            sp_idnn='$idnn',  
                            sp_idncc='$idncc', 
                            sp_gia='$gia', 
                            sp_soluong= $soluong, 
                            sp_mota='$mota' 
                        WHERE (sp_id='$id')";

    }else{
        $sql= "UPDATE sanpham SET  sp_tensach='$tensach', 
                            sp_idtheloai='$idloai', 
                            sp_idtg='$idtacgia', 
                            sp_idnxb='$idnxb', 
                            sp_idnn='$idnn',  
                            sp_idncc='$idncc', 
                            sp_gia='$gia', 
                            sp_soluong= $soluong, 
                            sp_mota='$mota', 
                            sp_hinhanh='$destination' 
                        WHERE (sp_id='$id')";
    }


    $conn->query($sql) or die("err: ");
    header('location: dssach.php');

//echo "Thành Công";
    $conn->close();

?>

