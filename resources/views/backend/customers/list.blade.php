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
                                            <th>CID</th>
                                            <th>Full Name</th>
                                            <th>Contact</th>
                                            <th>WhatsApp</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td>{{ $customer->id }}</td>
                                                <td>{{ $customer->full_name }}</td>
                                                <td>{{ $customer->contact }}</td>
                                                <td>{{ $customer->whatsapp }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>{{ $customer->country->name ?? 'N/A' }} ({{ $customer->country->phonecode ?? 'N/A' }})</td>
                                                <td>
                                                    <button onclick="updateModal('{{ $customer->id }}', '{{ $customer->full_name }}', '{{ $customer->contact }}', '{{ $customer->whatsapp }}', '{{ $customer->email }}', '{{ $customer->country_id }}');"
                                                            type="submit"
                                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                                        <i class="ri-pencil-fill label-icon align-middle fs-16"></i>
                                                        Update
                                                    </button>
                                                    <button onclick="deleteModal('{{ $customer->id }}', '{{ $customer->full_name }}');"
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
                {!! $customers->links() !!}
            </div><!-- end row -->
        </div>
    </div>
    <div class="modal fade" id="deleteModalgrid" tabindex="-1" aria-labelledby="deleteModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('customers.delete') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-xxl-12" hidden="">
                                <div>
                                    <label class="form-label">Customer ID</label>
                                    <input readonly name="customer_id" type="text" class="form-control bg-light" id="customer_id_delete" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12" hidden="">
                                <div>
                                    <label class="form-label">Full Name</label>
                                    <input readonly name="full_name" type="text" class="form-control bg-light" id="customer_full_name_delete" value="">
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-xxl-12">
                                <div class="mt-4">
                                    <label for="exampleFormControlTextarea1" class="form-label text-muted text-uppercase fw-semibold">NOTES</label>
                                    <textarea readonly class="form-control alert alert-info" id="exampleFormControlTextarea1" placeholder="Notes" rows="3" required>Please completely make sure that you are deleting the correct customer record.</textarea>
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
                    <h5 class="modal-title">Update Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('customers.update') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Customer ID</label>
                                    <input readonly name="customer_id" type="text" class="form-control bg-light" id="customer_id_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Full Name</label>
                                    <input name="full_name" type="text" class="form-control" id="customer_full_name_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Contact</label>
                                    <input name="contact" type="number" class="form-control" id="customer_contact_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">WhatsApp</label>
                                    <input name="whatsapp" type="number" class="form-control" id="customer_whatsapp_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Email Adderss</label>
                                    <input name="email" type="email" class="form-control" id="customer_email_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Country</label>
                                    <select name="country_id" class="form-control" data-choices data-choices-search-false id="customer_country_id_update">
                                        <option value="" disabled selected>Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
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
            function deleteModal(customer_id, customer_full_name) {
                var modal = new bootstrap.Modal(document.getElementById('deleteModalgrid'));
                document.getElementById('customer_id_delete').value = customer_id;
                document.getElementById('customer_full_name_delete').value = customer_full_name;
                modal.show();
            }
            function updateModal(customer_id, customer_full_name, customer_contact, customer_whatsapp, customer_email, customer_country_id) {
                var modal = new bootstrap.Modal(document.getElementById('updateModalgrid'));
                document.getElementById('customer_id_update').value = customer_id;
                document.getElementById('customer_full_name_update').value = customer_full_name;
                document.getElementById('customer_contact_update').value = customer_contact;
                document.getElementById('customer_whatsapp_update').value = customer_whatsapp;
                document.getElementById('customer_email_update').value = customer_email;
                document.getElementById('customer_country_id_update').value = customer_country_id;
                modal.show();
            }
        </script>
    </x-slot:js>
</x-backend.layout>
