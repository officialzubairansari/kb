<!-- Testimonial S t a r t-->
<section id="section-testimonials" class="">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 offset-lg-3 text-center">
                <h2>Customer Testimonials</h2>
                <p>Read what our satisfied customers have to say about their experiences with our services.</p>
                <div class="spacer-20"></div>
            </div>

            <div class="clearfix"></div>

            <div id="items-carousel-testimonials" class="owl-carousel wow fadeIn">

                @foreach($testimonials as $testimonial)
                    <div class="col-lg-12">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>{{ $testimonial->name }}</h4>
                                <p>{{ strlen($testimonial->message) > 60 ? substr($testimonial->message, 0, 120) . '..' : $testimonial->message }} - {{ $testimonial->country }}</p>
                            </div>
                            <div class="testimonials-card"></div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- End-of Testimonial -->