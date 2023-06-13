<?php
    $system_name = $this->db->get_where('settings' , array('key'=>'system_name'))->row()->value;
    $system_title = $this->db->get_where('settings' , array('key'=>'system_title'))->row()->value;
    $user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array();
    $text_align     = $this->db->get_where('settings', array('key' => 'text_align'))->row()->value;
    $logged_in_user_role = strtolower($this->session->userdata('role'));
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo get_phrase($page_title); ?> | <?php echo $system_title; ?></title>
    <!-- all the meta tags -->
    <?php include_once 'metas.php'; ?>
    <!-- all the css files -->
    <?php include_once 'includes_top.php'; ?>
    
   
</head>
<body data-layout="detached">
    <!-- HEADER -->
    <?php include_once 'header.php'; ?>
    <div class="container-fluid-new"> 
        <div class="wrapper">
            <!-- BEGIN CONTENT -->
            <!-- SIDEBAR -->
            <?php
            
           // echo '------'.$logged_in_user_role.'/'.'navigation.php'; die;
            
            include_once $logged_in_user_role.'/'.'navigation.php' ?>
            <!-- PAGE CONTAINER-->
            <div class="content-page">
                <div class="content">
                    <!-- BEGIN PlACE PAGE CONTENT HERE -->
                    <?php //echo $page_name; ?>
                    <?php
                    
                    // echo $logged_in_user_role.'/'.$page_name.'.php'; die;
                    
                    include_once $logged_in_user_role.'/'.$page_name.'.php';?>
                    <!-- END PLACE PAGE CONTENT HERE -->
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
    <!-- all the js files -->
    <?php include_once 'includes_bottom.php'; ?>
    <?php include_once 'modal.php'; ?>
    <?php include_once 'common_scripts.php'; ?>
    
    <script>
    
            // Select your input element.
var number = document.getElementById('discounted_price');

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}
    </script>
</body>
</html>
