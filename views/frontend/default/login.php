<?php if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<?php echo $this->session->userdata('is_instructor'); ?>
<section class="category-course-list-area" style="min-height: 700px; background: #FFF;">
    <div class="container pt-5">
        <div class="login-min" >
            <div class="row">
                <div class="col-lg-6 text-center">
                    <img src="<?php echo base_url() ?>/assets/Logo-02.png" width="200">
                    <img src="<?php echo base_url() ?>/assets/LoginBG.png" width="100%">
                </div>
                <div class="col-lg-5">
                    <div class="login-form">
                      <div class="text-center mb-5 mt-5">
                          <h2 style="font-size:30px; font-weight: bold; color: #464F9F">Welcome to Med Ed</h2>
                          <div style="font-size: 20px; font-weight: bold; color: #f58220">Become an Instructor!</div>
                      </div>
                      <form action="<?php echo site_url('login/validate_login/user'); ?>" method="post" id="login">
                              <input type="email" class="form-control" name = "email" placeholder="<?php echo site_phrase('email*'); ?>" value="" required style="border: none; border-bottom: #f1f1f1 1px solid; border-radius: 0px;">
                              
                              <div class="input-group mb-3 mt-3">
                                  <input type="password" class="form-control" name="password" placeholder="<?php echo site_phrase('password*'); ?>" id="PassField" required required style="border: none; border-bottom: #f1f1f1 1px solid; border-radius: 0px;">
                                  <span onClick="ShowPass()" class="input-group-text" id="basic-addon2"><i class="fas fa-eye-slash"></i></span>
                                </div>
                                  
                                  <?php if(get_frontend_settings('recaptcha_status')): ?>
                                    <div class="form-group">
                                      <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                                    </div>
                                  <?php endif; ?>
                              
                              <div class="float-left"><input type="checkbox"> Remember Me</div>
                              <div class="float-right"><a href="javascript::" onclick="toggoleForm('forgot_password')"><?php echo site_phrase('forgot_password'); ?></a></div>
                              <div class="clearfix"></div>
                          
                          <div class="row mt-5">
                              <div class="col-lg-6"><button class="btn" style="width: 100%" type="submit"><?php echo site_phrase('login'); ?></button></div>
                              <div class="col-lg-6"><a href="<?= base_url('home/sign_up');?>"><button style="width: 100%" class="btn" type="button"><?php echo site_phrase('sign_up'); ?></button></a></div>
                              <!--<div class="col-lg-6"><a href="javascript::" onclick="toggoleForm('registration')"><button style="width: 100%" class="btn" type="button"><?php echo site_phrase('sign_up'); ?></button></a></div>-->
                          </div>
                      </form>
                    </div>
                  <div class="register-form hidden">
                      <div class="text-center mb-5 mt-5">
                          <h2 style="font-size: 40px; font-weight: bold; color: #464F9F">Welcome to Med Ed</h2>
                          <div style="font-size: 25px; font-weight: bold; color: #f58220">Become an Instructor!</div>
                      </div>
                      <form action="<?php echo site_url('login/register'); ?>" method="post" id="sign_up">
                          <div class="mb-4">
                            <input type="text" class="form-control" name = "first_name" id="first_name" placeholder="<?php echo site_phrase('first_name'); ?>" value="" required style="border: none; border-bottom: #f1f1f1 1px solid; border-radius: 0px;">
                          </div>
                          
                          <div class="mb-4">
                            <input type="text" class="form-control" name = "last_name" id="last_name" placeholder="<?php echo site_phrase('last_name'); ?>" value="" required style="border: none; border-bottom: #f1f1f1 1px solid; border-radius: 0px;">
                          </div>
                          
                          <div class="mb-4">
                            <input type="email" class="form-control" name = "email" id="registration-email" placeholder="<?php echo site_phrase('email'); ?>" value="" required style="border: none; border-bottom: #f1f1f1 1px solid; border-radius: 0px;">
                          </div>
                          
                          <div class="mb-4">
                            <input type="password" class="form-control" name = "password" id="registration-password" placeholder="<?php echo site_phrase('password'); ?>" value="" required style="border: none; border-bottom: #f1f1f1 1px solid; border-radius: 0px;">
                          </div>
                          
                          <?php if(get_frontend_settings('recaptcha_status')): ?>
                            <div class="form-group">
                              <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                            </div>
                          <?php endif; ?>
                          
                          <div class="row mt-5">
                              <div class="col-lg-6"><button class="btn" style="width: 100%" type="submit"><?php echo site_phrase('sign_up'); ?></button></div>
                              <div class="col-lg-6"><a href="javascript::" onclick="toggoleForm('login')"><button class="btn" style="width: 100%" type="button"><?php echo site_phrase('login'); ?></button></a></div>
                          </div>
                          
                      </form>
                  </div>
                  <div class="user-dashboard-content w-100 forgot-password-form hidden pb-5">
                      <div class="text-center mb-5 mt-5">
                          <h2 style="font-size: 40px; font-weight: bold; color: #464F9F">Welcome to Med Ed</h2>
                          <div style="font-size: 25px; font-weight: bold; color: #f58220"><?php echo site_phrase('provide_your_email_address_to_get_password'); ?></div>
                      </div>
                      
                      <form action="<?php echo site_url('login/forgot_password/frontend'); ?>" method="post" id="forgot_password">
                          <input type="email" class="form-control" name = "email" id="forgot-email" placeholder="<?php echo site_phrase('email'); ?>" value="" required style="border: none; border-bottom: #f1f1f1 1px solid; border-radius: 0px;">
                          
                          
                          <?php if(get_frontend_settings('recaptcha_status')): ?>
                            <div class="form-group mt-5">
                              <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                            </div>
                          <?php endif; ?>
                          
                          <div class="row mt-5">
                              <div class="col-lg-6"><button class="btn" style="width: 100%" type="submit"><?php echo site_phrase('reset_password'); ?></button></div>
                              <div class="col-lg-6"><a href="javascript::" onclick="toggoleForm('login')"><button class="btn" style="width: 100%" type="button"><?php echo site_phrase('login'); ?></button></a></div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
</section>

<script type="text/javascript">
  function toggoleForm(form_type) {
    if (form_type === 'login') {
      $('.login-form').show();
      $('.forgot-password-form').hide();
      $('.register-form').hide();
    }else if (form_type === 'registration') {
      $('.login-form').hide();
      $('.forgot-password-form').hide();
      $('.register-form').show();
    }else if (form_type === 'forgot_password') {
      $('.login-form').hide();
      $('.forgot-password-form').show();
      $('.register-form').hide();
    }
  }
</script>

<script>
ShowPassword = 0;
  function ShowPass(){
      if(ShowPassword == 0){
          ShowPassword = 1;
          $("#PassField").attr("type", "text");
          $("#basic-addon2").html('<i class="fas fa-eye"></i>');
      }else{
          ShowPassword = 0;
          $("#PassField").attr("type", "password");
          $("#basic-addon2").html('<i class="fas fa-eye-slash"></i>');
      }
  }
</script>
