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
     * Find All defined items on database
     *
     * @return void
     */
    public function findAll()
    {
        $query = $this->dbConnect()->prepare("SELECT * FROM $this->table");
        $query->execute();
        $items = $query->fetchAll(\PDO::FETCH_ASSOC);
        $this->items = $items;
        return $items;
    }

    /**
     * Find defined Item by id
     *
     * @param [type] $id
     * @return void
     */
    public function findByID($id)
    {
        $query = Connexion::dbConnect()->prepare("SELECT * FROM $this->table WHERE id = $id");
        $query->execute();
        $items = $query->fetchAll(\PDO::FETCH_ASSOC);
        $this->items = $items;
        return $items;
    }

    /**
     * Find all defined items by category
     *
     * @param [type] $category
     * @return void
     */
    public function findByCategory($category)
    {
        $query = Connexion::dbConnect()->prepare("SELECT * FROM $this->table WHERE category = $category");
        $query->execute();
        $items = $query->fetchAll(\PDO::FETCH_ASSOC);
        $this->items = $items;
        return $items;
    }

    /**
     * Count all defined items on database
     *
     * @return void
     */
    public function count()
    {
        $query = $this->dbConnect()->prepare("SELECT count(*) FROM $this->table");
        $query->execute();
        $count = $query->fetchAll(\PDO::FETCH_ASSOC)[0]["count(*)"];

        return $count;
    }
}
