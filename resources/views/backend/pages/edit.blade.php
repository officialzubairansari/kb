<x-backend.layout>
    <x-slot:title>
        <title>{{ $title }} | {{ $company_details->name }}</title>
    </x-slot:title>
    <x-slot:css>
        <style>
            <!-- multi.js css -->
            <link href="{{ asset('backend/libs/multi.js/multi.min.css') }}" rel="stylesheet" type="text/css" />

                                                                                                              .drag-container {
                                                                                                                  display: flex;
                                                                                                                  justify-content: space-between;
                                                                                                                  margin-top: 20px;
                                                                                                              }
            .header-area {
                width: 100%;
                min-height: 80px;
                border: 2px dashed #ccc;
                padding: 10px;
                background-color: #f9f9f9;
                transition: background-color 0.3s;
            }

            .footer-area {
                width: 100%;
                min-height: 50px;
                border: 2px dashed #ccc;
                padding: 10px;
                background-color: #f9f9f9;
                transition: background-color 0.3s;
            }
            .drag-area {
                width: 100%;
                min-height: 200px;
                border: 2px dashed #ccc;
                padding: 10px;
                transition: background-color 0.3s;
            }

            .drag-area.over {
                background-color: #e0e0e0;
            }

            .draggable {
                padding: 10px;
                margin-bottom: 10px;
                background-color: #ffffff;
                border: 1px solid #ccc;
                cursor: move;
            }
        </style>
    </x-slot:css>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <h5 class="card-title mb-0 flex-grow-1">
                                        <a href="{{ route('dashboard.index') }}">Dashboard</a>
                                    </h5>
                                </li>
                                <li class="breadcrumb-item">
                                </li>
                                <h5 class="card-title mb-0 flex-grow-1">{{ $title }} ({{ $page->name }})</h5>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <x-backend.flash-message></x-backend.flash-message>
                    <div class="card">
                        <form action="{{ route('page.sections.update') }}" method="post"
                              class="drag-area-form">
                            @csrf
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">{{ $title }} ({{ $page->name }})</h4>
                                <div class="flex-shrink-0">
                                    <button type="submit"
                                            class="btn btn-dark btn-label waves-effect waves-light text-nowrap">
                                        <i class="ri-checkbox-circle-fill label-icon align-middle fs-16"></i>
                                        Update
                                    </button>
                                </div>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="row gy-3">
                                        <h4 class="card-title mt-4 flex-grow-1">Available Sections</h4>
                                        <div class="drag-container">
                                            <div class="drag-area" id="all_sections">
                                                @foreach($sections as $section)
                                                    @unless($page->sections->pluck('id')->contains($section->id))
                                                        <div class="draggable" id="item{{ $section->id }}"
                                                             draggable="true">{{ $section->name }}</div>
                                                    @endunless
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="drag-container">

                                            <div class="header-area">
                                                <h4 class="text-center card-title m-5 flex-grow-1">Header Area</h4>
                                            </div>

                                                <input type="hidden" name="page_id" value="{{ $page->id }}">
                                                <input type="hidden" id="selectedSectionsIds" name="selected_section_ids">
                                                <div class="drag-area" id="selected_sections">
                                                    @foreach($page->sections as $section)
                                                        <div class="draggable" id="item{{ $section->id }}"
                                                             draggable="true">{{ $section->name }}</div>
                                                    @endforeach
                                                </div>
                                            <div class="footer-area">
                                                <h4 class="text-center card-title m-5 flex-grow-1">Footer Area</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot:js>
        <script>
            $(document).ready(function () {
                $('.draggable').on('dragstart', function (e) {
                    e.originalEvent.dataTransfer.setData('text/plain', e.target.id);
                });

                $('.drag-area').on('dragover', function (e) {
                    e.preventDefault();
                    $(this).addClass('over');
                }).on('dragleave', function () {
                    $(this).removeClass('over');
                });

                $('#all_sections, #selected_sections').on('drop', function (e) {
                    e.preventDefault();
                    let id = e.originalEvent.dataTransfer.getData('text');
                    $(this).append($('#' + id));
                    updateSelectedSections();
                });

                function updateSelectedSections() {
                    let selectedSectionIds = $('#selected_sections .draggable').map(function () {
                        return this.id.replace('item', '');
                    }).get();
                    $('#selectedSectionsIds').val(selectedSectionIds.join(','));
                }
            });
        </script>
    </x-slot:js>
</x-backend.layout>