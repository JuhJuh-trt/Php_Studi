<?php
echo 195,"\n" ; # un nombre entier écrit dans le système décimal
echo 0b101,"\n" ; # le nombre entier 101 écrit dans le système binaire correspond à 5 en décimal
echo 0o764,"\n" ; # le nombre entier 764 écrit dans le système octal correspond à 500 en décimal
echo 0x1F4,"\n" ; # le nombre entier 1F4 écrit dans le système hexa correspond à 500 en décimal
echo PHP_INT_MAX,"\n"; # cette constante correspond à la plus grande valeur entière
echo PHP_INT_MAX + 1 ,"\n"; # en ajoutant 1, le nombre n'est plus entier, mais flottant
echo 42.5,"\n" ; # un nombre décimal
echo 4.25e3,"\n" ; # un nombre décimal avec un exposant positif, ici 4250
echo 4.25e-3,"\n" ; # un nombre décimal avec un exposant négatif, ici 0.00425
# attention avec l'utilisation des float
echo 0.1+0.2,"\n"; # la somme de 0,1 et 0,2 vaut 0,3
var_dump(0.1+0.2); # en mémoire, ça ne vaut pas vraiment 0,3
echo 9.3-5.3,"\n"; # la différence de 9,3 par 5,3 vaut 4
var_dump(9.3-5.3); # en mémoire, ça ne vaut pas vraiment 4
?>

<?php
echo 'une simple chaîne de caractères', "\n" ;
echo 'et maintenant avec l\'apostrophe !',"\n" ;
echo <<<'MON_DELEMITEUR'
voici le début du texte
qui peut aller sur plusieurs lignes
et contenir des caractères spéciaux
comme l'apostrophe et la barre oblique inverse \
MON_DELEMITEUR;
$quantite = 12 ; # on affecte la valeur 12 à la variable $quantite
echo "\nCette boîte contient {$quantite} oeufs.\n" ;
echo "une\ttabulation" ; # le caractère spécial "\t" est une tabulation
echo <<<mon_identifiant_de_chaine
\nune chaîne avec\ndes\nlignes\nmultiples
ainsi que des variables interprétées :
{$quantite}
mon_identifiant_de_chaine;
?>

<?php
$tableau = [4,5.3,-8,"programmation",true]; # un tableau de 5 éléments sans clé explicite
echo $tableau[0],"\n"; # le premier élément du tableau, à l'indice 0, affiche 4
echo $tableau[3],"\n"; # le quatrième élément du tableau, à l'indice 3, affiche programmation
$tableau[3] = "PHP" ; # met à jour la valeur du quatrième élément du tableau, à l'indice 3
echo $tableau[3],"\n"; # le quatrième élément du tableau, à l'indice 3, affiche PHP
$tableau[] = "new !"; # ajoute un élément en fin de tableau avec la valeur indiquée
print_r($tableau); # affiche tout le contenu du tableau ; remarquez le dernier élément ajouté
# un tableau avec clés explicites
$famille = [
    "père"=>"jean",
    "mère"=>"marie",
    "grand-père_p"=>"antoine",
    "grand-mère_p"=>"alice",
    "grand-père_m"=>"franck",
    "grand_mère_m"=>"sarah"
];
echo $famille["père"],"\n" ; # la valeur de l'élément du tableau dont la clé est "père"
echo $famille["mère"],"\n" ; # la valeur de l'élément du tableau dont la clé est "mère"
# un tableau dont les valeurs sont des tableaux
$famille_bis = array(
    "père"=>"jean",
    "mère"=>"marie",
    "grand-père"=>array(
        "paternel"=>"antoine",
        "maternel"=>"franck"),
    "grand-mère"=>array(
        "paternel"=>"alice",
        "maternel"=>"sarah")
);
print_r($famille_bis); # affiche tout le contenu du tableau
?>

<?php
# on définit notre modèle de Livre avec nos 3 propriétés
class Livre{
    public $titre;
    public $auteur;
    public $parution;
}
# on crée une instance de Livre, puis on renseigne ses propriétés
$livre1 = new Livre();
$livre1->titre = "Voyage au Centre de la Terre"; # on renseigne le titre
$livre1->auteur = "Jules Vernes"; # on renseigne l’auteur
$livre1->parution = 1864 ; # on indique l’année
print_r($livre1); # on affiche le contenu de l’instance
?>

<?php
# on définit une nouvelle classe qui contient un constructeur
class Livre2{
    public $titre;
    public $auteur;
    public $parution;
    function __construct($t, $a, $p){
        $this->titre = $t;
        $this->auteur = $a;
        $this->parution = $p;
    }
}
# à la création de l’objet, on passe au constructeur les valeurs des propriétés
$livre2 = new Livre2("De la Terre à la Lune","Jules Vernes",1865);
print_r($livre2); # on affiche l’objet
?>