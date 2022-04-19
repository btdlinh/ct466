<?php
    session_start();
    unset($_SESSION['kh_email']);
    header('location:dangnhap.php');

//if(isset($_SESSION['email'])) {
//    unset($_SESSION['email']);
//    header('location:dangnhap.php');
//}
//else {
//    echo '<p>Người dùng chưa đăng nhập. Không thể đăng xuất được!' ."<a href=\"http://localhost/CT466\"> Quay lại </a></p>"; die;
//}