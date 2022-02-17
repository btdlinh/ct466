<!--viết tất cả code php trên đầu file-->

<?php
session_start();
require "../../db.php";
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();
$idtheloai=$_GET['idtheloai']; // lay bien idtheloai tren url (id can xoa)
$sql = "SELECT * FROM the_loai  WHERE  $idtheloai=tl_id";
$result = $conn->query($sql); // lay dong du lieu dua vao mang
$sql = "DELETE FROM the_loai WHERE tl_id=$idtheloai";
$conn->query($sql) or die("err: ");
//header('location: dstheloai.php');
$conn->close();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Xóa Thể Loại</title>
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS  -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Material Design Bootstrap  -->
    <link rel="stylesheet" href="../../css/mdb.min.css">
    <!-- DataTables.net  -->
    <link rel="stylesheet" type="text/css" href="../../css/addons/datatables.min.css">
    <link rel="stylesheet" href="../../css/addons/datatables-select.min.css">
</head>
<html>
<section class="pb-4 pt-5 mt-5">
    <div class="card text-center w-50" style="margin: 0 auto;">
        <h3 class="card-header primary-color white-text">Bạn muốn xóa mục này!</h3>
        <div class="card-body">
            <p class="card-text">Bấm vào đây để xóa.</p>
            <a href="dstheloai.php" target="_self" class="btn btn-primary">Xóa</a>
        </div>
    </div>
</section>
</html>