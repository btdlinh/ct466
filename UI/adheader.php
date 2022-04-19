
<body>
<!-- Navigation-->


    <!-- Navbar ngang-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light scrolling-navbar white">

        <div class="container">

            <!-- SideNav slide-out button-->
            <div class="float-left mr-2">
                <i class="fas fa-book-open blue-text"></i>
                <!--                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-home"></i></a>-->
            </div>

            <a class="navbar-brand font-weight-bold" href="http://localhost/CT466"><strong>
                    HIRAKI.COM </strong></a>

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
                        <?php
                        $number = 0;
                        if(isset($_SESSION['cart'])){
                            $cart = $_SESSION['cart'];
                            foreach ($cart as $value){
                                $number +=  (int)$value["number"];

                            }
                        }
                        ?>
                        <a class="nav-link waves-effect waves-light dark-grey-text font-weight-bold"
                           href="http://localhost/CT466/khachhang/sanpham/giohang_hienthi.php">
                            <i class="fas fa-shopping-cart blue-text"></i>Giỏ Hàng <span id="qty" style="display:<?php echo $number ?'block' : 'none'?>;
                                    margin-top: -34px;
                                    color: red;
                                    margin-left: 98px;
                                    border-radius: 50%;"><?php echo $number; ?></span></a>


                    </li>

                    <li class="nav-item dropdown ml-3">

                        <a class="nav-link dropdown-toggle waves-effect waves-light dark-grey-text font-weight-bold"
                           id="navbarDropdownMenuLink-4"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false">
                            <i class="fas fa-user blue-text"></i><?php echo isset($_SESSION['kh_email'] )? $_SESSION['kh_ten'] : 'Tài khoản'; ?>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right dropdown-cyan"
                             aria-labelledby="navbarDropdownMenuLink-4">
                            <?php
                            if(isset($_SESSION['kh_email'])){
                                ?>
                                <a class="dropdown-item waves-effect waves-light" href="http://localhost/ct466/xulydangxuat.php"> Đăng xuất </a>
                                <a class="dropdown-item waves-effect waves-light"
                                   href="http://localhost/CT466/khachhang/sanpham/kh_xemdonhang.php"> Đơn hàng của bạn </a>
                                <?php
                            }else{
                                ?>
                                <a class="dropdown-item waves-effect waves-light" href="http://localhost/ct466/dangky.php"> Đăng ký </a>
                                <a class="dropdown-item waves-effect waves-light" href="http://localhost/ct466/dangnhap.php"> Đăng nhập </a>
                                <?php
                            }
                            ?>
                        </div>

                    </li>

                </ul>

            </div>

        </div>

    </nav>
    <!-- Navbar ngang-->


<!-- Navigation-->
<script>
    function addcart(id){
        const num = document.getElementById('soluongmua').value;
        document.getElementById("qty").style.display = "block"

        $.post("../../giohang.php",{'id':id, 'num': num}, function(data, status){
            // alert(data);
            item = data.split("-"); //cat mang
            $("#qty").text(item[0]);
            $("#total").text(item[1]);
        });
    }
</script>
</body>
