<?php
session_start();
if (isset($_SESSION['kh_email'])) {
    $email = $_SESSION['kh_email'];
} else header("location:../../dangnhap.html");
require_once "../sanpham/csdl_function.php";
//$title = "Thanh Toán";
//require "headerhienthisp.php";

if (isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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

        <a class="navbar-brand font-weight-bold" href="http://localhost:8080/CT466"><strong> HIRAKI.COM </strong></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

        </div>

    </div>

</nav>
<!-- Navbar ngang-->
<div class="row pt-4 w-80 m-auto mt-5">
    <div class="col-lg-7">
        <div class="table-responsive w-75 pb-5 pt-5" style="margin:2em auto">
            <!--    <form action="dondathang.php" method="post" class="p-5">-->
            <table class="table product-table table-cart-v-1 ">
                <!--        <tr>-->
                <!--            <th></th>-->
                <!--            <th class="font-weight-bold text-center" >Tên sách</th>-->
                <!--            <th class="font-weight-bold text-center" >Tác giả</th>-->
                <!--            <th class="font-weight-bold text-center" >Giá</th>-->
                <!--            <th class="font-weight-bold text-center" >Số lượng</th>-->
                <!--            <th class="font-weight-bold text-center" > Thành tiền</th>-->
                <!--        </tr>-->

                <?php
                foreach ($_SESSION['cart'] as $id => $qty) {
                    $conn = db_connect();
                    $book = mysqli_fetch_assoc(getBookByIsbn($conn, $id));

                    ?>
                    <tr>
                        <td class="img-fluid z-depth-0" style="width: 150px; height: 200px; margin: 0 auto;"><img
                                    src="<?php echo $book['sp_hinhanh'] ?>" alt='Hình ảnh' width='100px'></td>

                        <td class=" text-center"><?php echo $book['sp_tensach'] . " <br><br> " . number_format($book['sp_gia']) . " đ"; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <!--                <td class=" text-center">-->
                        <?php //echo $book['tensach'] . " by " . $book['tentacgia'];
                        ?><!--</td>-->
                        <!--                <td class=" text-center">--><?php //echo $book['tentacgia'];
                        ?><!--</td>-->
                        <!--                <td class=" text-center">-->
                        <?php //echo  number_format($book['gia']) ." đ";
                        ?><!--</td>-->
                        <td class=" text-center"><input type="text" value="<?php echo $qty; ?>" size="2"
                                                        name="<?php echo $id; ?>"></td>
                        <td class=" text-center"><?php echo number_format($qty * $book['sp_gia']) . " đ"; ?></td>
                    </tr>

                <?php } ?>

                <tr>
                    <th></th>
                    <th colspan="3"><h5><strong class="mt-2 ">Tổng sản phẩm:</strong> <strong
                                    class="text-primary"><?php echo $_SESSION['total_items']; ?> </strong></h5></th>
                    <th colspan="3"><h5><strong class="mt-2">Tổng tiền:</strong> <strong
                                    class="text-primary"> <?php echo number_format($_SESSION['total_price']) . "đ"; ?></strong>
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
                    <div class="col-md-10">

                        <input type=hidden" name="idkh"
                               value="<?php echo $row1['kh_id'] ?>"
                        />
                    </div>

                    <!--                    <label for="name" class=" control-label col-md-10">Họ tên</label>-->
                    <div class="col-md-10">
                        Họ Tên <br>
                        <input type="text" name="tenkh" class="col-md-10" class="form-control"
                               value="<?php echo $row1['kh_ten'] ?>"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <!--                    <label for="email" class="control-label col-md-10">Email</label>-->
                    <div class="col-md-10">
                        Email <br>
                        <input type="text" name="emailkh" class="col-md-10" class="form-control"
                               placeholder="... @gmail.com"
                               value="<?php echo $row1['kh_email'] ?>"
                        />
                    </div>
                </div>

<!--                --><?php
//                $sql2 = "SELECT * FROM khach_hang as a on dia_chi as b on a.kh_id=b.dc_idkh WHERE(a.kh_id='b.dc_idkh')";
//                $result2 = mysqli_query($conn, $sql2);
//                if (mysqli_num_rows($result2) == 1) {
//                    $row2 = mysqli_fetch_assoc($result2);
//                ?>

                <div class="form-group">
                    <!--                    <label for="address" class="control-label col-md-10">Địa chỉ</label>-->
                    <div class="col-md-10">
                        Địa chỉ <br>
                        <input type="text" name="diachikh" class="col-md-10" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <!--                    <label for="phone" class="control-label col-md-10">Số điện thoại</label>-->
                    <div class="col-md-10">
                        Số điện thoại <br>
                        <input type="tel" name="sdtkh" class="col-md-10" class="form-control">
                    </div>
                </div>
            <?php } ?>

            <div class="form-group">
                <input type="submit" name="submit" value="Tiến Hành Thanh Toán" class="btn btn-primary">
            </div>

        </form>
        <p class="lead">Vui lòng nhấn để xác nhận giao dịch của bạn!</p>
    </div>
    <?php
    } else {
        echo "<p class=\"text-warning\">Giỏ hàng trống! Vui lòng thêm sản phẩm!</p>";
    }
    if (isset($conn)) {
        mysqli_close($conn);
    }

    ?>
</div>
</div>
<?php
require_once "../../hienthi/footer.php";
?>

</body>