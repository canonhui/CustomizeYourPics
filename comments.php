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
	<link rel = "stylesheet" type = "text/css" href = "style.css" />
	<script src="jquery-3.2.1.min.js"></script>
	<script src="myJS.js"></script>
	<script src="myJS.js"></script>
	
</head>

<body>
	<?php session_start(); include "connect.php"; include "navigator.php"; ?>
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
                
                <?php   if(isset($_SESSION['connected']) == 1){
				echo '
				<li class="active"><a href="home.php"> My Gallery  <span class="sr-only">(current)</span></a></li>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Albums <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="album.php">Create Album</a></li>
                        <li class="menuitem">
							<a href="#">Manage My Albums<span class="caret"></span></a>
							<div class="submenu">
								<a href="edit_album.php">Edit Album </a>
								<a href="delete_album.php">Delete Albums</a>
							</div>
						</li>
                    </ul>
                </li>
                <li><a href="upload.php">Photos Upload</a></li>
				
              </ul>
              <ul class="nav navbar-nav navbar-right">
			  
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>    '.$_SESSION['pseudo'].'</a>
				<ul class="dropdown-menu">
                        <li id="btnName_modify"><a>Modify User Name</a></li>
                        <li id="btnPassword_modify"><a>Modify Password</a></li>
						<li id="btnEmail_modify"><a>Modify Email</a></li>
						<li id="btnUnregister"><a><span class="glyphicon glyphicon-trash"></span> Unregister</a></li>
                </ul>
			</li>
              <li id="btnDeconnection"><a><span class="glyphicon glyphicon-off"></span> Déconnection</a></li>
                ';
				}
				else{
					echo '
					<li class="active"><a href="index.php">Welcome <span class="sr-only">(current)</span></a></li>
					<li id="btnInscription"><a><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li id="btnConnection"><a><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<script>
						setTimeout(function(){window.location="index.php"}, 0);
					</script>
					'; 
				} ?>
                
              </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        </div>
	

	<div class="jumbotron">
		<div id='container'>
			<?php

				$current_user = $_SESSION['idUser'];
				$idAlbum = $_GET['idAlbum'];
				$idPicture = $_GET['idPicture'];
				$query1 = $db -> query("SELECT p_slug, width, height, description FROM picture WHERE idPicture = $idPicture");
				$run = $query1 -> fetch(PDO::FETCH_OBJ);
				$p_slug = $run -> p_slug;
				$width = $run -> width;
				$height = $run -> height;
				$descPicture = $run -> description;
				$query2 = $db -> query("SELECT name, a_slug FROM album WHERE idAlbum = $idAlbum");
				$run = $query2 -> fetch(PDO::FETCH_OBJ);
				$name = $run -> name;
				$a_slug = $run -> a_slug;
				
			?>
			<div id="buttons">
					<a href='view.php?id=<?php echo $idAlbum; ?>'>
					<b>Back</b></a>
			</div>

		
			<div id="img_show_comm">
				<img src='uploads/<?php echo $current_user,"/", $a_slug, "/Main/", $p_slug ?>' />
			</div>

			<div id='container_comm'>
             <p><?php echo $descPicture ?></p>
            
            </div>
			<script type="text/javascript">
				var width = '<?php echo $width; ?>';
				var height = '<?php echo $height; ?>';
				if(width > height) {
					$('#img_show img').css("width","80%").css("height","auto");
				} else {
					$('#img_show img').css("width","auto").css("height","80%");
				}
				
			</script>
			<?php
				if(!$run) {
					echo '<b>' . $name . '</b><br/>';
				}
			?>
		
		
		<?php
			
		?>
		<div class='clear'></div>
		</div>
	</div>

	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>