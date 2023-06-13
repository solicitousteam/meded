
<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-title"><?php echo site_phrase('user_profile'); ?></h1>
                <ul>
                    <li><a href="<?php echo site_url('home/my_courses'); ?>"><?php echo site_phrase('all_courses'); ?></a></li>
                    <!--<li><a href="<?php echo site_url('home/my_wishlist'); ?>"><?php echo site_phrase('wishlists'); ?></a></li>-->
                    <li><a href="<?php echo site_url('home/my_messages'); ?>"><?php echo site_phrase('my_messages'); ?></a></li>
                    <li><a href="<?php echo site_url('home/purchase_history'); ?>"><?php echo site_phrase('purchase_history'); ?></a></li>
                    <li class="active"><a href=""><?php echo site_phrase('user_profile'); ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="user-dashboard-area">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="user-dashboard-box">
                    <div class="user-dashboard-sidebar">
                        <div class="user-box">
                            <img src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>" alt="" class="img-fluid">
                            <div class="name" ><?php echo $user_profile_details['first_name'].' '.$user_profile_details['last_name']; ?></div>
                        </div>
                        <div class="user-dashboard-menu">
                            <ul>
                                <li><a href="<?php echo site_url('home/profile/user_profile'); ?>"><?php echo site_phrase('profile'); ?></a></li>
                                <li class="active"><a href="<?php echo site_url('home/profile/user_credentials'); ?>"><?php echo site_phrase('account'); ?></a></li>
                                <li><a href="<?php echo site_url('home/profile/user_photo'); ?>"><?php echo site_phrase('photo'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-dashboard-content">
                        <div class="content-title-box">
                            <div class="title"><?php echo site_phrase('account'); ?></div>
                            <div class="subtitle"><?php echo site_phrase('edit_your_account_settings'); ?>.</div>
                        </div>
                        <form action="<?php echo site_url('home/update_profile/update_credentials'); ?>" method="post">
                            <div class="content-title-box">
                                <div class="email-group">
                                    <div class="form-group">
                                        
                                        <label for="email" ><b></b><?php echo site_phrase('email'); ?>:</label>
                                        <input type="email" class="form-control" name = "email" id="email" placeholder="<?php echo site_phrase('email'); ?>" value="<?php echo $user_profile_details['email']; ?>">
                                    </div>
                                </div>
                                <div class="password-group">
                                    <div class="form-group">
                                        <label for="password"><?php echo site_phrase('password'); ?>:</label>
                                        <div class="input-group">
                                            <input type="text" oninput="if(this.value.length>0){$(this).attr('type','password');}" class="form-control is-password" id="current_password" name = "current_password" placeholder="<?php echo site_phrase('enter_current_password'); ?>" value="" autocomplete="false">
                                            <button class="btn btn-default" type="button" onclick="hideshowbtn(this)">
                                                <i class="fa fa-eye-slash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" oninput="if(this.value.length>0){$(this).attr('type','password');}" class="form-control is-password" name = "new_password" placeholder="<?php echo site_phrase('enter_new_password'); ?>">
                                            <button class="btn btn-default" type="button" onclick="hideshowbtn(this)">
                                                <i class="fa fa-eye-slash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" oninput="if(this.value.length>0){$(this).attr('type','password');}" class="form-control is-password" name = "confirm_password" placeholder="<?php echo site_phrase('re-type_your_password'); ?>">
                                            <button class="btn btn-default" type="button" onclick="hideshowbtn(this)">
                                                <i class="fa fa-eye-slash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-update-box">
                                <button type="submit" class="btn"><?php echo site_phrase('save'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
<script>
    
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