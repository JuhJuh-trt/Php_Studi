<!-- Introduction -->

<?php
//Une fonction qui prend une fonction en argument
function sum(array $array, callable $operation){

	$sum = 0;
	foreach ($array as $item) {
		//Application de la fonction $operation à chaque item
		$sum += $operation($item);
	}

	return $sum;
}
//On stocke notre fonction dans une variable
$square = function($item)
{
	return $item  * $item;
};

//On passe la variable qui contient notre fonction à sum. Affiche 14
echo sum(array(1,2,3), $square);

echo "\n\n";

//On peut se resservir de $square pour faire un autre calcul
echo sum(array(4,5,6), $square);

echo "\n\n";

//  2eme façon de l'écrire :

function somme(array $array, callable $operation) {
  $somme = array_map($operation, $array);
  print_r($somme);
  return array_sum($somme);
}

echo somme(array(7,12,8,4,6), function($item) {return $item**2;}).PHP_EOL;

?>

<!-- Fonctions récursives -->

<?php
/**
* Calcul du produit factoriel d'un nombre de manière itérative
* @param int $n Un entier positif
* @return int Le produit factoriel
*/

function factorielIterative(int $n): int
{
	//Par définition, 0! = 1
	if ($n === 0) {
		return 1;
	}

	$result = $n;

	for ($i = $n - 1; $i !== 0; $i = $i - 1) {
		$result *= $i;
	}

	return $result;
}

//Affiche 1
echo factorielIterative(0)."\n";

//Affiche 120
echo factorielIterative(5)."\n\n";

// ou 

/**
* Calcul du produit factoriel d'un nombre de manière récursive
* @param int $n Un entier positif
* @return int Le produit factoriel
*/

function factorielRecursive(int $c) : int {
  if ($c === 0) {
    return 1;
  }
  return $c * factorielRecursive($c - 1);
}

echo factorielRecursive(3)."\n";
echo factorielRecursive(0)."\n";
echo factorielRecursive(1)."\n";

?>

<!-- Mise en place du jeu FizzBuzz -->

<?php

//  Demo: créer une fonction récursive (appliqué au jeu FizzBuzz)
//    - une fionction récursive ne s'applique pas qu'a des structures de données récursifs
//    - comment construire une fonction récursive
//    - comparer les solutions itératives et récursives, avec leurs avantages et inconvénients

/**
* Retourne un tour de FizzBuzz
* @param int $n Taille du jeu
* @return string La réponse 
*/

function fizzBuzzIterative(int $n) : string {
  $game = '';

  //Disctuer du paramètre optionnel de la step, on laisse a 1
  $range = range(1, $n);

  foreach ($range as $number) {
    $answer = '';

    //  nombre divisible par 3
    if ($number % 3 == 0) {
      $answer .='Fizz ';
    }
    //  nombre divisible par 5
    if ($number % 5 == 0) {
      $answer .='Buzz ';
    }
    //  si ni l'un ni l'autre
    if (empty($answer)) {
      $answer .= $number . ' ';
    }

    $game .= sprintf("%s", $answer);
  }
  return $game;
}

echo fizzBuzzIterative(20) . PHP_EOL;

// Pour créer une fonction récursive il faut commencer par créer sa condition d'arret
// soit n = 1 pour notre jeu

function fizzBuzzRecursive(int $n) : string {
  // condition d'arret
  if ($n == 1 ){
    return '1';
  }

  if ($n % 3 == 0 && $n % 5 == 0){
    return fizzBuzzRecursive($n -1) ." FizzBuzz";
  }
  if ($n % 3 == 0){
    return fizzBuzzRecursive($n -1) ." Fizz";
  }
  if ($n % 5 == 0){
    return fizzBuzzRecursive($n -1) ." Buzz";
  }
  //  return $n . fizzBuzzRecursive($n -1) aurait affiché les chiffres en degressif
  return fizzBuzzRecursive($n -1) ." ". $n;
}

echo fizzBuzzRecursive(20);