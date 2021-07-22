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

$router->map('GET', '/movie/[:slug]', function ($slug) {
    $controller = new Src\controller\WebsiteController();
    $controller->movie($slug);
});

#CATEGORY

$router->map('GET', '/category/[:slug]', function ($slug) {
    $controller = new Src\controller\WebsiteController();
    $controller->category($slug);
});

$router->map('GET', '/series/category/[:id]', function ($id) {
    $controller = new Src\controller\WebsiteController();
    $controller->categoryseries($id);
});

$router->map('GET', '/movies/category/[:id]', function ($id) {
    $controller = new Src\controller\WebsiteController();
    $controller->categorymovies($id);
});

$router->map('GET', '/all-movie', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->allmovie();
});

#SERIE
$router->map('GET', '/all-serie', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->allserie();
});

$router->map('GET', '/serie/[i:serie]/[i:saison]/[:slug]', function ($serie, $saison, $slug) {
    $controller = new Src\controller\WebsiteController();
    $controller->serie($serie, $saison, $slug);
});


#PAGES
$router->map('GET', '/pages/[:slug]', function ($slug) {
    $controller = new Src\controller\WebsiteController();
    $controller->pages($slug);
});


#CONTACT
$router->map('GET', '/contact', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->contact();
});

#SEARCH
$router->map('POST', '/search', function () {
    $controller = new Src\controller\WebsiteController();
    $controller->search();
});

#######################
## Front Office AJAX
#######################

#ALL MOVIE AJAX
$router->map('GET', '/ajax/all-movie/[i:min]', function ($min) {
    $controller = new Src\controller\WebsiteController();
    $controller->allmovieajax($min);
});

#ALL SERIE AJAX
$router->map('GET', '/ajax/all-serie/[i:min]', function ($min) {
    $controller = new Src\controller\WebsiteController();
    $controller->allserieajax($min);
});

#MOVIES CATEGORY
$router->map('GET', '/ajax/movies/category/[i:id]/[i:min]', function ($id, $min) {
    $controller = new Src\controller\WebsiteController();
    $controller->categorymoviesajax($id, $min);
});

#SERIES CATEGORY
$router->map('GET', '/ajax/series/category/[i:id]/[i:min]', function ($id, $min) {
    $controller = new Src\controller\WebsiteController();
    $controller->categoryseriesajax($id, $min);
});

#SERIES EPISODE
$router->map('GET', '/ajax/series/episode/[i:id]', function ($id) {
    $controller = new Src\controller\WebsiteController();
    $controller->serieepisodeajax($id);
});

#SERIES LOAD ALL EPISODE BY SAISON
$router->map('GET', '/ajax/series/loadepisode/[i:saisonid]/[i:serieid]', function ($saisonid, $serieid) {
    $controller = new Src\controller\WebsiteController();
    $controller->serieloadepisodeajax($saisonid, $serieid);
});
