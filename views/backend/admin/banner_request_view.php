<style>.table-bordered td, .table-bordered th {
	white-space: nowrap;
	padding: 5px 9px;
}
.banner-request img {
	width: 40px;
}
.banner-request .btn {
	border-radius: 30px;
	min-width: auto;
	padding: 5px 10px;
	line-height: 15px;
	height: auto;
	padding-bottom: 10px !important;
}
.banner-request .table thead th {
	vertical-align: bottom;
	border-bottom: 2px solid #e3eaef;
	font-weight: bold !important;
	color: #FFF;
	background: #3d479a;
	padding: 11px 10px;
}
</style>

<div class="row ">
    <div class="col-xl-12">
 
                <h4 class="page-title"> 
                  <img src="<?= base_url('uploads/checklist.png')?>" style="height: 44px; width: 44px;"alt="user-image"> &nbsp; Banner Request
                </h4>
            </div> <!-- end card body-->

</div>
<div class="card mt-4">
    <div class="card-body banner-request">
        <div class="table-responsive">
    <table id="basic-datatable" class="table table-bordered table-responsive">
        <thead>
            <tr> 
                <th>Sr.No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Organisation</th>
                <th>Duration</th>
                <th>Website</th>
                <th>Concept</th>
                <th>Image</th>
                <th>Status</th>
                <th>View</th>
            </tr>
        </thead>
    <?php 
       $i=0;
       foreach ($categories->result_array() as $key => $category):
    ?>
    
    <tr>
        <td><?= $key + 1; ?></td>
        <td><?php echo $category['first_name'] ?></td>
        <td><?php echo $category['last_name'] ?></td>
        <td><a href="mailto: <?php echo $category['email'] ?>"><?php echo $category['email'] ?></a></td>
        <td><?php echo $category['phone'] ?></td>
        <td><?php echo $category['organisation'] ?></td>
        <td><?php echo $category['duration'] ?></td>
        <td><?php echo $category['website'] ?></td>
        <td><?php echo $category['concept'] ?></td>
        <td><img src="<?php echo $category['image']?>" width="100"></td>
        <td>
            <?php
            if($category['approved'] == 0){
                ?>
                <a href="<?php echo base_url() ?>/admin/banner_request_reject/<?php echo $category['id'] ?>"><button type="button" class="btn btn-danger">Reject</button></a>
                <a href="<?php echo base_url() ?>/admin/banner_request_approve/<?php echo $category['id'] ?>"><button type="button" class="btn btn-success">Approve</button></a>
                <?php
            }elseif($category['approved'] == 1){
                echo "Approved";
            }else{
                echo "Rejected";
            }
            ?>
        </td>
        <td><a href="<?php echo base_url() ?>/admin/banner_detail/<?php echo $category['id'] ?>">View</a></td>
    </tr>
    
    <?php endforeach; ?>
    
    </table>
</div>
    </div>
</div>