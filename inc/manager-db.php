<?php
require_once ('connect-db.php');

/** Obtenir un tableau d'objets (pays) référencés d'un continent
    donné ou de la planète entière
*/

function getLifeExpectancy() {
  global $pdo;

  $query = 'SELECT AVG(LifeExpectancy), Continent as continent FROM Country  GROUP BY Continent ORDER BY AVG(LifeExpectancy) DESC; ';

   try {
  $result = $pdo->query($query)->fetch();
  return $result->continent ;
  }
 catch ( Exception $e ) {
 die ("erreur dans la requete ".$e->getMessage());
 }
}


function getSurfaceAreaByContinent() {
  global $pdo;

  $query = 'SELECT SUM(SurfaceArea), Continent as continent FROM Country  GROUP BY Continent ORDER BY SUM(SurfaceArea) DESC; ';

   try {
  $result = $pdo->query($query)->fetch();
  return $result->continent ;
  }
 catch ( Exception $e ) {
 die ("erreur dans la requete ".$e->getMessage());
 }
}


function getNbContinent () {
  global $pdo;

  $query = 'SELECT COUNT(DISTINCT Continent) as continent FROM Country; ';

   try {
  $result = $pdo->query($query)->fetch();
  return $result->continent ;
  }
 catch ( Exception $e ) {
 die ("erreur dans la requete ".$e->getMessage());
 }
}
function getNbPays() {
  global $pdo;

  $query = 'SELECT COUNT(Name) as continent FROM Country; ';

   try {
  $result = $pdo->query($query)->fetch();
  return $result->continent ;
  }
 catch ( Exception $e ) {
 die ("erreur dans la requete ".$e->getMessage());
 }
}

function getNbPaysByContinent() {
  global $pdo;

  $query = 'SELECT COUNT(Name), Continent as continent FROM Country  GROUP BY Continent ORDER BY COUNT(Name) DESC; ';

   try {
  $result = $pdo->query($query)->fetch();
  return $result->continent ;
  }
 catch ( Exception $e ) {
 die ("erreur dans la requete ".$e->getMessage());
 }
}

function getPopMax() {
  global $pdo;

  $query = 'SELECT SUM(Population), Continent as continent FROM Country  GROUP BY Continent ORDER BY SUM(Population) DESC; ';

   try {
  $result = $pdo->query($query)->fetch();
  return $result->continent ;
  }
 catch ( Exception $e ) {
 die ("erreur dans la requete ".$e->getMessage());
 }
}

function getCountries($continent = null) {
   // pour utilisater la variable globale dans la fonction
   global $pdo;
   if (!$continent) :
     $query = 'SELECT * FROM Country;';
     return $pdo->query($query)->fetchAll();
   else :
     $query = 'SELECT * FROM Country WHERE Continent = :continent;';
     $prep = $pdo->prepare($query);
     $prep->bindValue(':continent', $continent, PDO::PARAM_STR);
     $prep->execute();
     // var_dump($prep);
     // var_dump($continent);
     return $prep->fetchAll();
   endif;
}


function getPaysById($idPays)
{
  global $pdo;
  $query =
    'SELECT * FROM Country WHERE  Country.id = :idpays';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':idpays', $idPays, PDO::PARAM_INT);
  $prep->execute();
  $obj = $prep->fetch();
  return $obj;
}

function updatePaysInDB($pays)
{
  global $pdo;
  $query =
    'UPDATE Country
     set HeadOfState = :hostate
     SurfaceArea = :surface
     Population = :population
     WHERE  Country.id = :idpays';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':idpays', $pays->id, PDO::PARAM_INT);
  $prep->bindValue(':hostate', $pays->HeadOfState, PDO::PARAM_STR);
  $prep->execute();

  return true;
}

function getCapitaleName($idPays)
{
   // pour utilisater la variable globale dans la fonction
   global $pdo;
   $query =
     'SELECT City.Name FROM City
      JOIN Country ON City.id = Country.Capital
      WHERE  Country.id = :idpays';
   $prep = $pdo->prepare($query);
   $prep->bindValue(':idpays', $idPays, PDO::PARAM_INT);
   $prep->execute();
   $obj = $prep->fetch();
   if ($obj) {
     return $obj->Name;
   } else {
     return "N/A";
   }
}

function getContinent()
  {
    global $pdo;
    $query = 'SELECT Continent FROM Country GROUP BY Continent';
    $prep = $pdo->prepare($query);
    $prep->execute();

    try
    {
      $result = $pdo->query($query)->fetchAll();
      return $result;
      //header('Location: http://http://192.168.56.2/index.php/')
    }

    catch ( Exception $e )
    {
      die ("erreur dans la requete ".$e->getMessage());
    }

  }

function getAuthentification($login,$pass)
{
  global $pdo;

  $query = "SELECT * FROM Login where Login=:login and Password=:pass";

  $prep = $pdo->prepare($query);
  $prep->bindValue(':login', $login);
  $prep->bindValue(':pass', $pass);
  $prep->execute();
      $result = $prep->fetch();
    return $result;
  // on vérifie que la requête ne retourne qu'une seule ligne
  
  //if($prep->rowCount() == 1)
  {
   // $result = $prep->fetch();
    //return $result;
  }
  
  //else
  {
    //return false;
  }
}

function getLanguagebyPays()
{
  global $pdo;

  $query = "SELECT Country.Name, Language.Name FROM Country, CountryLanguage, Language WHERE Country.id = CountryLanguage.idCountry AND CountryLanguage.idLanguage = Language.id";
  $prep = $pdo->prepare($query);
  $prep->execute();

      try
    {
      $result = $pdo->query($query)->fetchAll();
      return $result;
      //header('Location: http://http://192.168.56.2/index.php/')
    }

    catch ( Exception $e )
    {
      die ("erreur dans la requete ".$e->getMessage());
    }
}

function getGroup()
{
  global $pdo;

  $query = "SELECT * FROM Login GROUP BY Role;";
  $prep = $pdo->prepare($query);
  $prep->execute();

      try
    {
      $result = $pdo->query($query)->fetchAll();
      return $result;
      //header('Location: http://http://192.168.56.2/index.php/')
    }

    catch ( Exception $e )
    {
      die ("erreur dans la requete ".$e->getMessage());
    }
}

function getGroupbyidRole($idRole = null)
{
  global $pdo;
   if (!$idRole) :
     $query = 'SELECT * FROM Login;';
     return $pdo->query($query)->fetchAll();
   else :
     $query = 'SELECT * FROM Login WHERE idRole = :idRole;';
     $prep = $pdo->prepare($query);
     $prep->bindValue(':idRole', $idRole, PDO::PARAM_STR);
     $prep->execute();
     return $prep->fetchAll();
   endif;
}

function getLoginById($idLogin)
{
  global $pdo;
  $query =
    'SELECT * FROM Login WHERE idLogin = :idLogin';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':idLogin', $idLogin, PDO::PARAM_INT);
  $prep->execute();
  $result = $prep->fetch();
  return $result;
}

function updateLoginInDB($login)
{
  global $pdo;
  $query =
    'UPDATE Login
     set Login = :Login
     WHERE  idLogin = :idLogin';
  $prep = $pdo->prepare($query);
  $prep->bindValue(':idLogin', $login->idLogin, PDO::PARAM_INT);
  $prep->bindValue(':Login', $login->Login, PDO::PARAM_STR);
  $prep->execute();

  return true;
}

function getRequete()
{
  $query = $requete;
  $prep = $pdo->prepare($query);
  $prep->execute();
  return $result;
}
