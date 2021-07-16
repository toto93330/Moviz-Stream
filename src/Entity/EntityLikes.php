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
     * @return int 
     */
    function getLikes()
    {
        return $this->likes;
    }

    /**
     * Get is serie or not
     * @return int 
     */
    function getIsserie()
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
     * Set number of likes
     *
     * @param int $likes
     * @return void
     */
    function setLikes($likes)
    {
        $this->likes = $likes;
    }


    /**
     * Set is serie or not
     *
     * @param int $likes
     * @return void
     */
    function setIsserie($likes)
    {
        $this->likes = $likes;
    }
}
