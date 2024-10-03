<!-- game.php -->

<div class="container-game">
    <div class="container-game-content">
        <div class="game-infos">
            <h2><?php echo htmlspecialchars($gamer2) . " c’est à toi !"; ?></h2>
            <p class='game-text'><?php echo "Il te reste " . htmlspecialchars($chances) . " chance" . ($chances > 1 ? 's' : '') .  " pour trouver le mot..."; ?></p>
        </div>
        <div class="word-reveal">
            <?php
            $word_length = count($word);
            for ($i = 0; $i < $word_length; $i++) {
                echo "<span class='word-letter'>_ </span>";
            }
            ?>
        </div>
        <form action="" method="POST" class="game-form-container">
            <select name="letter-selector" class="letter-combobox">
                <?php
                $letters_available = range('A', 'Z');
                $letters_incorrect = $_SESSION['incorrect_letters'];
                $letters_to_display = array_diff($letters_available, $letters_incorrect);

                if (empty($letters_to_display)) {
                    echo "<option value=''>Aucune lettre disponible " . $count_letters . " </option>"; 
                } else {
                    foreach ($letters_to_display as $letter) {
                        echo "<option value='$letter'>$letter</option>";
                    }
                }
                ?>
            </select>

            <button>CONFIRMER</button>
        </form>
    </div>
    <div class="bottom-div">
        <hr class="loading-process-hr">
    </div>
</div>