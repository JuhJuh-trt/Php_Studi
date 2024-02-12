<?php

var_dump($_SERVER) ;

// Récupérer le nom du script en cours d'exécution :
$server_name_script = $_SERVER['SCRIPT_NAME'];
echo "Votre nom de script : " . $server_name_script;
echo "<br>";

// Récupérer l'URI de la requête :
$server_uri = $_SERVER['REQUEST_URI'];
echo "L'URI du serveur est : " . $server_uri;
echo "<br>";

// Récupérer la méthode HTTP utilisée pour la requête :
$server_method = $_SERVER['REQUEST_METHOD'];
echo "LA méthode utilisée est : " . $server_method;
echo "<br>";

// Récupérer le nom de l'hôte :
$server_name = $_SERVER['SERVER_NAME'];
echo "Le nom de l'hôte est  : " . $server_name; // Corrigé ici
echo "<br>";

// Récupérer le numéro de port du serveur :
$server_port = $_SERVER['SERVER_PORT'];
echo "Le numéro de port est : " . $server_port;
echo "<br>";

// Récupérer le nom du serveur :
$server_soft = $_SERVER['SERVER_SOFTWARE'];
echo "Le nom du serveur est : " . $server_soft;
echo "<br>";

// Récupérer l'adresse du script en cours d'execution;
$server_self = $_SERVER['PHP_SELF'];
echo "L'adresse du script actuel est : ". $server_self;
echo "<br>"

/*
'SERVER_NAME' => string // Nom de l'hôte sur lequel le script est exécuté
'SERVER_ADDR' => string '::1' (length=3) // Adresse du serveur hôte
'SERVER_PORT' => string '80' (length=2) // port du serveur
'REMOTE_ADDR' => string '::1' (length=3) // Adresse IP du serveur
'DOCUMENT_ROOT' => string 'C:/wamp64/www' (length=13) // chemin du répertoire racine
'REQUEST_SCHEME' => string 'http' (length=4) // Le schéma fait référence à la méthode utilisée pour accéder à une ressource web, généralement "http" ou "https"
'SERVER_ADMIN' => string 'wampserver@wampserver.invalid' (length=29) // administrateur du serveur
'SERVER_PROTOCOL' => string 'HTTP/1.1' (length=8) // protocole du serveur
'REQUEST_METHOD' => string 'GET' (length=3) // méthode du script exécute
'REQUEST_URI' => string '/superglobales/server/intro.php' (length=31) // URI utilisé pour accéder au script
'SCRIPT_NAME' => string '/superglobales/server/intro.php' (length=31) // nom du script php
'PHP_SELF' => string '/superglobales/server/intro.php' (length=31) // nom du script en cours d'execution
'REQUEST_TIME_FLOAT' => float 1678464091.2589  // temps de réponse de la requête en nombre a virgule
'REQUEST_TIME' => int 1678464091 // temps de réponse de la requête en nombre entier
*/
?>


<?php
// Initialisation de la session
session_start();
// Stocker une valeur dans la session
$_SESSION['username'] = 'JohnDoe';

// Afficher quelques informations sur le serveur
echo 'Nom du serveur : ' . $_SERVER['SERVER_NAME'] . '<br>';
echo 'Adresse IP du client : ' . $_SERVER['REMOTE_ADDR'] . '<br>';
echo 'Méthode de la requête HTTP : ' . $_SERVER['REQUEST_METHOD'] . '<br>';
// Afficher une variable d'environnement (peut ne pas être définie sur tous les serveurs)
if (isset($_ENV['PATH'])) {
    echo 'Chemin d\'accès aux exécutables : ' . $_ENV['PATH'] . '<br>';
}
?>


<!-- Exemple 1 -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
</head>
<body>
  <pre>
    <h1>Connexion</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <label for="nom_utilisateur">Nom d'utilisateur :</label>
      <input type="text" id="nom_utilisateur" name="nom_utilisateur"><br><br>
      <label for="mot_de_passe">Mot de passe :</label>
      <input type="password" id="mot_de_passe" name="mot_de_passe"><br><br>
      <button type="submit" name="submit">Se connecter</button>
    </form>
  </pre>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  echo "<br>";
  echo "La requete est de type ".$server_method;
}
echo "<br>";
$server_root = $_SERVER['SystemRoot'];
echo $server_root;
$server_root_2 = str_replace('C:\\', "",$server_root);
echo "<br>";
echo "Le systeme est ".$server_root_2;
$server_protocol = $_SERVER['SERVER_PROTOCOL'];
if ($server_protocol === 'HTTPS') {
  echo "Ce site web est sécurisé avec le protocole HTTPS";
} else {
  echo "Ce site web n'est pas sécurisé";
}
?>

<!-- Exemple 2 -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<pre>
    <h1>Connexion</h1>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <label for="ID">ID :</label>
      <input type="text" id="id" name="id"><br><br>
      <button type="submit">Rechercher</button>
    </form>
  </pre>
</body>
</html>

<?php
// tableau associatif qui contient 2 produits 
$produits = [
  ['id' => 1, 'description' => ' Produit 1'],
  ['id' => 2, 'description' => ' Produit 2']
];
$produitnull = false;
if($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
  $idproduit = $_GET['id'];
  foreach ($produits as $produit) {
    if ($produit['id'] == $idproduit) { 
      echo " La description du produit : " .$produit['description'];
      $produitnull = true;	
    }
  }
  if(!$produitnull) { 
    echo " Produit non trouvé avec l'id ".$idproduit;
  }
}
?>

!$produitnull : Cette variable est utilisée pour déterminer si un produit avec un identifiant spécifique a été trouvé ou non. Si aucun produit correspondant n'a été trouvé ($produitnull est toujours false), un message d'erreur est affiché pour indiquer que le produit n'a pas été trouvé avec l'identifiant spécifié.

<!-- $_SESSION -->

<?php
// démarrer une session
session_start();

// stocker une valeur dans la superglobale $_SESSION
$_SESSION['username'] = 'JohnDoe';

// récupérer la valeur de la superglobale $_SESSION
$nom_utilisateur = $_SESSION['username'];

// Pour accéder aux données stockées dans $_SESSION
echo $nom_utilisateur; // Affiche 'JohnDoe'

unset($_SESSION['username']); // Supprime la clé 'username' et sa valeur associée

session_destroy(); // Pour détruire complètement une session et supprimer toutes les données associées
?>


// Exemple connection

<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de connexion</title>
</head>
<body>
	<h1>Connexion</h1>
	<form method="POST" action="">
		<label for="username">Nom d'utilisateur:</label>
		<input type="text" name="username" id="username"><br>
		<label for="password">Mot de passe:</label>
		<input type="password" name="password" id="password"><br>
		<input type="submit" value="Se connecter">
	</form>

  <?php 
if($_SERVER['REQUEST_METHOD'] === "POST") {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $username  = $_POST['username'];
        $password  = $_POST['password'];
        if ( $username === 'admin' AND $password == 'admin' ) {
            //Initialisation de notre session en tant qu'administrateur 
            $_SESSION['admin'] = true;
            $_SESSION['username'] = $username;
            // redirection 
            echo "Bienvenue à toi, $username";
        } else if ( $username === 'user' AND $password == 'user' ) {
            //Initialisation de notre session en tant qu'utilisateur
            $_SESSION['admin'] = false;
            $_SESSION['username'] = $username;
            // création du cookie utilisateur
            echo "Bienvenue à toi, $username";
        } else {
            echo "<p>Nom d'utilisateur ou mot de passe incorrect.</p>";
        }
    }
}
?>
</body>
</html>