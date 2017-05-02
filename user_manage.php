<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">

<?php
	
	session_start();
	include 'config.php';

	if(isset($_POST['pseudo'])) {
		$reponse = $bdd->query("SELECT name FROM user WHERE name='".$_POST['pseudo']."'");
		if(count($reponse->fetchAll()) == 0){ //Si le name n'est pas deja pris
			$bdd->query("UPDATE user SET name='".$_POST['pseudo']."' WHERE idUser='".$_SESSION['idUser']."'"); 
			?>

				<h1>User name has been modified !</h1>
				<h3>Votre page va être redirigée dans 1 secondes</h3>
				<script>
					setTimeout(function(){window.location = 'home.php';}, 1000);
				</script>

			<?php
			$reponse = $bdd->query("SELECT idUser, name, password FROM user WHERE name='".$_POST['pseudo']."' AND password='".$_POST['mdp']."'");
			$idUser = $reponse -> fetch(PDO::FETCH_OBJ) -> idUser;
			//$_SESSION['idUser'] = $idUser;
			//$_SESSION['connected'] = true;
			$_SESSION['pseudo'] = $_POST['pseudo'];
		}
		else{ // Si le name est deja pris
			?>

				<h1>Désolé le pseudo que vous avez choisi est déjà utilisé...</h1>
				<h3>Veuillez recommencer avec un autre pseudo</h3>
				<form action="user_manage.php" method="POST">
					<label>Login : <br><input type="text" name="pseudo" autofocus></label><br>
					<label>Password : <br><input type="password" name="mdp" <?php echo "value='".$_POST['mdp']."'"; ?>></label><br>
					<label>Répétez votre password : <br><input type="password" name="rmdp" <?php echo "value='".$_POST['mdp']."'"; ?>></label><br>
					<input type="submit" value="Se connecter" class="btn btn-success">
				</form>

			<?php
		};
	}
	if(isset($_POST['nmdp'])) {
		$reponse = $bdd->query("SELECT password FROM user WHERE idUser='".$_SESSION['idUser']."'");
		$current_mdp = $reponse -> fetch(PDO::FETCH_OBJ) -> password;
		if($current_mdp == $_POST['cmdp']) {
			if($_POST['nmdp'] == $_POST['rmdp']){ //Si les deux mdp correspondent
				$bdd->query("UPDATE user SET password='".$_POST['nmdp']."' WHERE idUser='".$_SESSION['idUser']."'"); 
				?>

					<h1>Your password has been modified successfully !</h1>
					<h3>Votre page va être redirigée dans 1 secondes</h3>
					<script>
						setTimeout(function(){window.location = 'home.php';}, 1000);
					</script>

				<?php
			}
			else{ // Si les deux mdp ne correspondent pas
			?>

				<h1>Désolé vos mots de passe ne correspondent pas...</h1>
				<h3>Veuillez recommencer en vérifiant bien vos mots de passe</h3>
				<form action="user_manage.php" method="POST">
					<label>Current Password : <br><input type="password" name="cmdp"></label><br>
					<label>New Password : <br><input type="password" name="nmdp"></label><br>
					<label>Répétez votre password : <br><input type="password" name="rmdp"></label><br>
					<input type="submit" value="Save" class="btn btn-success">
				</form>

			<?php
		};
		} else {
			?>
			<h1>Sorry Your current password is wrong...</h1>
			<h3>Veuillez recommencer en vérifiant bien vos mots de passe</h3>
			<form action="user_manage.php" method="POST">
				<label>Current Password : <br><input type="password" name="cmdp"></label><br>
				<label>New Password : <br><input type="password" name="nmdp"></label><br>
				<label>Répétez votre password : <br><input type="password" name="rmdp"></label><br>
				<input type="submit" value="Save" class="btn btn-success">
			</form>
			<?php
		}
	}
	
	if(isset($_POST['email'])) {
		$email=$_POST['email'];
		$reponse = $bdd->query("SELECT password FROM user WHERE idUser='".$_SESSION['idUser']."'");
		$password = $reponse -> fetch(PDO::FETCH_OBJ) -> password;
		if($password == $_POST['mdp']) {
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
			?>
				<h1>Wrong Email Address !</h1>
				<h3>Please Enter an available Email Address: </h3>
				<form action="user_manage.php" method="POST">
					<label>Password : <br><input type="password" name="mdp"></label><br>
					<label>New Email : <br><input type="text" name="email"></label><br>
					<input type="submit" value="Save" class="btn btn-success">
				</form>
			
			<?php
			} else{
				$bdd->query("UPDATE user SET email='".$_POST['email']."' WHERE idUser='".$_SESSION['idUser']."'"); 
				?>

					<h1>Your email has been modified successfully !</h1>
					<h3>Votre page va être redirigée dans 1 secondes</h3>
					<script>
						setTimeout(function(){window.location = 'home.php';}, 1000);
					</script>

				<?php
			}
		} else {
			?>
			<h1>Sorry Your password is wrong...</h1>
			<h3>Veuillez recommencer en vérifiant bien vos mots de passe</h3>
			<form action="user_manage.php" method="POST">
				<label>Password : <br><input type="password" name="mdp"></label><br>
				<label>New Email : <br><input type="text" name="email"></label><br>
				<input type="submit" value="Save" class="btn btn-success">
			</form>
			<?php
		}
	}
	if(isset($_POST['confirm'])) {
		$reponse = $bdd->query("DELETE FROM user WHERE idUser='".$_SESSION['idUser']."'");	
	?>
		<script>
			window.location = 'deconnection.php';
		</script>
		
	<?php
	}
	
	if(isset($_POST['album_name']) and $_POST['album_name'] != "") {
		$bdd->query("UPDATE album SET name='".$_POST['album_name']."' WHERE idAlbum='".$_GET['idAlbum']."'");
	?>
	<script>
		window.location = 'edit_album.php';
	</script>
	<?php
	}

	if(isset($_POST['album_desc']) and $_POST['album_desc'] != "") {
		$bdd->query("UPDATE album SET description='".$_POST['album_desc']."' WHERE idAlbum='".$_GET['idAlbum']."'");
	?>
	<script>
		window.location = 'edit_album.php';
	</script>
	<?php
	}

	if(isset($_POST['pic_name']) and $_POST['pic_name'] != "") {
		$bdd->query("UPDATE picture SET name='".$_POST['pic_name']."' WHERE idPicture='".$_GET['idPicture']."'");
	?>
	<script>
		window.location = 'home.php';
	</script>
	<?php
	}

	if(isset($_POST['pic_desc']) and $_POST['pic_desc'] != "") {
		$bdd->query("UPDATE picture SET description='".$_POST['pic_desc']."' WHERE idPicture='".$_GET['idPicture']."'");
	?>
	<script>
		window.location = 'home.php';
	</script>
	<?php
	}

	
	?>	
	?>


