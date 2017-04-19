<!DOCTYPE html>
<?php
require_once 'inc/manager-db.php';
session_start ();

?>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>Applicaton Géopolitique</title>

  <!-- Bootstrap core CSS -->
  <link href="bootstrap335/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/custom.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>

      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Geo World</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home <span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
              <?php if($_SESSION['Role']=='Etudiant'): ?>
                <li><a href="statistiques.php">Statistiques <span class="glyphicon glyphicon-stats" aria-hidden="true"></span></a></li>
              <?php endif; ?>
              <li><a href="requete.php">Requete SQL <span class="glyphicon glyphicon-stats" aria-hidden="true"></span></a></li>
              <li><a href="archive.php">Archive requete SQL <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['Role'])) : ?>
               <li> <a href=""><?php echo $_SESSION['Login']." [".$_SESSION['Role']."]"?> <span class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                <?php else : ?>
                <?php header ('location: authentification.php'); ?>
                <?php endif ?>
              <li><a href="logout.php">Déconnexion <span class="glyphicon glyphicon-remove" aria-hidden="true"></a></li>
            </ul>   
          </div><!--/.nav-collapse -->
        </div>
      </nav>