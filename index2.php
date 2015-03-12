<?php 
/*session_start();

if(!isset($_SESSION['compteur'])){
	$_SESSION['compteur'] = 0;
	echo $_SESSION['compteur'];
}
elseif (isset($_SESSION['compteur'])) {
	echo $_SESSION['compteur']++;
}*/

setcookie('nom','Arnaud Dassy',time()+24*3600);
echo isset($_COOKIE['nom'])?$_COOKIE['nom']:'pas encore de cookie';
?>
<a href="index.php">Actualiser</a>