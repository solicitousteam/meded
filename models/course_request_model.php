<?php 
class Hello_Model extends CI_Model 
{
	function saverecords($user_id,$instructor_id,$course_desc,$added_on)
	{
	$query="insert into users values('','$user_id','$instructor_id','$course_desc','$added_on')";
	$this->db->query($query);
	}
	
	function displayrecords()
	{
	$query=$this->db->query("select * from tbl_course_request");
	return $query->result();
	}
}
?>