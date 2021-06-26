<?php

/**
 * Moviko Redux.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

/**
 *
 *                           [ROUTER URL OPTIONS AND CONFIGURATION]
 *
 * 
 * *                     Match all request URIs
 * [i]                   Match an integer
 * [i:id]                Match an integer as 'id'
 * [a:action]            Match alphanumeric characters as 'action'
 * [h:key]               Match hexadecimal characters as 'key'
 * [:action]             Match anything up to the next / or end of the URI as 'action'
 * [create|edit:action]  Match either 'create' or 'edit' as 'action'
 * [*]                   Catch all (lazy, stops at the next trailing slash)
 * [*:trailing]          Catch all as 'trailing' (lazy)
 * [**:trailing]         Catch all (possessive - will match the rest of the URI)
 * .[:format]?           Match an optional parameter 'format' - a / or . before the block is also optional
 */

#######################
## Front Office
#######################

#Error 404
$router->map('GET', '/error-404', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->error404();
});

#Home
$router->map('GET', '/', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->home();
});

#MOVIE
$router->map('GET', '/all-movie', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->allmovie();
});

#SERIE
$router->map('GET', '/all-serie', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->allserie();
});

#Pages

$router->map('GET', '/about-us', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->aboutus();
});

$router->map('GET', '/corporate-information', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->corporateinformation();
});

$router->map('GET', '/privacy-policy', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->privacypolicy();
});

$router->map('GET', '/terms-and-conditions', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->termsandconditions();
});

$router->map('GET', '/frequently-asked-questions', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->faq();
});

$router->map('GET', '/contact', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->contact();
});
