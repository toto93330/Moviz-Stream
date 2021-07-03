<?php

/**
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

namespace Src\Model;

use Src\Model\Model;

/**
 * This Class it's for general website config.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
 */
class WebsiteConfig extends Model
{

    /**
     * Init general web site config.
     * @return mixed
     */
    static function websiteConfig()
    {

        $query = self::dbConnect()->prepare("SELECT * FROM general");
        $query->execute();
        $items = $query->fetchAll();

        define('_SITETITLE', $items[0]["sitetitle"]);
        define('_SLOGANT', $items[0]["slogant"]);
        define('_DESCRIPTION', $items[0]["description"]);
        define('_PUBGOOGLE', $items[0]["pub"]);
        define('_MAINTENANCE', $items[0]["maintenance"]);
    }

    /**
     * Init last video for header news.
     * @return mixed
     */
    static function websiteNews()
    {
        // Take 3 last video
        $stmt = self::dbConnect()->prepare("SELECT * FROM movie ORDER BY id DESC LIMIT 3");
        $stmt->execute();
        $items = $stmt->fetchAll();

        define('_HEADERNEWS', $items);
    }
}
