<!-- Déclarer une fonction -->

<?php 

$message = sayHi('Johnny', 'Dolphin'); 
echo $message; // En php, l'appel de la fonction peut etre effectué avant sa déclaration

//Déclaration de la fonction sayHi 
function sayHi(string $firstName, string $lastName): string { 
  $currentTime = date('H:i'); 
	return "Bonjour " . $firstName . " " . $lastName . " ! Il est " . $currentTime ; 
} 

//Appel de la fonction sayHi (le corps de la fonction sayHi est éxecuté) 

$message = sayHi('John', 'Doe'); 
echo $message;

?>

<?php
// isFunctionDefined a 1 chance sur 2 d'être vrai, car 
// rand(0,1) génère de manière aléatoire les valeurs 0 et 1
$isFunctionDefined = rand(0,1);

if ($isFunctionDefined) {
	function sayH() // fonction conditionelle
	{
		echo "sayHi: Bonjour !";
	}
}
// Appel de la fonction sayHi génère une Fatal error en moyenne 1 fois sur 2, //lorsque la fonction n'est pas déclarée
// sayH();

?>

<!-- Signature -->

<?php
//Déclaration de la fonction sayHi, les valeurs déja rentrés sont des valeurs par défaut, donc si la fonction est apellé vide, elle sera remplie par eux
function sayHi2(string $firstName = 'John', string $lastName = 'Doe'): string
{
	$currentTime = date('H:i');
	return "Bonjour " . $firstName . " " . $lastName . " ! Il est " . $currentTime ;
}
print_r(sayHi2("Alex", "Mickey"));

?>

<?php
function foo(int ...$args): void
{
	//print_r permet d'afficher le contenu du tableau crée avec la fonction
	print_r($args);
}
foo(1,2,3,4,5);

?>

# si l'on veut rentrer des valeurs a partir d'un tableau il nous faut mettre les ... 
<?php
function multiply(int $x, int $y): int
{
	return $x  * $y;
}

//Affiche 2
echo multiply(1, 2);

//Affiche 2 aussi: le tableau est "déballé" en deux valeurs, une pour chaque chaque argument $x et $y 
echo multiply(...[1, 2]);

//Et dans ce cas ? Essayer, cela affiche toujours 2 ! Les valeurs suivantes, faute de paramètres correspondants, sont simplement ignorées !
echo multiply(...[1, 2, 3]);

?>

<!-- Passage des arguments par valeur -->

<?php
function sayHi3(string $firstName = 'John')
{
	//On modifie $firstName pour la mettre en majuscules avec strtoupper
	$firstName = strtoupper($firstName);
	echo 'Bonjour ' . $firstName . ' ! ' . PHP_EOL;
}

$someone = 'Eve';
//Passage par valeur
sayHi3($someone);
//La valeur de $someone n'as pas été modifiée
echo $someone;

?>

<!-- Passage par référence -->

<?php

//	$array est passé par référence à la fonction
function emptyArray(array &$array)
{
	$array = array(); //	vide le tableau car parenthèses vides
	//	On retourne une copie de $array
	return $array;
}
$foo = array(1,2,3);
print_r($foo);

//$foo est passé par référence
$empty = emptyArray($foo);

print_r($foo); //$foo a été modifié, il est vide
print_r($empty); //$empty est une copie de $foo, un tableau vide aussi

?>

<!-- Arguments nommés -->

<?php

//	array_fill(int $start_index, int $count, mixed $value): array {} 

//$foo contient un tableau commençant à l'index 0, contenant 100 éléments initialisés à la valeur 'Bonjour !'
$foo = array_fill(0, 100, 'Bonjour !'); // ou 
$faa = array_fill(value: 'Bonjour !', count: 100, start_index: 0);

//	print_r($foo);
var_dump($foo == $faa);

?>

<!-- le type hinting de PHP -->

<?php

//	strlen(string $string): int
function sayHi4(string $firstName): void
{
	//var_dump affiche le type et la valeur de la variable sur la sortie standard
	var_dump($firstName);
}
sayHi4(42); // Affiche string(2) "42" car il attend une valeur de type string
?>

	- declaredeclare(strict_types=1); 
		Cette instruction permet de passer en mode strict et va renvoyer une erreur si le typage de donnée n'est pas respecté dans les fonctions.
		Par contre elle doit etre posé dans les premieres lignes du script


<!-- Documenter sa fonction avec un DocBlock -->

<?php
//DocBlock:
//	Un argument avec la chaîne @param <type de l'argument> <nomArgument> <Un commentaire>,
//	Le type de retour avec @return <type>
//	Un lien vers une ressource sur le web avec @link <URL>.

/**
*
*
*Retourne une chaîne de caractères qui salue une personne et lui indique l'heure *courante
*<Une description éventuellement plus détaillée de ce que la fonction fait, sur *plusieurs lignes>
*
*	@param string $firstName Le prénom de la personne à saluer 
* @param string $lastName Le nom de famille de la personne à saluer 
* @link https://www.php.net/manual/fr/function.date.php
*
* @return string
*/
function sayHello(string $firstName, string $lastName): string
{
	$currentTime = date('H:i');
	return "Bonjour " . $firstName . " " . $lastName . " ! Il est " . $currentTime ;
}