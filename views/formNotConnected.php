<?php if(isset($data['erreur'])) : ?>
	<?php include('erreur.php'); ?>
<?php endif; ?>
<section>
	<div  class='form-inline'>
		<form action="" method="post" style="width:45%;float:left;">
			<div id="loginIn" class="message__heading panel panel-primary" style="padding:12px;">
				<p>Se connecter :</p>
				<div style="display:block;">
					<label for="email1">Email</label>
					<input type="text" style="float:right;" name="email" id="email1" class="form-control" placeholder='email@adress'/>
				</div>
				<div style="display:block;margin-top:12px;">
				<label for="password1">Mdp</label>
				<input type="text" style="float:right;" name="password" id="password1"  class="form-control" placeholder='*********'/>
				</div>
				<input type="hidden" name="a" value="check">
				<input type="hidden" name="e" value="users">
				<div style="display:block;">
					<input type="checkbox" style='margin-bottom:12px;' name="stay" id="stayConnected" />
					<label for="stayConnecter">Je souhaite rester connecté(e)</label>
				</div>
				<input type="submit" value="Vous identifier" class="btn btn-primary btn-sm" style="display:block;margin:12px auto;">
			</div>
		</form>	
		<form action="" method="post" style="width:45%;float:left;margin-left:5%;">
			<div id="createAccount" class="message__heading panel panel-primary" style="padding:12px;">
				<p>Créer un compte :</p>
				<div style="display:block;">
					<label for="email">Email</label>
					<input type="text" style="float:right;" name="email" id="email" class="form-control" placeholder='email@adress'/>
				</div>
				<div style="display:block;margin-top:12px;">
					<label for="password">Mdp</label>
					<input type="text" style="float:right;" name="password" id="password"  class="form-control" placeholder='*********'/>
				</div>
				<div style="display:block;margin-top:12px;">
					<label for="passwordConfirm">Confirmer Mdp</label>
					<input type="text" style="float:right;" name="passwordConfirm" id="passwordConfirm"  class="form-control" placeholder=''/>
				</div>
				<input type="hidden" name="a" value="check">
				<input type="hidden" name="e" value="users">
				<div style="display:block;">
					<input type="checkbox" style='margin-bottom:12px;' name="stay" id="stayConnected" />
					<label for="stayConnecter">Je souhaite rester connecté(e)</label>
				</div>
				<input type="submit" value="Créer un compte et vous identifier" class="btn btn-primary btn-sm" style="display:block;margin:12px auto;"> 
			</div>
		</form>
	</div>
	<hr style="clear:both;">
</section>