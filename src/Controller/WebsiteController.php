<?php

namespace Src\Controller;

use Src\Model\Likes;
use Src\Model\Model;
use Src\Model\Movie;
use Src\Model\Serie;

/**
 * This Class it's for front controller.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package Src\Controller
 */
class WebsiteController
{

    #######################
    ## 404
    #######################
    function error404()
    {
        $this->render('front-office/404', []);
    }

    #######################
    ## HOME
    #######################
    function home()
    {
        /* GET HEADER HERO */
        $headersheromovie = (new Movie())->headerhero();
        $headersheroserie = (new Serie())->headerhero();
        /* GET NEW MOVIES */
        $newMovies = (new Movie())->findMediasByDescAndLimit(10);
        /* GET NEW SERIES */
        $newSeries = (new Serie())->findMediasByDescAndLimit(10);

        /* GET BESTSELLER MOVIES */
        $bestsellermovies = (new Movie())->findMostLikedMedias(2);
        /* GET BESTSELLER SERIES */
        $bestsellerseries = (new Serie())->findMostLikedMedias(3);

        $this->render('front-office/home', [
            'headersheromovie' =>   $headersheromovie,
            'headersheroserie' =>   $headersheroserie,
            'newmovies' =>   $newMovies,
            'newseries' =>   $newSeries,
            'bestsellerseries' => $bestsellerseries,
            'bestsellermovies' => $bestsellermovies,
        ]);
    }



    #######################
    ## MOVIE
    #######################
    function allmovie()
    {
        $movies = (new Movie())->findMediasByDescAndLimitRange(0, 6);
        $headershero = (new Movie())->headerhero();

        $this->render('front-office/allmovie', [
            'movies' => $movies,
            'headershero' => $headershero,
        ]);
    }

    function movie($slug)
    {
        // Tranform non formated Slug
        $slug = Model::slugify($slug);
        // Take movie by slug
        $movie = (new Movie)->findMediasBySlug($slug);
        // Take movie by same category
        $samemoviescategory = (new Movie)->findMediasByCategory($movie[0]->getCategoryid()->getId());
        // Take serie by same category 
        $sameseriescategory = (new Serie)->findMediasByCategory($movie[0]->getCategoryid()->getId());
        // Take new movie
        $newmovies = (new Movie())->findMediasByDescAndLimit(12);

        $this->render('front-office/movie', [
            'movie' => $movie[0],
            'samemoviescategory' => $samemoviescategory,
            'sameseriescategory' => $sameseriescategory,
            'newmovies' => $newmovies,

        ]);
    }

    function allmovieajax($min)
    {

        $data = [];
        $movies = (new Movie())->findMediasByDescAndLimitRange($min, 6);


        for ($i = 0; $i < count($movies); $i++) {
            $data[$i] = $movies[$i]->jsonSerialize();
        }

        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($data);
    }

    #######################
    ## SERIE
    #######################
    function allserie()
    {
        $this->render('front-office/allserie', []);
    }

    function serie()
    {
        $this->render('front-office/serie', []);
    }

    #######################
    ## CATEGORY
    #######################
    function category($slug)
    {
        $slug = \intval($slug);

        $categoryformovies = (new Movie)->findMediasByCategory($slug);
        // Take serie by same category 
        $categoryforseries = (new Serie)->findMediasByCategory($slug);

        if (empty($categoryformovies) && empty($categoryforseries)) {
            return $this->home;
        }

        $this->render('front-office/category', [
            'categoryformovies' => $categoryformovies,
            'categoryforseries' => $categoryforseries,
        ]);
    }

    #######################
    ## PAGES
    #######################
    function pages()
    {
        $this->render('front-office/pages/', []);
    }

    #######################
    ## CONTACT
    #######################
    function contact()
    {
        $this->render('front-office/contact', []);
    }


    #######################
    ## ROUTE RENDER
    #######################
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
