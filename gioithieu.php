<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
    // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Giới thiệu</title>
        <!-- Font Awesome  -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
        <!-- Bootstrap core CSS  -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Material Design Bootstrap  -->
        <link rel="stylesheet" href="css/mdb.min.css">
        <!-- DataTables.net  -->
        <link rel="stylesheet" type="text/css" href="css/addons/datatables.min.css">
        <link rel="stylesheet" href="css/addons/datatables-select.min.css">

        <!-- Your custom styles (optional)  -->
        <style></style>

    </head>



    <style>
        .homepage-slider-img {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }
    </style>
</head>

<body class="d-flex flex-column h-100 white">
<!-- header -->

<!-- Navigation-->
<header>

    <!-- Navbar ngang-->
 <?php require "UI/adheader.php";?>
    <!-- Navbar ngang-->

</header>
<!-- Navigation-->

<!-- end header -->

<main role="main" class="mb-5 mt-5">
    <!-- Block content -->
    <div class="container mt-2 mt-5 pt-5">
        <h1 class="text-center mb-2">Nhà sách trực tuyến Hiraki</h1>
        <div class="row">
            <div class="col col-md-12">
                <h5 class="text-center">Mở rộng hiểu biết, kiến tạo tương lai. </h5>
                <h5 class="text-center">Cung cấp kiến thức giúp các bạn tự tin tìm hiểu, học tập trên con đường thành công của mình.</h5>
                <div class="text-center mt-2 mb-4">
                    <a href="http://localhost:8080/CT271" class="btn btn-primary btn-lg"> Ghé thăm Hiraki <i class="fa fa-forward" aria-hidden="true"> </i></a>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7894896334296!2d105.77301501441124!3d10.034222792827663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a08818d5ed6087%3A0xa42da7a0ac593de9!2zMTMzLzFCIFRy4bqnbiBIxrBuZyDEkOG6oW8sIEFuIFBow7osIE5pbmggS2nhu4F1LCBD4bqnbiBUaMahLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1635876801892!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
    <!-- End block content -->
</main>


<!-- Footer-->
<?php require "hienthi/footer.php";?>
<!-- Footer-->




<!-- SCRIPTS-->
<!-- JQuery-->
<script type="text/javascript" src="MDB-ecommerce-Templates-Pack_4.8.11/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips-->
<script type="text/javascript" src="MDB-ecommerce-Templates-Pack_4.8.11/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="MDB-ecommerce-Templates-Pack_4.8.11/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript-->
<script type="text/javascript" src="MDB-ecommerce-Templates-Pack_4.8.11/js/mdb.min.js"></script>
<script type="text/javascript">
    new WOW().init();
    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    let slider = $("#calculatorSlider");
    let reseller = $("#resellerEarnings");
    let client = $("#clientPrice");
    let percentageBonus = 30; // = 30%

    let license = {
        corpo: {
            active: true,
            price: 319,
        },
        dev: {
            active: false,
            price: 149,
        },
        priv: {
            active: false,
            price: 79,
        }
    };

    const calculate = (price, value) => {

        client.text((Math.round((price - (value / 100 * price)))) + '$');
        reseller.text((Math.round(((percentageBonus - value) / 100 * price))) + '$')
    }


    slider.on('input change', e => {

        if (license.priv.active) {

            calculate(license.priv.price, $(e.target).val());
        } else if (license.corpo.active) {

            calculate(license.corpo.price, $(e.target).val());
        } else if (license.dev.active) {

            calculate(license.dev.price, $(e.target).val());
        }
    })

    // Material Select Initialization
    $(document).ready(function () {

        $('.mdb-select').material_select();
    });

    // SideNav Initialization
    $(".button-collapse").sideNav();

</script>
</body>

</html>