<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                <img src="<?= base_url('uploads/man.png')?>" style="height: 44px; width: 44px;"alt="user-image">
                <?php echo $page_title; ?>
               
            </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('Subscription_list'); ?></h4>
                <form class="row " action="<?php echo site_url('admin/subscription'); ?>" method="get">
                    <!-- Course Categories -->
                    <div class="col-xl-4">
                    <?php 
                    $selected_plan = (!empty($_GET['subscription_plan_id'])) ? $_GET['subscription_plan_id']: 0;
                    $selected_subscription_status = (!empty($_GET['subscription_status'])) ? $_GET['subscription_status']: '';
                    $selected_payment_status = (!empty($_GET['subscription_payment_status'])) ? $_GET['subscription_payment_status']: '';
                    ?>    
                    
                        <div class="form-group">
                            <label for="subscription_plan_id"><?php echo get_phrase('Plan'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="subscription_plan_id"
                                id="subscription_plan_id">
                                <option value="all" selected>all</option>
                                <?php
                                $PlanData = $this->db->select('id,subscription_plan_name')->get('subscription_plan')->result();
                                foreach($PlanData as $planvalue)
                                {
                                    echo '<option value="'.$planvalue->id.'" '.(($selected_plan == $planvalue->id) ? ' selected ' : ' ').'>'.strtoupper($planvalue->subscription_plan_name).'</option>';    
                                }?>
                            </select>
                        </div>
                    </div>
                    <?php if(isset($_GET['all'])){?>
                    <input type="hidden" name="all">
                    <div class="col-xl-3">
                        <div class="form-group">
                           <label for="subscription_status"><?php echo get_phrase('plan_status'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="subscription_status"
                                id="subscription_status">
                                <option value="all" selected>all</option>
                                <option value="active" <?=  (($selected_subscription_status == 'active') ? ' selected ' : ' ')?>>Active</option>
                                <option value="deactive" <?=  (($selected_subscription_status == 'deactive') ? ' selected ' : ' ')?>>Deactive</option>
                            </select>
                        </div>
                    </div>
                    <?php }else{
                    echo '<input type="hidden" name="subscription_status" value="'.$_GET['subscription_status'].'">';
                    }?>
                    
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="subscription_payment_status"><?php echo get_phrase('payment_status'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="subscription_payment_status"
                                id="subscription_payment_status">
                                <option value="all" selected>all</option>
                                <option value="pending" <?=  (($selected_payment_status == 'pending') ? ' selected ' : ' ')?> >Pending</option>
                                <option value="cancel" <?=  (($selected_payment_status == 'cancel') ? ' selected ' : ' ')?> >Cancel</option>
                                <option value="confirm" <?=  (($selected_payment_status == 'confirm') ? ' selected ' : ' ')?> >Confirm</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xl-2">
                        <label for=".." class="text-white">..</label>
                        <button type="submit" class="btn btn-primary btn-block"
                            name="button"><?php echo get_phrase('filter'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <!--<h4 class="mb-3 header-title"><?php //echo get_phrase('Subscription'); ?></h4>-->
              <div class="table-responsive-sm mt-4">
                <table id="basic-datatable" class="table table-striped table-centered mb-0 table-responsive" style="display:inline-table">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Instructor</th>
                                <th>Plan</th>
                                <th>Price</th>
                                <th>Start Date</th>
                                <th>Expiry Date</th>
                                <th>Status</th>
                                <th>Payment Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        $array = array('1' => 1);
                        
                        if(!empty($_GET['subscription_status']) && $_GET['subscription_status'] != 'all')
                            $array['subscription_status'] = $_GET['subscription_status'];
                            
                        if(!empty($_GET['subscription_payment_status']) && $_GET['subscription_payment_status'] != 'all')
                            $array['subscription_payment_status'] = $_GET['subscription_payment_status'];
                            
                        if(!empty($_GET['subscription_plan_id']) && $_GET['subscription_plan_id'] != 'all')
                            $array['subscription_plan_id'] = $_GET['subscription_plan_id'];
                            
                        $Subscriptiondata = $this->db->select('users.first_name,users.last_name,subscription_plan.subscription_plan_name,subscription.*')
                                            ->from('subscription')->join('users','users.id=subscription.user_id')
                                            ->join('subscription_plan','subscription_plan.id=subscription.subscription_plan_id')
                                            ->where($array)->get()->result();
                                            
                        foreach($Subscriptiondata as $key => $value)
                        {
                            echo
                            '<tr>
                                <td>'.($key + 1).'</td>
                                <td>'.ucwords($value->first_name.' '.$value->last_name).'</td>
                                <td>'.ucwords($value->subscription_plan_name).'</td>
                                <td>'.$value->subscription_amount.'</td>
                                <td>'.date('d,M Y',strtotime($value->subscription_entry_date)).'</td>
                                <td>'.date('d,M Y',strtotime($value->subscription_expire_date)).'</td>
                                <td>'.ucwords($value->subscription_status).'</td>
                                <td>'.ucwords($value->subscription_payment_status).'</td>
                                <td>
                                    <div class="dropright dropright">
                                        <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="'.base_url("admin/subscriptionupdate/$value->id?s_status=".(($value->subscription_status == 'deactive') ? 'active' : 'deactive')).'">'.(($value->subscription_status == 'deactive') ? 'Active' : 'Deactive').' Now</a>
                                            </li>';
                                    if($value->subscription_payment_status == 'pending')
                                    {
                                        echo
                                            '<li>
                                                <a class="dropdown-item" href="'.base_url("admin/subscriptionupdate/$value->id?p_status=confirm").'">Confirm Subscription</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="'.base_url("admin/subscriptionupdate/$value->id?p_status=cancel").'">Cancel Subscription</a>
                                            </li>';
                                    }
                                    
                                    echo
                                        '</ul>
                                    </div>
                                </td>
                            </tr>';
                        }?>
                        </tbody>
                    </table>
              </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>