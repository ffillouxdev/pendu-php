<?php
session_start();
require 'pdo.php';

if (isset($_POST['new_game'])) {
    $nom_joueur1 = isset($_SESSION['player1']) ? $_SESSION['player1'] : 'Joueur 1';
    $nom_joueur2 = isset($_SESSION['player2']) ? $_SESSION['player2'] : 'Joueur 2';
    $mot = isset($_SESSION['word']) ? $_SESSION['word'] : 'Mot inconnu';
    $nb_chances = isset($_SESSION['chances']) ? $_SESSION['chances'] : 0;
    $victoire = false;  

    post_all_data($pdo, $nom_joueur1, $nom_joueur2, $mot, $nb_chances, $victoire);

    $_SESSION['word'] = '';
    $_SESSION['used_letters'] = [];
    
    header("Location: /index.php");
    exit;
}
?>


<!-- game-over.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo isset($title) ? $title : 'Hangman Game'; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="assets/favicon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <div class="game-over-container">
            <h1>Désolé !</h1>
            <p>Vous avez perdu ! Le mot était <strong><?php echo htmlspecialchars($_SESSION['word']); ?></strong>.</p>
            <form action="" method="POST">
                <button class="btn-yellow" name="new_game">Nouvelle partie</button>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>