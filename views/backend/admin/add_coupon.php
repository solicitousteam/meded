<?php
$Courses = $this->db->get('course')->result_array();
/*
?>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php */?>
<link rel="stylesheet" href="<?= base_url('assets/backend/bootstrap-select2/css/bootstrap-select.min.css');?>">
<link rel="stylesheet" href="<?= base_url('assets/backend/select2/css/select2.min.css');?>">
<style>
.select2-selection--single {
    height: 38px !important;
}

.select2-selection__rendered {
    line-height: 38px !important;
}

.select2 {
    border-color: #dfe3e6 !important;
}

#student_div {
    display: none;
}
</style>
<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                    <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                    <img src="<?= base_url(); ?>uploads/gift-card.png" style="height: 44px; width: 44px;"
                        alt="user-image">
                    <?php echo get_phrase('add_new_coupon'); ?>
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
                    <h4 class="mb-3 header-title"><?php echo get_phrase('coupon_add_form'); ?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/coupon/add'); ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Promo code<span class="required">*</span></label>
                            <select name="promocode_name" class="form-control select2" required>
                                <option value="">--Select Code--</option>
                                <option value="Instant Promo code">Instant Promo code</option>
                                <option value="Periodcal Promo code">Periodical Promo code</option>
                                <option value="Return Promo code">Return Promo code (Applicable for particular student)
                                </option>
                                <option value="Other Promo codes">Other Promo codes</option>
                            </select>
                        </div>
                        <div class="form-group" id="student_div">
                            <label>Student<span class="required">*</span></label>
                            <select name="student" class="form-control select2">
                                <option value="">--Select Student--</option>
                                <?php
                                foreach ($students->result_array() as $key => $value) : ?>
                                <option value="<?= $value['id'] ?>">
                                    <?= $value['first_name'] . ' ' .  $value['last_name'] ?></option>
                                <?php endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Code<span class="required">*</span></label>
                            <input type="text" name="code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Course<span class="required">*</span></label>
                            <select name="courses_id" class="form-control select2" required>
                                <option value="0">All</option>
                                <?php
                                foreach ($Courses as $CRS) {
                                ?>
                                <option value="<?php echo $CRS["id"] ?>"><?php echo $CRS["title"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="coupon_type" value="1" checked> Fixed &nbsp;
                            <input type="radio" name="coupon_type" value="2"> Percentage
                        </div>
                        <div class="form-group">
                            <label>Amount<span class="required">*</span></label>
                            <input type="number" name="coupon_amount" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Expiry Date<span class="required">*</span></label>
                            <input type="text" name="expiry_date" class="form-control datepicker" data-min="<?= date('d-m-Y');?>" required>
                        </div>
                        <div class="form-group">
                            <label>Status<span class="required">*</span></label>
                            <select name="status" class="form-control select2" required>
                                <option value="1">Active</option>
                                <option value="2">Disabled</option>
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
<script src="<?= base_url('assets/backend/bootstrap-select2/js/bootstrap-select.min.js');?>"></script>
<script src="<?= base_url('assets/backend/select2/js/select2.min.js');?>"></script>
<?php /*?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php */?>
<script>
$('.datepicker').datepicker({
    autoclose: true,
    startDate: '0d',
    format: "dd-mm-yyyy",
});
$(function() {
    $('.select-picker').select2();
    $(document).on('change', 'select[name=promocode_name]', function() {
        if ($(this).val() === 'Return Promo code') {
            $('#student_div').slideDown();
            $('select[name=student]').attr('required', true);
        } else {
            $('#student_div').slideUp();
            $('select[name=student]').val('').change();
            $('select[name=student]').attr('required', false);
        }
    });
});


 $('.select2').select2({
    dropdownParent: $('body')
});
</script>