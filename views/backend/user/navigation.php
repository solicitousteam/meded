<?php
$status_wise_courses = $this->crud_model->get_status_wise_courses();
?>
<style>
    .metismenu{
        height:auto!important;
    }
    .sidebar-div{
        height:calc(100vh)!important;
        overflow:auto!important;
    }
</style>
<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached sidebar-div">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="user-image" height="100" class="rounded-circle shadow-sm">
			<?php
			$user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
			?>
			<span class="leftbar-user-name"><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

    <li class="side-nav-title side-nav-item"><?php echo get_phrase('navigation'); ?></li>
		<?php if ($this->session->userdata('is_instructor')): ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/dashboard'); ?>" class="side-nav-link <?php if ($page_name == 'dashboard')echo 'active';?>">
					<!--<i class="dripicons-view-apps"></i>-->
						<img src="<?=base_url();?>/uploads/business-report.png" style="height: 24px; width: 20px;"alt="user-image">
					<span><?php echo "&nbsp;&nbsp;" . get_phrase('Dashboard'); ?></span>
				</a>
			</li>
		
					
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/courses'); ?>" class="side-nav-link <?php if ($page_name == 'courses' || $page_name == 'course_add' || $page_name == 'course_edit')echo 'active';?>">
					<!--<i class="dripicons-archive"></i>-->
						<img src="<?=base_url();?>/uploads/online-learning.png" style="height: 28px; width: 25px;"alt="user-image">
					<span><?php echo "&nbsp;&nbsp;" . get_phrase('Course Category'); ?></span>
					<span class="menu-arrow"></span>
				</a>
				
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class = "<?php  if($page_name == 'course_add') echo 'active'; ?>">
						<a href="<?php echo site_url('user/courses'); ?>"><?php echo get_phrase('Blended Learning'); ?></a>
					</li>

					<li class = "<?php if($page_name == 'category_add1') echo 'active'; ?>">
						<a href="<?php echo site_url('user/video_learning'); ?>"><?php echo get_phrase('Video Learning'); ?></a>
					</li>
					<li class = "<?php if($page_name == 'serial_learning') echo 'active'; ?>">
						<a href="<?php echo base_url(); ?>user/serial_learning"><?php echo get_phrase('Serial Learning'); ?></a>
					</li>
					
					<li class = "<?php if($page_name == 'webinar') echo 'active'; ?>">
						<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/webinar'); ?>"><?php echo get_phrase('Webinar'); ?></a>
					</li>
		
				</ul>
			</li>
			
			<li class="side-nav-item <?php if ($page_name == 'enrol_history' || $page_name == 'enrol_student') : ?> active <?php endif; ?>">
                <a href="javascript: void(0);"
                    class="side-nav-link <?php if ($page_name == 'enrol_history' || $page_name == 'enrol_student') : ?> active <?php endif; ?>">
                    <!--<i class="dripicons-network-3"></i>-->
                    <img src="<?= base_url(); ?>/uploads/maintenance.png" style="height: 28px; width: 25px;" alt="user-image">
                    <span> <?php echo "&nbsp;&nbsp;&nbsp;" . get_phrase('Enrollment'); ?> </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">
                    <li class="<?php if ($page_name == 'courses_enrolled') echo 'active'; ?>">
                        <a href="<?php echo site_url('user/courses_enrolled'); ?>">Courses Enrolled</a>
                    </li>
                    <li class="<?php if ($page_name == 'enrol_history') echo 'active'; ?>">
                        <a href="<?php echo site_url('user/enrol_history'); ?>"><?php echo get_phrase('enroll_history'); ?></a>
                    </li>
                    <?php /*?>
                    <li class="<?php if ($page_name == 'enrol_student') echo 'active'; ?>">
                        <a
                            href="<?php echo site_url('user/enrol_student'); ?>"><?php echo get_phrase('enroll_a_student'); ?></a>
                    </li>
                    <?php */ ?>
                </ul>
            </li>
            
            <li class="side-nav-item">
				<a href="javascript:void(0);" class="side-nav-link">
					<!--<i class="dripicons-archive"></i>-->
						<img src="<?=base_url();?>/uploads/online-learning.png" style="height: 28px; width: 25px;"alt="user-image">
					<span><?php echo "&nbsp;&nbsp;" . get_phrase('ads manager'); ?></span>
					<span class="menu-arrow"></span>
				</a>
				
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class = "<?php  if($page_name == 'ads_library') echo 'active'; ?>">
						<a href="<?php echo site_url('user/ads_library'); ?>"><?php echo get_phrase('add library'); ?></a>
					</li>
					<li class = "<?php if($page_name == 'banner_request') echo 'active'; ?>">
						<a href="<?php echo site_url('user/banner_request'); ?>"><?php echo get_phrase('internal banner'); ?></a>
					</li>
				</ul>
			</li>
		
			<li class="side-nav-item">
				<a href="<?php echo base_url() ?>user/live_class" class="side-nav-link <?php if ($page_name == 'webinar')echo 'active';?>">
					<!--<i class="dripicons-to-do"></i>-->
						<img src="<?=base_url();?>/uploads/online-class.png" style="height: 28px; width: 25px;"alt="user-image">
					<span><?php echo "&nbsp;&nbsp;" . get_phrase('Live class'); ?></span>
				</a>
			</li>
		
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/sales_report'); ?>" class="side-nav-link <?php if ($page_name == 'report' || $page_name == 'invoice')echo 'active';?>">
					<!--<i class="dripicons-to-do"></i>-->
						<img src="<?=base_url();?>/uploads/clipboard.png" style="height: 28px; width: 25px;"alt="user-image">
					<span><?php echo "&nbsp;&nbsp;" . get_phrase('Sales_report'); ?></span>
				</a>
			</li>
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/payout_report'); ?>" class="side-nav-link <?php if ($page_name == 'payout_report' || $page_name == 'invoice')echo 'active';?>">
					<!--<i class="dripicons-shopping-bag"></i>-->
						<img src="<?=base_url();?>/uploads/business-credit-report.png" style="height: 28px; width: 25px;"alt="user-image">
					<span><?php echo "&nbsp;&nbsp;" . get_phrase('Payout_report'); ?></span>
				</a>
			</li>
			<!--<li class="side-nav-item">-->
			<!--	<a href="<?php echo site_url('user/payout_settings'); ?>" class="side-nav-link <?php if ($page_name == 'payment_settings')echo 'active';?>">-->
					<!--<i class="dripicons-gear"></i>-->
			<!--		<img src="<?=base_url();?>/uploads/payment.png" style="height: 28px; width: 25px;"alt="user-image">-->
			<!--		<span><?php echo "&nbsp;&nbsp;" . get_phrase('Payout_settings'); ?></span>-->
			<!--	</a>-->
			<!--</li>-->
		<?php else: ?>
			<li class="side-nav-item">
				<a href="<?php echo site_url('user/become_an_instructor'); ?>" class="side-nav-link <?php if ($page_name == 'become_an_instructor')echo 'active';?>">
					<i class="dripicons-archive"></i>
						
					<span><?php echo "&nbsp;&nbsp;" . get_phrase('Become_an_instructor'); ?></span>
				</a>
			</li>
		<?php endif; ?>
		
		<li class="side-nav-item">
			<a href="<?php echo site_url('home/my_messages'); ?>" class="side-nav-link">
				<!--<i class="dripicons-mail"></i>-->
				<img src="<?=base_url();?>/uploads/chat (1).png" style="height: 28px; width: 25px;"alt="user-image">
				<span><?php echo "&nbsp;&nbsp;" . get_phrase('Message'); ?></span>
			</a>
		</li>
		<li class="side-nav-item">
			<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/manage_profile'); ?>" class="side-nav-link">
				<!--<i class="dripicons-user"></i>-->
				<img src="<?=base_url();?>/uploads/user.png" style="height: 28px; width: 25px;"alt="user-image">
				<span><?php echo "&nbsp;&nbsp;" . get_phrase('Manage_profile'); ?></span>
			</a>
		</li>
		<li class="side-nav-item">
			<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/support_contact'); ?>" class="side-nav-link">
				<!--<i class="dripicons-user"></i>-->
				<img src="<?=base_url();?>/uploads/call-center.png" style="height: 28px; width: 25px;"alt="user-image">
				<span><?php echo "&nbsp;&nbsp;" . get_phrase('support_contact'); ?></span>
			</a>
		</li>
		
		<li class="side-nav-item <?php if ($page_name == 'library')echo 'active';?>">
				<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/library'); ?>" class="side-nav-link">
				    <img src="<?= base_url('uploads/user.png')?>" style="height: 28px; width: 25px;"alt="user-image">
					<span><?php echo"&nbsp;&nbsp;&nbsp;". get_phrase('Library'); ?></span>
				</a>
		</li>
		
		<!-- script added on 16-08-2022 start here -->
	
		<!-- script added on 16-08-2022 close here -->
		
		<!--<li class="side-nav-item <?php if ($page_name == 'course')echo 'active';?>">-->
		<!--		<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/course'); ?>" class="side-nav-link">-->
		<!--		    <img src="<?= base_url('uploads/user.png')?>" style="height: 28px; width: 25px;"alt="user-image">-->
		<!--			<span><?php echo"&nbsp;&nbsp;&nbsp;". get_phrase('course'); ?></span>-->
		<!--		</a>-->
		<!--</li>-->
		
	</ul>
</div>
