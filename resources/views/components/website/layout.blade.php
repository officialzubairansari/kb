<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<head>
    <!-- Required meta tags -->
    {{ $title ?? '' }}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('website/') }}images/logo/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&amp;family=Jost:wght@400;500&amp;display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('website/css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('website/css/swiper.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('website/css/photoswipe.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('website/css/default-skin.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('website/css/aos.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}" type="text/css">
    {{ $css ?? '' }}
</head>
<body class="home_page2">

<!-- The Preloader Before Site Load -->
{{--<div class="loading-page">--}}
{{--    <div class="counter">--}}
{{--        <p>Loading</p>--}}
{{--        <div class="count-number">0%</div>--}}
{{--        <hr/>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- start sticky header -->
{{--<section class="site-sticky-sidebar">--}}
{{--    <h1 class="d-none">Hidden</h1>--}}
{{--    <div class="pages-dropdown page_loaded">--}}
{{--        <div class="view-pages-btn">--}}
{{--            <div class="dropdown-themes">--}}
{{--                <div class="btn-icons">--}}
{{--                    <svg viewBox="0 0 100 100" width="22" height="22" overflow="visible">--}}
{{--                        <filter id="outline">--}}
{{--                            <feMorphology in="SourceAlpha" result="expanded" operator="dilate" radius="1"/>--}}
{{--                            <feFlood flood-color="red"/>--}}
{{--                            <feComposite in2="expanded" operator="in"/>--}}
{{--                            <feComposite in="SourceGraphic"/>--}}
{{--                        </filter>--}}
{{--                        <circle cx="50" cy="50" r="50" fill="transparent" stroke="#ffffff" stroke-width="22"--}}
{{--                                filter="url(#outline)"/>--}}
{{--                    </svg>--}}
{{--                    <svg width="32" height="32" viewBox="0 0 32 32" style="fill: #fff;height: 20px;">--}}
{{--                        <path d="M 4,15C 4,15.552, 4.448,16, 5,16l 19.586,0 l-4.292,4.292c-0.39,0.39-0.39,1.024,0,1.414 c 0.39,0.39, 1.024,0.39, 1.414,0l 6-6c 0.092-0.092, 0.166-0.202, 0.216-0.324C 27.972,15.26, 28,15.132, 28,15.004c0-0.002,0-0.002,0-0.004 l0,0c0-0.13-0.026-0.26-0.078-0.382c-0.050-0.122-0.124-0.232-0.216-0.324l-6-6c-0.39-0.39-1.024-0.39-1.414,0 c-0.39,0.39-0.39,1.024,0,1.414L 24.586,14L 5,14 C 4.448,14, 4,14.448, 4,15z"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <span class="show_text">Related</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="purchase_btn">--}}
{{--            <a href="https://1.envato.market/mg6GDe" target="_blank">--}}
{{--                <div class="btn-icons buy-now-btn">--}}
{{--                    <svg x="0px" y="0px" viewBox="0 0 24 24" style="fill: #FEA02F; height: 16px;">--}}
{{--                        <circle cx="9" cy="21" r="2"></circle>--}}
{{--                        <circle cx="20" cy="21" r="2"></circle>--}}
{{--                        <path d="M23.8,5.4C23.6,5.1,23.3,5,23,5H6.8L6,0.8C5.9,0.3,5.5,0,5,0H1C0.4,0,0,0.4,0,1s0.4,1,1,1h3.2L5,6.2c0,0,0,0.1,0,0.1--}}
{{--							l1.7,8.3C7,16,8.2,17,9.6,17c0,0,0,0,0.1,0h9.7c1.5,0,2.7-1,3-2.4L24,6.2C24,5.9,24,5.6,23.8,5.4z"></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <span class="buy_now_text">Buy Now</span>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="related-design-list">--}}
{{--            <div class="design_hold_list">--}}
{{--                <div class="list_detail_inn">--}}
{{--                    <div class="sidebar_logo">--}}
{{--                        <a href="https://themeforest.net/user/the_krishna/portfolio" target="_blank">--}}
{{--                            <div class="logo_site">--}}
{{--                                <img src="images/logo/sidebar-logo.png" alt="sidebar-logo image"--}}
{{--                                     class="img-fluid">--}}
{{--                                <p class="logo-name">The_Krishna</p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <span class="theme-related-list">Related Themes</span>--}}
{{--                    <a href="https://themeforest.net/item/fitzaro-gym-fitness-html-template/38856538?s_rank=1"--}}
{{--                       target="_blank" title="Fitzaro - Gym & Fitness HTML Template">--}}
{{--                        <div class="theme_datails">--}}
{{--                            <div class="theme_image">--}}
{{--                                <img src="images/theme-img/theme-img1.png" alt="Fitzaro" class="img-fluid">--}}
{{--                            </div>--}}
{{--                            <span class="theme_name">Fitzaro</span>--}}
{{--                            <span class="theme_prices">$15</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <a href="https://themeforest.net/item/relock-creative-real-estate-one-page-html-template/36564208?s_rank=10"--}}
{{--                       target="_blank" title="Relock - Creative Real Estate One Page HTML Template">--}}
{{--                        <div class="theme_datails">--}}
{{--                            <div class="theme_image">--}}
{{--                                <img src="images/theme-img/theme-img2.png" alt="Relock" class="img-fluid">--}}
{{--                            </div>--}}
{{--                            <span class="theme_name">Relock</span>--}}
{{--                            <span class="theme_prices">$10</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <a href="https://themeforest.net/item/foholic-one-page-restaurant-html-template/38415317?s_rank=3"--}}
{{--                       target="_blank" title="Foholic - One Page Restaurant HTML Template">--}}
{{--                        <div class="theme_datails">--}}
{{--                            <div class="theme_image">--}}
{{--                                <img src="images/theme-img/theme-img3.png" alt="Foholic" class="img-fluid">--}}
{{--                            </div>--}}
{{--                            <span class="theme_name">Foholic</span>--}}
{{--                            <span class="theme_prices">$10</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <a href="https://themeforest.net/item/cafe360-restaurant-one-page-html-template/29485849?s_rank=13"--}}
{{--                       target="_blank" title="Cafe360 | Restaurant One Page HTML Template">--}}
{{--                        <div class="theme_datails">--}}
{{--                            <div class="theme_image">--}}
{{--                                <img src="images/theme-img/theme-img4.png" alt="Cafe360" class="img-fluid">--}}
{{--                            </div>--}}
{{--                            <span class="theme_name">Cafe360</span>--}}
{{--                            <span class="theme_prices">$15</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <a href="https://themeforest.net/item/polio-creative-digital-agency-html-template/37319164?s_rank=9"--}}
{{--                       target="_blank" title="Polio - Creative Digital Agency HTML Template">--}}
{{--                        <div class="theme_datails">--}}
{{--                            <div class="theme_image">--}}
{{--                                <img src="images/theme-img/theme-img5.png" alt="Polio" class="img-fluid">--}}
{{--                            </div>--}}
{{--                            <span class="theme_name">Polio</span>--}}
{{--                            <span class="theme_prices">$5</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <a href="https://themeforest.net/item/advento-travel-one-page-html/29214637?s_rank=15"--}}
{{--                       target="_blank" title="Advento - Travel One Page HTML">--}}
{{--                        <div class="theme_datails">--}}
{{--                            <div class="theme_image">--}}
{{--                                <img src="images/theme-img/theme-img6.png" alt="Advento" class="img-fluid">--}}
{{--                            </div>--}}
{{--                            <span class="theme_name">Advento</span>--}}
{{--                            <span class="theme_prices">$10</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="list_listed_bottom">--}}
{{--                <a href="https://themeforest.net/user/the_krishna/portfolio" class="main-link-theme" target="_blank">--}}
{{--                    <p>View All Theme</p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- end sticky header -->
<!--header section start-->
<x-website.header></x-website.header>
<!--header section end-->
<!-- End Header -->

<!-- content begin -->
{{ $slot }}
<!-- content close -->

<!--footer section start-->
<x-website.footer></x-website.footer>
<!--footer section end-->


<!-- search modal -->
<div class="modal fade searchmodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered search-content">
        <button type="button" class="search-modal-close" data-bs-dismiss="modal" aria-label="Close"><i
                    class="ri-close-line"></i></button>
        <div class="modal-content ">
            <form class="eltd-fullscreen-search-form" method="get">
                <div class="search-form-holder">
                    <span class="search-label">Search</span>
                    <div class="search-field-holder">
                        <input type="text" name="s" class="search-field">
                    </div>
                    <button type="submit" class="search-submit"><i class="ri-search-line"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Scroll Bottom to Top -->
<div class="scroll-top" data-scroll="up">
    <svg class="border-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>

<script src="{{ asset('website/js/jquery-min-3.6.0.js') }}"></script>
<script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('website/js/swiper.min.js') }}"></script>
<script src="{{ asset('website/js/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('website/js/photoswipe.min.js') }}"></script>
<script src="{{ asset('website/js/aos.js') }}"></script>
<script src="{{ asset('website/js/style.js') }}"></script>
{{ $js ?? '' }}
</body>

</html>