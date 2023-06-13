<link href="<?php echo base_url('assets/frontend/default/css/main.css') ?>" rel="stylesheet" type="text/css" />

<!--<script src="<?php echo base_url() . 'assets/frontend/default/js/main.js'; ?>"></script>-->
<style>
.course-sidebar {
    margin-top: -185px;
}

.btn {
    color: #2d368e;
    background-color: white;
}

.form-control:disabled, .form-control[readonly] {
    background-color: #e9ecef!important;
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
                    <img src="<?= base_url();?>uploads/online-learning.png" style="height: 44px; width: 44px;"
                        alt="user-image">
                    <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i>-->
                    <?php echo get_phrase('add_new_course'); ?>
                </h4>
                <p class="p-mb-15">➔ Blended Learning courses (BL) (Live classes+Recorded video classes+Content)</p>
                <p class="p-mb-15">➔ Blended Learning courses are designed to inculcate all the required formats for the course creation.</p>
                <p class="p-mb-15">➔ The courses created under BL can have live classes , pre-recorded videos and also content material in any format to assist the better learning of the subject.</p>
                <p class="p-mb-15">➔ The video content limit here is 30 Min.</p>
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
                        <h4 class="header-title my-1"><?php echo get_phrase('course_adding_form'); ?></h4>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo site_url('user/courses'); ?>"
                            class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm my-1"> <i
                                class=" mdi mdi-keyboard-backspace"></i>
                            <?php echo get_phrase('back_to_course_list'); ?></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <form class="required-form" id="course_add"
                            action="<?php echo site_url('user/course_actions/add'); ?>" method="post"
                            enctype="multipart/form-data">
                            <div id="basicwizard">

                                <ul class="nav nav-pills nav-justified form-wizard-header">
                                    <li class="nav-item">
                                        <a href="#basic" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active">
                                            <i class="mdi mdi-fountain-pen-tip"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('basic'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#requirements" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-bell-alert"></i>
                                            <span
                                                class="d-none d-sm-inline"><?php echo get_phrase('Eligibility'); ?></span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#objective" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-camera-control"></i>
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
                                        <a href="#seo" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-tag-multiple"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('seo'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#curriculum" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-tag-multiple"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('curriculum'); ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#preview" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" id="preview_tab"
                                            onclick="getpreviewdata(0)">
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
                                    <div class="tab-pane active" id="basic">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <?php if (addon_status('scorm_course')) : ?>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="course_type"><?php echo get_phrase('course_type'); ?></label>
                                                    <div class="col-md-10">
                                                        <select class="form-control select2" data-toggle="select2"
                                                            name="course_type" id="course_type">
                                                            <option value="general"><?php echo get_phrase('general'); ?>
                                                            </option>
                                                            <option value="scorm"><?php echo get_phrase('scorm'); ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <?php else : ?>
                                                <input type="hidden" name="course_type" value="general">
                                                <?php endif; ?>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="course_title"><?php echo get_phrase('course_title'); ?>
                                                        <span class="required">*</span> </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control tab-1" id="course_title"
                                                            name="title"
                                                            placeholder="<?php echo get_phrase('enter_course_title'); ?>"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="short_description"><?php echo get_phrase('short_description'); ?>
                                                        <span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <textarea name="short_description" id="short_description"
                                                            class="form-control tab-1" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="descriptions"><?php echo get_phrase('description'); ?>
                                                        <span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <textarea name="description" id="descriptions"
                                                            class="form-control tab-1" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="sub_category_id"><?php echo get_phrase('department'); ?><span
                                                            class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <select class="form-control select2 tab-1" data-toggle="select2"
                                                            name="sub_category_id" id="sub_category_id" required>
                                                            <option value="">
                                                                <?php echo get_phrase('select_a_department'); ?></option>
                                                            <?php foreach ($categories->result_array() as $category) : ?>
                                                            <optgroup label="<?php echo $category['name']; ?>">
                                                                <?php $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                                                                    foreach ($sub_categories as $sub_category) : ?>
                                                                <option value="<?php echo $sub_category['id']; ?>">
                                                                    <?php echo $sub_category['name']; ?></option>
                                                                <?php endforeach; ?>
                                                            </optgroup>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <small
                                                            class="text-muted"><?php echo get_phrase('select_sub_department'); ?></small>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="level"><?php echo get_phrase('level'); ?><span
                                                            class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <select class="form-control select2 tab-1" data-toggle="select2"
                                                            name="level" id="level" required>
                                                            <option value="beginner">
                                                                <?php echo get_phrase('beginner'); ?></option>
                                                            <option value="advanced">
                                                                <?php echo get_phrase('advanced'); ?></option>
                                                            <option value="intermediate">
                                                                <?php echo get_phrase('intermediate'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="language_made_in"><?php echo get_phrase('language_made_in'); ?><span
                                                            class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <select class="form-control select2 tab-1" data-toggle="select2"
                                                            name="language_made_in" id="language_made_in" required>
                                                            <?php foreach ($languages as $language) : ?>
                                                            <option value="<?php echo $language; ?>">
                                                                <?php echo ucfirst($language); ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="proposed_date"><?php echo get_phrase('course_start_date'); ?>
                                                        <span class="required">*</span> </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control tab-1 date" id="proposed_date" name="proposed_date" required data-toggle="date-picker" data-min-date="<?= date('m/d/Y');?>" data-single-date-picker="true" value="<?= date('m/d/Y');?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="end_date"><?php echo get_phrase('course_end_date'); ?>
                                                        <span class="required">*</span> </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control tab-1 date" id="end_date" name="end_date" required data-toggle="date-picker" data-min-date="<?= date('m/d/Y');?>" data-single-date-picker="true" value="<?= date('m/d/Y');?>">
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
                                            </div> <!-- end col -->

                                        </div> <!-- end row -->
                                        <ul class="list-inline mb-0 wizard text-center">
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-info" onclick="return verifyrequired('tab-1','requirements');"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                            </li>
                                        </ul>
                                    </div> <!-- end tab pane -->
                                    <div class="tab-pane" id="requirements">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="requirements"><?php echo get_phrase('Eligibility'); ?><span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <div id="requirement_area">
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control tab-2"
                                                                            name="requirements[]" id="requirements"
                                                                            placeholder="<?php echo get_phrase('provide_Eligibility'); ?>"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-success btn-sm"
                                                                        name="button" onclick="appendRequirement()"> <i
                                                                            class="fa fa-plus"></i> </button>
                                                                </div>
                                                            </div>
                                                            <div id="blank_requirement_field">
                                                                <div class="d-flex mt-2">
                                                                    <div class="flex-grow-1 px-3">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control"
                                                                                name="requirements[]" id="requirements"
                                                                                placeholder="<?php echo get_phrase('provide_Eligibility'); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            style="margin-top: 0px;" name="button"
                                                                            onclick="removeRequirement(this)"> <i
                                                                                class="fa fa-minus"></i> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <ul class="list-inline mb-0 wizard text-center">
                                            <li class="previous list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-info" onclick="return verifyrequired('tab-2','objective');"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="objective">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label" for="objectives">Objectives
                                                        <span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <div id="objective_area">
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control tab-3"
                                                                            name="objectives[]" id="objectives"
                                                                            placeholder="<?php echo get_phrase('provide_objective'); ?>"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control tab-3"
                                                                            name="objectives[]" id="objectives"
                                                                            placeholder="<?php echo get_phrase('provide_objective'); ?>"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control tab-3"
                                                                            name="objectives[]" id="objectives"
                                                                            placeholder="<?php echo get_phrase('provide_objective'); ?>"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <button type="button" class="btn btn-success btn-sm"
                                                                        name="button" onclick="appendObjectives()"> <i
                                                                            class="fa fa-plus"></i> </button>
                                                                </div>
                                                            </div>
                                                            <div id="blank_objective_field">
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

                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="outcomes"><?php echo get_phrase('outcomes'); ?> <span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <div id="outcomes_area">
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control tab-3"
                                                                            name="outcomes[]" id="outcomes"
                                                                            placeholder="<?php echo get_phrase('provide_outcomes'); ?>"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control tab-3"
                                                                            name="outcomes[]" id="outcomes"
                                                                            placeholder="<?php echo get_phrase('provide_outcomes'); ?>"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex mt-2">
                                                                <div class="flex-grow-1 px-3">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control tab-3"
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
                                                            <div id="blank_outcome_field">
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
                                            </div>
                                        </div>
                                        <ul class="list-inline mb-0 wizard text-center">
                                            <li class="previous list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-info" onclick="return verifyrequired('tab-3','pricing');"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="pricing">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="form-group row mb-3">
                                                    <div class="offset-md-2 col-md-10">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" name="is_free_course" id="is_free_course" value="1" onclick="check_checkbox('price');">
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
                                                            <input type="number" class="form-control tab-4" id="price" name="price" value="0"  oninput="this.value = 
 !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"  required placeholder="<?php echo get_phrase('enter_course_price'); ?>"
                                                                min="0" oninput="course_amount_validation('price');">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <div class="offset-md-2 col-md-10">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="discount_flag" id="discount_flag" value="1" min="0"  onclick="check_checkbox('discounted_price');">
                                                                <label class="custom-control-label"
                                                                    for="discount_flag"><?php echo get_phrase('check_if_this_course_has_discount'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-2 col-form-label"
                                                            for="discounted_price"><?php echo get_phrase('discounted_course_price') . ' (' . currency_code_and_symbol() . ')'; ?><span class="required">*</span></label>
                                                        <div class="col-md-10">
                                                            <input type="number" onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" class="form-control tab-4" name="discounted_price" id="discounted_price" onkeyup="calculateDiscountPercentage(this.value)"
                                                                min="0" value="0" disabled oninput="course_amount_validation('discounted_price');">
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
                                                    <label class="col-md-2 col-form-label"
                                                        for="course_overview_provider"><?php echo get_phrase('course_overview_provider'); ?><span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <select class="form-control select2 tab-5" data-toggle="select2"
                                                            name="course_overview_provider"
                                                            id="course_overview_provider"
                                                            onchange="checkcourseprovider(this.value);">
                                                            <option value="youtube"><?php echo get_phrase('youtube'); ?>
                                                            </option>
                                                            <option value="other"><?php echo get_phrase('other'); ?>
                                                            </option>
                                                            <!--<option value="vimeo"><?php echo get_phrase('vimeo'); ?>-->
                                                            <!--</option>-->
                                                            <!--<option value="html5"><?php echo get_phrase('HTML5'); ?>-->
                                                            <!--</option>-->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->


                                            <div class="col-xl-10">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="course_overview_url"><?php echo get_phrase('course_overview_url'); ?><span class="required">*</span></label>

                                                    <div class="col-md-10">
                                                        <div id="course_overview_url-div">
                                                            <input type="url" class="form-control tab-5"
                                                                name="course_overview_url" pattern="https?://.+" id="course_overview_url"
                                                                placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Yglw2w">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-10 video_courtesy-div">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label" for="video_courtesy">Video
                                                        courtesy<span class="required">*</span></label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control tab-5" name="video_courtesy"
                                                            id="video_courtesy" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <!-- this portion will be generated theme wise from the theme-config.json file Starts-->
                                            <?php include 'course_media_add.php'; ?>
                                            <!-- this portion will be generated theme wise from the theme-config.json file Ends-->

                                        </div> <!-- end row -->
                                        <ul class="list-inline mb-0 wizard text-center">
                                            <li class="previous list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn btn-info" onclick="return verifyrequired('tab-5','seo');"> <i class="mdi mdi-arrow-right-bold"></i> </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="seo">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-10">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="website_keywords"><?php echo get_phrase('meta_keywords'); ?>
                                                        </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control bootstrap-tag-input"
                                                            id="meta_keywords" name="meta_keywords"
                                                            data-role="tagsinput" style="width: 100%;"
                                                            placeholder="<?php echo get_phrase('write_a_keyword_and_then_press_enter_button'); ?>" />
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-xl-8">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-2 col-form-label"
                                                        for="meta_description"><?php echo get_phrase('meta_description'); ?>
                                                        </label>
                                                    <div class="col-md-10">
                                                        <textarea  name="meta_description"
                                                            class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                        <ul class="list-inline mb-0 wizard text-center">
                                            <li class="previous list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <li class="next list-inline-item">
                                                <a href="javascript:void(0);" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-right-bold"></i> </a>
                                            </li>
                                        </ul>
                                    </div>
                                    
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
                            
                                    <!--start preview-->
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
                                                            <br>
                                                            <div class="category-row">
                                                                <span><?php echo site_phrase('department'); ?> </span>:
                                                                <span class="pre_category" id="pre_category"> </span>
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
                                                                Objectives</div>
                                                            <ul class="what-you-get__items" id="pre_objectives">

                                                            </ul>
                                                            <br>
                                                            <div class="what-you-get-title">
                                                                <?php echo site_phrase('Outcomes'); ?></div>
                                                            <ul class="what-you-get__items" id="pre_outcomes">

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
                                                                    <?php echo site_phrase('requirements'); ?></div>
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
                                        <ul class="list-inline mb-0 wizard text-center mt-3">
                                            <li class="previous list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-left-bold"></i> </a>
                                            </li>
                                            <li class="next list-inline-item">
                                                <a href="javascript::" class="btn btn-info"> <i
                                                        class="mdi mdi-arrow-right-bold"></i> </a>
                                            </li>
                                        </ul>
                                        <!--<div class="row justify-content-center">-->
                                        <!--    <div class="col-xl-8">-->

                                        <!--    </div>-->
                                        <!--</div>-->
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
                                                        <!-- <button type="submit"
                                                            class="btn btn-primary text-center"><?php echo get_phrase('submit'); ?></button> -->
                                                        <button type="button" class="btn btn-primary text-center"
                                                            onclick="checkRequiredFields()"><?php echo get_phrase('submit'); ?></button>
                                                    </div>
                                                </div>
                                                <ul class="list-inline mb-0 wizard text-center">
                                                    <li class="previous list-inline-item">
                                                        <a href="javascript::" class="btn btn-info"> <i
                                                                class="mdi mdi-arrow-left-bold"></i> </a>
                                                    </li>
                                                </ul>
                                            </div> <!-- end col -->

                                        </div> <!-- end row -->
                                    </div>

                                    <!-- <ul class="list-inline mb-0 wizard text-center">
                                        <li class="previous list-inline-item">
                                            <a href="javascript::" class="btn btn-info"> <i
                                                    class="mdi mdi-arrow-left-bold"></i> </a>
                                        </li>
                                        <li class="next list-inline-item">
                                            <a href="javascript::" class="btn btn-info"> <i
                                                    class="mdi mdi-arrow-right-bold"></i> </a>
                                        </li>
                                    </ul> -->

                                </div> <!-- tab-content -->
                            </div> <!-- end #progressbarwizard-->
                        </form>
                    </div>
                </div><!-- end row-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>
<script type="text/javascript">



window.onload = () => {
 const myInput = document.getElementById('discounted_price');
 myInput.onpaste = e => e.preventDefault();
}


// $('#preview_tab').on('click', function() {

//     var course_title = $('#course_title').val();
//     var short_description = $('textarea#short_description').val();
//     var description = $('textarea#descriptions').val();
//     var category = $("#sub_category_id option:selected").text();
//     var level = $("#level option:selected").text();
//     var language_made_in = $('#language_made_in').val();
//     //var requirements = $('#requirements').val();
//     //var outcomes = $('#outcomes').val();
//     var price = $('#price').val();
//     var discounted_price = $('#discounted_price').val();
//     // var pre_img = $('#').attr('src');
//     console.log(category);


//     var requirements = $('input[name^=requirements').map(function(idx, elem) {
//         return $(elem).val();
//     }).get();

//     var outcomes = $('input[name^=outcomes').map(function(idx, elem) {
//         return $(elem).val();
//     }).get();
//     var objectives = $('input[name^=objectives').map(function(idx, elem) {
//         return $(elem).val();
//     }).get();
//     $('#pre_requirement').text("");
//     $.each(requirements, function(index, value) {
//         if (value.length > 0) {
//             var rows = ('<li>' + value + '</li>');
//             $('#pre_requirement').append(rows);
//         }
//     });

//     $('#pre_objectives').text("");
//     $.each(objectives, function(index, value) {
//         if (value.length > 0) {
//             var rows = ('<li>' + value + '</li>');
//             $('#pre_objectives').append(rows);
//         }
//     });
//     $('#pre_outcomes').text("");
//     $.each(outcomes, function(index, value) {
//         if (value.length > 0) {
//             var rows = ('<li>' + value + '</li>');
//             $('#pre_outcomes').append(rows);
//         }
//     });

//     // console.log(requirements);
//     // return false

//     $('#pre_course_title').text(course_title);
//     $('#pre_short_description').text(short_description);
//     $('#pre_description').text(description);
//     $('#pre_category').text(category);
//     $('#pre_level').text(level);
//     $('#pre_language_made_in').text(language_made_in);
//     if ($('#is_free_course').is(':checked')) {
//         $('#pre_course_price').text('Free');

//     } else {
//         $('#pre_course_price').text('₹' + price);
//     }

//     $('#pre_discounted_price').text(discounted_price);
// });
function getpreviewdata(is_click = 0)
{
    getcurriculum();
    var course_title = $('#course_title').val();
    var short_description = $('textarea#short_description').val();
    var description = $('textarea#descriptions').val();
    var category = $("#sub_category_id option:selected").text();
    var level = $("#level option:selected").text();
    var language_made_in = $('#language_made_in').val();
    //var requirements = $('#requirements').val();
    //var outcomes = $('#outcomes').val();
    var price = $('#price').val();
    var discounted_price = $('#discounted_price').val();
    // var pre_img = $('#').attr('src');
    console.log(category);


    var requirements = $('input[name^=requirements').map(function(idx, elem) {
        return $(elem).val();
    }).get();

    var outcomes = $('input[name^=outcomes').map(function(idx, elem) {
        return $(elem).val();
    }).get();
    var objectives = $('input[name^=objectives').map(function(idx, elem) {
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
    $.each(objectives, function(index, value) {
        if (value.length > 0) {
            var rows = ('<li>' + value + '</li>');
            $('#pre_objectives').append(rows);
        }
    });
    $('#pre_outcomes').text("");
    $.each(outcomes, function(index, value) {
        if (value.length > 0) {
            var rows = ('<li>' + value + '</li>');
            $('#pre_outcomes').append(rows);
        }
    });

    // console.log(requirements);
    // return false

    $('#pre_course_title').text(course_title);
    $('#pre_short_description').text(short_description);
    $('#pre_description').text(description);
    $('#pre_category').text(category);
    $('#pre_level').text(level);
    $('#pre_language_made_in').text(language_made_in);
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

var blank_outcome = jQuery('#blank_outcome_field').html();
var blank_objective = jQuery('#blank_objective_field').html();

var blank_requirement = jQuery('#blank_requirement_field').html();

jQuery(document).ready(function() {
    jQuery('#blank_outcome_field').hide();
    jQuery('#blank_requirement_field').hide();
    jQuery("#blank_objective_field").hide();
});

function appendOutcome() {
    jQuery('#outcomes_area').append(blank_outcome);
    // jQuery('#outcomes_area').append(blank_outcome.replace('class="form-control"', 'class="form-control tab-3"'));

    // $('input[name="outcomes[]"]').attr('required',true);
    
}

function appendObjectives() {
    jQuery('#objective_area').append(blank_objective);
    // jQuery('#objective_area').append(blank_objective.replace('class="form-control"', 'class="form-control tab-3"'));
    
    // $('input[name="objectives[]"]').attr('required',true);
}

function removeOutcome(outcomeElem) {
    jQuery(outcomeElem).parent().parent().remove();
}

function removeObjectives(outcomeElem) {
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

    $('.image-upload').on('change', function() {
        $('div.gallery').empty();
        imagesPreview(this, 'div.gallery');
    });
});

/*06-04-2022 change */
function checkcourseprovider(val) {
    var html = '';
    if (val == 'youtube') {
        $('label[for="course_overview_url"]').html('course overview url<span class="required">*</span>');
        $('.video_courtesy-div').css('display', 'block');
        $('#video_courtesy').prop('required',true);
        $('#video_courtesy').addClass('tab-5');
        html +=
            '<input type="text" class="form-control tab-5" name="course_overview_url" id="course_overview_url" placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Yglw2w" required>';
    } else {
        $('label[for="course_overview_url"]').html('course overview video<span class="required">*</span>');
        $('.video_courtesy-div').css('display', 'none');
        $('#video_courtesy').prop('required',false);
        $('#video_courtesy').removeClass('tab-5');
        html +=
            '<input type="file" class="form-control tab-5" name="course_overview_url" id="course_overview_url" accept="video/*" required>';
    }
    $('#course_overview_url-div').html(html);
}


$(document).on('change','#discount_flag',function(){
   if($(this).is(":checked") == false){
       $('#discounted_price').val('0');
       $('#discounted_price').prop('disabled',true);
       $('#discounted_price').removeClass('tab-4');
   }else{
       $('#discounted_price').prop('disabled',false);
       $('#discounted_price').addClass('tab-4');
   }
});

/*13-04-2022 required fild test*/
function verifyrequired(tab, next_tab)
{
     var pattern = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
    
    
    if($("#course_overview_provider").val() =='youtube' && typeof($("#course_overview_url").val()) !== 'undefined' && $("#course_overview_url").val().length > 0)
    { 
        var url = $("#course_overview_url").val();
        
        if(!pattern.test(url))
        {
           alert("Invalid Course overview URL"); 
           return false;
        }
    }

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
   // $('#price').val(Math.abs($('#price').val()));
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
    }
    
    verifyrequired('tab-4','media');
}
</script>

<style media="screen">
body {
    overflow-x: hidden;
}
</style>