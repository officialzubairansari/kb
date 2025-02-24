<!-- Sliders S t a r t-->
<section class="slider-bg hero-area-two">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($sliders as $index => $slider)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}"
                        aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
        <!-- Carousel Inner -->
        <div class="carousel-inner">
            @foreach($sliders as $index => $slider)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="single-slider hero-padding-two">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="spacer-double sm-hide"></div>
                                <div class="col-lg-6">
                                    <div class="spacer-10"></div>
                                    <h1 class="text-white">{{ $slider->heading }}</h1>
                                    <p class="lead text-white">{{ $slider->paragraph }}</p>

                                    <a class="btn-main" href="{{ $slider->button_link }}">Book Now!</a>
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{ asset('images/sliders/'.$slider->image) }}" class="img-fluid"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- End-of Sliders -->
