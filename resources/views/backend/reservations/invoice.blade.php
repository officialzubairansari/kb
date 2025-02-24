
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Invoice</title>
</head>
<style>
    *,
    ::before,
    ::after {
        box-sizing: border-box;
        border-width: 0;
        border-style: solid;
        border-color: #e5e7eb;
    }
    ::before,
    ::after {
        --tw-content: '';
    }
    html {
        line-height: 1.5;
        -webkit-text-size-adjust: 100%;
        -moz-tab-size: 4;
        tab-size: 4;
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-feature-settings: normal;
        font-variation-settings: normal;
    }
    body {
        margin: 0;
        line-height: inherit;
    }
    hr {
        height: 0;
        color: inherit;
        border-top-width: 1px;
    }
    abbr:where([title]) {
        -webkit-text-decoration: underline dotted;
        text-decoration: underline dotted;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-size: inherit;
        font-weight: inherit;
    }
    a {
        color: inherit;
        text-decoration: inherit;
    }
    b,
    strong {
        font-weight: bolder;
    }
    code,
    kbd,
    samp,
    pre {
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        font-size: 1em;
    }
    small {
        font-size: 80%;
    }
    sub,
    sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline;
    }

    sub {
        bottom: -0.25em;
    }

    sup {
        top: -0.5em;
    }
    table {
        text-indent: 0;
        border-color: inherit;
        border-collapse: collapse;
    }
    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: inherit;
        font-feature-settings: inherit;
        font-variation-settings: inherit;
        font-size: 100%;
        font-weight: inherit;
        line-height: inherit;
        color: inherit;
        margin: 0;
        padding: 0;
    }
    button,
    select {
        text-transform: none;
    }
    button,
    [type='button'],
    [type='reset'],
    [type='submit'] {
        -webkit-appearance: button;
        background-color: transparent;
        background-image: none;
    }
    :-moz-focusring {
        outline: auto;
    }
    :-moz-ui-invalid {
        box-shadow: none;
    }
    progress {
        vertical-align: baseline;
    }
    ::-webkit-inner-spin-button,
    ::-webkit-outer-spin-button {
        height: auto;
    }
    [type='search'] {
        -webkit-appearance: textfield;
        outline-offset: -2px;
    }
    ::-webkit-search-decoration {
        -webkit-appearance: none;
    }
    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        font: inherit;
    }
    summary {
        display: list-item;
    }
    blockquote,
    dl,
    dd,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    hr,
    figure,
    p,
    pre {
        margin: 0;
    }

    fieldset {
        margin: 0;
        padding: 0;
    }

    legend {
        padding: 0;
    }

    ol,
    ul,
    menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    dialog {
        padding: 0;
    }
    textarea {
        resize: vertical;
    }
    input::placeholder,
    textarea::placeholder {
        opacity: 1;
        color: #9ca3af;
    }
    button,
    [role="button"] {
        cursor: pointer;
    }
    :disabled {
        cursor: default;
    }
    img,
    svg,
    video,
    canvas,
    audio,
    iframe,
    embed,
    object {
        display: block;
        vertical-align: middle;
    }
    img,
    video {
        max-width: 100%;
        height: auto;
    }
    [hidden] {
        display: none;
    }
    *, ::before, ::after{
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x:  ;
        --tw-pan-y:  ;
        --tw-pinch-zoom:  ;
        --tw-scroll-snap-strictness: proximity;
        --tw-gradient-from-position:  ;
        --tw-gradient-via-position:  ;
        --tw-gradient-to-position:  ;
        --tw-ordinal:  ;
        --tw-slashed-zero:  ;
        --tw-numeric-figure:  ;
        --tw-numeric-spacing:  ;
        --tw-numeric-fraction:  ;
        --tw-ring-inset:  ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
        --tw-blur:  ;
        --tw-brightness:  ;
        --tw-contrast:  ;
        --tw-grayscale:  ;
        --tw-hue-rotate:  ;
        --tw-invert:  ;
        --tw-saturate:  ;
        --tw-sepia:  ;
        --tw-drop-shadow:  ;
        --tw-backdrop-blur:  ;
        --tw-backdrop-brightness:  ;
        --tw-backdrop-contrast:  ;
        --tw-backdrop-grayscale:  ;
        --tw-backdrop-hue-rotate:  ;
        --tw-backdrop-invert:  ;
        --tw-backdrop-opacity:  ;
        --tw-backdrop-saturate:  ;
        --tw-backdrop-sepia:  ;
    }

    ::backdrop{
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x:  ;
        --tw-pan-y:  ;
        --tw-pinch-zoom:  ;
        --tw-scroll-snap-strictness: proximity;
        --tw-gradient-from-position:  ;
        --tw-gradient-via-position:  ;
        --tw-gradient-to-position:  ;
        --tw-ordinal:  ;
        --tw-slashed-zero:  ;
        --tw-numeric-figure:  ;
        --tw-numeric-spacing:  ;
        --tw-numeric-fraction:  ;
        --tw-ring-inset:  ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
        --tw-blur:  ;
        --tw-brightness:  ;
        --tw-contrast:  ;
        --tw-grayscale:  ;
        --tw-hue-rotate:  ;
        --tw-invert:  ;
        --tw-saturate:  ;
        --tw-sepia:  ;
        --tw-drop-shadow:  ;
        --tw-backdrop-blur:  ;
        --tw-backdrop-brightness:  ;
        --tw-backdrop-contrast:  ;
        --tw-backdrop-grayscale:  ;
        --tw-backdrop-hue-rotate:  ;
        --tw-backdrop-invert:  ;
        --tw-backdrop-opacity:  ;
        --tw-backdrop-saturate:  ;
        --tw-backdrop-sepia:  ;
    }

    .fixed{
        position: fixed;
    }

    .bottom-0{
        bottom: 0px;
    }

    .left-0{
        left: 0px;
    }

    .table{
        display: table;
    }

    .h-12{
        height: 3rem;
    }

    .w-1\/2{
        width: 50%;
    }

    .w-full{
        width: 100%;
    }

    .border-collapse{
        border-collapse: collapse;
    }

    .border-spacing-0{
        --tw-border-spacing-x: 0px;
        --tw-border-spacing-y: 0px;
        border-spacing: var(--tw-border-spacing-x) var(--tw-border-spacing-y);
    }

    .whitespace-nowrap{
        white-space: nowrap;
    }

    .border-b{
        border-bottom-width: 1px;
    }

    .border-b-2{
        border-bottom-width: 2px;
    }

    .border-r{
        border-right-width: 1px;
    }

    .border-main{
        border-color: #5c6ac4;
    }

    .bg-main{
        background-color: #5c6ac4;
    }

    .bg-primary{
        background-color: #1e3560;
    }

    .text-primary{
        color: #1e3560;
    }


    .p-3{
        padding: 0.75rem;
    }

    .px-14{
        padding-left: 3.5rem;
        padding-right: 3.5rem;
    }

    .px-2{
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .py-10{
        padding-top: 2.5rem;
        padding-bottom: 2.5rem;
    }

    .py-3{
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
    }

    .py-4{
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .py-6{
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    .pb-3{
        padding-bottom: 0.75rem;
    }

    .pl-2{
        padding-left: 0.5rem;
    }

    .pl-3{
        padding-left: 0.75rem;
    }

    .pl-4{
        padding-left: 1rem;
    }

    .pr-3{
        padding-right: 0.75rem;
    }

    .pr-4{
        padding-right: 1rem;
    }

    .text-center{
        text-align: center;
    }

    .text-right{
        text-align: right;
    }

    .align-top{
        vertical-align: top;
    }

    .text-sm{
        font-size: 0.875rem;
        line-height: 1.25rem;
    }

    .text-xs{
        font-size: 0.75rem;
        line-height: 1rem;
    }

    .font-bold{
        font-weight: 700;
    }

    .italic{
        font-style: italic;
    }

    .text-main{
        color: #5c6ac4;
    }

    .text-neutral-600{
        color: #ffffff;
    }

    .text-neutral-700{
        color: #404040;
    }

    .text-slate-300{
        color: #cbd5e1;
    }

    .text-slate-400{
        color: #94a3b8;
    }

    .text-white{
        color: #fff;
    }

    .padding-min {
        padding: 0.5rem 0rem 0.5rem 0.5rem;
    }

    .mb-3{
        margin-bottom: 15px
    }

    .icon {
        width: 1em;
        height: 1em;
        margin-top: 5px
    }

    @page {
        margin: 0;
    }

    @media print {
        body {
            -webkit-print-color-adjust: exact;
        }
    }

</style>
<body>
<div>
    <div class="py-4">
        <div class="bg-primary px-14 py-6 text-sm">
            <table class="w-full border-collapse border-spacing-0">
                <tbody>
                <tr>
                    <td class="w-1/2 align-top">
                        <div class="text-sm text-neutral-600">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('logo/'.$company_details->logo_light))) }}" class="h-12" />
                        </div>
                    </td>
                    <td class="w-1/2 align-top text-right">
                        <div class="text-sm text-neutral-600">
                            <p>{{ $company_details->contact }}
                                <img class="icon" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('icons/call-white.png'))) }}"/>
                            </p>
                            <p>{{ $company_details->email }}
                                <img class="icon" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('icons/email-white.png'))) }}"/>
                            </p>
                            <p>{{ $company_details->website }}
                                <img class="icon" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('icons/globe-white.png'))) }}"/>
                            </p>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="px-14 py-6">
            <table class="w-full border-collapse border-spacing-0">
                <tbody>
                <tr>
                    <td class="w-full align-top">
                    </td>

                    <td class="align-top">
                        <div class="text-sm">
                            <table class="border-collapse border-spacing-0">
                                <tbody>
                                <tr>
                                    <td class="border-r pr-4">
                                        <div>
                                            <p class="whitespace-nowrap text-slate-400 text-right">Date & Time</p>
                                            <p class="whitespace-nowrap font-bold text-primary text-right">{{ $reservation->created_at }}</p>
                                        </div>
                                    </td>
                                    <td class="pl-4">
                                        <div>
                                            <p class="whitespace-nowrap text-slate-400 text-right">Invoice #</p>
                                            <p class="whitespace-nowrap font-bold text-primary text-right">{{ $reservation->created_at->format('Y') }} - {{ $reservation->invoice_no }}</p>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="px-14 py-10 text-sm text-neutral-700">
            <p class="text-primary font-bold mb-3">Customer Details:</p>
            <table class="w-full border-collapse border-spacing-0">
                <thead class="text-white">
                <tr class="bg-primary text-white">
                    <td class="padding-min font-bold">Name</td>
                    <td class="padding-min font-bold">Contact</td>
                    <td class="padding-min font-bold">Email</td>
                    <td class="padding-min font-bold">Country</td>
                </tr>
                </thead>
                <tbody>
                <tr class="text-left border-b">
                    <td class="padding-min">{{ $reservation->customer->full_name }}</td>
                    <td class="padding-min">{{ $reservation->customer->country->phonecode }}{{ $reservation->customer->contact }}</td>
                    <td class="padding-min">{{ $reservation->customer->email }}</td>
                    <td class="padding-min">{{ $reservation->customer->country->name }}</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="px-14 py-10 text-sm text-neutral-700">
            <p class="text-primary font-bold mb-3">Reservation Details</p>
            <table class="w-full border-collapse border-spacing-0 mb-3">
                <thead class="text-white">
                <tr class="bg-primary text-white">
                    <td class="padding-min font-bold">Date</td>
                    <td class="padding-min font-bold">Vehicle</td>
                    <td class="padding-min font-bold">Route</td>
                    <td class="padding-min font-bold">Pickup Location (Date & Time)</td>
                    <td class="padding-min font-bold">Fare</td>
                </tr>
                </thead>
                <tbody>
                <tr class="text-left border-b">
                    <td class="padding-min">{{ $reservation->created_at ?? 'N/A' }}</td>
                    <td class="padding-min">{{ $reservation->reservationRoute->routeVehicle->vehicleDetails->title ?? 'N/A' }}</td>
                    <td class="padding-min">{{ $reservation->reservationRoute->routeVehicle->routeDetails->route ?? 'N/A'}}</td>
                    <td class="padding-min">{{ $reservation->reservationRoute->pick_location ?? 'N/A' }} - {{ $reservation->reservationRoute->pick_date_time ?? 'N/A' }}</td>
                    <td class="padding-min">{{ $reservation->reservationRoute->fare ?? 'N/A' }} {{ $company_details->currency }}</td>
                </tr>
                </tbody>
            </table>
            <table class="w-full border-collapse border-spacing-0">
                <tbody>
                <tr>
                    <td class="w-full"></td>
                    <td>
                        <table class="w-full border-collapse border-spacing-0">
                            <tbody>
                            <tr class="bg-primary text-white" style="margin-top: 20px !important;">
                                <td class="p-3">
                                    <div class="whitespace-nowrap font-bold">Total:</div>
                                </td>
                                <td class="p-3 text-right">
                                    <div class="whitespace-nowrap font-bold">{{ $reservation->reservationRoute->fare ?? 'N/A' }} {{ $company_details->currency }}</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="px-14 text-sm text-neutral-700">
            <p class="text-primary font-bold">Additional Details:</p>
            <p class="italic"></p>
        </div>

        <div class="px-14 py-10 text-sm text-neutral-700">
            <p class="text-primary font-bold">Terms & Conditions:</p>
            <p>* Details of the driver will be sent to customer via WhatsApp/email before 24 hours.</p>
            <p>* Driver will reach at pickup location before 20-25 minutes of pickup time.</p>
            <p>* Payment will be accepted just after the completion of ride.</p>
            <p>* In case of emergency contact us to our support team (24/7).</p>
            <p>* Vehicle and passenger’s details will be modified till the 24 hours before the pickup time.</p>
            <p>* This is a computer generated invoice which doesn’t required any stamp.</p>
            </dvi>

            <footer class="fixed bottom-0 left-0 bg-primary w-full text-neutral-600 text-center text-xs py-3">
                {{ $company_details->name }}
                <span class="text-slate-300 px-2">|</span>
                {{ $company_details->email }}
                <span class="text-slate-300 px-2">|</span>
                {{ $company_details->contact }}
            </footer>
        </div>
    </div>
</body>

</html>
