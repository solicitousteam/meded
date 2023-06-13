<?php
//$GetCountryData = $this->db->get('countries')->result();
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                     <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                      <img src="<?= base_url()?>uploads/coach (1).png" style="height: 44px; width: 44px;"alt="user-image"> 
                     <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3"><?php echo get_phrase('instructor_add_form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('admin/instructors/add'); ?>" enctype="multipart/form-data" method="post">
                    <div id="basicwizard">
                        <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                            <li class="nav-item">
                                <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('basic_info'); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#login_credentials" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-lock mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('login_credentials'); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#social_information" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-wifi mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('Address'); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#payment_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-face-profile mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('Job Information'); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                    <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('finish'); ?></span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content b-0 mb-0">

                            <!--<div id="bar" class="progress mb-3" style="height: 7px;">-->
                            <!--    <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>-->
                            <!--</div>-->

                            <div class="tab-pane" id="basic_info">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="first_name"><?php echo get_phrase('first_name'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control tab-1" id="first_name" name="first_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="last_name"><?php echo get_phrase('last_name'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control tab-1" id="last_name" name="last_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="birth_date"><?php echo get_phrase('Date of Birth'); ?><span class="required" >*</span></label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control tab-1" id="birth_date" name="birth_date" onfocusout="validatedate(this)"  min="1900-01-01" max="<?=date('Y-m-d')?>"  required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="mobile"><?php echo get_phrase('Mobile'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control tab-1" id="mobile" name="mobile" required maxlength="10">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="user_image"><?php echo get_phrase('user_image'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="user_image" name="user_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                        <label class="custom-file-label" for="user_image"><?php echo get_phrase('choose_user_image'); ?><span class="required">*</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php /*?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="biography"><?php echo get_phrase('Tell us more about yourself'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <textarea type="text" class="form-control" id="biography" name="biography" required></textarea>
                                            </div>
                                        </div>
                                        <?php */?>
                                        
                                        <h3>Emergency Contact Details</h3>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="emergency_first_name"> <?php echo get_phrase('First Name'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="emergency_first_name" name="emergency_first_name" class="form-control tab-1" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="emergency_last_name"> <?php echo get_phrase('Last Name'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="emergency_last_name" name="emergency_last_name" class="form-control tab-1">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="emergency_mobile"><?php echo get_phrase('Mobile'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="emergency_mobile" name="emergency_mobile" class="form-control tab-1" required>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <ul class="list-inline mb-0  text-center">
                                    <li class="next list-inline-item">
                                     <button type="button" onclick="return verifyrequired('tab-1','login_credentials');" class="btn btn-info"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-pane" id="login_credentials">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="email"><?php echo get_phrase('email'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text"oninput="if(this.value.length>0){$(this).attr('type','email');}" id="email" name="email" class="form-control tab-2" required>
                                            <div style="color:red" id="email_error_message"></div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="password"><?php echo get_phrase('password'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" oninput="if(this.value.length>0){$(this).attr('type','password');}" id="password" name="password" class="form-control tab-2" required>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <ul class="list-inline wizard mb-0  text-center">
                                    <li class="  previous list-inline-item">
                                        <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
                                    </li>
                                    
                                    <li class="list-inline-item">
                                        <a href="javascript::" class="btn btn-info" onclick="return verifyrequired('tab-2','social_information');"> <i class="mdi mdi-arrow-right-bold"></i> </a>
                                    </li>
                                   
                                </ul>
                                 
                            </div>

                            <div class="tab-pane" id="social_information">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="address_1"> <?php echo get_phrase('Address'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" required id="address_1" name="address_1" class="form-control tab-3">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="address_2"> <?php echo get_phrase('Street Address'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" required id="address_2" name="address_2" class="form-control tab-3">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="city"> <?php echo get_phrase('City'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" required id="city" name="city" class="form-control tab-3">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="state"><?php echo get_phrase('State'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" required id="state" name="state" class="form-control  tab-3">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="zip"><?php echo get_phrase('Zip'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" required id="zip" name="zip" class="form-control tab-3">
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <ul class="list-inline mb-0 wizard text-center">
                                    <li class="previous list-inline-item">
                                        <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
                                    </li>
                                    <li class=" list-inline-item">
                                        <a href="javascript::" onclick="return verifyrequired('tab-3','payment_info');" class="btn btn-info"> <i class="mdi mdi-arrow-right-bold"></i> </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="tab-pane" id="payment_info">
                                <div class="row">
                                    <div class="col-12">
                                        <?php /*?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="job_title"><?php echo get_phrase('Title'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="job_title" name="job_title" class="form-control" required>
                                            </div>
                                        </div>
                                        <?php */?>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="profession"><?php echo get_phrase('Department'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input required id="profession" name="profession" class="form-control tab-4" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="working_pattern"><?php echo get_phrase('Working Type'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select id="working_pattern" name="working_pattern" required class="form-control tab-4">
                                                    <option value="">Select</option>
                                                    <option value="Full time">Full Time</option>
                                                    <option value="Part time">Part Time</option>
                                                    <option value="Remote">Remote</option>
                                                    <option value="On call">On Call</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="year_of_experience"><?php echo get_phrase('Years of Exprience'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input required type="text" id="year_of_experience" name="year_of_experience" class="form-control tab-4">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="working_currently"><?php echo get_phrase('Current Employer/Organisation'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input required type="text" id="working_currently" name="working_currently" class="form-control tab-4">
                                            </div>
                                        </div>
                                        <?php /*?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="job_graduation_certificate"><?php echo get_phrase('Graduation Certificate'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input required type="file" id="job_graduation_certificate" name="job_graduation_certificate" class="form-control" required>
                                            </div>
                                        </div>
                                        <?php */?>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="teaching_experience"><?php echo get_phrase('Do you have Online/Offline Teaching experience?'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select required id="teaching_experience" name="teaching_experience" class="form-control tab-4">
                                                    <option value="">Select</option>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="year_of_experience"><?php echo get_phrase('If YES How many years of teaching experience?'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input required type="text" id="year_of_experience" name="year_of_experience" class="form-control tab-4">
                                            </div>
                                        </div>
                                        
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <ul class="list-inline mb-0 wizard text-center">
                                    <li class="previous list-inline-item">
                                        <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
                                    </li>
                                    <li class=" list-inline-item">
                                        <a href="javascript::" onclick="return verifyrequired('tab-4','finish');" class="btn btn-info"> <i class="mdi mdi-arrow-right-bold"></i> </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="tab-pane" id="finish">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                            <h3 class="mt-0"><?php echo get_phrase('thank_you'); ?> !</h3>

                                            <p class="w-75 mb-2 mx-auto"><?php echo get_phrase('you_are_just_one_click_away'); ?></p>

                                            <div class="mb-3">
                                                <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button"><?php echo get_phrase('submit'); ?></button>
                                            </div>
                                            <ul class="list-inline mb-0 wizard">
                                                <li class="previous list-inline-item">
                                                    <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                        </div> <!-- tab-content -->
                    </div> <!-- end #progressbarwizard-->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>

<script>

function validatedate(inputText)
{

}


function verifyrequired(tab, next_tab)
{
    
  
   


    var error = 0;
    $("." + tab).each(function() {
        if($(this).val().length <= 0)
        {
            error++;
        }
    });

    if(error > 0)
    {   
        // alert('fill all data');
        error_required_field();
        return false;
    }
    else
    {
        $('a[href="#' + next_tab + '"]').trigger('click');
    }
}


function valid_email() {
  var valid = $("#email")[0].checkValidity();
  if (valid) {
    $("#email").css("border", "1px solid green");
    $("#email").css("border", "1px solid green");
    $("#email_error_message").hide();
    
    $('.list-inline-item').show();
    
  } else {
       $('.list-inline-item').hide();
    $("#email").css("border", "1px solid red");
    $("#email_error_message").show();
    $("#email_error_message").html("please provide a vallid email address");
  }
}

$('#email').on('keyup', valid_email)


</script>
