<?php

$values = $this->user_model->my_courses()->result_array();

$categories = array();
foreach ($values as $value) {
    $course_details = $this->crud_model->get_course_by_id($value['course_id'])->row_array();
    if (!in_array($course_details['category_id'], $categories)) {
        array_push($categories, $course_details['category_id']);
    }
}
?>

<?php include "profile_menus.php"; ?>

<section class="my-courses-area">
    <div class="container">
        <div class="row align-items-baseline">
            <div class="col-lg-6">
                <div class="my-course-filter-bar filter-box">
                    <span><?php echo site_phrase('filter_by'); ?></span>
                    <div class="btn-group">
                        <a class="btn btn-outline-secondary dropdown-toggle all-btn" href="#"data-toggle="dropdown">
                            <?php echo site_phrase('categories'); ?>
                        </a>

                        <div class="dropdown-menu">
                            <?php foreach ($categories as $category):
                                $category_details = $this->crud_model->get_categories($category)->row_array();
                                ?>
                                <a class="dropdown-item" href="#" id = "<?php echo $category; ?>" onclick="getCoursesByCategoryId(this.id)"><?php echo $category_details['name']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="btn-group">
                        <a href="<?php echo site_url('home/my_courses'); ?>" class="btn reset-btn" disabled><?php echo site_phrase('reset'); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="my-course-search-bar">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="<?php echo site_phrase('search_my_courses'); ?>" onkeyup="getCoursesBySearchString(this.value)">
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row no-gutters" id = "my_courses_area">
        <?php
        $CourseData = $this->db->select('*')->from('course')->where('user_id',$this->session->userdata('user_id'))->get()->result_array();
        // echo '<prE>';print_r($CourseData);die;
        foreach($CourseData as $value)
        {
            echo
            '<div class="col-lg-3">
                <div class="course-box-wrap">
                    <div class="course-box">
                        <a href="'.site_url('home/lesson/'.rawurlencode(slugify($value['title'])).'/'.$value['id']).'">
                            <div class="course-image">
                                <div>
                                    <img src="'.$this->crud_model->get_course_thumbnail_url($value['id']).'" class="img-fluid">
                                </div>
                                <span class="play-btn"></span>
                            </div>
                        </a>

                        <div class="" id="course_info_view_'.$value['id'].'">
                            <div class="course-details">
                                <a href="'.site_url('home/course/'.rawurlencode(slugify($value['title'])).'/'.$value['id']).'"><h5 class="title">'.ellipsis($value['title']).'</h5></a>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:'.course_progress($value['id']).'%" aria-valuenow="'.course_progress($value['id']).'" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small>'.ceil(course_progress($value['id'])).'% Completed</small>
                                <div class="rating your-rating-box" style="position: unset; margin-top: -18px;">';
                                    $get_my_rating = $this->crud_model->get_user_specific_rating('course', $value['id']);
                                    for($i = 1; $i < 6; $i++)
                                    {
                                       echo ($i <= $get_my_rating['rating']) ? '<i class="fas fa-star filled"></i>' : '<i class="fas fa-star"></i>';
                                    }
                                    echo
                                    '<!--
                                    <p class="your-rating-text" id="'.$value['id'].'" onclick="getCourseDetailsForRatingModal(this.id)">
                                        <span class="your">Your</span>
                                        <span class="edit">Edit</span>
                                        Rating
                                    </p> -->
                                    <p class="your-rating-text">
                                        <a href="javascript::" id = "edit_rating_btn_'.$value['id'].'" onclick="toggleRatingView('."'".$value['id']."'".')" style="color: #2a303b">edit Rating</a>
                                        <a href="javascript::" class="hidden" id="cancel_rating_btn_'.$value['id'].'" onclick="toggleRatingView('."'".$value['id']."'".')" style="color: #2a303b">Cancel Rating</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row" style="padding: 5px;">
                                <div class="col-md-6 pt-2">
                                    <a href="'.site_url('home/course/'.rawurlencode(slugify($value['title'])).'/'.$value['id']).'" class="btn">Course Detail</a>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <a href="'.site_url('home/lesson/'.rawurlencode(slugify($value['title'])).'/'.$value['id']).'" class="btn">Start Lesson</a>
                                </div>
                            </div>
                        </div>
                        <div class="course-details" style="display: none; padding-bottom: 10px;" id = "course_rating_view_'.$value['id'].'">
                            <a href="'.site_url('home/course/'.rawurlencode(slugify($value['title'])).'/'.$value['id']).'"><h5 class="title">'.ellipsis($value['title']).'</h5></a>';
							$user_specific_rating = $this->crud_model->get_user_specific_rating('course', $value['id']);
							echo 
							'<form class="javascript:;" action="" method="post">
								<div class="form-group select">
									<div class="styled-select">
										<select class="form-control" name="star_rating" id="star_rating_of_course_'.$value['id'].'">
											<option value="1" '.(($user_specific_rating['rating'] == 1) ? ' selected ' : ' ' ).'>1 Out Of 5</option>
											<option value="2" '.(($user_specific_rating['rating'] == 2) ? ' selected ' : ' ' ).'>2 Out Of 5</option>
											<option value="3" '.(($user_specific_rating['rating'] == 3) ? ' selected ' : ' ' ).'>3 Out Of 5</option>
											<option value="4" '.(($user_specific_rating['rating'] == 4) ? ' selected ' : ' ' ).'>4 Out Of 5</option>
											<option value="5" '.(($user_specific_rating['rating'] == 5) ? ' selected ' : ' ' ).'>5 Out Of 5</option>
										</select>
									</div>
								</div>
								<div class="form-group add_top_30">
									<textarea name="review" id ="review_of_a_course_'.$value['id'].'" class="form-control" style="height:120px;" placeholder="Write Your Review Here">'.$user_specific_rating['review'].'</textarea>
								</div>
								<button type="" class="btn btn-block" onclick="publishRating('."'".$value['id']."'".')" name="button">Publish Rating</button>
								<a href="javascript::" class="btn btn-block" onclick="toggleRatingView('."'".$value['id']."'".')" name="button">Cancel Rating</a>
							</form>
                        </div>
                    </div>
                </div>
            </div>';
        }?>
        </div>
    </div>
</section>


<script type="text/javascript">
function getCoursesByCategoryId(category_id) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/my_courses_by_category'); ?>',
        data : {category_id : category_id},
        success : function(response){
            $('#my_courses_area').html(response);
        }
    });
}

function getCoursesBySearchString(search_string) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/my_courses_by_search_string'); ?>',
        data : {search_string : search_string},
        success : function(response){
            $('#my_courses_area').html(response);
        }
    });
}

function getCourseDetailsForRatingModal(id) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/get_course_details'); ?>',
        data : {id : id},
        success : function(response){
            $('#course_title_1').append(response);
            $('#course_title_2').append(response);
            $('#course_thumbnail_1').attr('src', "<?php echo base_url().'uploads/thumbnails/course_thumbnails/';?>"+id+".jpg");
            $('#course_thumbnail_2').attr('src', "<?php echo base_url().'uploads/thumbnails/course_thumbnails/';?>"+id+".jpg");
            $('#id_for_rating').val(id);
            // $('#instructor_details').text(id);
            console.log(response);
        }
    });
}
</script>
