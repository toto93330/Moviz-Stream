<?php

/**
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

namespace Src\Functions;

use Src\Functions\Connexion;

/**
 * This Class it's for general website config.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Functions
 */
class WebsiteConfig
{

    /**
     * Init general web site config.
     * @return mixed
     */
    static function websiteConfig()
    {

        $query = Connexion::dbConnect()->prepare("SELECT * FROM general");
        $query->execute();
        $items = $query->fetchAll();

        define('_SITETITLE', $items[0]["sitetitle"]);
        define('_SLOGANT', $items[0]["slogant"]);
        define('_DESCRIPTION', $items[0]["description"]);
        define('_MAINTENANCE', $items[0]["maintenance"]);
    }

    /**
     * Init last video for header news.
     * @return mixed
     */
    static function websiteNews()
    {
        // Take 3 last video
        $stmt = Connexion::dbConnect()->prepare("SELECT * FROM movie ORDER BY id DESC LIMIT 3");
        $stmt->execute();
        $items = $stmt->fetchAll();

        define('_HEADERNEWS', $items);
    }

    /**
     * Init All category for movie and serie in header menu.
     * @return mixed
     */
    static function MediasCategory()
    {
        // Take Movie Category
        $moviecategory = array();
        $stmt = Connexion::dbConnect()->prepare("SELECT categoryid FROM movie AS m, category AS cat WHERE cat.id = m.categoryid GROUP BY m.categoryid");
        $stmt->execute();
        $items = $stmt->fetchAll();

        foreach ($items as $key => $value) {

            $stmt = Connexion::dbConnect()->prepare("SELECT * FROM category WHERE id = " . strval($value["categoryid"]) . "");
            $stmt->execute();
            $items = $stmt->fetchAll();
            $moviecategory[$key] = $items;
        }

        define('_MOVIECATEGORY', $moviecategory);

        // Take Movie Category
        $seriecategory = array();
        $stmt = Connexion::dbConnect()->prepare("SELECT categoryid FROM serie AS s, category AS cat WHERE cat.id = s.categoryid GROUP BY s.categoryid");
        $stmt->execute();
        $items = $stmt->fetchAll();

        foreach ($items as $key => $value) {

            $stmt = Connexion::dbConnect()->prepare("SELECT * FROM category WHERE id = " . strval($value["categoryid"]) . "");
            $stmt->execute();
            $items = $stmt->fetchAll();
            $seriecategory[$key] = $items;
        }

        define('_SERIECATEGORY', $seriecategory);
    }


    /**
     * Init Language.
     * @return mixed
     */
    static function websiteLanguage()
    {
        $paramsArray = parse_ini_file("../config/config.inc.ini", true);
        // Take Language
        include_once '../config/langs/' . $paramsArray['language']['language'] . '.php';
    }
}
