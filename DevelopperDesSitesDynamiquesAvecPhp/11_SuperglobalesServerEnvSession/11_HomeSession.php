<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>
<body>
  <h2>Bienvenue sur la page d'ACCUEIL</h2>
  <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) { ?>
    <nav>
      <ul>
        <a href="#"><li>Gestion des utilisateurs</li></a>
        <a href="#"><li>Gestion des produits</li></a>
        <a href="#"><li>Deconnexion</li></a>
        <p>Vous etes connectes en tant qu'admin</p>
      </ul>
    </nav>
<?php  } else { ?>
      <nav>
      <ul>
        <a href="#"><li>Accueil</li></a>
        <a href="#"><li>Produits</li></a>
        <a href="#"><li>Deconnexion</li></a>
        <p>Vous est connecté en tant qu'<?php echo $username;?></p>
      </ul>
    </nav>
<?php  } ?>
</body>
</html>