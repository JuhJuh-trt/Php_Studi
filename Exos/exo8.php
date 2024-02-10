<!-- Solutions -->

<?php

/**
* Retourne tous les tokens (chaîne de caractères)
* se trouvant à l’intérieur d'un tag, tags exclus
* @param string $string La chaîne de caractères à analyser
* @param string $openingTag chaîne de caractères ouvrante du tag
* @param string $closingTag chaîne de caractères fermante du tag
* @return array La liste des tokens trouvés
*/
function findTokens(string $string, string $openingTag, string $closingTag): array
{
	$openingTagPosition = strpos($string, $openingTag);

	//S'il n'y a pas de balise ouvrante, on retourne une liste vide
	if ($openingTagPosition === false)
		return array();

	$tokens = array();

	//Solution itérative (boucle + variables d'état $tokens et 	$openingTagPosition mises à jour)
	while ($openingTagPosition !== false) {

		$closingTagPosition = strpos($string, $closingTag, $openingTagPosition + strlen($openingTag));

		$tokenLength = $closingTagPosition - ($openingTagPosition + strlen($openingTag));

		$token = substr($string, $openingTagPosition + strlen($openingTag), $tokenLength);

		$tokens[] = $token;

		$openingTagPosition = strpos($string, $openingTag, $closingTagPosition + strlen($openingTag));
	}

	return $tokens;
}
//Test
$abstract = 'Git is a fast, *scalable*, distributed revision control system with an unusually rich command set that provides both high-level operations and full access to internals. Git is an *Open Source project* covered by the *GNU General Public License* version 2 (some parts of it are under different licenses, compatible with the GPLv2). It was originally written by *Linus Torvalds* with help of a group of *hackers* around the net.';

print_r(findTokens($abstract, '*', '*'));

/**
* Retourne le nombre de tokens compris dans les balises ouvrante et fermante
* @param string $openingTag chaîne de caractères ouvrante du tag
* @param string $closingTag chaîne de caractères fermante du ta
* @return int Le nombre de tokens trouvés
*/
function countTokensBetweenTags(string $string, string $openingTag, string $closingTag): int
{

// Condition d'arrêt: longueur de la chaîne à analyser est égale à 0
	if (strlen($string) === 0)
		return 0;

	$openingTagPosition = strpos($string, $openingTag);
	$closingTagPosition = strpos($string, $closingTag, $openingTagPosition + strlen($openingTag));

	//Condition d'arrêt: absence de balise ouvrante ou absence de balise fermante (input mal formée)
	if ($openingTagPosition === false || $closingTagPosition === false)
	return 0;

	$offset = $closingTagPosition + strlen($closingTag);

	//On extrait la chaîne restante, située après la dernière balise fermante: problème plus petit
	$substr = substr($string, $offset);

	//On appelle la fonction de manière récursive sur le problème plus petit
	return 1 + countTokensBetweenTags($substr, $openingTag, $closingTag);
}
echo "Question 2: test" . PHP_EOL;
echo countTokensBetweenTags($abstract, '*', '*') . PHP_EOL;

?>


<!-- Ma version -->

<?php

$markdown = 'Git is a fast, *scalable*, distributed revision control system with an unusually rich command set that provides both high-level operations and full access to internals. Git is an *Open Source project* covered by the *GNU General Public License* version 2 (some parts of it are under different licenses, compatible with the GPLv2). It was originally written by *Linus Torvalds* with help of a group of *hackers* around the net.';

function balises($texte) {
  $decoupe = str_split($texte, 1);
  return $decoupe;
}
function findValuesInArray($array, $searchValue) {
    $keys = array_keys($array, $searchValue);
    return $keys;
}

$myArray = balises($markdown);
$searchValue = "*";
$input = findValuesInArray($myArray, $searchValue);

function odCmp($input){
  $cl = array();
  foreach ($input as $clé => $v) {
    if ($clé % 2 === 0) 
    $cl[$clé] = $v;
  }
  return $cl;
}
function evCmp($input){
  $im = array();
  foreach ($input as $clé => $v) {
    if ($clé % 2 !== 0)
    $im[$clé] = $v;
  }
  return $im;
}

$clePaire = odCmp($input);
$cleImpaire = evCmp($input);

function valeurCle($items) {
  $renverseItems = array_flip($items);
  return $renverseItems;
}

$clPaire = valeurCle($clePaire);
$clImpaire = valeurCle($cleImpaire);

function baOuv($array, $newValue) {
  $clé = array_keys($array);
  $em = array_fill_keys($clé, $newValue);
  return $em;
}
function baFem($array, $newValue) {
  $clé = array_keys($array);
  $emf = array_fill_keys($clé, $newValue);
  return $emf;
}
$ouv = "<em>";
$ferm = "</em>";
$balFerm = baOuv($clImpaire, $ferm);
$balOuv = baFem($clPaire, $ouv);

$assemblageBalises = $balFerm + $balOuv;
$assemblageFinal = $assemblageBalises + $myArray;
ksort($assemblageFinal);

function retourTexte($array) {
  $texte = implode('', $array);
  return $texte;
}

$text = retourTexte($assemblageFinal);
echo $text;

?>
