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
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityMovie();
        $this->table = 'movie';
    }
}
