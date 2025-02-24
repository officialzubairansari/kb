<!-- Any Question Area S t a r t -->
<section class="question-area top-bottom-padding2">
    <div class="container">
        <div class="row">
            <div class="col-12 my-auto">
                <!-- Section Tittle -->
                <div class="section-tittle mb-50">
                    <h2 class="title font-700">Any Questions</h2>
                    <p class="pera">When deciding which charity to donate to, it's important to do your search and find one that aligns with your values and interests.</p>
                </div>
                <div class="accordion" id="accordionExample">
                    @foreach($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="{{ $faq->question }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">{{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End-of Question Area -->