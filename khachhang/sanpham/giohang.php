<?php
session_start();
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

?>

