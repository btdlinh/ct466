<?php
session_start();
if (isset($_SESSION['kh_email'])) {
    $email = $_SESSION['kh_email'];
} else exit();

require "../../mail/sendmail.php";
require_once "../sanpham/csdl_function.php";

$title = "Đơn đặt hàng";
$conn = db_connect();
extract($_SESSION['ship']);
//print_r($_SESSION['ship']);
$idkh = getCustomerId($emailkh, $tenkh, $sdtkh, $diachikh);
//echo "idkh la:".$idkh;
$date = date("Y-m-d");

if ($idkh == null) {
    // insert customer into database and return customerid
    $idkh = setCustomerId($emailkh, $tenkh, $sdtkh, $diachikh);
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

insertIntoOrder($conn, $idkh, $tong_tien, 1, $date);

// take orderid from order to insert order items
$iddon = getOrderId($conn, $idkh);
//$iddon = "SELECT iddon FROM dondathang ORDER BY iddon DESC LIMIT 1";
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
//    print_r($cart);
    $tong_sl = 0;
    $tong_tien = 0;

    foreach ($cart as $value) {
        $idsach = $value['id'];
        $bookprice = getbookprice($idsach);
        $num = $value["number"];
        $query = "INSERT INTO chi_tiet_hoa_don VALUES
		('$num','$bookprice', '$idsach','$iddon')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "Insert value false!" . mysqli_error($conn);
            exit;
        }
    }
    $tieude =" Xác nhận đặt hàng từ Nhà Sách Trực Tuyến HIRAKI.";
    $noidung ="<h3 style='color: #0b51c5;'>Thông tin đơn hàng của bạn</h3>
       <h3><span  style='color: #0b51c5;'>Họ Tên KH: </span> $tenkh</h3>
        <h3><span  style='color: #0b51c5;'>Số điện thoại: </span> $sdtkh</h3>
         <h3><span  style='color: #0b51c5;'>Địa chỉ: </span> $diachikh</h3>
";
    $noidung .= "<div style='width: 30rem'><table style='border-collapse: collapse; width: 100%'>
    <tr>
     <th style='  border: 1px solid black; padding: 5px'>Tên sản phẩm</th>
                <th style='  border: 1px solid black; padding: 5px'>Giá tiền</th>
                <th style='  border: 1px solid black; padding: 5px'>Số lượng</th></tr>
                
    ";
    foreach($_SESSION['cart'] as $key => $val){
        $tong_tien += $val['price'] * $val['number'];
        $noidung .= "<tr style='  border: 1px solid black;'>
                <td style='  border: 1px solid black; padding: 5px'>".$val['name']."</td>
                <td style='  border: 1px solid black; padding: 5px'> ".number_format($val['price'])."<sup>đ</sup></td>
                <td style='  border: 1px solid black; padding: 5px; text-align: center'>".$val['number']."</td>
                </tr>";
    }
    $noidung .= "</table>";
    $noidung .= "<div style='text-align: right; margin: 1rem'>";
    $noidung .= "<div>Thành tiền: <span style='color: #b66767'>" .number_format($tong_tien)."</span></div>";
    $noidung .= "<div>Phí giao hàng: <span style='color: #b66767'>30,000 <sup>đ</sup></span></div>";
    $noidung .= "<div>Tổng tiền: <span style='color: #b66767'>".number_format($tong_tien+30000)."<sup>đ</sup></span></div>";
    $noidung .= "</div></div>";
    $maildathang = $email;
    $mail = new Mailer();
    $mail -> dathangmail( $tieude, $noidung, $maildathang);


}

unset($_SESSION['cart']);
?>
    <p class="lead text-success w-75 m-auto">Đơn đặt hàng của bạn đã được xử lý thành công. Vui lòng chú ý điện thoại
        của bạn để nhận được xác nhận đơn hàng và chi tiết giao hàng !.
        Giỏ hàng của bạn đã trống.
        <a href="http://localhost/CT466/index.php"> Quay lại.</a>
    </p>

<?php
if (isset($conn)) {
    mysqli_close($conn);
}
?>