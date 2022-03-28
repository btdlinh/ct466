<?php
session_start();
if (isset($_SESSION['kh_email'])) {
    $email = $_SESSION['kh_email'];
} else exit();


require_once "../sanpham/csdl_function.php";
// print out header here
$title = "Đơn đặt hàng";
//require "./template/header.php";
// connect database
$conn = db_connect();
extract($_SESSION['ship']);




$idkh = getCustomerId( $emailkh, $tenkh, $sdtkh, $diachikh);
//echo "idkh la:".$idkh;
$date = date("Y-m-d");

if($idkh == null) {
    // insert customer into database and return customerid
    $idkh = setCustomerId($emailkh, $tenkh, $sdtkh, $diachikh );
}
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $tong_sl = 0;
    $tong_tien = 0;

    foreach ($cart as $value) {
        $tong_sl += (int)$value["number"];
        $tong_tien += (int)$value["number"] * $value["price"];
    }
}

insertIntoOrder($conn, $idkh,  $tong_tien, 1, $date);

// take orderid from order to insert order items
$iddon = getOrderId($conn, $idkh);
//$iddon = "SELECT iddon FROM dondathang ORDER BY iddon DESC LIMIT 1";
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $tong_sl = 0;
    $tong_tien = 0;

    foreach ($cart as $value) {
        $idsach= $value['id'];

        $bookprice = getbookprice($idsach);
        $num=$value["number"];
        $query = "INSERT INTO chi_tiet_hoa_don VALUES
		('$num','$bookprice', '$idsach','$iddon')";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "Insert value false!" . mysqli_error($conn);
            exit;
        }
    }
}

unset($_SESSION['cart']);
?>
    <p class="lead text-success w-75 m-auto">Đơn đặt hàng của bạn đã được xử lý thành công. Vui lòng chú ý điện thoại của bạn để nhận được xác nhận đơn hàng và chi tiết giao hàng !.
        Giỏ hàng của bạn đã trống.
        <a href="http://localhost/CT466/index.php"> Quay lại.</a>
    </p>


<?php
if(isset($conn)){
    mysqli_close($conn);
}
?>