<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		
		<section id="inscription">
			<div class="fond">
				<div class="UI">
					<form action="inscription.php" method="POST">
						<label>Login : <br><input type="text" name="pseudo"></label><br>
						<label>Password : <br><input type="password" name="mdp"></label><br>
						<label>Répétez votre password : <br><input type="password" name="rmdp"></label><br>
						<label>Email :  <br><input type="text" name="email"></label><br>
						<input type="submit" value="Se connecter" class="btn btn-success">
					</form>
				</div>
			</div>
		</section>
		<section id="connection">
			<div class="fond">
				<div class="UI">
					<form action="connection.php" method="POST">
						<label>Login : <br><input type="text" name="pseudo"></label><br>
						<label>Password : <br><input type="password" name="mdp"></label><br>
						<input type="submit" value="Se connecter" class="btn btn-success">
					</form>
				</div>
			</div>
		</section>
		
		<section id="name_modify">
			<div class="fond">
				<div class="UI">
					<form action="user_manage.php" method="POST">
						<label>Enter New Name : <br><input type="text" name="pseudo"></label><br>
						<input type="submit" value="Save" class="btn btn-success">
					</form>
				</div>
			</div>
		</section>
		
		<section id="password_modify">
			<div class="fond">
				<div class="UI">
					<form action="user_manage.php" method="POST">
						<label>Current Password : <br><input type="password" name="cmdp"></label><br>
						<label>New Password : <br><input type="password" name="nmdp"></label><br>
						<label>Répétez votre password : <br><input type="password" name="rmdp"></label><br>
						<input type="submit" value="Save" class="btn btn-success">
					</form>
				</div>
			</div>
		</section>
		
		<section id="email_modify">
			<div class="fond">
				<div class="UI">
					<form action="user_manage.php" method="POST">
						<label>Password : <br><input type="password" name="mdp"></label><br>
						<label>New Email : <br><input type="text" name="email"></label><br>
						<input type="submit" value="Save" class="btn btn-success">
					</form>
				</div>
			</div>
		</section>
		
		<section id="unregister">
			<div class="fond">
				<div class="UI">
					<form action="user_manage.php" method="POST">
						<p>Are you sure you want to unregister the account ? </p>
						<p>Once unregistered, all data will be deleted ! </p>
						<input type="submit" value="Confirm" name="confirm" class="btn btn-success">
					</form>
				</div>
			</div>
		</section>
		
		<section id="edit_album">
			<div class="fond">
				<div class="UI">
					<form action="user_manage.php" method="POST">
						<label>Name : <br><input type="text" name="album_name" class="album_name"></label><br>
						<label>Description : <br><textarea name="album_desc" placeholder="Type description here"></textarea><br>
						<input type="submit" value="Save" class="btn btn-success">
					</form>
					
				</div>
			</div>
		</section>

		<section id="edit_pic_info">
			<div class="fond">
				<div class="UI">
					<form action="user_manage.php" method="POST">
						<label>Name : <br><input type="text" name="pic_name" class="pic_name"></label><br>
						<label>Description : <br><textarea name="pic_desc" placeholder="Type comment here"></textarea><br>
						<input type="submit" value="Save" class="btn btn-success">
					</form>
				</div>
			</div>
		</section>
		
        <script type="text/javascript" src="js/script.js"></script>
	</body>

</html>