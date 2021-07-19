<?php

namespace Src\Entity;

/**
 * Entity Movie This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */
class EntityMovie
{

    protected $id;
    protected $name;
    protected $link;
    protected $slug;
    protected $yearofcreated;
    protected $time;
    protected $ageadapt;
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
     * Return movie id
     *
     * @return int
     */
    function getId()
    {

        return $this->id;
    }

    /**
     * Return movie name
     *
     * @return string
     */
    function getName()
    {

        return $this->name;
    }

    /**
     * Return link of movie
     *
     * @return string
     */
    function getLink()
    {

        return $this->link;
    }

    /**
     * Return movie slug
     *
     * @return string
     */
    function getSlug()
    {

        return $this->slug;
    }

    /**
     * Return Year of created movie
     *
     * @return string
     */
    function getYearofcreated()
    {

        return $this->yearofcreated;
    }

    /**
     * Return movie time
     *
     * @return string
     */
    function getTime()
    {

        return $this->time;
    }

    /**
     * Return movie time
     *
     * @return string
     */
    function getAgeadapt()
    {

        return $this->ageadapt;
    }

    /**
     * Return a little Synopsis for movie
     *
     * @return string
     */
    function getContent()
    {

        return $this->content;
    }

    /**
     * Return a boolean for movie if in best seller or not
     *
     * @return bool
     */
    function getBestseller()
    {

        return $this->bestseller;
    }

    /**
     * Return a boolean for movie is in Header Hero on index or not
     *
     * @return bool
     */
    function getHeaderhero()
    {

        return $this->headerhero;
    }

    /**
     * Return category of movie
     *
     * @return array
     */
    function getCategoryid()
    {

        return $this->categoryid;
    }

    /**
     * Return total number of likes of a movie
     *
     * @return int
     */
    function getLikes()
    {

        return $this->likes;
    }

    /**
     * Return image of a movie
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
     * Set movie id
     *
     * @param int
     * @return void
     */
    function setId($id)
    {

        $this->id = $id;
    }

    /**
     * Set movie name
     *
     * @param string
     * @return void
     */
    function setName($name)
    {

        $this->name = $name;
    }

    /**
     * Set movie link
     *
     * @param string
     * @return void
     */
    function setLink($link)
    {

        $this->link = $link;
    }

    /**
     * Set movie id
     *
     * @param string
     * @return void
     */
    function setSlug($slug)
    {

        $this->slug = $slug;
    }

    /**
     * Set movie Year
     *
     * @param string
     * @return void
     */
    function setYearofcreated($yearofcreated)
    {

        $this->yearofcreated = $yearofcreated;
    }

    /**
     * Set movie time
     *
     * @param string
     * @return void
     */
    function setTime($time)
    {

        $this->time = $time;
    }

    /**
     * Set movie time
     *
     * @param string
     * @return void
     */
    function setAgeadapt($ageadapt)
    {

        $this->ageadapt = $ageadapt;
    }

    /**
     * Set movie Synopsis
     *
     * @param string
     * @return void
     */
    function setContent($content)
    {

        $this->content = $content;
    }

    /**
     * Set movie is in bestseller or not
     *
     * @param bool
     * @return void
     */
    function setBestseller($bestseller)
    {

        $this->bestseller = $bestseller;
    }

    /**
     * Set movie is in headerhoro on a index or not
     *
     * @param bool
     * @return void
     */
    function setHeaderhero($headerhero)
    {

        $this->headerhero = $headerhero;
    }

    /**
     * Set movie categoryid
     *
     * @param array
     * @return void
     */
    function setCategoryid($categoryid)
    {

        $this->categoryid = $categoryid;
    }

    /**
     * Set movie likeid
     *
     * @param int
     * @return void
     */
    function setLikes($likes)
    {

        $this->likes = $likes;
    }

    /**
     * Set movie image
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

    /////
    // SERIALIZER
    /////

    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->getId(),
                'name' => $this->getName(),
                'link'  => $this->getLink(),
                'slug' => $this->getSlug(),
                'yearofcreated' => $this->getYearofcreated(),
                'time' => $this->getTime(),
                'ageadapt' => $this->getAgeadapt(),
                'content' => $this->getContent(),
                'trailer' => $this->getTrailer(),
                'bestseller' => $this->getBestseller(),
                'headerhero' => $this->getHeaderhero(),
                'categoryid' => $this->getCategoryid(),
                'likes' => $this->getLikes(),
                'image' => $this->getImage(),
            ];
    }
}
