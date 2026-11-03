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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.css"
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
	src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js">
</script>
<!-- https://datatables.net/extensions/responsive/examples/column-control/auto.html -->
<script
src="https://cdn.datatables.net/responsive/3.0.8/js/dataTables.responsive.js">
</script>
<script src="https://cdn.datatables.net/responsive/3.0.8/js/responsive.dataTables.js"></script>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

<style>

.logout path{
  fill: red; 
}
</style>
</head>
<body class="theme-darko d-flex flex-column vh-100 overflow-hidden">
	<div class="video-bg-div">
    <?php echo $this->include('GlobalViews/background.php')?>
    </div>

	<?php echo $this->include('GlobalViews/navbar.php')?>
    <main class="container-lg flex-grow-1 glass-box overflow-y-auto w-100 pt-3">
        <div id="principalepage" class=" w-100 h-100">
    <?php echo $this->include('UserViews/dashboard_adminPrincipal.php')?>
        
        </div>
    </main>
    
<?php echo $this->include('modal_inscription.php')?>
	<script>
      /*je ne comprend pas pourquoi php n'est pas executer par javascript, seul ici les varaible persiste*/
	  const DarkLogo = "<?php echo base_url('public/pictCat/enael-dark.png')?>";
	  const LightLogo = "<?php echo base_url('public/pictCat/enael-light.png')?>";

	  const toDashAdmin ="<?php echo site_url('toDashAdmin')?>";
	  const deleteUser="<?php echo site_url('deleteUser')?>";
	  
	  const tablePrestataire = "<?php echo site_url('tablePrestataire')?>";
	  const tableUtilisateur = "<?php echo site_url('tableUtilisateurs')?>";
	</script>
	<script src="<?php echo base_url('public/js/togglebs2.js')?>"></script>
	<script src="<?php echo base_url('public/js/adminEservice2.js')?>"></script>
</body>
</html>