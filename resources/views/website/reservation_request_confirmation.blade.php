<x-website.layout>
    <x-slot:title>
        <title>{{ $title }} | {{ $company_details->name }}</title>
    </x-slot:title>
    <main>
        <x-frontend.sections.breadcrumb :title="$title" />
        <x-frontend.sections.reservation_request_confirmation :data="$reservation_details"/>
    </main>
</x-website.layout>
