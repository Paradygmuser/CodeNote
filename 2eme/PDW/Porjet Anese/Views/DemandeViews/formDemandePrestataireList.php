<div class="radio-card-prestataire">
<?php foreach($prestataires as $prestataire){?>
	<label><?php echo $prestataire['username']?></label><br> 
	<input type="radio"
		name="prestataireId" value="<?php echo $prestataire['id']?>" /><br>
<?php }?>
</div>