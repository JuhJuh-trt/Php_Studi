<?php
function combien(){ # on définit une fonction "combien"
    $poids = 300 ; # on définit une variable $poids dans la fonction
}
combien(); # on exécute la fonction "combien"
echo $poids; # on veut afficher une variable $poids
#, mais il n'existe pas de variable $poids à ce niveau
# donc un message d'erreur est affiché
?>

<?php
function affiche(){ # on définit une fonction "affiche"
    $quantite = 2 ; # on initialise une variable locale $quantite
    echo $quantite,"\n" ; # on affiche cette variable
}
$quantite = 5 ; # on définit une variable globale $quantite
affiche(); # on exécute la fonction "affiche", qui affiche 2
echo $quantite,"\n" ; # on affiche la variable globale $quantite, soit 5
?>

<?php
function affiche_bis(){ # on définit une fonction "affiche_bis"
    global $quantite ; # on déclare utiliser la variable globale $quantite
    echo $quantite,"\n" ; # on affiche cette variable
    $quantite = 2 ; # on modifie cette variable à 2
}
$quantite = 5 ; # on définit une variable globale $quantite à 5
affiche_bis(); # on exécute la fonction "affiche_bis"
echo $quantite,"\n" ; # on affiche la variable qui a été modifiée par la fonction
?>

<?php 
//<input type="text" name="prenom" />
//<input type="text" name="nom" />
//<input type="text" name="email" />
//Pour atteindre ces valeurs on utlise $_REQUEST[“prenom”], $_REQUEST[“nom”], $_REQUEST[“email”].
?>

<?php
$texte = 'chaine' ; # on définit une variable $texte qui vaut 'chaine'
$chaine = 'de caractères' ; # on définit une variable $chaine
$document = 'texte' ; # on définit une variable $document qui vaut 'texte'
echo $texte,"\n" ; # on affiche la variable $texte
echo $chaine,"\n" ; # on affiche la variable $chaine
echo $$texte,"\n" ; # on affiche la variable dont le nom est la valeur de $texte
echo $$$document,"\n" ; # on affiche l'interprétation finale de document->texte->chaine->de caractères
?>

<?php
$document = 'texte' ; # on définit une variable $document qui vaut 'texte'
$texte = 'chaine' ; # on définit une variable $texte qui vaut 'chaine'
$chaine = 'lien' ; # on définit une variable $chaine qui vaut 'lien'
echo "$document\n" ; # affiche la valeur de la variable $document, soit 'texte'
echo "$$document\n" ; # affiche le symbole $ suivi de la valeur de la variable $document, soit 'texte'
echo "$$$document\n" ; # affiche 2 symboles $ suivis de la valeur de la variable $document, soit 'texte'
echo "${$document}\n" ; # affiche la valeur de la variable dont le nom est $texte, soit 'chaine'
echo "${${$document}}\n" ; # affiche la valeur de la variable dont le nom est $chaine, soit 'lien'
$donnees = ['phrase','mots','lettres']; # on définit un tableau de données
$phrase = 'mots'; # on définit une variable nommée $phrase et qui vaut 'mots'
$mots = 'lettres'; # on définit une variable nommée $mots et qui vaut 'lettres'
echo "une $donnees[0] contient des ${$donnees[0]} avec des ${${$donnees[0]}}";
# affiche 'une phrase contient des mots avec des lettres'
?>