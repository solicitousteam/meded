<?php 
//$live_class = $this->db->get_where('live_class', array('course_id' => $course_id))->row_array(); ?>

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
        <form class="required-form" action="<?php echo site_url('user/add_live_class'); ?>" method="post" enctype="multipart/form-data">
    
             <div class="card">
        <div class="card-body">
<div class="row ">
<div class="col-lg-6"> <div class="form-group  mb-1">
    
 
    
            <label class="col-form-label" for="live_class_schedule_date"><?php echo get_phrase('live_class_schedule').' ('.get_phrase('date').')'; ?><span class="required">*</span></label>
              <input type="text" required name="live_class_schedule_date" class="form-control date"  id="live_class_schedule_date" data-toggle="date-picker" data-single-date-picker="true" value="<?php echo $live_class['date']; ?>">
          </div></div>
         <div class="col-lg-6"> <div class="form-group  mb-1">
        
            <label class="col-form-label" for="live_class_schedule_time"><?php echo get_phrase('live_class_schedule').' ('.get_phrase('time').')'; ?><span class="required">*</span></label>
              <input type="text" required name="live_class_schedule_time" id="live_class_schedule_time" class="form-control" data-toggle="timepicker" value="<?php echo $live_class['time']; ?>">
          </div></div>
           <div class="col-lg-6"> <div class="form-group  mb-1">
            <label class="col-form-label" for="live_class_schedule_time"><?php echo get_phrase('course'); ?><span class="required">*</span></label>
            <select class="form-control" name="course_id" required>
                
            <?php
            $user_id=$_SESSION['user_id'];
            $course_result=$this->db->get_where('course',array('user_id'=>$user_id))->result_array();
            foreach($course_result as $course_row)
            { ?>
                <option value="<?=$course_row['id']; ?>" <?php echo  $course_row['id'] == $live_class['course_id'] ? 'selected' : ''; ?> ><?=$course_row['title']; ?></option>
            <?php } ?>
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
          <div class="col-lg-12"><div class="form-group  mb-1">
            <label class="col-form-label" for="note_to_students"><?php echo get_phrase('note_to_students'); ?><span class="required">*</span></label>
            
              <textarea class="form-control" name="note_to_students" required id="note_to_students" rows="5"><?php echo $live_class['note_to_students']; ?></textarea>
           
          </div></div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary"><?php echo get_phrase("submit"); ?></button>
        </div>
    </div>      
    </div>
      </div>
          
    </form>            
    </div>
  </div>
</div>
<?php 
 $this->db->select('live_class.*,course.title');
                $this->db->join('course','live_class.course_id=course.id','LEFT');
                $live_result=$this->db->get_where('live_class',array('course.user_id'=>$user_id))->result_array();
                ?>
<div class="card">
    <div class="card-body">
        <table id="basic-datatable" class="table table-striped table-centered mb-0 table-responsive">
            <thead>
                <tr>
                    <th>Sr No</th>
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
                    <td><?=$live_row['title']; ?></td>
                    <td><?=$live_row['date']; ?></td>
                    <td><?=$live_row['time']; ?></td>
                    <td>
                        <a href="<?=base_url(); ?>user/live_class/<?=$live_row['id']; ?>"><button class="btn btn-info">Reschedule</button></a>
                        <a target="_blank" href="<?=base_url(); ?>user/start_live_class/<?=$live_row['course_id']; ?>?sendnotification=1"><button class="btn btn-success">Start live class</button></a>
                        <a href="<?=base_url(); ?>user/delete_live_class/<?=$live_row['id']; ?>"><button class="btn btn-danger">Delete</button></a></td>
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
