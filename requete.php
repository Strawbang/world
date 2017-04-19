<?php require_once 'header.php'; ?>
<?php require_once 'inc/manager-db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Requete SQL</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Connexion à mon application">
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
	<!-- ci-dessous notre fichier CSS -->
	<link rel="stylesheet" type="text/css" href="/css/app.css" />
	<link rel="stylesheet" type="text/css" href="/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,300" />
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
	<script type="text/javascript">
		$(function(){
			$('#requete').datepicker({
				inline: true,
				showOtherMonths: true,
				changeMonth: true,
				changeYear: true,
                                yearRange: "-100:+0",
				maxDate: '0',
				dateFormat: 'yy-mm-dd',
				dayNamesMin: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                                monthNames: ['Janvier','F&eacute;vrier','Mars','Avril','Mai','Juin',
        'Juillet','Ao&ucirc;t','Septembre','Octobre','Novembre','D&eacute;cembre'],

   				minDate: '-100Y',
				
			});
		});
	</script>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">

				<div class="main">

					<div class="row">
						<div class="col-xs-12 col-sm-6 col-sm-offset-1">

							<h1>Requete SQL</h1>

							<form action="login.php" role="form" class="form-horizontal" method="post">
								<div class="form-group">
									<div class="col-md-8"><input name="Requete" placeholder="Votre requete SQL" class="form-control" type="text"/></div>
								</div>
								<div class="form-group">
									<div class="col-md-8"><input name="Name" placeholder="Votre nom de requete" class="form-control" type="text"/></div>
								</div>  
								<div class="form-group">
									<div class="col-md-8"><input name="Name" placeholder="La date" class="form-control" type="date" id="requete"/></div>
								</div>  
								<div class="form-group">
									<div class="col-md-offset-0 col-md-8"><input  class="btn btn-success btn btn-success" type="submit" value="Accepter"/></div>
								</div>

							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</body>
<?php require_once 'footer.php'; ?>