<style>
.form-control {
	border-radius: 30px;
}
.note-editor.note-frame {
	overflow: hidden;
}
</style>

<div class="row ">
  <div class="col-xl-12">
        <h4 class="page-title"> <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" style="height: 44px; width: 44px;"alt="user-image" class="rounded-circle img-thumbnail"> 
          <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> --> 
          <?php echo  "&nbsp;&nbsp;&nbsp;". get_phrase('Manage_profile'); ?></h4>
      </div>
      <!-- end card body--> 
  <!-- end col--> 
</div>
<div class="row mt-4">
  <div class="col-xl-7">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title mb-3"><?php echo get_phrase('basic_info'); ?></h4>
        <?php
				foreach($edit_data as $row):
					$social_links = json_decode($row['social_links'], true);?>
        <?php echo form_open(site_url('admin/manage_profile/update_profile_info/'.$row['id']) , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label><?php echo get_phrase('first_name');?><span class="required">*</span></label>
              <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name'];?>" required/>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label><?php echo get_phrase('last_name');?><span class="required">*</span></label>
              <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name'];?>" required/>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label><?php echo get_phrase('email');?><span class="required">*</span></label>
              <input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>" required/>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label><?php echo get_phrase('mobile');?><span class="required">*</span></label>
              <input type="number" class="form-control" name="mobile" value="<?php echo $row['mobile'];?>" required/>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label><?php echo get_phrase('facebook_link');?><span class="required">*</span></label>
              <input type="text" class="form-control" name="facebook_link" value="<?php echo $social_links['facebook'];?>" required/>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label><?php echo get_phrase('twitter_link');?><span class="required">*</span></label>
              <input type="text" class="form-control" name="twitter_link" value="<?php echo $social_links['twitter'];?>" required/>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label><?php echo get_phrase('linkedin_link');?><span class="required">*</span></label>
              <input type="text" class="form-control" name="linkedin_link" value="<?php echo $social_links['linkedin'];?>" required/>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label><?php echo get_phrase('a_short_title_about_yourself'); ?><span class="required">*</span></label>
              <textarea rows="5" id="short-title" class="form-control" name="title" placeholder="<?php echo get_phrase('a_short_title_about_yourself'); ?>" required><?php echo $row['title']; ?></textarea>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label><?php echo get_phrase('biography'); ?><span class="required">*</span></label>
              <textarea rows="5" class="form-control" name="biography" id="biography" placeholder="<?php echo get_phrase('biography'); ?>" required><?php echo $row['biography']; ?></textarea>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label> <?php echo get_phrase('photo'); ?> <small>(<?php echo get_phrase('the_image_size_should_be_any_square_image'); ?>)</small> </label>
              <div class="d-flex mt-2">
                <div class=""> <img class = "rounded-circle img-thumbnail" src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="" style="height: 50px; width: 50px;"> </div>
                <div class="flex-grow-1 pl-2">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name = "user_image" id="user_image" onChange="changeTitleOfImageUploader(this)" accept="image/*">
                      <label class="custom-file-label ellipsis" for=""><?php echo get_phrase('choose_file'); ?></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <button type="submit" class="btn btn-primary"><?php echo get_phrase('update_profile');?></button>
        </div>
        </form>
        <?php
			endforeach;
			?>
        </form>
      </div>
      <!-- end card body--> 
    </div>
    <!-- end card --> 
  </div>
  <div class="col-xl-5">
    <div class="card">
      <div class="card-body">
        <?php foreach($edit_data as $row): ?>
        <?php echo form_open(site_url('admin/manage_profile/change_password/'.$row['id']) , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
        <div class="form-group">
            <label><?php echo get_phrase('current_password');?><span class="required">*</span></label>
            <div class="input-group">
                <input type="password" class="form-control is-password" name="current_password" value="" required/>
                <button class="btn btn-default" type="button" onclick="hideshowbtn(this)">
                    <i class="fa fa-eye-slash"></i>
                </button>
            </div>
        </div>
        <div class="form-group">
            <label><?php echo get_phrase('new_password');?><span class="required">*</span></label>
            <div class="input-group">
                <input type="password" class="form-control is-password" name="new_password" value="" required/>
                <button class="btn btn-default" type="button" onclick="hideshowbtn(this)">
                    <i class="fa fa-eye-slash"></i>
                </button>
            </div>
        </div>
        <div class="form-group">
            <label><?php echo get_phrase('confirm_new_password');?><span class="required">*</span></label>
            <div class="input-group">
                <input type="password" class="form-control is-password" name="confirm_password" value="" required/>
                <button class="btn btn-default" type="button" onclick="hideshowbtn(this)">
                    <i class="fa fa-eye-slash"></i>
                </button>
            </div>
        </div>
        <div class="row justify-content-center">
          <button type="submit" class="btn btn-info"><?php echo get_phrase('update_password');?></button>
        </div>
        </form>
        <?php endforeach; ?>
      </div>
    </div>
    <style>
        .input-group{
            border: 1px solid #dee2e6;border-radius: 20px;
        }
        .input-group input{
            border:none;
        }
        .btn-default.focus, .btn-default:focus {
            outline: 0;
            webkit-box-shadow: none!important;
            box-shadow: none!important;
        }
    </style>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
	initSummerNote(['#biography']);
});


function hideshowbtn(e)
{
    if($(e).prev('.is-password').attr('type') == 'password')
    {
        $(e).prev('.is-password').attr('type','text')
        $(e).html('<i class="fa fa-eye"></i>');
    }
    else
    {
        $(e).prev('.is-password').attr('type','password')
        $(e).html('<i class="fa fa-eye-slash"></i>');
    }
}

</script> 
