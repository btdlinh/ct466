<?php
require "../../db.php";
/// luôn luôn có
session_start();
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();



// tác giả
$sql2 = "SELECT * FROM tac_gia ";
$result2 = $conn->query($sql2);
// tác giả

// lấy idtgmuốn sửa
$idtacgia = $_GET['idtacgia'];
$sql4 = "SELECT * FROM tac_gia WHERE tg_id= $idtacgia";

$result4=$conn->query($sql4);
if( $result4->num_rows!=0){
    $row4 = $result4->fetch_assoc();
}
// lấy idtg muốn sửa

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

echo "<form action=\"xulysuatacgia.php?idtacgia=".$idtacgia."\" method=\"POST\" enctype=\"multipart/form-data\">";
?>

<!-- Main Navigation -->
<header>
    <?php
    require "../header.php";
    ?>
    <!-- Navbar -->
<!--    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background: rgba(2,2,2,0.9)">-->
<!--        <div class="container">-->
<!--            <a class="navbar-brand white-text" style="font-family: 'Monoton', cursive" href="#"><strong> HIRAKI </strong></a>-->
<!--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"-->
<!--                    aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                <span class="navbar-toggler-icon"></span>-->
<!--            </button>-->
<!--            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">-->
<!--                <ul class="navbar-nav mr-auto">-->
<!--                    <li class="nav-item active">-->
<!--                        <a class="nav-link white-text" href="#"> <i class="fas fa-home"></i> Trang Chủ</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link white-text" href="#"><i class="far fa-bell"></i> Thông Báo</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link white-text" href="#"><i class="fas fa-cart-plus"></i> Giỏ Hàng</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--                <form class="form-inline ">-->
<!--                    <div class="md-form my-0" >-->
<!--                        <i class="fas fa-search white-text">-->
<!--                            <input class="form-control mr-sm-2 white-text" type="text" placeholder="Tìm Kiếm..." aria-label="Search"> </i>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </nav>-->
    <!-- Navbar -->
    <!--background-->
    <!-- Section: Inputs -->
    <section class="section card mb-5 align-items-center " style="width: 60% ;margin: auto;">
<!--        <form  action="xulysuatacgia.php" method="POST" onsubmit="return Validate()">-->
            <div class="card-body black-text" >

                <!-- Section heading -->
                <h1 class="text-center my-5 h1" style="padding-top: 1.5em;">Cập Nhật Tác Giả</h1>
                <div style="width: 100%; margin-left: 2.5em;"> <!--canh giữa form-->
                    <h5 class="pb-5">Nhập Thông Tác Giả</h5>

                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-10">
                            <div class="md-form">
                                <input
                                    type="text"
                                    id="form2"
                                    class="form-control form-control-sm black-text"
                                    name="tentacgia"
                                    value="<?php echo $row4['tg_hoten']?>"
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
                                    id="form4"
                                    class="form-control form-control-sm black-text"
                                    name="diachitacgia"
                                    value="<?php echo $row4['tg_diachi']?>"
                                />
                                <label for="form4" class="orangeForm-name black-text"> Địa Chỉ</label>
                            </div>
                        </div>
                        <!-- Grid column -->

                </div>
                    <!-- Grid column -->
                    <button class="btn btn-outline-light-blue btn-rounded btn-block my-4 waves-effect z-depth-0 "
                            type="submit"
                            style="width: 75%; margin: 0 auto;">
                        Lưu Lại
                    </button>
<!--                    <hr class="mt-4">-->
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
