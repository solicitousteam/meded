<?php
    $status_wise_courses = $this->crud_model->get_status_wise_courses();
    $number_of_courses = $status_wise_courses['pending']->num_rows() + $status_wise_courses['active']->num_rows();
    $number_of_lessons = $this->crud_model->get_lessons()->num_rows();
    $number_of_enrolment = $this->crud_model->enrol_history()->num_rows();
    $number_of_students = $this->user_model->get_user()->num_rows();

    $Last7Day = date("Y-m-d", strtotime("-7 days"));
    $Last30Day = date("Y-m-d", strtotime("-30 days"));
    
   $get7DayInstructor = $this->user_model->getInstrutorPast($Last7Day)->num_rows();
   $get30DayInstructor = $this->user_model->getInstrutorPast($Last30Day)->num_rows();

    $get7DayStudent = $this->user_model->getStudentPast($Last7Day)->num_rows();
    $get30DayStudent = $this->user_model->getStudentPast($Last30Day)->num_rows();
    
    
    /*  Revenue */
    
    
    //enrol_history_by_date_range
    
    
    $get7DayRevenue = $this->user_model->getRevenue($Last7Day);
    $get30DayRevenue = $this->user_model->getRevenue($Last30Day);
    
    
    
    //enrol_history_by_date_range2
    
     $get7DayEnroll = $this->crud_model->enrol_history_by_date_range2($Last7Day)->num_rows();
     $get30DayEnroll =$this->crud_model->enrol_history_by_date_range2($Last30Day)->num_rows();
    
    
    
    /* End */
    
    /* 20-05-2022 start */
    $current_date = date('Y-m-d');
    $in_week = date('Y-m-d',strtotime('-7 days'));
    $last_month = date('Y-m-d',strtotime('-1 month'));
    $last_year = date('Y-m-d',strtotime('-12 month'));
    
    $InstructorsData['in_week_active_instructor'] = $this->db->select('COUNT(id) AS active_instructor')->from('users')->where('date_added>=',strtotime($in_week))->where('date_added<=',strtotime($current_date))->where('admin_verify','1')->where('role_id','2')->where('is_instructor','1')->get()->row()->active_instructor;
    $InstructorsData['in_week_deactive_instructor'] = $this->db->select('COUNT(id) AS deactive_instructor')->from('users')->where('date_added>=',strtotime($in_week))->where('date_added<=',strtotime($current_date))->where('admin_verify','0')->where('role_id','2')->where('is_instructor','1')->get()->row()->deactive_instructor;
    
    $InstructorsData['last_month_active_instructor'] = $this->db->select('COUNT(id) AS active_instructor')->from('users')->where('date_added>=',strtotime($last_month))->where('date_added<=',strtotime($current_date))->where('admin_verify','1')->where('role_id','2')->where('is_instructor','1')->get()->row()->active_instructor;
    $InstructorsData['last_month_deactive_instructor'] = $this->db->select('COUNT(id) AS deactive_instructor')->from('users')->where('date_added>=',strtotime($last_month))->where('date_added<=',strtotime($current_date))->where('admin_verify','0')->where('role_id','2')->where('is_instructor','1')->get()->row()->deactive_instructor;
    
    $InstructorsData['last_year_active_instructor'] = $this->db->select('COUNT(id) AS active_instructor')->from('users')->where('date_added>=',strtotime($last_year))->where('date_added<=',strtotime($current_date))->where('admin_verify','1')->where('role_id','2')->where('is_instructor','1')->get()->row()->active_instructor;
    $InstructorsData['last_year_deactive_instructor'] = $this->db->select('COUNT(id) AS deactive_instructor')->from('users')->where('date_added>=',strtotime($last_year))->where('date_added<=',strtotime($current_date))->where('admin_verify','0')->where('role_id','2')->where('is_instructor','1')->get()->row()->deactive_instructor;
    
    /* 20-05-2022 close */
    
?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                   <img src="<?= base_url('uploads/man.png')?>" style="height: 44px; width: 44px;"alt="user-image">
                   
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                <?php echo $page_title; ?>
                    <a href = "<?php echo site_url('admin/instructor_form/add_instructor_form'); ?>" 
                    class="btn btn-outline-primary btn-rounded alignToTitle">
                        <i class="mdi mdi-plus"></i>
                       
                        <?php echo get_phrase('add_instructor'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">In This Week Instructors</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                  <canvas id="in-week-instructor"></canvas>
                </div>
            <div class="row text-center mt-2 py-2">
                <div class="col-6"> <a href="<?php echo base_url()?>/admin/instructors?date=<?= $in_week ?>&status=1"> <i class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                    <h3 class="font-weight-normal text-dark"> <span><?= (!empty($InstructorsData['in_week_active_instructor'])) ? $InstructorsData['in_week_active_instructor'] : 0;?></span> </h3>
                    <p class="text-muted mb-0">In This Week Active Instructor</p>
                </a> </div>
                <div class="col-6"> <a href="<?php echo base_url()?>/admin/instructors?date=<?= $in_week ?>&status=0"> <i class="mdi mdi-trending-down text-warning mt-3 h3"  style="color:#f38020!important"></i>
                    <h3 class="font-weight-normal"> <span><?= (!empty($InstructorsData['in_week_deactive_instructor'])) ? $InstructorsData['in_week_deactive_instructor'] : 0;?></span> </h3>
                    <p class="text-muted mb-0">In This Week Deactive Instructor</p>
                    </a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Last Month Instructors</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                  <canvas id="last-month-instructor"></canvas>
                </div>
            <div class="row text-center mt-2 py-2">
                <div class="col-6"> <a href="<?php echo base_url()?>/admin/instructors?date=<?= $last_month ?>&status=1"> <i class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                    <h3 class="font-weight-normal text-dark"> <span><?= (!empty($InstructorsData['last_month_active_instructor'])) ? $InstructorsData['last_month_active_instructor'] : 0;?></span> </h3>
                    <p class="text-muted mb-0">Last Month Active Instructor</p>
                </a> </div>
                <div class="col-6"> <a href="<?php echo base_url()?>/admin/instructors?date=<?= $last_month ?>&status=0"> <i class="mdi mdi-trending-down text-warning mt-3 h3"  style="color:#f38020!important"></i>
                    <h3 class="font-weight-normal"> <span><?= (!empty($InstructorsData['last_month_deactive_instructor'])) ? $InstructorsData['last_month_deactive_instructor'] : 0;?></span> </h3>
                    <p class="text-muted mb-0">Last Month Deactive Instructor</p>
                    </a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Last Year Instructors</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                  <canvas id="last-12-month-instructor"></canvas>
                </div>
            <div class="row text-center mt-2 py-2">
                <div class="col-6"> <a href="<?php echo base_url()?>/admin/instructors?date=<?= $last_year ?>&status=1"> <i class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                    <h3 class="font-weight-normal text-dark"> <span><?= (!empty($InstructorsData['last_year_active_instructor'])) ? $InstructorsData['last_year_active_instructor'] : 0;?></span> </h3>
                    <p class="text-muted mb-0">Last Year Active Instructor</p>
                </a> </div>
                <div class="col-6"> <a href="<?php echo base_url()?>/admin/instructors?date=<?= $last_year ?>&status=0"> <i class="mdi mdi-trending-down text-warning mt-3 h3"  style="color:#f38020!important"></i>
                    <h3 class="font-weight-normal"> <span><?= (!empty($InstructorsData['last_year_deactive_instructor'])) ? $InstructorsData['last_year_deactive_instructor'] : 0;?></span> </h3>
                    <p class="text-muted mb-0">Last Year Deactive Instructor</p>
                    </a> </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Total Instructors</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                  <canvas id="BA-chart-student"></canvas>
                </div>
            <div class="row text-center mt-2 py-2">
                <div class="col-6"> <a href="<?php echo base_url()?>/admin/instructors?date=<?php echo $Last7Day ?>"> <i class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                    <h3 class="font-weight-normal text-dark"> <span><?php echo $get7DayInstructor; ?></span> </h3>
                    <p class="text-muted mb-0">Instructors Registered Last 7 Days</p>
                </a> </div>
                <div class="col-6"> <a href="<?php echo base_url()?>/admin/instructors?date=<?php echo $Last30Day ?>"> <i class="mdi mdi-trending-down text-warning mt-3 h3"  style="color:#f38020!important"></i>
                    <h3 class="font-weight-normal"> <span><?php echo $get30DayInstructor ?></span> </h3>
                    <p class="text-muted mb-0">Instructors Registered Last 30 Days</p>
                    </a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-4">Total Revenue</h4>
            <div class="my-4 chartjs-chart" style="height: 202px;">
                <canvas id="BA-chart-student3"></canvas>
            </div>
            <div class="row text-center mt-2 py-2">
                <div class="col-6"> <a href="<?php echo base_url()?>/admin/mededbank?date=<?php echo $Last7Day ?>"> <i class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                    <h3 class="font-weight-normal text-dark"> <span><?php echo !empty($get7DayRevenue)?$get7DayRevenue: '0'; ?></span> </h3>
                    <p class="text-muted mb-0">Total Revenue Last 7 Days</p>
                </a> </div>
                <div class="col-6"> <a href="<?php echo base_url()?>/admin/mededbank?date=<?php echo $Last30Day ?>"> <i class="mdi mdi-trending-down text-warning mt-3 h3"  style="color:#f38020!important"></i>
                    <h3 class="font-weight-normal"> <span><?php echo $get30DayRevenue ?></span> </h3>
                    <p class="text-muted mb-0">Total Revenue Last 30 Days</p>
                    </a> </div>
                </div>
            </div>
        </div>
    </div>   
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('instructor_list'); ?></h4>
               
                <form class="row" id="filter-form" action="<?php echo site_url('admin/instructors'); ?>" method="get">
                    
                    <div class="col-xl-6">
                        <div class="form-group">
                            
                            
                            <label for="category_id"><?php echo get_phrase('category'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="category_id"
                                id='category_id'>
                                <option value="all">All</option>
                            <?php
                            $category_id = (!empty($_GET['category_id']) && $_GET['category_id']!='all') ? $_GET['category_id'] : 0;
                                // $query = "SELECT cat.id,cat.name FROM category as cat WHERE (SELECT COUNT(subcat.id) FROM category as subcat WHERE subcat.parent=cat.id) >=1 AND cat.parent>0";
                                $categorydata = $this->db->query("SELECT cat.id,cat.name FROM category as cat WHERE (SELECT COUNT(subcat.id) FROM category as subcat WHERE subcat.parent=cat.id) >=1 AND cat.parent=0")->result();
                                // print_r($categorydata);die;
                                foreach($categorydata as $catvalue)
                                {
                                    echo
                                    '<optgroup label="'.$catvalue->name.'">';
                                    $subcategorydata = $this->db->select('id,name')->from('category')->where('parent',$catvalue->id)->get()->result();
                                    foreach($subcategorydata as $subcatvalue)
                                    {
                                        
                                    
                                        
                                        $selected = ($_GET['status'] == $subcatvalue->id) ? ' selected ' : ' ';
                                        echo
                                        '<option value="'.$subcatvalue->id.'" '.$selected.'>'.$subcatvalue->name.'</option>';
                                    }
                                    '</optgroup>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="status"><?php echo get_phrase('status'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="status"
                                id="status">
                                <option value="all">All</option>
                                <option <?= (!empty($_GET['status']) && $_GET['status'] == '3' ) ? ' selected ' : ' ' ?> value="3">Pending</option>
                                <option <?= (!empty($_GET['status']) && $_GET['status'] == '1' ) ? ' selected ' : ' ' ?> value="1">Apporval</option>
                                <option <?= (!empty($_GET['status']) && $_GET['status'] == '2' ) ? ' selected ' : ' ' ?> value="2">Rejected</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="daterange"><?php echo get_phrase('Dates'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="daterange"
                                id="daterange">
                                <option value="all">All</option>
                                <option <?= (!empty($_GET['daterange']) && $_GET['daterange'] == '7~days' ) ? ' selected ' : ' ' ?> value="7~days">In This Week</option>
                                <option <?= (!empty($_GET['daterange']) && $_GET['daterange'] == '1~month' ) ? ' selected ' : ' ' ?> value="1~month">Last Month</option>
                                <option <?= (!empty($_GET['daterange']) && $_GET['daterange'] == '1~year' ) ? ' selected ' : ' ' ?> value="1~year">Last Year</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="search"><?php echo get_phrase('Search'); ?></label>
                            <input class="form-control " name="search" id = 'search' placeholder="search here" value="<?= (!empty($_GET['search'])) ? $_GET['search'] : '';?>">
                        </div>
                    </div>
                    
                    <div class="col-xl-2">
                        <label for=".." class="text-white">..</label>
                        <button type="submit" class="btn btn-primary btn-block"
                            name="button"><?php echo get_phrase('filter'); ?></button>
                    </div>
                    <div class="col-xl-2">
                        <label for=".." class="text-white">..</label>
                        <button type="button" class="btn btn-warning btn-block" form="filter-form" page="instructors" onclick="exportdata(this,'excel');">Export To Excel</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <!--<h4 class="mb-3 header-title"><?php echo get_phrase('instructors'); ?></h4>-->
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="basic-datatable table table-striped table-centered mb-0 table-responsive">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>Email-Id</th>
                                <th>Mobile</th>
                                <th>Number Courses created</th>
                                <th>Active Courses</th>
                                <th>Pending Courses</th>
                                <th>Category</th>
                                <th>Number of Students enrolled</th>
                                <th>Number of Webinars conducted</th>
                                <th>Status</th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($instructors as $key => $user) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td>
                                    <a
                                        href="<?php echo site_url('admin/instructor_profile/View/view/' . $user['id']) ?>"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></a>
                                </td>
                                <td><a href="mailto: <?php echo $user['email']; ?>"><?php echo $user['email']; ?></a></td>
                                <td><a href="tel: <?php echo $user['mobile']; ?>"><?php echo $user['mobile']; ?></a></td>
                                <td>
                                    <?php echo $this->user_model->get_number_of_instructor_course($user['id']) ?>
                                    Courses
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/courses_list?status=active&category_type=-1&instructor_id='.$user['id']);?>">
                                        <i class="fa fa-eye"></i> <?= $user['active_course'];?>
                                    </a>
                                    </td>
                                <td>
                                    <a href="<?= base_url('admin/courses_list?status=pending&category_type=-1&instructor_id='.$user['id']);?>">
                                        <i class="fa fa-eye"></i> <?= $user['pending_course'];?>
                                    </a>
                                    </td>
                                <td>
                                    <?php echo $this->user_model->get_number_of_student_enrol($user['id']) ?>
                                </td>
                                <td>
                                    <?php echo $this->user_model->get_number_of_instructor_webinar($user['id']) ?>
                                </td>
                                <td></td>
                                <td>
                                    <?php
                                    
                             
                                    
                                    if ($user['admin_verify'] == "0") : ?>
                                        <div class="badge badge-danger"><?php echo get_phrase('pending'); ?></div>
                                        <?php elseif ($user['admin_verify'] == "1") : ?>
                                        <div class="badge badge-success"><?php echo get_phrase('approved'); ?></div> 
                                        <?php elseif ($user['admin_verify'] == "2") : ?>
                                        <div class="badge badge-danger">Rejected</div>
                                        <?php endif; ?>
                                </td>
                                <td>
                                    <div class="dropright dropright">
                                        <button type="button"
                                            class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="<?= base_url("admin/instructor_activity/".$user['id']);?>">View Activity</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?= base_url("admin/instructor_detail/".$user['id']."?all");?>">View detail</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="<?php echo site_url('admin/instructor_form/edit_instructor_form/' . $user['id']) ?>"><?php echo get_phrase('edit'); ?></a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="confirm_modal('<?php echo site_url('admin/instructors/delete/' . $user['id']); ?>');"><?php echo get_phrase('delete'); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
            </div>
        </div> <!-- end card body-->
    </div> <!-- end card -->
</div><!-- end col-->
</div>

<style> 
.row.mt-4.dashbox .card-body.text-center {
    padding: 14px 20px;
}

.dashbox .card {
    border-radius: 20px;
}
</style>
<script type="text/javascript">
    $('#unpaid-instructor-revenue').mouseenter(function() {
        $('#go-to-instructor-revenue').show();
    });
    $('#unpaid-instructor-revenue').mouseleave(function() {
        $('#go-to-instructor-revenue').hide();
    });
</script> 
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script> 
<script type="text/javascript">
var BAChartDataValue = [
    <?php echo $get7DayInstructor ?>,
    <?php echo $get30DayInstructor ?>
];
var BAChartDataLabel = [
    'Instructors Registered Last 7 Days',
    'Instructors Registered Last 30 Days'
];
var BAChartJobErrColors = [
    "#2d368e",
    "#f38020"
];

var BAChartCountTotal = 0;
if (BAChartDataValue.length > 0) {
    BAChartCountTotal = BAChartDataValue.reduce(function(acc, currentVal, currentIdx, arr){
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function(){
    var BAChartCtx = document.getElementById('BA-chart-student').getContext('2d');
    var BAChartJobErr = new Chart(BAChartCtx, {
        type: 'doughnut',
        data: {
            labels: BAChartDataLabel,
            datasets: [{
                data: BAChartDataValue,
                backgroundColor: BAChartJobErrColors,
                borderColor: '#fff',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                labels: [
                    {
                        render: 'label',
                        fontColor: '#000',
                        position: 'outside'
                    },
                    {
                        render: 'percentage',
                        fontColor: '#fff',
                    }
                ],
                doughnutlabel: {
                    labels: [
                        {
                            text: 'Total: ' + BAChartCountTotal,
                        }
                    ]
                }
            },
            legend: {
                display: false
            }
        }
    });
});










var BAChartDataValue1 = [
    <?php echo $get7DayStudent ?>,
    <?php echo $get30DayStudent ?>
];
var BAChartDataLabel1 = [
    'Students Registered Last 7 Days',
    'Students Registered Last 30 Days'
];
var BAChartJobErrColors1 = [
    "#d9534f",
    "#5bc0de"
];

var BAChartCountTotal1 = 0;
if (BAChartDataValue1.length > 0) {
    BAChartCountTotal1 = BAChartDataValue1.reduce(function(acc, currentVal, currentIdx, arr){
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function(){
    var BAChartCtx = document.getElementById('BA-chart-student1').getContext('2d');
    var BAChartJobErr = new Chart(BAChartCtx, {
        type: 'doughnut',
        data: {
            labels: BAChartDataLabel1,
            datasets: [{
                data: BAChartDataValue1,
                backgroundColor: BAChartJobErrColors1,
                borderColor: '#fff',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                labels: [
                    {
                        render: 'label',
                        fontColor: '#000',
                        position: 'outside'
                    },
                    {
                        render: 'percentage',
                        fontColor: '#fff',
                    }
                ],
                doughnutlabel: {
                    labels: [
                        {
                            text: 'Total: ' + BAChartCountTotal1,
                        }
                    ]
                }
            },
            legend: {
                display: false
            }
        }
    });
});












var BAChartDataValue2 = [
    <?php echo $get7DayStudent ?>,
    <?php echo $get30DayStudent ?>
];
var BAChartDataLabel2 = [
    'Courses Enrolled Last 7 Days',
    'Courses Enrolled Last 30 Days'
];
var BAChartJobErrColors2 = [
    "#ff7f50",
    "#6495ed"
];

var BAChartCountTotal2 = 0;
if (BAChartDataValue2.length > 0) {
    BAChartCountTotal2 = BAChartDataValue1.reduce(function(acc, currentVal, currentIdx, arr){
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function(){
    var BAChartCtx = document.getElementById('BA-chart-student2').getContext('2d');
    var BAChartJobErr = new Chart(BAChartCtx, {
        type: 'doughnut',
        data: {
            labels: BAChartDataLabel2,
            datasets: [{
                data: BAChartDataValue2,
                backgroundColor: BAChartJobErrColors2,
                borderColor: '#fff',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                labels: [
                    {
                        render: 'label',
                        fontColor: '#000',
                        position: 'outside'
                    },
                    {
                        render: 'percentage',
                        fontColor: '#fff',
                    }
                ],
                doughnutlabel: {
                    labels: [
                        {
                            text: 'Total: ' + BAChartCountTotal2,
                        }
                    ]
                }
            },
            legend: {
                display: false
            }
        }
    });
});







var BAChartDataValue3 = [
    <?php echo $get7DayStudent ?>,
    <?php echo $get30DayStudent ?>
];
var BAChartDataLabel3 = [
    'Total Revenue Last 7 Days',
    'Total Revenue Last 30 Days'
];
var BAChartJobErrColors3 = [
    "#3cb371",
    "#7b68ee"
];

var BAChartCountTotal3 = 0;
if (BAChartDataValue3.length > 0) {
    BAChartCountTotal3 = BAChartDataValue1.reduce(function(acc, currentVal, currentIdx, arr){
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function(){
    var BAChartCtx = document.getElementById('BA-chart-student3').getContext('2d');
    var BAChartJobErr = new Chart(BAChartCtx, {
        type: 'doughnut',
        data: {
            labels: BAChartDataLabel3,
            datasets: [{
                data: BAChartDataValue3,
                backgroundColor: BAChartJobErrColors3,
                borderColor: '#fff',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                labels: [
                    {
                        render: 'label',
                        fontColor: '#000',
                        position: 'outside'
                    },
                    {
                        render: 'percentage',
                        fontColor: '#fff',
                    }
                ],
                doughnutlabel: {
                    labels: [
                        {
                            text: 'Total: ' + BAChartCountTotal3,
                        }
                    ]
                }
            },
            legend: {
                display: false
            }
        }
    });
});

/* 20-05-2022 start */

var InThisWeekInstructorValue = [
    <?= $InstructorsData['in_week_active_instructor'];?>,
    <?= $InstructorsData['in_week_deactive_instructor'];?>
];
var InThisWeekInstructorLabel = [
    'In This Week Active Instructor',
    'In This Week Deactive Instructor'
];
var InThisWeekInstructorColors = [
    "#7b68ee",
    "#fa5c7c"
];

var InThisWeekInstructorChart = 0;
if (InThisWeekInstructorValue.length > 0) {
    InThisWeekInstructorChart = InThisWeekInstructorValue.reduce(function(acc, currentVal, currentIdx, arr){
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function(){
    var InThisWeekInstructorCTX = document.getElementById('in-week-instructor').getContext('2d');
    var InThisWeekInstructorJobErr = new Chart(InThisWeekInstructorCTX, {
        type: 'doughnut',
        data: {
            labels: InThisWeekInstructorLabel,
            datasets: [{
                data: InThisWeekInstructorValue,
                backgroundColor: InThisWeekInstructorColors,
                borderColor: '#fff',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                labels: [
                    {
                        render: 'label',
                        fontColor: '#000',
                        position: 'outside'
                    },
                    {
                        render: 'percentage',
                        fontColor: '#fff',
                    }
                ],
                doughnutlabel: {
                    labels: [
                        {
                            text: 'Total: ' + InThisWeekInstructorChart,
                        }
                    ]
                }
            },
            legend: {
                display: false
            }
        }
    });
});


var LastMonthInstructorValue = [
    <?= $InstructorsData['last_month_active_instructor'];?>,
    <?= $InstructorsData['last_month_deactive_instructor'];?>
];
var LastMonthInstructorLabel = [
    'Last Month Active Instructor',
    'Last Month Deactive Instructor'
];
var LastMonthInstructorColors = [
    "#ffa600",
    "#58508d"
];

var LastMonthInstructorChart = 0;
if (LastMonthInstructorValue.length > 0) {
    LastMonthInstructorChart = LastMonthInstructorValue.reduce(function(acc, currentVal, currentIdx, arr){
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function(){
    var LastMonthInstructorCTX = document.getElementById('last-month-instructor').getContext('2d');
    var LastMonthInstructorJobErr = new Chart(LastMonthInstructorCTX, {
        type: 'doughnut',
        data: {
            labels: LastMonthInstructorLabel,
            datasets: [{
                data: LastMonthInstructorValue,
                backgroundColor: LastMonthInstructorColors,
                borderColor: '#fff',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                labels: [
                    {
                        render: 'label',
                        fontColor: '#000',
                        position: 'outside'
                    },
                    {
                        render: 'percentage',
                        fontColor: '#fff',
                    }
                ],
                doughnutlabel: {
                    labels: [
                        {
                            text: 'Total: ' + LastMonthInstructorChart,
                        }
                    ]
                }
            },
            legend: {
                display: false
            }
        }
    });
});


var LastOneYearInstructorValue = [
    <?= $InstructorsData['last_year_active_instructor'];?>,
    <?= $InstructorsData['last_year_deactive_instructor'];?>
];
var LastOneYearInstructorLabel = [
    'Last Year Active Instructor',
    'Last Year Deactive Instructor'
];
var LastOneYearInstructorColors = [
    "#5bc0de",
    "#0acf97"
];

var LastOneYearInstructorChart = 0;
if (LastOneYearInstructorValue.length > 0) {
    LastOneYearInstructorChart = LastOneYearInstructorValue.reduce(function(acc, currentVal, currentIdx, arr){
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function(){
    var LastOneYearInstructorCTX = document.getElementById('last-12-month-instructor').getContext('2d');
    var LastOneYearInstructorJobErr = new Chart(LastOneYearInstructorCTX, {
        type: 'doughnut',
        data: {
            labels: LastOneYearInstructorLabel,
            datasets: [{
                data: LastOneYearInstructorValue,
                backgroundColor: LastOneYearInstructorColors,
                borderColor: '#fff',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                labels: [
                    {
                        render: 'label',
                        fontColor: '#000',
                        position: 'outside'
                    },
                    {
                        render: 'percentage',
                        fontColor: '#fff',
                    }
                ],
                doughnutlabel: {
                    labels: [
                        {
                            text: 'Total: ' + LastOneYearInstructorChart,
                        }
                    ]
                }
            },
            legend: {
                display: false
            }
        }
    });
});
/* 20-05-2022 close*/

$('.basic-datatable').dataTable(); 
</script> 
