
<?php
if (session_id() === '') {
    session_start();
}
require "../../db.php";

//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();
$iddon = $_GET['iddon'];

$sql1 = "SELECT * FROM hoa_don as a join chi_tiet_hoa_don as b on a.hd_id=b.cthd_idhd
                                        join sanpham as c on c.sp_id=b.cthd_idsp   
                                        join khach_hang as d on d.kh_id=a.hd_idkh   
                                        join dia_chi as e on d.kh_id=e.dc_idkh   
                                        WHERE a.hd_id = $iddon
                                         
                                        ";

$result1 = mysqli_query($conn,$sql1);

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

<main>
    <div class="container-fluid my-5 w-75 ">

        <!-- Gird column -->
        <div class="col-md-12">

            <div class="card">

                <div class="card-body mb-5">
<form id="myfrm">
                    <p class="mt-5"><i><u>THÔNG TIN ĐƠN HÀNG</u></i></p>
                    <div class="ml-5 pl-5">

                        <!--thong tin kh-->
                        <?php
                        $sql2 = "select sum(cthd_soluong) as tongsp  from chi_tiet_hoa_don where cthd_idhd=$iddon";
                        $rs2 = mysqli_query($conn,$sql2);
                        $row2 = mysqli_fetch_assoc($rs2);
                        if ($result1->num_rows > 0) {
                            $row1 = $result1->fetch_assoc();
                            echo '
                        <table >
                        <tbody >

                            <tr>
                                <td class="col-md-5 font-weight-normal">Ngày đặt:</td>
                                <th class="col-md-5 font-weight-bold">'. date('d/m/Y ', strtotime($row1['hd_thoigianlapdonhang'])) .'</th>
                            </tr>
                        
                            <tr>
                                <td class="col-md-5 font-weight-normal" >Tên khách hàng:</td>
                                <th class="col-md-5 font-weight-bold">'.$row1['dc_hoten'].'</th>
                            </tr>
                            
                             <tr>
                                <td class="col-md-5 font-weight-normal">Email khách hàng:</td>
                                <th class="col-md-5 font-weight-bold">'.$row1['dc_emailkh'].'</th>
                            </tr>
                            
                             <tr>
                                <td class="col-md-5 font-weight-normal">Số điện thoại:</td>
                                <th class="col-md-5 font-weight-bold">'.$row1['dc_sdt'].'</th>
                            </tr>
                            
                             <tr>
                                <td class="col-md-5 font-weight-normal">Địa chỉ:</td>
                                <th class="col-md-5 font-weight-bold">'.$row1['dc_diachi'].'</th>
                            </tr>
                            
                            <tr>
                                <td class="col-md-5 font-weight-normal">Số lượng sản phẩm:</td>
                                <th class="col-md-5 font-weight-bold">'.$row2['tongsp'].'</th>
                            </tr>

                            <tr>
                                <td class="col-md-5 font-weight-normal">Tổng:</td>
                                <th class="col-md-5 font-weight-bold">'.number_format($row1['hd_tongtiendonhang'])." VNĐ".'</th>
                            </tr>
                            
                            <tr>
                                <td class="col-md-5 font-weight-normal">Phí vận chuyển:</td>
                                <th class="col-md-5 font-weight-bold">30,000 VNĐ</th>
                            </tr>
                            
                            <tr>
                                <th class="col-md-5 font-weight-bold "><h5 class="mt-4">Tổng thanh toán :</h5></th>
                                <th class="col-md-5 font-weight-bold"><h5 class="mt-4">'.number_format($row1['hd_tongtiendonhang']+30000)." VNĐ".'</h5></h5></th>
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
                    <table id="dtMaterialDesignExample" class="table w-100" >
                        <thead>

                        <tr>
                            <th class="font-weight-bold text-center">STT</th>
                            <th class="th-sm font-weight-bold text-center">Tên sách</th>
                            <th class="th-sm font-weight-bold text-center">Đơn giá</th>
                            <th class="th-sm font-weight-bold text-center">Số lượng </th>
                            <th class="th-sm font-weight-bold text-center">Thành tiền</th>
                        </tr>

                        </thead>

                        <tbody>

                        <?php
                        $stt=1;
                        $sql11 = "select * from hoa_don where hd_id=$iddon";
                        $rs11 = mysqli_query($conn,$sql11);
                        while ($row11 = mysqli_fetch_assoc($rs11)){

//                                $sql12 = "select count(*) as tong, idsach, soluongsp from chitiet_dondathang where iddon=$iddon";
//                                $rs12 = mysqli_query($conn,$sql12);
//                                $sql112 = "select sum(soluongsp) as tongsp  from chitiet_dondathang where iddon=$iddon";
//                                $rs112 = mysqli_query($conn,$sql112);
//                                $row112 = mysqli_fetch_assoc($rs112);
//                                echo "Tổng SL sách mua  là " . $row112['tongsp'] . "<br>";
//                                while ($row12 = mysqli_fetch_assoc($rs12)) {
//                                    echo " SL sách là " . $row12['tong'] . "<br>";


                            $sql14="SELECT *
                                        FROM sanpham  as s
                                        join chi_tiet_hoa_don as z on s.sp_id=z.cthd_idsp
                                        join hoa_don as a on a.hd_id=z.cthd_idhd
                                        join khach_hang as b on b.kh_id=a.hd_idkh
                                        WHERE z.cthd_idhd = $iddon
                                        ";

                            if($rs14= mysqli_query($conn, $sql14)){
                                while ($row14 = mysqli_fetch_assoc($rs14)){
                                    echo '
                                            <tr>
                                                <td class="text-center">'.$stt++.'</td>
                                                <td > '. $row14['sp_tensach'] .'</td>
                                                <td class="text-center"> '. number_format($row14['cthd_gia'] ).'</td>
                                                <td class="text-center"> '. $row14['cthd_soluong'] .' </td>
                                                <td class="text-center"> '. number_format($row14['cthd_gia']*$row14['cthd_soluong']) .' </td>

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
                    <p align="center"><input class='btn btn-sm btn btn-primary' title="In hóa đơn" type="button" onclick="myPrint('myfrm')" value="In hóa đơn"></p>

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

</html>