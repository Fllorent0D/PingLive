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
<body>
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

    </div>
</div>
<div class="mn-content fixed-sidebar">
    <header class="mn-header navbar-fixed">
        <nav class="blue darken-1">
            <div class="nav-wrapper row">
                <section class="material-design-hamburger navigation-toggle">
                    <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                        <span class="material-design-hamburger__layer"></span>
                    </a>
                </section>
                <div class="header-title col s3 m3">
                    <span class="chapter-title"><?= \App\Helpers\NavGenerator::$brand ?> - DEV</span>
                </div>

                <ul class="right col s9 m3 nav-right-menu">
                    <li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i><span class="badge">4</span></a></li>
                </ul>
                <!--- Notification -->
                <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                    <li class="notificatoins-dropdown-container">
                        <ul>
                            <li class="notification-drop-title">Today</li>
                            <li>
                                <a href="index.html#!">
                                    <div class="notification">
                                        <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                                        <div class="notification-text"><p><b>Alan Grey</b> uploaded new theme</p><span>7 min ago</span></div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>



    <aside id="slide-out" class="side-nav white fixed">
        <div class="side-nav-wrapper">
            <div class="sidebar-profile">
                <div class="sidebar-profile-image">
                    <?= \Core\Helpers\Html::img('profile-image.png', "Profile img", ["class"=>"circle"]) ?>
                </div>
                <div class="sidebar-profile-info">
                    <a href="#" class="account-settings-link">
                        <p>Cardoen Florent</p>
                        <span>f.cardoen@me.com</span><i class="material-icons right">arrow_drop_down</i></span>

                    </a>
                </div>

            </div>
            <div class="sidebar-account-settings">
                <ul>
                    <li class="no-padding">
                        <a class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Déconnexion</a>
                    </li>
                </ul>
            </div>
            <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                <?= \App\Helpers\NavGenerator::generateSidebar(); ?>
            </ul>
            <div class="footer">
                <p class="copyright">Florent Cardoen ©</p>
                <a href="index.html#!">Privacy</a> &amp; <a href="index.html#!">Terms</a>
            </div>
        </div>

    </aside>
    <main class="mn-inner">
            <?= $this->Session->flash(); ?>
            <div class="row" style="margin-bottom: 0px">
                <?= $content_for_layout; ?>
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
<?php if(isset($js_to_include)){foreach($js_to_include as $js){echo Html::js($js);}} ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzNpJHw55GbAt3gk4Oh0BuhArau3Aof88"></script>

</body>
</html>