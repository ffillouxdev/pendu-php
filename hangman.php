<?php
session_start();

$gamer2 = isset($_SESSION['player2']) ? $_SESSION['player2'] : 'Joueur 2';
$old_chances = 6; 
$chances = isset($_SESSION['chances']) ? $_SESSION['chances'] : $old_chances;
$word = isset($_SESSION['word']) ? str_split($_SESSION['word']) : [];
$incorrect_letters = isset($_SESSION['incorrect_letters']) ? $_SESSION['incorrect_letters'] : [];
$correct_letters = isset($_SESSION['correct_letters']) ? $_SESSION['correct_letters'] : [];

// Réinitialiser la partie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reset'])) {
        $_SESSION['chances'] = $old_chances;
        $_SESSION['incorrect_letters'] = [];
        $_SESSION['correct_letters'] = [];
    }

    // Nouvelle partie
    if (isset($_POST['new_game'])) {
        header("Location: /index.php");
        exit;
    }

    // Sélection de lettre
    if (isset($_POST['letter-selector'])) {
        $selected_letter = strtoupper($_POST['letter-selector']);

        // Si la lettre est correcte
        if (in_array($selected_letter, str_split($_SESSION['word']))) {
            if (!in_array($selected_letter, $_SESSION['correct_letters'])) {
                // Ajoute la lettre correcte
                $_SESSION['correct_letters'][] = $selected_letter;
            }
        } else {
            // Si la lettre est incorrecte
            if (!in_array($selected_letter, $_SESSION['incorrect_letters'])) {
                // Ajoute la lettre incorrecte
                $_SESSION['incorrect_letters'][] = $selected_letter; 

                // Réduit le nombre de chances
                $_SESSION['chances']--; 

                // Si le joueur n'a plus de chances, réinitialiser le jeu
                if ($_SESSION['chances'] <= 0) {
                    header("Location: /game-over.php");
                    exit;
                }
            }
        }
    }

    // Deviner le mot complet
    if (isset($_POST['guess'])) {
        $full_guess = strtoupper(trim($_POST['full-word-guess'])); 
        if ($full_guess === strtoupper($_SESSION['word'])) {
            // Si le mot deviné est correct
            $_SESSION['correct_letters'] = str_split($_SESSION['word']); 
        } else {
            $_SESSION['chances']--; 

            if ($_SESSION['chances'] <= 0) {
                // Si le joueur n'a plus de chances
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
</head>
<body>
    <main>
        <div class="flex-container">
            <div class="flex-container-section">
                <section class="section-container">
                    <div class="top-right-div">
                        <form action="" method="POST" style="display: inline;">
                            <button name="reset">Reset partie</button>
                        </form>
                        <form action="" method="POST" style="display: inline;">
                            <button name="new_game">Nouvelle partie</button>
                        </form>
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
