<!-- Contact area S t a r t-->
<section aria-label="section">
    <div class="container">
        <div class="row g-custom-x">
            @foreach($vehicles as $vehicle)
                <div class="col-md-4">
                    <div class="de-item mb30">
                        <div class="d-img">
                            <img src="{{ asset('images/vehicles/' . $vehicle->featured_image) }}" class="img-fluid" alt="">
                        </div>
                        <div class="d-info">
                            <div class="d-text">
                                <h4>{{ $vehicle->title }}</h4>
                                <div class="d-atr-group">
                                    <span class="d-atr"><img src="{{ asset('images/misc/icons/1.svg') }}" alt="">{{ $vehicle->passengers }} Pax.</span>
                                    <span class="d-atr"><img src="{{ asset('images/misc/icons/2.svg') }}" alt="">{{ $vehicle->luggage }} Lugg.</span>
                                    <span class="d-atr"><img src="{{ asset('images/misc/icons/4.svg') }}" alt="">{{ $vehicle->vehicleCategory->name }}</span>
                                </div>
                                <div class="d-price">
                                    @foreach($vehicle->routeVehicles as $routeVehicle)
                                        <div class="row">
                                            <div class="col-8">
                                                <p>{{ $routeVehicle->route->route }}</p>
                                            </div>
                                            <div class="col-4 text-end font-weight-bold">
                                                <p>{{ $routeVehicle->fare }} {{ $company_details->currency }}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="text-center">
                                    <a class="btn-main" href="{{ route('vehicle.index', ['vehicle' => $vehicle->id]) }}">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End-of contact-->