<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                 <img src="<?= base_url('/uploads/advertisement.png');?>" style="height: 44px; width: 44px;"alt="user-image"> 
                Add File in Library</h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <form class="required-form" action="<?php echo site_url('user/library/add'); ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="name">File <span class="required">*</span></label>
                        <input type="file" class="form-control" id="picture" name="picture" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Title <span class="required">*</span></label>
                        <input type="text" name="BannerURL" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>