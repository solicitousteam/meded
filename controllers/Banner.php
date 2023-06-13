<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
        $this->load->model('Bannermodel');
        $this->load->library('upload');
	}
	
	public function index()
	{
     
		if ($this->session->userdata('is_admin_login')) {
            $data['slider_data'] = $this->Bannermodel->get_slider_data();
            $this->load->view('banner/banner',$data);
        } 
        else
        {
            $messge = array('message' => 'Please...','message_title' => 'Login','message_type' => 'error');
            $this->session->set_flashdata('item', $messge);
               redirect('Home');
       	}
    }

    public function add()
    {
        $page_data['courses'] = $this->crud_model->filter_course_for_backend("all", "all", "all", "all");
        $this->load->view('banner/add_banner');
    }

    public function add_c()
    {
        	 
		date_default_timezone_set('Asia/Kolkata');
        $currentTime = date( 'd-m-Y h:i:s A', time () );
        $date_string = strtotime($currentTime);
         
       
            if(!empty($_FILES['picture']['name']))
            {
                $config['upload_path'] = 'upload/banner/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $date_string.$_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('picture'))
                {
                    $uploadData = $this->upload->data();
                    $picture = base_url().'upload/banner/'.$uploadData['file_name'];
                }
                else
                {
                    $picture = '';
                }
            }
            else
            {
                $picture = '';
            }
            //echo $picture;
           
           
        
        //Form for adding user data
      
        $data = array(
            'text_1' => $this->input->post('text_1'),
            'text_2' => $this->input->post('text_2'),
            'banner_img' => $picture,
           
            
        );
        $last_insert_id = $this->Bannermodel->add_slider($data);
       
        $messge = array('message' => 'Added Successfully','message_title' => 'Banner Image','message_type' => 'success');
        $this->session->set_flashdata('item', $messge);
        redirect('Banner');
    }
    
   public function update_Slider_status($banner_id,$status_val)
   {
    $data = $this->Bannermodel->update_Slider_status($banner_id,$status_val);
    $messge = array('message' => 'Updated Successfully','message_title' => 'Banner Status','message_type' => 'success');
    $this->session->set_flashdata('item', $messge);
    echo json_encode($data); 
   }

    public function delete($id,$banner_img_name='')
      {
          $this->db->where('banner_id',$id);
          $result=$this->db->delete('tbl_banner');
          $messge = array('message' => 'Deleted Successfully','message_title' => 'Banner','message_type' => 'success');
        $this->session->set_flashdata('item', $messge);
        redirect('Banner');
    }

    
}
