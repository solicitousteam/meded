
<!DOCTYPE html>
<html>
<head>
    <title>Active courses | Academy Learning Club</title>
    <!-- all the meta tags -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
    <!-- all the css files -->
    <link rel="shortcut icon" href="https://main.solicitous.cloud/meded4/uploads/system/19d26f1f725a19c452b3fb55f3484a0c.png">
<!-- third party css -->
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/vendor/select.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/vendor/summernote-bs4.css" rel="stylesheet" type="text/css" />
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/vendor/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/vendor/dropzone.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->
<!-- App css -->
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/app.min.css" rel="stylesheet" type="text/css" />
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />

<link href="https://main.solicitous.cloud/meded4/assets/backend/css/main.css" rel="stylesheet" type="text/css" />

<!-- font awesome 5 -->
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/fontawesome-all.min.css" rel="stylesheet" type="text/css" />
<link href="https://main.solicitous.cloud/meded4/assets/backend/css/font-awesome-icon-picker/fontawesome-iconpicker.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/jquery-3.3.1.min.js" charset="utf-8"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/onDomChange.js"></script>
</head>
<body data-layout="detached">
    <!-- HEADER -->
    <!-- Topbar Start -->
<div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid-new-header">
        <!-- LOGO -->
        <a href="https://main.solicitous.cloud/meded4/Admin" class="topnav-logo" style = "min-width: unset;">
            <span class="topnav-logo-lg">
                <img src="https://main.solicitous.cloud/meded4/uploads/system/37931a856fc72266e64211701199dc7d.png" alt="" height="70">
            </span>
            <span class="topnav-logo-sm">
                <img src="https://main.solicitous.cloud/meded4/uploads/system/19d26f1f725a19c452b3fb55f3484a0c.png" alt="" height="70">
            </span>
        </a>

        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-view-apps noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg p-0 mt-5 border-top-0" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-278px, 70px, 0px);">

                        <div class="rounded-top py-3 border-bottom bg-primary">
                            <h4 class="text-center text-white">Quick actions</h4>
                        </div>

                        <div class="row row-paddingless" style="padding-left: 15px; padding-right: 15px;">
                            <!--begin:Item-->
                            <div class="col-6 p-0 border-bottom border-right">
                                <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/admin/course_form/add_course_shortcut', 'Create course')">
                                    <i class="dripicons-archive text-20"></i>
                                    <span class="w-100 d-block text-muted">Add course</span>
                                </a>
                            </div>

                            <div class="col-6 p-0 border-bottom">
                                <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/lesson_types/add_shortcut_lesson', 'Add new lesson')">
                                    <i class="dripicons-media-next text-20"></i>
                                    <span class="d-block text-muted">Add lesson</span>
                                </a>
                            </div>

                                                            <div class="col-6 p-0 border-right">
                                    <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/shortcut_add_student', 'Add student')">
                                        <i class="dripicons-user text-20"></i>
                                        <span class="w-100 d-block text-muted">Add student</span>
                                    </a>
                                </div>

                                <div class="col-6 p-0">
                                    <a href="#" class="d-block text-center py-3 bg-hover-light" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/shortcut_enrol_student', 'Enrol a student')">
                                        <i class="dripicons-network-3 text-20"></i>
                                        <span class="d-block text-muted">Enroll student</span>
                                    </a>
                                </div>
                                                    </div>
                    </div>
                </li>
                        <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" id="topbar-userdrop"
                href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="https://main.solicitous.cloud/meded4/uploads/user_image/placeholder.png" alt="user-image" class="rounded-circle">
                </span>
                <span >
                                        <span class="account-user-name">Rahul Muttamsetty</span>
                    <span class="account-position">Admin</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
            aria-labelledby="topbar-userdrop">
            <!-- item-->
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

            <!--- Account -->
            <a href="https://main.solicitous.cloud/meded4/admin/manage_profile" class="dropdown-item notify-item">
                <i class="mdi mdi-account-circle mr-1"></i>
                <span>My account</span>
            </a>

                            <!-- settings-->
                <a href="https://main.solicitous.cloud/meded4/admin/system_settings" class="dropdown-item notify-item">
                    <i class="mdi mdi-settings mr-1"></i>
                    <span>Settings</span>
                </a>

            
            <!-- Logout-->
            <a href="https://main.solicitous.cloud/meded4/login/logout" class="dropdown-item notify-item">
                <i class="mdi mdi-logout mr-1"></i>
                <span>Logout</span>
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
    <h4 style="color: #2f3893; float: left;"> Med Ed</h4>
    <a href="https://main.solicitous.cloud/meded4/home" target="" class="btn btn-outline-light ml-3">Visit website</a>
</div>
</div> 
</div>
<!-- end Topbar -->    <div class="container-fluid-new"> 
        <div class="wrapper">
            <!-- BEGIN CONTENT -->
            <!-- SIDEBAR -->
            <!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu left-side-menu-detached">
	<div class="leftbar-user">
		<a href="javascript: void(0);">
			<img src="https://main.solicitous.cloud/meded4/uploads/user_image/placeholder.png" alt="user-image" height="42" class="rounded-circle shadow-sm">
						<span class="leftbar-user-name">Rahul Muttamsetty</span>
		</a>
	</div>

	<!--- Sidemenu -->
	<ul class="metismenu side-nav side-nav-light">

	<li class="side-nav-title side-nav-item" style="color: #340953; font-weight: bold;">Navigation</li>

		<li class="side-nav-item ">
			<a href="https://main.solicitous.cloud/meded4/admin/dashboard" class="side-nav-link">
				<!--<i class="dripicons-view-apps"></i>-->
				<img src="https://main.solicitous.cloud/meded4//uploads/business-report.png" style="height: 24px; width: 20px;"alt="user-image">
				  <span>&nbsp;&nbsp;&nbsp;Dashboard</span>
			</a>
		</li>

		<li class="side-nav-item ">
			<a href="javascript: void(0);" class="side-nav-link ">
				<!--<i class="dripicons-network-1"></i>-->
				<img src="https://main.solicitous.cloud/meded4//uploads/list.png" style="height: 24px; width: 20px;"alt="user-image">
				<span> &nbsp;&nbsp;&nbsp;Categories </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/categories">Categories</a>
				</li>

				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/category_form/add_category">Add new category</a>
				</li>
			</ul>
		</li>

		<li class="side-nav-item">
			<a href="https://main.solicitous.cloud/meded4/admin/banner" class="side-nav-link ">
				<!--<i class="dripicons-archive"></i>-->
				<img src="https://main.solicitous.cloud/meded4//uploads/advertising.png" style="height: 24px; width: 20px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Banner</span>
			</a>
		</li>

		<li class="side-nav-item">
			<a href="https://main.solicitous.cloud/meded4/admin/banner_request" class="side-nav-link ">
				<img src="https://main.solicitous.cloud/meded4//uploads/ads.png" style="height: 24px; width: 20px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp; Banner Request</span>
			</a>
		</li>
		
		
		<li class="side-nav-item">
			<a href="https://main.solicitous.cloud/meded4/admin/coupon" class="side-nav-link ">
				<!--<i class="dripicons-archive"></i>-->
				<img src="https://main.solicitous.cloud/meded4/uploads/tag.png" style="height: 24px; width: 20px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Discount coupon</span>
			</a>
		</li>
		
		<li class="side-nav-item">
				<a href="https://main.solicitous.cloud/meded4/admin/courses" class="side-nav-link ">
						<img src="https://main.solicitous.cloud/meded4//uploads/online-learning.png" style="height: 28px; width: 25px;"alt="user-image">
					<span>&nbsp;&nbsp;Create course</span>
					<span class="menu-arrow"></span>
				</a>
				
				<ul class="side-nav-second-level" aria-expanded="false">
					<li class = "">
						<a href="https://main.solicitous.cloud/meded4/admin/courses">Blended learning</a>
					</li>

					<li class = "">
						<a href="https://main.solicitous.cloud/meded4/admin/video_learning">Video learning</a>
					</li>
					<li class = "">
						<a href="https://main.solicitous.cloud/meded4/admin/serial_learning">Serial learning</a>
					</li>
						</li>
					<li class = "">
						<a href="https://main.solicitous.cloud/meded4/admin/webinar">Webinar</a>
					</li>
				</ul>
			</li>
			<li class="side-nav-item">
				<a href="https://main.solicitous.cloud/meded4/admin/live_class" class="side-nav-link ">
					<!--<i class="dripicons-to-do"></i>-->
						<img src="https://main.solicitous.cloud/meded4//uploads/online-class.png" style="height: 28px; width: 25px;"alt="user-image">
					<span>&nbsp;&nbsp;Live class</span>
				</a>
			</li>

		
		<li class="side-nav-item ">
			<a href="javascript: void(0);" class="side-nav-link ">
				<!--<i class="mdi mdi-incognito"></i>-->
				<img src="https://main.solicitous.cloud/meded4//uploads/instructor.png" style="height: 28px; width: 25px;"alt="user-image">
				<span> &nbsp;&nbsp;&nbsp;Instructors </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/instructors">Instructor list</a>
				</li>

				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/instructor_payout">
						Instructor payout						<span class="badge badge-danger-lighten">0</span>
					</a>
				</li>

				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/instructor_settings">Instructor settings</a>
				</li>

				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/instructor_application">
						Instructor application						<span class="badge badge-danger-lighten">0</span>
					</a>
				</li>
			</ul>
		</li>

		<li class="side-nav-item">
			<a href="https://main.solicitous.cloud/meded4/admin/users" class="side-nav-link ">
				<!--<i class="dripicons-user-group"></i>-->
				<img src="https://main.solicitous.cloud/meded4//uploads/man.png" style="height: 28px; width: 25px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Students</span>
			</a>
		</li>
		
		<li class="side-nav-item">
			<a href="https://main.solicitous.cloud/meded4/admin/notification" class="side-nav-link ">
				<img src="https://main.solicitous.cloud/meded4/uploads/notification.png" style="height: 24px; width: 22px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Notification</span>
			</a>
		</li>

		<li class="side-nav-item ">
			<a href="javascript: void(0);" class="side-nav-link ">
				<!--<i class="dripicons-network-3"></i>-->
				<img src="https://main.solicitous.cloud/meded4//uploads/maintenance.png" style="height: 28px; width: 25px;"alt="user-image">
				<span> &nbsp;&nbsp;&nbsp;Enrollment </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/enrol_history">Enroll history</a>
				</li>

				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/enrol_student">Enroll a student</a>
				</li>
			</ul>
		</li>

		<li class="side-nav-item">
			<a href="javascript: void(0);" class="side-nav-link ">
				<!--<i class="dripicons-box" style="color: blue;"></i>-->
					<img src="https://main.solicitous.cloud/meded4//uploads/clipboard.png" style="height: 28px; width: 25px;"alt="user-image">
				<span> &nbsp;&nbsp;&nbsp;Report </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "" > <a href="https://main.solicitous.cloud/meded4/admin/admin_revenue">Admin revenue</a> </li>
									<li class = "" >
						<a href="https://main.solicitous.cloud/meded4/admin/instructor_revenue">
							Instructor revenue						</a>
					</li>
							</ul>
		</li>

		
		<li class="side-nav-item">
			<a href="https://main.solicitous.cloud/meded4/admin/message" class="side-nav-link ">
					<img src="https://main.solicitous.cloud/meded4//uploads/chat (1).png" style="height: 28px; width: 25px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Message</span>
			</a>
		</li>
		
		<li class="side-nav-item">
			<a href="https://main.solicitous.cloud/meded4/admin/message?type=instructor" class="side-nav-link ">
					<img src="https://main.solicitous.cloud/meded4//uploads/messages.png" style="height: 28px; width: 25px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Instructor message</span>
			</a>
		</li>

		<li class="side-nav-item">
		<a href="javascript: void(0);" class="side-nav-link ">
		<!--<i class="dripicons-graph-pie"></i>-->
	  <img src="https://main.solicitous.cloud/meded4/uploads/dollar.png" style="height: 28px; width: 25px;"alt="user-image">
		<span> &nbsp;&nbsp;&nbsp;Addons </span>
		<span class="menu-arrow"></span>
		</a>
		<ul class="side-nav-second-level" aria-expanded="false">
		<li class = "" >
		<a href="https://main.solicitous.cloud/meded4/admin/addon">Addon manager</a>
		</li>
				<li class = "" >
				<a href="https://main.solicitous.cloud/meded4/admin/available_addons">Available addons</a>
				</li>
		</ul>
		</li>

		<li class="side-nav-item  ">
			<a href="javascript: void(0);" class="side-nav-link">
				<!--<i class="dripicons-toggles"></i>-->
					<img src="https://main.solicitous.cloud/meded4//uploads/control.png" style="height: 28px; width: 25px;"alt="user-image">
				<span> &nbsp;&nbsp;&nbsp;Settings </span>
				<span class="menu-arrow"></span>
			</a>
			<ul class="side-nav-second-level" aria-expanded="false">
				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/system_settings">System settings</a>
				</li>
				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/frontend_settings">Website settings</a>
				</li>
									<li class = "">
						<a href="https://main.solicitous.cloud/meded4/addons/certificate/settings">Certificate settings</a>
					</li>
																	<li class = "">
						<a href="https://main.solicitous.cloud/meded4/addons/liveclass/settings">Live class settings</a>
					</li>
								<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/payment_settings">Payment settings</a>
				</li>
				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/manage_language">Language settings</a>
				</li>
				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/smtp_settings">Smtp settings</a>
				</li>
				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/theme_settings">Theme settings</a>
				</li>
				<li class = "">
					<a href="https://main.solicitous.cloud/meded4/admin/about">About</a>
				</li>
			</ul>
		</li>
		<li class="side-nav-item ">
			<a href="https://main.solicitous.cloud/meded4/admin/manage_profile" class="side-nav-link">
				<!--<i class="dripicons-user"></i>-->
					<img src="https://main.solicitous.cloud/meded4//uploads/user.png" style="height: 28px; width: 25px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Manage profile</span>
			</a>
		</li>
		
		<li class="side-nav-item ">
			<a href="https://main.solicitous.cloud/meded4/admin/support_request" class="side-nav-link">
			    <img src="https://main.solicitous.cloud/meded4//uploads/request.png" style="height: 28px; width: 25px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Support request</span>
			</a>
		</li>
		
		<li class="side-nav-item ">
			<a href="https://main.solicitous.cloud/meded4/admin/feedback" class="side-nav-link">
			    <img src="https://main.solicitous.cloud/meded4//uploads/feedback.png" style="height: 28px; width: 25px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Instructor feedback</span>
			</a>
		</li>
		
		<li class="side-nav-item ">
			<a href="https://main.solicitous.cloud/meded4/admin/student_form" class="side-nav-link">
			    <img src="https://main.solicitous.cloud/meded4//uploads/checklist (1).png" style="height: 28px; width: 25px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Student form</span>
			</a>
		</li>
		
		
		
		<li class="side-nav-item ">
			<a href="https://main.solicitous.cloud/meded4/admin/mededbank" class="side-nav-link">
			    <img src="https://main.solicitous.cloud/meded4//uploads/bank.png" style="height: 28px; width: 25px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Med Ed Bank</span>
			</a>
		</li>
		
		<li class="side-nav-item ">
			<a href="https://main.solicitous.cloud/meded4/admin/webinar" class="side-nav-link">
			    <img src="https://main.solicitous.cloud/meded4//uploads/video.png" style="height: 28px; width: 25px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Webinar</span>
			</a>
		</li>
		
		<li class="side-nav-item ">
			<a href="https://main.solicitous.cloud/meded4/admin/course_request" class="side-nav-link">
			    <img src="https://main.solicitous.cloud/meded4//uploads/video.png" style="height: 28px; width: 25px;"alt="user-image">
				<span>&nbsp;&nbsp;&nbsp;Course request</span>
			</a>
		</li>
		
		
	</ul>
</div>
            <!-- PAGE CONTAINER-->
            <div class="content-page">
                <div class="content">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                                        <div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                 <img src="https://main.solicitous.cloud/meded4/uploads/online-learning.png" style="height: 44px; width: 44px;"alt="user-image">
                Courses                    <a href="https://main.solicitous.cloud/meded4/admin/course_form/add_course" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Add new course</a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <img src="https://main.solicitous.cloud/meded4/uploads/course_img.jpg" style="width:100%;height:100%">
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row no-gutters">
                    <div class="col-sm-6 col-xl-3">
                        <a href="https://main.solicitous.cloud/meded4/admin/courses" class="text-secondary">
                            <div class="card shadow-none m-0">
                                <div class="card-body text-center">
                                    <!--<i class="dripicons-link text-muted" style="font-size: 24px;"></i>-->
                                     <img src="https://main.solicitous.cloud/meded4/uploads/verified-user.png" style="height: 44px; width: 44px;"alt="user-image">
                                    <h3><span>39</span></h3>
                                    <p class="text-muted font-15 mb-0">Active courses</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <a href="https://main.solicitous.cloud/meded4/admin/pending_courses" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <!--<i class="dripicons-link-broken text-muted" style="font-size: 24px;"></i>-->
                                    <img src="https://main.solicitous.cloud/meded4/uploads/clock.png" style="height: 44px; width: 44px;"alt="user-image">
                                    <h3><span>7</span></h3>
                                    <p class="text-muted font-15 mb-0">Pending courses</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <a href="https://main.solicitous.cloud/meded4/admin/courses" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <!--<i class="dripicons-star text-muted" style="font-size: 24px;"></i>-->
                                      <img src="https://main.solicitous.cloud/meded4/uploads/free.png" style="height: 44px; width: 44px;"alt="user-image">
                                    <h3><span>13</span></h3>
                                    <p class="text-muted font-15 mb-0">Free courses</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <a href="https://main.solicitous.cloud/meded4/admin/courses" class="text-secondary">
                            <div class="card shadow-none m-0 border-left">
                                <div class="card-body text-center">
                                    <!--<i class="dripicons-tags text-muted" style="font-size: 24px;"></i>-->
                                    <img src="https://main.solicitous.cloud/meded4/uploads/paid.png" style="height: 44px; width: 44px;"alt="user-image">
                                    <h3><span>26</span></h3>
                                    <p class="text-muted font-15 mb-0">Paid courses</p>
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
                <h4 class="mb-3 header-title">Course list</h4>
                <form class="row justify-content-center" action="https://main.solicitous.cloud/meded4/admin/courses" method="get">
                    <!-- Course Categories -->
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="category_id">Categories</label>
                            <select class="form-control select2" data-toggle="select2" name="category_id" id="category_id">
                                <option value="all" selected>All</option>
                                                                    <optgroup label="Corneal Transplant">
                                                                                <option value="15" >Descemet stripping</option>
                                                                            <option value="39" >keratoplasty</option>
                                                                            <option value="40" >Endothelial Transplants</option>
                                                                            <option value="41" >DALK</option>
                                                                            <option value="42" >Keratoprosthesis</option>
                                                                    </optgroup>
                                                                <optgroup label="Liver Transplant">
                                                                                <option value="23" >Liver cancer</option>
                                                                            <option value="26" >Orthotopic transplant</option>
                                                                            <option value="28" >Living donor transplant</option>
                                                                            <option value="29" >Auxiliary liver transplantation</option>
                                                                    </optgroup>
                                                                <optgroup label="Clinical">
                                                                                <option value="44" >Biochemistry</option>
                                                                            <option value="45" >Genetics</option>
                                                                            <option value="46" >Immunology</option>
                                                                            <option value="47" >Physiology</option>
                                                                            <option value="48" >Pharmacology</option>
                                                                            <option value="57" >Vaccines and Viral Immunology</option>
                                                                            <option value="58" >Cancer Genomics and Precision Oncology</option>
                                                                    </optgroup>
                                                                <optgroup label="BDS">
                                                                                <option value="19" > Oral Medicine and Radiology</option>
                                                                            <option value="20" >Paediatric and Preventive Dentistry </option>
                                                                            <option value="21" >Orthodontics and Dentofacial Orthopaedics</option>
                                                                            <option value="22" >Periodontology</option>
                                                                            <option value="24" >Dental Therapeutics.</option>
                                                                            <option value="25" >Oral Pathology</option>
                                                                            <option value="27" >Oral Microbiology</option>
                                                                    </optgroup>
                                                                <optgroup label="Basics of Ayurveda">
                                                                                <option value="49" >Bachelor of Ayurvedic Medicine and Surgery(BAMS)</option>
                                                                            <option value="50" >MS/MD in Ayurveda</option>
                                                                            <option value="51" >Diploma in Ayurvedic medicine</option>
                                                                            <option value="53" >Sharir Rachana</option>
                                                                            <option value="54" >Rasa Shastra</option>
                                                                            <option value="55" >Charak Samhita</option>
                                                                            <option value="56" >Pharmacology - Essentials</option>
                                                                    </optgroup>
                                                                <optgroup label="Neurology">
                                                                                <option value="64" >Behavioral neurology</option>
                                                                            <option value="67" >neuromuscular medicine</option>
                                                                            <option value="68" >neuro-oncology</option>
                                                                            <option value="70" >vascular neurology</option>
                                                                    </optgroup>
                                                                <optgroup label=" Physiotherapy">
                                                                                <option value="60" >Basic Nursing</option>
                                                                            <option value="61" >Orientation of Physiotherapy</option>
                                                                            <option value="62" >Exercise Therapy</option>
                                                                            <option value="63" >General Medicine</option>
                                                                    </optgroup>
                                                                <optgroup label="Nutrition &amp; Dietetics">
                                                                                <option value="65" >Principles of Nutrition</option>
                                                                            <option value="66" >Community Nutrition</option>
                                                                            <option value="69" > Food Microbiology</option>
                                                                            <option value="71" >Food Preservation</option>
                                                                    </optgroup>
                                                                <optgroup label=" Urology">
                                                                                <option value="84" >Vasectomy</option>
                                                                            <option value="85" >Vasectomy Reversal</option>
                                                                            <option value="86" >Cystoscopy</option>
                                                                            <option value="87" >Prostate Procedures</option>
                                                                    </optgroup>
                                                                <optgroup label=" Plastic Surgery">
                                                                                <option value="80" >Facelift</option>
                                                                            <option value="81" >Brow/forehead lift</option>
                                                                            <option value="82" >Eyelid lift</option>
                                                                            <option value="83" >Ear reshaping</option>
                                                                    </optgroup>
                                                                <optgroup label=" Laboratory Medicine">
                                                                                <option value="88" >Acetaminophen.</option>
                                                                            <option value="89" >Adderall</option>
                                                                            <option value="90" >Amitriptyline</option>
                                                                            <option value="91" >Amlodipine</option>
                                                                    </optgroup>
                                                                <optgroup label="Robotic surgery">
                                                                                <option value="72" >Heart surgery</option>
                                                                            <option value="73" >Urologic surgery.</option>
                                                                            <option value="74" >Endometriosis</option>
                                                                            <option value="75" >Gynaecological surgery</option>
                                                                    </optgroup>
                                                                <optgroup label=" Infectious Diseases">
                                                                                <option value="76" >Chickenpox</option>
                                                                            <option value="77" >Common cold</option>
                                                                            <option value="78" >Diphtheria</option>
                                                                            <option value="79" >E. coli</option>
                                                                    </optgroup>
                                                    </select>
                    </div>
                </div>

                <!-- Course Status -->
                <div class="col-xl-2">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control select2" data-toggle="select2" name="status" id = 'status'>
                            <option value="all" selected>All</option>
                            <option value="active" >Active</option>
                            <option value="pending" >Pending</option>
                        </select>
                    </div>
                </div>

                <!-- Course Instructors -->
                <div class="col-xl-3">
                    <div class="form-group">
                        <label for="instructor_id">Instructor</label>
                        <select class="form-control select2" data-toggle="select2" name="instructor_id" id = 'instructor_id'>
                            <option value="all" selected>All</option>
                                                            <option value="13" >Pooja Chavan</option>
                                                            <option value="17" >Radhika Chalekar</option>
                                                            <option value="19" >Raj Raut </option>
                                                            <option value="20" >Sandesh Jadhav</option>
                                                            <option value="65" >dharmendra Prajapati</option>
                                                            <option value="66" >dharmendra Kumar</option>
                                                            <option value="72" >saranga </option>
                                                            <option value="76" >Rushali Joshi</option>
                                                            <option value="80" >Prathamesh Kodilkar</option>
                                                            <option value="82" >PRATHAMESH KODILKAR</option>
                                                    </select>
                    </div>
                </div>

                <!-- Course Price -->
                <div class="col-xl-2">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <select class="form-control select2" data-toggle="select2" name="price" id = 'price'>
                            <option value="all"  selected>All</option>
                            <option value="free" >Free</option>
                            <option value="paid" >Paid</option>
                        </select>
                    </div>
                </div>

                <div class="col-xl-2">
                    <label for=".." class="text-white">..</label>
                    <button type="submit" class="btn btn-primary btn-block" name="button">Filter</button>
                </div>
            </form>

            <div class="row mt-4">
                                                                <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_36.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Knee Surgery</h5>

                                        <div class="float-left">Dec, 15</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Arutla Reddy</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>5</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/knee-surgery/36" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/36">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/36">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/pending/36/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/36');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_46.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Paediatric  and Preventive Dentistry</h5>

                                        <div class="float-left">Dec, 16</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/paediatric-and-preventive-dentistry/46" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/46">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/46">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/46/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/46');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_48.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Orthodontics and Dentofacial Orthopaedics</h5>

                                        <div class="float-left">Dec, 16</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/orthodontics-and-dentofacial-orthopaedics/48" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/48">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/48">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/48/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/48');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_50.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Periodontology</h5>

                                        <div class="float-left">Dec, 16</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/periodontology/50" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/50">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/50">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/50/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/50');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_52.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Introduction to Cardiology</h5>

                                        <div class="float-left">Dec, 16</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/introduction-to-cardiology/52" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/52">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/52">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/52/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/52');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_53.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Dental Theraputic</h5>

                                        <div class="float-left">Dec, 16</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/dental-theraputic/53" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/53">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/53">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/53/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/53');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_54.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Oral pathology</h5>

                                        <div class="float-left">Dec, 16</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/oral-pathology/54" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/54">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/54">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/54/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/54');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_55.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Cardiovascular Examination</h5>

                                        <div class="float-left">Dec, 16</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/cardiovascular-examination/55" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/55">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/55">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/55/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/55');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_56.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Oral microbiology</h5>

                                        <div class="float-left">Dec, 16</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/oral-microbiology/56" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/56">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/56">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/56/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/56');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_60.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Heart Pumping</h5>

                                        <div class="float-left">Dec, 16</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/heart-pumping/60" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/60">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/60">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/60/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/60');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_61.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Medical Operation Theatre Technology</h5>

                                        <div class="float-left">Dec, 20</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b> </b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>10</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/medical-operation-theatre-technology/61" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/61">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/61">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/pending/61/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/61');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_62.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Kriya Sharir </h5>

                                        <div class="float-left">Dec, 23</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Sandesh Jadhav</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/kriya-sharir/62" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/62">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/62">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/pending/62/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/62');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_63.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Obstetrics</h5>

                                        <div class="float-left">Dec, 23</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Radhika Chalekar</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/obstetrics/63" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/63">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/63">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/pending/63/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/63');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_64.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Radiotherapy</h5>

                                        <div class="float-left">Dec, 23</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Raj Raut </b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/radiotherapy/64" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/64">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/64">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/pending/64/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/64');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_66.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Throat</h5>

                                        <div class="float-left">Dec, 23</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Pooja Chavan</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/throat/66" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/66">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/66">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/pending/66/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/66');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_68.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">dermatology</h5>

                                        <div class="float-left">Dec, 30</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Radhika Chalekar</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/dermatology/68" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/68">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/68">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/pending/68/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/68');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_75.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Gastroenterology</h5>

                                        <div class="float-left">Jan, 06</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>4</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/gastroenterology/75" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/75">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/75">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/75/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/75');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_76.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Dermatologist</h5>

                                        <div class="float-left">Jan, 06</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>2</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/dermatologist/76" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/76">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/76">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/76/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/76');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_77.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">1 - MBBS</h5>

                                        <div class="float-left">Jan, 08</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>12</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/1-mbbs/77" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/77">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/77">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/77/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/77');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_78.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">BHMS ( Bachelor of Homeopathic Medicine and Surgery )</h5>

                                        <div class="float-left">Jan, 08</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>2</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/bhms-bachelor-of-homeopathic-medicine-and-surgery/78" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/78">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/78">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/78/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/78');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_79.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Anaesthesiology</h5>

                                        <div class="float-left">Jan, 09</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>3</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/anaesthesiology/79" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/79">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/79">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/79/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/79');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_80.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Doctor of Medicine (abbreviated M.D)</h5>

                                        <div class="float-left">Jan, 09</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/doctor-of-medicine-abbreviated-m-d/80" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/80">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/80">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/80/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/80');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_81.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">789</h5>

                                        <div class="float-left">Mar, 12</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Raj Raut </b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>pending</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/789/81" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/81">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/81">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/active/81/all/all/all/all', 'Inform instructor');">
                                                              Mark as active                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/81');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_82.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">blended test</h5>

                                        <div class="float-left">Mar, 14</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Raj Raut </b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>pending</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/blended-test/82" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/82">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/82">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/active/82/all/all/all/all', 'Inform instructor');">
                                                              Mark as active                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/82');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_83.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Community Medicine</h5>

                                        <div class="float-left">Mar, 16</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Raj Raut </b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/community-medicine/83" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/83">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/83">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/pending/83/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/83');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_84.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Cardiology - R</h5>

                                        <div class="float-left">Mar, 17</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>1</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/cardiology-r/84" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/84">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/84">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/84/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/84');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/assets/frontend/default/img/course_thumbnail_placeholder.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Cardiology _ R1</h5>

                                        <div class="float-left">Mar, 17</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/cardiology-r1/85" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/85">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/85">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/85/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/85');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/assets/frontend/default/img/course_thumbnail_placeholder.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Cardiology _ R1</h5>

                                        <div class="float-left">Mar, 17</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/cardiology-r1/86" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/86">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/86">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/86/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/86');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_87.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Cardiology_R1</h5>

                                        <div class="float-left">Mar, 17</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/cardiology-r1/87" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/87">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/87">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/87/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/87');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/assets/frontend/default/img/course_thumbnail_placeholder.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">qwerty</h5>

                                        <div class="float-left">Mar, 17</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/qwerty/88" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/88">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/88">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/88/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/88');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_89.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Corneal Transplant</h5>

                                        <div class="float-left">Mar, 17</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/corneal-transplant/89" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/89">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/89">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/89/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/89');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/assets/frontend/default/img/course_thumbnail_placeholder.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">python</h5>

                                        <div class="float-left">Mar, 17</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Raj Raut </b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>pending</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/python/90" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/90">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/90">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/active/90/all/all/all/all', 'Inform instructor');">
                                                              Mark as active                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/90');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/assets/frontend/default/img/course_thumbnail_placeholder.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Python</h5>

                                        <div class="float-left">Mar, 17</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Raj Raut </b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>pending</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/python/91" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/91">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/91">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/active/91/all/all/all/all', 'Inform instructor');">
                                                              Mark as active                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/91');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/assets/frontend/default/img/course_thumbnail_placeholder.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">rtr</h5>

                                        <div class="float-left">Mar, 17</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>1</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/rtr/93" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/93">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/93">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/93/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/93');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/assets/frontend/default/img/course_thumbnail_placeholder.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">rtr</h5>

                                        <div class="float-left">Mar, 17</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>1</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/rtr/94" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/94">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/94">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/94/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/94');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_95.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">test course</h5>

                                        <div class="float-left">Mar, 19</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Raj Raut </b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>pending</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/test-course/95" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/95">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/95">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/active/95/all/all/all/all', 'Inform instructor');">
                                                              Mark as active                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/95');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_96.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">Nuclear medicine</h5>

                                        <div class="float-left">Mar, 22</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Raj Raut </b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>pending</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/nuclear-medicine/96" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/96">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/96">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/active/96/all/all/all/all', 'Inform instructor');">
                                                              Mark as active                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/96');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_97.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">test course to check notification</h5>

                                        <div class="float-left">Mar, 22</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Raj Raut </b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>pending</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/test-course-to-check-notification/97" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/97">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/97">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="showAjaxModal('https://main.solicitous.cloud/meded4/modal/popup/mail_on_course_status_changing_modal/active/97/all/all/all/all', 'Inform instructor');">
                                                              Mark as active                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/97');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_98.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">DMD</h5>

                                        <div class="float-left">Mar, 26</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/dmd/98" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/98">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/98">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/98/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/98');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                    <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="https://main.solicitous.cloud/meded4/uploads/thumbnails/course_thumbnails/course_thumbnail_default_130.jpg" alt="" style="height: 300px; max-width: 100%;">
                                        <h5 class="title">HEART SURGERY</h5>

                                        <div class="float-left">Mar, 29</div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Instrutor</div>
                                        <div class="float-right"><b>Rahul Muttamsetty</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Student</div>
                                        <div class="float-right"><b>0</b></div>
                                        <div class="clearfix"></div>

                                        <div class="float-left">Status</div>
                                        <div class="float-right"><b>active</b></div>
                                        <div class="clearfix"></div>
                                        
                                        
                                        <div class="float-right dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/home/course/heart-surgery/130" target="_blank">Preview</a></li>
                                              <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/130">Edit this course</a></li>
                                                                                                <li><a class="dropdown-item" href="https://main.solicitous.cloud/meded4/admin/course_form/course_edit/130">Section and lesson</a></li>
                                                                                            <li>
                                                                                                                                                                  <a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/change_course_status_for_admin/pending/130/all/all/all/all', 'Inform instructor');">
                                                              Mark as pending                                                          </a>
                                                                                                                                                      </li>
                                              <li><a class="dropdown-item" href="#" onclick="confirm_modal('https://main.solicitous.cloud/meded4/admin/course_actions/delete/130');">Delete</a></li>
                                          </ul>
                                      </div>
                                    </div>
                                </div>
                            </div>
                                                                    </div>
        </div>
    </div>
</div>
</div>
                    <!-- END PLACE PAGE CONTENT HERE -->
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
    <!-- all the js files -->
    <!-- bundle -->
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/app.min.js"></script>
<!-- third party js -->
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/Chart.bundle.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/jquery.dataTables.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/dataTables.bootstrap4.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/dataTables.responsive.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/responsive.bootstrap4.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/dataTables.buttons.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/buttons.bootstrap4.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/buttons.html5.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/buttons.flash.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/buttons.print.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/dataTables.keyTable.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/dataTables.select.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/summernote-bs4.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/fullcalendar.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/pages/demo.summernote.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/dropzone.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/pages/demo.dashboard.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/pages/datatable-initializer.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/font-awesome-icon-picker/fontawesome-iconpicker.min.js" charset="utf-8"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/bootstrap-tagsinput.min.js" charset="utf-8"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/bootstrap-tagsinput.min.js"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/dropzone.min.js" charset="utf-8"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/ui/component.fileupload.js" charset="utf-8"></script>
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/pages/demo.form-wizard.js"></script>
<!-- dragula js-->
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/vendor/dragula.min.js"></script>
<!-- component js -->
<script src="https://main.solicitous.cloud/meded4/assets/backend/js/ui/component.dragula.js"></script>

<script src="https://main.solicitous.cloud/meded4/assets/backend/js/custom.js"></script>

<!-- Dashboard chart's data is coming from this file -->

 <script type="text/javascript">
 ! function(o) {
     "use strict";
     var t = function() {
         this.$body = o("body"), this.charts = []
     };
     t.prototype.respChart = function(r, a, n, e) {
         Chart.defaults.global.defaultFontColor = "#8391a2", Chart.defaults.scale.gridLines.color = "#8391a2";
         var i = r.get(0).getContext("2d"),
             s = o(r).parent();
         return function() {
             var t;
             switch (r.attr("width", o(s).width()), a) {
                 case "Line":
                     t = new Chart(i, {
                         type: "line",
                         data: n,
                         options: e
                     });
                     break;
                 case "Doughnut":
                     t = new Chart(i, {
                         type: "doughnut",
                         data: n,
                         options: e
                     })
             }
             return t
         }()
     }, t.prototype.initCharts = function() {
         var t = [];
         if (0 < o("#task-area-chart").length) {
             t.push(this.respChart(o("#task-area-chart"), "Line", {
                 labels: [
                                          "January",
                                        "February",
                                        "March",
                                        "April",
                                        "May",
                                        "June",
                                        "July",
                                        "August",
                                        "September",
                                        "October",
                                        "November",
                                        "December",
                                     ],
                 datasets: [{
                     label: "This year",
                     backgroundColor: "rgba(114, 124, 245, 0.3)",
                     borderColor: "#727cf5",
                     data: [
                                                 "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                             ]
                 }]
             }, {
                 maintainAspectRatio: !1,
                 legend: {
                     display: !1
                 },
                 tooltips: {
                     intersect: !1
                 },
                 hover: {
                     intersect: !0
                 },
                 plugins: {
                     filler: {
                         propagate: !1
                     }
                 },
                 scales: {
                     xAxes: [{
                         reverse: !0,
                         gridLines: {
                             color: "rgba(0,0,0,0.05)"
                         }
                     }],
                     yAxes: [{
                         ticks: {
                             stepSize: 10,
                             display: !1
                         },
                         min: 10,
                         max: 100,
                         display: !0,
                         borderDash: [5, 5],
                         gridLines: {
                             color: "rgba(0,0,0,0)",
                             fontColor: "#fff"
                         }
                     }]
                 }
             }))
         }
         if (0 < o("#project-status-chart").length) {
             t.push(this.respChart(o("#project-status-chart"), "Doughnut", {
                 labels: ["Instructors Registered Last 7 Days", "Instructors Registered Last 30 Days"],
                 datasets: [{
                     data: [3, 6],
                     backgroundColor: ["#2d368e", "#f38020"],
                     borderColor: "transparent",
                     borderWidth: "2"
                 }]
             }, {
                 maintainAspectRatio: !1,
                 cutoutPercentage: 80,
                 legend: {
                     display: !1
                 }
             }))
         }
         return t
     }, t.prototype.init = function() {
         var r = this;
         Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif', r.charts = this.initCharts(), o(window).on("resize", function(t) {
             o.each(r.charts, function(t, r) {
                 try {
                     r.destroy()
                 } catch (t) {}
             }), r.charts = r.initCharts()
         })
     }, o.ChartJs = new t, o.ChartJs.Constructor = t
 }(window.jQuery),
 function(t) {
     "use strict";
     window.jQuery.ChartJs.init()
 }();

 </script>

<script type="text/javascript">
  $(document).ready(function() {
    $(function() {
       $('.icon-picker').iconpicker();
     });
  });
</script>

<!-- Toastr and alert notifications scripts -->
<script type="text/javascript">
function notify(message) {
  $.NotificationApp.send("Heads up!", message ,"top-right","rgba(0,0,0,0.2)","info");
}

function success_notify(message) {
  $.NotificationApp.send("Congratulations!", message ,"top-right","rgba(0,0,0,0.2)","success");
}

function error_notify(message) {
  $.NotificationApp.send("Oh snap!", message ,"top-right","rgba(0,0,0,0.2)","error");
}

function error_required_field() {
  $.NotificationApp.send("Oh snap!", "Please fill all the required fields" ,"top-right","rgba(0,0,0,0.2)","error");
}
</script>



    <script type="text/javascript">
function showAjaxModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#scrollable-modal .modal-body').html('<div style="text-align:center;"><img src="https://main.solicitous.cloud/meded4/assets/global/bg-pattern-light.svg" /></div>');
    jQuery('#scrollable-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#scrollable-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#scrollable-modal .modal-body').html(response);
            jQuery('#scrollable-modal .modal-title').html(header);
        }
    });
}
function showLargeModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#large-modal .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="https://main.solicitous.cloud/meded4/assets/global/bg-pattern-light.svg" height = "50px" /></div>');
    jQuery('#large-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#large-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#large-modal .modal-body').html(response);
            jQuery('#large-modal .modal-title').html(header);
        }
    });
}
</script>

<!-- (Large Modal)-->
<div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Scrollable modal -->
<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body ml-2 mr-2">

        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
function confirm_modal(delete_url)
{
    jQuery('#alert-modal').modal('show', {backdrop: 'static'});
    document.getElementById('update_link').setAttribute('href' , delete_url);
}
</script>

<!-- Info Alert Modal -->
<div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Heads up!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                    <a href="#" id="update_link" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

function ajax_confirm_modal(delete_url, elem_id)
{
    jQuery('#ajax-alert-modal').modal('show', {backdrop: 'static'});
    $("#appent_link_a").bind( "click", function() {
      delete_by_ajax_calling(delete_url, elem_id);
    });
}

function delete_by_ajax_calling(delete_url, elem_id){
    $.ajax({
        url: delete_url,
        success: function(response){
            var response = JSON.parse(response);
            if(response.status == 'success'){
                $('#'+elem_id).fadeOut(600);
                $.NotificationApp.send("Success!", response.message ,"top-right","rgba(0,0,0,0.2)","success");
            }else{
                $.NotificationApp.send("Oh snap!", response.message ,"top-right","rgba(0,0,0,0.2)","error");
            }
        }
    });
}
</script>

<!-- Info Alert Modal -->
<div id="ajax-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center" id="appent_link">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Heads up!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                    <a id="appent_link_a" href="javascript:;" class="btn btn-danger my-2" data-dismiss="modal">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    <script type="text/javascript">
  function togglePriceFields(elem) {
    if($("#"+elem).is(':checked')){
      $('.paid-course-stuffs').slideUp();
    }else
      $('.paid-course-stuffs').slideDown();
    }
</script>

  <script type="text/javascript">
  jQuery(document).ready(function($) {
        $.fn.dataTable.ext.errMode = 'throw';
        $('#course-datatable-server-side').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":{
                "url": "https://main.solicitous.cloud/meded4/admin/get_courses",
                "dataType": "json",
                "type": "POST",
                "data" : {selected_category_id : 'all',
                          selected_status : 'all',
                          selected_instructor_id : 'all',
                          selected_price : 'all'}
            },
            "columns": [
                { "data": "#" },
                { "data": "title" },
                { "data": "category" },
                { "data": "lesson_and_section" },
                { "data": "enrolled_student" },
                { "data": "status" },
                { "data": "price" },
                { "data": "actions" },
            ],
            "columnDefs": [{
                targets: "_all",
                orderable: false
             }]
        });
    });
  </script>
</body>
</html>
