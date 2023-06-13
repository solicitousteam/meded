<?php if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>
<style type="text/css">
  body {
  margin:  0;
}
span.help-block.error {color: red;margin-bottom: 20px;display: none;} 
.page-content {
  width: 100%;
  margin:  0 auto;
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
.middel_logo h1 {
	color: #26318d;
}
.form-v7-content .form-left img {
   width: 100%; 

}
.form-v7-content .form-left .text-1,
.form-v7-content .form-left .text-2 {
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
    padding:30px;
  position: relative;
  width: 100%;
  background: #fff;
  margin-top: 0 !important;
}
.form-v7-content .form-detail .form-row {
	width: 100%;
	position: relative;
	margin: 0 !important;
}
.form-v7-content .form-detail .form-row label {
  color: #666;
  font-weight: 600;
  font-size: 13px;
  margin-bottom: 3px;
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
.form-v7-content .form-detail input:not([type='checkbox']) {
  width: 100%;
    padding: 5px 15px 10px 15px;
    border: 2px solid transparent;
    border-bottom: 2px solid #e5e5e5;
    appearance: unset;
    -moz-appearance: unset;
    -webkit-appearance: unset;
    -o-appearance: unset;
    -ms-appearance: unset;
    outline: none;
    -moz-outline: none;
    -webkit-outline: none;
    -o-outline: none;
    -ms-outline: none;
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: #333;
    box-sizing: border-box;
    -o-box-sizing: border-box;
  -ms-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}
.form-v7-content .form-detail .form-row input:focus {
  border-bottom: 2px solid #2bb33e;
}
.register {
	background: #26318d;
	border-radius: 4px;
	-o-border-radius: 4px;
	-ms-border-radius: 4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	width: 100%;
	border: none;
	text-align: center;
	margin: -13px 0 50px 0px;
	cursor: pointer;
	font-family: 'Open Sans', sans-serif;
	color: #fff !important;
	font-weight: 700;
	font-size: 15px;
	float: left;
	padding: 13px;
	margin-top: 30px !important;
}
.register
  color:#fff;
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
    flex-direction:  column;
    -o-flex-direction:  column;
    -ms-flex-direction:  column;
    -moz-flex-direction:  column;
    -webkit-flex-direction:  column;
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
.top_logo{
  margin: auto;
  width: 300px;
  padding: 20px;
}
.middel_logo h1{
  font-size:40px;
  font-weight: 800;
}
.middel_logo{
  text-align: center;
    padding:20px 0px;
}
.last_logo{
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
        <form action="<?php echo site_url('login/register'); ?>" method="POST" enctype="multipart/form-data" name="form_220435892880462" id="220435892880462">
        <div class="form-v7-content register_form">
         <div class="form-left a1" >
            <div class="top_logo">
            <img src="<?php echo base_url() ?>/assets/Logo-02.png" width="150">
            </div>
     
            <div class="last_logo">
               <img src="<?php echo base_url() ?>/assets/LoginBG.png" width="100%"> 
            </div>
         </div>
         <div class="form-detail mt-4"  id="login1">
                    <div class="middel_logo">
               <h1><strong>Become an Instructor</strong></h1>
            </div>
            <div class="form-row m-5 p-10">
       <a href="<?php echo base_url("/home/student_sign_up"); ?>" target="_blank" class="register">Sign Up as Student</button>  </a>
        </div>
            <div class="form-row m-5 p-10">

       <a href="<?php echo base_url("/home/instructor_sign_up"); ?>" target="_blank" class="register">Sign Up as Instructor</button>  </a>
            </div>
         </div>
        </div>
        <div class="instructor_form" style="background: #fff;border-radius: 25px;display: none;">
        <div role="main" >
        <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?themeRevisionID=5f30e2a790832f3e96009402"/>
         <link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/css/styles/payment/payment_styles.css?3.3.30998" />
         <link type="text/css" rel="stylesheet" href="https://cdn03.jotfor.ms/css/styles/payment/payment_feature.css?3.3.30998" />
         <ul class="form-section page-section">
            <li id="cid_1" class="form-input-wide" data-type="control_head">
               <div class="form-header-group  header-large" style="background: #283392;border-radius: 29px;">
                  <div class="header-text httac htvam">
                     <h1 id="header_1" class="form-header" data-component="header" style="color:#fff;">
                        Instructor Form
                     </h1>
                  </div>
               </div>
            </li>
            <li id="cid_33" class="form-input-wide" data-type="control_head">
               <div class="form-header-group  header-default">
                  <div class="header-text httal htvam">
                     <h2 id="header_33" class="form-header" data-component="header">
                        Personal Information
                     </h2>
                  </div>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_fullname" id="id_3">
               <label class="form-label form-label-top form-label-auto" id="label_3" for="first_3">
               Name
               <span class="form-required">
               *
               </span>
               </label>
               <div id="cid_3" class="form-input-wide jf-required" data-layout="full">
                  <div data-wrapper-react="true">
                     <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
                     <input type="text" id="first_3" name="q3_name[first]" class="form-textbox validate[required]" data-defaultvalue="" autocomplete="section-input_3 given-name" size="10" value="" data-component="first" aria-labelledby="label_3 sublabel_3_first" required="">
                     <label class="form-sub-label" for="first_3" id="sublabel_3_first" style="min-height:13px" aria-hidden="false"> First Name </label>
                     <span class="help-block error">This field is required.</span>
                     </span>
                     
                     <span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                     <input type="text" id="last_3" name="q3_name[last]" class="form-textbox validate[required]" data-defaultvalue="" autocomplete="section-input_3 family-name" size="15" value="" data-component="last" aria-labelledby="label_3 sublabel_3_last" required="">
                     <label class="form-sub-label" for="last_3" id="sublabel_3_last" style="min-height:13px" aria-hidden="false"> Last Name </label>
                     <span class="help-block error">This field is required.</span>
                     </span>
                  </div>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_address" id="id_34">
               <label class="form-label form-label-top form-label-auto" id="label_34" for="input_34_addr_line1">
               Address
               <span class="form-required">
               *
               </span>
               </label>
               <div id="cid_34" class="form-input-wide jf-required" data-layout="full">
                  <div summary="" class="form-address-table jsTest-addressField">
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-street-line jsTest-address-lineField">
                        <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_34_addr_line1" name="q34_address[addr_line1]" class="form-textbox form-address-line" data-defaultvalue="" autocomplete="section-input_34 address-line1" value="" data-component="address_line_1" aria-labelledby="label_34 sublabel_34_addr_line1">
                        <label class="form-sub-label" for="input_34_addr_line1" id="sublabel_34_addr_line1" style="min-height:13px" aria-hidden="false"> Street Address </label>
                          <span class="help-block error">This field is required.</span>
                        </span>
                        </span>
                     </span>
                     </div>
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-street-line jsTest-address-lineField">
                        <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_34_addr_line2" name="q34_address[addr_line2]" class="form-textbox form-address-line" data-defaultvalue="" autocomplete="section-input_34 address-line2" value="" data-component="address_line_2" aria-labelledby="label_34 sublabel_34_addr_line2">
                        <label class="form-sub-label" for="input_34_addr_line2" id="sublabel_34_addr_line2" style="min-height:13px" aria-hidden="false"> Street Address Line 2 </label>
                        </span>
                        </span>
                     </div>
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-city-line jsTest-address-lineField ">
                        <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_34_city" name="q34_address[city]" class="form-textbox validate[required] form-address-city" data-defaultvalue="" autocomplete="section-input_34 address-level2" value="" data-component="city" aria-labelledby="label_34 sublabel_34_city" required="">
                        <label class="form-sub-label" for="input_34_city" id="sublabel_34_city" style="min-height:13px" aria-hidden="false"> City </label>
                        </span>
                        </span>
                        <span class="form-address-line form-address-state-line jsTest-address-lineField ">
                        <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_34_state" name="q34_address[state]" class="form-textbox validate[required] form-address-state" data-defaultvalue="" autocomplete="section-input_34 address-level1" value="" data-component="state" aria-labelledby="label_34 sublabel_34_state" required="">
                        <label class="form-sub-label" for="input_34_state" id="sublabel_34_state" style="min-height:13px" aria-hidden="false"> State / Province </label>
                        </span>
                        </span>
                     </div>
                     <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                        <span class="form-address-line form-address-zip-line jsTest-address-lineField ">
                        <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_34_postal" name="q34_address[postal]" class="form-textbox validate[required] form-address-postal" data-defaultvalue="" autocomplete="section-input_34 postal-code" value="" data-component="zip" aria-labelledby="label_34 sublabel_34_postal" required="">
                        <label class="form-sub-label" for="input_34_postal" id="sublabel_34_postal" style="min-height:13px" aria-hidden="false"> Postal / Zip Code </label>
                        </span>
                        </span>
                     </div>
                  </div>
               </div>
            </li>
            <!-- <li class="form-line form-line-column form-col-1 jf-required" data-type="control_phone" id="id_8">
               <label class="form-label form-label-top form-label-auto" id="label_8" for="input_8_country">
                 Phone Number
                 <span class="form-required">
                   *
                 </span>
               </label>
               <div id="cid_8" class="form-input-wide jf-required" data-layout="half">
                 <div data-wrapper-react="true" class="extended">
                   <span class="form-sub-label-container" style="vertical-align:top" data-input-type="countryCode">
                     <input type="tel" id="input_8_country" name="q8_phoneNumber[country]" class="form-textbox validate[required]" data-defaultvalue="" autocomplete="section-input_8 tel-country-code" value="" data-component="countryCode" aria-labelledby="label_8 sublabel_8_country" required="">
                     <span class="phone-separate" aria-hidden="true">
                        -
                     </span>
                     <label class="form-sub-label" for="input_8_country" id="sublabel_8_country" style="min-height:13px" aria-hidden="false"> Country Code </label>
                   </span>
                   <span class="form-sub-label-container" style="vertical-align:top" data-input-type="areaCode">
                     <input type="tel" id="input_8_area" name="q8_phoneNumber[area]" class="form-textbox validate[required]" data-defaultvalue="" autocomplete="section-input_8 tel-area-code" value="" data-component="areaCode" aria-labelledby="label_8 sublabel_8_area" required="">
                     <span class="phone-separate" aria-hidden="true">
                        -
                     </span>
                     <label class="form-sub-label" for="input_8_area" id="sublabel_8_area" style="min-height:13px" aria-hidden="false"> Area Code </label>
                   </span>
                   <span class="form-sub-label-container" style="vertical-align:top" data-input-type="phone">
                     <input type="tel" id="input_8_phone" name="q8_phoneNumber[phone]" class="form-textbox validate[required]" data-defaultvalue="" autocomplete="section-input_8 tel-local" value="" data-component="phone" aria-labelledby="label_8 sublabel_8_phone" required="">
                     <label class="form-sub-label" for="input_8_phone" id="sublabel_8_phone" style="min-height:13px" aria-hidden="false"> Phone Number </label>
                   </span>
                 </div>
               </div>
               </li> -->
            <!-- <li class="form-line form-line-column form-col-2 jf-required" data-type="control_email" id="id_5">
               <label class="form-label form-label-top form-label-auto" id="label_5" for="input_5">
                 Email
                 <span class="form-required">
                   *
                 </span>
               </label>
               <div id="cid_5" class="form-input-wide jf-required" data-layout="half">
                 <span class="form-sub-label-container" style="vertical-align:top">
                   <input type="email" id="input_5" name="q5_email" class="form-textbox validate[required, Email]" data-defaultvalue="" style="width:310px" size="310" value="" data-component="email" aria-labelledby="label_5 sublabel_input_5" required="">
                   <label class="form-sub-label" for="input_5" id="sublabel_input_5" style="min-height:13px" aria-hidden="false"> example@example.com </label>
                 </span>
               </div>
               </li> -->
            <li class="form-line form-line-column form-col-3 jf-required" data-type="control_datetime" id="id_6">
               <label class="form-label form-label-top form-label-auto" id="label_6" for="lite_mode_6">
               Birthday
               <span class="form-required">
               *
               </span>
               </label>
               <input type="date" name="birth_date" class="form-control" id="birth_date">
               <span class="help-block error">This field is required.</span>
                     </span>
            </li>
            <li class="form-line jf-required" data-type="control_fileupload" id="id_10">
               <label class="form-label form-label-top form-label-auto" id="label_10" for="input_10">
               Please upload your photo
               <span class="form-required">
               *
               </span>
               </label>
               <input type="file" name="file" id="file">
               <span class="help-block error">This field is required.</span>
            </li>
            <li class="form-line jf-required" data-type="control_fileupload" id="id_49">
               <label class="form-label form-label-top form-label-auto" id="label_49" for="input_49">
               Aadhar Card / Passport :
               <span class="form-required">
               *
               </span>
               </label>
               <input type="file" name="file1" id="file1">
               <span class="help-block error">This field is required.</span>
            </li>
            <li id="cid_37" class="form-input-wide" data-type="control_head">
               <div class="form-header-group  header-default">
                  <div class="header-text httal htvam">
                     <h2 id="header_37" class="form-header" data-component="header">
                        Emergency Contact Information
                     </h2>
                  </div>
               </div>
            </li>
            <li class="form-line" data-type="control_phone" id="id_39">
               <label class="form-label form-label-top form-label-auto" id="label_39" for="input_39_full"> Primary Emergency | Phone Number </label>
               <div id="cid_39" class="form-input-wide" data-layout="half">
                  <span class="form-sub-label-container" style="vertical-align:top">
                  <input type="tel" id="input_39_full" name="q39_primaryEmergency[full]" data-type="mask-number" class="mask-phone-number form-textbox validate[Fill Mask]" data-defaultvalue="" autocomplete="section-input_39 tel-national" style="width:310px" data-masked="true" value="" placeholder="(000) 000-0000" data-component="phone" aria-labelledby="label_39 sublabel_39_masked" inputmode="text" maskvalue="(###) ###-####">
                  <label class="form-sub-label" for="input_39_full" id="sublabel_39_masked" style="min-height:13px" aria-hidden="false"> Please enter a valid phone number. </label>
                  </span>
               </div>
            </li>
            <li class="form-line" data-type="control_textbox" id="id_41">
               <label class="form-label form-label-top form-label-auto" id="label_41" for="input_41"> Primary Emergency | What is your relationship with this person? </label>
               <div id="cid_41" class="form-input-wide" data-layout="half">
                  <input type="text" id="input_41" name="q41_primaryEmergency41" data-type="input-textbox" class="form-textbox" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_41">
               </div>
            </li>
            <li class="form-line" data-type="control_fullname" id="id_38">
               <label class="form-label form-label-top form-label-auto" id="label_38" for="first_38"> Primary Emergency | Contact Name </label>
               <div id="cid_38" class="form-input-wide" data-layout="full">
                  <div data-wrapper-react="true">
                     <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
                     <input type="text" id="first_38" name="q38_primaryEmergency38[first]" class="form-textbox" data-defaultvalue="" autocomplete="section-input_38 given-name" size="10" value="" data-component="first" aria-labelledby="label_38 sublabel_38_first">
                     <label class="form-sub-label" for="first_38" id="sublabel_38_first" style="min-height:13px" aria-hidden="false"> First Name </label>
                     </span>
                     <span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                     <input type="text" id="last_38" name="q38_primaryEmergency38[last]" class="form-textbox" data-defaultvalue="" autocomplete="section-input_38 family-name" size="15" value="" data-component="last" aria-labelledby="label_38 sublabel_38_last">
                     <label class="form-sub-label" for="last_38" id="sublabel_38_last" style="min-height:13px" aria-hidden="false"> Last Name </label>
                     </span>
                  </div>
               </div>
            </li>
            <li id="cid_35" class="form-input-wide" data-type="control_head">
               <div class="form-header-group  header-default">
                  <div class="header-text httal htvam">
                     <h2 id="header_35" class="form-header" data-component="header">
                        Professional Information
                     </h2>
                  </div>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_textbox" id="id_13">
               <label class="form-label form-label-top form-label-auto" id="label_13" for="input_13">
               Profession
               <span class="form-required">
               *
               </span>
               </label>
               <div id="cid_13" class="form-input-wide jf-required" data-layout="half">
                  <input type="text" id="input_13" name="q13_profession" data-type="input-textbox" class="form-textbox validate[required]" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_13" required="">
                  <span class="help-block error">This field is required.</span>
                     </span>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_textbox" id="id_59">
               <label class="form-label form-label-top form-label-auto" id="label_59" for="input_59">
               What is your highest qualification?
               <span class="form-required">
               *
               </span>
               </label>
               <div id="cid_59" class="form-input-wide jf-required" data-layout="half">
                  <input type="text" id="input_59" name="q59_whatIs" data-type="input-textbox" class="form-textbox validate[required]" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_59" required="">
                  <span class="help-block error">This field is required.</span>
                     </span>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_dropdown" id="id_12">
               <label class="form-label form-label-top form-label-auto" id="label_12" for="input_12">
               Specialisation
               <span class="form-required">
               *
               </span>
               </label>
               <div id="cid_12" class="form-input-wide jf-required" data-layout="half">
                  <input type="text" id="specialisation" name="specialisation" data-type="input-textbox" class="form-textbox validate[required]" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_59" required="">
                  <span class="help-block error">This field is required.</span>
                     </span>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_textbox" id="id_60">
               <label class="form-label form-label-top form-label-auto" id="label_60" for="input_60">
               Which organisation are you working currently?
               <span class="form-required">
               *
               </span>
               </label>
               <div id="cid_60" class="form-input-wide jf-required" data-layout="half">
                  <input type="text" id="input_60" name="q60_whichOrganisation" data-type="input-textbox" class="form-textbox validate[required]" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_60" required="">
                  <span class="help-block error">This field is required.</span>
                     </span>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_dropdown" id="id_11">
               <label class="form-label form-label-top form-label-auto" id="label_11" for="input_11">
               Working Pattern
               <span class="form-required">
               *
               </span>
               </label>
               <div id="cid_11" class="form-input-wide jf-required" data-layout="half">
                  <select class="form-dropdown validate[required]" id="input_11" name="q11_workingPattern" style="width:310px" data-component="dropdown" required="">
                     <option value=""> Please Select </option>
                     <option data-calcvalue="9" value="Full time"> Full time </option>
                     <option data-calcvalue="4" value="Part time"> Part time </option>
                     <option value="Remote"> Remote </option>
                     <option value="On call"> On call </option>
                  </select>
                  <span class="help-block error">This field is required.</span>
                     </span>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_radio" id="id_54">
               <label class="form-label form-label-top form-label-auto" id="label_54" for="input_54">
               Have you used an online platform before?
               <span class="form-required">
               *
               </span>
               </label>
               <div id="cid_54" class="form-input-wide jf-required" data-layout="full">
                  <div class="form-single-column" role="group" aria-labelledby="label_54" data-component="radio">
                     <span class="form-radio-item" style="clear:left">
                     <span class="dragger-item">
                     </span>
                     <input type="radio" aria-describedby="label_54" class="form-radio validate[required] input_54_1" id="input_54_0" name="q54_haveYou" value="YES" required="" checked="">
                     <label id="label_input_54_0" for="input_54_0"> YES </label>
                     </span>
                     <span class="form-radio-item" style="clear:left">
                     <span class="dragger-item">
                     </span>
                     <input type="radio" aria-describedby="label_54" class="input_54_1 form-radio validate[required]" id="input_54_1" name="q54_haveYou" value="NO" required="">
                     <label id="label_input_54_1" for="input_54_1"> NO </label>
                     </span>
                  </div>
                  <span class="help-block error">This field is required.</span>
                     </span>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_checkbox" id="id_56">
               <label class="form-label form-label-top form-label-auto" id="label_56" for="input_56">
               Do you have Teaching experience?
               <span class="form-required">
               *
               </span>
               </label>
               <div id="cid_56" class="form-input-wide jf-required" data-layout="full">
                  <div class="form-single-column" role="group" aria-labelledby="label_56" data-component="checkbox">
                     <span class="form-checkbox-item" style="clear:left">
                     <span class="dragger-item">
                     </span>
                     <input type="checkbox" aria-describedby="label_56" class="form-checkbox validate[required] input_56_0" id="input_56_0" name="q56_name56[]" value="YES">
                     <label id="label_input_56_0" for="input_56_0"> YES </label>
                     </span>
                     <span class="form-checkbox-item" style="clear:left">
                     <span class="dragger-item">
                     </span>
                     <input type="checkbox" aria-describedby="label_56" class="form-checkbox validate[required] input_56_0" id="input_56_1" name="q56_name56[]" value="NO" >
                     <label id="label_input_56_1" for="input_56_1"> NO </label>
                     </span>
                  </div>
                  <span class="help-block error">This field is required.</span>
                     </span>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_number" id="id_58">
               <label class="form-label form-label-top form-label-auto" id="label_58" for="input_58">
               If YES, How many years of experience ?
               <span class="form-required">
               *
               </span>
               </label>
               <div id="cid_58" class="form-input-wide jf-required" data-layout="half">
                  <input type="number" id="input_58" name="q58_ifYes" data-type="input-number" class=" form-number-input form-textbox validate[required]" data-defaultvalue="0" style="width:310px" size="310" value="0" placeholder="ex: 23" data-component="number" aria-labelledby="label_58" required="" step="any">
                  <span class="help-block error">This field is required.</span>
                     </span>
               </div>
            </li>
            <li class="form-line jf-required" data-type="control_number" id="id_58">
               <input type="button" name="button" class="register" onclick="form_submit1()" id="form_submit" value="Register" style="padding: 15px;">
            </li>
         </ul>
         
        </div>
        </div>
        </form>
   </div>
</section>


<script type="text/javascript">
  function form_submit1() {
    check1 = checkRequiredFields1();
    if(check1 == true){
                event.preventDefault();

      $('#220435892880462').submit();
    }
  } 
  function toggoleForm(form_type) {
    check = checkRequiredFields();
    
    if (check == true && form_type === 'instructor_form') {
      $('.instructor_form').show();
      // $('.forgot-password-form').hide();
      $('.register_form').hide();
    }
   
  }
  function checkRequiredFields1(){
    fail = true;
    var first_name = $('#first_3').val();
    var last_name = $('#last_3').val();
    var address = $('#input_34_addr_line1').val();
    var birth_date = $('#birth_date').val();
    var file = $('#file').val();
    var file1 = $('#file').val();
    var profession = $('#input_13').val();
    var qualification = $('#input_59').val();
    var specialisation = $('#specialisation').val();
    var whichOrganisation = $('#input_60').val();
    var working_pattern = $('#input_11').val();
    var input_58 = $('#input_58').val();
    // var plat_form = $("input[type='radio'][name='q54_haveYou']:checked");
    var plat_form = $("input[name='q54_haveYou']").is('checked');

    // var plat_form = $('input[name="q54_haveYou"]:checked').val();
    var teaching_experience_count = 0;
    $("#cid_56").find("input").each(function(){
        if ($(this).prop('checked') == true){ 
            teaching_experience_count++;
        }
    });
    if(first_name == ''){
      fail = false;
      $('#first_3').closest('.form-sub-label-container').find('.help-block').show();
      setTimeout(function(){$('#first_3').closest('.form-sub-label-container').find('.help-block').hide()}, 9000);
    }
    if(profession == ''){
      fail = false;
      $('#input_13').closest('.form-line').find('.help-block').show();
      setTimeout(function(){$('#input_13').closest('.form-line').find('.help-block').hide()}, 9000);
    }
    if(qualification == ''){
      fail = false;
      $('#input_59').closest('.form-line').find('.help-block').show();
      setTimeout(function(){$('#input_59').closest('.form-line').find('.help-block').hide()}, 9000);
    }
    // if(plat_form == ''){
    //   fail = false;
    //   $('.input_54_1').closest('.form-line').find('.help-block').show();
    //   setTimeout(function(){$('.input_54_1').closest('.form-line').find('.help-block').hide()}, 9000);
    // }
    if(teaching_experience_count == 0){
      fail = false;
      $('.input_56_0').closest('.form-line').find('.help-block').show();
      setTimeout(function(){$('.input_56_0').closest('.form-line').find('.help-block').hide()}, 9000);
    }
    if(whichOrganisation == ''){
      fail = false;
      $('#input_60').closest('.form-line').find('.help-block').show();
      setTimeout(function(){$('#input_60').closest('.form-line').find('.help-block').hide()}, 9000);
    }
    if(input_58 == ''){
      fail = false;
      $('#input_58').closest('.form-line').find('.help-block').show();
      setTimeout(function(){$('#input_58').closest('.form-line').find('.help-block').hide()}, 9000);
    }
    if(working_pattern == ''){
      fail = false;
      $('#input_11').closest('.form-line').find('.help-block').show();
      setTimeout(function(){$('#input_11').closest('.form-line').find('.help-block').hide()}, 9000);
    }
    if(specialisation == ''){
      fail = false;
      $('#specialisation').closest('.form-line').find('.help-block').show();
      setTimeout(function(){$('#specialisation').closest('.form-line').find('.help-block').hide()}, 9000);
    }
    if(file == ''){
      fail = false;
      $('#file').closest('.form-line').find('.help-block').show();
      setTimeout(function(){$('#file').closest('.form-line').find('.help-block').hide()}, 9000);
    }
    if(file1 == ''){
      fail = false;
      $('#file1').closest('.form-line').find('.help-block').show();
      setTimeout(function(){$('#file1').closest('.form-line').find('.help-block').hide()}, 9000);
    }
    if(birth_date == ''){
      fail = false;
      $('#birth_date').closest('.form-line').find('.help-block').show();
      setTimeout(function(){$('#birth_date').closest('.form-line').find('.help-block').hide()}, 9000);
    }
    if(last_name == ''){
      fail = false;
      $('#last_3').closest('.form-sub-label-container').find('.help-block').show();
      setTimeout(function(){$('#last_3').closest('.form-sub-label-container').find('.help-block').hide()}, 9000);
    }
    if(address == ''){
      fail = false;
      $('#input_34_addr_line1').closest('.form-sub-label-container').find('.help-block').show();
      setTimeout(function(){$('#input_34_addr_line1').closest('.form-sub-label-container').find('.help-block').hide()}, 9000);
    }
    return fail;
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
      $('#your_number').closest('.form-row').find('.help-block').html('Please enter required field');
      setTimeout(function(){$('#your_number').closest('.form-row').find('.help-block').hide()}, 4000);
      fail = false;
    }
    if(password == ''){
      $('#password').closest('.form-row').find('.help-block').show();
      $('#password').closest('.form-row').find('.help-block').html('Please enter required field');
      setTimeout(function(){$('#password').closest('.form-row').find('.help-block').hide()}, 4000);
      fail = false;
    }
    if($('#comfirm_password').val() == ''){
      $('#comfirm_password').closest('.form-row').find('.help-block').show();
      $('#comfirm_password').closest('.form-row').find('.help-block').html('Please enter required field');
      setTimeout(function(){$('#comfirm_password').closest('.form-row').find('.help-block').hide()}, 4000);
      fail = false;
    }
    if($('#term_and_condition').prop('checked') == false){
      $('#term_and_condition').closest('.form-row').find('.help-block').show();
      $('#term_and_condition').closest('.form-row').find('.help-block').html('Please tick the checkbox');
      setTimeout(function(){$('#term_and_condition').closest('.form-row').find('.help-block').hide()}, 4000);
      fail = false;
    }

    if(password != ''){
      if(password.length < 8){
        $('#password').closest('.form-row').find('.help-block').show();
        $('#password').closest('.form-row').find('.help-block').html('Password should be atleast 8 characters');
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
      $('#email').closest('.form-row').find('.help-block').html('Please enter required field');
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
