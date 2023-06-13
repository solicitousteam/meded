<div class="card">
    <div class="card-body">
        <h4 class="header-title mb-3">Banner Request</h4>
        <form class="required-form" action="<?php echo site_url('user/save_banner_request'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="<?= (!empty($bannerdata)) ? $bannerdata->first_name : '';?>" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="<?= (!empty($bannerdata)) ? $bannerdata->last_name : '';?>" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= (!empty($bannerdata)) ? $bannerdata->email : '';?>" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Phone</label>
                        <input type="text" class="form-control" name="phone" value="<?= (!empty($bannerdata)) ? $bannerdata->phone : '';?>" required>
                    </div>
                </div>
                <?php /*?>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Course Title</label>
                        <input type="text" class="form-control" name="course_title" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                </div>
                <?php */?>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Organisation</label>
                        <input type="text" class="form-control" name="organisation" value="<?= (!empty($bannerdata)) ? $bannerdata->organisation : '';?>" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Duration</label>
                        <select type="text" class="form-control" name="duration" required>
                            <option value="">Select</option>
                            <option value="Weekly" <?= (!empty($bannerdata) && $bannerdata->duration == 'Weekly') ? ' selected ' : ' ';?> >Weekly</option>
                            <option value="Monthly" <?= (!empty($bannerdata) && $bannerdata->duration == 'Monthly') ? ' selected ' : ' ';?> >Monthly</option>
                            <option value="Quaterly" <?= (!empty($bannerdata) && $bannerdata->duration == 'Quaterly') ? ' selected ' : ' ';?> >Quaterly</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Course Link</label>
                        <input type="text" class="form-control" name="website" value="<?= (!empty($bannerdata)) ? $bannerdata->website : '';?>" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Main concept of your banner</label>
                        <input type="text" class="form-control" name="concept" value="<?= (!empty($bannerdata)) ? $bannerdata->concept : '';?>" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" <?= (empty($bannerdata)) ? ' required ' : ' ';?> id="document" name="document" onchange="changeTitleOfImageUploader(this)">
                                <label class="custom-file-label" for="document">Image</label>
                            </div>
                        </div>
                        <?php
                            if(!empty($bannerdata))
                            {
                                echo
                                '<img src="'.$bannerdata->image.'" width="200" style="margin-top:10px;">';
                            }
                            ?>
                        <small id="attachment-help" class="form-text text-muted"><?php echo get_phrase('if_any_document_you_want_to_share'); ?> (.png, .jpg, jpeg)<?php echo get_phrase('are_accepted'); ?></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">From Date<span class="required">*</span></label>
                            <input type="date" class="form-control date_picker" name="from_date" required="" min="<?= (!empty($bannerdata)) ? $bannerdata->from_date : date('Y-m-d');?>" value="<?= (!empty($bannerdata)) ? $bannerdata->from_date : '';?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">To Date<span class="required">*</span></label>
                            <input type="date" class="form-control date_picker" name="to_date" required="" min="<?= (!empty($bannerdata)) ? $bannerdata->to_date : date('Y-m-d');?>" value="<?= (!empty($bannerdata)) ? $bannerdata->to_date : '';?>">
                            <input type="text" name="banner_id" class="d-none" value="<?= $banner_id?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <div class="mb-3 mt-3">
                            <button type="button" class="btn btn-primary text-center" onclick="checkRequiredFields()"><?php echo get_phrase('apply'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
