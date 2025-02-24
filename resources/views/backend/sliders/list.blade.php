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
                                <button onclick="createModal();"
                                        class="btn btn-dark btn-label waves-effect waves-light fs-12">New
                                    Slider
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
                                            <th>Slider ID</th>
                                            <th>Image</th>
                                            <th>Heading</th>
                                            <th>Paragraph</th>
                                            <th>Button Link</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($sliders as $slider)
                                            <tr>
                                                <td><a href="#" class="fw-medium link-primary">#{{ $slider->id }}</a></td>
                                                <td><img src="{{ asset('images/sliders') }}/{{ $slider->image }}"
                                                         alt="{{ $slider->image }}"
                                                         class="avatar-xs rounded">
                                                </td>
                                                <td>{{ $slider->heading }}</td>
                                                <td>{{ $slider->paragraph }}</td>
                                                <td>{{ $slider->button_link }}</td>
                                                <td>
                                                    <button onclick="updateModal('{{ $slider->id }}','{{ $slider->image }}', '{{ $slider->heading }}', `{{ $slider->paragraph }}`, '{{ $slider->button_link }}');"
                                                            type="submit"
                                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                                        <i class="ri-pencil-fill label-icon align-middle fs-16"></i>
                                                        Update
                                                    </button>
                                                    <button onclick="deleteModal('{{ $slider->id }}', '{{ $slider->heading }}');"
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
                {!! $sliders->links() !!}
            </div><!-- end row -->
        </div>
    </div>
    <div class="modal fade" id="createModalgrid" tabindex="-1" aria-labelledby="createModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sliders.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div class="text-center">
                                    <label for="image_create" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="image" value=""
                                                   id="image_create" type="file" required>
                                        </div>
                                        <div class="blog-img-area">
                                            <div class="avatar-title bg-light">
                                                <img src="{{ asset('/images/placeholders/1171x567.png') }}" id="slider_image_create" class="blog-img"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Heading</label>
                                    <input name="heading" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Paragraph</label>
                                    <textarea class="form-control" name="paragraph" rows="2" required></textarea>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Button Link</label>
                                    <input name="button_link" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                        </div>

                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button"
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
    <div class="modal fade" id="deleteModalgrid" tabindex="-1" aria-labelledby="deleteModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sliders.delete') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Slider ID</label>
                                    <input name="slider_id" id="slider_id_delete" type="text" class="form-control bg-light"
                                           value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Heading</label>
                                    <input readonly id="slider_heading_delete" type="text"
                                           class="form-control bg-light" value="">
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button"
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
    <div class="modal fade" id="updateModalgrid" tabindex="-1" aria-labelledby="updateModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Slider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sliders.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Slider ID</label>
                                    <input readonly name="slider_id" id="slider_id_update" type="text" class="form-control bg-light" value=""
                                           required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="text-center">
                                    <label for="image_update" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="image" value=""
                                                   id="image_update" type="file">
                                        </div>
                                        <div class="blog-img-area">
                                            <div class="avatar-title bg-light">
                                                <img src="" id="slider_image_update" class="blog-img"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Heading</label>
                                    <input name="heading" id="slider_heading_update" type="text" class="form-control" value="">
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Paragraph</label>
                                    <textarea class="form-control" id="slider_paragraph_update" name="paragraph" rows="2"></textarea>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Button Link</label>
                                    <input name="button_link" id="slider_button_link_update" type="text" class="form-control" value="">
                                </div>
                            </div><!--end col-->
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button"
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
            const Img0Imput = document.getElementById("image_create");
            const Img0 = document.getElementById("slider_image_create");

            Img0Imput.addEventListener("change", () => {
                const selectedImage = Img0Imput.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img0.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img0.src = "");

            });
        </script>
        <script>
            const Img0ImputUpdate = document.getElementById("image_update");
            const Img0Update = document.getElementById("slider_image_update");

            Img0ImputUpdate.addEventListener("change", () => {
                const selectedImage = Img0ImputUpdate.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img0Update.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img0Update.src = "");

            });
        </script>
        <script>
            function createModal() {
                var modal = new bootstrap.Modal(document.getElementById('createModalgrid'));
                modal.show();
            }

            function deleteModal(slider_id, slider_heading) {
                var modal = new bootstrap.Modal(document.getElementById('deleteModalgrid'));
                document.getElementById('slider_id_delete').value = slider_id;
                document.getElementById('slider_heading_delete').value = slider_heading;
                modal.show();
            }

            function updateModal(slider_id, slider_image,  slider_heading, slider_paragraph, slider_button_link) {
                var modal = new bootstrap.Modal(document.getElementById('updateModalgrid'));
                document.getElementById('slider_id_update').value = slider_id;
                var imgElement = document.getElementById('slider_image_update');
                imgElement.src = "{{ asset('images/sliders') }}/" + slider_image;
                document.getElementById('slider_heading_update').value = slider_heading;
                document.getElementById('slider_paragraph_update').value = slider_paragraph;
                document.getElementById('slider_button_link_update').value = slider_button_link;
                modal.show();
            }
        </script>
    </x-slot:js>
</x-backend.layout>
