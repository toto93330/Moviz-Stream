<?php

use Src\Functions\WebsiteConfig;

/**
 * Moviko Redux.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

###
# AUTOLOAD
###
require_once '../vendor/autoload.php';

####
# INIT WEBSITE
####
WebsiteConfig::websiteConfig();

####
# INIT HEADER NEWS
####
WebsiteConfig::websiteNews();

####
# INIT LANGUAGE
####
WebsiteConfig::websiteLanguage();

####
# INIT MEDIAS CATEGORY FOR HEADER
####
WebsiteConfig::MediasCategory();

####
# INIT ROUTE
####
$router = new AltoRouter();
require_once '../config/routes.php';

####
# SESSION
####
session_start();

# call closure or throw 404 status CALL CLOSURE OR THROW 404 STATUS
$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    # NO ROUTE WAS WATCHED
    header('location: /error-404');
    exit();
}
