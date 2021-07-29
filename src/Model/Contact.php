<?php

/**
 * @copyright Anthony Alves 
 * @link www.anthonyalves.fr
 */

namespace Src\Model;

use Src\Entity\EntityContact;

/**
 * This Class it's for Video.
 * he manages everything video
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
 */
class Contact extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityContact();
        $this->table = 'contact';
    }


    function addMessage($email, $subject, $content)
    {

        $stmt = $this->dbConnect()->prepare("INSERT INTO $this->table(`email`, `subject`, `content`) VALUES (?,?,?)");
        $stmt->execute([$email, $subject, $content]);
    }
}
