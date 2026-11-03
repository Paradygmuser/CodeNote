<?php echo $this->include('GlobalViews/navMenuConsultation.php');?>

<div id="conditionValidation" style="">

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