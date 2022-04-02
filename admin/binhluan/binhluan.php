<!--viết tất cả code php trên đầu file-->

<?php

session_start();

require "../../db.php";

//$sql11 = "SELECT * FROM sanpham  as s join the_loai as t on s.sp_idtheloai=t.tl_id
//                                       join danh_muc as dm on t.tl_iddm=dm.dm_id
//                                       join ngon_ngu as nn on s.sp_idnn=nn.nn_id
//                                       join tac_gia as tg on s.sp_idtg=tg.tg_id
//                                        join nha_xuat_ban as nxb on s.sp_idnxb=nxb.nxb_id
//                                        join nha_cung_cap as ncc on s.sp_idncc=ncc.ncc_id
//                                        join chi_tiet_hoa_don as ct on s.sp_id=ct.cthd_idsp
//                                        join hoa_don as a on a.hd_id=ct.cthd_idhd
//                                        join khach_hang as b on b.kh_id=a.hd_idkh
//                                        join dia_chi as dc on b.kh_id=dc.dc_idkh
//
//                                        ";
$sql11=" SELECT * FROM test as a join sanpham as b on a.t_idsp=b.sp_id";
$result11 = mysqli_query($conn, $sql11);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Quản lý bình luận</title>
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
                    <a class="dropdown-item" href="http://localhost/CT466/admin/thongtin/thongtintaikhoan.php">Tài
                        Khoản Của Tôi</a>
                    <a class="dropdown-item" href="http://localhost/CT466/admin/xulydangxuat.php">Đăng Xuất</a>
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

                <div class="card">
                    <h2 class="mt-5 text-center blue-grey-text  font-weight-bold mb-4">
                        Tất cả các bình luận
                    </h2>
                    <div class="card-body">
                        <form action="#" method="GET" enctype="multipart/form-data">
                            <table id="dtMaterialDesignExample" class="table" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th class="th-sm">Mã bình luận</th>
                                    <th class="th-sm">Sản phẩm</th>
                                    <th class="th-sm">Email khách hàng</th>
                                    <th class="th-sm">Nội Dung</th>
                                    <th class="th-sm">Thời Gian</th>
                                    <th>Xử lý</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                ?>
                                <?php

                                if ($result11->num_rows > 0) {
                                    $i = 1;
//
                                    while ($row = $result11->fetch_assoc()) {
                                        echo "<tr>
                                                 <td>" . $row['t_id'] . "</td>
                                                 <td>" . $row['sp_tensach'] ."<br>" . number_format($row['sp_gia']) ." vnđ</td>
                                                 <td>" . $row['t_email'] . "</td>
                                                 <td>" . $row['t_binhluan'] . "</td>
                                                 <td>" . date('d/m/Y ', strtotime($row['t_tg'])) . "</td>
                                                 
                                                 
                                              <td>

                                               
                                                    <a  href=\"xulyxoabinhluan.php?bl_id=".$row['t_id']."\" 
                                                    onclick=\"return confirm('Bạn chắc chắn muốn xóa Bình luận này?')\"
                                                    class=\"white-text\"
                                                    data-toggle=\"tooltip\"
                                                    data-placement=\"top\" >
                                                     <i class=\"fas fa-eraser red-text\" style='font-size: 22px; margin: 0 .1rem;' title='Xóa bình luận'></i>
                                                    </a>
                                                    
                                             
                                            </td>
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

