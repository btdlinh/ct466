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
        <title>Chính sách đổi trả - hoàn tiền</title>
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
                    <a href="http://localhost/CT466" class="btn btn-primary btn-lg"> Ghé thăm Hiraki <i class="fa fa-forward" aria-hidden="true"> </i></a>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col col-md-12">
                <div class="block_rule" id="thele">
                    <div class="block_rule_title">
                        <div class="block_rule_content">
                            <ui class="block_rule_content_list" style="font-size: 16px">
                                <p><span style="font-size: x-large;"><strong>CHÍNH SÁCH ĐỔI TRẢ - HOÀN TIỀN</strong></span></p>
                                <p>Chúng tôi luôn trân trọng sự tin tưởng và ủng hộ của khách hàng khi đặt mua sản phẩm tại <strong>Hiraki.com</strong>. Do đó chúng tôi luôn cố gắng hoàn thiện dịch vụ tốt nhất phục vụ mọi nhu cầu mua sắm của quý khách.</p>
                                <p><strong>Hiraki.com</strong> chúng tôi luôn luôn cam kết tất cả các sản phẩm bán tại <strong>Hiraki.com</strong> 100% là những sản phẩm chất lượng và xuất xứ nguồn gốc rõ ràng, hợp pháp cũng như an toàn cho người tiêu dùng.</p>
                                <p>Để việc mua sắm của quý khách tại <strong>Hiraki.com</strong> là trải nghiệm dịch vụ thân thiện, chúng tôi hy vọng quý khách lúc nhận hàng kiểm tra kỹ lại:</p>

<!--                                <p><strong>1. Nội thành TP.HCM và Hà Nội</strong></p>-->
                                <p>- Số lượng.<br />- Tên sản phẩm và chất lượng sản phẩm. <br> - Thông tin sản phẩm, thông tin người nhận (Đối chiếu với thông tin trên phiếu giao hàng được bỏ trong hộp) trong lúc nhận hàng trước khi ký nhận và thanh toán tiền cho nhân viên giao nhận.</p>
                                <p><strong>Điều kiện đổi trả:</strong></p>
                                <p> <strong>Hiraki.com</strong> hỗ trợ đổi/ trả sản phẩm cho quý khách nếu:</p>
                                <p>- Sản phẩm còn nguyên bao bì như hiện trạng ban đầu.<br />- Sản phầm còn đầy đủ phụ kiện, quà tặng khuyến mãi kèm theo.<br>- Hóa đơn GTGT ( nếu có) </p>


                        </div>
                    </div>
                </div>
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
