<?php
    session_start();
    // muốn chạy được thì session_destroy() 1 lần nha!!!!!
//    session_destroy();exit();
?>

<?php
require_once "../giohang_function.php";
require_once "../sanpham/csdl_function.php";

// đọc form gửi đến - idsach
if(isset($_POST['idsach'])){
    $idsach = $_POST['idsach'];
}

if(isset($idsach)){
    // new item selected
    if(!isset($_SESSION['cart'])){
        // $_SESSION['cart'] is associative array that bookiook_isbnsbn => qty
        $_SESSION['cart'] = array();

        $_SESSION['total_items'] = 0;
        $_SESSION['total_price'] = '0.00';
    }

    if(!isset($_SESSION['cart'][$idsach])){
        $_SESSION['cart'][$idsach] = 1;
    } elseif(isset($_GET['cart'])){
        $_SESSION['cart'][$idsach]++;
        unset($_POST);
    }
}

// if save change button is clicked , change the qty of each bookisbn
if(isset($_POST['save_change'])){
    foreach($_SESSION['cart'] as $id =>$qty){
        if($_POST[$id] == '0'){
            unset($_SESSION['cart']["$id"]);
        } else {
            $_SESSION['cart']["$id"] = $_POST["$id"];
        }
    }
}

// nút xóa
//
//if(isset($_POST['action'])){
//    switch ($_POST['action']){
//        case 'delete':
//            $id=$_POST['id'];
//            unset($_SESSION['cart'][$id]);
//            header("giohang.php");
//        break;
//    }
//}


// print out header here
$title = "Giỏ hàng của bạn.";


if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
    $_SESSION['total_price'] = total_price($_SESSION['cart']);
    $_SESSION['total_items'] = total_items($_SESSION['cart']);
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<?php
require "headerhienthisp.php";
?>
<body class="w-100 white">
<div class="table-responsive w-75 pb-5 pt-5" style="margin:2em auto" >

    <!-- Vùng ALERT hiển thị thông báo -->
    <div id="alert-container" class="alert alert-warning alert-dismissible fade d-none" role="alert">
        <div id="thongbao">&nbsp;</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form action="giohang.php" method="post">
        <table class="table product-table table-cart-v-1 " >

            <?php
            $stt=1;
            foreach($_SESSION['cart'] as $id => $qty){
                $conn = db_connect();
                $book = mysqli_fetch_assoc(getBookByIsbn($conn, $id));

                ?>
                <tr>
                    <td class="col-md-1"><?php echo $stt++ ?></td>
<!--                    <td class="col-md-1">--><?php //echo $id ?><!--</td>-->
                    <td class="img-fluid z-depth-0" style="width: 150px; height: 200px; margin: 0 auto;"><img src="<?php echo $book['sp_hinhanh'] ?>" alt='Hình ảnh' width= '100px' > </td>
                    <td class="w-75 m-0 m-auto text-center"><?php echo $book['sp_tensach'] . " <br><br> " . number_format($book['sp_gia'])."đ"; ?></td>
                    <td class="w-75 m-0 m-auto text-center"><input type="number" min="1" max="5" class="form-control text-center w-50" value="<?php echo $qty; ?>" size="2" name="<?php echo $id; ?>"></td>

                <!--test SL-->
<!---->
<!--                    <div class="input-group">-->
<!--                        <span class="input-group-text btn btn-danger" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"> -     </span>-->
<!--                        <input type="number" value="1" class="form-control text-center" min="1" max="100">-->
<!--                        <span class="input-group-text btn btn-success" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"> +    </span>-->
<!--                    </div>-->

                <!--test SL-->

                    <td class="w-75 m-0 m-auto text-center"><?php echo  number_format($qty * $book['sp_gia']) ."đ" ; ?></td>


                    <td>
                        <section class="col-md-2" >
<!--                            <input onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')" type="submit" class="btn btn-primary" name="delete" value="Xóa">-->

                            <a onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')"
                               href="xoasp_giohang.php?id=<?=$id?>" class="btn btn-primary ">
                                <i class="bi bi-trash"></i>
                            </a>
                        </section>

                    </td>

                </tr>

            <?php } ?>
            <tr>
                <th colspan="2"><h5><strong class="mt-2 ">Tổng sản phẩm: </strong> <strong class="text-primary"><?php echo $_SESSION['total_items']; ?> </strong></h5></th>
                <th colspan="3"><h5><strong class="mt-2">Tổng tiền: </strong> <strong class="text-primary"> <?php echo  number_format($_SESSION['total_price'] )."đ"; ?></strong> </h5></th>
            </tr>

        </table>
        <br/><br/>
        <a href="../../index.php" class="btn btn-primary" title="Tiếp Tục Mua Hàng"><i class="fas fa-reply"></i></a>
        <input type="submit" class="btn btn-primary" name="save_change" value="Cập Nhật">
        <a href="thanhtoan.php" class="btn btn-primary">Tiến Hàng Thanh Toán</a>
    </form>
    <br/><br/>

</div>
<?php require_once "../../hienthi/footer.php"; ?>
    <?php
} else {
   echo" <section class=\"alert alert-info\" style='text-align: center ; font-family: Arial; margin-top: 3em;'><h3>Giỏ hàng trống! <a href='http://localhost:8080/CT271/index.php'> Quay lại trang chủ</a></h3></section>";
//    echo "<strong><h4 class=\"text-warning\ text-center\">Giỏ hàng của bạn trống! Vui lòng thêm sản phẩm !</h4></strong>";
}
if(isset($conn)){ mysqli_close($conn); }

?>


</body>