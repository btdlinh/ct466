<?php
session_start();
// session_destroy();
require_once "../giohang_function.php";
require_once "../sanpham/csdl_function.php";
//require "headerhienthisp.php";
?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips-->
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript-->
<script type="text/javascript" src="../../MDB-ecommerce-Templates-Pack_4.8.11/js/mdb.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Giỏ hàng</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.min.css" rel="stylesheet">
    <!-- Custom style cart-v1 -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

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

<body class="w-100 white">
<div class="table-responsive w-75 pb-5 pt-5" style="margin:2em auto">
    <!-- Navigation-->
<header>

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
                        <i class="fas fa-user blue-text"></i>Tài Khoản
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-cyan"
                         aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item waves-effect waves-light" href="dangky.html"> Đăng ký </a>
                        <a class="dropdown-item waves-effect waves-light" href="dangnhap.html"> Đăng nhập </a>
                        <a class="dropdown-item waves-effect waves-light" href="xulydangxuat.php"> Đăng xuất </a>
                    </div>

                </li>

            </ul>

        </div>

    </div>

</nav>
<!-- Navbar ngang-->

</header>
<!-- Navigation-->
    <form action="giohang_hienthi.php" method="post">
        <table class="table product-table table-cart-v-1 ">

            <?php
            $stt = 1;
            // print_r($cart);
            if(isset($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
                $tong_sl=0;
                $tong_tien=0;

            foreach ($cart as $value ) {
                $tong_sl+= (int)$value["number"];
                $tong_tien+=  (int)$value["number"]*$value["price"];


                ?>
                <input type="hidden" id="price-h-<?php echo $value["id"] ?>"value="<?php echo $value["price"]?>" />
                <tr>
                    <td class="col-md-1"><?php echo $stt++ ?></td>
                    <!--                    <td class="col-md-1">--><?php //echo $id
                    ?><!--</td>-->
                    <td class="img-fluid z-depth-0" style="width: 150px; height: 200px; margin: 0 auto;"><img
                                src="<?php echo $value["img"] ?>" alt='Hình ảnh' width='100px'></td>
                    <td class="w-75 m-0 m-auto text-center"><?php echo $value["name"]. " <br><br> " . number_format($value["price"]) . "đ"; ?></td>
                    <td class="w-75 m-0 m-auto text-center">
                        <input type="number" min="1"
                        id="qty-<?php echo $value["id"] ?>"
                               maxlength="<?php echo $value['number_kho']?>"
                               class="form-control text-center w-100"
                               value="<?php echo (int)$value["number"];  ?>" size="3"
                               onchange="updatecart('<?php echo $value["id"];?>', this.value)"

                        />
                    </td>
                    <td class="w-75 m-0 m-auto text-center" id="price-<?php echo $value["id"] ?>"><span>₫</span><?php echo number_format( (int)$value["number"]*$value["price"]);?></td>

                    <td>
                        <section class="col-md-2">

                            <a
                               class="btn btn-primary "
                               onclick="deletecart('<?php echo $value["id"];?>')"
                            >
                                <i class="bi bi-trash"></i>
                            </a>
                        </section>

                    </td>

                </tr>

            <?php } 
        }?>

<?php
                    $numbers = 0;
                    $tong_tien_sps = 0;
                    if(isset($_SESSION['cart'])){
                        $cart = $_SESSION['cart'];
                        foreach ($cart as $value){
                            $numbers +=  (int)$value["number"];
                            $tong_tien_sps   += (int)$value["number"]*$value["price"];
                        }
                    }
                    ?>
            <tr>
                <th colspan="3"><h5><strong class="mt-2 ">Tổng sản phẩm:  <span  id="qtys"><?php echo $numbers?></span> </strong> <strong
                                class="text-primary"> </strong></h5></th>
                <th colspan="3"><h5><strong class="mt-2" >Tổng tiền: <span id="totals"><?php  echo number_format($tong_tien_sps) ;?> </span> <sup>đ</sup></strong> <strong
                                class="text-primary"> </strong>
                    </h5></th>
            </tr>

        </table>
        <br/><br/>
        <a href="../../index.php" class="btn btn-primary" title="Tiếp Tục Mua Hàng"><i class="fas fa-reply"></i></a>
        <a href="thanhtoan.php" class="btn btn-primary">Tiến Hàng Thanh Toán</a>
    </form>

</div>
<?php require_once "../../hienthi/footer.php"; ?>

<?php 
// else {
    // echo " <section class=\"alert alert-info\" style='text-align: center ; font-family: Arial; margin-top: 3em;'><h3>Giỏ hàng trống! <a href='http://localhost/CT466/index.php'> Quay lại trang chủ</a></h3></section>";
?>

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


<script>
    function updatecart(id, value){
        const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'VND',
})

        const idr = "#price-"+id;
    const pr = "price-h-"+id;
    const price = document.getElementById(pr).value;
$.post("giohang_update.php",{'id':id,'value':value}, function(data, status){
    // alert(data);
    item = data.split("-"); //cat mang
    $("#qty").text(item[0]);

    $("#total").text(item[1]);
    $("#qtys").text(item[2]);
    $("#totals").text( item[3]);
    value1= item[4];
    const idi = 'qty-'+id;
    if (value > 0){
        document.getElementById(idi).value = value > item[4] ? item[4] : value;
    } else {
        document.getElementById(idi).value = 1;
        value1 = 1;
    };
    $(idr).text(formatter.format(value1*price));

});
    // window.location.reload();
}


    function deletecart(id){
       let check = confirm("Xóa sản phẩm này?");
        // alert(check);
        if(check){
            $.post("xoasp_giohang.php",{'id':id}, function(data, status){

            });

        }
        window.location.reload()
    }

</script>

</body>
</html>