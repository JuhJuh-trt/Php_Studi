<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
</head>
<body>
<pre>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password"><br><br>
    <button type="submit" name="submit">Se connecter</button>
  </form>
</pre>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['username'];
  if ($username === 'super' && $password === 'super') {
    // initialisation de notre session en tant que superadministrateur
    $_SESSION['role'] = 'super';
    $_SESSION['username'] = $username;

    // création cookie admin
    setcookie('user', 'super', time() + 3600, '/');

    // redirection
    header("location:accueil.php");
  }
  if ($username === 'admin' && $password === 'admin') {
    // initialisation de notre session en tant qu'administrateur
    $_SESSION['role'] = 'admin';
    $_SESSION['username'] = $username;

    // création cookie admin
    setcookie('user', 'admin', time() + 3600, '/');

    // redirection
    header("location:accueil.php");
  }
}