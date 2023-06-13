<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cronjob extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
    }
    
    #function for todays webinar
    public function checkwebinar()
    {
        
       
        //India time (GMT+5:30)
        date_default_timezone_set("Asia/Calcutta");
        // echo date('d-m-Y H:i:s');
        

   
        
        $current_date = date('Y-m-d');
        $current_time_1 = strtoupper(date('h:i:sa'));
        $current_time_2 = strtoupper(date('h:i:sa',strtotime('+90 minutes')));
        
        $UserData = $this->db->query("SELECT course.id,course.title,course.proposed_date,course.proposed_time,users.device_token,users.first_name,users.last_name FROM `course` INNER JOIN enrol ON enrol.course_id=course.id INNER JOIN users ON users.id=enrol.user_id WHERE (proposed_date>='$current_date' AND proposed_date<='$current_date') AND category_type=1 AND (TIME(`proposed_time`)>='$current_time_1' AND TIME(`proposed_time`)<='$current_time_2')")->result();
    
       
    //   print_r($UserData);
       
       
        if(!empty($UserData))
        {
            foreach($UserData as $Value)
            {
                $date = date('d,M Y',strtotime($Value->proposed_date));
                $time = date('h:i a',strtotime($Value->proposed_time));
                $notification["title"] = 'Webinar Alert';
                $notification["body"] = ucwords("Dear $Value->first_name $Value->first_name, we just remind you regarding to your webinar course($Value->title) will be start live on $date at a $time Clock."); 
                
                
                // $topic = "Notify";
              	$url = 'https://fcm.googleapis.com/fcm/send';
                $fields = array(
                    'to' => $Value->device_token,
                    'notification' => $notification
                );
              	// Firebase API Key
              	$headers = array(
              		'Authorization:key = AAAA14qKAws:APA91bGE_cUR-V3OgkExtXr-S7_SZKbBN4F69fnVq4QZYLfTgGqblegT_IFOCN9UUiFYDCRSus1blEItLusiAPPNwU_46_ktudweZns1nMxZR-CLZOD-YvHXlAsJDoC4twPs9oVKTcNE',
              		'Content-Type:application/json'
              	);
        
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
?>