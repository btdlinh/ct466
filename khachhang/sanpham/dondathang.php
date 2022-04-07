<?php
require_once "../sanpham/csdl_function.php";

//$sql1 = "SELECT * FROM khachhang WHERE  emailkh = $email ";
$conn = mysqli_connect("localhost", "root", "", "ct466");


//$iddon=$_GET['iddon'];
$tenkh = $_POST['tenkh'];
$email = $_POST['emailkh'];
$diachi = $_POST['diachikh'];
$sdt = $_POST['sdtkh'];
$email = $_POST['emailkh'];
$idkh = $_POST['idkh'];


$sql = "INSERT INTO  dia_chi ( dc_idkh, dc_emailkh, dc_hoten,  dc_sdt, dc_diachi)
         VALUES ('$idkh', '$email', '$tenkh','$sdt', '$diachi')
        
         ";
$result = mysqli_query($conn, $sql);


?>

<?php
session_start();
if (isset($_SESSION['kh_email'])) {
    $email = $_SESSION['kh_email'];
} else exit();


$_SESSION['ship'] = array();
foreach ($_POST as $key => $value) {
    if ($key != "submit") {
        $_SESSION['ship'][$key] = $value;
    }
}


$title = "Thanh Toán";
//require "headerhienthisp.php";

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>
<?php
//require "headerhienthisp.php";
?>

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
<div class="w-100 white">
    <div class="row pt-4 w-80 m-auto mt-5">
        <div class="col-lg-7">
            <div class="table-responsive w-75 pb-5 pt-5" style="margin:2em auto">
                <!--form 1-->
                <div>
                    <form action="dondathang.php" method="post">
                        <table class="table product-table table-cart-v-1 ">
                            <?php
                            $stt = 1;
                            // print_r($cart);
                            if (isset($_SESSION['cart'])) {
                                $cart = $_SESSION['cart'];
                                $tong_sl = 0;
                                $tong_tien = 0;

                                foreach ($cart as $value) {
                                    $tong_sl += (int)$value["number"];
                                    $tong_tien += (int)$value["number"] * $value["price"];

                                    echo '
                    
                            <tr>
                                <td class="img-fluid z-depth-0" style="width: 150px; height: 200px; margin: 0 auto;"><img
                                            src="' . $value['img'] . '" ></td>
        
                                <td class=" text-center"> ' . $value["name"] . '<br><span class="text-danger">' . number_format($value["price"]) . '<sup>đ</sup></span></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            
                               
                              
                                <td class=" text-center"><span>' . $value["number"] . '</span> </td>
                                <td class=" text-center">' . number_format($value["number"] * $value["price"]) . '<sup>đ</sup></td>
                            </tr>
                            ';
                                }
                            }

                            ?>
                            <tr>
                            <tr>
                                <th><h6><strong class="mt-2 ">Tổng sản phẩm: </strong></h6></th>
                                <th><h6><strong class="text-primary"><?php echo $tong_sl; ?> </strong></h6></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tr>
                                <th><h6><strong class="mt-2">Tổng tiền: </strong></h6></th>
                                <th><h6><strong class="text-primary"> <?php echo number_format($tong_tien); ?>đ</strong>
                                    </h6></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tr>
                                <th><h6><strong class="mt-2">Phí Vận Chuyển:</h6></th>
                                <th><h6><strong class="text-primary"> 30,000 đ </strong></h6></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <th colspan="2"><h4><strong> Tổng Thanh Toán : </strong><strong
                                                class="text-primary"> <?php echo number_format($tong_tien + 30000) . " đ"; ?> </strong>
                                    </h4></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>


                        </table>
                    </form>
                </div>
            </div>
        </div>
        <!--form 1-->
        <br/><br/>
        <!--form 2-->
        <div class="md-form col-lg-5 mt-4 pt-5" style="width: 100%;">
            <form method="post" action="hoanthanh.php" class="form-horizontal" accept-charset="UTF-8">
                <?php if(isset($_SESSION['kh_email']) && $_SESSION['kh_email'] == 1){ ?>
                <?php } ?>
                <div class="text-primary font-weight-bold  mt-2 ml-5"><h3>Địa chỉ giao hàng</h3></div>
                <br>
                <?php


            $sql1 = "SELECT * FROM  dia_chi
                                WHERE  dc_idkh= '$idkh'
                                ORDER  BY dc_id DESC 
                                LIMIT 1";
            $result1 = mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1) == 1) {
                $row1 = mysqli_fetch_assoc($result1);

                ?>
                <div class="mt-2 pt-2 ml-5">

                    <table class="table product-table table-cart-v-1 w-75">
                        <tr>
                            <th>Họ tên</th>
                            <td><?php echo $row1['dc_hoten'] ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row1['dc_emailkh'] ?></td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td><?php echo $row1['dc_diachi'] ?></td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td><?php echo $row1['dc_sdt'] ?></td>
                        </tr>

                    </table>

                </div>

                <?php } ?>
                <span class="mb-4 ml-5"><b>Chọn phương thức thanh toán</b></span>
                <br>
                <div class="form-check form-check-inline mb-4 ml-5">
                    <input class="form-check-input" type="radio" name="pttt" id="inlineRadio1" value="cod" />
                    <label class="form-check-label" for="inlineRadio1">Thu tiền tận nơi</label>
                </div>
                <div class="w-75 ml-5 ">
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AVjZHCobW4kEI5ozKni11d0_SwQ2ZuYmsiBTvtUku-LMb19rW2VH2bHAsPmfJd6pt0LY_vGayLmqJV2K&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        //password account paypal sanbox: b1809253
                        paypal.Buttons({
                            // Sets up the transaction when a payment button is clicked
                            createOrder: (data, actions) => {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '<?php echo round(($tong_tien + 30000)/24000,2); ?>' // Can also reference a variable or function
                                        }
                                    }]
                                });
                            },
                            // Finalize the transaction after payer approval
                            onApprove: (data, actions) => {
                                return actions.order.capture().then(function(orderData) {
                                    // Successful capture! For dev/demo purposes:
                                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                    const transaction = orderData.purchase_units[0].payments.captures[0];
                                    window.location.replace('http://localhost/CT466/khachhang/sanpham/hoanthanh_paypal.php');

                                    // When ready to go live, remove the alert and show a success message within this page. For example:
                                    // const element = document.getElementById('paypal-button-container');
                                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                    // Or go to another URL:  actions.redirect('thank_you.html');
                                });
                            }
                            // onCancel:function (data){
                            //     window.location.replace('http://localhost/CT466/khachhang/sanpham/dondathang.php');
                            // }
                        }).render('#paypal-button-container');
                    </script>
                </div>



                <div class="form-group ml-5 ">
                    <a href="../../index.php" class="btn btn-primary" title="Tiếp Tục Mua Hàng"><i
                                class="fas fa-reply"></i></a>

                    <input type="submit" name="submit" value="Xác Nhận Đặt Hàng" class="btn btn-primary ">
                </div>

            </form>

        </div>



    </div>


    <?php
    if (isset($conn)) {
        mysqli_close($conn);
    }
    ?>
</div>
<?php
require_once "../../hienthi/footer.php";
?>
</body>



</html>