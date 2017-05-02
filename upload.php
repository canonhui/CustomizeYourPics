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
	<?php session_start(); include "config.php"; ?>
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
				<li ><a href="home.php"> My Gallery  </span></a></li>
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
                <li class="active"><a href="upload.php">Photos Upload <span class="sr-only">(current)</a></li>
				
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
            <div id="container">
			<form enctype='multipart/form-data' method='post'>
                <legend>Upload photo</legend>
				<?php
					$idUser=$_SESSION['idUser'];
					if(isset($_POST['name'])) {
						$name = $_POST['name'];
						$album_id = $_POST['album'];
						$file = $_FILES['file']['name'];
						$file_type = $_FILES['file']['type'];
						$file_size = $_FILES['file']['size'];
						$file_tmp = $_FILES['file']['tmp_name'];
						echo $file_tmp;
						$pic_info = getimagesize($file_tmp);
						$random_name = rand();
						$p_slug = $random_name . '.' . substr($pic_info['mime'], 6);
						date_default_timezone_set("Europe/Paris");
						$date_import = date("Y-m-d h:i:s");
						if(empty($name) or empty($file)) {
							echo "Please Fill All the Fields! <br/>";
						} else {
                            /*
                            $query = $bdd -> query("SELECT a_slug FROM album where idAlbum = $album_id");
							$a_slug = $query -> fetch(PDO::FETCH_OBJ) -> a_slug;
                            
                            $bdd->query("INSERT INTO `picture`(`name`, `p_slug`, `size`, `width`, `height`, `public`, `idAlbum`) VALUES ('".$name."','".$p_slug."','".$file_size."','".$pic_info[0]."','".$pic_info[1]."','1','".$album_id."')"); 
                            
                            move_uploaded_file($file_tmp, 'uploads/' . $a_slug . '/' . $p_slug);
                            */
							$insert = $bdd -> prepare("INSERT INTO picture VALUES(
								'', :name, :description, :p_slug, :size, :width, :height, :date_import, :public, :idAlbum, :notModifYet)");
							//$db -> query("SELECT idPicture FROM picture");
							$query = $bdd -> query("SELECT a_slug FROM album where idAlbum = $album_id");
							$a_slug = $query -> fetch(PDO::FETCH_OBJ) -> a_slug;
							try {
								$success = $insert -> execute(array(
									//'idPicture' => '1',
									'name' => $name,
									'p_slug' => $p_slug,
									'description' => NULL,
									'size' => $file_size,
									'width' => $pic_info[0],
									'height' => $pic_info[1],
									'date_import' => $date_import,
									'public' => '1',
									'idAlbum' => $album_id,
									'notModifYet' => True,));
								if($success) {
									move_uploaded_file($file_tmp, 'uploads/' . $idUser . '/' . $a_slug . '/Originals/' . $p_slug);
									copy("uploads/$idUser/$a_slug/Originals/$p_slug", "uploads/$idUser/$a_slug/Main/$p_slug");
								} else {
									echo "Failed to insert picture!<br/>";
								}
							} catch(Exception $e) {
								echo "Failed to insert picture: ", $e -> getMessage();
							}
                            
						}
					}
				?>
				
				<div class="form-group">
                <label for="exampleInputEmail1">Photo name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name='name'>
                <small id="emailHelp" class="form-text text-muted">Enter the name you want for your photo.</small>
              </div>
              <div class="form-group">
                <label for="exampleSelect1">Select your album</label>
                <select class="form-control" id="exampleSelect1" name='album'>
                 <?php
						$query = $bdd -> query("SELECT idAlbum, name FROM album WHERE idUser = $idUser");
						while($run = $query -> fetch(PDO::FETCH_OBJ)) {
							$album_id = $run -> idAlbum;
							$album_name = $run -> name;
							echo "<option value='$album_id'>$album_name</option>";
						}
					?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name='file'>
                <small id="fileHelp" class="form-text text-muted">Chose from your computer the photo you want to upload.</small>
              </div>
              <fieldset class="form-group">
                <legend>Photo properties</legend>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Photo is public
                  </label>
                </div>
                <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                    Photo is private
                  </label>
                </div>
              </fieldset>
              <button type="submit" class="btn btn-primary" name='upload' value='Upload'>Upload</button>
            </form>
        <script type="text/javascript" src="js/script.js"></script>
       
	</body>
</html>