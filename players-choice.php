<?php
session_start();
$gamer1 = isset($_SESSION['player1']) ? $_SESSION['player1'] : 'Joueur 1';

if (isset($_POST['reset'])) {
    header("Location: /index.php");
    exit;
}

// Nouvelle partie
if (isset($_POST['new_game'])) {
    header("Location: /index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = htmlspecialchars($_POST['word']);
    $chances = isset($_POST['chances']) ? htmlspecialchars($_POST['chances']) : 10;   
    $_SESSION['initial_chances'] = isset($_POST['chances']) ? htmlspecialchars($_POST['chances']) : 10;

    $_SESSION['word'] = strtoupper($word);
    $_SESSION['chances'] = $chances;  

    header("Location: /myproject/TP-pendu/hangman.php");
    exit;
}

?>


<!-- players-choice.php -->
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
        <div class="flex-container">
            <div class="flex-container-section">
                <section class="section-container">
                    <div class="top-right-div">
                        <form action="" method="POST" style="display: inline;">
                            <button class="btn-yellow" name="reset">Reset partie</button>
                        </form>
                        <form action="" method="POST" style="display: inline;">
                            <button class="btn-gray" name="new_game">Nouvelle partie</button>
                        </form>
                    </div>
                    <?php include './components/choices.php'; ?>
                </section>
                <div class="player-stats">
                    <?php include './components/players_stats.php'; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include './components/footer.php'; ?>
</body>

</html>