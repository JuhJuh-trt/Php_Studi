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
  <h2>Bienvenue sur la page d'ACCUEIL</h2>
  <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'super') { ?>
    <nav>
      <ul>
        <a href="#"><li>Accueil</li></a>
        <a href="#"><li>Gestion des utilisateurs</li></a>
        <a href="#"><li>Deconnexion</li></a>
        <a href="serveur.php"><li>Données Serveur</li></a>
        <p>Vous etes connecté en tant que <?php echo $_SESSION['role'];?></p>
      </ul>
    </nav>
<?php  } else { ?>
      <nav>
      <ul>
        <a href="#"><li>Accueil</li></a>
        <a href="#"><li>Gestion des utilisateurs</li></a>
        <a href="#"><li>Deconnexion</li></a>
        <p>Vous etes connecté en tant que <?php echo $_SESSION['role'];?></p>
      </ul>
    </nav>
<?php  } ?>
</body>
</html>