<div class="p-4">
	<!-- Personal Information -->
	<div class="mb-4">
	    <div class="row py-2">
		<h5 class="col-6 mb-4">Personal Information</h5>
		<h1 class="col-3"></h1>
		<button id="modifierInfo" class="col-3 btn menu-btn-nav mb-4">MODIFIER</button>
		
		<button id="sauverInfo" class="col-3 btn menu-btn-nav mb-4" style="display: none;">SAUVEGARDER</button>
	    
	    </div>
	    
		<form id="formInfo" method=POST class="innhert">
		 <fieldset id="fielder" disabled>
		<div class="row g-3">
			<div class="col-md-6">
				<label for="prenom" class="form-label">First Name</label> 
				<input name="prenom" type="text"
					class="form-control form-control-custom" value="<?php echo $userPrenom?>" disabled>
			</div>
			<div class="col-md-6">
				<label for="Nfamille" class="form-label">Last Name</label> 
				<input name="Nfamille" type="text"
					class="form-control form-control-custom" value="<?php echo $userNfamille?>" disabled>
			</div>
			<div class="col-md-6">
				<label for="email" class="form-label">Email</label> 
				<input name="email" type="email"
					class="form-control form-control-custom" value="<?php echo $userEmail?>">
			</div>
			<div class="col-md-6">
				<label for="adresse" class="form-label">Adresse</label> 
				<input type="text" name="adresse"
					class="form-control form-control-custom" value="<?php echo $userAdresse?>">
			</div>
			<div class="col-12">
				<label for="bioUser" class="form-label">Bio</label>
				<textarea name="bioUser" class="form-control form-control-custom" rows="4" maxlength="255" ><?php echo $biographie?></textarea>
			</div>
		</div>
		</fieldset>
			</form>
	</div>

	<!-- Settings Cards -->
	<div class="row g-4 mb-4">
		<div class="col-md-6">
			<div class="settings-card card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<h6 class="mb-1">Two-Factor Authentication</h6>
							<p class="text-muted mb-0 small">Add an extra layer of security</p>
						</div>
						<div class="form-check form-switch">
							<input class="form-check-input toggler " type="checkbox" checked>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="settings-card card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<div>
							<h6 class="mb-1">Email Notifications</h6>
							<p class="text-muted mb-0 small">Receive activity updates</p>
						</div>
						<div class="form-check form-switch">
							<input class="form-check-input toggler" type="checkbox" checked>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Recent Activity -->
	<div>
		<h5 class="mb-4">Recent Activity</h5>
		<div class="activity-item mb-3">
			<h6 class="mb-1">Updated profile picture</h6>
			<p class="text-muted small mb-0">2 hours ago</p>
		</div>
		<div class="activity-item mb-3">
			<h6 class="mb-1">Changed password</h6>
			<p class="text-muted small mb-0">Yesterday</p>
		</div>
		<div class="activity-item">
			<h6 class="mb-1">Updated billing information</h6>
			<p class="text-muted small mb-0">3 days ago</p>
		</div>
	</div>
</div>