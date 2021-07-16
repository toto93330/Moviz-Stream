<?php

namespace Src\Controller;

use Src\Model\Model;
use Src\Model\Movie;

/**
 * This Class it's for front controller.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package Src\Controller
 */
class WebsiteController
{

    //404
    function error404()
    {
        $this->render('front-office/404', []);
    }

    //HOME
    function home()
    {
        /* GET NEW MOVIES */
        $newMovies = (new Movie())->findMediasByDescAndLimit(10);
        /* GET NEW SERIES */


        $this->render('front-office/home', [
            'newmovies' =>   $newMovies,

        ]);
    }


    //MOVIE
    function allmovie()
    {
        $this->render('front-office/allmovie', []);
    }

    function movie($slug)
    {
        // Tranform non formated Slug
        $slug = Model::slugify($slug);
        // Take movie by slug
        $movie = (new Movie)->Movie($slug);
        // Take new movies
        $newmovies = (new Movie)->newMovie(10);
        // Take most liked movie
        $mostlikedmovies = (new Movie)->mostlikedMovie(10);



        $this->render('front-office/movie', [
            'movie' => $movie[0],
            'newmovies' => $newmovies,
            'mostlikedmovies' => $mostlikedmovies
        ]);
    }

    //SERIE
    function allserie()
    {
        $this->render('front-office/allserie', []);
    }


    //pages
    function pages()
    {
        $this->render('front-office/pages/', []);
    }

    //CONTACT
    function contact()
    {
        $this->render('front-office/contact', []);
    }


    // ROUTE RENDER
    protected function render(string $viewName, array $args)
    {


        $loader = new \Twig\Loader\FilesystemLoader('../views/front-office');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        $twig->addGlobal('session', $_SESSION);
        $folder = explode('/', $viewName);
        echo $twig->render($folder[1] . '.html.twig', $args);
    }
}
