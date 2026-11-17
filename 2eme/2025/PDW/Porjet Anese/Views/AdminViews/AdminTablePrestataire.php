<?php echo $this->include('GlobalViews/navMenuConsultation.php')?>
<h1 class="text-center">PRESTATAIRES</h1>
<div id="tablexDiv">
	<table id="tablex" class="display">
		<thead>
			<tr>
				<th>numero utilisateur</th>
				<th>username</th>
				<th>last name</th>
				<th>first name</th>
				<th>adresse complete</th>
				<th>numero tva</th>
				<th>creation date</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		    <?php foreach($prestataires as $prestataire){?>
		    <tr>
		        <td><?php echo $prestataire['numero utilisateur']?></td>
		        <td><?php echo $prestataire['username']?></td>
		        <td><?php echo $prestataire['last name']?></td>
		        <td><?php echo $prestataire['first name']?></td>
		        <td><?php echo $prestataire['adresse complete']?></td>
		        <td><?php echo $prestataire['numero tva']?></td>
		        <td><?php echo $prestataire['creation date']?></td>
		        <td>
		        <button id="pseudoDelete" class="btn btn-login">
		            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="rgb(220,100,50)" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
</svg>
                    </button>
		            
		        </td>
		    </tr>
		    <?php }?>
		    
		</tbody>
	</table>
</div>