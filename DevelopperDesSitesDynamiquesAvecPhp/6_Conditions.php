<?php
$score = 77;
if ($score  >=  95) {
	echo "Excellent travail !";
} else if ($score  >=  85) {
	echo "Très bien !";
} else if ($score  >=  70) {
	echo "Pas mal !";
} else {
	echo "Vous pouvez quand même mieux faire...";
}
?>

<?php
$sport = "football";
if ($sport == "tennis") {
  echo "Vous jouez au tennis";
}  
elseif ($sport == "basketball") {
  echo "Vous jouez au basketball";
}   
elseif ($sport == "football") {
  echo "Vous jouez au football";
} 
else {
  echo "Vous ne jouez à aucun de ces 3 sports";
}

?>

(condition) ? valeur_si_vrai : valeur_si_faux;

L'opérateur ternaire se compose de trois parties :

  - La condition qui est évaluée (entre parenthèses),

  - ? : L’opérande ternaire, qui est l’équivalent du if,
  La valeur retournée si la condition est vraie,

  - : L’équivalent du else,
  La valeur retournée si la condition est fausse.

Exemple :

<?php 
$age = 32;
$messageAge = ($age <=18) ? "Vous êtes mineur.": "Vous êtes majeur.";
echo $messageAge;
?>