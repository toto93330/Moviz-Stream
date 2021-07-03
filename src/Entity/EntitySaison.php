<?php

namespace Src\Entity;

/**
 * Entity Movie This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntitySaison
{

    protected $id;
    protected $saison;
    protected $content;
    protected $trailer;

    ////
    // GETTER
    ////

    /**
     * Return id for serie
     *
     * @return int
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Return saison for serie
     *
     * @return string
     */
    function getSaison()
    {
        return $this->saison;
    }

    /**
     * Return little Synopsis
     *
     * @return string
     */
    function getContent()
    {
        return $this->content;
    }

    /**
     * Return serie trailer link
     *
     * @return string
     */
    function getTrailer()
    {
        return $this->trailer;
    }

    ////
    // SETTER
    ////

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
     * Set saison
     *
     * @param string
     * @return void
     */
    function setSaison($saison)
    {
        $this->saison = $saison;
    }

    /**
     * Set a little Synopsis
     *
     * @param string
     * @return void
     */
    function setContent($content)
    {
        $this->content = $content;
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
