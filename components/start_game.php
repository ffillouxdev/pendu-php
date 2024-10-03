<div class="start-game-container">
    <div class='consign-container'>
        <p class="consign-text1">
            Le jeu du pendu se joue entre deux joueurs : l'un pense à un mot secret et l'autre doit le deviner.
            Pour chaque lettre incorrecte proposée, vous avez une chance en moins, le nombre de chance est choisi par le deuxième joueur.
        </p>
        <p class="consign-text2">
            Si le mot est affiché avant que le nombre de chances soit à 0, le joueur gagne. Sinon, le joueur perd.
        </p>
    </div>
    <form action="" method="POST" class="start-form-container">
        <input type="text" name="player1" placeholder="Entrer votre Identifiant pour le joueur qui choisi le mot">
        <input type="text" name="player2" placeholder="Entrer votre Identifiant pour le joueur qui va jouer">
        <button type="submit">COMMENCER</button>
    </form>
    <div class="loading-process">
        <div class="step active"></div>
        <div class="step not-active"></div>
        <div class="step not-active"></div>
    </div>
</div>
