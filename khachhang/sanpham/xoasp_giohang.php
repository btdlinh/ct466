<?php
    session_start();
    if (isset($_GET['id'])){
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    unset($cart[$id]);
    //$_SESSION["cart"] = array_values($_SESSION["cart"]);
    //    $_SESSION['cart'][$id] = $cart;

    header('Location: giohang.php');

    //echo $id ;
    }
    else
    {
    echo "Không tìm thấy sản phẩm";
    }
?>