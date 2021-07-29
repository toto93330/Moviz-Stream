<?php

/**
 * @copyright Anthony Alves 
 * @link www.anthonyalves.fr
 */

namespace Src\Model;

use Src\Entity\EntityPage;

/**
 * This Class it's for Video.
 * he manages everything video
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
 */
class Page extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityPage();
        $this->table = 'page';
    }
}
