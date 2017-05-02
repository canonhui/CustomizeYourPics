<!doctype html>
<?php session_start(); include 'config.php'; ?>
<html>
	<head>
		<title>CustomizeYourPics</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0">
       
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


        <link rel="stylesheet" href="css/style.css">
	</head>

	<body>
        <div id="barreNavigation">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">CustomizeYourPics</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                
                <!-- <li><a href="album.php">Albums</a></li> -->
                <?php   if(isset($_SESSION['connected']) == 1){
				echo '
				<li class="active"><a href="home.php"> My Gallery  <span class="sr-only">(current)</span></a></li>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Albums <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="album.php">Create Album</a></li>
                        <li><a href="viewAlbum.php">Manage my albums</a></li>
                    </ul>
                </li>
                <li><a href="upload.php">Photos Upload</a></li>
				
              </ul>
              <ul class="nav navbar-nav navbar-right">
			  <li id=""><a><span class="glyphicon glyphicon-user"></span>    '.$_SESSION['pseudo'].'</a></li>
              <li id="btnDeconnection"><a><span class="glyphicon glyphicon-off"></span> Déconnection</a></li>
                ';
				}
				else{
					echo '
					<li class="active"><a href="index.php">Welcome <span class="sr-only">(current)</span></a></li>
					<li id="btnInscription"><a><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a id="btnConnection"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					'; 
				} ?>
                
              </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        </div>
        <div class="jumbotron">
            <div class="container">
             <p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
            </div>
        </div>

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

        <script type="text/javascript" src="js/script.js"></script>
	</body>
</html>