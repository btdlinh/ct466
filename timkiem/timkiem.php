<!--<html>-->
<!--<head>-->
<!--    <title>Tìm Kiếm</title>-->
<!--</head>-->
<!--<body>-->
<!--<div align="center">-->
<!--    <form action="testtimkiem.php" method="get">-->
<!--        Tìm kiếm: <input type="text" name="search" />-->
<!--        <input type="submit" name="ok" hidden value="search" />-->
<!--    </form>-->
<!--</div>-->
<?php
require('../db.php');
//$rs = $conn->query("SELECT * FROM sach ");
require_once "../khachhang/sanpham/csdl_function.php";
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> TRANG CHỦ </title>
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
        .multiple-select-dropdown li [type=checkbox] + label {

            height: 1rem;
        }
    </style>

</head>

<body class="category-v2 hidden-sn white-skin animated">


<!-- Navigation-->
<header>

    <!-- Navbar ngang-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar white">

        <div class="container">

            <!-- SideNav slide-out button-->
            <div class="float-left mr-2">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-book-open"></i></a>
                <!--                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-home"></i></a>-->
            </div>

            <a class="navbar-brand font-weight-bold" href="http://localhost/CT466"><strong> HIRAKI.COM </strong></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item ml-3">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold"
                           href="http://localhost/CT466/khachhang/lienhe.php"><i
                                    class="fas fa-comments blue-text"></i> Liên Hệ</a>
                    </li>

                    <li class="nav-item ml-3">
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold"
                           href="http://localhost/CT466/khachhang/sanpham/giohang.php"><i
                                    class="fas fa-shopping-cart blue-text"></i> Giỏ Hàng</a>
                    </li>

                    <li class="nav-item dropdown ml-3">

                        <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold"
                           id="navbarDropdownMenuLink-4"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                            <i class="fas fa-user blue-text"></i>Tài Khoản
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan"
                             aria-labelledby="navbarDropdownMenuLink-4">
                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/CT466/dangky.html"> Đăng ký </a>
                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/CT466/dangnhap.html"> Đăng nhập </a>
                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/CT466/xulydangxuat.php"> Đăng xuất </a>
                        </div>

                    </li>

                </ul>

            </div>

        </div>

    </nav>
    <!-- Navbar ngang-->

</header>
<!-- Navigation-->

<!-- Main Container-->
<div class="container mt-5 pt-3">

<?php require_once "navbar.php"; ?>
    <div class="row pt-4" style="margin-bottom: 5em;">

        <!-- Content-->
        <div class="col-md-12">

            <!-- slide anh -->
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../image/nen.png" alt="First slide"  style="height:30em ;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/nen1.png" alt="Second slide" style="height:30em ;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/nen2.png" alt="Third slide" style="height:30em ;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/nen3.png"  alt="Third slide" style="height:30em ;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/nen5.png"  alt="Third slide" style="height:30em ;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/nen7.png"  alt="Third slide" style="height:30em ;">
                    </div>
                    <!--                    <div class="carousel-item">-->
                    <!--                        <img class="d-block w-100" src="image/8.jpg"  alt="Third slide" style="height:30em ;">-->
                    <!--                    </div>-->
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- end slide anh -->

        </div>
        <!-- Content-->

    </div>
    <!--phân trang-->
    <?php
    //so san pham mot trang
    $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:5;
    //trang hien tai
    $current_page = !empty($_GET['page'])?$_GET['page']:1;
    // vi tri bd lay
    $offset = (int)($current_page - 1) * (int)$item_per_page;
    $rs = $conn->query('SELECT * FROM sach ORDER BY `idsach` ASC LIMIT '.$item_per_page.' OFFSET '.$offset.' ');
    $total_records = $conn->query("SELECT * FROM sach");
    $total_records = $total_records->num_rows;
    // hien thi tong so trang = tong so sp / so sp o mot trang
    (int)$total_pages = ceil($total_records / (int)$item_per_page);

    ?>
    <!--phân trang-->

    <!-- Grid row san pham-->
<!--    <h1 class="text-black-50 font-weight-bolder">Danh sách sản phẩm</h1>-->
    <div class="row mt-5 mb-5 pt-5 pb-5">
        <?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);

            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "<h5 class='text-danger'><b>Bạn chưa nhập nội  dung tìm kiếm!</b></h5>";
            } else {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from sach as a join theloaisach as b on a.idtheloai=b.idtheloai
                            where tensach like '%$search%' or tentheloai like '%$search%' ";

                // Thực thi câu truy vấn
                $sqlloai = mysqli_query($conn, $query);

                // Đếm số đong trả về trong sql
                $num = mysqli_num_rows($sqlloai);

                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($num > 0 && $search != "") {
                    // Dùng $num để đếm số dòng trả về

//                    echo "$num Kết quả trả về với từ khóa:  <b> $search</b> <br>";
                    echo'
                    <div class="col-lg-12 mt-4 mb-4">
                        <h5> Có '.$num.' kết quả trả về với từ khóa:  <b> '.$search.'</b></h5>
                    </div>
                    ';

                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array

                    while ($rowloai = mysqli_fetch_assoc($sqlloai)) {
                        $linkhinh = "http://localhost/CT466/img/bookimg/". $rowloai['hinhanh'];
                        echo '
      
                            <div class="col-lg-4 mt-4 mb-4">
                                    <!-- Card -->
                                    <div class="card">
                
                                        <!-- Card image -->
                                        <div class="view overlay"  title=' . $rowloai['tensach'] . '>
                
                                            <img src="' . $linkhinh . '" 
                                                alt="Hình Ảnh Sách" 
                                                style="width: 330px; height: 350px; margin: 1em auto; padding-top: 1em;"
                                                />
                
                                            <a href="http://localhost/CT466/khachhang/sanpham/hienthisp.php?idsach=' . $rowloai['idsach'] . ' " 
                                                title=' . $rowloai['tensach'] . ' />
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                
                                        </div>
                                        <!-- Card image -->
                
                                        <!-- Card content -->
                                        <div class="card-body" style="height: 5em;">
                                            <!-- Category & Title tensach-->
                                            <h5 class="card-title mb-1">
                                                <strong>
                                                    <a href="http://localhost/CT466/khachhang/sanpham/hienthisp.php?idsach=' . $rowloai['idsach'] . ' " 
                                                        class="dark-grey-text font-small font-weight-bolder"  />' . $rowloai['tensach'] . '</a>
                                                </strong>
                                            </h5>
                                          <!-- Category & Title ten sach-->
                                        </div>
                                        <!-- Card content -->
                                        
                                        <!-- Card footer gia-->
                                            <div class="card-footer pb-0">
                
                                                <div class="row mb-0">
                
                                                    <span class="float-left m-1 center-element text-info"><strong>' . number_format($rowloai["gia"]) . ' đ</strong></span>
                                                
                                                    <span class=" float-right m-2">
                                                            <a data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng" href="khachhang/sanpham/giohang.php?id= ' . $rowloai['idsach'] . ' ">
                                                            </a> 
                                                    </span>
                                                  
                
                                                </div>
                
                                            </div>
                                        <!-- Card footer gia-->
                                    </div>
                                    <!-- Card -->
                              </div>
       
                    ';
                    }
                }
                else {
                    echo "<h5 class='text-info'><b>Không tìm thấy kết quả!</b></h5>";
                }
            }
        }
        ?>

    </div>

    <!-- Grid row san pham-->

    <!-- Grid row so trang-->

    <div class="row justify-content-center mb-4">

        <!-- Pagination -->
        <nav class="mb-4">

            <ul class="pagination pagination-circle pg-blue mb-0">

                <!-- First -->
                <?php
                if ($current_page > 3) {
                    $first_page = 1;
                    echo '
                    <li class="page-item disabled clearfix d-none d-md-block">
                        <a class="page-link waves-effect waves-effect"
                        href="?per_page = '.$item_per_page.' &page = '.$first_page.' ">Đầu
                        </a>
                    </li>
                   ';
                }
                ?>
                <!-- Arrow left -->
                <?php
                if ($current_page > 1) {
                    $prev_page = $current_page - 1;
                    echo '
                    <li class="page-item ">
                        <a class="page-link waves-effect waves-effect" 
                            aria-label="Previous"
                            href="?per_page = '. $item_per_page.' &page = '.$prev_page.' "> «
                            
                        </a>
                    </li>
             ';
                }
                ?>

                <!-- Numbers -->

                <?php
                for ($num = 1; $num <= $total_pages; $num++){
                    if($num != $current_page){
                        // gioi han so trang hien thi
                        if ($num > $current_page -3 && $num < $current_page + 3)
                            echo '
                            <li class="page-item">
                                <a class="page-link waves-effect waves-effect" 
                                href="?per_page= '.$item_per_page.' & page= '.$num.' " >'.$num.'</a>
                            </li>

                    ';
                    }
                    else{
                        // in dam trang hien tai
                        echo'
                    
                    <strong>
                             <li class="page-item">
                                <a class="page-link waves-effect waves-effect"  > '.$num.' </a>
                             </li>
                    </strong>
                    ';
                    }
                }
                ?>

                <!-- Arrow right -->
                <?php
                if ($current_page < $total_pages - 1) {
                    $next_page = $current_page + 1;
                    echo '
                    <li class="page-item">
                        <a class="page-link waves-effect waves-effect" 
                        aria-label="Next"
                        href="?per_page ='.$item_per_page.' &page = '.$next_page.' "> »
                        </a>
                    </li>
                ';
                }
                ?>

                <!-- First -->
                <?php
                if ($current_page < $total_pages - 3) {
                    $end_page = $total_pages;
                    echo '
                <li class="page-item clearfix d-none d-md-block">
                    <a class="page-link waves-effect waves-effect" href="?per_page ='.$item_per_page.'&page='.$end_page.' ">Cuối</a>
                </li>
                    ';
                }
                ?>

            </ul>

        </nav>
        <!-- Pagination -->

    </div>
    <!-- Grid row so trang-->

</div>


<!-- Main Container-->

<!--</main>-->
<!--stylish-color-dark => trong footer class= page-footer ..-->
<!-- Footer-->
<footer class="page-footer text-center text-md-left  pt-0" style="background: #212121;">

    <div style="background: #212121;">
        <!--        style="background-color: #4285f4;"-->
        <div class="container">

            <!-- Grid row-->
            <div class="row py-4 d-flex align-items-center">

                <!-- Grid column-->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">

                    <h6 class="mb-0 white-text">Hãy kết nối với chúng tôi trên các mạng xã hội!</h6>

                </div>
                <!-- Grid column-->

                <!-- Grid column-->
                <div class="col-md-6 col-lg-7 text-center text-md-right">

                    <!-- Facebook-->
                    <a class="fb-ic ml-0 px-2"><i class="fab fa-facebook-f white-text"> </i></a>

                    <!-- Twitter-->
                    <a class="tw-ic px-2"><i class="fab fa-twitter white-text"> </i></a>

                    <!-- Google +-->
                    <a class="gplus-ic px-2"><i class="fab fa-google-plus-g white-text"> </i></a>

                    <!-- Linkedin-->
                    <a class="li-ic px-2"><i class="fab fa-linkedin-in white-text"> </i></a>

                    <!-- Instagram-->
                    <a class="ins-ic px-2"><i class="fab fa-instagram white-text"> </i></a>

                </div>
                <!-- Grid column-->

            </div>
            <!-- Grid row-->

        </div>

    </div>

    <!-- Footer Links-->
    <div class="container mt-5 mb-4 text-center text-md-left">

        <div class="row mt-3">

            <!-- First column-->
            <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

                <h6 class="text-uppercase font-weight-bold"><strong>HIRAKI.COM</strong></h6>

                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                <p>HIRAKI.COM nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng
                    trực tiếp tại văn phòng cũng như tất cả Hệ Thống HIRAKI trên toàn quốc.</p>

            </div>
            <!-- First column-->

            <!-- Second column-->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

                <h6 class="text-uppercase font-weight-bold"><strong>Dịch Vụ</strong></h6>

                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                <p><a href="#">Điều khoản sử dụng</a></p>

                <p><a href="#">Chính sách bảo mật</a></p>

                <p><a href="#">Giới thiệu Hiraki</a></p>

                <p><a href="#">Hệ thống nhà sách</a></p>

            </div>
            <!-- Second column-->

            <!-- Third column-->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                <h6 class="text-uppercase font-weight-bold"><strong>Hỗ Trợ</strong></h6>

                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                <p><a href="#">Chính sách đổi trả - hoàn tiền</a></p>

                <p><a href="#">Chính sách khách sỉ</a></p>

                <p><a href="#">Phương thức vận chuyển</a></p>

                <p><a href="#">Phương thức thanh toán và xuất hóa đơn</a></p>

            </div>
            <!-- Third column-->

            <!-- Fourth column-->
            <div class="col-md-4 col-lg-3 col-xl-3">

                <h6 class="text-uppercase font-weight-bold"><strong>Liên Hệ</strong></h6>

                <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                <p><i class="fas fa-home mr-3"></i> 60-62 Lê Lợi, Q.1, TP. HCM</p>

                <p><i class="fas fa-envelope mr-3"></i> hiraki@.com</p>

                <p><i class="fas fa-phone mr-3"></i> + 09 090 613 95</p>

                <p><i class="fas fa-print mr-3"></i> + 09 090 613 97</p>

            </div>
            <!-- Fourth column-->

        </div>

    </div>
    <!-- Footer Links-->

    <!-- Copyright-->
    <!--    style="background: #212121;"-->
    <div class="footer-copyright py-3 text-center">

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


<!--<i class="fas fa-shopping-cart ml-1 blue-text"></i>-->
