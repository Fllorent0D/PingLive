<?php

$title_for_layout = "DebugAPI";
$js_to_include = ["debug"];

?>
<div class="row">
    <div class="col s12">
        <div class="page-title">Importer des données</div>
    </div>

    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content" id="rencontres">
                <span class="card-title">Rencontres/Equipes</span>
                <div class="row">
                    <div class="col s3">
                        <button id="updateRencontre" class="waves-effect waves-light btn indigo m-b-xs">Mettre à jour</button>

                    </div>
                    <div class="col s9">

                        <div class="progress m-t-md">
                            <div class="determinate indigo" id="progressRencontre" style="width: 0%"></div>
                        </div>

                    </div>
                </div>
                <div class="row hiddendiv" id="errorRencontre">
                    <div class="card-panel red lighten-1">
                            <span class="white-text"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col s12 m12 l12">
        <div class="card">
            <div class="card-content" id="joueurs">
                <span class="card-title">Joueurs</span>
                <div class="row">
                    <div class="col s3">
                        <button id="updateRencontre" class="waves-effect waves-light btn indigo m-b-xs">Mettre à jour</button>

                    </div>
                    <div class="col s9">

                        <div class="progress m-t-md">
                            <div class="determinate indigo" id="progressRencontre" style="width: 0%"></div>
                        </div>

                    </div>
                </div>
                <div class="row hiddendiv" id="errorRencontre">
                    <div class="card-panel red lighten-1">
                        <span class="white-text"></span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>