<section class="page-header-area my-course-area">
    <div class="container">
        <div class="row">
            <div class="col pb-4">
                <h1 class="page-title print-hidden"><?php echo $page_title; ?></h1>
                <a href="<?php echo site_url('user/serial_learning/add_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle mt-4"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_serial_learning'); ?></a> 
            </div>
        </div>
    </div>
</section>
<div class="container mb-5">
    <div class="table-responsive-sm mt-4">
            <table id="basic-datatable" class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                    <th>#</th>
                    <th><?php echo get_phrase('Title'); ?></th>
                    <th><?php echo get_phrase('Topic'); ?></th>
                    <th><?php echo get_phrase('Description'); ?></th>
                    <th><?php echo get_phrase('Price'); ?></th>
                    <th><?php echo get_phrase('Actions'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($webinar as $key => $user){                        
                    ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $user->title?></td>
                        <td><?php echo $user->topic?></td>
                        <td><?php echo $user->description?></td>
                        <td><?php echo $user->price?></td>
                        <td>
                            <div class="dropright dropright">
                                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo site_url('user/serial_learning/edit_form/'.$user->id); ?>"><?php echo get_phrase('edit'); ?></a></li>
                                    <!-- <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('user/webinar/delete/'.$user->id) ?>');"><?php echo get_phrase('delete'); ?></a></li> -->
                                    <li><a class="dropdown-item" href="<?php echo site_url('user/serial_learning/delete/'.$user->id); ?>"><?php echo get_phrase('delete'); ?></a></li>
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