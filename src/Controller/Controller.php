<?php

namespace Src\Controller;

use Src\Model\Model;

/**
 * This Class it's for front controller.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package Src\Controller
 */
class Controller extends Model
{
    // ROUTE RENDER
    protected function render(string $viewName, array $args)
    {
        foreach ($args as $key => $value) {
            $$key = $value;
        }

        ob_start();
        require('../views/' . $viewName . '.html.php');
        $content = ob_get_clean();
        require('../views/header.php');
        require('../views/template.php');
        require('../views/footer.php');
    }
}
