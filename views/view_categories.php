<section class='posts'>
	<h2>Liste des articles triée avec la catégorie : <em><?php echo $data['category']['name_cat']; ?></em></h2>
	<?php include($data['connected']); ?>
	<p><a href="index.php">Afficher tous les messages</a></p>
	<article>
		<?php foreach($data['data'] as $dataSolo) : ?>
			<div class="message__heading panel panel-primary">
				<header class='panel panel-primary'>
				<div class="panel-heading">
					<p class="panel-title">
						<?php echo $dataSolo['signature']; ?> - 
						<?php echo utf8_encode(strftime('%A %#d %B %Y',strtotime($dataSolo['date']))); ?>					
					</p>
				</div>
				</header>
				<div class="message__body panel-body">
					<p>
					<?php echo $dataSolo['body']; ?>
					</p>
					<p>
						<a href="index.php?a=update&e=posts&id=<?php echo $dataSolo['id']; ?>">[ Modifier ]</a>
						<a href="index.php?a=delete&e=posts&id=<?php echo $dataSolo['id']; ?>">[ Supprimer ]</a>
						<a href="index.php?a=view&e=posts&id=<?php echo $dataSolo['id']; ?>">[ Voir cet article ]</a>
					</p>
				</div>
			</div>
		<?php endforeach; ?>
		<p><a href='index.php?a=create&e=posts' class="btn btn-lg btn-primary">Rédiger un article</a></p>
	</article>
</section>
