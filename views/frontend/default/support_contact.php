<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
    span.required{
        color:#ff0000;
    }
    
    .footer-area{
            margin-top: 300px !important;
    }
</style>
<section class="page-header-area my-course-area">
  <div class="container">
    <div class="row">
      <div class="col pb-4">
        <h1 class="page-title print-hidden"><?php echo $page_title; ?></h1>
      </div>
    </div>
  </div>
</section>
<section class="user-dashboard-area">
  <div class="container">
    <div class="card">
      <div class="card-body">
        <form class="required-form" action="<?php echo site_url('home/submit_support_contact'); ?>" method="post">
          <div class="content-box">
            <div class="basic-group">
             <div class="row">
                 <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-md-4">
                            <?php echo site_phrase('Name'); ?>
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-4">
                            <input class="form-control" placeholder="First Name" type="text" name="first_name" required>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" placeholder="Last Name" type="text" name="last_name" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-md-4">
                            <?php echo site_phrase('E-mail'); ?>
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <input class="form-control" placeholder="Email address" type="email" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-md-4">
                            <?php echo site_phrase('phone_number'); ?>
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-3">
                            <input class="form-control valid-countrycode" placeholder="Country code" type="number" name="area_code"   required>
                        </div>
                        <div class="col-md-5">
                            <input class="form-control valid-mobile" type="number" placeholder="Contact number"   name="phone_number" minlength="10" maxlength="10" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-md-4">
                            <?php echo site_phrase('How would you like to be contacted?'); ?>
                            <span class="required">*</span>
                            </label>
                        <div class="col-md-8">
                            <div class="row">
                                <label class="col-md-12 d-flex">
                                    <input class="form-control" type="radio" name="how_we_contacted" value="either phone or email" required style="width:7%;margin-top: 5px;">Either Phone or Email
                                </label>
                                <label class="col-md-12 d-flex">
                                    <input class="form-control" type="radio" name="how_we_contacted" value="by phone" required style="width:7%;margin-top: 5px;">By Phone
                                </label>
                                <label class="col-md-12 d-flex">
                                    <input class="form-control" type="radio" name="how_we_contacted" value="by email" required style="width:7%;margin-top: 5px;">By Email
                                </label>
                                <label class="col-md-12 d-flex">
                                    <input class="form-control" type="radio" name="how_we_contacted" value="by both" required style="width:7%;margin-top: 5px;">By Both
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-md-4">
                            <?php echo site_phrase("I'm Having Problem With:"); ?>
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-8">
                            <div class="row">
                                <label class="col-md-12 d-flex">
                                    <input class="form-control" type="radio" name="problem_with" value="payment" required style="width:7%;margin-top: 5px;">Payment
                                </label>
                                <label class="col-md-12 d-flex">
                                    <input class="form-control" type="radio" name="problem_with" value="refund" required style="width:7%;margin-top: 5px;">Refund
                                </label>
                                <label class="col-md-12 d-flex">
                                    <input class="form-control" type="radio" name="problem_with" value="support" required style="width:7%;margin-top: 5px;">Support
                                </label>
                                <label class="col-md-12 d-flex">
                                    <input class="form-control" type="radio" name="problem_with" value="subscription" required style="width:7%;margin-top: 5px;">Subscription
                                </label>
                                <label class="col-md-12 d-flex">
                                    <input class="form-control" type="radio" name="problem_with" value="other" required style="width:7%;margin-top: 5px;">Other(Please mention below)
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label class="col-md-12">
                            <?php echo site_phrase('Describe your problem'); ?>
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-12">  
                            <textarea class="form-control mt-2" rows="5" name="description" placeholder="Write your problem" required></textarea>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-update-box text-center">
            <button type="submit" class="btn">
            <?= site_phrase('submit'); ?>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<style>
    .card {
	    max-width: 700px;
	    margin: auto;
    }
    .user-dashboard-area .form-control {
         border-radius: 0px; 
    }
    </style>
    
    <script>
        $(".valid-mobile").keypress(function()
        {
            var val = $(this).val();
            if(val.length>9)
                return false;
            else
                return true;
        });
        $(".valid-countrycode").keypress(function()
        {
            var val = $(this).val();
            if(val.length>1)
                return false;
            else
                return true;
        });
        
        
    </script>