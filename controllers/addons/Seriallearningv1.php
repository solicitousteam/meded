<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seriallearningv1 extends CI_Controller
{

    protected $unique_identifier = "serial-learningv1";
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');

        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    public function getallv1() {

       echo json_encode($this->db->get('serial_learning')->result());
    }
}
