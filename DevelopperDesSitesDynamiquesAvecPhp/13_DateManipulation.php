<!-- Ajouter des jours ou des mois -->

<?php
$Date = "2023-03-27";
echo date('Y-m-d', strtotime($Date. ' + 1 days'))."|";
echo date('Y-m-d', strtotime($Date. ' + 1 months'));
// 2023-03-28|2023-04-27
?>

<!-- Comparaison de dates -->

<?php
/* Méthode 1 */
$Date1 = "2023-03-27";
$Date2 = "2023-04-01";

if($Date1>$Date2){
  echo "la date 1 est plus récente";
}else{
  echo "la date 2 est plus récente"; // <-
}

/* Méthode 2 */

$Date1 = "2023-03-27";
$Date2 = "2023-04-01";

if(strtotime($Date1)>strtotime($Date2)){
  echo "la date 1 est plus récente";
}else{
  echo "la date 2 est plus récente"; // <-
}

/* Méthode 3 */

$Date1 = new DateTime("2023-03-27");
$Date2  =  new DateTime("2023-04-01");
$Date1format = $Date1->format("d/m/Y");
$Date2format = $Date2->format("d/m/Y");

if($Date1 > $Date2){
	echo "La date 1 : ".$Date1format." est supérieur à la date 2 :".$Date2format.".";
} else {
	echo "La date 2 : ".$Date2format." est supérieur à la date 1 :".$Date2format."."; // La date 2 : 01/04/2023 est supérieur à la date 1 :01/04/2023.
}
?>

<!-- Comment calculer l’intervalle de jour entre deux dates ? -->

<?php
$start = date_create('2023-03-27');
$end = date_create('2023-04-02');
$nbdays = date_diff($start, $end);
echo $nbdays->format("%d"); // 6
?>

<!-- Comment savoir si un jour est un week-end ? -->

<?php
$date = '2022-06-15';
$weekendday = date('N', strtotime($date));

if ($weekendday >= 6) {
  echo 'la date est un weekend';
} else {
  echo "la date n'est pas un weekend";
}
?>

<!-- Exemple exo -->

<?php
$start = date_create('2023-05-10');
$end = date_create('2023-05-04');
if(strtotime($start)>strtotime($end)) {
  // fonction
}

/* Ce if ne fonctionne pas car la fonction strtotime ne prend qu'une chaine de caractère, or la il lui est attribué "date_create('Y-m-d') */