<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
 
class ExportData extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();
        $this->load->library('session');
    }
    
    /* 21-05-2022 start*/
    # Blended Course Export
    public function blendedcourse($type = 'excel')
    {
        $this->db->select('course.id,course.title,course.short_description,course.price,course.discounted_price,course.level,course.date_added,users.first_name,users.last_name');
        $this->db->from('course');
        $this->db->join('users', 'users.id=course.user_id');

        if (!empty($_GET['category_id']) && $_GET['category_id'] != "all")
            $this->db->where('course.sub_category_id',$_GET['category_id']);
        
        if (!empty($_GET['price']) && $_GET['price'] != "all")
        {
            if ($_GET['price'] == "paid")
                $this->db->where('course.is_free_course', 0);
            if ($_GET['price'] == "free")
                $this->db->where('course.is_free_course', 1);
        }

        if (!empty($_GET['$instructor_id']) && $_GET['$instructor_id'] != "all")
            $this->db->where('course.user_id', $instructor_id);
        
        if (!empty($_GET['status']) && $_GET['status'] != "all")
            $this->db->where('course.status', $_GET['status']);
        
        if (!empty($_GET['search']))
        {
            $this->db->like('course.title', $_GET['search']);
            $this->db->or_like('users.first_name', $_GET['search']);
            $this->db->or_like('users.last_name', $_GET['search']);
        }

        $this->db->where('course.category_type', '0');

        $coursedata = $this->db->get('')->result();
        
        // load excel library
        $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Course Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Course Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Short Description');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Discounted Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Instructor Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Entry Date');
        
        
        
        // set Row
        $rowcount = 3;
        foreach($coursedata as $key => $value)
        {
           
              
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Blended');
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value->title);
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value->short_description);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value->price);
            $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", $value->discounted_price);
          
            $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", $value->first_name.' '.$value->last_name);
            $objPHPExcel->getActiveSheet()->SetCellValue("H$rowcount", date('d,M Y',strtotime($value->date_added)));
            $rowcount++;
        }
        
        $filename = 'blended-course-'.date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
    }
    /* 21-05-2022 close*/
    
    
    
    
    
    
    
    
    
    
    
    
    
    /* 23-05-2022 start */
    # Video Course Export
    public function videocourse($type = 'excel')
    {
        $this->db->select('course.id,course.title,course.short_description,course.price,course.discounted_price,course.level,course.date_added,users.first_name,users.last_name');
        $this->db->from('course');
        $this->db->join('users', 'users.id=course.user_id');

        if (!empty($_GET['category_id']) && $_GET['category_id'] != "all")
            $this->db->where('course.sub_category_id',$_GET['category_id']);
        
        if (!empty($_GET['price']) && $_GET['price'] != "all")
        {
            if ($_GET['price'] == "paid")
                $this->db->where('course.is_free_course', 0);
            if ($_GET['price'] == "free")
                $this->db->where('course.is_free_course', 1);
        }

        if (!empty($_GET['$instructor_id']) && $_GET['$instructor_id'] != "all")
            $this->db->where('course.user_id', $instructor_id);
        
        if (!empty($_GET['status']) && $_GET['status'] != "all")
            $this->db->where('course.status', $_GET['status']);
        
        if (!empty($_GET['search']))
        {
            $this->db->like('course.title', $_GET['search']);
            $this->db->or_like('users.first_name', $_GET['search']);
            $this->db->or_like('users.last_name', $_GET['search']);
        }

        $this->db->where('course.category_type', '3');

        $coursedata = $this->db->get('')->result();
        
        // load excel library
        $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Course Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Course Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Short Description');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Discounted Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Instructor Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Entry Date');
        
        // set Row
        $rowcount = 3;
        foreach($coursedata as $key => $value)
        {
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Video');
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value->title);
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value->short_description);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value->price);
            $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", $value->discounted_price);
            $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", $value->first_name.' '.$value->last_name);
            $objPHPExcel->getActiveSheet()->SetCellValue("H$rowcount", date('d,M Y',strtotime($value->date_added)));
            $rowcount++;
        }
        
        $filename = 'video-course-'.date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
    }
    
    # Serial Course Export
    public function serialcourse($type = 'excel')
    {
        
      
        
        $this->db->select('course.id,course.title,course.short_description,course.price,course.discounted_price,course.level,course.date_added,users.first_name,users.last_name');
        $this->db->from('course');
        $this->db->join('users', 'users.id=course.user_id');

        if (!empty($_GET['category_id']) && $_GET['category_id'] != "all")
            $this->db->where('course.sub_category_id',$_GET['category_id']);
            
            
            
          
            
        
        if (!empty($_GET['price']) && $_GET['price'] != "all")
        {
            if ($_GET['price'] == "paid")
                $this->db->where('course.is_free_course', 0);
            if ($_GET['price'] == "free")
                $this->db->where('course.is_free_course', 1);
        }

        if (!empty($_GET['$instructor_id']) && $_GET['$instructor_id'] != "all")
            $this->db->where('course.user_id', $instructor_id);
        
        if (!empty($_GET['status']) && $_GET['status'] != "all")
            $this->db->where('course.status', $_GET['status']);
        
        if (!empty($_GET['search']))
        {
            $this->db->like('course.title', $_GET['search']);
            $this->db->or_like('users.first_name', $_GET['search']);
            $this->db->or_like('users.last_name', $_GET['search']);
        }

        $this->db->where('course.category_type', '2');

        $coursedata = $this->db->get('')->result();
        
        // load excel library
        $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Course Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Course Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Short Description');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Discounted Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Instructor Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Entry Date');
        
        // set Row
        $rowcount = 3;
        foreach($coursedata as $key => $value)
        {
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Serial');
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value->title);
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value->short_description);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value->price);
            $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", $value->discounted_price);
            $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", $value->first_name.' '.$value->last_name);
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
    
    # Webinar Course Export
    public function webinarcourse($type = 'excel')
    {
        $this->db->select('course.id,course.title,course.short_description,course.price,course.discounted_price,course.level,course.date_added,users.first_name,users.last_name');
        $this->db->from('course');
        $this->db->join('users', 'users.id=course.user_id');

        if (!empty($_GET['category_id']) && $_GET['category_id'] != "all")
            $this->db->where('course.sub_category_id',$_GET['category_id']);
        
        if (!empty($_GET['price']) && $_GET['price'] != "all")
        {
            if ($_GET['price'] == "paid")
                $this->db->where('course.is_free_course', 0);
            if ($_GET['price'] == "free")
                $this->db->where('course.is_free_course', 1);
        }

        if (!empty($_GET['$instructor_id']) && $_GET['$instructor_id'] != "all")
            $this->db->where('course.user_id', $instructor_id);
        
        if (!empty($_GET['status']) && $_GET['status'] != "all")
            $this->db->where('course.status', $_GET['status']);
        
        if (!empty($_GET['search']))
        {
            $this->db->like('course.title', $_GET['search']);
            $this->db->or_like('users.first_name', $_GET['search']);
            $this->db->or_like('users.last_name', $_GET['search']);
        }

        $this->db->where('course.category_type', '1');

        $coursedata = $this->db->get('')->result();
        
        // load excel library
        $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Course Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Course Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Short Description');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Discounted Price');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Instructor Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Entry Date');
        
        // set Row
        $rowcount = 3;
        foreach($coursedata as $key => $value)
        {
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Webinar');
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value->title);
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value->short_description);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value->price);
            $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", $value->discounted_price);
            $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", $value->first_name.' '.$value->last_name);
            $objPHPExcel->getActiveSheet()->SetCellValue("H$rowcount", date('d,M Y',strtotime($value->date_added)));
            $rowcount++;
        }
        
        $filename = 'webinar-course-'.date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
    }
    
    # instructors export
    public function instructors($type = 'excel')
    {
        $ids_array = [];
        
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
        
        $this->db->select('first_name,last_name,email,mobile,status,admin_verify,date_added');
        $this->db->where('role_id',2);
        $this->db->where('is_instructor',1);
        
        if(!empty($_GET['status']) && $_GET['status'] == 'all')
        {
   
        }
        elseif(!empty($_GET['status']) && $_GET['status'] == 1)
        {
              $this->db->where('admin_verify',$_GET['status']);
            
        }
         elseif(!empty($_GET['status']) && $_GET['status'] == 2)
        {
             $this->db->where('admin_verify',$_GET['status']); 
            
        }
        else
        {
                    
            $this->db->where('admin_verify','0');
            
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
        
        $instructordata = $this->db->get_where('users', $Conditions)->result();
        
        // load excel library
        $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Mobile');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Admin Verify');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Entry Date');
        
        // set Row
        $rowcount = 3;
        foreach($instructordata as $key => $value)
        {
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Students');
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value->first_name.' '.$value->last_name);
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value->email);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value->mobile);
            $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", ($value->status == '1') ? 'Active' : 'Deactive');
            $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", ($value->admin_verify == '0') ? 'pending' : (($value->admin_verify == '1') ? 'Aproval' : 'Rejected'));
            $objPHPExcel->getActiveSheet()->SetCellValue("H$rowcount", date('d,M Y',strtotime($value->date_added)));
            $rowcount++;
        }
        
        $filename = 'instructors-'.date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
    }
    
    
    
    
    
    # instructors export
    public function users($type = 'excel')
    {
        $ids_array = $course_ids_array = [];
        if(!empty($_GET['category_id']) && $_GET['category_id']!='all')
        {
            $CourseData = $this->db->select('id as course_id')->from('course')->where('sub_category_id',$_GET['category_id'])->get()->result();
            if(!empty($CourseData))
            {
                $course_ids_array = array_column($CourseData,'course_id');
                $UserData = $this->db->select('id')->from('users')->where('role_id','2')->where('is_instructor','2')->where_in('id',array_column($CourseData,'course_id'))->get()->result();
                if(!empty($UserData))
                    $ids_array = array_column($UserData,'id');
            }        
        }
        
        if(!empty($_GET['instructor_id']) && $_GET['instructor_id']!='all')
        {
            $this->db->select('id as course_id');
            $this->db->from('course');
            $this->db->where('user_id',$_GET['instructor_id']);
            if(!empty($course_ids_array))
                $this->db->where_in('id',$course_ids_array);
            
            $CourseData = $this->db->get()->result();
            
            if(!empty($CourseData))
            {
                $UserData = $this->db->select('id')->from('users')->where('role_id','2')->where('is_instructor','2')->where_in('id',array_column($CourseData,'course_id'))->get()->result();
                if(!empty($UserData))
                    $ids_array = array_column($UserData,'id');
            }
        }
        
        $this->db->select('id,first_name,last_name,email,mobile,status,admin_verify,date_added');
        $this->db->where('role_id',2);
        $this->db->where('is_instructor!=',1);
        
        if(!empty($_GET['status']) && $_GET['status'] != 'all')
            $this->db->where('status',$_GET['status']);
        
        if (isset($_GET['date']))
            $this->db->where('date_added>=',strtotime($_GET['date']));
        
        if(!empty($ids_array))
            $this->db->where_in('id',$ids_array);
            
        $userdata = $this->db->get_where('users', $Conditions)->result();
        
        // load excel library
        $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Mobile');
        // $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Course Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Course Category');
        // $objPHPExcel->getActiveSheet()->SetCellValue('I2', 'Admin Verify');
        // $objPHPExcel->getActiveSheet()->SetCellValue('J2', 'Entry Date');
        
        // set Row
        $rowcount = 3;
        foreach($userdata as $key => $value)
        {
            
       
            
            
               $enrolled_courses = $this->crud_model->enrol_history_by_user_id($value->id);
              $category_id = array();
               $category_id2 = array();
              
               foreach ($enrolled_courses->result_array() as $enrolled_course) {
                                                $course_details = $this->crud_model->get_course_by_id($enrolled_course['course_id'])->row_array();
                                                $category_id[] = $course_details['title'];
                                              
               }
               foreach ($category_id as $list) {
                
                                            if (!empty($this->crud_model->get_category_by_id($list)['name'])) {
                                             $category_id2[] = $this->crud_model->get_category_by_id($list)['name'];
                                            }
               }
               

               
              
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Students');
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value->first_name.' '.$value->last_name);
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value->email);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value->mobile);
            // $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", ($value->status == '1') ? 'Active' : 'Deactive');
              $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", implode(',', $category_id) );
            $objPHPExcel->getActiveSheet()->SetCellValue("H$rowcount", implode(',', $category_id2));
            // $objPHPExcel->getActiveSheet()->SetCellValue("I$rowcount", ($value->admin_verify == '0') ? 'pending' : (($value->admin_verify == '1') ? 'Aproval' : 'Rejected'));
            // $objPHPExcel->getActiveSheet()->SetCellValue("J$rowcount", date('d,M Y',strtotime($value->date_added)));
            $rowcount++;
         }
        
        $filename = 'users-'.date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
    }
    
    
    
    # instructors export
    public function usersExport($type = 'excel')
    {
        
        
        
        
        $this->db->select("users.*,(SELECT SUM(amount) as amount FROM payment WHERE user_id=users.id) as amount");
        $this->db->from('users');
        // $this->db->join('enrol','users.id=enrol.user_id');
        // $this->db->join('course','course.id=enrol.course_id');
        
        $this->db->where('users.role_id', 2);
        $this->db->where('users.is_instructor', 0);
        
        if(isset($_GET['date']))
            $this->db->where('users.date_added>=',strtotime($_GET['date']));
            
        if(!empty($_GET['status']) && $_GET['status'] !='all')
        {
            $column = ($_GET['status'] == 'active') ? 'users.status' : 'users.status!=';
            $this->db->where($column,1);
        }
        
        if(!empty($_GET['category_id']) && $_GET['category_id'] != 'all')
            $this->db->where_in('course.sub_category_id',$_GET['category_id']);
        
        if(!empty($_GET['instructor_id']) && $_GET['instructor_id'] != 'all')
            $this->db->where_in('course.user_id',$_GET['instructor_id']);
              
              
        $this->db->where('role_id',2);
              
        $this->db->where('is_instructor!=',1);
        
        $this->db->order_by('users.id', 'DESC');
        $userdata = $this->db->get('')->result();
        
        $ids_array = $course_ids_array = [];
        
        // load excel library
        $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Mobile');
        // $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Course Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'Course Category');
        // $objPHPExcel->getActiveSheet()->SetCellValue('I2', 'Admin Verify');
        // $objPHPExcel->getActiveSheet()->SetCellValue('J2', 'Entry Date');
        
        // set Row
        $rowcount = 3;
        foreach($userdata as $key => $value)
        {
            $enrolled_courses = $this->crud_model->enrol_history_by_user_id($value->id);
            $category_id = array();
            $category_id2 = array();
              
           foreach ($enrolled_courses->result_array() as $enrolled_course) 
           {
                $course_details = $this->crud_model->get_course_by_id($enrolled_course['course_id'])->row_array();
                $category_id[] = $course_details['title'];
                                          
           }
           foreach ($category_id as $list) 
           {
                if (!empty($this->crud_model->get_category_by_id($list)['name'])) {
                 $category_id2[] = $this->crud_model->get_category_by_id($list)['name'];
                }
           }
               

               
              
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", 'Students');
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", $value->first_name.' '.$value->last_name);
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value->email);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value->mobile);
            // $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", ($value->status == '1') ? 'Active' : 'Deactive');
              $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", implode(',', $category_id) );
            $objPHPExcel->getActiveSheet()->SetCellValue("H$rowcount", implode(',', $category_id2));
            // $objPHPExcel->getActiveSheet()->SetCellValue("I$rowcount", ($value->admin_verify == '0') ? 'pending' : (($value->admin_verify == '1') ? 'Aproval' : 'Rejected'));
            // $objPHPExcel->getActiveSheet()->SetCellValue("J$rowcount", date('d,M Y',strtotime($value->date_added)));
            $rowcount++;
         }
        
        $filename = 'users-'.date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');
    }
    
    
    
    
    
    
    
    
    # course enrolled export
    public function coursesenrolled($type = 'excel')
    {
        $course_ids = [];
        if(!empty($_GET['course_id']) && $_GET['course_id']!='all')
            $course_ids[] = $_GET['course_id'];
            
        if(!empty($_GET['instructor_id']) && $_GET['instructor_id']!='all')
        {
            $course_ids = [];
            $CourseData = $this->db->select('id')->from('course')->where('user_id',$_GET['instructor_id'])->get()->result();
            if(!empty($CourseData))
                $course_ids = array_merge($course_ids,array_column($CourseData,'id'));
        }
        
        if(!empty($_GET['is_free']) && $_GET['is_free']!='all')
        {
            $is_free_course = ($_GET['is_free'] == 'free') ? '0' : '1';
            
            $CourseData = $this->db->select('id')->from('course')->where('is_free_course',$is_free_course)->get()->result();
            
            if(!empty($CourseData))
                $course_ids = array_merge($course_ids,array_column($CourseData,'id'));
        }
            
        $this->db->select('enrol.course_id,course.title,course.is_free_course,users.first_name,users.last_name,users.email,category.name as category_name,(SELECT COUNT(id) FROM enrol WHERE enrol.course_id=course.id) AS total_students');
        $this->db->from('enrol');
        $this->db->join('course','course.id=enrol.course_id');
        $this->db->join('category','category.id=course.sub_category_id');
        $this->db->join('users','users.id=course.user_id');
        if (!empty($course_ids))
            $this->db->where_in('course.id',$course_ids);

        if (!empty($_GET['date']))
            $this->db->where('enrol.date_added>=', strtotime($_GET['date']));
        
        if(!empty($_GET['search']))
        {
            $this->db->like('course.title',$_GET['search']);
            $this->db->or_like('users.first_name',$_GET['search']);
            $this->db->or_like('users.last_name',$_GET['search']);
            $this->db->or_like('category.name',$_GET['search']);
        }
        
        $this->db->group_by('enrol.course_id');
        $courseenrolleddata = $this->db->get('')->result();
        
        // load excel library
        $this->load->library('excel');
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Sr.No');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Course Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'Course Type');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'Category');
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'Instructor Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'Instructor Email');
        $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'Number Of Student');
        
        // set Row
        $rowcount = 3;
        foreach($courseenrolleddata as $key => $value)
        {
            $objPHPExcel->getActiveSheet()->SetCellValue("A$rowcount", $key+1);
            $objPHPExcel->getActiveSheet()->SetCellValue("B$rowcount", $value->title);
            $objPHPExcel->getActiveSheet()->SetCellValue("C$rowcount", ($value->is_free_course == '0') ? 'Paid' : 'Free');
            $objPHPExcel->getActiveSheet()->SetCellValue("D$rowcount", $value->category_name);
            $objPHPExcel->getActiveSheet()->SetCellValue("E$rowcount", $value->first_name.' '.$value->last_name);
            $objPHPExcel->getActiveSheet()->SetCellValue("F$rowcount", $value->email);
            $objPHPExcel->getActiveSheet()->SetCellValue("G$rowcount", $value->total_students);
            $rowcount++;
        }
        
        $filename = 'course-enrolled-'.date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output');   
    }
    /* 23-05-2022 close */
     
}
?>