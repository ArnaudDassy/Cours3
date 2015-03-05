<section class='posts'>
	<h3 class="alert alert-danger"><strong>/!\</strong> Attention vous êtes sur le point de supprimer cet article !</h3>
	<article>
		<div class="message__heading panel panel-primary">
			<header class='panel panel-primary'>
			<div class="panel-heading">
				<p class="panel-title">
					<?php echo $data['data']['signature']; ?> - 
					<?php echo utf8_encode(strftime('%A %#d %B %Y',strtotime($data['data']['date']))); ?>						
				</p>
			</div>
			</header>
			<div class="message__body panel-body">
				<p>
				<?php echo $data['data']['body']; ?>
				</p>
			</div>
		</div>
		<div>
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<input type="hidden" name="a" value="delete" />
				<input type="hidden" name="e" value="posts" />
				<a href="index.php" class="btn btn-lg btn-primary">Annuler</a>
				<input type="hidden" name="id" value=<?php echo $data['data']['id'] ?>>
				<input type="submit" value="Supprimer" class="btn btn-lg btn-danger" />
			</form>
		</div>
	</article>
</section>
