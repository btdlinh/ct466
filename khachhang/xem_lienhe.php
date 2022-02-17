<!--viết tất cả code php trên đầu file-->

<?php
session_start();
require "../db.php";
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else exit();
//$conn = new mysqli("localhost", "root", "", "ct271-01");
//$conn->set_charset("utf8");

$sql1 = "SELECT * FROM kh_lienhe";
$result = $conn->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tư vấn khách hàng</title>
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS  -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Material Design Bootstrap  -->
    <link rel="stylesheet" href="../css/mdb.min.css">
    <!-- DataTables.net  -->
    <link rel="stylesheet" type="text/css" href="../css/addons/datatables.min.css">
    <link rel="stylesheet" href="../css/addons/datatables-select.min.css">
    <!-- Your custom styles (optional)  -->
</head>

<body class="fixed-sn white-skin white">
<!-- Main Navigation  -->
<header>
    <?php
    require "../admin/headerindex.php";
    ?>
    <!-- Navbar  -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button  -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>

        <div class="breadcrumb-dn mr-auto">
<!--            <p><strong>Thông tin liên hệ Khách hàng</strong></p>-->
        </div>
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
                    <a class="dropdown-item" onclick="return confirm('Bạn chắc chắn đăng xuất?')" href="http://localhost:8080/CT271/admin/xulydangxuat.php">Đăng Xuất</a>
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
                    <h2 class="text-center blue-grey-text font-weight-bold mb-4 mt-5">Danh sách khách hàng</h2>

                    <div class="card-body">
                        <table id="dtMaterialDesignExample" class="table" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">STT</th>
                                <th class="th-sm">Tên</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Số điện thoại</th>
                                <th class="th-sm">Lời nhắn</th>
                                <th class="th-sm">Xử lý</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                $i=1;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                                <td>".$i."</td>
                                                <td>".$row['kh_ten']."</td>  
                                                <td>".$row['kh_email']."</td> 
                                                <td>".$row['kh_sdt']."</td> 
                                                <td>".$row['kh_loinhan']."</td> 
                                                <td>
                                                         <button type='button' class='btn btn-sm btn-danger' title='Xóa Khách Hàng'>
                                                         <a onclick=\"return confirm('Bạn chắc chắn muốn xóa Khách hàng này?')\"
                                                         href=\"xoa_khlienhe.php?id=".$row['stt']."\"  >Xóa</a>
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
<script src="../js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips  -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript  -->
<script type="text/javascript" src="../js/bootstrap.js"></script>
<!-- MDB core JavaScript  -->
<script type="text/javascript" src="../js/mdb.min.js"></script>
<!-- DataTables  -->
<script type="text/javascript" src="../js/addons/datatables.js"></script>
<!-- DataTables Select  -->
<script type="text/javascript" src="../js/addons/datatables-select.min.js"></script>
<!--Custom scripts -->
<script type="text/javascript" src="../js/modules/material-select.js"></script>

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



