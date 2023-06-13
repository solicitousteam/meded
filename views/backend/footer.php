<!-- Footer -->
<footer class="main">
	<strong> <?php echo get_settings('system_name'); ?> </strong> | &copy; 2018,
	<a href="<?php echo get_settings('footer_link'); ?>"
    	target="_blank"><?php echo get_settings('footer_text'); ?></a>
</footer>
<?php
//empty($live_video_same_page)
/*if(!empty($this->session->userdata('admin_login')) && !empty($_SESSION['current_live_class']) && 1!=1)
{?>
<iframe class="mini-display" allow="camera; microphone; fullscreen; display-capture; autoplay" src="https://meet60.in/<?= $_SESSION['current_live_class']?>" scrolling="auto"></iframe>
<?php
}*/?>
