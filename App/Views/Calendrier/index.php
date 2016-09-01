<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 24/08/16
 * Time: 14:41
 */
$title_for_layout = "Calendrier";
$js_to_include = ["calendrier"];
?>

<div class="row">
    <div class="card">
        <div class="card-content" style="padding-bottom: 0px">
            <div class="row">
                <div class="input-field col s3">
                    <select id="categories">
                        <option value="" disabled selected>Choisissez une catégorie</option>
                    </select>
                    <label>Catégorie</label>
                </div>
                <div class="input-field col s3">
                    <select disabled="disabled" id="divisions">
                        <option value="" disabled selected>Choisissez une division</option>
                    </select>
                    <label>Division</label>
                </div>
                <div class="input-field col s3" >
                    <select disabled id="series">
                        <option value="" disabled selected>Choisissez une série</option>
                    </select>
                    <label>Série</label>
                </div>
                <div class="input-field col s3">
                    <select disabled id="journees">
                        <option value="" disabled selected>Choisissez une journée</option>
                    </select>
                    <label>Journée</label>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="row" id="noDate">
    <div class="card">
        <div class="card-content valign-wrapper" style=" height: 200px">
            <div class="valign center" style="width: 100%;">
                <i class="fa fa-calendar fa-3x"></i>
                <h5>Veuillez compléter le filtre</h5>

            </div>

        </div>
    </div>
</div>
<div class="row hiddendiv" id="loading">
    <div class="card">
        <div class="card-content valign-wrapper" style=" height: 200px">
            <div class="valign center" style="width: 100%;">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row hiddendiv" id="rencontres" style="margin-bottom: 0px">
    <div class="card">
        <div class="card-content">
            <span class="card-title">Rencontres</span>
            <table class="highlight responsive-table">
                <thead>
                <tr>
                    <th>Feuille de match</th>
                    <th>Date</th>
                    <th>Visite</th>
                    <th>Visiteur</th>
                    <th>Score</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>