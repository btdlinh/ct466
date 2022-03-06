<html>
<body>

<div class="divider-new">

    <h3 class="h3-responsive font-weight-bold blue-text mx-3">Đánh Giá Sản Phẩm</h3>

</div>
<!--   viet binh luan-->

<form action="xuly_vietdanhgia.php" method="get">
    <div class="md-form-8">


        <label for="form12">Email</label>

        <input type="text" id="form12" class="md-textarea form-control m-3" rows="2" name="tenkh" placeholder="...@gmail.com">

<!--        <i class="fas fa-pencil-alt prefix"></i>-->
        <label for="form12">Bình luận</label>
        <textarea type="text" id="form11" class="md-textarea form-control m-3" rows="3" name="binhluan" placeholder="Viết bình luận ..."></textarea>

        <input type="hidden" name="idsp"  value="<?php echo $id; ?>" >
        <button type="submit"
                class="btn blue-gradient btn-rounded waves-effect waves-light btn-sm"
                value="Gửi bình luận "
                name="guibinhluan"

        >
        Gửi bình luận
        </button>

    </div>
</form>
</body>
</html>