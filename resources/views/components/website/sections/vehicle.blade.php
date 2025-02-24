<!-- Vehicle S t a r t -->
<section id="section-car-details">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div id="slider-carousel" class="owl-carousel">
                    <div class="item">
                        <img src="{{ asset('images/vehicles/'. $vehicle->featured_image) }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/vehicles/'. $vehicle->image_1) }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/vehicles/'. $vehicle->image_2) }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/vehicles/'. $vehicle->image_3) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <p>{{ $vehicle->short_description }}</p>
                <div class="de-spec">
                    <div class="d-row">
                        <span class="d-title">Passengers</span>
                        <spam class="d-value">{{ $vehicle->passengers }}</spam>
                    </div>
                    <div class="d-row">
                        <span class="d-title">Luggage</span>
                        <spam class="d-value">{{ $vehicle->luggage }}</spam>
                    </div>
                </div>
                <div class="spacer-30"></div>
                <div class="volunteer-info-card">
                    <form id="payment-form" method="POST" action="{{ route('reservations.vehicle') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <div class="contact-form mb-24">
                                    <label class="contact-label">Full Name</label>
                                    <input name="full_name" type="text" class="form-control contact-input" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="contact-form mb-24">
                                    <label class="contact-label">Email Address</label>
                                    <input name="email" type="email" class="form-control contact-input" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="contact-form mb-24">
                                    <label class="contact-label">Country</label>
                                    <select name="country_id" class="form-control select2" data-choices name="country_id" data-choices-search-false id="country_id" required>
                                        <option value="" disabled selected>Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ $country->id == 194 ? 'selected' : '' }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="contact-form mb-24">
                                    <label class="contact-label">Contact No</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="phonecode_contact">966</span>
                                        <input type="number" class="form-control contact-input" name="contact" value="" aria-label="number" aria-describedby="addon-wrapping" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="contact-form mb-24">
                                    <label class="contact-label">WhatsApp No</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="phonecode_whatsapp">966</span>
                                        <input type="number" class="form-control contact-input" name="whatsapp" value="" aria-label="number" aria-describedby="addon-wrapping" required>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            @if(checkSettings('reservation_request'))
                                <div class="row">
                                    <div class="col">
                                        <label class="contact-label"><i class="ri-map-pin-2-fill"></i> Can't find your route? <a
                                                    href="{{ route('reservation.request') }}">
                                                <span class="pera">Click here</span>
                                            </a> to book a personalized route.</label>
                                        <div class="contact-form mb-24">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-6 mb-2">
                                <div class="contact-form mb-24">
                                    <label class="contact-label">Route</label>
                                    <select name="route_id" id="route_id" class="form-control select2" data-choices name="select-route" data-choices-search-false id="select-route" required>
                                        <option value="" disabled selected>Select Route</option>
                                        @foreach($routes as $route)
                                            <option value="{{ $route->id }}">{{ $route->route }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="contact-form mb-24">
                                    <label class="contact-label">Fare</label>
                                    <input readonly id="fare" name="fare" type="number" class="form-control bg-light contact-input" value="" required>
                                    {{--                                            <input class="form-control contact-input" type="text" name="fare" placeholder="">--}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="contact-form mb-24">
                                    <label class="contact-label">Pickup location</label>
                                    <input name="pick_location" type="text" class="form-control contact-input" value="" required>
                                    {{--                                            <input class="form-control contact-input" type="datetime-local" name="fare" placeholder="">--}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="contact-form mb-24">
                                    <label class="contact-label">Pick Date & Time</label>
                                    <input name="pick_date_time" type="datetime-local" class="form-control contact-input" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="contact-form mb-24" hidden="">
                                    <label class="contact-label">Vehicle</label>
                                    <input readonly name="vehicle_id" type="text" class="form-control contact-input bg-light" value="{{ $vehicle->id }}" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-main">Booking Now</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-lg-12">
                <h3>Description</h3>
                <p>{{ $vehicle->long_description }}</p>
                <div class="spacer-10"></div>
            </div>
        </div>
    </div>
</section>
<x-slot:js>
    <script>

        $(document).on('change', '#route_id', function () {
            var selectedRouteId = $('#route_id').val();
            var selectedVehicleId = {{ $vehicle->id }};
            var fareInput = $('#fare');

            $.ajax({
                type: 'POST',
                url: "{{ route('main.get-fare') }}",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'route_id': selectedRouteId,
                    'vehicle_id': selectedVehicleId
                },
                success: function (response) {
                    fareInput.val(response.fare)
                }
            });
        });

        $(document).on('change', '#country_id', function () {
            var selectedCountryId = $('#country_id').val();
            var phoneCodeContact = $('#phonecode_contact');
            var phoneCodeWhatsApp = $('#phonecode_whatsapp');

            $.ajax({
                type: 'POST',
                url: "{{ route('main.get-country-code') }}",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'country_id': selectedCountryId,
                },
                success: function (response) {
                    phoneCodeContact.text(response.country_code);
                    phoneCodeWhatsApp.text(response.country_code);
                }
            });
        });
    </script>
</x-slot:js>
<!-- End-of Vehicle -->