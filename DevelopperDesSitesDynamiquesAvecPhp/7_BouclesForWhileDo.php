<!-- Boucles For -->

<?php
for ($k = 1 ; $k < 10 ; $k++) { # les 3 phases sont séparées par le caractère “;”
	echo $k;
}
# affiche 123456789
?>

<?php
for ($k = 10 ; $k > 0 ; $k--) { # les 3 phases sont séparées par le caractère “;”
	echo $k;
}
# affiche 10987654321
?>

<?php
for ($k = 0 ; $k < 100 ; $k+=5) { # les 3 phases sont séparées par le caractère “;”
	echo $k.",";
}
# affiche 0,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,
?>

<!-- Boucles While -->

<?php
$d = 1 ; # phase d’initialisation
while ($d < 10){ # phase de test conditionnel
	echo $d ;
	$d++ ; # phase d’actualisation
}
# affiche 123456789
?>

<!-- Boucles Do...While -->

<?php
$s = 1 ; # phase d’initialisation
do {
	echo $s++ ; # phase d’actualisation combinée à l’affichage
} while ($s < 10) ; # phase de test conditionnel
# affiche 123456789
?>

<!-- Instruction Break -->

<?php
$tab = [1,2,3,4.5,5,6] ;
# 4.5 parmi les autres nombres entiers, erreur volontaire
foreach($tab as $v){ 
	# chaque élément, à chaque itération, est mémorisé dans $v
	if (!is_int($v)){ // Verifie si c'est un nombre entier
		break; // Si pas nbr entier, la boucle s'arrete
	}
	echo $v ; # on affiche l'élément courant qui est un nombre entier
}
# affiche uniquement "123" puisque la boucle se termine quand on traite l'élément 4.5
?>

<?php
for($a=1 ; $a<=10 ; $a++){ # on prévoit 10 itérations à l'aide de la variable $a
	$d = 10 ; # on initialise une variable $d
	do {
		echo $d,'-',$a,' = ',$d-$a,"\n" ; # on affiche la soustraction de $d par $a
		$d-- ; # on décrémente $d
	} while($d>$a) ; # on répète cette boucle tant que $d est supérieur à $a
echo "-----------------\n" ; # on affiche une ligne de séparation


}

//  on commence par poser for, puis on rentre dans la boucle do jusqu'a while atteind, et quand on l'a atteind on remonte dans la boucle parent qui est for, on incrémente $a et on recommence dans do... etc jusqu'a atteindre $a <= 10
?>

<?php
for($a=1 ; $a<=10 ; $a++){ # on prévoit 10 itérations à l'aide de la variable $a
	$d = 10 ; # on initialise une variable $d
	do {
		if($a>=$d){
			break 1; # on sort de la boucle while quand $a et $d valent 10
			# on continue donc la boucle for et affiche la ligne de séparation
		}
		echo $d,'-',$a,' = ',$d-$a,"\n" ; # on affiche la soustraction de $d par $a
		$d-- ; # on décrémente $d
	} while($d>$a) ; # on répète cette boucle tant que $d est supérieur à $a
	echo "-----------------\n" ; # on affiche une ligne de séparation
}
?>
# break 1 termine un niveau de boucle supérieur et break 2 termine 2 niveaux de boucles supérieur ce qui break de do mais aussi le for
<?php
for($a=1 ; $a<=10 ; $a++){ # on prévoit 10 itérations à l'aide de la variable $a
	$d = 10 ; # on initialise une variable $d
	do {
		if($a>=$d){
			break 2; # on sort de la boucle for quand $a et $d valent 10
			# on n'affiche plus la ligne de séparation
		}
		echo $d,'-',$a,' = ',$d-$a,"\n" ; # on affiche la soustraction de $d par $a
		$d-- ; # on décrémente $d
	} while($d>$a) ; # on répète cette boucle tant que $d est supérieur à $a
	echo "-----------------\n" ; # on affiche une ligne de séparation
}
?>

<!-- Instruction continue -->

<?php
for($a=1 ; $a<=10 ; $a++){
	for($d=10 ; $d>$a ; $d--){
		
		echo $d,'-',$a,' = ',$d-$a,"\n" ; 
	}
	echo "-----------------\n" ; 
}
?>

<?php
for($a=1 ; $a<=10 ; $a++){ # on prévoit 10 itérations à l'aide de la variable $a
	for($d=10 ; $d>$a ; $d--){ # on boucle avec une variable $d
		# on répète cette boucle tant que $d est supérieur à $a
		if($d<5){
			continue 1; # on passe à l'itération suivante de la boucle intérieure quand $d est inférieur à 5
			# on continue donc la boucle extérieure et affiche la ligne de séparation
		}
		echo $d,'-',$a,' = ',$d-$a,"\n" ; # on affiche la soustraction de $d par $a
	}
	echo "-----------------\n" ; # on affiche une ligne de séparation
}
?>
# continue 1 termine la boucle actuelle et demande de passer a l'itération suivant dans le boucle parent sans finir, continue 2 termine la boucle actuelle envoie la l'itération suivante dans le parent de 2eme degré sans finir la lecture vers le bas de la boucle ( pas de tirets séparateur quand $d est plus petit que 5)
<?php
for($a=1 ; $a<=10 ; $a++){ # on prévoit 10 itérations à l'aide de la variable $a
	for($d=10 ; $d>$a ; $d--){ # on boucle avec une variable $d
		# on répète cette boucle tant que $d est supérieur à $a
		if($d<5){
			continue 2; # on passe à l'itération suivante de la boucle extérieure quand $d est inférieur à 5
			# on n’affiche donc plus la ligne de séparation dans ce cas
		}
		echo $d,'-',$a,' = ',$d-$a,"\n" ; # on affiche la soustraction de $d par $a
	}
	echo "-----------------\n" ; # on affiche une ligne de séparation
}
?>