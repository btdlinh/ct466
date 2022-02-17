<!-- Grid column -->
<div class="col-md-3">
    <div class="md-form">
        <!--form the loai-->
        <div class="col-xl-auto">
            <!-- Name -->
            <select
                class="custom-select custom-select-md mb-3"
                name="idnn"
                value="<?php echo $row3['ncc_ten']?>"
            >
                <option> Nhà Cung Cấp</option>
                <?php
                if ($result3->num_rows > 0) {
                    while ($row3 = $result5->fetch_assoc()) {
                        if ($row3['ncc_id'] == $row4['sp_idncc']) {
                            echo "<option value=" . $row3['ncc_id'] . " selected >" . $row3['ncc_ten'] . "  </option>";
                        } else
                            echo "<option value=" . $row3['ncc_id'] . ">" . $row3['ncc_ten'] . "</option>";

                    }
                }
                ?>

            </select>
        </div>
        <!--form the loai-->
    </div>
    <div>
        <p id="tbnn" class="error"></p>
    </div>
</div>
<!-- Grid column -->