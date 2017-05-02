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
</head>

<body>
	<?php session_start(); include "connect.php"; include "instagraph.php"; ?>
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
		<?php
			$idAlbum = $_GET['idAlbum'];
			$idPicture = $_GET['idPicture'];
			$current_user = $_SESSION['idUser'];
			$query1 = $db -> query("SELECT a_slug FROM album WHERE idAlbum = $idAlbum");
			$a_slug = $query1 -> fetch(PDO::FETCH_OBJ) -> a_slug;
			$query2 = $db -> query("SELECT name, p_slug, notModifYet FROM picture WHERE idPicture = $idPicture");
			$run = $query2 -> fetch(PDO::FETCH_OBJ);
			$name = $run -> name;
			$p_slug = $run -> p_slug;
			$bool = $run -> notModifYet;
			
			if(isset($_GET['filter'])) {
				try {
					$instagraph = Instagraph::factory("uploads/$current_user/$a_slug/Main/$p_slug", "tmp/$p_slug");
				}
				catch(Exception $e) {
					echo $e->getMessage();
					die;
				}
				
				$method = $_GET['filter'];
				$instagraph->$method();

				// foreach(array('gotham', 'toaster', 'nashville', 'lomo', 'kelvin') as $method)
				// {
				//     $instagraph->_output = $method.'.jpg'; // we have to change output file to prevent overwrite
				//     $instagraph->$method(); // apply current filter (from array)
				// }

			}
			
		?>
		<div id="buttons">
			<a href='view.php?id=<?php echo $idAlbum; ?>'>
			<b>Back</b></a>
			<a href='filters.php?idAlbum=<?php echo $idAlbum; ?>&idPicture=<?php echo $idPicture; ?>&apply=<?php echo true; ?>'>
			<b id="OK">Save</b></a>
			<a href='filters.php?idAlbum=<?php echo $idAlbum; ?>&idPicture=<?php echo $idPicture; ?>&original=<?php echo true; ?>'>
			<b id="orig">Original</b></a>
			
		</div>
		
		
		<div id="filter_bar">
			<a href="filters.php?idAlbum=<?php echo $idAlbum; ?>&idPicture=<?php echo $idPicture; ?>&filter=<?php echo 'gotham'; ?>">gotham</a>
			<a href="filters.php?idAlbum=<?php echo $idAlbum; ?>&idPicture=<?php echo $idPicture; ?>&filter=<?php echo 'toaster'; ?>">toaster</a>
			<a href="filters.php?idAlbum=<?php echo $idAlbum; ?>&idPicture=<?php echo $idPicture; ?>&filter=<?php echo 'nashville'; ?>">nashville</a>
			<a href="filters.php?idAlbum=<?php echo $idAlbum; ?>&idPicture=<?php echo $idPicture; ?>&filter=<?php echo 'lomo'; ?>">lomo</a>
			<a href="filters.php?idAlbum=<?php echo $idAlbum; ?>&idPicture=<?php echo $idPicture; ?>&filter=<?php echo 'kelvin'; ?>">kelvin</a>
			<?php include "navigator.php"; ?>
		</div>
		
		<div id="img_show">
			<?php
				if(!isset($_GET['filter'])) {
			?>
			<img src='uploads/<?php echo $current_user,"/", $a_slug, "/Main/", $p_slug ?>' />
			<?php
				} else{
			?>
			<img src='tmp/<?php echo $p_slug ?>' />
				
		</div>
		
		<?php
				}
			if(isset($_GET['original'])) {
				if(file_exists("uploads/$current_user/$a_slug/Originals/$p_slug")) {
					$copy = copy("uploads/$current_user/$a_slug/Originals/$p_slug", "uploads/$current_user/$a_slug/Main/$p_slug");
					if($copy) {
						unlink("tmp/$p_slug");
					}
				}
			}
			if(!$run) {
				echo '<b>' . $name . '</b><br/>';
			}
			
		?>

		<?php
			if(isset($_GET['apply'])) {
				if(file_exists("tmp/$p_slug")) {
					if($bool != False){
								$update = $bdd -> prepare("UPDATE picture SET notModifYet = False where idPicture = $idPicture");
								$success = $update -> execute();
								
					}
			
					$copy = copy("tmp/$p_slug", "uploads/$current_user/$a_slug/Modified/$p_slug");
					if($copy) {
						$copy1 = copy("tmp/$p_slug", "uploads/$current_user/$a_slug/Main/$p_slug");
						if($copy1) {
							unlink("tmp/$p_slug");
						}	
					}
				}
			}
			if(!$run) {
				echo '<b>' . $name . '</b><br/>';
			}
			
		?>
		
		
		<?php
			
		?>
		</form>
		<div class='clear'></div>

		
		
</body>
</html>
