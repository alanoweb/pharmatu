<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from gameforest.yakuzi.eu/games-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Feb 2017 10:13:32 GMT -->
    <head>
        {% trans_default_domain 'FOSUserBundle' %}
        <!-- META -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Gameforest - Responsive Gaming HTML Theme</title>

        <!-- FAVICON -->
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

        <!-- CORE CSS -->
        <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'> 

        <!-- PLUGINS -->
        <link href="{{asset('plugins/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.css')}}" rel="stylesheet">

        <!-- THEME CSS -->
        <link href="{{asset('css/theme.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/custom.css')}}" rel="stylesheet">

        <!-- My CSS -->
        <link href="{{asset('css/loginmodal.css')}}" rel="stylesheet">
    </head>

    <body class="fixed-header">
        <header>
            <div class="container" >
                <span class="bar hide"></span>
                <a href="index-2.html" class="logo"><img src="{{asset('img/logo.png')}}" alt=""></a>
                <nav>
                    <div class="nav-control">
                        <ul>	
                            <li >
                                <a href="{{path('homepage')}}" >Accueil</a>
                                <!--<ul class="dropdown-menu default">
                                        <li><a href="home-magazine.html">Home - Magazine</a></li>
                                        <li><a href="home-magazine-2.html">Home - Magazine 2</a></li>
                                        <li><a href="home-magazine-3.html">Home - Magazine 3</a></li>
                                        <li><a href="index-2.html">Home - Games</a></li>
                                        <li><a href="home-videos.html">Home - Videos</a></li>
                                </ul>-->
                            </li>
                            {% if not app.user %}						
                                <li > 
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal">Se connecter</a>
                                </li>
                            {% endif %}
                            <li class="dropdown mega-dropdown">
                                <a >Activités</a>
                                <ul id="menu-mymenu" class="dropdown-menu mega-dropdown-menu category">       
                                    {{ render(controller("FrontBundle:Default:menu")) }}
                                </ul>
                            </li>
                            <li>
                                <a href="{{path('boutique')}}">Boutique</a>
                            </li>
                            <li>
                                <a href="{{path('apropos')}}">Apropos</a>
                            </li>
                            <li>
                                <a href="{{path('contact')}}">Contact</a>
                            </li>
                            {#<li class="dropdown mega-dropdown">
                                    <a href="games.html">Games</a>
                                    <ul class="dropdown-menu mega-dropdown-menu category">
                                            <li class="col-md-3">
                                                    <a href="games-single.html">
                                                            <img src="{{asset('img/game/menu-1.jpg')}}" alt="">
                                                            <div class="caption">
                                                                    <span class="label label-warning">PC</span>
                                                                    <h3>Assassin's Creed Syndicate</h3>
                                                                    <p>Lorem ipsum dolor sit amet, adipise elit.</p>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="col-md-3">
                                                    <a href="games-single.html">
                                                            <img src="{{asset('img/game/menu-2.jpg')}}" alt="">
                                                            <div class="caption">
                                                                    <span class="label label-primary">PS4</span>
                                                                    <h3>Last of Us Remastered</h3>
                                                                    <p>Lorem ipsum dolor sit amet, adipise elit.</p>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="col-md-3">
                                                    <a href="games-single.html">
                                                            <img src="{{asset('img/game/menu-3.jpg')}}" alt="">
                                                            <div class="caption">
                                                                    <span class="label label-success">Xbox</span>
                                                                    <h3>Max Payne 3</h3>
                                                                    <p>Lorem ipsum dolor sit amet, adipise elit.</p>
                                                            </div>
                                                    </a>
                                            </li>
                                            <li class="col-md-3">
                                                    <a href="games-single.html">
                                                            <img src="{{asset('img/game/menu-4.jpg')}}" alt="">
                                                            <div class="caption">
                                                                    <span class="label label-danger">Steam</span>
                                                                    <h3>Hitman Absolution</h3>
                                                                    <p>Lorem ipsum dolor sit amet, adipise elit.</p>
                                                            </div>
                                                    </a>
                                            </li>
                                    </ul>
                            </li>
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle">Blog</a>
                                    <ul class="dropdown-menu default">
                                            <li class="dropdown-submenu">
                                                    <a href="blog-large.html"><i class="fa fa-align-justify"></i> Blog Large</a>
                                                    <ul class="dropdown-menu">
                                                            <li><a href="blog-large.html">Archive</a></li>
                                                            <li><a href="blog-large-sidebar.html">Sidebar</a></li>
                                                            <li><a href="blog-large-post.html">Single Post</a></li>
                                                    </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                    <a href="blog-medium.html"><i class="fa fa-list-ul"></i> Blog Medium</a>
                                                    <ul class="dropdown-menu">
                                                            <li><a href="blog-medium.html">Archive</a></li>
                                                            <li><a href="blog-medium-sidebar.html">Sidebar</a></li>
                                                            <li><a href="blog-medium-post.html">Single Post</a></li>
                                                    </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                    <a href="blog-post.html"><i class="fa fa-file-o"></i> Single Post</a>
                                                    <ul class="dropdown-menu">
                                                            <li><a href="blog-post.html">Blog Image Post</a></li>
                                                            <li><a href="blog-post-slideshow.html">Blog Slideshow Post</a></li>
                                                            <li><a href="blog-post-video.html">Blog Video Post</a></li>
                                                            <li><a href="blog-post-music.html">Blog Music Post</a></li>
                                                            <li><a href="blog-post-disqus.html">Blog Disqus Post</a></li>
                                                    </ul>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="blog-masonry.html"><i class="fa fa-th-large"></i>Blog Masonry</a></li>
                                            <li><a href="blog-thumbnail.html"><i class="fa fa-clone"></i>Blog Thumbnail</a></li>
                                            <li><a href="blog-timeline.html"><i class="fa fa-clock-o"></i>Blog Timeline</a></li>
                                    </ul>
                            </li>
                            <li class="dropdown mega-dropdown mega-dropdown-sm">
                                    <a href="#">Pages</a>
                                    <ul class="dropdown-menu mega-dropdown-menu row">
                                            <li class="col-md-6">
                                                    <ul>
                                                            <li class="dropdown-header">Default Examples</li>
                                                            <li><a href="games.html">Games</a></li>
                                                            <li><a href="games-single.html">Game Post</a></li>
                                                            <li><a href="reviews.html">Reviews</a></li>
                                                            <li><a href="reviews-single.html">Review Post</a></li>
                                                            <li><a href="videos.html">Videos</a></li>
                                                            <li><a href="videos-single.html">Videos Post</a></li>
                                                            <li><a href="contact.html">Contact</a></li>
                                                    </ul>
                                            </li>
                                            <li class="col-md-6">
                                                    <ul>
                                                            <li class="dropdown-header">Initial Examples</li>
                                                            <li><a href="login.html">Login</a></li>
                                                            <li><a href="register.html">Register</a></li>
                                                            <li><a href="profile.html">Profile Page</a></li>
                                                            <li><a href="forum.html">Forums</a></li>
                                                            <li><a href="fullwidth.html">Full Width</a></li>
                                                            <li><a href="blank-page.html">Blank Page</a></li>
                                                            <li><a href="404.html">404 Error</a></li>
                                                    </ul>
                                            </li>
                                    </ul>
                            </li>
                            <li class="dropdown mega-dropdown">
                                    <a href="#">Elements</a>
                                    <ul class="dropdown-menu mega-dropdown-menu row" style="background-image: url(img/content/menu.png);">
                                            <li class="col-md-3">
                                                    <ul>
                                                            <li class="dropdown-header">Typography</li>
                                                            <li><a href="elements-typography.html"><i class="fa fa-text-height"></i> General Typography</a></li>
                                                            <li><a href="elements-blockquote.html"><i class="fa fa-quote-left"></i> Blockquote</a></li>
                                                            <li><a href="elements-helpers.html"><i class="fa fa-square-o"></i> Helper Classes</a></li>
                                                            <li><a href="elements-testimonials.html"><i class="fa fa-bullhorn"></i> Testimonials</a></li>
                                                            <li><a href="elements-grids.html"><i class="fa fa-th-large"></i> Grid Layouts</a></li>
                                                            <li><a href="elements-alerts.html"><i class="fa fa-bell-o"></i> Alert & Messages</a></li>
                                                            <li><a href="elements-labels.html"><i class="fa fa-bookmark-o"></i> Labels & Badges</a></li>
                                                            <li><a href="elements-media.html"><i class="fa fa-image"></i> Audio, Videos & Images</a></li>
                                                            <li><a href="elements-pagers.html"><i class="fa fa-ellipsis-h"></i> Pagination & Pagers</a></li>
                                                    </ul>
                                            </li>
                                            <li class="col-md-3">
                                                    <ul>
                                                            <li class="dropdown-header">Button & Icons</li>
                                                            <li><a href="elements-buttons.html"><i class="fa fa-flash"></i> General Buttons</a></li>
                                                            <li><a href="elements-social-buttons.html"><i class="fa fa-thumbs-o-up"></i> Social Buttons</a></li>
                                                            <li><a href="elements-glyphicons.html"><i class="fa fa-chevron-circle-right"></i> Glyphicons</a></li>
                                                            <li><a href="elements-fontawesome.html"><i class="fa fa-chevron-circle-right"></i> FontAwesome</a></li>
                                                            <li><a href="elements-ionicons.html"><i class="fa fa-chevron-circle-right"></i> IonIcons</a></li>
                                                            <li class="dropdown-header">Components</li>
                                                            <li><a href="elements-media-objects.html"><i class="fa fa-align-justify"></i> Media Objects</a></li>
                                                            <li><a href="elements-page-headers.html"><i class="fa fa-align-justify"></i> Page headers</a></li>
                                                            <li><a href="elements-wells.html"><i class="fa fa-align-justify"></i> Wells</a></li>
                                                    </ul>
                                            </li>
                                            <li class="col-md-3">
                                                    <ul>
                                                            <li class="dropdown-header">Default Elements</li>
                                                            <li><a href="elements-widgets.html"><i class="fa fa-th"></i> Widgets</a></li>
                                                            <li><a href="elements-sections.html"><i class="fa fa-th"></i> Sections</a></li>
                                                            <li><a href="elements-thumbnails.html"><i class="fa fa-file-o"></i> Thumbnails</a></li> 
                                                            <li><a href="elements-cards.html"><i class="fa fa-sticky-note-o"></i> Cards</a></li>   
                                                            <li><a href="elements-tabs.html"><i class="fa fa-external-link"></i> Accordion & Tabs</a></li>
                                                            <li><a href="elements-timeline.html"><i class="fa fa-th-large"></i> Timeline</a></li>
                                                            <li><a href="elements-tables.html"><i class="fa fa-th"></i> Tables</a></li>
                                                            <li><a href="elements-progress.html"><i class="fa fa-arrows-h"></i> Progress Bars</a></li>
                                                            <li><a href="elements-panels.html"><i class="fa fa-th"></i> Panels</a></li>
                                                    </ul>
                                            </li>
                                            <li class="col-md-3">
                                                    <ul>
                                                            <li class="dropdown-header">Forms & Info</li>
                                                            <li><a href="elements-forms.html"><i class="fa fa-align-justify"></i> Form Elements</a></li>
                                                            <li><a href="elements-form-layouts.html"><i class="fa fa-align-justify"></i> Form Layouts</a></li>		
                                                            <li><a href="elements-modals.html"><i class="fa fa-external-link"></i> Modals</a></li>			 	
                                                            <li><a href="elements-carousel.html"><i class="fa fa-arrows"></i> Carousel Examples</a></li>		
                                                            <li><a href="elements-charts.html"><i class="fa fa-bar-chart-o"></i> Charts & Countdowns</a></li>		
                                                            <li><a href="elements-google-maps.html"><i class="fa fa-map-marker"></i> Google Maps</a></li>		                                             
                                                    </ul>
                                            </li>
                                    </ul>
                            </li>
                            <li><a href="videos.html">Videos</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="contact.html">Contact</a></li>#}
                        </ul>
                    </div>
                </nav>
                <div class="nav-right">
                    {% if app.user %}
                        <div class="nav-profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('img/user/avatar.jpg')}}" alt="">
                                <span>
                                    {% if app.user.admin != null %}
                                        {% if app.user.admin.pseudo != null and app.user.admin.pseudo != ""%}
                                            {{app.user.admin.pseudo}}
                                        {%else%}
                                            {{app.user.admin.nom}} {{app.user.admin.prenom}}
                                        {%endif%}
                                    {%elseif app.user.entreprise != null%}
                                        {{app.user.entreprise.nom}}
                                    {%elseif app.user.utilisateur%}
                                        {% if app.user.utilisateur.pseudo != null and app.user.utilisateur.pseudo != ""%}
                                            {{app.user.utilisateur.pseudo}}
                                        {%else%}
                                            {{app.user.utilisateur.nom}} {{app.user.utilisateur.prenom}}
                                        {%endif%}
										{%else%}
										{{app.user.username}}
                                    {%endif%}
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                {% if is_granted('ROLE_SUPER_ADMIN')%}     
                                    <li><a href="{{path('categories')}}"><i class="fa fa-area-chart"></i>Catégories</a></li>                                    
                                    {% endif %} 
                                    {% if is_granted('ROLE_ADMIN')%}
                                    <li><a href="{{path('profils')}}"><i class="fa fa-group"></i>Profils</a></li>  
                                    {% endif %}
                                    {% if is_granted('ROLE_ENTREPRISE')%}
                                    <li><a href="{{path('gagnants')}}"><i class="fa fa-trophy"></i>Gagnants</a></li>                  
                                    <li><a href="{{path('statistique')}}"><i class="fa fa-bar-chart"></i>Statistique</a></li>                  
                                    <li><a href="{{path('pub')}}"><i class="fa fa-eye"></i>Pub</a></li>
                                    {% endif %}
                                    {% if is_granted('ROLE_SUPER_ADMIN') == false%}
                                    <li><a href="{{path('monprofil')}}"><i class="fa fa-user"></i> Mon profil</a></li>
                                    {%endif%}
                                    {% if is_granted('ROLE_SUPER_ADMIN') == false and is_granted('ROLE_ADMIN') == false and is_granted('ROLE_ENTREPRISE') == false%}
                                    <li><a href="#"><i class="fa fa-heart"></i> Likes <span class="label label-info">32</span></a></li>
                                    <li><a href="#"><i class="fa fa-gamepad"></i> Games</a></li>
                                    <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                                    {%endif%}
                                <li class="divider"></li>
                                <li><a href="{{path('fos_user_security_logout')}}"><i class="fa fa-power-off"></i>Déconnection</a></li>
                            </ul>
                        </div>
                        <div class="nav-dropdown dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="label label-danger">3</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header"><i class="fa fa-bell"></i> You have 5 new games</li>
                                <li><a href="#">Alien Isolation</a></li>
                                <li><a href="#">Witcher 3 <span class="label label-success">XBOX</span></a></li>
                                <li><a href="#">Last of Us</a></li>
                                <li><a href="#">Uncharted 4 <span class="label label-primary">PS4</span></a></li>
                                <li><a href="#">GTA 5 <span class="label label-warning">PC</span></a></li>
                                <li class="dropdown-footer"><a href="#">View all games</a></li>
                            </ul>
                        </div>
                    {%else%}
                        <div class="nav-profile ">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal" class="dropdown-toggle" ><img src="{{asset('img/user/avatar.jpg')}}" alt=""> <span>Anonyme</span></a>  
                        </div>
                    {%endif%}
                    <a href="#" data-toggle="modal-search"><i class="fa fa-search"></i></a>
                </div>
            </div>
        </header>
        <!-- /header -->

        <div class="modal-search">
            <div class="container">
                <input type="text" class="form-control" placeholder="Type to search...">
                <i class="fa fa-times close"></i>
            </div>
        </div><!-- /.modal-search -->

        <!-- wrapper -->
        <div id="wrapper">
            {% block Dashboard %}
            {% block slide %}
                 <div id="full-carousel" class="ken-burns carousel slide full-carousel carousel-fade" data-ride="carousel" style="height:400px;">
                    <ol class="carousel-indicators">
                        <li data-target="#full-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#full-carousel" data-slide-to="1"></li>
                        <li data-target="#full-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="height:400px; ">
                        <div class="item active inactiveUntilOnLoad" style="height:400px; ">
                            <img src="{{asset('img/slideshow/1.jpg')}}" alt="">
                            <div class="container" style="height:400px; position:fixed;">
                                <div class="carousel-caption" style="height:400px; ">
                                    <h1 data-animation="animated animate1 bounceInDown" style="margin:auto !important; height:auto; ">The Witcher 3: Wild Hunt</h1>
                                    <p data-animation="animated animate7 fadeInUp">The world is in chaos. The air is thick with tension and the smoke of burnt villages.</p>
                                    <a href="#signin" data-toggle="modal" class="btn btn-primary btn-lg btn-rounded" data-animation="animated animate10 fadeIn">Became a member now</a>
                                </div>		
                            </div>
                        </div>

                        <div class="item" style="height:400px; ">
                            <img src="{{asset('img/slideshow/2.jpg')}}" alt="">
                            <div class="container" style="height:400px; position:fixed;">
                                <div class="carousel-caption" style="height:400px; " >
                                    <h1 data-animation="animated animate1 fadeInDown" style="margin:auto !important;">The Last of Us: Remastered</h1>
                                    <p data-animation="animated animate7 fadeIn">Survive an apocalypse on Earth in The Last of Us, a PlayStation 4-exclusive title by Naughty Dog.</p>
                                    <a href="#signin" data-toggle="modal" class="btn btn-primary btn-lg btn-rounded" data-animation="animated animate10 fadeIn" >Became a member now</a>
                                </div>
                            </div>
                        </div>

                        <div class="item" style="height:400px; ">
                            <img src="{{asset('img/slideshow/3.jpg')}}" alt="">
                            <div class="container" style="height:400px; position:fixed;">
                                <div class="carousel-caption"  style="height:400px; ">
                                    <h1 data-animation="animated animate1 fadeIn" style="margin:auto !important">Star Wars: Battlefront 3</h1>
                                    <p data-animation="animated animate7 fadeIn">Galactic forces clash in this reboot of Star Wars Battlefront, the blockbuster shooter.</p>
                                    <a href="#signin" data-toggle="modal" class="btn btn-primary btn-lg btn-rounded" data-animation="animated animate10 fadeIn">Became a member now</a>
                                </div>
                            </div>
                        </div>

                        <a class="left carousel-control" href="#full-carousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#full-carousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            {% endblock slide%}

            <section class="bg-grey-50 padding-top-30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="ax">
                            <div class="col-md-3" >

                                <div class="widget widget-game" style="background-image: url(img/game/game-widget.jpg);">
                                    <div class="overlay">
                                        <div class="title">The Withcer 3: Wild Hunt</div>

                                        <div class="bold text-uppercase">Platforms</div>
                                        <span class="label label-primary">PS4</span>
                                        <span class="label label-warning">PC</span>
                                        <span class="label label-success">Xbox</span>

                                        <div class="bold text-uppercase margin-top-40">Developer</div>
                                        <span class="font-size-13">CD Projekt Red Studio</span>

                                        <div class="bold text-uppercase margin-top-35">Release Date:</div>
                                        <span class="font-size-13">June 18, 2015</span>

                                        <div class="description">
                                            The Witcher 3: Wild Hunt is a story-driven, next-generation open world role-playing game, set in a visually stunning fantasy universe, full of meaningful choices and impactful consequences.
                                            <a href="#" class="btn btn-block btn-primary margin-top-40">Follow now <i class="fa fa-heart-o margin-left-10"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget widget-list">
                                    <div class="tab-select border-bottom-1 border-grey-300">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tabs1" data-toggle="tab">Posts</a></li>
                                            <li><a href="#tabs2" data-toggle="tab">Forums</a></li>
                                            <li><a href="#" data-toggle="tab">Images</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <ul class="tab-pane fade in active" id="tabs1">
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/1.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Overwatch Closed Beta</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 15, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/2.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Blood and Gore</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 13, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/3.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Warner Bros. Interactive</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 12, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/4.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Sharks Don't Sleep</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 10, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/5.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">GTA 5 Reaches 5 Million</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 10, 2015</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="tab-pane fade" id="tabs2">
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/1.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Overwatch Closed Beta</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 15, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/2.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Blood and Gore</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 13, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/3.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Warner Bros. Interactive</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 12, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/4.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Sharks Don't Sleep</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 10, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/5.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">GTA 5 Reaches 5 Million</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 10, 2015</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="widget widget-card">
                                    <div class="title">Related Videos</div>
                                    <div class="card">
                                        <div class="card-img">
                                            <a href="videos-single.html"><img src="{{asset('../i1.ytimg.com/vi/tuPEam_Jt4I/mqdefault.jpg')}}" alt=""></a>
                                            <div class="time">04:51</div>
                                        </div>
                                        <div class="caption">
                                            <h3 class="card-title"><a href="videos-single.html">The Witcher 3: Wild Hunt - Official Gameplay</a></h3>
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                <li><i class="fa fa-eye"></i> 1500 views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-img">
                                            <a href="videos-single.html"><img src="{{asset('../i1.ytimg.com/vi/_UFT49qWopg/mqdefault.jpg')}}" alt=""></a>
                                            <div class="time">02:04</div>
                                        </div>
                                        <div class="caption">
                                            <h3 class="card-title"><a href="videos-single.html">The Witcher 3: Wild Hunt - The Beginning</a></h3>
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                <li><i class="fa fa-eye"></i> 1500 views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-img">
                                            <a href="videos-single.html"><img src="{{asset('../i1.ytimg.com/vi/xx8kQ4s5hCY/mqdefault.jpg')}}" alt=""></a>
                                            <div class="time">06:33</div>
                                        </div>
                                        <div class="caption">
                                            <h3 class="card-title"><a href="videos-single.html">The Witcher 3: Wild Hunt</a></h3>
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                <li><i class="fa fa-eye"></i> 1500 views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-img">
                                            <a href="videos-single.html"><img src="{{asset('../i1.ytimg.com/vi/c0i88t0Kacs/mqdefault.jpg')}}" alt=""></a>
                                            <div class="time">11:06</div>
                                        </div>
                                        <div class="caption">
                                            <h3 class="card-title"><a href="videos-single.html">aaaaaaaaaaaaaaaaaaaaaaaaaaaaa</a></h3>
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                <li><i class="fa fa-eye"></i> 1500 views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-inverse btn-block">More Videos</a>
                                </div>
                            </div>
                        </div>
                        <div class="ay">
                            <div class="col-md-6" >
                                {% block  body  %}
                                    <div class="panel panel-default panel-post">
                                        <div class="panel-body">
                                            <div class="post">
                                                <div class="post-header post-author">
                                                    <a href="#" class="author" data-toggle="tooltip" title="YAKUZI"><img src="{{asset('img/user/avatar.jpg')}}" alt=""></a>
                                                    <div class="post-title">
                                                        <h3><a href="#">The Witcher 3: Wild Hunt Gameplay</a></h3>
                                                        <ul class="post-meta">
                                                            <li><a href="#"><i class="fa fa-user"></i> YAKUZI</a></li>
                                                            <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                            <li><a href="#"><i class="fa fa-comments"></i> 0 <span class="hidden-xs">Comments</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="embed-responsive embed-responsive-16by9 post-thumbnail">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/vSteQ_wlB94?rel=0&amp;showinfo=0" allowfullscreen></iframe>
                                                </div>

                                                Etiam et sollicitudin elit. Sed ultrices aliquet dui, eu aliquet metus sodales sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis porttitor varius pulvinar. Vivamus efficitur vulputate imperdiet.
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <ul class="post-action">
                                                <li><a href="#"><i class="fa fa-heart"></i> like (5)</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
                                                <li><a href="#"><i class="fa fa-reply"></i> share</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel panel-default panel-post">
                                        <div class="panel-body">
                                            <div class="post">
                                                <div class="post-header post-author">
                                                    <a href="#" class="author" data-toggle="tooltip" title="YAKUZI"><img src="{{asset('img/user/avatar.jpg')}}" alt=""></a>
                                                    <div class="post-title">
                                                        <h3><a href="#">The Witcher Adventure Game Review</a></h3>
                                                        <ul class="post-meta">
                                                            <li><a href="#"><i class="fa fa-user"></i> YAKUZI</a></li>
                                                            <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                            <li><a href="#"><i class="fa fa-comments"></i> 0 <span class="hidden-xs">Comments</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div id="post-carousel" class="carousel slide post-thumbnail" data-ride="carousel">
                                                    <ol class="carousel-indicators">
                                                        <li data-target="#post-carousel" data-slide-to="0" class="active"></li>
                                                        <li data-target="#post-carousel" data-slide-to="1"></li>
                                                    </ol>
                                                    <div class="carousel-inner">
                                                        <div class="item active">
                                                            <img src="{{asset('img/blog/lg/1.jpg')}}" alt="">
                                                            <div class="post-caption">Example of post thumbnail caption</div>
                                                        </div>
                                                        <div class="item">
                                                            <img src="{{asset('img/blog/lg/2.jpg')}}" alt="">
                                                            <div class="post-caption">Example of post thumbnail caption</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                Etiam et sollicitudin elit. Sed ultrices aliquet dui, eu aliquet metus sodales sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis porttitor varius pulvinar. Vivamus efficitur vulputate imperdiet.
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <ul class="post-action">
                                                <li><a href="#"><i class="fa fa-heart"></i> like (5)</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
                                                <li><a href="#"><i class="fa fa-reply"></i> share</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel panel-default panel-post">
                                        <div class="panel-body">
                                            <div class="post">
                                                <div class="post-header post-author">
                                                    <a href="#" class="author" data-toggle="tooltip" title="YAKUZI"><img src="{{asset('img/user/avatar.jpg')}}" alt=""></a>
                                                    <div class="post-title">
                                                        <h3><a href="#">The Witcher 3 is Game of the Year</a></h3>
                                                        <ul class="post-meta">
                                                            <li><a href="#"><i class="fa fa-user"></i> YAKUZI</a></li>
                                                            <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                            <li><a href="#"><i class="fa fa-comments"></i> 0 <span class="hidden-xs">Comments</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="post-thumbnail">
                                                    <a href="blog-post.html"><img src="{{asset('img/blog/lg/3.jpg')}}" alt=""></a>
                                                    <div class="post-caption">Example of post thumbnail caption</div>
                                                </div>
                                                Etiam et sollicitudin elit. Sed ultrices aliquet dui, eu aliquet metus sodales sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis porttitor varius pulvinar. Vivamus efficitur vulputate imperdiet.
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <ul class="post-action">
                                                <li><a href="#"><i class="fa fa-heart"></i> like (5)</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
                                                <li><a href="#"><i class="fa fa-reply"></i> share</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="panel panel-default panel-post">
                                        <div class="panel-body">
                                            <div class="post">
                                                <div class="post-header post-author">
                                                    <a href="#" class="author" data-toggle="tooltip" title="YAKUZI"><img src="{{asset('img/user/avatar.jpg')}}" alt=""></a>
                                                    <div class="post-title">
                                                        <h3><a href="#">The Witcher 3: Wild Hunt Is the Last Witcher Game</a></h3>
                                                        <ul class="post-meta">
                                                            <li><a href="#"><i class="fa fa-user"></i> YAKUZI</a></li>
                                                            <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                            <li><a href="#"><i class="fa fa-comments"></i> 0 <span class="hidden-xs">Comments</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                Etiam et sollicitudin elit. Sed ultrices aliquet dui, eu aliquet metus sodales sit amet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis porttitor varius pulvinar. Vivamus efficitur vulputate imperdiet.
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <ul class="post-action">
                                                <li><a href="#"><i class="fa fa-heart"></i> like (5)</a></li>
                                                <li><a href="#"><i class="fa fa-comments"></i> Comments</a></li>
                                                <li><a href="#"><i class="fa fa-reply"></i> share</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="text-center"><a href="#" class="btn btn-primary btn-lg btn-shadow btn-rounded btn-icon-right">Load Posts</a></div>
                                {% endblock  body  %}
                            </div>
                        </div>
                        <div class="az">
                            <div class="col-md-3">
                                <div class="widget widget-game" style="background-image: url(img/game/game-widget.jpg);">
                                    <div class="overlay">
                                        <div class="title">The Withcer 3: Wild Hunt</div>

                                        <div class="bold text-uppercase">Platforms</div>
                                        <span class="label label-primary">PS4</span>
                                        <span class="label label-warning">PC</span>
                                        <span class="label label-success">Xbox</span>

                                        <div class="bold text-uppercase margin-top-40">Developer</div>
                                        <span class="font-size-13">CD Projekt Red Studio</span>

                                        <div class="bold text-uppercase margin-top-35">Release Date:</div>
                                        <span class="font-size-13">June 18, 2015</span>

                                        <div class="description">
                                            The Witcher 3: Wild Hunt is a story-driven, next-generation open world role-playing game, set in a visually stunning fantasy universe, full of meaningful choices and impactful consequences.
                                            <a href="#" class="btn btn-block btn-primary margin-top-40">Follow now <i class="fa fa-heart-o margin-left-10"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget widget-list">
                                    <div class="tab-select border-bottom-1 border-grey-300">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tabs1" data-toggle="tab">Posts</a></li>
                                            <li><a href="#tabs2" data-toggle="tab">Forums</a></li>
                                            <li><a href="#" data-toggle="tab">Images</a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <ul class="tab-pane fade in active" id="tabs1">
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/1.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Overwatch Closed Beta</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 15, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/2.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Blood and Gore</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 13, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/3.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Warner Bros. Interactive</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 12, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/4.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Sharks Don't Sleep</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 10, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/5.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">GTA 5 Reaches 5 Million</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 10, 2015</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="tab-pane fade" id="tabs2">
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/1.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Overwatch Closed Beta</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 15, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/2.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Blood and Gore</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 13, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/3.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Warner Bros. Interactive</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 12, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/4.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">Sharks Don't Sleep</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 10, 2015</p>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#" class="thumb"><img src="{{asset('img/blog/xs/5.jpg')}}" alt=""></a>
                                                <div class="widget-list-meta">
                                                    <h4 class="widget-list-title"><a href="#">GTA 5 Reaches 5 Million</a></h4>
                                                    <p><i class="fa fa-clock-o"></i> September 10, 2015</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="widget widget-card">
                                    <div class="title">Related Videos</div>
                                    <div class="card">
                                        <div class="card-img">
                                            <a href="videos-single.html"><img src="{{asset('../i1.ytimg.com/vi/tuPEam_Jt4I/mqdefault.jpg')}}" alt=""></a>
                                            <div class="time">04:51</div>
                                        </div>
                                        <div class="caption">
                                            <h3 class="card-title"><a href="videos-single.html">The Witcher 3: Wild Hunt - Official Gameplay</a></h3>
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                <li><i class="fa fa-eye"></i> 1500 views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-img">
                                            <a href="videos-single.html"><img src="{{asset('../i1.ytimg.com/vi/_UFT49qWopg/mqdefault.jpg')}}" alt=""></a>
                                            <div class="time">02:04</div>
                                        </div>
                                        <div class="caption">
                                            <h3 class="card-title"><a href="videos-single.html">The Witcher 3: Wild Hunt - The Beginning</a></h3>
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                <li><i class="fa fa-eye"></i> 1500 views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-img">
                                            <a href="videos-single.html"><img src="{{asset('../i1.ytimg.com/vi/xx8kQ4s5hCY/mqdefault.jpg')}}" alt=""></a>
                                            <div class="time">06:33</div>
                                        </div>
                                        <div class="caption">
                                            <h3 class="card-title"><a href="videos-single.html">The Witcher 3: Wild Hunt</a></h3>
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                <li><i class="fa fa-eye"></i> 1500 views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-img">
                                            <a href="videos-single.html"><img src="{{asset('../i1.ytimg.com/vi/c0i88t0Kacs/mqdefault.jpg')}}" alt=""></a>
                                            <div class="time">11:06</div>
                                        </div>
                                        <div class="caption">
                                            <h3 class="card-title"><a href="videos-single.html">bbbbbbbbbbbbbbbbbbbbb</a></h3>
                                            <ul>
                                                <li><i class="fa fa-calendar-o"></i> April 13, 2016</li>
                                                <li><i class="fa fa-eye"></i> 1500 views</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-inverse btn-block">More Videos</a>
                                </div>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /#wrapper -->
            {% endblock Dashboard %}
        </div>
        <!-- footer -->
        <footer>
            <div class="container" style="margin-right:250px;">
                <div class="widget row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                        <h4 class="title">About GameForest</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pharetra mattis arcu, a congue leo malesuada eu. Nam nec mauris ut odio tristique varius et eu metus. Quisque massa purus, aliquet quis blandit et, <br /> <br />mollis sed lorem. Sed vel tincidunt elit. Phasellus at varius odio, sit amet fermentum mauris.</p>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <h4 class="title">Categories</h4>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">	
                                <ul class="nav">
                                    <li><a href="#">Playstation 4</a></li>
                                    <li><a href="#">XBOX ONE</a></li>
                                    <li><a href="#">PC</a></li>
                                    <li><a href="#">PS3</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="nav">
                                    <li><a href="#">Gaming</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Videos</a></li>
                                    <li><a href="#">Reviews</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="title">Email Newsletters</h4>
                        <p>Subscribe to our newsletter and get notification when new games are available.</p>
                        <form method="post" class="btn-inline form-inverse">
                            <input type="text" class="form-control" placeholder="Email..." />
                            <button type="submit" class="btn btn-link"><i class="fa fa-envelope"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="footer-bottom" style="margin-right:250px;">
                <div class="container">	
                    <ul class="list-inline">
                        <li><a href="#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Google"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="btn btn-circle btn-social-icon" data-toggle="tooltip" title="Follow us on Steam"><i class="fa fa-steam"></i></a></li>
                    </ul>
                    &copy; 2016 Gameforest. All rights reserved.
                </div>
            </div>
        </footer>	
        <!-- /.footer -->

        <!-- Modales -->
       

            <div class="container modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form id="loginform" action="{{ path("fos_user_security_check") }}" method="post" class="form-signin">
                <span id="loginerror" style="color:red"></span>
                <span id="reauth-email" class="reauth-email"></span>
                <div class="input-group" style="margin-bottom:10px">
  <span class="input-group-addon" ><i class="glyphicon glyphicon-user"></i></span>   
                <input onfocusout="usernamereq();" type="text" id="username" name="_username" value="" required="required" autofocus class="form-control " placeholder="{{ 'security.login.username'|trans }}" style="margin-bottom:0px"/>
</div>
<div class="input-group" style="margin-bottom:10px">
  <span class="input-group-addon" ><i class="glyphicon glyphicon-lock"></i></span>
              <input onfocusout="pswreq();" type="password" class="form-control " id="password" name="_password" required="required" placeholder="{{ 'security.login.password'|trans }}" style="margin-bottom:0px"/>
</div>  
              <div id="remember" class="checkbox">
                    <input type="checkbox" id="remember_me" name="_remember_me" value="on"/>
                                        <label for="remember_me">{{ 'security.login.remember_me'|trans }}</label>
                </div>
                <button id="_submit" name="_submit" class="btn btn-lg btn-primary btn-block btn-signin" type="submit" style="width:49%;display:inline-block">{{ 'security.login.submit'|trans }}</button>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#register-modal" data-dismiss="modal"><button id="_register" name="_register" class="btn btn-lg btn-primary btn-block btn-signin" type="button" style="width:49%;display:inline;float:right;background-color:#AFAFAF;">{#{ 'security.login.register'|trans }#}Inscription</button></a>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Mot de passe oublier ?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
    
      <div class="container modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form id="registerform"action="{{ path("fos_user_registration_register") }}" method="post" class="form-signin">
                <span id="loginerror" style="color:red"></span>
                <span id="reauth-email" class="reauth-email"></span>
                <div class="input-group" style="margin-bottom:10px">
  <span class="input-group-addon" ><i class="glyphicon glyphicon-envelope"></i></span>   
                <input onfocusout="usernamereq();" type="email" id="fos_user_registration_form_email" name="fos_user_registration_form[email]" value="" required="required" autofocus class="form-control " placeholder="Email" style="margin-bottom:0px"/>
</div>
<div class="input-group" style="margin-bottom:10px">
  <span class="input-group-addon" ><i class="glyphicon glyphicon-user"></i></span>
              <input onfocusout="pswreq();" maxlength="255" pattern=".{2,}" type="text" class="form-control " id="fos_user_registration_form_username" name="fos_user_registration_form[username]" required="required" placeholder="Nom d'utilisateur" style="margin-bottom:0px"/>
</div>  
<div class="input-group" style="margin-bottom:10px">
  <span class="input-group-addon" ><i class="glyphicon glyphicon-lock"></i></span>
              <input onfocusout="pswreq();" type="password" class="form-control " id="fos_user_registration_form_plainPassword_first" name="fos_user_registration_form[plainPassword][first]" required="required" placeholder="{{ 'security.login.password'|trans }}" style="margin-bottom:0px"/>
</div>
<div class="input-group" style="margin-bottom:10px">
  <span class="input-group-addon" ><i class="glyphicon glyphicon-lock"></i></span>
              <input onfocusout="pswreq();" type="password" class="form-control " id="fos_user_registration_form_plainPassword_second" name="fos_user_registration_form[plainPassword][second]" required="required" placeholder="{{ 'security.login.password'|trans }}" style="margin-bottom:0px"/>
</div>
<input id="fos_user_registration_form__token" name="fos_user_registration_form[_token]" value="8esbxp3tYU5ta7hyup9Ug61UBlErOiLvDkazZwzwC6w" type="hidden">
                <button id="register_submit" name="register_submit" class="btn btn-lg btn-primary btn-block btn-signin" type="submit" >Inscription</button>
            </form><!-- /form -->
            Vous avez une compte ?<a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal" class="forgot-password" data-dismiss="modal">
                se connecter !</a>
    <div>
        <input value="Enregistrer" type="submit">
    </div>
</form>
        </div><!-- /card-container -->
    </div><!-- /container -->
        

        <!-- Javascript -->
        <script src="{{asset('plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
        <script src="{{asset('js/core.min.js')}}"></script>
        <script src="{{asset('plugins/owl-carousel/owl.carousel.min.js')}}"></script>
        <script>
            (function ($) {
                "use strict";
                var owl = $(".owl-carousel");

                owl.owlCarousel({
                    autoPlay: 3000,
                    items: 1, //4 items above 1000px browser width
                    itemsDesktop: [1000, 3], //3 items between 1000px and 0
                    itemsTablet: [600, 1], //1 items between 600 and 0
                    itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option
                });

                $(document).delegate('*[data-toggle="lightbox"]', 'click', function (event) {
                    event.preventDefault();
                    $(this).ekkoLightbox();
                });

                $(window).scroll(function () {
                    if ($(this).scrollTop() > 350) {
                        $('body').addClass('fixed-tab');
                    } else {
                        $('body').removeClass('fixed-tab');
                    }
                });
            })(jQuery);

        </script>
       <script>
    $(document).ready(function(){
        $('#_submit').click(function(e){
            e.preventDefault();
            if (usernamereq() === false && pswreq() === false){
                $('#loginerror').html("entrez vos coordonnées");
            }
            else if (usernamereq() === false){
                $('#loginerror').html("nom d'utilisateur ou e-mail obligatoire");
            }
            else if (pswreq() === false){
                $('#loginerror').html("mot de passe obligatoire");
            }
            else{
                $('#loginerror').html("");
                $('#username').parent().css("border","none");
                $('#password').parent().css("border","none");
            $.ajax({
                type        : $('#loginform').attr( 'method' ),
                url         : '{{ path("fos_user_security_check") }}',
                data        : $('#loginform').serialize(),
                dataType    : "json",
                success     : function(data, status, object) {
                    if(!data.success) {$('#loginerror').html("nom utilisateur ou mot de passe invalide");
                        $('#username').parent().css("border","solid 1px red");
                $('#password').parent().css("border","solid 1px red");
            }
                    else location.reload();
                },
                error: function(data, status, object){
                    console.log(data.message);
                    
                }
            });
            }
        });
        $('#register_submit').click(function(e){
            e.preventDefault();
           /* if (usernamereq() === false && pswreq() === false){
                $('#loginerror').html("entrez vos coordonnées");
            }
            else if (usernamereq() === false){
                $('#loginerror').html("nom d'utilisateur ou e-mail obligatoire");
            }
            else if (pswreq() === false){
                $('#loginerror').html("mot de passe obligatoire");
            }
            else{
                $('#loginerror').html("");
                $('#username').parent().css("border","none");
                $('#password').parent().css("border","none");*/
            $.ajax({
                type        : $('#registerform').attr( 'method' ),
                url         : '{{ path("fos_user_registration_register") }}',
                data        : $('#registerform').serialize(),
                dataType    : "json",
                success     : function(data, status, object) {
                    if(!data.success) {/*$('#loginerror').html("nom utilisateur ou mot de passe invalide");
                        $('#username').parent().css("border","solid 1px red");
                $('#password').parent().css("border","solid 1px red");*/
            alert('a');
            }
            else{alert('b');}
                },
                error: function(data, status, object){
                    console.log(data.message);
                    
                }
            });
            
        });
    });
</script>
<script>
  function usernamereq(){
      if ($('#username').val() === "" || $('#username').val() === null){
          $('#username').parent().css("border","solid 1px red");
          return false;
      }
      else{
          $('#username').parent().css("border","solid 1px green");
          return true;
      }
  }
  function pswreq(){
      if ($('#password').val() === "" || $('#password').val() === null){
          $('#password').parent().css("border","solid 1px red");
          return false;
      }
      else{
          $('#password').parent().css("border","solid 1px green");
          return true;
      }
  }
  $( '#login-modal' ).on('hidden.bs.modal', function(){
       $('#loginerror').html("");
                $('#username').parent().css("border","none");
                $('#password').parent().css("border","none");
   });
</script>
        {% block javascript %}
        {% endblock javascript %}
    </body>

    <!-- Mirrored from gameforest.yakuzi.eu/games-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Feb 2017 10:13:45 GMT -->
</html>