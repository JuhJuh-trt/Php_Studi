<!-- Attaque par injection de fichier -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
</head>
<body>
    <h1>Formulaire</h1>
    <form action="traitement.php" method="post">
        <label for="user_input">Entrez une valeur :</label>
        <input type="text" id="user_input" name="user_input" required><br><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>

<?php
// On récupère la valeur du champ "user_input" envoyé en POST depuis le formulaire HTML
$user_input = $_POST['user_input'];
// On filtre la valeur du champ "user_input" avec la fonction filter_input() pour supprimer les caractères indésirables
$sanitized_input = filter_input(INPUT_POST, 'user_input', FILTER_SANITIZE_STRING); // remplacé par htmlspecialchars

/*La fonction filter_input() prend trois arguments :
        - Le type d'entrée (INPUT_POST pour un formulaire POST),
        - Le nom de l'entrée (user_input dans notre exemple),
        - Le filtre à appliquer (FILTER_SANITIZE_STRING pour supprimer les balises HTML et les caractères spéciaux).
*/
?>

<!-- Attaque par SQL -->

<?php
//On définit la source de données (DSN) qui permettra de se connecter à la base de données
$dsn = "mysql:host=localhost;dbname=mydb;charset=utf8mb4";
// On définit les options pour la connexion PDO, notamment le mode d'erreur à utiliser en cas de problème
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];
// On crée une nouvelle instance de PDO en utilisant les informations de connexion précédemment définies
$pdo = new PDO($dsn, "username", "password", $options);
?>




<form action="votrelienduscript.php" method="post">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" name="username" id="username" required>
    <input type="submit" value="Rechercher">
</form>
<?php
// On récupère la valeur du champ "username" envoyé en POST depuis le formulaire HTML
$user_input = $_POST['username'];
// On prépare une requête SQL pour sélectionner tous les utilisateurs ayant pour nom d'utilisateur celui envoyé depuis le formulaire
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
// On exécute la requête en passant le nom d'utilisateur comme paramètre
$stmt->execute(['username' => $user_input]);
// On récupère le résultat de la requête sous forme d'un tableau associatif
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

/*
Ce code permet de filtrer une entrée utilisateur pour éviter les attaques par injection SQL.
    - $user_input récupère la valeur de l'entrée utilisateur à partir de $_POST['username'].
    - $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username"); cette requête utilise une variable de liaison ":username" pour représenter la valeur de l'entrée utilisateur dans la clause WHERE de notre requête SELECT.
    - ->execute permet d'exécuter la requête en remplaçant les paramètres liés (dans ce cas-ci, :username) par les valeurs spécifiées dans le tableau associatif passé en argument.
    - fetchAll() est appelée sur l'objet de requête préparée $stmt pour récupérer tous les résultats de la requête sous la forme d’un tableau associatif.
*/
?>

<!-- Exemple -->

<form action="votrelienduscript.php" method="post">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>
    <input type="submit" value="Connexion">
</form>
<?php 
$username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
// Connexion a la bdd 
$dsn  = "mysql:host=localhost;dbname=faille;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]; 
// requete prepare 
$pdo = new PDO ($dsn, 'admin', 'admin', $options);
$pdo_prep = $pdo->prepare("SELECT * from user WHERE username = ? AND password = ? ");
$pdo_prep->execute([$username,$password]);
$user = $pdo_prep->fetch();

if ($user) {
echo "<br>"; 
echo " Bienvenue " .$user['username'] . "!";
} else {
    echo " Nom d'utilisateur ou mot de passe incorrect";
}
?>


<!-- Eviter les injections de commande -->

<?php

// Initialiser les variables d'erreur
$commandErr = ""; // message d’erreur
$output = ""; // valeur de sortie
$command =" "; // champ commande

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Valider et filtrer l'entrée utilisateur
    if (isset($_POST["command"])) {
        $commandErr = "La commande est requise";
    } else {
        $command = test_input($_POST["command"]);
    // Vérifier que l'entrée utilisateur ne contient que des caractères alphanumériques et des espaces
    if (!preg_match('/^[a-zA-Z0-9\s]+$/', $command)) {
        // ^ : debut de chaine
        // [a-zA-Z0-9\s] : correspond à n'importe quel caractère alphanumérique (lettre ou chiffre) ou espace
        // + : signifie que le motif précédent doit être présent au moins une fois.
        // $ : fin de la chaîne
        $commandErr = "L'entrée utilisateur n'est pas valide";
    }
}
    // Exécuter la commande si l'entrée utilisateur est valide
    if ($commandErr == "") {
    // Exécuter la commande en utilisant la fonction shell_exec() via un terminal
        $output = shell_exec($command);
    }
}
// Fonction pour filtrer les données d'entrée utilisateur
function test_input($data) {
    $data = trim($data); // trim() supprime les espaces en début et fin de chaîne
    $data = stripslashes($data); // stripcslashes() supprime les antislashs
    $data = htmlspecialchars($data); // htmlspecialchars() convertit les caractères spéciaux en entités HTML
    return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exemple de formulaire pour éviter l'injection de commande</title>
</head>
<body>
<h2>Exemple de formulaire pour éviter l'injection de commande</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  Commande: 
    <input type="text" name="command" value="<?php echo htmlspecialchars($command);?>">
    <span class="error"><?php echo $commandErr;?></span><br><br>
    <input type="submit" name="submit" value="Exécuter la commande">  
</form>
<div>
    <?php echo $output; ?>
</div>
</body>
</html>