<!doctype html>

<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="By Arcotic Solutions Private Limited" name="description"/>
    <meta content="Arcotic Solutions" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('css/backend-main.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- custom Css-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        @media print {
            @page {
                size: A4;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 10px;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
        }
    </style>

</head>

<body class="bg-white">

<div class="row">
    <div class="col-12">
        <div class="col-12 p-4">
            <div class="mt-5">
                <img src="{{ asset('logo/'.$company_details->logo_dark) }}"
                     class="card-logo card-logo-dark" alt="logo dark" height="70">
            </div>
        </div>
        <div class="col-12">
            <div class="card-body p-4 border-bottom border-bottom-dashed">
                <div class="row g-3">
                    <div class="col-3 col-3">
                        <p class="text-muted mb-2 text-uppercase fw-semibold">Invoice No</p>
                        <h5 class="fs-14 mb-0">#<span id="invoice-no">{{ $reservation->id }}</span>
                        </h5>
                    </div>
                    <!--end col-->
                    <div class="col-3 col-3">
                        <p class="text-muted mb-2 text-uppercase fw-semibold">Reservation Date</p>
                        <h5 class="fs-14 mb-0"><span
                                    id="invoice-date">{{ $reservation->created_at }}</span></h5>
                    </div>
                    <!--end col-->
                    <div class="col-3 col-3">
                        <p class="text-muted mb-2 text-uppercase fw-semibold">Reservation Status</p>
                        @if($reservation_type == 'pending')
                            <span class="badge badge-soft-warning text-uppercase">Pending</span>
                        @endif
                        @if($reservation_type == 'confirmed')
                            <span class="badge badge-soft-primary text-uppercase">Confirmed</span>
                        @endif
                        @if($reservation_type == 'completed')
                            <span class="badge badge-soft-success text-uppercase">Completed</span>
                        @endif
                        @if($reservation_type == 'cancelled')
                            <span class="badge badge-soft-danger text-uppercase">Cancelled</span>
                        @endif
                    </div>
                    <!--end col-->
                    <div class="col-3 col-3">
                        <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                        <h5 class="fs-14 mb-0"><span
                                    id="total-amount">{{ $reservation->reservationRoute->fare }}</span> {{ $company_details->currency }}
                        </h5>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <div class="col-12">
            <div class="card-body p-4 border-bottom border-bottom-dashed">
                <div class="row g-3">
                    <div class="col-3 col-3">
                        <p class="text-muted mb-2 text-uppercase fw-semibold">Customer Details</p>
                        <h5 class="fs-14 mb-0"><span
                                    id="invoice-no">{{ $reservation->customer->full_name }}</span>
                        </h5>
                    </div>
                    <!--end col-->
                    <div class="col-3 col-3">
                        <p class="text-muted mb-2 text-uppercase fw-semibold">Country</p>
                        <h5 class="fs-14 mb-0"><span
                                    id="invoice-date">{{ $reservation->customer->country->name }}</span>
                        </h5>
                    </div>
                    <!--end col-->
                    <div class="col-3 col-3">
                        <p class="text-muted mb-2 text-uppercase fw-semibold">Email</p>
                        <h5 class="fs-14 mb-0"><span
                                    id="invoice-date">{{ $reservation->customer->email }}</span>
                        </h5>
                    </div>
                    <div class="col-3 col-3">
                        <p class="text-muted mb-2 text-uppercase fw-semibold">Contact</p>
                        <h5 class="fs-14 mb-0"><span
                                    id="total-amount">{{ $reservation->customer->country->phonecode }}{{ $reservation->customer->contact }}</span>
                        </h5>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <div class="col-12 mt-4">
            <div class="card-body p-4">
                <h2 class="text-center">Reservation Details</h2>
                <!--end row-->
            </div>
            <!--end card-body-->
        </div>
        <div class="col-12">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-borderless table-nowrap align-middle mb-0">
                        <thead class="table-danger">
                        <tr>
                            <th>Route</th>
                            <th>Vehicle</th>
                            <th>Pick Location</th>
                            <th>Pick Date/Time</th>
                            <th>Driver</th>
                        </tr>
                        </thead>
                        <tbody id="products-list">
                        <tr>
                            <td>{{ $reservation->reservationRoute->routeVehicle->routeDetails->route ?? 'N/A'}}
                            </td>
                            <td>{{ $reservation->reservationRoute->routeVehicle->vehicleDetails->title }}</td>
                            <td>
                                <i class="ri-map-pin-2-fill align-middle text-black small"></i> {{ $reservation->reservationRoute->pick_location }}
                            </td>
                            <td>{{ $reservation->reservationRoute->pick_date_time }}</td>
                            <td>{{ $reservation->driver->full_name ?? "N/A" }}
                                ({{ $reservation->driver->contact ?? "N/A" }})
                            </td>

                        </tr>
                        </tbody>
                    </table><!--end table-->
                </div>
                <div class="mt-5">
                    <div class="alert alert-info">
                        <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                            <span id="note">All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or
                                                                            credit card or direct payment online. If account is not paid within 7
                                                                            days the credits details supplied as confirmation of work undertaken
                                                                            will be charged the agreed quoted fee noted above.
                                                                        </span>
                        </p>
                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <div class="col-12">
            <div class="row text-center">
                <div class="col">
                    <div>
                        <i class="ri-global-fill"></i>
                        <span class="fs-14 mb-0">{{ $company_details->website }}</span>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <i class="ri-mail-fill"></i>
                        <span class="fs-14 mb-0">{{ $company_details->email }}</span>
                    </div>
                </div>
                <div class="col">
                    <div>
                        <i class="ri-whatsapp-fill"></i>
                        <i class="ri-phone-fill"></i>
                        <span class="fs-14 mb-0">{{ $company_details->contact }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    function handlePrintDialog() {
        window.print();
        setTimeout(function () {
            if (!document.hidden) {
                window.close();
            }
        }, 500);
    }
    window.addEventListener('load', function () {
        handlePrintDialog();
    });
</script>
</html>
