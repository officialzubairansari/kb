<x-website.layout>
    <x-slot:title>
        <title>{{ $title }} | {{ $company_details->name }}</title>
    </x-slot:title>
    <main>
        <x-frontend.sections.breadcrumb :title="$title" />
        <x-frontend.sections.vehicle :vehicle="$vehicle" :countries="$countries" :routes="$routes"/>
    </main>
</x-website.layout>
