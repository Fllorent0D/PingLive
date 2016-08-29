
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= isset($title_for_layout) ? $title_for_layout : ''; ?></title>

    <!-- Bootstrap core CSS -->
    <?= Html::css('bootstrap.min'); ?>
    <?= Html::css('default'); ?>
    <?= Html::css('font-awesome.min'); ?>
    <?= Html::css('animate'); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <?= Html::js('html5shiv.min'); ?>
    <?= Html::js('respond.min'); ?>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= NavGenerator::generateBrandName() ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav visible-xs">
                <?= NavGenerator::generateMobileNav() ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Réglages</a></li>
                <li><a href="#">Profiles</a></li>
                <li><a href="#">Aide</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <?= NavGenerator::generateSidebar(); ?>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <?= $this->Session->flash(); ?>
            <div class="row">
                <?= $content_for_layout; ?>
            </div>

        </div>
    </div>
</div>

<?= Html::js('jquery-1.11.2.min') ?>
<?= Html::js('bootstrap.min') ?>
<?php if(isset($js_to_include)){foreach($js_to_include as $js){echo Html::js($js);}} ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzNpJHw55GbAt3gk4Oh0BuhArau3Aof88" async defer></script>
</body>
</html>
