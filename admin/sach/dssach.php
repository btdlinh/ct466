<!--viết tất cả code php trên đầu file-->

<?php
session_start();
require "../../db.php";
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();

$sql1 = "SELECT * FROM sanpham  as s join the_loai as t on s.sp_idtheloai=t.tl_id
                                       join tac_gia as tg on s.sp_idtg=tg.tg_id
                                        join nha_cung_cap as ncc on ncc.ncc_id=s.sp_idncc   
                                        join nha_xuat_ban as nxb on nxb.nxb_id=s.sp_idnxb";
$result = $conn->query($sql1);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Danh Sách Sản Phẩm</title>
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
                    <a class="dropdown-item" href="http://localhost/CT466/admin/thongtin/thongtintaikhoan.php">Tài Khoản Của Tôi</a>
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
                    <h2 class=" mt-5 text-center blue-grey-text font-weight-bold mb-4">Thông Tin Sản
                        Phẩm</h2>

                    <div class="card-body">
                        <table id="dtMaterialDesignExample" class="table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">STT</th>
                                <th class="th-sm">Tên sách</th>
                                <th class="th-sm">Tác giả</th>
                                <th class="th-sm">Nhà xuất bản</th>
                                <th class="th-sm">Giá</th>
                                <th class="th-sm">Số lượng</th>


                                <th class="th-sm">Xử lý</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                $i=1;
                                while ($row = $result->fetch_assoc()) {
                                    $name = $row['sp_tensach'];
                                    echo "<tr>
                                                 <td>".$i."</td>
                                                 <td>".$row['sp_tensach']."</td>
                                                 <td>".$row['tg_hoten']."</td>
                                                 <td>".$row['nxb_ten']."</td>
                                                 <td>".number_format($row['sp_gia'])." vnđ"."</td>
                                                 <td>".$row['sp_soluong']."</td>
                                                <td>
                                                <button type='button' class='btn btn-sm btn-primary'>
                                                <a href=\"suasach.php?idsach=".$row['sp_id']."\"  > Sửa </a>
                                                </button>
                                                 <button type='button' class='btn btn-sm btn-danger'>
                                                    <a onclick=\"return confirm('Bạn chắc chắn muốn xóa Sách này?')\"
                                                
                                                    href=\"xoasach.php?idsach=".$row['sp_id']."\"  > Xóa </a>
                                                </button>
                                                 <br>
                                                 <button type='button' class='btn btn-sm blue btn-cyan'>
                                                 <a href=\"thongtinsach.php?idsach=".$row['sp_id']."\"  >Xem</a>
                                                 </button>
                                               
                                                </td>
                                               ";
                                    $i++;
                                }
                            }
                            ?>
                            </tbody>
                        </table>
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
<!--                                           <td>".$row['soluong']."</td>-->
<!---->
