<?php
session_start();

if (!isset($_SESSION['initial_chances'])) {
    $_SESSION['initial_chances'] = 10;
}
if (!isset($_SESSION['chances'])) {
    $_SESSION['chances'] = $_SESSION['initial_chances'];
}
if (!isset($_SESSION['player2'])) {
    $_SESSION['player2'] = 'Joueur 2';
}
if (!isset($_SESSION['word'])) {
    $_SESSION['word'] = ''; 
}
if (!isset($_SESSION['used_letters'])) {
    $_SESSION['used_letters'] = [];
}

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
        header("Location: /players-choice.php");
        exit;
    }

    if (isset($_POST['letter-selector'])) {
        $selected_letter = strtoupper($_POST['letter-selector']);

        if (!in_array($selected_letter, $used_letters)) {
            $_SESSION['used_letters'][] = $selected_letter;
            $used_letters[] = $selected_letter;

            $_SESSION['chances']--;
            $chances--;

            if ($_SESSION['chances'] <= 0) {
                $_SESSION['used_letters'] = [];
                $_SESSION['chances'] = $_SESSION['initial_chances'];
                header("Location: /game-over.php");
                exit;
            }

            $all_found = true;
            foreach ($word as $letter) {
                if (!in_array($letter, $used_letters)) {
                    $all_found = false;
                    break;
                }
            }
            if ($all_found) {
                header("Location: /victory.php");
                exit;
            }
        }
    }

    if (isset($_POST['guess'])) {
        $full_guess = strtoupper(trim($_POST['full-word-guess']));
        $_SESSION['chances']--;
        $chances--;

        if ($full_guess === strtoupper(implode('', $word))) {
            header("Location: /victory.php");
            exit;
        } else {
            if ($_SESSION['chances'] <= 0) {
                $_SESSION['used_letters'] = [];
                $_SESSION['chances'] = $_SESSION['initial_chances'];
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
    <link rel="stylesheet" href="style.css">
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
    <?php include 'footer.php'; ?>
</body>

</html>
