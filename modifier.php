<?php
require_once('inc/manager-db.php');
if ($_POST) {
  $idPays = (isset($_POST['id'])) ? trim($_POST['id']) : null;
  $pays = getPaysById($idPays);
  if (!$pays) {
    echo "Pays introuvable !";
    exit();
  }
  //$pays = new stdClass();
  $pays->HeadOfState = $_POST['HeadOfState'];
  updatePaysInDB($pays);
  header('Location: index.php');
  exit(0);

} else {
  $idPays = (isset($_GET['id'])) ? trim($_GET['id']) : null;
  $pays = getPaysById($idPays);
  if (!$pays) {
    echo "Pays introuvable !";
    exit();
  }
}
require_once('header.php');
?>
<form class="form" action="modifier.php" method="post">
  <input type="hidden" name="id" value="<?php echo $pays->id ?>">
  Chef de l'Etat : <input type="text" name="HeadOfState" value="<?php echo $pays->HeadOfState ?>">
  <br>
  Superficie total : <input type="text" name="SurfaceArea" value="<?php echo $pays->SurfaceArea ?>">
  <br>
  Population total : <input type="text" name="Population" value="<?php echo $pays->Population ?>">
  <br>
  <input type="submit" name="modifier" value="modifier">

</form>
<?php require_once('footer.php'); ?>
