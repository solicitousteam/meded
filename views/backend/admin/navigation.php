<?php
$status_wise_courses = $this->crud_model->get_status_wise_courses();
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
    <div class="leftbar-user">
        <a href="javascript: void(0);">
            <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>"
                alt="user-image" height="42" class="rounded-circle shadow-sm">
            <?php
			$admin_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
            <span class="leftbar-user-name text-capitalize"><?php echo $admin_details['first_name'] . ' ' . $admin_details['last_name']; ?></span>
        </a>
    </div>

    <!--- Sidemenu -->
    <ul class="metismenu side-nav side-nav-light">

        <li class="side-nav-title side-nav-item" style="color: #340953; font-weight: bold;">
            <?php echo get_phrase('navigation'); ?></li>

        <li class="side-nav-item <?php if ($page_name == 'dashboard') echo 'active'; ?>">
            <a href="<?php echo site_url('admin/dashboard'); ?>" class="side-nav-link">
                <!--<i class="dripicons-view-apps"></i>-->
                <img src="<?= base_url(); ?>/uploads/business-report.png" style="height: 24px; width: 20px;"
                    alt="user-image">
                <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Dashboard'); ?></span>
            </a>
        </li>
    
        <?php
        if(in_array($admin_details['admin_role'],['1','2']))
        {
            if($admin_details['admin_role']='1')
            {?>
            <li class="side-nav-item">
                <a href="<?php echo site_url('adminaccess/senioradmin'); ?>"
                    class="side-nav-link <?php if($page_name == 'senioradmin') echo 'active'; ?>">
                    <!--<i class="dripicons-user-group"></i>-->
                    <img src="<?= base_url(); ?>/uploads/man.png" style="height: 28px; width: 25px;" alt="user-image">
                    <span>Senior Admin</span>
                </a>
            </li>
            <?php 
            }?>
        <li class="side-nav-item">
            <a href="<?php echo site_url('adminaccess/admin'); ?>"
                class="side-nav-link <?php if($page_name == 'admin') echo 'active'; ?>">
                <!--<i class="dripicons-user-group"></i>-->
                <img src="<?= base_url(); ?>/uploads/man.png" style="height: 28px; width: 25px;" alt="user-image">
                <span>Admin</span>
            </a>
        </li>
        <?php 
        }?>
        <li
            class="side-nav-item <?php if ($page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit') : ?> active <?php endif; ?>">
            <a href="javascript: void(0);"
                class="side-nav-link <?php if ($page_name == 'categories' || $page_name == 'category_add' || $page_name == 'category_edit') : ?> active <?php endif; ?>">
                <!--<i class="dripicons-network-1"></i>-->
                <img src="<?= base_url(); ?>/uploads/list.png" style="height: 24px; width: 20px;" alt="user-image">
                <span> <?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('department'); ?> </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level" aria-expanded="false">
                <li class="<?php if ($page_name == 'categories' || $page_name == 'category_edit') echo 'active'; ?>">
                    <a href="<?php echo site_url('admin/categories'); ?>"><?php echo get_phrase('department'); ?></a>
                </li>

                <li class="<?php if ($page_name == 'category_add') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/category_form/add_category'); ?>"><?php echo get_phrase('add_new_department'); ?></a>
                </li>
            </ul>
        </li>

        <li class="side-nav-item">
            <a href="<?php echo site_url('admin/banner'); ?>"
                class="side-nav-link <?php if ($page_name == 'banner' || $page_name == 'banner_add') echo 'active'; ?>">
                <!--<i class="dripicons-archive"></i>-->
                <img src="<?= base_url(); ?>/uploads/advertising.png" style="height: 24px; width: 20px;"
                    alt="user-image">
                <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Banner'); ?></span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="<?php echo site_url('admin/banner_request'); ?>"
                class="side-nav-link <?php if ($page_name == 'banner_request') echo 'active'; ?>">
                <img src="<?= base_url(); ?>/uploads/ads.png" style="height: 24px; width: 20px;" alt="user-image">
                <span>&nbsp;&nbsp;&nbsp; Banner Request</span>
            </a>
        </li>


        <li class="side-nav-item">
            <a href="<?php echo site_url('admin/coupon'); ?>"
                class="side-nav-link <?php if ($page_name == 'discount' || $page_name == 'discount_add') echo 'active'; ?>">
                <!--<i class="dripicons-archive"></i>-->
                <img src="https://main.solicitous.cloud/meded4/uploads/tag.png" style="height: 24px; width: 20px;"
                    alt="user-image">
                <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Discount Coupon'); ?></span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="<?php echo site_url('admin/courses'); ?>"
                class="side-nav-link <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit') echo 'active'; ?>">
                <img src="<?= base_url(); ?>/uploads/online-learning.png" style="height: 28px; width: 25px;"
                    alt="user-image">
                <span><?php echo "&nbsp;&nbsp;" . get_phrase('Course Category'); ?></span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="side-nav-second-level" aria-expanded="false">
                <li class="<?php if ($page_name == 'courses') echo 'active'; ?>">
                    <a href="<?php echo site_url('admin/courses'); ?>"><?php echo get_phrase('Blended Learning'); ?></a>
                </li>

                <li class="<?php if ($page_name == 'video_learning') echo 'active'; ?>">
                    <a
                        href="<?php echo site_url('admin/video_learning'); ?>"><?php echo get_phrase('Video Learning'); ?></a>
                </li>
                <li class="<?php if ($page_name == 'serial') echo 'active'; ?>">
                    <a
                        href="<?php echo base_url() ?>admin/serial_learning"><?php echo get_phrase('Serial Learning'); ?></a>
                </li>
        </li>
        <li class="<?php if ($page_name == 'webinar') echo 'active'; ?>">
            <a href="<?php echo base_url() ?>admin/webinar"><?php echo get_phrase('Webinar'); ?></a>
        </li>
    </ul>
    </li>
    <li class="side-nav-item">
        <a href="<?php echo base_url() ?>admin/live_class"
            class="side-nav-link <?php if ($page_name == 'live_class') echo 'active'; ?>">
            <!--<i class="dripicons-to-do"></i>-->
            <img src="<?= base_url(); ?>/uploads/online-class.png" style="height: 28px; width: 25px;" alt="user-image">
            <span><?php echo "&nbsp;&nbsp;" . get_phrase('Live class'); ?></span>
        </a>
    </li>

    <?php if (addon_status('course_bundle')) : ?>
    <li
        class="side-nav-item <?php if ($page_name == 'add_bundle' || $page_name == 'manage_course_bundle' || $page_name == 'edit_bundle' || $page_name == 'active_bundle_subscription_report' || $page_name == 'expire_bundle_subscription_report' || $page_name == 'bundle_invoice') : ?> active <?php endif; ?>">
        <a href="javascript: void(0);" class="side-nav-link">
            <i class="dripicons-pamphlet"></i>
            <!--<img src="<?= base_url(); ?>/uploads/male.png" style="height: 28px; width: 25px;"alt="user-image">-->
            <span> <?php echo get_phrase('course_bundle'); ?> </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li class="<?php if ($page_name == 'add_bundle') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('addons/bundle/add_bundle_form'); ?>"><?php echo get_phrase('add_new_bundle'); ?></a>
            </li>
        </ul>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li class="<?php if ($page_name == 'manage_course_bundle') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('addons/bundle/manage_bundle'); ?>"><?php echo get_phrase('manage_bundle'); ?></a>
            </li>
        </ul>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li
                class="<?php if ($page_name == 'active_bundle_subscription_report' || $page_name == 'expire_bundle_subscription_report' || $page_name == 'bundle_invoice') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('addons/bundle/subscription_report/active'); ?>"><?php echo get_phrase('subscription_report'); ?></a>
            </li>
        </ul>
    </li>
    <?php endif; ?>

    <li
        class="side-nav-item <?php if ($page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit' || $page_name == 'registrated_instructor') : ?> active <?php endif; ?>">
        <a href="javascript: void(0);"
            class="side-nav-link <?php if ($page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit' || $page_name == 'registrated_instructor') : ?> active <?php endif; ?>">
            <!--<i class="mdi mdi-incognito"></i>-->
            <img src="<?= base_url(); ?>/uploads/instructor.png" style="height: 28px; width: 25px;" alt="user-image">
            <span> <?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Instructors'); ?> </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li
                class="<?php if ($page_name == 'instructors' || $page_name == 'instructor_add' || $page_name == 'instructor_edit') echo 'active'; ?>">
                <a href="<?php echo site_url('admin/instructors'); ?>"><?php echo get_phrase('instructor_list'); ?></a>
            </li>

            <li class="<?php if ($page_name == 'instructor_payout') echo 'active'; ?>">
                <a href="<?php echo site_url('admin/instructor_payout'); ?>">
                    <?php echo get_phrase('instructor_payout'); ?>
                    <span
                        class="badge badge-danger-lighten"><?php echo $this->crud_model->get_pending_payouts()->num_rows(); ?></span>
                </a>
            </li>

            <li class="<?php if ($page_name == 'instructor_settings') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/instructor_settings'); ?>"><?php echo get_phrase('instructor_settings'); ?></a>
            </li>

            <?php /* ?>
            <li class="<?php if ($page_name == 'instructor_application') echo 'active'; ?>">
                <a href="<?php echo site_url('admin/instructor_application'); ?>">
                    <?php echo get_phrase('instructor_application'); ?>
                    <span
                        class="badge badge-danger-lighten"><?php echo $this->user_model->get_pending_applications()->num_rows(); ?></span>
                </a>
            </li>
            <?php */?>
            <li class="<?php if ($page_name == 'registrated_instructor') echo 'active'; ?>">
                <a href="<?php echo site_url('admin/registrated_instructor'); ?>">
                    Registered Instructor
                    <span
                        class="badge badge-danger-lighten"><?= $this->db->select('count(id) as total_left')->where('admin_verify','0')->where('is_instructor','1')->where('role_id','2')->get('users')->row_array()['total_left']; ?></span>
                </a>
            </li>
        </ul>
    </li>
    
    <li class="side-nav-item <?php if ($page_name == 'subscription_list') : ?> active <?php endif; ?>">
        <a href="javascript: void(0);" class="side-nav-link">
            <i class="dripicons-pamphlet"></i>
            <!--<img src="<?= base_url(); ?>/uploads/male.png" style="height: 28px; width: 25px;"alt="user-image">-->
            <span> <?php echo get_phrase('Subscription'); ?> </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li class="<?php if (!empty($_GET['all'])) echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/subscription?all'); ?>"><?php echo get_phrase('Subscription_list'); ?></a>
            </li>
            
            <li class="<?php if (!empty($_GET['subscription_status']) && $_GET['subscription_status'] == 'active') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/subscription?subscription_status=active'); ?>"><?php echo get_phrase('Active Subscription'); ?></a>
            </li>
        
            <li class="<?php if (!empty($_GET['subscription_status']) && $_GET['subscription_status'] == 'deactive') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/subscription?subscription_status=deactive'); ?>"><?php echo get_phrase('Deactive Subscription'); ?></a>
            </li>
        </ul>
    </li>
    
    <li class="side-nav-item">
        <a href="<?php echo site_url('admin/users'); ?>"
            class="side-nav-link <?php if ($page_name == 'users' || $page_name == 'user_add' || $page_name == 'user_edit') echo 'active'; ?>">
            <!--<i class="dripicons-user-group"></i>-->
            <img src="<?= base_url(); ?>/uploads/man.png" style="height: 28px; width: 25px;" alt="user-image">
            <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Students'); ?></span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="<?php echo site_url('admin/notification'); ?>"
            class="side-nav-link <?php if ($page_name == 'notification') echo 'active'; ?>">
            <img src="https://main.solicitous.cloud/meded4/uploads/notification.png" style="height: 24px; width: 22px;"
                alt="user-image">
            <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('notification'); ?></span>
        </a>
    </li>

    <li
        class="side-nav-item <?php if ($page_name == 'enrol_history' || $page_name == 'enrol_student') : ?> active <?php endif; ?>">
        <a href="javascript: void(0);"
            class="side-nav-link <?php if ($page_name == 'enrol_history' || $page_name == 'enrol_student') : ?> active <?php endif; ?>">
            <!--<i class="dripicons-network-3"></i>-->
            <img src="<?= base_url(); ?>/uploads/maintenance.png" style="height: 28px; width: 25px;" alt="user-image">
            <span> <?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Enrollment'); ?> </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li class="<?php if ($page_name == 'courses_enrolled') echo 'active'; ?>">
                <a href="<?php echo site_url('admin/courses_enrolled'); ?>">Courses Enrolled</a>
            </li>
            <li class="<?php if ($page_name == 'enrol_history') echo 'active'; ?>">
                <a href="<?php echo site_url('admin/enrol_history'); ?>"><?php echo get_phrase('enroll_history'); ?></a>
            </li>

            <li class="<?php if ($page_name == 'enrol_student') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/enrol_student'); ?>"><?php echo get_phrase('enroll_a_student'); ?></a>
            </li>
        </ul>
    </li>

    <li class="side-nav-item">
        <a href="javascript: void(0);"
            class="side-nav-link <?php if ($page_name == 'today_revenue' || $page_name == 'admin_revenue' || $page_name == 'instructor_revenue' || $page_name == 'invoice') : ?> active <?php endif; ?>">
            <!--<i class="dripicons-box" style="color: blue;"></i>-->
            <img src="<?= base_url(); ?>/uploads/clipboard.png" style="height: 28px; width: 25px;" alt="user-image">
            <span> <?php echo "&nbsp;&nbsp;&nbsp;" .  get_phrase('Report'); ?> </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li class="<?php if ($page_name == 'today_revenue') echo 'active'; ?>"> <a
                    href="<?php echo site_url('admin/today_revenue'); ?>"><?php echo get_phrase('today_revenue'); ?></a>
            </li>
            <li class="<?php if ($page_name == 'admin_revenue') echo 'active'; ?>"> <a
                    href="<?php echo site_url('admin/admin_revenue'); ?>"><?php echo get_phrase('admin_revenue'); ?></a>
            </li>
            <?php if (get_settings('allow_instructor') == 1) : ?>
            <li class="<?php if ($page_name == 'instructor_revenue') echo 'active'; ?>">
                <a href="<?php echo site_url('admin/instructor_revenue'); ?>">
                    <?php echo get_phrase('instructor_revenue'); ?>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </li>

    <?php if (addon_status('offline_payment')) : ?>
    <li class="side-nav-item">
        <a href="javascript: void(0);"
            class="side-nav-link <?php if ($page_name == 'offline_payment_pending' || $page_name == 'offline_payment_approve' || $page_name == 'offline_payment_suspended') : ?> active <?php endif; ?>">
            <i class="dripicons-box"></i>
            <span> <?php echo get_phrase('offline_payment'); ?></span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li class="<?php if ($page_name == 'offline_payment_pending') echo 'active'; ?>">
                <a href="<?php echo site_url('addons/offline_payment/pending'); ?>">
                    <?php echo get_phrase('pending_request'); ?>
                    <span
                        class="badge badge-danger-lighten badge-pill float-right"><?php echo get_pending_offline_payment(); ?></span></span>
                </a>
            </li>
            <li class="<?php if ($page_name == 'offline_payment_approve') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('addons/offline_payment/approve'); ?>"><?php echo get_phrase('accepted_request'); ?></a>
            </li>
            <li class="<?php if ($page_name == 'offline_payment_suspended') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('addons/offline_payment/suspended'); ?>"><?php echo get_phrase('suspended_request'); ?></a>
            </li>
        </ul>
    </li>
    <?php endif; 
    /*?>

    <li class="side-nav-item">
        <a href="<?php echo site_url('admin/message'); ?>"
            class="side-nav-link <?php if ($page_name == 'message' || $page_name == 'message_new' || $page_name == 'message_read') echo 'active'; ?>">
            <img src="<?= base_url(); ?>/uploads/chat (1).png" style="height: 28px; width: 25px;" alt="user-image">
            <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Message'); ?></span>
        </a>
    </li>
    <?php */ ?>

    <li class="side-nav-item">
        <a href="<?php echo site_url('admin/message?type=instructor'); ?>"
            class="side-nav-link <?php if ($page_name == 'message' || $page_name == 'message_new' || $page_name == 'message_read') echo 'active'; ?>">
            <img src="<?= base_url(); ?>/uploads/messages.png" style="height: 28px; width: 25px;" alt="user-image">
            <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Instructor Message'); ?></span>
        </a>
    </li>

    <li class="side-nav-item">
        <a href="javascript: void(0);"
            class="side-nav-link <?php if ($page_name == 'addons' || $page_name == 'addon_add' || $page_name == 'available_addons') : ?> active <?php endif; ?>">
            <!--<i class="dripicons-graph-pie"></i>-->
            <img src="https://main.solicitous.cloud/meded4/uploads/dollar.png" style="height: 28px; width: 25px;"
                alt="user-image">
            <span> <?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('addons'); ?> </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li class="<?php if ($page_name == 'addons') echo 'active'; ?>">
                <a href="<?php echo site_url('admin/addon'); ?>"><?php echo get_phrase('addon_manager'); ?></a>
            </li>
            <li class="<?php if ($page_name == 'available_addons') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/available_addons'); ?>"><?php echo get_phrase('available_addons'); ?></a>
            </li>
        </ul>
    </li>

    <li
        class="side-nav-item  <?php if ($page_name == 'system_settings' || $page_name == 'frontend_settings' || $page_name == 'payment_settings' || $page_name == 'smtp_settings' || $page_name == 'manage_language' || $page_name == 'about' || $page_name == 'themes') : ?> active <?php endif; ?>">
        <a href="javascript: void(0);" class="side-nav-link">
            <!--<i class="dripicons-toggles"></i>-->
            <img src="<?= base_url(); ?>/uploads/control.png" style="height: 28px; width: 25px;" alt="user-image">
            <span> <?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Settings'); ?> </span>
            <span class="menu-arrow"></span>
        </a>
        <ul class="side-nav-second-level" aria-expanded="false">
            <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/system_settings'); ?>"><?php echo get_phrase('system_settings'); ?></a>
            </li>
            <li class="<?php if ($page_name == 'frontend_settings') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/frontend_settings'); ?>"><?php echo get_phrase('website_settings'); ?></a>
            </li>
            <?php if (addon_status('certificate')) : ?>
            <li class="<?php if ($page_name == 'certificate_settings') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('addons/certificate/settings'); ?>"><?php echo get_phrase('certificate_settings'); ?></a>
            </li>
            <?php endif; ?>
            <?php if (addon_status('amazon-s3')) : ?>
            <li class="<?php if ($page_name == 's3_settings') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('addons/amazons3/settings'); ?>"><?php echo get_phrase('s3_settings'); ?></a>
            </li>
            <?php endif; ?>
            <?php if (addon_status('live-class')) : ?>
            <li class="<?php if ($page_name == 'live_class_settings') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('addons/liveclass/settings'); ?>"><?php echo get_phrase('live_class_settings'); ?></a>
            </li>
            <?php endif; ?>
            <li class="<?php if ($page_name == 'payment_settings') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/payment_settings'); ?>"><?php echo get_phrase('payment_settings'); ?></a>
            </li>
            <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/manage_language'); ?>"><?php echo get_phrase('language_settings'); ?></a>
            </li>
            <li class="<?php if ($page_name == 'smtp_settings') echo 'active'; ?>">
                <a href="<?php echo site_url('admin/smtp_settings'); ?>"><?php echo get_phrase('smtp_settings'); ?></a>
            </li>
            <li class="<?php if ($page_name == 'theme_settings') echo 'active'; ?>">
                <a
                    href="<?php echo site_url('admin/theme_settings'); ?>"><?php echo get_phrase('theme_settings'); ?></a>
            </li>
            <li class="<?php if ($page_name == 'about') echo 'active'; ?>">
                <a href="<?php echo site_url('admin/about'); ?>"><?php echo get_phrase('about'); ?></a>
            </li>
        </ul>
    </li>
    <li class="side-nav-item <?php if ($page_name == 'manage_profile') echo 'active'; ?>">
        <a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/manage_profile'); ?>"
            class="side-nav-link">
            <!--<i class="dripicons-user"></i>-->
            <img src="<?= base_url(); ?>/uploads/user.png" style="height: 28px; width: 25px;" alt="user-image">
            <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Manage_profile'); ?></span>
        </a>
    </li>

    <li class="side-nav-item <?php if ($page_name == 'support_request') echo 'active'; ?>">
        <a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/support_request'); ?>"
            class="side-nav-link">
            <img src="<?= base_url(); ?>/uploads/request.png" style="height: 28px; width: 25px;" alt="user-image">
            <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Support Request'); ?></span>
        </a>
    </li>

    <li class="side-nav-item <?php if ($page_name == 'feedback') echo 'active'; ?>">
        <a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/feedback'); ?>"
            class="side-nav-link">
            <img src="<?= base_url(); ?>/uploads/feedback.png" style="height: 28px; width: 25px;" alt="user-image">
            <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Instructor Feedback'); ?></span>
        </a>
    </li>

    <li class="side-nav-item <?php if ($page_name == 'student_form') echo 'active'; ?>">
        <a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/student_form'); ?>"
            class="side-nav-link">
            <img src="<?= base_url(); ?>/uploads/checklist (1).png" style="height: 28px; width: 25px;" alt="user-image">
            <span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Student Form'); ?></span>
        </a>
    </li>



    <li class="side-nav-item <?php if ($page_name == 'student_form') echo 'active'; ?>">
        <a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/mededbank'); ?>"
            class="side-nav-link">
            <img src="<?= base_url(); ?>/uploads/bank.png" style="height: 28px; width: 25px;" alt="user-image">
            <span><?php echo "&nbsp;&nbsp;&nbsp;Med Ed Bank" ?></span>
        </a>
    </li>
    
    	<li class="side-nav-item <?php if ($page_name == 'course_request')echo 'active';?>" style="margin-bottom:80px!important;">
				<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/course_request'); ?>" class="side-nav-link">
				    <img src="<?= base_url('uploads/online-learning.png')?>" style="height: 28px; width: 25px;"alt="user-image">
					<span> Course Request</span>
				</a>
		</li>

    <!--<li class="side-nav-item <?php if ($page_name == 'webinar') echo 'active'; ?>">-->
    <!--	<a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/webinar'); ?>" class="side-nav-link">-->
    <!--	    <img src="<?= base_url(); ?>/uploads/video.png" style="height: 28px; width: 25px;"alt="user-image">-->
    <!--		<span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Webinar'); ?></span>-->
    <!--	</a>-->
    <!--</li>-->

    <!--<li class="side-nav-item <?php if ($page_name == 'course_request') echo 'active'; ?>">-->
    <!--	<a href="<?php echo site_url(strtolower($this->session->userdata('role')) . '/course_request'); ?>" class="side-nav-link">-->
    <!--	    <img src="<?= base_url(); ?>/uploads/video.png" style="height: 28px; width: 25px;"alt="user-image">-->
    <!--		<span><?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('course_request'); ?></span>-->
    <!--	</a>-->
    <!--</li>-->


    </ul>
</div>