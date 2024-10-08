<!-- players_stats.php -->
<?php
require_once 'pdo.php'; 

$data = get_all_data($pdo);
?>
<div class="players_stats_container">
    <h1>Fiche des parties <br> précédentes</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Heure</th>
                <th>Nom du joueur 1</th>
                <th>Nom du joueur 2</th>
                <th>Nombre de chances</th>
                <th>Mot à trouver</th>
                <th>Victoire ?</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)): ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['heure']); ?></td>
                        <td><?php echo htmlspecialchars($row['player_name1']); ?></td>
                        <td><?php echo htmlspecialchars($row['player_name2']); ?></td>
                        <td><?php echo htmlspecialchars($row['number_of_chances']); ?></td>
                        <td><?php echo htmlspecialchars($row['word_found']); ?></td>
                        <td><?php echo $row['victory'] ? 'Victoire' : 'Défaite'; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucune partie enregistrée.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>