<?php
$notes = [] ;
for ($e=1 ; $e<=1000 ; $e++){
	$notes[$e] = [] ;
	for ($n=1 ; $n<=8 ; $n++){
		$notes[$e][$n]=random_int(0,20);
	}
}
//print_r($notes);

$recu =0;
foreach($notes as $e) {
  $moyenne = 0;
  foreach($e as $n){
    $moyenne += $n;
  }
  $moyenne = $moyenne / 8;
  if ($moyenne > 10) {
    $recu++;
  }
}
echo $recu;

?>

<?php
$t = 40;
while($t>0){
	for($i=($t-10);$i<$t;$i+=2){
		echo $i,"\n";
	}
	$t-=5;
}
?>