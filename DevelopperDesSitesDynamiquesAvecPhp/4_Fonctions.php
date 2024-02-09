<!-- Les arguments -->

<?php

$sentence = "Don’t repeat yourself";
strlen($sentence);

?>

<?php

function sayHello($firstName, $lastName) {
  echo "Bonjour ".$firstName." ".$lastName."!";
}

sayHello("John", "Doe");

function sayHello1(string $firstName, string $lastName) {
	echo "Bonjour " . $firstName . " " . $lastName . "!"; 
}

//si la fontion est appellée elle renverra une erreur si les valeurs ne sont pas de type string
?>

<?php
// ... indique qu'il accepte un nombre illimité d'arguments
function sayHello2(...$persons) {
	foreach($persons as $person) {
		echo "Bonjour " . $person . "!\n";
  }
}

sayHello2("Agnès", "Kenza", "Nour");
?>

<?php

$name = "hector";

function sayHello3($name) {
	$name = ucfirst($name);
	echo "Bonjour " . $name . "!"; // Bonjour Hector !
}

sayHello3($name); // Bonjour hector !

$name = "victor";
function sayHello4(&$name) {
	$name = ucfirst($name);
	echo "Bonjour " . $name . "!";
}
sayHello4($name);
// la valeur de name de base a changé grace au & dans la fonction
?>

<!-- Valeur de retour -->

<?php

function isOver18($age) {
      if($age < 18) {
          return false;	
      } return true;
}

var_dump(isOver18(17));
?>

<?php

function sayHello5($firstName, $lastName) {
	echo "Bonjour " . $firstName . " " . $lastName ."!";
}

$result = sayHello5("John", "Doe");
?>

<?php

function iOver18($age): bool {
	if($age < 18) {
        return false;	
	} return true;
}
var_dump(iOver18(17));
?>