<!--danh sach sach-->

<?php
require "../../db.php";
/// luôn luôn có
/// section co phai admin ko, ko => /
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else exit();
$sql1 = "SELECT * FROM sach  as s join theloaisach as t on s.idtheloai=t.idtheloai
                                       join tacgia as tg on s.idtacgia=tg.idtacgia 
                                        join nhaxuatban as nxb on s.idnxb=nxb.idnxb";

$result = $conn->query($sql1);
//echo $sql1;
//    if ($result->num_rows > 0) {
//        while ($row = $result->fetch_assoc()) {
//            echo "<option value=" . $row['idtheloai'] . ">" . $row['tentheloai'] . "</option>";
//        }
//}

?>
<main>
    <div class="container-fluid mb-5">
        <!-- Section: Basic examples -->
        <section>
            <!-- Gird column -->
            <div class="col-md-12">
                <h3 class="my-4 dark-grey-text font-weight-bold" style="margin: 0 14em; width: 100%;">Thông Tin Sản Phẩm</h3>
                <div class="card">
                    <div class="card-body">
                        <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID Sách</th>
                                <th>Tên Sách</th>
                                <th>Thể Loại</th>
                                <th>Tác Giả</th>
                                <th>Nhà Xuất Bản</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Mô Tả</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                $i=1;
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                                 <td>".$i."</td>
                                                 <td>".$row['tensach']."</td>
                                                 <td>".$row['tentheloai']."</td>
                                                 <td>".$row['tentacgia']."</td>
                                                 <td>".$row['tennxb']."</td>
                                                 <td>".$row['gia']."</td>
                                                 <td>".$row['soluong']."</td>
                                                 <td>".$row['mota']."</td>
                                                <td><a href=\"suasach.php?idsach=".$row['idsach']."\"  > Sua </a></td>
                                                <td><a href=\"delete_xuly.php?idsach=".$row['idsach']."\"  > Xoa </a></td>
                                             </tr> ";
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

