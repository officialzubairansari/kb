<!-- Highlights area S t a r t-->
<section>
    <div class="container">
        <div class="row g-custom-x force-text-center">
            @foreach($highlights as $highlight)

                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp">
                        <i class="{{ $highlight->icon }} de-icon mb20"></i>
                        {{ $highlight->text }}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End-of Highlights-->