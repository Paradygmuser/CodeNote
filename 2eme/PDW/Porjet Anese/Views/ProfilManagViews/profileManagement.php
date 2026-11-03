<!-- https://bootstrapexamples.com/@shola-ajani/profile-management-dashboard-2 -->

<div class="">
    <div class="container py-3">
        <div class="row">
            <!-- Profile Header -->
            <div class="fixed">
                <button id="closer"  class=" btn btn-login position-absolute top-0 end-0 mt-1">
				<svg id="closerbtn" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
					fill="currentColor" class="bi bi-x-circle  " viewBox="0 0 16 16">
					<path
						d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
						<path
						d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
				</svg>
			</button>
                
            <div class="col-12 mb-4">
                <div class="text-center">
                    <div class="position-relative d-inline-block">
                        <img src="<?php echo base_url().$pictureProfile?>" class="rounded-circle profile-pic" alt="Profile Picture" style="width: 128px; height: 128px;">
                    
							<form id="profilPicForm" action="<?php echo site_url('uploadProfilPict')?>" method="POST" enctype="multipart/form-data">
							<label for="profilPicInput" 
							class="btn btn-login btn-sm position-absolute  bottom-0 end-0 rounded-circle uploadPhoto">
							
							   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
								fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">  <path
									d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z" /><path
									d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
							</svg>
							 </label>
							   <input type="file" id="profilPicInput" name="profilPic" style="display:none;" accept=".jpg, .jpeg, .png"/>
							</form>
                    </div>
                    <h3 class="mt-3 mb-1"><?php echo $username ?></h3>
                    <p class=" mb-3">
                    <?php for($i=0; $i<count($types); $i++):?>
                        <?php if($i==count($types)-1):?>
                             <?php echo $types[$i]?>
                             <?php else:?>
                             
                        <?php echo $types[$i]?> /
                        <?php endif;?>
                    <?php endfor;?>
                    </p>
                    
                </div>
            </div>
            </div>

            <!-- Main Content -->
            <div class=" col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <!-- Sidebar -->
                            <div class="col-lg-3 border-end">
                                <div class="p-4">
                                    <div class="nav flex-column nav-pills">
                                        <a id="navLinkPersoInfo" class="btn menu-btn-nav nav-link active" href="#">
                                        <i class="fas fa-user me-2"></i>
                                        Personal Info</a>
                                        <a class="btn menu-btn-nav nav-link " href="#"><i class="fas fa-lock me-2"></i>Security</a>
                                        <a class="btn menu-btn-nav nav-link" href="#"><i class="fas fa-bell me-2"></i>Notifications</a>
                                        <a class="btn menu-btn-nav nav-link" href="#"><i class="fas fa-credit-card me-2"></i>Billing</a>
                                        <a class="btn menu-btn-nav nav-link" href="#"><i class="fas fa-chart-line me-2"></i>Activity</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Area -->
                            <div id="profilSettingMenu" class="col-lg-9">
                                 <?php  include('setingPersoinfo.php');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>