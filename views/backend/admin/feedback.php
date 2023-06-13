<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                  <img src="<?= base_url('uploads/checklist.png')?>" style="height: 44px; width: 44px;"alt="user-image"> &nbsp; Instructor Feedback
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
                <th>Course objectives stated clearly</th>
                <th>Instructor demonstrates adequate knowledge of course</th>
                <th>Instructor uses appropriate teaching methods</th>
                <th>Video Quality</th>
                <th>Content Presentation</th>
                <th>Overall Rating</th>
                <th>View</th>
            </tr>
        </thead>
    <?php 
if(!empty($categories))
{
       $i=0;
       foreach ($categories->result_array() as $category):
    ?>
    
    <tr>
        <td><?php echo $category['star1'] ?></td>
        <td><?php echo $category['star2'] ?></td>
        <td><?php echo $category['star3'] ?></td>
        <td><?php echo $category['star4'] ?></td>
        <td><?php echo $category['star5'] ?></td>
        <td><?php echo $category['rating'] ?></td>
        <td><a href="<?php echo base_url() ?>admin/view_feedback?id=<?php echo $category['id'] ?>">View</a></td>
    </tr>
    
    <?php endforeach; 
    
}?>
    
    </table>
    </div>
</div>