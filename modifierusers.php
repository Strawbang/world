<?php
require_once('inc/manager-db.php');

if ($_POST) {
  $idLogin = (isset($_POST['idLogin'])) ? trim($_POST['idLogin']) : null;
  $login = getLoginById($idLogin);
  if (!$login) {
    echo "Login introuvable !";
    exit();
  }
  //$pays = new stdClass();
  $login->Login = $_POST['Login'];
  updateLoginInDB($login);
  header('Location: index.php');
  exit(0);

} else {
  $idLogin = (isset($_GET['idLogin'])) ? trim($_GET['idLogin']) : null;
  $login = getLoginById($idLogin);
  if (!$login) {
    echo "Login introuvable !";
    exit();
  }
}

require_once('header.php');
?>
<form class="form" action="modifierusers.php" method="post">
  <input type="hidden" name="id" value="<?php echo $login->idLogin ?>">
  Login : <input type="text" name="Login" value="<?php echo $login->Login ?>">
  <br>
  Password : <input type="text" name="Password" value="<?php echo $login->Password ?>">
  <br>
  Role : <input type="text" name="Role" value="<?php echo $login->Role ?>">
  <br>
  <input type="submit" name="modifier" value="modifier">

</form>
<?php require_once('footer.php'); ?>
