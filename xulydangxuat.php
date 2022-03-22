<?php
    session_start();
    unset($_SESSION['email']);
    header('location:dangnhap.html');

//if(isset($_SESSION['email'])) {
//    unset($_SESSION['email']);
//    header('location:dangnhap.html');
//}
//else {
//    echo '<p>Người dùng chưa đăng nhập. Không thể đăng xuất được!' ."<a href=\"http://localhost/CT466\"> Quay lại </a></p>"; die;
//}