<?php
session_start();
$conn = new mysqli("localhost", "root", "", "ct466");
$conn->set_charset("utf8");

$email=$_POST["emailkh"];
$pass=md5($_POST["passkh"]);

$sql="SELECT * FROM khach_hang WHERE kh_email='$email'";

$result = $conn->query($sql);
//$row = $result -> fetch_assoc();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // dua cac toi tuong vua tim duoc thanh cac dong
    if($pass==$row['kh_matkhau']){ // so sanh mk vua nhap voi mk co trong csl=dl
        //      echo "Dang nhap thanh cong ^^";
        $_SESSION['kh_email']= $email;
        $_SESSION['kh_ten']= $row['kh_ten'];
        ?>

<?php
    }else  header('location:dangnhap.php');
} else header('location:dangnhap.php');


$conn->close();
?>

