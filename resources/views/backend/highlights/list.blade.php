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
                                <button onclick="createModal();" class="btn btn-dark btn-label waves-effect waves-light fs-12">New Highlights
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
                                            <th>Highlight ID</th>
                                            <th>Text</th>
                                            <th>Icon</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($highlights as $highlight)
                                            <tr>
                                                <td>#{{ $highlight->id }}</td>
                                                <td>{{ $highlight->text }}</td>
                                                <td>{{ $highlight->icon }}</td>
                                                <td>
                                                    <button onclick="updateModal('{{ $highlight->id }}', `{{ $highlight->text }}`, '{{ $highlight->icon }}');"
                                                            type="submit"
                                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                                        <i class="ri-pencil-fill label-icon align-middle fs-16"></i>
                                                        Update
                                                    </button>
                                                    <button onclick="deleteModal('{{ $highlight->id }}', `{{ $highlight->text }}`, '{{ $highlight->icon }}');"
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
                {!! $highlights->links() !!}
            </div><!-- end row -->
        </div>
    </div>
        <div class="modal fade" id="createModalgrid" tabindex="-1" aria-labelledby="createModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Highlight</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('highlights.create') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Text</label>
                                    <input name="text" type="text" class="form-control" value="" placeholder="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Icon</label>
                                        </div>
                                        <div class="col text-end">
                                            <a href="{{ route('icons.list') }}" target="_blank" class="badge text-bg-primary">Icon List</a>
                                        </div>
                                    </div>
                                    <input name="icon" type="text" class="form-control" value="" placeholder="ri-car-line" required>
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
                    <h5 class="modal-title">Delete Highlight</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('highlights.delete') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Highlight ID</label>
                                    <input readonly name="highlight_id" id="highlight_id_delete" type="text" class="form-control bg-light" value="" placeholder="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Text</label>
                                    <input readonly name="text" id="highlight_text_delete" type="text" class="form-control bg-light" value="" placeholder="" >
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Icon</label>
                                    <input readonly name="icon" id="highlight_icon_delete" type="text" class="form-control bg-light" value="" placeholder="" >
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
                    <h5 class="modal-title">Update Highlight</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('highlights.update') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Highlight ID</label>
                                    <input readonly name="highlight_id" id="highlight_id_update" type="text" class="form-control bg-light" value="" placeholder="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Text</label>
                                    <input name="text" id="highlight_text_update" type="text" class="form-control" value="" placeholder="" >
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Icon</label>
                                        </div>
                                        <div class="col text-end">
                                            <a href="{{ route('icons.list') }}" target="_blank" class="badge text-bg-primary">Icon List</a>
                                        </div>
                                    </div>
                                    <input name="icon" id="highlight_icon_update" type="text" class="form-control" value="" placeholder="" >
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
            function deleteModal(highlight_id, highlight_text, highlight_icon) {
                var modal = new bootstrap.Modal(document.getElementById('deleteModalgrid'));
                document.getElementById('highlight_id_delete').value = highlight_id;
                document.getElementById('highlight_text_delete').value = highlight_text;
                document.getElementById('highlight_icon_delete').value = highlight_icon;
                modal.show();
            }
            function updateModal(highlight_id, highlight_text, highlight_icon) {
                var modal = new bootstrap.Modal(document.getElementById('updateModalgrid'));
                document.getElementById('highlight_id_update').value = highlight_id;
                document.getElementById('highlight_text_update').value = highlight_text;
                document.getElementById('highlight_icon_update').value = highlight_icon;
                modal.show();
            }
        </script>
    </x-slot:js>
</x-backend.layout>
