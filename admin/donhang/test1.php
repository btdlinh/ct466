<?php
require "../../db.php";
$sql1="select count(*)as choxacnhan from hoa_don WHERE hd_trangthai=1";
$rs1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_row($rs1);
print_r($row1[0]);
echo "<br>";

$sql2="select count(*)as daxacnhan from hoa_don WHERE hd_trangthai=2";
$rs2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_row($rs2);
print_r($row2[0]);
echo "<br>";

$sql3="select count(*)as danggiaohang from hoa_don WHERE hd_trangthai=3";
$rs3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_row($rs3);
print_r($row3[0]);
echo "<br>";

$sql4="select count(*)as dagiaohang from hoa_don WHERE hd_trangthai=4";
$rs4 = mysqli_query($conn,$sql4);
$row4 = mysqli_fetch_row($rs4);
print_r($row4[0]);
echo "<br>";

$sql5="select count(*)as huydon from hoa_don WHERE hd_trangthai=5";
$rs5 = mysqli_query($conn,$sql5);
$row5 = mysqli_fetch_row($rs5);
print_r($row5[0]);