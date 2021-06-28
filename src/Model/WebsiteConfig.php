<?php

/**
 * My first blog coded with another vision, for openclassrooms projet N°5.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

namespace App\Model;

use Src\Model\Model;
use Src\Model\Connexion;

/**
 * This Class it's for general website config.
 * he manages everything related to Pages (Add Site title, description, facebook link etc ...)
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
 */
class WebsiteConfig extends Model
{

    /**
     * Init general web site config.
     * @return mixed
     */
    function websiteConfig()
    {

        $query = $this->dbConnect()->prepare("SELECT * FROM general");
        $query->execute();
        $items = $query->fetchAll();

        define('_SITETITLE', $items[0]["site_title"]);
        define('_SLOGANT', $items[0]["slogant"]);
        define('_DESCRIPTION', $items[0]["description"]);
        define('_PUBGOOGLE', $items[0]["pub"]);
        define('_MAINTENANCE', $items[0]["maintenance"]);
    }
}
