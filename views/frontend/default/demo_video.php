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
                    <div class="user-dashboard-content w-100 login-form">
                        <div class="content-title-box text-center" style="font-weight: bolder;">
                            Watch our demo video
                        </div>

                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/qO4JsQ2VY-M"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>

                        <center>
                            <a href="<?php echo site_url(); ?>/home/subscription_plans<?= ($user_id > 0) ? '/' . $user_id : '' ?>"
                                class="btn"><?php echo site_phrase('continue'); ?></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
<?php
    if (!empty($_SESSION['register_time_message'])) { ?>
swal.fire({
    title: 'Registration Success',
    text: "<?= $_SESSION['register_time_message']; ?>",
    icon: 'success',
    timer: 3500,
    buttons: false,
});
<?php
        unset($_SESSION['register_time_message']);
    } ?>
</script>