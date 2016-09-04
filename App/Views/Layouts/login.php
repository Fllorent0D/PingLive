<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title -->
    <title><?= isset($title_for_layout) ? $title_for_layout : ''; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta charset="UTF-8">
    <meta name="description" content="Responsive Admin Dashboard Template" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="Steelcoders" />

    <!-- Styles -->
    <?= Html::css('materialize.min'); ?>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Theme Styles -->
    <?= Html::css('font-awesome.min'); ?>
    <?= Html::css('alpha.min'); ?>
    <?= Html::css('default'); ?>
    <?= Html::css('animate') ?>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="signin-page">
<div class="loader-bg"></div>
<div class="loader">
    <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-red">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-yellow">
            <div class="circle-clipper left">
                <div class="circle"></div>
            </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
        </div>
        <div class="spinner-layer spinner-green">
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
<div class="mn-content valign-wrapper">
    <main class="mn-inner container">
        <div class="valign">
            <div class="row">
                <div class="col s12 m6 l4 offset-l4 offset-m3">
                    <h1 class="center-align white-text " style="font-family: Roboto; font-weight: lighter"><?= \App\Helpers\NavGenerator::$brand ?></h1>

                    <?= $content_for_layout; ?>
                    <?= $this->Session->flash(); ?>

                </div>

            </div>
        </div>
    </main>
</div>

<!-- Javascripts -->
<?= Html::js('jquery-1.11.2.min') ?>
<?= Html::js('bootstrap.min') ?>
<?= Html::js('materialPreloader.min') ?>
<?= Html::js('materialize.min') ?>
<?= Html::js('alpha.min') ?>
<?= Html::js('dashboard') ?>
<?= Html::js('jsend') ?>

</body>
</html>