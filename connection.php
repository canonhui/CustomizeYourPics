<!-- Latest compiled and minified CSS -->
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php

	session_start();
	include 'config.php';

	$reponse = $bdd->query("SELECT idUser, name, password FROM user WHERE name='".$_POST['pseudo']."' AND password='".$_POST['mdp']."'");
	if(count($reponse->fetchAll()) == 1){
		$reponse = $bdd->query("SELECT idUser, name, password FROM user WHERE name='".$_POST['pseudo']."' AND password='".$_POST['mdp']."'");
		$idUser = $reponse -> fetch(PDO::FETCH_OBJ) -> idUser;
		?>

			<h1>Content de vous revoir, vous êtes maintenant connecté !</h1>
			<h3>La page va se recharger dans 5 secondes</h3>
			<script> // renvoie sur a l'index apres 5 sec
				setTimeout(function(){
                    window.location='home.php'}, 1000);
			</script>

		<?php
		$_SESSION['idUser'] = $idUser;
		$_SESSION['connected'] = true;
		$_SESSION['pseudo'] = $_POST['pseudo'];
	}
	else{
		?>

			<h1>Désolé, mauvaise combinaison pseudo / mot de passe</h1>
			<h3>Veuillez recommencer</h3>
			<form action="connection.php" method="POST">
				<label>Login : <br><input type="text" name="pseudo"></label><br>
				<label>Password : <br><input type="password" name="mdp"></label><br>
				<input type="submit" value="Se connecter" class="btn btn-success">
			</form>

		<?php
	};

?>
</body>
</html>