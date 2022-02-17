<!--viết tất cả code php trên đầu file-->

<?php
session_start();
require "../../db.php";
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else exit();
$id=$_GET['id']; // lay bien idsach tren url (id can xoa)
$sql = "SELECT * FROM admin  WHERE  $id=id";
$result = $conn->query($sql); // lay dong du lieu dua vao mang
$sql = "DELETE FROM admin WHERE id=$id";
$conn->query($sql) or die("err: ");
header('location: dsadmin.php');
$conn->close();
?>
