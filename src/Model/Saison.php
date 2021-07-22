<?php

/**
 * @copyright Anthony Alves 
 * @link www.anthonyalves.fr
 */

namespace Src\Model;

use Src\Entity\EntitySaison;

/**
 * This Class it's for Video.
 * he manages everything video
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
 */
class Saison extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntitySaison();
        $this->table = 'saison';
    }


    /**
     * Find defined Item by id
     *
     * @param [type] $id
     * @return void
     */
    public function findBySerieId($id)
    {
        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE serieid = $id");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->dbConnect()]);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
