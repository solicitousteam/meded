<style>
    .header-access-btn{
        position: absolute;
        right: 5px;
        width: 30px;
        min-width: auto;
        bottom: 20px;
        border: 2px solid #2d368e;
        padding: 2px;
        height: 30px;
        color: #2d368e;
    }
    
    .visit_website {
    padding: calc(32px / 2) 0;
    overflow: inherit;
}
    
    @media  (min-width: 400px) and (max-width: 450px){
        a.btn.btn-outline-light.ml-3{
            margin-left: 60px !important;
        }
    }
    
</style>

<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid-new-header">
        <!-- LOGO -->
       
        <a href="<?php echo site_url($this->session->userdata('role')); ?>" class="topnav-logo" style = "min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('light_logo'));?>" alt="" height="70">
            </span>
            <span class="topnav-logo-sm">
                <img src="<?php echo base_url('uploads/system/'.get_frontend_settings('small_logo'));?>" alt="" height="70">
            </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">
            <?php if($this->session->userdata('is_instructor') == 1 || $this->session->userdata('admin_login') == 1): ?>
             <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false" style="margin-top: 50%;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-bell">
                        <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0">
                        </path>
                    </svg>
                    <span id="header-count-notification" style="display:none;position: absolute;font-size: 12px;top: 10px;padding: 3px 0px;background: #2c3691;border-radius: 30px;height: 25px;width: 25px;font-weight: bold;color: #f58220;right:0;"></span>
                </a>
                <div class="noti-all-section dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg p-0 mt-5 border-top-0"
                    x-placement="bottom-end"
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-278px, 70px, 0px);">

                    <div class="rounded-top border-bottom bg-primary text-center">
                        <h4 class="text-center text-white mt-0 p-2">Notifications</h4>
                        <button class="btn btn-success mb-1" onclick="markasread('0')">
                        Set Mark as read to All
                        </button>
                    </div>

                    <div class="row row-paddingless header-notification-section" style="display:none;padding-left: 5px; padding-right: 5px;height:330px!important;overflow:auto;margin:0px;">
                        
                    </div>
                </div>
            </li>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" href="<?= (!empty($_SESSION['admin_login'])) ? base_url('admin/message?type=instructor') : base_url('home/my_messages');?>" role="button"
                    aria-haspopup="false" aria-expanded="false" style="margin-top: 50%;">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="24" height="24" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg>
                    <span id="header-count-message" style="display:none;position: absolute;font-size: 12px;top: 10px;padding: 3px 0px;background: #2c3691;border-radius: 30px;height: 25px;width: 25px;font-weight: bold;color: #f58220;right:0;"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg p-0 mt-5 border-top-0 d-none"
                    x-placement="bottom-end"
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-278px, 70px, 0px);">

                    <div class="rounded-top border-bottom bg-primary">
                        <h4 class="text-center text-white mt-0 p-2">Notifications</h4>
                    </div>

                    <div class="row row-paddingless header-message-section" style="display:none;padding-left: 5px; padding-right: 5px;height:330px!important;overflow:auto;">
                        <!--begin:Item-->
                        <?php
                        /*
                            $notifications = $this->crud_model->userNotifiation($this->session->userdata('user_id'))->result_array();
                            foreach ($notifications as $value) : ?>
                        <div class="col-12 p-0 border-bottom border-right pl-3">
                            <a href="#" class="d-block py-3 bg-hover-light">
                                <strong>
                                    <?= $value['title'] ?>
                                </strong>
                                <span class="w-100 d-block text-muted"><?= $value['description'] ?></span>
                            </a>
                        </div>
                        <?php endforeach; */?>
                    </div>
                </div>
            </li>
                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-view-apps noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg p-0 mt-5 border-top-0" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-278px, 70px, 0px);">

                        <div class="rounded-top py-3 border-bottom bg-primary">
                            <h4 class="text-center text-white"><?php echo get_phrase('quick_actions') ?></h4>
                        </div>

                        <div class="row row-paddingless" style="padding-left: 15px; padding-right: 15px;">
                            <!--begin:Item-->
                            <div class="col-6 p-0 border-bottom border-right">
                                <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('<?= site_url($logged_in_user_role.'/course_form/add_course_shortcut'); ?>', '<?= get_phrase('create_course'); ?>')">
                                    <i class="dripicons-archive text-20"></i>
                                    <span class="w-100 d-block text-muted"><?= get_phrase('Add_course'); ?></span>
                                </a>
                            </div>

                            <div class="col-6 p-0 border-bottom">
                                <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('<?php echo site_url('modal/popup/lesson_types/add_shortcut_lesson'); ?>', '<?php echo get_phrase('add_new_lesson'); ?>')">
                                    <i class="dripicons-media-next text-20"></i>
                                    <span class="d-block text-muted"><?= get_phrase('Add_lesson'); ?></span>
                                </a>
                            </div>

                            <?php if($this->session->userdata('admin_login')): ?>
                                <div class="col-6 p-0 border-right">
                                    <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('<?php echo site_url('modal/popup/shortcut_add_student'); ?>', '<?php echo get_phrase('add_student'); ?>')">
                                        <i class="dripicons-user text-20"></i>
                                        <span class="w-100 d-block text-muted"><?= get_phrase('Add_student'); ?></span>
                                    </a>
                                </div>

                                <div class="col-6 p-0">
                                    <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('<?php echo site_url('modal/popup/shortcut_enrol_student'); ?>', '<?php echo get_phrase('enrol_a_student'); ?>')">
                                        <i class="dripicons-network-3 text-20"></i>
                                        <span class="d-block text-muted"><?= get_phrase('Enroll_student'); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
                href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" class="rounded-circle">
                </span>
                <span >
                    <?php
                    $logged_in_user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();;
                    ?>
                    <span class="account-user-name"><?php echo $logged_in_user_details['first_name'].' '.$logged_in_user_details['last_name'];?></span>
                    <span class="account-position"><?php echo strtolower($this->session->userdata('role')) == 'user' ? get_phrase('instructor') : get_phrase('admin'); ?></span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
            aria-labelledby="topbar-userdrop">
            <!-- item-->
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0"><?php echo get_phrase('welcome'); ?> !</h6>
            </div>

            <!-- Account -->
            <a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/manage_profile'); ?>" class="dropdown-item notify-item">
                <i class="mdi mdi-account-circle mr-1"></i>
                <span><?php echo get_phrase('my_account'); ?></span>
            </a>

            <?php if (strtolower($this->session->userdata('role')) == 'admin'): ?>
                <!-- settings-->
                <a href="<?php echo site_url('admin/system_settings'); ?>" class="dropdown-item notify-item">
                    <i class="mdi mdi-settings mr-1"></i>
                    <span><?php echo get_phrase('settings'); ?></span>
                </a>

            <?php endif; ?>

            <!-- Logout-->
            <a href="<?php echo site_url('login/logout'); ?>" class="dropdown-item notify-item">
                <i class="mdi mdi-logout mr-1"></i>
                <span><?php echo get_phrase('logout'); ?></span>
            </a>

        </div>
    </li>
</ul>
<a class="button-menu-mobile disable-btn">
    <div class="lines">
        <span></span>
        <span></span>
        <span></span>
    </div>
</a>
<div class="visit_website">
    <h4 style="color: #2f3893; float: left;"> <?php echo $this->db->get_where('settings' , array('key'=>'system_name'))->row()->value; ?></h4>
    <a href="<?php echo site_url('home'); ?>" target="" class="btn btn-outline-light ml-3"><?php echo get_phrase('visit_website'); ?></a>
</div>
</div> 
</div>
<!-- end Topbar -->