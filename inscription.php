<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">

<?php
	
	session_start();
	include 'config.php';

	$reponse = $bdd->query("SELECT name FROM user WHERE name='".$_POST['pseudo']."'");

	if($_POST['mdp'] == $_POST['rmdp']){ //Si les deux mdp correspondent
		if(count($reponse->fetchAll()) == 0){ //Si le name n'est pas deja pris
			$insert = $bdd->query("INSERT INTO user (name, email, password) VALUES ('".$_POST['pseudo']."','".$_POST['email']."', '".$_POST['mdp']."')"); 
			if($insert) {
			?>

				<h1>Merci ! Vous êtes maintenant connecté !</h1>
				<h3>Votre page va être redirigée dans 5 secondes</h3>
				<script>
					setTimeout(function(){window.location = 'home.php';}, 1000);
				</script>

			<?php
			$reponse = $bdd->query("SELECT idUser, name, password FROM user WHERE name='".$_POST['pseudo']."' AND password='".$_POST['mdp']."'");
			$idUser = $reponse -> fetch(PDO::FETCH_OBJ) -> idUser;
			$_SESSION['idUser'] = $idUser;
			$_SESSION['connected'] = true;
			$_SESSION['pseudo'] = $_POST['pseudo'];
			mkdir('uploads/'.$idUser);
			} else {
				echo "failed to create new user!!";
			?>
				<script>
					setTimeout(function(){window.location = 'index.php';}, 1000);
				</script>
			<?php
			}
		}
		else{ // Si le name est deja pris
			?>

				<h1>Désolé le pseudo que vous avez choisi est déjà utilisé...</h1>
				<h3>Veuillez recommencer avec un autre pseudo</h3>
				<form action="inscription.php" method="POST">
					<label>Login : <br><input type="text" name="pseudo" autofocus></label><br>
					<label>Password : <br><input type="password" name="mdp" <?php echo "value='".$_POST['mdp']."'"; ?>></label><br>
					<label>Répétez votre password : <br><input type="password" name="rmdp" <?php echo "value='".$_POST['mdp']."'"; ?>></label><br>
					<input type="submit" value="Se connecter" class="btn btn-success">
				</form>

			<?php
		};
	}
	else{ // Si les deux mdp ne correspondent pas
		?>

			<h1>Désolé vos mots de passe ne correspondent pas...</h1>
			<h3>Veuillez recommencer en vérifiant bien vos mots de passe</h3>
			<form action="inscription.php" method="POST">
				<label>Login : <br><input type="text" name="pseudo" <?php echo "value='".$_POST['pseudo']."'"; ?>></label><br>
				<label>Password : <br><input type="password" name="mdp" autofocus></label><br>
				<label>Répétez votre password : <br><input type="password" name="rmdp"></label><br>
				<input type="submit" value="Se connecter" class="btn btn-success">
			</form>

		<?php
	};
	
?>