<?php
// phpinfo();

$host = 'localhost';
$dbname = 'hangman_game';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}


// recupere toutes les donnees
function get_all_data($pdo)
{
    $stmt = $pdo->query('SELECT game_partie FROM hangman_game');
    // met les datas dans le tableau 
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function post_all_data($pdo, $nom_joueur1, $nom_joueur2, $mot, $nb_chances, $victoire)
{
    // on prepare la requete sql
    $stmt = $pdo->prepare('INSERT INTO hangman_game (nom_joueur1, nom_joueur2, mot, nb_chances, victoire) VALUES (?, ?, ?, ?, ?)');

    // on execute la requete avec les donnees fournies
    $stmt->execute([$nom_joueur1, $nom_joueur2, $mot, $nb_chances, $victoire]);
}
?>
