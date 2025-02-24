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
                                    Vehicle
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
                                            <th>VID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Model</th>
                                            <th>Category</th>
                                            <th>Company</th>
                                            <th>Star</th>
                                            <th>Passengers</th>
                                            <th>Luggage</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($vehicles as $vehicle)
                                            <tr>
                                                <td>{{ $vehicle->id }}</td>
                                                <td><img src="{{ asset('images/vehicles') }}/{{ $vehicle->featured_image }}"
                                                         alt="{{ $vehicle->$vehicle }}"
                                                         class="avatar-xs rounded">
                                                <td>{{ $vehicle->title }}</td>
                                                <td>{{ $vehicle->model }}</td>
                                                <td>{{ $vehicle->vehicleCategory->name }}</td>
                                                <td>{{ $vehicle->company }}</td>
                                                <td>{{ $vehicle->stars }}</td>
                                                <td>{{ $vehicle->passengers }}</td>
                                                <td>{{ $vehicle->luggage }}</td>
                                                <td>
                                                    @if($vehicle->status == 1)
                                                        <span class="badge badge-soft-success text-uppercase">Published</span>
                                                    @endif
                                                    @if($vehicle->status == 0)
                                                        <span class="badge badge-soft-warning text-uppercase">UnPublished</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button onclick="updateModal(
                                                    '{{ $vehicle->id }}',
                                                    '{{ $vehicle->title }}',
                                                    '{{ $vehicle->model }}',
                                                    `{{ $vehicle->short_description }}`,
                                                    `{{ $vehicle->long_description }}`,
                                                    '{{ $vehicle->vehicle_category_id }}',
                                                    '{{ $vehicle->company }}',
                                                    '{{ $vehicle->stars }}',
                                                    '{{ $vehicle->passengers }}',
                                                    '{{ $vehicle->luggage }}',
                                                    '{{ $vehicle->featured_image }}',
                                                    '{{ $vehicle->image_1 }}',
                                                    '{{ $vehicle->image_2 }}',
                                                    '{{ $vehicle->image_3 }}',
                                                    '{{ $vehicle->image_4 }}',
                                                    '{{ $vehicle->status }}'
                                                    );"
                                                            type="submit"
                                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                                        <i class="ri-pencil-fill label-icon align-middle fs-16"></i>
                                                        Update
                                                    </button>
                                                    <button onclick="deleteModal('{{ $vehicle->id }}', '{{ $vehicle->title }}');"
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
                {!! $vehicles->links() !!}
            </div><!-- end row -->
        </div>
    </div>
    <div class="modal fade" id="createModalgrid" tabindex="-1" aria-labelledby="createModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('vehicles.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- featured image--}}
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div class="text-center">
                                    <label for="f_image_create" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="featured_image" value=""
                                                   id="f_image_create" type="file" required>
                                        </div>
                                        <div class="blog-img-area">
                                            <div class="avatar-title bg-light">
                                                <img src="{{ asset('/images/placeholders/1920x1280.png') }}" id="featured_image_create" class="blog-img"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- Other image--}}
                        <div class="row g-3 mb-3">
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="img1_create" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="image_1" value=""
                                                   id="img1_create" type="file" required>
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light">
                                                <img src="{{ asset('/images/placeholders/1920x1280.png') }}" id="image1_create" class="avatar-lg"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="img2_create" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="image_2" value=""
                                                   id="img2_create" type="file" required>
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light">
                                                <img src="{{ asset('/images/placeholders/1920x1280.png') }}" id="image2_create" class="avatar-lg"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="img3_create" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="image_3" value=""
                                                   id="img3_create" type="file" required>
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light">
                                                <img src="{{ asset('/images/placeholders/1920x1280.png') }}" id="image3_create" class="avatar-lg"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="img4_create" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="image_4" value=""
                                                   id="img4_create" type="file" required>
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light">
                                                <img src="{{ asset('/images/placeholders/1920x1280.png') }}" id="image4_create" class="avatar-lg"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- Texts --}}
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Title</label>
                                    <input name="title" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Short Description</label>
                                    <textarea class="form-control" name="short_description" rows="2" required></textarea>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Long Description</label>
                                    <textarea class="form-control" name="long_description" rows="2" required></textarea>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Model</label>
                                    <input name="model" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Category</label>
                                    <select name="vehicle_category_id" class="form-control" data-choices name="vehicle_category_id"
                                            data-choices-search-false id="vehicle_category_id" required>
                                        <option value="" disabled>Select Category</option>
                                        @foreach($vehicle_categories as $vehicle_category)
                                            <option value="{{ $vehicle_category->id }}">{{ $vehicle_category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Company</label>
                                    <input name="company" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Stars</label>
                                    <input name="stars" type="number" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Passengers</label>
                                    <input name="passengers" type="number" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Luggage</label>
                                    <input name="luggage" type="number" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control" data-choices="" data-choices-search-false="" required="">
                                        <option value="1">Published</option>
                                        <option value="0">Unpublished</option>
                                    </select>
                                </div>
                            </div>
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
                    <h5 class="modal-title">Delete Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('vehicles.delete') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Vehicle ID</label>
                                    <input name="vehicle_id" id="vehicle_id_delete" type="text" class="form-control bg-light"
                                           value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Title</label>
                                    <input readonly id="vehicle_title_delete" type="text"
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
                    <h5 class="modal-title">Update Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('vehicles.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- featured image --}}
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div class="text-center">
                                    <label for="f_image_update" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="featured_image" value=""
                                                   id="f_image_update" type="file">
                                        </div>
                                        <div class="blog-img-area">
                                            <div class="avatar-title bg-light">
                                                <img src="" id="featured_image_update" class="blog-img"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- other image --}}
                        <div class="row g-3 mb-3">
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="img1_update" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="image_1" value=""
                                                   id="img1_update" type="file">
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light">
                                                <img src="" id="image1_update" class="avatar-lg"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="img2_update" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="image_2" value=""
                                                   id="img2_update" type="file">
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light">
                                                <img src="" id="image2_update" class="avatar-lg"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="img3_update" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="image_3" value=""
                                                   id="img3_update" type="file">
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light">
                                                <img src="" id="image3_update" class="avatar-lg"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="text-center">
                                    <label for="img4_update" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="image_4" value=""
                                                   id="img4_update" type="file">
                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light">
                                                <img src="" id="image4_update" class="avatar-lg"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- Texts --}}
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Vehicle ID</label>
                                    <input readonly name="vehicle_id" id="vehicle_id_update" type="text" class="form-control bg-light" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Title</label>
                                    <input name="title" id="vehicle_title_update" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Short Description</label>
                                    <textarea class="form-control" id="vehicle_short_description_update" name="short_description" rows="2" required></textarea>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Long Description</label>
                                    <textarea class="form-control" id="vehicle_long_description_update" name="long_description" rows="2" required></textarea>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Model</label>
                                    <input name="model" type="text" id="vehicle_model_update" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Category</label>
                                    <select name="vehicle_category_id" class="form-control" data-choices data-choices-search-false id="vehicle_category_id_update" required>
                                        <option value="" disabled>Select Category</option>
                                        @foreach($vehicle_categories as $vehicle_category)
                                            <option value="{{ $vehicle_category->id }}">{{ $vehicle_category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Company</label>
                                    <input name="company" id="vehicle_company_update" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Stars</label>
                                    <input name="stars" id="vehicle_stars_update" type="number" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Passengers</label>
                                    <input name="passengers" id="vehicle_passengers_update" type="number" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Luggage</label>
                                    <input name="luggage" id="vehicle_luggage_update" type="number" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control" data-choices
                                            data-choices-search-false id="vehicle_status_update" required>
                                        <option value="1">Published</option>
                                        <option value="0">Unpublished</option>
                                    </select>
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
            const Img0Imput = document.getElementById("f_image_create");
            const Img0 = document.getElementById("featured_image_create");

            Img0Imput.addEventListener("change", () => {
                const selectedImage = Img0Imput.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img0.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img0.src = "");

            });

            const Img1Imput = document.getElementById("img1_create");
            const Img1 = document.getElementById("image1_create");

            Img1Imput.addEventListener("change", () => {
                const selectedImage = Img1Imput.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img1.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img1.src = "");

            });

            const Img2Imput = document.getElementById("img2_create");
            const Img2 = document.getElementById("image2_create");

            Img2Imput.addEventListener("change", () => {
                const selectedImage = Img2Imput.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img2.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img2.src = "");

            });

            const Img3Imput = document.getElementById("img3_create");
            const Img3 = document.getElementById("image3_create");

            Img3Imput.addEventListener("change", () => {
                const selectedImage = Img3Imput.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img3.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img3.src = "");

            });

            const Img4Imput = document.getElementById("img4_create");
            const Img4 = document.getElementById("image4_create");

            Img4Imput.addEventListener("change", () => {
                const selectedImage = Img4Imput.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img4.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img4.src = "");

            });
        </script>
        <script>
            const Img0ImputUpdate = document.getElementById("f_image_update");
            const Img0Update = document.getElementById("featured_image_update");

            Img0ImputUpdate.addEventListener("change", () => {
                const selectedImage = Img0ImputUpdate.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img0Update.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img0Update.src = "");

            });

            const Img1ImputUpdate = document.getElementById("img1_update");
            const Img1Update = document.getElementById("image1_update");

            Img1ImputUpdate.addEventListener("change", () => {
                const selectedImage = Img1ImputUpdate.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img1Update.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img1Update.src = "");

            });

            const Img2ImputUpdate = document.getElementById("img2_update");
            const Img2Update = document.getElementById("image2_update");

            Img2ImputUpdate.addEventListener("change", () => {
                const selectedImage = Img2ImputUpdate.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img2Update.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img2Update.src = "");

            });

            const Img3ImputUpdate = document.getElementById("img3_update");
            const Img3Update = document.getElementById("image3_update");

            Img3ImputUpdate.addEventListener("change", () => {
                const selectedImage = Img3ImputUpdate.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img3Update.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img3Update.src = "");

            });


            const Img4ImputUpdate = document.getElementById("img4_update");
            const Img4Update = document.getElementById("image4_update");

            Img4ImputUpdate.addEventListener("change", () => {
                const selectedImage = Img4ImputUpdate.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img4Update.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img4Update.src = "");

            });
        </script>
        <script>
            function createModal() {
                var modal = new bootstrap.Modal(document.getElementById('createModalgrid'));
                modal.show();
            }

            function deleteModal(vehicle_id, vehicle_title) {
                var modal = new bootstrap.Modal(document.getElementById('deleteModalgrid'));
                document.getElementById('vehicle_id_delete').value = vehicle_id;
                document.getElementById('vehicle_title_delete').value = vehicle_title;
                modal.show();
            }

            function updateModal(
                vehicle_id,
                vehicle_title,
                vehicle_model,
                vehicle_short_description,
                vehicle_long_description,
                vehicle_category_id,
                vehicle_company,
                vehicle_stars,
                vehicle_passengers,
                vehicle_luggage,
                vehicle_featured_image,
                vehicle_image1,
                vehicle_image2,
                vehicle_image3,
                vehicle_image4,
                vehicle_status) {
                var modal = new bootstrap.Modal(document.getElementById('updateModalgrid'));

                document.getElementById('vehicle_id_update').value = vehicle_id;
                document.getElementById('vehicle_title_update').value = vehicle_title;
                document.getElementById('vehicle_model_update').value = vehicle_model;
                document.getElementById('vehicle_short_description_update').value = vehicle_short_description;
                document.getElementById('vehicle_long_description_update').value = vehicle_long_description;
                document.getElementById('vehicle_category_id_update').value = vehicle_category_id;
                document.getElementById('vehicle_company_update').value = vehicle_company;
                document.getElementById('vehicle_stars_update').value = vehicle_stars;
                document.getElementById('vehicle_passengers_update').value = vehicle_passengers;
                document.getElementById('vehicle_luggage_update').value = vehicle_luggage;

                //Images
                var imgElement = document.getElementById('featured_image_update');
                imgElement.src = "{{ asset('images/vehicles') }}/" + vehicle_featured_image;

                var imgElement = document.getElementById('image1_update');
                imgElement.src = "{{ asset('images/vehicles') }}/" + vehicle_image1;

                var imgElement = document.getElementById('image2_update');
                imgElement.src = "{{ asset('images/vehicles') }}/" + vehicle_image2;

                var imgElement = document.getElementById('image3_update');
                imgElement.src = "{{ asset('images/vehicles') }}/" + vehicle_image3;

                var imgElement = document.getElementById('image4_update');
                imgElement.src = "{{ asset('images/vehicles') }}/" + vehicle_image4;

                document.getElementById('vehicle_status_update').value = vehicle_status;
                modal.show();
            }
        </script>
    </x-slot:js>
</x-backend.layout>
