<?php
$user_data   = $this->user_model->get_user($this->session->userdata('user_id'))->row_array();
$paypal_keys = json_decode($user_data['paypal_keys'], true);
$stripe_keys = json_decode($user_data['stripe_keys'], true);
?>
<!-- start page title -->


<div class="row ">
  <div class="col-xl-12">
  
        <h4 class="page-title"> 
          <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>--> 
          <img src="https://ai24x7.com/uploads/payment.png" style="height: 35px; width: 30px;"alt="user-image"> <?php echo get_phrase('setup_payment_informations'); ?></h4>
      </div>
      <!-- end card body--> 
    </div>
    <!-- end card --> 
<!--<img src="https://ai24x7.com/uploads/Bannersmeded-05.jpg" style="height: 260px; width: 100%;"alt="user-image">-->
<div class="row pt-4">

      <div class="col-lg-6"><div class="card">
        <div class="card-body">
          <h4 class="header-title">
            <p><?php echo get_phrase('setup_paypal_settings'); ?></p>
          </h4>
          <form class="" action="<?php echo site_url('user/payout_settings/paypal_settings'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label><?php echo get_phrase('client_id').' ('.get_phrase('production').')'; ?></label>
              <input type="text" name="paypal_client_id" class="form-control" value="<?php echo $paypal_keys[0]['production_client_id']; ?>" required />
            </div>
            <div class="form-group">
              <label><?php echo get_phrase('secret_key').' ('.get_phrase('production').')'; ?></label>
              <?php if (isset($paypal_keys[0]['production_secret_key'])): ?>
              <input type="text" name="paypal_secret_key" class="form-control" value="<?php echo $paypal_keys[0]['production_secret_key']; ?>" required />
              <?php else: ?>
              <input type="text" name="paypal_secret_key" class="form-control" placeholder="<?php echo get_phrase('no_secret_key_found'); ?>" required />
              <?php endif; ?>
            </div>
            <div class="row justify-content-md-center">
              <div class="form-group col-md-6">
                <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_paypal_keys'); ?></button>
              </div>
            </div>
          </form>
        </div>
      </div></div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h4 class="header-title">
            <p><?php echo get_phrase('setup_stripe_settings'); ?></p>
          </h4>
          <form class="" action="<?php echo site_url('user/payout_settings/stripe_settings'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label><?php echo get_phrase('live_secret_key'); ?></label>
              <input type="text" name="stripe_secret_key" class="form-control" value="<?php echo $stripe_keys[0]['secret_live_key']; ?>" required />
            </div>
            <div class="form-group">
              <label><?php echo get_phrase('live_public_key'); ?></label>
              <input type="text" name="stripe_public_key" class="form-control" value="<?php echo $stripe_keys[0]['public_live_key']; ?>" required />
            </div>
            <div class="row justify-content-md-center">
              <div class="form-group col-md-6">
                <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_stripe_keys'); ?></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
