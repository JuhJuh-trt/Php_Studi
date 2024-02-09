<!-- Incrémentation et décrémentation -->

<?php

$places_disponibles =10;
$places_disponibles = $places_disponibles +1 ; # une voiture sort du parking
echo $places_disponibles ; # on affiche le nombre de place disponibles
echo ++$places_disponibles ; # on affiche le nombre de place disponibles après la sortie d’une voiture

$places_disponibles = $places_disponibles - 1 ; # une voiture entre dans le parking
echo $places_disponibles ; # on affiche le nombre de place disponibles
echo --$places_disponibles ; # on affiche le nombre de place disponibles après l’entrée d’une voiture

$var = 5 ;
echo $var++ ; # affiche 5 puis incrémente $var de 1
echo $var ; # affiche 6
$var = 5 ;
echo ++$var ; # incrémente $var de 1, puis affiche 6
$var = 5 ;
echo $var-- ; # affiche 5 puis décrémente $var de 1
echo $var ; # affiche 4
$var = 5 ;
echo --$var ; # décrémente $var de 1, puis affiche 4

?>

<!-- Boucles Foreach -->

<?php

$tab = ['a','b','c','d','e'];

foreach($tab as $pos => $val){ 
// ce qui veut dire que pour chaque element du tableau $tab, on va afficher la valeur de $val de chaque clé $pos
// on aurait pu ecrire : 
// foreach($tab as $val) 
// car dans une boucle foreach si la clé n'est pas spécifié, on prend automatiquement la valeur enc considération

	echo $val;
// abcde
}

?>

<?php 

$tab = [1,2,3,4,5];
$somme =0; // ne pas oublier d'initialiser la variables
foreach($tab as $val) {
  $somme+=$val;
}
echo $somme;

?>

<!-- Les Booléens -->

<?php

var_dump(true) ; # affiche bool(true)
var_dump(false) ; # affiche bool(false)
var_dump(2==1) ; # affiche le résultat du test "2 est-il égal à 1", soit bool(false)
var_dump(2>1) ; # affiche le résultat du test "2 est-il supérieur à 1", soit bool(true)
var_dump(2!=1) ; # affiche le résultat du test "2 est-il différent de 1", soit bool(true)
var_dump(2<=1) ; # affiche le résultat du test "2 est-il inférieur ou égale à 1", soit bool(false)

?>