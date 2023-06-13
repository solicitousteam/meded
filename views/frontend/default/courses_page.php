<?php
isset($layout) ? "": $layout = "list";
isset($selected_category_id) ? "": $selected_category_id = "all";
isset($selected_level) ? "": $selected_level = "all";
isset($selected_language) ? "": $selected_language = "all";
isset($selected_rating) ? "": $selected_rating = "all";
isset($selected_price) ? "": $selected_price = "all";
// echo $selected_category_id.'-'.$selected_level.'-'.$selected_language.'-'.$selected_rating.'-'.$selected_price;
$number_of_visible_categories = 10;
$cat_parent_id = 0;
if (isset($selected_category_id)) {
    $sub_category_details = $this->crud_model->get_category_details_by_id($selected_category_id)->row_array();
    $category_details     = $this->crud_model->get_categories($sub_category_details['parent'])->row_array();
    $category_name        = $category_details['name'];
    $sub_category_name    = $sub_category_details['name'];
    $cat_parent_id        = $sub_category_details['parent'];
}
// echo $cat_parent_id.'-helloworld-'.$selected_category_id;
?>
<style>
    .main-cat{
        text-transform: uppercase;
        padding: 2.5px 0px;
        color:#666;
    }
    .main-category-block{
        text-transform: uppercase;
        display: flex;
        padding: 2.5px 0px;
        color:#666;
    }
    .main-category-block .cat-arrow{
        position: absolute;
        right: 15px;
    }
    .main-category-block .cat-arrow i{
        
    }
    .sub-category-block{
        display:none;
    }
    .subcategory-ul{
        margin-left:10px!important;
        margin-top:10px!important;
    }
</style>
<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <?php echo site_phrase('courses'); ?>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?php
                                if ($selected_category_id == "all") {
                                    echo site_phrase('all_category');
                                }else {
                                    $category_details = $this->crud_model->get_category_details_by_id($selected_category_id)->row_array();
                                    echo $category_details['name'];
                                }
                             ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>


<section class="category-course-list-area">
    <div class="container">
        <div class="category-filter-box filter-box clearfix">
            <span><?php echo site_phrase('showing_on_this_page'); ?> : <?php echo count($courses); ?></span>
            <a href="javascript::" onclick="toggleLayout('grid')" style="float: right; font-size: 19px; margin-left: 5px;"><i class="fas fa-th"></i></a>
            <a href="javascript::" onclick="toggleLayout('list')" style="float: right; font-size: 19px;"><i class="fas fa-th-list"></i></a>
            <a href="<?php echo site_url('home/courses'); ?>" style="float: right; font-size: 19px; margin-right: 5px;"><i class="fas fa-sync-alt"></i></a>
        </div>
        <div class="row">
            <div class="col-lg-3 filter-area">
                <div class="card">
                    <a href="javascript::"  style="color: unset;">
                        <div class="card-header filter-card-header" id="headingOne" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter">
                            <h6 class="mb-0">
                                <?php echo site_phrase('filter'); ?>
                                <i class="fas fa-sliders-h" style="float: right;"></i>
                            </h6>
                        </div>
                    </a>
                    <div id="collapseFilter" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body pt-0">
                            <div class="filter_type">
                                <h6><?php echo site_phrase('categories'); ?></h6>
                                <ul>
                                    <li class="">
                                        <div class="">
                                            <input type="radio" id="category_all" name="sub_category" tag="category" class="categories custom-radio" value="all" onclick="filter(this)" <?php if($selected_category_id == 'all') echo 'checked'; ?>>
                                            <label for="category_all"><?php echo site_phrase('all_category'); ?></label>
                                        </div>
                                    </li>
                            <?php
                            $counter = 1;
                            $categories = $this->db->select("id,name,slug,(SELECT count(id) as total_sub FROM category as sub_cat WHERE sub_cat.parent=category.id) AS total_sub_category")->where('parent',0)->order_by('name','ASC')->get('category')->result_array();
                            
                            if(!empty($categories))
                            {
                                foreach($categories as $key => $cat_value)
                                {  
                                
                                    if($cat_value['total_sub_category'] > 0)
                                    {
                                        echo
                                        '<li class="">
                                            <div class="main-category-block">
                                                <input type="radio" id="category_'.$cat_value['id'].'" class="categories custom-radio" value="'.$cat_value['slug'].'" tag="category" onclick="filter(this)" '.(($selected_category_id == $cat_value['id'] || $cat_parent_id == $cat_value['id']) ? ' checked' : '' ).'>
                                                <label for="category_'.$cat_value['id'].'">'.$cat_value['name'].'</label>
                                                <span class="cat-arrow" num="0" onclick="showsubcat('."this,'".$cat_value['id']."'".')">';
                                            echo  ($cat_parent_id == $cat_value['id'] || $selected_category_id == $cat_value['id']) ? '<i class="fa fa-angle-up"></i>' : '<i class="fa fa-angle-down"></i>';
                                            echo 
                                                '</span>
                                            </div>
                                            <div class="sub-category-block sub-cat-'.$cat_value['id'].'" '.(($cat_parent_id == $cat_value['id'] || $selected_category_id == $cat_value['id']) ? 'style="display:block;"' : '').'>
                                                <ul class="subcategory-ul">';
                                                $subcategorydata = $this->db->select('id,name,slug')->where('parent',$cat_value['id'])->order_by('name','ASC')->get('category')->result_array();
                                                foreach($subcategorydata as $sub_key => $sub_cat_value)
                                                {
                                                    echo 
                                                    '<li>
                                                        <div class="">
                                                            <input type="radio" id="category_'.$sub_cat_value['id'].'" tag="category" class="categories custom-radio" value="'.$sub_cat_value['slug'].'" onclick="filter(this)" '.(($selected_category_id == $sub_cat_value['id']) ? ' checked' : '' ).'>
                                                            <label for="category_'.$sub_cat_value['id'].'">'.$sub_cat_value['name'].'</label>
                                                        </div>
                                                    </li>';
                                                }
                                            echo 
                                                '</ul>
                                            </div>    
                                        </li>';   
                                    }
                                    else
                                    {
                                        echo
                                        '<li class="">
                                            <div class="main-cat">
                                                <input type="radio" id="category_'.$cat_value['id'].'" class="categories custom-radio" value="'.$cat_value['slug'].'" onclick="filter(this)">
                                                <label for="category_'.$cat_value['id'].'">'.$cat_value['name'].'</label>
                                            </div>
                                        </li>';
                                    }
                                }
                            }
                            ?>
                                </ul>
                            </div>
                            <hr>
                            <div class="filter_type">
                                <div class="form-group">
                                    <h6><?php echo site_phrase('price'); ?></h6>
                                    <ul>
                                        <li>
                                            <div class="">
                                                <input type="radio" id="price_all" name="price" class="prices custom-radio" value="all" onclick="filter(this)" <?php if($selected_price == 'all') echo 'checked'; ?>>
                                                <label for="price_all"><?php echo site_phrase('all'); ?></label>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="price_free" name="price" class="prices custom-radio" value="free" onclick="filter(this)" <?php if($selected_price == 'free') echo 'checked'; ?>>
                                                <label for="price_free"><?php echo site_phrase('free'); ?></label>
                                            </div>
                                            <div class="">
                                                <input type="radio" id="price_paid" name="price" class="prices custom-radio" value="paid" onclick="filter(this)" <?php if($selected_price == 'paid') echo 'checked'; ?>>
                                                <label for="price_paid"><?php echo site_phrase('paid'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="filter_type">
                                <h6><?php echo site_phrase('level'); ?></h6>
                                <ul>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="all" name="level" class="level custom-radio" value="all" onclick="filter(this)" <?php if($selected_level == 'all') echo 'checked'; ?>>
                                            <label for="all"><?php echo site_phrase('all'); ?></label>
                                        </div>
                                        <div class="">
                                            <input type="radio" id="beginner" name="level" class="level custom-radio" value="beginner" onclick="filter(this)" <?php if($selected_level == 'beginner') echo 'checked'; ?>>
                                            <label for="beginner"><?php echo site_phrase('beginner'); ?></label>
                                        </div>
                                        <div class="">
                                            <input type="radio" id="advanced" name="level" class="level custom-radio" value="advanced" onclick="filter(this)" <?php if($selected_level == 'advanced') echo 'checked'; ?>>
                                            <label for="advanced"><?php echo site_phrase('advanced'); ?></label>
                                        </div>
                                        <div class="">
                                            <input type="radio" id="intermediate" name="level" class="level custom-radio" value="intermediate" onclick="filter(this)" <?php if($selected_level == 'intermediate') echo 'checked'; ?>>
                                            <label for="intermediate"><?php echo site_phrase('intermediate'); ?></label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>
                            <div class="filter_type">
                                <h6><?php echo site_phrase('language'); ?></h6>
                                <ul>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="all_language" name="language" class="languages custom-radio" value="<?php echo 'all'; ?>" onclick="filter(this)" <?php if($selected_language == "all") echo 'checked'; ?>>
                                            <label for="<?php echo 'all_language'; ?>"><?php echo site_phrase('all'); ?></label>
                                        </div>
                                    </li>
                                    <?php
                                    $languages = $this->crud_model->get_all_languages();
                                    foreach ($languages as $language): ?>
                                        <li>
                                            <div class="">
                                                <input type="radio" id="language_<?php echo $language; ?>" name="language" class="languages custom-radio" value="<?php echo $language; ?>" onclick="filter(this)" <?php if($selected_language == $language) echo 'checked'; ?>>
                                                <label for="language_<?php echo $language; ?>"><?php echo ucfirst($language); ?></label>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <hr>
                            <div class="filter_type">
                                <h6><?php echo site_phrase('ratings'); ?></h6>
                                <ul>
                                    <li>
                                        <div class="">
                                            <input type="radio" id="all_rating" name="rating" class="ratings custom-radio" value="<?php echo 'all'; ?>" onclick="filter(this)" <?php if($selected_rating == "all") echo 'checked'; ?>>
                                            <label for="all_rating"><?php echo site_phrase('all'); ?></label>
                                        </div>
                                    </li>
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <li>
                                            <div class="">
                                                <input type="radio" id="rating_<?php echo $i; ?>" name="rating" class="ratings custom-radio" value="<?php echo $i; ?>" onclick="filter(this)" <?php if($selected_rating == $i) echo 'checked'; ?>>
                                                <label for="rating_<?php echo $i; ?>">
                                                    <?php for($j = 1; $j <= $i; $j++): ?>
                                                        <i class="fas fa-star" style="color: #f4c150;"></i>
                                                    <?php endfor; ?>
                                                    <?php for($j = $i; $j < 5; $j++): ?>
                                                        <i class="far fa-star" style="color: #dedfe0;"></i>
                                                    <?php endfor; ?>
                                                </label>
                                            </div>
                                        </li>
                                    <?php endfor; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="category-course-list">
                    <?php include 'category_wise_course_'.$layout.'_layout.php'; ?>
                    <?php if (count($courses) == 0): ?>
                        <?php echo site_phrase('no_result_found'); ?>
                    <?php endif; ?>
                </div>
                <nav>
                    <?php if ($selected_category_id == "all" && $selected_price == 0 && $selected_level == 'all' && $selected_language == 'all' && $selected_rating == 'all'){
                        echo $this->pagination->create_links();
                    }?>
                </nav>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">

function get_url() {
    var urlPrefix 	= '<?php echo site_url('home/courses?'); ?>'
    var urlSuffix = "";
    var slectedCategory = "";
    var selectedPrice = "";
    var selectedLevel = "";
    var selectedLanguage = "";
    var selectedRating = "";

    // Get selected category
    $('.categories:checked').each(function() {
        slectedCategory = $(this).attr('value');
    });

    // Get selected price
    $('.prices:checked').each(function() {
        selectedPrice = $(this).attr('value');
    });

    // Get selected difficulty Level
    $('.level:checked').each(function() {
        selectedLevel = $(this).attr('value');
    });

    // Get selected difficulty Level
    $('.languages:checked').each(function() {
        selectedLanguage = $(this).attr('value');
    });

    // Get selected rating
    $('.ratings:checked').each(function() {
        selectedRating = $(this).attr('value');
    });

    urlSuffix = "category="+slectedCategory+"&&price="+selectedPrice+"&&level="+selectedLevel+"&&language="+selectedLanguage+"&&rating="+selectedRating;
    var url = urlPrefix+urlSuffix;
    // alert(url);return false;
    return url;
}
function filter(e) {
    
    if($(e).attr('tag') == 'category')
    {
        $('.categories').prop('checked',false);
        $('.categories').removeAttr('checked');
        $(e).prop('checked',true);
    }
    
    
    var url = get_url();
    window.location.replace(url);
    //console.log(url);
}

function toggleLayout(layout) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/set_layout_to_session'); ?>',
        data : {layout : layout},
        success : function(response){
            location.reload();
        }
    });
}

function showToggle(elem, selector) {
    $('.'+selector).slideToggle(20);
    if($(elem).text() === "<?php echo site_phrase('show_more'); ?>")
    {
        $(elem).text('<?php echo site_phrase('show_less'); ?>');
    }
    else
    {
        $(elem).text('<?php echo site_phrase('show_more'); ?>');
    }
}

function showsubcat(e,tag_num)
{
    var num = 0;
    var html = '<i class="fa fa-angle-down"></i>';
    if($(e).attr('num') == '0')
    {
        var num = 1;
        var html = '<i class="fa fa-angle-up"></i>';
    }
    
    $(e).attr('num',num);
    $(e).html(html);
    
    $('.sub-cat-' + tag_num).toggle(700);
}
</script>
