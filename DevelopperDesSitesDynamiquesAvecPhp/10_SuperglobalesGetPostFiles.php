Elles sont au nombre de 9, et accesible depuis partout dans le code :

$GLOBALS
$_SERVER
$_GET
$_POST
$_FILES
$_COOKIE
$_SESSION
$_REQUEST
$_ENV

'name' dans un formulaire est la clé qui est cherché

$file_ext = strtolower(end(explode('.',$_FILES['image']['name']))); <!-- permet de recuperer l'extension du fichier 
comme .gif ou .exe -->

<!-- Methode GET -->

<?php

///https://example.com/search?q=query&lang=fr. //  PAGE WEB example.com
// Les paramètres de requête seront spécifiés en utilisant le symbole « ? ». La requête GET suivante récupèrera la page web index.html avec le paramètre de requête « id = 123 »

$_GET['id']; // requête pour récupérer l’ID de l’URL

 // Tableau associatif

$tableau = [
    "clé1" => "valeur1",
    "clé2" => "valeur2",
    "clé3" => "valeur3"
];
?>

<?php

if(isset($_GET['plat']) && !empty($_GET['plat'])) {
  $plat = $_GET['plat'];
} else {
  $plat = 'Plat non défini';
}
?>
<a href="?plat=pizza"> Plat 1 </a><br>
<a href="?plat=salade"> Plat 2 </a><br>
<?php
echo '<br>';
echo $plat;
echo '</br>';

?>

<?php
	// Vérifie si le paramètre "id" est présent dans l'URL
	if(isset($_GET['id'])) {
		// Vérifie si l'id afficher dans l'URL correspond à la valeur 1
		if($_GET['id'] === '1') {
			// Affiche la div 1
			echo '<div><p>Contenu de la div 1</p></div>';
		} if($_GET['id'] === '2')  {
			// Affiche la div 2
			echo '<div ><p>Contenu de la div 2</p></div>';
    } 
}

?>

<!-- Methode POST -->

<?php 

$pseudo = $_POST['pseudo'];
// SCRIPT PHP
?>
  <form action="form.php" method="POST">
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo">

    <label for="mot de passe">Mot de passe :</label>
    <input type="password" id="password" name="password"><br><br>

    <input type="submit" value="Envoyer">
  </form>
<?php
if (!empty($_POST) && $_POST['pseudo'] && $_POST('password')) {
  $password = $_POST['password'];
  if (strlen($password) <= 8) {
    echo "Le mot de passe est trop court ";
  } else {
    echo "Votre pseudo est $pseudo";
  }
}

?>

<?php

{ // Vérifie si les champs ont été soumis
  if (isset($_POST['pseudo']) && isset($_POST['password'])) 
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];
      // exemple de validation
    if (empty($pseudo) || empty($password)) {
      echo "Veuillez entrer un pseudo et un mot de passe";
    } else {
      echo "Bienvenue, $pseudo !";
    }
}

?> 

// exemple conditions supplémentaires

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire sécurisé</title>
</head>
<body>
  <h1>Formulaire sécurisé</h1>
  <pre>
    <form method="POST" action="secure_form.php">
      <label for="text">Adresse mail: </label>
      <input type="mail" name="email" required><br><br>
      <label for="password">Mot de passe :</label>
      <input type="password" name="password" required><br><br>
      <input type="submit" value="Se connecter">
    </form>
  </pre>
</body>
</html>
<?php
$email = $_POST['email'];
$password = $_POST['password'];
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Votre adresse mail est valide";
  echo "<br>";
  if (strlen($password) <= 7) {
    echo "Votre mot de passe doit faire minimun 7 caractères";
  } else {
    echo "Bienvenue".$email;
  }
} else {
  echo "Votre mail n'est pas valide";
}
?>

<!-- Methode FILES -->

$_FILES
  $_FILES['fichier']['name'] /* nom du fichier
  $_FILES['fichier']['type'] /* type du fichier
  $_FILES['fichier']['size'] /* taile en octets
  $_FILES['fichier']['tmp_name'] /* emplacement du fichier temporaire sur le serveur
  $_FILES['fichier']['error'] /* code erreur du téléchargement

  Il est important de noter que le formulaire HTML doit inclure l'attribut "enctype" avec la valeur "multipart/form-data" pour permettre l'envoi de fichiers.

  <br>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="image">Choisir une image :</label>
    <br>
    <input type="file" name="photo" id="image">
    <br>
    <button type="submit" name="submit">Envoyer</button>
  </form>
<?php
if(isset($_POST["submit"])) {
  // pour pouvoir recuperer les informations de notre image
  $image_name = $_FILES['image']['name']; // nom de l'image
  $image_tmp_name = $_FILES['image']['tmp_name']; // emplacement temporaire sur le serveur
  $image_error = $_FILES['image']['error']; // valeur d'erreur en booléen, 0 veut dire pas d'erreur

  if($image_error === 0) {
    // le téléchargement de notre fichier(image)
    $destination_finale = "uploads/".$image_name; // uploads est le nom du dossier ce qui donnera "uploads/1.png" par ex
    move_uploaded_file($image_tmp_name, $destination_finale);
    echo "Le téléchargement a bien été enregistré";
  } else {
    echo "Il y a eut une erreur pendant le téléchargement de notre image";
  }
}