<h1>Danh sách sản phẩm</h1>
<div class="row mt-5 mb-5 pt-5 pb-5">
    <?php
    // Nếu người dùng submit form thì thực hiện
    if (isset($_REQUEST['ok'])) {
        // Gán hàm addslashes để chống sql injection
        $search = addslashes($_GET['search']);

        // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
        if (empty($search)) {
            echo "Bạn chưa nhập nội  dung tìm kiếm!";
        } else {
            // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
            $query = "select * from sach as a join theloaisach as b on a.idtheloai=b.idtheloai
                            where tensach like '%$search%' or tentheloai like '%$search%' ";

            // Kết nối sql
//                require('../db.php');

            // Thực thi câu truy vấn
            $sqlloai = mysqli_query($conn, $query);

            // Đếm số đong trả về trong sql.
            $num = mysqli_num_rows($sqlloai);

            // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
            if ($num > 0 && $search != "") {
                // Dùng $num để đếm số dòng trả về.
                echo "$num Kết quả trả về với từ khóa:  <b> $search</b> <br>";

                // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.

                while ($rowloai = mysqli_fetch_assoc($sqlloai)) {
                    $linkhinh = "CT466" . $rowloai['hinhanh'];
                    echo '
      
                            <div class="col-lg-4 mt-4 mb-4">
                                    <!-- Card -->
                                    <div class="card">
                
                                        <!-- Card image -->
                                        <div class="view overlay"  title=' . $rowloai['tensach'] . '>
                
                                            <img src=' . $linkhinh . ' alt="Hình Ảnh Sách" style="width: 330px; height: 350px; margin: 1em auto; padding-top: 1em;">
                
                                            <a href="http://localhost/CT466/khachhang/sanpham/hienthisp.php?idsach=' . $rowloai['idsach'] . ' " 
                                                title=' . $rowloai['tensach'] . ' />
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                
                                        </div>
                                        <!-- Card image -->
                
                                        <!-- Card content -->
                                        <div class="card-body" style="height: 5em;">
                                            <!-- Category & Title tensach-->
                                            <h5 class="card-title mb-1">
                                                <strong>
                                                    <a href="http://localhost/CT466/khachhang/sanpham/hienthisp.php?idsach=' . $rowloai['idsach'] . ' " 
                                                        class="dark-grey-text font-small font-weight-bolder"  />' . $rowloai['tensach'] . '</a>
                                                </strong>
                                            </h5>
                                          <!-- Category & Title ten sach-->
                                        </div>
                                        <!-- Card content -->
                                        
                                        <!-- Card footer gia-->
                                            <div class="card-footer pb-0">
                
                                                <div class="row mb-0">
                
                                                    <span class="float-left m-1 center-element text-info"><strong>' . number_format($rowloai["gia"]) . ' đ</strong></span>
                                                
                                                    <span class=" float-right m-2">
                                                            <a data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng" href="khachhang/sanpham/giohang.php?id= ' . $rowloai['idsach'] . ' ">
                                                                <i class="fas fa-shopping-cart ml-1 blue-text"></i>
                                                            </a> 
                                                    </span>
                                                  
                
                                                </div>
                
                                            </div>
                                        <!-- Card footer gia-->
                                    </div>
                                    <!-- Card -->
                              </div>
       
                    ';
                }
            } else {
                echo "Không tìm thấy kết quả!";
            }
        }
    }
    ?>

</div>
