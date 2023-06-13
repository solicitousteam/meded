<?php
/*if(!empty($this->session->userdata('admin_login')) && !empty($_SESSION['current_live_class']))
{?>
<iframe class="mini-display" allow="camera; microphone; fullscreen; display-capture; autoplay" src="https://meet60.in/50" scrolling="auto"></iframe>
<?php
}*/?>
<style>
    .section-division{
        padding: 10px;
        border: 1px solid #dee2e6;
        margin-bottom: 10px;
        border-radius: 5px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }
    .section-division .btn-warning{
        webkit-box-shadow: none!important;
        box-shadow: none!important;form-control
    }
    .section-sub-division{
        border: 1px solid #dee2e6;
        margin-bottom: 10px;
        border-top: none;
        margin-top: 3px;
    }
    .sub-row-section{
        border-top: 1px solid #dee2e6;
        padding-top: 10px;
    }
    .btn-danger {
        color: #fff;
        background-color: #fa5c7c!important;
        border-color: #fa5c7c!important;
    }
    .btn-danger:hover {
        color: #fa5c7c!important;
        background-color: #fff!important;
        border-color: #fff!important;
    }
    .question-division{
        
    }
    .pre-curriculum{
        display:none;
    }
    .pre-curriculum ul li{
        display:block!important;
    }
</style>
<!-- bundle -->
<script src="<?php echo base_url('assets/backend/js/app.min.js'); ?>"></script>
<!-- third party js -->
<script src="<?php echo base_url('assets/backend/js/vendor/Chart.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dataTables.bootstrap4.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/buttons.flash.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dataTables.keyTable.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dataTables.select.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/summernote-bs4.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/fullcalendar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/pages/demo.summernote.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dropzone.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/pages/demo.dashboard.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/pages/datatable-initializer.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/font-awesome-icon-picker/fontawesome-iconpicker.min.js'); ?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/bootstrap-tagsinput.min.js');?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/backend/js/bootstrap-tagsinput.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/vendor/dropzone.min.js');?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/backend/js/ui/component.fileupload.js');?>" charset="utf-8"></script>

<!-- dragula js-->
<script src="<?php echo base_url('assets/backend/js/vendor/dragula.min.js'); ?>"></script>
<!-- component js -->
<script src="<?php echo base_url('assets/backend/js/ui/component.dragula.js'); ?>"></script>

<script src="<?php echo site_url('assets/backend/js/custom.js');?>"></script>

<!-- Dashboard chart's data is coming from this file -->
<?php include "$logged_in_user_role/dashboard-chart.php"; ?>

<script type="text/javascript">
  $(document).ready(function() {
    $(function() {
       $('.icon-picker').iconpicker();
     });
     
     $('#font_awesome_class').on('iconpickerSelected', function(event){
 $.iconpicker.batch('#font_awesome_class', 'destroy');
 
 $('#font_awesome_class').addClass('destroy');
 
 

 
 
});


$('#font_awesome_class').on('click', function(event){
    
   
    
    if ($(this).hasClass("destroy")) {
    
       $('.icon-picker').iconpicker();
    
    $('#font_awesome_class').removeClass('destory');  
     
 }
    
    
})

 







  });
</script>

<!-- Toastr and alert notifications scripts -->
<script type="text/javascript">
function notify(message) {
  $.NotificationApp.send("<?php echo get_phrase('heads_up'); ?>!", message ,"top-right","rgba(0,0,0,0.2)","info");
}

function success_notify(message) {
  $.NotificationApp.send("<?php echo get_phrase('congratulations'); ?>!", message ,"top-right","rgba(0,0,0,0.2)","success");
}

function error_notify(message) {
  $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", message ,"top-right","rgba(0,0,0,0.2)","error");
}

function error_required_field() {
  $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", "<?php echo get_phrase('please_fill_all_the_required_fields'); ?>" ,"top-right","rgba(0,0,0,0.2)","error");
}
</script>

<?php if ($this->session->flashdata('info_message') != ""):?>
<script type="text/javascript">
  $.NotificationApp.send("<?php echo get_phrase('success'); ?>!", '<?php echo $this->session->flashdata("info_message");?>' ,"top-right","rgba(0,0,0,0.2)","info");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>
<script type="text/javascript">
  $.NotificationApp.send("<?php echo get_phrase('oh_snap'); ?>!", '<?php echo $this->session->flashdata("error_message");?>' ,"top-right","rgba(0,0,0,0.2)","error");
</script>
<?php endif;?>

<?php if ($this->session->flashdata('flash_message') != ""):?>
<script type="text/javascript">
  $.NotificationApp.send("<?php echo get_phrase('congratulations'); ?>!", '<?php echo $this->session->flashdata("flash_message");?>' ,"top-right","rgba(0,0,0,0.2)","success");
</script>
<?php endif;?>



<script>

reloadChat ();
var timeout = setInterval(reloadChat, 5000);    
function reloadChat () {
    
    $.ajax({
        type: "GET",
        url: "<?= str_replace('http:','https:',str_replace('https:','http:',base_url('admin/getmessage')));?>",
        success: function(data)
        {
            var json = JSON.parse(data);
            console.log(data);
            var html = '';
            if(json.Status == 200)
            {
                // $('#header-count-message').css('display','block');
                // $('#header-count-message').html(json.Count);
                // $('#header-count-message').attr('title','You have received the ' + json.Count + ' message');
                
                // for(var i = 0; i < json.Data.length; i++)
                // {
                //     html +='<div class="col-12 p-0 border-bottom border-right " style="padding-left:20px!important;">';
                //     html +='    <a href="<?= base_url('admin/message/message_read/')?>' + json.Data[i].message_thread_code + '" class="d-block py-2 bg-hover-light">';
                //     html +='        <strong>' + json.Data[i].sender_name + '</strong>';
                //     html +='        <span class="w-100 d-block text-muted">' + json.Data[i].message + '</span>';
                //     html +='    </a>';
                //     html +='</div>';
                // }
                
                
                 var count = parseInt(0);
                $('#header-count-notification').css('display','block');
                for(var i = 0; i < json.Data.length; i++)
                {
                    if(parseInt(json.Data[i].read_status) == 0)
                    {
                        count++;
                    }
                    
                    html +='<div class="col-12 p-0 border-bottom border-right " style="padding-left:5px!important;">';
                    html +='    <a href="javascript:void(0);" class="d-block py-2">';
                    html +='        <strong>' + json.Data[i].title + '</strong>';
                    html +='        <span class="w-100 d-block text-muted">' + json.Data[i].description;
                    if(json.Data[i].read_status != '1')
                        html +='            <button title="Click here for mark as read" type="button" class="btn btn-default header-access-btn" onclick="markasread(this.value)" value="' + json.Data[i].notification_user_id + '"><i class="fa fa-check"></i></button>';
                    html +='        </span>';
                    html +='    </a>';
                    html +='</div>';
                }
                $('#header-count-notification').html(count);
                $('#header-count-notification').attr('title','You have received the ' + count + ' message');
                
                $('.header-notification-section').css('display','block');
                $('.noti-all-section').css('display','block');
                $('.header-notification-section').html(html);
            }
            else
            {
                $('#header-count-message').css('display','none');
                $('#header-count-message').html(0);
            }
            
            $('.header-count-message').css('display','block');
            $('.header-count-message').html(html);
            
            
            

               
        }
    });
} 
<?php
if(!empty($this->session->userdata('user_login')))
{?>
reloadNotification();
var timeout = setInterval(reloadNotification, 5000);    
function reloadNotification() {
    
    $.ajax({
        type: "GET",
        url: "<?= str_replace('http:','https:',str_replace('https:','http:',base_url('user/getnotification')));?>",
        success: function(data)
        {
            var json = JSON.parse(data);
            console.log(data);
            var html = '';
            if(json.Status == 200)
            {
                var count = parseInt(0);
                $('#header-count-notification').css('display','block');
                for(var i = 0; i < json.Data.length; i++)
                {
                    if(parseInt(json.Data[i].read_status) == 0)
                    {
                        count++;
                    }
                    
                    html +='<div class="col-12 p-0 border-bottom border-right " style="padding-left:5px!important;">';
                    html +='    <a href="javascript:void(0);" class="d-block py-2">';
                    html +='        <strong>' + json.Data[i].title + '</strong>';
                    html +='        <span class="w-100 d-block text-muted">' + json.Data[i].description;
                    if(json.Data[i].read_status != '1')
                        html +='            <button title="Click here for mark as read" type="button" class="btn btn-default header-access-btn" onclick="markasread(this.value)" value="' + json.Data[i].notification_user_id + '"><i class="fa fa-check"></i></button>';
                    html +='        </span>';
                    html +='    </a>';
                    html +='</div>';
                }
                $('#header-count-notification').html(count);
                $('#header-count-notification').attr('title','You have received the ' + count + ' message');
                
                $('.header-notification-section').css('display','block');
                $('.noti-all-section').css('display','block');
                $('.header-notification-section').html(html);
            }
            else
            {
                $('#header-count-notification').css('display','none');
                $('#header-count-notification').html(0);
                
                $('.header-notification-section').css('display','none');
                $('.noti-all-section').css('display','none');
                $('.header-notification-section').html('');
            }
        }
    });
}

function markasread(ref_id = 0)
{
    $.ajax({
        url: "<?= str_replace('http:','https:',str_replace('https:','http:',base_url('user/markasread')));?>",
        method: "POST",
        data:{
            id:ref_id
        },
        callback:'?',
        crossDomain:true,
        success: function(data)
        {
            // console.log(data);
            reloadNotification();
        }
    });
}
<?php
}?>
</script>

<script>
    var objDiv = document.querySelector(".conversation-list");
    objDiv.scrollTop = objDiv.scrollHeight;
    
    var objDiv1 = document.querySelector(".slimScrollDiv");
    objDiv1.scrollTop = objDiv1.scrollHeight;
    
    
    /* 21-05-2022 start */
    function exportdata(e,type = 'excel')
    {
        
    // alert($(e).attr('page'));    
    
    
    // alert("<?= str_replace('http:','https:',str_replace('https:','http:',base_url('ExportData/')));?>" + $(e).attr('page') + '/'+ type + '?' + $('#' + $(e).attr('form')).serialize());
    
    // return false;
 
        
  window.location = "<?= str_replace('http:','https:',str_replace('https:','http:',base_url('ExportData/')));?>" + $(e).attr('page') + '/'+ type + '?' + $('#' + $(e).attr('form')).serialize();
    
        
        
    }
    /* 21-05-2022 close */
</script>
<!-- 24-05-2022 Start -->
<script>
    function addsection(val)
    {
        var num = parseInt(val) + 1;
        // course-curriculum-section
        
        var html = '';
		
		html +='<div id="section-column-' + num + '" class="col-xl-12 section-column-' + num + ' section-division">';
		html +='	<div class="row">';
		html +='		<div class="col-xl-12">';
		html +='		    <button type="button" class="btn btn-danger float-right" onclick="removedivision(this)" removediv="section-column-' + num + '" style="padding: 2px 5px;min-width: fit-content">';
		html +='                <i class="fa fa-trash"></i>';
		html +='		    </button>';
		html +='		</div>';
		html +='		<div class="col-xl-12 form-group">';
		html +='			<label> Sr No:' + num + ').<br>Section Name</label>';
		html +='			<input type="text" name="section[' + num + ']" value="" class="form-control tab-7" required>';
		html +='			<div id="section-lesson-' + num + '-division" class="col-xl-12 section-sub-division section-lesson-' + num + '-division">';
		
		html +='			</div>';
		html +='			<div class="float-right">';
		html +='				<input type="hidden" value="0" class="section_sub_div_' + num + '" name="section_sub_div_' + num + '" >';
		html +='				<button class="btn btn-warning add-sub-box-btn" type="button" onclick="addsubsection(this)" mastervalue="' + num + '" subtype="lesson" value="0">';
		html +='					<i class="fa fa-plus"></i> Add Lession';
		html +='				</button>';
		html +='				<button class="btn btn-warning add-sub-box-btn" type="button" onclick="addsubsection(this)" mastervalue="' + num + '" subtype="quiz" value="0">';
		html +='					<i class="fa fa-plus"></i> Add Quiz';
		html +='				</button>';
		html +='			</div>';
		html +='		</div>';
		html +='	</div>';
		html +='</div>';
		
		$('.course-curriculum-section').append(html);
		$('#add-section-btn').val(num);
		$('#total_section').val(num);
		
    }
    
    function addsubsection(e)
    {
        var num = parseInt($(e).val()) + 1;
        
        var html = '';
        if($(e).attr('subtype') =='lesson')
        {
            html +='<div class="row sub-row-section sub-section-' + $(e).attr('mastervalue') + '-' + num + '">';
            html +='    <input type="hidden" class="subcat-form-control" name="section_sub_name[' + $(e).attr('mastervalue') + '][' + num + ']" value="lesson" >';
    		html +='		<div class="col-xl-12">';
    		html +='		    <button type="button" class="btn btn-danger float-right" onclick="removedivision(this)" removediv="sub-section-' + $(e).attr('mastervalue') + '-' + num + '" style="padding: 2px 5px;min-width: fit-content">';
    		html +='                <i class="fa fa-trash"></i>';
    		html +='		    </button>';
    		html +='		</div>';
    		html +='    <div class="col-xl-3 form-group">';
    		html +='        <label>Lesson Type</label>';
    		html +='        <select class="form-control" name="section_lesson_type[' + $(e).attr('mastervalue') + '][' + num + ']" onchange="addlessoncontent(this)" mastervalue="' + $(e).attr('mastervalue') + '" subid="' + num + '">';
    		html +='            <option value="">Not Selected</option>';
    		html +='            <option value="youtube">youtube</option>';
    		html +='            <option value="vimeo">vimeo</option>';
    		html +='            <option value="video">video</option>';
    		html +='            <option value="html5">html5</option>';
    		html +='            <option value="document">document</option>';
    		html +='            <option value="image">image</option>';
    		html +='            <option value="iframe">iframe</option>';
    		html +='        </select>';
    		html +='    </div>';
    		html +='    <div class="col-xl-9 form-group">';
    		html +='        <label>Lesson Title</label>';
    		html +='        <input type="text" class="form-control subcat-form-control" name="section_lesson_title[' + $(e).attr('mastervalue') + '][' + num + ']" placeholder="enter lesson name">';
    		html +='    </div>';
    		html +='    <div class="col-xl-12">';
    		html +='        <div class="row section-lesson-form-' + $(e).attr('mastervalue') + '-' + num + '">';
    		html +='        </div>';
    		html +='    </div>';
    		html +='</div>';
        }
        
        if($(e).attr('subtype') =='quiz')
        {
            html +='<div class="row sub-row-section sub-section-' + $(e).attr('mastervalue') + '-' + num + '">';
        	html +='	<input type="hidden" class="subcat-form-control" name="section_sub_name[' + $(e).attr('mastervalue') + '][' + num + ']" value="quiz">';
        	html +='    <div class="col-xl-12">';
        	html +='    	<button type="button" class="btn btn-danger float-right" onclick="removedivision(this)" removediv="sub-section-' + $(e).attr('mastervalue') + '-' + num + '" style="padding: 2px 5px;min-width: fit-content">';
        	html +='    		<i class="fa fa-trash"></i>';
        	html +='    	</button>';
        	html +='    </div>';
        	html +='    <div class="col-xl-12 form-group">';
        	html +='    	<label>Quiz Name</label>';
        	html +='    	<input class="form-control subcat-form-control" name="section_quiz_title[' + $(e).attr('mastervalue') + '][' + num + ']" onchange="addlessoncontent(this)" mastervalue="' + $(e).attr('mastervalue') + '" subid="' + num + '">';
        	html +='    </div>';
        	html +='    <div class="col-xl-12 form-group">';
        	html +='    	<label>Quiz Instruction</label>';
        	html +='    	<textarea class="form-control" name="section_quiz_instruction[' + $(e).attr('mastervalue') + '][' + num + ']"></textarea>';
        	html +='    </div>';
        	html +='    <div class="col-xl-12 section-quiz-question-' + $(e).attr('mastervalue') + '-' + num + '">';
            html +='     	<div class="row quiz-que-' + $(e).attr('mastervalue') + '-' + num + '" style="margin:0px;">';
            html +='         	<div class="col-xl-12 form-group ques-' + $(e).attr('mastervalue') + '-' + num + '-1 question-division" style="border: 1px solid #2d368e;margin: 5px 0px 0px 25px;border-radius: 5px;right: 25px;">';
            html +='         		<label>Enter Question</label>';
            html +='         		<input type="text" name="question_name[' + $(e).attr('mastervalue') + '][' + num + '][1]" class="form-control" placeholder="enter question name">';
            html +='         		<div class="row quiz-ans-' + $(e).attr('mastervalue') + '-' + num + '-1" style="padding-left: 25px;padding-top:10px;">';
            html +='                    <div class="col-xl-2" style="display: flex;justify-content: center;align-items: center;">';
            html +='		                <label>';
            html +='                            <input type="radio" name="correct_answer[' + $(e).attr('mastervalue') + '][' + num + '][1]" value="1"> Is Correct';
            html +='		                </label>';
            html +='		            </div>';
            html +='         			<div class="col-xl-8 form-group">';
            html +='    		        	<label>Option 1</label>';
            html +='    		        	<input type="text" name="question_option[' + $(e).attr('mastervalue') + '][' + num + '][1][1]" class="form-control" placeholder="enter question name">';
            html +='    		        </div>';
            html +='                    <div class="col-xl-2"></div>';
            html +='                    <div class="col-xl-2" style="display: flex;justify-content: center;align-items: center;">';
            html +='		                <label>';
            html +='                            <input type="radio" name="correct_answer[' + $(e).attr('mastervalue') + '][' + num + '][1]" value="2"> Is Correct';
            html +='		                </label>';
            html +='		            </div>';
            html +='    		        <div class="col-xl-8 form-group">';
            html +='    		            <label>Option 2</label>';
            html +='    		            <input type="text" name="question_option[' + $(e).attr('mastervalue') + '][' + num + '][1][2]" class="form-control" placeholder="enter question name">';
            html +='    		        </div>';
            html +='                    <div class="col-xl-2"></div>';
            html +='         		</div>';
            html +='                <button class="btn btn-warning float-left" appendclass="quiz-ans-' + $(e).attr('mastervalue') + '-' + num + '-1" type="button" onclick="addoption(this)" mastervalue="' + $(e).attr('mastervalue') + '" quizvalue="' + num + '" quesvalue="1" value="2" style="margin: 5px 0px;">';
            html +='     		        <i class="fa fa-plus"></i> Add Option';
            html +='     	        </button>';
            html +='         	</div>';
            html +='         </div>';
            html +='         <button class="btn btn-warning float-right" appendclass="quiz-que-' + $(e).attr('mastervalue') + '-' + num + '" type="button" onclick="addquestion(this)" mastervalue="' + $(e).attr('mastervalue') + '" quizvalue="' + num + '" value="1" style="margin: 5px 0px;">';
            html +='     		<i class="fa fa-plus"></i> Add Question';
            html +='     	</button>';
        	html +='    </div>';
        	html +='</div>';
        }
		$('.section-lesson-' + $(e).attr('mastervalue') + '-division').append(html);
		$('.add-sub-box-btn').val(num);
		$('.section_sub_div_' + $(e).attr('mastervalue')).val(num);
    }
    
    function addlessoncontent(e)
    {
        if($(e).val().length>0)
        {
            var name = $(e).val().toLowerCase();
            var html = '';
            if(name == 'youtube' || name == 'vimeo')
            {
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Video url( For web application )*</label>';
                html +='    <input type="text" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][video_url]">';
                html +='</div>';
                
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Duration( For web application )*</label>';
                html +='    <input type="text" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][duration]" data-toggle="timepicker" data-minute-step="5" data-show-meridian="false" value="00:00:00">';
                html +='</div>';
                
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Lesson provider( For mobile application )*</label>';
                html +='    <input type="text" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][lesson_provider_for_mobile_application]">';
                html +='</div>';
                
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Video url( For mobile application )*</label>';
                html +='    <input type="text" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][html5_video_url_for_mobile_application]">';
                html +='</div>';
                
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Duration( For mobile application )*</label>';
                html +='    <input type="text" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][html5_duration_for_mobile_application]" data-toggle="timepicker" data-minute-step="5" data-show-meridian="false" value="00:00:00">';
                html +='</div>';
                
            }
            if(name == 'video')
            {
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Upload system video file( For web and mobile application )*</label>';
                html +='    <input type="file" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][system_video_file]">';
                html +='    <small class="badge badge-primary">maximum_upload_size: 200M</small>';
                html +='    <small class="badge badge-primary">post_max_size: 200M</small>';
                html +='    <small class="badge badge-secondary">"post_max_size" Has to be bigger than "upload_max_filesize"</small>';
                html +='</div>';
                
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Duration( For web and mobile application )*</label>';
                html +='    <input type="text" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][system_video_file_duration]" data-toggle="timepicker" data-minute-step="5" data-show-meridian="false" value="00:00:00">';
                html +='</div>';
            }
            if(name == 'html5')
            {
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Video url( For web application )*</label>';
                html +='    <input type="text" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][html5_video_url]">';
                html +='</div>';
                
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Duration( For web application )*</label>';
                html +='    <input type="text" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][html5_duration]" data-toggle="timepicker" data-minute-step="5" data-show-meridian="false" value="00:00:00">';
                html +='</div>';
                
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Thumbnail (The image size should be: 979 x 551)*</label>';
                html +='    <input type="file" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][thumbnail]">';
                html +='</div>';
            }
            if(name == 'document' || name == 'image')
            {
                if(name == 'document')
                {
                    html +='<div class="col-xl-6 form-group">';
                    html +='    <label>Video url( For web application )*</label>';
                    html +='    <select class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][lesson_type]">';
                    html +='        <option value="other-txt">Text File</option>';
                    html +='        <option value="other-pdf">PDF File</option>';
                    html +='        <option value="other-doc">Document File</option>';
                    html +='    </select>';
                    html +='</div>';
                }
                
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Attachment</label>';
                html +='    <input type="file" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][attachment]">';
                html +='</div>';
            }
            if(name == 'iframe')
            {
                html +='<div class="col-xl-6 form-group">';
                html +='    <label>Iframe source( Provide the source only )*</label>';
                html +='    <input type="text" class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][iframe_source]">';
                html +='</div>';
            }
            
            html +='<div class="col-xl-6 form-group">';
            html +='    <label>Summary*</label>';
            html +='    <textarea class="form-control" name="lesson_form[' + $(e).attr('mastervalue') + '][' + $(e).attr('subid') + '][summary]"></textarea>';
            html +='</div>';
            $('.section-lesson-form-' + $(e).attr('mastervalue') + '-' + $(e).attr('subid')).html(html);
            
            initTimepicker();

        }
    }

    //function for add question
    function addquestion(e)
    {
        var num = parseInt($(e).val()) + 1;
        var html ='';
        html +='<div class="col-xl-12 form-group ques-' + $(e).attr('mastervalue') + '-' + $(e).attr('quizvalue') + '-' + num + '" style="border: 1px solid #2d368e;margin: 5px 0px 0px 25px;border-radius: 5px;right: 25px;">';
        html +='    <label>Enter Question</label>';
        html +='    <input type="text" name="question_name[' + $(e).attr('mastervalue') + '][' + $(e).attr('quizvalue') + '][' + num + ']" placeholder="enter question name" class="form-control">';
        html +='    <div class="row quiz-ans-' + $(e).attr('mastervalue') + '-' + $(e).attr('quizvalue') + '-' + num + ' pl-10" style="padding-left: 25px;padding-top: 10px;">';
        html +='        <div class="col-xl-2" style="display: flex;justify-content: center;align-items: center;">';
        html +='            <label>';
        html +='                <input type="radio" name="correct_answer[' + $(e).attr('mastervalue') + '][' + $(e).attr('quizvalue') + '][' + num + ']" value="1"> Is Correct';
        html +='            </label>';
        html +='        </div>';
        html +='        <div class="col-xl-8 form-group">';
        html +='            <label>Option 1</label>';
        html +='            <input type="text" name="question_option[' + $(e).attr('mastervalue') + '][' + $(e).attr('quizvalue') + '][' + num + '][1]" placeholder="enter question name" class="form-control">';
        html +='        </div>';
        html +='        <div class="col-xl-2"></div>';
        html +='        <div class="col-xl-2" style="display: flex;justify-content: center;align-items: center;">';
        html +='            <label>';
        html +='                <input type="radio" name="correct_answer[' + $(e).attr('mastervalue') + '][' + $(e).attr('quizvalue') + '][' + num + ']" value="2"> Is Correct';
        html +='            </label>';
        html +='        </div>';
        html +='        <div class="col-xl-8 form-group">';
        html +='            <label>Option 2</label>';
        html +='            <input type="text" name="question_option[' + $(e).attr('mastervalue') + '][' + $(e).attr('quizvalue') + '][' + num + '][2]" placeholder="enter question name" class="form-control">';
        html +='        </div>';
        html +='        <div class="col-xl-2"></div>';
        html +='    </div>';
        html +='    <button class="btn btn-warning float-left" appendclass="quiz-ans-' + $(e).attr('mastervalue') + '-' + $(e).attr('quizvalue') + '-' + num + '" type="button" onclick="addoption(this)" mastervalue="' + $(e).attr('mastervalue') + '" quizvalue="' + $(e).attr('quizvalue') + '" quesvalue="' + num + '" value="2" style="margin: 5px 0px;">';
        html +='        <i class="fa fa-plus"></i> Add Option';
        html +='     </button>';
        html +='</div>';
        
        $('.' + $(e).attr('appendclass')).append(html);
        $(e).val(num);
    }
    
    //function for add option
    function addoption(e)
    {
        var num = parseInt($(e).val()) + 1;
        var html = '';
        html +='                    <div class="col-xl-2 opt-' + $(e).attr('mastervalue') + '-' + $(e).attr('quesvalue') + '-' + $(e).attr('quizvalue') +'-' + num + '" style="display: flex;justify-content: center;align-items: center;">';
        html +='    		            <label>';
        html +='                            <input type="radio" name="correct_answer[' + $(e).attr('mastervalue') + '][' + $(e).attr('quizvalue') + '][' + $(e).attr('quesvalue') + ']" value="' + num + '"> Is Correct';
        html +='    		            </label>';
        html +='    		        </div>';
        html +='                    <div class="col-xl-8 opt-' + $(e).attr('mastervalue') + '-' + $(e).attr('quesvalue') + '-' + $(e).attr('quizvalue') +'-' + num + ' form-group">';
        html +='    		            <label>Option ' + num + '</label>';
        html +='    		            <input type="text" name="question_option[' + $(e).attr('mastervalue') + '][' + $(e).attr('quizvalue') + '][' + $(e).attr('quesvalue') + '][' + num + ']" class="form-control" placeholder="enter question name">';
        html +='    		        </div>';
        html +='                    <div class="col-xl-2 opt-' + $(e).attr('mastervalue') + '-' + $(e).attr('quesvalue') + '-' + $(e).attr('quizvalue') +'-' + num + '">';
        html +='    		            <button class="btn btn-danger mt-3" onclick="removedivision(this)" removediv="opt-' + $(e).attr('mastervalue') + '-' + $(e).attr('quesvalue') + '-' + $(e).attr('quizvalue') +'-' + num + '" >';
        html +='                            <i class="fa fa-trash"></i>';
        html +='                        </button>';
        html +='    		        </div>';
        $('.' + $(e).attr('appendclass')).append(html);
        $(e).val(num);
    }
    
    //function for remove division
    function removedivision(e)
    {
        var con = confirm('Are you sure for remove?');
        if(con == true)
        {
            $('.' + $(e).attr('removediv')).remove();
        }
    }
    
    
    //function for set curriculum into preview
    function getcurriculum()
    {
        var array = [];
        $('.course-curriculum-section > .section-division').map(function()
        {
            var m_e = this;
            $('#' + $(m_e).attr('id') +' > .row .form-group:first > .form-control').map(function()
            {
                var child_array = [];
                
                $('#' + $(m_e).attr('id') +' > .row .form-group:first > .section-sub-division').map(function()
                {
                    var m_c_e = this;
                    var child_child_array = [];
                    var min_child_array = [];
                    $('#' + $(m_c_e).attr('id') +' .subcat-form-control').map(function()
                    {
                        var m_l_e = this;
                        
                        if($(m_l_e).attr('type') == 'hidden')
                        {
                            min_child_array.type = $(m_l_e).val();
                        }
                        else
                        {
                            min_child_array.name = $(m_l_e).val();
                            child_child_array.push({'type':min_child_array.type,'name':min_child_array.name});
                        }
                    });
                    child_array.data = child_child_array;
                });
                // console.log(child_array);
                array.push({'name':this.value,'subdata':child_array.data});
            });
        });
        // console.log(array);
        // console.log(JSON.stringify(array));
        // console.log('<?= base_url('home/getcurriculumnpreview');?>');
        // console.log({
        //         curriculum:array
        //     });
        $.ajax({
            url: '<?= str_replace('http:','https:',str_replace('https:','http:',base_url('home/getcurriculumnpreview')));?>',
            method: "POST",
            callback: '?',
            crossDomain: true,
            data: {
                curriculum:array
            },
            success: function(data)
            {
                $('.pre-curriculum').css('display','none');
                // console.log(data);return false;
                var json = JSON.parse(data);
                if(json.Status == 200)
                {
                    $('.pre-curriculum').css('display','block');
                    $('.pre-curriculum').html(json.Data);
                }
            }
        });
    }
    
    
    /* ------------ 09-06-2022 -------------- */
    function course_amount_validation(from = '')
    {
        if(from.length < 0)
        {
            // $('.amount-input').val(0);
            return false;
        }
        
        if(from == 'price')
        {
            $('#discounted_price').val(0);
            return false;
        }
        
        if(from == 'discounted_price')
        {
            var price_amt = $('#price').val();
            
            var dis_price_amt = $('#discounted_price').val();
            
            if(parseFloat(price_amt) < parseInt(dis_price_amt))
            {
                
                $('#discounted_price').val(0);
                return false;
            }
            
            if(parseFloat(dis_price_amt) == parseFloat(price_amt))
            {
                $('#discounted_percentage').html('100%');
                return true;
            }
            
            var other_disc = parseFloat(dis_price_amt*100)/parseInt(price_amt);
            
            $('#discounted_percentage').html(parseFloat(100-other_disc) + '%');
        }
    }
    
    function check_checkbox(page = '')
    {
        if(page == 'price')
        {
            if($('#is_free_course').is(':checked') == true)
                $('.paid-course-stuffs').slideUp();
            else
                $('.paid-course-stuffs').slideDown();
                
            $('#price').val(0);
            $('#discounted_price').val(0);
            
        }
        if(page == 'discounted_price')
        {
            $('#discounted_price').val(0);
        }
    }
    /* ------------ 09-06-2022 -------------- */
</script>

<!-- 24-05-2022 Close -->