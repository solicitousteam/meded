<?php
$Courses = $this->db->get('course')->result_array();
?>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                    <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                    <img src="<?= base_url() ?>uploads/advertisement.png" style="height: 44px; width: 44px;"
                        alt="user-image">
                    <?php echo get_phrase('edit_coupon'); ?>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('coupon_edit'); ?></h4>

                    <form class="required-form"
                        action="<?php echo site_url('admin/coupon/save_edit/' . $BannerData['id']); ?>" method="post"
                        enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" name="code" class="form-control" required
                                value="<?php echo $BannerData['code'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Course</label>
                            <select name="courses_id" class="form-control" required>
                                <option value="0">All</option>
                                <?php
                                foreach ($Courses as $CRS) {
                                ?>
                                <option <?php if ($BannerData['course_id'] == $CRS["id"]) { ?> selected <?php } ?>
                                    value="<?php echo $CRS["id"] ?>"><?php echo $CRS["title"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input id="fixed" type="radio" name="coupon_type" value="1"
                                <?php if ($BannerData['discount_percentage'] == "1") { ?> checked <?php } ?>> <label
                                for="fixed">Fixed</label>
                            &nbsp;
                            <input type="radio" name="coupon_type" value="2" id="percentage"
                                <?php if ($BannerData['discount_percentage'] == "2") { ?> checked <?php } ?>> <label
                                for="percentage">Percentage</label>
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" name="coupon_amount" class="form-control" required
                                value="<?php echo $BannerData['amount'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Expiry Date</label>
                            <input type="text" name="expiry_date" class="form-control datepicker" required
                                value="<?php echo $BannerData['expiry_date'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option <?php if ($BannerData['status'] == "1") { ?> selected <?php } ?> value="1">
                                    Active</option>
                                <option <?php if ($BannerData['status'] == "2") { ?> selected <?php } ?> value="2">
                                    Disabled</option>
                            </select>
                        </div>


                        <button type="button" class="btn btn-primary"
                            onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
$('.datepicker').datepicker({
    autoclose: true,
    startDate: '0d',
    format: "dd-mm-yyyy",
});
</script>