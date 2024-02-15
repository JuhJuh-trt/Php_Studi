<!-- Les attaques XSS -->

strip_tags() permet de supprimer toutes les balises HTML et PHP potentiellement malveillantes.

<?php 
// Vérifie si le formulaire a été soumis en vérifiant si le bouton submit a été utilisé
if (isset($_POST['submit'])){
  // Récupère le nom du fichier en supprimant les balises HTML et PHP potentiellement dangereuses
  $file_name = strip_tags($_FILES['file']['name']);
  // Récupère la taille du fichier envoyé
  $file_size = $_FILES['file']['size'];
  // Récupère l'emplacement temporaire du fichier envoyé sur le serveur
  $file_tmp = $_FILES ['file']['tmp_name'];
  // Récupère le type MIME du fichier envoyé
  $file_type = $_FILES['file']['type'];
  // Sépare le nom de fichier et son extension
  $file_ext = explode('.', $file_name);
  // Récupère l'extension du fichier en transformant la chaîne en minuscule
  $file_end = end($file_ext); 
  $file_end = strtolower($file_end);
  // Définit la liste des extensions de fichiers autorisées
  $extensions  = [ 'doc', 'jpg', 'docx', 'xls'];
}
if(in_array($file_end, $extensions) === false) {
// Si l'extension du fichier n'est pas autorisée, on affiche un message d'erreur
    echo " Veuillez utiliser les extensions suivantes : DOC, JPG , DOCX , XLS";
}
// Si la taille du fichier dépasse la limite autorisée, on affiche un message d'erreur (unité = octets)
elseif($file_size > 300000) { 
    echo " le fichier est trop volumineux";
}
else {
// On nettoie le nom de fichier en supprimant les caractères spéciaux
    $file_end = preg_replace('/[^A-Za-z0-9.\-]/', '' ,$file_end);
// On déplace le fichier uploadé vers le répertoire "uploads" avec son nom d'origine
    move_uploaded_file($file_tmp, "uploads/".$file_name);
// On affiche un message de succès pour indiquer que le téléchargement a réussi
    echo " Le fichier ".$file_name." a été téléchargé avec succès";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Télécharger un fichier</title>
</head>
<body>
	<h1>Télécharger un fichier</h1>
	<form method="post" enctype="multipart/form-data"><!-- enctype déclare que l'on va télécharger un fichier -->
		<input type="file" name="file" required>
		<button type="submit" name="submit">Télécharger</button>
	</form>
</body>
</html>

<!-- Attaque CSRF et Hijacking -->

jetons CSRF = sont des chaînes aléatoires incluses dans les formulaires HTML et vérifiées par le serveur pour une attaque par fausse identification de cookies

<?php
session_start();
// On démarre la session et on vérifie si la méthode de requête est POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Si le jeton CSRF n'est pas présent ou s'il ne correspond pas au jeton stocké en session, on arrête le processus et affiche une erreur.
  if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('Erreur CSRF !');
  } else {
// Jeton CRSF defini ou celui-ci =
    echo "<br>";
    echo " Jeton CSRF transmis";      
    echo "<br>";
  }
}
// Génère un token aléatoire de 32 octets à partir de la fonction random_bytes() de PHP, puis le convertit en une chaîne hexadécimale et le stocke dans la variable de session 'csrf_token'.
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
// Connexion à la base de données
$host = 'localhost';
$username = 'admin';
$password = 'admin';
$dbname = 'faille';
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
  echo "Erreur : " . $e->getMessage();
}
// Vérification des informations d'identification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $stmt = $pdo->prepare('SELECT * FROM user WHERE username = ? AND password = ?');
  $stmt->execute([$username, $password]);
  $user = $stmt->fetch();
  if ($user) {
    // Authentification réussie
    $_SESSION['user_id'] = $user['id'];
    echo " Connexion réussie";
    var_dump( $_SESSION);   
    exit;
  } else {
    // Authentification échouée
    $error = 'Adresse e-mail ou mot de passe incorrect.';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Formulaire de connexion</title>
</head>
<body>
  <?php if (isset($error)) { ?>
    <p><?php echo $error; ?></p>
  <?php } ?>
  <form method="post">
    <input type="" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <label for="username">username</label>
    <input type="username" id="username" name="username" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Se connecter</button>
  </form>
</body>
</html>

<!-- Attaque de Hijacking -->

Le détournement de session (session hijacking) est une attaque où un attaquant intercepte la session d'un utilisateur authentifié et l'utilise pour accéder à l'application web.

<?php
session_start();
$session_id = session_id();
// Vérification de l'adresse ip de l'utilisateur
$_SESSION['ip_adresse'] = $_SERVER['REMOTE_ADDR'];
echo $_SESSION['ip_adresse']; // ::1 parce que local pour l'exemple
// apparement la vérification dans le if ne sert a rien, voir google : controle adresse ip php hijack
if(isset($_SESSION['ip_adresse']) AND  $_SESSION['ip_adresse'] !== $_SERVER['REMOTE_ADDR']) {
  session_unset();
  session_destroy();
  header('location:login.php'); // redirection vers la page de login si l'adresse ip de la session
}

// Vérification du navigateur de l'utilisateur
$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
if(isset($_SESSION['user_agent']) AND  $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
  session_unset();
  session_destroy();
  header('location:login.php'); // redirection vers la page de login si l'adresse ip de la session
}

// Regénératiion de l'id de session aprés 10s
if(isset($_SESSION['last_id']) AND time() - $_SESSION['last_id'] > 10) {
  session_regenerate_id(true);
  $_SESSION['last_id'] = time();
}
if(!isset($_SESSION['last_id'])) {
  $_SESSION['last_id'] = time();
}

// Connexion a la base de données
$host = 'localhost';
$username = 'admin';
$password = 'admin';
$dbname = 'faille';
$charset = 'utf8mb4';

$dsn = "msql:host=$host;dbname=$dbname;charset=$charset";
$option = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
try {
  $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//
$stmt = $pdo->prepare("SELECT data from sessions WHERE sessions_id = ?");
$stmt->execute([$session_id]);
$data = $stmt->fetch();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Télécharger un fichier</title>
</head>
<body>
	<h1>Télécharger un fichier</h1>
	<form method="post" enctype="multipart/form-data"><!-- enctype déclare que l'on va télécharger un fichier -->
		<input type="file" name="file" required>
		<button type="submit" name="submit">Télécharger</button>
	</form>
</body>
</html>