<section>
	<h2>Modifier un article</h2>
	<?php include($data['connected']); ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<div class="form-group">
			<div class="form-group">
				<input type="hidden" name="id" value=<?php echo $data['data']['id']; ?>>
				<label for="signature" class="control-label">Votre nom</label>
				<input type="text" name="signature" class="form-control" value="<?php echo $data['data']['signature'] ;?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="category" class="control-label">Catégorie</label>
			<select id="category" name="category">
				<?php foreach($data['categories'] as $category) : ?> 								
					<option 
						value=<?php echo $category['name_cat'] ; ?>
						<?php if($category['id_cat'] == $data['data']['id_cat_message']): ?>
						<?php echo " selected"; ?>
						<?php endif; ?>
					>
					<?php echo $category['name_cat'] ; ?>
					</option>
				<?php endforeach; ?>
			</select>
			<label for="newCategory">Ou créer une nouvelle catégorie</label>
			<input type="text" name="newCategory" id="newCategory" />
		</div>						
		<div class="form-group">
			<label for="body" class="control-label">Votre message</label>
			<textarea name="body" id="body" col="30" rows="10" class="form-control"><?php echo $data['data']['body'] ?></textarea>
			<p style="margin-top:10px;">
				<a href="index.php" class="btn btn-lg btn-primary">Annuler</a>
				<input type="hidden" name="a" value="update">
				<input type="hidden" name="e" value="posts">				
				<input type="submit" value="Soumettre" class="btn btn-lg btn-primary">
			</p>
		</div>
	</form>
</section>