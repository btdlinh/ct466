
<?php
session_start();
//if(isset($_SESSION['email'])){
//    $email=$_SESSION['email'];
//}else exit();
// Create connection
$conn = new mysqli("localhost", "root", "", "ct466");
$conn->set_charset("utf8");

$tenloai=$_POST["tenloaisach"];
$iddanhmuc=$_POST["iddanhmuc"];

if($tenloai != 'tl_tentheloai') {
    $sql = "INSERT INTO the_loai( tl_iddm, tl_tentheloai)  VALUES ( '$iddanhmuc', '$tenloai')";

    $result = $conn->query($sql);
    if ($result == true) {
        header('location: dstheloai.php');

//    echo"<h2 style=\"align-items: center;'\"> Thêm Loại Sách Thành Công</h2>";
    } else {
        echo "<h2> Thêm Thất Bại</h2>";
    }
}else {
    echo "<h2> Thêm Thất Bại</h2>";
}
$conn->close();



