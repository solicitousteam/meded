<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminaccess extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Adminaccessmodal');
        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }
    }
    public function senioradmin($type = 'list',$id = 0)
    {
        $file['page_name'] = 'failed_to_access';
        
        if(($this->session->userdata('admin_login') == true) && getrolecode($this->session->userdata('user_id'))=='1')
        {
            $page_data['page_title']    =   'Senior list';
            $page_data['page_name']     =   'senior_admin';
        }
        $this->load->view('backend/index', $page_data);
    }
}