<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');


        // SESSION DATA FOR IS INSTRUCTOR
        if (!$this->session->userdata('is_instructor')) {
            $logged_in_user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
            $this->session->set_userdata('is_instructor', $logged_in_user_details['is_instructor']);
        }

        // THIS FUNCTION DECIDES WHTHER THE ROUTE IS REQUIRES PUBLIC INSTRUCTOR.
        $this->get_protected_routes($this->router->method);

        // THIS MIDDLEWARE FUNCTION CHECKS WHETHER THE USER IS TRYING TO ACCESS INSTRUCTOR STUFFS.
        $this->instructor_authorization($this->router->method);
    }


    public function instructor_is_subscribe($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('subscription_status', 'active');
        $this->db->where('subscription_payment_status', 'confirm');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('subscription')->num_rows();
    }
    // 09-04-2022 start
    public function course_delete($id = 0)
    {
        if ($id > 0) {
            $fetchdata = $this->db->select('status,category_type')->where('id', $id)->get('course')->row();

            $this->db->where('id', $id)->delete('course');

            // echo base_url("user/courses_list?status=$fetchdata->status&category_type=$fetchdata->category_type");die;
            redirect(base_url("user/courses_list?status=$fetchdata->status&category_type=$fetchdata->category_type"));
        }
    }

    #function for open edit page
    public function course_redirect_form($id = 0)
    {
        $fetchdata = $this->db->select('category_type')->where('id', $id)->get('course')->row();

        if ($fetchdata->category_type == 0)
            redirect(base_url("user/course_form/course_edit/$id"));

        if ($fetchdata->category_type == 3)
            redirect(base_url("user/course_form/edit_video_learning/$id"));

        if ($fetchdata->category_type == 2)
            redirect(base_url("user/serial_learning/edit_form/$id"));

        if ($fetchdata->category_type == 1)
            redirect(base_url("user/webinar/edit_form/$id"));
    }
    // 09-04-2022 stop


    public function delete_live_class($id)
    {
        if ($this->session->userdata('user_login') == true) {

            $this->db->where('id', $id);
            $this->db->delete('live_class');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));

            redirect(site_url('user/live_class'));
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }
    public function start_live_class($id = '')
    {
        // IF ANY FUNCTION DOES NOT REQUIRE PUBLIC INSTRUCTOR, PUT THE NAME HERE.
        $unprotected_routes = ['save_course_progress'];

        $page_data['page_name'] = 'start_meet60';
        $page_data['course_data'] = $this->db->get_where('course', array('id' => $id))->row_array();
        $page_data['page_title'] = get_phrase('Live Class');
        
         if(!empty($_GET['sendnotification']))
        {
            $coursedata = $this->db->select("course.title,CONCAT(users.first_name,' ',users.last_name) as user_name")->from('course')->join('users','users.id=course.user_id')->where('course.id',$id)->get()->row();
    		$userdata = $this->db->select("device_token,users.id as user_id,CONCAT(users.first_name,' ',users.last_name) as user_name")->from('users')->join('enrol','enrol.user_id=users.id')->where('enrol.course_id!=',$id)->where('users.device_token!=','')->group_by('enrol.user_id')->get()->result();
    		if(!empty($userdata))
    		{
    		    foreach($userdata as $value)
    			{
    			    $message = ucwords("Hello $value->user_name, $coursedata->title Course live on meded by $coursedata->user_name. For more info. ".base_url('admin/start_live_class/'.$id));
    			    $notification = [
                        'title'=>ucwords('Live Course : '.$coursedata->title),
        				'body'=>$message,
                    ];
                
                    $notificationData['title'] = ucwords('Live Course : '.$coursedata->title);
                    $notificationData['description'] = $message;
                    $this->db->insert('notification', $notificationData);
                    $notification_id = $this->db->insert_id();
                    
                    $InsertNotificationUserArray = [
                        'notification_id' => $notification_id,
                        'user_id' => $value->user_id,
                        'read_status' => 0,
                    ];
                    $this->db->insert('notification_users', $InsertNotificationUserArray);;

    				// $topic = "Notify";
    				$url = 'https://fcm.googleapis.com/fcm/send';
    				$fields = array(
    					'to' => $value->device_token,
    					'notification' => $notification
    				);
    				// Firebase API Key
    				$headers = array(
    					'Authorization:key = AAAA14qKAws:APA91bGE_cUR-V3OgkExtXr-S7_SZKbBN4F69fnVq4QZYLfTgGqblegT_IFOCN9UUiFYDCRSus1blEItLusiAPPNwU_46_ktudweZns1nMxZR-CLZOD-YvHXlAsJDoC4twPs9oVKTcNE',
    					'Content-Type:application/json'
    				);
    		        //AAAA14qKAws:APA91bGE_cUR-V3OgkExtXr-S7_SZKbBN4F69fnVq4QZYLfTgGqblegT_IFOCN9UUiFYDCRSus1blEItLusiAPPNwU_46_ktudweZns1nMxZR-CLZOD-YvHXlAsJDoC4twPs9oVKTcNE
    				$ch = curl_init();
    				// Set the url, number of POST vars, POST data
    				curl_setopt($ch, CURLOPT_URL, $url);
    				curl_setopt($ch, CURLOPT_POST, true);
    				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    				// Disabling SSL Certificate support temporarly
    				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    				$result = curl_exec($ch);
    				if ($result === FALSE) {
    					die('Curl failed: ' . curl_error($ch));
    				}
    				curl_close($ch);
    			}
    		}
    		
    		redirect('admin/start_live_class/'.$id);
        }
        
        // $this->load->view('backend/index.php', $page_data);
        $this->load->view('backend/user/start_meet60', $page_data);
    }
    
    
    public function add_library_video($video_library_id)
    {
       
        $page_data['page_name'] = 'add_library_video';   
        $user_id = $this->session->userdata('user_id');

        $page_data['video_library'] = $this->db->get_where('tbl_video_library', array('video_library_id' => $video_library_id))->result();
        $page_data['page_title'] = get_phrase('Video Library');
        $this->load->view('backend/index.php', $page_data);
    }  
     public function add_library_video_c()
    {
       
        extract($_POST);
        if ($this->session->userdata('user_login') == true) {
              date_default_timezone_set('Asia/Kolkata');
            $currentTime = date('d-m-Y h:i:s A', time());
            $date_string = strtotime($currentTime);
            $picture = '';

            if (!empty($_FILES['picture']['name'])) {
                $config['upload_path'] = 'uploads/thumbnails/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|md4|xls|xlsx|doc|docx';
                $config['file_name'] = $date_string . $_FILES['picture']['name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = base_url() . 'uploads/thumbnails/' . $uploadData['file_name'];
                }
            }

            $data = array(
                'file' => $picture,
                "instructor" => $this->session->userdata('user_id'),
                "title" => $_POST['BannerURL']
            );

            $last_insert_id = $this->db->insert('library', $data);

            if ($last_insert_id) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('title_already_exists'));
            }
        }
        
    }
    
    
    public function video_library()
    {
       
        $page_data['page_name'] = 'video_library';   
        $user_id = $this->session->userdata('user_id');

        $page_data['video_library'] = $this->db->get_where('tbl_video_library', array('user_id' => $user_id))->result();
        $page_data['page_title'] = get_phrase('Video Library');
        $this->load->view('backend/index.php', $page_data);
    }
     public function add_video_library()
    {
       
        $page_data['page_name'] = 'add_video_library';
        $page_data['course_data'] = $this->db->get_where('course', array('id' => $id))->row_array();
        $page_data['page_title'] = get_phrase('Video Library');
        $this->load->view('backend/index.php', $page_data);
    }
    
    
    public function add_video_library_c()
    {
       
        extract($_POST);
        if ($this->session->userdata('user_login') == true) {
            $insert_array = array(
                'user_id' => $this->session->userdata('user_id'),
                'library_name' => $library_name,
                'added_on' => date('d-m-Y H:i:s'),
            );
            $this->db->insert('tbl_video_library', $insert_array);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));

            redirect(site_url('user/video_library'), 'refresh');
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }
    
    
    public function add_live_class()
    {
        extract($_POST);
        if ($this->session->userdata('user_login') == true) {
            $insert_array = array(
                'course_id' => $course_id,
                'date' => $live_class_schedule_date,
                'time' => $live_class_schedule_time,
                'note_to_students' => $note_to_students,
            );
            $this->db->insert('live_class', $insert_array);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));

            redirect(site_url('user/live_class'), 'refresh');
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }

    public function get_protected_routes($method)
    {
        // IF ANY FUNCTION DOES NOT REQUIRE PUBLIC INSTRUCTOR, PUT THE NAME HERE.
        $unprotected_routes = ['save_course_progress'];

        if (!in_array($method, $unprotected_routes)) {
            if (get_settings('allow_instructor') != 1) {
                redirect(site_url('home'), 'refresh');
            }
        }
    }

    public function instructor_authorization($method)
    {
        // IF THE USER IS NOT AN INSTRUCTOR HE/SHE CAN NEVER ACCESS THE OTHER FUNCTIONS EXCEPT FOR BELOW FUNCTIONS.
        if ($this->session->userdata('is_instructor') != 1) {
            $unprotected_routes = ['become_an_instructor', 'manage_profile', 'save_course_progress'];

            if (!in_array($method, $unprotected_routes)) {
                redirect(site_url('user/become_an_instructor'), 'refresh');
            }
        }
    }


    public function index()
    {

        if ($this->session->userdata('user_login') == true) {
            $this->dashboard();
            if ($this->session->userdata('is_instructor')) {
                if ($this->instructor_is_subscribe($this->session->userdata('user_id')) == 0) {
                    redirect(site_url('home/demo_video'), 'refresh');
                }
            }
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }

    /* public function start_live_class(){
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'start_live_class';
        $page_data['page_title'] = get_phrase('Live Class');
        $this->load->view('backend/index.php', $page_data);
    }*/

    public function dashboard()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('backend/index.php', $page_data);
    }




    public function live_class($ID = "")
    {
        
        
        
        if ($ID != "") {
            $LiveClass = $this->db->get_where('live_class', array('id' => $ID))->row_array();
            $page_data["live_class"] = $LiveClass;
        }
        
        $page_data['page_name'] = 'live_class';
        $page_data['page_title'] = "Live Class";
        $page_data['courses'] = $this->crud_model->filter_course_for_backend("all", $this->session->userdata('user_id'), "all", "all");
        $page_data['live_class_id'] = $ID;
        
      
        
        $this->load->view('backend/index.php', $page_data);
    }
    
    
    
    
    

    public function courses()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($this->session->userdata('is_instructor')) {
            if ($this->instructor_is_subscribe($this->session->userdata('user_id')) == 0) {
                redirect(site_url('home/demo_video'), 'refresh');
            }
        }
        //08-04-2022 start
        $page_data['search']   = isset($_GET['search']) ? $_GET['search'] : "";
        //08-04-2022 close

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = $this->session->userdata('user_id');
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";
        // $page_data['course_type']            = isset($_GET['course_type']) ? $_GET['course_type'] : "all";
        $page_data['courses']                = $this->user_model->get_instructor_course_page($page_data['selected_category_id'], $page_data['selected_price'], $page_data['selected_status'], $page_data['search']); //$page_data['course_type']
        $page_data['page_name']              = 'courses-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();
        $page_data['page_title']             = (isset($_GET['dashboard'])) ? get_phrase('courses') : get_phrase('active_courses');


        $this->load->view('backend/index', $page_data);
    }

    public function course()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($this->session->userdata('is_instructor')) {
            if ($this->instructor_is_subscribe($this->session->userdata('user_id')) == 0) {
                redirect(site_url('home/demo_video'), 'refresh');
            }
        }
        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = $this->session->userdata('user_id');
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";
        $page_data['courses']                = $this->crud_model->filter_course_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status']);
        $page_data['page_name']              = 'courses-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();
        $page_data['page_title']             = (isset($_GET['dashboard'])) ? get_phrase('courses') : get_phrase('active_courses');

        $this->load->view('backend/index', $page_data);
    }

    public function video_learning()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($this->session->userdata('is_instructor')) {
            if ($this->instructor_is_subscribe($this->session->userdata('user_id')) == 0) {
                redirect(site_url('home/demo_video'), 'refresh');
            }
        }
        //08-04-2022 start
        $page_data['search']   = isset($_GET['search']) ? $_GET['search'] : "";
        //08-04-2022 close

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = $this->session->userdata('user_id');
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";
        $page_data['courses']                = $this->crud_model->filter_video_learning_for_backend($page_data['selected_category_id'], $this->session->userdata('user_id'), $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);
        $page_data['page_name']              = 'video-learning-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();
        $page_data['page_title']             = get_phrase('active_courses');


        $this->load->view('backend/index', $page_data);
    }

    public function courses_list()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // $id = isset($_GET['id']);
        $status = (isset($_GET['status'])) ? $_GET['status'] : 'active';
        // $category = isset($_GET['category']);
        $category_type = (isset($_GET['category_type'])) ? $_GET['category_type'] : '0';


        $is_free = (isset($_GET['is_free'])) ? $_GET['is_free'] : '';


        // filter change start here
        //08-04-2022 start
        $page_data['search']   = isset($_GET['search']) ? $_GET['search'] : "";
        //08-04-2022 close

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = $this->session->userdata('user_id');
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";
        //filter change stop here

        if (!empty($_GET['filter_status'])) {
            $page_data['selected_status'] = $_GET['filter_status'];
            $status = $_GET['filter_status'];
        }

        $page_data['courses']                =  $this->crud_model->get_courses_list($status, $category_type, $is_free);


        $page_data['category_type'] = $category_type;
        $page_data['is_free'] = $is_free;

        // echo '<pre>';print_r($page_data['courses']);die;

        $page_data['page_name']              = 'course_list';
        $page_data['categories']             = $this->crud_model->get_categories();

        $page_data['page_title']             = get_phrase('active_courses');
        $this->load->view('backend/index', $page_data);
    }



    // This function is responsible for loading the course data from server side for datatable SILENTLY
    public function get_courses()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $courses = array();
        // Filter portion
        $filter_data['selected_category_id']   = $this->input->post('selected_category_id');
        $filter_data['selected_instructor_id'] = $this->input->post('selected_instructor_id');
        $filter_data['selected_price']         = $this->input->post('selected_price');
        $filter_data['selected_status']        = $this->input->post('selected_status');

        // Server side processing portion
        $columns = array(
            0 => '#',
            1 => 'title',
            2 => 'category',
            3 => 'lesson_and_section',
            4 => 'enrolled_student',
            5 => 'status',
            6 => 'price',
            7 => 'actions',
            8 => 'course_id'
        );

        // Coming from databale itself. Limit is the visible number of data
        $limit = html_escape($this->input->post('length'));
        $start = html_escape($this->input->post('start'));
        $order = "";
        $dir   = $this->input->post('order')[0]['dir'];

        $totalData = $this->lazyload->count_all_courses($filter_data);
        $totalFiltered = $totalData;

        // This block of code is handling the search event of datatable
        if (empty($this->input->post('search')['value'])) {
            $courses = $this->lazyload->courses($limit, $start, $order, $dir, $filter_data);
        } else {
            $search = $this->input->post('search')['value'];
            $courses =  $this->lazyload->course_search($limit, $start, $search, $order, $dir, $filter_data);
            $totalFiltered = $this->lazyload->course_search_count($search);
        }

        // Fetch the data and make it as JSON format and return it.
        $data = array();
        if (!empty($courses)) {
            foreach ($courses as $key => $row) {
                $instructor_details = $this->user_model->get_all_user($row->user_id)->row_array();
                $category_details = $this->crud_model->get_category_details_by_id($row->sub_category_id)->row_array();
                $sections = $this->crud_model->get_section('course', $row->id);
                $lessons = $this->crud_model->get_lessons('course', $row->id);
                $enroll_history = $this->crud_model->enrol_history($row->id);

                $status_badge = "badge-success-lighten";
                if ($row->status == 'pending') {
                    $status_badge = "badge-danger-lighten";
                } elseif ($row->status == 'draft') {
                    $status_badge = "badge-dark-lighten";
                }

                $price_badge = "badge-dark-lighten";
                $price = 0;
                if ($row->is_free_course == null) {
                    if ($row->discount_flag == 1) {
                        $price = currency($row->discounted_price);
                    } else {
                        $price = currency($row->price);
                    }
                } elseif ($row->is_free_course == 1) {
                    $price_badge = "badge-success-lighten";
                    $price = get_phrase('free');
                }

                $view_course_on_frontend_url = site_url('home/course/' . rawurlencode(slugify($row->title)) . '/' . $row->id);
                $edit_this_course_url = site_url('user/course_form/course_edit/' . $row->id);
                $section_and_lesson_url = site_url('user/course_form/course_edit/' . $row->id);

                if ($row->status == 'active' || $row->status == 'pending') {
                    $course_status_changing_action = "confirm_modal('" . site_url('user/course_actions/draft/' . $row->id) . "')";
                    $course_status_changing_message = get_phrase('mark_as_drafted');
                } else {
                    $course_status_changing_action = "confirm_modal('" . site_url('user/course_actions/publish/' . $row->id) . "')";
                    $course_status_changing_message = get_phrase('publish_this_course');
                }

                $delete_course_url = "confirm_modal('" . site_url('user/course_actions/delete/' . $row->id) . "')";

                if ($row->course_type != 'scorm') {
                    $section_and_lesson_menu = '<li><a class="dropdown-item" href="' . $section_and_lesson_url . '">' . get_phrase("section_and_lesson") . '</a></li>';
                } else {
                    $section_and_lesson_menu = "";
                }

                $action = '
                <div class="dropright dropright">
                <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="' . $view_course_on_frontend_url . '" target="_blank">Preview</a></li>
                <li><a class="dropdown-item" href="' . $edit_this_course_url . '">' . get_phrase("edit_this_course") . '</a></li>
                ' . $section_and_lesson_menu . '
                <li><a class="dropdown-item" href="javascript::" onclick="' . $course_status_changing_action . '">' . $course_status_changing_message . '</a></li>
                <li><a class="dropdown-item" href="javascript::" onclick="' . $delete_course_url . '">' . get_phrase("delete") . '</a></li>
                </ul>
                </div>
                ';

                $nestedData['#'] = $key + 1;

                $nestedData['title'] = '<strong><a href="' . site_url('user/course_form/course_edit/' . $row->id) . '">' . $row->title . '</a></strong><br>
                <small class="text-muted">' . get_phrase('instructor') . ': <b>' . $instructor_details['first_name'] . ' ' . $instructor_details['last_name'] . '</b></small>';

                $nestedData['category'] = '<span class="badge badge-dark-lighten">' . $category_details['name'] . '</span>';

                if ($row->course_type == 'scorm') {
                    $nestedData['lesson_and_section'] = '<span class="badge badge-info-lighten">' . get_phrase('scorm_course') . '</span>';
                } elseif ($row->course_type == 'general') {
                    $nestedData['lesson_and_section'] = '
                    <small class="text-muted"><b>' . get_phrase('total_section') . '</b>: ' . $sections->num_rows() . '</small><br>
                    <small class="text-muted"><b>' . get_phrase('total_lesson') . '</b>: ' . $lessons->num_rows() . '</small>';
                }

                $nestedData['enrolled_student'] = '<small class="text-muted"><b>' . get_phrase('total_enrolment') . '</b>: ' . $enroll_history->num_rows() . '</small>';

                $nestedData['status'] = '<span class="badge ' . $status_badge . '">' . get_phrase($row->status) . '</span>';

                $nestedData['price'] = '<span class="badge ' . $price_badge . '">' . $price . '</span>';

                $nestedData['actions'] = $action;

                $nestedData['course_id'] = $row->id;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($this->input->post('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);
    }

    public function course_actions($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == "add") {
            $course_id = $this->crud_model->add_course();
            $this->savecurriculum($course_id);
            $this->sendnotification($course_id,$this->session->userdata('user_id'));
            
            redirect(site_url('user/courses'), 'refresh');
        } elseif ($param1 == "edit") {
            $this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->update_course($param2);
            $this->savecurriculum($param2);
            // CHECK IF LIVE CLASS ADDON EXISTS, ADD OR UPDATE IT TO ADDON MODEL
            if (addon_status('live-class')) {
                $this->load->model('addons/Liveclass_model', 'liveclass_model');
                $this->liveclass_model->update_live_class($param2);
            }

            redirect(site_url('user/courses'), 'refresh');
        } elseif ($param1 == 'add_shortcut') {
            echo $this->crud_model->add_shortcut_course();
        } elseif ($param1 == 'delete') {
            $this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->delete_course($param2);
            redirect(site_url('user/courses'), 'refresh');
        } elseif ($param1 == 'draft') {
            $this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->change_course_status('draft', $param2);
            redirect(site_url('user/courses'), 'refresh');
        } elseif ($param1 == 'publish') {
            $this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->change_course_status('pending', $param2);
            redirect(site_url('user/courses'), 'refresh');
        } elseif ($param1 == "edit_video_learning") {
            //$this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->edit_video_learning($param2);
            $this->savecurriculum($param2);
            $this->session->set_flashdata('flash_message', get_phrase('course_updated_successfully'));
            redirect(site_url('user/video_learning/' . $param2), 'refresh');
        } elseif ($param1 == "edit_serial_learning") {
            //$this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->edit_serial_learning($param2);
            $this->savecurriculum($param2);
            $this->session->set_flashdata('flash_message', get_phrase('course_updated_successfully'));

            redirect(site_url('user/serial_learning/edit_form/' . $param2), 'refresh');
        } elseif ($param1 == 'deletevideo') {
            $this->db->where('id', $param2);
            $this->db->delete('course');
            redirect(site_url('user/video_learning'), 'refresh');
        }
    }
    public function video_learning_add($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // if ($param1 == "add") {
        // print_r($this->input->post);

        $course_id = $this->crud_model->add_video_learning();
        
        $this->savecurriculum($course_id);
        
        $this->sendnotification($course_id,$this->session->userdata('user_id'));
        
        // redirect(site_url('/user/course_form/edit_video_learning/' . $course_id), 'refresh');
        redirect(site_url('/user/video_learning'), 'refresh');


        // }
    }

    public function serial_learning_add($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // if ($param1 == "add") {
        // print_r($this->input->post);

        $course_id = $this->crud_model->add_serial_learning();
        
        $this->savecurriculum($course_id);
        
        $this->sendnotification($course_id,$this->session->userdata('user_id'));
        
        $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        redirect(site_url('user/serial_learning'), 'refresh');

        // }
    }


    public function course_form($param1 = "", $param2 = "")
    {

        if ($this->session->userdata('user_login') == true || $this->session->userdata('user_login') == true) {
            if ($param1 == 'add_course') {
                $page_data['languages'] = $this->crud_model->get_all_languages();
                $page_data['categories'] = $this->crud_model->get_categories();
                $page_data['page_name'] = 'course_add';
                $page_data['page_title'] = get_phrase('add_course');
                $this->load->view('backend/index', $page_data);
            } elseif ($param1 == 'add_course_shortcut') {
                $page_data['languages'] = $this->crud_model->get_all_languages();
                $page_data['categories'] = $this->crud_model->get_categories();
                $this->load->view('backend/user/course_add_shortcut', $page_data);
            } elseif ($param1 == 'course_edit') {
                $this->is_the_course_belongs_to_current_instructor($param2);
                $page_data['page_name'] = 'course_edit';
                $page_data['course_id'] =  $param2;
                $page_data['page_title'] = get_phrase('edit_course');
                $page_data['languages'] = $this->crud_model->get_all_languages();
                $page_data['categories'] = $this->crud_model->get_categories();
                
                $sectiondata = $this->db->where('course_id',$param2)->get('section')->result();
                $sectionarray = [];
                if(!empty($sectiondata))
                {
                    foreach($sectiondata as $sec_key => $sectionvalue)
                    {
                        $lessondata = $this->db->where('section_id',$sectionvalue->id)->get('lesson')->result();
                        
                        if(!empty($lessondata))
                        {
                            foreach($lessondata as $les_key => $lessonvalue)
                            {
                                $questiondata = $this->db->select('title,type,number_of_options,options,correct_answers')->where('quiz_id',$lessonvalue->id)->get('question')->result();
                                
                                $lessondata[$les_key]->questiondata = (!empty($questiondata)) ? $questiondata : [];
                            }
                            
                            $sectiondata[$sec_key]->lessondata = $lessondata;
                        }
                        $sectionarray[] = $sectiondata[$sec_key];
                    }
                }
                $page_data['sectiondata'] = $sectionarray;
            
                $this->load->view('backend/index', $page_data);
            } elseif ($param1 == 'video_learning') {
                $page_data['languages'] = $this->crud_model->get_all_languages();
                $page_data['categories'] = $this->crud_model->get_categories();

                $page_data['page_name'] = 'video_learning';

                $this->load->view('backend/index', $page_data);
            } elseif ($param1 == 'edit_video_learning') {
                $page_data['page_name'] = 'edit_video_learning';
                $page_data['course_id'] =  $param2;
                $page_data['page_title'] = get_phrase('edit_video_learning');
                $page_data['languages'] = $this->crud_model->get_all_languages();
                
                $sectiondata = $this->db->where('course_id',$param2)->get('section')->result();
                $sectionarray = [];
                if(!empty($sectiondata))
                {
                    foreach($sectiondata as $sec_key => $sectionvalue)
                    {
                        $lessondata = $this->db->where('section_id',$sectionvalue->id)->get('lesson')->result();
                        
                        if(!empty($lessondata))
                        {
                            foreach($lessondata as $les_key => $lessonvalue)
                            {
                                $questiondata = $this->db->select('title,type,number_of_options,options,correct_answers')->where('quiz_id',$lessonvalue->id)->get('question')->result();
                                
                                $lessondata[$les_key]->questiondata = (!empty($questiondata)) ? $questiondata : [];
                            }
                            
                            $sectiondata[$sec_key]->lessondata = $lessondata;
                        }
                        $sectionarray[] = $sectiondata[$sec_key];
                    }
                }
                $page_data['sectiondata'] = $sectionarray;
                
                $page_data['categories'] = $this->crud_model->get_categories();

                $this->load->view('backend/index', $page_data);
            } elseif ($param1 == 'view_video_learning') {
                $page_data['languages'] = $this->crud_model->get_all_languages();
                $page_data['categories'] = $this->crud_model->get_categories();

                $page_data['page_name'] = 'view_video_learning';

                $this->load->view('backend/index', $page_data);
            } elseif ($param1 == 'delete_video_learning') {
                $page_data['languages'] = $this->crud_model->get_all_languages();
                $page_data['categories'] = $this->crud_model->get_categories();

                $page_data['page_name'] = 'edit_video_learning';

                $this->load->view('backend/index', $page_data);
            }
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }

    public function payout_settings($param1 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'paypal_settings') {
            $this->user_model->update_instructor_paypal_settings($this->session->userdata('user_id'));
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(site_url('user/payout_settings'), 'refresh');
        }
        if ($param1 == 'stripe_settings') {
            $this->user_model->update_instructor_stripe_settings($this->session->userdata('user_id'));
            $this->session->set_flashdata('flash_message', get_phrase('updated'));
            redirect(site_url('user/payout_settings'), 'refresh');
        }

        $page_data['page_name'] = 'payment_settings';
        $page_data['page_title'] = get_phrase('payout_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function sales_report($param1 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 != "") {
            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0] . ' 00:00:00');
            $page_data['timestamp_end']   = strtotime($date_range[1] . ' 23:59:59');
        } else {
            $page_data['timestamp_start'] = strtotime(date("m/01/Y 00:00:00"));
            $page_data['timestamp_end']   = strtotime(date("m/t/Y 23:59:59"));
        }

        $page_data['payment_history'] = $this->crud_model->get_instructor_revenue($this->session->userdata('user_id'), $page_data['timestamp_start'], $page_data['timestamp_end']);
        $page_data['page_name'] = 'sales_report';
        $page_data['page_title'] = get_phrase('sales_report');
        $this->load->view('backend/index', $page_data);
    }

    public function preview($course_id = '')
    {
        if ($this->session->userdata('user_login') != 1)
            redirect(site_url('login'), 'refresh');

        $this->is_the_course_belongs_to_current_instructor($course_id);
        if ($course_id > 0) {
            $courses = $this->crud_model->get_course_by_id($course_id);
            if ($courses->num_rows() > 0) {
                $course_details = $courses->row_array();
                redirect(site_url('home/lesson/' . rawurlencode(slugify($course_details['title'])) . '/' . $course_details['id']), 'refresh');
            }
        }
        redirect(site_url('user/courses'), 'refresh');
    }

    public function sections($param1 = "", $param2 = "", $param3 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param2 == 'add') {
            $this->is_the_course_belongs_to_current_instructor($param1);
            $this->crud_model->add_section($param1);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_added_successfully'));
        } elseif ($param2 == 'edit') {
            $this->is_the_course_belongs_to_current_instructor($param1, $param3, 'section');
            $this->crud_model->edit_section($param3);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_updated_successfully'));
        } elseif ($param2 == 'delete') {
            $this->is_the_course_belongs_to_current_instructor($param1, $param3, 'section');
            $this->crud_model->delete_section($param1, $param3);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_deleted_successfully'));
        }
        redirect(site_url('user/course_form/course_edit/' . $param1));
    }

    public function lessons($course_id = "", $param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == 'add') {
            $this->is_the_course_belongs_to_current_instructor($course_id);
            $this->crud_model->add_lesson();
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_added_successfully'));
            redirect('user/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'edit') {
            $this->is_the_course_belongs_to_current_instructor($course_id, $param2, 'lesson');
            $this->crud_model->edit_lesson($param2);
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_updated_successfully'));
            redirect('user/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'delete') {
            $this->is_the_course_belongs_to_current_instructor($course_id, $param2, 'lesson');
            $this->crud_model->delete_lesson($param2);
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_deleted_successfully'));
            redirect('user/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'filter') {
            redirect('user/lessons/' . $this->input->post('course_id'));
        }
        $page_data['page_name'] = 'lessons';
        $page_data['lessons'] = $this->crud_model->get_lessons('course', $course_id);
        $page_data['course_id'] = $course_id;
        $page_data['page_title'] = get_phrase('lessons');
        $this->load->view('backend/index', $page_data);
    }

    // Manage Quizes
    public function quizes($course_id = "", $action = "", $quiz_id = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($action == 'add') {
            $this->is_the_course_belongs_to_current_instructor($course_id);
            $this->crud_model->add_quiz($course_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_added_successfully'));
        } elseif ($action == 'edit') {
            $this->is_the_course_belongs_to_current_instructor($course_id, $quiz_id, 'quize');
            $this->crud_model->edit_quiz($quiz_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_updated_successfully'));
        } elseif ($action == 'delete') {
            $this->is_the_course_belongs_to_current_instructor($course_id, $quiz_id, 'quize');
            $this->crud_model->delete_lesson($quiz_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_deleted_successfully'));
        }
        redirect(site_url('user/course_form/course_edit/' . $course_id));
    }

    // Manage Quize Questions
    public function quiz_questions($quiz_id = "", $action = "", $question_id = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $quiz_details = $this->crud_model->get_lessons('lesson', $quiz_id)->row_array();

        if ($action == 'add') {
            $this->is_the_course_belongs_to_current_instructor($quiz_details['course_id'], $quiz_id, 'quize');
            $response = $this->crud_model->add_quiz_questions($quiz_id);
            echo $response;
        } elseif ($action == 'edit') {
            if ($this->db->get_where('question', array('id' => $question_id, 'quiz_id' => $quiz_id))->num_rows() <= 0) {
                $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_quiz_question'));
                redirect(site_url('user/courses'), 'refresh');
            }

            $response = $this->crud_model->update_quiz_questions($question_id);
            echo $response;
        } elseif ($action == 'delete') {
            if ($this->db->get_where('question', array('id' => $question_id, 'quiz_id' => $quiz_id))->num_rows() <= 0) {
                $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_quiz_question'));
                redirect(site_url('user/courses'), 'refresh');
            }

            $response = $this->crud_model->delete_quiz_question($question_id);
            $this->session->set_flashdata('flash_message', get_phrase('question_has_been_deleted'));
            redirect(site_url('user/course_form/course_edit/' . $quiz_details['course_id']));
        }
    }

    function manage_profile()
    {
        redirect(site_url('home/profile/user_profile'), 'refresh');
    }

    function save_banner_request()
    {
        $picture = '';
        
        
        if($_POST['banner_id'] > 0 )
            $picture = $this->db->select('image')->from('banner_request')->where('id',$_POST['banner_id'])->get()->row()->image;
        
        if (!empty($_FILES['document']['name']))
        {
            $config['upload_path'] = 'uploads/thumbnails/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = $date_string . $_FILES['document']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('document')) {
                $uploadData = $this->upload->data();
                $picture = base_url() . 'uploads/thumbnails/' . $uploadData['file_name'];
            }
        }
        
        $banner_id = $_POST['banner_id'];    
    
        $data = $_POST;
        $data["image"] = $picture;
        unset($data['banner_id']);
        
        
        if($banner_id > 0)
            $this->db->where('id',$banner_id)->update('banner_request', $data);
        else
            $this->db->insert('banner_request', $data);
        
        $this->session->set_flashdata('flash_message', get_phrase(($banner_id>0) ? 'Banner Update successfully' : 'Banner Request send successfully'));
        redirect(site_url('user/ads_library'), 'refresh');
    }

    function banner_request($id = 0)
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'banner_request';
        $page_data['page_title'] = "Banner Request";
        
        $page_data['bannerdata'] = $this->db->where('id',$id)->get('banner_request')->row();
        $page_data['banner_id'] = $id;
        $this->load->view('backend/index', $page_data);
    }

    function delete_banner($banner_id = 0)
    {
        $this->db->where('id',$banner_id)->delete('banner_request');
        $this->session->set_flashdata('flash_message', 'Selected banner Deleted SuccessFully');
        redirect(site_url('user/ads_library'), 'refresh');
    }
    
    function library($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_form') {
            $page_data['page_name'] = 'add_library';
            $page_data['page_title'] = get_phrase('banner');
            $this->load->view('backend/index', $page_data);
        }
        if ($param1 == "edit_form") {
            $page_data['BannerData'] = $this->db->get_where('library', array("id" => $param2))->row_array();
            $page_data['page_name'] = 'edit_library';
            $page_data['page_title'] = "Library";
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'add') {
            date_default_timezone_set('Asia/Kolkata');
            $currentTime = date('d-m-Y h:i:s A', time());
            $date_string = strtotime($currentTime);
            $picture = '';

            if (!empty($_FILES['picture']['name'])) {
                $config['upload_path'] = 'uploads/thumbnails/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|md4|xls|xlsx|doc|docx';
                $config['file_name'] = $date_string . $_FILES['picture']['name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = base_url() . 'uploads/thumbnails/' . $uploadData['file_name'];
                }
            }

            $data = array(
                'file' => $picture,
                "instructor" => $this->session->userdata('user_id'),
                "title" => $_POST['BannerURL']
            );

            $last_insert_id = $this->db->insert('library', $data);

            if ($last_insert_id) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('category_name_already_exists'));
            }
            redirect(site_url('user/library'), 'refresh');
        } elseif ($param1 == 'save_edit') {
            date_default_timezone_set('Asia/Kolkata');
            $currentTime = date('d-m-Y h:i:s A', time());
            $date_string = strtotime($currentTime);
            $picture = '';

            if (!empty($_FILES['picture']['name'])) {
                $config['upload_path'] = 'uploads/thumbnails/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $date_string . $_FILES['picture']['name'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = base_url() . 'uploads/thumbnails/' . $uploadData['file_name'];
                }
            }

            if ($picture != "") {
                $data = array(
                    'file' => $picture,
                    "title" => $_POST['BannerURL']
                );
            } else {
                $data = array(
                    "title" => $_POST['BannerURL']
                );
            }

            $this->db->where('id', $param2);
            $this->db->update('library', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(site_url('user/library'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->db->where('id', $param2);
            $result = $this->db->delete('library');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('user/library'), 'refresh');
        }
        if ($param1 == '') {
            $page_data['page_name'] = 'library';
            $page_data['page_title'] = "Library";
            $this->load->view('backend/index', $page_data);
        }
    }

    function invoice($payment_id = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'invoice';
        $page_data['payment_details'] = $this->crud_model->get_payment_details_by_id($payment_id);
        $page_data['page_title'] = get_phrase('invoice');
        $this->load->view('backend/index', $page_data);
    }


    function become_an_instructor()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        // CHEKING IF A FORM HAS BEEN SUBMITTED FOR REGISTERING AN INSTRUCTOR
        if (isset($_POST) && !empty($_POST)) {
            $this->user_model->post_instructor_application();
        }

        // CHECK USER AVAILABILITY
        $user_details = $this->user_model->get_all_user($this->session->userdata('user_id'));
        if ($user_details->num_rows() > 0) {
            $page_data['user_details'] = $user_details->row_array();
        } else {
            $this->session->set_flashdata('error_message', get_phrase('user_not_found'));
            $this->load->view('backend/index', $page_data);
        }
        $page_data['page_name'] = 'become_an_instructor';
        $page_data['page_title'] = get_phrase('become_an_instructor');
        $this->load->view('backend/index', $page_data);
    }


    // PAYOUT REPORT
    public function payout_report()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'payout_report';
        $page_data['page_title'] = get_phrase('payout_report');

        $page_data['payouts'] = $this->crud_model->get_payouts($this->session->userdata('user_id'), 'user');
        $page_data['total_pending_amount'] = $this->crud_model->get_total_pending_amount($this->session->userdata('user_id'));
        $page_data['total_payout_amount'] = $this->crud_model->get_total_payout_amount($this->session->userdata('user_id'));
        $page_data['requested_withdrawal_amount'] = $this->crud_model->get_requested_withdrawal_amount($this->session->userdata('user_id'));

        $this->load->view('backend/index', $page_data);
    }

    // HANDLED WITHDRAWAL REQUESTS
    public function withdrawal($action = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($action == 'request') {
            $this->crud_model->add_withdrawal_request();
        }

        if ($action == 'delete') {
            $this->crud_model->delete_withdrawal_request();
        }

        redirect(site_url('user/payout_report'), 'refresh');
    }
    // Ajax Portion
    
    public function ajax_get_video_details()
    {
        $video_details = $this->video_model->getVideoDetails($_POST['video_url']);
        echo $video_details['duration'];
    }

    // this function is responsible for managing multiple choice question
    
    function manage_multiple_choices_options()
    {
        $page_data['number_of_options'] = $this->input->post('number_of_options');
        $this->load->view('backend/user/manage_multiple_choices_options', $page_data);
    }

    // This function checks if this course belongs to current logged in instructor
    function is_the_course_belongs_to_current_instructor($course_id, $id = null, $type = null)
    {
        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
        if ($course_details['user_id'] != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_course'));
            redirect(site_url('user/courses'), 'refresh');
        }

        if ($type == 'section' && $this->db->get_where('section', array('id' => $id, 'course_id' => $course_id))->num_rows() <= 0) {
            $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_section'));
            redirect(site_url('user/courses'), 'refresh');
        }
        if ($type == 'lesson' && $this->db->get_where('lesson', array('id' => $id, 'course_id' => $course_id))->num_rows() <= 0) {
            $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_lesson'));
            redirect(site_url('user/courses'), 'refresh');
        }
        if ($type == 'quize' && $this->db->get_where('lesson', array('id' => $id, 'course_id' => $course_id))->num_rows() <= 0) {
            $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_quize'));
            redirect(site_url('user/courses'), 'refresh');
        }
    }

    public function ajax_sort_section()
    {
        $section_json = $this->input->post('itemJSON');
        $this->crud_model->sort_section($section_json);
    }
    public function ajax_sort_lesson()
    {
        $lesson_json = $this->input->post('itemJSON');
        $this->crud_model->sort_lesson($lesson_json);
    }
    public function ajax_sort_question()
    {
        $question_json = $this->input->post('itemJSON');
        $this->crud_model->sort_question($question_json);
    }

    // Mark this lesson as completed codes
    function save_course_progress()
    {
        $response = $this->crud_model->save_course_progress();
        echo $response;
    }

    function support_contact()
    {

        redirect(site_url('home/support_contact'), 'refresh');
    }

    function serial_learning($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('is_instructor')) {
            if ($this->instructor_is_subscribe($this->session->userdata('user_id')) == 0) {
                redirect(site_url('home/demo_video'), 'refresh');
            }
        }

        //08-04-2022 start
        $page_data['search']   = isset($_GET['search']) ? $_GET['search'] : "";
        //08-04-2022 close

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = isset($_GET['instructor_id']) ? $_GET['instructor_id'] : "all";
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";

        // Courses query is used for deciding if there is any course or not. Check the view you will get it
        $page_data['courses']                = $this->crud_model->filter_serial_learning_for_backend($page_data['selected_category_id'], $this->session->userdata('user_id'), $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);
        $page_data['status_wise_courses']    = $this->crud_model->get_status_wise_courses();
        $page_data['instructors']            = $this->user_model->get_instructor()->result_array();
        $page_data['page_name']              = 'courses-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();


        if ($param1 == "add_form") {
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $page_data['page_name'] = 'add_serial';
            $page_data['page_title'] = get_phrase('add_serial_learning');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == "edit_form") {
            $page_data['page_name'] = 'edit-serial-learning';
            $page_data['course_id'] =  $param2;
            $page_data['page_title'] = get_phrase('edit_serial_learning');
            $page_data['languages'] = $this->crud_model->get_all_languages();
            
            $sectiondata = $this->db->where('course_id',$param2)->get('section')->result();
            $sectionarray = [];
            if(!empty($sectiondata))
            {
                foreach($sectiondata as $sec_key => $sectionvalue)
                {
                    $lessondata = $this->db->where('section_id',$sectionvalue->id)->get('lesson')->result();
                    
                    if(!empty($lessondata))
                    {
                        foreach($lessondata as $les_key => $lessonvalue)
                        {
                            $questiondata = $this->db->select('title,type,number_of_options,options,correct_answers')->where('quiz_id',$lessonvalue->id)->get('question')->result();
                            
                            $lessondata[$les_key]->questiondata = (!empty($questiondata)) ? $questiondata : [];
                        }
                        
                        $sectiondata[$sec_key]->lessondata = $lessondata;
                    }
                    $sectionarray[] = $sectiondata[$sec_key];
                }
            }
            $page_data['sectiondata'] = $sectionarray;
                
            $page_data['categories'] = $this->crud_model->get_categories();

            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'add') {
            $data = $_POST;

            $this->crud_model->add_serial_learning();
            redirect(site_url('home/serial_learning'), 'refresh');
        } elseif ($param1 == 'update') {
            $data = $_POST;

            $this->db->where('id', $param2);
            $this->db->update('serial_learning', $data);

            redirect(site_url('home/serial_learning'), 'refresh');
        } elseif ($param1 == "delete") {

            $this->db->where(['id' => $param2]);

            $result = $this->db->delete('serial_learning');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('home/serial_learning'), 'refresh');
        } elseif ($param1 == "") {

            $page_data['page_name'] = 'serial_learning';
            $page_data['page_title'] = get_phrase('serial_learning');
            $page_data['courses'] =  $this->crud_model->filter_serial_learning_for_backend($page_data['selected_category_id'], $this->session->userdata('user_id'), $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);
            // echo '<prE>';print_r($page_data);die;
            $this->load->view('backend/index', $page_data);
        }
    }

    public function webinar($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('is_instructor')) {
            if ($this->instructor_is_subscribe($this->session->userdata('user_id')) == 0) {
                redirect(site_url('home/demo_video'), 'refresh');
            }
        }
        $course_media = 'course_thumbnail';


        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = isset($_GET['instructor_id']) ? $_GET['instructor_id'] : "all";
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";

        //08-04-2022 start
        $page_data['search']   = isset($_GET['search']) ? $_GET['search'] : "";
        //08-04-2022 close

        // Courses query is used for deciding if there is any course or not. Check the view you will get it
        //$page_data['courses']                = $this->crud_model->filter_course_for_backend($page_data['selected_category_id'], $this->session->userdata('user_id'), $page_data['selected_price'], $page_data['selected_status']);
        $page_data['status_wise_courses']    = $this->crud_model->get_status_wise_courses();
        $page_data['instructors']            = $this->user_model->get_instructor()->result_array();
        $page_data['page_name']              = 'courses-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();





        if ($param1 == 'add_form') {
            $page_data['page_name'] = 'add_webinar';
            $page_data['page_title'] = get_phrase('webinar');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == "edit_form") {
            $page_data['webinar'] = $this->db->where('id', $param2)->get('course')->row();

            $page_data['BannerData'] = $this->db->get_where('coupons', array("id" => $param2))->row_array();
            $page_data['page_name'] = 'edit_webinar';
            $page_data['page_title'] = get_phrase('webinar');
            // print_r($page_data['webinar']);die;
            
            $sectiondata = $this->db->where('course_id',$param2)->get('section')->result();
            $sectionarray = [];
            if(!empty($sectiondata))
            {
                foreach($sectiondata as $sec_key => $sectionvalue)
                {
                    $lessondata = $this->db->where('section_id',$sectionvalue->id)->get('lesson')->result();
                    
                    if(!empty($lessondata))
                    {
                        foreach($lessondata as $les_key => $lessonvalue)
                        {
                            $questiondata = $this->db->select('title,type,number_of_options,options,correct_answers')->where('quiz_id',$lessonvalue->id)->get('question')->result();
                            
                            $lessondata[$les_key]->questiondata = (!empty($questiondata)) ? $questiondata : [];
                        }
                        
                        $sectiondata[$sec_key]->lessondata = $lessondata;
                    }
                    $sectionarray[] = $sectiondata[$sec_key];
                }
            }
            $page_data['sectiondata'] = $sectionarray;
            
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'add') {
            $course_id = $this->crud_model->add_webinar();
            
            $this->savecurriculum($course_id);
            
            $this->sendnotification($course_id,$this->session->userdata('user_id'));
            
            redirect(site_url('user/webinar'), 'refresh');
        } elseif ($param1 == 'update')
        {
            // echo '<pre>';print_r($_POST);die;
            $GetFiles = $this->rearrange_files($_FILES["attachement"]);

            $Afiles = array();

            foreach ($GetFiles as $Ke => $GD) {
                $Name = date("ymdhisa") . $Ke . $GD["name"];

                $Name = str_replace("#", "", $Name);
                $Name = str_replace("/", "", $Name);
                $Name = str_replace("'", "", $Name);

                move_uploaded_file($GD['tmp_name'], 'uploads/webinar/attachement/' . $Name);
                $Afiles[] = $Name;
            }

            $UploadArray = $_POST;
            if (count($Afiles) > 0) {
                $UploadArray["attachement"] = json_encode($Afiles);
            }
            $UploadArray['proposed_date'] = $this->input->post('proposed_date');
            $UploadArray['proposed_time'] = $this->input->post('proposed_time');
            $UploadArray['first_name'] = $this->input->post('first_name');
            $UploadArray['last_name'] = $this->input->post('last_name');
            $UploadArray['email'] = $this->input->post('email');
            $UploadArray['title'] = $this->input->post('title');
            $UploadArray['duration'] = $this->input->post('duration');
            $UploadArray['pain_point'] = $this->input->post('pain_point');
            $UploadArray['cta'] = $this->input->post('cta');
            $UploadArray['category_type'] = '1';
            if ($_FILES["thumbnail"]['name'] != "")
            {
                $UploadArray['thumbnail'] = 'uploads/thumbnails/course_thumbnails/webinar_thumb_'.time().rand(111,9999).$course_id.'.'.explode('.',$_FILES["thumbnail"]['name'])[1];
                move_uploaded_file($_FILES["thumbnail"]['tmp_name'], $UploadArray['course_thumbnail']);
                
                $UploadArray['thumbnail'] = base_url($UploadArray['thumbnail']);
            }

            $UploadArray['price'] = $_POST['price'];
            $UploadArray['discount_flag'] = $_POST['discount_flag'];
            $UploadArray['discounted_price'] = $_POST['discounted_price'];

            $UploadArray['objectives'] = $this->trim_and_return_json($this->input->post('objectives'));
            $UploadArray['outcomes'] = $this->trim_and_return_json($this->input->post('outcomes'));

            $UploadArray['format'] = $this->input->post('format');
            if ($UploadArray['format'] == 'other') {
                $UploadArray['other_format'] = $this->input->post('other_format');
            }

            $UploadArray['anything_else'] = $this->input->post('anything_else');
                
            #------------------------------------
            unset($UploadArray['section']);
            unset($UploadArray['section_sub_name']);
            unset($UploadArray['section_quiz_title']);
            unset($UploadArray['section_quiz_instruction']);
            unset($UploadArray['question_name']);
            unset($UploadArray['correct_answer']);
            unset($UploadArray['question_option']);
            unset($UploadArray['section_lesson_type']);
            unset($UploadArray['section_lesson_title']);
            unset($UploadArray['lesson_form']);
            
            if(!empty($UploadArray['total_section']))
            {
                for($i=0;$i<=$UploadArray['total_section'];$i++)
                {
                    unset($UploadArray['section_sub_div_'.$i]);
                }
            }
            unset($UploadArray['section_div']);
            unset($UploadArray['total_section']);
            #------------------------------------
    
            //   print_r($UploadArray); die;
            $this->db->where('id', $param2);
            $last_insert_id = $this->db->update('course', $UploadArray);
            
            $this->savecurriculum($param2);
            
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(site_url('user/webinar/edit_form/' . $param2), 'refresh');
        } elseif ($param1 == 'save_edit') {
            $data = array(
                'code' => $_POST['code'],
                'coupon_type' => $_POST['coupon_type'],
                'coupon_amount' => $_POST['coupon_amount'],
                'courses_id' => $_POST['courses_id'],
                'expiry_date' => $_POST['expiry_date'],
                'status' => $_POST['status']
            );

            $this->db->where('id', $param2);
            $this->db->update('coupons', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(site_url('user/webinar'), 'refresh');
        } elseif ($param1 == "delete") {

            $this->db->where('id', $param2);
            $result = $this->db->delete('course');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('user/webinar'), 'refresh');
        }
        if ($param1 == '') {
            $page_data['page_name'] = 'webinar';
            $page_data['page_title'] = get_phrase('webinar');

            $page_data['webinar']                = $this->crud_model->filter_webinar_for_backend($page_data['selected_category_id'], $_SESSION['user_id'], $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);
            $this->load->view('backend/index', $page_data);
        }
    }

    function trim_and_return_json($untrimmed_array)
    {
        $trimmed_array = array();
        if (sizeof($untrimmed_array) > 0) {
            foreach ($untrimmed_array as $row) {
                if ($row != "") {
                    array_push($trimmed_array, $row);
                }
            }
        }
        return json_encode($trimmed_array);
    }

    function rearrange_files($arr)
    {
        foreach ($arr as $key => $all) {
            foreach ($all as $i => $val) {
                $new_array[$i][$key] = $val;
            }
        }
        return $new_array;
    }

    // 12-04-2022 start
    public function getnotification()
    {
        $user_id = $this->session->userdata('user_id');

        //notification_users.read_status='0'
        $date = date('Y-m-d', strtotime('-7 days'));
        $Data = $this->db->query("SELECT notification.title,notification.description,notification_users.id as notification_user_id,notification.ts as entry_date,notification_users.read_status FROM notification INNER JOIN notification_users ON notification_users.notification_id=notification.id WHERE notification_users.user_id='$user_id' AND DATE(`ts`) >= '$date' ORDER BY notification.id DESC")->result();

        echo json_encode(['Status' => (!empty($Data)) ? 200 : 400, 'Count' => count($Data), 'Data' => $Data]);
    }

    public function markasread()
    {

        $updateStatus = [
            'read_status' => 1,
        ];


        $this->db->where('user_id', $this->session->userdata('user_id'));
        if (!empty($_POST['id'])) {
            $this->db->where('id', $_POST['id']);
        }

        $this->db->update('notification_users', $updateStatus);

        echo json_encode(['Status' => 200, 'Count' => 1, 'Data' => $updateStatus]);
    }
    // 12-04-2022 stop


    /*25-04*-2022 start*/
    public function courses_enrolled($param1 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($this->session->userdata('is_instructor')) {
            if ($this->instructor_is_subscribe($this->session->userdata('user_id')) == 0) {
                redirect(site_url('home/demo_video'), 'refresh');
            }
        }
        if ($param1 != "") {
            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0]);
            $page_data['timestamp_end']   = strtotime($date_range[1]);
        } else {
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:00';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $page_data['timestamp_start']   = strtotime($first_day_of_month);
            $page_data['timestamp_end']     = strtotime($last_day_of_month);
        }
        $page_data['page_name'] = 'courses_enrolled';
        // $page_data['enrol_history'] = $this->crud_model->courses_enrol_history_by_date_range($page_data['timestamp_start'], $page_data['timestamp_end']);
        $page_data['page_title'] = 'Courses Enrolled';
        $this->load->view('backend/index', $page_data);
    }

    public function enrol_history($param1 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 != "") {
            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0]);
            $page_data['timestamp_end']   = strtotime($date_range[1]);
        } else {
            $first_day_of_month = "1 " . date("M") . " " . date("Y") . ' 00:00:00';
            $last_day_of_month = date("t") . " " . date("M") . " " . date("Y") . ' 23:59:59';
            $page_data['timestamp_start']   = strtotime($first_day_of_month);
            $page_data['timestamp_end']     = strtotime($last_day_of_month);
        }
        $page_data['page_name'] = 'enrol_history';
        $page_data['enrol_history'] = $this->crud_model->enrol_history_by_date_range($page_data['timestamp_start'], $page_data['timestamp_end'], $this->session->userdata('user_id'));
        $page_data['page_title'] = get_phrase('enrol_history');
        $this->load->view('backend/index', $page_data);
    }

    public function enrol_history_delete($param1 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $this->crud_model->delete_enrol_history($param1);
        $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully')); 
        redirect(site_url('user/enrol_history'), 'refresh');
    }

    
    public function enrol_student($param1 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == 'enrol') {
            $this->crud_model->enrol_a_student_manually();
            redirect(site_url('user/enrol_history'), 'refresh');
        }
        $page_data['page_name'] = 'enrol_student';
        $page_data['page_title'] = get_phrase('enrol_a_student');
        $this->load->view('backend/index', $page_data);
    }
    /*25-04-2022 stop*/





    /*28-04-2022 start*/
    public function subscribenow($id = 0)
    {
        if ($id <= 0) {
            $this->session->set_flashdata('error_message', 'Sorry, Subscription Plan Not Found.');
            redirect(base_url());
        }

        if (empty($this->session->userdata('user_login'))) {
            $this->session->set_flashdata('error_message', 'Sorry, Instructor Not Login.');
            redirect(base_url('home/login'));
        }

        if ($this->session->userdata('is_instructor') != 1) {
            $this->session->set_flashdata('error_message', 'Sorry, Instructor Not Login.');
            redirect(base_url(''));
        }

        $SubscriptionPlanData = $this->db->select('id,subscription_plan_price,subscription_plan_name')->where('id', $id)->get('subscription_plan')->row();

        if (empty($SubscriptionPlanData)) {
            $this->session->set_flashdata('error_message', 'Sorry, Subscription Plan Not Found.');
            redirect(base_url());
        }

        $UserData = $this->db->select('first_name,last_name')->where('id', $this->session->userdata('user_id'))->get('users')->row();

        $page_data['page_name'] = 'paytm_subscription';
        $page_data['page_title'] = 'Subscription Purchase/Renewal';
        $page_data['pricedata'] = $SubscriptionPlanData->subscription_plan_price;
        $page_data['subscription_plan_id'] = $SubscriptionPlanData->id;
        $page_data['subscription_plan_name'] = $SubscriptionPlanData->subscription_plan_name;

        $page_data['user_id'] = $this->session->userdata('user_id');
        $page_data['user_name'] = ucwords($UserData->first_name . ' ' . $UserData->last_name);

        $this->load->view('backend/user/paytm_subscription', $page_data);
    }
    
    
    
    
    
    

    public function payThroughPaytm()
    {
        echo '<prE>';
        // print_r($_POST);die;

        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");
        // following files need to be included
        require_once(APPPATH . "/libraries/Paytm/config_paytm.php");
        require_once(APPPATH . "/libraries/Paytm/encdec_paytm.php");

        $paytm_keys = get_settings('paytm_keys');
        $paytm_keys = json_decode($paytm_keys, true);

        $checkSum = "";
        $paramList = array();

        //$ORDER_ID = $_POST["ORDER_ID"];
        $ORDER_ID = "SUBSCRI" . rand(10000, 99999999);
        $user_id = $this->session->userdata('user_id');
        $CUST_ID  = "CUST" . $user_id;
        $INDUSTRY_TYPE_ID = $paytm_keys[0]["INDUSTRY_TYPE_ID"];
        $CHANNEL_ID = $paytm_keys[0]["CHANNEL_ID"];

        $SubscriptionPlanData = $this->db->select('id,subscription_plan_price,subscription_plan_name')->where('id', base64_decode($_POST['s_p_id']))->get('subscription_plan')->row();

        if (empty($SubscriptionPlanData)) {
            $this->session->set_flashdata('error_message', 'Sorry, Subscription Plan Not Found.');
            redirect(base_url(''));
        }

        $PriceData = json_decode($SubscriptionPlanData->subscription_plan_price);

        if (empty($PriceData)) {
            $this->session->set_flashdata('error_message', 'Sorry, Something is wrong.');
            redirect(base_url(''));
        }

        $Price = $PriceData[0]->amount;
        $Month = $PriceData[0]->month;

        foreach ($PriceData as $PValue) {
            if ($PValue->month == $_POST['plan']) {
                $Price = $PValue->amount;
                $Month = $PValue->month;
            }
        }

        // echo $Price.'<br>';echo $Month;die;

        $TXN_AMOUNT = $Price;

        $insert = [
            'user_id' => $user_id,
            'subscription_plan_id' => $SubscriptionPlanData->id,
            'subscription_amount' => $TXN_AMOUNT,
            'order_id' => $ORDER_ID,
            'subscription_expire_date' => date('Y-m-d', strtotime(" +$Month month")),
            'subscription_payment_status' => 'pending',
            'subscription_payment_method' => 'online',
            'subscription_entry_date' => date('Y-m-d'),
            'subscription_update_date' => date('Y-m-d'),
            'subscription_status' => 'active',
        ];
        $this->db->insert('subscription', $insert);

        // Create an array having all required parameters for creating checksum.
        define('PAYTM_MERCHANT_KEY', 'ADC9rkJ2Y@25a@1R');
        define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING');
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
        $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
        $paramList["CHANNEL_ID"] = $CHANNEL_ID;
        $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
        $paramList["CALLBACK_URL"] = site_url("user/subscriptionconfirm");
        
        
//         $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
// 		$paramList["CHECKSUMHASH"]=$checkSum;	

        //Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray($paramList, PAYTM_MERCHANT_KEY);

        $page_data['paramList'] = $paramList;
        $page_data['checkSum'] = $checkSum;
        $this->load->view('payment/paytm_merchant_checkout', $page_data);
    }
    
    
    
    
    
    
    

    public function subscriptionconfirm()
    {
        // if (!empty($_POST['order_id'])) {

        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");
        // following files need to be included
        require_once(APPPATH . "/libraries/Paytm/config_paytm.php");
        require_once(APPPATH . "/libraries/Paytm/encdec_paytm.php");
        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";

        $paramList = $_POST;
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg


        $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
        $update = array();
        $user_id = $this->session->userdata('user_id');
        
      
        
       
        
        
        if ($isValidChecksum == "TRUE") {
            if ($paramList["STATUS"] == "TXN_SUCCESS") {
                $update['subscription_payment_status'] = 'confirm';
                $update['subscription_status'] = 'active';

                $this->db->where('user_id', $user_id);
                $this->db->where('subscription_status', 'active');
                // $status = $this->db->where('subscription_payment_status', 'confirm')->update('subscription', [
                //     'subscription_status' => 'deactive'
                // ]);
            } else {
                $update['subscription_payment_status'] = 'failed';
                
            }
            $update['txn_id'] = $paramList['TXNID'];
            
            
             $this->db->where('order_id', $paramList['ORDERID'])->update('subscription', $update);

        $this->session->set_flashdata('flash_message', 'Payment Successfull');
      
        redirect(base_url('home/subscriptionHistory'));
            
            
        } else {
            $update['subscription_payment_status'] = 'confirm';
            //Process transaction as suspicious.
        }

        $this->db->where('order_id', $paramList['ORDERID'])->update('subscription', $update);

        $this->session->set_flashdata('flash_message', 'Your subscription plan will active from admin until its store in pending');
        // echo '<pre>';
        // print_r($this->session->all_userdata());
        // exit;
        // }
        redirect(base_url('home/subscriptionHistory'));
    }
    /*28-04-2022 stop*/
    
    /*16-05-2022*/
    public function internal_banner()
    {
        if($this->session->userdata('user_login') != true)
            redirect(site_url('login'), 'refresh');
        
        $page_data['page_name'] = 'add_internal_banner';
        $page_data['page_title'] = get_phrase('add_internal_banner');
        
        $this->load->view('backend/index',$page_data);
    }
    /*16-05-2022*/
    
    /*17-05-2022 start*/
    public function ads_library()
    {
        if($this->session->userdata('user_login') != true)
            redirect(site_url('login'), 'refresh');
        
        $page_data['page_name'] = 'ads_library';
        $page_data['page_title'] = get_phrase('ads_library');
        
        $this->load->view('backend/index',$page_data);
    }
    /*17-05-2022 stop*/
    
    /* 26-05-2022 start */
    public function savecurriculum($course_id = 0)
    {
        if(!empty($_POST['section'])>0)
        {
            // echo '<pre>';print_r($_POST);die;
            $sectiondata = $this->input->post('section'); 
            foreach($sectiondata as $s_key => $s_value)
            {
                 $InsertSectionArray = [
                    'title'=>$s_value,
                    'course_id'=>$course_id,
                ];
                $this->db->insert('section',$InsertSectionArray);
                $section_id = $this->db->insert_id();
                $sectionlessondata = $this->input->post('section_sub_name');
                if(!empty($sectionlessondata[$s_key]))
                {
                    foreach($sectionlessondata[$s_key] as $s_l_key => $s_l_value)
                    {
                        $SubLessonInsertArray = [];
                        $sub_type = strtolower($s_l_value);
                        
                        if($sub_type == 'lesson')
                        {
                            $lesson_form_data = $_POST['lesson_form'][$s_key][$s_l_key];
                            
                            $SubLessonInsertArray['title'] = $_POST['section_lesson_title'][$s_key][$s_l_key];
                            $SubLessonInsertArray['course_id'] = $course_id;
                            $SubLessonInsertArray['section_id'] = $section_id;
                            
                            if(in_array($_POST['section_lesson_type'][$s_key][$s_l_key],['youtube','vimeo']))
                            {
                                $SubLessonInsertArray['lesson_type'] = 'video';
                                $SubLessonInsertArray['video_url'] = html_escape($lesson_form_data['video_url']);
                                $duration_formatter = explode(':', $lesson_form_data['duration']);
                                $hour = sprintf('%02d', $duration_formatter[0]);
                                $min = sprintf('%02d', $duration_formatter[1]);
                                $sec = sprintf('%02d', $duration_formatter[2]);
                                $SubLessonInsertArray['duration'] = $hour . ':' . $min . ':' . $sec;
                                
                                $video_details = $this->video_model->getVideoDetails($SubLessonInsertArray['video_url']);
                                $SubLessonInsertArray['video_type'] = $video_details['provider'];
                            }
                            if(in_array($_POST['section_lesson_type'][$s_key][$s_l_key],['html5']))
                            {
                                $SubLessonInsertArray['lesson_type'] = 'video';
                                $SubLessonInsertArray['video_url'] = html_escape($lesson_form_data['html5_video_url']);
                                $duration_formatter = explode(':', $lesson_form_data['html5_duration']);
                                $hour = sprintf('%02d', $duration_formatter[0]);
                                $min = sprintf('%02d', $duration_formatter[1]);
                                $sec = sprintf('%02d', $duration_formatter[2]);
                                $SubLessonInsertArray['duration'] = $hour . ':' . $min . ':' . $sec;
                                $SubLessonInsertArray['video_type'] = 'html5';
                            }
                            
                            if(in_array($_POST['section_lesson_type'][$s_key][$s_l_key],['video']))
                            {
                                $SubLessonInsertArray['lesson_type'] = 'video';
                                
                                $fileName   = $_FILES['lesson_form']['name'][$s_key][$s_l_key]['system_video_file'];
                                
                                $tmp            = explode('.', $fileName);
                                $fileExtension  = strtoupper(end($tmp));
                    
                                // $uploadable_video_file    =  md5(uniqid(rand(), true)) . '.' . strtolower($fileExtension);
                                $uploadable_video_file    =  md5(uniqid(rand(), true)) . '.' . $tmp[1];
                               
                                $tmp_video_file = $_FILES['lesson_form']['tmp_name'][$s_key][$s_l_key]['system_video_file'];
                               
                                if (!file_exists('uploads/lesson_files/videos'))
                                    mkdir('uploads/lesson_files/videos', 0777, true);
                                
                                $video_file_path = 'uploads/lesson_files/videos/' . $uploadable_video_file;
                                move_uploaded_file($tmp_video_file, $video_file_path);
                                $SubLessonInsertArray['video_url'] = site_url($video_file_path);
                                $SubLessonInsertArray['video_type'] = 'system';
                                $SubLessonInsertArray['attachment_type'] = 'file';
                                
                                $duration_formatter = explode(':', $lesson_form_data['system_video_file_duration']);
                                $hour = sprintf('%02d', $duration_formatter[0]);
                                $min = sprintf('%02d', $duration_formatter[1]);
                                $sec = sprintf('%02d', $duration_formatter[2]);
                                $SubLessonInsertArray['duration'] = $hour . ':' . $min . ':' . $sec;
                                
                                $SubLessonInsertArray['duration_for_mobile_application'] = $hour . ':' . $min . ':' . $sec;
                                $SubLessonInsertArray['video_type_for_mobile_application'] = "html5";
                                $SubLessonInsertArray['video_url_for_mobile_application'] = site_url($video_file_path);
                            }
                            
                            if(in_array($_POST['section_lesson_type'][$s_key][$s_l_key],['youtube','vimeo','html5']))
                            {
                                $mobile_app_lesson_url = $lesson_form_data['html5_video_url_for_mobile_application'];
                                $mobile_app_lesson_duration = $lesson_form_data['html5_duration_for_mobile_application'];
                                
                                $duration_for_mobile_application_formatter = explode(':', $mobile_app_lesson_duration);
                                $hour = sprintf('%02d', $duration_for_mobile_application_formatter[0]);
                                $min  = sprintf('%02d', $duration_for_mobile_application_formatter[1]);
                                $sec  = sprintf('%02d', $duration_for_mobile_application_formatter[2]);
                                $SubLessonInsertArray['duration_for_mobile_application'] = $hour . ':' . $min . ':' . $sec;
                                $SubLessonInsertArray['video_type_for_mobile_application'] = 'html5';
                                $SubLessonInsertArray['video_url_for_mobile_application'] = $mobile_app_lesson_url;
                            }
                            
                            if(in_array($_POST['section_lesson_type'][$s_key][$s_l_key],['document','image']))
                            {
                                $SubLessonInsertArray['attachment_type'] = 'img';
                                
                                if($_POST['section_lesson_type'][$s_key][$s_l_key] == 'document')
                                {
                                    $SubLessonInsertArray['lesson_type'] = 'other';
                                    $other_value = explode('-',$lesson_form_data['lesson_type']);
                                    $SubLessonInsertArray['attachment_type'] = $other_value[1];
                                }
                                
                                $fileName           = $_FILES['lesson_form']['name'][$s_key][$s_l_key]['attachment'];
                                $tmp                = explode('.', $fileName);
                                $fileExtension      = end($tmp);
                                $uploadable_file    =  md5(uniqid(rand(), true)) . '.' . $fileExtension;
                                $SubLessonInsertArray['attachment'] = $uploadable_file;
            
                                if (!file_exists('uploads/lesson_files'))
                                    mkdir('uploads/lesson_files', 0777, true);
                                
                                move_uploaded_file($_FILES['lesson_form']['tmp_name'][$s_key][$s_l_key]['attachment'], 'uploads/lesson_files/' . $uploadable_file);
                            }
                            
                            if(in_array($_POST['section_lesson_type'][$s_key][$s_l_key],['iframe']))
                            {
                                $SubLessonInsertArray['attachment'] = $lesson_form_data['iframe_source'];
                            }
                            $SubLessonInsertArray['summary'] = $lesson_form_data['summary'];
                            
                            $SubLessonInsertArray['date_added'] = strtotime(date('D, d-M-Y'));
                            
                            $this->db->insert('lesson',$SubLessonInsertArray);
                            $inserted_id = $this->db->insert_id();
                            
                            if ($_FILES['lesson_form']['name'][$s_key][$s_l_key]['thumbnail'] != "")
                            {
                                if (!file_exists('uploads/thumbnails/lesson_thumbnails'))
                                    mkdir('uploads/thumbnails/lesson_thumbnails', 0777, true);
                                
                                move_uploaded_file($_FILES['lesson_form']['tmp_name'][$s_key][$s_l_key]['thumbnail'], 'uploads/thumbnails/lesson_thumbnails/' . $inserted_id . '.jpg');
                            }
                        }
                        
                        if($sub_type == 'quiz')
                        {
                            $quiz_name_data = $_POST['section_quiz_title'][$s_key][$s_l_key];
                            $quiz_description_data = $_POST['section_quiz_instruction'][$s_key][$s_l_key];
                            $question_name_data = $_POST['question_name'][$s_key][$s_l_key];
                            $question_option_data = $_POST['question_option'][$s_key][$s_l_key];
                            $correct_answer_data = $_POST['correct_answer'][$s_key][$s_l_key];
                            
                            $InsertLessonArray = [
                                'course_id'=>$course_id,
                                'section_id'=>$section_id,
                                'title'=>$quiz_name_data,
                                'summary'=>$quiz_description_data,
                                'lesson_type'=>'quiz',
                                'date_added'=>strtotime(date('D, d-M-Y')),
                            ];
                            $this->db->insert('lesson',$InsertLessonArray);
                            $lesson_id = $this->db->insert_id();
                            
                            foreach($question_name_data as $q_key => $q_value)
                            {
                                $options = $anwer = [];
                                foreach($question_option_data[$q_key] as $q_o_key => $o_value)
                                {
                                    $options[] = $o_value;
                                    
                                    if($correct_answer_data[$q_key] == $q_o_key)
                                        $anwer[] = (string)$q_o_key;
                                    
                                }
                                    
                                $InsertQuestionArray = [
                                    'quiz_id'=>$lesson_id,
                                    'title'=>$q_value,
                                    'type'=>'multiple_choice',
                                    'number_of_options'=>Count($question_option_data[$q_key]),
                                    'options'=>(!empty($options)) ? json_encode($options) : json_encode([""]),
                                    'correct_answers'=>json_encode($anwer),
                                ];
                                $this->db->insert('question',$InsertQuestionArray);
                            }
                        }
                    }
                }
            }
        }
    }
    /* 26-05-2022 close */
    
    #---------------------------------------------------------------------------
    public function sendnotification($course_id = 0,$instructor_id = 0)
    {
        if($instructor_id >0 && $course_id > 0)
        {   
            $coursedata = $this->db->select('course.title,users.first_name,users.last_name')->from('course')->join('users','users.id=course.user_id')->where('course.id',$course_id)->get()->row();
            // $userdata = $this->db->select("device_token,users.id as user_id,CONCAT(users.first_name,' ',users.last_name) as user_name")->from('users')->join('tbl_follow','tbl_follow.user_id=users.id')->where('device_token!=','')->where('tbl_follow.instructor_id',$instructor_id)->or_where('admin_role','3')->get()->result();
             $userdata = $this->db->select("device_token,users.id as user_id,CONCAT(users.first_name,' ',users.last_name) as user_name")->from('users')->join('tbl_follow','tbl_follow.user_id=users.id','left')->where('device_token!=','')->where('tbl_follow.instructor_id',$instructor_id)->or_where('admin_role','3')->get()->result();
 
            
            if(!empty($userdata))
            {
                $notificationData['title'] = $coursedata->title;
                $notificationData['description'] = ucwords("Hello $coursedata->first_name $coursedata->last_name, You have successfully createed a $coursedata->title course. For more info. ".base_url('user/preview/'.$course_id));
                $this->db->insert('notification', $notificationData);
                $notification_id = $this->db->insert_id();
                
                $InsertNotificationUserArray = [
                    'notification_id' => $notification_id,
                    'user_id' => $instructor_id,
                    'read_status' => 0,
                ];
                $this->db->insert('notification_users', $InsertNotificationUserArray);
                
                foreach($userdata as $value)
                {
                    $notification = [
                        'title'=>ucwords('New Course : '.$coursedata->title),
        				'body'=>ucwords("Hello $value->user_name a New course, $coursedata->title has been uploaded by $coursedata->first_name $coursedata->last_name . Please click on ".base_url('user/preview/'.$course_id)." to add course to your list. Checkout and more. For more info. ".base_url())
                    ];
                
                    $notificationData['title'] = $coursedata->title;
                    $notificationData['description'] = ucwords("Hello $value->user_name a New course, $coursedata->title has been uploaded by $coursedata->first_name $coursedata->last_name . Please click on ".base_url('user/preview/'.$course_id)." to add course to your list. Checkout and more. For more info. ".base_url());
                    $this->db->insert('notification', $notificationData);
                    $notification_id = $this->db->insert_id();
                    
                    $InsertNotificationUserArray = [
                        'notification_id' => $notification_id,
                        'user_id' => $value->user_id,
                        'read_status' => 0,
                    ];
                    $this->db->insert('notification_users', $InsertNotificationUserArray);
                    
                    if($value->device_token!='')
                    {
                        // $topic = "Notify";
                      	$url = 'https://fcm.googleapis.com/fcm/send';
                        $fields = array(
                            'to' => $value->device_token,
                            'notification' => $notification
                        );
                      	// Firebase API Key
                      	$headers = array(
                      		'Authorization:key = AAAA14qKAws:APA91bGE_cUR-V3OgkExtXr-S7_SZKbBN4F69fnVq4QZYLfTgGqblegT_IFOCN9UUiFYDCRSus1blEItLusiAPPNwU_46_ktudweZns1nMxZR-CLZOD-YvHXlAsJDoC4twPs9oVKTcNE',
                      		'Content-Type:application/json'
                      	);
                      	//AAAA14qKAws:APA91bGE_cUR-V3OgkExtXr-S7_SZKbBN4F69fnVq4QZYLfTgGqblegT_IFOCN9UUiFYDCRSus1blEItLusiAPPNwU_46_ktudweZns1nMxZR-CLZOD-YvHXlAsJDoC4twPs9oVKTcNE
                
                      	$ch = curl_init();
                      	// Set the url, number of POST vars, POST data
                      	curl_setopt($ch, CURLOPT_URL, $url);
                      	curl_setopt($ch, CURLOPT_POST, true);
                      	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                      	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                      	// Disabling SSL Certificate support temporarly
                      	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                      	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                      	$result = curl_exec($ch);
                      	if ($result === FALSE) {
                         	die('Curl failed: ' . curl_error($ch));
                      	}
                     	curl_close($ch);
                 	
                    }
                 	
                }
            }
        }
    }
    #---------------------------------------------------------------------------
    
    // ---- function add for display the course request list start here --------
    public function course_request()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'course_request';
        $page_data['page_title'] = get_phrase('course_request');

        $this->load->view('backend/index', $page_data);
    }
    // ---- function add for display the course request list close here --------
}