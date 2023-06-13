

<link href="<?php echo base_url('assets/frontend/default/css/main.css') ?>" rel="stylesheet" type="text/css" />
<style>
.course-sidebar {
    /*margin-top: -185px;*/
    margin-top: -140px;
}

.btn {
    color: #2d368e;
    background-color: white;
}
.mb-15{
    margin-bottom:15px;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #e9ecef!important;
}
.pre-price-div{
    display: flex!important;
}
.pre-price-div span{
    font-size: 33px;
    font-weight: 600;
    color: #000000;
}
.pre-price-div strike{
    font-size: 20px;
    line-height: 2.3;
    font-weight: 100;
    padding: 0px 10px;
    color:#6c757d;
}
.pre-price-div label{
    font-size: 18px;
    line-height: 2.4;
    font-weight: 100;
    padding: 0px 0px;
    letter-spacing: 0px;
    color:#6c757d;
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
                <h4 class="page-title">
                    <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                    <img src="<?= base_url();?>uploads/online-learning.png"
                        style="height: 34px; width: 30px;" alt="user-image">
                    <?php echo get_phrase('Video Learning'); ?>
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

                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo site_url('admin/courses'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm my-1"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_course_list'); ?></a>

                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <form action="<?= base_url(); ?>admin/video_learning_add" class="required-form" enctype="multipart/form-data"
                            method="POST">
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
                                        <a href="#preview" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2"
                                            id="preview_tab" onclick="getpreviewdata(0);">
                                            <i class="mdi mdi-tag-multiple"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('preview'); ?></span>
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
                                                            <input required type="text" name="title" id="title"
                                                            class="form-control tab-1" value="" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2" for="description"><?php echo get_phrase('description'); ?><span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                        <input required type="text" name="description"
                                                            id="description" class="form-control tab-1" value="" required>
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
                                                                        value="<?php echo $sub_category['id']; ?>">
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
                                                                required data-toggle="date-picker" data-min-date="<?= date('m/d/Y');?>" data-single-date-picker="true" value="<?= date('m/d/Y');?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="course_title"><?php echo get_phrase('course_end_date'); ?>
                                                            <span class="required">*</span> </label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control tab-1 date" id="end_date" name="end_date" placeholder="<?php echo get_phrase('enter_course_title'); ?>"
                                                                required data-toggle="date-picker" data-min-date="<?= date('m/d/Y');?>" data-single-date-picker="true" value="<?= date('m/d/Y');?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="is_top_course" id="is_top_course" value="1">
                                                                <label class="custom-control-label"
                                                                    for="is_top_course"><?php echo get_phrase('check_if_this_course_is_top_course'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="is_new_course" id="is_new_course" value="1">
                                                                <label class="custom-control-label"
                                                                    for="is_new_course"><?php echo get_phrase('check_if_this_course_is_new_course'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="is_self_course" id="is_self_course" value="1">
                                                                <label class="custom-control-label"
                                                                    for="is_self_course"><?php echo get_phrase('check_if_this_course_is_self_study_course'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="is_featured_course" id="is_featured_course" value="1">
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
                                                    <label class="col-md-2 col-form-label" for="objectives"><?php echo get_phrase('objectives'); ?><span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <div id="objective_area">
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input required type="text" class="form-control tab-2"
                                                                            name="objectives[]" id="objectives"
                                                                            placeholder="<?php echo get_phrase('objectives'); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input required type="text" class="form-control tab-2"
                                                                            name="objectives[]" id="objectives"
                                                                            placeholder="<?php echo get_phrase('objectives'); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input required type="text" class="form-control tab-2"
                                                                            name="objectives[]" id="objectives"
                                                                            placeholder="<?php echo get_phrase('objectives'); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-success btn-sm"
                                                                        name="button" onclick="appendObjective()"> <i
                                                                            class="fa fa-plus"></i> </button>
                                                                </div>
                                                            </div>
                                                            <div id="blank_objective_field">
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="objectives[]" id="objectives"
                                                                                placeholder="<?php echo get_phrase('objectives'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            style="margin-top: 0px;" name="button"
                                                                            onclick="removeObjective(this)"> <i
                                                                                class="fa fa-minus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="outcomes"><?php echo get_phrase('outcomes'); ?><span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <div id="outcomes_area">
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input required type="text" class="form-control tab-2"
                                                                            name="outcomes[]" id="outcomes"
                                                                            placeholder="<?php echo get_phrase('provide_outcomes'); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input required type="text" class="form-control tab-2"
                                                                            name="outcomes[]" id="outcomes"
                                                                            placeholder="<?php echo get_phrase('provide_outcomes'); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input required type="text" class="form-control tab-2"
                                                                            name="outcomes[]" id="outcomes"
                                                                            placeholder="<?php echo get_phrase('provide_outcomes'); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-success btn-sm"
                                                                        name="button" onclick="appendOutcome()"> <i
                                                                            class="fa fa-plus"></i> </button>
                                                                </div>
                                                            </div>
                                                            <div id="blank_outcome_field">
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
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
                                                        <ul class="list-inline mb-0 wizard text-center"
                                                            style="margin-right: 200px;">
                                                            <li class="previous list-inline-item">
                                                                <a href="javascript::" class="btn btn-info"> <i
                                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <button type="button" class="btn btn-info" onclick="return verifyrequired('tab-2','pricing');"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="pricing">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="form-group row mb-3">
                                                    <div class="offset-md-2 col-md-10">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input price_change"
                                                                name="is_free_course" id="is_free_course" onclick="check_checkbox('price')">
                                                            <label class="custom-control-label"
                                                                for="is_free_course"><?php echo get_phrase('check_if_this_is_a_free_course'); ?></label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="paid-course-stuffs">
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="price"><?php echo get_phrase('course_price') . ' (' . currency_code_and_symbol() . ')'; ?><span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="number" class="form-control price_change tab-3" id="price"
                                                                name="price" required oninput="course_amount_validation('discounted_price')" 
                                                                placeholder="<?php echo get_phrase('enter_course_course_price'); ?>"
                                                                min="0" value="0">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input price_change"
                                                                    name="discount_flag" id="discount_flag" onclick="check_checkbox('discounted_price')">
                                                                <label class="custom-control-label"
                                                                    for="discount_flag"><?php echo get_phrase('check_if_this_course_has_discount'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="discounted_price"><?php echo get_phrase('discounted_course_price') . ' (' . currency_code_and_symbol() . ')'; ?><span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="number" class="form-control price_change tab-3" required
                                                                name="discounted_price" id="discounted_price" oninput="course_amount_validation('discounted_price')"
                                                                min="0" value="0" disabled>
                                                            <small
                                                                class="text-muted"><?php echo get_phrase('this_course_has'); ?>
                                                                <span id="discounted_percentage"
                                                                    class="text-danger">0%</span>
                                                                <?php echo get_phrase('discount'); ?></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <ul class="list-inline mb-0 wizard text-center">
                                            <li class="previous list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-info" onclick="pricevalidation();"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                            </li>
                                        </ul>
                                    </div> <!-- end tab-pane -->
                                    <div class="tab-pane" id="media">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2" for="thubmnail"><?php echo get_phrase('course_thumbnail'); ?><span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <input required type="file" name="course_thumbnail" id="thubmnail"
                                                        multiple class="form-control tab-4" value="" accept="image/*">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2" for="video"><?php echo get_phrase('course_video'); ?><span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <input  type="file" name="course_video" id='video' class="form-control tab-4" accept="video/*" value="" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <ul class="list-inline mb-0 wizard text-center" style="margin-right: 150px;">
                                            <li class="previous list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-info" onclick="return verifyrequired('tab-4','curriculum');"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--start preview-->
                                    <div class="tab-pane" id="curriculum">
                                        <div class="row justify-content-center">
                                        <?php 
                                        $file['course_id'] = 0;
                                        $this->load->view('backend/curriculum_form',$file);
                                        ?>
                                        </div>
                                        <!-- end row -->
                                        <ul class="list-inline mb-0 wizard text-center">
                                            <li class="previous list-inline-item">
                                                <a href="javascript::" class="btn btn-info">
                                                    <i class="mdi mdi-arrow-left-bold"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript:void(0);" onclick="return verifyrequired('tab-curriculum','preview');" class="btn btn-info">
                                                    <i class="mdi mdi-arrow-right-bold"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="preview">
                                        <section class="course-header-area">
                                            <div class="container">
                                                <div class="row align-items-end">
                                                    <div class="col-lg-8">
                                                        <div class="course-header-wrap">
                                                            <h1 class="title" id="pre_course_title"></h1>
                                                            <p class="subtitle" id="pre_short_description"></p>
                                                            <div class="rating-row">
                                                                <span class="course-badge best-seller"
                                                                    id="pre_level"></span>
                                                            </div>
                                                            <div class="created-row">
                                                                <span class="created-by">
                                                                    <?php echo site_phrase('created_by'); ?>
                                                                    <?php
                                                                    $logged_in_user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
                                                                    ?>

                                                                    <a
                                                                        href="<?php echo site_url('home/instructor_page/' . $course_details['user_id']); ?>"><?php echo $logged_in_user_details['first_name'] . ' ' . $logged_in_user_details['last_name']; ?></a>
                                                                </span>
                                                                <span
                                                                    class="last-updated-date"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y'); ?></span>
                                                                <span class="comment"><i
                                                                        class="fas fa-comment"></i><?php echo ucfirst($course_details['language']); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4"></div>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="course-content-area">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <div class="what-you-get-box">
                                                            <div class="what-you-get-title text-center">
                                                                Course Details</div>
                                                            <div class="what-you-get-title">
                                                                <?php echo site_phrase('Outcomes'); ?></div>
                                                            <ul class="what-you-get__items" id="pre_objectives">

                                                            </ul>
                                                            <br>
                                                            <?php if ($course_details['course_type'] == 'general') : ?>
                                                            <div class="course-curriculum-box">
                                                                <div class="course-curriculum-title clearfix">
                                                                    <div class="title float-left">
                                                                        <?php echo site_phrase('curriculum_for_this_course'); ?>
                                                                    </div>
                                                                    <div class="float-right">
                                                                        <span class="total-lectures">
                                                                            <?php echo $this->crud_model->get_lessons('course', $course_details['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                                                        </span>
                                                                        <span class="total-time">
                                                                            <?php
                                                                                echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']);
                                                                                ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="course-curriculum-accordion">
                                                                    <?php
                                                                        $sections = $this->crud_model->get_section('course', $course_id)->result_array();
                                                                        $counter  = 0;
                                                                        foreach ($sections as $section) : ?>
                                                                    <div class="lecture-group-wrapper">
                                                                        <div class="lecture-group-title clearfix"
                                                                            data-toggle="collapse"
                                                                            data-target="#collapse<?php echo $section['id']; ?>"
                                                                            aria-expanded="<?php if ($counter == 0)
                                                                                                                                                                                                                            echo 'true';
                                                                                                                                                                                                                        else echo 'false'; ?>">
                                                                            <div class="title float-left">
                                                                                <?php echo $section['title']; ?>
                                                                            </div>
                                                                            <div class="float-right">
                                                                                <span class="total-lectures">
                                                                                    <?php echo $this->crud_model->get_lessons('section', $section['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                                                                </span>
                                                                                <span class="total-time">
                                                                                    <?php echo $this->crud_model->get_total_duration_of_lesson_by_section_id($section['id']); ?>
                                                                                </span>
                                                                            </div>
                                                                        </div>

                                                                        <div id="collapse<?php echo $section['id']; ?>"
                                                                            class="lecture-list collapse <?php if ($counter == 0)
                                                                                                                                                                    echo 'show'; ?>">
                                                                            <ul>
                                                                                <?php $lessons = $this->crud_model->get_lessons('section', $section['id'])->result_array();
                                                                                        foreach ($lessons as $lesson) : ?>
                                                                                <li class="lecture has-preview">
                                                                                    <span
                                                                                        class="lecture-title"><?php echo $lesson['title']; ?></span>
                                                                                    <span
                                                                                        class="lecture-time float-right"><?php echo $lesson['duration']; ?></span>
                                                                                    <!-- <span class="lecture-preview float-right" data-toggle="modal" data-target="#CoursePreviewModal">Preview</span> -->
                                                                                </li>
                                                                                <?php endforeach; ?>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                            $counter++;
                                                                        endforeach; ?>
                                                                </div>
                                                            </div>
                                                            <?php endif; ?>

                                                            <div class="requirements-box">
                                                                <div class="requirements-title">
                                                                    <?php echo site_phrase('objectives'); ?></div>
                                                                <div class="requirements-content">
                                                                    <ul class="requirements__list" id="pre_requirement">
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="description-box">
                                                                <div class="description-title">
                                                                    <?php echo site_phrase('description'); ?></div>
                                                                <div class="description-content-wrap">
                                                                    <div class="description-content"
                                                                        id="pre_description">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="what-you-get-box pre-curriculum"></div>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="course-sidebar natural">
                                                            <?php if ($course_details['video_url'] != "") : ?>
                                                            <div class="preview-video-box">
                                                                <a data-toggle="modal"
                                                                    data-target="#CoursePreviewModal">
                                                                    <img src="" alt="" id="pre_img" class="img-fluid">


                                                                    <span
                                                                        class="preview-text"><?php echo site_phrase('preview_this_course'); ?></span>
                                                                    <span class="play-btn"></span>
                                                                </a>
                                                            </div>
                                                            <?php endif; ?>
                                                            <div class="gallery" style="text-align: center;"></div>

                                                            <div class="course-sidebar-text-box">
                                                                <div class="row">
                                                                    <div class="col-md-12 pre_price"></div>
                                                                </div>

                                                                <?php if (is_purchased($course_details['id'])) : ?>
                                                                <div class="already_purchased">
                                                                    <a
                                                                        href="<?php echo site_url('home/my_courses'); ?>"><?php echo site_phrase('already_purchased'); ?></a>
                                                                </div>
                                                                <?php else : ?>

                                                                <!-- WISHLIST BUTTON -->
                                                                <div class="buy-btns">
                                                                    <button
                                                                        class="btn btn-add-wishlist <?php echo $this->crud_model->is_added_to_wishlist($course_details['id']) ? 'active' : ''; ?>"
                                                                        type="button"
                                                                        id="<?php echo $course_details['id']; ?>">
                                                                        <?php
                                                                            if ($this->crud_model->is_added_to_wishlist($course_details['id'])) {
                                                                                echo site_phrase('added_to_wishlist');
                                                                            } else {
                                                                                echo site_phrase('add_to_wishlist');
                                                                            }
                                                                            ?>
                                                                    </button>
                                                                </div>

                                                                <?php if ($course_details['is_free_course'] == 1) : ?>
                                                                <div class="buy-btns">
                                                                    <?php if ($this->session->userdata('user_login') != 1) : ?>
                                                                    <a href="#" class="btn btn-buy-now"
                                                                        onclick="handleEnrolledButton()"><?php echo site_phrase('get_enrolled'); ?></a>
                                                                    <?php else : ?>
                                                                    <a href="<?php echo site_url('home/get_enrolled_to_free_course/' . $course_details['id']); ?>"
                                                                        class="btn btn-buy-now"><?php echo site_phrase('get_enrolled'); ?></a>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php else : ?>
                                                                <div class="buy-btns">
                                                                    <a href="javascript::" class="btn btn-buy-now"
                                                                        id="course_<?php echo $course_details['id']; ?>"><?php echo site_phrase('buy_now'); ?></a>
                                                                    <?php if (in_array($course_details['id'], $this->session->userdata('cart_items'))) : ?>
                                                                    <button class="btn btn-add-cart addedToCart"
                                                                        type="button"
                                                                        id="<?php echo $course_details['id']; ?>"
                                                                        onclick="handleCartItems(this)"><?php echo site_phrase('added_to_cart'); ?></button>
                                                                    <?php else : ?>
                                                                    <button class="btn btn-add-cart" type="button"
                                                                        id="<?php echo $course_details['id']; ?>"
                                                                        onclick="handleCartItems(this)"><?php echo site_phrase('add_to_cart'); ?></button>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php endif; ?>


                                                                <div class="includes">
                                                                    <div class="title">
                                                                        <b><?php echo site_phrase('includes'); ?>:</b>
                                                                    </div>
                                                                    <ul>
                                                                        <?php if ($course_details['course_type'] == 'general') : ?>
                                                                        <li><i class="far fa-file-video"></i>
                                                                            <?php
                                                                                echo $this->crud_model->get_total_duration_of_lesson_by_course_id($course_details['id']) . ' ' . site_phrase('on_demand_videos');
                                                                                ?>
                                                                        </li>
                                                                        <li><i
                                                                                class="far fa-file"></i><?php echo $this->crud_model->get_lessons('course', $course_details['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                                                        </li>
                                                                        <li><i
                                                                                class="fas fa-mobile-alt"></i><?php echo site_phrase('access_on_mobile_and_tv'); ?>
                                                                        </li>
                                                                        <?php elseif ($course_details['course_type'] == 'scorm') : ?>
                                                                        <li><i
                                                                                class="far fa-file-video"></i><?php echo site_phrase('scorm_course'); ?>
                                                                        </li>
                                                                        <li><i
                                                                                class="fas fa-mobile-alt"></i><?php echo site_phrase('access_on_laptop_and_tv'); ?>
                                                                        </li>
                                                                        <?php endif; ?>
                                                                        <li><i
                                                                                class="far fa-compass"></i><?php echo site_phrase('full_lifetime_access'); ?>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!--<div class="row justify-content-center">-->
                                        <!--    <div class="col-xl-8">-->

                                        <!--    </div>-->
                                        <!--</div>-->
                                        <ul class="list-inline mb-0 wizard text-center" style="margin-right: 150px; margin-top:10px;">
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
                                    <!--end preview-->

                                    <div class="tab-pane" id="finish">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-center">
                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                    <h3 class="mt-0"><?php echo get_phrase("thank_you"); ?> !</h3>

                                                    <p class="w-75 mb-2 mx-auto">
                                                        <?php echo get_phrase('you_are_just_one_click_away'); ?></p>

                                                    <div class="mb-3 mt-3">
                                                        <button type="button"
                                                            class="btn btn-primary text-center"
                                                            onclick="checkRequiredFields()"><?php echo get_phrase('submit'); ?></button>
                                                    </div>
                                                </div>

                                            </div> <!-- end col -->

                                        </div> <!-- end row -->
                                        <ul class="list-inline mb-0 wizard text-center">
                                            <li class="previous list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
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
    </div><!-- end row-->
</div> <!-- end card-body-->
</div> <!-- end card-->
</div>
</div>


<script type="text/javascript">
function getpreviewdata(is_click = 0) {
    getcurriculum();
    var course_title = $('#title').val();
    var short_description = $('textarea#short_description').val();
    var description = $('#description').val();
    var price = $('#price').val();
    var discounted_price = $('#discounted_price').val();

    var requirements = $('input[name^=objectives').map(function(idx, elem) {
        return $(elem).val();
    }).get();

    var outcomes = $('input[name^=outcomes').map(function(idx, elem) {
        return $(elem).val();
    }).get();

    $('#pre_requirement').text("");
    $.each(requirements, function(index, value) {
        if (value.length > 0) {
            var rows = ('<li>' + value + '</li>');
            $('#pre_requirement').append(rows);
        }
    });

    $('#pre_objectives').text("");
    $.each(outcomes, function(index, value) {
        if (value.length > 0) {
            var rows = ('<li>' + value + '</li>');
            $('#pre_objectives').append(rows);
        }
    });

    // console.log(requirements);
    // return false

    $('#pre_course_title').text(course_title);
    $('#pre_short_description').text(short_description);
    $('#pre_description').text(description);
    // $('#pre_category').text(category);
    // $('#pre_level').text(level);
    // $('#pre_language_made_in').text(language_made_in);
    var price_html = '<div class="pre-price-div">';
    if ($('#is_free_course').is(':checked'))
    {
        price_html +='<div>';
        price_html +='  <span>FREE</span>';
        price_html +='</div>';
        
        
        $('#pre_course_discounted_price').text('Free');
        $('#pre_course_price').text('');
    }
    else
    {   
        if(parseInt(discounted_price) > 0)
        {
            if(parseInt(discounted_price) == parseInt(price))
            {
                price_html +='<div>';
                price_html +='  <span>₹' + discounted_price + '</span>';
                price_html +='</div>';
            }
            else
            {
                var disc_per = (discounted_price / price) * 100;
                var discount_pre = (100 - disc_per).toFixed(2) + '% Off';
                price_html +='<div>';
                price_html +='  <span>₹' + discounted_price + '</span>';
                price_html +='</div>';
                price_html +='<div>';
                price_html +='  <label><strike>₹' + price + '</strike></label>';
                price_html +='</div>';
                price_html +='<div>';
                price_html +='  <label>' + discount_pre + '</label>';
                price_html +='</div>';
            }
        }
        else
        {
            price_html +='<div>';
            price_html +='  <span>₹' + price + '</span>';
            price_html +='</div>';
        }
    }
    price_html +='</div>';
    $('.pre_price').html(price_html);
    
    if(parseInt(is_click) > 0)
    {
        $('#preview_tab').trigger('click');
    }
}
$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img class="img-fluid">')).attr('src', event.target.result).appendTo(
                        placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#thubmnail').on('change', function() {
        $('div.gallery').empty();
        imagesPreview(this, 'div.gallery');
    });
});

var blank_outcome = jQuery('#blank_outcome_field').html();
var blank_requirement = jQuery('#blank_requirement_field').html();
var blank_objective = jQuery('#blank_objective_field').html();

jQuery(document).ready(function() {

    jQuery('#blank_outcome_field').hide();
    jQuery('#blank_objective_field').hide();
    jQuery('#blank_requirement_field').hide();
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

function appendRequirement() {
    jQuery('#requirement_area').append(blank_requirement);
    // jQuery('#requirement_area').append(blank_requirement.replace('class="form-control"', 'class="form-control tab-2"'));

    // $('input[name="requirements[]"]').attr('required',true);
}

function removeRequirement(requirementElem) {
    jQuery(requirementElem).parent().parent().remove();
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
    } else {
        $('#price').prop('required', true);
    }
}

function calculateDiscountPercentage(discounted_price) {
    if (discounted_price > 0) {
        var actualPrice = jQuery('#price').val();
        if (actualPrice > 0) {
            var reducedPrice = actualPrice - discounted_price;
            var discountedPercentage = (reducedPrice / actualPrice) * 100;
            if (discountedPercentage > 0) {
                jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2) + '%');

            } else {
                jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
            }
        }
    }
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
$(document).on('change','.price_change',function(){
    if($('#is_free_course').is(":checked")){
        
        $('#price').val('0');
        $('#discount_flag').prop('checked',false);
        $('#discounted_price').val('0').prop('disabled',true);
        $('#price').removeClass('tab-3');
        $('#discounted_price').removeClass('tab-3');
        $('#pre_course_price').text('Free');
    }else{
        $('#pre_course_price').text('₹ '+ $('#price').val());
        $('#price').addClass('tab-3');
        $('#discounted_price').addClass('tab-3');
    }
    if($('#discount_flag').is(":checked")){
       if(parseInt($('#price').val()) < parseInt($('#discounted_price').val())){
           $('#discounted_price').val('0');
           alert('the discounted price can not be more than the original price');
       }else{
           $('#pre_course_price').text('₹ ' + $('#discounted_price').val());
       }
    }
});


/*13-04-2022 required fild test*/
function verifyrequired(tab, next_tab)
{
     $('.field-error').remove();
    var error = 0;
    $("." + tab).each(function() {
        
        if($(this).val().length <= 0)
        {
            
            // var name = $("[for='"+$(this).attr('id')+"']").text();
            // // var name =  $(this).attr('id').replace('_id', '').replace(/_/g, ' ');
            // $("<span class='text-danger'>"+name+"</span>").insertAfter($(this));
            
            
            var name = $("[for='"+$(this).attr('id')+"']").text().replace('*','');
            var parentdiv = $(this).parent().closest('div');
            // var name =  $(this).attr('id').replace('_id', '').replace(/_/g, ' ');
            
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
        $('#discounted_price').val('0');
    }
    
    verifyrequired('tab-3','media');
}

</script>

<style media="screen">
body {
    overflow-x: hidden;
}
</style>
</script>
<script>
    var thubmnail = document.getElementById("thubmnail");

thubmnail.ondrop = function (e) {
    e.preventDefault();
    e.stopPropagation();

    var files = e.dataTransfer.files;
    for(x = 0; x < files.length; x = x + 1){
        if(files[x].type.split("/")[0] == 'image') {
            console.log(files[x].name + "is image");
        }else {
            console.log(files[x].name + "is not image");
        }
    }
}
</script>
<script>
    var video = document.getElementById("video");

video.ondrop = function (e) {
    e.preventDefault();
    e.stopPropagation();

    var files = e.dataTransfer.files;
    for(x = 0; x < files.length; x = x + 1){
        if(files[x].type.split("/")[0] == 'video') {
            console.log(files[x].name + "is video");
        }else {
            console.log(files[x].name + "is not video");
        }
    }
}
</script>
<style media="screen">
body {
    overflow-x: hidden;
}
</style>