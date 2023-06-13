<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                    <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                    <img src="<?= base_url('uploads/man.png')?>" style="height: 44px; width: 44px;" alt="user-image">
                    <?php echo $page_title; ?>
                    <a href="<?php echo site_url('admin/user_form/add_user_form'); ?>"
                        class="btn btn-outline-primary btn-rounded alignToTitle">
                        <i class="mdi mdi-plus"></i>
                        <!--<img src="https://ai24x7.com/uploads/man.png" style="height: 44px; width: 44px;"alt="user-image">-->
                        <?php echo get_phrase('add_student'); ?>
                    </a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<?php

$Last7Day = date("Y-m-d", strtotime("-7 days"));
$Last30Day = date("Y-m-d", strtotime("-30 days"));

$get7DayInstructor = $this->user_model->getInstrutorPast($Last7Day)->num_rows();
$get30DayInstructor = $this->user_model->getInstrutorPast($Last30Day)->num_rows();

$get7DayStudent = $this->user_model->getStudentPast($Last7Day)->num_rows();
$get30DayStudent = $this->user_model->getStudentPast($Last30Day)->num_rows();


$get7DayRevenue = $this->user_model->getRevenue($Last7Day);
$get30DayRevenue = $this->user_model->getRevenue($Last30Day);




$get7DayUninstalled = $this->user_model->getUninstalledStudent($Last7Day)->num_rows();
$get30DayUninstalled = $this->user_model->getUninstalledStudent($Last30Day)->num_rows();

?>


<div class="row">

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Students Registered</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="BA-chart-student1"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6"> <a href="<?php echo base_url() ?>/admin/users?date=<?php echo $Last7Day ?>"> <i
                                class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                            <h3 class="font-weight-normal text-dark"> <span><?php echo $get7DayStudent; ?></span> </h3>
                            <p class="text-muted mb-0">Students Registered Last 7 Days</p>
                        </a> </div>
                    <div class="col-6"> <a href="<?php echo base_url() ?>/admin/users?date=<?php echo $Last30Day ?>"> <i
                                class="mdi mdi-trending-down text-warning mt-3 h3" style="color:#f38020!important"></i>
                            <h3 class="font-weight-normal"> <span><?php echo $get30DayStudent ?></span> </h3>
                            <p class="text-muted mb-0">Students Registered Last 30 Days</p>
                        </a> </div>
                </div>
            </div>
        </div>
    </div>







    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Revenue</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="BA-chart-student3"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6"> <a href="<?php echo base_url() ?>/admin/users?date=<?php echo $Last7Day ?>"> <i
                                class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                            <h3 class="font-weight-normal text-dark">
                                <span><?php echo !empty($get7DayRevenue) ? $get7DayRevenue : '0'; ?></span> </h3>
                            <p class="text-muted mb-0">Revenue Last 7 Days</p>
                        </a> </div>
                    <div class="col-6"> <a href="<?php echo base_url() ?>/admin/users?date=<?php echo $Last30Day ?>"> <i
                                class="mdi mdi-trending-down text-warning mt-3 h3" style="color:#f38020!important"></i>
                            <h3 class="font-weight-normal"> <span><?php echo !empty($get30DayRevenue) ? $get30DayRevenue : 0 ?></span> </h3>
                            <p class="text-muted mb-0">Revenue Last 30 Days</p>
                        </a> </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Uninstalled Students</h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="BA-chart-student4"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6"> <a href="<?php echo base_url() ?>/admin/users?date=<?php echo $Last7Day ?>"> <i
                                class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
                            <h3 class="font-weight-normal text-dark"> <span><?php echo $get7DayUninstalled; ?></span>
                            </h3>
                            <p class="text-muted mb-0">Uninstalled Students Last 7 Days</p>
                        </a> </div>
                    <div class="col-6"> <a href="<?php echo base_url() ?>/admin/users?date=<?php echo $Last30Day ?>"> <i
                                class="mdi mdi-trending-down text-warning mt-3 h3" style="color:#f38020!important"></i>
                            <h3 class="font-weight-normal"> <span><?php echo $get30DayUninstalled  ?></span> </h3>
                            <p class="text-muted mb-0">Uninstalled Students Last 30 Days</p>
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
                <form class="row" id="filter-form" action="<?php echo site_url('admin/users'); ?>" method="get">
                    <!-- Course Categories -->
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="category_id"><?php echo get_phrase('categories'); ?></label>
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
                    <div class="col-xl-4">
                        <div class="form-group">
                            
                            <label for="instructor_id"><?php echo get_phrase('instructor'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="instructor_id"
                                id='instructor_id'>
                                <option value="all" <?php if ($selected_instructor_id == 'all') echo 'selected'; ?>>
                                    <?php echo get_phrase('all'); ?></option>
                                <?php foreach ($instructors as $instructor) : ?>
                                <option value="<?php echo $instructor['id']; ?>"
                                    <?php if ($selected_instructor_id == $instructor['id']) echo 'selected'; ?>>
                                    <?php echo $instructor['first_name'] . ' ' . $instructor['last_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Course Price -->
                    <div class="col-xl-3">
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
                    

                    <div class="col-xl-3">
                        <label for=".." class="text-white">..</label>
                        <button type="submit" class="btn btn-primary btn-block"
                            name="button"><?php echo get_phrase('filter'); ?></button>
                    </div>
                    <div class="col-xl-2">
                        <label for=".." class="text-white">..</label>
                        <button type="button" class="btn btn-warning btn-block" form="filter-form" page="usersExport"  onclick="exportdata(this,'excel');">Export To Excel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('student'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0 table-responsive">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th><?php echo get_phrase('name'); ?></th>
                                <th><?php echo get_phrase('email'); ?></th>
                                <th><?php echo get_phrase('mobile'); ?></th>
                                <th>Revenue Amount</th>
                                <th>Number of Courses Enrolled</th>
                                <th>Course Section</th>
                                <th>Category</th>
                                <th>Number of courses requested</th>
                                <th>Number of Webinars attended</th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $this->db->select("users.*,(SELECT SUM(amount) as amount FROM payment WHERE user_id=users.id) as amount");
                            $this->db->from('users');
                            // $this->db->join('enrol','users.id=enrol.user_id');
                            // $this->db->join('course','course.id=enrol.course_id');
                            
                            $this->db->where('users.role_id', 2);
                            $this->db->where('users.is_instructor', 0);
                            
                            if(isset($_GET['date']))
                                $this->db->where('users.date_added>=',strtotime($_GET['date']));
                                
                            if(!empty($_GET['status']) && $_GET['status'] !='all')
                            {
                                $column = ($_GET['status'] == 'active') ? 'users.status' : 'users.status!=';
                                $this->db->where($column,1);
                            }
                            
                            if(!empty($_GET['category_id']) && $_GET['category_id'] != 'all')
                                $this->db->where_in('course.sub_category_id',$_GET['category_id']);
                            
                            if(!empty($_GET['instructor_id']) && $_GET['instructor_id'] != 'all')
                                $this->db->where_in('course.user_id',$_GET['instructor_id']);
                            
                            $this->db->order_by('users.id', 'DESC');
                            $users = $this->db->get('')->result_array();
                            foreach ($users as $key => $user) : ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
                                    <?php if ($user['status'] != 1) : ?>
                                    <!--<small>-->
                                    <!--    <p><?php echo get_phrase('status'); ?>: <span-->
                                    <!--            class="badge badge-danger-lighten"><?php echo get_phrase('unverified'); ?></span>-->
                                    <!--    </p>-->
                                    <!--</small>-->
                                    <?php endif; ?>
                                </td>
                                <td><a href="mailto: <?php echo $user['email']; ?>"><?php echo $user['email']; ?></a>
                                </td>
                                <td><a href="tel: <?php echo $user['mobile']; ?>"><?php echo $user['mobile']; ?></a>
                                </td>
                                <td><?= ($user['amount']>0) ? $user['amount'] : 0;?></td>
                                <td>
                                    <?php
                                        echo $this->crud_model->count_enrol_history_by_user_id($user['id']); ?>

                                </td>
                                <td>
                                    <?php
                                        $enrolled_courses = $this->crud_model->enrol_history_by_user_id($user['id']);
                                        $category_id = array();
                                        ?>
                                    <ul>
                                        <?php foreach ($enrolled_courses->result_array() as $enrolled_course) :
                                                $course_details = $this->crud_model->get_course_by_id($enrolled_course['course_id'])->row_array();
                                                $category_id[] = $course_details['category_id'];
                                                if (!empty($course_details['title'])) {
                                                    echo '<li>' . $course_details['title'] . '</li>';
                                                }
                                            ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                    <?php
                                        foreach ($category_id as $list) :
                                            // $list_row = $this->crud_model->get_category_by_id($list);
                                            if (!empty($this->crud_model->get_category_by_id($list)['name'])) {
                                                echo '<li>' . $this->crud_model->get_category_by_id($list)['name'] . '</li>';
                                            }
                                        ?>
                                    <?php endforeach; ?>
                                    </ul>
                                </td>
                                <td><?= $this->crud_model->count_course_request_by_user_id($user['id']); ?></td>
                                <td><?= $this->crud_model->count_webinars_by_user_id($user['id']); ?></td>
                                <td>
                                    <div class="dropright dropright">
                                        <button type="button"
                                            class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="<?php echo site_url('admin/user_form/edit_user_form/' . $user['id']) ?>"><?php echo get_phrase('edit'); ?></a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="confirm_modal('<?php echo site_url('admin/users/delete/' . $user['id']); ?>');"><?php echo get_phrase('delete'); ?></a>
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



<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<script type="text/javascript">
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
    BAChartCountTotal1 = BAChartDataValue1.reduce(function(acc, currentVal, currentIdx, arr) {
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function() {
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






var BAChartDataValue3 = [
    <?php echo $get7DayRevenue ?>,
    <?php echo $get30DayRevenue ?>
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
    BAChartCountTotal3 = BAChartDataValue1.reduce(function(acc, currentVal, currentIdx, arr) {
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function() {
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


var BAChartDataValue4 = [
    <?php echo $get7DayUninstalled  ?>,
    <?php echo $get30DayUninstalled  ?>
];
var BAChartDataLabel4 = [
    'Total Revenue Last 7 Days',
    'Total Revenue Last 30 Days'
];
var BAChartJobErrColors4 = [
    "#3cb371",
    "#7b68ee"
];

var BAChartCountTotal4 = 0;
if (BAChartDataValue4.length > 0) {
    BAChartCountTotal4 = BAChartDataValue4.reduce(function(acc, currentVal, currentIdx, arr) {
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function() {
    var BAChartCtx = document.getElementById('BA-chart-student4').getContext('2d');
    var BAChartJobErr = new Chart(BAChartCtx, {
        type: 'doughnut',
        data: {
            labels: BAChartDataLabel4,
            datasets: [{
                data: BAChartDataValue4,
                backgroundColor: BAChartJobErrColors4,
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
                        text: 'Total: ' + BAChartCountTotal4,
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