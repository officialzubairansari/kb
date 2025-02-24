<x-website.layout>
    <x-slot:title>
        <title>{{ $title }} | {{ $company_details->name }}</title>
    </x-slot:title>
    <main>
        <x-frontend.sections.breadcrumb :title="$title" />
        <x-frontend.sections.reservation_form :countries="$countries" :routes="$routes" :vehicles="$vehicles"/>
    </main>
</x-website.layout>
