<!-- Contact area S t a r t-->
<section aria-label="section">
    <div class="container">
        <div class="row g-custom-x">

            <div class="col-lg-8 mb-sm-30">

                <h3>Do you have any question?</h3>

                <form action="{{ route('messages.create') }}" method="post">
                    @csrf
                    <div class="row mb-2">
                        @if(Session::has('success'))
                            <!-- Success Alert -->
                            <div class="alert alert-success alert-dismissible alert-label-icon rounded-label shadow fade show" role="alert">
                                <i class="ri-notification-2-line label-icon"></i><strong> {{ Session::get('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <!-- Error Alert -->
                            <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label shadow fade show" role="alert">
                                <i class="ri-error-warning-line label-icon"></i><strong> {{ Session::get('error') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb10">
                            <div class="field-set">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb10">
                            <div class="field-set">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="col-md-4 mb10">
                            <div class="field-set">
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" required>
                            </div>
                        </div>
                    </div>

                    <div class="field-set mb20">
                        <textarea name="message" id="message" class="form-control" placeholder="Your Message" rows="4" required></textarea>
                    </div>
                    <div class="g-recaptcha" data-sitekey="copy-your-site-key-here"></div>
                    <div id='submit' class="mt20">
                        <input type='submit' id='send_message' value='Send Message' class="btn-main">
                    </div>
                </form>
            </div>

            <div class="col-lg-4">

                <div class="de-box mb30">
                    <h4>Address</h4>
                    <address class="s1">
                        <span><i class="id-color fa fa-map-marker fa-lg"></i>{{ $company_details->address }}</span>
                        <span><i class="id-color fa fa-phone fa-lg"></i>{{ $company_details->contact }}</span>
                        <span><i class="id-color fa fa-envelope-o fa-lg"></i><a href="mailto:{{ $company_details->email }}">{{ $company_details->email }}</a></span>
                        <span><i class="id-color fa fa-map fa-lg"></i><a href="https://www.google.com/search?q={{ $company_details->address }}">View on Google Map</a></span>
                    </address>
                </div>

            </div>

        </div>
    </div>

</section>
<!-- End-of contact-->