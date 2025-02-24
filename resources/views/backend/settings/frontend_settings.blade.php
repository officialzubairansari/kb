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
                        <form action="{{ route('frontend.settings.update') }}" method="post" enctype="multipart/form-data">
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
                                        @foreach ($settings as $key => $setting)
                                            <div class="col-4">
                                                <div>
                                                    <label for="{{ $setting->slug }}" class="font-bold font-18">{{ $setting->name }}</label>
                                                    @if (in_array($setting->type, ['text', 'number', 'date']))
                                                        <input type="{{ $setting->type }}"
                                                               name="{{ $setting->slug }}"
                                                               value="{{ $setting->value }}"
                                                               class="form-control w-100">
                                                    @elseif($setting->type == 'boolean')
                                                        <select name="{{ $setting->slug }}" class="form-control">
                                                            <option value="1" {{ $setting->value == '1' ? 'selected' : '' }}>
                                                                Yes
                                                            </option>
                                                            <option value="0" {{ $setting->value == '0' ? 'selected' : '' }}>
                                                                No
                                                            </option>
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
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
            $(document).ready(function() {
                $('.image-input').each(function() {
                    const input = $(this);
                    const key = input.attr('id').split('-').pop();
                    const imgPreview = $('#img-' + key);

                    input.on('change', function() {
                        const selectedImage = this.files[0];
                        const reader = new FileReader();

                        reader.onload = function(event) {
                            imgPreview.attr('src', event.target.result);
                        };

                        if (selectedImage) {
                            reader.readAsDataURL(selectedImage);
                        } else {
                            imgPreview.attr('src', '');
                        }
                    });
                });
            });
        </script>

        <script>
            $(function() {
                $('#copy-cron-link').click(function() {
                    var $copyText = $('#cron-link');
                    $copyText.select();
                    navigator.clipboard.writeText($copyText.val());
                });
            });
        </script>
    </x-slot:js>
</x-backend.layout>
