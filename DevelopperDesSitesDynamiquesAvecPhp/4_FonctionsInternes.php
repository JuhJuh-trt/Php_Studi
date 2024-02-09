<!-- Chaine de caractères -->

<?php
$sentence = "It's raining cats and dogs";
if (strlen($sentence) > 25) {
        $sentence = substr($sentence, 0, 17) . "...";
        echo $sentence;
}
else 
  echo $sentence;

// str_split() : convertit une chaîne de caractère en tableau associatif. Valeur de retour : le tableau.
// implode() : rassemble les éléments d'un tableau en une chaîne. Valeur de retour : la chaîne de caractère.
// explode() : scinde une chaîne de caractère selon le séparateur passé en argument, et retourne un tableau. Valeur de retour : le tableau.
// str_contains() : permet de vérifier si une chaîne contient la portion de chaîne passée en argument. Valeur de retour : booléen.
// str_replace() : permet de remplacer une sous-section d'une chaîne de caractère par une autre. Valeur de retour : une chaîne de caractère.
// str_repeat() : répète une chaîne de caractère le nombre de fois désirées. Valeur de retour : une nouvelle chaîne de caractère.
?>

<?php
$sentence = "It's raining cats and dogs";
$redactedSentence = str_replace(["cats","dogs"], "***", $sentence);
echo $redactedSentence;
?>

<!-- Les Tableaux -->

<?php
$animals = ['dogs', 'cats', 'birds'];
array_push($animals, 'horses', 'cows');
print_r($animals);

$animalsLength = count($animals);
// Etape 1 : quelle est la valeur de $animals ?
var_dump($animals);

$animalsSliced = array_slice($animals, 0, ($animalsLength - 1));
// Etape 2 : quelle est la valeur de $animals ?
var_dump($animals);

$animalsSpliced = array_splice($animals, $animalsLength - 2, 1, "ducks");
// Etape 3 : quelle est la valeur de $animals ?
var_dump($animals);
?>

<!-- Les fonctions mathématiques -->

<?php
$round = round(pi(), 3); // 3.142, coupe la décimale a "3" aprés la virgule
$floor = floor(pi()); // 3, soit arrondi a l'entier inférieur
$ceil = ceil(pi()); // 4, soit arrondi a l'entier supérieur


$grades = [12, 8, 18, 5, 14, 11];
echo "Les notes sont comprises entre " . min($grades) . " et " . max($grades) . ".";
print_r($grades);
var_dump($grades);
?>