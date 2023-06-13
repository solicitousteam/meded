<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<div class="container py-5 banner-req">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Banner Request</h4>
            <form class="required-form" action="<?php echo site_url('home/save_banner_request'); ?>" method="post"
                enctype="multipart/form-data">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">First Name</label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Organisation</label>
                            <select type="text" class="form-control" name="organisation" required>
                                <option value="">Select</option>
                                <option value="hospitals">Hospitals</option>
                                <option value="institutions">Institions</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Duration</label>
                            <select type="text" class="form-control" name="duration" required>
                                <option value="">Select</option>
                                <option value="weekly">Weekly</option>
                                <option value="monthly">Monthly</option>
                                <option value="quaterly">Quaterly</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">From Date</label>
                            <input type="text" class="form-control datepicker" name="from_date" required
                                style="padding-left: 1rem;">
                        </div>
                    </div>



                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">To Date</label>
                            <input type="text" class="form-control datepicker" name="to_date" required
                                style="padding-left: 1rem;">
                        </div>
                    </div> -->
                </div>
                <div class="input-daterange datepicker row" id="datepicker">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">From Date</label>
                            <input type="text" class="form-control" name="from_date" required placeholder="from date"
                                style="border-radius: 30px;text-align: left;">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">To Date</label>
                            <input type="text" class="form-control " name="to_date" required placeholder="To date"
                                style="border-radius: 30px;text-align: left;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Website Link</label>
                            <input type="url" class="form-control" name="website" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Main concept of your banner</label>
                            <input type="text" class="form-control" name="concept" required>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" required id="document" name="document"
                                        onchange="changeTitleOfImageUploader(this)">
                                    <label class="custom-file-label" for="document"
                                        style="padding-left: 1rem!important;padding-top: 0.4rem;">Image</label>
                                </div>
                            </div>
                            <small id="attachment-help"
                                class="form-text text-muted"><?php echo get_phrase('if_any_document_you_want_to_share'); ?>
                                (.png, .jpg, jpeg)<?php echo get_phrase('are_accepted'); ?></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="text-center">
                            <div class="mb-3 mt-3">
                                <button type="submit" class="btn btn-primary text-center "
                                    style="border-radius:30px; min-width:200px; margin:auto; text-align:center"
                                    onclick="checkRequiredFields()"><?php echo get_phrase('apply'); ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
$('.datepicker').datepicker({
    autoclose: true,
    startDate: '0d',
    format: "dd-mm-yyyy",
});
</script>
<style>
.form-control,
.custom-file-input {
    border-radius: 30px;
}

.banner-req label {
    margin: 0;
    padding: 0;
    margin-bottom: 5px;
    color: #444;
    font-weight: 500;
}

.custom-file-label {
    border-radius: 30px !important;
    overflow: hidden;
    padding-left: 30px;
}

.banner-req {
    max-width: 800px;
}
</style>