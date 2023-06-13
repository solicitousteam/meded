
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                 <img src="<?= base_url('uploads/flag.png')?>" style="height: 44px; width: 44px;"alt="user-image">
                <?php echo get_phrase('banner'); ?>
                  <a href="<?php echo site_url('admin/banner/add_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_banner'); ?></a>
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
    $banner= $this->db->get('tbl_banner')->result_array() ;
    foreach ($banner as $banners):
       ?>
       
         <div class="col-md-6 col-lg-6 col-xl-4 on-hover-action">
             <div class="card d-block">
                 <img class="card-img-top col-md-10" src="<?php echo $banners['banner_img'];?>" alt="Card image cap">
                

                   
               <!-- end card-body-->
             </div> <!-- end card-->

           <center><button class="btn btn" style="background-color: #2f38ad;color:white;">  <a href = "<?php echo site_url('admin/banner/edit_form/'.$banners['banner_id']); ?>"  style="float: right; margin-right:5px;color:white">
                         <i class="mdi mdi-pencil" style="color:white;"></i> <?php echo get_phrase('edit'); ?>
            </a></button>


               <button class="btn btn" style="background-color: #f58220;color:white;"> 
                         <a href="#" style="float: right;margin-right:5px;color:white!important " onclick="return confirm_modal('<?php echo site_url('admin/banner/delete/'.$banners['banner_id']); ?>');">
                             <i class="mdi mdi-delete" style="color:white;"></i> <?php echo get_phrase('delete'); ?>
                         </a>
                </button>
                     </center>
                     <br>
                     <br>
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
