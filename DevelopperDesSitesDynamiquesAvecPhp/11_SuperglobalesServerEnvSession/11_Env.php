<?php

$dbhost = $_ENV['DB_HOST'] = 'localhost';
$dbname = $_ENV['DB_NAME'] = 'env';
$dbuser = $_ENV['DB_USER'] = 'admin';
$dbpassword = $_ENV['DB_PASSWORD'] = 'admin';

echo $dbhost."\n";

// pour se connecter a une base de données il faut utiliser une bdo

try {
  $pdo = new PDO("mysql:$dbhost;dbname:$dbname",$dbuser, $dbpassword);
  echo "Connexion a la base de donnée";
}
catch (PDOexception $e) {
  echo "Erreur de connexion a la base de donnée". $e->getMessage();
}

/*
Pour l'objet PDO :

public function __construct(
    string $dsn, // « mysql : nom du domaine ;dbname :nom de la base de données »
    string|null $username = $dbuser,
    string|null $password = $dbpassword,
    array|null $options = null
*/