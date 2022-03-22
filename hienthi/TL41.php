<?php
require "../db.php";
$sql41 =" select * from sach as a join theloaisach as b on a.idtheloai=b.idtheloai  where b.idtheloai='41'";
$rs41= mysqli_query($conn,$sql41);
//var_dump($row);

//$rs = $conn->query("SELECT * FROM sach ");
require_once "../khachhang/sanpham/csdl_function.php";
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> TRANG CHỦ </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href=" https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../MDB-ecommerce-Templates-Pack_4.8.11/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../MDB-ecommerce-Templates-Pack_4.8.11/css/mdb.min.css" rel="stylesheet">
    <!--    link font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
    <!--    font2-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39+Text&display=swap" rel="stylesheet">
    <style type="text/css">
        .multiple-select-dropdown li [type=checkbox] + label {

            height: 1rem;
        }
    </style>

</head>

<body class="category-v2 hidden-sn white-skin animated">


<!-- Navigation-->
<header>



</header>
<!-- Navigation-->

<!-- Main Container-->
<div class="container mt-5 pt-3">

    <?php require "navbar.php"; ?>

    <div class="row pt-4" style="margin-bottom: 5em;">

        <!-- Content-->
        <div class="col-md-12">

            <!-- slide anh -->
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../image/nen.png" alt="First slide"  style="height:30em ;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/nen1.png" alt="Second slide" style="height:30em ;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/nen2.png" alt="Third slide" style="height:30em ;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/nen3.png"  alt="Third slide" style="height:30em ;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/nen5.png"  alt="Third slide" style="height:30em ;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../image/nen7.png"  alt="Third slide" style="height:30em ;">
                    </div>
                    <!--                    <div class="carousel-item">-->
                    <!--                        <img class="d-block w-100" src="image/8.jpg"  alt="Third slide" style="height:30em ;">-->
                    <!--                    </div>-->
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!-- end slide anh -->

        </div>
        <!-- Content-->

    </div>


    <!-- Grid row san pham 13-->
    <h1>Danh sách sản phẩm</h1>
    <div class="row mt-5 mb-5 pt-5 pb-5">

        <?php
        //        if ($rs13->num_rows) {
        while ($row41 = mysqli_fetch_assoc($rs41)) {
            $linkhinh = "http://localhost/CT466/img/bookimg/" . $row41['hinhanh'];
            echo '
      
            <div class="col-lg-4 mt-4 mb-4">
                    <!-- Card -->
                    <div class="card">

                        <!-- Card image -->
                        <div class="view overlay"  title='.$row41['tensach'].'>

                                    <img src='. $linkhinh.' alt="Hình Ảnh Sách" style="width: 330px; height: 350px; margin: 1em auto; padding-top: 1em;">

                            <a href="http://localhost/CT466/khachhang/sanpham/hienthisp.php?idsach=' . $row41['idsach'] . ' " 
                                title='.$row41['tensach'].' />
                                <div class="mask rgba-white-slight"></div>
                            </a>

                        </div>
                        <!-- Card image -->

                        <!-- Card content -->
                        <div class="card-body" style="height: 5em;">
                            <!-- Category & Title tensach-->
                            <h5 class="card-title mb-1">
                                <strong>
                                    <a href="http://localhost/CT466/khachhang/sanpham/hienthisp.php?idsach=' . $row41['idsach'] . ' " 
                                        class="dark-grey-text font-small font-weight-bolder"  />' . $row41['tensach'] . '</a>
                                </strong>
                            </h5>
                          <!-- Category & Title ten sach-->
                        </div>
                        <!-- Card content -->
                        
                        <!-- Card footer gia-->
                            <div class="card-footer pb-0">

                                <div class="row mb-0">

                                    <span class="float-left m-1 center-element text-info"><strong>'. number_format($row41["gia"]) .' đ</strong></span>
                                
                                </div>

                            </div>
                        <!-- Card footer gia-->
                    </div>
                    <!-- Card -->
              </div>
       
                    ';
        }
        //        }

        ?>
        <!--    <span class=" float-right m-2">-->
        <!--       <a data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng" href="khachhang/sanpham/giohang.php?id= '.$row['idsach'].' ">-->
        <!--            <i class="fas fa-shopping-cart ml-1 blue-text"></i>-->
        <!--       </a> -->
        <!--    </span>-->

        <!--    </div>-->
    </div>
    <!-- Grid row san pham 13-->

</div>

<!-- Main Container-->

<!--</main>-->
<!--stylish-color-dark => trong footer class= page-footer ..-->
<!-- Footer-->
<?php require "footer.php";?>
<!-- Footer-->

<!-- SCRIPTS-->
<!-- JQuery-->
<script type="text/javascript" src="../MDB-ecommerce-Templates-Pack_4.8.11/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips-->
<script type="text/javascript" src="../MDB-ecommerce-Templates-Pack_4.8.11/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script type="text/javascript" src="../MDB-ecommerce-Templates-Pack_4.8.11/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript-->
<script type="text/javascript" src="../MDB-ecommerce-Templates-Pack_4.8.11/js/mdb.min.js"></script>
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






