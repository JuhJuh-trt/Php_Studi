Le mode d'ouverture de fichiers est un concept clé dans la manipulation de fichiers pour n'importe quel langage de programmation, y compris en PHP. Ce mode est spécifié dans le deuxième argument de la fonction fopen(), qui indique comment le fichier doit être ouvert pour être lu ou écrit. Il existe différents modes d'ouverture de fichiers, chacun étant utilisé en fonction de l'objectif de la manipulation de fichiers. Les modes d'ouverture les plus couramment utilisés sont :

  - "r" (read) : ce mode permet de lire un fichier existant. Il est utilisé lorsque l'on souhaite simplement lire le contenu du fichier sans le modifier. Si le fichier n'existe pas, la fonction fopen() retourne « false ».

  - "w" (write) : ce mode permet d'écrire dans un fichier. Il est utilisé pour créer un nouveau fichier ou écraser le contenu d'un fichier existant. Si le fichier n'existe pas, la fonction fopen() tente de le créer. Si la création échoue, la fonction retourne « false ».

  - "a" (append) : ce mode permet d'ajouter du contenu à un fichier existant. Le contenu est ajouté à la fin du fichier sans effacer son contenu existant. Si le fichier n'existe pas, la fonction fopen() tente de le créer. Si la création échoue, la fonction retourne « false ».


<!-- La lecture de fichier - fread() -->

<?php
$file = fopen("monfichier.txt", "r");
$content = fread($file, filesize("monfichier.txt"));
fclose($file);
echo $content; // le contenu de “monfichier.txt” s’exécutera côté HTML
?>

<!-- La lecture de fichier - fgets() -->

Elle permet de lire une ligne à partir d'un fichier
<?php
$file = fopen("monfichier.txt", "r");
if ($file) {
    while (($line = fgets($file)) !== false) {
        echo $line;
    }
    fclose($file);
} 

$contents = file_get_contents('monfichier.txt'); // permet de lire le contenu d'un fichier et de le renvoyer sous forme de chaîne de caractères
?>

<!-- L'écriture  - fwrite() -->

<?php
$file = fopen("monfichier.txt", "w");
$content = "Bonjour, comment ça va?";
echo strlen($content);
$bytes_written = fwrite($file, $content);
fclose($file);
if($bytes_written !== false) {
  echo "Ecriture de " . $bytes_written . " octets réussie.";
} else {
  echo "Erreur lors de l'écriture du fichier.";
}
?>

<!-- L'écriture - file_put_contents() -->

<?php
$file = 'monfichier.txt';
$content = 'Contenu à écrire dans le fichier'; // permet d'ecrire sans ouvrir et fermer specifiquement le fichier
file_put_contents($file, $content); // crée le fichier 
?>

<!-- Exemple video cours -->

<?php

$fil = fopen("monfi.txt", "w");
if($fil) {
  fwrite($fil, "Voici un texte d'exemple pour monfi.txt");
}
fclose($fil);

$count = 0;
$fil_count = fopen("monfi.txt", "r");
while(!feof($fil_count)) {
  $line = fgets($fil_count);
  $count++;
}
echo "Le fichier contient ".$count. " lignes.\n";

$fil_add = fopen("monfi.txt", "a");
if($fil_add) {
  fwrite($fil_add, "\nNouvelle entrée");
  fclose($fil_add);
}

$file_update = fopen("monfi.txt", "r");
echo "\nLe fichier contient désormais :";
while(!feof($file_update)) {
  $line = fgets($file_update);
  echo "-".$line;
}
fclose($file_update);

/* La fonction feof() teste si nous avons atteint la fin du fichier. Elle prend un argument qui est le pointeur de fichier retourné par la fonction fopen() et renvoie « true » si le pointeur est à la fin du fichier, sinon elle renvoie « false ». */
