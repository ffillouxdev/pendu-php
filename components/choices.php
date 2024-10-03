<div class="container-choices">
    <h2><?php echo htmlspecialchars($gamer1) . " c’est à toi !"; ?></h2>
    <form action="" method="POST" class="choices-form-container">
        <input type="text" placeholder="Veuillez saisir le mot que votre ami devra trouver !" name="word">
        <input type="text" placeholder="Combien de chance laissez-vous à votre ami ?" name="chances">
        <button>CONFIRMER</button>
    </form>
    <div class="loading-process">
        <div class="step active"></div>
        <div class="step active"></div>
        <div class="step not-active"></div>
    </div>
</div>