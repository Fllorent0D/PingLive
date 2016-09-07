<?php
/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 24/08/16
 * Time: 14:41
 */
$title_for_layout = "Informations clubs";
$js_to_include = ["mansonry", "clubs"];
?>



<div class="row">
    <div class="col s12">
        <ul class="tabs tab-demo z-depth-1" style="width: 100%;">
            <?php foreach ($provinces as $index => $prov):?>
                <li class="tab col s3"><a class="<?= ($prov->id == 8)? "active":"" ?>" href="#test<?= $index; ?>"><?= ucfirst(strtolower($prov->nom)) ?></a></li>
            <?php endforeach; ?>

        </ul>


    </div>

</div>
<div class="row center-align">
    <?php foreach ($clubs as $index => $c): ?>
        <div id="test<?= $index ?>" class="col s12 grid">
            <?php foreach ($c as $club): ?>
                <div class="center-align grid-item">
                    <div class="card white darken-1">
                        <div class="card-content">
                            <h6 style="font-size: 20px"><?= $club->nom ?></h6>
                            <p><?= $club->indice ?></p>
                        </div>
                        <div class="card-action">
                            <?= \Core\Helpers\Html::link(["clubs", "profil"], "Informations", [$club->indice]) ?>
                            <?= \Core\Helpers\Html::link(["calendrier", "club"], "Calendrier", [$club->indice]) ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
