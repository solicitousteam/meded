<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('home'); ?>"><i
                                    class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <?php echo $page_title; ?>
                            </a>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">

                </h1>
            </div>
        </div>
    </div>
</section>
<?php echo $this->session->userdata('is_instructor'); ?>
<section class="category-course-list-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="user-dashboard-box mt-3">
                    <div class="user-dashboard-content margin-auto mt-5 w-100 login-form">
                        <center>
                            <img src="<?php echo base_url('assets/5a142d709c.png'); ?>" style="height: 10rem;">
                            <h4 style="font-weight: bolder;" class="mt-3">We Received Your Request.</h4>
                            <div class="col-md-10 margin-auto">
                                <h5 class="mt-3"><?= $_SESSION['register_time_message']; ?></h5>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
unset($_SESSION['register_time_message']);
?>