https://www.php.net/manual/fr/ref.datetime.php
https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/obtenir-formater-date/

d : correspond au jour de 01 a 31
j : correspond au jour sans 0 initial de 1 a 31
D : correspond au jour de la semaine en 3 lettres (en anglais)
z : correspond au jour dans l'année de 0 a 364/365
l : correspond au jour hebdomadaire en anglais ( Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday)
N : correspond au jour de la semaine en chiffre au format ISO-8601 (lundi = 1, dimanche = 7)
w : correspond au jour de la semaine en chiffre de 0 a 6 en commencant la semaine par dimanche (dimanche = 0, samedi = 6)
m : correspond au mois de 01 a 12
F : correspond au mois en texte (Januar, February, March, April, May etc...)
t : correspond au nombre de jours dans le mois de 28 a 31
n : correspond au format numérique du mois sans 0 de 1 a 12
L : retourne si l'année est bissextile 1 si oui et 0 si non 
W : correspond au numéro de la semaine au format ISO-8601 (les semaines commencent le lundi)
Y : correspond a l'année en 4 chiffres
h : correspond a l'heure au format 12H avec zero initial de 00 a 12
g : correspond a l'heure au format 12H sans le 0 initial de 0 a 12
H : correspond a l'heure au format 24H avec zero initial de 00 a 24
G : correspond a l'heure au format 24H sans le 0 initial de 0 a 24 
i : pour les minutes avec 0 de 00 a 59
s : pour les secondes avec 0 de 00 a 59
y : correspond a l'année en deux chiffres, par exemple 24 pour 2024
a : ajoute am ou pm a l'heure 
A : ajoute AM ou PM a l'heure 
P : Indique la différence d’heures avec l’heure GMT avec deux points, ex : +01:00
c : représente la date compléte au format ISO 8601, ex : 2019-01-25T12:00:00+01:00
I : renvoie 1 si l'heure d'été est avctivée, sinon 0

UNIX : le nombre de secondes depuis le 1er janvier 1970 00:00:00 UTC

<?php
$date1 = date("m.d.y");                                                
$date2 = date("Ymd");                                  
$date3 = date("H:i:s");                          
$date4 = date("Y-m-d H:i:s");  
$date5 = date("d l F Y");  
$date6 = date("L");
$date7 = date("z");

if($date6!=0){
    $responds="Oui";
}else{
    $responds="Non";
}


echo "date 1 :".$date1."\n"; // 02.15.24
echo "date 2 :".$date2."\n"; // 20240215
echo "date 3 :".$date3."\n"; // 09:46:46
echo "date 4 :".$date4."\n"; // 2024-02-15 09:46:46
echo "date 5 :".$date5."\n"; // 15 Thursday February 2024
echo "date 6 : l'année est-elle bissextile ? ".$responds."\n"; // Oui
echo $date7."\n";

// Methode time()
echo time()."\n"; // 1707988028 secondes écoulées depuis le 1er Janvier 1970 a 00h00 et 00s = format UNIX

// Methode gmdate()
echo "La date d'aujourd'hui au format GMT :".gmdate("d/m/Y")."\n"; // 15/02/2024 

// Methode getdate()
print_r(getdate()); // print_r car c'est un tableau
/* Array
(
    [seconds] => 33
    [minutes] => 9
    [hours] => 10
    [mday] => 15
    [wday] => 4
    [mon] => 2
    [year] => 2024
    [yday] => 45
    [weekday] => Thursday
    [month] => February
    [0] => 1707988173
) */

// Methode mktime = format UNIX
date("M-d-Y", mktime(0, 0, 0, 9, 06, 1992)); // retourne en format timestamp soit 06-09-1992
/*
mktime(
    int $hour,
    ?int $minute = null,
    ?int $second = null,
    ?int $month = null,
    ?int $day = null,
    ?int $year = null
): int|false
*/

// La méthode gmmktime
date("M-d-Y", gmmktime(0, 0, 0, 9, 06, 1992)); // retourne en format timestamp la date GMT

// La méthode strtotime()
strtotime("09 June 1992"); // 708048000 = UNIX

// La méthode checkdate
var_dump(checkdate(2, 29, 2023)); // non car fevrier n'a que 28 jour en 2023
var_dump(checkdate(2, 29, 2024));

?>