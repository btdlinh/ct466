<?php
session_start();
require "../../db.php";
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();

$sql1 = "SELECT * FROM sanpham";
$result = $conn->query($sql1);


?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thông Tin Sản Phẩm</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.min.css" rel="stylesheet">

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
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i>
                                ADMIN<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/thongtin/dsadmin.php"
                                           class="waves-effect">Danh Sách Admin</a></li>
                                    <li><a href="http://localhost/CT466/admin/thongtin/thongtincanhan.php"
                                           class="waves-effect">Thông Tin Admin</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- buoi 1 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> SẢN
                                PHẨM<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/sach/dssach.php"
                                           class="waves-effect">Danh Sách Sản Phẩm</a></li>
                                    <li><a href="http://localhost/CT466/admin/sach/ThemSach.php"
                                           class="waves-effect">Thêm Sản Phẩm</a></li>
                                    <li><a href="http://localhost/CT466/admin/sach/dssach.php"
                                           class="waves-effect">Sửa Sản Phẩm</a></li>
                                    <li><a href="http://localhost/CT466/admin/sach/dssach.php"
                                           class="waves-effect">Xóa Sản Phẩm</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- buoi2 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i>
                                KHÁCH HÀNG<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/khachhang/dskhachhang.php"
                                           class="waves-effect">Danh sách khách hàng</a></li>
                                    <li><a href="#" class="waves-effect">Thêm khách hàng</a></li>
                                    <li><a href="http://localhost/CT466/admin/khachhang/dskhachhang.php"
                                           class="waves-effect">Sửa khách hàng</a></li>
                                    <li><a href="http://localhost/CT466/admin/khachhang/dskhachhang.php"
                                           class="waves-effect">Xóa khách hàng</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- Buoi 3 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> ĐƠN
                                HÀNG<i class="fas fa-angle-down rotate-icon"></i></a>
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
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> HÓA
                                ĐƠN<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#" class="waves-effect">Danh Sách Hóa Đơn</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- buoi 5 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> TÁC
                                GIẢ<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/tacgia/dstacgia.php"
                                           class="waves-effect">Danh Sách Tác Giả</a></li>
                                    <li><a href="http://localhost/CT466/admin/tacgia/ThemTacGia.html"
                                           class="waves-effect">Thêm Tác Giả</a></li>
                                    <li><a href="http://localhost/CT466/admin/tacgia/dstacgia.php"
                                           class="waves-effect">Sửa Tác Giả</a></li>
                                    <li><a href="http://localhost/CT466/admin/tacgia/dstacgia.php"
                                           class="waves-effect">Xóa Tác Giả</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- buoi 6 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> NHÀ
                                XUẤT BẢN<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/nxb/dsnxb.php" class="waves-effect">Danh
                                            Sách NXB</a></li>
                                    <li><a href="http://localhost/CT466/admin/nxb/themnxb.html"
                                           class="waves-effect">Thêm NXB</a></li>
                                    <li><a href="http://localhost/CT466/admin/nxb/dsnxb.php" class="waves-effect">Sửa
                                            NXB</a></li>
                                    <li><a href="http://localhost/CT466/admin/nxb/dsnxb.php" class="waves-effect">Xóa
                                            NXB</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- buoi 7 -->
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-chevron-right"></i> THỂ
                                LOẠI<i class="fas fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="http://localhost/CT466/admin/theloai/dstheloai.php"
                                           class="waves-effect">Danh Sách Thể Loại</a></li>
                                    <li><a href="http://localhost/CT466/admin/theloai/ThemTheLoai.html"
                                           class="waves-effect">Thêm Thể Loại</a></li>
                                    <li><a href="http://localhost/CT466/admin/theloai/dstheloai.php"
                                           class="waves-effect">Sửa Thể Loại</a></li>
                                    <li><a href="http://localhost/CT466/admin/theloai/dstheloai.php"
                                           class="waves-effect">Xóa Thể Loại</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

        </li>
        </li>

        <!-- Side navigation links-->

    </ul>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar white">

        <div class="container">

            <!-- SideNav slide-out button -->
            <div class="float-left mr-2">

                <a href="#" data-activates="slide-out" class="button-collapse">

                    <i class="fas fa-bars"></i>

                </a>

            </div>

            <a class="navbar-brand font-weight-bold" href="#">

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
                           id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">

                            <i class="fas fa-user blue-text"></i> Tài Khoản </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan"
                             aria-labelledby="navbarDropdownMenuLink-4">

                            <a class="dropdown-item waves-effect waves-light" href="#">Đăng Ký</a>

                            <a class="dropdown-item waves-effect waves-light" href="#">Đăng Xuất</a>

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

                <div class="col-lg-4">

                    <!-- Carousel Wrapper -->
                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                         data-ride="carousel">

                        <!-- Slides -->
                        <div class="carousel-inner text-center text-md-left" role="listbox">

                            <div class="carousel-item active">

                                <?php
                                $id = $_GET['idsach'];
                                $sql4 = "SELECT * FROM sanpham WHERE sp_id=$id";

                                $result4 = $conn->query($sql4);
                                if ($result4->num_rows > 0) {
                                    while ($row4 = $result4->fetch_assoc()) {
                                        $img = $row4['sp_hinhanh'];
                                        echo "<img src='$img' width='80%'  style='margin: 7em 2.5em' alt='Hình ảnh sách'>";
                                    }
                                }
                                ?>

                            </div>

                            <!--                            <div class="carousel-item">-->
                            <!---->
                            <!--                                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/18.jpg" alt="Second slide"-->
                            <!--                                     class="img-fluid">-->
                            <!---->
                            <!--                            </div>-->
                            <!---->
                            <!--                            <div class="carousel-item">-->
                            <!---->
                            <!--                                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/19.jpg" alt="Third slide"-->
                            <!--                                     class="img-fluid">-->
                            <!---->
                            <!--                            </div>-->

                        </div>
                        <!-- Slides -->

                    </div>
                    <!-- Carousel Wrapper -->

                </div>
                <div class="col-lg-8" style="    padding-right: 60px;">
                    <h3><strong>Thông Tin Sách</strong></h3>
                    <br><br>
                    <table id="dtMaterialDesignExample" class="table m-2">
                        <tbody>
                        <?php
                        // lấy id cần xem
                        $id = $_GET['idsach'];
                        //                        $sql4 = "SELECT * FROM sach WHERE idsach=$id";
                        $sql5 = "SELECT * FROM sanpham as s join the_loai as t on s.sp_idtheloai=t.tl_id 
                                                            join tac_gia as tg on s.sp_idtg=tg.tg_id 
                                                            join nha_xuat_ban as nxb on s.sp_idnxb=nxb.nxb_id 
                                                            join nha_cung_cap as ncc on s.sp_idncc=ncc.ncc_id 
                                                            join ngon_ngu as nn on s.sp_idnn=nn.nn_id 
                                        WHERE sp_id=$id";
                      //  echo $sql5;
                        $result5 = $conn->query($sql5);
                        if ($result5->num_rows) {
                            while ($row4 = $result5->fetch_assoc()) {
                                echo "<tr>
                                                <th class=\"th-sm\">ID</th>
                                                <td>" . $id . "</td>
                                               </tr>";
                                echo "<tr>
                                                <th class=\"th-sm\">Tên sách</th>
                                                <td>" . $row4['sp_tensach'] . "</td>
                                               </tr>";
                                echo "<tr>
                                                <th class=\"th-sm\">Ngôn ngữ</th>
                                                <td>" . $row4['nn_ngonngu'] . "</td>
                                               </tr>";
                                echo "<tr>
                                                <th class=\"th-sm\">Tác giả</th>
                                                <td>" . $row4['tg_hoten'] . "</td>
                                               </tr>";
                                echo "<tr>
                                                <th class=\"th-sm\">Thể loại</th>
                                                <td>" . $row4['tl_tentheloai'] . "</td>
                                               </tr>";
                                echo "<tr>
                                                <th class=\"th-sm\">Nhà xuất bản</th>
                                                <td>" . $row4['nxb_ten'] . "</td>
                                               </tr>";
                                echo "<tr>
                                                <th class=\"th-sm\">Nhà cung cấp</th>
                                                <td>" . $row4['ncc_ten'] . "</td>
                                               </tr>";
                                echo "<tr>
                                                <th class=\"th-sm\">Giá bán</th>
                                                <td>" . number_format($row4['sp_gia']) . " vnđ" . "</td>
                                               </tr>";
//                                echo "<tr>
//                                                <th class=\"th-sm\">Số lượng</th>
//                                                <td>".$row4['soluong']."</td>
//                                               </tr>";
                                echo "<tr>
                                                <th class=\"th-sm\">Số lượng</th>
                                                <td>" . $row4['sp_soluong'] . "</td>
                                               </tr>";
                                echo "<tr>
                                                <td colspan='2' style='text-align: justify;padding: 1rem; '><b>Mô tả</b><br>". $row4['sp_mota'] . "</td>
                                               </tr>";

                            }
                        }
                        ?>
                        </tbody>
                    </table>
                    <!-- Add to Cart -->
                    <section class="color">

                        <!--                        <div class="mt-5">-->
                        <!---->
                        <!--                                                        <p class="grey-text">Choose your color</p>-->
                        <!---->
                        <!---->
                        <!--                            <div class="row mt-3 mb-4">-->
                        <!---->
                        <!--                                <div class="col-md-12 text-center text-md-left text-md-right">-->
                        <!---->
                        <!--                                    <button class="btn btn-primary btn-rounded ">-->
                        <!--                                        <a class="white-text " href="suasach.php">-->
                        <!--                                            Cập Nhật Thông Tin-->
                        <!--                                        </a>-->
                        <!---->
                        <!--                                    </button>-->
                        <!---->
                        <!--                                </div>-->
                        <!---->
                        <!--                            </div>-->
                        <!---->
                        <!--                        </div>-->

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

