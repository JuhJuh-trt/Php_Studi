<?php

// variables prédéfinies
$user = "utilisateur";
$pass = "mdp123";

  // Affichage du formulaire 

echo 
"<form method='POST'>
  <label>Nom d'utilisateur :</label>
  <input type='text' name='username'><br>
  <label>Mot de passe :</label>
  <input type='password' name='password'><br>
  <input type='submit' value='Se connecter'>
</form>";

if(isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Vérification des identifiants
  if($username === $user && $password === $pass) {
    header('location:page.php');
    echo "Bienvenue, $user !";
  } else {
    echo "Nom d'utilisateur ou mot de passe incorrect.";
  }
} ;

