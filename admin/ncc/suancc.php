<!--sua sach-->
<?php
require "../../db.php";
/// luôn luôn có
session_start();
//    if (isset($_SESSION['email'])) {
//        $email = $_SESSION['email'];
//    } else exit();


// nxb
$sql2 = "SELECT * FROM nha_cung_cap ";
$result2 = $conn->query($sql2);
// nxb

// lấy idsach muốn sửa
$idncc = $_GET['idncc'];
$sql4 = "SELECT * FROM nha_cung_cap WHERE ncc_id=$idncc";

$result4=$conn->query($sql4);
if( $result4->num_rows!=0){
    $row4 = $result4->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cập Nhật NCC</title>
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

<body class="login-page" >

<?php
//require "../../UI/adheader.php";

require "../header.php";

?>
<section class="section card mb-5 align-itemsocation:dangnhap.ht-center " style="width: 60% ;margin:0 auto">
    <?php
    //    echo "<form action=\"xulysuanxb.php?idsach=".$id."\" method=\"POST\" enctype=\"multipart/form-data\">";

    echo "<form action=\"xulysuancc.php?idncc=".$idncc."\" method=\"POST\" enctype=\"multipart/form-data\">";
    ?>
    <!--<form method="POST" onsubmit="return Validate()" enctype="multipart/form-data">-->
    <div class="card-body black-text">
        <!-- Section heading -->
        <h1 class="text-center my-5 h1" style="padding-top: 1.5em;">Cập Nhật Thông Tin Nhà Cung Cấp</h1>
        <div style="width: 100%; margin-left: 2.5em;"> <!--canh giữa form-->
            <!--            <h5 class="pb-5">Nhập Thông Nhà Xuất Bản</h5>-->

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-10">

                    <div class="md-form">
                        <input type="text"
                               id="form1"
                               class="form-control form-control-sm black-text"
                               name="tenncc"
                               value="<?php echo $row4['ncc_ten']?>"
                        />
                        <label for="form1" class="orangeForm-name black-text"> Tên Nhà Xuất Bản</label>
                    </div>

                    <div>
                        <p id="tbtensach" class="error"></p>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->


                <!-- Grid column -->
                <div class="col-md-10">

                    <div class="md-form">
                        <input type="text"
                               id="form3"
                               class="form-control form-control-sm black-text"
                               name="sdt"
                               value="<?php echo $row4['ncc_sdt']?>"

                        />
                        <label for="form3" class="orangeForm-price black-text "> Số Điện Thoại</label>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-10">

                    <div class="md-form">
                        <input type="text"
                               id="form4"
                               class="form-control form-control-sm black-text"
                               name="diachincc"
                               value="<?php echo $row4['ncc_diachi']?>"

                        />
                        <label for="form4" class="orangeForm-price black-text "> Địa Chỉ</label>
                    </div>

                    <!--                            <div>-->
                    <!--                                <p id="tbgia" class="error"></p>-->
                    <!--                            </div>-->

                </div>
                <!-- Grid column -->

            </div>

            <!-- Grid column -->
            <button class="btn btn-outline-light-blue btn-rounded btn-block my-4 waves-effect z-depth-0 " type="submit" style="width: 75%; margin: 0 auto;">
                Lưu Lại
            </button>
        </div>
    </div>
    </form>
    <!--background-->
</section>

<!-- Main Navigation -->

<!-- Footer-->
<footer class="page-footer text-center text-md-left stylish-color-dark pt-0">

    <!-- Copyright-->
    <div class="footer-copyright py-3 text-center">

        <div class="container-fluid">

            © 2013 Nhà Sách Trực tuyến: <a href="https://www.MDBootstrap.com"><strong> Hiraki.com</strong></a>

        </div>

    </div>
    <!-- Copyright-->

</footer>
<!-- Footer-->

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
    // cai khúc nay t chu làm t de choi á
    function Validate() {
        let masach = document.getElementById("orangeForm-id").value;
        let tensach = document.getElementById("orangeForm-name").value;
        let gia = document.getElementById("orangeForm-price").value;
        let OK = true;
        if (masach === "" && tensach === "" && gia === "") {
            alert("Hãy nhập đầy đủ thông tin!");
            OK = false;
        }

        if (masach === "") {
            document.getElementById("tbmasach").innerHTML = "Bạn chưa nhập họ tên";
            document.getElementById("tbmasach").style.color = "red";
            OK = false;
        } else {
            document.getElementById("tbmasach").innerHTML = "";
        }

        if (tensach === "") {
            document.getElementById("tbten").innerHTML = "Bạn chưa nhập email";
            document.getElementById("tbten").style.color = "red";
            OK = false;
        } else {
            document.getElementById("tbten").innerHTML = "";
        }

        if (gia === "") {
            document.getElementById("tbgia").innerHTML = "Bạn chưa nhập mật khẩu";
            document.getElementById("tbgia").style.color = "red"
            OK = false;
        } else {
            document.getElementById("tbgia").innerHTML = "";
        }
        return OK;
    }

</script>

</body>

</html>

