<?php

namespace Src\Functions;


/**
 * This Class is for core systeme.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Functions
 */
class Core
{
    /**
     * Check if user is connected
     * @return mixed
     */
    static function redirectUserIfConnected()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['connect'])) {
            header('location: /');
        }
    }


    /**
     * Check if user is admin
     * @return mixed
     */
    static function userIsAdmin()
    {

        if (isset($_SESSION['user']) && isset($_SESSION['connect'])) {

            \var_dump($_SESSION['user']->getRoles());
        } else {
            header('location: /login');
        }
    }
}
