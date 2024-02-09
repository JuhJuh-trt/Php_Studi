<?php
      $fruit = "pomme";
      switch ($fruit) {
      case "cerise":
            echo "Vous avez mangé une carotte";
            break;
      case "fraise":
            echo "Vous avez mangé une orange";
            break;
      case "pomme":
            echo "Vous avez mangé une pomme";
            break;
      default:
            echo "Je ne sais pas quel fruit vous avez mangé";
      }
?>

Voici la structure d’un switch :

      - switch : le mot-clé indiquant que nous allons utiliser le switch.

      - $variable : la valeur à comparer dans les case.

      - case 'valeur' : les différentes valeurs de comparaison.

      - break : l’instruction indiquant de sortir du switch quand on a rencontré un case.

      - default : sert à gérer tous les autres cas et sera exécuté si aucun case ne correspond à la valeur de la variable. C’est l’équivalent d’un ELSE

<?php

$color = "rouge";
$result = match ($color) {
"rouge" => "Le tee-shirt est rouge.",
"vert" => "Le tee-shirt est le vert.",
"bleu" => "Le tee-shirt est le bleu.",
default => "La couleur du tee-shirt est inconnue'."
};
echo $result; // Affiche "Le tee-shirt est rouge."
?>

Voici le fonctionnement de la structure match :

      - La structure match commence par prendre une variable comme argument. Cette variable sera comparée à des motifs (patterns) ultérieurs.

      - Ensuite, chaque motif est énuméré dans la structure match avec une expression correspondante qui sera évaluée si la variable correspond à ce motif.

      - Si la valeur de la variable correspond à l'un des motifs énumérés, l'expression correspondante est évaluée et le résultat est retourné. Il n'est pas nécessaire d'utiliser un mot-clé break pour sortir de la structure match.

      - Si la valeur de la variable ne correspond à aucun des motifs énumérés, la section default sera évaluée, s'il est spécifié.

<!-- Différences -->


<?php 
switch (2) {
  case 0:
    $result = 'Paul';
  break;
  case 1:
    $result = 'Marie';
  break;
  case 2:
    $result = 'Jean';
  break;
}
echo $result;
// Affiche "Jean"
?>

<?php
echo match (2) {
  0 => "Paul",
  1 => "Marie",
  2 => "Jean",
} ;
// Affiche également "Jean"
?>

À la différence de switch qui compare les valeurs avec une égalité faible (==), match le fait avec un contrôle d’égalité stricte (===) en vérifiant si les deux valeurs sont du même type de variable.