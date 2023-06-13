<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function get_admin_details()
    {
        return $this->db->get_where('users', array('role_id' => 1));
    }

    public function getRevenue($date)
    {
        $this->db->select_sum("amount");
        $this->db->where('date_added >=', strtotime($date));
        return $this->db->get('payment')->row()->amount;
    }


    public function getUninstalledStudent($date)
    {
        $this->db->where('status >=', '0');
        $this->db->where('date_added >=', strtotime($date));
        return $this->db->get('users');
    }

    //SELECT sum(amount) as amount,category.name  FROM `payment`
    //left join course on payment.course_id = course.id
    //left join category on  category.id = course.category_id
    //GROUP by course.category_id

    public function getRevenueByCategory($date = null)
    {
        $this->db->select("category.name");
        $this->db->select_sum("amount");
        $this->db->join("course", "payment.course_id = course.id", 'left');
        $this->db->join("category", " category.id = course.category_id", 'left');
        if ($date != null) {
            $this->db->where('payment.date_added >=', strtotime($date));
        }

        $this->db->group_by('course.category_id');
        return $this->db->get('payment')->result();
    }

    public function getRevenueByCourse($date = null)
    {
        $this->db->select("course.title");
        $this->db->select_sum("amount");
        $this->db->join("course", "payment.course_id = course.id", 'left');
        if ($date != null) {
            $this->db->where('payment.date_added >=', strtotime($date));
        }

        $this->db->group_by('payment.course_id');
        return $this->db->get('payment')->result();
    }

    public function getRevenueByInstructor($date = null)
    {

        $this->db->select("users.first_name, users.last_name");
        $this->db->select_sum("amount");
        $this->db->join("users", "payment.user_id = users.id", 'left');
        if ($date != null) {
            $this->db->where('payment.date_added >=', strtotime($date));
        }
        $this->db->where('users.role_id', 2);
        $this->db->where('users.is_instructor', 1);

        $this->db->group_by('payment.user_id');
        return $this->db->get('payment')->result();
    }
    
    /*----------------------------*/
    public function countinstructorrevenue($date = null)
    {

        $this->db->select("SUM(amount) as revenue");
        $this->db->join("users", "payment.user_id = users.id", 'left');
        if ($date != null)
        {
            $this->db->where('payment.date_added >=', strtotime($date));
        }
        $this->db->where('users.role_id', 2);
        $this->db->where('users.is_instructor', 1);
        return $this->db->get('payment')->row()->revenue;
    }
    /*----------------------------*/

    public function getInstrutorPast($date)
    {
        $this->db->where('date_added >=', strtotime($date));
        $this->db->where('role_id', 2);
        $this->db->where('is_instructor', 1);
        return $this->db->get('users');
    }

    public function getStudentPast($date)
    {
        $this->db->where('date_added >=', strtotime($date));
        $this->db->where('role_id', 2);
        $this->db->where('is_instructor', 0);
        return $this->db->get('users');
    }

    public function getStudentAll()
    {
        $this->db->where('role_id', 2);
        $this->db->where('is_instructor', 0);
        return $this->db->get('users');
    }

    public function getInstrutorAll()
    {
        $this->db->where('role_id', 2);
        $this->db->where('is_instructor', 1);
        return $this->db->get('users');
    }
    public function instructor_is_subscribe($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('subscription_status', 'active');
        $this->db->where('subscription_payment_status', 'confirm');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('subscription')->num_rows();
    }
    public function get_user($user_id = 0)
    {
        $CourseData = $this->db->select('id')->get('course')->result();
        
        $course_ids = array_column($CourseData,'id');
        
        if(!empty($_GET['category_id']) && $_GET['category_id'] != 'all')
        {
            $CategoryCourseData = $this->db->select('id')->where('sub_category_id',$_GET['category_id'])->get('course')->result();
            if(!empty($CategoryCourseData))
                $course_ids = array_column($CategoryCourseData,'id');
        }
        
        if(!empty($_GET['instructor_id']) && $_GET['instructor_id'] != 'all')
        {
            $InstructorCourseData = $this->db->select('id')->where('user_id',$_GET['instructor_id'])->where_in('id',$course_ids)->get('course')->result();
            if(!empty($InstructorCourseData))
                $course_ids = array_column($InstructorCourseData,'id');
        }
        
        if(!empty($_GET['price']) && $_GET['price'] != 'all')
        {
            $is_free_course = ($_GET['price'] == 'free') ? 1 : 0;
            $PriceCourseData = $this->db->select('id')->where('is_free_course',$is_free_course)->where_in('id',$course_ids)->get('course')->result();
            if(!empty($PriceCourseData))
                $course_ids = array_column($PriceCourseData,'id');
        }
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('enrol','users.id=enrol.user_id','left');
        $this->db->where('users.role_id', 2);
        $this->db->where('users.is_instructor', 0);
        
        if(!empty($course_ids))
            $this->db->where_in('enrol.course_id',array_filter($course_ids));
        
        if ($user_id > 0)
            $this->db->where('users.id', $user_id);
        
        
        if(isset($_GET['date']))
            $this->db->where('users.date_added>=',strtotime($_GET['date']));
        
        if(!empty($_GET['status']) && $_GET['status'] !='all')
        {
            $column = ($_GET['status'] == 'active') ? 'users.status' : 'users.status!=';
            $this->db->where($column,1);
        }
        
        $this->db->order_by('users.id', 'DESC');
        return $this->db->get('');
    }

    public function get_notification($user_id = 0)
    {
        $this->db->order_by("id", "desc");
        return $this->db->get('notification');
    }

    public function get_all_user($user_id = 0)
    {
        if ($user_id > 0) {
            $this->db->where('id', $user_id);
     
        }
        return $this->db->get('users');
    }

    public function add_user($is_instructor = false)
    {
        
        
        
        
        
      
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        } else {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
            $data['social_links'] = json_encode($social_link);
            $data['biography'] = $this->input->post('biography');
            $data['birth_date'] = $this->input->post('birth_date');
            
            $data['address_1'] = $this->input->post('address_1');
            $data['address_2'] = $this->input->post('address_2');
            $data['city'] = $this->input->post('city');
            $data['state'] = $this->input->post('state');
            $data['zip'] = $this->input->post('zip');
            // $data['country'] = $this->input->post('country');
            $data['mobile'] = $this->input->post('mobile');

            $data['emergency_first_name'] = $this->input->post('emergency_first_name');
            $data['emergency_last_name'] = $this->input->post('emergency_last_name');
            $data['emergency_mobile'] = $this->input->post('emergency_mobile');

            // // $data['job_title'] = $this->input->post('job_title');
            $data['profession'] = $this->input->post('profession');
            $data['working_pattern'] = $this->input->post('working_pattern');
            // $data['year_of_experience'] = $this->input->post('year_of_experience');
            $data['working_currently'] = $this->input->post('working_currently');
            $data['teaching_experience'] = $this->input->post('teaching_experience');
            // $data['year_of_experience'] = $this->input->post('year_of_experience');
            // $data['job_graduation_certificate'] = md5(rand(10000, 10000000));

            $data['role_id'] = 2;
            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['wishlist'] = json_encode(array());
            $data['watch_history'] = json_encode(array());
            $data['status'] = 1;
            $data['image'] = md5(rand(10000, 10000000));

            // Add paypal keys
            $paypal_info = array();
            $paypal['production_client_id']  = html_escape($this->input->post('paypal_client_id'));
            $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
            array_push($paypal_info, $paypal);
            $data['paypal_keys'] = json_encode($paypal_info);

            // Add Stripe keys
            $stripe_info = array();
            $stripe_keys = array(
                'public_live_key' => html_escape($this->input->post('stripe_public_key')),
                'secret_live_key' => html_escape($this->input->post('stripe_secret_key'))
            );
            array_push($stripe_info, $stripe_keys);
            $data['stripe_keys'] = json_encode($stripe_info);

            if ($is_instructor) {
                $data['is_instructor'] = 1;
                $data['admin_verify']  = '1';
                $apiKey = urlencode(SMS_KEY);
                $sender = urlencode(SMS_SENDERID);

                $fname = $_POST['first_name'];
                $message = rawurlencode("Hello $fname, Welcome to a Galaxy of Medical Education, Knowledge & Skills hub. Thank you for enrolling with MedEd. Visit the app: Meded");
                $numbers = "91" . $_POST['mobile'];
                $apidata = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
                $ch = curl_init('https://api.textlocal.in/send/');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $apidata);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $SMSRespomnse = curl_exec($ch);
                log_message('info', $SMSRespomnse);
                curl_close($ch);
            }
            //echo '<pre>';print_r($data);die;
            $this->db->insert('users', $data);
            //die;
            $user_id = $this->db->insert_id();
            $this->upload_user_image($data['image']);
            // $this->upload_certificate_image($data['job_graduation_certificate']);
            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
        }
    }

    public function add_shortcut_user($is_instructor = false)
    {
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $response['status'] = 0;
            $response['message'] = get_phrase('this_email_already_exits') . '. ' . get_phrase('please_use_another_email');
            return json_encode($response);
        } else {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $social_link['facebook'] = '';
            $social_link['twitter'] = '';
            $social_link['linkedin'] = '';
            $data['social_links'] = json_encode($social_link);
            $data['role_id'] = 2;
            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['wishlist'] = json_encode(array());
            $data['watch_history'] = json_encode(array());
            $data['status'] = 1;
            $data['image'] = md5(rand(10000, 10000000));

            // Add paypal keys
            $paypal_info = array();
            $paypal['production_client_id']  = '';
            $paypal['production_secret_key'] = '';
            array_push($paypal_info, $paypal);
            $data['paypal_keys'] = json_encode($paypal_info);

            // Add Stripe keys
            $stripe_info = array();
            $stripe_keys = array(
                'public_live_key' => '',
                'secret_live_key' => ''
            );
            array_push($stripe_info, $stripe_keys);
            $data['stripe_keys'] = json_encode($stripe_info);

            if ($is_instructor) {
                $data['is_instructor'] = 1;
            }
            $this->db->insert('users', $data);

            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
            $response['status'] = 1;
            return json_encode($response);
        }
    }

    public function check_duplication($action = "", $email = "", $user_id = "")
    {
        $duplicate_email_check = $this->db->get_where('users', array('email' => $email));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->status == 1) {
                    return false;
                } else {
                    return 'unverified_user';
                }
            } else {
                return true;
            }
        } elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id != $user_id) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return false;
            }
        }
    }

    public function edit_user($user_id = "")
    {
        // Admin does this editing
        // $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);

        $data['first_name'] = html_escape($this->input->post('first_name'));
        $data['last_name'] = html_escape($this->input->post('last_name'));

        // if (isset($_POST['email'])) {
        //     $data['email'] = html_escape($this->input->post('email'));
        // }
        $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
        $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
        $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
        $data['social_links'] = json_encode($social_link);
        $data['biography'] = $this->input->post('biography');
        if (!empty($this->input->post('title'))) {
            $data['title'] = $this->input->post('title');
        }
        // $data['mobile'] = $this->input->post('mobile');
    
        $data['biography'] = $this->input->post('biography');
        $data['emergency_first_name'] = $this->input->post('emergency_first_name');
        $data['emergency_last_name'] = $this->input->post('emergency_last_name');
        $data['emergency_mobile'] = $this->input->post('emergency_mobile');
        $data['email'] = $this->input->post('email');
        $data['address_1'] = $this->input->post('address_1');
        $data['address_2'] = $this->input->post('address_2');
        $data['city'] = $this->input->post('city');
        $data['state'] = $this->input->post('state');
        $data['zip'] = $this->input->post('zip');
        
        $data['profession'] = $this->input->post('profession');
        $data['working_pattern'] = $this->input->post('working_pattern');
        $data['year_of_experience'] = $this->input->post('year_of_experience');
        $data['working_currently'] = $this->input->post('working_currently');
        $data['teaching_experience'] = $this->input->post('teaching_experience');
    

        $data['last_modified'] = strtotime(date("Y-m-d H:i:s"));

        $UserDetail = $this->db->where('id', $user_id)->get('users')->row();

        if (!empty($_FILES['user_image']['name'])) {
            $data['image'] = $user_id . '_' . rand(11, 999) . '_' . $_FILES['user_image']['name'];
            move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/user_image/' . $data['image']);
        }



        /*
        $data['image'] = null;
        if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
            unlink('uploads/user_image/' . $this->db->get_where('users', array('id' => $user_id))->row('image').'.jpg');
            $data['image'] = md5(rand(10000, 10000000));
        }
        */

        /*
        // Update paypal keys
        $paypal_info = array();
        $paypal['production_client_id']  = html_escape($this->input->post('paypal_client_id'));
        $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
        array_push($paypal_info, $paypal);
        $data['paypal_keys'] = json_encode($paypal_info);
        // Update Stripe keys
        $stripe_info = array();
        $stripe_keys = array(
            'public_live_key' => html_escape($this->input->post('stripe_public_key')),
            'secret_live_key' => html_escape($this->input->post('stripe_secret_key'))
        );
        array_push($stripe_info, $stripe_keys);
        $data['stripe_keys'] = json_encode($stripe_info);
        */

        // print_r($data);die;
        $this->db->where('id', $user_id);
        $result = $this->db->update('users', $data);
        // $this->upload_user_image($data['image']);
        // print_r($this->db->_error_message());

        $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        // if($result)
        // {
        // $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        // }
        // else
        // {
        //   // print_r($this->db->_error_message());
        // }
    }

    /*public function edit_user($user_id = "") { // Admin does this editing
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));

            if (isset($_POST['email'])) {
                $data['email'] = html_escape($this->input->post('email'));
            }
            $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
            $data['social_links'] = json_encode($social_link);
            $data['biography'] = $this->input->post('biography');
            $data['mobile'] = $this->input->post('mobile');
            
            
            $data['last_modified'] = strtotime(date("Y-m-d H:i:s"));
            $data['image'] = null;
            if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
                unlink('uploads/user_image/' . $this->db->get_where('users', array('id' => $user_id))->row('image').'.jpg');
                $data['image'] = md5(rand(10000, 10000000));
            }

            // Update paypal keys
            $paypal_info = array();
            $paypal['production_client_id']  = html_escape($this->input->post('paypal_client_id'));
            $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
            array_push($paypal_info, $paypal);
            $data['paypal_keys'] = json_encode($paypal_info);
            // Update Stripe keys
            $stripe_info = array();
            $stripe_keys = array(
                'public_live_key' => html_escape($this->input->post('stripe_public_key')),
                'secret_live_key' => html_escape($this->input->post('stripe_secret_key'))
            );
            array_push($stripe_info, $stripe_keys);
            $data['stripe_keys'] = json_encode($stripe_info);

            $this->db->where('id', $user_id);
            $result = $this->db->update('users', $data);
            $this->upload_user_image($data['image']);
               // print_r($this->db->_error_message());
            if($result){
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
            } else {
               // print_r($this->db->_error_message());
            }
        }else {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }

    }*/

    public function delete_user($user_id = "")
    {
        $this->db->where('id', $user_id);
        $this->db->delete('users');
        $this->session->set_flashdata('flash_message', get_phrase('user_deleted_successfully'));
    }

    public function unlock_screen_by_password($password = "")
    {
        $password = sha1($password);
        return $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'password' => $password))->num_rows();
    }

    public function register_user($data)
    {

        // echo '<prE>';print_r($data);
        $data = (object) $data;
        
        unset($data->username);
        /*
        $this->db->insert('users', [
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'mobile' => $data->mobile,
            'email' => $data->email,
            'password' => $data->password,
            'social_links' => $data->social_links,
            'role_id' => $data->role_id,
            'date_added' => $data->date_added,
            'watch_history' => $data->watch_history,
            'wishlist' => $data->wishlist,
            'paypal_keys' => $data->paypal_keys,
            'stripe_keys' => $data->stripe_keys,
            'verification_code' => $data->verification_code,
            'status' => $data->status,
            'is_instructor ' => $data->is_instructor,
            'image' => $data->image,
            'user_aadhar_image' => $data->user_aadhar_image,
            'document_file' => $data->document_file,
            'other_supporting_file' => $data->other_supporting_file,
            'emergency_mobile' => $data->emergency_mobile,
            'organisation_email' => $data->organisation_email,
        ]);
        */
        $this->db->insert('users',$data);
        $lastInsertId = $this->db->insert_id();
        // redirect(site_url('home/demo_video/'.$lastInsertId), 'refresh');
    }

    public function register_user_update_code($data)
    {
        $update_code['verification_code'] = $data['verification_code'];
        $update_code['password'] = $data['password'];
        $this->db->where('email', $data['email']);
        $this->db->update('users', $update_code);
    }

    public function my_courses($user_id = "")
    {
        if ($user_id == "") {
            $user_id = $this->session->userdata('user_id');
        }
        return $this->db->get_where('enrol', array('user_id' => $user_id));
    }

    public function upload_user_image($image_code)
    {
        if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
            move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/user_image/' . $image_code . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        }
    }

    public function upload_certificate_image($image_code)
    {
        if (isset($_FILES['job_graduation_certificate']) && $_FILES['job_graduation_certificate']['name'] != "") {
            move_uploaded_file($_FILES['job_graduation_certificate']['tmp_name'], 'uploads/user_image/' . $image_code . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        }
    }

    public function update_account_settings($user_id)
    {

        // $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        // if ($validity) {
            // echo $user_id;
            $user_details = $this->db->where('id', $user_id)->get('users')->row_array();
            // echo '<pre>';print_r($_POST);print_r($user_details);

            if (!empty($_POST['new_password'])) {
                if ($user_details['password'] != sha1($_POST['current_password'])) {
                    $this->session->set_flashdata('error_message', get_phrase('old_password_does_not_match'));
                    return;
                }

                if ($_POST['new_password'] == $_POST['current_password']) {
                    $this->session->set_flashdata('error_message', get_phrase('old_password_and_new_password_are_same'));
                    return;
                }

                if ($_POST['new_password'] != $_POST['confirm_password']) {
                    $this->session->set_flashdata('error_message', get_phrase('confirm_password_does_not_match'));
                    return;
                }
                $data['password'] = sha1($_POST['new_password']);
            }
            // print_r($data);die;
            $data['email'] = html_escape($this->input->post('email'));
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);

            $this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
        // } else {
        //     $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        // }
    }

    public function change_password($user_id)
    {
        $data = array();
        if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {


            $user_details = $this->get_all_user($user_id)->row_array();
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if ($user_details['password'] != sha1($current_password)) {
                $this->session->set_flashdata('error_message', get_phrase('invalid_old_password'));
                return;
            }
            if ($_POST['new_password'] == $_POST['current_password']) {
                $this->session->set_flashdata('error_message', get_phrase('old_password_and_new_password_are_same'));
                return;
            }

            if ($new_password != $confirm_password) {
                $this->session->set_flashdata('error_message', get_phrase('confirm_password_does_not_match'));
                return;
            }

            $data['password'] = sha1($new_password);
        }

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
    }


    public function get_instructor($id = 0)
    {
        $ids_array = ($id > 0) ? [$id]: [];
        
        if(!empty($_GET['course']))
        {
            $query = (strtolower($_GET['course']) == 'yes') ? " AND (SELECT count(course.id) FROM course WHERE user_id=instr.id)>0" : ' ';
            
            $userdata = $this->db->query("SELECT id as user_id FROM `users` as instr WHERE admin_verify='1' $query")->result();
                if(!empty($userdata))
                    $ids_array = array_column($userdata,'user_id');
        }
        
        if(!empty($_GET['category_id']) && $_GET['category_id'] != 'all')
        {
            $coursedata = $this->db->select('user_id')->from('course')->where('sub_category_id',$_GET['category_id'])->get()->result();
            if(!empty($coursedata))
                $ids_array = array_column($coursedata,'user_id');
        }
        
        $this->db->select("users.*,(SELECT count(course.id) as active_course FROM course WHERE course.user_id=users.id AND course.status='active') as active_course,(SELECT count(course.id) as active_course FROM course WHERE course.user_id=users.id AND course.status='pending') as pending_course");
        $this->db->where('role_id',2);
        $this->db->where('is_instructor',1);
        
        
        
        if($_GET['status'] == 3)
        {
       
            
            $this->db->where('admin_verify','0');
          
        
        }
        
        if($_GET['status'] == 1)
        {
         
              $this->db->where('admin_verify',$_GET['status']);
            
        }
        
         if($_GET['status'] == 2)
        {
         
              $this->db->where('admin_verify',$_GET['status']);
            
        }
        
        if (isset($_GET['date']) && !isset($_GET['daterange']))
            $this->db->where('date_added>=',strtotime($_GET['date']));
        
        if(!empty($_GET['daterange']))
        {
            $current_date = date('Y-m-d');
            $last_date = date('Y-m-d',strtotime('-'.str_replace('~',' ',$_GET['daterange'])));
            
            $this->db->where('date_added>=',strtotime($last_date));
            $this->db->where('date_added<=',strtotime($current_date));
        }
        
        if(!empty($ids_array))
            $this->db->where_in('id',$ids_array);
            
        if(!empty($_GET['search']))
        {
            $this->db->like('first_name', $_GET['search']);
            $this->db->or_like('last_name', $_GET['search']);
            $this->db->or_like('email', $_GET['search']);
            $this->db->or_like('mobile', $_GET['search']);
        }
        
        
        
        
       
        
        
        return $this->db->get_where('users', $Conditions);
    }

    public function get_number_of_active_courses_of_instructor($instructor_id)
    {
        $checker = array(
            'user_id' => $instructor_id,
            'status'  => 'active'
        );
        $result = $this->db->get_where('course', $checker)->num_rows();
        return $result;
    }

    public function get_user_image_url($user_id)
    {
        $user_profile_image = $this->db->get_where('users', array('id' => $user_id))->row('image');
        if (file_exists('uploads/user_image/' . $user_profile_image))
            return base_url() . 'uploads/user_image/' . $user_profile_image;
        else
            return base_url() . 'uploads/user_image/placeholder.png';

        // if (file_exists('uploads/user_image/'.$user_profile_image.'.jpg'))
        //      return base_url().'uploads/user_image/'.$user_profile_image.'.jpg';
        // else
        //     return base_url().'uploads/user_image/placeholder.png';
    }

    public function get_user_certificate_url($user_id)
    {
        $user_profile_image = $this->db->get_where('users', array('id' => $user_id))->row('job_graduation_certificate');
        if (file_exists('uploads/user_image/' . $user_profile_image . '.jpg'))
            return base_url() . 'uploads/user_image/' . $user_profile_image . '.jpg';
        else
            return base_url() . 'uploads/user_image/placeholder.png';
    }

    public function get_instructor_list()
    {
        $query1 = $this->db->get_where('course', array('status' => 'active'))->result_array();
        $instructor_ids = array();
        $query_result = array();
        foreach ($query1 as $row1) {
            if (!in_array($row1['user_id'], $instructor_ids) && $row1['user_id'] != "") {
                array_push($instructor_ids, $row1['user_id']);
            }
        }
        if (count($instructor_ids) > 0) {
            $this->db->where_in('id', $instructor_ids);
            $query_result = $this->db->get('users');
        } else {
            $query_result = $this->get_admin_details();
        }

        return $query_result;
    }

    public function update_instructor_paypal_settings($user_id = '')
    {
        // Update paypal keys
        $paypal_info = array();
        $paypal['production_client_id'] = html_escape($this->input->post('paypal_client_id'));
        $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
        array_push($paypal_info, $paypal);
        $data['paypal_keys'] = json_encode($paypal_info);
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }
    public function update_instructor_stripe_settings($user_id = '')
    {
        // Update Stripe keys
        $stripe_info = array();
        $stripe_keys = array(
            'public_live_key' => html_escape($this->input->post('stripe_public_key')),
            'secret_live_key' => html_escape($this->input->post('stripe_secret_key'))
        );
        array_push($stripe_info, $stripe_keys);
        $data['stripe_keys'] = json_encode($stripe_info);
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    // POST INSTRUCTOR APPLICATION FORM AND INSERT INTO DATABASE IF EVERYTHING IS OKAY
    public function post_instructor_application()
    {
        // FIRST GET THE USER DETAILS
        $user_details = $this->get_all_user($this->input->post('id'))->row_array();

        // CHECK IF THE PROVIDED ID AND EMAIL ARE COMING FROM VALID USER
        if ($user_details['email'] == $this->input->post('email')) {

            // GET PREVIOUS DATA FROM APPLICATION TABLE
            $previous_data = $this->get_applications($user_details['id'], 'user')->num_rows();
            // CHECK IF THE USER HAS SUBMITTED FORM BEFORE
            if ($previous_data > 0) {
                $this->session->set_flashdata('error_message', get_phrase('already_submitted'));
                redirect(site_url('user/become_an_instructor'), 'refresh');
            }
            $data['user_id'] = $this->input->post('id');
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $data['message'] = $this->input->post('message');
            if (isset($_FILES['document']) && $_FILES['document']['name'] != "") {
                if (!file_exists('uploads/document')) {
                    mkdir('uploads/document', 0777, true);
                }
                $accepted_ext = array('doc', 'docs', 'pdf', 'txt', 'png', 'jpg', 'jpeg');
                $path = $_FILES['document']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                if (in_array(strtolower($ext), $accepted_ext)) {
                    $document_custom_name = random(15) . '.' . $ext;
                    $data['document'] = $document_custom_name;
                    move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/document/' . $document_custom_name);
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('invalide_file'));
                    redirect(site_url('user/become_an_instructor'), 'refresh');
                }
            }
            $this->db->insert('applications', $data);
            $apiKey = urlencode(SMS_KEY);
            $sender = urlencode(SMS_SENDERID);
            $get_user_data = $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->row_array();
            $fname = $get_user_data['first_name'];

            $message = rawurlencode("Hello, $fname, You are just one step away from joining Meded, the Global Medical Education platform. We will revert back in 48 hours.For more info: Meded.");
            $numbers = "91" . $get_user_data['mobile'];
            $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
            $ch = curl_init('https://api.textlocal.in/send/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $SMSRespomnse = curl_exec($ch);
            log_message('info', $SMSRespomnse);
            curl_close($ch);
            $this->session->set_flashdata('flash_message', get_phrase('application_submitted_successfully'));
            redirect(site_url('user/become_an_instructor'), 'refresh');
        } else {
            $this->session->set_flashdata('error_message', get_phrase('user_not_found'));
            redirect(site_url('user/become_an_instructor'), 'refresh');
        }
    }


    // GET INSTRUCTOR APPLICATIONS
    public function get_applications($id = "", $type = "")
    {
        if ($id > 0 && !empty($type)) {
            if ($type == 'user') {
                $applications = $this->db->get_where('applications', array('user_id' => $id));
                return $applications;
            } else {
                $applications = $this->db->get_where('applications', array('id' => $id));
                return $applications;
            }
        } else {
            $this->db->order_by("id", "DESC");
            $applications = $this->db->get_where('applications');
            return $applications;
        }
    }

    // GET APPROVED APPLICATIONS
    public function get_approved_applications()
    {
        $applications = $this->db->get_where('applications', array('status' => 1));
        return $applications;
    }

    // GET PENDING APPLICATIONS
    public function get_pending_applications()
    {
        $applications = $this->db->get_where('applications', array('status' => 0));
        return $applications;
    }

    public function get_approved_instructor()
    {
        return $this->db->order_by('id', 'DESC')->get_where('users', array('admin_verify' => '1', 'is_instructor' => 1, 'role_id' => 2));
    }

    public function get_pending_instructor()
    {
        return $this->db->order_by('id', 'DESC')->get_where('users', array('admin_verify' => '0', 'is_instructor' => 1, 'role_id' => 2));
    }

    public function update_status_of_instructor($id)
    {
        // $this->db->where('id', $id);
        $data = $this->db->get_where('users', array('id' => $id))->result_array();
        $mobile = $name = '';
        foreach ($data as $key => $value) {
            $mobile = $value['mobile'];
            $name = $value['first_name'];
            $email = $value['email'];
        }
        $this->db->where('id', $id);
        $res = $this->db->update('users', array('admin_verify' => '1','status' => 1));

        // Account details
        $apiKey = urlencode(SMS_KEY);
        $email_data['from'] = get_settings('system_email');
		$email_data['to'] = $email;
        
        
        
        // Message details
        $mobile = '91' . $mobile;
        $numbers = array($mobile);
        $sender = urlencode(SMS_SENDERID);
        $message = rawurlencode("[MedEd]: Hello $name, Congratulations, your application has been approved. For more info: meded.testing@gmail.com.");

  $message2 = "[MedEd]: Hello $name, Congratulations, your application has been approved. For more info: meded.testing@gmail.com.";
  
	$this->email_model->send_smtp_mail($message2, 'verified', $email_data['to'], $email_data['from']);



        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return $res;
    }
    
    
    
    
    
    
    
    

    //UPDATE STATUS OF INSTRUCTOR APPLICATION
    public function update_status_of_application($status, $application_id)
    {
        $application_details = $this->get_applications($application_id, 'application');
        if ($application_details->num_rows() > 0) {
            $application_details = $application_details->row_array();
            if ($status == 'approve') {
                $application_data['status'] = 1;
                $this->db->where('id', $application_id);
                $this->db->update('applications', $application_data);

                $instructor_data['is_instructor'] = 1;
                $this->db->where('id', $application_details['user_id']);
                $this->db->update('users', $instructor_data);

                $this->session->set_flashdata('flash_message', get_phrase('application_approved_successfully'));
                redirect(site_url('admin/instructor_application'), 'refresh');
                $apiKey = urlencode(SMS_KEY);
                $sender = urlencode(SMS_SENDERID);
                $get_user_data = $this->db->get_where('users', array('id' => $application_details['user_id']))->row_array();
                $fname = $get_user_data['first_name'];
                $message = rawurlencode("Hello, $fname, Congratulations, your application has been approved.For more info: Meded.");
                $numbers = "91" . $get_user_data['mobile'];
                $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
                $ch = curl_init('https://api.textlocal.in/send/');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $SMSRespomnse = curl_exec($ch);
                log_message('info', $SMSRespomnse);
                curl_close($ch);
            } else {
                $this->db->where('id', $application_id);
                $this->db->delete('applications');
                $this->session->set_flashdata('flash_message', get_phrase('application_deleted_successfully'));
                redirect(site_url('admin/instructor_application'), 'refresh');

                $apiKey = urlencode(SMS_KEY);
                $sender = urlencode(SMS_SENDERID);
                $get_user_data = $this->db->get_where('users', array('id' => $application_details['user_id']))->row_array();
                $fname = $get_user_data['first_name'];
                $message = rawurlencode("Hello, $fname We regret to inform you that your application did go through. Please contact customer support for feedback.For more info: Meded.");
                $numbers = "91" . $get_user_data['mobile'];
                $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
                $ch = curl_init('https://api.textlocal.in/send/');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $SMSRespomnse = curl_exec($ch);
                log_message('info', $SMSRespomnse);
                curl_close($ch);
            }
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_application'));
            redirect(site_url('admin/instructor_application'), 'refresh');
        }
    }

    public function get_rejected_instructor()
    {
        return $this->db->order_by('id', 'DESC')->get_where('users', array('admin_verify' => '2', 'is_instructor' => 1, 'role_id' => 2));
    }

    public function update_reject_status_of_instructor($id)
    {
        // $this->db->where('id', $id);
        $data = $this->db->get_where('users', array('id' => $id))->result_array();
        $mobile = $name = '';
        foreach ($data as $key => $value) {
            $mobile = $value['mobile'];
            $name = $value['first_name'];
        }
        $this->db->where('id', $id);
        $res = $this->db->update('users', array('admin_verify' => '2'));

        // Account details
        $apiKey = urlencode(SMS_KEY);

        // Message details
        $mobile = '91' . $mobile;
        $numbers = array($mobile);
        $sender = urlencode(SMS_SENDERID);
        $message = rawurlencode("[MedEd]: Hello, $name We regret to inform you that your application did go through. Please contact customer support for feedback. For more info: meded.testing@gmail.com.");

        $numbers = implode(',', $numbers);

        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

        // Send the POST request with cURL
        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return $res;
    }

    public function get_number_of_instructor_course($instructor_id)
    {
        $checker = array(
            'user_id' => $instructor_id,
        );
        $result = $this->db->get_where('course', $checker)->num_rows();
        return $result;
    }

    public function get_number_of_student_enrol($instructor_id)
    {
        $checker = array(
            'user_id' => $instructor_id,
        );
        $result = $this->db->get_where('enrol', $checker)->num_rows();
        return $result;
    }

    public function get_number_of_instructor_webinar($instructor_id)
    {
        $checker = array(
            'created_by' => $instructor_id,
        );
        $result = $this->db->get_where('webinar', $checker)->num_rows();
        return $result;
    }
    public function getStudentInstructorPanelPast($date)
    {
        $this->db->select('*');
        $this->db->from('enrol');
        $this->db->join('course', 'enrol.course_id = course.id', 'left');
        $this->db->where('enrol.date_added >=', strtotime($date));
        $this->db->where('course.user_id', 19);
        return $this->db->get();
    }
    public function get_status_wise_courses_for_instructor($status = '', $category_type = '', $date)
    {
        if (!empty($status)) {
            $this->db->where('status', $status);
        }
        if (!empty($category_type)) {
            $this->db->where('category_type', $category_type);
        }
        if (!empty($date)) {
            $this->db->where('date_added >=', strtotime($date));
        }
        $this->db->where('user_id', $this->session->userdata('user_id'));
        return $this->db->get('course');
    }
    public function get_instructor_course_page($category_id = '', $price = '', $status = '', $search = '', $course_type = '')
    {
        if ($category_id != "all") {
            $this->db->where('course.sub_category_id', $category_id);
        }

        if ($price != "all") {
            if ($price == "paid") {
                $this->db->where('course.is_free_course', 0);
            } elseif ($price == "free") {
                $this->db->where('course.is_free_course', 1);
            }
        }

        if ($status != "all") {
            $this->db->where('course.status', $status);
        }
        if (!empty($search)) {
            $this->db->like('course.title', $search);
        }

        if (!isset($_GET['dashboard'])) {
            if ($course_type != "all") {
                $this->db->where('course.category_type', 0);
            }
        }

        if (!empty($_GET['date']))
            $this->db->where('date_added>=', strtotime($_GET['date']));

        $this->db->where('user_id', $this->session->userdata('user_id'));
        return $this->db->get('course')->result_array();
    }
}