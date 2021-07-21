<?php

/**
 * @copyright Anthony Alves 
 * @link www.anthonyalves.fr
 */

namespace Src\Model;

use Src\Entity\EntityCategory;

/**
 * This Class it's for Video.
 * he manages everything video
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Model
 */
class Category extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityCategory();
        $this->table = 'category';
    }
}
