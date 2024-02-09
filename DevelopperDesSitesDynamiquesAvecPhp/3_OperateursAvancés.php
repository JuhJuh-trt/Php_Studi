<!-- Binaire -->

<?php
echo decbin("5"), "\n"; # affiche 101
echo decbin("8"), "\n"; # affiche 1000
echo decbin("15"), "\n"; # affiche 1111
echo decbin("32"), "\n"; # affiche 100000
echo bindec("1100"), "\n"; # affiche 12
echo bindec("10101"), "\n"; # affiche 21
echo bindec("100010"), "\n"; # affiche 34
echo bindec("111001"), "\n"; # affiche 57

//decbin signifie de decimal a binaire et bindec l'inverse
?>

<!-- operateurs sur bit -->

<?php
// « & », qui se prononce « et », et dont le résultat sera « 1 » seulement si les 2 opérandes valent « 1 ».
// « | », qui se prononce « ou », et dont le résultat sera « 0 » seulement si les 2 opérandes valent « 0 ».
// « ^ », qui se prononce « ou exclusif », et dont le résultat vaut « 1 » seulement si un des deux opérandes vaut « 1 », mais pas les deux en même temps.
// « ~ », qui se prononce « non », qui vaut le contraire de la donnée fournie.

echo 1&2, "\n"; # traduit en 01 & 10 = 00, affiche 0
echo 1|2, "\n"; # traduit en 01 | 10 = 11, affiche 3
echo 5^7, "\n"; # traduit en 101 ^ 111 = 010, affiche 2
echo ~0, "\n"; # correspond au nombre binaire qui contient que des "1", affiche -1
?>

<!-- les operateurs de comparaison -->

<?php
var_dump(true) ; # affiche bool(true)
var_dump(false) ; # affiche bool(false)
var_dump(2==1) ; # affiche le résultat du test "2 est-il égal à 1", soit bool(false)
var_dump(2>1) ; # affiche le résultat du test "2 est-il supérieur à 1", soit bool(true)
var_dump(2!=1) ; # affiche le résultat du test "2 est-il différent de 1", soit bool(true)
var_dump(2<=1) ; # affiche le résultat du test "2 est-il inférieur ou égale à 1", soit bool(false)

echo 6|3;
?>