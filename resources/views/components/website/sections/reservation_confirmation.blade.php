<!-- Reservation Form S t a r t -->
<section class="volunteer-details top-bottom-padding2">
    <div class="container">
        <div class="row gy-24">
            <div class="col-xl-12 col-md-7 col-lg-7">
                <div class="volunteer-info-card">
                    <div class="row">
                        <div class="col-lg-4 mb-2">
                            <div class="contact-form mb-24">
                                <label class="contact-label">Full Name</label>
                                <input readonly class="form-control contact-input" value="{{ $data->customer->full_name }}">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="contact-form mb-24">
                                <label class="contact-label">Email Address</label>
                                <input readonly class="form-control contact-input" value="{{ $data->customer->email }}">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="contact-form mb-24">
                                <label class="contact-label">Phone</label>
                                <input readonly class="form-control contact-input" value="{{ $data->customer->contact }}">
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="col-lg-4 mb-2">
                            <div class="contact-form mb-24">
                                <label class="contact-label">Route</label>
                                <input readonly class="form-control contact-input" value="{{ $data->reservationRoute->routeVehicle->routeDetails->route }}">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="contact-form mb-24">
                                <label class="contact-label">Vehicle</label>
                                <input readonly class="form-control contact-input" value="{{ $data->reservationRoute->routeVehicle->vehicleDetails->title }} SR">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="contact-form mb-24">
                                <label class="contact-label">Fare</label>
                                <input readonly class="form-control contact-input" value="{{ $data->reservationRoute->fare }} SR">
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="col-lg-4 mb-2">
                            <div class="contact-form mb-24">
                                <label class="contact-label">Pickup Location</label>
                                <input readonly class="form-control contact-input" value="{{ $data->reservationRoute->pick_location }}">
                            </div>
                        </div>
                        <div class="col-lg-4 mb-2">
                            <div class="contact-form mb-24">
                                <label class="contact-label">Pickup Date & Time</label>
                                <input readonly class="form-control contact-input" value="{{ $data->reservationRoute->pick_date_time }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End-of Reservation Form -->