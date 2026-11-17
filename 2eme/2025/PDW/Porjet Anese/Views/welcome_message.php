<!DOCTYPE html >
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Eservice</title>
<meta name="description"
	content="The small framework with powerful features">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" type="image/png" href="<?php echo base_url('public/pictCat/Eservice.ico')?>">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Ubuntu" />
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
	rel="stylesheet">
	<link href ="<?php echo base_url('public/css/toggletheme.css')?>" rel="stylesheet" > 
	
	<link href ="<?php echo base_url('public/css/backvideo.css')?>" rel="stylesheet"> 
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
	integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
/* .blur-effect{ */
/*     backdrop-filter: blur(2px); */
/*     -webkit-backdrop-filter: blur(2px); */
/*     z-index: 10; */
/* } */

</style>
</head>
<body class="theme-darko d-flex flex-column vh-100 overflow-hidden">
	<div class="video-bg-div">
	<!-- https://codeigniter.com/user_guide/outgoing/view_layouts.html#including-view-partials -->
	<!--  je ne met pas le egale car quand je tape '<' suivit du point d'interrogation 
	       la balise php s'ajoute par autocompletation 
	       ca me prend moin de temps de rajouter le echo que de supprimer les 3 php et le remplacer par le egale. 
	       le $this en plein mileu d'une vue, pointe ver un  ../System/View as BaseView
	       il instancie l'objet avec des attribut dont certain pour le directory. 
	       il sera instancié depuis un service dans les App/config.view + service('render')
	        ainsi comme dans ce cas ci si nous sommes dans un subfolder, l'instance ce fait depuis le dossier de depart des Views.
	       -->
        <?php echo $this->include('GlobalViews/background.php')?>
    </div>
    <!-- shrink 0 force le header d'etre non ecrasable -->
    <header class="w-100 z-3 blur-effect ">
	<?php echo $this->include('GlobalViews/navbar.php')?>
	</header>
    <main class="flex-grow-1 w-100 pt-3 ">
        <div id="principalepage">
        <div id="errorDiv" class="relatif text-center bg-danger-subtle text-danger" onclick="closeError()">
        
			<?php if(isset($errorIndique)){?>
		    <?php echo $errorIndique?>
		<?php }?>
		</div>
		<div class="container-lg snap-scroller">
		<section class="snap-center">
		    <h1>BESOIN D'UN COMPOSITEUR POUR VOTRE FILM?<br> UN INGENIEUR SON POUR LE MIX DE VOTRE EP?</h1>
			<h2>BESOIN d'elever VOTRE projet vers une etapes supérieur?<br> déposez votre projet <br> notre équipe l'analysera avec soin</h2>		
		</section>
		<section class="snap-center">
		    <h1>Decrivez vos attentes</h1>
			<h2>exemple?<br> exemple.</h2>		
		</section>
		
		<section class="snap-center">
		    <h1>NOS PRESTATAIRE</h1>
		    <div>
		   <?php echo $this->include('GlobalViews/carousselPresta.php')?>
		    </div>
			
		</section>
			</div>
		</div>
			
		<?php echo $this->include('modal_inscription.php')?>	
		
	</main>
	<!-- l'objet window est un objet principal du document, il reagit comme un tableau associatif -->
	<!-- quand on met le . on declare une nouvelle clef et on lui assigne une valeur -->
	<!-- ici ca sera la valeur php comprise dans le document loader php, car js n'inject pas mes lien php infile. -->
	<!-- je garde les deux fichier js pour explication, le 2 sera utilisé pour le test -->
	<script>
	     const DarkLogo = "<?php echo base_url('public/pictCat/enael-dark.png')?>";
	     const LightLogo = "<?php echo base_url('public/pictCat/enael-light.png')?>";
	     const toLogin = "<?php echo site_url('toLogin')?>";
	</script>
	<script src="<?php echo base_url('public/js/togglebs2.js')?>"></script>
	<script src=<?php echo base_url('public/js/login.js')?>></script>
</body>
</html>
