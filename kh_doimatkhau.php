<?php
session_start();
$email = $_SESSION["kh_email"];
//echo "<p style='font-weight: bold;' >Tài khoản: $email</p>  " ;
$conn = mysqli_connect("localhost", "root", "", "CT466") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * from khach_hang WHERE kh_email='" . $_SESSION["kh_email"] . "'");
    $row = mysqli_fetch_array($result);

//    var_dump($row);
    if (strcmp(md5($_POST["currentPassword"]),$row["kh_matkhau"])==0) {
            mysqli_query($conn, "UPDATE khach_hang set kh_matkhau ='" . md5($_POST["newPassword"]) . "' WHERE kh_email='" . $_SESSION["kh_email"] . "'");
            $message = "Mật khẩu của bạn đã được thay đổi!";
//        header('location:http://localhost/ct466');
    }else
        $message = "Mật khẩu hiện tại không đúng. Vui lòng nhập lại chính xác mật khẩu.";
    }
?>
<html>
<head>
    <title>Đổi mật khẩu</title>
    <link href="MDB-ecommerce-Templates-Pack_4.8.11/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="MDB-ecommerce-Templates-Pack_4.8.11/css/mdb.min.css" rel="stylesheet">
    <script>
        function validatePassword() {
            var currentPassword,newPassword,confirmPassword ='';
                let output = true;

            currentPassword = document.frmChange.currentPassword;
            newPassword = document.frmChange.newPassword;
            confirmPassword = document.frmChange.confirmPassword;

            if(!currentPassword.value) {
                currentPassword.focus();
                document.getElementById("currentPassword").innerHTML = "Chưa nhập";
                output = false;
            }
            if(!newPassword.value) {
                newPassword.focus();
                document.getElementById("newPassword").innerHTML = "Chưa nhập";
                output = false;
            }
            if(!confirmPassword.value) {
                confirmPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "Chưa nhập";
                output = false;
            }
            if(newPassword.value !== confirmPassword.value) {
                newPassword.value="";
                confirmPassword.value="";
                newPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "Không khớp";
                output = false;
            }
            return output;
            // return false;
        }
    </script>
    <style>
        body {
            font-family:Arial;
        }
        input {
            font-family:Arial;
            font-size:14px;
        }
        label{
            font-family:Arial;
            font-size:14px;
            color:#999999;
        }
        .tblSaveForm {
            border-top:2px #072073 solid;
            background-color: #f8f8f8;
        }
        .tableheader {
            background-color: rgba(143, 184, 238, 0.8);
        }
        .btnSubmit {
            background-color: #3069cd;
            padding:5px;
            border-color: rgba(85, 153, 241, 0.8);
            border-radius:4px;
            color:white;
        }
        .message {
            color: #FF0000;
            text-align: center;
            width: 100%;
        }
        .txtField {
            padding: 5px;
            border: #0990da 1px solid;
            border-radius:4px;
        }
        .required {
            color: #FF0000;
            font-size:11px;
            font-weight: bolder;
            padding-left:10px;
        }
    </style>
</head>
<body>
<form name="frmChange" method="post" action=""
      onSubmit="return validatePassword()">
    <div class="w-80 mt-5">
        <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
        <table border="0" cellpadding="10" cellspacing="0"
               width="500" align="center" class="tblSaveForm">
            <tr class="tableheader">
                <td colspan="2" class="text-center">Thay đổi mật khẩu của bạn</td>
            </tr>
            <tr>
                <td width="40%"><label>Mật khẩu hiện tại</label></td>
                <td width="60%"><input type="password"
                                       name="currentPassword" class="txtField" /><span
                        id="currentPassword" class="required"></span></td>
            </tr>
            <tr>
                <td><label>Mật khẩu mới</label></td>
                <td><input type="password" name="newPassword"
                           class="txtField" /><span id="newPassword"
                                                    class="required"></span></td>
            </tr>
            <td><label>Xác nhận mật khẩu</label></td>
            <td><input type="password"
                       name="confirmPassword"
                       class="txtField" /><span
                        id="confirmPassword"
                        class="required"></span></td>
            </tr>
            <tr>
                <td></td>
                <td colspan=""><input type="submit"
                                       name="submit"
                                       value="Lưu lại"
                                       class="btnSubmit"></td>

            </tr>

            <tr>
                <td></td>
                <td style="text-align: left">
                    <a href="http://localhost/CT466/index.php" class="btnSubmit">Quay lại</a>
                </td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>