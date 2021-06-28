<?php

namespace Src\Model;

/**
 * This Class it's for connexion with PDO.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
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

            require('../config/config.inc.php');

            try {

                self::$db = new \PDO("mysql:host=" . $host . ';port=' . $port . ';dbname=' . $dbname, $user, $password, array(\PDO::ATTR_PERSISTENT => true));
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
