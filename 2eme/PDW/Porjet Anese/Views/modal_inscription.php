<!-- Vertically centered scrollable modal -->
<div class="modal fade" id="exampleModal" tabindex="-1"
	aria-labelledby="exampleModalLabel" aria-hidden="true">
	<!-- Vertically centered scrollable modal -->
	<div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header border-0">
				<h1 class="modal-title fs-5" id="exampleModalLabel">
				
			    <?php if(isset($from)&& $from=="fromIndex") {?>
				S'INSCRIRE
				<?php } else{?>
				INSCRIPTION PRESTATAIRE
				<?php } ?>
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal"
					aria-label="Close"></button>
			</div>
			<div class="modal-body ">
			<?php if(isset($from) && $from=="fromIndex") {?>
				<form id="sendInscription" method="POST"
					action="<?php echo site_url('processInscription')?>" class="">
			<?php } elseif(isset($from) && $from=="fromAdmin"){?>
				<form id="sendInscription" method="POST"
					action="<?php echo site_url('adminInscription')?>" class="">
			<?php }?>
			
					<div class="mb-3">
						<input type="text" id="1" name="username" required
							placeholder="username"
							class="form-control form-control-lg form-control-custom" />
					</div>
					<div class="mb-3">
						<input type="email" id="2" name="email" required
							placeholder="email@email.com"
							class="form-control form-control-lg form-control-custom" />
					</div>
					<div class="mb-3">
						<input type="password" id="3" name="password" required
							placeholder="password"
							class="form-control form-control-lg form-control-custom" />
					</div>
					<div class="mb-3">
						<input type="text" id="4" name="lastname" required
							placeholder="Lastname"
							class="form-control form-control-lg form-control-custom" />
					</div>
					<div class="mb-3">
						<input type="text" id="5" name="firstname" required
							placeholder="firstname"
							class="form-control form-control-lg form-control-custom" />
					</div>
					<div class="mb-3">
						<input type="text" id="6" name="street"
							placeholder="street adresse"
							class="form-control form-control-lg form-control-custom" />
					</div>
					<div class="mb-3">
						<input type="number" id="7" name="num" min="1" max="4000"
							required placeholder="number"
							class="form-control form-control-lg form-control-custom" />
					</div>
					<div class="mb-3">
						<input type="number" id="8" name="zipcode" min="1"
							max="9999" required placeholder="zipcode"
							class="form-control form-control-lg form-control-custom" />
					</div>
					<?php if(isset($from) &&$from=="fromIndex"):?>
					<div>
					<label class="form-check-label"	for="flexCheckChecked"> Checked checkbox </label>
				    <input class="form-check-input coche" type="checkbox" value="checked"  required data-errormessage="Please check" id="flexCheckChecked" >
					</div>
					<?php endif;?>
					<?php 
					if(isset($from) && $from=="fromAdmin"){
					    ?>
						<div class="mb-3">
							<input type="text" id="tva_num" name="tva_num" required
								placeholder="TVA number"
								class="form-control form-control-lg form-control-custom" />
						</div>
						<div class="input-group mb-3">
							<p>type prestataire :</p>
							<div class="row radio-group">
								<div class="col-3 radio-card">
									<label class="form-label radio-inline">
									<input type="checkbox" id="mix_audio" class="jsinput"
										name="type_demande[]" value="0"/>MIX_AUDIO</label> 
								</div>
								<div class="col-3 radio-card">
									<label class="form-label radio-inline">
									<input type="checkbox" id="master_audio" class="jsinput"
										name="type_demande[]" value="1" />MASTER_AUDIO</label> 
								</div>
								<div class="col-3 radio-card">
									<label class="form-label radio-inline">SOUND_DESIGN</label> 
									<input type="checkbox" id="sound_design" class="jsinput"
										name="type_demande[]" value="2" />
								</div>
								<div class="col-3 radio-card">
									<label class="form-label radio-inline">COMPOSITION</label> 
									<input type="checkbox" id="composition" class="jsinput"
										name="type_demande[]" value="3"  />
								</div>

							</div>
						</div>
					<?php }?>
					<?php if(isset($from) && ($from=="fromAdmin" or $from=="fromIndex")):?>
				</form>
				<?php endif;?>
			</div>
			<div class="modal-footer border-0 ">
				 <?php if($from=="fromIndex"):?>
				<button type="button" id="sendInscriptionButton" form="sendInscription" class="btn btn-login w-100 py-2 fw-bold">S'ENREGISTRER</button>
			    <?php elseif ($from=="fromAdmin"):?>
			    <button type="button" id="sendInscriptionButton" form="sendInscription" class="btn btn-login w-100 py-2 fw-bold">ENREGISTRER</button>
			    <?php endif;?>
			
			
			</div>
		</div>
	</div>  
</div>