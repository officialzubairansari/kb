<x-website.layout>
    <x-slot:title>
        <title>{{ $title }} | {{ config('app.name', 'N/A') }}</title>
    </x-slot:title>
    <div id="wrap">
        <!-- Hero Section -->
        <section class="home-page hero-slider full-slider">
            <h3 class="d-none">Hidden</h3>
            <h4 class="d-none">Hidden</h4>
            <div class="hero-top-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="inn-slide">
                            <div class="big-banner" style="background-image: url(assets/images/slider/s-1.jpg);"></div>
                            <div class="hero-overlay"></div>
                            <div class="slider_shape_img1">
                                <img src="{{ asset('website/website/images/slider/shape-img1.svg') }}" alt="shape-img1 img">
                            </div>
                            <div class="slider_shape_img2">
                                <img src="{{ asset('website/website/images/slider/shape-img2.svg') }}" alt="shape-img2 img">
                            </div>
                            <div class="container">
                                <h5 class="d-none">Hidden</h5>
                                <div class="hero text-center" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="800">
                                    <div class="small_heading"><span class="left_line"></span><h6>WELCOME TO LUCHA RESTAURANT</h6><span class="right_line"></span></div>
                                    <h1 class="hero-title">Let Enjoy The Rhym Of Lucha Dishes</h1>
                                    <h2 class="d-none">Hidden</h2>
                                    <h3 class="d-none">Hidden</h3>
                                    <a href="#reservation-section" class="book-btn btn-transperent">Book My Table</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="inn-slide">
                            <div class="big-banner" style="background-image: url(assets/images/slider/s-2.jpg);"></div>
                            <div class="hero-overlay"></div>
                            <div class="slider_shape_img1">
                                <img src="{{ asset('website/website/images/slider/shape-img1.svg') }}" alt="shape-img1 img">
                            </div>
                            <div class="slider_shape_img2">
                                <img src="{{ asset('website/website/images/slider/shape-img2.svg') }}" alt="shape-img2 img">
                            </div>
                            <h4 class="d-none">Hidden</h4>
                            <h5 class="d-none">Hidden</h5>
                            <div class="container">
                                <div class="hero text-center" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="800">
                                    <div class="small_heading"><span class="left_line"></span><h6>OUR MENUS</h6><span class="right_line"></span></div>
                                    <h1 class="hero-title">See What's New Today</h1>
                                    <h2 class="d-none">Hidden</h2>
                                    <h3 class="d-none">Hidden</h3>
                                    <a href="#reservation-section" class="book-btn btn-transperent">Today's Menu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="d-none">Hidden</h4>
                    <h5 class="d-none">Hidden</h5>
                </div>
            </div>
        </section>


        <!-- Menu Section -->
        <section class="section_padding pb-70">
            <div class="container">
                <div class="section_heading text-center">
                    <div class="small_heading mb-1"><span class="left_line"></span><h6>Our Menu</h6><span class="right_line"></span></div>
                    <h2 class="main_heading mb-30">Tasty With Good Price</h2>
                    <h3 class="d-none">Hidden</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="menu-list" data-aos="zoom-in-up" data-aos-easing="linear"  data-aos-duration="1000">
                    <!-- Nav tabs -->
                    <ul class="menu-nav-item nav justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="item-link active" id="breadkfast-tab" data-bs-toggle="tab" data-bs-target="#breadkfast" type="button" role="tab" aria-controls="breadkfast" aria-selected="true">Chicken Biryani</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="item-link" id="lunch-tab" data-bs-toggle="tab" data-bs-target="#lunch" type="button" role="tab" aria-controls="lunch" aria-selected="false">Beef Pulao</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="item-link" id="dinner-tab" data-bs-toggle="tab" data-bs-target="#dinner" type="button" role="tab" aria-controls="dinner" aria-selected="false">Aalo Biryani</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="item-link" id="drink-tab" data-bs-toggle="tab" data-bs-target="#drink" type="button" role="tab" aria-controls="drink" aria-selected="false">Drink</button>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="breadkfast" role="tabpanel" aria-labelledby="breadkfast-tab">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Single Biryani</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 250</span>
                                            <img src="{{ asset('website/images/menu/Chicken-Biryani-Recipe.jpg') }}" alt="Salad dish" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6 odd">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Double Biryani</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 400</span>
                                            <img src="{{ asset('website/images/menu/Chicken-Biryani-Recipe.jpg') }}" alt="Chicken Biryani" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Chicken Biryani 1KG</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 700</span>
                                            <img src="{{ asset('website/images/menu/Chicken-Biryani-Recipe.jpg') }}" alt="Finger Chicken" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="lunch" role="tabpanel" aria-labelledby="lunch-tab">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Single Pulao</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 350</span>
                                            <img src="{{ asset('website/images/menu/Beef-Pulao.webp') }}" alt="Chicken Biryani" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6 odd">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Double Pulao</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 450</span>
                                            <img src="{{ asset('website/images/menu/Beef-Pulao.webp') }}" alt="Finger Chicken" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Beef Pulao 1KG</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 850</span>
                                            <img src="{{ asset('website/images/menu/Beef-Pulao.webp') }}" alt="Orange Juice" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="dinner" role="tabpanel" aria-labelledby="dinner-tab">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Single Aalo Biryani</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 220</span>
                                            <img src="{{ asset('website/images/menu/IMG_1174-500x500.jpg') }}" alt="Salad dish" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6 odd">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Double Aalo Biryani</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 300</span>
                                            <img src="{{ asset('website/images/menu/IMG_1174-500x500.jpg') }}" alt="Chicken Biryani" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Aalo Biryani 1KG</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 550</span>
                                            <img src="{{ asset('website/images/menu/IMG_1174-500x500.jpg') }}" alt="Finger Chicken" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="drink" role="tabpanel" aria-labelledby="drink-tab">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Cola Next 345 ml</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 80</span>
                                            <img src="{{ asset('website/images/menu/cola-next.webp') }}" alt="Salad dish" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6 odd">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Fizz Up Next 345 ml</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 80</span>
                                            <img src="{{ asset('website/images/menu/fuzzup.jpg') }}" alt="Chicken Biryani" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Water 500 ml</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 50</span>
                                            <img src="{{ asset('website/images/menu/abe-dubai.webp') }}" alt="Finger Chicken" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6 odd">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">water 100 ml</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 100</span>
                                            <img src="{{ asset('website/images/menu/abe-dubai.webp') }}" alt="Orange Juice" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Salad</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 50</span>
                                            <img src="{{ asset('website/images/menu/salad.jpg') }}" alt="Le Pigeon Burger" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-12 col-lg-6 odd">
                                    <a href="single-dish.html" class="menu-list-item">
                                        <div class="food_item_desc">
                                            <h4 class="food-name">Raita</h4>
                                            <p class="about-food">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                                        </div>
                                        <div class="food-img-price">
                                            <span class="f_price">Rs 50</span>
                                            <img src="{{ asset('website/images/menu/raita.jpg') }}" alt="Broccoli Rabe" class="dish-image" width="170" height="170">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Counter Section -->
        <section class="position-relative counter-section">
            <div class="big-banner" style="background-image: url(assets/images/counter/banner-2.jpg);"></div>
            <div class="hero-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="counter text-center" data-aos="flip-up" data-aos-easing="linear" data-aos-duration="1000">
                            <h2 class="c_item"><span class="count c-counter" data-number="25">25</span>+</h2>
                            <p class="c_desc mb-0">Years Of Experience</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="counter text-center" data-aos="flip-up" data-aos-easing="linear" data-aos-duration="1000">
                            <h2 class="c_item"><span class="count c-counter" data-number="50">50</span>+</h2>
                            <p class="c_desc mb-0">Experienced Worker</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="counter text-center" data-aos="flip-up" data-aos-easing="linear" data-aos-duration="1000">
                            <h2 class="c_item"><span class="count c-counter" data-number="100">100</span>+</h2>
                            <p class="c_desc mb-0">Happy Customers</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="counter text-center" data-aos="flip-up" data-aos-easing="linear" data-aos-duration="1000">
                            <h2 class="c_item"><span class="count c-counter" data-number="100">100</span>+</h2>
                            <p class="c_desc mb-0">Cup Of Coffee & Tea</p>
                        </div>
                        <h3 class="d-none">Hidden</h3>
                    </div>
                </div>
                <h4 class="d-none">Hidden</h4>
                <h5 class="d-none">Hidden</h5>
            </div>
        </section>


        <!-- service section -->
        <section class="section_padding">
            <div class="container">
                <div class="section_heading text-center">
                    <div class="small_heading mb-1"><span class="left_line"></span><h6>Our Services</h6><span class="right_line"></span></div>
                    <h2 class="main_heading">What We Focus On</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3" data-aos="fade-down" data-aos-easing="linear"  data-aos-duration="1000">
                        <div class="service-item mt-0">
                            <span class="hover-border-box"></span>
                            <div class="service-icon">
                                <img class="img-1" src="assets/images/services/s-1.svg" alt="service icon">
                                <img class="img-2" src="assets/images/services/s-1-y.svg" alt="service icon">
                            </div>
                            <h3 class="service-title">Catering</h3>
                            <div class="service_desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3" data-aos="fade-down" data-aos-easing="linear"  data-aos-duration="1000">
                        <div class="service-item">
                            <span class="hover-border-box"></span>
                            <div class="service-icon">
                                <img class="img-1" src="assets/images/services/s-2.svg" alt="service icon">
                                <img class="img-2" src="assets/images/services/s-2-y.svg" alt="service icon">
                            </div>
                            <h3 class="service-title">Dinner</h3>
                            <div class="service_desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3" data-aos="fade-down" data-aos-easing="linear"  data-aos-duration="1000">
                        <div class="service-item mt-mobile">
                            <span class="hover-border-box"></span>
                            <div class="service-icon">
                                <img class="img-1" src="assets/images/services/s-3.svg" alt="service icon">
                                <img class="img-2" src="assets/images/services/s-3-y.svg" alt="service icon">
                            </div>
                            <h3 class="service-title">Wedding</h3>
                            <div class="service_desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3" data-aos="fade-down" data-aos-easing="linear"  data-aos-duration="1000">
                        <div class="service-item mt-mobile">
                            <span class="hover-border-box"></span>
                            <div class="service-icon">
                                <img class="img-1" src="assets/images/services/s-4.svg" alt="service icon">
                                <img class="img-2" src="assets/images/services/s-4-y.svg" alt="service icon">
                            </div>
                            <h3 class="service-title">Birthday</h3>
                            <h4 class="d-none">Hidden</h4>
                            <div class="service_desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do ting eusm tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</x-website.layout>
