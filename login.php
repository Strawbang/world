<?php
 require_once('inc/manager-db.php');
 // on teste si nos variables sont définies et remplies
 if (isset($_POST['Login']) && isset($_POST['Password']) && !empty($_POST['Login'])&& !empty($_POST['Login'])) {
 // on appele la fonction getAuthentification en lui passant en paramètre le login et password
 //la fonction retourne les caractéristiques du salaries si il est connu sinon elle retourne false
 $result = getAuthentification($_POST['Login'],$_POST['Password']);
 print_r($result);
 // si le résulat n'est pas false
 if($result){
// on la démarre la session
session_start ();
// on enregistre les paramètres de notre visiteur comme variables de session
$_SESSION['Login'] = $result->Login;
$_SESSION['idLogin'] = $result->idLogin;
$_SESSION['Role'] = $result->Role;
// on redirige notre visiteur vers une page de notre section membre
header ('location: index.php');

 }
 //si le résultat est false on redirige vers la page d'authentification
 else{
 header ('location: authentification.php');
 }
 }

 //si nos variables ne sont pas renseignées on redirige vers la page d'authentification
 else {
 header ('location: authentification.php');
 }
 ?> 