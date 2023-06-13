<?php
$instructor_id = $this->session->userdata('user_id');

$number_of_courses = $this->crud_model->get_instructor_wise_courses($instructor_id)->num_rows();
$number_of_enrolment_result = $this->crud_model->instructor_wise_enrolment($instructor_id);
if ($number_of_enrolment_result) {
    $number_of_enrolment = $number_of_enrolment_result->num_rows();
} else {
    $number_of_enrolment = 0;
}
$total_pending_amount = $this->crud_model->get_total_pending_amount($instructor_id);
$requested_withdrawal_amount = $this->crud_model->get_requested_withdrawal_amount($instructor_id);
?>

<?php
$status_wise_courses = $this->crud_model->get_status_wise_courses();



$number_of_students = $this->user_model->get_user()->num_rows();

$Last7Day = date("Y-m-d", strtotime("-7 days"));
$Last30Day = date("Y-m-d", strtotime("-30 days"));

$get7DayInstructor = $this->user_model->getInstrutorPast($Last7Day)->num_rows();
$get30DayInstructor = $this->user_model->getInstrutorPast($Last30Day)->num_rows();

$get7DayStudent = $this->user_model->getStudentPast($Last7Day)->num_rows();
$get30DayStudent = $this->user_model->getStudentPast($Last30Day)->num_rows();




//change on date 23-04-2022 start
$last_7_day = date('Y-m-d', strtotime('-7 days'));
$last_1_month = date('Y-m-d', strtotime('-1 month'));

$user_id = $this->session->userdata('user_id');

$active_course_last_7_day = $this->db->query("SELECT COUNT(id) as total_course FROM course WHERE date_added>='" . strtotime($last_7_day) . "' AND user_id='$user_id' AND status='active'")->row()->total_course;
$active_course_last_1_month = $this->db->query("SELECT COUNT(id) as total_course FROM course WHERE date_added>='" . strtotime($last_1_month) . "' AND user_id='$user_id' AND status='active'")->row()->total_course;

$pending_course_last_7_day = $this->db->query("SELECT COUNT(id) as total_course FROM course WHERE date_added>='" . strtotime($last_7_day) . "' AND user_id='$user_id' AND status='pending'")->row()->total_course;
$pending_course_last_1_month = $this->db->query("SELECT COUNT(id) as total_course FROM course WHERE date_added>='" . strtotime($last_1_month) . "' AND user_id='$user_id' AND status='pending'")->row()->total_course;

$CourseData = $this->db->select('id')->where('user_id', $user_id)->get('course')->result();

if (!empty($CourseData)) {
    $enrol_last_7_day = $this->db->query("SELECT COUNT(id) as total_enrol FROM enrol WHERE date_added>='" . strtotime($last_7_day) . "' AND course_id IN('" . implode("','", array_column($CourseData, 'id')) . "')")->row()->total_enrol;
    $enrol_last_1_month = $this->db->query("SELECT COUNT(id) as total_enrol FROM enrol WHERE date_added>='" . strtotime($last_1_month) . "' AND course_id IN('" . implode("','", array_column($CourseData, 'id')) . "')")->row()->total_enrol;
}
//change on date 23-04-2022 stop
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
        <a href="<?php echo site_url('user/courses?dashboard'); ?>" class="text-secondary">
            <div class="card bg-warning">
                <div class="card-body text-center">
                    <!--<i class="dripicons-archive text-muted" style="font-size: 24px;"></i>-->
                    <div class="imgcard"> <img src="<?= base_url('uploads/landing-page.png')?>"
                            style="height: 44px; width: 44px;" alt="user-image"></div>
                    <h3><span class="text-white"><?php echo $number_of_courses; ?></span></h3>
                    <p class="text-white font-15 mb-0"><?php echo get_phrase('number_of_courses'); ?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-xl-3">
        <a class="card bg-primary" href="<?= base_url('user/courses_enrolled') ?>">
            <div class="card-body text-center">
                <!--<i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>-->
                <div class="imgcard"> <img src="<?= base_url('uploads/add-user.png')?>"
                        style="height: 44px; width: 44px;" alt="user-image"></div>
                <h3><span class="text-white"><?php echo $number_of_enrolment; ?></span></h3>
                <p class="text-white font-15 mb-0"><?php echo get_phrase('number_of_enrollment'); ?></p>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-xl-3">
        <a href="<?php echo site_url('user/payout_report'); ?>" class="text-secondary">
            <div class="card bg-danger ">
                <div class="card-body text-center">
                    <!--<i class="dripicons-inbox text-muted" style="font-size: 24px;"></i>-->
                    <div class="imgcard"> <img src="<?= base_url('uploads/pending.png')?>"
                            style="height: 44px; width: 44px;" alt="user-image"></div>
                    <h3><span
                            class="text-white"><?php echo $total_pending_amount > 0 ? currency($total_pending_amount) : currency_code_and_symbol() . '' . $total_pending_amount; ?></span>
                    </h3>
                    <p class="text-white font-15 mb-0"><?php echo get_phrase('pending_balance'); ?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-xl-3">
        <a href="<?php echo site_url('user/payout_report'); ?>" class="text-secondary">
            <div class="card  bg-info">
                <div class="card-body text-center">
                    <!--<i class="dripicons-pin text-muted" style="font-size: 24px;"></i>-->
                    <div class="imgcard"> <img src="<?= base_url('uploads/withdrawal.png')?>"
                            style="height: 44px; width: 44px;" alt="user-image"></div>
                    <h3><span
                            class="text-white"><?php echo $requested_withdrawal_amount > 0 ? currency($requested_withdrawal_amount) : currency_code_and_symbol() . '' . $requested_withdrawal_amount; ?></span>
                    </h3>
                    <p class="text-white font-15 mb-0"><?php echo get_phrase('requested_withdrawal_amount'); ?></p>
                </div>
            </div>
        </a>
    </div>

</div> <!-- end row -->


<div class="row ">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Total Enrollment</h4>
                <!--Registered Students-->
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="BA-chart-enrol"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/user/courses_enrolled?date=<?php echo $Last7Day ?>"> <i
                                class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                            <h3 class="font-weight-normal">
                                <span><?= ($enrol_last_7_day > 0) ? $enrol_last_7_day : 0; ?></span> </h3>
                            <p class="text-muted mb-0">Last 7 Days Enrol</p>
                        </a> </div>
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/user/courses_enrolled?date=<?php echo $Last30Day ?>"> <i
                                class="mdi mdi-trending-down text-warning mt-3 h3" style="color:#f38020!important"></i>
                            <h3 class="font-weight-normal">
                                <span><?= ($enrol_last_1_month > 0) ? $enrol_last_1_month : 0; ?></span> </h3>
                            <p class="text-muted mb-0">Last 30 Days Enrol</p>
                        </a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Active Courses</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="BA-chart-active-course"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/user/courses?dashboard&status=active&date=<?php echo $Last7Day ?>">
                            <i class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                            <h3 class="font-weight-normal"> <span><?= $active_course_last_7_day; ?></span> </h3>
                            <p class="text-muted mb-0">Active Courses Last 7 Days</p>
                        </a> </div>
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/user/courses?dashboard&status=active&date=<?php echo $Last30Day ?>">
                            <i class="mdi mdi-trending-down text-warning mt-3 h3" style="color:#f38020!important"></i>
                            <h3 class="font-weight-normal"> <span><?= $active_course_last_1_month ?></span> </h3>
                            <p class="text-muted mb-0">Active Courses Last 30 Days</p>
                        </a> </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Pending Courses</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="BA-chart-pending-course"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/user/courses?dashboard&status=pending&date=<?php echo $Last7Day ?>">
                            <i class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                            <h3 class="font-weight-normal"> <span><?= $pending_course_last_7_day; ?></span> </h3>
                            <p class="text-muted mb-0">Pending Courses Last 7 Days</p>
                        </a> </div>
                    <div class="col-6"> <a
                            href="<?php echo base_url() ?>/user/courses?dashboard&status=pending&date=<?php echo $Last30Day ?>">
                            <i class="mdi mdi-trending-down text-warning mt-3 h3" style="color:#f38020!important"></i>
                            <h3 class="font-weight-normal"> <span><?= $pending_course_last_1_month ?></span> </h3>
                            <p class="text-muted mb-0">Pending Courses Last 30 Days</p>
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
    <?= $enrol_last_7_day ?>,
    <?= $enrol_last_1_month ?>
];
var BAChartDataLabel = [
    'Enrollment Last 7 Days',
    'Enrollment Last 30 Days'
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
    var BAChartCtx = document.getElementById('BA-chart-enrol').getContext('2d');
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
    <?= $active_course_last_7_day ?>,
    <?= $active_course_last_1_month ?>
];
var BAChartDataLabel1 = [
    'Active Course Last 7 Days',
    'Active Course Last 30 Days'
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
    var BAChartCtx = document.getElementById('BA-chart-active-course').getContext('2d');
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
    <?= $pending_course_last_7_day ?>,
    <?= $pending_course_last_1_month ?>
];
var BAChartDataLabel2 = [
    'Pending Course Last 7 Days',
    'Pending Course Last 30 Days'
];
var BAChartJobErrColors2 = [
    "#ff7f50",
    "#6495ed"
];

var BAChartCountTotal2 = 0;
if (BAChartDataValue2.length > 0) {
    BAChartCountTotal2 = BAChartDataValue1.reduce(function(acc, currentVal, currentIdx, arr) {
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function() {
    var BAChartCtx = document.getElementById('BA-chart-pending-course').getContext('2d');
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
</script>