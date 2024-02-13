<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <h2>Bienvenue sur la page Super</h2>
  <?php if(isset($_SESSION['super']) && $_SESSION['super'] == true) { ?>
    <ul>
      <li>L'adresse ip est : <?php echo $_SERVER['REMOTE_ADDR'];?></li>
      <li>Le nom du domaine est : <?php echo $_SERVER['SERVER_NAME'];?></li>
      <li>Le Navigateur est : <?php echo $_SERVER["HTTP_USER_AGENT"];?></li>
      <li>Le port du serveur est : <?php echo $_SERVER['REMOTE_PORT'];?></li>
    </ul>
    
  <?php } ?>
</body>
</html>