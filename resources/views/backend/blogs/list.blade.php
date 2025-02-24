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
                                    Blog
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
                                            <th>Blog ID</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                        @foreach($blogs as $blog)
                                            <tr>
                                                <td><a href="#" class="fw-medium link-primary">#{{ $blog->id }}</a></td>
                                                <td><img src="{{ asset('images/blog') }}/{{ $blog->featured_image }}"
                                                         alt="{{ $blog->featured_image }}"
                                                         class="avatar-xs rounded"></td>
                                                <td>
                                                    {{ implode(' ', array_slice(explode(' ', $blog->title), 0, 5)) }}{{ str_word_count($blog->title) > 5 ? '...' : '' }}
                                                </td>
                                                <td>
                                                    {{ implode(' ', array_slice(explode(' ', $blog->content), 0, 8)) }}{{ str_word_count($blog->content) > 8 ? '...' : '' }}
                                                </td>
                                                <td>{{ $blog->nameAuthor->name }}</td>
                                                <td>{{ $blog->nameBlogCategory->name }}</td>
                                                <td>
                                                    <button onclick="updateModal('{{ $blog->id }}','{{ $blog->featured_image }}', '{{ $blog->author_id }}', '{{ $blog->category_id }}', '{{ $blog->title }}', `{{ $blog->content }}`);"
                                                            type="submit"
                                                            class="mt-1 mb-1 mr-1 mr-l btn btn-sm btn-success btn-label waves-effect waves-light text-nowrap">
                                                        <i class="ri-pencil-fill label-icon align-middle fs-16"></i>
                                                        Update
                                                    </button>
                                                    <button onclick="deleteModal('{{ $blog->id }}', '{{ $blog->title }}');"
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
                {!! $blogs->links() !!}
            </div><!-- end row -->
        </div>
    </div>
    <div class="modal fade" id="createModalgrid" tabindex="-1" aria-labelledby="createModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('blogs.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <div class="text-center">
                                    <label for="featured_image_create" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="featured_image" value=""
                                                   id="featured_image_create" type="file" required>
                                        </div>
                                        <div class="blog-img-area">
                                            <div class="avatar-title bg-light">
                                                <img src="{{ asset('/images/placeholders/1024x682.png') }}" id="blog_featured_image_create" class="blog-img"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Authors</label>
                                        </div>
                                        <div class="col text-end">
                                            <a href="{{ route('authors.list') }}" target="_blank" class="badge text-bg-primary">+ Author</a>
                                        </div>
                                    </div>
                                    <select name="author_id" class="form-control" data-choices name="author_id"
                                            data-choices-search-false id="author_id" required>
                                        <option value="" disabled>Select Author</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Categories</label>
                                        </div>
                                        <div class="col text-end">
                                            <a href="{{ route('blog.categories.list') }}" target="_blank" class="badge text-bg-primary">+ Category</a>
                                        </div>
                                    </div>

                                    <select name="category_id" class="form-control" data-choices name="category_id"
                                            data-choices-search-false id="category_id" required>
                                        <option value="" disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Title</label>
                                    <input name="title" type="text" class="form-control" value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control" name="content" rows="10" required></textarea>
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
                    <h5 class="modal-title">Delete Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('blogs.delete') }}" method="post">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden="">
                                <div>
                                    <label class="form-label">Blog ID</label>
                                    <input name="blog_id" id="blog_id_delete" type="text" class="form-control"
                                           value="" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Title</label>
                                    <input readonly id="blog_title_delete" type="text"
                                           class="form-control bg-light" value="" required>
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
                    <h5 class="modal-title">Update Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('blogs.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-12" hidden>
                                <div>
                                    <label class="form-label">Blog ID</label>
                                    <input name="blog_id" id="blog_id_update" type="text" class="form-control" value=""
                                           required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div class="text-center">
                                    <label for="featured_image_update" class="position-relative d-inline-block cursor-pointer">
                                        <div class="position-absolute top-50 start-50 translate-middle">
                                            <input class="form-control d-none" name="featured_image" value=""
                                                   id="featured_image_update" type="file">
                                        </div>
                                        <div class="blog-img-area">
                                            <div class="avatar-title bg-light">
                                                <img src="" id="blog_featured_image_update" class="blog-img"/>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Authors</label>
                                        </div>
                                        <div class="col text-end">
                                            <a href="{{ route('authors.list') }}" target="_blank" class="badge text-bg-primary">+ Author</a>
                                        </div>
                                    </div>
                                    <select name="author_id" class="form-control" data-choices name="author_id"
                                            data-choices-search-false id="blog_author_id_update" required>
                                        <option value="" disabled>Select Author</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-6">
                                <div>
                                    <div class="row">
                                        <div class="col">
                                            <label class="form-label">Categories</label>
                                        </div>
                                        <div class="col text-end">
                                            <a href="{{ route('blog.categories.list') }}" target="_blank" class="badge text-bg-primary">+ Category</a>
                                        </div>
                                    </div>
                                    <select name="category_id" class="form-control" data-choices name="category_id"
                                            data-choices-search-false id="blog_category_id_update" required>
                                        <option value="" disabled>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Title</label>
                                    <input name="title" id="blog_title_update" type="text" class="form-control" value=""
                                           required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control" name="content" id="blog_content_update" rows="10"
                                              required></textarea>
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
            const Img0Imput = document.getElementById("featured_image_create");
            const Img0 = document.getElementById("blog_featured_image_create");

            Img0Imput.addEventListener("change", () => {
                const selectedImage = Img0Imput.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (Img0.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (Img0.src = "");

            });
        </script>
        <script>
            const Img0ImputUpdate = document.getElementById("featured_image_update");
            const Img0Update = document.getElementById("blog_featured_image_update");

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

            function deleteModal(blog_id, blog_title) {
                var modal = new bootstrap.Modal(document.getElementById('deleteModalgrid'));
                document.getElementById('blog_id_delete').value = blog_id;
                document.getElementById('blog_title_delete').value = blog_title;
                modal.show();
            }

            function updateModal(blog_id, blog_featured_image, blog_author_id, blog_category_id, blog_title, blog_content) {
                var modal = new bootstrap.Modal(document.getElementById('updateModalgrid'));
                document.getElementById('blog_id_update').value = blog_id;
                var imgElement = document.getElementById('blog_featured_image_update');
                imgElement.src = "{{ asset('images/blog') }}/" + blog_featured_image;
                document.getElementById('blog_featured_image_update').value = blog_featured_image;
                document.getElementById('blog_author_id_update').value = blog_author_id;
                document.getElementById('blog_category_id_update').value = blog_category_id;
                document.getElementById('blog_title_update').value = blog_title;
                document.getElementById('blog_content_update').value = blog_content;
                modal.show();
            }
        </script>
    </x-slot:js>
</x-backend.layout>
