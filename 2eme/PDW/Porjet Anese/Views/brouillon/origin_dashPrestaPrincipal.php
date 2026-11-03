
<div class="rowHello" id="rowHello">
	<div id="headerPrincipal" class="row">
		<div class="col-3 py-5 border-1">
			<button id="demandeEnCours" type="button"
				class="btn btn-login h-100 w-100">DEMANDE EN COURS</button>
		</div>

		<div class="col-6"></div>

		<div class="col-3 py-5 ">
			<button id="notifDemande" type="button"
				class="btn btn-login h-100 w-100">NOTIFICATIONS DEMANDE</button>
		</div>
	</div>
	<div id="headerConsult" class="row" style="display: none;">
		<div class="col-3 py-5 border-1">
			<button id="closer" type="button" class="btn btn-login h-100 w-100">REVENIR</button>
		</div>

		<div class="col-6"></div>
		<!-- je prefere utiliser show et hide qui joue sur le display en inline css, plutot que de jouer avec les element de classe -->
		<div class="col-3 py-5 ">
			<button id="validerPorjet" type="button"
				class="btn btn-login h-100 w-100">VALIDER PROJET</button>
			<button id="telechargerFichier" type="button"
				class="btn btn-login h-100 w-100" style="display: none;">TELECHARGER
				PROJET</button>
		</div>
	</div>
</div>

<div id="bienVenue">
	<h1>
		<span> salut <?php echo $username ?></span>
	</h1>
	<h2>tu as <span><?php echo $countEncour ?></span> Demande en cour de traitement </h2>
	<h2>tu as <span><?php echo $countEnAttent ?></span> Demande en Attente de Validation </h2>
	<h2>tu as terminé <span><?php echo $countFini ?></span> Demande Terminé, Bravo </h2>
</div>

<div id="choixConsultation" class="row px-3" style="display: none;">

	<hr class="horizontalRow">
	<div id="descitpionProjetText" class="row">
		<div class="row text-center">DESCRIPTION PROJET:</div>
		<h2 class="commentaire_real"></h2>

	</div>
	<div id="counterFile" class="row ">
		<b>Nombre de fichier : <span id="fileCount"></span></b>
	</div>

	<hr>
	<div id="infoClient" class="row mb-3">
		<div class="col-4 blazeClient">
			NOM CLIENT : <b><span id="userName"></span></b>
		</div>
		<div class="col-4">
			NBR DE DEMANDE : <b><span id="demandeCount"></span></b>
		</div>
		<div class="col-4">
			EMAIL : <b><span id="emailClient"></span></b>
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
					<input type="hidden" id="numDemandeInput" name="numDemandeInput"/>
					</div>
					<div class="preview">
						<p>No files currently selected for upload</p>
					</div>
					<div>
						<button id="sendBounceButton" type="button"
							class="btn btn-login w-100 py-2 fw-bold">CONFIRMER BOUNCE</button>
					</div>
				</form>

			</div>
		</div>

	
</div>
<div>
	<div id="conditionValidation" style="display: none;">

		<div class="bodyCondition">
			<h2>En validant le projet tu:</h2>
			<p>accepte de rendre le projet dans les 14 jours apres le clic.</p>
		</div>
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6 footerCondition d-flex justify-content-between">
				<button id="rejeterDemande" type="button"
					class="bg-transparent menu-btn-nav ">REJETER</button>
				<button id="validerDemande" type="button"
					class="bg-transparent menu-btn-nav " style="">VALIDER</button>
			</div>
			<div class="col-3"></div>
		</div>
		<div class="footerCondition">en rejettant la demande tu annule la
			demande, l'utilisateur devra la ré introduire.</div>
	</div>
	<div id="demandeConifrmer" style="display: none;">
		Vous avez valider la demande elle devra etre remise avant le : <span
			id="expiresDate"></span>
	</div>
</div>
<div id="tablexDiv" style="display: none;">
	<div class="row">
		<table id="tablexDemande" class="display">
			<thead>
				<tr>
					<th>nom projet</th>
					<th>type demande</th>
					<th>status</th>
					<th>creation date</th>
					<th>numero</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<button id="closer"
				class="border-1 bg-transparent menu-btn-nav w-100">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
					fill="currentColor" class="bi bi-arrow-left-square-fill"
					viewBox="0 0 16 16">
					<path
						d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
				</svg>
				REVENIR
			</button>
		</div>
		<div class="col-3"></div>
	</div>
</div>

<div id="tablexDiv2" style="display: none;">
	<div class="row">
		<table id="tablexDemandeToDo" class="display">
			<thead>
				<tr>
					<th>nom projet</th>
					<th>type demande</th>
					<th>status</th>
					<th>expiration date</th>
					<th>numero</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<button id="closer"
				class="border-1 bg-transparent menu-btn-nav w-100">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
					fill="currentColor" class="bi bi-arrow-left-square-fill"
					viewBox="0 0 16 16">
					<path
						d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1" />
				</svg>
				REVENIR
			</button>
		</div>
		<div class="col-3"></div>
	</div>
</div>

