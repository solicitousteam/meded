<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                  <img src="<?= base_url('uploads/checklist.png')?>" style="height: 44px; width: 44px;"alt="user-image"> &nbsp; Support Request
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="card">
    <div class="card-body">
    <table id="basic-datatable" class="table table-striped table-centered mb-0 table-responsive">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Instructor/User</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Contact With</th>
                <th>Problem</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
    <?php 
       $i=0;

       foreach ($categories as $key => $category):
    ?>
    
    <tr>
        <td><?= ($key+1)?></td></td>
        <td>
        <?php
        $userdata = $this->db->select('role_id,is_instructor')->where('id',$category['user_id'])->get('users')->row();
        $type = (!empty($userdata)) ? (($userdata->role_id==2 && $userdata->is_instructor == 1) ? 'Instructor' : 'User') : '-'; 
        echo $type;
        ?>
        </td>
        <td><?php echo $category['name'] ?></td>
        <td><a href="mailto: <?php echo $category['email'] ?>"><?php echo $category['email'] ?></a></td>
        <td><?php echo $category['phone'] ?></td>
        <td><?= $category['how_we_contacted']?></td>
        <td>
        <?php 
        if($category['problem_with'] > 0)
        {
            switch( $category['problem'] ) {

                case 1: { echo "Payment"; break; }
                case 2: { echo "Refund";  break; }
                case 3: { echo "Support";  break; }
                case 4: { echo "Subscription"; break; }
                case 5: { echo "Other"; break;  }
            }
        }
        else
        {
            echo $category['problem_with'];
        }?>
        </td>
        <td><?php echo $category['description'] ?></td>
        <td>
            <div class="float-right dropright dropright">
                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/delete_support_request/'.$category['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                </ul>
            </div>
        </td>
    </tr>
    
    <?php endforeach; ?>
    
    </table>
    </div>
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
