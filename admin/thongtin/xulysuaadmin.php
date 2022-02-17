<?php
require "../../db.php";
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else exit();

$id=$_GET['id'];

$ten = $_POST["ten"];
$email = $_POST["email"];
$dc = $_POST["diachi"];
$sdt = $_POST["sdt"];
$sql= "UPDATE admin SET    ten='$ten', 
                            email='$email', 
                            diachi='$dc', 
                            sdt='$sdt'
                        WHERE (id='$id')";
$conn->query($sql) or die("err: ");
header('location: dsadmin.php');

//echo "Thành Công";
$conn->close();

?>


