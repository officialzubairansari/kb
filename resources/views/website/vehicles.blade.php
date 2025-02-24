
<x-website.layout>
    <x-slot:title>
        <title>{{ $title }} | {{ $company_details->name }}</title>
    </x-slot:title>
    <main>
        <x-frontend.sections.breadcrumb :title="$title" />
        <x-frontend.sections.vehicles_categorywise :vehicles="$vehicles"/>
    </main>

</x-website.layout>
