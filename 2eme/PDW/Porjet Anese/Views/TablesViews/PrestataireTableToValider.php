<?php echo $this->include('GlobalViews/navMenuConsultation.php')?>
<div id="tablexDiv" style="">
	<div class="row">
		<table id="tablex" class="display">
			<thead>
				<tr>
					<th>nom projet</th>
					<th>type demande</th>
					<th>status</th>
					<th>creation date</th>
					<th>numero</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($demandes as $demande){?>
			<tr>
			    <td><?php echo $demande['nom projet']?></td>
			    <td><?php echo $demande['type demande']?></td>
			    <td><?php echo $demande['status']?></td>
			    <td><?php echo $demande['creation date']?></td>
			    <td><?php echo $demande['numero']?></td>
			    <td>
			        <button id="consulterDemande" class=" btn btn-login consulterDemande">CONSULTER </button>
			    </td>
			</tr>
			<?php }?>
			</tbody>
		</table>
	</div>
</div>