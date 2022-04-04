
<?php
    // Create connection
    $conn = new mysqli("localhost", "root", "", "ct466");
    $conn->set_charset("utf8");

    $ten=$_POST["name"];
//    $nsinh=$_POST["ns"];
//    $gt=$_POST["gioitinh"];
    $email=$_POST["email"];
//    $sdt=$_POST["sdt"];
    $pass=md5($_POST["password"]);
//    $diachi=$_POST["dc"];

    $sql= "INSERT INTO admin (ad_email, ad_matkhau, ad_ten)	VALUES ('$email', '$pass', '$ten')";
    echo $sql;
    $result = $conn->query($sql);
    if($result == true){
        header('location: dangnhap.php');
    }
    else{
        echo"<h2> Đăng Ký Thất Bại!</h2>";
    }
    $conn->close();



