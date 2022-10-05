<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>{{$title}}</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="{{asset('front/image/x-icon')}}" href="favicon.ico">
    <link rel="stylesheet" href="{{asset('front/css/jquery-ui.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{asset('front/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/fontawesome-5-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="{{asset('front/css/leaflet.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/leaflet-gesture-handling.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/leaflet.markercluster.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/leaflet.markercluster.default.css')}}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{asset('front/css/search.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/aos2.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/lightcase.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/maps.css')}}">
    <link rel="stylesheet" id="color" href="{{asset('front/css/colors/pink.css')}}">


    <link rel="stylesheet" href="{{asset('front/font/flaticon.css')}}">

     @yield('css')
</head>

<body class="{{$bodyClass}}">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container" >
            <!-- Header -->
            <div id="header" class="head-tr bottom">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                            <a href="{{url('/')}}">
                            	<img src="{{asset('front/images/logo-red.svg')}}" data-sticky-logo="{{asset('front/images/logo-red.svg')}}" alt="logo">
                            </a>
                        </div>
                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1 ">
                            <ul id="responsive">
                                <li>
                                	<a href="{{url('/')}}">Home</a>
                                </li>
                                <li>
                                	<a href="javascript:void(0);">Properties</a>
                                	<ul>
                                        <li><a href="{{url('/properties-rent')}}">Buy</a></li>
                                        <li><a href="{{url('/properties-sell')}}">Sell</a></li>
                                        <li><a href="{{url('/properties-buy')}}">Rent</a></li>
                                    </ul>
                                </li>
                                <li>
                                	<a href="{{url('/sevice-provider')}}">Sevice Provider</a>
                                </li>
                                <li>
                                	<a href="{{url('/sevices')}}">Services</a>
                                </li>

                                <!-- <li>
                                	<a href="#">Blog</a>
                                    <ul>
                                        <li><a href="#">Grid Layout</a>
                                            <ul>
                                                <li><a href="blog-full-grid.html">Full Grid</a></li>
                                                <li><a href="blog-grid-sidebar.html">With Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">List Layout</a>
                                            <ul>
                                                <li><a href="blog-full-list.html">Full List</a></li>
                                                <li><a href="blog-list-sidebar.html">With Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li> -->
                                <li>
                                	<a href="{{url('/contact-us')}}">Contact</a>
                                </li>
                                <li class="d-none d-xl-none d-block d-lg-block">
                                	<a href="{{url('/user')}}">Login</a>
                                </li>
                                <li class="d-none d-xl-none d-block d-lg-block">
                                	<a href="{{url('/user/registration')}}">Register</a>
                                </li>
                                <li class="d-none d-xl-none d-block d-lg-block mt-5 pb-4 ml-5 border-bottom-0">
                                	<a href="#" class="button border btn-lg btn-block text-center">Post Property<i class="fas fa-laptop-house ml-2"></i></a>
                                </li>
                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="right-side d-none d-none d-lg-none d-xl-flex">
                        <!-- Header Widget -->
                        <div class="header-widget">
                            <a href="#" class="button border">Post Property<i class="fas fa-laptop-house ml-2"></i></a>
                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->
                    @if(0)
                    <!-- Right Side Content / End -->
                    <div class="header-user-menu user-menu add">
                        <div class="header-user-name">
                            <span><img src="{{asset('front/images/testimonials/ts-1.jpg')}}" alt=""></span>Hi, Mary!
                        </div>
                        <ul>
                            <li><a href="user-profile.html"> Edit profile</a></li>
                            <li><a href="add-property.html"> Add Property</a></li>
                            <li><a href="payment-method.html">  Payments</a></li>
                            <li><a href="change-password.html"> Change Password</a></li>
                            <li><a href="#">Log Out</a></li>
                        </ul>
                    </div>
                    <!-- Right Side Content / End -->
                    @else
                    <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                        <!-- Header Widget -->
                        <div class="header-widget sign-in">
                            <div class="show-reg-form modal-open"><a href="#">Sign In</a></div>
                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->
                    @endif
                </div>
            </div>
            <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
          @yield('content')

        <!-- START FOOTER -->
        <footer class="first-footer rec-pro">
            <div class="top-footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="netabout">
                                <a href="index-2.html" class="logo">
                                    <img src="{{asset('front/images/logo-footer.svg')}}" alt="netcom">
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.</p>
                            </div>
                            <div class="contactus">
                                <ul>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <p class="in-p">95 South Park Avenue, USA</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <p class="in-p">+456 875 369 208</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <p class="in-p ti">support@findhouses.com</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="navigation">
                                <h3>Navigation</h3>
                                <div class="nav-footer">
                                    <ul>
                                        <li><a href="index-2.html">Home One</a></li>
                                        <li><a href="properties-right-sidebar.html">Properties Right</a></li>
                                        <li><a href="properties-full-list.html">Properties List</a></li>
                                        <li><a href="properties-details.html">Property Details</a></li>
                                        <li class="no-mgb"><a href="agents-listing-grid.html">Agents Listing</a></li>
                                    </ul>
                                    <ul class="nav-right">
                                        <li><a href="agent-details.html">Agents Details</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="blog.html">Blog Default</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                        <li class="no-mgb"><a href="contact-us.html">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget">
                                <h3>Twitter Feeds</h3>
                                <div class="twitter-widget contuct">
                                    <div class="twitter-area">
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                        <div class="single-item">
                                            <div class="icon-holder">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h5><a href="#">@findhouses</a> all share them with me baby said inspet.</h5>
                                                <h4>about 5 days ago</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="newsletters">
                                <h3>Newsletters</h3>
                                <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
                            </div>
                            <form class="bloq-email mailchimp form-inline" method="post">
                                <label for="subscribeEmail" class="error"></label>
                                <div class="email">
                                    <input type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
                                    <input type="submit" value="Subscribe">
                                    <p class="subscription-success"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-footer rec-pro">
                <div class="container-fluid sd-f">
                    <p>2021 © Copyright - All Rights Reserved.</p>
                    <ul class="netsocials">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!--register form -->
        <div class="login-and-register-form modal">
            <div class="main-overlay"></div>
            <div class="main-register-holder">
                <div class="main-register fl-wrap">
                    <div class="close-reg"><i class="fa fa-times"></i></div>
                    <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                    <div class="soc-log fl-wrap">
                        <p>Login</p>
                        <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                        <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                    </div>
                    <div class="log-separator fl-wrap"><span>Or</span></div>
                    <div id="tabs-container">
                        <ul class="tabs-menu">
                            <li class="current"><a href="#tab-1">Login</a></li>
                            <li><a href="#tab-2">Register</a></li>
                        </ul>
                        <div class="tab">
                            <div id="tab-1" class="tab-contents">
                                <div class="custom-form">
                                    <form method="post" name="registerform">
                                        <label>Username or Email Address * </label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <label>Password * </label>
                                        <input name="password" type="password" onClick="this.select()" value="">
                                        <button type="submit" class="log-submit-btn"><span>Log In</span></button>
                                        <div class="clearfix"></div>
                                        <div class="filter-tags">
                                            <input id="check-a" type="checkbox" name="check">
                                            <label for="check-a">Remember me</label>
                                        </div>
                                    </form>
                                    <div class="lost_password">
                                        <a href="#">Lost Your Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div id="tab-2" class="tab-contents">
                                    <div class="custom-form">
                                        <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                                            <label>First Name * </label>
                                            <input name="name" type="text" onClick="this.select()" value="">
                                            <label>Second Name *</label>
                                            <input name="name2" type="text" onClick="this.select()" value="">
                                            <label>Email Address *</label>
                                            <input name="email" type="text" onClick="this.select()" value="">
                                            <label>Password *</label>
                                            <input name="password" type="password" onClick="this.select()" value="">
                                            <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--register form end -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->


        <!-- ARCHIVES JS -->
        <script src="{{asset('front/js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('front/js/rangeSlider.js')}}"></script>
        <script src="{{asset('front/js/tether.min.js')}}"></script>

         <script src="{{asset('front/js/popper.min.js')}}"></script>

        <script src="{{asset('front/js/moment.js')}}"></script>
        <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('front/js/mmenu.min.js')}}"></script>
        <script src="{{asset('front/js/mmenu.js')}}"></script>

        <script src="{{asset('front/js/animate.js')}}"></script>
        <script src="{{asset('front/js/aos.js')}}"></script>
        <script src="{{asset('front/js/aos2.js')}}"></script>
        <script src="{{asset('front/js/slick.min.js')}}"></script>
        <script src="{{asset('front/js/fitvids.js')}}"></script>
        <script src="{{asset('front/js/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('front/js/typed.min.js')}}"></script>
        <script src="{{asset('front/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('front/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('front/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('front/js/smooth-scroll.min.js')}}"></script>
        <script src="{{asset('front/js/lightcase.js')}}"></script>
        <script src="{{asset('front/js/search.js')}}"></script>
        <script src="{{asset('front/js/owl.carousel.js')}}"></script>
        <script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('front/js/ajaxchimp.min.js')}}"></script>
        <script src="{{asset('front/js/newsletter.js')}}"></script>
        <script src="{{asset('front/js/jquery.form.js')}}"></script>
        <script src="{{asset('front/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('front/js/searched.js')}}"></script>
        <script src="{{asset('front/js/forms-2.js')}}"></script>
        <script src="{{asset('front/js/leaflet.js')}}"></script>
        <script src="{{asset('front/js/leaflet-gesture-handling.min.js')}}"></script>
        <script src="{{asset('front/js/leaflet-providers.js')}}"></script>
        <script src="{{asset('front/js/leaflet.markercluster.js')}}"></script>
        <script src="{{asset('front/js/map-style2.js')}}"></script>
        <script src="{{asset('front/js/range.js')}}"></script>
        <script src="{{asset('front/js/color-switcher.js')}}"></script>
          <script src="{{asset('front/js/map-single.js')}}"></script>
        <script src="{{asset('front/js/tether.min.js')}}"></script>

        <script src="{{asset('front/js/popup.js')}}"></script>

        <script src="{{asset('front/js/inner.js')}}"></script>

        <script>
            $(window).on('scroll load', function() {
                $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
            });

        </script>

        <!-- Slider Revolution scripts -->
        <script src="{{asset('front/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{asset('front/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
         @yield('js')

        <script>
            var typed = new Typed('.typed', {
                strings: ["House ^2000", "Apartment ^2000", "Plaza ^4000"],
                smartBackspace: false,
                loop: true,
                showCursor: true,
                cursorChar: "|",
                typeSpeed: 50,
                backSpeed: 30,
                startDelay: 800
            });

        </script>

        <script>
            $('.slick-lancers2').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }]
            });

        </script>

        <script>
            $('.slick-lancers').slick({
                infinite: false,
                slidesToShow: 5,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }]
            });

        </script>

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });

        </script>

        <!-- MAIN JS -->
        <script src="{{asset('front/js/script.js')}}"></script>

    </div>
    <!-- Wrapper / End -->
</body>
</html>
