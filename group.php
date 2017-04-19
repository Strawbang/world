<?php
require_once('inc/manager-db.php');
require_once('header.php');
$idRole = isset($_GET['i']) ? trim ($_GET['i']) : $_GET['idRole'];
$group = getGroupbyidRole($idRole)
?>
  <div style='text-align:center'>
    <table class="table">
      <tr>
        <th>
          Login
        </th>
        <th>
          Operations
        </th>
      </tr>
      <tr>
      <?php foreach ($group as $gp): ?>
        <td>
          <?php echo $gp->Login ?>
        </td>
        <td>
          <a href="modifierusers.php?idLogin=<?php echo $gp->idLogin ?>">Modifier  <span class="glyphicon glyphicon-leaf" aria-hidden="true"></span></a>
        </td>
      </tr>
      <?php endforeach ?>

    </table>
  </div>

<?php require_once('footer.php'); ?>