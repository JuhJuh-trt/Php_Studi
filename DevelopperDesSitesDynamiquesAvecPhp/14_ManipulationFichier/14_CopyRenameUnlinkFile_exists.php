<!-- copy() -->

<?php
if (!copy('source.txt', 'destination.txt')) {
    echo "La copie du fichier a échoué";
}

// exemple

if (copy('image.jpg', 'images/image.jpg')) {
    echo "Le fichier a été copié avec succès";
} else {
    echo "La copie du fichier a échoué";
} // permet de copier le fichier image dans le dossier images
?>

<!-- rename() -->

<?php
if (!rename('ancien_nom.txt', 'nouveau_nom.txt')) {
  echo "Operation échoué";
} // si le fichier nouveau_nom.txt existe deja, rename va le remplacer, donc il vaut mieux verifier avec file_exists qu'il n'ait pas deja un fichier
?>

<!-- unlink() -->

<?php
if (!unlink('nom_du_fichier.txt')) {
  echo "La suppression du fichier a échoué";
} // supprime définitivement le fichier 
?>

<!-- file_exists() -->

<?php
$file = "mon_fichier.txt";
if (file_exists($file)) {
    echo "Le fichier $file existe.";
} else {
    echo "Le fichier $file n'existe pas.";
}
?>

<!-- Exemple vidéo cours -->

<h1>Téléchargement de fichier</h1>
<form action="sauvegarde.php" method="post" enctype="multipart/form-data">
    <label for="file">Choisir un fichier :</label><br>
    <input type="file" name="file" id="file"><br>
    <button type="submit" name="submit">Télécharger</button>
  </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $file = $_FILES['file']['name'];
    $destination = "uploads/";
    $target_dir = $destination . basename($file);

    if (file_exists($target_dir)) {

      // Création d'une copie de sauvegarde
      $backup_file = $destination . 'backup' . basename($file); 
      copy($target_dir, $backup_file);

      // Renommer le fichier original
      $rename_file = $destination . 'rename' . basename($file);
      rename($target_dir, $rename_file);

      // Suppression fichier original
      unlink($backup_file);
      echo "Le fichier a bien été remplacé avec succès";

    }else{ 
      move_uploaded_file($_FILES['file']['tmp_name'], $target_dir);
      echo "Le fichier ".$file." a bien été téléchargé";
    }
  } else { 
  echo "Il y a eu une erreur lors du téléchargement du fichier";
}
?>

<!-- Autre exemple -->

is_dir() peut être utilisée pour vérifier si un fichier est un répertoire ou non

mkdir() permet de créer un nouveau répertoire dans le système de fichiers

<?php
if(is_dir('documents')) { // vérifie sir le repertoire existe
    echo " Le répertoire 'documents' existe déjà<br> ";
}else { 
    if(mkdir('documents')){
        echo " Le répertoire 'documents' a bien été crée <br>";
    }
}

$file = fopen('documents/monfichier.txt', 'w');
if($file) { 
    fwrite($file, " Voici un texte d'exemple");
    fclose($file);
} else 
{ 
    echo " Impossible de créer le fichier dans le répertoire 'documents'";
}

if(file_exists('documents/monfichier.txt')) {
  if(is_dir('backup')) {
      echo " Le répertoire 'backup' existe déjà <br>";
  }
  else { 
      mkdir('backup');
      if(copy('documents/monfichier.txt', 'backup/mon fichier'));
      echo " le fichier 'monfichier.txt' a bien été copié dans le répertoire 'backup' ";
  }}