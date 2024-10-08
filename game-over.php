<?php
session_start();
?>


<!-- game-over.php -->
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
        <div class="game-over-container">
            <h1>Désolé !</h1>
            <p>Vous avez perdu ! Le mot était <strong><?php echo htmlspecialchars($_SESSION['word']); ?></strong>.</p>
            <form action="" method="POST">
                <a href="/index.php">Retour à l'accueil</a>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>