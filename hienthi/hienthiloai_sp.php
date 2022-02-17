<?php
    require('../db.php');
//    require_once "../khachhang/sanpham/csdl_function.php";

    $idtheloai= $_GET=['idtheloai'];
    echo $idtheloai;
    if(isset($_GET['idtheloai'])) {

        $query = " select * from sach where status=1 and idtheloai=$idtheloai ";
        $result = mysqli_query($conn,$query);
    }
?>

    <?php foreach ($rs as $item):?>
        <section><?= $item['tensach'] ?></section>
        <section><?= number_format($item['gia']) ?> đ</section>
        <section><?= $item['hinhanh'] ?></section>

    <?php endforeach; ?>
