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
                            <div class="flex-shrink-0">
                                <button onclick="newFareModal();" class="btn btn-dark btn-label waves-effect waves-light fs-12">New Fare
                                    <i class="ri-add-circle-fill label-icon align-middle fs-20"></i>
                                </button>
                            </div>
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
                                            <th>FID</th>
                                            <th>Route</th>
                                            <th>Vehicle</th>
                                            <th>Fare</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($fares as $fare)
                                            <tr>
                                                <td>{{ $fare->id }}</td>
                                                <td>{{ $fare->routeDetails->route }}</td>
                                                <td>{{ $fare->vehicleDetails->title }}</td>
                                                <td>{{ $fare->fare }}</td>
                                                <td>
                                                    <button onclick="updateModal('{{ $fare->id }}', '{{ $fare->route_id }}', '{{ $fare->vehicle_id }}', '{{ $fare->fare }}');"
                                                            type="submit"
                                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                                        <i class="ri-pencil-fill label-icon align-middle fs-16"></i>
                                                        Update
                                                    </button>
                                                    <button onclick="deleteModal('{{ $fare->id }}');"
                                                            type="submit"
                                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                                        <i class="ri-delete-bin-2-fill label-icon align-middle fs-16"></i>
                                                        Delete
                                                    </button>
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
                {!! $fares->links() !!}
            </div><!-- end row -->
        </div>
    </div>
        <div class="modal fade" id="newFareModalgrid" tabindex="-1" aria-labelledby="newFareModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Fare</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fares.create') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <label class="form-label">Route</label>
                                <select name="route_id" id="route_id" class="form-control" data-choices name="select-route" data-choices-search-false id="select-route" required>
                                    <option value="" disabled selected>Select Route</option>
                                    @foreach($routes as $route)
                                        <option value="{{ $route->id }}">{{ $route->route }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->
                            <div class="col-6">
                                <label class="form-label">Vehicle</label>
                                <select name="vehicle_id" id="vehicle_id" class="form-control" data-choices name="select-vehicle" data-choices-search-false id="select-vehicle" required>
                                    <option value="" disabled selected>Select Vehicle</option>
                                    @foreach($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}">{{ $vehicle->title }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Fare</label>
                                    <input name="fare" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" data-bs-dismiss="modal" class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                        Close
                                    </button>
                                    <button type="submit" class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
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
        <div class="modal fade" id="deleteModalgrid" tabindex="-1" aria-labelledby="deleteModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Fare</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fares.delete') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Fare ID</label>
                                    <input readonly name="fare_id" id="fare_id_delete" type="text" class="form-control bg-light" value="" required>
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div class="mt-4">
                                    <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">NOTES</label>
                                    <textarea readonly class="form-control alert alert-info" id="exampleFormControlTextarea1" placeholder="Notes" rows="3" required>Please completely make sure that you are deleting the correct route.</textarea>
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" data-bs-dismiss="modal" class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                        Close
                                    </button>
                                    <button type="submit" class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
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
        <div class="modal fade" id="updateModalgrid" tabindex="-1" aria-labelledby="updateModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Fares</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fares.update') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Fare ID</label>
                                    <input readonly name="fare_id" id="fare_id_update" type="text" class="form-control bg-light" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <label class="form-label">Route</label>
                                <select name="route_id" class="form-control" data-choices name="select-route" data-choices-search-false id="fare_route_id_update" required>
                                    <option value="" disabled selected>Select Route</option>
                                    @foreach($routes as $route)
                                        <option value="{{ $route->id }}">{{ $route->route }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->
                            <div class="col-6">
                                <label class="form-label">Vehicle</label>
                                <select name="vehicle_id" class="form-control" data-choices name="select-vehicle" data-choices-search-false id="fare_vehicle_id_update" required>
                                    <option value="" disabled selected>Select Vehicle</option>
                                    @foreach($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}">{{ $vehicle->title }}</option>
                                    @endforeach
                                </select>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Fare</label>
                                    <input name="fare" id="fare_update" type="number" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" data-bs-dismiss="modal" class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-close-circle-fill label-icon align-middle fs-16"></i>
                                        Close
                                    </button>
                                    <button type="submit" class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
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
            function newFareModal() {
                var modal = new bootstrap.Modal(document.getElementById('newFareModalgrid'));
                modal.show();
            }
            function deleteModal(fare_id) {
                var modal = new bootstrap.Modal(document.getElementById('deleteModalgrid'));
                document.getElementById('fare_id_delete').value = fare_id;
                modal.show();
            }
            function updateModal(fare_id, fare_route_id, fare_vehicle_id, fare) {
                var modal = new bootstrap.Modal(document.getElementById('updateModalgrid'));
                document.getElementById('fare_id_update').value = fare_id;
                document.getElementById('fare_route_id_update').value = fare_route_id;
                document.getElementById('fare_vehicle_id_update').value = fare_vehicle_id;
                document.getElementById('fare_update').value = fare;
                modal.show();
            }
        </script>
    </x-slot:js>
</x-backend.layout>
