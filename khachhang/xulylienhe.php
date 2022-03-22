<?php
$conn = new mysqli("localhost", "root", "", "CT466-01");
$conn->set_charset("utf8");
$ten = $_POST["kh_ten"];
$email = $_POST["kh_email"];
$sdt = $_POST["kh_sdt"];
$loinhan= $_POST["kh_loinhan"];
$sql= "INSERT INTO kh_lienhe (kh_ten, kh_email, kh_sdt, kh_loinhan) VALUES ('$ten', '$email', '$sdt', '$loinhan')";
$result = $conn->query($sql);
if($result == true){
    header('location: ../index.php');
//    echo"<h2> Gửi yêu cầu thành công. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất!</h2>";

}
else{
    echo"<h2> Gửi Yêu Cầu Thất Bại!<a href='lienhe.php'>Làm lại</a></h2>";
}
?>