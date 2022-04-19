
<?php
    // Create connection
//    $conn = new mysqli("localhost", "root", "", "ct466");
//    $conn->set_charset("utf8");
//
//    $ten=$_POST["name"];
//
//
//    $email=$_POST["email"];
//    $pass=md5($_POST["pass"]);
//
//    $sql= "INSERT INTO khach_hang (kh_ten, kh_email, kh_matkhau) VALUES ('$ten', '$email', '$pass')";
//    $result = $conn->query($sql);
//    if($result == true){
//        header('location: dangnhap.php');
//    }
//    else{
//        echo"<h2> Tài Khoản Đã Tồn Tại</h2>";
//    }
//    $conn->close();


require "mail/sendmail.php";

// Create connection
$conn = new mysqli("localhost", "root", "", "ct466");
$conn->set_charset("utf8");

$ten = $_POST["name"];
$email = $_POST["email"];
$pass = md5($_POST["pass"]);

$sql = "INSERT INTO khach_hang (kh_ten, kh_email, kh_matkhau) VALUES ('$ten', '$email', '$pass')";
$result = $conn->query($sql);
if ($result == true) {
    $_SESSION['email'] = $email;
    $_SESSION['kh_ten'] = $ten;
    header('location: dangnhap.php');
} else {
    echo "<h2> Tài Khoản Đã Tồn Tại</h2>";
}

$conn->close();
