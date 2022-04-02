<?php
require "../mail/sendmail.php";
$conn = new mysqli("localhost", "root", "", "CT466");
$conn->set_charset("utf8");
$ten = $_POST["kh_ten"];
$email = $_POST["kh_email"];
$sdt = $_POST["kh_sdt"];
$loinhan= $_POST["kh_loinhan"];
$tieude =" NHÀ SÁCH TRỰC TUYẾN HIRAKI";
$noidung .= "<div style='font-size: 18px;'><b>Hiraki</b> cảm ơn bạn đã gửi thông tin cho chúng tôi. Chúng tôi sẽ xem xét và phản hồi tới bạn trong thời gian sớm nhất. Chúc bạn một ngày tốt lành!</div>";
$maildathang = $email;
$mail = new Mailer();
$mail -> dathangmail( $tieude, $noidung, $maildathang);


$sql= "INSERT INTO kh_lienhe (khlh_ten, khlh_email, khlh_sdt, khlh_loinhan) VALUES ('$ten', '$email', '$sdt', '$loinhan')";
$result = $conn->query($sql);
if($result == true){
    header('location: ../index.php');
//    echo"<h2> Gửi yêu cầu thành công. Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất!</h2>";

}
else{
    echo"<h2> Gửi Yêu Cầu Thất Bại!<a href='lienhe.php'>Làm lại</a></h2>";
}
?>