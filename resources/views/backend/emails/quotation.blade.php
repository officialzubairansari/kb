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
                        <form action="{{ route('send.email') }}" method="post">
                            @csrf
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">{{ $title }}</h4>
                                <div class="flex-shrink-0">
                                    <button type="submit"
                                            class="btn btn-primary btn-label waves-effect waves-light fs-12">Send Mail
                                        <i class="ri-check-fill label-icon align-middle fs-20"></i>
                                    </button>
                                </div>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="row g-3 mb-3">
                                    <div>
                                        <div class="mb-3 position-relative">
                                            <input type="email" class="form-control" name="to"
                                                   placeholder="Email address" value="" required>
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" name="subject" class="form-control" placeholder="Subject"
                                                   value="Quotations for the fares 2024 - Umrah Transport Service">
                                        </div>

                                        <div class="mb-3">
                                            <label for="body">Message</label>
                                            <textarea class="form-control" id="body" name="body" rows="5">{!! nl2br(e($body)) !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    @foreach($vehicles as $vehicle)
                                        <button onclick="vehicleModal({{ $vehicle->toJson() }}, '{{ $vehicle->title }}');"
                                                type="button" class="btn btn-dark">
                                            {{ $vehicle->title }}
                                        </button>
                                    @endforeach
                                </div>
                            </div><!-- end card -->
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <x-backend.flash-message></x-backend.flash-message>
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{ $title }}</h4>
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
                                            <th>EID</th>
                                            <th>To</th>
                                            <th>Subject</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($emails as $email)
                                            <tr>
                                                <td>{{ $email->id }}</td>
                                                <td>{{ $email->to }}</td>
                                                <td>{{ $email->subject }}</td>
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
                {!! $emails->links() !!}
            </div><!-- end row -->
        </div>
    </div>
    <!-- Vehicle modal -->
    <div class="modal fade" id="vehicleModal" tabindex="-1"
         aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vehicle_title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="m-2">
                        <div id="vehicle-details">
                            <!-- Modal content will be injected here -->
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" data-bs-dismiss="modal"
                                        class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                    <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                    Close
                                </button>
                            </div>
                        </div><!--end col-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <x-slot:js>
        <!-- CKEditor 5 -->
        <script src="{{ asset('libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#body'))
        </script>

        <script>
            function vehicleModal(vehicle, vehicle_title) {
                let currency = '{{ $company_details->currency }}'; // Ensure the PHP variable is passed correctly to JavaScript

                $('#vehicle_title').text(vehicle_title);

                $('#vehicle-details').empty();

                let content = '';
                vehicle.route_vehicles.forEach(function (routeVehicle) {
                    content += `
                        <div class="row">
                            <div class="col-12">
                                <p>${routeVehicle.route.route} [${routeVehicle.fare} ${currency}]</p>
                            </div>
                        </div>`;
                });

                $('#vehicle-details').html(content);

                var modal = new bootstrap.Modal(document.getElementById('vehicleModal'));
                modal.show();
            }

        </script>
    </x-slot:js>
</x-backend.layout>
