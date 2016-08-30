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
            <div class="card-content">
                <span class="card-title">Rencontres/Equipes</span>
                <div class="row">
                    <div class="col s3">
                        <button id="updateRencontre" style="padding: 0" class="pull-right waves-effect waves-light btn btn-flat">Mettre à jour</button>

                    </div>
                    <div class="col s9">

                        <div class="progress m-t-md">
                            <div class="determinate indigo" id="progressRencontre" style="width: 0%"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


</div>