<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "ct466");
    $conn->set_charset("utf8");

    $email=$_POST["email"];
    $pass=md5($_POST["pass"]);

    $sql="SELECT * FROM admin where ad_email='$email' and ad_matkhau= '$pass' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
//        echo "dung";
        $_SESSION['ad_email']= $email;
              header('Location: http://localhost/ct466/admin/index.php');
        } else {
        $_SESSION['eror']= "Tài khoản mật khẩu không đúng";
        header('Location: http://localhost/ct466/admin/dangnhap.php');
    }
    $conn->close();
?>

