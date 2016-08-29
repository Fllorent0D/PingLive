<?php

/**
 * Created by PhpStorm.
 * User: florentcardoen
 * Date: 22/08/16
 * Time: 09:58
 */
namespace App\Helpers;

use Core\Helpers\Html;

class NavGenerator
{
    private static $brand = "PingManager";
    private static $nav = [

            "Calendrier" => [
                "lien" => "#",
                "icon" => "event"
            ],
            "Résultats" =>[
                "lien" => "#",
                "icon" => ""
            ],
            "Top 50" => [
                "lien" => "#",
                "icon" => ""
            ],
            "Fiche personnel" => [
                "lien" => "#",
                "icon" => ""
            ],
            "Préparer prochain match" => [
                "lien" => "#",
                "icon" => ""
            ],
            "Match en direct" => [
                "lien" => "#",
                "icon" => ""
            ],
            "Son club" => [
                "lien" => "#",
                "icon" => ""
            ],
            "Listes de forces" => [
                "lien" => "#",
                "icon" => ""
            ],
            "Equipes types" => [
                "lien" => "#",
                "icon" => ""
            ],
            "Informations clubs" => [
                "lien" => "#",
                "icon" => ""
            ],
            "Debug ApiRequest" => [
                "lien" => "#",
                "icon" => ""
            ]

    ];

    public static function generateBrandName()
    {
        return self::$brand;
    }

    public static function generateSidebar()
    {
        $html ="";
        foreach (self::$nav as $key => $detail)
        {
            $html .= "<li class=\"no-padding\">".Html::link($detail["lien"], "<i class=\"material-icons\">".$detail['icon']."</i>".$key, [], ["class"=>"waves-effect waves-grey"])."</li>";
        }
        return $html;

    }
}