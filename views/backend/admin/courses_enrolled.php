<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                    <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                    <img src="<?= base_url('uploads/refresh (1).png')?>" style="height: 44px; width: 44px;"
                        alt="user-image">
                    Courses Enrolled
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Courses Enrolled</h4>  
                <form class="row justify-content-center" id="filter-form" action="<?php echo site_url('admin/courses_enrolled'); ?>" method="get">
                    <div class="col-xl-5">
                        <div class="form-group">
                            <label for="course_id"><?php echo get_phrase('Course'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="course_id"
                                id='course_id'>
                                <option value="all">All</option>
                            <?php
                            $course_id = (!empty($_GET['course_id']) && $_GET['course_id']!='all') ? $_GET['course_id'] : 0;
                            // $query = "SELECT cat.id,cat.name FROM category as cat WHERE (SELECT COUNT(subcat.id) FROM category as subcat WHERE subcat.parent=cat.id) >=1 AND cat.parent>0";
                            $coursedata = $this->db->query("SELECT id,title FROM course")->result();
                            foreach($coursedata as $value)
                            {
                                $selected = ($course_id == $value->id) ? ' selected ' : ' ';
                                echo
                                '<option value="'.$value->id.'" '.$selected.'>'.$value->title.'</option>';
                            }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="form-group">
                            <label for="instructor_id"><?php echo get_phrase('Instructor'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="instructor_id"
                                id='instructor_id'>
                                <option value="all">All</option>
                            <?php
                            $instructor_id = (!empty($_GET['instructor_id']) && $_GET['instructor_id']!='all') ? $_GET['instructor_id'] : 0;
                            $instructordata = $this->db->query("SELECT id,first_name,last_name FROM users WHERE role_id='2' AND is_instructor='1'")->result();
                            foreach($instructordata as $value)
                            {
                                $selected = ($instructor_id == $value->id) ? ' selected ' : ' ';
                                echo
                                '<option value="'.$value->id.'" '.$selected.'>'.ucwords($value->first_name.' '.$value->last_name).'</option>';
                            }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="form-group">
                            <label for="price" >Price</label>
                            <select class="form-control select2" data-toggle="select2" name="is_free" id='is_free'>
                                <option value="all" <?= (!empty($_GET['is_free']) && $_GET['is_free'] == 'all') ? 'selected' : ' '; ?>>
                                    <?php echo get_phrase('all'); ?></option>
                                <option value="free" <?= (!empty($_GET['is_free']) && $_GET['is_free'] == 'free') ? 'selected' : ' '; ?>>
                                    <?php echo get_phrase('free'); ?></option>
                                <option value="paid" <?= (!empty($_GET['is_free']) && $_GET['is_free'] == 'paid') ? 'selected' : ' '; ?>>
                                    <?php echo get_phrase('paid'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                            <labelfor="price" >Search</label>
                            <input class="form-control" name="search" id="search" autocomplete="off" value="<?= (!empty($_GET['search'])) ? $_GET['search'] : '';?>">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <button type="submit" class="btn btn-primary btn-block mt-3"
                            name="button"><?php echo get_phrase('filter'); ?></button>
                    </div>
                    <div class="col-xl-2">
                        <button type="button" class="btn btn-warning btn-block mt-3" form="filter-form" page="coursesenrolled" onclick="exportdata(this,'excel');">Export To Excel</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive-sm mt-2" style="width: 100%;">
                    <?php
                    
                    $course_ids = [];
                    if(!empty($_GET['course_id']) && $_GET['course_id'] != 'all')
                        $course_ids[] = $_GET['course_id'];
                        
                    if(!empty($_GET['instructor_id']) && $_GET['instructor_id']!='all')
                    {
                        $course_ids = [];
                        $CourseData = $this->db->select('id')->from('course')->where('user_id',$_GET['instructor_id'])->get()->result();
                        if(!empty($CourseData))
                            $course_ids = array_merge($course_ids,array_column($CourseData,'id'));
                    }
                    
                    if(!empty($_GET['is_free']) && $_GET['is_free']!='all')
                    {
                        $is_free_course = ($_GET['is_free'] == 'free') ? '1' : '0';
                        
                        $CourseData = $this->db->select('id')->from('course')->where('is_free_course',$is_free_course)->get()->result();
                        
                        if(!empty($CourseData))
                            $course_ids = array_merge($course_ids,array_column($CourseData,'id'));
                    }
                        
                    $this->db->select('enrol.course_id,course.title,course.is_free_course,users.first_name,users.last_name,users.email,category.name as category_name,(SELECT COUNT(id) FROM enrol WHERE enrol.course_id=course.id) AS total_students');
                    $this->db->from('enrol');
                    $this->db->join('course','course.id=enrol.course_id');
                    $this->db->join('category','category.id=course.sub_category_id');
                    $this->db->join('users','users.id=course.user_id');
                   /* if(!empty($_GET['is_free']) && $_GET['is_free']!='all')
                    {
                        $is_free_course = ($_GET['is_free'] == 'free') ? '1' : '0';
                        $this->db->where_in('course.is_free_course',$is_free_course);
            
                        
                    }*/
                    if (!empty($course_ids))
                        $this->db->where_in('course.id',$course_ids);
            
                    if (!empty($_GET['date']))
                        $this->db->where('enrol.date_added>=', strtotime($_GET['date']));
                    
                    if(!empty($_GET['search']))
                    {
                        $this->db->like('course.title',$_GET['search']);
                        $this->db->or_like('users.first_name',$_GET['search']);
                        $this->db->or_like('users.last_name',$_GET['search']);
                        $this->db->or_like('category.name',$_GET['search']);
                    }
                    
                    $this->db->group_by('enrol.course_id');
                    $enrol_history = $this->db->get('')->result_array();
                //    echo $this->db->last_query();
                //     echo '<prE>';print_r($enrol_history);die;
                    if (count($enrol_history) > 0) : ?>
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Courses</th>
                                <th class="text-center">Course Type</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Instructor Name</th>
                                <th class="text-center">Instructor Email</th>
                                <th class="text-center">Number of Students</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($enrol_history as $key => $enrol)
                            {
                                echo
                                '<tr class="gradeU">
                                    <td class="text-center">'.($key+1).'</td>
                                    <td class="text-center">'.$enrol['title'].'</td>
                                    <td class="text-center">'.(($enrol['is_free_course'] == 1) ? 'Free' : 'Paid').'</td>
                                    <td class="text-center">'.$enrol['category_name'].'</td>
                                    <td class="text-center"><small>'.$enrol['last_name'].'</small></td>
                                    <td class="text-center"><small>'.$enrol['email'].'</small></td>
                                    <td class="text-center">'.$enrol['total_students'].'</td>
                                </tr>';
                            }?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($enrol_history) == 0) : ?>
                    <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;"
                            src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script type="text/javascript">
function update_date_range() {
    var x = $("#selectedValue").html();
    $("#date_range").val(x);
}
</script>