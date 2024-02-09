<!-- Syntaxe -->

<?php
$firstArray = array("cle1" => "element1", "cle2" => "element2", "cle3" => "element3");
$secondArray = ["cle1" => "element1", "cle2" => "element2", "cle3" => "element3"];
?>

<!-- Tableau associatif -->

<?php
$students = [
	"Class1" => ["John", "Mary", "Karim"],
	"Class2" => ["Jane", "Richard", "Anna"]
];
?>

<?php
$isoCodes = [
"Argentine" => "AR",
"Belgique" => "BE",
	"Chili" => "CL",
	"Equateur" => "EC"
];
//ou 
$isoCodes =  ["Argentine" => "AR","Belgique" => "BE","Chili" => "CL","Equateur" => "EC"];
?>


<!-- Tableau indexé -->

<?php

$languages = array(1 => "PHP", 2 => "Javascript", 3 => "Python");
var_dump($languages);
//array(3) {
//  [1]=>
//  string(3) "PHP"
//  [2]=>
//  string(10) "Javascript"
//  [3]=>
//  string(6) "Python"
//}
print_r($languages);
//Array
//(
//    [1] => PHP
//    [2] => Javascript
//    [3] => Python
//)
?>

<?php

$languages = array("PHP", "Javascript", "Python"); // pas d'index spécifié donc l'index commence a 0
var_dump($languages);
//array(3) {
//  [0]=>
//  string(3) "PHP"
//  [1]=>
//  string(10) "Javascript"
//  [2]=>
//  string(6) "Python"
//}

$lastElement = $languages[count($languages) - 1];
var_dump($lastElement);
//  string(6) "Python"

?>

<?php

$languages = array("PHP", 2 => "Javascript", "Python"); // mise en place que de certains index, si c'est pas le premier element, on commence a 0 quand meme
var_dump($languages);
//array(3) {
//  [0]=>
//  string(3) "PHP"
//  [2]=>
//  string(10) "Javascript"
//  [3]=>
//  string(6) "Python"
//}
var_dump(strlen($languages[2])); // recupération de la valeur int de la longueur de l'element d'index 2 dans le tableau
?>

<?php
$languages = array("1" => "PHP", "b" => "Javascript", "c" => "Python", 2.6 => "HTML"); //melange d'index en entier et chaine de caractère, les int a virgule sont arrondis lentier inférieur
var_dump($languages) ;
//array(3) {
//  [1]=>
//  string(3) "PHP"
//  [‘b’]=>
//  string(10) "Javascript"
//  [‘c’]=>
//  string(6) "Python"
//  [2] =>
//  string(4) "HTML"
//}
?>

<?php
$languages = array(false => "PHP", true => "Javascript", "Python", null => "HTML");
var_dump($languages) ;
//array(3) {
//  [0]=>
//  string(3) "PHP"
//  [1]=>
//  string(10) "Javascript"
//  [2]=>
//  string(6) "Python"
//  '' =>
//  string(4) "HTML"
//}
?>

<?php
$languages = array(true => "PHP", "1" => "Javascript", 1.3 => "Python"); //seulement la derniere clé "python" ressort donc erreur
var_dump($languages) ;
//array(1) {
//  [1]=>
//  string(6) "Python"
//}
?>