<?php

namespace Src\Entity;

/**
 * Entity Views This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityContact
{
    protected $id;
    protected $email;
    protected $subject;
    protected $content;


    /////
    // GETTER
    /////

    /**
     * Return id for contact message
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Return email for contact message
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Return subject for contact message
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Return content for contact message
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


    /////
    // SETTER
    /////

    /**
     * Set contact message id
     *
     * @param int
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set email in contact message
     *
     * @param string
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Set subject for contact message
     *
     * @param string
     * @return void
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }


    /**
     * Set contnet for contact message
     *
     * @param string
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
}
