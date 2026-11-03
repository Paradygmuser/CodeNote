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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link
	href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css"
	rel="stylesheet">
	<link href ="<?php echo base_url('public/css/toggletheme.css')?>" rel="stylesheet"> 	
	<link href ="<?php echo base_url('public/css/backvideo.css')?>" rel="stylesheet">	
	
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
        <?php echo $this->include('GlobalViews/background.php')?>
    </div>

	<?php echo $this->include('GlobalViews/navbar.php')?>
    <main class="container-lg flex-grow-1 glass-box overflow-y-auto w-100 pt-3">
        <div id="principalepage" class=" w-100 h-100">
    <?php echo $this->include('UserViews/dashPrestaPrincipal.php')?>
        
        </div>
    </main>
    <script>
	  const DarkLogo = "<?php echo base_url('public/pictCat/enael-dark.png')?>";
	  const LightLogo = "<?php echo base_url('public/pictCat/enael-light.png')?>";
	  
	  const dashPrestataire = "<?php echo site_url('toDashboardPrestataire')?>";
	  const toProfileManager = "<?php echo site_url('/toProfileManager')?>";
	  const rePhpAppl= "<?php echo site_url('sauverInfoUser')?>";
	  const personalInfo= "<?php echo site_url('personalInfo')?>";
	  
	  const tableDemandeToValider = "<?php echo site_url('toTablePrestaToValider')?>";
	  const tableDemandeToDo = "<?php echo site_url('toDemandeToDo')?>";
	  const infoDemande = "<?php echo site_url('infoDemande')?>";
	  const validerDemande="<?php echo site_url('validerDemande')?>";
	  const getConditionValidation="<?php echo site_url('ConditionValidation')?>";
	  
    </script>
	<script src="<?php echo base_url('public/js/togglebs2.js')?>"></script>
	<script src="<?php echo base_url('public/js/prestaDash2.js')?>"></script>
	<script src="<?php echo base_url('public/js/profileManaga.js')?>"></script>
</body>
</html>

    