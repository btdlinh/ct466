<?php
session_start();
if (isset($_SESSION['kh_email'])) {
    $email = $_SESSION['kh_email'];
} else header("location:http://localhost/CT466/dangnhap.php");

require "../../db.php";

//echo $email;

$sql1 = "SELECT * FROM hoa_don as a join khach_hang as b on a.hd_idkh=b.kh_id
                                    join chi_tiet_hoa_don as c on a.hd_id=c.cthd_idhd
                                    join sanpham as d on d.sp_id=c.cthd_idsp
                                    join dia_chi as e on b.kh_id=e.dc_idkh
                WHERE kh_email = '$email'
                ORDER BY hd_id ASC
                LIMIT 1,1 
         ";
$result1 = mysqli_query($conn, $sql1);

$sql_iddon="SELECT * FROM hoa_don as a join khach_hang as b on a.hd_idkh=b.kh_id
                                                                    join chi_tiet_hoa_don as c on a.hd_id=c.cthd_idhd
                                                                    join sanpham as d on d.sp_id=c.cthd_idsp
                                                                    join dia_chi as e on b.kh_id=e.dc_idkh
                                                    WHERE kh_email = '$email'
                                                    ORDER BY hd_id DESC
                                                    LIMIT 1
                            ";
$rs_iddon = mysqli_query($conn, $sql_iddon);
$row_iddon = mysqli_fetch_assoc($rs_iddon);

//echo $a;


$sql_dc=" SELECT dc_id, dc_diachi, dc_sdt FROM hoa_don as a join khach_hang as b on a.hd_idkh=b.kh_id
                                                                    join chi_tiet_hoa_don as c on a.hd_id=c.cthd_idhd
                                                                   
                                                                    join dia_chi as e on b.kh_id=e.dc_idkh
                                                    WHERE kh_email = '$email'
                                                    ORDER BY dc_id DESC
                                                    LIMIT 1
                            ";
$rs_dc = mysqli_query($conn, $sql_dc);
$row_dc = mysqli_fetch_assoc($rs_dc);

//echo $b;
//echo $row_dc['dc_sdt'] ;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Chi Tiết Đơn Hàng</title>
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS  -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Material Design Bootstrap  -->
    <link rel="stylesheet" href="../../css/mdb.min.css">
    <!-- DataTables.net  -->
    <link rel="stylesheet" type="text/css" href="../../css/addons/datatables.min.css">
    <link rel="stylesheet" href="../../css/addons/datatables-select.min.css">

    <!-- Your custom styles (optional)  -->
    <style></style>

</head>

<body class="A4 white">
<!-- Navbar ngang-->
<nav class="navbar fixed-top navbar-expand-md navbar-light scrolling-navbar white">

    <div class="container">

        <!-- SideNav slide-out button-->
        <div class="float-left mr-2">
            <i class="fas fa-book-open blue-text"></i>
            <!--                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-home"></i></a>-->
        </div>

        <a class="navbar-brand font-weight-bold" href="http://localhost/CT466"><strong> HIRAKI.COM </strong></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">


        </div>

    </div>

</nav>
<!-- Navbar ngang-->

<!-- Main layout  -->
<!--<form action="" method="get">-->
<!--    <input type="text"-->
<!--           placeholder="Nhập Email của bạn"-->
<!--           name="email"-->
<!---->
<!--    >-->
<!--    <button type="submit"-->
<!--            class="btn blue-gradient btn-rounded waves-effect waves-light btn-sm"-->
<!--            value="Tìm"-->
<!--    >Tìm-->
<!---->
<!--    </button>-->
<!---->
<!--</form>-->
<main>
    <div class="container-fluid my-5 w-75 ">

        <!-- Gird column -->
        <div class="col-md-12" style="margin-top:100px">

            <div class="card">

                <div class="card-body mb-5">
                    <?php
                        $count = mysqli_num_rows($result1);
                    if($count>0){
                        $b = $row_dc['dc_id'];
                        $a = $row_iddon['hd_id'];
                    ?>

                    <form id="myfrm">
                        <p class="mt-5"><i><u>Đơn Hàng Gần Đây Của Bạn</u></i></p>
                        <div class="ml-5 pl-5">

                            <!--thong tin kh-->
                            <?php
                            $sql2 = "select sum(cthd_soluong) as tongsp  

                                     from chi_tiet_hoa_don as a join hoa_don as b on a.cthd_idhd =b.hd_id
                                                                join khach_hang as c on c.kh_id=b.hd_idkh                                                                  
                                     where kh_email ='$email' 
                                     GROUP BY hd_id DESC
                                     LIMIT 1
                                     ";

                            $rs2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($rs2);

                            $sql3 = "select *

                                     from chi_tiet_hoa_don as a join hoa_don as b on a.cthd_idhd =b.hd_id
                                                                join khach_hang as c on c.kh_id=b.hd_idkh   
                                                                join dia_chi as d on d.dc_idkh=c.kh_id
                                     where kh_email ='$email'
                                     GROUP BY hd_id DESC
                                     LIMIT 1
                                     ";

                            $rs3 = mysqli_query($conn, $sql3);
                            $row3 = mysqli_fetch_assoc($rs3);
                            if ($result1->num_rows > 0) {
                                $row1 = $result1->fetch_assoc();
                                echo '
                        <table >
                        <tbody >

                            <tr>
                                <td class="col-md-5 font-weight-normal">Ngày đặt:</td>
                                <th class="col-md-5 font-weight-bold">' . date('d/m/Y ', strtotime($row1['hd_thoigianlapdonhang'])) . '</th>
                            </tr>
                        
                            <tr>
                                <td class="col-md-5 font-weight-normal" >Tên khách hàng:</td>
                                <th class="col-md-5 font-weight-bold">' . $row1['dc_hoten'] . '</th>
                            </tr>
                            
                             <tr>
                                <td class="col-md-5 font-weight-normal">Email khách hàng:</td>
                                <th class="col-md-5 font-weight-bold">' . $row1['kh_email'] . '</th>
                            </tr>
                            
                             <tr>
                                <td class="col-md-5 font-weight-normal">Số điện thoại:</td>
                                <th class="col-md-5 font-weight-bold">' . $row_dc['dc_sdt'] . '</th>
                            </tr>
                            
                             <tr>
                                <td class="col-md-5 font-weight-normal">Địa chỉ:</td>
                                <th class="col-md-5 font-weight-bold">' . $row_dc['dc_diachi'] . '</th>
                            </tr>
                            
                            <tr>
                                <td class="col-md-5 font-weight-normal">Số lượng sản phẩm:</td>
                                <th class="col-md-5 font-weight-bold">' . $row2['tongsp'] . '</th>
                            </tr>

                            <tr>
                                <td class="col-md-5 font-weight-normal">Tổng:</td>
                                <th class="col-md-5 font-weight-bold">' . number_format($row3['hd_tongtiendonhang']) . " VNĐ" . '</th>
                            </tr>
                            
                            <tr>
                                <td class="col-md-5 font-weight-normal">Phương thức thanh toán:</td>
                                <th class="col-md-5 font-weight-bold" style="text-transform: uppercase">' .$row3['hd_pttt']. '</th>
                            </tr>
                            
                            <tr>
                                <td class="col-md-5 font-weight-normal">Phí vận chuyển:</td>
                                <th class="col-md-5 font-weight-bold">30,000 VNĐ</th>
                            </tr>
                            
                            <tr>
                                <th class="col-md-5 font-weight-bold "><h5 class="mt-4">Tổng thanh toán :</h5></th>
                                <th class="col-md-5 font-weight-bold"><h5 class="mt-4">' . number_format($row3['hd_tongtiendonhang'] + 30000) . " VNĐ" . '</h5></h5></th>
                            </tr>

                            </tbody>
                        </table>
                            
                        ';

                            }
                            ?>
                        </div>

                        <!--end thong tin kh-->

                        <!--thong tin sp-->
                        <br><br>
                        <p><i><u>Chi tiết sản phẩm</u></i></p>
                        <br>
                        <table id="dtMaterialDesignExample" class="table w-100">
                            <thead>

                            <tr>
                                <th class="font-weight-bold text-center">STT</th>
                                <th class="th-sm font-weight-bold text-center"></th>
                                <th class="th-sm font-weight-bold text-center">Tên sách</th>
                                <th class="th-sm font-weight-bold text-center">Đơn giá</th>
                                <th class="th-sm font-weight-bold text-center">Số lượng</th>
                                <th class="th-sm font-weight-bold text-center">Thành tiền</th>
                            </tr>

                            </thead>

                            <tbody>

                            <?php


                            $stt = 1;
//                            $sql11 = "select * from hoa_don where hd_id=$iddon";
                            $sql11="SELECT * FROM hoa_don as a join khach_hang as b on a.hd_idkh=b.kh_id
                                    join chi_tiet_hoa_don as c on a.hd_id=c.cthd_idhd
                                    join sanpham as d on d.sp_id=c.cthd_idsp
                                    join dia_chi as e on b.kh_id=e.dc_idkh
                WHERE kh_email = '$email'
                ORDER BY hd_id ASC
                LIMIT 1,1";
                            $rs11 = mysqli_query($conn, $sql11);
                            while ($row11 = mysqli_fetch_assoc($rs11)) {


                                $sql14="select * from hoa_don as a join khach_hang as b on a.hd_idkh=b.kh_id
                                                                    join chi_tiet_hoa_don as c on a.hd_id=c.cthd_idhd
                                                                    join sanpham as d on d.sp_id=c.cthd_idsp
                                                                    join dia_chi as e on e.dc_idkh=b.kh_id
                                                 where kh_email='$email'   AND hd_id = '$a' AND dc_id ='$b'
                                                
                                                  order by cthd_idhd desc
                                ";

                                if ($rs14 = mysqli_query($conn, $sql14)) {
                                    while ($row14 = mysqli_fetch_assoc($rs14)) {
                                        $hinh= "http://localhost/CT466/img/bookimg/". $row14['sp_hinhanh'];
                                        echo '
                                            <tr>
                                                <td class="text-center">' . $stt++ . '</td>
                                                <td width="200px"> <img style="width: 150px; height: 100px;"  src="'.$hinh.'"></td>
                                                <td  style="    word-break: break-all;
    width: 240px;"> ' . $row14['sp_tensach'] . '</td>
                                                <td class="text-center"> ' . number_format($row14['cthd_gia']) . '</td>
                                                <td class="text-center"> ' . $row14['cthd_soluong'] . ' </td>
                                                <td class="text-center"> ' . number_format($row14['cthd_gia'] * $row14['cthd_soluong']) . ' </td>

                                            </tr>                                          
                                            
                                    ';

                                    }
                                }
                            }
                            //                            }

                            ?>

                            <tr>
                                <td colspan="5" class="text-center font-weight-bolder">
                                    Xin cảm ơn Quý khách đã ủng hộ Cửa hàng, Chúc Quý khách An Khang, Thịnh Vượng!
                                </td>
                            </tr>

                            </tbody>

                        </table>
                        <!--end thong tin sp-->
                    </form>


                    <?php
                    }else{
                        echo "<div style='text-align: center;color:blue;'>Bạn chưa có đơn hàng</div>";
                    }
                    ?>
                    <p align="center"><a href="http://localhost/CT466" title="Quay lại trang chủ" ><i class="fas fa-arrow-circle-left btn-lg btn-outline-info" ></i></a></p>
                </div>

            </div>

        </div>

        <!-- Gird column -->

    </div>

</main>

</body>

</html>