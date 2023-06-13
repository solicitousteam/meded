<style>
.main {
    box-shadow: 0 0 24px rgba(0, 0, 0, 0.15);
    font-family: "Open Sans";
    width: 1170px;
    margin: 0 auto;
}

.price-table {
    width: 100%;
    border-collapse: collapse;
    border: 0 none;
}

.price-table tr:not(:last-child) {
    border-bottom: 1px solid rgba(0, 0, 0, 0.03);
}

.price-table tr td {
    border-left: 1px solid rgba(0, 0, 0, 0.05);
    padding: 8px 24px;
    font-size: 14px;
}

.price-table tr td:first-child {
    border-left: 0 none;
}

.price-table tr td:not(:first-child) {
    text-align: center;
}

.price-table tr:nth-child(even) {
    background-color: #FFFFFF;
}

.price-table tr:hover {
    background-color: #EEEEEE;
}

.price-table .fa-check {
    color: #2d368e;
}

.price-table .fa-times {
    color: #D8D6E3;
}

/* Highlighted column */
.price-table tr:nth-child(2n) td:nth-child(3) {
    background-color: rgba(216, 214, 227, 0.25);
}

.price-table tr td:nth-child(3) {
    background-color: rgba(216, 214, 227, 0.15);
    padding: 8px 48px;
}

.price-table tr td:nth-child(3) .fa-check,
.price-table tr:nth-child(2n) td:nth-child(3) .fa-check {
    /* color: #ffffff; */
}

/**/

.price-table tr.price-table-head td {
    font-size: 16px;
    font-weight: 600;
    font-family: "Montserrat";
    text-transform: uppercase;
}

.price-table tr.price-table-head {
    background-color: #2d368e;
    color: #FFFFFF;
}

.price-table td.price {
    color: #f43f54;
    padding: 16px 24px;
    font-size: 20px;
    font-weight: 600;
    font-family: "Montserrat";
}

.price-table td.price a {
    background-color: #2d368e;
    color: #FFFFFF;
    padding: 12px 32px;
    margin-top: 16px;
    font-size: 12px;
    font-weight: 600;
    font-family: "Montserrat";
    text-transform: uppercase;
    display: inline-block;
    border-radius: 64px;
}

.price-table td.price-table-popular {
    font-family: "Montserrat";
    border-top: 3px solid #2d368e;
    color: #2d368e;
    text-transform: uppercase;
    font-size: 12px;
    padding: 12px 48px;
    font-weight: 700;
}

.price-table .price-blank {
    background-color: #fafafa;
    border: 0 none;
}

.price-table svg {
    width: 90px;
    fill: #5336ca;
}
</style>
<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i
                                    class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <?php echo $page_title; ?>
                            </a>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">

                </h1>
            </div>
        </div>
    </div>
</section>
<?php
// echo $this->session->userdata('is_instructor');

$ListArray = [
    [
        'label' => '',
        'column' => 'is_most_popular',
        'type' => 'num',
        'true_value' => 'Most Popular',
        'false_value' => '',
    ],
    [
        'label' => '',
        'column' => 'subscription_plan_name',
        'type' => '',
    ],
    [
        'label' => '',
        'column' => 'subscription_plan_price',
        'type' => '',
    ],
    [
        'label' => '<a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Lifetime Access to the platform',
        'column' => 'subscription_plan_lifetime_access',
        'type' => 'num',
        'true_value' => '<i class="fas fa-check"></i>',
        'false_value' => '<i class="fas fa-times"></i>',
    ],
    [
        'label' => '<a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Number of courses you can create',
        'column' => 'subscription_plan_course_limit',
        'type' => '',
    ],
    [
        'label' => '<a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Number of Webinars',
        'column' => 'subscription_plan_webinar',
        'type' => '',
    ],
    [
        'label' => '<a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Number of students allowed to participate',
        'column' => 'subscription_plan_student_participate',
        'type' => '',
    ],
    [
        'label' => '<a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Banners',
        'column' => 'subscription_plan_banner',
        'type' => '',
    ],
    [
        'label' => '<a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Video tools access',
        'column' => 'subscription_plan_video_tool_access',
        'type' => 'num',
        'true_value' => '<i class="fas fa-check"></i>',
        'false_value' => '<i class="fas fa-times"></i>',
    ],
    [
        'label' => '<a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> MedEd team assistance for course/Webinar creation',
        'column' => 'subscription_plan_meded_team_assistant',
        'type' => 'num',
        'true_value' => '<i class="fas fa-check"></i>',
        'false_value' => '<i class="fas fa-times"></i>',
    ],
    [
        'label' => '<a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Access to social media uploads',
        'column' => 'subscription_plan_social_access',
        'type' => 'num',
        'true_value' => '<i class="fas fa-check"></i>',
        'false_value' => '<i class="fas fa-times"></i>',
    ],
    [
        'label' => '<a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Chatbot',
        'column' => 'subscription_plan_chatbot',
        'type' => 'num',
        'true_value' => '<i class="fas fa-check"></i>',
        'false_value' => '<i class="fas fa-times"></i>',
    ],
    [
        'label' => '<a href="#wordpress-asset-updates" class="price-table-help"><i class="far fa-fw fa-question-circle"></i></a> Profile analytics',
        'column' => 'subscription_plan_profile_analytics',
        'type' => '',
    ],
    [
        'label' => '',
        'column' => 'id',
        'type' => '',
    ],
];

$count_row = count($this->db->select('id')->where('subscription_plan_status', 'active')->get('subscription_plan')->result());

?>
<section class="category-course-list-area">
    <div class="container">
        <div class="main">
            <table class="price-table mt-5">
                <tbody>
                    <?php
                    $last_key = count($ListArray) - 1;
                    foreach ($ListArray as $ListKey => $ListValue) {
                        $class = ($ListValue['column'] == 'subscription_plan_name') ? ' class="price-table-head"' : ' ';
                        echo
                        '<tr' . $class . '>
                        <td>' . $ListValue['label'] . '</td>';
                        if (!empty($ListValue['column'])) {
                            $SubscriptionData = $this->db->select($ListValue['column'])->where('subscription_plan_status', 'active')->get('subscription_plan')->result_array();

                            foreach ($SubscriptionData as $skey => $SubValue) {
                                $output = '';
                                if ($ListValue['type'] == 'num') {
                                    $output = ($SubValue[$ListValue['column']] == 1) ? $ListValue['true_value'] : $ListValue['false_value'];
                                } else {
                                    if ($ListValue['column'] == 'subscription_plan_price') {
                                        $jsonvalue = json_decode($SubValue[$ListValue['column']]);
                                        $output = '<div style="font-size:20px;color:red;font-weight:600">';
                                        foreach ($jsonvalue as $jsonvalue) {
                                            $output .= "<br>Rs. " . $jsonvalue->amount . " / " . $jsonvalue->month . " Month";
                                        }
                                        $output .= '</div>';
                                    } else
                                        $output = strtoupper($SubValue[$ListValue['column']]);
                                }

                                $td_class = ($ListValue['column'] == 'is_most_popular' && $SubValue[$ListValue['column']] == 1) ? ' class="price-table-popular"' : ' ';

                                if ($last_key != $ListKey)
                                    echo '<td' . $td_class . '>' . $output . '</td>';
                                else {
                                    echo
                                    '<td class="price">
                                        <a href="' . base_url('user/subscribenow/' . $SubValue[$ListValue['column']]) . '">Get started</a>
                                    </td>';
                                }
                            }
                        } else {
                            for ($j = 0; $j < $count_row; $j++)
                                echo '<td></td>';
                        }
                        echo
                        '</tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).on('click', '.button_click', function(e) {
    e.preventDefault();
    Swal.fire({
        title: `Hello <?= (!empty($user_name)) ? ucwords($user_name) : 'Instructor'; ?>`,
        text: `You are just one step
away from joining
Meded, the Global
Medical Education
platform. We will revert
back in 48 hours.For
more info: meded.testing@gmail.com`,
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Login'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = $(this).attr('href');
        }
    })
})
</script>