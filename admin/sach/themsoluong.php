<!--sua sach-->
<?php
//    require "../../db.php";
/// luôn luôn có
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ct466';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname)
or die($conn->connect_error);

$conn -> set_charset('utf8');


//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();
// thể loai
$sql = "SELECT * FROM the_loai ";
$result = $conn->query($sql) ;
$row = $result->fetch_assoc();

// thể loại

// NXB
$sql1 = "SELECT * FROM nha_xuat_ban ";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();

//NXB

// tác giả
$sql2 = "SELECT * FROM tac_gia ";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

// tác giả

// ncc
$sql3 = "SELECT * FROM nha_cung_cap";
$result3 = $conn->query($sql3);
$row3= $result3->fetch_assoc();

// ncc

// nn
$sql5 = "SELECT * FROM ngon_ngu";
$result5 = $conn->query($sql5);
$row5= $result5->fetch_assoc();

// nn

// lấy idsach muốn sửa
$id = $_GET['idsach'];
$sql4 = "SELECT * FROM sanpham  as s join the_loai as t on s.sp_idtheloai=t.tl_id
                                           join tac_gia as tg on s.sp_idtg=tg.tg_id 
                                            join nha_xuat_ban as nxb on s.sp_idnxb=nxb.nxb_id
                                            join nha_cung_cap as ncc on s.sp_idncc=ncc.ncc_id
                                            join ngon_ngu as nn on s.sp_idnn=nn.nn_id
                    WHERE sp_id= $id";
//        echo $sql4;
$result4=$conn->query($sql4);
if( $result4->num_rows!=0){
    $row4 = $result4->fetch_assoc();
}
// lấy idsach muốn sửa
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cập Nhật Sách</title>
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

<body class="login-page" >

<?php
//    require "../../UI/adheader.php";

require "../header.php";

?>
<section class="section card mb-5 align-itemsocation:dangnhap.ht-center " style="width: 60% ;margin:0 auto">
    <?php
    //    echo "<form action=\"xulysuasach.php?idsach=".$id."\" method=\"POST\" enctype=\"multipart/form-data\">";

    echo "<form action=\"xulythemsoluong.php?idsach=".$id."\" method=\"POST\" enctype=\"multipart/form-data\">";
    ?>
    <!--<form method="POST" onsubmit="return Validate()" enctype="multipart/form-data">-->
    <div class="card-body black-text p-5 ">
        <!-- Section heading -->
        <h2 class="text-center my-5 h1 mb-5 pt-5 text-black-50" > Cập Nhật Thông Tin Sách</h2>
        <div class="md-form">
            <div class="file-field">

                <?php    $linkhinh = "http://localhost/CT466/img/bookimg/". $row4['sp_hinhanh']; ?>
                <img src=<?php echo $linkhinh; ?>
                     alt="Hình Ảnh Sách"
                style="width: 150px;
                height: 180px;
                margin: 3em auto;
                padding-top: 1em;"
                />
                <div class="file-path-wrapper">
                </div>
            </div>
        </div>
        <div style="width: 100%; "> <!--canh giữa form-->
            <!--                <h5 class="pb-5">Cập Nhập Thông Tin Sách</h5>-->
            <!-- Grid row -->
            <div class="row">


                <!-- Grid column -->
                <div class="col-md-10">
                    <div class="col-md-6">
                        <div class="md-form">
                            <!--form the loai-->
                            <div class="col-xl-auto" style="display:none;">
                                <!-- Name -->
                                <select
                                        class="custom-select custom-select-md mb-3"
                                        name="idncc"

                                >
                                    <option  value="<?php echo $row3['ncc_id'];?>" selected> <?php echo  $row3['ncc_ten'];   ?></option>

                                    <?php
                                    if ($result3->num_rows > 0) {
                                        while ($row3 = $result3->fetch_assoc()) {
                                            echo "<option value=" . $row3['ncc_id'] . " >" . $row3['ncc_ten'] . "  </option>";

                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <!--form the loai-->
                        </div>


                    <div class="md-form"  style="display: none">
                        <input
                            type="number"
                            id="slsach"
                            class="form-control form-control-sm black-text"
                            name="slsachcu"
                            min="0"
                            value="<?php echo $row4['sp_soluong']?>"
                        />
                        <label for="slsach" class="orangeForm-price black-text "> Số Lượng</label>
                    </div>

                    <div class="md-form" >
                        <input
                                type="number"
                                id="slsach"
                                class="form-control form-control-sm black-text"
                                name="slsach"
                                min="0"
                                value="0"
                        />
                        <label for="slsach" class="orangeForm-price black-text "> Số Lượng</label>
                    </div>
                    <div>
                        <p id="tbsl" class="error"></p>
                    </div>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->

                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-10">





                </div>

                <div>
                    <p id="tbhinh" class="error"></p>
                </div>
                <!-- Grid column -->
                <button class="btn btn-outline-light-blue btn-rounded btn-block my-4 waves-effect z-depth-0 "
                        type="submit" style="width: 75%; margin: 0 auto;">Thêm</button>
                <!--                    <button class="btn btn-outline-light-blue btn-rounded btn-block my-4 waves-effect z-depth-0 "-->
                <!--                            type="reset" style="width: 75%; margin: 0 auto;">Làm Lại</button>-->
                <hr class="mt-4">
            </div>
        </div> <!--canh giữa form-->

        <!-- Grid row -->
    </div>
    </form>
    </div>
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
    // new WOW().init();
    // cai khúc nay t chu làm t de choi á
    function Validate() {
        let masach = document.getElementById("orangeForm-id").value;
        let tensach = document.getElementById("orangeForm-name").value;
        let gia = document.getElementById("orangeForm-price").value;
        let OK = true;
        if (masach === "" && tensach === "" && gia === "") {
            alert("Hãy nhập đầy đủ thông tin!");
            OK = false;
        }

        if (masach === "") {
            document.getElementById("tbmasach").innerHTML = "Bạn chưa nhập họ tên";
            document.getElementById("tbmasach").style.color = "red";
            OK = false;
        } else {
            document.getElementById("tbmasach").innerHTML = "";
        }

        if (tensach === "") {
            document.getElementById("tbten").innerHTML = "Bạn chưa nhập email";
            document.getElementById("tbten").style.color = "red";
            OK = false;
        } else {
            document.getElementById("tbten").innerHTML = "";
        }

        if (gia === "") {
            document.getElementById("tbgia").innerHTML = "Bạn chưa nhập mật khẩu";
            document.getElementById("tbgia").style.color = "red"
            OK = false;
        } else {
            document.getElementById("tbgia").innerHTML = "";
        }
        return OK;
    }

</script>

</body>

</html>
