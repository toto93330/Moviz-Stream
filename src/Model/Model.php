<?php

namespace Src\Model;

use Src\Functions\Connexion;

/**
 * This Class is here for defined direction for all model and this class is abstract.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package Src\Model
 */

abstract class Model
{

    protected $table;
    protected $entity;


    /**
     * Return dbConnect() for connexion with singleton PDO style.
     * @return array
     */
    static protected function dbConnect()
    {
        return Connexion::dbConnect();
    }


    /**
     * For Hydrate items
     *       
     * @param array $donnees
     * @param string $entity
     * @param int $item
     * @return array
     */
    public function getInstance(array $donnees, $entity)
    {

        $entity = new $entity();

        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($entity, $method)) {
                // et si il detect que le setter dois contenir un object
                if (\preg_match('#id$#', $method)) {

                    $list = null;
                    $table = substr($key, 0, -2);
                    $stmt = $this->dbConnect()->prepare("SELECT * FROM $table WHERE id = $value");
                    $stmt->execute();
                    $items = $stmt->fetchall();

                    foreach ($items as $articleRaw) {
                        $list[] = $this->getInstance($articleRaw, '\Src\Entity\Entity' . $table);
                    }

                    $method = 'set' . ucfirst($key);

                    $entity->$method($list[0]);
                } else {
                    // On appelle le setter.
                    $entity->$method($value);
                }
            }
        }

        return $entity;
    }

    /**
     * Find All defined items on database
     *
     * @return void
     */
    public function findAll()
    {
        $list = [];

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $items = $stmt->fetchAll();

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, $this->entity);
        }

        return $list;
    }


    /**
     * Find all Medias by DESC AND LIMIT.
     * 
     * @return mixed
     */
    public function findMediasByDescAndLimit($numberofmedias)
    {
        $list = [];

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table ORDER BY id DESC LIMIT $numberofmedias");
        $stmt->execute();

        $items = $stmt->fetchAll();

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, $this->entity);
        }

        return $list;
    }

    /**
     * Find all Medias by DESC AND LIMIT RANGE.
     * @example init findMediasByDescAndLimitRange(0, 6)
     * @return mixed
     */
    public function findMediasByDescAndLimitRange($min, $max)
    {
        $list = [];

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table ORDER BY id DESC LIMIT $min,$max");
        $stmt->execute();

        $items = $stmt->fetchAll();

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, $this->entity);
        }

        return $list;
    }

    /**
     * Return most liked medias.
     * 
     * @return mixed
     */
    public function findMostLikedMedias($numberofmedias)
    {
        $list = [];

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table ORDER BY likes DESC LIMIT $numberofmedias");
        $stmt->execute();

        $items = $stmt->fetchAll();

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, $this->entity);
        }

        return $list;
    }


    /**
     * Return video for news.
     * 
     * @return mixed
     */
    public function findMediasBySlug($slug)
    {

        $list = [];

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE slug = ?");
        $stmt->execute([$slug]);
        $items = $stmt->fetchAll();

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, $this->entity);
        }

        return $list;
    }



    /**
     * Find All video for header hero
     *
     * @return void
     */
    public function headerhero()
    {
        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE headerhero = 1");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->dbConnect()]);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Find defined Item by id
     *
     * @param [type] $id
     * @return void
     */
    public function findByID($id)
    {
        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE id = $id");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->dbConnect()]);
        $stmt->execute();
        return $stmt->fetchAll()[0];
    }

    /**
     * Find defined Item by id
     *
     * @param [type] $id
     * @return void
     */
    public function findMediasByCategory($categoryid, $min)
    {
        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE categoryid = $categoryid ORDER BY id DESC LIMIT $min,6");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->dbConnect()]);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Find name by id
     *
     * @param [type] $id
     * @return void
     */
    public function findNameById($id)
    {
        $stmt = $this->dbConnect()->prepare("SELECT name FROM $this->table WHERE id = $id");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->dbConnect()]);
        $stmt->execute();
        return $stmt->fetchAll()[0];
    }

    /**
     * Count all defined items on database
     *
     * @return void
     */
    public function count()
    {
        $stmt = $this->dbConnect()->prepare("SELECT count(*) FROM $this->table");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->dbConnect()]);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * For delect item on database with id
     *       
     * @param int $id
     */
    function delect($id)
    {

        $query = $this->dbConnect()->prepare("DELETE FROM $this->table WHERE `id` = $id");
        $query->execute();
    }


    /**
     * find best-seller (order by desc max 6)
     *       
     * @param int $id
     */
    function findBestSeller()
    {

        $query = $this->dbConnect()->prepare("SELECT * FROM likes ORDER BY DESC 0,6");
        $query->execute();
    }

    /**
     * Update value in database needed 3 value $column $id, $item for exemple :
     * 
     * -  $this->UpdateInfo(namecolumn, objectid, newvalue); 
     *       
     * @param string $column
     * @param int $id
     * @param mixed $item
     */
    function updateInfo($column, $id, $item)
    {

        $item = htmlspecialchars($item);
        $model = $this->dbConnect()->prepare("UPDATE $this->table SET $column = ? WHERE id = ?");
        $model->execute(array($item, $id));
    }

    /**
     * encrypte password with defined salt defined in "config/config.inc.ini".
     * @param string $password
     */
    function encryptPassword($password)
    {
        $paramsArray = parse_ini_file("../config/config.inc.ini", true);
        $salt = $paramsArray['salt']['salt'];
        $this->encryptPassword = md5($password . $salt);
    }

    /**
     * slugify text.
     * @param string $password
     */
    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }


    public static function dataExist($data, string $message)
    {

        if (empty($data)) {
            $_SESSION['error'] = $message;
            return header('Location: /');
        }
    }
}
