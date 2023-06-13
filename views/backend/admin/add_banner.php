<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                 <img src="https://main.solicitous.cloud/meded4/uploads/advertisement.png" style="height: 44px; width: 44px;"alt="user-image"> 
                <?php echo get_phrase('add_new_banner'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-7">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-12">
                <h4 class="mb-3 header-title"><?php echo get_phrase('banner_add_form'); ?></h4>

                <form class="required-form" action="<?php echo site_url('admin/banner/add'); ?>"  method="post" enctype="multipart/form-data">

                   
                     <div class="form-group">
                        <input type="radio" name="BannerType" value="1" required checked> Internal &nbsp;
                        <input type="radio" name="BannerType" value="2" required> External
                    </div>

                   

                   
                    
                    <div class="form-group">
                        <label>Name of the Organization<span class="required">*</span></label>
                        <input type="text" name="organization_name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Contact details of Organization<span class="required">*</span></label>
                        <input type="number" name="organization_contact" class="form-control" required>
                    </div>
                    
                    <!-- <div class="form-group">-->
                    <!--    <label>Offered price</label>-->
                    <!--    <input type="number" name="price" class="form-control">-->
                    <!--</div>-->
                    
                     <div class="form-group">
                        <label>Course<span class="required">*</span></label>
                        <select class="form-control" name="BannerCourse" required>
                            <option value="">Select Course</option>
                            <?php
                                foreach($courses as $Courses){
                            ?>
                                <option value="<?php echo $Courses["id"] ?>"><?php echo $Courses["title"] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                      <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="name">From Date<span class="required">*</span></label>
                        <input type="date" class="form-control date_picker" name="from_date" required>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">To Date<span class="required">*</span></label>
                        <input type="date" class="form-control date_picker" name="to_date" required>
                    </div>
                </div>
                <script language="javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    $('.date_picker').attr('min',today);
</script>
                    </div>
                    
                     <div class="form-group">
                        <label>External Link<span class="required">*</span></label>
                        <input type="url" name="BannerURL" class="form-control" id="myurl" onkeyup= "isUrlValid(this.value)" onblur= "isUrlValid(this.value)" required>
                        <br>
                        <p style="color:red" class="error"></p>
                    </div>
                    
                      <div class="form-group">
                        <label>Offered Price<span class="required">*</span></label>
                        <input type="number" name="offered_price" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="name"><?php echo get_phrase('banner'); ?><span class="required">*</span></label>
                        <input type="file" class="form-control" id="picture" name = "picture" accept="image/*" required>
                    </div>
                    
                    <button type="button" class="btn btn-primary btn_sub" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>
                </form>
                
                
                
                <!--<form class="required-form" action="<?php echo site_url('admin/banner/add'); ?>" method="post" enctype="multipart/form-data">-->
                <!--   <div class="form-group">-->
                <!--        <input type="radio" name="BannerType" value="1" checked> Internal &nbsp;-->
                <!--        <input type="radio" name="BannerType" value="2"> External-->
                <!--    </div>-->

                <!--     <div class="form-group">-->
                <!--        <label>Offered price</label>-->
                <!--        <input type="number" name="price" class="form-control">-->
                <!--    </div>-->
                <!--    <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase("submit"); ?></button>-->
                <!--</form>-->
                
                
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script>
    var picture = document.getElementById("picture");

picture.ondrop = function (e) {
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


var var2;
     $('.error').hide();

function isUrlValid(userInput) {
   
    var res = userInput.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
    if(res == null)
    {
       

        $('.error').show();
        $('.error').text('Not A Valid Url');
        $('.btn_sub').attr('disabled','disabled');
      
       
    
    }  
    else
    {
        $('.error').hide();
        $('.btn_sub').removeAttr('disabled'); 
        return true;
       
    }    
}








</script>
