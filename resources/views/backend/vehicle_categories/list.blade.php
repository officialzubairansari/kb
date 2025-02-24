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
                                <div class="flex-shrink-0">
                                    <button onclick="newCategoryModal();" class="btn btn-sm btn-dark btn-label waves-effect waves-light mb-2 fs-12">New Category
                                        <i class="ri-add-circle-fill label-icon align-middle fs-20"></i>
                                    </button>
                                </div>
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
                                            <th>VCID</th>
                                            <th>Slug</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($vehicle_categories as $vehicle_category)
                                            <tr>
                                                <td>{{ $vehicle_category->id }}</td>
                                                <td>{{ $vehicle_category->slug }}</td>
                                                <td>{{ $vehicle_category->name }}</td>
                                                <td>
                                                    <button onclick="updateModal('{{ $vehicle_category->id }}', '{{ $vehicle_category->slug }}', '{{ $vehicle_category->name }}');"
                                                            type="submit"
                                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                                        <i class="ri-pencil-fill label-icon align-middle fs-16"></i>
                                                        Update
                                                    </button>
                                                    <button onclick="deleteModal('{{ $vehicle_category->id }}', '{{ $vehicle_category->slug }}', '{{ $vehicle_category->name }}');"
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
                {!! $vehicle_categories->links() !!}
            </div><!-- end row -->
        </div>
    </div>
        <div class="modal fade" id="newCategoryModalgrid" tabindex="-1" aria-labelledby="newCategoryModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('vehicle.categories.create') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control name-category" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label class="form-label">Slug</label>
                                    <input readonly name="slug" type="text" class="form-control bg-light slug-category" value="" required>
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
                    <h5 class="modal-title">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('vehicle.categories.delete') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-6" hidden="">
                                <div>
                                    <label class="form-label">Category ID</label>
                                    <input readonly name="vehicle_category_id" type="text" class="form-control bg-light" id="category_id_delete" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Name</label>
                                    <input readonly name="name" type="text" class="form-control bg-light" id="category_name_delete" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Slug</label>
                                    <input readonly name="slug" type="text" class="form-control bg-light" id="category_slug_delete" value="">
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
                    <h5 class="modal-title">Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('vehicle.categories.update') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-6" hidden="">
                                <div>
                                    <label class="form-label">Category ID</label>
                                    <input readonly name="vehicle_category_id" type="text" class="form-control bg-light" id="category_id_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control name-category" id="category_name_update" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <label class="form-label">Slug</label>
                                    <input readonly name="slug" type="text" class="form-control bg-light slug-category" id="category_slug_update" value="">
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
            $(document).ready(function() {
                $('.name-category').on('keyup', function() {
                    var nameValue = $(this).val();
                    var slugValue = nameValue.replace(/\s+/g, '_').toLowerCase();
                    $('.slug-category').val(slugValue);
                });
            });

            function newCategoryModal() {
                var modal = new bootstrap.Modal(document.getElementById('newCategoryModalgrid'));
                modal.show();
            }
            function deleteModal(category_id, category_slug, category_name) {
                var modal = new bootstrap.Modal(document.getElementById('deleteModalgrid'));
                document.getElementById('category_id_delete').value = category_id;
                document.getElementById('category_slug_delete').value = category_slug;
                document.getElementById('category_name_delete').value = category_name;
                modal.show();
            }
            function updateModal(category_id, category_slug, category_name) {
                var modal = new bootstrap.Modal(document.getElementById('updateModalgrid'));
                document.getElementById('category_id_update').value = category_id;
                document.getElementById('category_slug_update').value = category_slug;
                document.getElementById('category_name_update').value = category_name;
                modal.show();
            }
        </script>
    </x-slot:js>
</x-backend.layout>
