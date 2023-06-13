<style>.navbar-nav .nav-item:nth-child(2) {
	display: none;
}
.btn.btn-success.btn-block {
	max-width: 171px;
	padding-bottom: 12px;
}
</style>

<div class="row ">
    <div class="col-xl-12">

                <h4 class="page-title"> 
                <!--<i class="mdi mdi-apple-keyboard-command title_icon"></i> -->
                 <img src="<?= base_url('uploads/chat (1).png')?>" style="height: 44px; width: 44px;"alt="user-image">
                <?php echo get_phrase('private_message'); ?></h4>
            </div> <!-- end card body-->

</div>

<div class="card mt-4">
    <div class="card-body">
             <!-- compose new email button -->
                <div class="mail-sidebar-row visible-xs">
                    <a href="<?php echo site_url('admin/message/message_new');?>?type=<?php echo @$_GET['type'] ?>" class="btn btn-success btn-block">
                        <?php echo get_phrase('new_message');?>
                        <i class="mdi mdi-pencil float-right"></i>
                    </a>
                </div>
                <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">

           


                <!-- message user inbox list -->
                <ul class="navbar-nav" style="max-height:400px;overflow:auto;">

                    <?php
                    $current_user = $this->session->userdata('user_id');
                    $this->db->where('sender', $current_user);
                    $this->db->or_where('receiver', $current_user);
                    $message_threads = $this->db->get('message_thread')->result_array();
                    foreach($message_threads as $row):

                        // defining the user to show
                        if ($row['sender'] == $current_user)
                            $user_to_show_id = $row['receiver'];
                        if ($row['receiver'] == $current_user)
                            $user_to_show_id = $row['sender'];

                        $unread_message_number = $this->crud_model->count_unread_message_of_thread($row['message_thread_code']);
                        // $last_messages_details =  $this->crud_model->get_last_message_by_message_thread_code($row['message_thread_code'])->row_array();
                        $last_messages_details =  $this->db->select('message,timestamp')->where('message_thread_code',$row['message_thread_code'])->order_by('message_id','DESC')->get('message')->row_array();
                        $user_details = $this->db->get_where('users' , array('id' => $user_to_show_id))->row_array();
                        if(!empty($user_details))
                        {?>
                        <li class="nav-item">
                            <a class="text-left mb-1 btn btn-light d-block <?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['message_thread_code'])echo 'active';?>" href="<?php echo site_url('admin/message/message_read/' . $row['message_thread_code']);?>" style="border-radius:10px;">

                                <?php
                                    
                                    echo '<div class="row"><h5 style="margin-bottom:0px;" class="col-md-9 col-lg-9 col-sm-7 col-xs-12">'.ucwords($user_details['first_name'].' '.$user_details['last_name']).'</h5><div class="col-md-3 col-lg-3 col-sm-5 col-xs-12" style="padding:0px;"><span style="font-size: 9px;font-weight:600">'.(date('d M, Y H:i', $last_messages_details['timestamp'])).'</span></div></div>';
                                    
                                    echo
                                    '<span>'.$last_messages_details['message'].'</span>';
                                ?>
                                <!-- <span class="badge badge-light pull-right" style="color:#aaa;"><?php echo $user_details['role_id'] == 1 ? get_phrase('admin') : get_phrase('student') ;?></span> -->

                                <?php if ($unread_message_number > 0):?>
                                    <span class="badge badge-secondary pull-right">
                                        <?php echo $unread_message_number;?>
                                    </span>
                                <?php endif;?>
                            </a>
                        </li>
                    <?php 
                        }
                    endforeach;?>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
                <?php include $message_inner_page_name.'.php';?>
            </div>
        </div>
    </div>
</div>


<script>
$('.send-message-btn').click(function() {
    var text = $('#message-input-box').val();
    // console.log(text);return false;
    
    if(text.length <= 0)
    {
        alert('write message first');
        return false;
    }
    
    $.ajax({
        url: '<?php echo site_url('admin/message/send_reply/'.$current_message_thread_code); ?>',
        method: "POST",
        callback: '?',
        crossDomain: true,
        data: {
            message:text
        },
        success: function(data)
        {
            // console.log(data);return false;
            var json = JSON.parse(data);
            
            $('.conversation-list').html(json.Data);
            
            $('#message-input-box').val('');
            
            
            $('.conversation-list').css('overflow','overlay');
            
            var objDiv = document.querySelector(".conversation-list");
            objDiv.scrollTop = objDiv.scrollHeight;

            return false;
        }
    });
});

$('#message-input-box').keypress(function(e){
    if ( e.which == 13 ) return false;
    // //or...
    // if ( e.which == 13 ) e.preventDefault();
});
</script>
