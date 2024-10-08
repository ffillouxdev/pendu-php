<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['reset']) && !isset($_POST['new_game'])) {
    $player1 = isset($_POST['player1']) ? htmlspecialchars($_POST['player1']) : '';
    $player2 = isset($_POST['player2']) ? htmlspecialchars($_POST['player2']) : '';
    $_SESSION['player1'] = $player1;
    $_SESSION['player2'] = $player2;

    header("Location:  /players-choice.php");
    exit;
}
?>
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
                    <?php include './components/start_game.php'; ?>
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