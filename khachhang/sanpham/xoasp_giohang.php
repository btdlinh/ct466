<?php
session_start();
//    if (isset($_POST['id'])){
//    $id = $_POST['id'];
//    unset($_SESSION['cart'][$id]);
//    unset($cart[$id]);
//    //$_SESSION["cart"] = array_values($_SESSION["cart"]);
//    //    $_SESSION['cart'][$id] = $cart;
//
//    header('Location: giohang_hienthi.php');
//
//    //echo $id ;
//    }
//    else
//    {
//    echo "Không tìm thấy sản phẩm";
//    }

$id = $_POST["id"];
$cart = $_SESSION['cart'];

unset($cart[$id]);
$_SESSION['cart'] = $cart;
header('Location: giohang_hienthi.php');
?>