<?php

namespace Src\Controller;

use Src\Model\Category;
use Src\Model\Episode;
use Src\Model\Model;
use Src\Model\Movie;
use Src\Model\Saison;
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
        /* GET MOVIE */
        $movies = (new Movie())->findMediasByDescAndLimitRange(0, 6);
        /* GET MOVIE FOR HERO HEADER */
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
        /* GET SERIE */
        $series = (new Serie())->findMediasByDescAndLimitRange(0, 6);
        /* GET SERIE FOR HERO HEADER */
        $headershero = (new Serie())->headerhero();
        $this->render('front-office/allserie', [
            'series' => $series,
            'headershero' => $headershero,
        ]);
    }

    function serie($serie, $saison, $slug)
    {
        $episodes = (new Episode())->findEpisodesBySaison($serie, $saison);
        $serie = (new Serie())->findMediasBySlug($slug);
        $saisons = (new Saison)->findBySerieId($serie[0]->getId());
        $serieid = $serie[0]->getId();

        $this->render('front-office/serie', [
            'serie' => $serie[0],
            'episodes' => $episodes,
            'saisons' => $saisons,
            'serieid' => $serieid,
        ]);
    }

    function allserieajax($min)
    {
        $data = [];
        $movies = (new Serie())->findMediasByDescAndLimitRange($min, 6);


        for ($i = 0; $i < count($movies); $i++) {
            $data[$i] = $movies[$i]->jsonSerialize();
        }

        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($data);
    }


    function serieepisodeajax($id)
    {
        $serie = (new Episode())->findByID($id);


        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($serie);
    }

    function serieloadepisodeajax($saisonid, $serieid)
    {
        $movies = (new Episode())->findEpisodes($serieid, $saisonid);

        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($movies);
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

        // if (empty($categoryformovies) && empty($categoryforseries)) {
        //     return $this->home;
        // }

        $this->render('front-office/category', [
            'categoryformovies' => $categoryformovies,
            'categoryforseries' => $categoryforseries,
        ]);
    }

    #######################
    ## CATEGORY FOR MOVIE
    #######################
    function categorymovies($id)
    {
        $movies = (new movie())->findMediasByCategory($id, 0);
        $category = (new Category())->findByID($id);

        $this->render('front-office/categorymovies', [
            'movies' => $movies,
            'category' => $category,
        ]);
    }

    function categorymoviesajax($id, $min)
    {
        $data = [];
        $movies = (new movie())->findMediasByCategory($id, $min);


        for ($i = 0; $i < count($movies); $i++) {
            $data[$i] = $movies[$i]->jsonSerialize();
        }

        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($data);
    }

    #######################
    ## CATEGORY FO SERIE
    #######################
    function categoryseries($id)
    {
        $category = (new Category())->findByID($id);
        $series = (new Serie())->findMediasByCategory($id, 0);

        $this->render('front-office/categoryseries', [
            'series' => $series,
            'category' => $category,
        ]);
    }

    function categoryseriesajax($id, $min)
    {
        $data = [];
        $series = (new Serie())->findMediasByCategory($id, $min);


        for ($i = 0; $i < count($series); $i++) {
            $data[$i] = $series[$i]->jsonSerialize();
        }

        header('Content-Type: application/json;charset=utf-8');
        echo json_encode($data);
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
    ## SEARCH
    #######################
    function search()
    {
        echo ($_POST['search']);

        $array = [];
        $movies = (new Movie)->findMediasByDescAndLimit(10);

        \var_dump($movies[0]->getName());

        $this->render('front-office/search', []);
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
