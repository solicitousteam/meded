<?php
    $user_data = $this->db->get_where('users', array('id' => $user_id))->row_array();
    // $GetCountryData = $this->db->get('countries')->result();
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                     <i class="mdi mdi-apple-keyboard-command title_icon"></i> 
                     <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3"><?php echo get_phrase('instructor_edit_form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('admin/instructors/edit/'.$user_id); ?>" enctype="multipart/form-data" method="post">
                    <div id="progressbarwizard">
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
                                    <span class="d-none d-sm-inline"><?php echo get_phrase('address'); ?></span>
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

                            <div id="bar" class="progress mb-3" style="height: 7px;">
                                <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                            </div>

                            <div class="tab-pane" id="basic_info">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="first_name"><?php echo get_phrase('first_name'); ?> <span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_data['first_name']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="last_name"><?php echo get_phrase('last_name'); ?> <span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user_data['last_name']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="last_name"><?php echo get_phrase('Date of Birth'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" id="dob" name="dob" required value="<?php echo $user_data['birth_date']; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="last_name"><?php echo get_phrase('Mobile'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" required value="<?php echo $user_data['mobile']; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="user_image"><?php echo get_phrase('user_image'); ?></label>
                                            <div class="col-md-9">
                                                <div class="d-flex">
                                                  <div class="">
                                                      <img class = "rounded-circle img-thumbnail" src="<?php echo $this->user_model->get_user_image_url($user_data['id']);?>" alt="" style="height: 50px; width: 50px;">
                                                  </div>
                                                  <div class="flex-grow-1 mt-1 pl-3">
                                                      <div class="input-group">
                                                          <div class="custom-file">
                                                              <input type="file" class="custom-file-input" name = "user_image" id="user_image" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                                              <label class="custom-file-label ellipsis" for="user_image"><?php echo get_phrase('choose_user_image'); ?></label>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                        <?php /*?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="biography"><?php echo get_phrase('Tell us more about yourself'); ?><span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <textarea type="text" class="form-control" id="biography" name="biography" required><?php echo $user_data['biography']; ?></textarea>
                                            </div>
                                        </div>
                                        <?php */?>
                                        <h3>Emergency Details</h3>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="facebook_link"> <?php echo get_phrase('First Name'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="emergency_first_name" name="emergency_first_name" class="form-control" value="<?php echo $user_data['emergency_first_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="facebook_link"> <?php echo get_phrase('Last Name'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="emergency_last_name" name="emergency_last_name" class="form-control" value="<?php echo $user_data['emergency_last_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="stripe_public_key"><?php echo get_phrase('Mobile'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="stripe_public_key" name="emergency_mobile" class="form-control" value="<?php echo $user_data['emergency_mobile']; ?>">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <ul class="list-inline mb-0 wizard text-center">
                                    <li class="next list-inline-item">
                                        <a href="javascript::" class="btn btn-info">Next</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-pane" id="login_credentials">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="email"> <?php echo get_phrase('email'); ?> <span class="required">*</span> </label>
                                            <div class="col-md-9">
                                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $user_data['email']; ?>" required>
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <ul class="list-inline mb-0 wizard text-center">
                                    <li class="previous list-inline-item">
                                        <a href="javascript::" class="btn btn-info">Previous</a>
                                    </li>
                                    <li class="next list-inline-item">
                                        <a href="javascript::" class="btn btn-info">Next</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-pane" id="social_information">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="address_1"> <?php echo get_phrase('Address'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="address_1" name="address_1" class="form-control" value="<?php echo $user_data['address_1']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="address_2"> <?php echo get_phrase('Street Address'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="address_2" name="address_2" class="form-control" value="<?php echo $user_data['address_2']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="city"> <?php echo get_phrase('City'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="city" name="city" class="form-control" value="<?php echo $user_data['city']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="state"><?php echo get_phrase('State'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="state" name="state" class="form-control" value="<?php echo $user_data['state']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="linkedin_link"><?php echo get_phrase('Zip'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="zip" name="zip" class="form-control" value="<?php echo $user_data['zip']; ?>">
                                            </div>
                                        </div>
                                        <!--<div class="form-group row mb-3">-->
                                        <!--    <label class="col-md-3 col-form-label" for="country"><?php echo get_phrase('Country'); ?></label>-->
                                        <!--    <div class="col-md-9">-->
                                        <!--        <select id="country" name="country" class="form-control">-->
                                        <!--            <option value="">Select</option>-->
                                        <!--            <?php /*-->
                                        <!--            foreach($GetCountryData as $GCD){-->
                                        <!--            ?>-->
                                        <!--            <option <?php if($user_data['country'] == $GCD->name) { ?> selected <?php } ?>><?php echo $GCD->name?></option>-->
                                        <!--            <?php-->
                                        <!--            }-->
                                        <!--             */ ?>-->
                                        <!--        </select>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        
                                        
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <ul class="list-inline mb-0 wizard text-center">
                                    <li class="previous list-inline-item">
                                        <a href="javascript::" class="btn btn-info">Previous</a>
                                    </li>
                                    <li class="next list-inline-item">
                                        <a href="javascript::" class="btn btn-info">Next</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="tab-pane" id="payment_info">
                                <div class="row">
                                    <div class="col-12">
                                        <?php /*?>
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="job_title"><?php echo get_phrase('Title'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="job_title" name="job_title" class="form-control" value="<?php echo $user_data['job_title']; ?>">
                                            </div>
                                        </div>
                                        <?php */?>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="profession"><?php echo get_phrase('Department'); ?></label>
                                            <div class="col-md-9">
                                                <input id="profession" name="profession" class="form-control" value="<?= $user_data['profession']?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="working_pattern"><?php echo get_phrase('Working Type'); ?></label>
                                            <div class="col-md-9">
                                                <select id="working_pattern" name="working_pattern" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Full time" <?php if($user_data['working_pattern'] == "Full time") { ?> selected <?php } ?>>Full Time</option>
                                                    <option value="Part time" <?php if($user_data['working_pattern'] == "Part time") { ?> selected <?php } ?>>Part Time</option>
                                                    <option value="Remote" <?php if($user_data['working_pattern'] == "Remote") { ?> selected <?php } ?>>Remote</option>
                                                    <option value="On call" <?php if($user_data['working_pattern'] == "On call") { ?> selected <?php } ?>>On Call</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="year_of_experience"><?php echo get_phrase('Years of Exprience'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="year_of_experience" name="year_of_experience" class="form-control" value="<?php echo $user_data['year_of_experience']; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="working_currently"><?php echo get_phrase('Current Employer/Organisation'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="working_currently" name="working_currently" class="form-control" value="<?php echo $user_data['working_currently']; ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="teaching_experience"><?php echo get_phrase('Graduation Certificate'); ?></label>
                                            <div class="col-md-9">
                                                <input type="file" id="teaching_experience" name="teaching_experience" class="form-control">
                                                <div class="">
                                                  <img src="<?php echo $this->user_model->get_user_certificate_url($user_data['id']);?>" alt="" style="height: 100px;">
                                              </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="teaching_experience"><?php echo get_phrase('Do you have Online/Offline Teaching experience?'); ?></label>
                                            <div class="col-md-9">
                                                <select id="teaching_experience" name="teaching_experience" class="form-control" value="<?php echo $user_data['teaching_experience']; ?>">
                                                    <option value="">Select</option>
                                                    <option value="YES" <?php if($user_data['teaching_experience'] == "YES") { ?> selected <?php } ?>>Yes</option>
                                                    <option value="NO" <?php if($user_data['teaching_experience'] == "NO") { ?> selected <?php } ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row mb-3">
                                            <label class="col-md-3 col-form-label" for="year_of_experience"><?php echo get_phrase('If YES How many years of teaching experience?'); ?></label>
                                            <div class="col-md-9">
                                                <input type="text" id="year_of_experience" name="year_of_experience" class="form-control" value="<?php echo $user_data['year_of_experience']; ?>">
                                            </div>
                                        </div>
                                        
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <ul class="list-inline mb-0 wizard text-center">
                                    <li class="previous list-inline-item">
                                        <a href="javascript::" class="btn btn-info">Previous</a>
                                    </li>
                                    <li class="next list-inline-item">
                                        <a href="javascript::" class="btn btn-info">Next</a>
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
                                                    <a href="javascript::" class="btn btn-info">Previous</a>
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
