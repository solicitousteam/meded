<style>
    .btn {
    border-radius: 30px;
    min-width: 40px;
    margin: 5px 5px;
}
</style>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                 <img src="<?= base_url('uploads/flag.png')?>" style="height: 44px; width: 44px;"alt="user-image">
                Library
                  <a href="<?php echo site_url('user/library/add_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_in_library'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <table class="table">
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <?php 
    $UserID = $this->session->userdata('user_id');
    $banner= $this->db->where("instructor", $UserID)->get('library')->result_array();
    foreach ($banner as $banners):
       ?>
         <div class="col-md-6 col-lg-6 col-xl-4 on-hover-action">
             <div class="card d-block p-1">
                 <h3><center><a href="<?php echo $banners['file'];?>" target="_blank"><?php echo $banners['title'] ?></a></center></h3><br>
                 <a href = "<?php echo $banners['file'];?>"  style="float: right; margin-right: 10px; "><button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><i class="mdi mdi-details"></i> <?php echo get_phrase('view'); ?></button></a>
                 <a href = "<?php echo site_url('user/library/edit_form/'.$banners['id']); ?>"  style="float: right; margin-right: 10px;"><button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><i class="mdi mdi-pencil"></i> <?php echo get_phrase('edit'); ?></button></a>
                <a href="#" style="float: right; margin-right: 10px; " onclick="return confirm_modal('<?php echo site_url('user/library/delete/'.$banners['id']); ?>');" style="margin-right:5px;"><button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><i class="mdi mdi-delete"></i> <?php echo get_phrase('delete'); ?></button></a>
                <div style="clear: both"></div>
             </div>
         </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript">
    $('.on-hover-action').mouseenter(function() {
        var id = this.id;
        $('#category-delete-btn-'+id).show();
        $('#category-edit-btn-'+id).show();
    });
    $('.on-hover-action').mouseleave(function() {
        var id = this.id;
        $('#category-delete-btn-'+id).hide();
        $('#category-edit-btn-'+id).hide();
    });
</script>
