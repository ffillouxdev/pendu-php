<?php
session_start();
require 'pdo.php';

if (isset($_POST['new_game'])) {
    $nom_joueur1 =  $_SESSION['player1'];
    $nom_joueur2 = $_SESSION['player2'];
    $mot = isset($_SESSION['word']) ? $_SESSION['word'] : 'Mot inconnu';
    $nb_chances = isset($_SESSION['initial_chances']) ? $_SESSION['initial_chances'] : 0;
    $victoire = true;

    post_all_data($pdo, $nom_joueur1, $nom_joueur2, $mot, $nb_chances, $victoire);

    $_SESSION['word'] = '';
    $_SESSION['used_letters'] = [];
    header("Location: /myproject/TP-pendu/index.php");
    exit;
}
?>


<!-- victory.php -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/myproject/TP-pendu/style/style.css">
    <title><?php echo isset($title) ? $title : 'Hangman Game'; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="http://localhost/myproject/TP-pendu/assets/favicon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <div class="victory-container">
            <h1>Félicitations !</h1>
            <p>Vous avez gagné ! Le mot était <strong><?php echo htmlspecialchars($_SESSION['word']); ?></strong>.</p>
            <form action="" method="POST">
                <button class="btn-yellow" name="new_game">Nouvelle partie</button>
            </form>
        </div>
    </main>

    <?php include './components/footer.php'; ?>
</body>

</html>