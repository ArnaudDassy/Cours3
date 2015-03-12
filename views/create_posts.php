	<section>				
		<h2>Rédiger un article</h2>
		<?php include($data['connected']); ?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<div class="form-group">
				<div class="form-group">
					<label for="signature" class="control-label">Votre nom</label>
					<input type="text" name="signature" class="form-control" />
				</div>
				<div class="form-group">
					<label for="category" class="control-label">Catégorie</label>
					<select id="category" name="category">
						<?php foreach($data['categories'] as $category) : ?> 								
							<option value=<?php echo $category['name_cat'] ; ?>><?php echo $category['name_cat'] ; ?></option>
						<?php endforeach; ?>
					</select>
					<label for="newCategory">Ou créer une nouvelle catégorie</label>
					<input type="text" name="newCategory" id="newCategory" />
				</div>
			</div>
			<div class="form-group">
				<label for="body" class="control-label">Votre message</label>
				<textarea name="body" id="body" col="30" rows="10" class="form-control"></textarea>
				<p style="margin-top:10px;">
					<a href="index.php" class="btn btn-lg btn-primary">Annuler</a>
					<input type="submit" value="Soumettre" class="btn btn-lg btn-primary">
					<input type="hidden" name="modified" value="0">
					<input type="hidden" name="a" value="create" />
					<input type="hidden" name="e" value="posts" />
				</p>
			</div>
		</form>
	</section>