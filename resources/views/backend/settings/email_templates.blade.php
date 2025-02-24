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
                        <form action="{{ route('email.templates.update') }}" method="post">
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
                                <div class="listjs-table" id="customerList">
                                    <div class="card-box table-responsive">
                                        @verbatim
                                            <div class="m-4">
                                                <span>Data Tags (click to copy):
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{customer_name}}</button>
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{customer_contact}}</button>
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{customer_phonecode}}</button>
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{customer_whatsapp}}</button>
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{route}}</button>
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{vehicle}}</button>
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{fare}}</button>
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{pickup_location}}</button>
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{pickup_date_time}}</button>
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{driver_name}}</button>
                                                    <button class="btn btn-sm btn-light shadow-none m-1 data-tag" type="button">{{driver_contact}}</button>
                                                </span>
                                            </div>
                                        @endverbatim
                                        <table class="table table-hover">
                                            <tbody>
                                            @foreach ($settings as $key => $setting)
                                                <tr>
                                                    <td class="w-25">{{ $setting->name }}</td>
                                                    <td>
                                                        <textarea class="form-control" name="{{ $setting->slug }}" rows="10" required>{{ $setting->value }}</textarea>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
            $(function() {
                $('.data-tag').click(function() {
                    var $copyText = $(this).text();
                    navigator.clipboard.writeText($copyText);
                });
            });
        </script>
    </x-slot:js>
</x-backend.layout>
