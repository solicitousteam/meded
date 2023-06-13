<?php
$instructor_id = $this->session->userdata('user_id');

$UserData = $this->db->query("SELECT role_id FROM users ")->row_array();

$CountData = [];

$CartData['total_instructor'] = $this->db->select('count(id) as count')->where('role_id',2)->where('is_instructor',1)->where_in('admin_verify',array('1'))->get('users')->row()->count;

// $CartData['total_student'] = $this->db->select('count(id) as count')->where('role_id',2)->where('is_instructor',0)->get('users')->row()->count;

// $CartData['total_enrol'] = $this->db->select('count(enrol.course_id) as course')->from('enrol')->join('course','course.id=enrol.course_id')->where('course.status','active')->get('')->row()->course;
/* --------------------------------------------------- */
$this->db->select("users.id");
$this->db->from('users');
// $this->db->join('enrol','users.id=enrol.user_id');
// $this->db->join('course','course.id=enrol.course_id');
$this->db->where('users.role_id', 2);
$this->db->where('users.is_instructor', 0);
$totaldata = $this->db->get('')->result();
$CartData['total_student'] = (!empty($totaldata)) ? count($totaldata) : 0;
/* --------------------------------------------------- */

/* --------------------------------------------------- */
$this->db->select('enrol.course_id');
$this->db->from('enrol');
$this->db->join('course','course.id=enrol.course_id');
$this->db->join('category','category.id=course.sub_category_id');
$this->db->join('users','users.id=course.user_id');
$this->db->group_by('enrol.course_id');
$totaldata = $this->db->get('')->result();
$CartData['total_enrol'] = (!empty($totaldata)) ? count($totaldata) : 0;
/* --------------------------------------------------- */


$CartData['total_revenue'] = $this->db->query("SELECT SUM(amount) as total_revenue FROM payment")->row()->total_revenue;


$last_7_days = date('Y-m-d',strtotime('-7 days'));
$last_1_month = date('Y-m-d',strtotime('-1 month'));

$CartData['last_7_days_instrutors'] = $this->db->select('count(id) as count')->where('role_id',2)->where('is_instructor',1)->where_in('admin_verify',array('1'))->where('date_added>=',strtotime($last_7_days))->get('users')->row()->count;
$CartData['last_1_month_instrutors'] = $this->db->select('count(id) as count')->where('role_id',2)->where('is_instructor',1)->where_in('admin_verify',array('1'))->where('date_added>=',strtotime($last_1_month))->get('users')->row()->count;

$CartData['last_7_days_student'] = $this->db->select('count(id) as count')->where('role_id',2)->where('is_instructor',0)->where('date_added>=',strtotime($last_7_days))->get('users')->row()->count;
$CartData['last_1_month_student'] = $this->db->select('count(id) as count')->where('role_id',2)->where('is_instructor',0)->where('date_added>=',strtotime($last_1_month))->get('users')->row()->count;


$CartData['last_7_days_course'] = $this->db->select('count(id) as count')->where('date_added>=',strtotime($last_7_days))->get('course')->row()->count;
$CartData['last_1_month_course'] = $this->db->select('count(id) as count')->where('date_added>=',strtotime($last_1_month))->get('course')->row()->count;

$CartData['last_7_days_revenue'] =  $this->db->select('SUM(amount) as total_revenue')->where('date_added>=',strtotime($last_7_days))->get('payment')->row()->total_revenue;
$CartData['last_1_month_revenue'] = $this->db->select('SUM(amount) as total_revenue')->where('date_added>=',strtotime($last_1_month))->get('payment')->row()->total_revenue;
// $Cart
// echo json_encode($CartData);

/* 20-05-2022 start */
$CartData['total_registered_instructor'] = $this->db->query("SELECT count(id) as total_register_instructor FROM `users` as instr WHERE admin_verify='1'")->row()->total_register_instructor;
$CartData['instructor_with_course'] = $this->db->query("SELECT count(id) as instructor_with_course FROM `users` as instr WHERE admin_verify='1' AND (SELECT count(course.id) FROM course WHERE user_id=instr.id)>0")->row()->instructor_with_course;
 
/* 20-05-2022 close */
?>

<div class="row">
    <div class="col-xl-12">
        <h4 class="page-title">
            <img src="<?= base_url('uploads/dashboard.png')?>" style="height: 44px; width: 44px;" alt="user-image">
            <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
            <?php echo "&nbsp;&nbsp;" . get_phrase('Dashboard'); ?>
        </h4>
    </div> <!-- end card -->
</div><!-- end col-->
</div>

<!--<img src="https://ai24x7.com/uploads/Bannersmeded-01.jpg" style="height: 260px; width: 100%;"alt="user-image">-->

<div class="row mt-4 dashbox">
    <div class="col-sm-6 col-xl-3">
        <a href="<?php echo site_url('admin/instructors?status=1'); ?>" class="text-secondary">
            <div class="card bg-warning">
                <div class="card-body text-center">
                    <!--<i class="dripicons-archive text-muted" style="font-size: 24px;"></i>-->
                    <div class="imgcard"> <img src="<?= base_url('uploads/add-user.png')?>"
                        style="height: 44px; width: 44px;" alt="user-image"></div>
                    <h3><span class="text-white"><?= ($CartData['total_instructor'] > 0) ? $CartData['total_instructor'] : 0; ?></span></h3>
                    <p class="text-white font-15 mb-0"><?php echo get_phrase('Instructors_Registered'); ?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card bg-primary">
            <a href="<?php echo site_url('admin/users'); ?>" class="card-body text-center">
                <!--<i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>-->
                <div class="imgcard"> <img src="<?= base_url('uploads/add-user.png')?>"
                        style="height: 44px; width: 44px;" alt="user-image"></div>
                <h3><span class="text-white"><?= ($CartData['total_student'] > 0) ? $CartData['total_student'] : 0; ?></span></h3>
                <p class="text-white font-15 mb-0"><?php echo get_phrase('Students_Registered'); ?></p>
            </a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <a href="<?php echo site_url('admin/courses_enrolled'); ?>" class="text-secondary">
            <div class="card bg-danger ">
                <div class="card-body text-center">
                    <!--<i class="dripicons-inbox text-muted" style="font-size: 24px;"></i>-->
                    <div class="imgcard"> <img src="<?= base_url() ?>uploads/online-learning.png"
                            style="height: 44px; width: 44px;" alt="user-image"></div>
                    <h3><span
                            class="text-white"><?= ($CartData['total_enrol'] > 0) ? $CartData['total_enrol'] : 0; ?></span>
                    </h3>
                    <p class="text-white font-15 mb-0"><?php echo get_phrase('Courses_Enrolled'); ?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-xl-3">
        <a href="<?php echo site_url('admin/admin_revenue'); ?>" class="text-secondary">
            <div class="card  bg-info">
                <div class="card-body text-center">
                    <!--<i class="dripicons-pin text-muted" style="font-size: 24px;"></i>-->
                    <div class="imgcard"> <img src="<?= base_url('uploads/withdrawal.png')?>"
                            style="height: 44px; width: 44px;" alt="user-image"></div>
                    <h3><span
                            class="text-white"><?= ($CartData['total_revenue'] > 0) ? currency_code_and_symbol().' '.$CartData['total_revenue'] : currency_code_and_symbol().' 0'; ?></span>
                    </h3>
                    <p class="text-white font-15 mb-0"><?php echo get_phrase('Total_Revenue'); ?></p>
                </div>
            </div>
        </a>
    </div>

</div> <!-- end row -->


<div class="row ">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Instructors</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="BA-chart-instructor"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/admin/instructors?status=1&course=no"> <i class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                            <!--<h3 class="font-weight-normal text-white"> <span><?php // echo $get7DayInstructor; 
                                                                                    ?></span> </h3>-->
                            <h3 class="font-weight-normal"><span><?= ($CartData['total_registered_instructor'] > 0) ? $CartData['total_registered_instructor'] : 0;?></span> </h3>
                            <p class="text-muted mb-0">Enrolled Instructor</p>
                        </a> </div>
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/admin/instructors?status=1&course=yes"> <i
                                class="mdi mdi-trending-down text-warning mt-3 h3" style="color:#f38020!important"></i>
                            <h3 class="font-weight-normal"> <span><?= ($CartData['instructor_with_course'] > 0) ? $CartData['instructor_with_course'] : 0;?></span> </h3>
                            <p class="text-muted mb-0">Active Instructors</p>
                        </a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Students</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="BA-chart-student"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/admin/users?date=<?php echo $last_7_days ?>"> <i
                                class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                            <h3 class="font-weight-normal"> <span><?= ($CartData['last_7_days_student'] > 0) ? $CartData['last_7_days_student'] : 0 ?></span> </h3>
                            <p class="text-muted mb-0">Students Last 7 Days</p>
                        </a> </div>
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/admin/users?date=<?php echo $last_1_month ?>"> <i
                                class="mdi mdi-trending-down text-warning mt-3 h3" style="color:#f38020!important"></i>
                            <h3 class="font-weight-normal"> <span><?= ($CartData['last_1_month_student'] > 0) ? $CartData['last_1_month_student'] : 0 ?></span>
                            </h3>
                            <p class="text-muted mb-0">Students Last 30 Days</p>
                        </a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Courses</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="BA-chart-course"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/admin/courses?dashboard&date=<?php echo $last_7_days ?>"> <i
                                class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                            <h3 class="font-weight-normal"> <span><?= ($CartData['last_7_days_course'] > 0) ? $CartData['last_7_days_course'] : 0 ?></span>
                            </h3>
                            <p class="text-muted mb-0">Courses Last 7 Days</p>
                        </a> </div>
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/admin/courses?dashboard&date=<?php echo $last_1_month ?>"> <i
                                class="mdi mdi-trending-down text-warning mt-3 h3" style="color:#f38020!important"></i>
                            <h3 class="font-weight-normal"> <span><?= ($CartData['last_1_month_course'] > 0) ? $CartData['last_1_month_course'] : 0 ?></span>
                            </h3>
                            <p class="text-muted mb-0">Courses Last 30 Days</p>
                        </a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Revenue</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="BA-chart-revenue"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/admin/admin_revenue?date=<?php echo $last_7_days ?>"> <i
                                class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                            <!--<h3 class="font-weight-normal text-white"> <span><?php // echo $get7DayInstructor; 
                                                                                    ?></span> </h3>-->
                            <h3 class="font-weight-normal"><span><?= ($CartData['last_7_days_revenue'] > 0) ? currency_code_and_symbol().' '.$CartData['last_7_days_revenue'] : currency_code_and_symbol().' 0';?></span> </h3>
                            <p class="text-muted mb-0">Revenue Last 7 Days</p>
                        </a> </div>
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/admin/admin_revenue?date=<?php echo $last_1_month ?>"> <i
                                class="mdi mdi-trending-down text-warning mt-3 h3" style="color:#f38020!important"></i>
                            <h3 class="font-weight-normal"> <span><?= ($CartData['last_1_month_revenue'] > 0) ? currency_code_and_symbol().' '.$CartData['last_1_month_revenue'] : currency_code_and_symbol().' 0';?></span> </h3>
                            <p class="text-muted mb-0">Revenue Last 30 Days</p>
                        </a> </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end col-->
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
    <?= $CartData['total_registered_instructor'] ?>,
    <?= $CartData['instructor_with_course'] ?>
];
var BAChartDataLabel = [
    'Instructor Last 7 Days',
    'Instructor Last 30 Days'
];
var BAChartJobErrColors = [
    "#2d368e",
    "#f38020"
];

var BAChartCountTotal = 0;
if (BAChartDataValue.length > 0) {
    BAChartCountTotal = BAChartDataValue.reduce(function(acc, currentVal, currentIdx, arr) {
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function() {
    var BAChartCtx = document.getElementById('BA-chart-instructor').getContext('2d');
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
                labels: [{
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
                    labels: [{
                        text: 'Total: ' + BAChartCountTotal,
                    }]
                }
            },
            legend: {
                display: false
            }
        }
    });
});


var BAChartDataValue1 = [
    <?= $CartData['last_7_days_student'] ?>,
    <?= $CartData['last_1_month_student'] ?>
];
var BAChartDataLabel1 = [
    'Students Last 7 Days',
    'Students Last 30 Days'
];
var BAChartJobErrColors1 = [
    "#d9534f",
    "#5bc0de"
];

var BAChartCountTotal1 = 0;
if (BAChartDataValue1.length > 0) {
    BAChartCountTotal1 = BAChartDataValue1.reduce(function(acc, currentVal, currentIdx, arr) {
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function() {
    var BAChartCtx = document.getElementById('BA-chart-student').getContext('2d');
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
                labels: [{
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
                    labels: [{
                        text: 'Total: ' + BAChartCountTotal1,
                    }]
                }
            },
            legend: {
                display: false
            }
        }
    });
});


var BAChartDataValue2 = [
    <?= $CartData['last_7_days_course'] ?>,
    <?= $CartData['last_1_month_course'] ?>
];
var BAChartDataLabel2 = [
    'Courses Last 7 Days',
    'Courses Last 30 Days'
];
var BAChartJobErrColors2 = [
    "#ff7f50",
    "#6495ed"
];

var BAChartCountTotal2 = 0;
if (BAChartDataValue2.length > 0) {
    BAChartCountTotal2 = BAChartDataValue2.reduce(function(acc, currentVal, currentIdx, arr) {
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function() {
    var BAChartCtx = document.getElementById('BA-chart-course').getContext('2d');
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
                labels: [{
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
                    labels: [{
                        text: 'Total: ' + BAChartCountTotal2,
                    }]
                }
            },
            legend: {
                display: false
            }
        }
    });
});


var BAChartDataValue3 = [
    <?= $CartData['last_7_days_revenue'] ?>,
    <?= $CartData['last_1_month_revenue'] ?>
];
var BAChartDataLabel3 = [
    'Revenue Last 7 Days',
    'Revenue Last 30 Days'
];
var BAChartJobErrColors3 = [
    "#ff7f50",
    "#6495ed"
];

var BAChartCountTotal3 = 0;
if (BAChartDataValue3.length > 0) {
    BAChartCountTotal3 = BAChartDataValue3.reduce(function(acc, currentVal, currentIdx, arr) {
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function() {
    var BAChartCtx = document.getElementById('BA-chart-revenue').getContext('2d');
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
                labels: [{
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
                    labels: [{
                        text: 'Total: ' + BAChartCountTotal3,
                    }]
                }
            },
            legend: {
                display: false
            }
        }
    });
});
</script>