<?php
session_start();
require "../../db.php";
//if (isset($_SESSION['email'])) {
//    $email = $_SESSION['email'];
//} else exit();
if(isset($_SESSION['kh_email'])) {
    $id = $_GET['bl_id'];
    $a = $_SESSION['kh_email'];
// lay bien bl_id tren url (id can xoa)
    $sql = "SELECT * FROM test  WHERE  t_id=$id ";
    $result = $conn->query($sql); // lay dong du lieu dua vao mang
    $sql = "DELETE FROM test WHERE t_id=$id ";
    $conn->query($sql) or die("err: ");
    header('location: binhluan.php');
}
$conn->close();
?>