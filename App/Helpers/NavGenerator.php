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
    public static $brand = "bePing";
    private static $nav = [

            "Calendrier" => [
                "lien" => ["calendrier", ""],
                "icon" => "calendar"
            ],
            "Résultats" =>[
                "lien" => "#",
                "icon" => "star"
            ],
            "Top 50" => [
                "lien" => "#",
                "icon" => "trophy"
            ],
            "Fiche personnel" => [
                "lien" => "#",
                "icon" => "user"
            ],
            "Préparer prochain match" => [
                "lien" => "#",
                "icon" => "share"
            ],
            "Match en direct" => [
                "lien" => "#",
                "icon" => "bullhorn"
            ],
            "Son club" => [
                "lien" => "#",
                "icon" => "home"
            ],
            "Listes de forces" => [
                "lien" => "#",
                "icon" => "list"
            ],
            "Equipes types" => [
                "lien" => "#",
                "icon" => "magic"
            ],
            "Informations clubs" => [
                "lien" => [
                    "clubs", ""
                ],
                "icon" => "info"
            ],
            "Debug ApiRequest" => [
                "lien" => [
                    "debug", ""
                ],
                "icon" => "gear"
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
            $html .= "<li class=\"no-padding\">".Html::link($detail["lien"],Html::fa($detail["icon"]. " fa-fw") .$key, [], ["class"=>"waves-effect waves-grey"])."</li>";
        }
        return $html;

    }
}