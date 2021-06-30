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
        /* GET NEW MOVIE (MAX 6)*/
        $movie = new Movie();
        $newMovie = $movie->newMovie(6);

        $this->render('front-office/home', [
            'newmovie' =>   $newMovie,

        ]);
    }


    //MOVIE
    function allmovie()
    {
        $this->render('front-office/allmovie', []);
    }

    function movie()
    {
        $this->render('front-office/movie', []);
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
        foreach ($args as $key => $value) {
            $$key = $value;
        }

        // ob_start();

        // require('../views/' . $viewName . '.html.php');
        // $content = ob_get_clean();

        // \var_dump($content);
        // require('../views/template.php');


        $loader = new \Twig\Loader\FilesystemLoader('../views/front-office');
        $twig = new \Twig\Environment($loader, [
            'cache' => '../cache',
        ]);

        $folder = explode('/', $viewName);
        echo $twig->render($folder[1] . '.html.twig', [$args]);
    }
}
