<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    List of Registered Instructor</h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    
   
    
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                
                
         
     
     
    
                <h4 class="mb-3 header-title">List of Registered Instructor</h4>
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#pending-b1" id="1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                            <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block">Pending </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#approved-b1" id="2" data-toggle="tab" aria-expanded="true" class="nav-link  ">
                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block">Approved</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#rejected-b1" id="3" data-toggle="tab" aria-expanded="true" class="nav-link">
                            <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                            <span class="d-none d-lg-block">Rejected</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane show active" id="pending-b1">
                        <div class="table-responsive-sm mt-4">
                            <table id="pending-application" class="basic-datatable table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th><?php echo get_phrase('name'); ?></th>
                                        <th><?php echo get_phrase('email'); ?></th>
                                        <!--<th>Biography</th>-->
                                        <th>Mobile</th>
                                        <th><?php echo get_phrase('status'); ?></th>
                                        <th><?php echo get_phrase('action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pendings->result_array() as $key => $pending) :
                                    ?>
                                    <tr class="gradeU">
                                        <td>
                                            <?php echo ++$key; ?>
                                        </td>
                                        <td>
                                            <?php echo $pending['first_name'] . ' ' . $pending['last_name'] ?>
                                        </td>
                                        <td><?= $pending['email'] ?></td>
                                        <!--<td><?= wordwrap($pending['biography'], '80', '<br>') ?></td>-->
                                        <td><?= $pending['mobile'] ?></td>

                                        <td style="text-align: center;">
                                            <?php if ($pending['admin_verified'] == 0) : ?>
                                            <div class="badge badge-danger"><?php echo get_phrase('pending'); ?></div>
                                            <?php elseif ($pending['admin_verified'] == 1) : ?>
                                            <div class="badge badge-success"><?php echo get_phrase('approved'); ?></div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="dropright dropright">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-primary btn-rounded btn-icon"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="<?= base_url('admin/instructor_detail/'.$pending['id']);?>">
                                                            <?php echo get_phrase('view_detail'); ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"
                                                            onclick="confirm_modal('<?php echo site_url(); ?>admin/approve_intructor/<?php echo $pending['id']; ?>');">
                                                            <?php echo get_phrase('approve'); ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#"
                                                            onclick="confirm_modal('<?php echo site_url(); ?>admin/reject_instructor/<?php echo $pending['id']; ?>');">
                                                            Reject
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="approved-b1">
                        <div class="table-responsive-sm mt-4">
                            <table id="approved-application" class="basic-datatable table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th><?php echo get_phrase('name'); ?></th>
                                        <th><?php echo get_phrase('email'); ?></th>
                                        <!--<th>Biography</th>-->
                                        <th>Mobile</th>
                                        <th><?php echo get_phrase('status'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($approveds->result_array() as $key => $approved) :
                                    ?>
                                    <tr class="gradeU">
                                        <td>
                                            <?php echo ++$key; ?>
                                        </td>
                                        <td>
                                            <?php echo $approved['first_name'] . ' ' . $approved['last_name'] ?>
                                        </td>
                                        <td><?= $approved['email'] ?></td>
                                        <!--<td><?= wordwrap($approved['biography'], '80', '<br>') ?></td>-->
                                        <td><?= $approved['mobile'] ?></td>

                                        <td style="text-align: center;">
                                            <div class="badge badge-success"><?php echo get_phrase('approved'); ?></div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="rejected-b1">
                        <div class="table-responsive-sm mt-4">
                            <table id="rejected-application" class="basic-datatable table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th><?php echo get_phrase('name'); ?></th>
                                        <th><?php echo get_phrase('email'); ?></th>
                                        <!--<th>Biography</th>-->
                                        <th>Mobile</th>
                                        <th><?php echo get_phrase('status'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($rejected->result_array() as $key => $approved) :
                                    ?>
                                    <tr class="gradeU">
                                        <td>
                                            <?php echo ++$key; ?>
                                        </td>
                                        <td>
                                            <?php echo $approved['first_name'] . ' ' . $approved['last_name'] ?>
                                        </td>
                                        <td><?= $approved['email'] ?></td>
                                        <!--<td><?= wordwrap($approved['biography'], '80', '<br>') ?></td>-->
                                        <td><?= $approved['mobile'] ?></td>

                                        <td style="text-align: center;">
                                            <div class="badge badge-danger" style="padding: 10px;font-weight:bolder">
                                                Rejected</div>
                                        </td>
                                    </tr>
                                    <?php endforeach;  ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.basic-datatable').dataTable(); 
    // initDataTable('pending-application',10);
    // , '#approved-application', '#rejected-application']);
    
   
    
  
    
    
});
</script>



          <?php 
     
   $data =  $this->uri->segment(3); 
    
   
     if($data == 'approve')
   {
       
       ?>
    <script>
    $(document).ready(function() {
 
       document.getElementById("2").click();
     
    });
     </script>
     <?php
    
   }
   
   
   
   if($data == 'reject')
   {
       
       ?>
    <script>
    $(document).ready(function() {
 
       document.getElementById("3").click();
     
    });
     </script>
     <?php
    
   }
   
   
   
     
     ?>