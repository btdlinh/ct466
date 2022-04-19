<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ct466';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname)
or die($conn->connect_error);

$conn->set_charset('utf8');
//    $conn = db_connect();
//	session_destroy();exit();

//require('../../db.php');
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();

$id = $_GET['idsach'];
$query = "SELECT * FROM sanpham as s join the_loai as t on s.sp_idtheloai=t.tl_id
                                       join tac_gia as tg on s.sp_idtg=tg.tg_id 
                                        join nha_xuat_ban as nxb on s.sp_idnxb=nxb.nxb_id
                                        join nha_cung_cap as ncc on s.sp_idncc=ncc.ncc_id
                                        join ngon_ngu as nn on s.sp_idnn=nn.nn_id
                        WHERE sp_id = $id
                    ";
$rs = mysqli_query($conn, $query);
if (!$rs) {
    echo "Không thể truy xuất dữ liệu" . mysqli_error($conn);
    exit;
}

$row = mysqli_fetch_assoc($rs);
if (!$row) {
    echo "Không có sách.";
    exit;
}

$title = $row['sp_tensach'];


//        $row= $rs->fetch_assoc();


?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Chi Tiết Sản Phẩm</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../../MDB-ecommerce-Templates-Pack_4.8.11/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../MDB-ecommerce-Templates-Pack_4.8.11/css/mdb.min.css" rel="stylesheet">

    <style>
        /*nút số lượng*/
        .buttons_added {
            opacity: 1;
            display: inline-block;
            display: -ms-inline-flexbox;
            display: inline-flex;
            white-space: nowrap;
            vertical-align: top;
        }

        .is-form {
            overflow: hidden;
            position: relative;
            background-color: #f9f9f9;
            height: 2.2rem;
            width: 1.9rem;
            padding: 0;
            text-shadow: 1px 1px 1px #fff;
            border: 1px solid #ddd;
        }

        .is-form:focus, .input-text:focus {
            outline: none;
        }

        .is-form.minus {
            border-radius: 4px 0 0 4px;
        }

        .is-form.plus {
            border-radius: 0 4px 4px 0;
        }

        .input-qty {
            background-color: #fff;
            height: 2.2rem;
            text-align: center;
            font-size: 1rem;
            display: inline-block;
            vertical-align: top;
            margin: 0;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            border-left: 0;
            border-right: 0;
            padding: 0;
        }

        .input-qty::-webkit-outer-spin-button, .input-qty::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /*nút số lượng*/
    </style>

</head>

<body class="product-v1 hidden-sn white-skin animated ">

<!-- News card -->

<p class="lead" style=" margin-left: 12%; padding-top: 5em; padding-bottom: 1em; font-size: 25px; font-weight: bold"><a
            href="../../index.php">Sách > </a> <?php echo $row['tl_tentheloai']; ?> </p>

<div class="card mt-5 hoverable  p-5 w-75 m-auto">

    <div class="row w-100" style="margin:0 auto; ">

        <div class="col-md-5 text-center pb-5">
            <img class="img-responsive img-thumbnail" src="<?php echo $row['sp_hinhanh']; ?>">
        </div>

        <div class="col-md-7">
            <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-3 ml-xl-0 ml-4">
                <strong> <?php echo $row['sp_tensach'] ?></strong>
            </h2>
            <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">
            <span class="red-text font-weight-bold">
                <strong> <?php echo number_format($row['sp_gia']) ?> đ</strong>
            </span>
            </h3>
            <h4>Mô Tả</h4>
            <p class="text-justify mota"><?php echo $row['sp_mota']; ?></p>
            <script>

                const shortString = value => {
                    return value ? value.slice(0, 100) : "";
                }


            </script>
            <h4>Chi Tiết Sản Phẩm</h4>
            <form method="POST"
            ">
            <table class="table">
                <?php foreach ($row as $key => $value) {
                    if ($key == "sp_id" || $key == "sp_idtheloai" || $key == "tg_id" || $key == "ncc_sdt" || $key == "ncc_diachi" || $key == "ncc_id" || $key == "sp_idnxb" || $key == "sp_soluong" || $key == "sp_hinhanh"
                        || $key == "sp_idnn" || $key == "sp_idncc" || $key == "tl_id" || $key == "sp_idtg" || $key == "tl_iddm" || $key == "tg_diachi" || $key == "tg_sdt" || $key == "nxb_id" || $key == "nxb_sdt"
                        || $key == "nxb_diachi" || $key == "sp_mota" || $key == "sp_gia" || $key == "sp_tensach" || $key == "nn_id" || $key == "status") {
                        continue;
                    }
                    switch ($key) {
                        case "nn_ngonngu":
                            $key = "Ngôn ngữ";
                            break;
                        case "tl_tentheloai":
                            $key = "Thể loại";
                            break;
                        case "tg_hoten":
                            $key = "Tác giả";
                            break;
                        case "nxb_ten":
                            $key = "Nhà xuất bản";
                            break;
                        case "ncc_ten":
                            $key = "Nhà cung cấp";
                            break;
                    }
                    ?>
                    <tr>
                        <td><?php echo $key; ?></td>

                        <td><?php echo $value; ?></td>
                        <td></td>
                    </tr>

                    <?php
                }

                //            if(isset($conn)) {mysqli_close($conn); }
                ?>

                <tr>
                    <td> Số lượng</td>

                    <td>
                        <div class="buttons_added">
                            <input class="minus is-form" type="button" value="-">
                            <input aria-label="quantity" class="input-qty" max=<?php echo $row['sp_soluong'] ?> min="1"
                                   name="soluong" type="number"
                                   value="1" id="soluongmua">
                            <input class="plus is-form" type="button" value="+" onclick="soluong()">
                        </div>
                        <input type="hidden" name="idsach" value="<?php echo $id; ?>">
                    </td>
                </tr>
            </table>
            <div class="m-2 text-info">
                <?php echo $row['sp_soluong'] ?> sản phẩm có sẵn
            </div>
            <input type="button" value="Mua / Thêm vào giỏ hàng" name="cart" class="btn btn-primary"
                   onclick="addcart(<?php echo $id; ?>)">
            </form>


        </div>
    </div>

</div>
<!-- News card -->


<!-- Navigation -->
<?php
//    require "headerhienthisp.php";
//require "../../UI/adheader.php";

?>
<!-- Navigation -->
<!-- Navbar ngang-->
<nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar white">

    <div class="container">

        <!-- SideNav slide-out button-->
        <div class="float-left mr-2">
            <i class="fas fa-book-open blue-text"></i>
            <!--                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-home"></i></a>-->
        </div>

        <a class="navbar-brand font-weight-bold" href="http://localhost/CT466"><strong>
                HIRAKI.COM </strong></a>

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
                    <?php
                    $number = 0;
                    if (isset($_SESSION['cart'])) {
                        $cart = $_SESSION['cart'];
                        foreach ($cart as $value) {
                            $number += (int)$value["number"];

                        }
                    }
                    ?>
                    <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold"
                       href="http://localhost/CT466/khachhang/sanpham/giohang_hienthi.php">
                        <i
                                class="fas fa-shopping-cart blue-text"></i>Giỏ Hàng <span id="qty"
                                                                                          style="display:<?php echo $number ? 'block' : 'none' ?>;
                                                                                                  margin-top: -34px;
                                                                                                  color: red;
                                                                                                  margin-left: 98px;
                                                                                                  border-radius: 50%;"><?php echo $number; ?></span></a>


                </li>

                <li class="nav-item dropdown ml-3">

                    <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold"
                       id="navbarDropdownMenuLink-4"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        <i class="fas fa-user blue-text"></i><?php echo isset($_SESSION['kh_email'] )? $_SESSION['kh_ten'] : 'Tài khoản'; ?>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-cyan"
                         aria-labelledby="navbarDropdownMenuLink-4">
                        <?php
                        if(isset($_SESSION['kh_email'])){
                            ?>
                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/ct466/xulydangxuat.php"> Đăng xuất </a>
                            <a class="dropdown-item waves-effect waves-light"
                               href="http://localhost/CT466/khachhang/sanpham/kh_xemdonhang.php"> Đơn hàng của bạn </a>
                            <?php
                        }else{
                            ?>
                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/ct466/dangky.php"> Đăng ký </a>
                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/ct466/dangnhap.php"> Đăng nhập </a>
                            <?php
                        }
                        ?>
                    </div>

                </li>

            </ul>

        </div>

    </div>

</nav>
<!-- Navbar ngang-->

<!-- Main Container -->
<div class="container mt-5 pt-3">

    <div class="divider-new">

        <h3 class="h3-responsive font-weight-bold blue-text mx-3">Đánh Giá Sản Phẩm</h3>

    </div>
    <!--   viet binh luan-->
    <?php
    if (isset($_SESSION['kh_email'])) {
        ?>
        <form action="xuly_vietdanhgia.php" method="get">
            <div class="md-form-8 pb-5 pt-1">


                <input style="display: none;" type="text" id="form12" class="md-textarea form-control m-3" rows="2"
                       name="tenkh" value="<?php echo $_SESSION['kh_email']; ?>">

                <!--        <i class="fas fa-pencil-alt prefix"></i>-->
                <label for="form12">Bình luận</label>
                <textarea type="text" id="form11" class="md-textarea form-control m-3" rows="5" name="binhluan"
                          placeholder="Thêm bình luận ..."></textarea>

                <input type="hidden" name="idsp" value="<?php echo $id; ?>">
                <button type="submit"
                        class="btn blue-gradient btn-rounded waves-effect waves-light btn-sm"
                        value="Gửi bình luận "
                        name="guibinhluan"

                >
                    Gửi bình luận
                </button>

            </div>
        </form>


        <?php
    } else {
        ?>
        <span style="font-size: 24px;color: coral;">Vui lòng đăng nhập để bình luận!</span>

        <?php
    }

    ?>

    <div class="divider-new pt-5 pb-2">

        <h3 class="h3-responsive font-weight-bold blue-text mx-3">Xem Bình Luận</h3>

    </div>
    <?php


    $sql_dg = "SELECT * FROM test as a 
                                          join sanpham as c on c.sp_id=a.t_idsp
                                        
                     WHERE c.sp_id=$id";
    $rs_dg = mysqli_query($conn, $sql_dg);
    $row_dg = mysqli_num_rows($rs_dg);

    while ($row_dg = mysqli_fetch_assoc($rs_dg)) {
        ?>

        <!-- Product Reviews -->

        <section id="reviews" class="pb-5">

            <!-- Main wrapper -->
            <div class="comments-list text-center text-md-left">

                <!-- First row -->
                <div class="row mb-5">

                    <!-- Image column -->
                    <div class="col-sm-2 col-12 mb-3 ">
                        <!--                    <i class="fas fa-user-edit " style="width: 100px; height: 150px;"></i>-->
                        <img src="http://localhost/CT466/img/thv.png" alt="sample image"
                             class="avatar rounded-circle z-depth-1-half">

                    </div>
                    <!-- Image column -->

                    <!-- Content column -->
                    <div class="col-sm-10 col-12">

                        <a>

                            <h5 class="user-name font-weight-bold"><?php echo $row_dg['t_email']; ?></h5>

                        </a>

                        <!-- Rating -->
                        <ul class="rating">

                            <li>

                                <i class="fas fa-star blue-text"></i>

                            </li>

                            <li>

                                <i class="fas fa-star blue-text"></i>

                            </li>

                            <li>

                                <i class="fas fa-star blue-text"></i>

                            </li>

                            <li>

                                <i class="fas fa-star blue-text"></i>

                            </li>

                            <li>

                                <i class="fas fa-star blue-text"></i>

                            </li>

                        </ul>

                        <div class="card-data">

                            <ul class="list-unstyled mb-1">

                                <li class="comment-date font-small grey-text">

                                    <i class="far fa-clock-o"></i> <?php echo $row_dg['t_tg']; ?></li>

                            </ul>

                        </div>

                        <p class="dark-grey-text article"><?php echo $row_dg['t_binhluan']; ?></p>

                    </div>
                    <!-- Content column -->

                </div>
                <!-- First row -->


            </div>
            <!-- Main wrapper -->

        </section>

        <!-- Product Reviews -->

        <?php

    }
    ?>
    <div class="divider-new">

        <h3 class="h3-responsive font-weight-bold blue-text mx-3">Sản Phẩm Mới</h3>

    </div>
    <?php

    $querynew = "SELECT * FROM sanpham ORDER BY sp_id DESC";
    $resultnew = mysqli_query($conn, $querynew);
    if (!$resultnew) {
        echo "Không truy xuất được dữ liệu " . mysqli_error($conn);
        exit;
    }
    echo ' <div class="row">';
    for ($i = 0; $i < 3; $i++) {
        $rownew = mysqli_fetch_array($resultnew);
        echo '
                    <div class="col-xl-4  mt-4 mb-4">
                            <!-- Card -->
                            <div class="card">
        
                                <!-- Card image -->
                                <div class="view overlay"  title=' . $rownew['sp_tensach'] . '>
        
                                    <img src=' . $rownew['sp_hinhanh'] . ' alt="Hình Ảnh Sách" style="width: 330px; height: 350px; margin: 1em auto; padding-top: 1em;">
        
                                    <a href="http://localhost/CT466/khachhang/sanpham/hienthisp.php?idsach=' . $rownew['sp_id'] . ' " 
                                        title=' . $rownew['sp_tensach'] . ' />
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
        
                                </div>
                                <!-- Card image -->
        
                                <!-- Card content -->
                                <div class="card-body" style="height: 5em;">
                                    <!-- Category & Title tensach-->
                                    <h5 class="card-title mb-1">
                                        <strong>
                                            <a href="http://localhost/CT466/khachhang/sanpham/hienthisp.php?idsach=' . $rownew['sp_id'] . ' " 
                                                class="dark-grey-text font-small font-weight-bolder"  />' . $rownew['sp_tensach'] . '</a>
                                        </strong>
                                    </h5>
                                  <!-- Category & Title ten sach-->
                                </div>
                                <!-- Card content -->
                                
                                <!-- Card footer gia-->
                                    <div class="card-footer pb-0">
        
                                        <div class="row mb-0">
        
                                            <span class="float-left m-1 center-element text-info"><strong>' . number_format($rownew["sp_gia"]) . ' đ</strong></span>
                                        
                                        </div>
        
                                    </div>
                                <!-- Card footer gia-->
                            </div>
                            <!-- Card -->
       </div>
                    ';

    }
    echo '  </div>';
    ?>
    <!-- Section: Products v.5 danh dia-->

</div>
<!-- Section: Products v.5 -->
<section id="products" class="pt-2 ">


    <!-- Carousel Wrapper -->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

        <!-- Controls -->
        <!--                        <div class="controls-top">-->
        <!---->
        <!--                            <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">-->
        <!---->
        <!--                                <i class="fas fa-chevron-left"></i>-->
        <!---->
        <!--                            </a>-->
        <!---->
        <!--                            <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">-->
        <!---->
        <!--                                <i class="fas fa-chevron-right"></i>-->
        <!---->
        <!--                            </a>-->
        <!---->
        <!--                        </div>-->
        <!-- Controls -->

        <!-- Indicators -->
        <ol class="carousel-indicators">

            <li class="primary-color" data-target="#multi-item-example" data-slide-to="0" class="active"></li>

            <li class="primary-color" data-target="#multi-item-example" data-slide-to="1"></li>

            <li class="primary-color" data-target="#multi-item-example" data-slide-to="2"></li>

        </ol>
        <!-- Indicators -->

        <!-- Slides -->

        <!-- Slides -->
    </div>

    <!-- Carousel Wrapper -->
</section>


<!-- Section: Products v.5 danh dia-->
<!-- Main Container -->


<!-- Footer-->
<?php require "../../hienthi/footer.php"; ?>
<!-- Footer-->
<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/jquery-3.4.1.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/popper.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/mdb.min.js"></script>

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

<!--nút số lượng-->
<script>
    $('input.input-qty').each(function () {
        var $this = $(this),
            qty = $this.parent().find('.is-form'),
            min = Number($this.attr('min')),
            max = Number($this.attr('max'))
        if (min == 0) {
            var d = 0
        } else d = min
        $(qty).on('click', function () {
            if ($(this).hasClass('minus')) {
                if (d > min) d += -1
            } else if ($(this).hasClass('plus')) {
                var x = Number($this.val()) + 1
                if (x <= max) d += 1
            }
            $this.attr('value', d).val(d)
        })
    })
</script>
<!--nút số lượng-->


<script>

    function addcart(id) {
        const num = document.getElementById('soluongmua').value;
        document.getElementById("qty").style.display = "block"

        $.post("../../giohang.php", {'id': id, 'num': num}, function (data, status) {
            // alert(data);
            item = data.split("-"); //cat mang
            $("#qty").text(item[0]);
            $("#total").text(item[1]);
        });
    }

</script>

</body>

</html>
