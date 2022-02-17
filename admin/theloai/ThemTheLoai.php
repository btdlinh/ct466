<?php
    require "../../db.php";
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thêm Thể Loại</title>
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

<body class="login-page white">

<!-- Main Navigation -->
<header>
    <!-- Navbar -->
<!--    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="background: rgba(2,2,2,0.9)">-->
<!--        <div class="container">-->
<!--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"-->
<!--                    aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                <span class="navbar-toggler-icon"></span>-->
<!--            </button>-->
<!--            <div class="collapse navbar-collapse" id="navbarSupportedContent-7">-->
<!--                <ul class="navbar-nav mr-auto">-->
<!--                    <li class="nav-item active">-->
<!--                        <a class="nav-link white-text" href="http://localhost:8080/CT271/admin/index.php"> <i class="fas fa-home"></i> Trang Chủ</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </nav>-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar white">

        <div class="container">

            <!-- SideNav slide-out button -->
            <div class="float-left mr-2">

                <a href="http://localhost:8080/CT466/admin/index.php" data-activates="slide-out" class="button-collapse">

                    <i class="fas fa-bars"></i>

                </a>

            </div>

            <a class="navbar-brand font-weight-bold" href="http://localhost:8080/CT271/admin/index.php">

                <strong>HIRAKI.COM</strong>

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown ml-3">

                        <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold"
                           id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            <i class="fas fa-user blue-text"></i> Tài Khoản </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">

                            <a class="dropdown-item" href="http://localhost:8080/CT466/admin/thongtin/thongtintaikhoan.php">Tài Khoản Của Tôi</a>

                            <a class="dropdown-item waves-effect waves-light" href="http://localhost:8080/CT466/admin/dk.php">Đăng Ký</a>

                            <a class="dropdown-item waves-effect waves-light" href="http://localhost:8080/CT466/admin/xulydangxuat.php">Đăng Xuất</a>

                        </div>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <!-- Navbar -->
    <!--background-->
    <!-- Section: Inputs -->
    <section class="section card mb-5 align-items-center " style="width: 60% ;margin: auto; height: 40em;">
        <form action="xulythemtheloai.php" method="POST" onsubmit="return Validate()">
            <div class="card-body black-text" >

                <!-- Section heading -->
                <h1 class="text-center my-5 h1" style="padding-top: 3em;">Thêm Thể Loại</h1>
                <div style="width: 100%; margin-left: 2.5em;"> <!--canh giữa form-->
<!--                    <h5 class="pb-5">Nhập Thông Tin Loại Sách</h5>-->
                    <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column danh muc -->
                        <div class="col-md-10">

                            <div class="md-form">
                                <select
                                        class="custom-select custom-select-md mb-3"
                                        name="iddanhmuc"
                                >
                                    <option selected class="orangeForm-danhmuc"> Danh Mục Sách </option>
                                    <?php
                                    $sql = "SELECT * FROM danh_muc ";
                                    $result = $conn->query($sql) or die($conn->error);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value=" . $row['dm_id'] . ">" . $row['dm_ten'] . "</option>";
                                        }
                                    }
                                    ?>

                                </select>

                            </div>
                            <div>
                                <p id="tbdanhmuc" class="error"></p>
                            </div>

                        </div>
                        <!-- Grid column danh muc-->

                        <!-- Grid column -->
                        <div class="col-md-10">

                            <div class="md-form">
                                <input
                                        type="text"
                                        id="orangeForm-name"
                                        class="form-control form-control-sm black-text"
                                        name="tenloaisach"
                                />
                                <label for="orangeForm-name" class="orangeForm-name black-text"> Tên Thể Loại</label>
                            </div>
                            <div>
                                <p id="tbtheloai" class="error"></p>
                            </div>

                        </div>
                        <!-- Grid column -->

                        
                        <button class="btn btn-outline-light-blue btn-rounded btn-block my-4 waves-effect z-depth-0 " type="submit" style="width: 75%; margin: 0 auto;">Lưu Lại</button>                                    <hr class="mt-4">
                    </div>
                </div>
            </div>
        </form>
        <!--background-->
    </section>
</header>
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

    function Validate() {
        let tenloai = document.getElementById("orangeForm-name").value;
        let OK = true;
        if (tenloai === "") {
            alert("Hãy nhập đầy đủ thông tin!");
            // document.getElementById("tbtheloai").innerHTML = "Bạn chưa nhập thông tin";
            // document.getElementById("tbtheloai").style.color = "red";
            OK = false;
        }else {
            document.getElementById("tbtheloai").innerHTML = "";
        }
        return OK;
    }

</script>

</body>

</html>
