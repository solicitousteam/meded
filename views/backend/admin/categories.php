<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                  <img src="<?= base_url('uploads/checklist.png')?>" style="height: 44px; width: 44px;"alt="user-image">
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                <?php echo get_phrase('departments'); ?>
                  <a href="<?php echo site_url('admin/category_form/add_category'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_department'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <?php 
       $i=0;
       foreach ($categories->result_array() as $category):
        if($category['parent'] > 0)
         continue;
         $i++;
         $sub_categories = $this->crud_model->get_sub_categories($category['id']); ?>
         <div class="col-md-3 col-lg-3 col-xl-3 on-hover-action" id = "<?php echo $category['id']; ?>">
             <div class="card d-block">
                 <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/'.$category['thumbnail']); ?>" style="height:250px" alt="Card image cap">
                 <div class="card-body cat_<?=$i; ?>" style="padding-bottom:0px;text-align:center;">
                     <h4 class="card-title mb-0"><i class="<?php echo $category['font_awesome_class']; ?>"></i> <?php echo $category['name']; ?></h4>
                     <small style="font-style: italic;"><button class="btn btn-success view-subcategory-btn" value="<?= $category['id']?>" style="margin-top: 5px;text-transform: capitalize;"><?php echo count($sub_categories).' '.get_phrase('sub_departments'); ?></button></small>
                 </div>
                 <div class="card-body row">
                     <div class="col-md-6" style="padding:0px 3px;">
                         <a href = "<?php echo site_url('admin/category_form/edit_category/'.$category['id']); ?>" class="btn btn-icon btn-outline-info btn-sm" id = "category-edit-btn-<?php echo $category['id']; ?>" style="display: none;" style="margin-right:5px;">
                            <i class="mdi mdi-wrench"></i> <?php echo get_phrase('edit'); ?>
                        </a>
                    </div>
                     <div class="col-md-6" style="padding:0px 3px;">
                         <a href = "#" class="btn btn-icon btn-outline-danger btn-sm" id = "category-delete-btn-<?php echo $category['id']; ?>"style="float: right; display: none;" onclick="confirm_modal('<?php echo site_url('admin/categories/delete/'.$category['id']); ?>');" style="margin-right:5px;min-width:auto;">
                            <i class="mdi mdi-delete"></i> <?php echo get_phrase('delete'); ?>
                        </a>
                    </div>
                 </div> <!-- end card-body-->
             </div> <!-- end card-->
         </div>
    <?php endforeach; ?>
</div>



<!-- Scrollable modal -->
<div class="modal fade" id="category-view-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">Sub department List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ml-2 mr-2">
                <div class="row">
                    <div class="col-md-12 subcategory-list">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
    
    $(".view-subcategory-btn").click(function(){
        $.ajax({
           url:'<?= base_url('admin/getsubcategoryforview');?>', 
           method:'POST',
           data:{
               category_id:this.value
           },
           success: function(response){
               var json = JSON.parse(response);
               
               if(json.Status == 200)
               {
                   $('#category-view-modal').modal('show');
                   $('.subcategory-list').html(json.Data);
               }
           }
        });
    });
</script>
