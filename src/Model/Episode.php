<?php

/**
 * @copyright Anthony Alves 
 * @link www.anthonyalves.fr
 */

namespace Src\Model;

use Src\Model\Model;
use Src\Entity\EntityEpisode;

/**
 * This Class it's for Video.
 * he manages everything video
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
 */
class Episode extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityEpisode();
        $this->table = 'episode';
    }

    /**
     * Find all Episode by saison.
     * 
     * @return mixed
     */
    public function findEpisodesBySaison($serieid, $saison)
    {
        //TAKE SAISONID
        $stmt = $this->dbConnect()->prepare("SELECT * FROM saison WHERE saison = $saison AND serieid = $serieid");
        $stmt->execute();
        $items = $stmt->fetchAll();
        $saisonid = $items[0]['id'];

        //TAKE SERIE DETERMINED BY SAISON
        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE serieid = $serieid AND saisonid = $saisonid");
        $stmt->execute();

        $items = $stmt->fetchAll();

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, $this->entity);
        }

        return $list;
    }

    /**
     * Find all Episode by serieid and saisonid.
     * 
     * @return mixed
     */
    public function findEpisodes($serieid, $saisonid)
    {
        //TAKE SERIE DETERMINED BY SAISON
        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE serieid = $serieid AND saisonid = $saisonid");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->dbConnect()]);
        $stmt->execute();

        $items = $stmt->fetchAll();
        return $items;
    }
}
