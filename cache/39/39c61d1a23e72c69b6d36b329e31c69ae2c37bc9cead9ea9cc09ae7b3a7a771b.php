<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_48f50e21fc91b7e8e468402265c8dcac1ce7c9db81531474cc764cb9c682248d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'subtitle' => [$this, 'block_subtitle'],
            'content' => [$this, 'block_content'],
            'javascript' => [$this, 'block_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!doctype html>
<html lang=\"en-US\">

<head>
    <!-- Required meta tags -->
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo " | ";
        $this->displayBlock('subtitle', $context, $blocks);
        echo "</title>
    <!-- Favicon -->
    <link rel=\"shortcut icon\" href=\"../public/images/favicon.ico\" />
    <!-- Bootstrap CSS -->
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
    <!-- Typography CSS -->
    <link rel=\"stylesheet\" href=\"../public/css/typography.css\">
    <!-- Style -->
    <link rel=\"stylesheet\" href=\"../public/css/style.css\" />
    <!-- Responsive -->
    <link rel=\"stylesheet\" href=\"../public/css/responsive.css\" />
</head>

<body>
    <!-- loader Start -->
    <div id=\"loading\">
        <div id=\"loading-center\">
        </div>
    </div>
    <!-- loader END -->
    <!-- Header -->
    <header id=\"main-header\">
        <div class=\"main-header\">
            <div class=\"container-fluid\">
                <div class=\"row\">
                    <div class=\"col-sm-12\">
                        <nav class=\"navbar navbar-expand-lg navbar-light p-0\">
                            <a href=\"#\" class=\"navbar-toggler c-toggler\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                                <div class=\"navbar-toggler-icon\" data-toggle=\"collapse\">
                                    <span class=\"navbar-menu-icon navbar-menu-icon--top\"></span>
                                    <span class=\"navbar-menu-icon navbar-menu-icon--middle\"></span>
                                    <span class=\"navbar-menu-icon navbar-menu-icon--bottom\"></span>
                                </div>
                            </a>
                            <a class=\"navbar-brand\" href=\"/\"> <img class=\"img-fluid logo\" src=\"../public/images/logo.png\" alt=\"streamit\" style=\"width: 220px;\" /> </a>
                            <div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">
                                <div class=\"menu-main-menu-container\">
                                    <ul id=\"top-menu\" class=\"navbar-nav ml-auto\">
                                        <li class=\"menu-item\">
                                            <a href=\"/\">Home</a>
                                        </li>
                                        <li class=\"menu-item\">
                                            <a href=\"/all-serie\">Series</a>
                                        </li>
                                        <li class=\"menu-item\">
                                            <a href=\"/all-movie\">Movies</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class=\"mobile-more-menu\">
                                <a href=\"javascript:void(0);\" class=\"more-toggle\" id=\"dropdownMenuButton\" data-toggle=\"more-toggle\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                    <i class=\"ri-more-line\"></i>
                                </a>
                                <div class=\"more-menu\" aria-labelledby=\"dropdownMenuButton\">
                                    <div class=\"navbar-right position-relative\">
                                        <ul class=\"d-flex align-items-center justify-content-end list-inline m-0\">
                                            <li>
                                                <a href=\"#\" class=\"search-toggle\">
                                                    <i class=\"ri-search-line\"></i>
                                                </a>
                                                <div class=\"search-box iq-search-bar\">
                                                    <form action=\"#\" class=\"searchbox\">
                                                        <div class=\"form-group position-relative\">
                                                            <input type=\"text\" class=\"text search-input font-size-12\" placeholder=\"type here to search...\">
                                                            <i class=\"search-link ri-search-line\"></i>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>
                                            <li class=\"nav-item nav-icon\">
                                                <a href=\"#\" class=\"search-toggle position-relative\">
                                                    <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"22\" height=\"22\" class=\"noti-svg\">
                                                        <path fill=\"none\" d=\"M0 0h24v24H0z\" />
                                                        <path d=\"M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z\" />
                                                    </svg>
                                                    <span class=\"bg-danger dots\"></span>
                                                </a>
                                                <div class=\"iq-sub-dropdown\">
                                                    <div class=\"iq-card shadow-none m-0\">
                                                        <div class=\"iq-card-body\">
                                                            <a href=\"#\" class=\"iq-sub-card\">
                                                                <div class=\"media align-items-center\">
                                                                    <img src=\"../public/images/notify/thumb-1.jpg\" class=\"img-fluid mr-3\" alt=\"streamit\" />
                                                                    <div class=\"media-body\">
                                                                        <h6 class=\"mb-0 \">Boop Bitty</h6>
                                                                        <small class=\"font-size-12\"> just now</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href=\"#\" class=\"iq-sub-card\">
                                                                <div class=\"media align-items-center\">
                                                                    <img src=\"../public/images/notify/thumb-2.jpg\" class=\"img-fluid mr-3\" alt=\"streamit\" />
                                                                    <div class=\"media-body\">
                                                                        <h6 class=\"mb-0 \">The Last Breath</h6>
                                                                        <small class=\"font-size-12\">15 minutes ago</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a href=\"#\" class=\"iq-sub-card\">
                                                                <div class=\"media align-items-center\">
                                                                    <img src=\"../public/images/notify/thumb-3.jpg\" class=\"img-fluid mr-3\" alt=\"streamit\" />
                                                                    <div class=\"media-body\">
                                                                        <h6 class=\"mb-0 \">The Hero Camp</h6>
                                                                        <small class=\"font-size-12\">1 hour ago</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class=\"navbar-right menu-right\">
                                <ul class=\"d-flex align-items-center list-inline m-0\">
                                    <li class=\"nav-item nav-icon\">
                                        <a href=\"#\" class=\"search-toggle device-search\">
                                            <i class=\"ri-search-line\"></i>
                                        </a>
                                        <div class=\"search-box iq-search-bar d-search\">
                                            <form action=\"#\" class=\"searchbox\">
                                                <div class=\"form-group position-relative\">
                                                    <input type=\"text\" class=\"text search-input font-size-12\" placeholder=\"type here to search...\">
                                                    <i class=\"search-link ri-search-line\"></i>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                    <li class=\"nav-item nav-icon\">
                                        <a href=\"#\" class=\"search-toggle\" data-toggle=\"search-toggle\">
                                            <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" width=\"22\" height=\"22\" class=\"noti-svg\">
                                                <path fill=\"none\" d=\"M0 0h24v24H0z\" />
                                                <path d=\"M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z\" />
                                            </svg>
                                            <span class=\"bg-danger dots\"></span>
                                        </a>
                                        <div class=\"iq-sub-dropdown\">
                                            <div class=\"iq-card shadow-none m-0\">
                                                <div class=\"iq-card-body\">
                                                    <a href=\"#\" class=\"iq-sub-card\">
                                                        <div class=\"media align-items-center\">
                                                            <img src=\"../public/images/notify/thumb-1.jpg\" class=\"img-fluid mr-3\" alt=\"streamit\" />
                                                            <div class=\"media-body\">
                                                                <h6 class=\"mb-0 \">Boot Bitty</h6>
                                                                <small class=\"font-size-12\"> just now</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href=\"#\" class=\"iq-sub-card\">
                                                        <div class=\"media align-items-center\">
                                                            <img src=\"../public/images/notify/thumb-2.jpg\" class=\"img-fluid mr-3\" alt=\"streamit\" />
                                                            <div class=\"media-body\">
                                                                <h6 class=\"mb-0 \">The Last Breath</h6>
                                                                <small class=\"font-size-12\">15 minutes ago</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <a href=\"#\" class=\"iq-sub-card\">
                                                        <div class=\"media align-items-center\">
                                                            <img src=\"../public/images/notify/thumb-3.jpg\" class=\"img-fluid mr-3\" alt=\"streamit\" />
                                                            <div class=\"media-body\">
                                                                <h6 class=\"mb-0 \">The Hero Camp</h6>
                                                                <small class=\"font-size-12\">1 hour ago</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class=\"nav-overlay\"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>



   ";
        // line 195
        $this->displayBlock('content', $context, $blocks);
        // line 196
        echo "

    <footer class=\"mb-0\">
        <div class=\"container-fluid\">
            <div class=\"block-space\">
                <div class=\"row\">
                    <div class=\"col-lg-3 col-md-4\">
                        <ul class=\"f-link list-unstyled mb-0\">
                            <li><a href=\"/pages/about-us\">About Us</a></li>
                            <li><a href=\"movie-category.html\">Movies</a></li>
                            <li><a href=\"show-category.html\">Tv Shows</a></li>
                            <li><a href=\"/pages/corporate-information\">Coporate Information</a></li>
                        </ul>
                    </div>
                    <div class=\"col-lg-3 col-md-4\">
                        <ul class=\"f-link list-unstyled mb-0\">
                            <li><a href=\"/pages/privacy-policy\">Privacy Policy</a></li>
                            <li><a href=\"/pages/terms-and-conditions\">Terms & Conditions</a></li>
                            <li><a href=\"/contact\">Contact Us</a></li>
                            <li><a href=\"/pages/frequently-asked-questions\">FAQ</a></li>
                        </ul>
                    </div>
                    <div class=\"col-lg-3 col-md-12 r-mt-15\">
                        <div class=\"d-flex\">
                            <script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
                            <!-- moviz-stream.com -->
                            <ins class=\"adsbygoogle\" style=\"display:block\" data-ad-client=\"ca-pub-6280097889725636\" data-ad-slot=\"3236159279\" data-ad-format=\"auto\" data-full-width-responsive=\"true\"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                            <script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
                            <!-- moviz-stream.com -->
                            <ins class=\"adsbygoogle\" style=\"display:block\" data-ad-client=\"ca-pub-6280097889725636\" data-ad-slot=\"3236159279\" data-ad-format=\"auto\" data-full-width-responsive=\"true\"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"copyright py-2\">
            <div class=\"container-fluid\">
                <p class=\"mb-0 text-center font-size-14 text-body\">";
        // line 239
        echo twig_escape_filter($this->env, twig_constant("_SITETITLE"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y"), "html", null, true);
        echo " All Rights Reserved</p>
            </div>
        </div>
    </footer>
    <!-- MainContent End-->
    <!-- back-to-top -->
    <div id=\"back-to-top\">
        <a class=\"top\" href=\"#top\" id=\"top\"> <i class=\"fa fa-angle-up\"></i> </a>
    </div>
    <!-- back-to-top End -->
    <!-- jQuery, Popper JS -->
    ";
        // line 250
        $this->displayBlock('javascript', $context, $blocks);
        // line 251
        echo "    <script src=\"../public/js/jquery-3.4.1.min.js\"></script>
    <script src=\"../public/js/popper.min.js\"></script>
    <!-- Bootstrap JS -->
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js\"></script>
    <!-- Slick JS -->
    <script src=\"../public/js/slick.min.js\"></script>
    <!-- owl carousel Js -->
    <script src=\"../public/js/owl.carousel.min.js\"></script>
    <!-- select2 Js -->
    <script src=\"../public/js/select2.min.js\"></script>
    <!-- Magnific Popup-->
    <script src=\"../public/js/jquery.magnific-popup.min.js\"></script>
    <!-- Slick Animation-->
    <script src=\"../public/js/slick-animation.min.js\"></script>
    <!-- Custom JS-->
    <script src=\"../public/js/custom.js\"></script>
</body>

</html>";
    }

    // line 9
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " ";
        echo twig_escape_filter($this->env, twig_constant("_SITETITLE"), "html", null, true);
        echo " ";
    }

    public function block_subtitle($context, array $blocks = [])
    {
        $macros = $this->macros;
        echo " ";
        echo twig_escape_filter($this->env, twig_constant("_SLOGANT"), "html", null, true);
    }

    // line 195
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 250
    public function block_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  351 => 250,  345 => 195,  329 => 9,  307 => 251,  305 => 250,  289 => 239,  244 => 196,  242 => 195,  51 => 9,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "C:\\wamp64\\www\\Moviz-Stream\\views\\front-office\\base.html.twig");
    }
}
