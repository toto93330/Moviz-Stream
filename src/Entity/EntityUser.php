<?php

namespace Src\Entity;

/**
 * Entity Views This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityUser
{

    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $roles;
    protected $password;
    protected $avatar;
    protected $lang;
    protected $createdat;
    protected $actived;
    protected $banned;

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
     * Return Firstname
     *
     * @return string
     */
    function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Return Lastname
     *
     * @return string
     */
    function getLastname()
    {
        return $this->lastname;
    }


    /**
     * Return Email
     *
     * @return string
     */
    function getEmail()
    {
        return $this->email;
    }

    /**
     * Return Role
     *
     * @return object
     */
    function getRoles()
    {
        return $this->roles;
    }

    /**
     * Return password encoded
     *
     * @return string
     */
    function getPassword()
    {
        return $this->password;
    }

    /**
     * Return avatar link
     *
     * @return string
     */
    function getAvatar()
    {
        return $this->avatar;
    }


    /**
     * Return Language
     *
     * @return string
     */
    function getLang()
    {
        return $this->lang;
    }

    /**
     * Return createdat
     *
     * @return string
     */
    function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Return account is Actived
     *
     * @return bool
     */
    function getActived()
    {
        return $this->actived;
    }

    /**
     * Return account is banned
     *
     * @return bool
     */
    function getBanned()
    {
        return $this->banned;
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
     * Set Firstname
     *
     * @param string
     * @return void
     */
    function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Set Lastname
     *
     * @param string
     * @return void
     */
    function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Set Email
     *
     * @param string
     * @return void
     */
    function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Set Roles id
     *
     * @param object
     * @return void
     */
    function setRoles($roles)
    {
        $this->roles = $roles;
    }


    /**
     * Set Password
     *
     * @param string
     * @return void
     */
    function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set Avatar
     *
     * @param string
     * @return void
     */
    function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }


    /**
     * Set Lang
     *
     * @param string
     * @return void
     */
    function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * Set Created at
     *
     * @param int
     * @return void
     */
    function setCreatedat($createdat)
    {
        $this->createdat = $createdat;
    }

    /**
     * Set Created at
     *
     * @param bool
     * @return void
     */
    function setActived($actived)
    {
        $this->actived = $actived;
    }

    /**
     * Set Created at
     *
     * @param bool
     * @return void
     */
    function setBanned($banned)
    {
        $this->banned = $banned;
    }
}
