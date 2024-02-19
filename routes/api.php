<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CruiseController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomePageApiController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::patch('updateCategory/{id}', [TourController::class, 'patch_update']);
Route::patch('updateSubCategory/{id}', [TourController::class, 'patch_update_subcategory']);
Route::patch('tour/{id}', [TourController::class, 'patch_update_tour']);

Route::patch('hotel/{id}', [HotelController::class, 'patch_update_hotel']);
Route::patch('destination/{id}', [DestinationController::class, 'patch_update']);


Route::get('home',[HomePageApiController::class,'homeData']);

Route::get('destination',[HomePageApiController::class,'destinationById']);
Route::get('destinationPackage',[HomePageApiController::class,'packagesDestinationById']);
Route::get('tourDetail',[TourController::class,'getApiTourDetail']);
Route::get('cruise',[CruiseController::class,'get_cruise']);

Route::post('enquiry',[EnquiryController::class,'post_enquiry']);
Route::patch('updateenquiry/{id}',[EnquiryController::class,'patch_update']);

Route::get('blog',[BlogController::class,'allBlogApi']);
Route::get('blog-detail/{id}',[BlogController::class,'blogDetailById']);
Route::get('search-destination',[DestinationController::class,'search_destination']);

Route::get('jobs',[JobController::class,'getApiJob']);

Route::post('generateHash',[PaymentController::class,'getPaymentHash']);
Route::post('paymentSuccess',[PaymentController::class,'getPaymentSuccess']);
Route::post('paymentFailure',[PaymentController::class,'getPaymentFailed']);




