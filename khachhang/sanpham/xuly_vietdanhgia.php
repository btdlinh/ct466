<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ct466';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname)
or die($conn->connect_error);

$conn->set_charset('utf8');
$ten=$_GET['tenkh'];
$bl=$_GET['binhluan'];
$sp=$_GET['idsp'];
echo $ten;
echo "<br>";
echo $bl;
echo "<br>";
echo $sp;
$sql = "INSERT INTO test ( t_idsp, t_email, t_binhluan) VALUES ( '$sp' ,'$ten','$bl')";
$rs = mysqli_query($conn,$sql);
if($rs== true){
    echo "Bạn đã đánh giá xong! <a href='http://localhost:8080/CT466/index.php'>Quay lại trang chủ </a>";
}


