
<div class="rowHello" id="rowHello">
	<div id="headerPrincipal" class="row">
		<div class="col-4 py-5 border-1">
			<button id="demandeEnCours" type="button"
				class="btn btn-login h-100 w-100">
				<span class="d-none d-md-inline d-lg-inline">DEMANDE EN COURS</span>
				<span class="">
				    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                </span>
				
				
			</button>
		</div>

		<div class="col-4"></div>

		<div class="col-4 py-5 ">
			<button id="notifDemande" type="button"
				class=" btn btn-login h-100 w-100">
				<span class="d-none d-md-inline d-lg-inline">NOTIFICATION DEMANDE</span>
				<span class="">
				   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-app-indicator" viewBox="0 0 16 16">
  <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1z"/>
  <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
</svg>
                </span>
				
			</button>
		</div>
	</div>
</div>

<div id="bienVenue" class=" text-center">
	<h1>
		<span> SALUT <b><?php echo $username ?></b></span>
	</h1>
	<br>
	<h3>tu as <span><?php echo $countEncour ?></span> Demande en cour de traitement </h3>
	<h3>tu as <span><?php echo $countEnAttent ?></span> Demande Proposé </h3>
	<h3>tu as <span><?php echo $countRecu ?></span> Demande en Attente de Validation </h3>
	<h3>tu as terminé <span><?php echo $countFini ?></span> Demande Terminé, Bravo </h3>
</div>
