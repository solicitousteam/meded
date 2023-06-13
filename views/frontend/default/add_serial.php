<?php
$Courses = $this->db->get('course')->result_array();
?>
<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                 <img src="https://cloud.solicitous.in/meded/uploads/gift-card.png" style="height: 44px; width: 44px;"alt="user-image"> 
                <?php echo get_phrase('add_new_serial_learning'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('serial_learning_add_form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('user/serial_learning/add'); ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Topic</label>
                        <input type="text" name="topic" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Course Thumbnail</label>
                        <input type="file" name="course_thumbnail" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select</option>
                            <?php foreach( $categories as $category ) { ?>
                            <option value="<?=$category->id?>"><?=$category->name?></option>    
                            <?php } ?>    
                        </select>    
                    </div>
                    
                    <div class="form-group">
                        <label>description</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Objectives (Compulsory Min 3 Lines )</label>
                        <input type="text" name="objectives" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Outcomes (Compulsory Min 3 Lines )</label>
                        <input type="text" name="outcomes" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>Upload Videos</label>
                        <input type="file" name="attachment[]" multiple class="form-control">
                    </div>

                
                    <button type="submit" class="btn btn-primary"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

