<?php
define("MAJORITE",18); # on définit une constante nommée MAJORITE qui vaut 18
echo MAJORITE,"\n" ; # on affiche cette constante
define("MINIMUM_TEMPERATURE",-20); # on définit une constante MINIMUM_TEMPERATURE
echo MINIMUM_TEMPERATURE,"\n" ; # on l'affiche
?>

<?php
echo PHP_VERSION,"\n" ; # la version de PHP utilisée
echo PHP_INT_MAX,"\n"; # le plus grand entier
echo PHP_FLOAT_MAX,"\n"; # le plus grand flottant
?>

<?php
echo __LINE__,"\n"; //correspond au numéro de la ligne dans le fichier
echo __FILE__,"\n"; //correspond au nom complet du fichier
echo __DIR__,"\n"; //correspond au nom complet du répertoire du fichier
echo __FUNCTION__,"\n"; //correspond au nom de la fonction courante
echo __CLASS__,"\n"; //correspond au nom de la classe courante
echo __TRAIT__,"\n"; //correspond au nom du trait courant
echo __METHOD__,"\n"; //correspond au nom de la méthode courante
echo __NAMESPACE__,"\n"; //correspond au nom de l'espace de noms courant

function affichage(){ # on définit une fonction nommée 'affichage'
  echo __FUNCTION__ ; # affiche le nom de la fonction en cours
}
affichage(); # exécute cette fonction 'affichage'
