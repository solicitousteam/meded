<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title">
                    <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                    <img src="<?= base_url('uploads/refresh (1).png')?>" style="height: 44px; width: 44px;"
                        alt="user-image">
                    Courses Enrolled
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Courses Enrolled</h4>


                <div class="table-responsive-sm mt-4" style="width: 100%;">

                    <?php
                    $enrol_history  = $this->crud_model->courses_enrol_history($this->session->userdata('user_id'));
                    if (count($enrol_history->result_array()) > 0) : ?>
                    <table id="basic-datatable" class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">Sr.No</th>
                                <th class="text-center">Courses</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Number of Students</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($enrol_history->result_array() as $key => $enrol) :
                                    $course_data = $this->db->get_where('course', array('id' => $enrol['course_id']))->row_array(); ?>
                            <tr class="gradeU">
                                <td class="text-center"><?= $key+1;?></td>
                                <td class="text-center">
                                    <?= $course_data['title'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $this->crud_model->get_category_by_id($course_data['category_id'])['name'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $this->crud_model->count_enrol_history_by_course_id($enrol['course_id']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($enrol_history->result_array()) == 0) : ?>
                    <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;"
                            src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script type="text/javascript">
function update_date_range() {
    var x = $("#selectedValue").html();
    $("#date_range").val(x);
}
</script>