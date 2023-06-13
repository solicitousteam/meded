<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col pb-4">
                <h1 class="page-title print-hidden"><?php echo $page_title; ?></h1>
                <a href="<?php echo site_url('user/add_video_library'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mt-4"><i class="mdi mdi-plus"></i>Add New Video Library</a> 
            </div>
        </div>
    </div>
</section>
<div class="container card mb-5">
    <div class="table-responsive-sm mt-4">
            <table id="basic-datatable" class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                    <th>#</th>
                    <th><?php echo get_phrase('Title'); ?></th>
                     <th><?php echo get_phrase('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($video_library as $key => $user){                        
                    ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $user->library_name?></td>
                        <td>
                            <div class="dropright dropright">
                                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo site_url('user/add_library_video/'.$user->video_library_id); ?>">Add Video</a></li>
                                    <li><a class="dropdown-item" href="<?php echo site_url('user/edit_video_learning/'.$user->video_library_id); ?>"><?php echo get_phrase('edit'); ?></a></li>
                                    <!-- <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('home/webinar/delete/'.$user->id) ?>');"><?php echo get_phrase('delete'); ?></a></li> -->
                                    <li><a class="dropdown-item" href="<?php echo site_url('user/delete_video_learning/'.$user->video_library_id); ?>"><?php echo get_phrase('delete'); ?></a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
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