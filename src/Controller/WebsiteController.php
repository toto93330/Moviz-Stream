<?php

namespace Src\Controller;

use Src\Model\Model;

/**
 * This Class it's for front controller.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package Src\Controller
 */
class WebsiteController extends Model
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

    //SERIE
    function allserie()
    {
        $this->render('front-office/allserie', []);
    }


    //ABOUT US
    function aboutus()
    {
        $this->render('front-office/aboutus', []);
    }

    //CORPORATE INFORMATION
    function corporateinformation()
    {
        $this->render('front-office/corporateinformation', []);
    }

    //PRIVACY POLICY
    function privacypolicy()
    {
        $this->render('front-office/privacypolicy', []);
    }

    //TERMS & CONDITIONS
    function termsandconditions()
    {
        $this->render('front-office/termsandconditions', []);
    }

    //FAQ
    function faq()
    {
        $this->render('front-office/faq', []);
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

        ob_start();
        require('../views/' . $viewName . '.html.php');
        $content = ob_get_clean();
        require('../views/header.php');
        require('../views/template.php');
        require('../views/footer.php');
    }
}
