<?php

namespace Src\Controller;

/**
 * This Class it's for front controller.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package Src\Controller
 */
class WebsiteController extends Controller
{
    //404
    function error404()
    {
        $this->render('front-office/404', []);
    }

    //HOME
    function home()
    {
        $this->render('front-office/home', []);
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
}
