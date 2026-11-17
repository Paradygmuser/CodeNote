<div class="rowHello" id="rowHello">
	<div id="headerPrincipal" class="row">
		<div class="col-3 py-5 border-1">
			<button id="demandeEnCours" type="button"
				class="d-none d-md-inline btn btn-login h-100 w-100">DEMANDE EN COURS</button>
		</div>

		<div class="col-3 py-5">
			<button id="demandeEnAttente" type="button"
				class="d-none d-md-inline btn btn-login h-100 w-100">DEMANDE EN ATTENTE</button>		
		</div>

		<div class="col-3 py-5 ">
			<button id="notifDemandeRecu" type="button"
				class="d-none d-md-inline btn btn-login h-100 w-100">NOTIFICATIONS DEMANDE RECU</button>
		</div>

		<div class="col-3 py-5 ">
			<button id="demandeCloturer" type="button"
				class="d-none d-md-inline btn btn-login h-100 w-100">DEMANDE CLOTURER</button>
		</div>
	</div>
	
	
</div>

<div id="bienVenue" class="text-center">
	<h1>
		<span> salut <?php echo $username ?></span>
	</h1>
	<h2>
		tu as <span><?php echo $countEncour ?></span> Demande en Traitement
	</h2>
	<h2>
		tu as <span><?php echo $countEnAttent ?></span> Demande en Attente de Validation
	</h2>
	<div class="row rowHello " id="rowHello">
		<div class="col-3 py-5 "></div>
		<div class="col-6 py-5">
		<button id="btnDemande" type="button"
			class="btn btn-login h-100 w-100">INTRODUIRE UNE NOUVELLE DEMANDE</button></div>
		<div class="col-3 py-5"></div>
	</div>

</div>




<div id="filexDiv" style="display: none;">
	<div class="row">
		<table id="filexDemandex" class="display">
			<thead>
				<tr>
					<th>nom fichier</th>
					<th>type fichier</th>
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