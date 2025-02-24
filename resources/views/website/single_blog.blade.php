<x-website.layout>
    <x-slot:title>
        <title>{{ $title }} | {{ $company_details->name }}</title>
    </x-slot:title>
    <main>
        <x-frontend.sections.breadcrumb :title="$blog->title"/>
        <x-frontend.sections.single_blog :blog="$blog"/>
    </main>
</x-website.layout>
