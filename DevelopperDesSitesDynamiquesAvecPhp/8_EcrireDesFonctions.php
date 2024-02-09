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