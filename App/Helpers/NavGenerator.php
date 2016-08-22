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
        [
            "Calendrier" => "#",
            "Résultats" => "#",
            "Top 50" => "#",
            "Fiche personnel" => "#"
        ],
        [
            "Préparer prochain match" => "#",
            "Match en direct" => "#",
            "Son club" => "#",
        ],
        [
            "Listes de forces" => "#",
            "Equipes types" => "#",
            "Informations clubs" => "#"
        ],
        [
            "Debug ApiRequest" => "#"
        ]
    ];

    public static function generateBrandName()
    {
        return self::$brand;
    }
    public static function generateMobileNav()
    {
        $html = "";
        foreach (self::$nav as $section)
        {
            foreach ($section as $linkText => $link)
            {
                $html .= "<li>".Html::link($link, $linkText)."<li>";
            }
            $html.= "<li class='nav-divider'></li>";
        }
        return $html;
    }
    public static function generateSidebar()
    {
        $html ="";
        foreach (self::$nav as $section)
        {
            $html .= '<ul class="nav nav-sidebar">';
            foreach ($section as $linkText => $link)
            {
                $html .= "<li>".Html::link($link, $linkText)."<li>";
            }
            $html.= "</ul>";
        }
        return $html;

    }
}