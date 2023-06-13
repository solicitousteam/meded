<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        
    </div>
</div>

<div class="row">
    <div class="col-xl-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('course_request'); ?></h4>
                <div class="table-responsive-sm mt-4">
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                 <th>Course</th>
                                <th>Course Description</th>
                                <th>Entry Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $instructor_id = $this->session->userdata('user_id');
                        $requestdata = $this->db->query("SELECT users.first_name,users.last_name,tbl_course_request.instructor_id,tbl_course_request.course_desc,tbl_course_request.added_on FROM tbl_course_request INNER JOIN users ON users.id=tbl_course_request.user_id")->result();
                        if(!empty($requestdata))
                        {
                            foreach($requestdata as $key => $value)
                            {
                                $requestdata2 = $this->db->query("SELECT * FROM category WHERE id = '$value->instructor_id'")->row();
                                echo 
                                '<tr>
                                    <td>'.($key + 1).'</td>
                                    <td>'.$value->first_name.' '.$value->last_name.'</td>
                                    <td>'.
                                   
                                   $requestdata2->name

                                    .'</td>
                                    <td>'.$value->course_desc.'</td>
                                    <td>'.date('d, M y h:i',strtotime($value->added_on)).'</td>
                                </tr>';
                            }
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function update_date_range()
{
    var x = $("#selectedValue").html();
    $("#date_range").val(x);
}
</script>
<style>.card.text-white {
	border-radius: 25px;
	margin-top: 28px;
}</style>
