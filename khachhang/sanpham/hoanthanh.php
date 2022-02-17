<?php
session_start();
//if (isset($_SESSION['emailkh'])) {
//    $email = $_SESSION['emailkh'];
//} else exit();
//$_SESSION['err'] = 1;
//foreach($_POST as $key => $value){
//    if(trim($value) == ''){
//        $_SESSION['err'] = 0;
//    }
//    break;
//}

//if($_SESSION['err'] == 0){
//    header("Location: dondathang.php");
//} else {
//    unset($_SESSION['err']);
//}

require_once "../sanpham/csdl_function.php";
// print out header here
$title = "Đơn đặt hàng";
//require "./template/header.php";
// connect database
$conn = db_connect();
extract($_SESSION['ship']);

// find customer
//$id=$_SESSION['idkh'];
//if (isset($_SESSION['emailkh'])) {
//    $tenkh = $_POST['tenkh'];
//    $emailkh = $_POST['emailkh'];
//    $diachikh = $_POST['diachikh'];
//    $sdtkh = $_POST['sdtkh'];
//    $soluongsp = $_POST['sl'];
//    $thahtien = $_POST['thanhtien'];
//    $gia = $_POST['gia'];
//}


$idkh = getCustomerId( $tenkh, $emailkh, $sdtkh, $diachikh);
//echo "idkh la:".$idkh;
$date = date("Y-m-d");

if($idkh == null) {
    // insert customer into database and return customerid
    $idkh = setCustomerId($tenkh, $emailkh, $sdtkh, $diachikh );
}


insertIntoOrder($conn, $idkh, $_SESSION['total_price'], $emailkh, $diachikh, $sdtkh,$date);

// take orderid from order to insert order items
$iddon = getOrderId($conn, $idkh);
//$iddon = "SELECT iddon FROM dondathang ORDER BY iddon DESC LIMIT 1";
foreach($_SESSION['cart'] as $idsach => $qty){
    $bookprice = getbookprice($idsach);
//   echo "giá sách là:".$bookprice;
    $query = "INSERT INTO chitiet_dondathang VALUES
		('$iddon','$idsach','$bookprice', '$qty')";
    //		('$iddon', ',''$idsach','$idkh','$bookprice', '$qty')";


//    foreach($_SESSION['cart'] as $idsach => $qty){
//    $bookprice = getbookprice($idsach);
//    $query = "INSERT INTO dathang VALUES
//		('$id', '$idkh','$emailkh','$idsach', '$sdtkh','$gia', '$qty')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        echo "Insert value false!" . mysqli_error($conn);
        exit;
    }
}

session_unset();
?>
    <p class="lead text-success w-75 m-auto">Đơn đặt hàng của bạn đã được xử lý thành công. Vui lòng chú ý điện thoại của bạn để nhận được xác nhận đơn hàng và chi tiết giao hàng !.
        Giỏ hàng của bạn đã trống.
        <a href="http://localhost:8080/CT271/index.php"> Quay lại.</a>
    </p>


<?php
if(isset($conn)){
    mysqli_close($conn);
}
?>