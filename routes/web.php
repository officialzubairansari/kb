<?php

use App\Http\Controllers\Website\MainController;

use App\Http\Controllers\Backend\ReservationController as BackendReservationController;
use App\Http\Controllers\Backend\PageController as BackendPageController;
use App\Http\Controllers\Backend\SectionController as BackendSectionController;
use App\Http\Controllers\Backend\WhatsappController as BackendWhatsappController;
use App\Http\Controllers\Backend\CustomerController as BackendCustomerController;
use App\Http\Controllers\Backend\SettingController as BackendSettingController;
use App\Http\Controllers\Backend\CompanyController as BackendCompanyController;
use App\Http\Controllers\Backend\VehicleController as BackendVehicleController;
use App\Http\Controllers\Backend\AuthorController as BackendAuthorController;
use App\Http\Controllers\Backend\BlogCategoryController as BackendBlogCategoryController;
use App\Http\Controllers\Backend\MessageController as BackendMessageController;
use App\Http\Controllers\Backend\BlogController as BackendBlogController;
use App\Http\Controllers\Backend\VehicleCategoryController as BackendVehicleCategoryController;
use App\Http\Controllers\Backend\DriverController as BackendDriverControllerController;
use App\Http\Controllers\Backend\RouteController as BackendRouteController;
use App\Http\Controllers\Backend\FareController as BackendFareController;
use App\Http\Controllers\Backend\DashboardController as BackendDashboardController;
use App\Http\Controllers\Backend\TestimonialController as BackendTestimonialController;
use App\Http\Controllers\Backend\FaqController as BackendFaqController;
use App\Http\Controllers\Backend\HighlightController as BackendHighlightController;
use App\Http\Controllers\Backend\IconController as BackendIconController;
use App\Http\Controllers\Backend\SliderController as BackendSliderController;
use App\Http\Controllers\Backend\UserController as BackendUserController;
use App\Http\Controllers\Backend\EmailController as BackendEmailController;
use App\Http\Controllers\Auth\PasswordController as PasswordController;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('Website')->group(function () {
    //pages
    Route::get('/', [MainController::class, 'home'])->name('main.home');
    Route::get('contact-us', [MainController::class, 'contactUs'])->name('main.contact.us');
    Route::get('about-us', [MainController::class, 'aboutUs'])->name('main.about.us');
    Route::get('faqs', [MainController::class, 'faqs'])->name('main.faqs');
    Route::get('blogs', [MainController::class, 'blogs'])->name('main.blogs');
    Route::get('fare-list', [MainController::class, 'fareList'])->name('main.fare.list');


    //view email template
    Route::get('mail-sample', [MainController::class, 'mailSample'])->name('mail.sample');

    //others
    Route::get('blog/{blog}', [MainController::class, 'blog'])->name('blog.index');
    Route::post('get-country-code', [MainController::class, 'getCountryCode'])->name('main.get-country-code');
    Route::post('get-fare', [MainController::class, 'getFare'])->name('main.get-fare');

    //send message
    Route::post('create-messages', [BackendMessageController::class, 'create'])->name('messages.create');

});

Route::middleware('auth')->group(function () {
    Route::namespace('Backend')->group(function () {
        Route::get('dashboard', [BackendDashboardController::class, 'index'])->name('dashboard.index');

        //reservations
        Route::post('create-reservations', [BackendReservationController::class, 'create'])->name('reservations.create');
        Route::get('pending-reservations', [BackendReservationController::class, 'pending'])->name('reservations.pending');
        Route::get('confirmed-reservations', [BackendReservationController::class, 'confirmed'])->name('reservations.confirmed');
        Route::get('completed-reservations', [BackendReservationController::class, 'completed'])->name('reservations.completed');
        Route::get('cancelled-reservations', [BackendReservationController::class, 'cancelled'])->name('reservations.cancelled');
//        Route::get('invoice/{reservation}', [BackendReservationController::class, 'downloadInvoice'])->name('reservations.invoice');
        Route::get('download-invoice/{reservation}', [BackendReservationController::class, 'downloadInvoice'])->name('download.reservations.invoice');
        Route::post('mark-confirmed', [BackendReservationController::class, 'markConfirmed'])->name('mark.confirmed');
        Route::post('mark-cancelled', [BackendReservationController::class, 'markCancelled'])->name('mark.cancelled');
        Route::post('mark-completed', [BackendReservationController::class, 'markCompleted'])->name('mark.completed');
        Route::post('mark-reversed', [BackendReservationController::class, 'markReversed'])->name('mark.reversed');
        Route::post('accept-reservation-request', [BackendReservationController::class, 'acceptReservationRequest'])->name('accept.reservation.request');
        Route::post('delete-reservation-request', [BackendReservationController::class, 'deleteReservationRequest'])->name('delete.reservation.request');

        //customers
        Route::get('customers', [BackendCustomerController::class, 'list'])->name('customers.list');
        Route::post('delete-customers', [BackendCustomerController::class, 'delete'])->name('customers.delete');
        Route::post('update-customers', [BackendCustomerController::class, 'update'])->name('customers.update');

        //drivers
        Route::get('drivers', [BackendDriverControllerController::class, 'list'])->name('drivers.list');
        Route::post('create-drivers', [BackendDriverControllerController::class, 'create'])->name('drivers.create');
        Route::post('delete-drivers', [BackendDriverControllerController::class, 'delete'])->name('drivers.delete');
        Route::post('update-drivers', [BackendDriverControllerController::class, 'update'])->name('drivers.update');

        //vehicles
        Route::get('vehicles', [BackendVehicleController::class, 'list'])->name('vehicles.list');
        Route::post('create-vehicles', [BackendVehicleController::class, 'create'])->name('vehicles.create');
        Route::post('delete-vehicles', [BackendVehicleController::class, 'delete'])->name('vehicles.delete');
        Route::post('update-vehicles', [BackendVehicleController::class, 'update'])->name('vehicles.update');

        //vehicle_categories
        Route::get('vehicle-categories', [BackendVehicleCategoryController::class, 'list'])->name('vehicle.categories.list');
        Route::post('create-vehicle-categories', [BackendVehicleCategoryController::class, 'create'])->name('vehicle.categories.create');
        Route::post('delete-vehicle-categories', [BackendVehicleCategoryController::class, 'delete'])->name('vehicle.categories.delete');
        Route::post('update-vehicle-categories', [BackendVehicleCategoryController::class, 'update'])->name('vehicle.categories.update');

        //routes
        Route::get('routes', [BackendRouteController::class, 'list'])->name('routes.list');
        Route::post('create-routes', [BackendRouteController::class, 'create'])->name('routes.create');
        Route::post('delete-routes', [BackendRouteController::class, 'delete'])->name('routes.delete');
        Route::post('update-routes', [BackendRouteController::class, 'update'])->name('routes.update');

        //authors
        Route::get('authors', [BackendAuthorController::class, 'list'])->name('authors.list');
        Route::post('create-authors', [BackendAuthorController::class, 'create'])->name('authors.create');
        Route::post('delete-authors', [BackendAuthorController::class, 'delete'])->name('authors.delete');
        Route::post('update-authors', [BackendAuthorController::class, 'update'])->name('authors.update');

        //email
        Route::get('quotation-email', [BackendEmailController::class, 'quotationEmail'])->name('quotation.email');
        Route::post('send-email', [BackendEmailController::class, 'sendMail'])->name('send.email');


        //blogs
        Route::get('list-blogs', [BackendBlogController::class, 'list'])->name('blogs.list');
        Route::post('create-blogs', [BackendBlogController::class, 'create'])->name('blogs.create');
        Route::post('delete-blogs', [BackendBlogController::class, 'delete'])->name('blogs.delete');
        Route::post('update-blogs', [BackendBlogController::class, 'update'])->name('blogs.update');


        //blog categories
        Route::get('blog-categories', [BackendBlogCategoryController::class, 'list'])->name('blog.categories.list');
        Route::post('create-blog-categories', [BackendBlogCategoryController::class, 'create'])->name('blog.categories.create');
        Route::post('delete-blog-categories', [BackendBlogCategoryController::class, 'delete'])->name('blog.categories.delete');
        Route::post('update-blog-categories', [BackendBlogCategoryController::class, 'update'])->name('blog.categories.update');

        //messages
        Route::get('messages', [BackendMessageController::class, 'list'])->name('messages.list');
        Route::post('delete-messages', [BackendMessageController::class, 'delete'])->name('messages.delete');

        //general settings
        Route::get('general-settings', [BackendSettingController::class, 'listGeneralSettings'])->name('general.settings.list');
        Route::post('update-general-settings', [BackendSettingController::class, 'updateGeneralSettings'])->name('general.settings.update');

        //frontend settings
        Route::get('frontend-settings', [BackendSettingController::class, 'listFrontEndSettings'])->name('frontend.settings.list');
        Route::post('update-frontend-settings', [BackendSettingController::class, 'updateFrontEndSettings'])->name('frontend.settings.update');


        //site colors
        Route::get('site-colors', [BackendSettingController::class, 'listSiteColors'])->name('site.colors.list');
        Route::post('update-site-colors', [BackendSettingController::class, 'updateSiteColors'])->name('site.colors.update');


        //whatsapp template
        Route::get('whatsapp-templates', [BackendSettingController::class, 'listWhatsAppTemplates'])->name('whatsapp.templates.list');
        Route::post('update-whatsapp-templates', [BackendSettingController::class, 'updateWhatsAppTemplates'])->name('whatsapp.templates.update');

        //email template
        Route::get('email-templates', [BackendSettingController::class, 'listEmailTemplates'])->name('email.templates.list');
        Route::post('update-email-templates', [BackendSettingController::class, 'updateEmailTemplates'])->name('email.templates.update');


        //companies
        Route::get('companies', [BackendCompanyController::class, 'list'])->name('companies.list');
        Route::post('update-companies', [BackendCompanyController::class, 'update'])->name('companies.update');

        //pages
        Route::get('pages', [BackendPageController::class, 'list'])->name('pages.list');

        //page_sections
        Route::get('edit-page-sections/{page}', [BackendPageController::class, 'editPageSections'])->name('page.sections.edit');
        Route::post('update-page-sections', [BackendPageController::class, 'updatePageSections'])->name('page.sections.update');

        //section
        Route::get('sections', [BackendSectionController::class, 'list'])->name('sections.list');
        Route::post('update-sections', [BackendSectionController::class, 'update'])->name('sections.update');

        //testimonials
        Route::get('testimonials', [BackendTestimonialController::class, 'list'])->name('testimonials.list');
        Route::post('create-testimonials', [BackendTestimonialController::class, 'create'])->name('testimonials.create');
        Route::post('delete-testimonials', [BackendTestimonialController::class, 'delete'])->name('testimonials.delete');
        Route::post('update-testimonials', [BackendTestimonialController::class, 'update'])->name('testimonials.update');

        //list faqs
        Route::get('list-faqs', [BackendFaqController::class, 'list'])->name('faqs.list');
        Route::post('create-faqs', [BackendFaqController::class, 'create'])->name('faqs.create');
        Route::post('delete-faqs', [BackendFaqController::class, 'delete'])->name('faqs.delete');
        Route::post('update-faqs', [BackendFaqController::class, 'update'])->name('faqs.update');

        //list user
        Route::get('list-users', [BackendUserController::class, 'list'])->name('users.list');
        Route::post('create-users', [BackendUserController::class, 'create'])->name('users.create');
        Route::post('delete-users', [BackendUserController::class, 'delete'])->name('users.delete');
        Route::post('update-users', [BackendUserController::class, 'update'])->name('users.update');

        //list highlights
        Route::get('list-highlights', [BackendHighlightController::class, 'list'])->name('highlights.list');
        Route::post('create-highlights', [BackendHighlightController::class, 'create'])->name('highlights.create');
        Route::post('delete-highlights', [BackendHighlightController::class, 'delete'])->name('highlights.delete');
        Route::post('update-highlights', [BackendHighlightController::class, 'update'])->name('highlights.update');

        //list sliders
        Route::get('list-sliders', [BackendSliderController::class, 'list'])->name('sliders.list');
        Route::post('create-sliders', [BackendSliderController::class, 'create'])->name('sliders.create');
        Route::post('delete-sliders', [BackendSliderController::class, 'delete'])->name('sliders.delete');
        Route::post('update-sliders', [BackendSliderController::class, 'update'])->name('sliders.update');


        //fares
        Route::get('fares', [BackendFareController::class, 'list'])->name('fares.list');
        Route::post('create-fares', [BackendFareController::class, 'create'])->name('fares.create');
        Route::post('delete-fares', [BackendFareController::class, 'delete'])->name('fares.delete');
        Route::post('update-fares', [BackendFareController::class, 'update'])->name('fares.update');

        //icons list
        Route::get('icons', [BackendIconController::class, 'list'])->name('icons.list');

        //whatsapp
        Route::get('whatsapp/{reservation}', [BackendWhatsappController::class, 'sendWhatsapp'])->name('send.whatsapp');

        //check user name unique
        Route::post('check-username', [BackendUserController::class, 'checkUserName'])->name('check.username');

        //change password
        Route::post('change-password', [PasswordController::class, 'changePassword'])->name('change.password');

        Route::get('clear', function (Request $request) {
            // Clear views, routes, and cache
            Artisan::call('view:clear');
            Artisan::call('route:clear');
            Artisan::call('cache:clear');

            // Redirect to the dashboard with a success message
            return redirect()->route('dashboard.index')->with('success', 'Views, routes, and cache cleared!');
        });

    });
});

// cron job command to run queue
Route::get('/send-emails', function (Request $request) {
    if ($request->input('token') !== 'nyf0SUfR6YZsSUN24V') {
        abort(403, 'Unauthorized');
    }

    Artisan::call('queue:work', ['--stop-when-empty' => true]);
    return 'Queue worker started';
});


require __DIR__.'/auth.php';
