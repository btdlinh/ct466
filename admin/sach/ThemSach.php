<?php
    require "../../db.php";
/// luôn luôn có
    session_start();
//    if (isset($_SESSION['email'])) {
//        $email = $_SESSION['email'];
//    } else exit();
// luôn luôn có

    // thể loai
    $sql = "SELECT * FROM the_loai ";
    $result = $conn->query($sql) or die($conn->error);
    // thể loại

    // NXB
    $sql1 = "SELECT * FROM nha_xuat_ban ";
    $result1 = $conn->query($sql1);
    //NXB

    // tác giả
    $sql2 = "SELECT * FROM tac_gia ";
    $result2 = $conn->query($sql2);
    // tác giả

    // ncc
    $sql3 = "SELECT * FROM nha_cung_cap ";
    $result3 = $conn->query($sql3);
    // ncc

    // nn
    $sql4 = "SELECT * FROM ngon_ngu ";
    $result4 = $conn->query($sql4);
    // nn

    // xu ly them sach


?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Thêm Sách</title>
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
<?php
//require "../../UI/adheader.php";
require "../header.php";

?>
<section class="section card mb-5 align-itemsocation:dangnhap.ht-center " style="width: 60% ;margin: auto;">
<!--    <form method="POST" onsubmit="return Validate()" enctype="multipart/form-data">-->
    <form action=   "xulythemsach.php" method="POST" enctype="multipart/form-data">

        <div class="card-body black-text">
            <!-- Section heading -->
            <h1 class="text-center my-5 h1" style="padding-top: 1.5em;">Thêm Sách</h1>
            <div style="width: 100%;"> <!--canh giữa form-->
                <h5 class="pb-5">Nhập Thông Tin Sách</h5>
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-10">
                        <div class="md-form">
                            <input type="text"
                                   id="tensach"
                                   class="form-control form-control-sm black-text"
                                   name="tensach"
                                   required="required"
                            />
                            <label for="tensach" class="orangeForm-ten black-text"> Tên Sách</label>
                        </div>
                        <div>
                            <p id="tbtensach" class="error"></p>
                        </div>
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-4">
                        <div class="md-form">
                            <!--form the loai-->
                            <div class="col-xl-auto">
                                <!-- Name -->
                                <select
                                        class="custom-select custom-select-md mb-3"
                                        name="idtheloai"

                                >
                                    <option selected class="orangeForm-theloai"> Thể Loại Sách</option>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value=" . $row['tl_id'] . ">" . $row['tl_tentheloai'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--form the loai-->
                        </div>
                        <div>
                            <p id="tbtheloai" class="error"></p>
                        </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column nn-->
                    <div class="col-md-4">
                        <div class="md-form">
                            <!--form the loai-->
                            <div class="col-xl-auto">
                                <!-- Name -->
                                <select
                                        class="custom-select custom-select-md mb-3"
                                        name="idnn"

                                >
                                    <option selected class="orangeForm-theloai"> Ngôn Ngữ</option>
                                    <?php
                                    if ($result4->num_rows > 0) {
                                        while ($row4 = $result4->fetch_assoc()) {
                                            echo "<option value=" . $row4['nn_id'] . ">" . $row4['nn_ngonngu'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!--form the loai-->
                        </div>
                        <div>
                            <p id="tbtheloai" class="error"></p>
                        </div>

                    </div>
                    <!-- Grid column nn-->

                    <!-- Grid column -->
                    <div class="col-md-4">
                        <div class="md-form">
                            <!--form tac gia-->
                            <div class="col-xl-auto">
                                <!-- Name -->
                                <select
                                        class="custom-select custom-select-md mb-3"
                                        name="idtacgia"
                                >
                                    <option selected class="orangeForm-tacgia"> Tác Giả</option>
                                    <?php
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                            echo "<option value=" . $row2['tg_id'] . ">" . $row2['tg_hoten'] . "</option>";
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <!--form tac gia-->
                        </div>

                        <div>
                            <p id="tbtacgia" class="error"></p>
                        </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column nxb-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <!--form the loai-->
                            <div class="col-xl-auto">
                                <!-- Name -->
                                <select
                                        class="custom-select custom-select-md mb-3"
                                        name="idnxb"
                                >
                                    <option selected class="orangeForm-nxb"> Nhà Xuất Bản</option>
                                    <?php
                                    if ($result1->num_rows > 0) {
                                        while ($row1 = $result1->fetch_assoc()) {
                                            echo "<option value=" . $row1['nxb_id'] . ">" . $row1['nxb_ten'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <!--                            <button class="btn-save btn btn-primary btn-sm">Save</button>-->
                            </div>
                            <!--form the loai-->
                        </div>
                        <div>
                            <p id="tbnxb" class="error"></p>
                        </div>
                    </div>
                    <!-- Grid column nxb-->

                    <!-- Grid column ncc-->
                    <div class="col-md-5">
                        <div class="md-form">
                            <!--form the loai-->
                            <div class="col-xl-auto">
                                <!-- Name -->
                                <select
                                        class="custom-select custom-select-md mb-3"
                                        name="idncc"
                                >
                                    <option selected class="orangeForm-ncc"> Nhà Cung  Cấp</option>
                                    <?php
                                    if ($result3->num_rows > 0) {
                                        while ($row3 = $result3->fetch_assoc()) {
                                            echo "<option value=" . $row3['ncc_id'] . ">" . $row3['ncc_ten'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                                <!--                            <button class="btn-save btn btn-primary btn-sm">Save</button>-->
                            </div>
                            <!--form the loai-->
                        </div>
                        <div>
                            <p id="tbncc" class="error"></p>
                        </div>
                    </div>
                    <!-- Grid column ncc-->


                    <!-- Grid column -->
                    <div class="col-md-10">
                        <div class="md-form">
                            <input
                                    type="text"
                                    id="price"
                                    class="form-control form-control-sm black-text"
                                    name="giabansach"/>
                            <label for="price" class="orangeForm-gia black-text "> Giá Bán</label>
                        </div>

                        <div>
                            <p id="tbgia" class="error"></p>
                        </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-10">

                        <div class="md-form">
                            <input
                                    type="number"
                                    id="slsach"
                                    class="form-control form-control-sm black-text"
                                    name="slsach"
                                    min="1"
                                    max="1000"
                            />
                            <label for="slsach" class="orangeForm-soluong black-text "> Số Lượng</label>
                        </div>
                        <div class="alert alert-primary">Nhập tối đa 1000 ký tự  </div>

                        <div>
                            <p id="tbsl" class="error"></p>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-10">
                        <!-- Textarea with icon prefix -->
                        <div class="md-form">
                            <i class="fas fa-pencil-alt prefix"></i>
                            <textarea
                                    type="text"
                                    id="motasach"
                                    class="md-textarea form-control black-text"
                                    name="motasach"
                                    rows="15"
                                    cols="50"
                                    maxlength="1000"
                            ></textarea>
                            <label for="motasach" class="orange-Form-mota black-text">Nhập mô tả sách</label>
                        </div>

                        <div>
                            <p id="tbmota" class="error"></p>
                        </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-10">
                        <label for="slsach" class="orangeForm-soluong black-text "> Hình Ảnh</label>
                        <div class="alert alert-primary">Mỗi lần upload tối đa 01 file ảnh. Mỗi file có dung lượng không vượt quá 5MB và có đuôi định dạng là .jpg, .png.gif., </div>
                        <form action="#">
                            <div class="md-form">
                                <div>
                                    <div class="form-control form-control-sm float-left w-100 black-text border-bottom">
                                        <span class="float-left"> Chọn hình ảnh</span>
                                        <input class="float-left ml-2" type="file" name="hinhanhsach"/>
                                    </div>
                                    <div class="file-path-wrapper">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                    <div>
                        <p id="tbhinh" class="error"></p>
                    </div>
                    <!-- Grid column -->

                        <button class="btn btn-outline-light-blue btn-rounded btn-block my-4 waves-effect z-depth-0 "
                                type="submit" style="width: 75%; margin: 0 auto;">Lưu Lại
                        </button>

                    <hr class="mt-4">
                </div>
            </div> <!--canh giữa form-->

            <!-- Grid row -->
        </div>
    </form>
    <!--background-->
</section>

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
    new WOW().init();
    function Validate() {
        let tensach = document.getElementById("orangeForm-ten").value;
        let loai = document.getElementById("orangeForm-theloai").value;
        let tg = document.getElementById("orangeForm-tacgia").value;
        let nhaxb = document.getElementById("orangeForm-nxb").value;
        let giaban = document.getElementById("orangeForm-gia").value;
        let sl = document.getElementById("orangeForm-soluong").value;
        let mota = document.getElementById("orangeForm-mota").value;
        let OK = true;
        if (tensach ==="" && loai ==="" && tg ==="" && nhaxb ==="" && giaban ==="" && sl ==="" && mota ==="") {
            alert("Hãy nhập đầy đủ thông tin!");
            OK = false;
        }

        if (tensach === "") {
            document.getElementById("tbtensach").innerHTML = "Bạn chưa nhập tên sách";
            document.getElementById("tbtensach").style.color = "red";
            OK = false;
        } else {
            document.getElementById("tbtensach").innerHTML = "";
        }

        if (loai === "") {
            document.getElementById("tbtheloai").innerHTML = "Bạn chưa nhập thể loại sách";
            document.getElementById("tbtheloai").style.color = "red";
            OK = false;
        } else {
            document.getElementById("tbtheloai").innerHTML = "";
        }

        if (nhaxb === "") {
            document.getElementById("tbnxb").innerHTML = "Bạn chưa nhập nhà xuất bản";
            document.getElementById("tbnxb").style.color = "red"
            OK = false;
        } else {
            document.getElementById("tbnxb").innerHTML = "";
        }
        if (giaban === "") {
            document.getElementById("tbgia").innerHTML = "Bạn chưa nhập giá sách";
            document.getElementById("tbgia").style.color = "red";
            OK = false;
        } else {
            document.getElementById("tbgia").innerHTML = "";
        }
        // if (sl === "") {
        //     document.getElementById("tbsl").innerHTML = "Bạn chưa nhập số lượng";
        //     document.getElementById("tbsl").style.color = "red";
        //     OK = false;
        // } else {
        //     document.getElementById("tbsl").innerHTML = "";
        // }
        if (mota === "") {
            document.getElementById("tbmota").innerHTML = "Bạn chưa nhập mô tả";
            document.getElementById("tbmota).style.color = "red";
            OK = false;
        } else {
            document.getElementById("tbmota").innerHTML = "";
        }
        return OK;
    }

    // kiem tra mo ta


</script>

</body>

</html>
