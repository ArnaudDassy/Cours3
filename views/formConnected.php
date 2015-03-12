<section>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class='form-inline'>
		<div id="loginIn" class="message__heading panel panel-primary" style="padding:12px;">
			<p>Connecté(e) en tant que : <?php echo $_COOKIE['name'] ?></p>
			<input type="hidden" name="a" value="disconnect">
			<input type="hidden" name="e" value="users">
			<input type="submit" value="Se déconnecter" class="btn btn-primary btn-sm">
		</div>
	</form>	
</section>