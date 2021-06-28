<?php

/**
 * Moviko Redux.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

####
# SESSION
####
session_start();

# AUTOLOAD
require '../vendor/autoload.php';

####
# INIT WEBSITE
####
require('../src/Model/WebsiteConfig.php');
$setting = new \App\Model\WebsiteConfig();
$setting->WebsiteConfig();

# INIT ROUTE
$router = new AltoRouter();
require '../config/routes.php';

# call closure or throw 404 status CALL CLOSURE OR THROW 404 STATUS
$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    # NO ROUTE WAS WATCHED
    header('location: /error-404');
    exit();
}
