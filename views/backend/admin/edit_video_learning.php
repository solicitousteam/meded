<?php
$course_details = $this->crud_model->get_video_learning_by_id($course_id)->row_array();
// echo '<pre>';print_r($course_details);
?>
<style>
    .form-control:disabled, .form-control[readonly] {
    background-color: #e9ecef!important;
}
.p-mb-15{
    margin-bottom:15px;
    font-size:15px;
}
</style>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>
                    <?php echo get_phrase('update') . ': ' . $course_details['title']; ?>
                </h4>
                <p class="p-mb-15">➔ Video Learning courses (VL)(Only prerecorded video classes posted on the website for sale)</p>
                <p class="p-mb-15">➔ VL is designed for Instructors who would like to share knowledge via creating videos and use the MedEd platform to reach out to students and Earn through it.</p>
                <p class="p-mb-15">➔ Once the videos are subscribed to, the transaction communication ends there.</p>
                <p class="p-mb-15">➔ The video content limit here is 60 Min.</p>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="header-title my-1"><?php echo get_phrase('course_manager'); ?></h4>
                    </div>

                    <div class="col-md-6">
                        <a href="<?php echo site_url('admin/preview/' . $course_id); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm ml-1 my-1"
                            target="_blank"><?php echo get_phrase('view_on_frontend'); ?> <i
                                class="mdi mdi-arrow-right"></i> </a>

                        <a href="<?php echo site_url('admin/courses'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm my-1"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_course_list'); ?></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <form class="required-form"
                            action="<?php echo site_url('admin/course_actions/edit_video_learning/' . $course_id); ?>"
                            enctype="multipart/form-data" method="post">
                            <div id="basicwizard">

                                <ul class="nav nav-pills nav-justified form-wizard-header">
                                    <li class="nav-item">
                                        <a href="#basic" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-fountain-pen-tip"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('basic'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#objectives" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-currency-cny"></i>
                                            <span class="d-none d-sm-inline">Course Details</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#pricing" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-currency-cny"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('pricing'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#media" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-library-video"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('media'); ?></span>
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="#curriculum" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-library-video"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('curriculum'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('finish'); ?></span>
                                        </a>
                                    </li>
                                    <li class="w-100 bg-white pb-3">
                                        <!--ajax page loader-->
                                        <div class="ajax_loader w-100">
                                            <div class="ajax_loaderBar"></div>
                                        </div>
                                        <!--end ajax page loader-->
                                    </li>
                                </ul>

                                <div class="tab-content b-0 mb-0">
                                    <div class="tab-pane" id="basic">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="col-lg-12">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2" for="title"><?php echo get_phrase('course_title'); ?><span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="title" id="title" class="form-control tab-1" value="<?php echo $course_details['title']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2" for="description"><?php echo get_phrase('description'); ?><span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="description" id="description" class="form-control tab-1" value="<?php echo $course_details['description']; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="sub_category_id"><?php echo get_phrase('department'); ?><span
                                                                class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <select class="form-control select2 tab-1"
                                                                data-toggle="select2" name="sub_category_id"
                                                                id="sub_category_id" required>
                                                                <option value="">
                                                                    <?php echo get_phrase('select_a_department'); ?>
                                                                </option>
                                                                <?php foreach ($categories->result_array() as $category) : ?>
                                                                <optgroup
                                                                    label="<?php echo $category['name']; ?>">
                                                                    <?php $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                                                                        foreach ($sub_categories as $sub_category) : ?>
                                                                    <option
                                                                        value="<?php echo $sub_category['id']; ?>"
                                                                        <?php if ($sub_category['id'] == $course_details['sub_category_id']) echo 'selected'; ?>>
                                                                        <?php echo $sub_category['name']; ?>
                                                                    </option>
                                                                    <?php endforeach; ?>
                                                                </optgroup>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <small class="text-muted"><?php echo get_phrase('select_sub_department'); ?></small>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="course_title"><?php echo get_phrase('course_start_date'); ?>
                                                            <span class="required">*</span> </label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control tab-1 date" id="proposed_date" name="proposed_date" placeholder="<?php echo get_phrase('enter_course_title'); ?>"
                                                                required data-toggle="date-picker" data-min-date="<?= date('m/d/Y');?>" data-single-date-picker="true" value="<?= (!empty($course_details['proposed_date'])) ? date('m/d/Y',strtotime($course_details['proposed_date'])) : date('m/d/Y');?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="course_title"><?php echo get_phrase('course_end_date'); ?>
                                                            <span class="required">*</span> </label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control tab-1 date" id="end_date" name="end_date" placeholder="<?php echo get_phrase('enter_course_title'); ?>"
                                                                required data-toggle="date-picker" data-min-date="<?= date('m/d/Y');?>" data-single-date-picker="true" value="<?= (!empty($course_details['end_date'])) ? date('m/d/Y',strtotime($course_details['end_date'])) : date('m/d/Y');?>">
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="is_top_course" id="is_top_course" value="1"
                                                                    <?= ($course_details['is_top_course'] == 1) ? ' checked ' : ' '; ?>>
                                                                <label class="custom-control-label"
                                                                    for="is_top_course"><?php echo get_phrase('check_if_this_course_is_top_course'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="is_new_course" id="is_new_course" value="1"  <?= ($course_details['is_new_course'] == 1) ? ' checked ' : ' '; ?>>
                                                                <label class="custom-control-label"
                                                                    for="is_new_course"><?php echo get_phrase('check_if_this_course_is_new_course'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="is_self_course" id="is_self_course" value="1" <?= ($course_details['is_self_course'] == 1) ? ' checked ' : ' '; ?> >
                                                                <label class="custom-control-label"
                                                                    for="is_self_course"><?php echo get_phrase('check_if_this_course_is_self_study_course'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="is_featured_course" id="is_featured_course" value="1" <?= ($course_details['is_featured_course'] == 1) ? ' checked ' : ' '; ?>>
                                                                <label class="custom-control-label"
                                                                    for="is_featured_course"><?php echo get_phrase('check_if_this_course_is_is_featured'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <ul class="list-inline mb-0 wizard text-center">
                                                        <!--<li class="previous list-inline-item">-->
                                                        <!--    <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>-->
                                                        <!--</li>-->
                                                        <li class="list-inline-item">
                                                            <button type="button" class="btn btn-info" onclick="return verifyrequired('tab-1','objectives');"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- end tab pane -->
                                    

                                    <div class="tab-pane" id="objectives">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label" for="outcomes"><?php echo get_phrase('outcomes'); ?><span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <div id="outcomes_area">
                                                            <?php
                                                            if(count(json_decode($course_details['outcomes'])) > 0)
                                                            {
                                                                if(count(json_decode($course_details['outcomes'])) < 3)
                                                                {
                                                                    $left_div = 2 - count(json_decode($course_details['outcomes']));
                                                                    foreach(json_decode($course_details['outcomes']) as $out_value)
                                                                    {
                                                                        echo
                                                                        '<div class="d-flex mt-2">
                                                                            <div class="flex-grow-1 px-3">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control tab-2"
                                                                                        name="outcomes[]" id="outcomes" value="'.$out_value.'"
                                                                                        placeholder="'.get_phrase('provide_outcomes').'"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                    }
                                                                    
                                                                    // for($i = 1; $i <= $left_div; $i++)
                                                                    // {
                                                                    //     echo
                                                                    //     '<div class="d-flex mt-2">
                                                                    //         <div class="flex-grow-1 px-3">
                                                                    //             <div class="form-group">
                                                                    //                 <input type="text" class="form-control tab-3"
                                                                    //                     name="outcomes[]" id="outcomes" value=""
                                                                    //                     placeholder="'.get_phrase('provide_outcomes').'"
                                                                    //                     required>
                                                                    //             </div>
                                                                    //         </div>
                                                                    //     </div>';
                                                                    // }
                                                                    
                                                                    
                                                                    echo
                                                                    '<div class="d-flex mt-2">
                                                                        <div class="flex-grow-1 px-3">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control tab-2"
                                                                                    name="outcomes[]" id="outcomes"
                                                                                    placeholder="'.get_phrase('provide_outcomes').'"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <button type="button" class="btn btn-success btn-sm"
                                                                                name="button" onclick="appendOutcome()"> <i
                                                                                    class="fa fa-plus"></i> </button>
                                                                        </div>
                                                                    </div>';
                                                                }
                                                                else
                                                                {
                                                                    $out_num = 1;
                                                                    foreach(json_decode($course_details['outcomes']) as $out_value)
                                                                    {
                                                                        $btn_html = '';
                                                                        
                                                                        if($out_num == 3)
                                                                        {
                                                                            $btn_html = '<div class="">
                                                                                            <button type="button" class="btn btn-success btn-sm"
                                                                                                name="button" onclick="appendOutcome()"> <i
                                                                                                    class="fa fa-plus"></i> </button>
                                                                                        </div>';
                                                                        }
                                                                        if($out_num > 3)
                                                                        {
                                                                            $btn_html = '<div class="">
                                                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                                                style="margin-top: 0px;" name="button"
                                                                                                onclick="removeOutcome(this)"> <i
                                                                                                    class="fa fa-minus"></i> </button>
                                                                                        </div>';
                                                                        }
                                                                        
                                                                        $tab_class = ($out_num <= 3) ? ' tab-2' : '';
                                                                        echo
                                                                        '<div class="d-flex mt-2">
                                                                            <div class="flex-grow-1 px-3">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control '.$tab_class.'"
                                                                                        name="outcomes[]" id="outcomes" value="'.$out_value.'"
                                                                                        placeholder="'.get_phrase('provide_outcomes').'"
                                                                                        required>
                                                                                </div>
                                                                            </div>'.$btn_html.'
                                                                        </div>';
                                                                        $out_num++;
                                                                    }
                                                                }
                                                            }
                                                            else
                                                            {?>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control tab-2"
                                                                                name="outcomes[]" id="outcomes"
                                                                                placeholder="<?php echo get_phrase('provide_outcomes'); ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control tab-2"
                                                                                name="outcomes[]" id="outcomes"
                                                                                placeholder="<?php echo get_phrase('provide_outcomes'); ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control tab-2"
                                                                                name="outcomes[]" id="outcomes"
                                                                                placeholder="<?php echo get_phrase('provide_outcomes'); ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-success btn-sm"
                                                                            name="button" onclick="appendOutcome()"> <i
                                                                                class="fa fa-plus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }?>
                                                            <div id="blank_outcome_field" style="display:none">
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control "
                                                                                name="outcomes[]" id="outcomes"
                                                                                placeholder="<?php echo get_phrase('provide_outcomes'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-sm"
                                                                                style="margin-top: 0px;" name="button"
                                                                                onclick="removeOutcome(this)"> <i
                                                                                    class="fa fa-minus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="objectives"><?php echo get_phrase('objectives'); ?><span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <div id="objective_area">
                                                            <?php
                                                            if(count(json_decode($course_details['objectives'])) > 0)
                                                            {
                                                                if(count(json_decode($course_details['objectives'])) < 3)
                                                                {
                                                                    // $left_div = 2 - count(json_decode($course_details['outcomes']));
                                                                    foreach(json_decode($course_details['objectives']) as $obj_value)
                                                                    {
                                                                        echo
                                                                        '<div class="d-flex mt-2">
                                                                            <div class="flex-grow-1 px-3">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control tab-2"
                                                                                        name="objectives[]" id="objectives" value="'.$obj_value.'"
                                                                                        placeholder="'.get_phrase('provide_objective').'"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                    }
                                                                    
                                                                    // for($i = 1; $i <= $left_div; $i++)
                                                                    // {
                                                                    //     echo
                                                                    //     '<div class="d-flex mt-2">
                                                                    //         <div class="flex-grow-1 px-3">
                                                                    //             <div class="form-group">
                                                                    //                 <input type="text" class="form-control tab-3"
                                                                    //                     name="objectives[]" id="objectives" value=""
                                                                    //                     placeholder="'.get_phrase('provide_objective').'"
                                                                    //                     required>
                                                                    //             </div>
                                                                    //         </div>
                                                                    //     </div>';
                                                                    // }
                                                                    
                                                                    echo
                                                                    '<div class="d-flex mt-2">
                                                                        <div class="flex-grow-1 px-3">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control tab-2"
                                                                                    name="objectives[]" id="objectives"
                                                                                    placeholder="'.get_phrase('provide_objective').'"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <button type="button" class="btn btn-success btn-sm"
                                                                                name="button" onclick="appendObjective()"> <i
                                                                                    class="fa fa-plus"></i> </button>
                                                                        </div>
                                                                    </div>';
                                                                }
                                                                else
                                                                {
                                                                    $obj_num = 1;
                                                                    foreach(json_decode($course_details['objectives']) as $obj_value)
                                                                    {
                                                                        $btn_html = '';
                                                                        
                                                                        if($obj_num == 3)
                                                                        {
                                                                            $btn_html = '<div class="">
                                                                                            <button type="button" class="btn btn-success btn-sm"
                                                                                                name="button" onclick="appendObjective()"> <i
                                                                                                    class="fa fa-plus"></i> </button>
                                                                                        </div>';
                                                                        }
                                                                        if($obj_num > 3)
                                                                        {
                                                                            $btn_html = '<div class="">
                                                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                                                style="margin-top: 0px;" name="button"
                                                                                                onclick="removeObjectives(this)"> <i
                                                                                                    class="fa fa-minus"></i> </button>
                                                                                        </div>';
                                                                        }
                                                                        
                                                                        $tab_class = ($out_num <= 3) ? ' tab-2' : '';
                                                                        echo
                                                                        '<div class="d-flex mt-2">
                                                                            <div class="flex-grow-1 px-3">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control tab-2 '.$tab_class.'"
                                                                                        name="objectives[]" id="objectives" value="'.$obj_value.'"
                                                                                        placeholder="'.get_phrase('provide_objective').'"
                                                                                        required>
                                                                                </div>
                                                                            </div>'.$btn_html.'
                                                                        </div>';
                                                                        $obj_num++;
                                                                    }
                                                                }
                                                            }
                                                            else
                                                            {?>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control tab-2"
                                                                                name="objectives[]" id="objectives"
                                                                                placeholder="<?php echo get_phrase('provide_objective'); ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control tab-2"
                                                                                name="objectives[]" id="objectives"
                                                                                placeholder="<?php echo get_phrase('provide_objective'); ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control tab-2"
                                                                                name="objectives[]" id="objectives"
                                                                                placeholder="<?php echo get_phrase('provide_objective'); ?>"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button" class="btn btn-success btn-sm"
                                                                            name="button" onclick="appendObjective()"> <i
                                                                                class="fa fa-plus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            }?>
                                                            <div id="blank_objective_field" style="display:none">
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control "
                                                                                name="objectives[]" id="objectives"
                                                                                placeholder="<?php echo get_phrase('provide_objective'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                                class="btn btn-danger btn-sm"
                                                                                style="margin-top: 0px;" name="button"
                                                                                onclick="removeObjectives(this)"> <i
                                                                                    class="fa fa-minus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <ul class="list-inline mb-0 wizard text-center" style="margin-right: 200px;">
                                            <li class="previous list-inline-item">
                                                <a href="javascript:" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-info" onclick="return verifyrequired('tab-2','pricing');"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="tab-pane" id="pricing">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="form-group row mb-3">
                                                    <div class="offset-md-2 col-md-10">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="is_free_course" id="is_free_course" value="1"
                                                                <?php if ($course_details['is_free_course'] == 1) echo 'checked'; ?> onclick="check_checkbox('price')">
                                                            <label class="custom-control-label"
                                                                for="is_free_course"><?php echo get_phrase('check_if_this_is_a_free_course'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="paid-course-stuffs">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="price"><?php echo get_phrase('course_price') . ' (' . currency_code_and_symbol() . ')'; ?><span class="">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="number" class="form-control tab-3" id="price"
                                                                name="price" min="0" required oninput="course_amount_validation('price')"
                                                                placeholder="<?php echo get_phrase('enter_course_course_price'); ?>"
                                                                value="<?php echo $course_details['price']; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="discount_flag" id="discount_flag" value="1"
                                                                    <?php if ($course_details['discount_flag'] == 1) echo 'checked'; ?>>
                                                                <label class="custom-control-label"
                                                                    for="discount_flag"><?php echo get_phrase('check_if_this_course_has_discount'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="discounted_price"><?php echo get_phrase('discounted_course_price') . ' (' . currency_code_and_symbol() . ')'; ?><span class="">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="number" class="form-control tag-3" 
                                                                name="discounted_price" id="discounted_price" oninput="course_amount_validation('discounted_price')"
                                                                value="<?php echo $course_details['discounted_price']; ?>"
                                                                min="0">
                                                            <small
                                                                class="text-muted"><?php echo get_phrase('this_course_has'); ?>
                                                                <span id="discounted_percentage"
                                                                    class="text-danger">0%</span>
                                                                <?php echo get_phrase('discount'); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="list-inline mb-0 wizard text-center">
                                                    <li class="previous list-inline-item">
                                                        <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <button type="button" class="btn btn-info" onclick="pricevalidation();"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                                    </li>
                                                </ul>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- end tab-pane -->
                                    <div class="tab-pane" id="media">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2" for="course_thumbnail"><?php echo get_phrase('course_thumbnail'); ?><span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <input type="file" name="course_thumbnail" class="form-control" value="" type="image/*">
                                                    </div>
                                                </div>
                                                <?php 
                                                if(!empty($course_details['thumbnail']) && file_exists(str_replace(base_url(),'',$course_details['thumbnail']))){?>
                                                <div class="row">
                                                    <div class="col-md-4" style="margin-bottom:15px;">
                                                        <img src="<?= $course_details['thumbnail']?>" width="235">
                                                    </div>
                                                </div>
                                                <?php
                                                }?>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2" for="course_video"><?php echo get_phrase('course_video'); ?><span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <input type="file" name="course_video" class="form-control" value="" type="video/*">
                                                    </div>
                                                </div>
                                                <?php 
                                                if(!empty($course_details['video_url']) && file_exists(str_replace(base_url(),'',$course_details['video_url']))){?>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <video width="320" height="240" controls>
                                                            <source src="<?= $course_details['video_url']?>" >
                                                        </video>
                                                    </div>
                                                </div>
                                                <?php
                                                }?>
                                            </div>

                                        </div>
                                        <ul class="list-inline mb-0 wizard text-center" style="margin-right: 150px;">
                                            <li class="previous list-inline-item">
                                                <a href="javascript:" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <li class="next list-inline-item">
                                                <a href="javascript:" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-right-bold"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="tab-pane" id="curriculum">
                                        <?php
                                        /*
                                        if ($course_details['course_type'] == 'general') :
                                            include 'curriculum.php';
                                        elseif ($course_details['course_type'] == 'scorm' && addon_status('scorm_course') == true) :
                                            include 'scorm_curriculum.php';
                                        elseif ($course_details['course_type'] == 'scorm' && addon_status('scorm_course') != true) :
                                        ?>
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                <div class="alert alert-warning" role="alert">
                                                    <h4 class="alert-heading"><?= get_phrase('heads_up'); ?>!</h4>
                                                    <p><?= get_phrase('currently_the_scorm_course_addon_is_deactivate'); ?>.
                                                        <?= get_phrase('please_activate_the_scorm_course_addon_to_use_it'); ?>.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; 
                                        */
                                        $section_count = (!empty($sectiondata)) ? count($sectiondata) : 0;
                                        ?>
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                                                <div class="row course-curriculum-section">
                                                <?php
                                                if($section_count > 0)
                                                {
                                                    foreach($sectiondata as $sec_key => $sec_value)
                                                    {
                                                        echo
                                                        '<div id="section-column-'.$sec_key.'" class="col-xl-12 section-column-'.$sec_key.' section-division">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <button type="button" class="btn btn-danger float-right" onclick="removedivision(this)" removediv="section-column-'.$sec_key.'" style="padding: 2px 5px;min-width: fit-content">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                    </div>
                                                                <div class="col-xl-12 form-group">
                                                                    <label> Sr No:'.($sec_key + 1).').<br>Section Name</label>
                                                                    <input type="text" name="section['.$sec_key.']" value="'.$sec_value->title.'" class="form-control">
                                                                    <input type="hidden" name="section_ids['.$sec_key.']" value="'.$sec_value->id.'" class="form-control">
                                                                    <div id="section-lesson-'.$sec_key.'-division" class="col-xl-12 section-sub-division section-lesson-'.$sec_key.'-division">';
                                                                    foreach($sec_value->lessondata as $lec_key => $lec_value)
                                                                    {
                                                                        $lesson_type = trim(strtolower($lec_value->lesson_type));
                                                                        if($lesson_type != 'quiz')
                                                                        {
                                                                            echo
                                                                            '<div class="row sub-row-section sub-section-'.$sec_key.'-'.$lec_key.'">
                                                                                <input type="hidden" class="subcat-form-control" name="section_sub_name['.$sec_key.']['.$lec_key.']" value="lesson">
                                                                                <div class="col-xl-12">
                                                                                    <button type="button" class="btn btn-danger float-right" onclick="removedivision(this)" removediv="sub-section-'.$sec_key.'-'.$lec_key.'" style="padding: 2px 5px;min-width: fit-content">
                                                                                        <i class="fa fa-trash"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-xl-3 form-group">
                                                                                    <label>Lesson Type</label>
                                                                                    <select class="form-control" name="section_lesson_type['.$sec_key.']['.$lec_key.']" onchange="addlessoncontent(this)" mastervalue="'.$sec_key.'" subid="'.$lec_key.'">
                                                                                        <option value="">Not Selected</option>
                                                                                        <option '.(($lec_value->lesson_type == 'youtube') ? ' selected ' : '').' value="youtube">youtube</option>
                                                                                        <option '.(($lec_value->lesson_type == 'vimeo') ? ' selected ' : '').' value="vimeo">vimeo</option>
                                                                                        <option '.(($lec_value->lesson_type == 'video') ? ' selected ' : '').' value="video">video</option>
                                                                                        <option '.(($lec_value->lesson_type == 'html5') ? ' selected ' : '').' value="html5">html5</option>
                                                                                        <option '.(($lec_value->lesson_type == 'document') ? ' selected ' : '').' value="document">document</option>
                                                                                        <option '.(($lec_value->lesson_type == 'image') ? ' selected ' : '').' value="image">image</option>
                                                                                        <option '.(($lec_value->lesson_type == 'iframe') ? ' selected ' : '').' value="iframe">iframe</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-xl-9 form-group">
                                                                                    <label>Lesson Title</label>
                                                                                    <input type="text" class="form-control subcat-form-control" value="'.$lec_value->title.'" name="section_lesson_title['.$sec_key.']['.$lec_key.']" placeholder="enter lesson name">
                                                                                    <input type="hidden" name="section_lesson_id['.$sec_key.']" value="'.$sec_value->id.'" class="form-control">
                                                                                </div>
                                                                                <div class="col-xl-12">
                                                                                    <div class="row section-lesson-form-'.$sec_key.'-'.$lec_key.'">';
                                                                                    if(in_array($lesson_type,['youtube','vimeo']))
                                                                                    {
                                                                                        echo 
                                                                                        '<div class="col-xl-6 form-group">
                                                                                            <label>Video url( For web application )*</label>
                                                                                            <input type="text" class="form-control" name="lesson_form['.$sec_key.']['.$lec_key.'][video_url]" value="'.$lec_value->video_url.'">
                                                                                        </div>
                                                                                        <div class="col-xl-6 form-group">
                                                                                            <label>Duration( For web application )*</label>
                                                                                            <input type="text" class="form-control" name="lesson_form['.$sec_key.']['.$lec_key.'][duration]" data-toggle="timepicker" data-minute-step="5" data-show-meridian="false" value="'.$lec_value->duration.'">
                                                                                        </div>
                                                                                        <div class="col-xl-6 form-group">
                                                                                            <label>Lesson provider( For mobile application )*</label>
                                                                                            <input type="text" class="form-control" name="lesson_form['.$sec_key.']['.$lec_key.'][lesson_provider_for_mobile_application]">
                                                                                        </div>
                                                                                        <div class="col-xl-6 form-group">
                                                                                            <label>Video url( For mobile application )*</label>
                                                                                            <input type="text" class="form-control" name="lesson_form['.$sec_key.']['.$lec_key.'][html5_video_url_for_mobile_application]" value="'.$lec_value->video_url_for_mobile_application.'">
                                                                                        </div>
                                                                                        <div class="col-xl-6 form-group">
                                                                                            <label>Duration( For mobile application )*</label>
                                                                                            <input type="text" class="form-control" name="lesson_form['.$sec_key.']['.$lec_key.'][html5_duration_for_mobile_application]" data-toggle="timepicker" data-minute-step="5" data-show-meridian="false" value="'.$lec_value->duration_for_mobile_application.'">
                                                                                        </div>';
                                                                                    }
                                                                                    if($lesson_type == 'video')
                                                                                    {
                                                                                        echo
                                                                                        '<div class="col-xl-6 form-group">
                                                                                            <label>Upload system video file( For web and mobile application )*</label>
                                                                                            <input type="file" class="form-control" name="lesson_form['.$sec_key.']['.$lec_key.'][system_video_file]">
                                                                                            <small class="badge badge-primary">maximum_upload_size: 200M</small>
                                                                                            <small class="badge badge-primary">post_max_size: 200M</small>
                                                                                            <small class="badge badge-secondary">"post_max_size" Has to be bigger than "upload_max_filesize"</small>
                                                                                        </div>
                                                                                        <div class="col-xl-6 form-group">
                                                                                            <label>Duration( For web and mobile application )*</label>
                                                                                            <input type="text" class="form-control" value="'.$lec_value->duration.'" name="lesson_form['.$sec_key.']['.$lec_key.'][system_video_file_duration]" data-toggle="timepicker" data-minute-step="5" data-show-meridian="false">
                                                                                        </div>';
                                                                                    }
                                                                                    if($lesson_type == 'html5')
                                                                                    {
                                                                                        echo 
                                                                                        '<div class="col-xl-6 form-group">
                                                                                            <label>Video url( For web application )*</label>
                                                                                            <input type="text" class="form-control" name="lesson_form['.$sec_key.']['.$lec_key.'][html5_video_url]" value="'.$lec_value->video_url.'">
                                                                                        </div>
                                                                                        <div class="col-xl-6 form-group">
                                                                                            <label>Duration( For web application )*</label>
                                                                                            <input type="text" class="form-control" name="lesson_form['.$sec_key.']['.$lec_key.'][html5_duration]" data-toggle="timepicker" data-minute-step="5" data-show-meridian="false" value="'.$lec_value->duraiton.'">
                                                                                        </div>
                                                                                        <div class="col-xl-6 form-group">
                                                                                            <label>Thumbnail (The image size should be: 979 x 551)*</label>
                                                                                            <input type="file" class="form-control" name="lesson_form['.$sec_key.']['.$lec_key.'][thumbnail]">
                                                                                        </div>';
                                                                                    }
                                                                                    echo
                                                                                    '<div class="col-xl-6 form-group">
                                                                                            <label>Summary*</label>
                                                                                            <textarea class="form-control" name="lesson_form['.$sec_key.']['.$lec_key.'][summary]">'.$lec_value->summery.'</textarea>
                                                                                        </div> 
                                                                                    </div>
                                                                                </div>
                                                                            </div>';
                                                                        }
                                                                        if($lesson_type == 'quiz')
                                                                        {
                                                                            echo
                                                                            '<div class="row sub-row-section sub-section-'.$sec_key.'-'.$lec_key.'">
                                                                                <input type="hidden" class="subcat-form-control" name="section_sub_name['.$sec_key.']['.$lec_key.']" value="quiz">
                                                                                <div class="col-xl-12">
                                                                                    <button type="button" class="btn btn-danger float-right" onclick="removedivision(this)" removediv="sub-section-'.$sec_key.'-'.$lec_key.'" style="padding: 2px 5px;min-width: fit-content">
                                                                                        <i class="fa fa-trash"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-xl-12 form-group">
                                                                                    <label>Quiz Name</label>
                                                                                    <input class="form-control subcat-form-control" name="section_quiz_title['.$sec_key.']['.$lec_key.']" value="'.$lec_value->title.'" onchange="addlessoncontent(this)" mastervalue="'.$sec_key.'" subid="'.$lec_key.'">
                                                                                    <input type="hidden" name="section_quiz_id['.$sec_key.']" value="'.$sec_value->id.'" class="form-control">
                                                                                </div>
                                                                                <div class="col-xl-12 form-group">
                                                                                    <label>Quiz Instruction</label>
                                                                                    <textarea class="form-control" name="section_quiz_instruction['.$sec_key.']['.$lec_key.']">'.$lec_value->summary.'</textarea>
                                                                                </div>
                                                                                <div class="col-xl-12 section-quiz-question-'.$sec_key.'-'.$lec_key.'">
                                                                                    <div class="row quiz-que-'.$sec_key.'-'.$lec_key.'" style="margin:0px;">';
                                                                                    foreach($lec_value->questiondata as $que_key => $que_value)
                                                                                    {
                                                                                        echo
                                                                                        '<div class="col-xl-12 form-group ques-'.$sec_key.'-'.$lec_key.'-'.$que_key.' question-division" style="border: 1px solid #2d368e;margin: 5px 0px 0px 25px;border-radius: 5px;right: 25px;">
                                                                                            <label>Enter Question</label>
                                                                                            <input type="text" name="question_name['.$sec_key.']['.$lec_key.']['.$que_key.']" value="'.$que_value->title.'" class="form-control" placeholder="enter question name">
                                                                                            <input type="hidden" name="question_id['.$sec_key.']" value="'.$sec_value->id.'" class="form-control">
                                                                                            <div class="row quiz-ans-'.$sec_key.'-'.$lec_key.'-'.$que_key.'" style="padding-left: 25px;padding-top:10px;">';
                                                                                            $optionsdata = (!empty(json_decode($que_value->options))) ? json_decode($que_value->options) : [];
                                                                                            $count_options = (!empty($optionsdata)) ? count($optionsdata) : 0;
                                                                                            
                                                                                            $answerdata = (!empty(json_decode($que_value->correct_answers))) ? json_decode($que_value->correct_answers) : [''];
                                                                                            $correct_answer = (!empty($answerdata[0])) ? $answerdata[0] : '';
                                                                                            if($count_options > 0)
                                                                                            {
                                                                                                foreach($optionsdata as $opt_key => $opt_value)
                                                                                                {
                                                                                                    echo
                                                                                                    '<div class="col-xl-2 '.(($opt_key+1 > 1) ? "opt-$sec_key-$lec_key-$que_key-".($opt_key+1) : '').'" style="display: flex;justify-content: center;align-items: center;">
                                                                                                        <label>
                                                                                                            <input type="radio" name="correct_answer['.$sec_key.']['.$lec_key.']['.$que_key.']" '.(($correct_answer == ($opt_key+1)) ? ' checked ' : ' ').' value="'.($opt_key + 1).'"> Is Correct
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-xl-8 '.(($opt_key+1 > 1) ? "opt-$sec_key-$lec_key-$que_key-".($opt_key+1) : '').' form-group">
                                                                                                        <label>Option '.($opt_key + 1).'</label>
                                                                                                        <input type="text" name="question_option['.$sec_key.']['.$lec_key.']['.$que_key.']['.($opt_key + 1).']" value="'.$opt_value.'" class="form-control" placeholder="enter question name">
                                                                                                    </div>
                                                                                                    <div class="col-xl-2 '.(($opt_key+1 > 1) ? "opt-$sec_key-$lec_key-$que_key-".($opt_key+1) : '').'">';
                                                                                                    if($opt_key+1 > 1)
                                                                                                    {
                                                                                                        echo
                                                                                                        '<button class="btn btn-danger mt-3" onclick="removedivision(this)" removediv="opt-'.$sec_key.'-'.$lec_key.'-'.$que_key.'-'.($opt_key + 1).'">
                                                                                                            <i class="fa fa-trash"></i>
                                                                                                        </button>';
                                                                                                    }
                                                                                                    echo 
                                                                                                    '</div>';
                                                                                                }
                                                                                            }
                                                                                            echo 
                                                                                            '</div>
                                                                                                <button class="btn btn-warning float-left" appendclass="quiz-ans-'.$sec_key.'-'.$lec_key.'-'.$que_key.'" type="button" onclick="addoption(this)" mastervalue="'.$sec_key.'" quizvalue="'.$lec_key.'" quesvalue="'.$que_key.'" value="'.$count_options.'" style="margin: 5px 0px;">
                                                                                                <i class="fa fa-plus"></i> Add Option
                                                                                            </button>
                                                                                        </div>';
                                                                                    }
                                                                                    echo 
                                                                                    '</div>
                                                                                    <button class="btn btn-warning float-right" appendclass="quiz-que-'.$sec_key.'-'.$lec_key.'" type="button" onclick="addquestion(this)" mastervalue="'.$sec_key.'" quizvalue="'.$lec_key.'" value="'.$que_key.'" style="margin: 5px 0px;">
                                                                                        <i class="fa fa-plus"></i> Add Question
                                                                                    </button>
                                                                                </div>
                                                                            </div>';
                                                                        }
                                                                    }
                                                                    echo 
                                                                    '</div>
                                                                    <div class="float-right">
                                                                        <input type="hidden" value="<?= $section_count?>" class="section_sub_div_'.$sec_key.'" name="section_sub_div_'.$sec_key.'">
                                                                        <button class="btn btn-warning add-sub-box-btn" type="button" onclick="addsubsection(this)" mastervalue="'.$sec_key.'" subtype="lesson" value="<?= $section_count?>">
                                                                            <i class="fa fa-plus"></i> Add Lession
                                                                        </button>
                                                                        <button class="btn btn-warning add-sub-box-btn" type="button" onclick="addsubsection(this)" mastervalue="'.$sec_key.'" subtype="quiz" value="<?= $section_count?>">
                                                                            <i class="fa fa-plus"></i> Add Quiz
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                    }
                                                }?>
                                                </div>
                                                <div class="float-right">
                                                    <input type="hidden" value="<?= $section_count?>" name="section_div">
                                                    <input class="btn btn-success" type="hidden" value="<?= $section_count?>" name="total_section" id="total_section" >
                                                    <button class="btn btn-success" type="button" onclick="addsection(this.value)" value="<?= $section_count?>" id="add-section-btn" >
                                                        <i class="fa fa-plus"></i> Add New Section
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <ul class="list-inline mb-0 wizard text-center">
                                            <li class="previous list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <li class="next list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-right-bold"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="tab-pane" id="finish">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                    <h3 class="mt-0"><?php echo get_phrase("thank_you"); ?> !</h3>

                                                    <p class="w-75 mb-2 mx-auto">
                                                        <?php echo get_phrase('you_are_just_one_click_away'); ?></p>

                                                    <div class="mb-3 mt-3">
                                                        <button type="button" class="btn btn-primary text-center"
                                                            onclick="checkRequiredFields()"><?php echo get_phrase('submit'); ?></button>
                                                    </div>
                                                </div>

                                            </div> <!-- end col -->

                                        </div> <!-- end row -->
                                        <ul class="list-inline mb-0 wizard text-center">
                                            <li class="previous list-inline-item">
                                                <a href="javascript:" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <!--<li class="next list-inline-item">-->
                                            <!--    <a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-right-bold"></i> </a>-->
                                            <!--</li>-->
                                        </ul>
                                    </div>

                                </div>
                            </div>


                    </div> <!-- tab-content -->
                </div> <!-- end #progressbarwizard-->
                </form>
            </div>

        </div>

    </div> <!-- end card-body-->
</div> <!-- end card-->
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    initSummerNote(['#description']);
    togglePriceFields('is_free_course');
});
</script>

<script type="text/javascript">
var blank_outcome = jQuery('#blank_outcome_field').html();
var blank_objective = jQuery('#blank_objective_field').html();

jQuery(document).ready(function() {
    jQuery('#blank_outcome_field').hide();
    jQuery('#blank_objective_field').hide();
    calculateDiscountPercentage($('#discounted_price').val());
});

function appendOutcome() {
    jQuery('#outcomes_area').append(blank_outcome);
    // jQuery('#outcomes_area').append(blank_outcome.replace('class="form-control"', 'class="form-control tab-3"'));

    // $('input[name="outcomes[]"]').attr('required',true);
}

function removeOutcome(outcomeElem) {
    jQuery(outcomeElem).parent().parent().remove();
}

function appendObjective() {
     jQuery('#objective_area').append(blank_objective);
    // jQuery('#objective_area').append(blank_objective.replace('class="form-control"', 'class="form-control tab-3"'));
    
    // $('input[name="objectives[]"]').attr('required',true);
}

function removeObjective(outcomeElem) {
    jQuery(outcomeElem).parent().parent().remove();
}

function ajax_get_sub_category(category_id) {
    console.log(category_id);
    $.ajax({
        url: '<?php echo site_url('user/ajax_get_sub_category/'); ?>' + category_id,
        success: function(response) {
            jQuery('#sub_category_id').html(response);
        }
    });
}

function priceChecked(elem) {
    if (jQuery('#discountCheckbox').is(':checked')) {

        jQuery('#discountCheckbox').prop("checked", false);
    } else {

        jQuery('#discountCheckbox').prop("checked", true);
    }
}

function topCourseChecked(elem) {
    if (jQuery('#isTopCourseCheckbox').is(':checked')) {

        jQuery('#isTopCourseCheckbox').prop("checked", false);
    } else {

        jQuery('#isTopCourseCheckbox').prop("checked", true);
    }
}

function isFreeCourseChecked(elem) {

    if (jQuery('#' + elem.id).is(':checked')) {
        $('#price').prop('required', false);
        $('#price').removeClass('tab-3');
        $('#discounted_price').removeClass('tab-3');
    } else {
        $('#price').prop('required', true);
        $('#price').addClass('tab-3');
        $('#discounted_price').addClass('tab-3');
    }
}

function calculateDiscountPercentage(discounted_price) {
    if (discounted_price > 0) {
        var actualPrice = jQuery('#price').val();
        if (actualPrice > 0) {
            var reducedPrice = actualPrice - discounted_price;
            var discountedPercentage = (reducedPrice / actualPrice) * 100;
            if (discountedPercentage > 0) {
                jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2) + "%");

            } else {
                jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
            }
        }
    }
}

$('.on-hover-action').mouseenter(function() {
    var id = this.id;
    $('#widgets-of-' + id).show();
});
$('.on-hover-action').mouseleave(function() {
    var id = this.id;
    $('#widgets-of-' + id).hide();
});

/*13-04-2022 required fild test*/
function verifyrequired(tab, next_tab)
{
    $('.field-error').remove();
    var error = 0;
    $("." + tab).each(function() {
        
        if($(this).val().length <= 0)
        {
            var name = $("[for='"+$(this).attr('id')+"']").text().replace('*','');
            var parentdiv = $(this).parent().closest('div');
            
            $(parentdiv).append("<span class='text-danger d-block field-error'>"+name+" field is required.</span>");
            error++;
        }
    });

    if(error > 0)
    {   
        error_required_field();
        return false;
    }
    else
    {
        $('a[href="#' + next_tab + '"]').trigger('click');
    }
}

function pricevalidation()
{
    $('.field-error').remove();
    if(($('#is_free_course').is(':checked') == false) && (parseInt($('#price').val()) <= 0))
    {
        // alert('Invalid Course Price');
        var parentdiv = $('#price').parent().closest('div');
        $(parentdiv).append("<span class='text-danger d-block field-error'>Invalid Course Price.</span>");
        return false;
    }
    
    if($('#is_free_course').is(':checked') == true)
    {
        $('#price').val('0');
        $('#price').val('0');
    }
    
    verifyrequired('tab-3','media');
}

$(document).on('change','#discount_flag',function(){
   if($(this).is(":checked") == false){
       $('#discounted_price').val('0');
       $('#discounted_price').prop('disabled',true);
       $('#discounted_price').removeClass('tab-3');
   }else{
       $('#discounted_price').prop('disabled',false);
       $('#discounted_price').addClass('tab-3');
   }
   

});

</script>