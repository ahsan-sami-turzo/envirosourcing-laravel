<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href='{{ asset("fav.png") }}' sizes="50x50" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href='{{ asset("contents/front-end/assets/css/bootstrap.min.css") }}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href='{{ asset("contents/front-end/assets/css/owl.carousel.min.css") }}'>
    @stack('css')
    <link rel="stylesheet" href='{{ asset("contents/front-end/assets/css/style.css") }}'>
    <link rel="stylesheet" href='{{ asset("contents/front-end/assets/css/responsive.css") }}'>

    <title>-::Envsourcing::-</title>
</head>
<body>
<section class="top-navbar sticky-top">
    <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand logo-img" href="{{ url('/') }}">
            <img class="img-fluid" src='{{ asset("contents/front-end/assets/images/logo.png") }}'>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav justify-content-end">
                <li class="nav-item active">
                    <a class="nav-link" href='{{ url("/#") }}'>HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url("/#about") }}'>ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url("/#service") }}'>SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url("/#product") }}'>PRODUCT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url("/#clients") }}'>CLIENTS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url("/#ethics") }}'>ETHICS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url("/#sister-concern") }}'>SISTER CONCERN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url("/#management") }}'>MANAGEMENT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url("/#news") }}'>NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='{{ url("/#contact") }}'>CONTACT</a>
                </li>


            </ul>

        </div>
    </nav>
</section>
@yield('content')
<section id="footer" class="footer pt-5 pb-5 ">
    <div class="box">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-title text-center">
                        <h3>Quick Links</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="footer-nav ">
                        <a href='{{url("/#") }}'>Home</a>
                    </div>
                    <div class="footer-nav">
                        <a href='{{url("/#about") }}'>About</a>
                    </div>
                    <div class="footer-nav">
                        <a href='{{url("/#service") }}'>Services</a>
                    </div>
                    <div class="footer-nav">
                        <a href='{{url("/#product") }}'>Product</a>
                    </div>
                    <div class="footer-nav">
                        <a href='{{url("/#clients") }}'>Clients</a>
                    </div>
                    <div class="footer-nav ">
                        <a href='{{url("/#ethics") }}'>Ethics</a>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">

                    <div class="footer-nav">
                        <a href='{{url("/#sister-concern") }}'>Sister concern</a>
                    </div>
                    <div class="footer-nav">
                        <a href='{{url("/#service") }}'>Services</a>
                    </div>
                    <div class="footer-nav">
                        <a href='{{url("/#management") }}'>Management</a>
                    </div>
                    <div class="footer-nav">
                        <a href='{{url("/#news") }}'>News</a>
                    </div>
                    <div class="footer-nav">
                        <a href='{{url("/#contact") }}'>Contact</a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-3">
                    <div class="footer-facebook">
                        <div class="fb-page"
                             data-href="https://www.facebook.com/envirosourcing"
                             data-width="1000"
                             data-hide-cover="false"
                             data-show-facepile="false"></div>
                        <div class="footer-social">
                            <nav class="nav justify-content-center mt-3">
                                <a class="nav-link" href="whatsapp://tel:01879450751"><i class="fa fa-whatsapp whatsapp-bg"></i></a>
                                <a class="nav-link" href="https://www.youtube.com/channel/UCgrfmhDIzRpjq5Ph8kcc22A"><i class="fa fa-youtube youtube-bg"></i></a>
                                <a class="nav-link" href="https://www.linkedin.com/in/enviro-sourcing-limited-533664230/"><i class="fa fa-linkedin linkedin-bg"></i></a>
                                <a class="nav-link" href="#"><i class="fa fa-twitter twitter-bg"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<section id="footer-copy">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center bg-dark pt-2 pb-2">
                <p style="color: #fff">Copyright © 2022  |<a class="text-danger" href="http://www.ambalait.com/public/"> ambalait.com</a></p>
            </div>

        </div>
    </div>
   </section>
<!-- <section id="about">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-6"></div>
             <div class="col-md-6"></div>

         </div>
     </div>
 </section>-->
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0" nonce="AWfjMutr"></script>
<script src='{{ asset("contents/front-end/assets/js/jquery.slim.min.js") }}'></script>
<script src='{{ asset("contents/front-end/assets/js/bootstrap.bundle.min.js") }}'></script>
<script src='{{ asset("contents/front-end/assets/js/owl.carousel.min.js") }}'></script>
<script>
    $(document).on("scroll", function () {
        if
        ($(document).scrollTop() > 86) {
            $(".top-navbar").addClass("onScroll");
        } else {
            $(".top-navbar").removeClass("onScroll");
        }
    });

    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: false,
                    loop: false
                }
            }
        })
    });
</script>
@stack('scripts')

</body>
</html>
