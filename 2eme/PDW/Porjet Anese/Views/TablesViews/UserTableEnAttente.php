<?php echo $this->include('GlobalViews/navMenuConsultation.php')?>
<h1 class="text-center">DEMANDE EN ATTENTE</h1>
<div id="tablexDiv" >
	<table id="tablexUser" class="display">
		<thead>
			<tr>
				<th>nom projet</th>
				<th>type demande</th>
				<th>status</th>
				<th>creation date</th>
				<th>numero</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($lignes as $ligne) {?>
		    <tr>
		        <td><?php echo $ligne['nom projet']?></td>
		        <td><?php echo $ligne['type demande']?></td>
		        <td><?php echo $ligne['status']?></td>
		        <td><?php echo $ligne['creation date']?></td>		        
		        <td><?php echo $ligne['numero']?></td>
                <td>
                    <button id="consulterDemande" class="btn btn-login">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
</svg>
                    </button>
                </td>
		        <td>
		        <button id="pseudoDelete" class="btn btn-login pseudoDelete">
		            <svg class="svgDelete" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(220,100,50)" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg>
                    </button>
                </td>
		    </tr>
		<?php }?>
		</tbody>
	</table>
</div>
<div id="infoTable" class=" text-center">
    C&#39DEMANDE SONT EN ATTENTE DE VALIDATION PAR LE PRESTATAIRE QUE VOUS AVEZ CHOISI.<br> 
    POUR PLUS D&#39INFORMATION CONULSTER LA DEMANDE<br>
    VOUS POUVEZ ANNULEZ VOTRE DEMANDE SI VOUS LE SOUHAITEZ(irreversible)
</div>