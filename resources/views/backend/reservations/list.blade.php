<x-backend.layout>
    <x-slot:title>
        <title>{{ $title }} | {{ $company_details->name }}</title>
    </x-slot:title>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <h5 class="card-title mb-0 flex-grow-1">
                                        <a href="{{ route('dashboard.index') }}">Dashboard</a>
                                    </h5>
                                </li>
                                <li class="breadcrumb-item">
                                </li>
                                <h5 class="card-title mb-0 flex-grow-1">{{ $title }}</h5>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <x-backend.flash-message></x-backend.flash-message>
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{ $title }}</h4>
                            @if($reservations_type == 'pending')
                                <div class="flex-shrink-0">
                                    <button onclick="newReservationModal();"
                                            class="btn btn-dark btn-label waves-effect waves-light fs-12">New
                                        Reservation
                                        <i class="ri-add-circle-fill label-icon align-middle fs-20"></i>
                                    </button>
                                </div>
                            @endif
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="listjs-table" id="customerList">
                                <div class="row g-4 mb-3">
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" class="form-control search" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-card mt-3 mb-1">
                                    <table class="table align-middle table-nowrap" id="customerTable">
                                        <thead class="table-light">
                                        <tr>
                                            <th>Invoice No</th>
                                            @if(checkSettings('custom_project'))
                                            <th>Company</th>
                                            @endif
                                            <th>Name</th>
                                            <th>Route</th>
                                            <th>Vehicle</th>
                                            <th>Fare</th>
                                            <th>Pick Location</th>
                                            <th>Pick Date/Time</th>
                                            <th>Status</th>
                                            @if($reservations_type == 'cancelled')
                                                <th>Cancellation Reason</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($reservations as $reservation)
                                            <tr>
                                                <td>{{ $reservation->invoice_no }}</td>
                                                @if(checkSettings('custom_project'))
                                                    <td>{{ $reservation->company->name }}</td>
                                                @endif
                                                <td>{{ $reservation->customer->full_name }}</td>
                                                <td>{{ $reservation->reservationRoute->routeVehicle->routeDetails->route ?? 'N/A'}}
                                                </td>
                                                <td>{{ $reservation->reservationRoute->routeVehicle->vehicleDetails->title }}</td>
                                                <td>{{ $reservation->reservationRoute->fare }} SR</td>
                                                <td>
                                                    <i class="ri-map-pin-2-fill align-middle text-black small"></i> {{ $reservation->reservationRoute->pick_location }}
                                                </td>
                                                <td>{{ $reservation->reservationRoute->pick_date_time }}</td>
                                                <td>
                                                    @if($reservations_type == 'pending')
                                                        <span class="badge badge-soft-warning text-uppercase">Pending</span>
                                                    @endif
                                                    @if($reservations_type == 'confirmed')
                                                        <span class="badge badge-soft-primary text-uppercase">Confirmed</span>
                                                    @endif
                                                    @if($reservations_type == 'completed')
                                                        <span class="badge badge-soft-success text-uppercase">Completed</span>
                                                    @endif
                                                    @if($reservations_type == 'cancelled')
                                                        <span class="badge badge-soft-danger text-uppercase">Cancelled</span>
                                                @endif
                                                @if($reservations_type == 'cancelled')
                                                    <td>{{ $reservation->cancellation_reason }}</td>
                                                @endif
                                                <td>
                                                    @if($reservations_type == 'pending')
                                                        <button onclick="confirmedModal('{{ $reservation->id }}');"
                                                                type="submit"
                                                                class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-primary btn-label waves-effect waves-light text-nowrap">
                                                            <i class="ri-checkbox-circle-fill label-icon align-middle fs-16"></i>
                                                            Confirm
                                                        </button>
                                                        <button onclick="cancelledModal('{{ $reservation->id }}');"
                                                                type="submit"
                                                                class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                                            <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                                            Cancel
                                                        </button>
                                                    @endif
                                                    @if($reservations_type == 'confirmed')
                                                        <button onclick="completedModal('{{ $reservation->id }}');"
                                                                type="submit"
                                                                class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-primary btn-label waves-effect waves-light text-nowrap">
                                                            <i class="ri-checkbox-circle-fill label-icon align-middle fs-16"></i>
                                                            Complete
                                                        </button>
                                                        <button onclick="cancelledModal('{{ $reservation->id }}');"
                                                                type="submit"
                                                                class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                                            <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                                            Cancel
                                                        </button>
                                                    @endif
                                                    @if($reservations_type == 'cancelled')
                                                        <button onclick="reverseModal('{{ $reservation->id }}');"
                                                                type="submit"
                                                                class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-primary btn-label waves-effect waves-light text-nowrap">
                                                            <i class="ri-recycle-fill label-icon align-middle fs-16"></i>
                                                            Reserve Again
                                                        </button>
                                                    @endif
                                                    <a href="{{ route('download.reservations.invoice', ['reservation' => $reservation->id]) }}"
                                                       class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-dark btn-label waves-effect waves-light text-nowrap">
                                                        <i class="ri-printer-fill label-icon align-middle fs-16"></i>
                                                        Invoice
                                                    </a>
                                                    <a href="{{ route('send.whatsapp', ['reservation' => $reservation->id]) }}"
                                                       class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap"
                                                       target="_blank">
                                                        <i class="ri-whatsapp-fill label-icon align-middle fs-16"></i>
                                                        WhatsApp
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- end card -->
                    </div>
                </div>
            </div>
            <div class="row g-0 text-center text-sm-start align-items-center mb-4">
                {!! $reservations->links() !!}
            </div><!-- end row -->
        </div>
    </div>
    <div class="modal fade" id="confirmedModalgrid" tabindex="-1" aria-labelledby="confirmedModalgridLabel"
         aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Reservation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mark.confirmed') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">RID (Reservation ID)</label>
                                    <input readonly name="reservation_id" type="text" class="form-control bg-light"
                                           id="reservation_id_confirmed" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <label class="form-label">Select Driver</label>
                                <select name="driver_id" class="form-control" data-choices name="select-category"
                                        data-choices-search-false id="select-category" required>
                                    <option value="" disabled selected>Select Driver</option>
                                    @foreach($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->full_name }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" data-bs-dismiss="modal"
                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                        Close
                                    </button>
                                    <button type="submit"
                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-checkbox-circle-fill label-icon align-middle fs-16"></i>
                                        Confirm
                                    </button>
                                </div>
                            </div><!--end col-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cancelledModalgrid" tabindex="-1" aria-labelledby="cancelledModalgridLabel"
         aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cancel Reservation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mark.cancelled') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">RID (Reservation ID)</label>
                                    <input readonly name="reservation_id" type="text" class="form-control bg-light"
                                           id="reservation_id_cancelled" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <label class="form-label">Cancellation Reason</label>
                                <input name="cancellation_reason" type="text" class="form-control" value="" required>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" data-bs-dismiss="modal"
                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                        Close
                                    </button>
                                    <button type="submit"
                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-checkbox-circle-fill label-icon align-middle fs-16"></i>
                                        Confirm
                                    </button>
                                </div>
                            </div><!--end col-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="completedModalgrid" tabindex="-1" aria-labelledby="completedModalgridLabel"
         aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Complete Reservation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mark.completed') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">RID (Reservation ID)</label>
                                    <input readonly name="reservation_id" type="text" class="form-control bg-light"
                                           id="reservation_id_completed" value="">
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div class="mt-4">
                                    <label for="exampleFormControlTextarea1"
                                           class="form-label text-muted text-uppercase fw-semibold">NOTES</label>
                                    <textarea readonly class="form-control alert alert-info"
                                              id="exampleFormControlTextarea1" placeholder="Notes" rows="3" required>Complete make sure that reservation is completed and payments are received as well. Once reservation is complete, it can not be reversed.</textarea>
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" data-bs-dismiss="modal"
                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                        Close
                                    </button>
                                    <button type="submit"
                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-checkbox-circle-fill label-icon align-middle fs-16"></i>
                                        Confirm
                                    </button>
                                </div>
                            </div><!--end col-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reverseModalgrid" tabindex="-1" aria-labelledby="reverseModalgridLabel"
         aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reverse Reservation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mark.reversed') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">RID (Reservation ID)</label>
                                    <input readonly name="reservation_id" type="text" class="form-control bg-light"
                                           id="reservation_id_reverse" value="">
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div class="mt-4">
                                    <label for="exampleFormControlTextarea1"
                                           class="form-label text-muted text-uppercase fw-semibold">NOTES</label>
                                    <textarea readonly class="form-control alert alert-info"
                                              id="exampleFormControlTextarea1" placeholder="Notes" rows="3" required>In reverse reservation, reservation will be booked again as pending reservation. (Do this if customer wants to book again or reservation was cancelled by mistakes.)</textarea>
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" data-bs-dismiss="modal"
                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                        Close
                                    </button>
                                    <button type="submit"
                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-checkbox-circle-fill label-icon align-middle fs-16"></i>
                                        Confirm
                                    </button>
                                </div>
                            </div><!--end col-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="newReservationModalgrid" tabindex="-1" aria-labelledby="newReservationModalgridLabel"
         aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Reservation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reservations.create') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            @if(checkSettings('custom_project'))
                                <div class="col-6">
                                    <label class="form-label">Select Company</label>
                                    <select name="company_id" class="form-control" data-choices name="company_id"
                                            data-choices-search-false id="company_id" required>
                                        <option value="" disabled selected>Select Country</option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ $company->id == 1 ? 'selected' : '' }}>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div><!--end col-->
                            @endif
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Full Name</label>
                                    <input name="full_name" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Email Address</label>
                                    <input name="email" type="email" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <label class="form-label">Select Country</label>
                                <select name="country_id" class="form-control" data-choices name="country_id"
                                        data-choices-search-false id="country_id" required>
                                    <option value="" disabled selected>Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ $country->id == 194 ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Phone</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="phonecode_contact">966</span>
                                        <input type="number" class="form-control" name="contact" value=""
                                               aria-label="number" aria-describedby="addon-wrapping" required>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">WhatsApp</label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="phonecode_whatsapp">966</span>
                                        <input type="number" class="form-control" name="whatsapp" value=""
                                               aria-label="number" aria-describedby="addon-wrapping" required>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <label class="form-label">Route</label>
                                <select name="route_id" id="route_id" class="form-control fare-trigger" data-choices
                                        name="select-route" data-choices-search-false id="select-route" required>
                                    <option value="" disabled selected>Select Route</option>
                                    @foreach($routes as $route)
                                        <option value="{{ $route->id }}">{{ $route->route }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->
                            <div class="col-6">
                                <label class="form-label">Vehicle</label>
                                <select name="vehicle_id" id="vehicle_id" class="form-control fare-trigger" data-choices
                                        name="select-vehicle" data-choices-search-false id="select-vehicle" required>
                                    <option value="" disabled selected>Select Vehicle</option>
                                    @foreach($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}">{{ $vehicle->title }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->
                            <div class="col-6">
                                <label class="form-label">Fare</label>
                                <input readonly id="fare" name="fare" type="number" class="form-control bg-light"
                                       value="" required>
                            </div><!--end col-->
                            <div class="col-6">
                                <label class="form-label">Pickup Location</label>
                                <input name="pick_location" type="text" class="form-control" value="" required>
                            </div><!--end col-->
                            <div class="col-6">
                                <label class="form-label">Pickup Date/Time</label>
                                <input name="pick_date_time" type="datetime-local" class="form-control" value=""
                                       required>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" data-bs-dismiss="modal"
                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                        Close
                                    </button>
                                    <button type="submit"
                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-checkbox-circle-fill label-icon align-middle fs-16"></i>
                                        Confirm
                                    </button>
                                </div>
                            </div><!--end col-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-slot:js>
        <script>
            function confirmedModal(reservation_id) {
                var modal = new bootstrap.Modal(document.getElementById('confirmedModalgrid'));
                document.getElementById('reservation_id_confirmed').value = reservation_id;
                modal.show();
            }

            function cancelledModal(reservation_id) {
                var modal = new bootstrap.Modal(document.getElementById('cancelledModalgrid'));
                document.getElementById('reservation_id_cancelled').value = reservation_id;
                modal.show();
            }

            function completedModal(reservation_id) {
                var modal = new bootstrap.Modal(document.getElementById('completedModalgrid'));
                document.getElementById('reservation_id_completed').value = reservation_id;
                modal.show();
            }

            function reverseModal(reservation_id) {
                var modal = new bootstrap.Modal(document.getElementById('reverseModalgrid'));
                document.getElementById('reservation_id_reverse').value = reservation_id;
                modal.show();
            }

            function newReservationModal() {
                var modal = new bootstrap.Modal(document.getElementById('newReservationModalgrid'));
                modal.show();
            }

            $(document).on('change', '.fare-trigger', function () {
                var selectedRouteId = $('#route_id').val();
                var selectedVehicleId = $('#vehicle_id').val();
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
                        fareInput.val(response.fare);
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
</x-backend.layout>
