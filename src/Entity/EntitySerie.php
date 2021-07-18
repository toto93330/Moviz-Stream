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
    protected $slug;
    protected $yearofcreated;
    protected $content;
    protected $trailer;
    protected $bestseller;
    protected $headerhero;
    protected $categoryid;
    protected $likes;
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
     * Return Year of created serie
     *
     * @return string
     */
    function getYearofcreated()
    {

        return $this->yearofcreated;
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
     * @return object
     */
    function getCategoryid()
    {

        return $this->categoryid;
    }

    /**
     * Return total number of likes of a serie
     *
     * @return int
     */
    function getLikes()
    {
        return $this->likes;
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

    /**
     * Return trailer
     *
     * @return string
     */
    function getTrailer()
    {

        return $this->trailer;
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
     * Set serie Year
     *
     * @param string
     * @return void
     */
    function setYearofcreated($yearofcreated)
    {

        $this->yearofcreated = $yearofcreated;
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
     * @param object
     * @return void
     */
    function setCategoryID($categoryid)
    {
        $this->categoryid = $categoryid;
    }

    /**
     * Set serie likes
     *
     * @param object
     * @return void
     */
    function setLikes($likes)
    {
        $this->likes = $likes;
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

    /**
     * Set Trailer link
     *
     * @param string
     * @return void
     */
    function setTrailer($trailer)
    {

        $this->trailer = $trailer;
    }
}
