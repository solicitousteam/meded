<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> 
                  <img src="<?= base_url('uploads/checklist.png')?>" style="height: 44px; width: 44px;"alt="user-image"> &nbsp; Student Form
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="card">
    <div class="card-body">
    <table id="basic-datatable" class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Highest Qualification</th>
                <th>Have you used an Online learning platform before?</th>
                <th>What are you using this platform for?</th>
                <th>Are you interested more in Live classes or recorded classes?</th>
            </tr>
        </thead>
    <?php 
       $i=0;
       foreach ($categories->result_array() as $key => $category):
    ?>
    
    <tr>
        <td><?= $key + 1 ?></td>
        <td><?php echo $category['firstName'] ?> <?php echo $category['LastName'] ?></td>
        <td><?php echo $category['email'] ?></td>
        <td><?php echo $category['PhoneNumber'] ?></td>
        <td><?php echo $category['qualification'] ?></td>
        <td><?php echo $category['used_platform'] ?></td>
        <td><?php echo $category['using_portal_for'] ?></td>
        <td><?php echo $category['online_class'] ?></td>
    </tr>
    
    <?php endforeach; ?>
    
    </table>
    </div>
</div>