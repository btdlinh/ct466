<?php
session_start();

require_once "../giohang_function.php";
require_once "../sanpham/csdl_function.php";
//require "headerhienthisp.php";

//session_destroy();
if (isset($_POST['idsach'])) {
    $idsach = $_POST['idsach'];
    $sl = $_POST['soluong'];


// by linh
//if (!isset($_SESSION['cart'])) {
//    $arr = array (
//        "ids"=> $idsach,
//            "slm"=> $sl
//
//        );
//    echo json_encode($arr);
//}

// neu chua co sp trong gio hang
    if (!isset($_SESSION['cart'][$idsach])) {
        // them vao 1 hoac nhieu sp tuy chon so luong (toi da la 5)
        $_SESSION['cart'][$idsach] = $sl;
    } // neu da co san pham trong gio hang thi cong don them so luong => chua lam
    elseif (isset($_SESSION['cart'][$idsach])) {

    }
    // neu da co san pham trong gio hang thi cong don them so luong => chua lam


    // trong mang cart co bao nhiu idsach thi lay all idsach+ so luong mua(qty -> cua moi idsach) , chua cap nhat cong don duoc so luong
    foreach ($_SESSION['cart'] as $idsach => $qty) {
        $_SESSION['cart'][$idsach] = +$qty;
        echo "ID " . $idsach;
        echo "<br>";
        echo " So luong " . $qty;
        echo "<br>";

    }
}
// by linh
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

<body class="w-100 white">
    <div class="table-responsive w-75 pb-5 pt-5" style="margin:2em auto" >

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

    </div>
    <?php require_once "../../hienthi/footer.php"; ?>
<?php } ?>
</html>
</html>