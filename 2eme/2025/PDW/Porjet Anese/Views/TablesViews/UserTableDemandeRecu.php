<?php echo $this->include('GlobalViews/navMenuConsultation.php')?>
<h2 class="text-center"><b>DEMANDE RECU</b></h2>
<div id="tablexDiv" >
	<table id="tablexUser" class="display">
		<thead>
			<tr>
				<th>nom projet</th>
				<th>type demande</th>
				<th>status</th>
				<th>expiration date</th>
				<th>numero</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($lignes as $ligne) {?>
		    <tr>
		        <td><?php echo $ligne['nom projet']?></td>
		        <td><?php echo $ligne['type demande']?></td>
		        <td><?php echo $ligne['status']?></td>
		        <td><?php echo $ligne['expiration date']?></td>		        
		        <td><?php echo $ligne['numero']?></td>
		        <td>
                    <button id="consulterDemande" class="btn btn-login">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
</svg>
                    </button>
                </td>
		    </tr>
		<?php }?>
		</tbody>
	</table>
</div>
<div id="infoTable" class=" text-center">
    VOTRE BOUNCE VOUS ATTEND ECOUTEZ LE , VALIDEZ LE, LIBERER VOTRE PROJET
</div>
