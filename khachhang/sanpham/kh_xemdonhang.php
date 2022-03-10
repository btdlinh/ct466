<?php
session_start();
if (isset($_SESSION['kh_email'])) {
    $email = $_SESSION['kh_email'];
} else header("location:http://localhost:8080/CT466/dangnhap.html");

//if (session_id() === '') {
//    session_start();
//}
require "../../db.php";

//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();

echo $email;
$sql1 = "SELECT * FROM hoa_don as a join khach_hang as b on a.hd_idkh=b.kh_id
                                    join chi_tiet_hoa_don as c on a.hd_id=c.cthd_idhd
                                    join sanpham as d on d.sp_id=c.cthd_idsp
                                    join dia_chi as e on b.kh_id=e.dc_idkh
                WHERE kh_email = '$email'
                ORDER BY hd_id ASC
                LIMIT 1,1 
         ";
$result1 = mysqli_query($conn, $sql1);
//$sql1 = "SELECT * FROM hoa_don as a join chi_tiet_hoa_don as b on a.hd_id=b.cthd_idhd
//                                        join sanpham as c on c.sp_id=b.cthd_idsp
//                                        join khach_hang as d on d.kh_id=a.hd_idkh
//                                        join dia_chi as e on d.kh_id=e.dc_idkh
//                                        WHERE a.hd_id = $iddon
//
//                                        ";
//
//$result1 = mysqli_query($conn, $sql1);

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

<!-- Main layout  -->
<form action="" method="get">
    <input type="text"
           placeholder="Nhập Email của bạn"
           name="email"

    >
    <button type="submit"
            class="btn blue-gradient btn-rounded waves-effect waves-light btn-sm"
            value="Tìm"
    >Tìm

    </button>

</form>
<main>
    <div class="container-fluid my-5 w-75 ">

        <!-- Gird column -->
        <div class="col-md-12">

            <div class="card">

                <div class="card-body mb-5">


                    <form id="myfrm">
                        <p class="mt-5"><i><u>Đơn Hàng Mới Nhất</u></i></p>
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
                                <th class="col-md-5 font-weight-bold">' . $row1['dc_emailkh'] . '</th>
                            </tr>
                            
                             <tr>
                                <td class="col-md-5 font-weight-normal">Số điện thoại:</td>
                                <th class="col-md-5 font-weight-bold">' . $row1['dc_sdt'] . '</th>
                            </tr>
                            
                             <tr>
                                <td class="col-md-5 font-weight-normal">Địa chỉ:</td>
                                <th class="col-md-5 font-weight-bold">' . $row1['dc_diachi'] . '</th>
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

//                                $sql12 = "select count(*) as tong, idsach, soluongsp from chitiet_dondathang where iddon=$iddon";
//                                $rs12 = mysqli_query($conn,$sql12);
//                                $sql112 = "select sum(soluongsp) as tongsp  from chitiet_dondathang where iddon=$iddon";
//                                $rs112 = mysqli_query($conn,$sql112);
//                                $row112 = mysqli_fetch_assoc($rs112);
//                                echo "Tổng SL sách mua  là " . $row112['tongsp'] . "<br>";
//                                while ($row12 = mysqli_fetch_assoc($rs12)) {
//                                    echo " SL sách là " . $row12['tong'] . "<br>";

//
//                                $sql14 = "SELECT *
//                                        FROM sanpham  as s
//                                        join chi_tiet_hoa_don as z on s.sp_id=z.cthd_idsp
//                                        join hoa_don as a on a.hd_id=z.cthd_idhd
//                                        join khach_hang as b on b.kh_id=a.hd_idkh
//                                        WHERE b.kh_id='$email'
//                                        ";

                                $sql14="select * from hoa_don as a join khach_hang as b on a.hd_idkh=b.kh_id
                                                                    join chi_tiet_hoa_don as c on a.hd_id=c.cthd_idhd
                                                                    join sanpham as d on d.sp_id=c.cthd_idsp
                                                 where kh_email='$email' 
                                                
                                                  order by cthd_idhd desc
                                ";

                                if ($rs14 = mysqli_query($conn, $sql14)) {
                                    while ($row14 = mysqli_fetch_assoc($rs14)) {
                                        echo '
                                            <tr>
                                                <td class="text-center">' . $stt++ . '</td>
                                                <td > ' . $row14['sp_tensach'] . '</td>
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
                    <p align="center"><input class='btn btn-sm btn btn-primary' title="In hóa đơn" type="button"
                                             onclick="myPrint('myfrm')" value="In hóa đơn"></p>


                    <!--trạng thái-->


                    <div>
                        <form action="trangthai.php" method="GET">
                            <table>

                                <tr>
                                    <div class="md - form ml - 4 pl - 5">
                                        <th class="th-sm font-weight-bold text-center">
                                            <label for="select" style="margin - left: 0.9em;">
                                                Cập nhật trạng thái mới:
                                            </label>
                                            <select class=""
                                                    id="select"
                                                    name="trangthai"
                                                    style="margin - left: 3em; margin - top: 0.5em;width: 8em;">

                                                <option value="1">Chờ xác nhận</option>
                                                <option value="2">Đã xác nhận</option>
                                                <option value="3">Đang giao hàng</option>
                                                <option value="4">Đã giao hàng</option>
                                                <option value="5">Hủy đơn hàng</option>

                                            </select>
                                        </th>
                                    </div>


                                    <input type="hidden" name="id" value="<?php echo $iddon; ?>">

                                    <td>
                                        <button class="btn btn-sm btn btn-blue-grey mt-0"
                                                title="Cập nhật trạng thái"
                                                type="submit">Cập nhật

                                            <!--                                <a href="trangthai.php?iddon=-->
                                            <?php //echo $iddon;?><!--" class="white-text" >Cập nhật</a>-->
                                        </button>
                                    </td>
                                </tr>

                            </table>
                        </form>

                    </div>

                    <!--trạng thái-->


                </div>

            </div>

        </div>

        <!-- Gird column -->

    </div>

</main>

</body>

<script>
    function myPrint(myfrm) {
        var printdata = document.getElementById(myfrm);
        newwin = window.open("");
        newwin.document.write(printdata.outerHTML);
        newwin.print();
        newwin.close();
    }
</script>
<!--<script>-->
<!--    Let e = document.getElementById("select").value;-->
<!--    Let giatri = e.option.text;-->
<!--    console.log(giatri);-->
<!--</script>-->
</html>