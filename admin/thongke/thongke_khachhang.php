<?php
require('../../db.php');

// SL khach hang -----------------------------------------------------------------------------------


//$sqlSoLuongKhachHang = "select count(*) as SoLuong from `khachhang`";
//$result = mysqli_query($conn, $sqlSoLuongKhachHang);

// tạo 1 mảng array để chứa các dữ liệu được trả về
//$dataSoLuongKhachHang = [];
//while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
//
//
//{
//
//    echo $row['SoLuong'];
//    $dataSoLuongKhachHang[] = array(
//        'SoLuongKhachHang' => $row['SoLuong']
//    );
//}

// Dữ liệu JSON, từ array PHP -> JSON
//echo json_encode($dataSoLuongKhachHang[0])."<br>";


// SL don dat hang -----------------------------------------------------------------------------------


//$sqlSoLuongSanPham = "select count(*) as SoLuong from `dondathang`";
//$result = mysqli_query($conn, $sqlSoLuongSanPham);

// tạo 1 mảng array để chứa các dữ liệu được trả về
//$dataSoLuongSanPham = [];
//while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
//{
//    $dataSoLuongSanPham[] = array(
//        'SoLuongDonDatHang' => $row['SoLuong']
//    );
//}

//  Chuyển đổi dữ liệu về định dạng JSON
// Dữ liệu JSON, từ array PHP -> JSON
//echo json_encode($dataSoLuongSanPham[0])."<br>";


// Thong ke the loai sach -----------------------------------------------------------------------------------


//$sqlloai = " SELECT lsp.tentheloai, COUNT(*) AS SoLuong
//    FROM `sach` sp
//    JOIN `theloaisach` lsp ON sp.idtheloai = lsp.idtheloai
//    GROUP BY sp.idsach";
//$resultloai = mysqli_query($conn, $sqlloai);
//
//$dataloai = [];
//while($rowloai = mysqli_fetch_array($resultloai))
//{
//    $dataloai[] = array(
//        'TenLoaiSanPham' => $rowloai['tentheloai'],
//        'SoLuong' => $rowloai['SoLuong']
//    );
//}

//echo json_encode($dataloai);
?>

<?php
$query1 = "select count(iddon) from dondathang  ";
$rs1 = mysqli_query($conn,$query1);
$row1 = mysqli_fetch_row($rs1);
//print_r($row1[0]);

$query2 = "select count(idkh) from khachhang  ";
$rs2 = mysqli_query($conn,$query2);
$row2 = mysqli_fetch_row($rs2);
//print_r($row2[0]);

$query3 = "select count(idsach) from sach  ";
$rs3 = mysqli_query($conn,$query3);
$row3 = mysqli_fetch_row($rs3);
//print_r($row3[0]);

$query4 = "select count(stt) from kh_lienhe  ";
$rs4 = mysqli_query($conn,$query4);
$row4 = mysqli_fetch_row($rs4);
//print_r($row4[0]);

$query5 = "select sum(giasp) from dondathang  ";
$rs5 = mysqli_query($conn,$query5);
$row5 = mysqli_fetch_row($rs5);
//print_r($row5[0]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="../../css/mdb.min.css">

    <!-- Your custom styles (optional) -->
    <style>

    </style>
</head>

<body class="fixed-sn white-skin">


<!-- Main layout -->
  <main>

    <div class="container-fluid">

      <!-- Section: Button icon -->
      <section>

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card">

              <!-- Card Data -->
              <div class="row mt-3">

                <div class="col-md-5 col-5 text-left pl-4">

                  <a type="button" class="btn-floating btn-lg primary-color ml-4">
<!--                      <i class="far fa-book" aria-hidden="true"></i>-->
                      <i class="fas fa-book"></i>
                  </a>

                </div>

                <div class="col-md-7 col-7 text-right pr-5">

                  <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row3[0]); ?> </h5>

                  <p class="font-small grey-text">Số Lượng Sách</p>
                </div>

              </div>
              <!-- Card Data -->

              <!-- Card content -->
              <div class="row my-3">

                <div class="col-md-7 col-7 text-left pl-4">

                  <p class="font-small font-up ml-4 font-weight-bold">Sách</p>

                </div>

                <div class="col-md-5 col-5 text-right pr-5">

<!--                  <p class="font-small grey-text">145,567</p>-->
                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card">

              <!-- Card Data -->
              <div class="row mt-3">

                <div class="col-md-5 col-5 text-left pl-4">

                  <a type="button" class="btn-floating btn-lg warning-color ml-4"><i class="fas fa-user"
                      aria-hidden="true"></i></a>

                </div>

                <div class="col-md-7 col-7 text-right pr-5">

                  <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row2[0]); ?> </h5>
                  <p class="font-small grey-text">Tổng khách hàng</p>

                </div>

              </div>
              <!-- Card Data -->

              <!-- Card content -->
              <div class="row my-3">

                <div class="col-md-7 col-7 text-left pl-4">
                  <p class="font-small font-up ml-4 font-weight-bold">Khách Hàng</p>
                </div>

<!--                <div class="col-md-5 col-5 text-right pr-5">-->
<!--                  <p class="font-small grey-text">145,567</p>-->
<!--                </div>-->

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column khtv-->
          <div class="col-xl-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card">

              <!-- Card Data -->
              <div class="row mt-3">

                <div class="col-md-5 col-5 text-left pl-4">
                    <a type="button" class="btn-floating btn-lg success-color ml-4">
<!--                        <i class="fas fa-user" aria-hidden="true"></i>-->
                        <i class="far fa-user"></i>
                    </a>
                </div>

                <div class="col-md-7 col-7 text-right pr-5">
                  <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row4[0]); ?></h5>
                  <p class="font-small grey-text">Khách hàng</p>
                </div>

              </div>
              <!-- Card Data -->

              <!-- Card content -->
              <div class="row my-3">

                <!-- Grid column -->
                <div class="col-md-9 col-7 text-left pl-4">
                  <p class="font-small font-up ml-4 font-weight-bold">Khách hàng cần tư vấn</p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-5 col-5 text-right pr-5">
<!--                  <p class="font-small grey-text">145,567</p>-->
                </div>
                <!-- Grid column -->

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column khtv-->


            <!-- Grid column tong tien-->
            <div class="col-xl-3 col-md-6 mb-4">

                <!-- Card -->
                <div class="card">

                    <!-- Card Data -->
                    <div class="row mt-3">

                        <div class="col-md-5 col-5 text-left pl-4">
                            <a type="button" class="btn-floating btn-lg light-blue lighten-1 ml-4"><i class="fas fa-dollar-sign"
                                                                                                      aria-hidden="true"></i></a>
                        </div>

                        <div class="col-md-7 col-7 text-right pr-5">
                            <h5 class=" mt-4 mb-2 font-weight-bold"><?php print_r(number_format($row5[0])); ?></h5>
                            <p class="font-small grey-text">VNĐ</p>
                        </div>

                    </div>
                    <!-- Card Data -->

                    <!-- Card content -->
                    <div class="row my-3">

                        <!-- Grid column -->
                        <div class="col-md-9 col-7 text-left pl-4">
                            <p class="font-small font-up ml-4 font-weight-bold">Tổng doanh thu</p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-5 col-5 text-right pr-5">
                            <!--                  <p class="font-small grey-text">145,567</p>-->
                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Card content -->

                </div>
                <!-- Card -->

            </div>
            <!-- Grid column tong tien-->


          <!-- Grid column -->
          <div class="col-xl-3 col-md-6 mb-4">

            <!-- Card -->
            <div class="card">

              <!-- Card Data -->
              <div class="row mt-3">

                <div class="col-md-5 col-5 text-left pl-4">
                  <a type="button" class="btn-floating btn-lg red accent-2 ml-4"><i class="fas fa-database"
                      aria-hidden="true"></i></a>
                </div>

                <div class="col-md-7 col-7 text-right pr-5">
                  <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php print_r($row1[0]); ?></h5>
                  <p class="font-small grey-text">Tổng đơn hàng</p>
                </div>

              </div>
              <!-- Card Data -->

              <!-- Card content -->
              <div class="row my-3">

                <div class="col-md-9 col-7 text-left pl-4">
                  <p class="font-small font-up ml-4 font-weight-bold">Đơn đặt hàng</p>
                </div>

                <div class="col-md-5 col-5 text-right pr-5">
<!--                  <p class="font-small grey-text">--><?php //print_r($row1[0]); ?><!--</p>-->
                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Button icon -->
</div>
</main>
<!-- Main layout -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script src="../../js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../js/mdb.min.js"></script>
<!-- Initializations -->
<script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    // Small chart
    $(function () {
        $('.min-chart#chart-sales').easyPieChart({
            barColor: "#4285F4",
            onStep: function (from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
    });



    //bar
    var ctxB = document.getElementById("barChart").getContext('2d');
    var myBarChart = new Chart(ctxB, {
        type: 'bar',
        data: {
            labels: ["January", "Febuary", "March", "April", "May"],
            datasets: [{
                label: '# of Votes',
                data: [13, 19, 8, 11, 5],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.3)',
                    'rgba(41, 182, 246, 0.3)',
                    'rgba(255, 187, 51, 0.3)',
                    'rgba(66, 133, 244, 0.3)',
                    'rgba(153, 102, 255, 0.3)',

                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(41, 182, 246, 1)',
                    'rgba(255, 187, 51, 1)',
                    'rgba(66, 133, 244, 1)',
                    'rgba(153, 102, 255, 1)',

                ],
                borderWidth: 2
            }]
        },
        optionss: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    $('#dark-mode').on('click', function (e) {

        e.preventDefault();
        $('footer').toggleClass('mdb-color lighten-4 dark-card-admin');
        $('body, .navbar').toggleClass('white-skin navy-blue-skin');
        $(this).toggleClass('white text-dark btn-outline-black');
        $('body').toggleClass('dark-bg-admin');
        $('.card').toggleClass('dark-card-admin');
        $('h6, .card, p, td, th, i, li a, h4, input, label').not(
            '#slide-out i, #slide-out a, .dropdown-item i, .dropdown-item').toggleClass('text-white');
        $('.btn-dash').toggleClass('grey blue').toggleClass('lighten-3 darken-3');
        $('.gradient-card-header').toggleClass('white dark-card-admin');

        if ($('.navbar').hasClass('navy-blue-skin')) {
            for (let i = 0; i <= 5; i++) {
                myBarChart.data.datasets[0].data[i] = (Math.random(i) * 100);
            }

            Chart.defaults.global.defaultFontColor = '#fff';
        } else {

            for (let i = 0; i <= 5; i++) {
                myBarChart.data.datasets[0].data[i] = (Math.random(i) * 100);
            }

            Chart.defaults.global.defaultFontColor = '#666';
        }

        myBarChart.update();

    });

</script>

</body>
</html>