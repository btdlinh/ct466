<?php
session_start();
$conn = new mysqli("localhost", "root", "", "ct466");
$conn->set_charset("utf8");
$error = '';
if(isset($_POST['emailkh'])&&isset($_POST['passkh'])){
    echo "fawffwaef";
    $email= $_POST["emailkh"];
    $pass= md5($_POST["passkh"]);
    echo

    $sql="SELECT * FROM khach_hang WHERE kh_email='$email'";

    $result = $conn->query($sql);
    //$row = $result -> fetch_assoc();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // dua cac toi tuong vua tim duoc thanh cac dong
        if($pass==$row['kh_matkhau']){ // so sanh mk vua nhap voi mk co trong csl=dl
    //      echo "Dang nhap thanh cong ^^";
            $_SESSION['kh_email']= $email;
            $_SESSION['kh_ten']= $row['kh_ten']; // dung tai khoan va mat khau
            header('location:index.php');
        }else  $error = 'Sai mật khẩu. Nhập lại!'; //sai password
    } else $error = 'Tài khoản không tồn tại!'; //tai khoan khong ton tai
}



$conn->close();
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Đăng Nhập</title>
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
    <!--    font2-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39+Text&display=swap" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <style>
        html,
        body,
        header,
        .view {
            height: 100%;
        }
        .in:active{
            background-color: transparent;
        }
        .in:valid{
            background-color: transparent;
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
            .view {
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
<!--            <a class="navbar-brand white-text" style="font-family: 'Monoton', cursive" href="#"><strong>-->
<!--                HIRAKI </strong></a>-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
                    aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link white-text" href="http://localhost/CT466"> <i class="fas fa-home"></i> Trang Chủ</a>
                    </li>
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link white-text" href="#"><i class="far fa-bell"></i> Thông Báo</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link white-text" href="#"><i class="fas fa-cart-plus"></i> Giỏ Hàng</a>-->
<!--                    </li>-->
                </ul>
<!--                <form class="form-inline ">-->
<!--                    <div class="md-form my-0">-->
<!--                        <i class="fas fa-search white-text">-->
<!--                            <input class="form-control mr-sm-2 white-text" type="text" placeholder="Tìm Kiếm..."-->
<!--                                   aria-label="Search"> </i>-->
<!--                    </div>-->
<!--                </form>-->
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Intro Section -->
    <section class="view intro-2" style="background-image:url('image/nen7.png');">
        <div class=" h-100 d-flex justify-content-center align-items-center; ">
            <div class="container">
                <!-- Form with header -->
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt">
                        <!--form-->
                        <form action="dangnhap.php" method="POST" onsubmit="return Validate()">

                            <!-- Form with header -->
                            <div class="card wow fadeIn" data-wow-delay="0.3s" style="background:rgba(18,19,19,0.75); margin-top: 8em" >
                                <div class="card-body">
                        <div class="md-form">
                            <!--                            font-family: 'Monoton', cursive;-->
                            <h1 class="logo"
                                style="
                                    padding-top: 0.3em;
                                    color: rgba(55,132,187,0.85);
                                    text-align: center;
                                    font-size: 4em;
                                    font-family: 'Libre Barcode 39 Text', cursive;
                                    text-shadow: 2px 1px rgba(221,223,225,0.89)">
                                HIRAKI
                            </h1>
                            <p class="slogan" style="color: #ffffff; text-align: center; font-size: 1.4em">Đăng nhập vào tài khoản của bạn</p>
                            <p class="slogan" style="color: red; text-align: center; font-size: 1.4em">
                                <?php
                                    if($error !=''){
                                        echo $error;
                                    }
                                    ?>
                            </p>
                        </div>

                        <div class="md-form">
                            <i class="fas fa-envelope prefix white-text"></i>
                            <input
                                    type="text"
                                    id="orangeForm-email"
                                    name="emailkh"
                                    class="form-control white-text in"
                                    placeholder=" ... @gmail.com"
                            />
                            <label for="orangeForm-email">Email</label>
                        </div>
                        <div>
                            <p id="tbemail" class="error"></p>
                        </div>
                        <div class="md-form">
                            <i class="fas fa-lock prefix white-text"></i>
                            <input
                                    type="password"
                                    id="orangeForm-pass"
                                    name="passkh"
                                    class="form-control white-text"
                            />
                            <label for="orangeForm-pass">Mật khẩu</label>
                        </div>
                        <div>
                            <p id="tbmk" class="error"></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-outline-light-blue btn-rounded btn-block my-4 waves-effect z-depth-0"
                                    type="submit">Đăng Nhập
                            </button>
                            <a href="dangky.php "> Tạo Tài Khoản Mới
                            </a>

                            <div class="inline-ul text-center d-flex justify-content-center mt-3">
<!--                                <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-google-plus-g white-text"></i></a>-->
<!--                                <a class="p-2 m-2 fa-lg li-ic"><i class="fab fa-facebook white-text"></i></a>-->
<!--                                <a class="p-2 m-2 fa-lg ins-ic"><i class="fab fa-instagram white-text"> </i></a>-->
                            </div>
                        </div>
                                </div>
                            </div>
                        </form>
                        <!--form-->
                    </div>
                </div>
                <!-- Form with header -->
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


    function Validate() {
        const emaildangnhap = document.getElementById("orangeForm-email").value;
        const matkhau = document.getElementById("orangeForm-pass").value;
        let OK = true;
        if (emaildangnhap === "" && matkhau === "") {
            alert("Hãy nhập email và mật khẩu!");
            OK = false;
        }

        if (emaildangnhap === "") {
            document.getElementById("tbemail").innerHTML = "Bạn chưa nhập email";
            document.getElementById("tbemail").style.color = "red";
            OK = false;
        } else {
            document.getElementById("tbemail").innerHTML = "";
        }

        if (matkhau === "") {
            document.getElementById("tbmk").innerHTML = "Bạn chưa nhập mật khẩu";
            document.getElementById("tbmk").style.color = "red"
            OK = false;
        } else {
            document.getElementById("tbmk").innerHTML = "";
        }
        return OK;
    }


</script>

</body>

</html>
