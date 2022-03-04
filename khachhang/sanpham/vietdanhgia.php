<html>
<body>

<div class="divider-new">

    <h3 class="h3-responsive font-weight-bold blue-text mx-3">Đánh Giá Sản Phẩm</h3>

</div>
<!--   viet binh luan-->
<?php
//Ssql_bl= "INSERT INTO danh_gia(dg_idkh, dg_email, dg_idsp, dg_bl) VALUES (6,'kh1@gmail.com', 5, 'Sach hay!')
//        ";
//        $binhluan = $_POST['bl'];
//        $idkh = $_POST['id'];
//
//        if (isset($_SESSION['kh_email'])) {
//            $email = $_SESSION['kh_email'];
//        } else header("location:dangnhap.html");
//        $sql_dg = "SELECT * FROM khach_hang as a join danh_gia as b on a.kh_id=b.dg_idkh
//                                                     join sanpham as c on c.sp_id=b.dg_idsp
//                                                     join hoa_don as d on a.kh_id-d.hd_idkh
//                             WHERE (kh_email =$email) AND hd_trangthai=4";
//        $sql_bl = "INSERT INTO danh_gia VALUES ('$idkh', '$binhluan', )"
?>
<form action="#" method="get">
    <div class="md-form">
        <i class="fas fa-pencil-alt prefix"></i>
        <textarea type="text" id="form11" class="md-textarea form-control" rows="3" name="bl"></textarea>
        <label for="form11">Viết bình luận ...</label>
<!--        <input type="hidden" name="emailkh" value="--><?php //echo $email; ?><!--">-->
        <input type="hidden" name="idsp"  value="<?php echo $id; ?>" >
        <button type="submit"
                class="btn blue-gradient btn-rounded waves-effect waves-light btn-sm"
                "
        />
        Gửi đánh giá
        </button>

    </div>
</form>
<!--   viet binh luan-->
<!--<script>-->
<!--    function check() {-->
<!--        var id = document.getElementById("idkh").value;-->
<!--        return id.test(id)-->
<!--    }-->
<!--</script>-->
</body>
</html>