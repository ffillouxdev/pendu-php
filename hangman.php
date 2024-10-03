<?php
session_start();
if (!isset($_SESSION['chances'])) {
    $_SESSION['chances'] = 6;  
}
if (!isset($_SESSION['word'])) {
    $_SESSION['word'] = 'example';  
}
if (!isset($_SESSION['incorrect_letters'])) {
    $_SESSION['incorrect_letters'] = [];  
}

$gamer2 = isset($_SESSION['player2']) ? $_SESSION['player2'] : 'Joueur 2';
$chances = $_SESSION['chances'];
$word = isset($_SESSION['word']) ? str_split($_SESSION['word']) : [];
$incorrect_letters = isset($_SESSION['incorrect_letters']) ? $_SESSION['incorrect_letters'] : [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selected_letter = strtoupper($_POST['letter-selector']);
    
    // Vérifie si la lettre est dans le mot
    if (!in_array($selected_letter, $word)) {
        // Si la lettre est incorrecte, l'ajouter à la liste des lettres incorrectes
        if (!in_array($selected_letter, $incorrect_letters)) {
            $incorrect_letters[] = $selected_letter;
            $_SESSION['incorrect_letters'] = $incorrect_letters;

            // Réduire le nombre de chances
            if ($chances > 0) {
                $_SESSION['chances'] = --$chances;
            } else {
                // Reset game
                $_SESSION['chances'] = 6;
                $_SESSION['word'] = 'example';
                $_SESSION['incorrect_letters'] = [];
                header("Location: /game-over.php");
                exit;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title><?php echo isset($title) ? $title : 'Hangman Game'; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" href="assets/favicon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <div class="flex-container">
            <div class="flex-container-section">
                <section class="section-container">
                    <div class="top-right-div">
                        <button>Reset partie</button>
                        <button>Nouvelle partie</button>
                    </div>
                    <?php include './components/game.php'; ?>
                </section>
                <div class="player-stats">
                    <?php include './components/players_stats.php'; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>

</html>
