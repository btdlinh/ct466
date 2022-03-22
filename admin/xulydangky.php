
<?php
    // Create connection
    $conn = new mysqli("localhost", "root", "", "CT466-01");
    $conn->set_charset("utf8");

    $ten=$_POST["name"];
    $nsinh=$_POST["ns"];
    $gt=$_POST["gioitinh"];
    $email=$_POST["email"];
    $sdt=$_POST["sdt"];
    $pass=md5($_POST["pass"]);
    $diachi=$_POST["dc"];

    $sql= "INSERT INTO admin (ten, ngaysinh, gioitinh, sdt, email, matkhau, diachi) 
            VALUES ('$ten', '$nsinh', '$gt', '$sdt', '$email', '$pass', '$diachi')";
//    echo $sql;
    $result = $conn->query($sql);
    if($result == true){
        header('location: dangnhap.html');
    }
    else{
        echo"<h2> Đăng Ký Thất Bại!</h2>";
    }
    $conn->close();



