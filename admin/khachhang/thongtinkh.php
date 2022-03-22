<?php
session_start();
require "../../db.php";
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thông Tin Khách Hàng</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39+Text&display=swap" rel="stylesheet">


</head>

<body class="product-v1 hidden-sn white-skin animated white">

<!-- Navigation -->
<header>
    <!-- Sidebar navigation -->
    <ul id="slide-out" class="side-nav custom-scrollbar">
        <!-- Logo-->
        <li class="logo-sn waves-effect py-3">
            <div class="text-center">
                <a href="#" class="pl-0"><img src="http://localhost/CT466/image/logo.png" style="width: 80%;"></a>
            </div>
        </li>

        <li>
            <div class="md-form mt-0 waves-light border-bottom border-info">
                <h4 class="text-center blue-text font-weight-bold mt-4 mb-2 ">
                    QUẢN LÝ
                </h4>
            </div>
        </li>
        <!-- Logo-->
        <!-- Side navigation links-->
        <li>
            <ul class="collapsible collapsible-accordion">

                <li>
                    <ul class="collapsible collapsible-accordion">
                        <!-- buoi 0 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> ADMIN<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/thongtin/dsadmin.php" class="waves-effect">Danh Sách Admin</a></li>
                                    <li><a href="http://localhost/CT466/admin/thongtin/thongtincanhan.php" class="waves-effect">Thông Tin Admin</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- buoi 1 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> SẢN PHẨM<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/sach/dssach.php" class="waves-effect">Danh Sách Sản Phẩm</a></li>
                                    <li><a href="http://localhost/CT466/admin/sach/ThemSach.php" class="waves-effect">Thêm Sản Phẩm</a></li>
                                    <li><a href="http://localhost/CT466/admin/sach/dssach.php" class="waves-effect">Sửa Sản Phẩm</a></li>
                                    <li><a href="http://localhost/CT466/admin/sach/dssach.php" class="waves-effect">Xóa Sản Phẩm</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- buoi2 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> KHÁCH HÀNG<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/khachhang/dskhachhang.php" class="waves-effect">Danh sách khách hàng</a></li>
                                    <li><a href="#" class="waves-effect">Thêm khách hàng</a></li>
                                    <li><a href="http://localhost/CT466/admin/khachhang/dskhachhang.php" class="waves-effect">Sửa khách hàng</a></li>
                                    <li><a href="http://localhost/CT466/admin/khachhang/dskhachhang.php" class="waves-effect">Xóa khách hàng</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- Buoi 3 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> ĐƠN HÀNG<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#" class="waves-effect">Thông Tin Đơn Hàng</a></li>
                                    <!--                                    <li><a href="#" class="waves-effect">Đã Xác Nhận</a></li>-->
                                    <!--                                    <li><a href="#" class="waves-effect">Đang Giao</a></li>-->
                                    <!--                                    <li><a href="#" class="waves-effect">Giao Thành Công</a></li>-->
                                </ul>
                            </div>
                        </li>
                        <!-- Buoi 4 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> HÓA ĐƠN<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#" class="waves-effect">Danh Sách Hóa Đơn</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- buoi 5 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> TÁC GIẢ<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/tacgia/dstacgia.php" class="waves-effect">Danh Sách Tác Giả</a></li>
                                    <li><a href="http://localhost/CT466/admin/tacgia/ThemTacGia.html" class="waves-effect">Thêm Tác Giả</a></li>
                                    <li><a href="http://localhost/CT466/admin/tacgia/dstacgia.php" class="waves-effect">Sửa Tác Giả</a></li>
                                    <li><a href="http://localhost/CT466/admin/tacgia/dstacgia.php" class="waves-effect">Xóa Tác Giả</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- buoi 6 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> NHÀ XUẤT BẢN<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/nxb/dsnxb.php" class="waves-effect">Danh Sách NXB</a></li>
                                    <li><a href="http://localhost/CT466/admin/nxb/themnxb.html" class="waves-effect">Thêm NXB</a></li>
                                    <li><a href="http://localhost/CT466/admin/nxb/dsnxb.php" class="waves-effect">Sửa NXB</a></li>
                                    <li><a href="http://localhost/CT466/admin/nxb/dsnxb.php" class="waves-effect">Xóa NXB</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- buoi 7 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> THỂ LOẠI<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/theloai/dstheloai.php" class="waves-effect">Danh Sách Thể Loại</a></li>
                                    <li><a href="http://localhost/CT466/admin/theloai/ThemTheLoai.html" class="waves-effect">Thêm Thể Loại</a></li>
                                    <li><a href="http://localhost/CT466/admin/theloai/dstheloai.php" class="waves-effect">Sửa Thể Loại</a></li>
                                    <li><a href="http://localhost/CT466/admin/theloai/dstheloai.php" class="waves-effect">Xóa Thể Loại</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

        </li></li>

        <!-- Side navigation links-->

    </ul>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar white">

        <div class="container">

            <!-- SideNav slide-out button -->
            <div class="float-left mr-2">

                <a href="#" data-activates="slide-out" class="button-collapse">

                    <!--                    <i class="fas fa-bars"></i>-->
                    <i class="fas fa-book-open"></i>


                </a>

            </div>

            <a class="navbar-brand font-weight-bold" href="http://localhost/CT466/admin/index.php">

                <strong>HIRAKI.COM</strong>

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown ml-3">

                        <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold"
                           id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <i class="fas fa-user blue-text"></i> Tài Khoản </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">

                            <a class="dropdown-item" href="http://localhost/CT466/admin/thongtin/thongtintaikhoan.php">Tài Khoản Của Tôi</a>

                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/CT466/admin/dk.php">Đăng Ký</a>

                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/CT466/admin/xulydangxuat.php">Đăng Xuất</a>

                        </div>

                    </li>

                </ul>

            </div>

        </div>

    </nav>
    <!-- Navbar -->

</header>
<!-- Navigation -->

<!-- Main Container -->
<div class="container mt-5 pt-3">

    <!-- Section: Product detail -->
    <section id="productDetails" class="pb-5">

        <!-- News card -->
        <div class="card mt-5 hoverable">

            <div class="row mt-5">

                <div class="col-lg-6">

                    <!-- Carousel Wrapper -->
                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

                        <!-- Slides -->

                        <div class="col-lg-6">

                            <!-- Carousel Wrapper -->
                            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

                                <!-- Slides  class="col-md-12 text-center text-md-left text-md-right"-->
                                <div class="row mt-3 mb-4" style="margin: 2em; padding: 7em;">
                                    <div class="md-form">
                                        <h1 class="logo "
                                            style="
                                                        /*padding-top: 0.2em;*/
                                                        color: rgba(55,132,187,0.85);
                                                        text-align: center;
                                                        font-size: 6em;
                                                        font-family: 'Libre Barcode 39 Text', cursive;
                                                        text-shadow: 2px 1px rgba(221,223,225,0.89)">
                                            HIRAKI
                                        </h1>
                                        <p class="slogan" style="color: black; text-align: center; font-size: 1.5em">Thông Tin Khách Hàng</p>
                                    </div>

                                </div>

                                <!-- Slides -->

                            </div>
                            <!-- Carousel Wrapper -->

                        </div>

                        <!-- Slides -->

                    </div>
                    <!-- Carousel Wrapper -->

                </div>
                <div class="col-lg-5">
                    <!--                    <h3><strong>Tài Khoản Của Tôi</strong></h3>-->
                    <br><br><br>
                    <table id="dtMaterialDesignExample" class="table">
                        <tbody>
                        <?php
                        // lấy email người dùng  đang đn
                        $id=$_GET['id'];
//                        if(isset($_SESSION['email'])){
//                            $email = $_SESSION['email'];
//                        }else header("location:dangnhap.html");
                            $sql4 = "SELECT * FROM khach_hang as a join dia_chi as b on a.kh_id = b.dc_idkh 
                                                                   join hoa_don as c on c.hd_idkh=a.kh_id
                                                WHERE  (kh_id='".$id."')";
                            $result4 = $conn->query($sql4);
//                        echo "$sql4";
                            if ($result4->num_rows == 1   ) {
                                $row4 = $result4->fetch_assoc();

                                echo "<tr>
                                                <th class=\"th-sm\">Họ Tên</th>
                                                <td>" . $row4['dc_hoten'] . "</td>
                                               </tr>";
                                echo "<tr>
                                                <th class=\"th-sm\">Email</th>
                                                <td>" . $row4['dc_emailkh'] . "</td>
                                               </tr>";

                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- Add to Cart -->
                    <section class="color">

                        <div class="mt-5">

                            <!--                            <p class="grey-text">Choose your color</p>-->


<!--                            <div class="row mt-3 mb-4">-->
<!---->
<!--                                <div class="col-md-12 text-center text-md-left text-md-right">-->
<!---->
<!--                                    <button class="btn btn-primary btn-rounded">-->
<!--                                        Đổi Mật Khẩu-->
<!--                                    </button>-->
<!---->
<!--                                </div>-->
<!---->
<!--                            </div>-->

                        </div>

                    </section>
                    <!-- Add to Cart -->
                </div>


            </div>

        </div>

    </section>

</div>
<!-- Main Container -->

<!-- Footer  -->
<footer class="page-footer pt-0 mt-5">

    <!-- Copyright  -->
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © Nhà Sách Trực Tuyến HIRAKI: <a href="#" target="_blank"> HIRAKI.COM </a>

        </div>
    </div>
    <!-- Copyright  -->

</footer>
<!-- Footer  -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../js/popper.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../js/mdb.min.js"></script>

<script type="text/javascript">
    /* WOW.js init */
    new WOW().init();
    // SideNav Button Initialization

    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization

    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
    // Tooltips Initialization
    $(function () {

        $('[data-toggle="tooltip"]').tooltip()
    });
    // Material Select Initialization
    $(document).ready(function () {

        $('.mdb-select').material_select();
    });

</script>

</body>

</html>


<!--echo "<tr>-->
<!--    <th class=\"th-sm\">ID</th>-->
<!--    <td>" . $row4['idkh'] . "</td>-->
<!--</tr>";-->