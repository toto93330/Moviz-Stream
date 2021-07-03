<?php

namespace Src\Entity;

/**
 * Entity General This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityGeneral
{
    protected $sitetitle;
    protected $slogant;
    protected $description;
    protected $pub;
    protected $maintenance;


    ////
    // GETTER
    ////

    /**
     * Return site title
     *
     * @return string
     */
    function getSitetitle()
    {
        $this->sitetitle;
    }

    /**
     * Return site slogant
     *
     * @return string
     */
    function getSlogant()
    {
        $this->slogant;
    }

    /**
     * Return site description
     *
     * @return string
     */
    function getDescription()
    {
        $this->description;
    }

    /**
     * Return embed pud banner
     *
     * @return string
     */
    function getPub()
    {
        $this->pub;
    }

    /**
     * Return this site is in maintenance or not 
     *
     * @return bool
     */
    function getMaintenance()
    {
        $this->maintenance;
    }

    ////
    // SETTER
    ////

    /**
     * Set site title
     *
     * @param string
     * @return void
     */
    function setSitetitle($sitetitle)
    {
        $this->sitetitle = $sitetitle;
    }

    /**
     * Set site slogant
     *
     * @param string
     * @return void
     */
    function setSlogant($slogant)
    {
        $this->slogant = $slogant;
    }

    /**
     * Set description of site
     *
     * @param string
     * @return void
     */
    function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Set embed pud banner
     *
     * @param string
     * @return void
     */
    function setPub($pub)
    {
        $this->pub = $pub;
    }

    /**
     * Set maintenance is true or false
     *
     * @param bool
     * @return void
     */
    function setMaintenance($maintenance)
    {
        $this->maintenance = $maintenance;
    }
}
