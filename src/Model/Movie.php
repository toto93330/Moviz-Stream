<?php

/**
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

namespace Src\Model;

use Src\Entity\EntityMovie;

/**
 * This Class it's for Video.
 * he manages everything video
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
 */
class Movie extends Model
{

    protected $table;
    private $numberofmovie;

    function __construct()
    {
        $this->table = 'movie';
    }



    /**
     * Return all movie.
     * 
     * @return mixed
     */
    public function newMovie($numberofmovie)
    {
        $list = [];

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table ORDER BY id DESC LIMIT $numberofmovie");
        $stmt->execute();

        $items = $stmt->fetchAll();

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, new \Src\Entity\EntityMovie());
        }

        return $list;
    }


    /**
     * Return video by slug.
     * 
     * @return mixed
     */
    public function Movie($slug)
    {

        $list = [];

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table where 'slug' = ?");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->dbConnect()]);
        $stmt->execute([$slug]);
        $items = $stmt->fetchAll();

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, new \Src\Entity\EntityMovie());
        }

        return $list;
    }
}
