<?php
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

// Récupère toutes les données de la table game_partie
function get_all_data($pdo)
{
    $stmt = $pdo->query('SELECT * FROM game_partie');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function post_all_data($pdo, $nom_joueur1, $nom_joueur2, $mot, $nb_chances, $victoire)
{

    
    $heure = date('H:i:s');
    $stmt = $pdo->prepare('INSERT INTO game_partie (heure, player_name1, player_name2, number_of_chances, word_found, victory) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$heure, $nom_joueur1, $nom_joueur2, $nb_chances, $mot, $victoire]);
}
?>
