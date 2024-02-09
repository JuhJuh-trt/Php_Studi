<?php
echo 2+3, "\n"; # affiche 5, et se prépare pour une nouvelle ligne
echo 10-3, "\n" ; # affiche 7, et se prépare pour une nouvelle ligne
echo 3*4, "\n" ; # affiche 12, et se prépare pour une nouvelle ligne
echo 15/3, "\n" ; # affiche 5, et se prépare pour une nouvelle ligne

echo 2**3, "\n" ; # affiche 8, ce qui correspond à 2*2*2
echo 3**4, "\n" ; # affiche 81, ce qui correspond à 3*3*3*3
echo 15%2, "\n" ; # affiche 1, car 15=2*7+1
echo 23%4, "\n" ; # affiche 3, car 23=4*5+3
?>

<!-- les délimiteurs -->

<?php
echo 'une simple chaîne de caractères', "\n" ;
echo 'et maintenant avec l\'apostrophe !',"\n" ;
echo <<<'MON_DELEMITEUR'
voici le début du texte
qui peut aller sur plusieurs lignes
et contenir des caractères spéciaux
comme l'apostrophe et la barre oblique inverse \
MON_DELEMITEUR;
$quantite = 12 ; # on affecte la valeur 12 à la variable $quantite, cf. section suivante.
echo "\nCette boîte contient {$quantite} oeufs.\n" ;
echo "une\ttabulation" ; # le caractère spécial "\t" est une tabulation
echo <<<mon_identifiant_de_chaine
\nune chaîne avec\ndes\nlignes\nmultiples
ainsi que des variables interprétées :
{$quantite}
mon_identifiant_de_chaine;
?>

<!-- la concaténation -->

<?php
echo "réveil","-","matin","\n" ;
echo "réveil"."-"."matin"."\n" ;
?>

<!--  les affectations -->

<?php
$prenom = "Frédéric" ; # Affectation d’une chaîne de caractères
$age = 32 ; # Affectation d’un nombre entier
echo $prenom," a ",$age," ans.\n" ;
echo "{$prenom} a {$age} ans.\n" ;
?>

<!--  les affectations combinées -->

<?php
$quantite = 12 ;
echo "La quantité vaut {$quantite}.\n" ; # $quantite vaut 12
$quantite += 3 ; # équivalent à : $quantite = $quantite + 3 ;
echo "La quantité vaut {$quantite}.\n" ; # $quantite vaut 15
$quantite *= 3 ; # équivalent à : $quantite = $quantite * 3 ;
echo "La quantité vaut {$quantite}.\n" ; # $quantite vaut 45
$quantite /= 5 ; # équivalent à : $quantite = $quantite / 5 ;
echo "La quantité vaut {$quantite}.\n" ; # $quantite vaut 9
$chaine = "une chaîne" ;
echo $chaine,"\n" ;
$chaine .= " plus longue," ;
echo $chaine,"\n" ;
$chaine .= " vraiment plus longue."; // utiliser .= pour du string
echo $chaine,"\n" ;
?>

<!-- les priorités -->

<?php
//« ** », l’exponentiation est l’opération la plus prioritaire,
//« * », « / », « % », multiplication, division et modulo,
//« + », « - », addition et soustraction,
//« . », la concaténation est l’opération la moins prioritaire.

$n = 10 ;
echo "la moitié de {$n} est ".$n/2,"\n" ; # la division est effectuée avant la concaténation
echo 1-2**3/4+3 ." €\n" ; # affiche 2 €
# calcule 2**3=8, puis 8/4=2, puis 1-2=-1, puis -1+3=2, puis la concaténation
?>

<!-- opérateur d'execution -->

<?php
echo `dir` ; # pour lister le contenu du répertoire courant sous Windows
// echo `tasklist` ; # pour lister les processus actifs sous Windows
// echo `ls` ; # pour lister le contenu du répertoire courant sous Linux
// echo `ps` ; # pour lister les processus actifs de l'utilisateur sous Linux
?>

