<?php
if (session_id() === '') {
    session_start();
}
require "../../db.php";

//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();
$iddon = $_GET['iddon'];

// lay id kh
$sql_dc = "SELECT kh_id,dc_diachi, dc_id FROM hoa_don as a join khach_hang as b on a.hd_idkh=b.kh_id
                                        join chi_tiet_hoa_don as c on a.hd_id=c.cthd_idhd  
                                        join dia_chi as e on b.kh_id=e.dc_idkh       
                                        WHERE hd_id = $iddon  

";

$rs_dc = mysqli_query($conn, $sql_dc);
$row_dc = mysqli_fetch_assoc($rs_dc);
$b = $row_dc['kh_id'];

$c = $row_dc['dc_id'];

$sql1 = "SELECT * FROM hoa_don as a JOIN dia_chi as b on a.hd_iddc=b.dc_id join khach_hang AS c on c.kh_id=b.dc_idkh  WHERE a.hd_id = $iddon";

$result1 = mysqli_query($conn, $sql1);


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
                    <!--trang thai cu-->
                    <div>
                        <table class="btn-outline-indigo m-auto">
                            <tr>
                                <th class="th-lg font-weight-bold text-center ">Trạng thái đơn hàng:</th>

                                <td class="th-lg font-weight-bold text-center text-black-50 font-italic">
                                    <?php

                                    $sql3 = "SELECT hd_trangthai FROM hoa_don WHERE hd_id=$iddon";
                                    $result3 = mysqli_query($conn, $sql3);
                                    $row3 = mysqli_fetch_assoc($result3);
                                    if ($row3['hd_trangthai'] == 1) {
                                        echo " Chờ xác nhận";
                                    }
                                    if ($row3['hd_trangthai'] == 2) {
                                        echo " Đã xác nhận";
                                    }
                                    if ($row3['hd_trangthai'] == 3) {
                                        echo " Đang giao hàng";
                                    }
                                    if ($row3['hd_trangthai'] == 4) {
                                        echo " Đã giao hàng";
                                    }
                                    if ($row3['hd_trangthai'] == 5) {
                                        echo " Hủy đơn hàng";
                                    }
                                    ?>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <!--trang thai cu-->

                    <form id="myfrm">
                        <p class="mt-5"><i><u>THÔNG TIN ĐƠN HÀNG</u></i></p>
                        <div class="ml-5 pl-5">

                            <!--thong tin kh-->
                            <?php


                            $sql2 = "select sum(cthd_soluong) as tongsp  from chi_tiet_hoa_don where cthd_idhd=$iddon";
                            $rs2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($rs2);
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
                                <td class="col-md-5 font-weight-normal">Phương thức thanh toán:</td>
                                <th class="col-md-5 font-weight-bold" style="text-transform: uppercase">' . $row1['hd_pttt'] . '</th>
                            </tr>
                            
                            <tr>
                                <td class="col-md-5 font-weight-normal">Số lượng sản phẩm:</td>
                                <th class="col-md-5 font-weight-bold">' . $row2['tongsp'] . '</th>
                            </tr>

                            <tr>
                                <td class="col-md-5 font-weight-normal">Tổng:</td>
                                <th class="col-md-5 font-weight-bold">' . number_format($row1['hd_tongtiendonhang']) . " VNĐ" . '</th>
                            </tr>
                            
                            <tr>
                                <td class="col-md-5 font-weight-normal">Phí vận chuyển:</td>
                                <th class="col-md-5 font-weight-bold">30,000 VNĐ</th>
                            </tr>
                            
                            <tr>
                                <th class="col-md-5 font-weight-bold "><h5 class="mt-4">Tổng thanh toán :</h5></th>
                                <th class="col-md-5 font-weight-bold"><h5 class="mt-4">' . number_format($row1['hd_tongtiendonhang'] + 30000) . " VNĐ" . '</h5></h5></th>
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
                                <th class="th-sm font-weight-bold text-center">Số lượng kho</th>
                                <th class="th-sm font-weight-bold text-center">Thành tiền</th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php
                            $stt = 1;
                            $sql11 = "select * from hoa_don where hd_id=$iddon";
                            $rs11 = mysqli_query($conn, $sql11);
                            while ($row11 = mysqli_fetch_assoc($rs11)) {


                                $sql14 = "SELECT *
                                        FROM sanpham  as s
                                        join chi_tiet_hoa_don as z on s.sp_id=z.cthd_idsp
                                        join hoa_don as a on a.hd_id=z.cthd_idhd
                                        join khach_hang as b on b.kh_id=a.hd_idkh
                                        WHERE z.cthd_idhd = $iddon
                                        ";

                                if ($rs14 = mysqli_query($conn, $sql14)) {
                                    while ($row14 = mysqli_fetch_assoc($rs14)) {
                                        echo '
                                            <tr>
                                                <td class="text-center">' . $stt++ . '</td>
                                                <td > ' . $row14['sp_tensach'] . '</td>
                                                <td class="text-center"> ' . number_format($row14['cthd_gia']) . ' <sup>đ</sup></td>
                                                <td class="text-center"> ' . $row14['cthd_soluong'] . ' </td>
                                                <td class="text-center"> ' . $row14['sp_soluong'] . ' </td>

                                                <td class="text-center"> ' . number_format($row14['cthd_gia'] * $row14['cthd_soluong']) . ' <sup>đ</sup></td>

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


                    <div>
                        <form action="trangthai.php" method="GET">
                            <?php
                            $sql15 = "SELECT * FROM hoa_don  WHERE hd_id = $iddon
                                        ";
                            $rs15 = mysqli_query($conn, $sql15);
                            $row15 = mysqli_fetch_assoc($rs15);

                            ?>
                            <table>

                                <tr>
                                    <div class="md - form ml - 4 pl - 5">
                                        <th class="th-sm font-weight-bold text-center">
                                            <label for="select" style="margin - left: 0.9em;">
                                                Cập nhật trạng thái mới:
                                            </label>
                                            <select
                                                    onchange="updatebill('<?php echo $iddon; ?>',this.value)"
                                                    class=""
                                                    id="select"
                                                    name="trangthai"
                                                    style="margin - left: 3em; margin - top: 0.5em;width: 8em;">
                                                <option value="<?php echo $row15['hd_trangthai']; ?>" selected>
                                                    <?php
                                                    if ($row15['hd_trangthai'] == 1) {
                                                        echo " Chờ xác nhận";
                                                    } elseif ($row15['hd_trangthai'] == 2) {
                                                        echo " Đã xác nhận";
                                                    } elseif ($row15['hd_trangthai'] == 3) {
                                                        echo " Đang giao hàng";
                                                    } elseif ($row15['hd_trangthai'] == 4) {
                                                        echo " Đã giao hàng";
                                                    } else {
                                                        echo "Hủy đơn hàng";
                                                    }
                                                    ?>


                                                </option>
                                                <?php
                                                if ($row15['hd_trangthai'] == 1) {
                                                    echo '
                                                        <option value="2">Đã xác nhận</option>
                                                        <option value="3">Đang giao hàng</option>
                                                        <option value="4">Đã giao hàng</option>
                                                        <option value="5">Hủy đơn hàng</option>
                                                    ';

                                                } elseif ($row15['hd_trangthai'] == 2) {
                                                    echo '
                                                        <option value="3">Đang giao hàng</option>
                                                        <option value="4">Đã giao hàng</option>
                                                        <option value="5">Hủy đơn hàng</option>
                                                    ';

                                                } elseif ($row15['hd_trangthai'] == 3) {
                                                    echo '
                                                       
                                                        <option value="4">Đã giao hàng</option>
                                                        <option value="5">Hủy đơn hàng</option>
                                                    ';

                                                } elseif ($row15['hd_trangthai'] == 4) {
                                                    echo '
                                                        
                                                    ';

                                                } elseif ($row15['hd_trangthai'] == 5) {
                                                    echo '
                                                        <option value="1">Chờ xác nhận</option>
                                                         <option value="2">Đã xác nhận</option>
                                                        <option value="3">Đang giao hàng</option>
                                                        <option value="4">Đã giao hàng</option>
                                                    ';

                                                }

                                                ?>


                                            </select>
                                        </th>
                                    </div>


                                    <input type="hidden" name="id" value="<?php echo $iddon; ?>">

                                    <td>

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
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips-->
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript-->
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/mdb.min.js"></script>
<script>


    function myPrint(myfrm) {
        var printdata = document.getElementById(myfrm);
        newwin = window.open("");
        newwin.document.write(printdata.outerHTML);
        newwin.print();
        newwin.close();
    }

    function updatebill(id, value) {
        let check = confirm("Bạn có chắc chắn cập nhật?");
        // alert(value);
        if (check) {
            $.post("updatebill.php", {'id': id, 'value': value}, function (data, status) {
                window.location.reload();

            });

        }
    }


</script>

</html>