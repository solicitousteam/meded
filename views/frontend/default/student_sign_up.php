<?php if(get_frontend_settings('recaptcha_status')): ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>
<style type="text/css">
body {
	margin: 0;
}
span.help-block.error {
	color: red;
	margin-bottom: 20px;
	display: none;
}
.page-content {
	width: 100%;
	margin: 0 auto;
	background-image: -moz-linear-gradient( 136deg, rgb(254,225,64) 0%, rgb(250,112,154) 100%);
	background-image: -webkit-linear-gradient( 136deg, rgb(254,225,64) 0%, rgb(250,112,154) 100%);
	background-image: -ms-linear-gradient( 136deg, rgb(254,225,64) 0%, rgb(250,112,154) 100%);
	display: flex;
	display: -webkit-flex;
	justify-content: center;
	-o-justify-content: center;
	-ms-justify-content: center;
	-moz-justify-content: center;
	-webkit-justify-content: center;
	align-items: center;
	-o-align-items: center;
	-ms-align-items: center;
	-moz-align-items: center;
	-webkit-align-items: center;
}
.form-v7-content {
	width: 910px;
	/* margin: 175px 0; */
	margin: auto;
	font-family: 'Open Sans', sans-serif;
	position: relative;
	display: flex;
	display: -webkit-flex;
	border-radius: 30px;
	overflow: hidden;
}
.form-v7-content .form-left {
	position: relative;
	color: #fff;
	font-weight: 400;
	width: 92.5%;
	background: #fff;
	margin-top: 0;
}
.form-v7-content .form-left img {
	width: 100%;
}
.form-v7-content .form-left .text-1, .form-v7-content .form-left .text-2 {
	position: absolute;
	text-align: center;
	width: 100%;
}
.form-v7-content .form-left .text-1 {
	font-size: 38px;
	top: 1.5%;
}
.form-v7-content .form-left .text-2 {
	font-size: 16px;
	bottom: 11%;
}
.form-v7-content .form-left .text-2::after {
	position: absolute;
	content: "";
	background: #fff;
	height: 1px;
	width: 228px;
	bottom: -50%;
	left: 50%;
	transform: translateX(-50%);
	-o-transform: translateX(-50%);
	-ms-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	-webkit-transform: translateX(-50%);
	opacity: 0.5;
}
.form-v7-content .form-detail {
	padding:25px 35px;
	position: relative;
	width: 100%;
	background: #fff;
	margin-top: 0 !important;
}
.form-v7-content .form-detail .form-row {
	width: 100%;
	position: relative;
	padding:0px 0;
}
.form-v7-content .form-detail .form-row label {
	color: #666;
	font-weight: 600;
	font-size: 13px;
	margin-bottom: 7px;
	font-family: 'Open Sans', sans-serif;
}
.form-v7-content .form-detail .form-row label#valid {
	position: absolute;
	right: 20px;
	top: 35%;
	width: 14px;
	height: 14px;
	border-radius: 50%;
	-o-border-radius: 50%;
	-ms-border-radius: 50%;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	background: #53c83c;
}
.form-v7-content .form-detail .form-row label#valid::after {
	content: "";
	position: absolute;
	left: 5px;
	top: 1px;
	width: 3px;
	height: 8px;
	border: 1px solid #fff;
	border-width: 0 2px 2px 0;
	-webkit-transform: rotate(45deg);
	-ms-transform: rotate(45deg);
	-o-transform: rotate(45deg);
	-moz-transform: rotate(45deg);
	transform: rotate(45deg);
}
.form-v7-content .form-detail .form-row label.error {
	padding-left: 0;
	margin-left: 0;
	display: block;
	position: absolute;
	bottom: 5px;
	width: 100%;
	background: none;
	color: red;
	font-family: 'Open Sans', sans-serif;
	font-weight: 700;
}
.form-v7-content .form-detail .form-row label.error::after {
	content: "\f343";
	font-family: "LineAwesome";
	position: absolute;
	transform: translate(-50%, -50%);
	-webkit-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	-o-transform: translate(-50%, -50%);
	-moz-transform: translate(-50%, -50%);
	right: 10px;
	top: -25px;
	color: red;
	font-size: 18px;
	font-weight: 900;
}
.form-v7-content .form-detail .input-text:not([type='checkbox']) {
	margin-bottom: 8px;
}
.form-v7-content .form-detail input:not([type="checkbox"]) {
	width: 100%;
	padding: 5px 15px 10px 15px;
	border: 1px solid #ddd;
	border-bottom: 2px solid #e5e5e5;
	appearance: unset;
	outline: none;
	-moz-outline: none;
	-webkit-outline: none;
	-o-outline: none;
	-ms-outline: none;
	font-family: 'Open Sans', sans-serif;
	font-size: 16px;
	font-weight: 700;
	color: #333;
	border-radius: 30px;
}
.form-v7-content .form-detail .form-row input:focus {
	border: 1px solid #2bb33e;
}
.register {
	background: #26318d;
	border-radius: 4px;
	-o-border-radius: 4px;
	-ms-border-radius: 4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	width: 180px;
	border: none;
	text-align: center;
	margin: -13px 0 50px 0px;
	cursor: pointer;
	font-family: 'Open Sans', sans-serif;
	color: #fff !important;
	font-weight: 700;
	font-size: 15px;
	float: left;
}
.register  color:#fff;
}
.register:hover {
	background: #2a2cb0;
}
.form-v7-content .form-detail .form-row-last {
	margin-top: 35px;
}
.form-v7-content .form-detail .form-row-last input {
	padding: 15px;
}
.form-v7-content .form-detail .form-row-last p {
	font-weight: 600;
	font-size: 14px;
	color: #666;
	margin-left: 200px;
}
.form-v7-content .form-detail .form-row-last a {
	font-size: 16px;
	color: #373be3;
	padding-left: 15px;
}
 @media screen and (max-width: 991px) {
.form-v7-content {
	margin: 180px 20px;
	flex-direction: column;
	-o-flex-direction: column;
	-ms-flex-direction: column;
	-moz-flex-direction: column;
	-webkit-flex-direction: column;
}
.form-v7-content .form-left {
	width: 100%;
	margin-bottom: -5px;
}
.form-v7-content .form-detail {
	padding: 50px;
	width: auto;
}
.form-v7-content .form-detail .register {
	margin-bottom: 80px;
}
}
@media screen and (max-width: 767px) {
}
 @media screen and (max-width: 575px) {
.form-v7-content .form-detail {
	padding: 30px 20px;
	width: auto;
}
.form-v7-content .form-detail .register {
	float: none;
	margin-bottom: 10px;
}
.form-v7-content .form-detail .form-row-last p {
	margin-left: 0px;
	margin-bottom: 50px;
}
}
.top_logo {
	margin: auto;
	width: 300px;
	padding: 20px;
}
.middel_logo h1 {
	font-size:35px;
	font-weight: 800;
}
.middel_logo {
	text-align: center;
	padding-bottom:20px
}
.last_logo {
	position: absolute;
	bottom: 0;
}
.register {
	margin: 0;
	border-radius: 30px;
	border: 0 !important;
}
.top_logo img {
	max-width: 200px;
	margin: auto;
	text-align: center;
}
.top_logo {
	text-align: center;
}
</style>
<section class="category-course-list-area">
  <div class="container pt-5">
    <form action="<?php echo site_url('login/register_student'); ?>" method="POST" enctype="multipart/form-data" name="form_220435892880462" id="220435892880462">
      <div class="form-v7-content register_form">
        <div class="form-left a1" >
          <div class="top_logo"> <img src="<?php echo base_url() ?>/assets/Logo-02.png" width="150"> </div>
       
          <div class="last_logo"> <img src="<?php echo base_url() ?>/assets/LoginBG.png" width="100%"> </div>
        </div>
        <div class="form-detail mt-4"  id="login1">
               <div class="middel_logo">
            <h1><strong>Register as a Student</strong></h1>
          </div>
         <div class="row">
          <div class="col-lg-6"><div class="form-row ">
            <label for="username">USERNAME*</label>
            <input type="text" name="username" id="username" class="input-text" required>
            <span class="help-block error">This field is required.</span> </div></div>
        <div class="col-lg-6"> <div class="form-row">
            <label for="phone">MOBILE NUMBER*</label>
            <input type="text" name="your_number" id="your_number" class="input-text" required pattern="[789][0-9]{9}">
            <span class="help-block error">This field is required.</span> </div></div>
          <div class="col-lg-12"><div class="form-row">
            <label for="your_email">E-MAIL*</label>
            <input type="email" name="email" id="email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
            <span class="help-block error">This field is required.</span> </div></div></div>
            <div class="row">
             <div class="col-lg-6">
          <div class="form-row">
            <label for="password">PASSWORD*</label>
            <input type="password" name="password" id="password" class="input-text" required>
            <span class="help-block error">This field is required.</span> </div></div>
            <div class="col-lg-6">
          <div class="form-row">
            <label for="comfirm_password">CONFIRM PASSWORD*</label>
            <input type="password" name="comfirm_password" id="comfirm_password" class="input-text" required>
            <span class="help-block error">This field is required.</span> </div>
            </div> </div>
            
          <div class="form-row pb-4">
            <input type="checkbox" class="input-text" name="term_and_condition" required id="term_and_condition">
            <a href="<?php echo base_url() ?>home/terms_and_condition" target="_blank">&nbsp;Terms and Condition</a>
            </label>
            <br>
            <span class="help-block error" style="width: 100%;">This field is required.</span> </div>
          <div class=form-row>
            <input type="button" name="button" class="register" onClick="form_submit1()" id="form_submit" value="Register" style="padding: 15px;">
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<script type="text/javascript">
  function form_submit1() {
    check1 = checkRequiredFields();
    if(check1 == true){
                event.preventDefault();

      $('#220435892880462').submit();
    }
  } 

  function checkRequiredFields(){
    fail = true;
    if($('#username').val() == ''){
      fail = false;
      $('#username').closest('.form-row').find('.help-block').show();
      setTimeout(function(){$('#username').closest('.form-row').find('.help-block').hide()}, 4000);
    }
    var password = $('#password').val();
    var comfirm_password = $('#comfirm_password').val();
    if($('#your_number').val() == ''){
      $('#your_number').closest('.form-row').find('.help-block').show();
      $('#your_number').closest('.form-row').find('.help-block').html('Please required field');
      setTimeout(function(){$('#your_number').closest('.form-row').find('.help-block').hide()}, 4000);
      fail = false;
    }
    if(password == ''){
      $('#password').closest('.form-row').find('.help-block').show();
      $('#password').closest('.form-row').find('.help-block').html('Please required field');
      setTimeout(function(){$('#password').closest('.form-row').find('.help-block').hide()}, 4000);
      fail = false;
    }
    if($('#comfirm_password').val() == ''){
      $('#comfirm_password').closest('.form-row').find('.help-block').show();
      $('#comfirm_password').closest('.form-row').find('.help-block').html('Please required field');
      setTimeout(function(){$('#comfirm_password').closest('.form-row').find('.help-block').hide()}, 4000);
      fail = false;
    }
    if($('#term_and_condition').prop('checked') == false){
      $('#term_and_condition').closest('.form-row').find('.help-block').show();
      $('#term_and_condition').closest('.form-row').find('.help-block').html('Please required field');
      setTimeout(function(){$('#term_and_condition').closest('.form-row').find('.help-block').hide()}, 4000);
      fail = false;
    }

    if(password != ''){
      if(password.length < 8){
        $('#password').closest('.form-row').find('.help-block').show();
        $('#password').closest('.form-row').find('.help-block').html('password should be 8 characters required');
        setTimeout(function(){$('#password').closest('.form-row').find('.help-block').hide()}, 4000);
        fail = false;  
      }
    }
    if(comfirm_password != ''){
      if(password != comfirm_password){
        $('#comfirm_password').closest('.form-row').find('.help-block').show();
        $('#comfirm_password').closest('.form-row').find('.help-block').html('password and confirm password does not match');
        setTimeout(function(){$('#comfirm_password').closest('.form-row').find('.help-block').hide()}, 4000);
        fail = false;  
      }
    }
    if($('#email').val() == ''){
      $('#email').closest('.form-row').find('.help-block').show();
      $('#email').closest('.form-row').find('.help-block').html('Please required field');
      setTimeout(function(){$('#email').closest('.form-row').find('.help-block').hide()}, 4000);
      fail = false;
    }
    if($('#your_number').val() != ''){
      var mobileNum = $('#your_number').val();
      var validateMobNum= /^\d*(?:\.\d{1,2})?$/;
      if (validateMobNum.test(mobileNum ) && mobileNum.length == 10) {
          //alert("Valid Mobile Number");
      }else {
        fail = false;
        $('#your_number').closest('.form-row').find('.help-block').show();
        $('#your_number').closest('.form-row').find('.help-block').html('Invalid Mobile Number');
        setTimeout(function(){$('#your_number').closest('.form-row').find('.help-block').hide()}, 4000);
      }
      if($('#email').val() != ''){
        check = validateEmail($('#email').val());
        if(!check){
          $('#email').closest('.form-row').find('.help-block').show();
          $('#email').closest('.form-row').find('.help-block').html('Invalid Email id');
          setTimeout(function(){$('#email').closest('.form-row').find('.help-block').hide()}, 4000);
          fail = false;  
        }
        
      } 

    }
    return fail;
  }
  function checkRequiredFields11() {
    var pass = 1;
    $('#login1').find('input, select,checkbox').each(function(){
      //alert($(this).attr('type'))
      if($(this).prop('required')){
        if ($(this).val() === "") {
          pass = 0;
        }
      }
    });

    if (pass === 1) {
      return true;
      //$('form.required-form').submit();
    }else {
      //error_required_field();
      return false
    }
  }
  function validateEmail($email) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      return emailReg.test( $email );
  }
  
</script> 
