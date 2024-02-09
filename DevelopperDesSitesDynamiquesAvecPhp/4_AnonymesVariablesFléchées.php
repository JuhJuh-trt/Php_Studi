<?php
function reverseBoolean() {
	if (true) {
		return false;
	} 
  return true;
};
$opposite = 'reverseBoolean';
$opposite(true);
// Une fonction variable est une variable dont la valeur correspond au nom d’une fonction. Si la variable est suivie de parenthèses, PHP comprend qu’il s’agit d’un appel de fonction et recherche dans le code la fonction du même nom afin de l’exécuter.
?>

<?php
$numbers = [1, 2, 3];
$doubles = array_map(function($element) {
	return $element * 2;
}, $numbers);
// Dans cet exemple, on voit que le premier argument de la fonction array_map() est une fonction anonyme, qui multiplie par 2 chaque élément du tableau passé en deuxième argument.

$number = [1, 2, 3];
$double = array_map(fn($elements) => $elements * 2, $number);
// Si l’on reprend l’exemple précédent, mais que la fonction anonyme est écrite cette fois-ci comme une fonction fléchée