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
            <legend> CustomizeYourPics instructions ! </legend>
            <p>
            
            <div id="img_show">
            <img src='uploads/LogoCYP.jpg'/>

                </div>

                <ul>
                    <li>First of all, register on the web via the Sign Up button.</li><br>
                    <li>Create you first album with the Your album tab.</li><br>
                    <li>Thanks to the Upload tab, you can select an album and upload your pictures in it.</li><br>
                    <li>Go to my gallery to see your albums, your photos and apply filters on them !</li><br>
                    *If needed, you can customize you personal informations at any moment.
                </ul> </div>
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