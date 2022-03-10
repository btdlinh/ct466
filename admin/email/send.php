<?php

//$to_email = 'nhasachtructuyenhiraki@gmail.com';
//$subject = '[Xác nhận đơn hàng từ Nhà Sách Trực Tuyến HIRAKI';
//$message = "Cảm ơn Anh/ chị đã đặt hàng tại Nhà Sách Trực Tuyến HIRAKI ! Đơn hàng của Anh/ chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/ chị.";
//$headers = 'From: nhasachtructuyenhiraki@gmail.com';
//mail($to_email, $subject, $message, $headers);
$to      = "nhasachtructuyenhiraki@gmail.com";
$subject = "[Xác nhận đơn hàng từ Nhà Sách Trực Tuyến HIRAKI]";
$message =  "<h1>Cảm ơn Anh/ chị đã đặt hàng tại Nhà Sách Trực Tuyến HIRAKI !</h1>
                <p> Đơn hàng của Anh/ chị đã được tiếp nhận, chúng tôi sẽ nhanh chóng liên hệ với Anh/ chị.</p>";
$header  =  "From:nhasachtructuyenhiraki@gmail.com \r\n";
//$header .=  "Cc:linhkookie1997@exmaple.com \r\n";

$header .= "MIME-Version: 1.0\r\n";             //MỚI
$header .= "Content-type: text/html\r\n";       //MỚI

$success = mail ($to,$subject,$message,$header);

if( $success == true )
{
    echo "Đã gửi mail thành công !!...";
}
else
{
    echo "Không gửi đi được...";
}
?>