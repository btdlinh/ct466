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

//$idsach= $_POST['idsach'];
//$iddon = $_SESSION['iddon'];
//$idkh = $_POST['idkh'];


$sql1 = "UPDATE khachhang SET
                            tenkh = '$tenkh',
                            emailkh = '$email',
                            diachikh = '$diachi',
                            sdtkh = '$sdt'
                            WHERE (emailkh='$email')
                       ";
$result1 = mysqli_query($conn,$sql1) ;



//$sql2 = "INSERT INTO khachhang_dh ( idkh, tenkh, emailkh , diachikh, sdtkh, idsach, iddon) VALUES ( '$idkh', '$tenkh', '$email', '$diachi', '$sdt', '$idsach','$iddon') ";
//$result2 = mysqli_query($conn,$sql2) ;
//var_dump($result1);


?>

<?php
session_start();
if (isset($_SESSION['emailkh'])) {
    $email = $_SESSION['emailkh'];
} else exit();

//$_SESSION['emailkh'] = 1;
//foreach($_POST as $key => $value){
//    if(trim($value) == ''){
//        $_SESSION['emailkh'] = 0;
//    }
//    break;
//}
//



$_SESSION['ship'] = array();
foreach($_POST as $key => $value){
    if($key != "submit"){
        $_SESSION['ship'][$key] = $value;
    }
}

//if (isset($_SESSION['emailkh'])) {
//    $email = $_SESSION['emailkh'];
//} else header("location:../../dangnhap.html");
//require_once "../sanpham/csdl_function.php";
$title = "Thanh Toán";
//require "headerhienthisp.php";

if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
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

            <a class="navbar-brand font-weight-bold" href="http://localhost:8080/CT271"><strong> HIRAKI.COM </strong></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

<!--                <ul class="navbar-nav ml-auto">-->
<!---->
<!--                    <li class="nav-item ml-3">-->
<!--                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold"-->
<!--                           href="http://localhost:8080/CT271/khachhang/lienhe.php"><i-->
<!--                                    class="fas fa-comments blue-text"></i> Liên Hệ</a>-->
<!--                    </li>-->
<!---->
<!--                    <li class="nav-item ml-3">-->
<!--                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold"-->
<!--                           href="http://localhost:8080/CT271/khachhang/sanpham/giohang.php"><i-->
<!--                                    class="fas fa-shopping-cart blue-text"></i> Giỏ Hàng</a>-->
<!--                    </li>-->
<!---->
<!--                    <li class="nav-item dropdown ml-3">-->
<!---->
<!--                        <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold"-->
<!--                           id="navbarDropdownMenuLink-4"-->
<!--                           data-toggle="dropdown"-->
<!--                           aria-haspopup="true"-->
<!--                           aria-expanded="false">-->
<!--                            <i class="fas fa-user blue-text"></i>Tài Khoản-->
<!--                        </a>-->
<!---->
<!--                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan"-->
<!--                             aria-labelledby="navbarDropdownMenuLink-4">-->
<!--                            <a class="dropdown-item waves-effect waves-light" href="http://localhost:8080/CT271/dangky.html"> Đăng ký </a>-->
<!--                            <a class="dropdown-item waves-effect waves-light" href="http://localhost:8080/CT271/dangnhap.html"> Đăng nhập </a>-->
<!--                            <a class="dropdown-item waves-effect waves-light" href="http://localhost:8080/CT271/xulydangxuat.php"> Đăng xuất </a>-->
<!--                        </div>-->
<!---->
<!--                    </li>-->
<!---->
<!--                </ul>-->

            </div>

        </div>

    </nav>
    <!-- Navbar ngang-->

    <div class="w-100 white">
    <div class="row pt-4 w-80 m-auto mt-5">
        <div class="col-lg-7">
            <div class="table-responsive w-75 pb-5 pt-5" style="margin:2em auto" >
    <!--form 1-->
                 <div>
                    <form action="dondathang.php" method="post">
                        <table class="table product-table table-cart-v-1 " >
                    <?php
                    foreach($_SESSION['cart'] as $id => $qty){
                        $conn = db_connect();
                        $book = mysqli_fetch_assoc(getBookByIsbn($conn, $id));

                        ?>
                    <tr>
                        <td class="img-fluid z-depth-0" style="width: 150px; height: 200px; margin: 0 auto;"><img src="<?php echo $book['hinhanh'] ?>" alt='Hình ảnh' width= '100px' > </td>

                        <td class=" text-center"><?php echo $book['tensach'] . " <br><br> " . number_format($book['gia']) ." đ"; ?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <!--                <td class=" text-center">--><?php //echo $book['tensach'] . " by " . $book['tentacgia']; ?><!--</td>-->
                        <!--                <td class=" text-center">--><?php //echo $book['tentacgia']; ?><!--</td>-->
                        <!--                <td class=" text-center">--><?php //echo  number_format($book['gia']) ." đ"; ?><!--</td>-->
                        <td class=" text-center"><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $id; ?>"></td>
                        <td class=" text-center"><?php echo  number_format($qty * $book['gia']) ." đ"; ?></td>
                    </tr>
        <?php } ?>

                            <tr>
            <th><h6><strong class="mt-2 ">Tổng sản phẩm: </strong></h6></th>
<!--            <th colspan="3"><h4><strong class="mt-2">Tổng tiền: </strong> <strong class="text-primary"> --><?php //echo  number_format($_SESSION['total_price'])." đ"; ?><!--</strong> </h4></th>-->
            <th><h6> <strong class="text-primary"><?php echo $_SESSION['total_items']; ?> </strong> </h6></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>

                            <tr>
                                <th><h6><strong class="mt-2">Tổng tiền: </strong></h6></th>
                                <th><h6><strong class="text-primary"> <?php echo  number_format($_SESSION['total_price'])." đ"; ?> </strong></h6></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tr>
                                <th ><h6><strong class="mt-2">Phí Vận Chuyển: </h6></th>
                                <th> <h6><strong class="text-primary"> 30,000 đ </strong></h6></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <tr>
                                <th colspan="2"> <h4><strong> Tổng Thanh Toán :  </strong><strong class="text-primary"> <?php echo number_format($_SESSION['total_price'] + 30000) ." đ"; ?> </strong></h4></th>
                                <td> </td>
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
            <?php if(isset($_SESSION['emailkh']) && $_SESSION['emailkh'] == 1){ ?>
<!--                <p class="text-danger">Nhập Thông Tin Của Bạn</p>-->
            <?php } ?>
            <div class="text-primary font-weight-bold  mt-2 ml-5"> <h3>Địa chỉ giao hàng</h3></div>
            <br>
            <?php
            $sql1 = "SELECT * FROM khachhang WHERE  emailkh = '$email' ";
            $result1 = mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1) == 1) {
                $row1 = mysqli_fetch_assoc($result1);

                ?>
                <div class="mt-2 pt-2 ml-5" >

                    <table class="table product-table table-cart-v-1 w-75" >
                        <tr><th>Họ tên </th> <td><?php echo $row1['tenkh'] ?></td></tr>
                        <tr><th>Email</th> <td><?php echo $row1['emailkh'] ?></td></tr>
                        <tr><th>Địa chỉ</th> <td><?php echo $row1['diachikh'] ?></td></tr>
                        <tr><th>Số điện thoại </th> <td><?php echo $row1['sdtkh'] ?></td></tr>
                    </table>

                </div>

            <?php } ?>
            <div class="form-group ml-5 ">
                <a href="../../index.php" class="btn btn-primary" title="Tiếp Tục Mua Hàng"><i class="fas fa-reply"></i></a>

                <input type="submit" name="submit" value="Xác Nhận Đặt Hàng" class="btn btn-primary ">
            </div>

        </form>

    </div>
<!--        <div class="form-group m-auto pb-5">-->
<!--            <input type="submit" name="submit" value="Xác Nhận Thanh Toán" class="btn btn-primary ">-->
<!--        </div>-->
    <!--form 2-->
<!--        <p class="lead">Vui òng nhấn Mua để xác nhận giao dịch.</p>-->
    </div>


    <?php
} else {
    echo "<p class=\"text-warning\">Giỏ của bạn trống! Hãy chắc chắn rằng bạn đã thêm một số sách trong đó</p>";
}
if(isset($conn)){ mysqli_close($conn); }
?>
         </div>
    <?php
    require_once "../../hienthi/footer.php";
    ?>
        </body>
    </html>