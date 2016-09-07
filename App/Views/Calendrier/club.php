<?php foreach ($equipes as $key => $equipe): ?>
<div class="col s12 m6">
    <div class="card white darken-1">
        <div class="card-content">
            <span class="card-title"><div class="chip">Equipe <?= $equipe->lettre ?></div><?= $equipe->nom ?> <?= $equipe->serie ?></span>
            <table class="highlight responsive-table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Visite</th>
                    <th>Visiteur</th>
                    <th>Score</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rencontres[$key] as $rencontre): ?>
                <tr>
                    <td><?= \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $rencontre->date_match)->format("d/m/Y"); ?></td>
                    <td><?= $rencontre->visite ?> <?= $rencontre->lettre_visite ?></td>
                    <td><?= $rencontre->visiteur ?> <?= $rencontre->lettre_visiteur ?></td>
                    <td>0 - 0</td>
                    <td></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>
<?php endforeach; ?>