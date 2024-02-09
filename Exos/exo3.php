<?php

$agePatron = "60";
if ($agePatron < 60)
  echo "Encore loin de la retraite";
elseif ($agePatron < 64)
  echo "Tu t'en rapproche";
elseif ($agePatron = 64)
  echo "C'est pour cette année";
else 
  echo "C'est bon";
?>

<?php

$age = 69;

switch($age) {
  case ($age < 60 && $age > 0):
    echo "Encore loin de la retraite";
    break;
  case ($age < 64 && $age >= 60):
    echo "Tu t'en rapproche";
    break;
  case ($age == 64):
    echo "C'est pour cette année";
    break;
  default :
    echo "C'est deja l'heure";
}