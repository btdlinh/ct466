
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Đăng Ký Thành Viên</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!--    link font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39+Text&display=swap" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <style>
        html,
        body,
        header,
        .view {
            height: 100%;
        }
        @media (min-width: 560px) and (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view  {
                height: 650px;
            }
        }
    </style>
</head>

<body class="login-page">

<!-- Main Navigation -->
<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background: rgba(2,2,2,0.9)">
        <div class="container">
            <!--            <a href="#" class="pl-0"><img src="./image/logo.png" style="width: 80%;"></a>-->

            <!--            <a class="navbar-brand white-text" style="font-family: 'Monoton', cursive" href="#"><strong> HIRAKI </strong></a>-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
                    aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link white-text" href="http://localhost/CT466"> <i class="fas fa-home"></i><strong>Trang Chủ</strong></a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Intro Section -->
    <section class="view intro-2" style="background-image:url('image/nen7.png');">
        <div class="  h-100 d-flex justify-content-center align-items-center; ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

                        <form action="xulyotp.php" method="POST" onsubmit="return Validate()">


                            <div class="card wow fadeIn" data-wow-delay="0.3s" style="background:rgba(18,19,19,0.75); margin-top: 3em" >
                                <div class="card-body">

                                    <!--form-->

                                    <div class="md-form">
                                        <h1 class="logo"
                                            style="
                                            padding-top: 0.3em;
                                            color: rgba(55,132,187,0.85);
                                            text-align: center;
                                            font-size: 4em;
                                            font-family: 'Libre Barcode 39 Text', cursive;
                                            text-shadow: 2px 1px rgba(221,223,225,0.89)"
                                        >HIRAKI
                                        </h1>
                                        <p class="slogan" style="color: #ffffff; text-align: center; font-size: 1.4em">Tạo khoản của bạn</p>
                                    </div>

                                    <div class="md-form" >
                                        <i class="fas fa-user prefix white-text"></i>
                                        <input type="text" id="orangeForm-name" name="name" class="form-control white-text" required>
                                        <label for="orangeForm-name">Họ tên</label>
                                    </div>
                                    <div>
                                        <p id="tbten" class="error"></p>
                                    </div>

                                    <div class="md-form">
                                        <i class="fas fa-envelope prefix white-text"></i>
                                        <input type="text" id="orangeForm-email" name="email" class="form-control white-text" placeholder=" ... @gmail.com" required>
                                        <label for="orangeForm-email">Email</label>
                                    </div>

                                    <div>
                                        <p id="tbemail" class="error"></p>
                                    </div>

                                    <div>
                                        <p id="tbmk" class="error"></p>
                                    </div>

                                    <div class="text-center">

                                        <button class="btn btn-outline-light-blue btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Lấy mã OTP</button>
                                        <hr class="mt-4">

                                        <a href="dangnhap.php"> Đăng nhập</a>
                                        <div class="inline-ul text-center d-flex justify-content-center">
                                            <!--                                            <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-google-plus-g white-text"></i></a>-->
                                            <!--                                            <a class="p-2 m-2 fa-lg li-ic"><i class="fab fa-facebook white-text"></i></a>-->
                                            <!--                                            <a class="p-2 m-2 fa-lg ins-ic"><i class="fab fa-instagram white-text"> </i></a>-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <!-- Form with header -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro Section -->

</header>
<!-- Main Navigation -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.js"></script>

<!-- Custom scripts -->
<script>
    // new WOW().init();

    function Validate(){
        let tendangnhap=document.getElementById("orangeForm-name").value;
        let emaildangnhap=document.getElementById("orangeForm-email").value;
        // let matkhau=document.getElementById("orangeForm-pass").value;
        let OK = true;
        if(tendangnhap ===""&&emaildangnhap===""&&matkhau===""){
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

        if(emaildangnhap === ""){
            document.getElementById("tbemail").innerHTML="Bạn chưa nhập email";
            document.getElementById("tbemail").style.color="red";
            OK= false;
        }
        else {
            document.getElementById("tbemail").innerHTML="";
        }

        // if(matkhau===""){
        //     document.getElementById("tbmk").innerHTML="Bạn chưa nhập mật khẩu";
        //     document.getElementById("tbmk").style.color="red"
        //     OK= false;
        // }
        // else {
        //     document.getElementById("tbmk").innerHTML="";
        // }
        return OK;
    }

</script>

</body>

</html>

