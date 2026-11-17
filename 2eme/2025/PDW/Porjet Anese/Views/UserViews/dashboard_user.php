<!DOCTYPE html >
<html lang="en" >
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
	<link href ="<?php echo base_url('public/css/userDashboard.css')?>" rel="stylesheet">
	
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
	integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>
<script
	src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js">
</script>

<style>

</style>
</head>
<body class="theme-darko d-flex flex-column vh-100 overflow-hidden">
	<div class="video-bg-div">
	<!-- this est unrenderview, un moteur du codeigniter-->
        <?php echo $this->include('GlobalViews/background.php')?>
    </div>
    <div>
    <!-- le include de codeigniter fonctionne pas comme le include de php normal je l'ai utilisé pour m'y retrouver dans les nombreux fichier-->
	<?php echo $this->include('GlobalViews/navbar.php')?>
    
    </div>
    <main class="container-lg flex-grow-1 glass-box overflow-y-auto w-100 pt-3">
        <div id="principalepage" class=" w-100 h-100">
    <?php echo $this->include('UserViews/dashboard_userPrincipal.php')?>
        
        </div>
        
        
    </main>
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
		data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">CONDITION DE
						RECEPTION</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">Merci de ton retour, tu est sur le point de
					valider le projet, il sera archiver si besoin des fichier plus tare
					dans ta table cloturer</div>
				<div class="modal-footer">
					<button type="button" class="btn pseudoDelete"
						data-bs-dismiss="modal">Close</button>
					<button type="button" id="demandeCloture" class="btn btn-login" data-bs-dismiss="modal">CLOTURER</button>
				</div>
			</div>
		</div>
	</div>
	<script>
    /*contrairement au window.clef qui est global a tout les js une fois declarer, 
        le const c'est pour rendre privé et eviter de rajouter a window les liens inutile en plus 
        pour encapsuler a dashboarusera ce document php et eviter de l'ecrasé.*/
	  const DarkLogo = "<?php echo base_url('public/pictCat/enael-dark.png')?>";
	  const LightLogo = "<?php echo base_url('public/pictCat/enael-light.png')?>";
	  
	  const toDashboardUser = "<?php echo site_url('toDashboardUser')?>";
	  const toProfileManager = "<?php echo site_url('/toProfileManager')?>";
	  const personalInfo= "<?php echo site_url('personalInfo')?>";
	  const rePhpAppl= "<?php echo site_url('sauverInfoUser')?>";
	  
	  const toFormDemande = "<?php echo site_url('/toFormDemande')?>";
	  const listerPrestataireSANSJS="<?php echo site_url('listerPrestataireSANSJS')?>";
	  
	  const toPseudoDelete = "<?php echo site_url('toPseudoDelete')?>";
	  const infoDemande="<?php echo site_url('infoDemande')?>";
	  const userClotureDemande="<?php echo site_url('userClotureDemande')?>";
	  
	  const fichierDemande = "<?php echo site_url('tableFichierDemande')?>";
	  const getTableAttenteU="<?php echo site_url('getTableAttenteU')?>";
	  const getTableToWait = "<?php echo site_url('getTableToWait')?>";
	  const getTableRecu="<?php  echo site_url('getTableRecu')?>";
	  const getTableCloturer="<?php echo site_url('getTableCloturer')?>";
    </script>
	<script src="<?php echo base_url('public/js/togglebs2.js')?>"></script>
	<script src="<?php echo base_url('public/js/userDashboard2.js')?>"></script>
	<script src="<?php echo base_url('public/js/profileManaga.js')?>"></script>
</body>
</html>

    