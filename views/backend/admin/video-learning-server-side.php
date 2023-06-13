<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                     <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                     <img src="<?=base_url(); ?>/uploads/online-learning.png" style="height: 34px; width: 30px;"alt="user-image">
                     <?php echo get_phrase('video courses'); ?>
                    <a href="<?php echo site_url('admin/course_form/video_learning'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_video_course'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
     <img src="<?=base_url(); ?>/uploads/Bannersmeded-02.jpg" style="height: 260px; width: 100%;"alt="user-image">
<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col">
                        <a href="<?php echo site_url('admin/courses_list?status=active&category_type=3'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <!--<i class="dripicons-link text-muted" style="font-size: 24px;"></i>-->
                                    <img src="<?=base_url(); ?>/uploads/verified-user.png" style="height: 44px; width: 44px;"alt="user-image">
                                    <h3><span>
                                        <?php
                                            $active_courses = $this->crud_model->course_count('active',3);
                                         echo  count($active_courses);
                                         ?>
                                    </span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('active_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="<?php echo site_url('admin/courses_list?status=pending&category_type=3'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <!--<i class="dripicons-link-broken text-muted" style="font-size: 24px;"></i>-->
                                    <img src="<?=base_url(); ?>/uploads/clock.png" style="height: 44px; width: 44px;"alt="user-image">
                                    <h3><span>
                                <?php
                                            $active_courses = $this->crud_model->course_count('pending',3);
                                            echo count($active_courses);
                                         ?>
                            </span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('pending_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                  

                    <div class="col">
                        <a href="<?php echo site_url('admin/courses_list?is_free=free&category_type=3'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <!--<i class="dripicons-star text-muted" style="font-size: 24px;"></i>-->
                                    <img src="<?=base_url(); ?>/uploads/free.png" style="height: 44px; width: 44px;"alt="user-image">
                                    <h3><span><?php echo $this->crud_model->get_free_and_paid_courses('free',0,3)->num_rows(); ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('free_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col">
                        <a href="<?php echo site_url('admin/courses_list?is_free=paid&category_type=3'); ?>" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <!--<i class="dripicons-tags text-muted" style="font-size: 24px;"></i>-->
                                    <img src="<?=base_url(); ?>/uploads/paid.png" style="height: 44px; width: 44px;"alt="user-image">
                                    <h3><span><?php echo $this->crud_model->get_free_and_paid_courses('paid',0,3)->num_rows(); ?></span></h3>
                                    <p class="text-muted font-15 mb-0"><?php echo get_phrase('paid_courses'); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('video_course_list'); ?></h4>
                <form class="row" id="filter-form" action="<?php echo site_url('admin/video_learning'); ?>" method="get">
                    <!-- Course Categories -->
                    <div class="col-xl-5">
                        <div class="form-group">
                            <label for="category_id"><?php echo get_phrase('department'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="category_id"
                                id="category_id">
                                <option value="<?php echo 'all'; ?>"
                                    <?php if ($selected_category_id == 'all') echo 'selected'; ?>>
                                    <?php echo get_phrase('all'); ?></option>
                                <?php foreach ($categories->result_array() as $category) : ?>
                                <optgroup label="<?php echo $category['name']; ?>">
                                    <?php $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                                        foreach ($sub_categories as $sub_category) : ?>
                                    <option value="<?php echo $sub_category['id']; ?>"
                                        <?php if ($selected_category_id == $sub_category['id']) echo 'selected'; ?>>
                                        <?php echo $sub_category['name']; ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Course Status -->
                    <div class="col-xl-2">
                        <div class="form-group">
                            <label for="status"><?php echo get_phrase('status'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="status" id='status'>
                                <option value="all" <?php if ($selected_status == 'all') echo 'selected'; ?>>
                                    <?php echo get_phrase('all'); ?></option>
                                <option value="active" <?php if ($selected_status == 'active') echo 'selected'; ?>>
                                    <?php echo get_phrase('active'); ?></option>
                                <option value="pending" <?php if ($selected_status == 'pending') echo 'selected'; ?>>
                                    <?php echo get_phrase('pending'); ?></option>
                            </select>
                        </div>
                    </div>

                    <!-- Course Instructors -->
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="instructor_id"><?php echo get_phrase('instructor'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="instructor_id"
                                id='instructor_id'>
                                <option value="all" <?= ($selected_instructor_id == 'all') ? ' selected ' : ' '; ?>>all</option>
                                <?php
                                $instructors = $this->db->select('id,first_name,last_name')->from('users')->where('role_id','2')->where('is_instructor','1')->get()->result_array();
                                foreach ($instructors as $instructor)
                                {
                                    echo
                                    '<option value="'.$instructor['id'].'" '.(($selected_instructor_id == $instructor['id']) ? ' selected ' : ' ').'>'.$instructor['first_name'].' '.$instructor['last_name'].'</option>';
                                }?>
                            </select>
                        </div>
                    </div>

                    <!-- Course Price -->
                    <div class="col-xl-2">
                        <div class="form-group">
                            <label for="price"><?php echo get_phrase('price'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="price" id='price'>
                                <option value="all" <?php if ($selected_price == 'all') echo 'selected'; ?>>
                                    <?php echo get_phrase('all'); ?></option>
                                <option value="free" <?php if ($selected_price == 'free') echo 'selected'; ?>>
                                    <?php echo get_phrase('free'); ?></option>
                                <option value="paid" <?php if ($selected_price == 'paid') echo 'selected'; ?>>
                                    <?php echo get_phrase('paid'); ?></option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Course search -->
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="search"><?php echo get_phrase('Search'); ?></label>
                            <input class="form-control " name="search" id = 'search' placeholder="search here" value="<?= $search;?>">
                        </div>
                    </div>
                    
                    <div class="col-xl-2">
                        <label for=".." class="text-white">..</label>
                        <button type="submit" class="btn btn-primary btn-block filter"
                            name="button"><?php echo get_phrase('filter'); ?></button>
                    </div>
                    
                    <div class="col-xl-2">
                        <label for=".." class="text-white">..</label>
                        <!--<button type="button" class="btn btn-warning btn-block" form="filter-form" page="videocourse" onclick="exportdata(this,'excel');">Export To Excel</button>-->
                   
                   
                     
                    <form method="get" action="<?php echo site_url('admin/video_learning'); ?>">
                        <input type="hidden" name="excel" value="excel" id="excel" >
                    <button type="submit" class="btn btn-warning btn-block export" form="filter-form" page="blendedcourse" href="">Export To Excel</button>
                    </form>
                   
                    </div>
                </form>
                <div class="row mt-4">
                <?php if (count($courses) > 0): ?>
                    <?php
                    foreach($courses as $Cours){
                        $UserData = $this->user_model->get_all_user($Cours["user_id"])->row_array();
                        $course = $Cours;
                        ?>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                       <!-- <img src="<?php echo $Cours['thumbnail']; ?>" alt="" style="height: 300px; max-width: 100%;">-->
                                          <img src="<?php echo $Cours['thumbnail']; ?>" alt="" style="height: 300px; max-width: 100%;">
                                     
                                        <h5 class="title"><?php echo $Cours['title']; ?></h5>

                                        <div class="float-left"><?php echo date("M, d", $Cours["date_added"]) ?></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b><?php echo $UserData["first_name"] ?> <?php echo $UserData["last_name"] ?></b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b><?php echo $this->crud_model->get_enrol_student_count($Cours['id']) ?></b></div>
                                        <div class="clearfix"></div>
                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b><?php echo $Cours['status'] ?></b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                               <li><a class="dropdown-item"
                                                href="<?php echo site_url('home/course/' . slugify($Cours['title']) . '/' . $Cours['id']); ?>"
                                                target="_blank">Preview</a></li>
                                       
                                                 <li><a class="dropdown-item" href="<?php echo site_url('admin/start_live_class/'.$Cours['id'].'?sendnotification=1'); ?>" target="_blank">Start Live Class</a></li>

                                              <li><a class="dropdown-item" href="<?php echo site_url('admin/course_form/edit_video_learning/'.$Cours['id']); ?>"><?php echo get_phrase('edit_this_course');?></a></li>
                                              <li>
                                                  <?php if ($Cours['status'] == 'active'): ?>
                                                      
                                                          <a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url();?>admin/change_video_status_for_admin/pending/<?php echo $Cours['id']; ?>/<?php echo $selected_category_id; ?>/<?php echo $selected_instructor_id; ?>/<?php echo $selected_price; ?>/<?php echo $selected_status;?>', '<?php echo get_phrase('inform_instructor'); ?>');">
                                                              <?php echo get_phrase('mark_as_pending');?>
                                                          </a>
                                                  <?php else: ?>   
                                                          <a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url();?>admin/change_video_status_for_admin/active/<?php echo $Cours['id']; ?>/<?php echo $selected_category_id; ?>/<?php echo $selected_instructor_id; ?>/<?php echo $selected_price; ?>/<?php echo $selected_status;?>', '<?php echo get_phrase('inform_instructor'); ?>');">
                                                              <?php echo get_phrase('mark_as_active');?>
                                                          </a>
                                                  <?php endif; ?>
                                              </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/course_actions/deletevideo/'.$course['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                <?php endif; ?>
                <?php if (count($courses) == 0): ?>
                    <div class="img-fluid w-100 text-center">
                      <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                      <?php echo get_phrase('no_data_found'); ?>
                    </div>
                <?php endif; ?>
            </div>
            </div>
        </div>
    </div>
</div>



<script>
    
 
 
 
   $('.filter').click(function () {
               $('#excel').attr('disabled', 'disabled');
            });
            $('.export').click(function () {
               $('#excel').removeAttr('disabled');
            });
    
    
</script>
