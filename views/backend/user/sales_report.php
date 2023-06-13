<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
         <h4 class="page-title"> 
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
               <img src="<?= base_url();?>uploads/clipboard.png" style="height: 34px; width: 30px;"alt="user-image"> 
                <?php echo get_phrase('sales_report'); ?></h4> <!-- end card -->
    </div><!-- end col-->
</div>
<!--<img src="https://ai24x7.com/uploads/Bannersmeded-03.jpg" style="height: 260px; width: 100%;"alt="user-image">-->
<div class="row pt-4">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('sales_report'); ?></h4>
                <form class="form-inline" action="<?php echo site_url('user/sales_report/filter_by_date_range') ?>" method="get">
                        <div class="row">    <div class="col-xl-10">
                                <div class="form-group">
                                    <div id="reportrange" class="form-control" data-toggle="date-picker-range" data-target-display="#selectedValue"  data-cancel-class="btn-light" style="width: 100%;">
                                        <i class="mdi mdi-calendar"></i>&nbsp;
                                        <span id="selectedValue"><?php echo date("F d, Y" , $timestamp_start) . " - " . date("F d, Y" , $timestamp_end);?></span> <i class="mdi mdi-menu-down"></i>
                                    </div>
                                    <input id="date_range" type="hidden" name="date_range" value="<?php echo date("d F, Y" , $timestamp_start) . " - " . date("d F, Y" , $timestamp_end);?>">
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <button type="submit" class="btn btn-info" id="submit-button" onclick="update_date_range();"> <?php echo get_phrase('filter');?></button>
                            </div></div>
                        </form>

                <div class="table-responsive-sm mt-4">
                    <table id="sales-report-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('course_name'); ?></th>
                                <th><?php echo get_phrase('instructor_revenue'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payment_history as $payment):
                                $course_data = $this->db->get_where('course', array('id' => $payment['course_id']))->row_array();
                                $user_data = $this->db->get_where('users', array('id' => $payment['user_id']))->row_array();?>
                                <tr class="gradeU">
                                    <td>
                                        <strong><a href="<?php echo site_url('home/course/'.rawurlencode(slugify($course_data['title'])).'/'.$course_data['id']); ?>" target="_blank"><?php echo $course_data['title']; ?></a></strong><br>
                                        <small class="text-muted">
                                            <strong><?php echo get_phrase('enrolled_user'); ?></strong>: <?php echo $user_data['first_name'].' '.$user_data['last_name']; ?>
                                        </small><br>
                                        <small class="text-muted"><strong><?php echo get_phrase('enrolment_date').'</strong>: '.date('D, d-M-Y h:i:s', $payment['date_added']); ?></small>
                                    </td>
                                    <td>
                                        <?php echo currency($payment['instructor_revenue']); ?><br>
                                        <small class="text-muted"><strong><?php echo get_phrase('total_amount').'</strong>: '.currency($payment['amount']); ?></small>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script type="text/javascript">
function update_date_range()
{
    var x = $("#selectedValue").html();
    $("#date_range").val(x);
}

$(document).ready(function() {
      $('#sales-report-datatable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
   // initDataTable(["#sales-report-datatable"], 50);
});
</script>

<style>#reportrange {
	border-radius: 30px;
}</style>
