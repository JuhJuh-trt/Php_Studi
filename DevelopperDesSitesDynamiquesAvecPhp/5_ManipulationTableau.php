<?php

$countries = ["Argentine", "Belgique", "Chili", "Equateur"];
$isoCode = [
  "Argentine" => "AR",
  "Belgique" => "BE",
	"Chili" => "CL",
	"Equateur" => "EC"
];
echo $countries[1]."\n"; // Affiche Belgique’
echo $isoCode["Argentine"]; // Affiche ‘AR’

?>

<?php

$names = ["Lea", "Morgan", "Lionel", "Marina", 7 => "ALex"];
foreach($names as $key => $name) {
	echo "Le prénom " . $name . " est à la clé " . $key . " du tableau.\n";
};

//Le prénom Lea est à la clé 0 du tableau.
//Le prénom Morgan est à la clé 1 du tableau.
//Le prénom Lionel est à la clé 2 du tableau.
//Le prénom Marina est à la clé 3 du tableau.
//Le prénom ALex est à la clé 7 du tableau.

?>

<?php

$names = ["Lea", "Morgan", "Lionel", "Marina"];
foreach($names as $name) {
	echo $name . "\n";
};

//Si un seul argument est passé à la boucle foreach, elle ne passe en revue que les valeurs, et ignore les clés du tableau.

//Lea 
//Morgan 
//Lionel
//Marina

?>

<?php

$countries = [
	"Europe" => ["France", "Belgium", "Germany"],
  "America" => ["Brazil", "United States", "Mexico"],
  "Asia" => ["India", "China"],
  "Africa" => ["Senegal", "Mali"]	
];
echo $countries["Asia"][0]."\n"; // ‘India’
$countries["Asia"][0] = "Japan"; 
echo $countries["Asia"][0];  // ‘Japan’
?>

<!-- Ajout elements -->

<?php

$names = ["Lea", "Morgan", "Lionel", "Marina"];
$names[4] = "Manon"; // va ajouter la valeur a la fin du tableau
var_dump($names);
//  array(5) {
//  [0]=>
//  string(3) “Lea”
//  [1]=>
//  string(6) “Morgan”
//  [2]=>
//  string(6) “Lionel”
//  [3]=>
//  string(6) “Marina”
//  [4]=>
//  string(5) “Manon”
$names[] = "Roger"; // va ajouter la valeur a la fin du tableau
var_dump($names); 
//  array(6) {
//  [0] =>
//  string(3) "Lea"
//  [1] =>
//  string(6) "Morgan"
//  [2] =>
//  string(6) "Lionel"
//  [3] =>
//  string(6) "Marina"
//  [4] =>
//  string(5) "Manon"
//  [5] =>
//  string(5) "Roger"
//  }
?>

<!-- Fonctions systeme -->

count($array) : compte le nombre d’éléments dans un tableau. Valeur de retour : un entier.

in_array($needle, $haystack, $strict = false) : vérifie si un élément existe dans un tableau donné. Si $strict n’est pas passé à true, la comparaison ne se fait pas sur le type de valeur. Valeur de retour : un booléen.

is_array($array) : vérifie si une valeur est de type tableau. Valeur de retour : un booléen. Cette fonction est utile pour vérifier que la valeur reçue est bien du type attendu.

array_unique($array, int $flags = SORT_STRING) : supprime les valeurs en doublon d’un tableau. Le deuxième argument, optionnel, permet de préciser le comportement de comparaison. Valeur de retour : un nouveau tableau (le tableau d’origine n’est pas modifié).

array_reverse($array, $preserve_keys = false) : retourne un tableau dont les éléments sont en ordre inversé par rapport au tableau d’origine. Les clés en chaîne de caractères ne sont pas affectées, mais les clés sous forme d’entier sont modifiées. Si le deuxième argument est à true, les clés numériques seront préservées. Valeur de retour: un tableau.

sort(&$array, $flags = SORT_REGULAR) : trie un tableau sur place (le tableau d’origine est modifié) en ordre croissant. Le deuxième paramètre est optionnel et permet de modifier le comportement de tri. Valeur de retour: true.

rsort(&$array, $flags = SORT_REGULAR) : trie un tableau sur place (le tableau d’origine est modifié) en ordre décroissant. Le deuxième paramètre est optionnel et permet de modifier le comportement de tri. Valeur de retour: true.

implode($separator, $array) : transforme un tableau en chaîne de caractères. Chaque valeur du tableau est séparée de la suivante par la chaîne de caractères passée en premier argument. Valeur de retour: une chaîne de caractères.

max($array) : renvoie la valeur la plus élevée d’un tableau.

min($array) : renvoie la plus petite valeur d’un tableau.

<?php

$films = ['Princess Mononoke', 'Matrix', 'Children of Men', 'Matrix', 'Moon'];

function unifyAndSortToString($list) {
	if (is_array($list)) {
		$listUnified = array_unique($list);
    //var_dump($listUnified);
	};
	sort($listUnified); 
  var_dump($listUnified);
	return implode(', ', $listUnified);
};
var_dump(unifyAndSortToString($films));

//string(48) "Children of Men, Matrix, Moon, Princess Mononoke" 
//sort a ranger les valeurs par ordre alphabétique, pour ranger par ordre numérique de clé il faut fallut faire :
//sort($listUnified, SORT_NUMERIC);
//https://www.php.net/manual/fr/function.sort.php
?>

<?php

$grades = [2, 8, 12, 6, 9, 12, 13, 5];

function incrementByOne($grade) {
  return $grade +1;
}

$gradesPlusOne = array_map('incrementByOne', $grades);
var_dump($gradesPlusOne);

function filterUnderTen($grade) {
  return $grade < 10;
}

$gradesFilter = array_filter($grades, 'filterUnderTen');
var_dump($gradesFilter);
sort($gradesFilter, SORT_NUMERIC); // essai perso
var_dump($gradesFilter);
?>

array_key_exists($key, $array) : vérifie si une clé existe dans un tableau. Valeur de retour: un booléen.

array_keys($array) : retourne toutes les clés d’un tableau. Valeur de retour : un nouveau tableau.

array_values($array) : retourne toutes les valeurs d’un tableau. Valeur de retour: un nouveau tableau.

asort(&$array, $flags = SORT_REGULAR) : trie les valeurs d’un tableau sur place en ordre croissant, en conservant  l’association clé-valeur. Le deuxième paramètre est optionnel, il permet de modifier le comportement de tri. Le tableau d’origine est modifié. Valeur de retour: true.

arsort(&$array, $flags = SORT_REGULAR) : trie les valeurs d’un tableau en ordre décroissant, en conservant l’association clé-valeur. Le deuxième paramètre est optionnel, il permet de modifier le comportement de tri. Le tableau d’origine est modifié. Valeur de retour: true.

ksort(&$array, $flags = SORT_REGULAR) : trie les clés d’un tableau sur place en ordre croissant, en conservant l’association clé-valeur. Le deuxième paramètre est optionnel, il permet de modifier le comportement de tri. Le tableau d’origine est modifié. Valeur de retour: true.

krsort(&$array, $flags = SORT_REGULAR) : trie les clés d’un tableau sur place en ordre décroissant, en conservant l’association clé-valeur. Le deuxième paramètre est optionnel, il permet de modifier le comportement de tri. Le tableau d’origine est modifié. Valeur de retour: true.

<?php

$mountains = array('Asia' => 'Everest', 'Africa' => 'Kilimandjaro', 'America' => 'Denali');
if (array_key_exists('Asia', $mountains)) ksort($mountains); // si array_key_exists est true, ksort se met en place
var_dump($mountains);

//array(3) {
//["Africa"]=>
//string(12) "Kilimandjaro"
//["America"]=>
//string(6) "Denali"
//["Asia"]=>
//string(7) "Everest"
//}
?>

La différence entre sort, rsort avec asort, arsort, ksort et krsort est que sort et rsort modifie lassociation clé => valeur alors que les 4 autre non.