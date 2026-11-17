<!DOCTYPE html >
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Eservice</title>
<meta name="description"
	content="The small framework with powerful features">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url('public/pictCat/Eservice.ico')?>">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link
	href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css"
	rel="stylesheet">
	<link href ="<?php echo base_url('public/css/toggletheme.css')?>" rel="stylesheet"> 
	<link href ="<?php echo base_url('public/css/backvideo.css')?>" rel="stylesheet">	
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
	integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
	crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>
<script
	src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js">
</script>

<style>

/* .blur-effect{ */
/*     backdrop-filter: blur(3px); */
/*     -webkit-backdrop-filter: blur(3px); */
/*     z-index: 10; */
/* } */
.logout path{
  fill: red; 
}
</style>
</head>
<body class="theme-darko d-flex flex-column vh-100 overflow-hidden">
	<div class="video-bg-div">
    <?php echo $this->include('background.php')?>
    </div>

	<?php echo $this->include('navbar.php')?>
    <main class="container-lg flex-grow-1 glass-box overflow-y-auto w-100 pt-3">
        <div id="principalepage" class=" w-100 h-100">
    <?php echo $this->include('dashboard_adminPrincipal.php')?>
        
        </div>
    </main>
	
	
	
	
	
	<div class="enteteAdmin row" >	    
		<h1 class="col-12 text-center"> Hello <?php echo $username?></h1>		
	</div>
	<!-- Button trigger modal -->
	<div class="row">
	    <button type="button" class="btn btn-login col-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
		    ENREGISTRER UN PRESTATAIRE
		</button>
		<!-- Button trigger datatables -->
		<button id="TablePrest" type="button" class="btn btn-login col-4" >
		    AFFICHER PRESTATAIRES
		</button>
		
		<button id="TableUser" type="button" class="btn btn-login col-4" >
		    AFFICHER UTILISATEURS
		</button>		
	
	</div>
	<div class="row">
	    <div id="titre_table" class="col-12 bg-gray font-bold text-center">TABLE DES PRESTATAIRES</div>
	</div>
    <main class="container flex-grow-1 overflow-y-auto w-100 pt-3">
		<?php echo $this->include('modal_inscription.php')?>
		<div id="tablexDiv">		    
			<table id="tablex" class="display">
				<thead>
					<tr>
						<th>id</th>
						<th>username</th>
						<th>last name</th>
						<th>first name</th>
						<th>numero utilisateur</th>
						<th>adresse complete</th>
						<th>numero tva</th>
						<th>creation date</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</main>
	<script>
	  window.DarkLogo = "<?php echo base_url('public/pictCat/enael-dark.png')?>";
	  window.LightLogo = "<?php echo base_url('public/pictCat/enael-light.png')?>";
	  const tablePrestataire = "<?php echo site_url('tablePrestataire')?>";
	  const tableUtilisateur = "<?php echo site_url('tableUtilisateurs')?>";
	  const adminInscription = "<?php echo site_url('adminInscription')?>";
	</script>
	<script src="<?php echo base_url('public/js/togglebs2.js')?>"></script>
	<script src="<?php echo base_url('public/js/adminEservice.js')?>"></script>
</body>
</html>