<?php

namespace Src\Functions;

use Src\Functions\WebsiteConfig;

/**
 * This Class it's for connexion with PDO.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Functions
 */
class Connexion
{

    private static $instance;
    public static $db;

    /**
     * This is constructor.
     */
    private function __construct()
    {

        if (empty(self::$instance)) {

            $paramsArray = parse_ini_file("../config/config.inc.ini", true);

            try {

                self::$db = new \PDO("mysql:host=" . $paramsArray['db']['host'] . ';port=' . $paramsArray['db']['port'] . ';dbname=' . $paramsArray['db']['dbname'], $paramsArray['db']['user'], $paramsArray['db']['password'], array(\PDO::ATTR_PERSISTENT => true));
                self::$db->query('SET NAMES utf8');
                self::$db->query('SET CHARACTER SET utf8');
            } catch (\PDOException $error) {
                die("erreur" . $error->getMessage());
            }
        }

        self::$instance = self::$db;
    }

    /**
     * Return singleton pdo object.
     * @return array
     */
    public static function dbConnect()
    {

        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$db;
    }
}
