
<?php
session_start();
//if(isset($_SESSION['email'])){
//    $email=$_SESSION['email'];
//}else exit();
// Create connection
$conn = new mysqli("localhost", "root", "", "ct466");
$conn->set_charset("utf8");

$tendanhmuc=$_POST["tendanhmuc"];

if($tendanhmuc != 'tendanhmuc') {
    $sql = "INSERT INTO danh_muc( dm_ten)  VALUES ( '$tendanhmuc')";

    $result = $conn->query($sql);
    if ($result == true) {
        header('location: dsdm.php');

//    echo"<h2 style=\"align-items: center;'\"> Thêm Thành Công</h2>";
    } else {
        echo "<h2> Thêm Thất Bại</h2>";
    }
}else {
    echo "<h2> Thêm Thất Bại</h2>";
}
$conn->close();



