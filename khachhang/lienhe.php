<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Liên Hệ</title>
    <!--  Font Awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        html,
        body,
        header,
        .jarallax {
            height: 700px;
        }
        @media (max-width: 740px) {
            html,
            body,
            header,
            .jarallax {
                height: 100vh;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .jarallax {
                height: 100vh;
            }
        }
    </style>
</head>
<?php
    require "../UI/adheader.php"

?>
<body class="about-page pb-5 mb-5 white">
<!-- Section: Contact v.2 -->
<section class="section pb-4 wow fadeIn pt-5 mt-5 w-75 m-0 m-auto" data-wow-delay="0.3s">

    <!-- Section heading -->
    <h2 class="text-center my-5 h1">Gửi thắc mắc cho chúng tôi</h2>

    <!-- Section description -->
    <p class="text-center mb-5 w-responsive mx-auto">Nếu bạn cần tư vấn, vui lòng để lại thông tin, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>

    <div class="row">

        <!-- Grid column -->
        <div class="col-md-8 col-xl-9">
            <form action="xulylienhe.php" method="POST" name="register" onsubmit="return validate()">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="contact-name" class="form-control" name="kh_ten" id="ten"  >
                            <label for="contact-name" class="">Tên của bạn</label>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="contact-email" class="form-control" name="kh_email"  >
                            <label for="contact-email" class="">Email của bạn</label>
                        </div>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <!-- Grid row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="contact-phone" class="form-control" name="kh_sdt" >
                            <label for="contact-phone" class="">Số điện thoại của bạn</label>
                        </div>
                    </div>
                </div>
                <!-- Grid row -->

                <!-- Grid row -->
                <div class="row mb-4">

                    <!-- Grid column -->
                    <div class="col-md-12">

                        <div class="md-form mb-0">
                            <textarea type="text" id="contact-message" class="md-textarea form-control" rows="3" name="kh_loinhan" ></textarea>
                            <label for="contact-message">Nội Dung</label>
                        </div>

                    </div>
                </div>
                <!-- Grid row -->

                <div class="text-center text-md-left mb-4">
                    <input  type="submit" value="gửi cho chúng tôi" class="btn btn-light-blue"
                           id="submit"
                    />
                    <input  type="reset" value="làm lại" class="btn btn-light-blue">
                </div>

            </form>

<!--            <div class="text-center text-md-left mb-4">-->
<!--                <input  type="submit" value="gửi cho chúng tôi" class="btn btn-light-blue">-->
<!--               <input  type="reset" value="làm lại" class="btn btn-light-blue">-->
<!--            </div>-->
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-xl-3">
            <ul class="contact-icons list-unstyled text-center">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p> 133/1B Trần Hưng Đạo, An Phú, NInh Kiều, Cần Thơ</p>
                </li>

                <li><i class="fas fa-phone fa-2x"></i>
                    <p>+ 0849795178</p>
                </li>

                <li><i class="fas fa-envelope fa-2x"></i>
                    <p>hirakicontact@gmail.com</p>
                </li>
            </ul>
        </div>
        <!-- Grid column -->

    </div>

</section>
<!-- Section: Contact v.2 -->

<!-- Footer Links -->
<?php
require "../hienthi/footer.php";
?>

<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../js/mdb.min.js"></script>

<script>
    new WOW().init();

    // MDB Lightbox Init
    $(function () {
        $("#mdb-lightbox-ui").load("../../mdb-addons/mdb-lightbox-ui.html");
    });

</script>

<script>
    var inputs = document.forms['register'].getElementsByTagName('input');
    var run_onchange = false;
    function valid(){
        var errors = false;
        var reg_mail = /^[A-Za-z0-9]+([_\.\-]?[A-Za-z0-9])*@[A-Za-z0-9]+([\.\-]?[A-Za-z0-9]+)*(\.[A-Za-z]+)+$/;
        for(var i=0; i<inputs.length; i++){
            var value = inputs[i].value;
            var id = inputs[i].getAttribute('id');

            // Tạo phần tử span lưu thông tin lỗi
            var span = document.createElement('span');
            // Nếu span đã tồn tại thì remove
            var p = inputs[i].parentNode;
            if(p.lastChild.nodeName == 'SPAN') {p.removeChild(p.lastChild);}

            // Kiểm tra rỗng
            if(value == ''){
                span.innerHTML ='Thông tin được yêu cầu';
                span.style.color = "red";

            }else{
                // Kiểm tra các trường hợp khác
                if(id == 'contact-email'){
                    if(reg_mail.test(value) == false){ span.innerHTML ='Email không hợp lệ (ví dụ: abc@gmail.com)'; span.style.color = "red";}
                    var email = value;
                }
                // if(id == 'confirm_email' && value != email){span.innerHTML ='Email nhập lại chưa đúng';}
                // Kiểm tra password
                // if(id == 'password'){
                //     if(value.length <6){span.innerHTML ='Password phải từ 6 ký tự';}
                //     var pass =value;
                // }
                // Kiểm tra password nhập lại
                // if(id == 'confirm_pass' && value != pass){span.innerHTML ='Password nhập lại chưa đúng';}
                // Kiểm tra số điện thoại
                if(id == 'contact-phone' && isNaN(value) == true){span.innerHTML ='Số điện thoại phải là kiểu số';span.style.color = "red";}
            }

            // Nếu có lỗi thì chèn span vào hồ sơ, chạy onchange, submit return false, highlight border
            if(span.innerHTML != ''){
                inputs[i].parentNode.appendChild(span);
                errors = true;
                run_onchange = true;
                inputs[i].style.border = '1px solid #c6807b';
                inputs[i].style.background = '#fffcf9';
            }
        }// end for

        if(errors == false){alert('Gửi yêu cầu thành công');}
        return !errors;
    }// end valid()

    // Chạy hàm kiểm tra valid()
    var register = document.getElementById('submit');
    register.onclick = function(){
        return valid();
    }

    // Kiểm tra lỗi với sự kiện onchange -> gọi lại hàm valid()
    for(var i=0; i<inputs.length; i++){
        var id = inputs[i].getAttribute('id');
        inputs[i].onchange = function(){
            if(run_onchange == true){
                this.style.border = '1px solid #999';
                this.style.background = '#fff';
                valid();
            }
        }
    }// end for

</script>

</body>

</html>