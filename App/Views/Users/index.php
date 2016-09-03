<?php
use Core\Helpers\Form;
$title_for_layout = "PingManager - Connexion";
?>
<h1 class="center-align white-text " style="font-family: Roboto; font-weight: lighter">PingManager</h1>
<div class="card white darken-1 ">
    <div class="card-content z-depth-5">
        <span class="card-title">Se connecter</span>
        <div class="row">
            <?= Form::start('users/login', 'POST', ["class" => "col s12"]) ?>
                <div class="input-field col s12">
                    <?= Form::input('text', 'login', "Email", ["class" => "validate"],(isset($login))?  $login : '') ?>

                </div>
                <div class="input-field col s12 has-error">
                    <?= Form::input('password', 'password', "Mot de passe", ["class" => "validate"]) ?>
                    <?= (isset($error))?  "<label id=\"email-error\" class=\"error\" for=\"email\">".$error."</label>" : ''; ?>
                </div>
                <div class="col s12 right-align m-t-sm">
                    <button type="submit" class="waves-effect waves-light btn teal">Connexion</button>
                </div>
            </form>
        </div>
    </div>
</div>