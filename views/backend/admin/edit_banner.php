<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('Edit Banner'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('banner_edit_form'); ?></h4>

                <form class="required-form row" action="<?php echo site_url('admin/banner/save_edit/'.$BannerData['banner_id']); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group col-lg-12">
                        <input type="radio" name="BannerType" value="1" <?php if($BannerData['banner_type'] == 1) { ?> checked <?php } ?>> Internal &nbsp;
                        <input type="radio" name="BannerType" value="2" <?php if($BannerData['banner_type'] == 2) { ?> checked <?php } ?>> External
                    </div>

                    <div class="form-group col-lg-12 mb-2">
                        <label for="name"><?php echo get_phrase('banner'); ?><span class="required">*</span></label>
                        <input type="file" class="form-control" id="picture" name = "picture">

                        <img class="mt-1" src="<?php echo $BannerData['banner_img'] ?>" width="300">
                    </div>

                    <div class="form-group col-lg-12">
                        <label>Course</label>
                        <select class="form-control" name="BannerCourse">
                            <option value="">Select Course</option>
                            <?php
                                foreach($courses as $Courses){
                            ?>
                                <option <?php if($BannerData['banner_course'] == $Courses["id"]) { ?> selected <?php } ?> value="<?php echo $Courses["id"] ?>"><?php echo $Courses["title"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="name">From Date</label>
                        <input id="date_picker" type="date" class="form-control" name="from_date" value="<?php echo $BannerData['from_date']?>">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="name">To Date</label>
                        <input type="date" class="form-control" name="to_date" value="<?php echo $BannerData['to_date']?>">
                    </div>
                    <div class="form-group col-lg-12">
                        <label>External Link</label>
                        <input type="url" name="BannerURL" class="form-control" value="<?php echo $BannerData['banner_link']?>">
                    </div>
                    <script language="javascript">
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0');
                        var yyyy = today.getFullYear();
                    
                        today = yyyy + '-' + mm + '-' + dd;
                        $('#date_picker').attr('min',today);
                    </script>
                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

