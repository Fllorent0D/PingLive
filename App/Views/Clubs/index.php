<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 24/08/16
 * Time: 14:41
 */
$title_for_layout = "Informations clubs";
$js_to_include = ["clubs"];
?>

<div class="row">
    <div class="page-title">
        Informations clubs
    </div>
    <div class="col s12">
        <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
            <?php foreach ($provinces as $prov):?>
                <li class="tab">
                    <a href="#" class="province" data-id="<?= $prov->id; ?>"><?= ucfirst(strtolower($prov->nom)) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

<div class="row">
    <div class="col s4">
        <div class="card">
            <ul class="collection" id="clubs">
                <li class="collection-item"><span class="title">Title</span></li>
            </ul>
        </div>
    </div>
    <div class="col s8" id="informations">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s12">
                        <h3><span class="card-title" id="nom">Aucun club sélectionné</span></h3>
                        <p id="indice"></p><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                        <table id="informations">
                            <tbody>
                            <tr>
                                <th style="width: 50%">Email</th>
                                <td id="email"></td>
                            </tr>
                            <tr>
                                <th>Adresse</th>
                                <td id="adresse"></td>
                            </tr>
                            <tr>
                                <th>Code postal</th>
                                <td id="code_postal"></td>
                            </tr>
                            <tr>
                                <th>Téléphone</th>
                                <td id="telephone"></td>
                            </tr>
                            <tr>
                                <th>Semelles noires</th>
                                <td id="semelles_noirs"></td>
                            </tr>
                            <tr>
                                <th>Accès valide</th>
                                <td id="acces_valide"></td>
                            </tr>
                            <tr>
                                <th>Balles blanches</th>
                                <td id="balles_blanches"></td>
                            </tr>
                            <tr>
                                <th>Balles jaunes</th>
                                <td id="balles_jaunes"></td>
                            </tr>
                            <tr>
                                <th>Table vertes</th>
                                <td id="tables_vertes"></td>
                            </tr>
                            <tr>
                                <th>Table bleues</th>
                                <td id="tables_bleues"></td>
                            </tr>
                            <tr>
                                <th>Nombre de tables</th>
                                <td id="nombre_tables"></td>
                            </tr>
                            <tr>
                                <th>Remarque</th>
                                <td id="remarques"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col s6" >
                        <div id="map" style="height: 600px"></div>
                    </div>
                </div>



            </div>
    </div>
</div>