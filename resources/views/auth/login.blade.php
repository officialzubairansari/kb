<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>{{ $company_details->name }} | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="By Arcotic Solutions Private Limited" name="description" />
    <meta content="Arcotic Solutions" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('logo') }}/{{ $company_details->logo_dark }}">

    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/backend-main.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet" type="text/css" />


</head>

<body>

<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="#" class="d-inline-block auth-logo">
                                <img src="{{ asset('logo') }}/{{ $company_details->logo_light }}" alt="{{ $company_details->name }}" height="50">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4">
                            <div class="p-2 mt-4">
                                <form action="{{ route('office') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="user_name" class="form-label font-18">Username</label>
                                        <input type="text" class="form-control font-15" id="user_name"
                                               placeholder="username" name="user_name">
                                        @error('user_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label font-18" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5 password-input font-15"
                                                   placeholder="password" id="password-input" name="password">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                               id="auth-remember-check">
                                        <label class="form-check-label font-15" for="auth-remember-check">
                                            Remember</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100 font-18 font-bold" type="submit">
                                            Login
                                        </button>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0">Copyrights &copy;
                            <script>document.write(new Date().getFullYear())</script> <a href="https://arcoticsolutions.com">Arcotic Solutions</a> (version {{ VERSION }})
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>

<!-- particles js -->
<script src="{{ asset('libs/particles.js/particles.js') }}"></script>
<!-- particles app js -->
<script src="{{ asset('js/pages/particles.app.js') }}"></script>
<!-- password-addon init -->
<script src="{{ asset('js/pages/password-addon.init.js') }}"></script>
</body>

</html>
