<!-- Navbar ngang-->
<nav class="navbar fixed-top navbar-expand-md navbar-light scrolling-navbar white">

    <div class="container">

        <!-- SideNav slide-out button-->
        <div class="float-left mr-2">
            <i class="fas fa-book-open blue-text"></i>
            <!--                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-home"></i></a>-->
        </div>

        <a class="navbar-brand font-weight-bold" href="http://localhost/CT466"><strong> HIRAKI.COM </strong></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">

            <ul class="navbar-nav ml-auto">

                <li class="nav-item ml-3">
                    <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold"
                       href="http://localhost/CT466/khachhang/lienhe.php"><i
                                class="fas fa-comments blue-text"></i> Liên Hệ</a>
                </li>

                <li class="nav-item ml-3">
                    <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold"
                       href="http://localhost/CT466/khachhang/sanpham/giohang.php"><i
                                class="fas fa-shopping-cart blue-text"></i> Giỏ Hàng</a>
                </li>

                <li class="nav-item dropdown ml-3">

                    <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold"
                       id="navbarDropdownMenuLink-4"
                       data-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false">
                        <i class="fas fa-user blue-text"></i>Tài Khoản
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-cyan"
                         aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item waves-effect waves-light"
                           href="http://localhost/CT466/dangky.html"> Đăng ký </a>
                        <a class="dropdown-item waves-effect waves-light"
                           href="http://localhost/CT466/dangnhap.html"> Đăng nhập </a>
                        <a class="dropdown-item waves-effect waves-light"
                           href="http://localhost/CT466/xulydangxuat.php"> Đăng xuất </a>
                        <a class="dropdown-item waves-effect waves-light"
                           href="http://localhost/CT466/khachhang/sanpham/kh_xemdonhang.php"> Đơn hàng của bạn </a>
                    </div>

                </li>

            </ul>

        </div>

    </div>

</nav>
<!-- Navbar ngang-->


<!-- Navbar sp-->
<nav class="navbar navbar-expand-md navbar-dark white  mt-5 mb-5" style="background: #212121;">

    <!-- Navbar brand-->
    <a class="font-weight-bold blue-text mr-4" href="http://localhost/CT466">TRANG CHỦ</a>

    <!-- Collapse button-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">

        <!-- Links-->
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item dropdown mega-dropdown active ">
                <a class="nav-link dropdown-toggle  no-caret blue-text"
                   id="navbarDropdownMenuLink-1"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false"> Sản Phẩm</a>

                <div class="dropdown-menu mega-menu v-2 row z-depth-1 white" aria-labelledby="navbarDropdownMenuLink1">

                    <div class="row mx-md-4 mx-1 pb-0">
                        <?php
                        $sql = "SELECT * FROM danh_muc ";
                        $rs = mysqli_query($conn,$sql);
                        $row = mysqli_num_rows($rs);
                        while ($row = $rs->fetch_assoc()){
                            $dm_id = $row['dm_id'];

                            echo'
                            <div class="col-md-6 col-xl-3 sub-menu my-xl-2 mt-2 mb-1">

                            <h6 class="sub-title text-uppercase font-weight-bold blue-text">'.$row['dm_ten'].'</h6>

                            <ul class=" pl-0">
                            ';
                        ?>
                        <?php
                         $sql_tl = "SELECT * FROM the_loai WHERE tl_iddm =$dm_id  ";
                        
                         $rs_tl = mysqli_query($conn,$sql_tl);
                         $row_tl = mysqli_num_rows($rs_tl);
                         while ($row_tl = $rs_tl->fetch_assoc())
                        echo '
                                <li class=""><a class="menu-item mb-0"
                                                href="http://localhost/CT466/hienthi/hienthi_theloai.php?idtl='.$row_tl['tl_id'].'">'.$row_tl['tl_tentheloai'].'
                                        </a></li> ';

                              


                          echo'  </ul>

                        </div>
                            ';
                        }
                        ?>
               

                    

               

                    </div>

                </div>

            </li>

        </ul>
        <!-- Links-->

        <!-- Search form-->


        <div class="md-form">
            <form method="get">
                <div class="row align-items-center">
                    <div class="col-md-3 col-md-8">
                        <input type="text" name="search" id="form-s" class="form-control"/>
                        <label for="form-s" type="text" class="form-label blue-white">Tìm kiếm...</label>
                    </div>
                    <div class="col-md-3 col-md-4 text-center">
                        <button type="submit" class="btn btn-blue btn-sm btn-rounded text-capitalize">Tìm</button>
                    </div>
            </form>
        </div>


        <!-- Search form-->
    </div>
    <!-- Collapsible content-->

</nav>

<!-- Navbar sp-->


