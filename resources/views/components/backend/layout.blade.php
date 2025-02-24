<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    {{ $title ?? '' }}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="By Arcotic Solutions Private Limited" name="description" />
    <meta content="Arcotic Solutions" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico') }}">

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    <!-- fullcalendar css -->
    <link href="{{ asset('libs/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/backend-main.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />


    {{ $css ?? '' }}
</head>


<!-- Main Body -->
<body>

<!--Top Bar,Main Content, Sidebar, Footer-->
<div id="layout-wrapper">

    <!-- Topbar -->
    <x-backend.topbar></x-backend.topbar>

    <!-- Sidebar -->
    <x-backend.sidebar></x-backend.sidebar>

    <div class="vertical-overlay"></div>
    <div class="main-content">

        <!-- Page-content -->
        {{ $slot }}

        <!-- Footer -->
        <x-backend.footer></x-backend.footer>
    </div>

</div>

<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('change.password') }}" method="post">
                    @csrf
                    <div class="row g-3 mb-3">
                        <div class="col-12">
                            <div>
                                <label class="form-label">Current Password</label>
                                <input name="current_password" type="password" class="form-control" value="" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div>
                                <label class="form-label">New Password</label>
                                <input name="password" type="password" id="new_password" class="form-control" value="" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-12">
                            <div>
                                <label class="form-label">Confirm New Password</label>
                                <input name="password_confirmation" type="password" id="confirm_new_password" class="form-control" value="" required>
                                <div class="invalid-feedback">New Password and Confirm New Password fields must match. Please try again.</div>
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

<!-- Change Password Modal Scripts -->
<script>
    function changePasswordModal() {
        var modal = new bootstrap.Modal(document.getElementById('changePasswordModal'));
        modal.show();

        $(document).on('input', '#confirm_new_password', function () {
            var newPassword = $('#new_password').val();
            var confirmNewPassword = $(this).val(); // Get the value of the input field
            var inputField = $(this);

            if (newPassword !== confirmNewPassword) {
                inputField.addClass('is-invalid');
            } else {
                inputField.removeClass('is-invalid');
            }
        });
    }
</script>

<!-- JAVASCRIPT -->
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/choices.js/public/backend/scripts/choices.min.js') }}"></script>
<script src="{{ asset('libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>

<!-- jQuery -->
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

<!-- projects js -->
<script src="{{ asset('js/pages/dashboard-projects.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('js/app.js') }}"></script>


<!--select2 cdn-->
<script src="{{ asset('js/select2.min.js') }}"></script>

<script src="{{ asset('js/pages/select2.init.js') }}"></script>

<!--datatable js-->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>

<script src="{{ asset('libs/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/pages/ecommerce-product-details.init.js') }}"></script>
<script src="{{ asset('js/pages/ecommerce-product-checkout.init.js') }}"></script>
<script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>


<!-- calendar min js -->
<script src="{{ asset('libs/fullcalendar/main.min.js') }}"></script>

<!-- Calendar init -->
<script src="{{ asset('js/pages/calendar.init.js') }}"></script>

<!-- form wizard init -->
<script src="{{ asset('js/pages/form-wizard.init.js') }}"></script>



{{ $js ?? '' }}

</body>

</html>
