<?php

namespace Src\Entity;

/**
 * Entity Category This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityCategory
{
    protected $id;
    protected $name;
    protected $slug;

    /////
    // GETTER
    /////

    /**
     * Return category id
     *
     * @return int
     */
    function getId()
    {

        return $this->id;
    }

    /**
     * Return category name
     *
     * @return string
     */
    function getName()
    {

        return $this->name;
    }


    /**
     * Return category slug
     *
     * @return string
     */
    function getSlug()
    {

        return $this->slug;
    }

    /////
    // SETTER
    /////

    /**
     * Set category id
     *
     * @param int
     * @return void
     */
    function setId($id)
    {

        $this->id = $id;
    }

    /**
     * Set category name
     *
     * @param int
     * @return void
     */
    function setName($name)
    {

        $this->name = $name;
    }

    /**
     * Set category slug
     *
     * @param string
     * @return void
     */
    function setSlug($slug)
    {

        $this->slug = $slug;
    }
}
