<?php
    session_start();
    $conn = new mysqli("localhost", "root", "", "ct466");
    $conn->set_charset("utf8");

    $email=$_POST["emailkh"];
    $pass=md5($_POST["passkh"]);

    $sql="SELECT* FROM khach_hang WHERE kh_email='$email'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // dua cac toi tuong vua tim duoc thanh cac dong
        if($pass==$row['kh_matkhau']){ // so sanh mk vua nhap voi mk co trong csl=dl
      //      echo "Dang nhap thanh cong ^^";
            $_SESSION['kh_email']= $email;
            header('location:index.php');
        }else  header('location:dangnhap.html');
    } else header('location:dangnhap.html');


    $conn->close();
?>

