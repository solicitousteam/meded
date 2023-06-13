<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                  <img src="<?= base_url()?>uploads/gift-card.png" style="height: 44px; width: 44px;"alt="user-image">
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                <?php echo get_phrase('Coupon'); ?>
                  <a href="<?php echo site_url('admin/coupon/add_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_coupon'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="table-responsive-sm mt-4">
        <table id="basic-datatable" class="table table-striped table-centered mb-0">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th><?php echo get_phrase('Code'); ?></th>
                    <th><?php echo get_phrase('Amount'); ?></th>
                    <th><?php echo get_phrase('Expiry'); ?></th>
                    <th><?php echo get_phrase('Status'); ?></th>
                    <th><?php echo get_phrase('actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($coupon as $key => $user): ?>
                <tr>
                    <td><?php echo $key+1;?></td>
                    <td><?php echo $user->code?></td>
                    <td>
                        <?php
                        if($user->coupon_type == 1){
                            echo "Rs.";
                        }
                        ?>
                        <?php echo $user->amount ?>
                        <?php
                        if($user->coupon_type == 2){
                            echo "%";
                        }
                        ?>
                    </td>
                    <td><?php echo $user->expiry_date ?></td>
                    <td>
                        <?php
                        if($user->status == 1){
                            echo "Active";
                        }else{
                            echo "Disabled";
                        }
                        ?>
                    </td>
                    <td>
                        <div class="dropright dropright">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo site_url('admin/coupon/edit_form/'.$user->id); ?>"><?php echo get_phrase('edit'); ?></a></li>
                                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/coupon/delete/'.$user->id) ?>');"><?php echo get_phrase('delete'); ?></a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script type="text/javascript">
    $('.on-hover-action').mouseenter(function() {
        var id = this.id;
        $('#subcat_list_'+id).show();
        $('#category-delete-btn-'+id).show();
        $('#category-edit-btn-'+id).show();
    });
    $('.on-hover-action').mouseleave(function() {
        var id = this.id;
        $('#subcat_list_'+id).hide();
        $('#category-delete-btn-'+id).hide();
        $('#category-edit-btn-'+id).hide();
    });
</script>
