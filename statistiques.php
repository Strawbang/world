<?php
require_once 'header.php';
require_once 'inc/manager-db.php';
$surfaceArea = getSurfaceAreaByContinent();
$nbContinent = getNbContinent();
$nbPays = getNbPays();
$PaysByContinent = getNbPaysByContinent();
$PopMax = getPopMax();
$Esperance = getLifeExpectancy();
session_start ();
?>
<div class="container">
	<div class="starter-template">
		<h1>Statistiques Geo World</h1>
	</div>

	<p>Nombre de continents : <?php echo $nbContinent; ?></p>
	<p>Nombre de pays : <?php echo $nbPays; ?></p>
	<p>Le continent avec le plus de pays : <?php echo $PaysByContinent; ?></p>
	<p>Le continent avec le plus de population : <?php echo $PopMax; ?></p>
	<p>Le continent avec le plus de superficie : <?php echo $surfaceArea; ?></p>
	<p>Le continent avec le plus d'esperance de vie : <?php echo $Esperance; ?></p>

	<?php require_once 'footer.php'; ?>