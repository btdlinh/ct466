<?php
require "../../db.php";
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else exit();

$idtheloai=$_GET['idtheloai'];
$tentheloai = $_POST["tentheloai"];

$sql= "UPDATE theloaisach SET  tentheloai='$tentheloai'
                        WHERE (idtheloai='$idtheloai')";

$conn->query($sql) or die("err: ");
header('location: dstheloai.php');

//echo "Thành Công";
$conn->close();

?>


