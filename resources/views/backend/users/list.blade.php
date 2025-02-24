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
                                <button onclick="createModal();" class="btn btn-dark btn-label waves-effect waves-light fs-12">New User
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
                                            <th>User ID</th>
                                            <th>Name</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($users as $user)
                                            <tr>
                                                <td>#{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->contact_no }}</td>
                                                    <td>
                                                        <button onclick="updateModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->user_name }}', '{{ $user->email }}', '{{ $user->contact_no }}');"
                                                                type="submit"
                                                                class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap @disabled($user->id == 1)">
                                                            <i class="ri-pencil-fill label-icon align-middle fs-16"></i>
                                                            Update
                                                        </button>
                                                        <button onclick="deleteModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->user_name }}', '{{ $user->email }}', '{{ $user->contact_no }}');"
                                                                type="submit"
                                                                class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-danger btn-label waves-effect waves-light text-nowrap @disabled($user->id == 1)">
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
                {!! $users->links() !!}
            </div><!-- end row -->
        </div>
    </div>
        <div class="modal fade" id="createModalgrid" tabindex="-1" aria-labelledby="createModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.create') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Role</label>
                                        </div>
                                    </div>
                                    <select name="role" class="form-control" data-choices name="role"
                                            data-choices-search-false id="role" required>
                                        <option value="" disabled>Select Category</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control" value="" placeholder="Enter Name" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Username</label>
                                    <input name="user_name" id="user_name" type="text" class="form-control" value="" placeholder="Enter Username" required>
                                    <div class="invalid-feedback">User already exist with that username.</div>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Contact No</label>
                                    <input name="contact_no" type="number" class="form-control" value="" placeholder="Enter Contact No" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" value="" placeholder="Enter Email" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" value="" placeholder="Enter Password" required>
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
                    <h5 class="modal-title">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.delete') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">User ID</label>
                                    <input readonly name="user_id" id="user_id_delete" type="text" class="form-control bg-light" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Name</label>
                                    <input readonly name="name" id="name_delete" type="text" class="form-control bg-light" value="" required>
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
                    <h5 class="modal-title">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.update') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">User ID</label>
                                    <input readonly name="user_id" id="user_id_update" type="text" class="form-control bg-light" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Name</label>
                                    <input name="name" id="name_update" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Username</label>
                                    <input readonly name="user_name" id="user_name_update" type="text" class="form-control bg-light" value="" required>
                                    <div class="invalid-feedback">User already exist with that username.</div>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Contact No</label>
                                    <input name="contact_no" id="contact_no_update" type="number" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Email</label>
                                    <input name="email" id="email_update" type="email" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" value="">
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
            function createModal() {
                var modal = new bootstrap.Modal(document.getElementById('createModalgrid'));
                modal.show();
            }
            function deleteModal(id, name) {
                var modal = new bootstrap.Modal(document.getElementById('deleteModalgrid'));
                document.getElementById('user_id_delete').value = id;
                document.getElementById('name_delete').value = name;
                modal.show();
            }
            function updateModal(id, name, user_name, email, contact_no) {
                var modal = new bootstrap.Modal(document.getElementById('updateModalgrid'));
                document.getElementById('user_id_update').value = id;
                document.getElementById('name_update').value = name;
                document.getElementById('user_name_update').value = user_name;
                document.getElementById('email_update').value = email;
                document.getElementById('contact_no_update').value = contact_no;
                modal.show();
            }
            $(document).ready(function() {
                $('#user_name').on('input', function() {
                    var value = $(this).val();
                    $(this).val(value.replace(/\s+/g, ''));
                });
            });

            $(document).on('change', '#user_name', function () {
                var userName = $(this).val();
                var inputField = $(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('check.username') }}",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'user_name': userName,
                    },
                    success: function (response) {
                        if (response == false) {
                            inputField.addClass('is-invalid');
                        } else {
                            inputField.removeClass('is-invalid');
                        }
                    }
                });
            });
        </script>
    </x-slot:js>
</x-backend.layout>
