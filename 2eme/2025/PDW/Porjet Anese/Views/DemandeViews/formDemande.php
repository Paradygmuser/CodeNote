<element>
	<div class="container py-2">
		<button id="closer" onclick="forceClose()"
			class="border-0 bg-transparent menu-btn-nav">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
					fill="currentColor" class="bi bi-x-circle position-absolute top-0 end-0 mt-1" viewBox="0 0 16 16">
					<path
						d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
						<path
						d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
				</svg>
			
			</button>
			<!-- enctype permet de "transformer en array" plusieur lignee pour les donnée. -->
	<form id="sendNewDemande" method="POST" action="<?php echo site_url('recordNouvelleDemande')?>" enctype="multipart/form-data"
		class="">
		<!-- ETAPE1 ::  j'ai besoin de recuperer le type de projet pour la selection des prestataires. -->
		<div id="etape1">
			<div class="mb-3">
				<label for="nom_projet">Project Name</label> <input type="text"
					id="nom_projet" name="nom_projet" required
					placeholder="Prokect Name"
					class="form-control form-control-lg form-control-custom" />
			</div>
			<div class="mb-3">
				<label for="description_projet">Describe your project in few words</label>
				<textarea maxlength="140" id="description_projet"
					name="description_projet" required
					placeholder="Describe your project"
					class="form-control form-control-lg form-control-custom"></textarea>
			</div>
			<div class="input-group mb-3">
				<p> type de	demande : </p> 
					<div class="radio-group">
					    <div class="radio-card">
					        <label>MIX_AUDIO</label>
					        <input type="radio" name="inputTypeDemande" value="0"/>
					    </div>
					    <div class="radio-card">
					        <label>MASTER_AUDIO</label>
					        <input type="radio" name="inputTypeDemande" value="1"/>
					    </div>
					    <div class="radio-card">
					        <label>SOUD_DESIGN</label>
					        <input type="radio" name="inputTypeDemande" value="2"/>
					    </div>
					    <div class="radio-card">
					        <label>COMPOSITION</label>
					        <input type="radio" name="inputTypeDemande" value="3"/>
					    </div>
					
					</div>
			</div>
			<button type="button" id="btnSuivant" class="btn btn-login w-100 py-2 fw-bold">
			    NEXT
			</button>
		</div>
		<!-- ETAPE2 :: choisir prestataire correspondant au type de demande. je voudrais qu'on voit une legere bio et NOTE A MOI MEME : un attribut pas encor present dans la db('titre') , pourrait etre construi sans la db-->
		<div id="etape2" style="display: none;">
		        <h3>Choice your Prestataire</h3>
		        <div id="form2">
		        
		        </div>
		        <!-- lid prestatiare ne prend pas, je vais mettre type button -->
		<button id="btnSuivant2" type="button"
			class="btn btn-login w-100 py-2 fw-bold">NEXT</button>
		</div>
		<!-- ETAPE3 :: charger fichier-->
		<!-- 
		https://developer.mozilla.org/en-US/play?uuid=4e355455338d5a268f42fb2a4c871d97a9509993&state=nVZbb9s2FP4rZ2pR2JgtJc3adYrth3Vt0a3timbBHqahocgjmQlFaiTlxA383wde5FucIJsfEunw3L6P56LbZG4bkeTJpFK6gQbtXLFpkbTK2CIBlNQuW5wWSdMJy1uibeYUx4xYUiSzQgJMGF%2F4B4CJICUKqJSeFglvSI1fu1YowkyRzF7PlTIIXmzAKghHMPj86d0Ifv38bjjJvH3vjMu2s%2BEZIKZRcYFF0gs5uxunP5OkwftPCaXY2mmRpJdtPYL0skX3r5X1RidAFghZwJn1QB1ioIIY45jSuOB4HckAmLSzTwpcngZopzVKK5ZgUCC1yBw3Efgkaw%2F47b2UnbVKzs66suF2ksXXbf2Jv4lZIZNRQo1Jcn%2BVcOt0KiXtuCINF8scDJFmbFDz6rSQq0IW0t%2B1VywJvaq16iTL4Qn1v1Mnb4iuuczhCEhnlRe1hDEu6xyeH7U3XlIqzVDncNzegFGCMygFoVc7UVTMKFqPBVY2h6MdHcFHhXSczqA9kBb6n4%2FIuGkFWeZQCQw5XHbG8mo5pkpalDYH0xKK4xLtNaLcwjIulbWqyeG4T19wY8fGLgWOXXXlIJXERwPjTR1ynSOv5zaHlz9Ev73xjnoEJrjEcW9x8jxa7JITE9zix3XFKL6EStinaUyVUDqHJz9WP1Fa7l7Yi%2FZmgzpgG2vCeGf82R3ImrMa15BjNRn%2BDXM4Sl9pbE63cccC2Us3n6sF6t2kg%2Bze1J%2BzFyU58b6j6HrOLR7wTajlC9xzHoT3ej9iJ9Wr6h7vySi5dB1ElTQW%2FOCBKTBFuwalTf%2FpUC%2FPfAsrPSiSMJmS4Wkhg0UcAg%2FZpOtB4cwK6X2kvvxS1RLK7RKmvjHCCWHszQKl%2FcCNRYnOBZ0TWWORjKBrGbH43s22X0JLOKdVJ6nlSh44HgwDMddzLhAGMZe04trY13MuWDyHHkqqsVEL9GeH1D2R%2Fl4cn44D2um3fupNA4Gpn4Fej1cw6I9TgbK2c5hOp3C0jhppJJpsc0g1EotvBLq3QZG0gTyfJtEktXhjX4fGhykUyeMGb5Gc7kIlbYuSRahEkwgOUBjcTdCNjIcSVGIrwwPenX24fqfhUhoExy5tUNWaxDUx25HfW2weii74Jvr%2FoDTc04IIzlwOfyxbHLi8hlvJHCT%2Bwqn7hQtPb51F6p5Xo4DKDQ54eqvRdlo6zTP%2BDQcbh%2BDVUqc22kiHq%2FTidPMaG9NV9ENoeFNv44FgkRpNYQrnXz5Eg9%2FLS6T2%2FMuHgO%2BOPhEOVni23AoXc41rfX3u11%2FLzi17w22vB7U2leZ%2Bu9X234jO4ZOyQMBfXSDdLbQUzv0cgKXqdGwEruQOr4%2FJbIPXad%2BpZ2fea6%2FiVFgVMstgbm1r8ixjuEChWtRpo75xIUiqdJ2hHJ%2BfZUxRk%2F2JZfYRGSfZu44zNNlbpRtiTeZH2FcHxvSjtoql6ebMXy5c%2FMbLiP94G22Lyqbdk9S82pO4L789UXtIdse5WdTf3zRiT2p5tR%2FhGsv9NG7GnCrphX%2F7elqP7gPtF4oi9M8GfsolFR1D45VSx9EwLLO1r72Wk11Too7uXKsHAUzgGE%2FWPR7jXDy9DccrKJcWzcX2TNwynk2dNTx7BlveXh7w1htkPlpq1Vt%2Bg2xwPFzBbz9f9OvkPouXuxYfvcWqr4n4TfTA9t36UAgDIjwf3LKC0yu3ZAc4hOksIEG%2FvlHaX7AinbCD4elm8z16xvqWDv0zKBJf3HEnIfturbRewK0gNGxgjXLdlSv3Jxkldo4NJnnCiL5KVv8C&srcPrefix=%2Fen-US%2Fdocs%2FWeb%2FHTML%2FReference%2FElements%2Finput%2Ffile%2F
		 -->
		<div id="etape3" style="display: none;">
			<div>
				<label for="fichier_demande">Choose file to upload (mp3, JPG)</label>
				<input type="file" id="fichier_demande" name="fichier_demande[]"
					accept=".wav, .mp3, .zip " multiple />
			</div>
			<div class="preview">
				<p>No files currently selected for upload</p>
			</div>
			
			<button id="sendDemande" type="button"
			class="btn btn-login w-100 py-2 fw-bold">CONFIRMER PROJECT</button>
		

	</form>
</div>
</element>