

<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                  <img src="<?= base_url('uploads/add-button.png')?>" style="height: 44px; width: 44px;"alt="user-image">
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                <?php echo get_phrase('add_new_department'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('department_add_form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('admin/categories/add'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="code"><?php echo get_phrase('department_code'); ?></label>
                        <input type="text" class="form-control" id="code" name = "code" value="<?php echo substr(md5(rand(0, 1000000)), 0, 10); ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name"><?php echo get_phrase('department_title'); ?><span class="required">*</span></label>
                        <input type="text" class="form-control" id="name" name = "name" required>
                    </div>
                    
                    
                    
                     <div class="form-group">
                        <label for="parent">Courses category<span class="required">*</span></label>
                        <select class="form-control select2" required data-toggle="course" name="course" id="course">
                          <option value="0"><?php echo get_phrase('none'); ?></option>
                          <option value="1">Blended learning</option>
                          <option value="2">Video learning</option>
                          <option value="3">Serial learning</option>
                          <option value="4">Webinar</option>
                         
                         
                         
                         
                        </select>
                    </div>
                    
                    

                    <div class="form-group">
                        <label for="parent"><?php echo get_phrase('parent'); ?><span class="required">*</span></label>
                        <select class="form-control select2" required data-toggle="select2" name="parent" id="parent" onchange="checkCategoryType(this.value)">
                          <option value="0"><?php echo get_phrase('none'); ?></option>
                          <?php foreach ($categories as $category): ?>
                              <?php if ($category['parent'] == 0): ?>
                                  <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                              <?php endif; ?>
                          <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group" id = "icon-picker-area">
                        <label for="font_awesome_class"><?php echo get_phrase('icon_picker'); ?></label>
                        <input type="text" id ="font_awesome_class" name="font_awesome_class" class="form-control icon-picker" autocomplete="on"> 
                    </div>

                    <div class="form-group" id = "thumbnail-picker-area">
                        <label> <?php echo get_phrase('department_thumbnail'); ?><span class="required">*</span><small>(<?php echo get_phrase('the_image_size_should_be'); ?>: 400 X 255)</small> </label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" required class="custom-file-input" id="category_thumbnail" name="category_thumbnail" accept="image/png, image/gif, image/jpeg" onchange="changeTitleOfImageUploader(this)">
                                <label class="custom-file-label" for="category_thumbnail"><?php echo get_phrase('choose_thumbnail'); ?></label>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>



<script type="text/javascript">
    function checkCategoryType(category_type) {
      
       $('.iconpicker-popover').hide();
        if (category_type > 0) {
            $('#thumbnail-picker-area').hide();
            $('#icon-picker-area').hide();
            
            $('#category_thumbnail').prop('required',false);
        }else {
            $('#thumbnail-picker-area').show();
            $('#icon-picker-area').show();
            
            $('#category_thumbnail').prop('required',true);
        }
    }
</script>
<script>
    var category_thumbnail = document.getElementById("category_thumbnail");

category_thumbnail.ondrop = function (e) {
    e.preventDefault();
    e.stopPropagation();

    var files = e.dataTransfer.files;
    for(x = 0; x < files.length; x = x + 1){
        if(files[x].type.split("image/*")[0] == 'image') {
            console.log(files[x].name + "is image");
        }else {
            console.log(files[x].name + "is not image");
        }
    }
}
</script>