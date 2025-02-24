<x-backend.layout>
    <x-slot:title>
        <title>{{ $title }} | {{ $company_details->name }}</title>
    </x-slot:title>
    <x-slot:css>
        <!-- Icons Css -->
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" />
    </x-slot:css>
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
                <div class="col-12" id="icons"></div> <!-- end col-->
            </div><!-- end row -->
        </div>
    </div>
    <x-slot:js>
        <script src="{{ asset('backend/js/pages/remix-icons-listing.js') }}"></script>
    </x-slot:js>
</x-backend.layout>

