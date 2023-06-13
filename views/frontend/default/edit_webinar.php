<?php
$Courses = $this->db->get('course')->result_array();
$webinar = $webinar[0];
?>
<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                 <img src="https://cloud.solicitous.in/meded/uploads/gift-card.png" style="height: 44px; width: 44px;"alt="user-image"> 
                <?php echo get_phrase('add_new_webinar'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('webinar_edit_form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('user/webinar/update'); ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" value="<?=$webinar->first_name?>" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" value="<?=$webinar->last_name?>" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="<?=$webinar->email?>" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="<?=$webinar->title?>" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="proposed_date" value="<?=$webinar->proposed_date?>" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" name="proposed_time" value="<?=$webinar->proposed_time?>" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Duration</label>
                        <input type="text" name="duration" value="<?=$webinar->duration?>" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Upload your presentation material</label>                      
                        <input type="file" name="attachement[]" multiple class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>What are the pain points you will address in this webinar? What tangible benefit(s) will your listener recieve? (no more than 3)</label>
                        <textarea name="pain_point" value="<?=$webinar->pain_point?>" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>End Goal or Final Call To Action (CTA)</label>
                        <textarea name="cta"  value="<?=$webinar->cta?>"class="form-control" placeholder="What it your reason for hosting this webinar? Examples include: Product/program promotion, course sales, email list growth, etc... Include the name and/or any links that you plan to use as your CTA"></textarea>
                    </div>
                    <input type="hidden" name="webinar_id" value="<?=$webinar->id?>">
                
                    <button type="submit" class="btn btn-primary"><?php echo get_phrase("update"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

