<?php
$movie = "Children of Men";
$rates = [3, 4, 2, 4, 3, 5, 0];
$comment = ["Albert", "Super film, j’ai adoré!"];

$moyenne = array_sum($rates)/count($rates);
// print_r($moyenne);

$prenom = $comment[0];
$nameLength = strlen($prenom); // crée un tableau de ma chaine de caractère
var_dump($prenom); 
$stars = str_repeat('*', $nameLength - 1);
$anonyme = $prenom[0] . $stars;
print_r($anonyme);
?>

<?php

$users = [
	'Adam' => 8,
	'Julie' => 13,
	'Karima' => 11,
	'Anna' => 11,
	'Marina' => 9,
	'Mohamed' => 7,
	'Arthur' => 12,
	'Morgan' => 14
];

$newUsers = [
	'Hector' => 6,
	'Manon' => 8,
	'Elisa' => 10,
	'Leo' => 12,
	'Enzo' => 13,
	'Ada' => 9
];

$maintenant = $newUsers + $users;
var_dump($maintenant);

asort($maintenant);
var_dump($maintenant);

function underTen($enfant) {
  return $enfant < 10;
}
function upperTen($enfant) {
  return $enfant > 10;
}

$enfantPlusTen = array_filter($maintenant, 'upperTen');
var_dump($enfantPlusTen);
$enfantMoinsTen = array_filter($maintenant, 'underTen');
var_dump($enfantMoinsTen);