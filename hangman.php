<?php
session_start();

$gamer2 = htmlspecialchars($_SESSION['player2']);
$chances = $_SESSION['chances'];
$word = isset($_SESSION['word']) ? str_split($_SESSION['word']) : [];
$used_letters = $_SESSION['used_letters'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reset'])) {
        $_SESSION['used_letters'] = [];
        $_SESSION['chances'] = $_SESSION['initial_chances'];
    }

    if (isset($_POST['new_game'])) {
        $_SESSION['used_letters'] = [];
        $_SESSION['word'] = '';
        header("Location: /myproject/TP-pendu/players-choice.php");
        exit;
    }

    if (isset($_POST['letter-selector'])) {
        $selected_letter = strtoupper($_POST['letter-selector']);

        if (!in_array($selected_letter, $used_letters)) {
            $_SESSION['used_letters'][] = $selected_letter;
            $used_letters[] = $selected_letter;

            
            if ($_SESSION['chances'] < 1) {
                $_SESSION['used_letters'] = [];
                $_SESSION['chances'] = $_SESSION['initial_chances'];
                header("Location: /myproject/TP-pendu/game-over.php");
                exit;
            }
            
            $_SESSION['chances']--;
            $chances--;

            $all_found = true;
            foreach ($word as $letter) {
                if (!in_array($letter, $used_letters)) {
                    $all_found = false;
                    break;
                }
            }
            if ($all_found) {
                header("Location: /myproject/TP-pendu/victory.php");
                exit;
            }
        }
    }

    if (isset($_POST['guess'])) {
        $full_guess = strtoupper(trim($_POST['full-word-guess']));
        
        if ($full_guess === strtoupper(implode('', $word))) {
            header("Location: /myproject/TP-pendu/victory.php");
            exit;
        } else {
            if ($_SESSION['chances'] < 1) {
                $_SESSION['used_letters'] = [];
                $_SESSION['chances'] = $_SESSION['initial_chances'];
                header("Location: /myproject/TP-pendu/game-over.php");
                exit;
            }
        }
        $_SESSION['chances']--;
        $chances--;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/myproject/TP-pendu/style/style.css">
    <link rel="icon" href="http://localhost/myproject/TP-pendu/assets/favicon.ico">
    <title><?php echo isset($title) ? htmlspecialchars($title) : 'Hangman Game'; ?></title>
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
                    <?php include './components/game.php'; ?>
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