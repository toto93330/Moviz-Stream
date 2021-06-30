<?php

namespace Src\Model;

use Src\Model\Connexion;

/**
 * This Class is here for defined direction for all model and this class is abstract.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package Src\Model
 */

abstract class Model
{

    /**
     * Return dbConnect() for connexion with singleton PDO style.
     * @return array
     */
    protected function dbConnect()
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
                // On appelle le setter.
                $entity->$method($value);
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
        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table");
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
        return $stmt->fetchAll();
    }

    /**
     * Find all defined items by category
     *
     * @param [type] $category
     * @return void
     */
    public function findByCategory($category)
    {
        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE category = $category");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->dbConnect()]);
        $stmt->execute();
        return $stmt->fetchAll();
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
     * encrypte password with defined salt in "config/config.inc.ini".
     * @param string $password
     */
    function encryptPassword($password)
    {
        $paramsArray = parse_ini_file("../config/config.inc.ini", true);
        $salt = $paramsArray['salt']['salt'];
        $this->encryptPassword = md5($password . $salt);
    }
}
