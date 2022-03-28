<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ct466';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname)
or die($conn->connect_error);

$conn->set_charset('utf8');


if(isset($_POST["id"])) {
    $id = $_POST["id"];
    $value = $_POST["value"];
    $check = true;
    $sql = "SELECT * FROM `chi_tiet_hoa_don` as a join `sanpham` as b on a.cthd_idsp=b.sp_id WHERE cthd_idhd = $id";
    $rs=mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($rs)) {
        if($row['cthd_soluong'] > $row['sp_soluong']){
            $check= false;
            break;
        }
    }
    if($check){
        $sql_hd= "SELECT *  FROM `hoa_don` WHERE hd_id=$id";
        $rs_hd=mysqli_query($conn,$sql_hd);
        $row_hd=mysqli_fetch_assoc($rs_hd);
        if(($value ==1 && $row_hd['hd_trangthai'] == 5) || ($value ==5 && $row_hd['hd_trangthai'] == 1)  ){
            $sql1 = "SELECT * FROM `chi_tiet_hoa_don` as a join `sanpham` as b on a.cthd_idsp=b.sp_id WHERE cthd_idhd = $id";
            $rs1=mysqli_query($conn,$sql1);
            while ($row1 = mysqli_fetch_assoc($rs1)) {
                $slcn= $row1['sp_soluong'];
                $idsp = $row1[sp_id];
                $sql_updatesp="UPDATE `sanpham` SET `sp_soluong`= '$slcn' WHERE sp_id=$idsp";
                $rs_updatesp=mysqli_query($conn,$sql_updatesp);
            }
        }elseif(($value !=1 || $value !=5  )&&( $row_hd['hd_trangthai'] ==1 || $row_hd['hd_trangthai'] ==5 )){
            $sql1 = "SELECT * FROM `chi_tiet_hoa_don` as a join `sanpham` as b on a.cthd_idsp=b.sp_id WHERE cthd_idhd = $id";
            $rs1=mysqli_query($conn,$sql1);
            while ($row1 = mysqli_fetch_assoc($rs1)) {
                $slcn= $row1['sp_soluong'] - $row1['cthd_soluong'];
                $idsp = $row1[sp_id];
                $sql_updatesp="UPDATE `sanpham` SET `sp_soluong`= '$slcn' WHERE sp_id=$idsp";
                $rs_updatesp=mysqli_query($conn,$sql_updatesp);
            }
        }elseif(($value ==1 || $value ==5  )&&( $row_hd['hd_trangthai'] !=1 || $row_hd['hd_trangthai'] !=5 )){
            $sql1 = "SELECT * FROM `chi_tiet_hoa_don` as a join `sanpham` as b on a.cthd_idsp=b.sp_id WHERE cthd_idhd = $id";
            $rs1=mysqli_query($conn,$sql1);
            while ($row1 = mysqli_fetch_assoc($rs1)) {
                $slcn= $row1['sp_soluong'] + $row1['cthd_soluong'];
                $idsp = $row1[sp_id];
                $sql_updatesp="UPDATE `sanpham` SET `sp_soluong`= '$slcn' WHERE sp_id=$idsp";
                $rs_updatesp=mysqli_query($conn,$sql_updatesp);
            }
        }

        $sql_update= "UPDATE `hoa_don` SET `hd_trangthai`='$value' WHERE hd_id=$id";
        $rs_update=mysqli_query($conn,$sql_update);




    }
}
?>

