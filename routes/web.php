<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CruiseController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//WEBSITE FRONTEND
Route::get('/', [WebsiteController::class, 'index']);
Route::get('/packages/{slug}', [WebsiteController::class, 'packages']);
Route::post('/search', [WebsiteController::class, 'search']);
Route::post('/form-submit', [WebsiteController::class, 'planTripAction']);
Route::get('/tour/{destination}/{slug}', [WebsiteController::class, 'tour']);
Route::get('/category/{slug}', [WebsiteController::class, 'category']);
Route::get('/wildlife-tour-packages/{id}', [WebsiteController::class, 'types']);
Route::get('/hill-station-tour-packages/{id}', [WebsiteController::class, 'types']);
Route::get('/pilgrimage-tour-packages/{id}', [WebsiteController::class, 'types']);
Route::get('/heritage-tour-packages/{id}', [WebsiteController::class, 'types']);
Route::get('/beach-tour-packages/{id}', [WebsiteController::class, 'types']);
Route::get('/honeymoon-tour-packages/{id}', [WebsiteController::class, 'types']);
Route::get('/adventure-tour-packages/{id}', [WebsiteController::class, 'types']);
Route::get('/trekking-tour-packages/{id}', [WebsiteController::class, 'types']);
Route::get('/blogs', [WebsiteController::class, 'blogs']);
Route::get('/blog/{slug}', [WebsiteController::class, 'blog']);
Route::post('login', [AuthController::class, 'login'])->name("login");

// Route::get('/register', [AuthController::class, 'registerPost']);
Route::get('plan-your-trip', function () {
    return view('web/planTrip');
});
Route::get('login', function () {
    return view('admin/login');
});

Route::get('migrate', function () {
    Artisan::call('migrate');
});




Route::group(['middleware' => ['customAuth'], 'prefix' => 'admin'], function () {


    Route::get('/delete-enquiry/{id}', [EnquiryController::class, 'deleleById'])->name('delete-enquiry');
    Route::post('image-upload', [TourController::class, 'storeImage'])->name('image.upload');
    Route::post('/create-category', [TourController::class, 'post_create'])->name('create-category');
    Route::get('/category-add', function () {
        return view('admin/category/add');
    });
    Route::get('/category', [TourController::class, 'get_read_all'])->name('view-category');
    Route::post('/updateCategory/{id}', [TourController::class, 'patchUpdateWeb'])->name('update-category');
    Route::get('/category-edit/{id}', [TourController::class, 'get_edit_category'])->name('edit-category');
    Route::get('/delete-category/{id}', [TourController::class, 'delete_category'])->name('delete-category');

    Route::get('/subcategory-add', [TourController::class, 'get_view_add_subcategory']);
    Route::post('/create-subcategory', [TourController::class, 'post_create_subcategory'])->name('create-subcategory');
    Route::get('/subcategory', [TourController::class, 'get_subcategory_all']);
    Route::get('/subcategory-edit/{id}', [TourController::class, 'get_edit_subcategory'])->name('edit-subcategory');
    Route::post('/updateSubCategory/{id}', [TourController::class, 'patch_update_web_subcategory'])->name('update-subcategory');
    Route::get('/delete-subcategory/{id}', [TourController::class, 'delete_subcategory'])->name('delete-subcategory');
    Route::get('/getTourSubcategory/{id}', [TourController::class, 'getTourSubCategoryById']);

    //hotels
    Route::get('/hotels-add', function () {
        return view('admin/hotels/add');
    });
    Route::post('/create-hotel', [HotelController::class, 'post_create'])->name('create-hotel');
    Route::get('/hotels', [HotelController::class, 'get_read_all'])->name('view-hotels');
    Route::get('/hotel-edit/{id}', [HotelController::class, 'get_edit_hotel'])->name('edit-hotel');
    Route::patch('/update-hotel/{id}', [HotelController::class, 'patch_update_web_hotel'])->name('update-hotel');
    Route::get('/delete-hotel/{id}', [HotelController::class, 'delete_hotel'])->name('delete-hotel');

    // Route::get('/hotels-edit', function () {
    //     return view('admin/hotels/edit');
    // });

    //destination
    Route::get('/destination-add', [DestinationController::class, 'get_view_add_destination']);
    Route::post('/create-destination', [DestinationController::class, 'post_create'])->name('create-destination');
    Route::get('/destination', [DestinationController::class, 'get_read_all'])->name('view-destination');
    Route::get('/destination-edit/{id}', [DestinationController::class, 'get_edit_destination'])->name('edit-destination');
    Route::patch('/update-destination/{id}', [DestinationController::class, 'patch_update_web_destination'])->name('update-destination');
    Route::get('/delete-destination/{id}', [DestinationController::class, 'delete_destination'])->name('delete-destination');

    //cruise

    Route::get('/cruise-add', [CruiseController::class, 'get_view_add_cruise']);
    Route::post('/create-cruise', [CruiseController::class, 'post_create'])->name('create-cruise');
    Route::get('/cruise', [CruiseController::class, 'get_read_all'])->name('view-cruise');
    Route::get('/edit-cruise/{id}', [CruiseController::class, 'get_edit_cruise'])->name('edit-cruise');
    Route::patch('/update-cruise/{id}', [CruiseController::class, 'patch_edit_cruise'])->name('update-cruise');
    Route::get('/delete-cruise/{id}', [CruiseController::class, 'deleleById'])->name('delete-cruise');



    Route::get('/tours-add', [TourController::class, 'get_view_tour']);
    Route::post('/create-tour', [TourController::class, 'post_create_tour'])->name('create-tour');
    Route::get('/tours', [TourController::class, 'get_read_all_tours'])->name('view-tour');

    Route::get('/tours-edit/{id}', [TourController::class, 'get_edit_tour'])->name('view-tour-edit');
    Route::post('/tours-update/{id}', [TourController::class, 'patch_edit_tour'])->name('update-tour');
    Route::get('/tours-delete/{id}', [TourController::class, 'deleleTourById'])->name('delete-tour');


    Route::get('/homepage-banner', [HomePageController::class, 'get_read_all_homepage_banner'])->name('view-homepagebanners');
    Route::post('/create-homepagebanner', [HomePageController::class, 'post_create_homepage_banner'])->name('create-homepagebanner');
    Route::get('/homepageBanner-add', function () {
        return view('admin/homeBanner/add');
    });
    Route::get('/delete-homepageBanner/{id}', [HomePageController::class, 'delete_homepage_banner'])->name('delete-homepageBanner');
    Route::get('/edit-homepageBanner/{id}', [HomePageController::class, 'get_edit_homepage_banner'])->name('edit-homepageBanner');
    Route::patch('/update-homepageBanner/{id}', [HomePageController::class, 'patch_update_web_homepage_banner'])->name('update-homepageBanner');


    Route::get('/promotional-banner', [HomePageController::class, 'get_read_all_promotional_banner'])->name('view-promotionalbanners');
    Route::post('/create-promotionalbanner', [HomePageController::class, 'post_create_promotional_banner'])->name('create-promotionalbanner');
    Route::get('/promotionalBanner-add', function () {
        return view('admin/promationalBanner/add');
    });
    Route::get('/delete-promotionalbanner/{id}', [HomePageController::class, 'delete_promotional_banner'])->name('delete-promotionalbanner');



    Route::get('/add-homepage-featured-destination', [HomePageController::class, 'get_view_add_featured_destination']);
    Route::post('/create-homepage-featured-destination', [HomePageController::class, 'post_create_featured_destination'])->name('create-featuredestination');
    Route::get('/homepage-featured-destination', [HomePageController::class, 'get_read_all_featured_destination']);
    Route::get('/edit-homepage-featured-destination/{id}', [HomePageController::class, 'get_edit_featured_destination']);
    Route::patch('/update-featuredBanner/{id}', [HomePageController::class, 'patch_update_featuredBanner'])->name('update-featuredBanner');
    Route::get('/delete-featureddestination/{id}', [HomePageController::class, 'delete_featured_destination'])->name('delete-featureddestination');


    Route::get('/best-international-destination', [HomePageController::class, 'get_read_all_international_destination']);
    Route::get('/add-best-international-destination', [HomePageController::class, 'get_view_add_international_destination']);
    Route::post('/create-best-international-destination', [HomePageController::class, 'post_create_international_destination'])
        ->name('create-internationaldestination');

    Route::get('/best-indian-destination', [HomePageController::class, 'get_read_all_indian_destination']);
    Route::get('/add-best-indian-destination', [HomePageController::class, 'get_view_add_indian_destination']);
    Route::post('/create-best-indian-destination', [HomePageController::class, 'post_create_indian_destination'])
        ->name('create-indiandestination');


    Route::get('/best-shortbrake-destination', [HomePageController::class, 'get_read_all_shortbrake_destination']);
    Route::get('/add-best-shortbrake-destination', [HomePageController::class, 'get_view_add_shortbrake_destination']);
    Route::post('/create-best-shortbrake-destination', [HomePageController::class, 'post_create_shortbrake_destination'])
        ->name('create-shortbrakedestination');


    Route::get('/our-client', [HomePageController::class, 'get_read_our_client']);
    Route::get('/add-our-client', [HomePageController::class, 'get_view_add_our_client']);
    Route::post('/create-our-client', [HomePageController::class, 'post_create_our_client'])
        ->name('create-ourclient');
    Route::get('/delete-client/{id}', [HomePageController::class, 'delete_our_client'])->name('delete-client');


    Route::get('/our-accreditations', [HomePageController::class, 'get_read_our_accreditations']);
    Route::get('/add-our-accreditations', [HomePageController::class, 'get_view_add_our_accreditations']);
    Route::post('/create-our-accreditations', [HomePageController::class, 'post_create_our_accreditations'])
        ->name('create-ouraccreditations');
    Route::get('/delete-accreditations/{id}', [HomePageController::class, 'delete_our_accreditations'])->name('delete-accreditations');


    Route::get('/blogs', [BlogController::class, 'get_read_all_blog']);
    Route::post('/create-blog', [BlogController::class, 'post_create_blog'])->name('create-blog');
    Route::get('/blog-edit/{id}', [BlogController::class, 'get_edit_blog'])->name('edit-blog');
    Route::patch('/update-blog/{id}', [BlogController::class, 'patch_update_blog'])->name('update-blog');

    Route::get('/delete-blog/{id}', [BlogController::class, 'delete_blog'])->name('delete-blog');


    Route::get('/jobs', [JobController::class, 'get_read_all']);
    Route::post('/create-job', [JobController::class, 'post_create'])->name('create-job');
    Route::get('/job-edit/{id}', [JobController::class, 'get_edit_job'])->name('edit-job');
    Route::patch('/update-job/{id}', [JobController::class, 'patch_update_web'])->name('update-job');

    Route::get('/delete-job/{id}', [JobController::class, 'delete_job'])->name('delete-job');
    Route::get('/job-add', [JobController::class, 'get_add_job']);

    Route::get('/ads', [AdsController::class, 'get_ads']);
    Route::post('/create-ads/{id}', [AdsController::class, 'post_create_ads'])->name('post_create_ads');
    Route::patch('/update-ads/{id}', [AdsController::class, 'patch_update_ads'])->name('update-ads');



    Route::get('/', [EnquiryController::class, 'get_all_enquiry']);
    // Route::post('/login', [AuthController::class, 'login'])->name("login");

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/bookings', function () {
        return view('admin/bookings/new');
    });
    Route::get('/blogs-add', function () {
        return view('admin/blog/add');
    });

    Route::get('/pages-add', function () {
        return view('admin/pages/add');
    });
    Route::get('/pages', function () {
        return view('admin/pages/list');
    });
    Route::get('/pages-edit', function () {
        return view('admin/pages/edit');
    });


    Route::get('/subcategory-edit', function () {
        return view('admin/subcategory/edit');
    });
});

Route::get('/linkScymbo', function () {
    $target = '/home3/treaktravel/public_html/storage/app/public';
    $shortcut = '/home3/treaktravel/public_html/public/storage';
    echo symlink($target, $shortcut);
});
