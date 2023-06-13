
<?php

    $Last7Day = date("Y-m-d", strtotime("-7 days"));
    $Last30Day = date("Y-m-d", strtotime("-30 days"));
    
   $get7DayInstructor = $this->user_model->getInstrutorPast($Last7Day)->num_rows();
   $get30DayInstructor = $this->user_model->getInstrutorPast($Last30Day)->num_rows();

    $get7DayStudent = $this->user_model->getStudentPast($Last7Day)->num_rows();
    $get30DayStudent = $this->user_model->getStudentPast($Last30Day)->num_rows();
    

    $get7DayRevenue = $this->user_model->getRevenue($Last7Day);
    $get30DayRevenue = $this->user_model->getRevenue($Last30Day);


    $WeeklyRevenueArray = [];
    $WeeklyRevenueArray['day'] = $WeeklyRevenueArray['revenue'] = $WeeklyRevenueArray['color'] = [];
    for($i = 1; $i <= 6;$i++)
    {
        $date = date('Y-m-d',strtotime("-$i day"));
        $WeeklyRevenueArray['day'][] = date('l',strtotime($date));
        $WeeklyRevenueArray['revenue'][] = $this->user_model->getRevenue($date);
        // $WeeklyRevenueArray['revenue'][] = rand(10000,99999);
    }
    $WeeklyRevenueArray['day'][] = date('l');
    $WeeklyRevenueArray['revenue'][] = $this->user_model->getRevenue(date('Y-m-d'));
    // $WeeklyRevenueArray['revenue'][] = rand(10000,99999);
    $WeeklyRevenueArray['color'] = ['#2c36911a','#2c369130','#2c36915e','#2c369191','#2c3691ba','#2c3691eb','#2c3691'];
?>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                     <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                      <img src="<?= base_url('uploads/clipboard (1).png')?>" style="height: 44px; width: 44px;"alt="user-image">
                     <?php echo "&nbsp;&nbsp;&nbsp;". get_phrase('admin_revenue'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row">
   <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title mb-4">Today Revenue
            <span style="position: absolute;left: 444px;"><?= ' Todays Revenue : '.array_sum($WeeklyRevenueArray['revenue'])?></span>
        
        </h4>
        <div class="my-4 chartjs-chart" style="height: 202px;">
          <canvas id="Weekly-Revenue-Chart"></canvas>
        </div>
      </div>
    </div>
  </div>    
</div>

<div class="row d-none">
   <div class="col-xl-4">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title mb-4">Revenue Today</h4>
        <div class="my-4 chartjs-chart" style="height: 202px;">
          <canvas id="BA-chart-student3"></canvas>
        </div>
        <div class="row text-center mt-2 py-2">
          <div class="col-6"> <a href="<?php echo base_url()?>/admin/today_revenue?date=<?php echo $Last7Day ?>"> <i class="mdi mdi-trending-up text-success mt-3 h3 text-white"></i>
            <h3 class="font-weight-normal"> <span><?= ($get7DayRevenue>0) ? $get7DayRevenue : 0; ?></span> </h3>
            <p class="text-muted mb-0">Revenue Last 7 Days</p>
            </a> </div>
          <div class="col-6"> <a href="<?php echo base_url()?>/admin/today_revenue?date=<?php echo $Last30Day ?>"> <i class="mdi mdi-trending-down text-warning mt-3 h3"  style="color:#f38020!important"></i>
            <h3 class="font-weight-normal"> <span><?= ($get30DayRevenue>0) ? $get30DayRevenue : 0; ?></span> </h3>
            <p class="text-muted mb-0">Revenue Last 30 Days</p>
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
                <form class="row" action="<?= site_url('admin/today_revenue'); ?>" method="get">
                    <!-- Course Categories -->
                    <div class="col-xl-4">
                        <div class="form-group">
                            <label for="student_id"><?php echo get_phrase('Student'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="student_id" id='student_id'>
                                <option value="all">all</option>
                                <?php
                                
                                $selected_student = (!empty($_GET['student_id'])) ? $_GET['student_id'] : 'all';
                                $selected_instructor = (!empty($_GET['instructor_id'])) ? $_GET['instructor_id'] : 'all';
                                $selected_course = (!empty($_GET['course_id'])) ? $_GET['course_id'] : 'all';
                                
                                
                                $students = $this->db->select("id,CONCAT(first_name,' ',last_name) AS student_name")->from('users')->where('role_id','2')->where('is_instructor','0')->get()->result();
                                foreach ($students as $value)
                                {
                                    echo
                                    '<option value="'.$value->id.'" '.(($selected_student == $value->id) ? ' selected ' : '').'>'.$value->student_name.'</option>';
                                }?>
                            </select>
                        </div>
                    </div>

                    <!-- Course Instructors -->
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="instructor_id"><?php echo get_phrase('instructor'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="instructor_id" id='instructor_id'>
                                <option value="all">all</option>
                                <?php
                                $instructors = $this->db->select("id,CONCAT(first_name,' ',last_name) AS instructor_name")->from('users')->where('role_id','2')->where('is_instructor','1')->get()->result();
                                foreach ($instructors as $instructor)
                                {
                                    echo
                                    '<option value="'.$instructor->id.'" '.(($selected_instructor == $instructor->id) ? ' selected ' : '').'>'.$instructor->instructor_name.'</option>';
                                }?>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Course Instructors -->
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="instructor_id"><?php echo get_phrase('course'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="course_id" id="course_id">
                                <option value="all">all</option>
                                <?php
                                $coursedata = $this->db->select('id,title')->from('course')->get()->result();
                                foreach ($coursedata as $value)
                                {
                                    echo
                                    '<option value="'.$value->id.'"  '.(($selected_course == $value->id) ? ' selected ' : '').'>'.$value->title.'</option>';
                                }?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xl-2">
                        <label for=".." class="text-white">..</label>
                        <button type="submit" class="btn btn-primary btn-block"
                            name="button"><?php echo get_phrase('filter'); ?></button>
                    </div>
                </form>
                <?php
                $ids_array = (!empty($_GET['course_id']) && $_GET['course_id']!='all') ? [$_GET['course_id']] : [];
                        
                if(!empty($_GET['student_id']) && $_GET['student_id']!='all')
                {
                    $this->db->select('course_id');
                    $this->db->from('payment');
                    $this->db->where('user_id',$_GET['student_id']);
                    if(!empty($ids_array))
                        $this->db->where_in('course_id',$ids_array);
                        
                    $studentdata = $this->db->get('')->result();
                    
                    if(!empty($studentdata))
                        $ids_array = array_column($studentdata,'id');
                }
                
                if(!empty($_GET['instructor_id']) && $_GET['instructor_id']!='all')
                {
                    $this->db->select('id');
                    $this->db->from('course');
                    $this->db->where('user_id',$_GET['instructor_id']);
                    if(!empty($ids_array))
                        $this->db->where_in('id',$ids_array);
                        
                    $instructordata = $this->db->get('')->result();
                    
                    if(!empty($instructordata))
                        $ids_array = array_column($instructordata,'id');
                }
                
                $this->db->select("payment.amount,payment.admin_revenue,payment.instructor_revenue,course.title,users.first_name,users.last_name,payment.date_added,(SELECT CONCAT(first_name,' ',last_name) as ins_name FROM `users` WHERE users.id=course.user_id) AS instructor_name");
                $this->db->from('payment');
                $this->db->join('course','course.id=payment.course_id');
                $this->db->join('users','users.id=payment.user_id');
                
                if(!empty($_GET['student_id']) && $_GET['student_id']!='all')
                    $this->db->where('payment.user_id',$_GET['student_id']);
                    
                if(!empty($_GET['course_id']) && $_GET['course_id']!='all')
                    $this->db->where('payment.course_id',$_GET['course_id']);
                
                if(!empty($_GET['instructor_id']) && $_GET['instructor_id']!='all')
                    $this->db->where('course.user_id',$_GET['instructor_id']);
                    
                $paymentdata = $this->db->get()->result(); 
                ?>
                <h4 class="mb-3 header-title">Today Revenue : (<?= array_sum(array_column($paymentdata,'amount'))?>)</h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Course Name</th>
                                <th>Student Name</th>
                                <th>Instructor Name</th>
                                <th>Amount</th>
                                <th>Entry date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                         
                        foreach($paymentdata as $key => $value)
                        {
                            echo
                            '<tr>
                                <td>'.($key + 1).'</td>
                                <td>'.$value->title.'</td>
                                <td>'.$value->first_name.' '.$value->last_name.'</td>
                                <td>'.$value->instructor_name.'</td>
                                <td>'.$value->amount.'</td>
                                <td>'.date('d,M Y',strtotime($value->date_added)).'</td>
                            </tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script> 
<script type="text/javascript">
function update_date_range()
{
    var x = $("#selectedValue").html();
    $("#date_range").val(x);
}

var BAChartDataValue3 = [
    <?= ($get7DayRevenue>0) ? $get7DayRevenue : 0; ?>,
    <?= ($get30DayRevenue>0) ? $get30DayRevenue : 0; ?>
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
    BAChartCountTotal3 = BAChartDataValue3.reduce(function(acc, currentVal, currentIdx, arr){
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


//-----------------------------------------------------------
var WeeklyRevenueValue = [
	<?= implode(',',$WeeklyRevenueArray['revenue']);?>
];
var WeeklyRevenueLabel = [
    '<?= implode("','",$WeeklyRevenueArray['day']);?>'
];
var WeeklyRevenueColors = [
    '<?= implode("','",$WeeklyRevenueArray['color']);?>'
];
var WeeklyRevenueBorderColors = [
    '<?= implode("','",$WeeklyRevenueArray['color']);?>'
];


var WeeklyRevenueTotal = 0;
if (WeeklyRevenueValue.length > 0) {
    WeeklyRevenueTotal = WeeklyRevenueValue.reduce(function(acc, currentVal, currentIdx, arr) {
        return acc + currentVal;
    }, 0);
}

window.addEventListener('load', function() {
    var WeeklyRevenueCtx = document.getElementById('Weekly-Revenue-Chart');
    var WeeklyRevenueJobErr = new Chart(WeeklyRevenueCtx, {
        type: 'bar',
        data: {
            labels: WeeklyRevenueLabel,
            datasets: [{
                data: WeeklyRevenueValue,
                backgroundColor: WeeklyRevenueColors,
                borderColor: WeeklyRevenueBorderColors,
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
                        text: 'Total: ' + WeeklyRevenueTotal,
                    }]
                }
            },
            legend: {
                display: false
            }
        }
    });
});
//-----------------------------------------------------------
</script>
