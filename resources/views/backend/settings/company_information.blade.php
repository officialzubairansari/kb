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
                        <form action="{{ route('companies.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">{{ $title }}</h4>
                                <div class="flex-shrink-0">
                                    <button type="submit"
                                            class="btn btn-dark btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-checkbox-circle-fill label-icon align-middle fs-16"></i>
                                        Update
                                    </button>
                                </div>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-3">
                                        <div class="col-4">
                                            <div>
                                                <label for="logo_dark" class="font-bold font-18">Logo Dark <spen>(Recommended size: 520x123 px)</spen></label>
                                                <div class="text-center">
                                                    <label for="logo_dark" class="position-relative d-inline-block cursor-pointer">
                                                        <div class="position-absolute top-50 start-50 translate-middle">
                                                            <input class="form-control d-none image-input" name="logo_dark" id="logo_dark" type="file">
                                                        </div>
                                                        <div class="avatar-lg">
                                                            <div class="avatar-title bg-light rounded">
                                                                <img src="{{ asset('logo') }}/{{ $company_information->logo_dark }}" id="lg_dark" class="avatar-lg h-auto img-preview"/>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="logo_light" class="font-bold font-18">Logo Light <spen>(Recommended size: 520x123 px)</spen></label>
                                                <div class="text-center">
                                                    <label for="logo_light" class="position-relative d-inline-block cursor-pointer">
                                                        <div class="position-absolute top-50 start-50 translate-middle">
                                                            <input class="form-control d-none image-input" name="logo_light" id="logo_light" type="file">
                                                        </div>
                                                        <div class="avatar-lg">
                                                            <div class="avatar-title bg-light rounded">
                                                                <img src="{{ asset('logo') }}/{{ $company_information->logo_light }}" id="lg_light" class="avatar-lg h-auto img-preview"/>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="company_name" class="font-bold font-18">Company Name</label>
                                                <input type="text" name="name" value="{{ $company_information->name }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="short_description" class="font-bold font-18">Short Description</label>
                                                <input type="text" name="short_description" value="{{ $company_information->short_description }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="long_description" class="font-bold font-18">Long Description</label>
                                                <input type="text" name="long_description" value="{{ $company_information->long_description }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="website" class="font-bold font-18">Website</label>
                                                <input type="text" name="website" value="{{ $company_information->website }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="email" class="font-bold font-18">Email</label>
                                                <input type="email" name="email" value="{{ $company_information->email }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="contact" class="font-bold font-18">Contact</label>
                                                <input type="text" name="contact" value="{{ $company_information->contact }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="address" class="font-bold font-18">Address</label>
                                                <input type="text" name="address" value="{{ $company_information->address }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="facebook" class="font-bold font-18">Facebook</label>
                                                <input type="text" name="facebook" value="{{ $company_information->facebook }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="twitter" class="font-bold font-18">Twitter</label>
                                                <input type="text" name="twitter" value="{{ $company_information->twitter }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="youtube" class="font-bold font-18">Youtube</label>
                                                <input type="text" name="youtube" value="{{ $company_information->youtube }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="instagram" class="font-bold font-18">Instagram</label>
                                                <input type="text" name="instagram" value="{{ $company_information->instagram }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="currency" class="font-bold font-18">Currency</label>
                                                <input type="text" name="currency" value="{{ $company_information->currency }}" class="form-control w-100">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div>
                                                <label for="google_map" class="font-bold font-18">Google Map (Embedded link)</label>
                                                <input type="text" name="google_map" value="{{ $company_information->google_map }}" class="form-control w-100">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot:js>
        <script>
            const logoDark = document.getElementById("logo_dark");
            const lgDark = document.getElementById("lg_dark");

            logoDark.addEventListener("change", () => {
                const selectedImage = logoDark.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (lgDark.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (lgDark.src = "");

            });
        </script>
        <script>
            const logoLight = document.getElementById("logo_light");
            const lgLight = document.getElementById("lg_light");

            logoLight.addEventListener("change", () => {
                const selectedImage = logoLight.files[0];
                const reader = new FileReader();

                reader.onload = (event) => (lgLight.src = event.target.result);
                selectedImage ? reader.readAsDataURL(selectedImage) : (lgLight.src = "");

            });
        </script>
    </x-slot:js>
</x-backend.layout>
