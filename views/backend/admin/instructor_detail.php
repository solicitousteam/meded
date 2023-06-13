<style>
    .col-md-6 > div.mb-3{
        border: 1px solid #dee2e6;
        padding: 5px;
    }
    .col-md-6 > div.mb-3 > span{
        
    }
    .image-div{
        width: 100%;
        height: 175px;
        display: flex;
        justify-content: center;
        padding:10px;
    }
    .image-div > a{
        width:100%;
        height:100%;
        display: contents;
    }
    .image-div > a > img, .image-div > a > iframe{
        width: auto;
        height: inherit;
    }
</style>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                     <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                      <img src="<?= base_url('/uploads/coach (1).png')?>" style="height: 44px; width: 44px;"alt="user-image"> 
                     <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3"><?php echo get_phrase('instructor_detail'); ?></h4>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label" for="first_name"><?php echo get_phrase('first_name'); ?></label>
                                <input class="form-control" value="<?= $userdata['first_name'];?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="first_name"><?php echo get_phrase('last_name'); ?></label>
                                <input class="form-control" value="<?= $userdata['last_name'];?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="first_name"><?php echo get_phrase('Mobile'); ?></label>
                                <input class="form-control" value="<?= $userdata['mobile'];?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="first_name"><?php echo get_phrase('Email'); ?></label>
                                <input class="form-control" value="<?= $userdata['email'];?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="first_name"><?php echo get_phrase('Emergency Mobile'); ?></label>
                                <input class="form-control" value="<?= $userdata['emergency_mobile'];?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label" for="first_name"><?php echo get_phrase('Organisation Email'); ?></label>
                                <input class="form-control" value="<?= $userdata['organisation_email'];?>" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 text-center">
                                <div class="mb-3">
                                    <lable class="col-form-label">Profile Image</lable>
                                    <?php
                                    $image_url = (!empty($userdata['image']) && file_exists('uploads/user_image/'.$userdata['image'])) ? $userdata['image'] : 'no_image.png';?>
                                    <div class="image-div">
                                        <a>
                                            <img src="<?= base_url('uploads/user_image/'.$image_url);?>">
                                        </a>
                                    </div>
                                    <span><a href="<?= base_url('uploads/user_image/'.$image_url);?>" download>Click Here If You Want To Download</a></span>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="mb-3">
                                    <lable class="col-form-label">Aadhar Image</lable>
                                    <?php
                                    $image_url = 'no_image.png';
                                    $tag = 'img';
                                    if(!empty($userdata['user_aadhar_image']) && file_exists('uploads/user_image/'.$userdata['user_aadhar_image']))
                                    {
                                        $image_url = $userdata['user_aadhar_image'];
                                        $tag = (in_array(explode('.',$userdata['user_aadhar_image'])[1],['png','jpeg','jpg','webp','gif'])) ? $tag : 'iframe';
                                    }?>
                                    <div class="image-div">
                                        <a>
                                            <<?=$tag?> src="<?= base_url('uploads/user_image/'.$image_url);?>"></<?=$tag?>>
                                        </a>
                                    </div>
                                    <span><a href="<?= base_url('uploads/user_image/'.$image_url);?>" download>Click Here If You Want To Download</a></span>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="mb-3">
                                    <lable class="col-form-label">Document Image</lable>
                                    <?php
                                    $image_url = 'no_image.png';
                                    $tag = 'img';
                                    if(!empty($userdata['document_file']) && file_exists('uploads/user_image/'.$userdata['document_file']))
                                    {
                                        $image_url = $userdata['document_file'];
                                        $tag = (in_array(explode('.',$userdata['document_file'])[1],['png','jpeg','jpg','webp','gif'])) ? $tag : 'iframe';
                                    }?>
                                    <div class="image-div">
                                        <a>
                                            <<?=$tag?> src="<?= base_url('uploads/user_image/'.$image_url);?>"></<?=$tag?>>
                                        </a>
                                    </div>
                                    <span><a href="<?= base_url('uploads/user_image/'.$image_url);?>" download>Click Here If You Want To Download</a></span>
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="mb-3">
                                    <lable class="col-form-label">Other Supporting Document Image</lable>
                                    <?php
                                    $image_url = 'no_image.png';
                                    $tag = 'img';
                                    if(!empty($userdata['other_supporting_file']) && file_exists('uploads/user_image/'.$userdata['other_supporting_file']))
                                    {
                                        $image_url = $userdata['other_supporting_file'];
                                        $tag = (in_array(explode('.',$userdata['other_supporting_file'])[1],['png','jpeg','jpg','webp','gif'])) ? $tag : 'iframe';
                                    }?>
                                    <div class="image-div">
                                        <a>
                                            <<?=$tag?> src="<?= base_url('uploads/user_image/'.$image_url);?>"></<?=$tag?>>
                                        </a>
                                    </div>
                                    <span><a href="<?= base_url('uploads/user_image/'.$image_url);?>" download>Click Here If You Want To Download</a></span>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                
                
                
                <div class="row">
                    <div class="col-md-6">
                           <lable class="col-form-label">Address</lable>
                          <input class="form-control" value="<?= $userdata['address_1'];?>" readonly>
                          <br>
                        
                         <lable class="col-form-label">Street Address</lable>
                         <input class="form-control" value="<?= $userdata['address_2'];?>" readonly>
                         <br>
                          <lable class="col-form-label">City</lable>
                         <input class="form-control" value="<?= $userdata['city'];?>" readonly>
                          <br>
                          <lable class="col-form-label">State</lable>
                         <input class="form-control" value="<?= $userdata['state'];?>" readonly>
                         <br>
                         <lable class="col-form-label">Zip</lable>
                         <input class="form-control" value="<?= $userdata['zip'];?>" readonly>
                        
                    </div>
                    
                    <div class="col-md-6">
                        
                         <lable class="col-form-label">Department</lable>
                          <input class="form-control" value="<?= $userdata['profession'];?>" readonly>
                          <br>
                          
                          <lable class="col-form-label">Working type</lable>
                          <input class="form-control" value="<?= $userdata['working_pattern'];?>" readonly>
                          <br>
                          
                             <lable class="col-form-label">Current employer/organisation</lable>
                          <input class="form-control" value="<?= $userdata['working_currently'];?>" readonly>
                          <br>
                          
                             <lable class="col-form-label">Do you have online/offline teaching experience?*</lable>
                          <input class="form-control" value="<?= $userdata['teaching_experience'];?>" readonly>
                          <br>
                        
                        
                        
                    </div>
                    
                    
                    
                </div>
                
                
                
                
                <!-- end row -->
                <a href="<?= base_url('admin/approve_intructor/'.$userdata['id']); ?>" class="btn btn-success my-2">Approve</a>
                
                <a href="<?= base_url('admin/'.((isset($_GET['all'])) ? 'instructors' : 'registrated_instructor')) ?>" class="btn btn-warning my-2">Back To List</a>
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>