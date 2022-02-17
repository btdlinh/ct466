<!--viết tất cả code php trên đầu file-->

<?php

session_start();

require "../../db.php";

$sql11 = "SELECT * FROM sach  as s join theloaisach as t on s.idtheloai=t.idtheloai
                                       join tacgia as tg on s.idtacgia=tg.idtacgia
                                        join nhaxuatban as nxb on s.idnxb=nxb.idnxb
                                        join chitiet_dondathang as ct on s.idsach=ct.idsach
                                        join dondathang as a on a.iddon=ct.iddon
                                        join khachhang as b on b.idkh=a.idkh

                                        ";
$result11 = mysqli_query($conn,$sql11);

$data = [];
while ($row11 = mysqli_fetch_array($result11, MYSQLI_ASSOC)) {
    $data[] = array(
        'iddon' => $row11['iddon'],
        'tenkh' => $row11['tenkh'],
        'sdtkh' => $row11['sdtkh'],
        'TongThanhTien' => number_format($row11['gia'], 2, ".", ",") . ' vnđ',
    );
}

$sql1 = "SELECT * FROM dondathang ";

$result = mysqli_query($conn,$sql1);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh Sách Đơn Hàng</title>
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS  -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Material Design Bootstrap  -->
    <link rel="stylesheet" href="../../css/mdb.min.css">
    <!-- DataTables.net  -->
    <link rel="stylesheet" type="text/css" href="../../css/addons/datatables.min.css">
    <link rel="stylesheet" href="../../css/addons/datatables-select.min.css">

    <!-- Your custom styles (optional)  -->
    <style>

    </style>
</head>

<body class="fixed-sn white-skin white">

<!-- Main Navigation  -->
<header>

    <?php
    require "../headerindex.php";
    ?>

    <!-- Navbar  -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

        <!-- SideNav slide-out button  -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>

        <h2 class="text-center blue-grey-text font-weight-bold mb-4 ml-5 mt-3">
            Đơn Hàng
        </h2>
        <!-- Breadcrumb  -->
        <!--        <div class="breadcrumb-dn mr-auto">-->
        <!--            <p>Liệt Kê Sách</p>-->
        <!--        </div>-->

        <!-- Navbar links  -->
        <ul class="nav navbar-nav nav-flex-icons ml-auto">

            <!-- Dropdown  -->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user blue-text"></i> <span
                            class="clearfix d-none d-sm-inline-block">Tài Khoản</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="http://localhost:8080/CT271/admin/thongtin/thongtintaikhoan.php">Tài Khoản Của Tôi</a>
                    <a class="dropdown-item" href="http://localhost:8080/CT271/admin/xulydangxuat.php">Đăng Xuất</a>
                </div>
            </li>

        </ul>
        <!-- Navbar links  -->

    </nav>
    <!-- Navbar  -->

</header>
<!-- Main Navigation  -->
<!-- Main layout  -->

<main>
    <div class="container-fluid my-5">
        <!-- Section: Basic examples -->
        <section>
            <!-- Gird column -->
            <div class="col-md-12">
<!--                <h2 class="text-center blue-grey-text font-weight-bold mb-4">-->
<!--                    Đơn Hàng-->
<!--                </h2>-->
                <div class="card">
                    <div class="card-body">
                        <form action="" method="GET">
                            <table id="dtMaterialDesignExample" class="table" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="th-sm">Mã đơn</th>
                                    <!--                                <th class="th-sm">STT</th>-->
                                    <th class="th-sm">Khách hàng </th>
                                    <th class="th-sm">Nơi giao</th>
                                    <th class="th-sm">Ngày đặt</th>
                                    <th class="th-sm">Chi tiết</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if ($result->num_rows > 0 ) {
                                    $i = 1;
//                                    echo"<td>" . $row['iddon'] . "</td>";

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                 <td>" . $row['iddon'] . "</td>
                                                 <td>" . $row['emailkh'] ."<br>".$row['sdtkh'] . "</td>
                                                 <td>" . $row['diachikh'] . "</td>
                                                 <td>" . date('d/m/Y H:i:s', strtotime($row['ngaydat'])) . "</td>

                                                 
                                                 
                                             
                                                 
                                                <td>
                                                 <button type='button' class='btn btn-sm blue primary-color' title='Xem chi tiết'>
                                                 <a href=\"chitietdonhang.php?iddon=" . $row['iddon'] . "\"  >
                                                 <i class=\"fas fa-eye\"></i>
                                                 </a>
                                                 </button>
                                               
                                                </td>
                                             <td>" . $row['sdtkh'] . "</td>
                                               ";
                                        $i++;
                                    }
                                }
                                ?>

                                </tbody>
                            </table>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Gird column -->
        </section>
        <!-- Section: Basic examples -->
    </div>
</main>
<!-- Main layout -->

<!-- Main layout -->

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

<!-- SCRIPTS  -->
<!-- JQuery  -->
<script src="../../js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips  -->
<script type="text/javascript" src="../../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript  -->
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<!-- MDB core JavaScript  -->
<script type="text/javascript" src="../../js/mdb.min.js"></script>
<!-- DataTables  -->
<script type="text/javascript" src="../../js/addons/datatables.js"></script>
<!-- DataTables Select  -->
<script type="text/javascript" src="../../js/addons/datatables-select.min.js"></script>
<!--Custom scripts -->
<script type="text/javascript" src="../../js/modules/material-select.js"></script>

<script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    let container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });


    $('#dtMaterialDesignExample').DataTable();
    $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
        $(this).parent().append($(this).children());
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
        const $this = $(this);
        $this.attr("placeholder", "Tìm kiếm ...");
        $this.removeClass('form-control-sm');
    });
    $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
    $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
    $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
    $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
    $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
</script>

</body>
</html>