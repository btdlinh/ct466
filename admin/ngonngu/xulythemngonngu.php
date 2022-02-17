
<?php
session_start();
//if(isset($_SESSION['email'])){
//    $email=$_SESSION['email'];
//}else exit();
// Create connection
$conn = new mysqli("localhost", "root", "", "ct466");
$conn->set_charset("utf8");

$tenngonngu=$_POST["tenngonngu"];

if($tenngonngu != 'tenngonngu') {
    $sql = "INSERT INTO ngon_ngu( nn_ngonngu)  VALUES ( '$tenngonngu')";

    $result = $conn->query($sql);
    if ($result == true) {
        header('location: dsngonngu.php');

//        echo"<h2 style=\"align-items: center;'\"> Thêm Ngôn Ngữ Thành Công</h2>";
    } else {
        echo "<h2> Thêm Thất Bại</h2>";
    }
}else {
    echo "<h2> Thêm Thất Bại</h2>";
}
$conn->close();



