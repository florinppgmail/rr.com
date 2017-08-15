<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">

    <title>RyansReferrals.com</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('website/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/slidr.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/main.css') }}">
    <link id="preset" rel="stylesheet" href="{{ asset('website/css/presets/preset1.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}">


    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>

    <!-- icons -->
    <link rel="icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('website/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="images/ico/apple-touch-icon-57-precomposed.png') }}">
    <!-- icons -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Template Developed By ThemeRegion -->

    @yield('style')
</head>
<body>
<!-- header -->
<header id="header" class="clearfix">
    <!-- navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img class="img-responsive" src="{{ asset('dashboard/dist/img/logo_smallest.png') }}" alt="Logo"></a>
            </div>
            <!-- /navbar-header -->

            {{--<div class="navbar-left">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Home <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="index.html">Home Default </a></li>
                                <li class="active"><a href="index-one.html">Home Page V-1</a></li>
                                <li><a href="index-two.html">Home Page V-2</a></li>
                                <li><a href="index-three.html">Home Page V-3</a></li>
                            </ul>
                        </li>
                        <li><a href="categories.html">Category</a></li>
                        <li><a href="categories.html">all ads</a></li>
                        <li><a href="faq.html">Help/Support</a></li>
                        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="about-us.html">ABout Us</a></li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="ad-post.html">Ad post</a></li>
                                <li><a href="ad-post-details.html">Ad post Details</a></li>
                                <li><a href="categories.html">Category Ads</a></li>
                                <li><a href="details.html">Ad Details</a></li>
                                <li><a href="my-ads.html">My Ads</a></li>
                                <li><a href="my-profile.html">My Profile</a></li>
                                <li><a href="favourite-ads.html">Favourite Ads</a></li>
                                <li><a href="archived-ads.html">Archived Ads</a></li>
                                <li><a href="pending-ads.html">Pending Ads</a></li>
                                <li><a href="delete-account.html">Close Account</a></li>
                                <li><a href="published.html">Ad Publised</a></li>
                                <li><a href="signup.html">Sign Up</a></li>
                                <li><a href="signin.html">Sign In</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>--}}

            <!-- nav-right -->
            <div class="nav-right">
                <!-- language-dropdown -->
                {{--<div class="dropdown language-dropdown">
                    <i class="fa fa-globe"></i>
                    <a data-toggle="dropdown" href="#"><span class="change-text">United Kingdom</span> <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu language-change">
                        <li><a href="#">United Kingdom</a></li>
                        <li><a href="#">United States</a></li>
                        <li><a href="#">China</a></li>
                        <li><a href="#">Russia</a></li>
                    </ul>
                </div>--}}
                <!-- language-dropdown -->

                <!-- sign-in -->
                    @if(Auth::user())
                    <div class="dropdown language-dropdown">
                        <i class="fa fa-user"></i>
                        <a data-toggle="dropdown" href="#"><span class="change-text">{{ explode(' ', Auth::user()->name)[0] }}</span> <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu language-change">
                            <?php
                                switch (Auth::user()->role_id){
                                    case 2:
                                        $dashboard = 'member';
                                        break;
                                    case 3:
                                        $dashboard = 'vendor';
                                        break;
                                    default:
                                        $dashboard = 'admin';
                                        break;
                                }
                            ?>
                            <li><a href="{{ url('/'.$dashboard) }}">Dashboard</a></li>
                            <li><a href="{{ route('logout') }}">Log out</a></li>
                        </ul>
                    </div>
                    @else
                    <ul class="sign-in">
                        <li><i class="fa fa-user"></i></li>
                        <li><a href="{{ route('login') }}">Sign In </a></li>
                        &nbsp;&nbsp;<li><a href="{{ route('vendor-register') }}">Vendor SIGNUP</a></li>
                        <li><a href="{{ route('register') }}">Member SIGNUP</a></li>
                    </ul><!-- sign-in -->
                @endif


                {{--<a href="ad-post.html" class="btn">Post Your Ad</a>--}}
            </div>
            <!-- nav-right -->
        </div><!-- container -->
    </nav><!-- navbar -->
</header><!-- header -->

<!-- ad-profile-page -->
<section id="main" class="clearfix  ad-profile-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>{{ $page }}</li>
            </ol><!-- breadcrumb -->
            {{--<h2 class="title">My Profile</h2>--}}
        </div><!-- banner -->

        <div class="ad-profile section">
            <div class="user-profile">
                <div class="user-images">
                    <img src="{{ asset('website/images/user.jpg') }}" alt="User Images" class="img-responsive">
                </div>
                <div class="user">
                    <h2>Hello, <a href="#">{{ Auth::user()->name }}</a></h2>
                    {{--<h5>You last logged in at: 14-01-2016 6:40 AM [ USA time (GMT + 6:00hrs)]</h5>--}}
                </div>

                <div class="favorites-user">
                    <div class="my-ads">
                        <a href="my-ads.html">{{ $totalFreeReferrals}}<small>Free</small></a>
                    </div>
                    <div class="favorites">
                        <a href="#">{{ $totalSoldReferrals}}<small>Sold</small></a>
                    </div>
                </div>
            </div><!-- user-profile -->

            <ul class="user-menu">
                <li><a href="{{ route('member-dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('member-referrals') }}">Referrals</a></li>
                <li><a href="{{ route('member-settings-profile') }}">Profile</a></li>
                <li><a href="{{ route('member-payments') }}">Cash out</a></li>
                <li><a href="{{ route('member-settings-password') }}">Account</a></li>
            </ul>
        </div><!-- ad-profile -->

        @yield('content')
    </div><!-- container -->
</section><!-- ad-profile-page -->
<!-- footer -->
<footer id="footer" class="clearfix">
    <!-- footer-top -->
    <section class="footer-top clearfix">
        <div class="container">
            <div class="row text-center">
                <!-- footer-widget -->
                <div class="col-md-4">
                    <div class="footer-widget">
                        <h3>Quik Links</h3>
                        <ul>
                            <li><a href="{{ route('contactpage') }}">Contact Us</a></li>
                            <li><a href="{{ route('aboutpage') }}">About us</a></li>
                        </ul>
                    </div>
                </div><!-- footer-widget -->

                <!-- footer-widget -->
                <div class="col-md-4">
                    <div class="footer-widget social-widget">
                        <h3>Follow us on</h3>
                        <ul>
                            <li>
                                <a href="https://facebook.com/ryansreferrals" target="_blank">
                                    <i class="fa fa-facebook-official"></i>
                                </a>
                                <a href="#" target="_blank">
                                    <i class="fa fa-twitter-square"></i>
                                </a>
                                <a href="https://instagram.com/ryansreferrals" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- footer-widget -->

                <!-- footer-widget -->
                <div class="col-md-4">
                    <div class="footer-widget">
                        <h3>Extra info</h3>
                        <ul>
                            <li><a href="#">Are you a vendor?</a></li>
                            <li><a href="#">Terms and conditions</a></li>
                        </ul>
                    </div>
                </div><!-- footer-widget -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- footer-top -->


    {{--<div class="footer-bottom clearfix text-center">
        <div class="container">
            <p>Copyright &copy; 2016. Developed by <a href="http://themeregion.com/">ThemeRegion</a></p>
        </div>
    </div>--}}
    <!-- footer-bottom -->
</footer><!-- footer -->

<!-- JS -->
<script src="{{ asset('website/js/jquery.min.js') }}"></script>
<script src="{{ asset('website/js/modernizr.min.js') }}"></script>
<script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAzzBy2rvTFejOlQHrI6xYI2OmRWfHWs2c"></script>
<script src="{{ asset('website/js/gmaps.min.js') }}"></script>
<script src="{{ asset('website/js/goMap.js') }}"></script>
<script src="{{ asset('website/js/map.js') }}"></script>
<script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('website/js/smoothscroll.min.js') }}"></script>
<script src="{{ asset('website/js/scrollup.min.js') }}"></script>
<script src="{{ asset('website/js/price-range.js') }}"></script>
<script src="{{ asset('website/js/custom.js') }}"></script>
<script src="{{ asset('website/js/switcher.js') }}"></script>

    @yield('script')

</body>
</html>
