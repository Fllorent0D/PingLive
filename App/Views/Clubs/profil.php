<?php
$js_to_include = ["profil"];

$title_for_layout = "Informations clubs - ".$infos->nom;?>
<div class="row">

    <div class="col s12 m12 l4">
        <div class="card">

            <div class="card-content center-align">

                <p class="m-t-lg flow-text"><?= $infos->nom ?> </p>
                <div class="chip m-t-sm blue-grey white-text"><?= count($listM) + count($listF) ?> Joueurs</div>
                <div class="chip m-t-sm blue-grey white-text"><?= $infos->equipes_mes + $infos->equipes_dam ?> équipes</div>
                <div class="chip m-t-sm blue-grey white-text"><?= count($responsables) ?> Responsables</div>
                <div class="chip m-t-sm blue-grey white-text"><?= $infos->province ?></div>
            </div>
            <div id="map" style="height: 225px" latitude="<?= $infos->latitude ?>" longitude="<?= $infos->longitude ?>"></div>

        </div>
        <div class="card">
            <div class="card-content ">
                <span class="card-title">Contact Info</span>
                <table id="informations">
                    <tbody>
                    <tr>
                        <th style="width: 50%">Email</th>
                        <td id="email"><?= $infos->email ?></td>
                    </tr>
                    <tr>
                        <th>Adresse</th>
                        <td id="adresse"><?= $infos->adresse ?></td>
                    </tr>
                    <tr>
                        <th>Code postal</th>
                        <td id="code_postal"><?= $infos->code_postal ?></td>
                    </tr>
                    <tr>
                        <th>Téléphone</th>
                        <td id="telephone"><?= $infos->telephone ?></td>
                    </tr>
                    <tr>
                        <th>Semelles noires</th>
                        <td id="semelles_noirs"><?= $infos->semelles_noirs ?></td>
                    </tr>
                    <tr>
                        <th>Accès valide</th>
                        <td id="acces_valide"><?= $infos->acces_valide ?></td>
                    </tr>
                    <tr>
                        <th>Balles blanches</th>
                        <td id="balles_blanches"><?= $infos->balles_blanches ?></td>
                    </tr>
                    <tr>
                        <th>Balles jaunes</th>
                        <td id="balles_jaunes"><?= $infos->balles_jaunes ?></td>
                    </tr>
                    <tr>
                        <th>Table vertes</th>
                        <td id="tables_vertes"><?= $infos->tables_vertes ?></td>
                    </tr>
                    <tr>
                        <th>Table bleues</th>
                        <td id="tables_bleues"><?= $infos->tables_bleues ?></td>
                    </tr>
                    <tr>
                        <th>Nombre de tables</th>
                        <td id="nombre_tables"><?= $infos->nombre_tables ?></td>
                    </tr>
                    <tr>
                        <th>Remarque</th>
                        <td id="remarques"><?= $infos->remarques ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php foreach ($responsables as $personne): ?>
            <div class="col s12 m6 l6">
                <div class="card">
                    <div class="card-content">
                    <span class="card-title" style="font-size: 14px; margin-bottom: 0px;"><?= $personne->prenom . " " .$personne->nom ?>
                    </span>
                        <?php foreach ($personne->fonction as $fonc): ?>
                            <span class="chip small" style="height: 25px; border-radius: 10px; line-height: 25px"><?= $fonc ?></span>
                        <?php endforeach;?>
                        <p><?= $personne->email ?></p>
                        <p><?= $personne->telephone ?></p>
                    </div>
                </div>
            </div>



        <?php endforeach; ?>


    </div>
    <div class="col s12 l4">
        <div class="card">
            <div class="card-content ">
                <span class="card-title">Listes de force</span>
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
                            <li class="tab col s3"><a href="#test1" class="">Messieurs</a></li>
                            <li class="tab col s3"><a class="" href="#test2">Dames</a></li>

                        </ul>
                    </div>
                    <div id="test1" class="col s12">
                        <table>
                            <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Index</th>
                                <th>Nom</th>
                                <th>Classement</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listM as $joueur): ?>
                            <tr>
                                <td><?= $joueur->nu1 ?></td>
                                <td><?= $joueur->nu2 ?></td>
                                <td><?= $joueur->nom ?></td>
                                <td><?= $joueur->classement ?></td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div id="test2" class="col s12">
                        <table>
                            <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Index</th>
                                <th>Nom</th>
                                <th>Classement</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($listF as $joueur): ?>
                                <tr>
                                    <td><?= $joueur->nu1 ?></td>
                                    <td><?= $joueur->nu2 ?></td>
                                    <td><?= $joueur->nom ?></td>
                                    <td><?= $joueur->classement ?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <div class="col s12 m12 l4" style="padding: 0">
        <div class="card card-transparent">
            <div class="card-content" style="padding: 0px;">

                <ul class="collapsible popout collapsible-accordion" data-collapsible="accordion">
                    <?php foreach ($equipes as $equipe): ?>
                    <li>
                        <div class="collapsible-header"><div class="chip">Equipe <?= $equipe->lettre ?></div><?= $equipe->nom ?> <?= $equipe->serie ?></div>
                        <div class="collapsible-body white " style="padding: 20px">
                            <span class="chip">75%</span>

                            <table class="striped">
                                <thead>

                                </tbody>
                            </table>
                        </div>
                    </li>
                    <?php endforeach;?>

                </ul>
            </div>

        </div>
    </div>
</div>
