

<?php

session_start();
//
if (isset($_SESSION['ad_email'])) {
    $email = $_SESSION['ad_email'];
} else header("location:dangnhap.php");

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ADMIN</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../MDB-ecommerce-Templates-Pack_4.8.11/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../MDB-ecommerce-Templates-Pack_4.8.11/css/mdb.min.css" rel="stylesheet">
    <!--    link font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <!--    font2-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39+Text&display=swap" rel="stylesheet">
    <style type="text/css">
        .multiple-select-dropdown li [type=checkbox]+label {

            height: 1rem;
        }

    </style>

</head>

<body class="category-v2 hidden-sn white-skin animated">
<?php
require "headerindex.php";
?>
<!-- Navbar  ngang-->
<nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
    <!-- SideNav slide-out button  -->
    <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
    </div>

    <div class="breadcrumb-dn mr-auto">
<!--        <p><strong>Danh Sách Admin</strong></p>-->
    </div>
    <!-- Navbar links  -->
    <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <!-- Dropdown  -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user blue-text"></i> <span
                        class="clearfix d-none d-sm-inline-block">Tài Khoản</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
<!--                <a class="dropdown-item" href="http://localhost/CT466/admin/dangky.html">Đăng Ký</a>-->
<!--                <a class="dropdown-item" href="http://localhost/CT466/admin/dangnhap.html">Đăng Nhập</a>-->
                <a class="dropdown-item" onclick="return confirm('Bạn chắc chắn đăng xuất?')" href="http://localhost/CT466/admin/xulydangxuat.php">Đăng Xuất</a>
            </div>
        </li>
    </ul>
    <!-- Navbar links  -->
</nav>
<!-- Navbar  ngang-->

<!-- Main Container-->
<div class="container mt-5 pt-3 mr-5 pr-5">

    <!-- Navbar sp-->
    <nav class="navbar navbar-expand-lg navbar-dark primary-color mt-5 mb-5">

        <!-- Navbar brand-->
        <a class="font-weight-bold white-text mr-4 m-2 p-1" style="font-size: 18px;" href="http://localhost/CT466/admin/index.php">THỐNG KÊ</a>

        <!-- Collapse button-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
                aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>

        <!-- Collapsible content-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">


            <!-- Search form-->
<!--            <form class="search-form" role="search">-->
<!---->
<!--                <div class="form-group md-form my-0 waves-light">-->
<!---->
<!--                    <input type="text" class="form-control" placeholder="Tìm Kiếm">-->
<!---->
<!--                </div>-->
<!---->
<!--            </form>-->

        </div>
        <!-- Collapsible content-->

    </nav>

    <!-- Navbar sp-->
    <div class="row pt-4 pr-lg-1" style="margin-bottom: 5em;">

        <!-- Content-->
        <div class="col-md-12 ">


            <!-- Main layout -->
            <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'ct466';

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname)
            or die($conn->connect_error);

            $conn -> set_charset('utf8');

            $query1 = "select count(hd_id) from hoa_don  ";
            $rs1 = mysqli_query($conn,$query1);
            $row1 = mysqli_fetch_row($rs1);
            //print_r($row1[0]);

            $query10= "select sum(hd_tongtiendonhang) 
                        from hoa_don WHERE hd_trangthai = 4 
                                               and month(hd_thoigianlapdonhang) = month(CURRENT_DATE()) 
                                                and year( hd_thoigianlapdonhang) = year(CURRENT_DATE());";
            $rs10 = mysqli_query($conn,$query10);
            $row10 = mysqli_fetch_row($rs10);

            $query2 = "select count(kh_id) from khach_hang  ";
            $rs2 = mysqli_query($conn,$query2);
            $row2 = mysqli_fetch_row($rs2);
            //print_r($row2[0]);

            $query3 = "select count(sp_id) from sanpham  ";
            $rs3 = mysqli_query($conn,$query3);
            $row3 = mysqli_fetch_row($rs3);
            //print_r($row3[0]);
            $query4 = "select count(ncc_id) from nha_cung_cap ";
            $rs4 = mysqli_query($conn,$query4);
            $row4 = mysqli_fetch_row($rs4);
            $query4 = "select count(khlh_id) from kh_lienhe  ";
            $rs4 = mysqli_query($conn,$query4);
            $row4 = mysqli_fetch_row($rs4);
            //print_r($row4[0]);

            $query5 = "select sum(hd_tongtiendonhang) 
                        from hoa_don WHERE hd_trangthai = 4 ";
            $rs5 = mysqli_query($conn,$query5);
            $row5 = mysqli_fetch_row($rs5);
            //print_r($row5[0]);

            $query6 = "select count(tl_id) from the_loai  ";
            $rs6 = mysqli_query($conn,$query6);
            $row6 = mysqli_fetch_row($rs6);
            //print_r($row6[0]);

            $query7 = "select count(nxb_id) from nha_xuat_ban  ";
            $rs7 = mysqli_query($conn,$query7);
            $row7 = mysqli_fetch_row($rs7);
            //print_r($row7[0])

//            $query8 = "select count(id) from kh_lienhe  ";
//            $rs8 = mysqli_query($conn,$query8);
//            $row8 = mysqli_fetch_row($rs8);
            //print_r($row7[0]);

            $query9 = "select count(tg_id) from tac_gia  ";
            $rs9 = mysqli_query($conn,$query9);
            $row9 = mysqli_fetch_row($rs9);
            //print_r($row9[0]);
            ?>


<!--            <main class="col-md-12 ">-->

                <div class="container-fluid">

                    <!-- Section: Button icon -->
                    <section>

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column sp-->
                            <div class="col-xl-4 col-md-6 mb-4">

                                <!-- Card -->
                                <div class="card">

                                    <!-- Card Data -->
                                    <div class="row mt-3">

                                        <div class="col-md-5 col-5 text-left pl-4">

                                            <a type="button" class="btn-floating btn-lg primary-color ml-4" href="http://localhost/CT466/admin/sach/dssach.php">
                                                <!--                      <i class="far fa-book" aria-hidden="true"></i>-->
                                                <i class="fas fa-book"></i>
                                            </a>

                                        </div>

                                        <div class="col-md-7 col-7 text-right pr-5">

                                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row3[0]); ?> </h5>

                                            <p class="font-small grey-text">Số Lượng Sách</p>
                                        </div>

                                    </div>
                                    <!-- Card Data -->

                                    <!-- Card content -->
                                    <div class="row my-3">

                                        <div class="col-md-7 col-7 text-left pl-4">

                                            <p class="font-small font-up ml-4 font-weight-bold">Sản phẩm</p>

                                        </div>

                                        <div class="col-md-5 col-5 text-right pr-5">

                                            <!--                  <p class="font-small grey-text">145,567</p>-->
                                        </div>

                                    </div>
                                    <!-- Card content -->

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column sp-->

                            <!-- Grid column kh-->
                            <div class="col-xl-4 col-md-6 mb-4">

                                <!-- Card -->
                                <div class="card">

                                    <!-- Card Data -->
                                    <div class="row mt-3">

                                        <div class="col-md-5 col-5 text-left pl-4">

                                            <a type="button" class="btn-floating btn-lg warning-color ml-4" href="http://localhost/CT466/admin/khachhang/dskhachhang.php">
                                                <i class="fas fa-user" aria-hidden="true"></i></a>

                                        </div>

                                        <div class="col-md-7 col-7 text-right pr-5">

                                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row2[0]); ?> </h5>
                                            <p class="font-small grey-text">Khách hàng thành viên</p>

                                        </div>

                                    </div>
                                    <!-- Card Data -->

                                    <!-- Card content -->
                                    <div class="row my-3">

                                        <div class="col-md-7 col-7 text-left pl-4">
                                            <p class="font-small font-up ml-4 font-weight-bold">Khách Hàng </p>
                                        </div>

                                        <!--                <div class="col-md-5 col-5 text-right pr-5">-->
                                        <!--                  <p class="font-small grey-text">145,567</p>-->
                                        <!--                </div>-->

                                    </div>
                                    <!-- Card content -->

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column kh-->

                            <!-- Grid column khtv-->
                            <div class="col-xl-4 col-md-6 mb-4">

                                <!-- Card -->
                                <div class="card">

                                    <!-- Card Data -->
                                    <div class="row mt-3">

                                        <div class="col-md-5 col-5 text-left pl-4">
                                            <a type="button" class="btn-floating btn-lg success-color ml-4" href="http://localhost/CT466/khachhang/xem_lienhe.php">
                                                <!--                        <i class="fas fa-user" aria-hidden="true"></i>-->
                                                <i class="fas fa-phone"></i>
                                            </a>
                                        </div>

                                        <div class="col-md-7 col-7 text-right pr-5">
                                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row4[0]); ?></h5>
                                            <p class="font-small grey-text"> SL yêu cầu</p>
                                        </div>

                                    </div>
                                    <!-- Card Data -->

                                    <!-- Card content -->
                                    <div class="row my-3">

                                        <!-- Grid column -->
                                        <div class="col-md-9 col-7 text-left pl-4">
                                            <p class="font-small font-up ml-4 font-weight-bold">Yêu cầu tư vấn</p>
                                        </div>
                                        <!-- Grid column -->

                                        <!-- Grid column -->
                                        <div class="col-md-5 col-5 text-right pr-5">
                                            <!--                  <p class="font-small grey-text">145,567</p>-->
                                        </div>
                                        <!-- Grid column -->

                                    </div>
                                    <!-- Card content -->

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column khtv-->


                            <!-- Grid column tong tien-->
                            <div class="col-xl-4 col-md-6 mb-4">

                                <!-- Card -->
                                <div class="card">

                                    <!-- Card Data -->
                                    <div class="row mt-3">

                                        <div class="col-md-5 col-5 text-left pl-4">
                                            <a type="button" class="btn-floating btn-lg light-blue lighten-1 ml-4"><i class="fas fa-dollar-sign"
                                                                                                                      aria-hidden="true"></i></a>
                                        </div>

                                        <div class="col-md-7 col-7 text-right pr-5">
                                            <h5 class=" mt-4 mb-2 font-weight-bold"><?php print_r(number_format($row10[0])); ?></h5>
                                            <p class="font-small grey-text">VNĐ</p>
                                        </div>

                                    </div>
                                    <!-- Card Data -->

                                    <!-- Card content -->
                                    <div class="row my-3">

                                        <!-- Grid column -->
                                        <div class="col-md-9 col-7 text-left pl-4">
                                            <p class="font-small font-up ml-4 font-weight-bold">Tổng doanh thu trong tháng</p>
                                        </div>
                                        <!-- Grid column -->

                                        <!-- Grid column -->
                                        <div class="col-md-5 col-5 text-right pr-5">
                                            <!--                  <p class="font-small grey-text">145,567</p>-->
                                        </div>
                                        <!-- Grid column -->

                                    </div>
                                    <!-- Card content -->

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column tong tien-->


                            <!-- Grid column don hang-->
                            <div class="col-xl-4 col-md-6 mb-4">

                                <!-- Card -->
                                <div class="card">

                                    <!-- Card Data -->
                                    <div class="row mt-3">

                                        <div class="col-md-5 col-5 text-left pl-4">
                                            <a type="button" class="btn-floating btn-lg red accent-2 ml-4" href="http://localhost/CT466/admin/donhang/quanlydonhang.php"><i class="fas fa-database"
                                                                                                              aria-hidden="true"></i></a>
                                        </div>

                                        <div class="col-md-7 col-7 text-right pr-5">
                                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row1[0]); ?></h5>
                                            <p class="font-small grey-text">SL đơn hàng</p>
                                        </div>

                                    </div>
                                    <!-- Card Data -->

                                    <!-- Card content -->
                                    <div class="row my-3">

                                        <div class="col-md-9 col-7 text-left pl-4">
                                            <p class="font-small font-up ml-4 font-weight-bold">Đơn đặt hàng</p>
                                        </div>

                                        <div class="col-md-5 col-5 text-right pr-5">
                                            <!--                  <p class="font-small grey-text">--><?php //print_r($row1[0]); ?><!--</p>-->
                                        </div>

                                    </div>
                                    <!-- Card content -->

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column do hang -->

                            <!-- Grid column the loai-->
                            <div class="col-xl-4 col-md-6 mb-4">

                                <!-- Card -->
                                <div class="card">

                                    <!-- Card Data -->
                                    <div class="row mt-3">

                                        <div class="col-md-5 col-5 text-left pl-4">
                                            <a type="button" class="btn-floating btn-lg purple accent-2 ml-4" href="http://localhost/CT466/admin/theloai/dstheloai.php">
<!--                                                <i class="fas fa-database" aria-hidden="true"></i>-->
                                                <i class="fas fa-list"></i>

                                            </a>
                                        </div>

                                        <div class="col-md-7 col-7 text-right pr-5">
                                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row6[0]); ?></h5>
                                            <p class="font-small grey-text">Tổng thể loại</p>
                                        </div>

                                    </div>
                                    <!-- Card Data -->

                                    <!-- Card content -->
                                    <div class="row my-3">

                                        <div class="col-md-9 col-7 text-left pl-4">
                                            <p class="font-small font-up ml-4 font-weight-bold">Thể loại sách</p>
                                        </div>

                                        <div class="col-md-5 col-5 text-right pr-5">
                                        </div>

                                    </div>
                                    <!-- Card content -->

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column the loai -->

                            <!-- Grid column nxb-->
                            <div class="col-xl-4 col-md-6 mb-4">

                                <!-- Card -->
                                <div class="card">

                                    <!-- Card Data -->
                                    <div class="row mt-3">

                                        <div class="col-md-5 col-5 text-left pl-4">
                                            <a type="button" class="btn-floating btn-lg gradient accent-2 ml-4" href="http://localhost/CT466/admin/nxb/dsnxb.php">
<!--                                                <i class="fas fa-database" aria-hidden="true"></i>-->
                                                <i class="fas fa-warehouse"></i>
                                            </a>
                                        </div>

                                        <div class="col-md-7 col-7 text-right pr-5">
                                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row7[0]); ?></h5>
                                            <p class="font-small grey-text">SL Nhà Xuất Bản</p>
                                        </div>

                                    </div>
                                    <!-- Card Data -->

                                    <!-- Card content -->
                                    <div class="row my-3">

                                        <div class="col-md-9 col-7 text-left pl-4">
                                            <p class="font-small font-up ml-4 font-weight-bold">Nhà Xuất Bản</p>
                                        </div>

                                        <div class="col-md-5 col-5 text-right pr-5">
                                        </div>

                                    </div>
                                    <!-- Card content -->

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column nxb -->

                            <!-- Grid column tg-->
                            <div class="col-xl-4 col-md-6 mb-4">

                                <!-- Card -->
                                <div class="card">

                                    <!-- Card Data -->
                                    <div class="row mt-3">

                                        <div class="col-md-5 col-5 text-left pl-4">
                                            <a type="button" class="btn-floating btn-lg btn-discord ml-4" href="http://localhost/CT466/admin/tacgia/dstacgia.php">
                                                <!--                                                <i class="fas fa-database" aria-hidden="true"></i>-->
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                        </div>

                                        <div class="col-md-7 col-7 text-right pr-5">
                                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row9[0]); ?></h5>
                                            <p class="font-small grey-text">SL Tác Giả</p>
                                        </div>

                                    </div>
                                    <!-- Card Data -->

                                    <!-- Card content -->
                                    <div class="row my-3">

                                        <div class="col-md-9 col-7 text-left pl-4">
                                            <p class="font-small font-up ml-4 font-weight-bold">Tác Giả</p>
                                        </div>

                                        <div class="col-md-5 col-5 text-right pr-5">
                                        </div>

                                    </div>
                                    <!-- Card content -->

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column tg -->

                            <!-- Grid column ad-->
                            <div class="col-xl-4 col-md-6 mb-4">

                                <!-- Card -->
                                <div class="card">

                                    <!-- Card Data -->
                                    <div class="row mt-3">

                                        <div class="col-md-5 col-5 text-left pl-4">
                                            <a type="button" class="btn-floating btn-lg btn-blue-grey ml-4" href="http://localhost/CT466/admin/ncc/dsncc.php">
                                                <!--                                                <i class="fas fa-database" aria-hidden="true"></i>-->
                                                <i class="fas fa-warehouse"></i>
                                            </a>
                                        </div>

                                        <div class="col-md-7 col-7 text-right pr-5">
                                            <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row4[0]); ?></h5>
                                            <p class="font-small grey-text">SL Nhà Cung Cấp</p>
                                        </div>

                                    </div>
                                    <!-- Card Data -->

                                    <!-- Card content -->
                                    <div class="row my-3">

                                        <div class="col-md-9 col-7 text-left pl-4">
                                            <p class="font-small font-up ml-4 font-weight-bold">Nhà Cung Cấp</p>
                                        </div>

                                        <div class="col-md-5 col-5 text-right pr-5">
                                        </div>

                                    </div>
                                    <!-- Card content -->

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column ad -->

                            <!-- Grid column tong tien nam-->
                            <div class="col-xl-12 col-md-12 mb-12">

                                <!-- Card -->
                                <div class="card">

                                    <!-- Card Data -->
                                    <div class="row mt-3">

                                        <div class="col-md-5 col-5 text-left pl-4">
                                            <a type="button" class="btn-floating btn-lg pink lighten-1 ml-4"><i class="fas fa-dollar-sign"
                                                                                                                      aria-hidden="true"></i></a>
                                        </div>

                                        <div class="col-md-7 col-7 text-right pr-5">
                                            <h5 class=" mt-4 mb-2 font-weight-bold"><?php print_r(number_format($row5[0])); ?></h5>
                                            <p class="font-small grey-text">VNĐ</p>
                                        </div>

                                    </div>
                                    <!-- Card Data -->

                                    <!-- Card content -->
                                    <div class="row my-3">

                                        <!-- Grid column -->
                                        <div class="col-md-9 col-7 text-left pl-4">
                                            <p class="font-small font-up ml-4 font-weight-bold">Tổng doanh thu </p>
                                        </div>
                                        <!-- Grid column -->

                                        <!-- Grid column -->
                                        <div class="col-md-5 col-5 text-right pr-5">
                                            <!--                  <p class="font-small grey-text">145,567</p>-->
                                        </div>
                                        <!-- Grid column -->

                                    </div>
                                    <!-- Card content -->

                                </div>
                                <!-- Card -->

                            </div>
                            <!-- Grid column tong tien nam-->


                        </div>
                        <!-- Grid row -->

                    </section>
                    <!-- Section: Button icon -->
                </div>
<!--            </main>-->

            <!-- Main layout -->



            <!-- slide anh -->
<!--            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">-->
<!--                <div class="carousel-inner">-->
<!--                    <div class="carousel-item active">-->
<!--                        <img class="d-block w-100" src="../image/nen.png" alt="First slide" style="height:30em ;">-->
<!--                    </div>-->
<!--                    <div class="carousel-item">-->
<!--                        <img class="d-block w-100" src="../image/nen1.png" alt="Second slide" style="height:30em ;">-->
<!--                    </div>-->
<!--                    <div class="carousel-item">-->
<!--                        <img class="d-block w-100" src="../image/nen2.png" alt="Third slide" style="height:30em ;">-->
<!--                    </div>-->
<!--                    <div class="carousel-item">-->
<!--                        <img class="d-block w-100" src="../image/nen3.png" alt="Third slide" style="height:30em ;">-->
<!--                    </div>-->
<!--                    <div class="carousel-item">-->
<!--                        <img class="d-block w-100" src="../image/nen5.png" alt="Third slide" style="height:30em ;">-->
<!--                    </div>-->
<!--                    <div class="carousel-item">-->
<!--                        <img class="d-block w-100" src="../image/nen7.png" alt="Third slide" style="height:30em ;">-->
<!--                    </div>-->

<!--                </div>-->
<!--                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">-->
<!--                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--                    <span class="sr-only">Previous</span>-->
<!--                </a>-->
<!--                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">-->
<!--                    <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--                    <span class="sr-only">Next</span>-->
<!--                </a>-->
<!--            </div>-->
            <!-- end slide anh -->


        </div>
        <!-- Content-->


    </div>

</div>
<!-- Main Container-->

</main>






<!-- Footer-->
<footer class="page-footer text-center text-md-left stylish-color-dark pt-0">

    <!-- Copyright-->
    <div class="footer-copyright py-3 text-center" style="padding-right: 5em;">

        <div class="container-fluid">

            © 2013 Nhà Sách Trực tuyến: <a href="https://www.MDBootstrap.com"><strong> Hiraki.com</strong></a>

        </div>

    </div>
    <!-- Copyright-->

</footer>
<!-- Footer-->

<!-- SCRIPTS-->
<!-- JQuery-->
<script type="text/javascript" src="../MDB-ecommerce-Templates-Pack_4.8.11/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips-->
<script type="text/javascript" src="../MDB-ecommerce-Templates-Pack_4.8.11/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="../MDB-ecommerce-Templates-Pack_4.8.11/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript-->
<script type="text/javascript" src="../MDB-ecommerce-Templates-Pack_4.8.11/js/mdb.min.js"></script>
<script type="text/javascript">
    new WOW().init();
    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    let slider = $("#calculatorSlider");
    let reseller = $("#resellerEarnings");
    let client = $("#clientPrice");
    let percentageBonus = 30; // = 30%

    let license = {
        corpo: {
            active: true,
            price: 319,
        },
        dev: {
            active: false,
            price: 149,
        },
        priv: {
            active: false,
            price: 79,
        }
    };

    const calculate = (price, value) => {

        client.text((Math.round((price - (value / 100 * price)))) + '$');
        reseller.text((Math.round(((percentageBonus - value) / 100 * price))) + '$')
    }


    slider.on('input change', e => {

        if (license.priv.active) {

            calculate(license.priv.price, $(e.target).val());
        } else if (license.corpo.active) {

            calculate(license.corpo.price, $(e.target).val());
        } else if (license.dev.active) {

            calculate(license.dev.price, $(e.target).val());
        }
    })

    // Material Select Initialization
    $(document).ready(function () {

        $('.mdb-select').material_select();
    });

    // SideNav Initialization
    $(".button-collapse").sideNav();

</script>

</body>

</html>
