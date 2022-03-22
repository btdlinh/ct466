<?php
require "../../db.php";
/// luôn luôn có
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else exit();



// tác giả
$sql2 = "SELECT * FROM admin ";
$result2 = $conn->query($sql2);
// tác giả

// lấy idad muốn sửa
$id = $_GET['id'];
$sql4 = "SELECT * FROM admin WHERE id= $id";

$result4=$conn->query($sql4);
if( $result4->num_rows!=0){
    $row4 = $result4->fetch_assoc();
}
// lấy idad muốn sửa

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sửa Tác Giả</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../css/mdb.min.css" rel="stylesheet">
    <!--    link font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">


    <!-- Your custom styles (optional) -->
    <style></style>
</head>

<body class="login-page">

<?php
//    echo "<form action=\"xulysuatacgia.php?idsach=".$id."\" method=\"POST\" enctype=\"multipart/form-data\">";

echo "<form action=\"xulysuaadmin.php?id=".$id."\" method=\"POST\" enctype=\"multipart/form-data\">";
?>

<!-- Main Navigation -->
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

                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/CT466/admin/thongtintaikhoan.php">Tài Khoản Của Tôi</a>
                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/CT466/admin/dk.php">Đăng Ký</a>
                            <a class="dropdown-item waves-effect waves-light" href="http://localhost/CT466/admin/xulydangxuat.php">Đăng Xuất</a>

                            <!--                            <a class="dropdown-item waves-effect waves-light" href="#"></a>-->

                        </div>

                    </li>

                </ul>

            </div>

        </div>

    </nav>
    <!-- Navbar -->
    <!--background-->
    <!-- Section: Inputs -->
    <section class="section card mb-5 align-items-center " style="width: 60% ;margin: auto;">
        <!--        <form  action="xulysuatacgia.php" method="POST" onsubmit="return Validate()">-->
        <div class="card-body black-text" >

            <!-- Section heading -->
            <h1 class="text-center my-5 h1" style="padding-top: 1.5em;">Cập Nhật Thông Tin </h1>
            <div style="width: 100%; margin-left: 2.5em;"> <!--canh giữa form-->
                <h5 class="pb-5">Nhập Thông Tin Admin</h5>

                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-10">
                        <div class="md-form">
                            <input
                                type="text"
                                id="form2"
                                class="form-control form-control-sm black-text"
                                name="ten"
                                value="<?php echo $row4['ten']?>"
                            />
                            <label for="form2" class="orangeForm-name black-text"> Họ Tên</label>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-10">
                        <div class="md-form">
                            <input
                                type="text"
                                id="form3"
                                class="form-control form-control-sm black-text"
                                name="email"
                                value="<?php echo $row4['email']?>"
                            />
                            <label for="form3" class="orangeForm-name black-text"> Email </label>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-10">
                        <div class="md-form">
                            <input
                                type="text"
                                id="form4"
                                class="form-control form-control-sm black-text"
                                name="diachi"
                                value="<?php echo $row4['diachi']?>"
                            />
                            <label for="form4" class="orangeForm-name black-text"> Địa Chỉ</label>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-10">
                        <div class="md-form">
                            <input
                                type="text"
                                id="form5"
                                class="form-control form-control-sm black-text"
                                name="sdt"
                                value="<?php echo $row4['sdt']?>"
                            />
                            <label for="form5" class="orangeForm-name black-text"> Số Điện Thoại</label>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
<!--                    <div class="col-md-10">-->
<!--                        <div class="md-form">-->
<!--                            <input-->
<!--                                    type="date"-->
<!--                                    id="date"-->
<!--                                    class="form-control form-control-sm black-text"-->
<!--                                    name="ns"-->
<!--                                    value="--><?php //echo $row4['ngaysinh']?><!--"-->
<!--                            />-->
<!--                            <label for="date" > Ngày Sinh</label>-->
<!---->
<!---->
<!--                        </div>-->
<!--                    </div>-->
                    <!-- Grid column -->


                </div>
                <!-- Grid column -->
                <button class="btn btn-outline-light-blue btn-rounded btn-block my-4 waves-effect z-depth-0 "
                        type="submit"
                        style="width: 75%; margin: 0 auto;">
                    Lưu Lại
                </button>
            </div>
            <!--        </form>-->
            <!--background-->
    </section>
</header>
<!-- Main Navigation -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../js/mdb.js"></script>

<!-- Custom scripts -->
<script>
    // new WOW().init();

    function Validate(){
        let masach=document.getElementById("orangeForm-id").value;
        let tensach=document.getElementById("orangeForm-name").value;
        let gia=document.getElementById("orangeForm-price").value;
        let OK = true;
        if(masach ===""&&tensach===""&&gia===""){
            alert("Hãy nhập đầy đủ thông tin!");
            OK = false;
        }

        if(masach===""){
            document.getElementById("tbmasach").innerHTML="Bạn chưa nhập họ tên";
            document.getElementById("tbmasach").style.color="red";
            OK= false;
        }
        else {
            document.getElementById("tbmasach").innerHTML="";
        }

        if(tensach=== ""){
            document.getElementById("tbten").innerHTML="Bạn chưa nhập email";
            document.getElementById("tbten").style.color="red";
            OK= false;
        }
        else {
            document.getElementById("tbten").innerHTML="";
        }

        if(gia===""){
            document.getElementById("tbgia").innerHTML="Bạn chưa nhập mật khẩu";
            document.getElementById("tbgia").style.color="red"
            OK= false;
        }
        else {
            document.getElementById("tbgia").innerHTML="";
        }
        return OK;
    }

</script>

</body>

</html>
