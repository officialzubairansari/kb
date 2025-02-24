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
                                <button onclick="newDriverModal();" class="btn btn-dark btn-label waves-effect waves-light fs-12">New Driver
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
                                            <th>DID</th>
                                            <th>Full Name</th>
                                            <th>Contact</th>
                                            <th>WhatsApp</th>
                                            <th>Email</th>
                                            @if(checkSettings('custom_project'))
                                                <th>Assigned Rides</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($drivers as $driver)
                                            <tr>
                                                <td>{{ $driver->id }}</td>
                                                <td>{{ $driver->full_name }}</td>
                                                <td>{{ $driver->contact }}</td>
                                                <td>{{ $driver->whatsapp }}</td>
                                                <td>{{ $driver->email }}</td>
                                                @if(checkSettings('custom_project'))
                                                    <td>
                                                        <a href="#"
                                                           type="submit"
                                                           class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-secondary btn-label waves-effect waves-light text-nowrap">
                                                            <i class="ri-list-check label-icon align-middle fs-16"></i>
                                                            List Assigned Rides
                                                        </a>
                                                    </td>
                                                @endif
                                                <td>
                                                    <button onclick="updateModal('{{ $driver->id }}', '{{ $driver->full_name }}', '{{ $driver->contact }}', '{{ $driver->whatsapp }}', '{{ $driver->email }}');"
                                                            type="submit"
                                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                                        <i class="ri-pencil-fill label-icon align-middle fs-16"></i>
                                                        Update
                                                    </button>
                                                    <button onclick="deleteModal('{{ $driver->id }}', '{{ $driver->full_name }}');"
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
                {!! $drivers->links() !!}
            </div><!-- end row -->
        </div>
    </div>
        <div class="modal fade" id="newDriverModalgrid" tabindex="-1" aria-labelledby="newDriverModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('drivers.create') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Full Name</label>
                                    <input name="full_name" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Contact</label>
                                    <input name="contact" type="number" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">WhatsApp</label>
                                    <input name="whatsapp" type="number" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Email Address</label>
                                    <input name="email" type="email" class="form-control" value="" required>
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
                    <h5 class="modal-title">Delete Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('drivers.delete') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Driver ID</label>
                                    <input readonly name="driver_id" type="text" class="form-control bg-light" id="driver_id_delete" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Full Name</label>
                                    <input readonly name="full_name" type="text" class="form-control bg-light" id="driver_full_name_delete" value="">
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div class="mt-4">
                                    <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">NOTES</label>
                                    <textarea readonly class="form-control alert alert-info" id="exampleFormControlTextarea1" placeholder="Notes" rows="3" required>Please completely make sure that you are deleting the correct driver record.</textarea>
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
                    <h5 class="modal-title">Delete Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('drivers.update') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Driver ID</label>
                                    <input readonly name="driver_id" type="text" class="form-control bg-light" id="driver_id_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Full Name</label>
                                    <input name="full_name" type="text" class="form-control" id="driver_full_name_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Contact</label>
                                    <input name="contact" type="number" class="form-control" id="driver_contact_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">WhatsApp</label>
                                    <input name="whatsapp" type="number" class="form-control" id="driver_whatsapp_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Email Adderss</label>
                                    <input name="email" type="email" class="form-control" id="driver_email_update" value="">
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
            function newDriverModal() {
                var modal = new bootstrap.Modal(document.getElementById('newDriverModalgrid'));
                modal.show();
            }
            function deleteModal(driver_id, driver_full_name) {
                var modal = new bootstrap.Modal(document.getElementById('deleteModalgrid'));
                document.getElementById('driver_id_delete').value = driver_id;
                document.getElementById('driver_full_name_delete').value = driver_full_name;
                modal.show();
            }
            function updateModal(driver_id, driver_full_name, driver_contact, driver_whatsapp, driver_email) {
                var modal = new bootstrap.Modal(document.getElementById('updateModalgrid'));
                document.getElementById('driver_id_update').value = driver_id;
                document.getElementById('driver_full_name_update').value = driver_full_name;
                document.getElementById('driver_contact_update').value = driver_contact;
                document.getElementById('driver_whatsapp_update').value = driver_whatsapp;
                document.getElementById('driver_email_update').value = driver_email;
                modal.show();
            }
        </script>
    </x-slot:js>
</x-backend.layout>
