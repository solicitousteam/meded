<?php $live_class = $this->db->get_where('live_class', array('course_id' => $course_id))->row_array(); ?>

<div class="row ">
    <div class="col-xl-12">
   <h4 class="page-title"> 
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                <img src="<?=base_url();?>/uploads/online-class.png" style="height: 35px; width: 30px;"alt="user-image">
                <?php echo get_phrase('live_class'); ?>
                    
                </h4>
        
</div></div>


<div class="tab-pane pt-4" id="live-class">
  <div class="row">
    <div class="col-md-7">
        <form class="required-form" action="<?php echo site_url('admin/add_live_class'); ?>" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="LiveClsiD" value="<?php echo $LiveClass["id"] ?>">
    
             <div class="card">
        <div class="card-body">
<div class="row ">
<div class="col-lg-6"> <div class="form-group  mb-1">
    
  
            <label class="col-form-label" for="live_class_schedule_date"><?php echo get_phrase('live_class_schedule').' ('.get_phrase('date').')'; ?><span class="required">*</span></label>
              <input required type="text" name="live_class_schedule_date" class="form-control date" id="live_class_schedule_date" data-toggle="date-picker"  data-single-date-picker="true" value="<?= empty($LiveClass['date']) ? date('m/d/Y') : $LiveClass['date']; ?>">
          </div></div>
         
        
         <div class="col-lg-6"> <div class="form-group  mb-1">
            <label class="col-form-label" for="live_class_schedule_time"><?php echo get_phrase('live_class_schedule').' ('.get_phrase('time').')'; ?><span class="required">*</span></label>
              <input required type="text" name="live_class_schedule_time" id="live_class_schedule_time" class="form-control" data-toggle="timepicker" value="<?= $LiveClass['time'] ?>">
          </div></div>
          <div class="col-lg-6"> <div class="form-group  mb-1">
            <label class="col-form-label" for="instructor_id"><?php echo get_phrase('Instructor'); ?><span class="required">*</span></label>
            <select required class="form-control" name="instructor_id" onchange="getcourse(this.value)">
            <option value="">--Not Selected--</option>
            <?php
            $instructor_id = 0;
            if($live_class_id > 0)
                $instructor_id = $this->db->select('user_id')->where('id',$LiveClass['course_id'])->get('course')->row()->user_id;
            
            $instructor_result=$this->db->select('id,first_name,last_name')->where('role_id',2)->where('is_instructor',1)->get('users')->result_array();
            foreach($instructor_result as $instructor_row)
            {
                echo '<option value="'.$instructor_row['id'].'" '.(($instructor_id == $instructor_row['id']) ? ' selected ' : '' ).'>'.$instructor_row['first_name'].' '.$instructor_row['last_name'].'</option>';
            }?>
            </select>

          </div></div>
           <div class="col-lg-6"> <div class="form-group  mb-1">
            <label class="col-form-label" for="course"><?php echo get_phrase('course'); ?><span class="required">*</span></label>
            <select required class="form-control" name="course_id" id="course_id">
                <option value="">--Not Selected--</option>
                <?php
                if($instructor_id > 0)
                {
                    $CourseData = $this->db->select('id,title')->where('user_id',$instructor_id)->get('course')->result_array();
                    foreach($CourseData as $value)
                    {
                        echo '<option value="'.$value['id'].'" '.(($value['id'] == $LiveClass['course_id']) ? ' selected ' : '').'>'.$value['title'].'</option>';
                    }   
                }?>
             </select>

          </div></div>
          
          <!--<div class="col-lg-6"><div class="form-group mb-1">
            <label class="col-form-label" for="zoom_meeting_id"><?php echo get_phrase('Meet 60 meeting id'); ?></label>
              <input type="text" class="form-control" id="zoom_meeting_id" name = "zoom_meeting_id" placeholder="<?php echo get_phrase('enter_meeting_id'); ?>" value="<?php echo $live_class['zoom_meeting_id']; ?>">
            </div></div>
          <div class="col-lg-6"><div class="form-group  mb-1">
            <label class="col-form-label" for="zoom_meeting_password"><?php echo get_phrase('zoom_meeting_password'); ?></label>
              <input type="text" class="form-control" id="zoom_meeting_password" name = "zoom_meeting_password" placeholder="<?php echo get_phrase('enter_meeting_password'); ?>" value="<?php echo $live_class['zoom_meeting_password']; ?>">
          </div></div>-->
          <!--<div class="col-lg-12"><div class="form-group  mb-1">-->
          <!--  <label class="col-form-label" for="note_to_students"><?php echo get_phrase('note_to_students'); ?><span class="required">*</span></label>-->
            
          <!--    <textarea class="form-control" required name="note_to_students" id="note_to_students" rows="5"><?php echo $LiveClass['note_to_students']; ?></textarea>-->
           
          <!--</div></div>-->
          <div class="col-md-12 text-center">
              <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
          </div>
    </div>      
    </div>
      </div>
          
    </form>            
    </div>
  </div>
</div>
<?php
    $live_result = $this->db->select('live_class.*,course.title,users.first_name,users.last_name')
    ->from('live_class')
    ->join('course','course.id=live_class.course_id','LEFT')
    ->join('users','users.id=course.user_id','LEFT')
    ->get()->result_array();


// $this->db->select('live_class.*,course.title');
// $this->db->join('course','live_class.course_id=course.id','LEFT');
// $live_result=$this->db->get('live_class')->result_array();
                ?>
<div class="card">
    <div class="card-body">
        <table id="basic-datatable" class="table table-striped table-centered mb-0 table-responsive">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Instructor</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=0;
               foreach($live_result as $live_row){
                $i++;?>
                <tr>
                    <td><?=$i; ?></td>
                    <td><?=$live_row['first_name'].' '.$live_row['last_name']; ?></td>
                    <td><?=$live_row['title']; ?></td>
                    <td><?=$live_row['date']; ?></td>
                    <td><?=$live_row['time']; ?></td>
                    <td>
                        <a href="<?=base_url(); ?>admin/live_class/<?=$live_row['id']; ?>"><button class="btn btn-info">Reschedule</button></a>
                        <a target="_blank" href="<?=base_url(); ?>admin/start_live_class/<?=$live_row['course_id']; ?>?sendnotification=1"><button class="btn btn-success">Start live class</button></a>
                        <a href="<?=base_url(); ?>admin/delete_live_class/<?=$live_row['id']; ?>"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>    
</div>
<style>
.form-control {
	border-radius: 30px;
}
</style>
<script>
function getcourse(id){
    $.ajax({
      url:'<?= base_url('admin/getcourse')?>/' + id,
      success: function(data){
          $('#course_id').html(data);
      }
    });
}
</script>