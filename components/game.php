<div class="container-game">
    <div class="game-infos">
        <h2><?php echo htmlspecialchars($gamer2) . " c’est à toi !"; ?></h2>
        <p class='game-text'><?php echo "Il te reste " . htmlspecialchars($chances) . " chances pour trouver le mot...";?></p>
    </div>
    <form action="" method="POST" class="game-form-container">
        <input type="text" placeholder="Veuillez saisir le mot que votre ami devra trouver !" name="word">
        <button>CONFIRMER</button>
    </form>
    <div class="loading-process">
        <div class="step active"></div>
        <div class="step active"></div>
        <div class="step active"></div>
    </div>
</div>