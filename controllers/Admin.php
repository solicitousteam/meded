<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bannermodel');

        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }
    }
    public function delete_live_class($id)
    {
        if ($this->session->userdata('admin_login') == true) {

            $this->db->where('id', $id);
            $this->db->delete('live_class');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));

            redirect(site_url('admin/live_class'));
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }
    public function reject_instructor($param1 = "")
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $this->user_model->update_reject_status_of_instructor($param1);

        $UserData = $this->db->select('first_name,last_name')->where('id', $param1)->get('users')->row();

        $InsertNotification = [
            'title' => 'Approval',
            'description' => "Hello $UserData->first_name $UserData->last_name We regret to inform you that your application did go through. Please contact customer support for feedback.",
            'ts' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('notification', $InsertNotification);
        $notification_id = $this->db->insert_id();

        $InsertUserDetail = [
            'notification_id' => $notification_id,
            'user_id' => $param1,
            'read_status' => 0
        ];
        $this->db->insert('notification_users', $InsertUserDetail);

        // redirect(site_url('admin/registrated_instructor/'), 'refresh');
        
        
        
          $data = 'reject';
    
        $this->session->set_flashdata('in','approve');
        
        redirect(site_url('admin/registrated_instructor/'.$data));
        
        
    }
    
    
    
    public function course_request()
    {
        if ($this->session->userdata('admin_login') == true) {
            $page_data['page_name'] = 'course_request';
            $page_data['page_title'] = get_phrase('course_request');
            $this->load->view('backend/index.php', $page_data);
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }
    // public function start_live_class($id = '')
    // {
    //     // IF ANY FUNCTION DOES NOT REQUIRE PUBLIC INSTRUCTOR, PUT THE NAME HERE.
    //     $unprotected_routes = ['save_course_progress'];
    //      $page_data['course_data'] = $id;
       
    //     $page_data['page_name'] = 'start_meet60';
    //     $page_data['course_data'] = $this->db->get_where('course', array('id' => $id))->row_array();
    //     $page_data['page_title'] = get_phrase('Live Class');

    //     /*30-04-2022*/
    //     if (empty($_SESSION['current_live_class'])) {
    //         $_SESSION['current_live_class'] = $id;
    //         redirect(base_url('admin/start_live_class/' . $id));
    //     }

    //     if (!empty($_SESSION['current_live_class']) && $_SESSION['current_live_class'] != $id) {
    //         $_SESSION['current_live_class'] = $id;
    //         redirect(base_url('admin/start_live_class/' . $id));
    //     }

    //     if(!empty($_GET['sendnotification']))
    //     {
    //         $coursedata = $this->db->select("course.title,CONCAT(users.first_name,' ',users.last_name) as user_name")->from('course')->join('users','users.id=course.user_id')->where('course.id',$id)->get()->row();
    // 		$userdata = $this->db->select("device_token,users.id as user_id,CONCAT(users.first_name,' ',users.last_name) as user_name")->from('users')->join('enrol','enrol.user_id=users.id')->where('enrol.course_id!=',$id)->where('users.device_token!=','')->group_by('enrol.user_id')->get()->result();
    // 		if(!empty($userdata))
    // 		{
    // 		    foreach($userdata as $value)
    // 			{
    // 			    $message = ucwords("Hello $value->user_name, $coursedata->title Course live on meded by $coursedata->user_name. For more info. ".base_url('admin/start_live_class/'.$id));
    // 			    $notification = [
    //                     'title'=>ucwords('Live Course : '.$coursedata->title),
    //     				'body'=>$message,
    //                 ];
                
    //                 $notificationData['title'] = ucwords('Live Course : '.$coursedata->title);
    //                 $notificationData['description'] = $message;
    //                 $this->db->insert('notification', $notificationData);
    //                 $notification_id = $this->db->insert_id();
                    
    //                 $InsertNotificationUserArray = [
    //                     'notification_id' => $notification_id,
    //                     'user_id' => $value->user_id,
    //                     'read_status' => 0,
    //                 ];
    //                 $this->db->insert('notification_users', $InsertNotificationUserArray);;

    // 				// $topic = "Notify";
    // 				$url = 'https://fcm.googleapis.com/fcm/send';
    // 				$fields = array(
    // 					'to' => $value->device_token,
    // 					'notification' => $notification
    // 				);
    // 				// Firebase API Key
    // 				$headers = array(
    // 					'Authorization:key = AAAA14qKAws:APA91bGE_cUR-V3OgkExtXr-S7_SZKbBN4F69fnVq4QZYLfTgGqblegT_IFOCN9UUiFYDCRSus1blEItLusiAPPNwU_46_ktudweZns1nMxZR-CLZOD-YvHXlAsJDoC4twPs9oVKTcNE',
    // 					'Content-Type:application/json'
    // 				);
    // 		        //AAAA14qKAws:APA91bGE_cUR-V3OgkExtXr-S7_SZKbBN4F69fnVq4QZYLfTgGqblegT_IFOCN9UUiFYDCRSus1blEItLusiAPPNwU_46_ktudweZns1nMxZR-CLZOD-YvHXlAsJDoC4twPs9oVKTcNE
    // 				$ch = curl_init();
    // 				// Set the url, number of POST vars, POST data
    // 				curl_setopt($ch, CURLOPT_URL, $url);
    // 				curl_setopt($ch, CURLOPT_POST, true);
    // 				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    // 				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // 				// Disabling SSL Certificate support temporarly
    // 				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // 				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    // 				$result = curl_exec($ch);
    // 				if ($result === FALSE) {
    // 					die('Curl failed: ' . curl_error($ch));
    // 				}
    // 				curl_close($ch);
    // 			}
    // 		}
    		
    // 		redirect('admin/start_live_class/'.$id);
    //     }

    //     $page_data['live_video_same_page'] = 1;
    //     // $this->load->view('backend/index.php', $page_data);
    //     $this->load->view('backend/admin/start_meet60',$page_data);
    // }






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
    


    // 09-04-2022 start
    public function course_delete($id = 0)
    {
        if ($id > 0) {
            $fetchdata = $this->db->select('status,category_type')->where('id', $id)->get('course')->row();

            $this->db->where('id', $id)->delete('course');

            // echo base_url("admin/courses_list?status=$fetchdata->status&category_type=$fetchdata->category_type");die;
            redirect(base_url("admin/courses_list?status=$fetchdata->status&category_type=$fetchdata->category_type"));
        }
    }

    #function for open edit page
    public function course_redirect_form($id = 0)
    {
        $fetchdata = $this->db->select('category_type')->where('id', $id)->get('course')->row();

        if ($fetchdata->category_type == 0)
            redirect(base_url("admin/course_form/course_edit/$id"));

        if ($fetchdata->category_type == 3)
            redirect(base_url("admin/course_form/edit_video_learning/$id"));

        if ($fetchdata->category_type == 2)
            redirect(base_url("admin/serial_learning/edit_form/$id"));

        if ($fetchdata->category_type == 1)
            redirect(base_url("admin/webinar/edit_form/$id"));
    }
    // 09-04-2022 stop

    public function add_live_class()
    {
        extract($_POST);
        if ($this->session->userdata('admin_login') == true) {
            $insert_array = array(
                'course_id' => $course_id,
                'date' => $live_class_schedule_date,
                'time' => $live_class_schedule_time,
                'note_to_students' => $note_to_students,
            );

            if ($LiveClsiD == "") {
                $this->db->insert('live_class', $insert_array);
            } else {
                $this->db->where('id', $LiveClsiD);
                $this->db->update('live_class', $insert_array);
            }
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));

            redirect(site_url('admin/live_class'), 'refresh');
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }

    public function index()
    {
        if ($this->session->userdata('admin_login') == true) {
            $this->dashboard();
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }
    public function video_learning_add($param1 = "", $param2 = "")
    {

        //   echo '<prE>';print_r($_POST);die;
        $course_id = $this->crud_model->add_video_learning();
        
        $this->savecurriculum($course_id);
        
        $this->sendnotification_admin($course_id,$this->session->userdata('user_id'));
        
        

        redirect(site_url('admin/video_learning'), 'refresh');
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
    public function get_category_details_by_id($id)
    {
        return $this->db->get_where('category', array('id' => $id));
    }

    public function dashboard()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('backend/index.php', $page_data);
    }

    public function mededbank()
    {


        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'dashboard2bank';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('backend/index.php', $page_data);
    }




    public function blank_template()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'blank_template';
        $this->load->view('backend/index.php', $page_data);
    }

    public function banner($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_form') {
            $page_data['courses'] = $this->crud_model->filter_course_for_backend("all", "all", "all", "all");
            $page_data['page_name'] = 'add_banner';
            $page_data['page_title'] = get_phrase('banner');
            $page_data['banner'] = $this->db->get('tbl_banner');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == "edit_form") {
            $page_data['BannerData'] = $this->db->get_where('tbl_banner', array("banner_id" => $param2))->row_array();

            $page_data['courses'] = $this->crud_model->filter_course_for_backend("all", "all", "all", "all");
            $page_data['page_name'] = 'edit_banner';
            $page_data['page_title'] = get_phrase('banner');
            $page_data['banner'] = $this->db->get('tbl_banner');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'add') {

            date_default_timezone_set('Asia/Kolkata');
            $currentTime = date('d-m-Y h:i:s A', time());
            $date_string = strtotime($currentTime);


            if (!empty($_FILES['picture']['name'])) {
                $config['upload_path'] = 'uploads/thumbnails/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $date_string . $_FILES['picture']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = base_url() . 'uploads/thumbnails/' . $uploadData['file_name'];
                } else {
                    $picture = '';
                }
            } else {
                $picture = '';
            }
            //echo $picture;



            //Form for adding user data

            $data = array(
                'text_1' => 'hi',
                'text_2' => 'hii',
                'banner_img' => $picture,
                "organization_name" => $_POST['organization_name'],
                "organization_contact" => $_POST['organization_contact'],
                "banner_link" => $_POST['BannerURL'],
                "banner_course" => $_POST['BannerCourse'],
                "banner_type" => $_POST['BannerType'],
                "from_date" => $_POST['from_date'],
                "to_date" => $_POST['to_date']

            );
            $last_insert_id = $this->db->insert('tbl_banner', $data);

            if ($last_insert_id) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('category_name_already_exists'));
            }
            redirect(site_url('admin/banner'), 'refresh');
        } elseif ($param1 == 'save_edit') {

            date_default_timezone_set('Asia/Kolkata');
            $currentTime = date('d-m-Y h:i:s A', time());
            $date_string = strtotime($currentTime);


            if (!empty($_FILES['picture']['name'])) {
                $config['upload_path'] = 'uploads/thumbnails/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $date_string . $_FILES['picture']['name'];

                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture = base_url() . 'uploads/thumbnails/' . $uploadData['file_name'];
                } else {
                    $picture = '';
                }
            } else {
                $picture = '';
            }
            //echo $picture;



            //Form for adding user data

            if ($picture != "") {
                $data = array(
                    'banner_img' => $picture,
                    "banner_link" => $_POST['BannerURL'],
                    "banner_course" => $_POST['BannerCourse'],
                    "banner_type" => $_POST['BannerType']

                );
            } else {
                $data = array(
                    "banner_link" => $_POST['BannerURL'],
                    "banner_course" => $_POST['BannerCourse'],
                    "banner_type" => $_POST['BannerType']

                );
            }

            $this->db->where('banner_id', $param2);
            $this->db->update('tbl_banner', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(site_url('admin/banner'), 'refresh');
        } elseif ($param1 == "delete") {

            $this->db->where('banner_id', $param2);
            $result = $this->db->delete('tbl_banner');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/banner'), 'refresh');
        }
        if ($param1 == '') {
            $page_data['page_name'] = 'banner';
            $page_data['page_title'] = get_phrase('banner');
            $page_data['banner'] = $this->db->get('tbl_banner');
            $this->load->view('backend/index', $page_data);
        }
    }

    public function coupon($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_form') {
            $page_data['students'] = $this->db->where('role_id', 2)->where('is_instructor', 0)->get('users');
            $page_data['page_name'] = 'add_coupon';
            $page_data['page_title'] = get_phrase('coupon');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == "edit_form") {
            $page_data['students'] = $this->db->where('role_id', 2)->where('is_instructor', 0)->get('users');
            $page_data['BannerData'] = $this->db->get_where('coupons', array("id" => $param2))->row_array();
            $page_data['page_name'] = 'edit_coupon';
            $page_data['page_title'] = 'Edit Coupon';
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == 'add') {

            $data = array(
                'code' => $_POST['code'],
                'promocode_name' => $_POST['promocode_name'],
                'user_id' => $_POST['student'],
                'discount_percentage' => $_POST['coupon_type'],
                'course_id' => $_POST['courses_id'],
                'amount' => $_POST['coupon_amount'],
                'expiry_date' => $_POST['expiry_date'],
                'status' => $_POST['status'],
            );
            $last_insert_id = $this->db->insert('coupons', $data);

            if ($last_insert_id) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', "Coupon Code Already Exists");
            }
            redirect(site_url('admin/coupon'), 'refresh');
        } elseif ($param1 == 'save_edit') {
            // $data = array(
            //     'code' => $_POST['code'],
            //     'coupon_type' => $_POST['coupon_type'],
            //     'coupon_amount' => $_POST['coupon_amount'],
            //     'courses_id' => $_POST['courses_id'],
            //     'expiry_date' => $_POST['expiry_date'],
            //     'status' => $_POST['status'],
            // );
            $data = array(
                'code' => $_POST['code'],
                'course_id' => $_POST['courses_id'],
                'discount_percentage' => $_POST['coupon_type'],
                'amount' => $_POST['coupon_amount'],
                'expiry_date' => $_POST['expiry_date'],
                'status' => $_POST['status'],
            );

            $this->db->where('id', $param2);
            $this->db->update('coupons', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(site_url('admin/coupon'), 'refresh');
        } elseif ($param1 == "delete") {

            $this->db->where('id', $param2);
            $result = $this->db->delete('coupons');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/coupon'), 'refresh');
        }
        if ($param1 == '') {
            $page_data['page_name'] = 'coupon';
            $page_data['page_title'] = get_phrase('coupon');

            $page_data['coupon'] = $this->db->order_by('id', 'DESC')->get('coupons')->result();
            $this->load->view('backend/index', $page_data);
        }
    }

    public function categories($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add') {
            $response = $this->crud_model->add_category();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('category_name_already_exists'));
            }
            redirect(site_url('admin/categories'), 'refresh');
        } elseif ($param1 == "edit") {
            $response = $this->crud_model->edit_category($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('category_name_already_exists'));
            }
            redirect(site_url('admin/categories'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->crud_model->delete_category($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/categories'), 'refresh');
        }
        $page_data['page_name'] = 'categories';
        $page_data['page_title'] = get_phrase('categories');
        $page_data['categories'] = $this->crud_model->get_categories($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function category_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add_category") {
            $page_data['page_name'] = 'category_add';
            $page_data['categories'] = $this->crud_model->get_categories()->result_array();
            $page_data['page_title'] = get_phrase('add_category');
        }
        if ($param1 == "edit_category") {
            $page_data['page_name'] = 'category_edit';
            $page_data['page_title'] = get_phrase('edit_category');
            $page_data['categories'] = $this->crud_model->get_categories()->result_array();
            $page_data['category_id'] = $param2;
        }

        $this->load->view('backend/index', $page_data);
    }

    public function sub_categories_by_category_id($category_id = 0)
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $category_id = $this->input->post('category_id');
        redirect(site_url("admin/sub_categories/$category_id"), 'refresh');
    }

    public function sub_category_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_sub_category') {
            $page_data['page_name'] = 'sub_category_add';
            $page_data['page_title'] = get_phrase('add_sub_category');
        } elseif ($param1 == 'edit_sub_category') {
            $page_data['page_name'] = 'sub_category_edit';
            $page_data['page_title'] = get_phrase('edit_sub_category');
            $page_data['sub_category_id'] = $param2;
        }
        $page_data['categories'] = $this->crud_model->get_categories();
        $this->load->view('backend/index', $page_data);
    }

    public function instructors($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            
            $this->user_model->add_user(true); // PROVIDING TRUE FOR INSTRUCTOR
            redirect(site_url('admin/instructors'), 'refresh');
        } elseif ($param1 == "edit") {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/instructors'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->user_model->delete_user($param2);
            redirect(site_url('admin/instructors'), 'refresh');
        }

        $page_data['page_name'] = 'instructors';
        $page_data['page_title'] = get_phrase('instructor');
        $page_data['instructors'] = $this->user_model->get_instructor()->result_array();
        
        $this->load->view('backend/index', $page_data);
    }

    public function instructor_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == 'add_instructor_form') {
            $page_data['page_name'] = 'instructor_add';
            $page_data['page_title'] = get_phrase('instructor_add');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit_instructor_form') {
            $page_data['page_name'] = 'instructor_edit';
            $page_data['user_id'] = $param2;
            $page_data['page_title'] = get_phrase('instructor_edit');
            $this->load->view('backend/index', $page_data);
        }
    }

    public function users($param1 = "", $param2 = "")
    {

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = isset($_GET['instructor_id']) ? $_GET['instructor_id'] : "all";
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";

        // Courses query is used for deciding if there is any course or not. Check the view you will get it
        //$page_data['courses']                = $this->crud_model->filter_course_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status']);
        $page_data['status_wise_courses']    = $this->crud_model->get_status_wise_courses();
        // $page_data['instructors']            = $this->user_model->get_instructor()->result_array();
        $page_data['instructors']            =  $this->db->select('id,first_name,last_name')->where('role_id',2)->where('is_instructor',1)->get('users')->result_array();
        $page_data['categories']             = $this->crud_model->get_categories();
        
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == "add") {
            $this->user_model->add_user();
            redirect(site_url('admin/users'), 'refresh');
        } elseif ($param1 == "edit") {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/users'), 'refresh');
        } elseif ($param1 == "delete") {
            $this->user_model->delete_user($param2);
            redirect(site_url('admin/users'), 'refresh');
        }


        $page_data['page_name'] = 'users';
        $page_data['page_title'] = get_phrase('student');
        $page_data['users'] = $this->user_model->get_user($param2);
      //  echo $this->db->last_query();
    //    die;
        $this->load->view('backend/index', $page_data);
    }

    public function add_shortcut_student()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $is_instructor = 0;
        echo $this->user_model->add_shortcut_user($is_instructor);
    }

    // public function notification($param1 = "") {
    //     if ($this->session->userdata('admin_login') != true) {
    //         redirect(site_url('login'), 'refresh');
    //     }

    //     if ($param1 == 'save') {


    //         //allsingle  userstype

    //         if(  $_POST['allsingle']  =='1'){


    //             //userstype
    //             $data['notification_for'] = 'All';
    //           $userstype  = $_POST['userstype'] ;


    //           if( $userstype ==1  ){

    //               $getStudentAll =   $this->user_model->getStudentAll()->result();

    //           }else {

    //               $getStudentAll =   $this->user_model->getInstrutorAll()->result();
    //           }
    //           $strId='';
    //           foreach( $getStudentAll as $getStudentAlls  ) {

    //               $strId.=$getStudentAlls->id.',';
    //           }

    //             $strId = rtrim($strId,',');

    //             $allsingle2 =   $strId;



    //         }else {
    //           $allsingle2 =   $_POST['allsingle2'];
    //           $data['notification_for'] = 'Single';
    //         }

    //               $data['title'] = $_POST['code'];
    //               $data['description'] = $_POST['coupon_amount'];

    //               $data['user_id'] = $allsingle2;


    //         $this->db->insert('notification', $data);
    //         $user_id = $this->db->insert_id();


    //         //$this->crud_model->saveNotification($_POST['code'], $_POST['coupon_amount']);
    //         redirect(site_url('admin/notification'), 'refresh');
    //     }

    //     $page_data['page_name'] = 'notification';
    //     $page_data['page_title'] = get_phrase('notification');
    //     $page_data['notifications_list'] = $this->user_model->get_notification()->result_array();
    //     $this->load->view('backend/index', $page_data);
    // }

    public function notification($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        
       

        if ($param1 == 'save') {
            
            //allsingle  userstype
            if ($_POST['allsingle']  == '1') {
                //userstype
                $data['notification_for'] = 'All';
                $userstype  = $_POST['userstype'];
                if ($userstype == 1)
                    $getAllIdsData =   $this->db->select('id')->where('role_id', 2)->where('is_instructor', 0)->get('users')->result();
                else
                    $getAllIdsData =   $this->db->select('id')->where('role_id', 2)->where('is_instructor', 1)->get('users')->result();

                $Ids_array = array_column($getAllIdsData, 'id');
            } else {
                $Ids_array =   $_POST['allsingle2'];
                $data['notification_for'] = 'Single';
            }
            $this->session->set_flashdata('flash_message', get_phrase('notification_sent_successfully'));
            // redirect(site_url('admin/notification'), 'refresh');
            $AllIdsArray = (is_array($Ids_array)) ? $Ids_array : [$Ids_array];
            
            
           

            $data['title'] = $_POST['code'];
            $data['description'] = $_POST['coupon_amount'];

             $data['user_id'] = $allsingle2;

            $this->db->insert('notification', $data);
            $notification_id = $this->db->insert_id();

            foreach ($AllIdsArray as $id_value) {
                $InsertNotificationUserArray = [
                    'notification_id' => $notification_id,
                    'user_id' => $id_value,
                    'read_status' => 0,
                ];
                $this->db->insert('notification_users', $InsertNotificationUserArray);
            }

             if($_POST['userstype'] == '1')
             {
                $userdata = $this->db->select('device_token')->from('users')->where('device_token!=','')->where_in('id',$AllIdsArray)->get()->result();
        	    
        		if(!empty($userdata))
        		{
        			$notification = [
        				'title'=>$_POST['code'],
        				'body'=>ucwords($_POST['coupon_amount'])
        			];
        			foreach($userdata as $value)
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
            $this->crud_model->saveNotification($_POST['code'], $_POST['coupon_amount']);
            
            $this->session->set_flashdata('flash_message', get_phrase('notification_sent_successfully'));
            redirect(site_url('admin/notification'), 'refresh');
        }

        $page_data['page_name'] = 'notification';
        $page_data['page_title'] = get_phrase('notification');
        $page_data['notifications_list'] = $this->user_model->get_notification()->result_array();
        $this->load->view('backend/index', $page_data);
    }

    public function user_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_user_form') {
            $page_data['page_name'] = 'user_add';
            $page_data['page_title'] = get_phrase('student_add');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'edit_user_form') {
            $page_data['page_name'] = 'user_edit';
            $page_data['user_id'] = $param2;
            $page_data['page_title'] = get_phrase('student_edit');
            $this->load->view('backend/index', $page_data);
        }
    }

    public function enrol_history($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
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
        $page_data['enrol_history'] = $this->crud_model->enrol_history_by_date_range($page_data['timestamp_start'], $page_data['timestamp_end']);
        $page_data['page_title'] = get_phrase('enrol_history');
        $this->load->view('backend/index', $page_data);
    }

    public function enrol_student($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == 'enrol') {
            $this->crud_model->enrol_a_student_manually();
            redirect(site_url('admin/enrol_history'), 'refresh');
        }
        $page_data['page_name'] = 'enrol_student';
        $page_data['page_title'] = get_phrase('enrol_a_student');
        $this->load->view('backend/index', $page_data);
    }

    public function shortcut_enrol_student()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        echo $this->crud_model->shortcut_enrol_a_student_manually();
    }

    public function admin_revenue($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 != "") {

            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime(trim($date_range[0]) . ' 00:00:00');
            $page_data['timestamp_end']   = strtotime(trim($date_range[1]) . ' 23:59:59');
        } else {

            $page_data['course_id'] =  $this->input->get('course_id');
            $page_data['timestamp_start'] = strtotime(date("m/01/Y 00:00:00"));
            $page_data['timestamp_end']   = strtotime(date("m/t/Y 23:59:59"));
        }
        if(!empty($_GET['date']))
        {
            $page_data['timestamp_start'] = strtotime($_GET['date']);
            $page_data['timestamp_end']   = strtotime(date("m/t/Y"));
        }

        $page_data['page_name'] = 'admin_revenue';
        $page_data['payment_history'] = $this->crud_model->get_revenue_by_user_type($page_data, 'admin_revenue');
        $page_data['page_title'] = get_phrase('admin_revenue');



        $this->load->view('backend/index', $page_data);
    }

    public function instructor_revenue($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'instructor_revenue';
        $page_data['payment_history'] = $this->crud_model->get_revenue_by_user_type("", "", 'instructor_revenue');
        $page_data['page_title'] = get_phrase('instructor_revenue');
        $this->load->view('backend/index', $page_data);
    }

    function invoice($payout_id = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'invoice';
        $page_data['payout_id'] = $payout_id;
        $page_data['page_title'] = get_phrase('invoice');
        $this->load->view('backend/index', $page_data);
    }

    public function payment_history_delete($param1 = "", $redirect_to = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $this->crud_model->delete_payment_history($param1);
        $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
        redirect(site_url('admin/' . $redirect_to), 'refresh');
    }

    public function enrol_history_delete($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $this->crud_model->delete_enrol_history($param1);
        $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
        redirect(site_url('admin/enrol_history'), 'refresh');
    }

    public function purchase_history()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name'] = 'purchase_history';
        $page_data['purchase_history'] = $this->crud_model->purchase_history();
        $page_data['page_title'] = get_phrase('purchase_history');
        $this->load->view('backend/index', $page_data);
    }

    public function system_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'system_update') {
            $this->crud_model->update_system_settings();
            $this->session->set_flashdata('flash_message', get_phrase('system_settings_updated'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }

        if ($param1 == 'logo_upload') {
            move_uploaded_file($_FILES['logo']['tmp_name'], 'assets/backend/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('backend_logo_updated'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }

        if ($param1 == 'favicon_upload') {
            move_uploaded_file($_FILES['favicon']['tmp_name'], 'assets/favicon.png');
            $this->session->set_flashdata('flash_message', get_phrase('favicon_updated'));
            redirect(site_url('admin/system_settings'), 'refresh');
        }

        $page_data['languages']  = $this->crud_model->get_all_languages();
        $page_data['page_name'] = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function frontend_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'frontend_update') {
            $this->crud_model->update_frontend_settings();
            $this->session->set_flashdata('flash_message', get_phrase('frontend_settings_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }

        if ($param1 == 'recaptcha_update') {
            $this->crud_model->update_recaptcha_settings();
            $this->session->set_flashdata('flash_message', get_phrase('recaptcha_settings_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }

        if ($param1 == 'banner_image_update') {
            $this->crud_model->update_frontend_banner();
            $this->session->set_flashdata('flash_message', get_phrase('banner_image_update'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'light_logo') {
            $this->crud_model->update_light_logo();
            $this->session->set_flashdata('flash_message', get_phrase('logo_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'dark_logo') {
            $this->crud_model->update_dark_logo();
            $this->session->set_flashdata('flash_message', get_phrase('logo_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'small_logo') {
            $this->crud_model->update_small_logo();
            $this->session->set_flashdata('flash_message', get_phrase('logo_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'favicon') {
            $this->crud_model->update_favicon();
            $this->session->set_flashdata('flash_message', get_phrase('favicon_updated'));
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'blended_learning') {
            $this->crud_model->update_blended_learning();
            $this->session->set_flashdata('flash_message', "Image Updated");
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'video_learning') {
            $this->crud_model->update_video_learning();
            $this->session->set_flashdata('flash_message', "Image Updated");
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'serial_learning') {
            $this->crud_model->update_serial_learning();
            $this->session->set_flashdata('flash_message', "Image Updated");
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }
        if ($param1 == 'webinars') {
            $this->crud_model->update_webinars();
            $this->session->set_flashdata('flash_message', "Image Updated");
            redirect(site_url('admin/frontend_settings'), 'refresh');
        }


        $page_data['page_name'] = 'frontend_settings';
        $page_data['page_title'] = get_phrase('frontend_settings');
        $this->load->view('backend/index', $page_data);
    }
    public function payment_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'system_currency') {
            $this->crud_model->update_system_currency();
            redirect(site_url('admin/payment_settings'), 'refresh');
        }
        if ($param1 == 'paypal_settings') {
            $this->crud_model->update_paypal_settings();
            redirect(site_url('admin/payment_settings'), 'refresh');
        }
        if ($param1 == 'stripe_settings') {
            $this->crud_model->update_stripe_settings();
            redirect(site_url('admin/payment_settings'), 'refresh');
        }

        $page_data['page_name'] = 'payment_settings';
        $page_data['page_title'] = get_phrase('payment_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function smtp_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_smtp_settings();
            $this->session->set_flashdata('flash_message', get_phrase('smtp_settings_updated_successfully'));
            redirect(site_url('admin/smtp_settings'), 'refresh');
        }

        $page_data['page_name'] = 'smtp_settings';
        $page_data['page_title'] = get_phrase('smtp_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function instructor_settings($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == 'update') {
            $this->crud_model->update_instructor_settings();
            $this->session->set_flashdata('flash_message', get_phrase('instructor_settings_updated'));
            redirect(site_url('admin/instructor_settings'), 'refresh');
        }

        $page_data['page_name'] = 'instructor_settings';
        $page_data['page_title'] = get_phrase('instructor_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function theme_settings($action = '')
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $page_data['page_name']  = 'theme_settings';
        $page_data['page_title'] = get_phrase('theme_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function theme_actions($action = "", $theme = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($action == 'activate') {
            $theme_to_active  = $this->input->post('theme');
            $installed_themes = $this->crud_model->get_installed_themes();
            if (in_array($theme_to_active, $installed_themes)) {
                $this->crud_model->activate_theme($theme_to_active);
                echo true;
            } else {
                echo false;
            }
        } elseif ($action == 'remove') {
            if ($theme == get_frontend_settings('theme')) {
                $this->session->set_flashdata('error_message', get_phrase('activate_a_theme_first'));
            } else {
                $this->crud_model->remove_files_and_folders(APPPATH . '/views/frontend/' . $theme);
                $this->crud_model->remove_files_and_folders(FCPATH . '/assets/frontend/' . $theme);
                $this->session->set_flashdata('flash_message', $theme . ' ' . get_phrase('theme_removed_successfully'));
            }
            redirect(site_url('admin/theme_settings'), 'refresh');
        }
    }

    public function courses()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        //08-04-2022 start
        $page_data['search']   = isset($_GET['search']) ? $_GET['search'] : "";
        //08-04-2022 close

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = isset($_GET['instructor_id']) ? $_GET['instructor_id'] : "all";
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";

        // Courses query is used for deciding if there is any course or not. Check the view you will get it
        $page_data['courses']                = $this->crud_model->filter_course_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);


       $coursedata = $this->crud_model->filter_course_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);


        $page_data['instructors']            = $this->user_model->get_instructor()->result_array();
        $page_data['page_name']              = 'courses-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();
        $page_data['page_title']             = get_phrase('active_courses');
        
        
        
        
        if(isset($_GET['excel'])== 'excel')
        {
            $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        
          $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Course Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Course Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Short Description');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Discounted Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Instructor Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Entry Date');
        
        
        
          $rowcount = 3;
        foreach($coursedata as $key => $value)
        {
           
        
           
              
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Blended');
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value['title']);
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value['short_description']);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value['price']);
            $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", $value['discounted_price']);
          
            $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", $value['first_name'].' '.$value['last_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue("H$rowcount", date('d,M Y',strtotime($value->date_added)));
            $rowcount++;
        }
        
        
   
        
        
      
        
        $filename = 'blended-course-'.date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
        
            
          die();  
            
            
        }
        
        
        

        // echo '<pre>';print_r($page_data);die;
        $this->load->view('backend/index', $page_data);
    }

    // This function is responsible for loading the course data from server side for datatable SILENTLY
    public function get_courses()
    {
        if ($this->session->userdata('admin_login') != true) {
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
                $edit_this_course_url = site_url('admin/course_form/course_edit/' . $row->id);
                $section_and_lesson_url = site_url('admin/course_form/course_edit/' . $row->id);

                if ($row->status == 'active') {
                    $course_status_changing_message = get_phrase('mark_as_pending');
                    if ($row->user_id != $this->session->userdata('user_id')) {
                        $course_status_changing_action = "showAjaxModal('" . site_url('modal/popup/change_course_status_for_admin/pending/' . $row->id . '/' . $filter_data['selected_category_id'] . '/' . $filter_data['selected_instructor_id'] . '/' . $filter_data['selected_price'] . '/' . $filter_data['selected_status']) . "', '" . $course_status_changing_message . "')";
                    } else {
                        $course_status_changing_action = "confirm_modal('" . site_url('admin/change_course_status_for_admin/pending/' . $row->id . '/' . $filter_data['selected_category_id'] . '/' . $filter_data['selected_instructor_id'] . '/' . $filter_data['selected_price'] . '/' . $filter_data['selected_status']) . "')";
                    }
                } else {
                    $course_status_changing_message = get_phrase('mark_as_active');
                    if ($row->user_id != $this->session->userdata('user_id')) {
                        $course_status_changing_action = "showAjaxModal('" . site_url('modal/popup/change_course_status_for_admin/active/' . $row->id . '/' . $filter_data['selected_category_id'] . '/' . $filter_data['selected_instructor_id'] . '/' . $filter_data['selected_price'] . '/' . $filter_data['selected_status']) . "', '" . $course_status_changing_message . "')";
                    } else {
                        $course_status_changing_action = "confirm_modal('" . site_url('admin/change_course_status_for_admin/active/' . $row->id . '/' . $filter_data['selected_category_id'] . '/' . $filter_data['selected_instructor_id'] . '/' . $filter_data['selected_price'] . '/' . $filter_data['selected_status']) . "')";
                    }
                }



                $delete_course_url = "confirm_modal('" . site_url('admin/course_actions/delete/' . $row->id) . "')";

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

                $nestedData['title'] = '<strong><a href="' . site_url('admin/course_form/course_edit/' . $row->id) . '">' . $row->title . '</a></strong><br>
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

    public function active_courses($category_type = 0)
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }


        $page_data['page_name'] = 'active_courses';
        $page_data['page_title'] = get_phrase('active_courses');
        $page_data['category_type'] = $cateory_type;

        $wherearray = [];
        if (in_array($category_type, ['0'])) {
            $wherearray['course_type'] = 'general';
        }
        $wherearray['status'] = 'active';
        $wherearray['category_type'] = $category_type;

        $page_data['courses'] = $this->db->where($wherearray)->get('course')->result_array();
        // echo '<pre>';
        // print_r($page_data['courses']);
        $this->load->view('backend/index', $page_data);
    }

    public function pending_courses($category_type = 0)
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }


        $page_data['page_name'] = 'pending_courses';
        $page_data['page_title'] = get_phrase('pending_courses');
        $page_data['category_type'] = $cateory_type;

        $wherearray = [];
        if (in_array($category_type, ['0'])) {
            $wherearray['course_type'] = 'general';
        }
        $wherearray['status'] = 'pending';
        $wherearray['category_type'] = $category_type;
        // print_r($wherearray);die;
        $page_data['courses'] = $this->db->where($wherearray)->get('course')->result_array();

        $this->load->view('backend/index', $page_data);
    }
    public function live_class($ID = "")
    {
        if ($ID != "") {
            $LiveClass = $this->db->get_where('live_class', array('id' => $ID))->row_array();
            $page_data["LiveClass"] = $LiveClass;
        }
        $page_data['page_name'] = 'live_class';
        $page_data['page_title'] = "Live Class";
        $page_data['courses'] = $this->crud_model->filter_course_for_backend("all", $this->session->userdata('user_id'), "all", "all");

        $page_data['live_class_id'] = $ID;

        $this->load->view('backend/index.php', $page_data);
    }
    public function course_actions($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == "add") {
            
            $course_id = $this->crud_model->add_course();
            $this->savecurriculum($course_id);
            $this->sendnotification_admin($course_id,$this->session->userdata('user_id'));
            
            $course_data = $this->db->get_where('course', array('id' => $course_id))->row_array();
            redirect('admin/courses');
            // redirect(site_url('home/course/' . rawurlencode(slugify($course_data['title'])) . '/' . $course_id), 'refresh');
            
            // $this->sendnotification($course_id,$this->session->userdata('user_id'));
            
            
        } elseif ($param1 == 'add_shortcut') {
            echo $this->crud_model->add_shortcut_course();
        } elseif ($param1 == "edit") {
            $this->crud_model->update_course($param2);
            
             $this->savecurriculum($param2);
             
            // CHECK IF LIVE CLASS ADDON EXISTS, ADD OR UPDATE IT TO ADDON MODEL
            if (addon_status('live-class')) {
                $this->load->model('addons/Liveclass_model', 'liveclass_model');
                $this->liveclass_model->update_live_class($param2);
            }

            redirect(site_url('admin/courses'), 'refresh');
        } elseif ($param1 == 'delete') {
            $this->is_drafted_course($param2);
            $this->crud_model->delete_course($param2);
            redirect(site_url('admin/courses'), 'refresh');
        } elseif ($param1 == "edit_video_learning") {

            //$this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->edit_video_learning($param2);
            $this->savecurriculum($param2);
            $this->session->set_flashdata('flash_message', get_phrase('course_updated_successfully'));
            redirect(site_url('admin/video_learning/' . $param2), 'refresh');
        } elseif ($param1 == "edit_serial_learning") {
            //$this->is_the_course_belongs_to_current_instructor($param2);
            $this->crud_model->edit_serial_learning($param2);
            $this->savecurriculum($param2);
            redirect(site_url('admin/serial_learning'), 'refresh');
            // redirect(site_url('admin/serial_learning/edit_form/' . $param2), 'refresh');
        } elseif ($param1 == 'deletevideo') {
            $this->db->where('id', $param2);
            $this->db->delete('course');
            redirect(site_url('admin/video_learning'), 'refresh');
        }
    }

    /* 25-05-2022 start */
    public function savecurriculum($course_id = 0)
    {
        if(!empty($_POST['section'])>0)
        {
            $this->db->where('course_id',$course_id)->delete('section');
            
            $lessondata = $this->db->select('id as lesson_id')->where('course_id',$course_id)->get('lesson')->result();
            
            if(!empty($lessondata))
            {
                $implode_ids = array_column($lessondata,'lesson_id');
                $this->db->where_in('quiz_id',$implode_ids);
            }
            
            $this->db->where('course_id',$course_id)->delete('lesson');
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
    /* 25-05-2022 close */

    public function course_form($param1 = "", $param2 = "")
    {

        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_course') {
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $page_data['page_name'] = 'course_add';
            $page_data['page_title'] = get_phrase('add_course');
            $this->load->view('backend/index', $page_data);
        } elseif ($param1 == 'add_course_shortcut') {
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            // echo '<pre>';print_r($page_data['categories']->result_array());die;
            $this->load->view('backend/admin/course_add_shortcut', $page_data);
        } elseif ($param1 == 'course_edit') {
            $this->is_drafted_course($param2);
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
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $page_data['course_id'] =  $param2;
    
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
            $page_data['page_name'] = 'edit_video_learning';

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
    }

    /*08-04-2022 start*/
    public function courses_list()
    {

        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // $id = isset($_GET['id']);
        $status = (isset($_GET['status'])) ? $_GET['status'] : 'active';
        // $category = isset($_GET['category']);
        $category_type = (isset($_GET['category_type'])) ? $_GET['category_type'] : '0';


        $is_free = (!empty($_GET['is_free'])) ? $_GET['is_free'] : '';


        // filter change start here
        //08-04-2022 start
        $page_data['search']   = isset($_GET['search']) ? $_GET['search'] : "";
        //08-04-2022 close

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = isset($_GET['instructor_id']) ? $_GET['instructor_id'] : "all";
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";
        //filter change stop here

        if (!empty($_GET['filter_status'])) {
            $page_data['selected_status'] = $_GET['filter_status'];
            $status = $_GET['filter_status'];
        }

        $page_data['courses']                =  $this->crud_model->get_courses_list($status, $category_type, $is_free);
        // echo COUNT($page_data['courses']);die;

        $page_data['category_type'] = $category_type;
        $page_data['is_free'] = $is_free;

        // echo '<pre>';print_r($page_data['courses']);die;

        $page_data['instructors']            = $this->db->select('id,first_name,last_name')->from('users')->where('role_id','2')->where('is_instructor','1')->get()->result_array();

        $page_data['page_name']              = 'course_list';
        $page_data['categories']             = $this->crud_model->get_categories();
        $page_data['page_title']             = get_phrase('active_courses');
        $this->load->view('backend/index', $page_data);
    }
    /*08-04-2022 stop*/



    public function video_learning()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        //08-04-2022 start
        $page_data['search']   = isset($_GET['search']) ? $_GET['search'] : "";
        //08-04-2022 close

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = isset($_GET['instructor_id']) ? $_GET['instructor_id'] : "all";
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";
        // $page_data['courses']                = $this->crud_model->filter_video_learning_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status']);

        $page_data['courses']                = $this->crud_model->filter_video_learning_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);
        
        $coursedata                = $this->crud_model->filter_video_learning_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);
        
        
        $page_data['instructors']            = $this->user_model->get_instructor()->result_array();
        $page_data['page_name']              = 'video-learning-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();
        $page_data['page_title']             = get_phrase('active_courses');
        
        
        
         
        if(isset($_GET['excel'])== 'excel')
        {
            $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        
          $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Course Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Course Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Short Description');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Discounted Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Instructor Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Entry Date');
        
        
        
          $rowcount = 3;
        foreach($coursedata as $key => $value)
        {
           
        
           
              
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Video');
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value['title']);
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value['short_description']);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value['price']);
            $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", $value['discounted_price']);
          
            $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", $value['first_name'].' '.$value['last_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue("H$rowcount", date('d,M Y',strtotime($value->date_added)));
            $rowcount++;
        }
        
        
   
        
        
      
        
        $filename = 'video-course-'.date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
        
            
          die();  
            
            
        }
        
        
        
        
        $this->load->view('backend/index', $page_data);
    }


    private function is_drafted_course($course_id)
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $course_details = $this->crud_model->get_course_by_id($course_id)->row_array();
        if ($course_details['status'] == 'draft') {
            $this->session->set_flashdata('error_message', get_phrase('you_do_not_have_right_to_access_this_course'));
            redirect(site_url('admin/courses'), 'refresh');
        }
    }

    public function change_course_status($updated_status = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $course_id = $this->input->post('course_id');
        $category_id = $this->input->post('category_id');
        $instructor_id = $this->input->post('instructor_id');
        $price = $this->input->post('price');
        $status = $this->input->post('status');
        if (isset($_POST['mail_subject']) && isset($_POST['mail_body'])) {
            $mail_subject = $this->input->post('mail_subject');
            $mail_body = $this->input->post('mail_body');
            $this->email_model->send_mail_on_course_status_changing($course_id, $mail_subject, $mail_body);
        }
        $this->crud_model->change_course_status($updated_status, $course_id);
        $this->session->set_flashdata('flash_message', get_phrase('course_status_updated'));
        redirect(site_url('admin/courses?category_id=' . $category_id . '&status=' . $status . '&instructor_id=' . $instructor_id . '&price=' . $price), 'refresh');
    }
    public function test($type, $id)
    {
        $result = $this->crud_model->get_followers($type, $id)->result();
        $fbId = [];
        foreach ($result as $id) {
            array_push($fbId, $id->fcm_token);
        }
        print_r($fbId);
    }

    public function change_course_status_for_admin($updated_status = "", $course_id = "", $category_id = "", $status = "", $instructor_id = "", $price = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $this->crud_model->change_course_status($updated_status, $course_id);
        $this->session->set_flashdata('flash_message', get_phrase('course_status_updated'));
        //     redirect(site_url('admin/courses?category_id='.$category_id.'&status='.$status.'&instructor_id='.$instructor_id.'&price='.$price), 'refresh');
        if ($updated_status == "active")
        {

            $CourseDetail = $this->db->select('users.first_name,users.last_name,course.user_id,course.title')->from('course')->join('users', 'users.id=course.user_id')->where('course.id', $course_id)->get('')->row();

            if ($this->session->userdata('user_id') != $CourseDetail->user_id) 
            {
                $NotificationArray = [
                    'title' => $CourseDetail->title,
                    'description' => "Hello, $CourseDetail->first_name $CourseDetail->last_name You have successfully created a $CourseDetail->title course. For more info: "
                ];
                $this->db->insert('notification', $NotificationArray);
                $notification_id = $this->db->insert_id();

                $InsertNotificationUserArray = [
                    'notification_id' => $notification_id,
                    'user_id' => $CourseDetail->user_id,
                    'read_status' => 0,
                ];
                $this->db->insert('notification_users', $InsertNotificationUserArray);
            }
            $this->sendNotification("course", $course_id);
            redirect(site_url('admin/active_courses'), 'refresh');
        }
        else
        {
        $CourseDetail = $this->db->select('users.first_name,users.last_name,course.user_id,course.title')->from('course')->join('users', 'users.id=course.user_id')->where('course.id', $course_id)->get('')->row();

            if ($this->session->userdata('user_id') != $CourseDetail->user_id) 
            {
                $NotificationArray = [
                    'title' => $CourseDetail->title,
                    'description' => "Hello, $CourseDetail->first_name $CourseDetail->last_name You have successfully created a $CourseDetail->title course. For more info: "
                ];
                $this->db->insert('notification', $NotificationArray);
                $notification_id = $this->db->insert_id();

                $InsertNotificationUserArray = [
                    'notification_id' => $notification_id,
                    'user_id' => $CourseDetail->user_id,
                    'read_status' => 0,
                ];
                $this->db->insert('notification_users', $InsertNotificationUserArray);
            }
            $this->sendNotification("course", $course_id);
            redirect(site_url('admin/pending_courses'), 'refresh');
        }
    }

    public function change_serial_status_for_admin($updated_status = "", $course_id = "", $category_id = "", $instructor_id = "", $price = "", $status = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $this->crud_model->change_serial_learning_status($updated_status, $course_id);
        $this->session->set_flashdata('flash_message', get_phrase('serial_learning_status_updated'));
        if ($updated_status == "active") {
            $CourseDetail = $this->db->select('users.first_name,users.last_name,course.user_id,course.title')->from('course')->join('users', 'users.id=course.user_id')->where('course.id', $course_id)->get('')->row();

            if ($this->session->userdata('user_id') != $CourseDetail->user_id) {
                $NotificationArray = [
                    'title' => $CourseDetail->title,
                    'description' => "Hello, $CourseDetail->first_name $CourseDetail->last_name You have successfully created a $CourseDetail->title course. For more info: "
                ];
                $this->db->insert('notification', $NotificationArray);
                $notification_id = $this->db->insert_id();

                $InsertNotificationUserArray = [
                    'notification_id' => $notification_id,
                    'user_id' => $CourseDetail->user_id,
                    'read_status' => 0,
                ];
                $this->db->insert('notification_users', $InsertNotificationUserArray);
            }

            $this->sendNotification("serial", $course_id);
        }
        redirect(site_url('admin/serial_learning?category_id=' . $category_id . '&status=' . $status . '&instructor_id=' . $instructor_id . '&price=' . $price), 'refresh');
    }
    public function change_video_status_for_admin($updated_status = "", $course_id = "", $category_id = "", $instructor_id = "", $price = "", $status = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $this->crud_model->change_video_learning_status($updated_status, $course_id);
        $this->session->set_flashdata('flash_message', get_phrase('video_learning_status_updated'));
        if ($updated_status == "active") {
            $CourseDetail = $this->db->select('users.first_name,users.last_name,course.user_id,course.title')->from('course')->join('users', 'users.id=course.user_id')->where('course.id', $course_id)->get('')->row();

            if ($this->session->userdata('user_id') != $CourseDetail->user_id) {
                $NotificationArray = [
                    'title' => $CourseDetail->title,
                    'description' => "Hello, $CourseDetail->first_name $CourseDetail->last_name You have successfully created a $CourseDetail->title course. For more info: "
                ];
                $this->db->insert('notification', $NotificationArray);
                $notification_id = $this->db->insert_id();

                $InsertNotificationUserArray = [
                    'notification_id' => $notification_id,
                    'user_id' => $CourseDetail->user_id,
                    'read_status' => 0,
                ];
                $this->db->insert('notification_users', $InsertNotificationUserArray);
            }

            $this->sendNotification("video", $course_id);
        }
        redirect(site_url('admin/video_learning?category_id=' . $category_id . '&status=' . $status . '&instructor_id=' . $instructor_id . '&price=' . $price), 'refresh');
    }

    public function change_webinar_status_for_admin($updated_status = "", $course_id = "", $category_id = "", $instructor_id = "", $price = "", $status = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $this->crud_model->change_webinar_status($updated_status, $course_id);
        $this->session->set_flashdata('flash_message', get_phrase('webinar_status_updated'));
        if ($updated_status == "active") {
            $CourseDetail = $this->db->select('users.first_name,users.last_name,course.user_id,course.title')->from('course')->join('users', 'users.id=course.user_id')->where('course.id', $course_id)->get('')->row();

            if ($this->session->userdata('user_id') != $CourseDetail->user_id) {
                $NotificationArray = [
                    'title' => $CourseDetail->title,
                    'description' => "Hello, $CourseDetail->first_name $CourseDetail->last_name You have successfully created a $CourseDetail->title course. For more info: "
                ];
                $this->db->insert('notification', $NotificationArray);
                $notification_id = $this->db->insert_id();

                $InsertNotificationUserArray = [
                    'notification_id' => $notification_id,
                    'user_id' => $CourseDetail->user_id,
                    'read_status' => 0,
                ];
                $this->db->insert('notification_users', $InsertNotificationUserArray);
            }
            $this->sendNotification("webinar", $course_id);
        }
        redirect(site_url('admin/webinar?category_id=' . $category_id . '&status=' . $status . '&instructor_id=' . $instructor_id), 'refresh');
    }

    public function sendNotification($type = "", $id = "")
    {
        $this->load->library('PushNotification');
        $this->pushnotification->setTitle("New " . $type . " Added");
        $this->pushnotification->setMessage("");

        /**
         * set to true if the notificaton is used to invoke a function
         * in the background
         */
        $this->pushnotification->setIsBackground(false);

        /**
         * payload is userd to send additional data in the notification
         * This is purticularly useful for invoking functions in background
         * -----------------------------------------------------------------
         * set payload as null if no custom data is passing in the notification
         */
        $payload = array('notification' => '');
        $this->pushnotification->setPayload($payload);

        /**
         * Send images in the notification
         */
        //			$this->pushnotification->setImage('https://firebase.google.com/_static/9f55fd91be/images/firebase/lockup.png');

        /**
         * Get the compiled notification data as an array
         */

        $json = $this->pushnotification->getPush();
        $result = $this->crud_model->get_followers($type, $id)->result();
        $fbId = [];
        foreach ($result as $id) {
            array_push($fbId, $id->fcm_token);
        }

        $p = $this->pushnotification->sendMultiple($fbId, $json);
    }



    public function sections($param1 = "", $param2 = "", $param3 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param2 == 'add') {
            $this->crud_model->add_section($param1);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_added_successfully'));
        } elseif ($param2 == 'edit') {
            $this->crud_model->edit_section($param3);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_updated_successfully'));
        } elseif ($param2 == 'delete') {
            $this->crud_model->delete_section($param1, $param3);
            $this->session->set_flashdata('flash_message', get_phrase('section_has_been_deleted_successfully'));
        }
        redirect(site_url('admin/course_form/course_edit/' . $param1));
    }

    public function lessons($course_id = "", $param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        if ($param1 == 'add') {
            $this->crud_model->add_lesson();
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_added_successfully'));
            redirect('admin/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'edit') {
            $this->crud_model->edit_lesson($param2);
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_updated_successfully'));
            redirect('admin/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'delete') {
            $this->crud_model->delete_lesson($param2);
            $this->session->set_flashdata('flash_message', get_phrase('lesson_has_been_deleted_successfully'));
            redirect('admin/course_form/course_edit/' . $course_id);
        } elseif ($param1 == 'filter') {
            redirect('admin/lessons/' . $this->input->post('course_id'));
        }
        $page_data['page_name'] = 'lessons';
        $page_data['lessons'] = $this->crud_model->get_lessons('course', $course_id);
        $page_data['course_id'] = $course_id;
        $page_data['page_title'] = get_phrase('lessons');
        $this->load->view('backend/index', $page_data);
    }

    public function watch_video($slugified_title = "", $lesson_id = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $lesson_details          = $this->crud_model->get_lessons('lesson', $lesson_id)->row_array();
        $page_data['provider']   = $lesson_details['video_type'];
        $page_data['video_url']  = $lesson_details['video_url'];
        $page_data['lesson_id']  = $lesson_id;
        $page_data['page_name']  = 'video_player';
        $page_data['page_title'] = get_phrase('video_player');
        $this->load->view('backend/index', $page_data);
    }


    // Language Functions
    public function manage_language($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'add_language') {
            $language = trimmer($this->input->post('language'));
            if ($language == 'n-a') {
                $this->session->set_flashdata('error_message', get_phrase('language_name_can_not_be_empty_or_can_not_have_special_characters'));
                redirect(site_url('admin/manage_language'), 'refresh');
            }
            saveDefaultJSONFile($language);
            $this->session->set_flashdata('flash_message', get_phrase('language_added_successfully'));
            redirect(site_url('admin/manage_language'), 'refresh');
        }
        if ($param1 == 'add_phrase') {
            $new_phrase = get_phrase($this->input->post('phrase'));
            $this->session->set_flashdata('flash_message', $new_phrase . ' ' . get_phrase('has_been_added__successfully'));
            redirect(site_url('admin/manage_language'), 'refresh');
        }

        if ($param1 == 'edit_phrase') {
            $page_data['edit_profile'] = $param2;
        }

        if ($param1 == 'delete_language') {
            if (file_exists('application/language/' . $param2 . '.json')) {
                unlink('application/language/' . $param2 . '.json');
                $this->session->set_flashdata('flash_message', get_phrase('language_deleted_successfully'));
                redirect(site_url('admin/manage_language'), 'refresh');
            }
        }
        $page_data['languages']             = $this->crud_model->get_all_languages();
        $page_data['page_name']             =   'manage_language';
        $page_data['page_title']            =   get_phrase('multi_language_settings');
        $this->load->view('backend/index', $page_data);
    }

    public function update_phrase_with_ajax()
    {
        $current_editing_language = $this->input->post('currentEditingLanguage');
        $updatedValue = $this->input->post('updatedValue');
        $key = $this->input->post('key');
        saveJSONFile($current_editing_language, $key, $updatedValue);
        echo $current_editing_language . ' ' . $key . ' ' . $updatedValue;
    }

    function message($param1 = 'message_home', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($param1 == 'send_new') {
            
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent'));
            redirect(site_url('admin/message/message_read/' . $message_thread_code), 'refresh');
        }

        if ($param1 == 'send_reply') {
            $this->crud_model->send_reply_message($param2); //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent'));

            $html = '';
            $messages =    $this->db->order_by('message_id','ASC')->get_where('message', array('message_thread_code' => $param2))->result_array();
            foreach ($messages as $row) {
                $sender_details = $this->user_model->get_all_user($row['sender'])->row_array();
                $sender_id   =    $row['sender'];

                $data['message_thread_code'] = $current_message_thread_code;

                $html .=
                    '<li class="clearfix ' . (($this->session->userdata('user_id') == $sender_id) ? ' odd ' : '') . '">
                    <div class="chat-avatar">
                        <a href="#">
                            <img src="' . $this->user_model->get_user_image_url($sender_id) . '" alt="image" class="mr-3 d-none d-sm-block avatar-sm rounded-circle" style="height: 40px; width: 40px;">
                        </a>
                    </div>
                    <div class="conversation-text">
                        <div class="ctext-wrap">
                            <i>' . ($this->db->get_where('users', array('id' => $sender_id))->row()->first_name . ' ' . $this->db->get_where('users', array('id' => $sender_id))->row()->last_name) . '</i>
                            <p>' . $row['message'] . '</p>
                        </div>
                        <small class="message_sending_time">' . date("d M, Y H:i", $row['timestamp']) . '</small>
                    </div>
                </li>';
            }

            echo json_encode(['Status' => 200, 'Data' => $html]);
            die;

            // redirect(site_url('admin/message/message_read/' . $param2), 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2; // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name'] = $param1;
        $page_data['page_name']               = 'message';
        $page_data['page_title']              = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }

    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($param1 == 'update_profile_info') {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/manage_profile'), 'refresh');
        }
        if ($param1 == 'change_password') {
            $this->user_model->change_password($param2);
            redirect(site_url('admin/manage_profile'), 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('users', array(
            'id' => $this->session->userdata('user_id')
        ))->result_array();

        // echo '<pre>';print_r($page_data['edit_data']);die;
        $this->load->view('backend/index', $page_data);
    }


    function instructor_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(site_url('login'), 'refresh');
        }

        if ($param1 == 'update_profile_info') {
            $this->user_model->edit_user($param2);
            redirect(site_url('admin/instructors'), 'refresh');
        }
        if ($param1 == 'change_password') {
            $this->user_model->change_password($param2);
            redirect(site_url('admin/instructors'), 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('users', array(
            'id' => $param3
        ))->result_array();

        // print_r($page_data['edit_data']);die;
        $this->load->view('backend/index', $page_data);
    }

    public function paypal_checkout_for_instructor_revenue()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $page_data['amount_to_pay']         = $this->input->post('amount_to_pay');
        $page_data['payout_id']            = $this->input->post('payout_id');
        $page_data['instructor_name']       = $this->input->post('instructor_name');
        $page_data['production_client_id']  = $this->input->post('production_client_id');

        // BEFORE, CHECK PAYOUT AMOUNTS ARE VALID
        $payout_details = $this->crud_model->get_payouts($page_data['payout_id'], 'payout')->row_array();
        if ($payout_details['amount'] == $page_data['amount_to_pay'] && $payout_details['status'] == 0) {
            $this->load->view('backend/admin/paypal_checkout_for_instructor_revenue', $page_data);
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_payout_data'));
            redirect(site_url('admin/instructor_payout'), 'refresh');
        }
    }


    // PAYPAL CHECKOUT ACTIONS
    public function paypal_payment($payout_id = "", $paypalPaymentID = "", $paypalPaymentToken = "", $paypalPayerID = "")
    {
        $payout_details = $this->crud_model->get_payouts($payout_id, 'payout')->row_array();
        $instructor_id = $payout_details['user_id'];
        $instructor_data = $this->db->get_where('users', array('id' => $instructor_id))->row_array();
        $paypal_keys = json_decode($instructor_data['paypal_keys'], true);
        $production_client_id = $paypal_keys[0]['production_client_id'];
        $production_secret_key = $paypal_keys[0]['production_secret_key'];
        // $production_client_id = 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R';
        // $production_secret_key = 'EFI50pO1s1cV1cySQ85wg2Pncn4VOPxKvTLBhyeGtd1QHNac-OJFsQlS7GAwlXZSg2wtm-BOJ9Ar3XJy';

        //THIS IS HOW I CHECKED THE PAYPAL PAYMENT STATUS
        $status = $this->payment_model->paypal_payment($paypalPaymentID, $paypalPaymentToken, $paypalPayerID, $production_client_id, $production_secret_key);
        if (!$status) {
            $this->session->set_flashdata('error_message', get_phrase('an_error_occurred_during_payment'));
            redirect(site_url('admin/instructor_payout'), 'refresh');
        }
        $this->crud_model->update_payout_status($payout_id, 'paypal');
        $this->session->set_flashdata('flash_message', get_phrase('payout_updated_successfully'));
        redirect(site_url('admin/instructor_payout'), 'refresh');
    }

    public function stripe_checkout_for_instructor_revenue($payout_id)
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        // BEFORE, CHECK PAYOUT AMOUNTS ARE VALID
        $payout_details = $this->crud_model->get_payouts($payout_id, 'payout')->row_array();
        if ($payout_details['amount'] > 0 && $payout_details['status'] == 0) {
            $page_data['user_details']    = $this->user_model->get_user($payout_details['user_id'])->row_array();
            $page_data['amount_to_pay']   = $payout_details['amount'];
            $page_data['payout_id']       = $payout_details['id'];
            $this->load->view('backend/admin/stripe_checkout_for_instructor_revenue', $page_data);
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_payout_data'));
            redirect(site_url('admin/instructor_payout'), 'refresh');
        }
    }

    // STRIPE CHECKOUT ACTIONS
    public function stripe_payment($payout_id = "", $session_id = "")
    {
        $payout_details = $this->crud_model->get_payouts($payout_id, 'payout')->row_array();
        $instructor_id = $payout_details['user_id'];
        //THIS IS HOW I CHECKED THE STRIPE PAYMENT STATUS
        $response = $this->payment_model->stripe_payment($instructor_id, $session_id, true);

        if ($response['payment_status'] === 'succeeded') {
            $this->crud_model->update_payout_status($payout_id, 'stripe');
            $this->session->set_flashdata('flash_message', get_phrase('payout_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', $response['status_msg']);
        }

        redirect(site_url('admin/instructor_payout'), 'refresh');
    }

    public function preview($course_id = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $this->is_drafted_course($course_id);
        if ($course_id > 0) {
            $courses = $this->crud_model->get_course_by_id($course_id);
            if ($courses->num_rows() > 0) {
                $course_details = $courses->row_array();
                redirect(site_url('home/lesson/' . rawurlencode(slugify($course_details['title'])) . '/' . $course_details['id']), 'refresh');
            }
        }
        redirect(site_url('admin/courses'), 'refresh');
    }

    // Manage Quizes
    public function quizes($course_id = "", $action = "", $quiz_id = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        if ($action == 'add') {
            $this->crud_model->add_quiz($course_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_added_successfully'));
        } elseif ($action == 'edit') {
            $this->crud_model->edit_quiz($quiz_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_updated_successfully'));
        } elseif ($action == 'delete') {
            $this->crud_model->delete_section($course_id, $quiz_id);
            $this->session->set_flashdata('flash_message', get_phrase('quiz_has_been_deleted_successfully'));
        }
        redirect(site_url('admin/course_form/course_edit/' . $course_id));
    }

    // Manage Quize Questions
    public function quiz_questions($quiz_id = "", $action = "", $question_id = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $quiz_details = $this->crud_model->get_lessons('lesson', $quiz_id)->row_array();

        if ($action == 'add') {
            $response = $this->crud_model->add_quiz_questions($quiz_id);
            echo $response;
        } elseif ($action == 'edit') {
            $response = $this->crud_model->update_quiz_questions($question_id);
            echo $response;
        } elseif ($action == 'delete') {
            $response = $this->crud_model->delete_quiz_question($question_id);
            $this->session->set_flashdata('flash_message', get_phrase('question_has_been_deleted'));
            redirect(site_url('admin/course_form/course_edit/' . $quiz_details['course_id']));
        }
    }

    // Manage Quizes
    public function fill_in_blank($course_id = "", $action = "", $quiz_id = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $quiz_details = $this->crud_model->get_lessons('lesson', $course_id)->row_array();
        if ($action == 'add') {
            $this->crud_model->add_quiz($course_id, 'fill_in_blank');
            $this->session->set_flashdata('flash_message', 'Fill in Blank Added Successfully');
            redirect(site_url('admin/course_form/course_edit/' . $course_id));
        } elseif ($action == 'edit') {
            $this->crud_model->edit_quiz($quiz_id);
            $this->session->set_flashdata('flash_message',  'Fill in Blank updated Successfully');
            redirect(site_url('admin/course_form/course_edit/' . $course_id));
        } elseif ($action == 'delete') {
            $this->crud_model->delete_fill_in_blank($course_id, $quiz_id);
            $this->session->set_flashdata('flash_message', 'Fill in Blank Deleted Successfully');
        }
        redirect(site_url('admin/course_form/course_edit/' . $quiz_details['course_id']));
    }

    public function fill_in_blank_action($quiz_id = "", $action = "", $question_id = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }
        $quiz_details = $this->crud_model->get_lessons('lesson', $quiz_id)->row_array();

        if ($action == 'add') {
            $response = $this->crud_model->add_blank_questions($quiz_id);
            echo $response;
        } elseif ($action == 'edit') {
            $response = $this->crud_model->update_blank_questions($question_id);
            echo $response;
        } elseif ($action == 'delete') {
            $response = $this->crud_model->delete_quiz_question($question_id);
            $this->session->set_flashdata('flash_message', get_phrase('question_has_been_deleted'));
            redirect(site_url('admin/course_form/course_edit/' . $quiz_details['course_id']));
        }
    }

    // software about page
    function about()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $page_data['application_details'] = $this->crud_model->get_application_details();
        $page_data['page_name']  = 'about';
        $page_data['page_title'] = get_phrase('about');
        $this->load->view('backend/index', $page_data);
    }

    public function install_theme($theme_to_install = '')
    {

        if ($this->session->userdata('admin_login') != 1) {
            redirect(site_url('login'), 'refresh');
        }

        $uninstalled_themes = $this->crud_model->get_uninstalled_themes();
        if (!in_array($theme_to_install, $uninstalled_themes)) {
            $this->session->set_flashdata('error_message', get_phrase('this_theme_is_not_available'));
            redirect(site_url('admin/theme_settings'));
        }

        if (!class_exists('ZipArchive')) {
            $this->session->set_flashdata('error_message', get_phrase('your_server_is_unable_to_extract_the_zip_file') . '. ' . get_phrase('please_enable_the_zip_extension_on_your_server') . ', ' . get_phrase('then_try_again'));
            redirect(site_url('admin/theme_settings'));
        }

        $zipped_file_name = $theme_to_install;
        $unzipped_file_name = substr($zipped_file_name, 0, -4);
        // Create update directory.
        $views_directory  = 'application/views/frontend';
        $assets_directory = 'assets/frontend';

        //Unzip theme zip file and remove zip file.
        $theme_path = 'themes/' . $zipped_file_name;
        $theme_zip = new ZipArchive;
        $theme_result = $theme_zip->open($theme_path);
        if ($theme_result === TRUE) {
            $theme_zip->extractTo('themes');
            $theme_zip->close();
        }

        // unzip the views zip file to the application>views folder
        $views_path = 'themes/' . $unzipped_file_name . '/views/' . $zipped_file_name;
        $views_zip = new ZipArchive;
        $views_result = $views_zip->open($views_path);
        if ($views_result === TRUE) {
            $views_zip->extractTo($views_directory);
            $views_zip->close();
        }

        // unzip the assets zip file to the assets/frontend folder
        $assets_path = 'themes/' . $unzipped_file_name . '/assets/' . $zipped_file_name;
        $assets_zip = new ZipArchive;
        $assets_result = $assets_zip->open($assets_path);
        if ($assets_result === TRUE) {
            $assets_zip->extractTo($assets_directory);
            $assets_zip->close();
        }

        unlink($theme_path);
        $this->crud_model->remove_files_and_folders('themes/' . $unzipped_file_name);
        $this->session->set_flashdata('flash_message', get_phrase('theme_imported_successfully'));
        redirect(site_url('admin/theme_settings'));
    }

    //ADDON MANAGER PORTION STARTS HERE
    public function addon($param1 = "", $param2 = "", $param3 = "")
    {
        if ($this->session->userdata('admin_login') != 1) {
            redirect(site_url('login'), 'refresh');
        }
        // ADD NEW ADDON FORM
        if ($param1 == 'add') {

            $page_data['page_name'] = 'addon_add';
            $page_data['page_title'] = get_phrase('add_addon');
        }

        if ($param1 == 'update') {

            $page_data['page_name'] = 'addon_update';
            $page_data['page_title'] = get_phrase('add_update');
        }

        // INSTALLING AN ADDON
        if ($param1 == 'install' || $param1 == 'version_update') {
            $this->addon_model->install_addon($param1);
        }

        // ACTIVATING AN ADDON
        if ($param1 == 'activate') {
            $update_message = $this->addon_model->addon_activate($param2);
            $this->session->set_flashdata('flash_message', get_phrase($update_message));
            redirect(site_url('admin/addon'), 'refresh');
        }

        // DEACTIVATING AN ADDON
        if ($param1 == 'deactivate') {
            $update_message = $this->addon_model->addon_deactivate($param2);
            $this->session->set_flashdata('flash_message', get_phrase($update_message));
            redirect(site_url('admin/addon'), 'refresh');
        }

        // REMOVING AN ADDON
        if ($param1 == 'delete') {
            $this->addon_model->addon_delete($param2);
            $this->session->set_flashdata('flash_message', get_phrase('addon_is_deleted_successfully'));
            redirect(site_url('admin/addon'), 'refresh');
        }

        // SHOWING LIST OF INSTALLED ADDONS
        if (empty($param1)) {
            $page_data['page_name'] = 'addons';
            $page_data['addons'] = $this->addon_model->addon_list()->result_array();
            $page_data['page_title'] = get_phrase('addon_manager');
        }
        $this->load->view('backend/index', $page_data);
    }

    //AVAILABLE_ADDONS
    public function available_addons()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $page_data['page_name']  = 'available_addon';
        $page_data['page_title'] = get_phrase('available_addon');
        $this->load->view('backend/index', $page_data);
    }

    public function instructor_application($param1 = "", $param2 = "")
    { // param1 is the status and param2 is the application id
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        if ($param1 == 'approve' || $param1 == 'delete') {
            $this->user_model->update_status_of_application($param1, $param2);
        }
        $page_data['page_name']  = 'application_list';
        $page_data['page_title'] = get_phrase('instructor_application');
        $page_data['approved_applications'] = $this->user_model->get_approved_applications();
        $page_data['pending_applications'] = $this->user_model->get_pending_applications();
        $this->load->view('backend/index', $page_data);
    }
    public function registrated_instructor($param1 = "", $param2 = "")
    {
        
    

        
        
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $page_data['page_name']  = 'registrated_instructor';
        $page_data['page_title'] = 'Registrated Instructor List';
        $page_data['approveds'] = $this->user_model->get_approved_instructor();
        $page_data['pendings'] = $this->user_model->get_pending_instructor();
        $page_data['rejected'] = $this->user_model->get_rejected_instructor();


        // echo '<prE>';print_r($page_data['rejected']);die;
        $this->load->view('backend/index', $page_data);
    }

    /*change on 21-04-2022*/
    public function instructor_detail($id = 0)
    {
        $page_data['page_name']  = 'instructor_detail';
        $page_data['page_title'] = 'Instructor Detail';
        $page_data['userdata'] = $this->db->select('*')->where('id', $id)->get('users')->row_array();
        // echo '<prE>';print_r($page_data['userdata']);die;
        $this->load->view('backend/index', $page_data);
    }
    /*change on 21-04-2022*/


    public function approve_intructor($param1 = "")
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $this->user_model->update_status_of_instructor($param1);

        $UserData = $this->db->select('first_name,last_name')->where('id', $param1)->get('users')->row();

        $InsertNotification = [
            'title' => 'Approval',
            'description' => "Hello $UserData->first_name $UserData->last_name, Congratulations, your application has been approved.",
            'ts' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('notification', $InsertNotification);
        $notification_id = $this->db->insert_id();

        $InsertUserDetail = [
            'notification_id' => $notification_id,
            'user_id' => $param1,
            'read_status' => 0
        ];
        $this->db->insert('notification_users', $InsertUserDetail);
        
        
      
        
        

        // redirect(site_url('admin/registrated_instructor/'), 'refresh');
    
        
        $data = 'approve';
    
        $this->session->set_flashdata('in','approve');
        
        redirect(site_url('admin/registrated_instructor/'.$data));
        
        
    }
    
    
    
    
    
    public function tester()
    {
        
                  $notification = [
                        'title'=>'title',
        				'body'=>"Hello"
                    ];

                        $topic = "Notify";
        				$url = 'https://fcm.googleapis.com/fcm/send';
        				$fields = array(
        					'to' => 'dpOBIo-pRauH_qqlJ13iUW:APA91bHWZdmlbNTebdtvZfTxlFdOsSrBBIoqZfeyO9-QRMW4OR5LPlG_iMU3qSO0sk5fmPzSq2VNVyRlXV5uKtTohlJGr0wrdyX02X_sawBgi6Ywo4SaJWVgTTY-hzM4rKBtNsx2-4-i',
        					'notification' => $notification,
        				
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
        				print_r($result);
        				if ($result === FALSE) {
        					die('Curl failed: ' . curl_error($ch));
        				}
        				curl_close($ch);
        
    }
    
    
    
    

    // INSTRUCTOR PAYOUT SECTION
    public function instructor_payout($param1 = "")
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        if ($param1 != "") {
            $date_range                   = $this->input->get('date_range');
            $date_range                   = explode(" - ", $date_range);
            $page_data['timestamp_start'] = strtotime($date_range[0]);
            $page_data['timestamp_end']   = strtotime($date_range[1]);
        } else {
            $page_data['timestamp_start'] = strtotime(date('m/01/Y'));
            $page_data['timestamp_end']   = strtotime(date('m/t/Y'));
        }

        $page_data['page_name']  = 'instructor_payout';
        $page_data['page_title'] = get_phrase('instructor_payout');
        $page_data['completed_payouts'] = $this->crud_model->get_completed_payouts_by_date_range($page_data['timestamp_start'], $page_data['timestamp_end']);

        $page_data['subscriptions'] = $this->db->order_by('id', 'DESC')->get('subscription');
        $page_data['pending_payouts'] = $this->crud_model->get_pending_payouts();
        $this->load->view('backend/index', $page_data);
    }

    public function txnStatus($param1 = "")
    {
        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

        // following files need to be included
        require_once(APPPATH . "/libraries/Paytm/config_paytm.php");
        require_once(APPPATH . "/libraries/Paytm/encdec_paytm.php");

        $ORDER_ID = "";
        $requestParamList = array();
        $responseParamList = array();

        if (isset($param1) && $param1 != "") {

            // In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
            $ORDER_ID = $param1;

            // Create an array having all required parameters for status query.
            $requestParamList = array("MID" => PAYTM_MERCHANT_MID, "ORDERID" => $ORDER_ID);

            $StatusCheckSum = getChecksumFromArray($requestParamList, PAYTM_MERCHANT_KEY);

            $requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

            // Call the PG's getTxnStatusNew() function for verifying the transaction status.
            $responseParamList = getTxnStatusNew($requestParamList);
        }

        $page_data['page_name']  = 'txnStatus';
        $page_data['page_title'] = 'Transaction Status';
        $page_data['data'] = $responseParamList;
        $this->load->view('backend/index', $page_data);
    }

    // AJAX PORTION
    // this function is responsible for managing multiple choice question
    function manage_multiple_choices_options()
    {
        $page_data['number_of_options'] = $this->input->post('number_of_options');
        $this->load->view('backend/admin/manage_multiple_choices_options', $page_data);
    }

    public function ajax_get_sub_category($category_id)
    {
        $page_data['sub_categories'] = $this->crud_model->get_sub_categories($category_id);

        return $this->load->view('backend/admin/ajax_get_sub_category', $page_data);
    }

    public function ajax_get_section($course_id)
    {
        $page_data['sections'] = $this->crud_model->get_section('course', $course_id)->result_array();
        return $this->load->view('backend/admin/ajax_get_section', $page_data);
    }

    public function ajax_get_video_details()
    {
        $video_details = $this->video_model->getVideoDetails($_POST['video_url']);
        echo $video_details['duration'];
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

    public function support_request()
    {
        $this->db->from('support_contact');
        $this->db->order_by("id", "desc");
        $page_data['categories'] = $this->db->get()->result_array();
        
        $page_data['page_name'] = 'support_request';
        $page_data['page_title'] = "Support Request";
        $this->load->view('backend/index', $page_data);
    }
    
    /*04-05-2022*/
    public function delete_support_request($id = 0)
    {
        if($id > 0)
        {
            $this->db->where('id',$id)->delete('support_contact');
            $this->session->set_flashdata('flash_message', "Selected Support Request Deleted");
        }
        redirect(base_url('admin/support_request'));
    }
    
    public function feedback()
    {
        $this->db->from('feedback');
        $this->db->order_by("id", "desc");
        $page_data['categories'] = $this->db->get();
        $page_data['page_name'] = 'feedback';
        $page_data['page_title'] = "Instructor Feedback";
        $this->load->view('backend/index', $page_data);
    }

    public function student_form()
    {
        $this->db->from('student_form');
        $this->db->order_by("id", "asc");
        $page_data['categories'] = $this->db->get();
        $page_data['page_name'] = 'student_form';
        $page_data['page_title'] = "Student Form";
        $this->load->view('backend/index', $page_data);
    }

    public function view_feedback()
    {
        $page_data['categories'] = $this->db->get_where('feedback', array("id" => $_GET['id']))->row_array();
        $page_data['page_name'] = 'feedback_view';
        $page_data['page_title'] = "Instructor Feedback";
        $this->load->view('backend/index', $page_data);
    }

    public function banner_request()
    {
        $this->db->from('banner_request');
        $this->db->order_by("id", "desc");
        $page_data['categories'] = $this->db->get();
        $page_data['page_name'] = 'banner_request_view';
        $page_data['page_title'] = "Banner Requests";

        $this->load->view('backend/index', $page_data);
    }

    public function banner_detail($id)
    {
        $this->db->from('banner_request');
        $this->db->where('id', $id);
        $page_data['banner_detail'] = $this->db->get()->row_array();
        $page_data['page_name'] = 'banner_details';
        $page_data['page_title'] = "Banner Requests";

        $this->load->view('backend/index', $page_data);
    }

    public function banner_request_reject($id)
    {
        $data = array('approved' => 2);
        $this->db->where('id', $id);
        $this->db->update('banner_request', $data);
        $this->session->set_flashdata('flash_message', "Status Updated");
        redirect(site_url('admin/banner_request'), 'refresh');
    }

    public function banner_request_approve($id)
    {
        $data = array('approved' => 1);
        $this->db->where('id', $id);
        $this->db->update('banner_request', $data);
        $banner_data = $this->db->get_where('banner_request', array('id' => $id))->row_array();
        $banner_img = $banner_data['image'];
        $insert_data = array(
            'banner_img' => $banner_img,
            'banner_status' => '0',


        );
        $last_insert_id = $this->db->insert('tbl_banner', $insert_data);
        $this->session->set_flashdata('flash_message', "Status Updated");
        redirect(site_url('admin/banner_request'), 'refresh');
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


    function changestudentType()
    {
        echo 'hiiii';
    }


    function changestudentTypeUser()
    {


        $id = $_POST['data1'];
        $id2 = $_POST['data2'];

        if ($id == '2') {
            $kk = 1;

            if ($id2 == 1) {

                $getStudentAll =   $this->user_model->getStudentAll()->result();
            } else {

                $getStudentAll =   $this->user_model->getInstrutorAll()->result();
            }


            foreach ($getStudentAll as $getStudentAlls) {
                if ($kk == 1) {
                    echo " <option value=''>--Select--</option>";
                }
?>
<option value="<?php echo $getStudentAlls->id; ?>"><?php echo $getStudentAlls->first_name; ?></option>
<?php

                $kk++;
            }
        }
    }

    //Change-status.php  changestudentTypeUser


    public function serial_learning($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        //08-04-2022 start
        $page_data['search']   = isset($_GET['search']) ? $_GET['search'] : "";
        //08-04-2022 close

        $page_data['selected_category_id']   = isset($_GET['category_id']) ? $_GET['category_id'] : "all";
        $page_data['selected_instructor_id'] = isset($_GET['instructor_id']) ? $_GET['instructor_id'] : "all";
        $page_data['selected_price']         = isset($_GET['price']) ? $_GET['price'] : "all";
        $page_data['selected_status']        = isset($_GET['status']) ? $_GET['status'] : "all";

        // Courses query is used for deciding if there is any course or not. Check the view you will get it
        $page_data['courses']                = $this->crud_model->filter_serial_learning_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);

        $page_data['status_wise_courses']    = $this->crud_model->get_status_wise_courses();
        $page_data['instructors']            = $this->user_model->get_instructor()->result_array();
        $page_data['page_name']              = 'courses-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();
        
        $coursedata3   = $this->crud_model->filter_serial_learning_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);

        if(isset($_GET['excel']) && strtolower($_GET['excel']) == 'excel')
        {
            
            $this->load->library('excel');
            
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            
            
            $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
            $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Course Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Course Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Short Description');
            $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Price');
            $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Discounted Price');
            $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Instructor Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Entry Date');
            
            $rowcount = 3;
              
            foreach($coursedata3 as $key => $value2)
            {
                $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
                $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Serial');
                $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value2['title']);
                $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value2['short_description']);
                $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value2['price']);
                $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", $value2['discounted_price']);
              
                $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", $value2['first_name'].' '.$value2['last_name']);
                $objPHPExcel->getActiveSheet()->SetCellValue("H$rowcount", date('d,M Y',strtotime($value->date_added)));
                $rowcount++;
            }
            
            $filename = 'serial-course-'.date("Y-m-d-H-i-s").".csv";
            header('Content-Type: application/vnd.ms-excel'); 
            header('Content-Disposition: attachment;filename="'.$filename.'"');
            header('Cache-Control: max-age=0'); 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
            $objWriter->save('php://output');
            
        }
        


        if ($param1 == "add_form") {
            $page_data['languages'] = $this->crud_model->get_all_languages();
            $page_data['categories'] = $this->crud_model->get_categories();
            $page_data['page_name'] = 'add_serial';
            $page_data['page_title'] = get_phrase('add_serial_learning');
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == "add") {


            $course_id = $this->crud_model->add_serial_learning();
            
            $this->savecurriculum($course_id);
            
            $this->sendnotification_admin($course_id,$this->session->userdata('user_id'));
            
            // $last_insert_id = $this->db->insert('serial_learning', $_POST); 
    
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(site_url('admin/serial_learning'), 'refresh');
        }

        if ($param1 == "edit_form") {
            $page_data['categories'] = $this->crud_model->get_categories();
            //$page_data['serialData'] = $this->db->get_where('serial_learning', array("id" => $param2))->row_array();
            $page_data['page_name'] = 'edit-serial-learning';
            $page_data['course_id'] = $param2;
            
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
            
            $page_data['page_title'] = get_phrase('edit_serial');
            
            $this->load->view('backend/index', $page_data);
        }

        if ($param1 == "update") {
            $data = $_POST;
            $this->db->where('id', $param2);
            $this->db->update('course', $data);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(site_url('admin/serial_learning'), 'refresh');
        }

        if ($param1 == "delete") {

            $this->db->where('id', $param2);
            $result = $this->db->delete('course');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/serial_learning'), 'refresh');
        }

        if ($param1 == "") {
            $page_data['page_name'] = 'serial_learning';
            $page_data['page_title'] = get_phrase('serial_learning');
            $page_data['courses']  = $this->crud_model->filter_serial_learning_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);
            // echo '<pre>';print_r($page_data['courses']);die;
            $this->load->view('backend/index', $page_data);
        }
        
       
    }


    public function webinar($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
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
        $page_data['courses']                = $this->crud_model->filter_course_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status']);
     
     $coursedata                = $this->crud_model->filter_course_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status']);
     
     
     
        $page_data['status_wise_courses']    = $this->crud_model->get_status_wise_courses();
        $page_data['instructors']            = $this->user_model->get_instructor()->result_array();
        $page_data['page_name']              = 'courses-server-side';
        $page_data['categories']             = $this->crud_model->get_categories();




   if(isset($_GET['excel'])== 'excel')
        {
            $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        
          $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Course Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Course Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Short Description');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Discounted Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Instructor Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Entry Date');
        
        
        
          $rowcount = 3;
        foreach($coursedata as $key => $value)
        {
           
        
           
              
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Webinar');
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value['title']);
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value['short_description']);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value['price']);
            $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", $value['discounted_price']);
          
            $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", $value['first_name'].' '.$value['last_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue("H$rowcount", date('d,M Y',strtotime($value->date_added)));
            $rowcount++;
        }
        
        
   
        
        
      
        
        $filename = 'webinar-course-'.date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
        
            
          die();  
            
            
        }



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
            //  echo '<prE>';print_r($_POST);print_r($_FILES);die;
            $course_id = $this->crud_model->add_webinar();
            
            $this->savecurriculum($course_id);
            
            $this->sendnotification_admin($course_id,$this->session->userdata('user_id'));
            
            redirect(site_url('admin/webinar'), 'refresh');
        } elseif ($param1 == 'update')
        {
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
            
            // echo '<prE>';
            // print_r($_POST);
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
            
            $UploadArray['price'] = $this->input->post('price');
            $UploadArray['discount_flag'] = $this->input->post('discount_flag');
            $UploadArray['discounted_price'] = $this->input->post('discounted_price');
            if (null != ($this->input->post('is_free_course'))) {
                $UploadArray['is_free_course'] = 1;
            }
            
            if ($_FILES["thumbnail"]['name'] != "")
            {
                $UploadArray['thumbnail'] = 'uploads/thumbnails/course_thumbnails/webinar_thumb_'.time().rand(111,9999).$course_id.'.'.explode('.',$_FILES["thumbnail"]['name'])[1];
                move_uploaded_file($_FILES["thumbnail"]['tmp_name'], $UploadArray['thumbnail']);
                
                $UploadArray['thumbnail'] = base_url($UploadArray['thumbnail']);
            }
            $UploadArray['objectives'] = $this->trim_and_return_json($this->input->post('objectives'));
            $UploadArray['outcomes'] = $this->trim_and_return_json($this->input->post('outcomes'));


            $UploadArray['format'] = $this->input->post('format');
            if ($UploadArray['format'] == 'other') {
                $UploadArray['other_format'] = $this->input->post('other_format');
            }

            $UploadArray['anything_else'] = $this->input->post('anything_else');
            
            $UploadArray['proposed_date'] = (!empty($_POST['proposed_date'])) ? date('Y-m-d',strtotime($_POST['proposed_date'])) : '';
            $UploadArray['end_date'] = (!empty($_POST['end_date'])) ? date('Y-m-d',strtotime($_POST['end_date'])) : '';
            
            
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

            $this->db->where('id', $param2);
            $last_insert_id = $this->db->update('course', $UploadArray);
            
            $this->savecurriculum($param2);
            
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(site_url('admin/webinar/edit_form/' . $param2), 'refresh');
        } elseif ($param1 == 'save_edit') {
            $data = array(
                'code' => $_POST['code'],
                'coupon_type' => $_POST['coupon_type'],
                'coupon_amount' => $_POST['coupon_amount'],
                'courses_id' => $_POST['courses_id'],
                'expiry_date' => $_POST['expiry_date'],
                'status' => $_POST['status'],
            );

            $this->db->where('id', $param2);
            $this->db->update('coupons', $data);
            
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            redirect(site_url('admin/webinar'), 'refresh');
        } elseif ($param1 == "delete") {

            $this->db->where('id', $param2);
            $result = $this->db->delete('course');
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('admin/webinar'), 'refresh');
        }
        if ($param1 == '') {
            $page_data['page_name'] = 'webinar';
            $page_data['page_title'] = get_phrase('webinar');

            $page_data['webinar']   = $this->crud_model->filter_webinar_for_backend($page_data['selected_category_id'], $page_data['selected_instructor_id'], $page_data['selected_price'], $page_data['selected_status'], $page_data['search']);
            $this->load->view('backend/index', $page_data);
        }
    }

    public function courses_enrolled($param1 = "")
    {
        if ($this->session->userdata('admin_login') != true) {
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
        $page_data['page_name'] = 'courses_enrolled';
        // $page_data['enrol_history'] = $this->crud_model->courses_enrol_history_by_date_range($page_data['timestamp_start'], $page_data['timestamp_end']);
        $page_data['page_title'] = 'Courses Enrolled';
        $this->load->view('backend/index', $page_data);
    }

    // 11-04-2022 start
    public function getmessage()
    {
        $user_id = $this->session->userdata('user_id');

        // $Data = $this->db->query("SELECT message.message_thread_code,message.message,(SELECT CONCAT(first_name,' ',last_name) FROM users WHERE id=message.sender) as sender_name FROM message INNER JOIN message_thread ON message_thread.message_thread_code=message.message_thread_code WHERE (message_thread.receiver='$user_id' OR message_thread.sender='$user_id') AND message.sender!='$user_id' AND message.read_status!='1' ORDER BY message.message_id DESC")->result();
        // $Data = $this->db->query("SELECT count(message.message_id) AS receive_message FROM message INNER JOIN message_thread ON message_thread.message_thread_code=message.message_thread_code WHERE (message_thread.receiver='$user_id' OR message_thread.sender='$user_id') AND message.sender!='$user_id' AND message.read_status!='1' ORDER BY message.message_id DESC")->row();



 $date = date('Y-m-d', strtotime('-7 days'));
        $Data = $this->db->query("SELECT notification.title,notification.description,notification_users.id as notification_user_id,notification.ts as entry_date,notification_users.read_status FROM notification INNER JOIN notification_users ON notification_users.notification_id=notification.id WHERE notification_users.user_id='$user_id' AND DATE(`ts`) >= '$date' ORDER BY notification.id DESC")->result();



        echo json_encode(['Status' => (!empty($Data)) ? 200 : 400, 'Count' => $Data->receive_message, 'Data' => $Data]);
    }
    // 11-04-2022 stop


    /*27-04-2022 start*/
    public function getcourse($id = 0)
    {
        $html = '<option value="">--Not Selected--</option>';
        if ($id > 0) {
            $CourseData = $this->db->select('id,title')->where('user_id', $id)->get('course')->result_array();
            foreach ($CourseData as $value) {
                $html .= '<option value="' . $value['id'] . '">' . $value['title'] . '</option>';
            }
        }
        echo $html;
    }
    /*27-04-2022 stop*/

    /*28-04-2022 start*/
    public function subscription()
    {
        if ($this->session->userdata('admin_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'subscription_list';

        $page_data['page_title'] = 'Subscription list';
        $this->load->view('backend/index', $page_data);
    }

    public function subscriptionupdate($id = 0)
    {

        $UpdateSubscription = [
            'subscription_update_date' => date('Y-m-d H:i:s'),
        ];

        if (!empty($_GET['s_status']))
            $UpdateSubscription['subscription_status'] = strtolower($_GET['s_status']);

        if (!empty($_GET['p_status']))
            $UpdateSubscription['subscription_payment_status'] = strtolower($_GET['p_status']);

        $this->db->where('id', $id)->update('subscription', $UpdateSubscription);

        $this->session->set_flashdata('flash_message', 'Status Updated');

        redirect(base_url('admin/subscription?subscription_status=deactive'));
    }
    /*28-04-2022 stop*/
    
    /*13-05-2022*/
    public function updatebanner()
    {
        $BannerArray = [
            'from_date'=>date('d-m-Y',strtotime($_POST['from_date'])),
            'to_date'=>date('d-m-Y',strtotime($_POST['to_date'])),
        ];
        $this->db->where('id',$_POST['banner_id'])->update('banner_request',$BannerArray);
        
        $this->session->set_flashdata('flash_message', 'Banner Dates Updated');

        redirect(base_url('admin/banner_detail/'.$_POST['banner_id']));
    }
    
    public function getsubcategoryforview()
    {
        $html ='';
        $status= 400;
        if(!empty($_POST['category_id']))
        {
            $sub_categories = $this->crud_model->get_sub_categories($_POST['category_id']);
            $html .=
            '<ul class="list-group list-group-flush">';
                foreach ($sub_categories as $sub_category)
                {
                    $html .=
                    '<li class="list-group-item on-hover-action" id = "'.$sub_category['id'].'">
                        <span><i class="'.$sub_category['font_awesome_class'].'"></i> '.$sub_category['name'].'</span>
                        <span class="category-action" style="float: right; margin-left: 5px; height: 20px;">
                            <a href="javascript::" class="action-icon" onclick="confirm_modal('."categories/delete/".$sub_category['id'].');"> <i class="mdi mdi-delete" style="font-size: 18px;"></i></a>
                        </span>
                        <span class="category-action" style="float: right;height: 20px;">
                            <a href="'."category_form/edit_category/".$sub_category['id'].'" class="action-icon"> <i class="mdi mdi-pencil" style="font-size: 18px;"></i></a>
                        </span>
                    </li>';
                 }
                $html .=
                '</ul>';
                $status= 200;
        }
        
        echo json_encode(['Status'=>$status,'Data'=>$html]);
    }
    /*13-05-2022*/
    /*14-05-2022 start */
    public function instructor_activity($instructor_id = 0)
    {
        $page_data['page_name'] = 'instructor_activity';

        $page_data['page_title'] = 'Instructor Activity';
        $page_data['instructor_id'] = $instructor_id;
        $this->load->view('backend/index', $page_data);
    }
    /*14-05-2022 stop*/
    /* 20-05-2022 start */
    public function getpaymentdata()
    {
        $html = '';
        $status = 400;
        if(!empty($_POST['user_id']))
        {
            $user_id = $_POST['user_id'];
            
            $coursedata = $this->db->query("SELECT course.title,users.first_name,users.last_name,payment.amount,payment.date_added FROM payment INNER JOIN course ON course.id=payment.course_id INNER JOIN users ON users.id=course.user_id WHERE payment.user_id='$user_id'")->result_array();
            
            if(!empty($coursedata))
            {
                $html .= 
                '<table style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Course Name</th>
                            <th>Instructor Name</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    <thead/>
                    <tbody>';
                    foreach($coursedata as $key => $value)
                    {
                        $html .=
                        '<tr>
                            <td>'.($key + 1).'</td>
                            <td>'.$value['title'].'</td>
                            <td>'.$value['first_name'].' '.$value['last_name'].'</td>
                            <td>'.$value['amount'].'</td>
                            <td>'.date('d,M Y',strtotime($value['amount'])).'</td>
                        </tr>';
                    }
                $html .=
                    '</tbody>
                </table>';
                $status =200;
            }
        }
        
        echo json_encode(['Status'=>$status,'Data'=>$html]);
    }
    /* 20-05-2022 close*/
    
    /* 23-05-2022 Start */
    public function today_revenue()
    {
        $page_data['page_name'] = 'today_revenue';

        $page_data['page_title'] = 'Today Revenue';
        $this->load->view('backend/index', $page_data);
    }
    /* 23-05-2022 Close */
    
    #---------------------------------------------------------------------------
    public function sendnotification_admin($course_id = 0,$instructor_id = 0)
    {
    	if($instructor_id >0 && $course_id > 0)
    	{
    	    $coursedata = $this->db->select('course.id,course.title,users.first_name,users.last_name,users.id as user_id')->from('course')->join('users','users.id=course.user_id')->where('course.id',$course_id)->get()->row();
    // 		$userdata = $this->db->select("device_token,users.id as user_id,CONCAT(users.first_name,' ',users.last_name) as user_name")->from('users')->join('tbl_follow','tbl_follow.user_id=users.id')->where('device_token!=','')->get()->result();
    // 	$userdata = $this->db->select("device_token,users.id as user_id,CONCAT(users.first_name,' ',users.last_name) as user_name")->from('users')->where('device_token!=','')->get()->result();
    		$userdata = $this->db->select("device_token,users.id as user_id,CONCAT(users.first_name,' ',users.last_name) as user_name")->from('users')->where('users.id!=',$coursedata->user_id)->get()->result();
    		
    		if(!empty($userdata))
    		{
    			$notification = [
    				'title'=>ucwords('New Course : '.$coursedata->title),
    				'body'=>ucwords("$coursedata->title course is added by $coursedata->first_name $coursedata->last_name at ".date('h:i a on d,M Y'))
    			];
    			
    			$notificationData['title'] = $coursedata->title;
                $notificationData['description'] = ucwords("Hello $coursedata->first_name $coursedata->last_name, You have successfully createed a $coursedata->title course. For more info. ".base_url('home/course/'.$coursedata->title.'/'.$course_id));
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
        				'body'=>ucwords("Hello $value->first_name $coursedata->last_name a New course, $coursedata->title has been uploaded by $coursedata->first_name $coursedata->last_name. Please click on ".base_url('user/preview/'.$course_id)." to add course to your list. Checkout and more. For more info. ".base_url())
                    ];
                
                    $notificationData['title'] = $coursedata->title;
                    $notificationData['description'] = ucwords("Hello $value->user_name a New course, $coursedata->title has been uploaded by $coursedata->first_name $coursedata->last_name. Please click on ".base_url('user/preview/'.$course_id)." to add course to your list. Checkout and more. For more info. ".base_url());
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
        				$topic = "Notify";
        				$url = 'https://fcm.googleapis.com/fcm/send';
        				$fields = array(
        					'to' => $value->device_token,
        					'notification' => $notification,
        					'course_id' => $coursedata->id,
        					'type' => 'course'
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
}


class Hello extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Hello_Model');
    }

    public function savedata()
    {
        $this->load->view('registration');
        if ($this->input->post('save')) {
            $n = $this->input->post('user_id');
            $e = $this->input->post('instructor_id');
            $m = $this->input->post('course_desc');
            $m = $this->input->post('added_on');
            $this->Hello_Model->saverecords($n, $e, $m);
            redirect("Hello/dispdata");
        }
    }

    public function dispdata()
    {
        $result['data'] = $this->Hello_Model->displayrecords();
        $this->load->view('display_records', $result);
    }
}