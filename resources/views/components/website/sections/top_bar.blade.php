<!-- Top Bar S t a r t -->
<div id="topbar" class="topbar-dark text-light">
    <div class="container">
        <div class="topbar-left xs-hide">
            <div class="topbar-widget">
                <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>{{ $company_details->contact }}</a></div>
                <div class="topbar-widget"><a href="#"><i class="fa fa-envelope"></i>{{ $company_details->email }}</a></div>
                <div class="topbar-widget"><a href="#"><i class="fa fa-clock-o"></i>Mon - Fri 08.00 - 18.00</a></div>
            </div>
        </div>

        <div class="topbar-right">
            <div class="social-icons">
                <a href="{{ $company_details->facebook }}"><i class="fa fa-facebook fa-lg"></i></a>
                <a href="{{ $company_details->twitter }}"><i class="fa fa-twitter fa-lg"></i></a>
                <a href="{{ $company_details->youtube }}"><i class="fa fa-youtube fa-lg"></i></a>
                <a href="{{ $company_details->instagram }}"><i class="fa fa-instagram fa-lg"></i></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- End-of Top Bar -->