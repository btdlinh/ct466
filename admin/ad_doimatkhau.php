<?php
session_start();
$email = $_SESSION["email"];
echo "<p style='font-weight: bold;' >Tài khoản: $email</p>  " ;
$conn = mysqli_connect("localhost", "root", "", "ct271-01") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * from admin WHERE email='" . $_SESSION["email"] . "'");
    $row = mysqli_fetch_array($result);
//    var_dump($row);
    if (md5($_POST["currentPassword"]) == $row["matkhau"]) {
        mysqli_query($conn, "UPDATE admin set matkhau ='" . md5($_POST["newPassword"]) . "' WHERE email='" . $_SESSION["email"] . "'");
        $message = "Mật khẩu của bạn đã được thay đổi!";
    }else
        $message = "Mật khẩu hiện tại không đúng. Vui lòng nhập lại chính xác mật khẩu.";
}
?>
<html>
<head>
    <title>Đổi mật khẩu</title>
    <link href="../MDB-ecommerce-Templates-Pack_4.8.11/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../MDB-ecommerce-Templates-Pack_4.8.11/css/mdb.min.css" rel="stylesheet">
    <script>
        function validatePassword() {
            var currentPassword,newPassword,confirmPassword,output = true;

            currentPassword = document.frmChange.currentPassword;
            newPassword = document.frmChange.newPassword;
            confirmPassword = document.frmChange.confirmPassword;

            if(!currentPassword.value) {
                currentPassword.focus();
                document.getElementById("currentPassword").innerHTML = "required";
                output = false;
            }
            else if(!newPassword.value) {
                newPassword.focus();
                document.getElementById("newPassword").innerHTML = "required";
                output = false;
            }
            else if(!confirmPassword.value) {
                confirmPassword.focus();
                document.getElementById("confirmPassword").innerHTML = "required";
                output = false;
            }
            if(newPassword.value != confirmPassword.value) {
                newPassword.value="";
                confirmPassword.value="";
                newPassword.focus();
   getElementById("confirmPassword").innerHTML = "not same";
                output = false;
            }
            return output;
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
            <td><input type="password" name="confirmPassword"
                       class="txtField" /><span id="confirmPassword"
                                                class="required"></span></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit"
                                       value="Lưu lại" class="btnSubmit"></td>
            </tr>

            <tr>
                <td colspan="2"><a href="http://localhost:8080/CT271/admin/thongtin/thongtintaikhoan.php"
                                    class="btnSubmit">Quay lại</a></td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>