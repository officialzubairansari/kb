<?php

namespace App\Http\Controllers\Backend;

use App\Models\Author;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Section;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        $title = 'Pages';
        $pages = Page::with('sections')->paginate();
        $sections = Section::all();

        return view('backend/pages/list', compact('title', 'pages', 'sections'));
    }

    public function editPageSections(Page $page)
    {
        $title = 'Edit Page Sections';
        $sections = Section::all();

        return view('backend/pages/edit', compact('title', 'page', 'sections'));
    }

    public function updatePageSections(Request $request)
    {
        $page_id = $request->page_id;
        if ($request->selected_section_ids){
            $selected_section_ids = array_map('intval', explode(',', $request->selected_section_ids));

            try {
                DB::beginTransaction();

                if (!empty($selected_section_ids)){
                    PageSection::where('page_id', $page_id)->delete();

                    foreach ($selected_section_ids as $selected_section_id) {
                        PageSection::create([
                            'page_id' => $page_id,
                            'section_id' => $selected_section_id,
                        ]);
                    }
                }

                DB::commit();

                return redirect()->route('pages.list')->with(
                    'success',
                    'Page sections have been updated.'
                );

            } catch (\Exception $e) {
                DB::rollBack();

                return redirect()->route('pages.list')->with(
                    'warning',
                    'Page sections could not be updated. Please try again.'
                );
            }
        }

        else{
            return redirect()->route('pages.list')->with(
                'warning',
                'No changes were made to page sections.'
            );
        }


    }

}
