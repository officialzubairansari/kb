@if(Session::has('success'))
    <!-- Success Alert -->
    <div class="alert alert-success alert-dismissible alert-label-icon rounded-label shadow fade show" role="alert">
        <i class="ri-notification-2-line label-icon"></i><strong>{{ Session::get('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::has('error'))
    <!-- Danger Alert -->
    <div class="alert alert-danger alert-dismissible alert-label-icon rounded-label shadow fade show" role="alert">
        <i class="ri-error-warning-line label-icon"></i><strong>{{ Session::get('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::has('warning'))
    <!-- Warning Alert -->
    <div class="alert alert-warning alert-dismissible alert-label-icon rounded-label shadow fade show" role="alert">
        <i class="ri-alert-line label-icon"></i><strong>{{ Session::get('warning') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::has('info'))
    <!-- Info Alert -->
    <div class="alert alert-info alert-dismissible alert-label-icon rounded-label shadow fade show" role="alert">
        <i class="ri-airplay-line label-icon"></i><strong>{{ Session::get('info') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
