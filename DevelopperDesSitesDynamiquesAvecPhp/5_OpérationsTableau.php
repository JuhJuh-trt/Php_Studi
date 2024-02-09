<?php

$listA = ["a" => "PHP", "b" => "Javascript", "c" => "Python", "d" => 3];
$listB = ["b" => "Javascript", "a" => "PHP", "c" => "Python", "d" => "3"];
var_dump($listA == $listB); // true
var_dump($listA === $listB); // false, true si mêmes paires clés-valeurs, du même type, et dans le même ordre.
?>

<?php
//opérateurs d’inégalité !=, renvoie true si ils sont différents
$listA = ["a" => "PHP", "b" => "Javascript", "c" => "Python", "d" => 3];
$listB = ["b" => "Javascript", "a" => "PHP", "c" => "Python"];
var_dump($listA != $listB); // true 
var_dump($listA !== $listB); // renvoie true si pas les mêmes paires clé-valeur, du même type et dans le même ordre.
?>

<?php

$fruits = ['a' => 'apple', 'b' => 'pear', 'c' => 'strawberry', 'b' => 'ananas'];
$moreFruits = ['a' => 'nut', 'f' => 'lemon', 'g' => 'orange'];

$combinedFruits = $fruits + $moreFruits;
var_dump($combinedFruits); // fait disparaitres des valeurs, depend du premier $ dans le fonction

// $ajoutTableaux = array_merge_recursive($fruits, $moreFruits);
// var_dump($ajoutTableaux);