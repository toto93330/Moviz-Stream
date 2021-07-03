<?php

namespace Src\Entity;

/**
 * Entity Likes This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityLikes
{

    protected $id;
    protected $likes;


    ////
    // GETTER
    ////

    /**
     * Get id of likes object 
     * @return int 
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Get number of likes
     * @return object 
     */
    function getlikes()
    {
        return $this->likes;
    }

    ////
    // SETTER
    ////

    /**
     * Set likes id
     *
     * @param int $id
     * @return void
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set likes id
     *
     * @param int $likes
     * @return void
     */
    function setlikes($likes)
    {
        $this->likes = $likes;
    }
}
