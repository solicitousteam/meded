<?php

class Bannermodel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_slider_data()
    {
        $query = $this->db->get('tbl_banner');
        return $query->result_array();
    }

    public function add_slider($data)
    {
        $this->db->insert('tbl_banner',$data);
        return;
    }

    public function delete_banner_img($banner_img_id)
    {
        $this->db->where('banner_id',$banner_img_id);
        $this->db->delete('tbl_banner');
    }
   
   public function update_Slider_status($banner_id,$status_val)
   {
    $this->db->set('banner_status',$status_val);
    $this->db->where('banner_id',$banner_id);
    $this->db->update('tbl_banner');
   }


   

    
}