<?php


namespace Src\Entity;

/**
 * Entity Page This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */


class EntityPage
{
    protected $id;
    protected $title;
    protected $slug;
    protected $content;


    /////
    // GETTER
    /////

    /**
     * Return page id
     *
     * @return int
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Return page title
     *
     * @return string
     */
    function getTitle()
    {
        return $this->title;
    }

    /**
     * Return page slug
     *
     * @return string
     */
    function getSlug()
    {
        return $this->slug;
    }

    /**
     * Return page content
     *
     * @return string
     */
    function getContent()
    {
        return $this->content;
    }

    /////
    // SETTER
    /////


    /**
     * Set page id
     *
     * @param int
     * @return void
     */
    function setId($id)
    {
        $this->id = $id;
    }


    /**
     * Set page title
     *
     * @param string
     * @return void
     */
    function setTitle($title)
    {
        $this->title = $title;
    }


    /**
     * Set page slug
     *
     * @param string
     * @return void
     */
    function setSlug($slug)
    {
        $this->slug = $slug;
    }


    /**
     * Set page content
     *
     * @param string
     * @return void
     */
    function setContent($content)
    {
        $this->content = $content;
    }
}
