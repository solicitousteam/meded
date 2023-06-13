<!DOCTYPE html>
<html lang="en">
<head> 
<?php 
include 'auth_session.php'; 
include 'header.html'; 
?>
</head>
<body>
	<?php  
	include 'sidebar.php';

    ?>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
			<div class="container-fluid">
            <!-- row -->
				<div class="row">
					
					<div class="col-xl-12 col-lg-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card profile-card">
								
									<div class="card-body">
										<form>
											<div class="mb-sm-5 mb-2">
												<div class="title mb-4"><span class="fs-18 text-black font-w600">Generals</span></div>
												<div class="row">
													<div class="col-xl-12 col-sm-6">
														<div class="form-group">
															<label> Name</label>
															<input type="text" class="form-control" placeholder="Enter name">
                                                            <input type="text" class="form-control" placeholder="Enter name">
														</div>
													</div>
													
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>E-mail</label>
															<input type="email" class="form-control" placeholder="E-mail">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>Phone Number</label>
															<input type="number" class="form-control" placeholder="Phone Number">
														</div>
													</div>
													<div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>How Would you like to be contacted</label>
															<input type="radio" class="form-control" placeholder="Enter password"><br>
                                                            <input type="radio" class="form-control" placeholder="Enter password"><br>
                                                            <input type="radio" class="form-control" placeholder="Enter password"><br>
														</div>
													</div>
                                                    <div class="col-xl-4 col-sm-6">
														<div class="form-group">
															<label>How Would you like to be contacted</label>
															<input type="radio" class="form-control" placeholder="Enter password"><br>
                                                            <input type="radio" class="form-control" placeholder="Enter password"><br>
                                                            <input type="radio" class="form-control" placeholder="Enter password">
														</div>
													</div>
												</div>
											</div>
										
											
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
<?php 	include 'footer.html'; ?>
</body>


</html>