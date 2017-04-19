<?php require_once 'header.php'; ?>

<script type="text/javascript">
  $('.selectpicker[name=Continent]').selectpicker
  (
  {
    style: 'btn-info',
    size: 4
  }
  );

</script>
<?php
require_once 'inc/manager-db.php';

      // obtient le nom du continent à explorer
      // var_dump(getCountries($cont));

      // prend le premier pays de la liste
$cont = isset($_GET['c']) ? trim ($_GET['c']) : $_GET['Continent'];
$pays = getCountries($cont);
$continent = getContinent();
$group = getGroup();
session_start ();
 // On teste pour voir si nos variables de session ont bien été enregistrées

?>
<div class="container">
  <div class="starter-template">
    <h1>Geo World</h1>
  </div>
  <?php if($_SESSION['Role']=='Etudiant' || $_SESSION['Role']=='Enseignant'): ?>
    <div style='text-align:center;'>
      <table class="table">
        <tr>
          <th>
            Nom
          </th>
          <th>
            Chef etat
          </th>
          <?php if($_SESSION['Role']=='Enseignant'): ?>
            <th>
              Operations
            </th>
           <?php endif; ?> 
          </tr>
          <p> Séléctionnez votre continent !</p>
          <form role="form" method="get">
            <select class="selectpicker" name="Continent">
              <?php foreach ($continent as $conti): ?>
                <option value="<?php echo $conti->Continent ?>"<?php if($conti->Continent == $cont) echo "selected" ?>><?php echo $conti->Continent ?></option>
              <?php endforeach ?>
              <br>
              <input type="submit" value = "Valider"/>
            </select>
          </form>


          <tr>
            <?php foreach ($pays as $key): ?>
              <td>
                <?php echo $key->Name ?>
              </td>
              <td>
                <?php echo $key->HeadOfState ?>
              </td>
              <?php if($_SESSION['Role']=='Enseignant'): ?>
                <td>
                  <a href="modifier.php?id=<?php echo $key->id ?>">Modifier  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                </td>
              <?php endif; ?>
            </tr>
          <?php endforeach ?>
        <?php endif; ?>

      </table>
    </div>
    
    <?php if($_SESSION['Role']=='Admin'): ?>
      <div style='text-align:center;'>
        <table class="table">
          <tr>
            <th>
              Group
            </th>
            <th>
              Operations
            </th>
          </tr>

          <tr>
            <?php foreach ($group as $gp): ?>
              <td>
                <?php echo $gp->Role ?>
              </td>
              <td>
                <a href="group.php?idRole=<?php echo $gp->idRole ?>">Voir les utilisateurs  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a>
              </td>
            </tr>
           <?php endforeach ?>
        <?php endif; ?>

      </table>
    </div>


  </div>
  <!-- /.container -->
  <?php require_once 'footer.php'; ?>