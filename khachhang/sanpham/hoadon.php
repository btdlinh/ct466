<?php
require_once "../sanpham/csdl_function.php";

//$sql1 = "SELECT * FROM khachhang WHERE  emailkh = $email ";
$conn = mysqli_connect("localhost", "root", "", "ct271-01");


//$id=$_SESSION['idkh'];
$tenkh = $_POST['tenkh'];
$email = $_POST['emailkh'];
$diachi = $_POST['diachikh'];
$sdt = $_POST['sdtkh'];

//$sql1 = "INSERT INTO chitiet_dathang ( tenkh, emailkh , sdtkh, diachikh) VALUES ('$tenkh', '$email', '$sdt', '$diachi') WHERE emailkh='$email'";

$sql1 = "UPDATE khachhang SET
                            tenkh = '$tenkh',
                            emailkh = '$email',
                            diachikh = '$diachi',
                            sdtkh = '$sdt'
                            WHERE (emailkh='$email')
                       ";
$result1 = mysqli_query($conn,$sql1) ;

?>

<?php
session_start();
if (isset($_SESSION['emailkh'])) {
    $email = $_SESSION['emailkh'];
} else exit();

$_SESSION['err'] = 1;
foreach($_POST as $key => $value){
    if(trim($value) == ''){
        $_SESSION['err'] = 0;
    }
    break;
}

if($_SESSION['err'] == 0){
    header("Location: thanhtoan.php");
} else {
    unset($_SESSION['err']);
}


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
require "headerhienthisp.php";

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
require "headerhienthisp.php";
?>
<div class="w-100 white">
    <div class="row pt-4 w-80 m-auto mt-5">
        <div class="col-lg-7">
            <div class="table-responsive w-75 pb-5 pt-5" style="margin:2em auto" >
                <!--form 1-->
                <div>
                    <form action="dondathang.php" method="post">
                        <table class="table product-table table-cart-v-1 " >
                            <!--        <tr>-->
                            <!--            <th></th>-->
                            <!--            <th class="font-weight-bold text-center">Tên sách</th>-->
                            <!--            <th class="font-weight-bold text-center" >Tác giả</th>-->
                            <!--            <th class="font-weight-bold text-center" >Giá</th>-->
                            <!--            <th class="font-weight-bold text-center" >Số lượng</th>-->
                            <!--            <th class="font-weight-bold text-center" > Thành tiền</th>-->
                            <!--        </tr>-->

                            <?php
                            foreach($_SESSION['cart'] as $id => $qty){
                                $conn = db_connect();
                                $book = mysqli_fetch_assoc(getBookByIsbn($conn, $id));

                                ?>
                                <!--            <tr>-->
                                <!--                <td class="img-fluid z-depth-0" style="width: 150px; height: 200px; margin: 0 auto;"><img src="--><?php //echo $book['hinhanh'] ?><!--" alt='Hình ảnh' width= '100px' > </td>-->
                                <!--                <td class="text-center" name="tensach">--><?php //echo $book['tensach'] . " by " . $book['tentacgia']; ?><!--</td>-->
                                <!--                <td class="text-center" name="tentg">--><?php //echo $book['tentacgia']; ?><!--</td>-->
                                <!--                <td class="text-center" name="gia">--><?php //echo  number_format($book['gia']) ." đ"; ?><!--</td>-->
                                <!--                <td class="text-center" name="sl"><input type="text" value="--><?php //echo $qty; ?><!--" size="2" name="--><?php //echo $id; ?><!--" name="sl"></td>-->
                                <!--                <td class="text-center" name="thanhtien">--><?php //echo  number_format($qty * $book['gia']) ." đ"; ?><!--</td>-->
                                <!--                </tr>-->
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
                <div class="text-primary font-weight-bold "> <h3>Địa chỉ giao hàng</h3></div>
                <br>
                <?php
                $sql1 = "SELECT * FROM khachhang WHERE  emailkh = '$email' ";
                $result1 = mysqli_query($conn,$sql1);
                if(mysqli_num_rows($result1) == 1) {
                    $row1 = mysqli_fetch_assoc($result1);

                    ?>
                    <div class="form-group">
                        <!--                    <label for="name" class=" control-label col-md-10">Họ tên</label>-->
                        <div class="col-md-10">
                            Họ Tên <br>
                            <input type="text" name="tenkh" class="col-md-10" class="form-control"
                                   value="<?php echo $row1['tenkh'] ?>"
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <!--                    <label for="email" class="control-label col-md-10">Email</label>-->
                        <div class="col-md-10">
                            Email <br>
                            <input type="text" name="emailkh" class="col-md-10" class="form-control" placeholder="... @gmail.com"
                                   value="<?php echo $row1['emailkh'] ?>"
                            />
                        </div>
                    </div>

                    <div class="form-group">
                        <!--                    <label for="address" class="control-label col-md-10">Địa chỉ</label>-->
                        <div class="col-md-10">
                            Địa chỉ <br>
                            <input type="text" name="diachikh" class="col-md-10" class="form-control"
                                   value="<?php echo $row1['diachikh'] ?>"
                            />
                        </div>
                    </div>


                    <div class="form-group">
                        <!--                    <label for="phone" class="control-label col-md-10">Số điện thoại</label>-->
                        <div class="col-md-10">
                            Số điện thoại <br>
                            <input type="text" name="sdtkh" class="col-md-10" class="form-control"
                                   value="<?php echo $row1['sdtkh'] ?>"
                            />
                        </div>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <input type="submit" name="submit" value="Đặt Hàng" class="btn btn-primary ">
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
require_once "../../footer.php";
?>
</body>
</html>