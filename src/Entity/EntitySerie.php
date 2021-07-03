<?php

namespace Src\Entity;

/**
 * Entity Views This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntitySerie
{
    protected $id;
    protected $name;
    protected $link;
    protected $slug;
    protected $yearofcreated;
    protected $content;
    protected $bestseller;
    protected $headerhero;
    protected $categoryid;
    protected $likeid;
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
     * Return link of serie
     *
     * @return string
     */
    function getLink()
    {

        return $this->link;
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
     * Return Year of created serie
     *
     * @return string
     */
    function getYearofcreated()
    {

        return $this->yearorcreated;
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
     * Return a boolean for serie if in best seller or not
     *
     * @return bool
     */
    function getBestseller()
    {

        return $this->bestseller;
    }

    /**
     * Return a boolean for serie is in Header Hero on index or not
     *
     * @return bool
     */
    function getHeaderhero()
    {

        return $this->headerhero;
    }

    /**
     * Return category of serie
     *
     * @return array
     */
    function getCategoryid()
    {

        return $this->categoryid;
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
     * Return total number of likes of a serie
     *
     * @return array
     */
    function getLikeid()
    {

        return $this->likeid;
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
     * Set serie Year
     *
     * @param string
     * @return void
     */
    function setYearofcreated($yearorcreated)
    {

        $this->yearorcreated = $yearorcreated;
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
     * Set serie is in bestseller or not
     *
     * @param bool
     * @return void
     */
    function setBestseller($bestseller)
    {

        $this->bestseller = $bestseller;
    }

    /**
     * Set serie is in headerhoro on a index or not
     *
     * @param bool
     * @return void
     */
    function setHeaderhero($headerhero)
    {

        $this->headerhero = $headerhero;
    }

    /**
     * Set serie categoryid
     *
     * @param array
     * @return void
     */
    function setCategoryID($categoryid)
    {

        $this->categoryid = $categoryid;
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
     * Set serie likeid
     *
     * @param array
     * @return void
     */
    function setLikeID($likeid)
    {

        $this->likeid = $likeid;
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
