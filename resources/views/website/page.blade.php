<x-website.layout>
    <x-slot:title>
        <title>{{ $title }} | {{ $company_details->name }}</title>
    </x-slot:title>
    <main>
        <x-frontend.sections.breadcrumb :title="$title"/>
        @foreach($sections as $section)
            <x-dynamic-component :component="'frontend.sections.' . $section"/>
        @endforeach
    </main>
</x-website.layout>
