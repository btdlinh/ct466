

<?php
//session_start();
require "../db.php";
?>

<!--<!DOCTYPE html>-->

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Đăng Ký Admin</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39+Text&display=swap" rel="stylesheet">


</head>

<body class="product-v1 hidden-sn white-skin animated white">

<!-- Navigation -->
<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar white">

        <div class="container">

            <!-- SideNav slide-out button -->
            <div class="float-left mr-2">

                <a href="http://localhost/CT466/admin/index.php" data-activates="slide-out" class="button-collapse">

<!--                    <i class="fas fa-bars"></i>-->
                    <i class="fas fa-book-open"></i>

                </a>

            </div>

            <a class="navbar-brand font-weight-bold" href="http://localhost/CT466/admin/index.php">

                <strong>HIRAKI.COM</strong>

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown ml-3">

                        <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold"
                           id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <i class="fas fa-user blue-text"></i> Tài Khoản </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">

                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/CT466/admin/dangnhap.html">Đăng Nhập</a>

<!--                            <a class="dropdown-item waves-effect waves-light" href="#"></a>-->

                        </div>

                    </li>

                </ul>

            </div>

        </div>

    </nav>
    <!-- Navbar -->

</header>
<!-- Navigation -->

<!-- Main Container -->
<div class="container mt-5 pt-3">

    <!-- Section: Product detail -->
    <section id="productDetails" class="pb-5">

        <!-- News card -->
        <div class="card mt-5 hoverable">

            <div class="row mt-6">

                <div class="col-lg-6">

                    <!-- Carousel Wrapper -->
                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">

                        <!-- Slides  class="col-md-12 text-center text-md-left text-md-right"-->
                        <div class="row mt-3 mb-4" style="margin: 2em; padding: 7em;">
                            <div class="md-form">
                                <h1 class="logo "
                                    style="
                                                        /*padding-top: 0.2em;*/
                                                        color: rgba(55,132,187,0.85);
                                                        text-align: center;
                                                        font-size: 6em;
                                                        font-family: 'Libre Barcode 39 Text', cursive;
                                                        text-shadow: 2px 1px rgba(221,223,225,0.89)">
                                    HIRAKI
                                </h1>
                                <p class="slogan" style="color: black; text-align: center; font-size: 1.8em">Tạo tài khoản mới</p>
                            </div>

                        </div>

                        <!-- Slides -->

                    </div>
                    <!-- Carousel Wrapper -->

                </div>


                <div class="col-lg-6">
                    <!-- Add to Cart -->
                    <section class="color">

                        <div class="mt-5 mb-5 mr-5">
                            <!-- Form with header -->
                            <form action="xulydangky.php" method="POST" onsubmit="return Validate()">
                                <div class="card wow fadeIn" data-wow-delay="0.3s" >
                                    <!--                                <div class="card wow fadeIn" data-wow-delay="0.3s" style="background:rgba(18,19,19,0.75); margin-top: 3em" >-->
                                    <div class="card-body w-100">
                                        <!--form-->
                                        <div class="md-form" >
                                            <i class="fas fa-user prefix blue-text"></i>
                                            <input
                                                    type="text"
                                                    id="orangeForm-name"
                                                    name="name"
                                                    class="form-control black-text-text"
                                            />
                                            <label for="orangeForm-name">Họ tên</label>
                                        </div>
                                        <div>
                                            <p id="tbten" class="error"></p>
                                        </div>

<!---->
<!--                                        <div class="md-form ml-4 pl-5">-->
<!--                                            <label for="date" style="margin-left: 0.9em; padding-right: 2em;"> Ngày Sinh</label>-->
<!--                                            <input-->
<!--                                                    type="date"-->
<!--                                                    id="date"-->
<!--                                                    name="ns"-->
<!--                                                    for="orangeForm-nsinh"-->
<!--                                                    class="mb-2 ml-5 pl-2"-->
<!--                                                    style="margin-left: 3em; margin-top: 0.4em;"-->
<!--                                            />-->
<!--                                        </div>-->
<!--                                        <div>-->
<!--                                            <p id="tbns" class="error"></p>-->
<!--                                        </div>-->
<!---->
<!---->
<!--                                        <div class="md-form ml-4 pl-5" >-->
<!--                                            <label for="select" style="margin-left: 0.9em;">Giới tính</label>-->
<!--                                            <select-->
<!--                                                    id="select"-->
<!--                                                    name="gioitinh"-->
<!--                                                    style="margin-left: 3em; margin-top: 0.5em;width: 8em;">-->
<!--                                                <option value="luachon">Lựa chọn...</option>-->
<!--                                                <option value="Nam" for="orangeForm-gtinh">Nam</option>-->
<!--                                                <option value="Nữ" for="orangeForm-gtinh">Nữ</option>-->
<!---->
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                        <div>-->
<!--                                            <p id="tbgt" class="error"></p>-->
<!--                                        </div>-->


                                        <div class="md-form">
                                            <i class="fas fa-envelope prefix blue-text"></i>
                                            <input
                                                    type="text"
                                                    id="orangeForm-email"
                                                    name="email"
                                                    class="form-control black-text"
                                            />
                                            <label for="orangeForm-email">Email</label>
                                        </div>
                                        <div>
                                            <p id="tbemail" class="error"></p>
                                        </div>


<!--                                        <div class="md-form">-->
<!--                                            <i class="fas fa-phone-alt prefix blue-text"></i>-->
<!--                                            <input-->
<!--                                                    type="text"-->
<!--                                                    id="orangeForm-sdt"-->
<!--                                                    name="sdt"-->
<!--                                                    class="form-control black-text"-->
<!--                                            />-->
<!--                                            <label for="orangeForm-sdt">Số Điện Thoại</label>-->
<!--                                        </div>-->
<!--                                        <div>-->
<!--                                            <p id="tbsdt" class="error"></p>-->
<!--                                        </div>-->
<!---->
<!---->
<!--                                        <div class="md-form">-->
<!--                                            <i class="fas fa-home prefix blue-text"></i>-->
<!--                                            <input-->
<!--                                                    type="text"-->
<!--                                                    id="orangeForm-dc"-->
<!--                                                    name="dc"-->
<!--                                                    class="form-control black-text"-->
<!--                                            />-->
<!--                                            <label for="orangeForm-dc">Địa chỉ</label>-->
<!--                                        </div>-->
<!--                                        <div>-->
<!--                                            <p id="tbdc" class="error"></p>-->
<!--                                        </div>-->
<!---->

                                        <div class="md-form">
                                            <i class="fas fa-lock prefix blue-text"></i>
                                            <input
                                                    onkeyup="return passwordChanged();"
                                                    type="text"
                                                    id="password"
                                                    name="password"
                                                    class="form-control black-text"
                                            />
                                            <label for="orangeForm-pass">Mật khẩu</label>
                                        </div>
                                        <div>
                                            <p id="tbmk" class="error"></p>
                                        </div>

                                        <span id="strength">Vui lòng nhập mật khẩu ít nhất 6     ký tự!</span>

                                        <br>


                                        <div class="text-center">
                                            <button
                                                    class="btn btn-outline-light-blue btn-rounded btn-block my-4 waves-effect z-depth-0"
                                                    type="submit">
                                                Đăng ký
                                            </button>
                                        </div>


                                    </div>
                                </div>
                            </form>
                            <!-- Form with header -->
                        </div>
                    </section>
                </div>
            </div>

            <!-- Add to Cart -->
        </div>

    </section>
    <!-- Section: Product detail -->

</div>
<!-- Main Container -->

<!-- Footer  -->
<footer class="page-footer pt-0 mt-5">

    <!-- Copyright  -->
    <div class="footer-copyright py-3 text-center">
        <div class="container-fluid">
            © Nhà Sách Trực Tuyến HIRAKI: <a href="#" target="_blank"> HIRAKI.COM </a>

        </div>
    </div>
    <!-- Copyright  -->

</footer>
<!-- Footer  -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>

<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../js/popper.min.js"></script>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="../js/mdb.min.js"></script>

<script type="text/javascript">
    /* WOW.js init */
    new WOW().init();
    // SideNav Button Initialization

    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization

    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
    // Tooltips Initialization
    $(function () {

        $('[data-toggle="tooltip"]').tooltip()
    });
    // Material Select Initialization
    $(document).ready(function () {

        $('.mdb-select').material_select();
    });


    function Validate(){
        let tendangnhap=document.getElementById("orangeForm-name").value
        // let nsinh=document.getElementById("orangeForm-nsinh").value;
        // let gt=document.getElementById("orangeForm-gtinh").value;
        let emaildangnhap=document.getElementById("orangeForm-email").value;
        // let sdtdangnhap=document.getElementById("orangeForm-sdt").value;
        // let diachidangnhap=document.getElementById("orangeForm-dc").value;
        let matkhau=document.getElementById("password").value;
        let OK = true;
        if(tendangnhap===""&&emaildangnhap===""&&matkhau===""){
            alert("Hãy nhập đầy đủ thông tin!");
            OK = false;
        }

        if(tendangnhap===""){
            document.getElementById("tbten").innerHTML="Bạn chưa nhập họ tên";
            document.getElementById("tbten").style.color="red";
            OK= false;
        }
        else {
            document.getElementById("tbten").innerHTML="";
        }

        // if(nsinh===""){
        //     document.getElementById("tbns").innerHTML="Bạn chưa nhập ngày tháng năm sinh;
        //     document.getElementById("tbns").style.color="red";
        //     OK= false;
        // }
        // else {
        //     document.getElementById("tbns").innerHTML="";
        // }
        //
        // if(gt===""){
        //     document.getElementById("tbgt").innerHTML="Bạn chưa nhập giới tinh";
        //     document.getElementById("tbgt").style.color="red";
        //     OK= false;
        // }
        // else {
        //     document.getElementById("tbgt").innerHTML="";
        // }

        if(emaildangnhap===""){
            document.getElementById("tbemail").innerHTML="Bạn chưa nhập email";
            document.getElementById("tbemail").style.color="red";
            OK= false;
        }
        else {
            document.getElementById("tbemail").innerHTML="";
        }
        //
        // if(sdtdangnhap===""){
        //     document.getElementById("tbsdt").innerHTML="Bạn chưa nhập số điện thoại";
        //     document.getElementById("tbsdt").style.color="red";
        //     OK= false;
        // }
        // else {
        //     document.getElementById("tbsdt").innerHTML="";
        // }
        //
        // if(diachidangnhap===""){
        //     document.getElementById("tbdc").innerHTML="Bạn chưa nhập địa chỉ";
        //     document.getElementById("tbdc").style.color="red";
        //     OK= false;
        // }
        // else {
        //     document.getElementById("tbdc").innerHTML="";
        // }

        if(matkhau===""){
            document.getElementById("tbmk").innerHTML="Bạn chưa nhập mật khẩu";
            document.getElementById("tbmk").style.color="red"
            OK= false;
        }
        else {
            document.getElementById("tbmk").innerHTML="";
        }
        return OK;
    }

    function passwordChanged() {
        var strength = document.getElementById('strength');
        var strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");
        var pwd = document.getElementById("password");
        if (pwd.value.length == 0) {
            strength.innerHTML = 'Nhập mật khẩu';
        } else if (false == enoughRegex.test(pwd.value)) {
            strength.innerHTML = 'Nhập thêm ký tự để mật khẩu an toàn hơn!';
        } else if (strongRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:green">Mật khẩu mạnh!</span>';
        } else if (mediumRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:orange">Mật khẩu trung bình!</span>';
        } else {
            strength.innerHTML = '<span style="color:red">Mật khẩu yếu!</span>';
        }
    }


</script>



</body>

</html>
