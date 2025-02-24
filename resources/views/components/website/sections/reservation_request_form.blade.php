<!-- Reservation Request Form S t a r t -->
<section class="volunteer-details top-bottom-padding2">
    <div class="container">
        <div class="row gy-24">
            <div class="col-xl-12 col-md-7 col-lg-7">
                <div class="volunteer-info-card">
                    @if(checkSettings('reservation_request'))
                        <form id="payment-form" method="POST" action="{{ route('create.reservation.request') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="contact-form mb-24">
                                        <label class="contact-label">Full Name</label>
                                        <input name="full_name" type="text" class="form-control contact-input" value="" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="contact-form mb-24">
                                        <label class="contact-label">Email Address</label>
                                        <input name="email" type="email" class="form-control contact-input" value="" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
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
                                <div class="col-lg-4 mb-2">
                                    <div class="contact-form mb-24">
                                        <label class="contact-label">Contact No</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="phonecode_contact">966</span>
                                            <input type="number" class="form-control contact-input" name="contact" value="" aria-label="number" aria-describedby="addon-wrapping" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="contact-form mb-24">
                                        <label class="contact-label">WhatsApp No</label>
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="phonecode_whatsapp">966</span>
                                            <input type="number" class="form-control contact-input" name="whatsapp" value="" aria-label="number" aria-describedby="addon-wrapping" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>

                                <div class="col-lg-4 mb-2">
                                    <div class="contact-form mb-24">
                                        <label class="from-label">From</label>
                                        <input name="from" type="text" class="form-control contact-input" value="" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="contact-form mb-24">
                                        <label class="to-label">To</label>
                                        <input name="to" type="text" class="form-control contact-input" value="" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="contact-form mb-24">
                                        <label class="contact-label">Vehicle</label>
                                        <select name="vehicle_id" id="vehicle_id" class="form-control select2" data-choices name="select-vehicle" data-choices-search-false id="select-vehicle" required>
                                            <option value="" disabled selected>Select Vehicle</option>
                                            @foreach($vehicles as $vehicle)
                                                <option value="{{ $vehicle->id }}">{{ $vehicle->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="contact-form mb-24">
                                        <label class="contact-label">Pickup location</label>
                                        <input name="pick_location" type="text" class="form-control contact-input" value="" required>
                                        {{--                                            <input class="form-control contact-input" type="datetime-local" name="fare" placeholder="">--}}
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="contact-form mb-24">
                                        <label class="contact-label">Pick Date & Time</label>
                                        <input name="pick_date_time" type="datetime-local" class="form-control contact-input" value="" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-main pull-right">Booking Now</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<x-slot:js>
    <script>

        $(document).on('change', '#vehicle_id', function () {
            var selectedRouteId = $('#route_id').val();
            var selectedVehicleId = $(this).val();
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
<!-- End-of Reservation Request Form -->