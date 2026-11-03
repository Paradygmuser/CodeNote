<?php echo $this->include('GlobalViews/navMenuConsultation.php')?>
<div id="choixConsultation" class="row px-3" style="">
    <h1>NUMERO DE DEMANDE : <b><?php echo $numDemande?></b></h1>
	<hr class="horizontalRow">
	<div id="descitpionProjetText" class="row">
		<div class="row text-center">DESCRIPTION PROJET:</div>
		<h2 class="commentaire_real"><?php echo $comment_description?></h2>

	</div>
	<div id="counterFile" class="row ">
		<b>Nombre de fichier : <span id="fileCount"><?php echo $fileCount?></span></b>
	</div>

	<hr>
	<div id="infoClient" class="row mb-3">
		<div class="col-4 blazeClient">
			NOM CLIENT : <b><span id="userName"><?php echo $clientName?></span></b>
		</div>
		<div class="col-4">
			NBR DE DEMANDE : <b><span id="demandeCount"><?php echo $demandeCount?></span></b>
		</div>
		<div class="col-4">
			EMAIL : <b><span id="emailClient"><?php echo $emailClient?></span></b>
		</div>
	</div> 
	<div id="uploadBounce" class="py-5 px-5" style="display: none;">
			<div class="row">
				<h3>RENDEZ VOTRE BOUNCE</h3>
			</div>
			<div class="row">
				<form id="sendBounce" method="POST"
					action="<?php echo site_url('toBounce')?>"
					enctype="multipart/form-data">
					<div>
						<label for="fichier_bounce">Choose bounced file(s) to upload
							(mp3,wav or zip)</label> 
							<input type="file" id="fichier_bounce"
							name="fichier_bounce[]" accept=".wav, .mp3, .zip " multiple />
					<input type="hidden" id="numDemandeInput" name="numDemandeInput" value="<?php echo $numDemande?>"/>
					</div>
					<div class="preview">
						<p>No files currently selected for upload</p>
					</div>
					<div>
						<button id="sendBounceButton" type="submit"
							class="btn btn-login w-100 py-2 fw-bold">CONFIRMER BOUNCE</button>
					</div>
				</form>

			</div>
		</div>

	
</div>
