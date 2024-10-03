<?php
session_start();
$gamer1 = isset($_SESSION['player1']) ? $_SESSION['player1'] : 'Joueur 1';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = isset($_POST['word']) ? htmlspecialchars($_POST['word']) : '';
    $chances = isset($_POST['chances']) ? htmlspecialchars($_POST['chances']) : '';

    $_SESSION['word'] = $word;
    $_SESSION['chances'] = $chances;

    header("Location: /hangman.php");
    exit;
}
?>


<!-- players-choice.php -->
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
                    <?php include './components/choices.php'; ?>
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