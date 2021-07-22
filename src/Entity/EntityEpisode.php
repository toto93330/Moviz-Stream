<?php

namespace Src\Entity;

/**
 * Entity Views This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityEpisode
{
    protected $id;
    protected $name;
    protected $slug;
    protected $link;
    protected $time;
    protected $content;
    protected $serieid;
    protected $saisonid;
    protected $image;


    /////
    // GETTER
    /////

    /**
     * Return serie id
     *
     * @return int
     */
    function getId()
    {

        return $this->id;
    }

    /**
     * Return serie name
     *
     * @return string
     */
    function getName()
    {

        return $this->name;
    }

    /**
     * Return serie slug
     *
     * @return string
     */
    function getSlug()
    {

        return $this->slug;
    }

    /**
     * Return serie link
     *
     * @return string
     */
    function getLink()
    {

        return $this->link;
    }

    /**
     * Return serie time
     *
     * @return string
     */
    function getTime()
    {

        return $this->time;
    }

    /**
     * Return a little Synopsis for serie
     *
     * @return string
     */
    function getContent()
    {

        return $this->content;
    }

    /**
     * Return saison
     *
     * @return array
     */
    function getSerieid()
    {

        return $this->serieid;
    }


    /**
     * Return saison
     *
     * @return array
     */
    function getSaisonid()
    {

        return $this->viewid;
    }

    /**
     * Return image of a serie
     *
     * @return string
     */
    function getImage()
    {

        return $this->image;
    }



    /////
    // SETTER
    /////

    /**
     * Set serie id
     *
     * @param int
     * @return void
     */
    function setId($id)
    {

        $this->id = $id;
    }

    /**
     * Set serie name
     *
     * @param string
     * @return void
     */
    function setName($name)
    {

        $this->name = $name;
    }

    /**
     * Set serie id
     *
     * @param string
     * @return void
     */
    function setSlug($slug)
    {

        $this->slug = $slug;
    }

    /**
     * Set serie link
     *
     * @param string
     * @return void
     */
    function setLink($link)
    {

        $this->link = $link;
    }

    /**
     * Return serie time
     *
     * @param string
     * @return void
     */
    function setTime($time)
    {

        $this->time = $time;
    }

    /**
     * Set serie Synopsis
     *
     * @param string
     * @return void
     */
    function setContent($content)
    {

        $this->content = $content;
    }

    /**
     * Set serie id
     *
     * @param array
     * @return void
     */
    function setSerieID($serieid)
    {

        $this->serieid = $serieid;
    }

    /**
     * Set saisonid
     *
     * @param array
     * @return void
     */
    function setSaisonID($saisonid)
    {

        $this->saisonid = $saisonid;
    }


    /**
     * Set serie image
     *
     * @param string
     * @return void
     */
    function setImage($image)
    {

        $this->image = $image;
    }
}
