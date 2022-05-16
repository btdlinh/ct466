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

if (isset($_SESSION['kh_email'])) {
    $email = $_SESSION['kh_email'];
//    $mk = $_SESSION['kh_matkhau'];
} else header("location:../../dangnhap.php");
require_once "../sanpham/csdl_function.php";
//$title = "Thanh Toán";
//require "headerhienthisp.php";

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips-->
    <script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript-->
    <script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/mdb.min.js"></script>
    <title>Thông Tin Đơn Hàng</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.min.css" rel="stylesheet">
    <!-- Custom style cart-v1 -->

</head>
<?php
//    require "headerhienthisp.php";
?>

<body class="w-100 white">
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
                    if(isset($_SESSION['cart'])){
                        $cart = $_SESSION['cart'];
                        foreach ($cart as $value){
                            $number +=  (int)$value["number"];
                        }
                    }
                    ?>
                    <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold"
                       href="http://localhost/CT466/khachhang/sanpham/giohang_hienthi.php">
                        <i
                                class="fas fa-shopping-cart blue-text"></i>Giỏ Hàng <span id="qty" style="display: block;
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
                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/CT466/kh_doimatkhau.php"> Đổi mật khẩu </a>

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


<div class="row pt-4 w-80 m-auto mt-5">
    <div class="col-lg-7">
        <div class="table-responsive w-75 pb-5 pt-5" style="margin:2em auto">
            <!--    <form action="dondathang.php" method="post" class="p-5">-->
            <table class="table product-table table-cart-v-1 ">
                <?php
                $stt = 1;
                // print_r($cart);
                if(isset($_SESSION['cart'])){
                    $cart = $_SESSION['cart'];
                    $tong_sl=0;
                    $tong_tien=0;

                    foreach ($cart as $value ) {
                        $tong_sl += (int)$value["number"];
                        $tong_tien += (int)$value["number"] * $value["price"];

                    echo '
                    
                    <tr>
                        <td class="img-fluid z-depth-0" style="width: 150px; height: 200px; margin: 0 auto;"><img
                                    src="'.$value['img'].'" ></td>

                        <td class=" text-center"> '.$value["name"].'<br><span class="text-danger">'.number_format($value["price"]).'<sup>đ</sup></span></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    
                       
                      
                        <td class=" text-center"><span>'.$value["number"].'</span> </td>
                        <td class=" text-center">'.number_format($value["number"]*$value["price"]).'<sup>đ</sup></td>
                    </tr>
                    ';
                }}

                ?>
                <tr>
                    <th></th>
                    <th colspan="3"><h5><strong class="mt-2 ">Tổng sản phẩm:</strong> <strong
                                    class="text-primary"><?php echo $tong_sl; ?> </strong></h5></th>
                    <th colspan="3"><h5><strong class="mt-2">Tổng tiền:</strong> <strong
                                    class="text-primary"> <?php echo number_format($tong_tien); ?><sup>đ</sup></strong>
                        </h5></th>
                </tr>

            </table>
        </div>
    </div>
    <!--    <br/><br/>-->
    <div class="md-form col-lg-5 mt-4 pt-5" style="width: 100%;">
        <form method="post" action="dondathang.php" class="form-horizontal" accept-charset="UTF-8">
            <?php if (isset($_SESSION['kh_email']) && $_SESSION['kh_email'] == 1) { ?>
                <p class="text-danger">Nhập Thông Tin Của Bạn</p>
            <?php } ?>
            <div class="text-primary font-weight-bold"><h3>Địa chỉ giao hàng</h3></div>
            <br>
            <?php

            $sql1 = "SELECT * FROM khach_hang WHERE kh_email = '$email' ";
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result1) == 1) {
                $row1 = mysqli_fetch_assoc($result1);

                ?>
                <div class="form-group">
                    <div class="col-md-10 ">

                        <input type="hidden" name="idkh"
                               value="<?php echo $row1['kh_id'] ?>"
                        />
                    </div>

                    <!--                    <label for="name" class=" control-label col-md-10">Họ tên</label>-->
                    <div class="col-md-10">
                        Họ Tên <br>
                        <input type="text" name="tenkh" class="col-md-10" class="form-control" required
                               value="<?php echo $row1['kh_ten'] ?>"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <!--                    <label for="email" class="control-label col-md-10">Email</label>-->
                    <div class="col-md-10">
                        Email <br>
                        <input type="text" class="col-md-10" class="form-control"
                               placeholder="... @gmail.com"
                               value="<?php echo $row1['kh_email'] ?>"
                               disabled
                        />
                        <input type="text" name="emailkh" class="col-md-10" class="form-control"
                               placeholder="... @gmail.com"
                               value="<?php echo $row1['kh_email'] ?>"
                               style="display: none"
                        />
                    </div>
                </div>


                <div class="form-group">
                    <!--                    <label for="address" class="control-label col-md-10">Địa chỉ</label>-->
                    <div class="col-md-10">
                        Địa chỉ <br>
                        <input type="text" name="diachikh" class="col-md-10" class="form-control" required >
                    </div>
                </div>

                <div class="form-group">
                    <!--                    <label for="phone" class="control-label col-md-10">Số điện thoại</label>-->
                    <div class="col-md-10">
                        Số điện thoại <br>
                        <input type="tel" name="sdtkh" class="col-md-10" class="form-control" required >
                    </div>
                </div>
            <div>

            </div>

            <div class="form-group">
                <input type="submit" name="submit" value="Tiến Hành Thanh Toán" class="btn btn-primary">
            </div>

        </form>
        <p class="lead">Vui lòng nhấn để xác nhận giao dịch của bạn!</p>
    </div>

</div>
</div>
<?php
require_once "../../hienthi/footer.php";
}

?>

</body>
</html>