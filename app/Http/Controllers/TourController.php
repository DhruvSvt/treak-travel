<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Blog;
use App\Models\Destination;
use App\Models\Hotel;
use App\Models\Tour;
use App\Models\TourCategory;
use App\Models\TourItinery;
use App\Models\TourSubcategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function post_create(Request $request)
    {
        try {
            // print_r($request->showInHeader);
            // die;
            $tourCategory = new TourCategory();
            $tourCategory->tour_category_name = $request->name;
            $tourCategory->ismegamenu = $request->ismegamenu == 'on' ? true : false;
            $tourCategory->url = $request->url;
            $tourCategory->showinheader = $request->showInHeader == 'on' ? true : false;
            $tourCategory->save();
            Session::flash('success', 'Tour category created successfully');
            return  redirect()->intended('/admin/category');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/category');
        }
    }

    public function get_read_all(Request $request)
    {
        try {
            $tourCategoryResponse = TourCategory::all();
            return view('admin/category/list', ['tourCategory' => $tourCategoryResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/category/list', ['tourCategory' => []]);
        }
    }

    public function get_edit_category(Request $request, $id)
    {
        try {
            $tourCategoryResponse = TourCategory::where('id', $id)->first();

            return view('admin/category/edit', ['tourCategory' => $tourCategoryResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/category/edit', ['tourCategory' => []]);
        }
    }

    public function patch_update(Request $request, $id)
    {
        try {
            // return response()->json(["status" => 200, "message" => " Successfully", "data" => $request->all()], 200);

            $tourCategoryResponse = TourCategory::where('id', $id)->update($request->all());
            Session::flash('success', 'Status changed');
            return response()->json(["status" => 200, "message" => " Successfully", "data" => $tourCategoryResponse], 200);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function patchUpdateWeb(Request $request, $id)
    {
        try {
            $showInHeader = $request->input('showinheader'); // Get the value of showinheader from the request
            $request['ismegamenu'] = $request->ismegamenu == 'on' ? true : false;
            $request['showinheader'] = $showInHeader == 'true' ? true : false; // Convert the string value to boolean
            $tourCategoryResponse = TourCategory::where('id', $id)->update($request->except(['_token', '_method']));
            Session::flash('success', 'update success');
            return response()->json(['success' => true]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }


    public function delete_category(Request $request, $id)
    {
        try {
            // return response()->json(["status" => 200, "message" => " Successfully", "data" => $request->all()], 200);
            // print_r($request->all());
            // die;
            $tourCategoryResponse = TourCategory::where('id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('/admin/category');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/category');
        }
    }


    //subcategory
    public function get_view_add_subcategory(Request $request)
    {
        try {
            $tourCategoryResponse = TourCategory::all();
            return view('admin/subcategory/add', ['tourCategory' => $tourCategoryResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/subcategory/add', ['tourCategory' => []]);
        }
    }

    public function post_create_subcategory(Request $request)
    {
        try {
            $tourCategory = new TourSubcategory();
            $tourCategory->tour_subcategory_name = $request->name;
            $tourCategory->seo_description = $request->seo_description;
            $tourCategory->slug = Str::slug($request->slug);
            $tourCategory->tour_categories_id = $request->categoryId;



            $imageBanner = $request->file('bannerimage');
            $tourCategory->banner_image = $imageBanner->store('images/subcat', 'public');

            $tourCategory->save();
            Session::flash('success', 'Tour subcategory created successfully');
            return  redirect()->intended('/admin/subcategory');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/create-subcategory');
        }
    }

    public function get_subcategory_all(Request $request)
    {
        try {
            $tourSubCategory = TourSubcategory::with('tour_category')->get();
            return view('admin/subcategory/list', ['tourSubCategory' => $tourSubCategory]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            print_r($e->getMessage());
            die;
        }
    }

    public function getTourSubCategoryById(Request $request, $id)
    {
        try {
            try {
                $subcategory = TourSubcategory::where("tour_categories_id", "=", $id)->where("status", "=", 1)->get();
                return response()->json(["status" => 200, "message" => "Success", "data" =>  $subcategory], 200);
            } catch (Exception $e) {
                return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
            }
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            print_r($e->getMessage());
            die;
        }
    }

    public function patch_update_subcategory(Request $request, $id)
    {
        try {


            $tourCategoryResponse = TourSubcategory::where('tour_subcategories_id', $id)->update($request->all());
            Session::flash('success', 'Status changed');
            return response()->json(["status" => 200, "message" => " Successfully", "data" => $tourCategoryResponse], 200);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function get_edit_subcategory(Request $request, $id)
    {
        try {
            $tourSubCategory = TourSubcategory::with('tour_category')->where('tour_subcategories_id', $id)->first();
            $tourCategoryResponse = TourCategory::all();
            return view('admin/subcategory/edit', ['tourSubCategory' => $tourSubCategory, 'tourCategory' => $tourCategoryResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/subcategory/edit', ['tourCategory' => []]);
        }
    }

    public function patch_update_web_subcategory(Request $request, $id)
    {
        try {
            $request['slug'] = Str::slug($request->slug);
            if ($request->file('bannerimage')) {

                $imageBanner = $request->file('bannerimage');
                $request['banner_image'] = $imageBanner->store('images/subcat', 'public');
            }

            $tourCategoryResponse = TourSubcategory::where('tour_subcategories_id', $id)->update($request->except(['_token', '_method', 'bannerimage']));
            $tourCategoryResponse = TourSubcategory::where('tour_subcategories_id', $id)->first();
            Session::flash('success', 'update success');
            return redirect()->intended('/admin/subcategory');
        } catch (Exception $e) {
            $tourCategoryResponse = TourCategory::where('id', $id)->first();
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/subcategory-edit/' . $id);
        }
    }

    public function delete_subcategory(Request $request, $id)
    {
        try {
            // return response()->json(["status" => 200, "message" => " Successfully", "data" => $request->all()], 200);
            // print_r($request->all());
            // die;
            $tourCategoryResponse = TourSubcategory::where('tour_subcategories_id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('/admin/subcategory');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/subcategory');
        }
    }

    public function get_view_tour(Request $request)
    {
        try {
            $destinationResponse = Destination::all();
            $hotelResponse = Hotel::all();
            $categoryResponse = TourCategory::all();
            return view(
                'admin/tours/add',
                [
                    'destinationResponse' => $destinationResponse,
                    'hotelResponse' => $hotelResponse,
                    'categoryResponse' => $categoryResponse
                ]
            );
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/tours/add', ['destinationResponse' => []]);
        }
    }

    public function get_edit_tour(Request $request, $id)
    {
        try {
            $destinationResponse = Destination::all();

            $hotelResponse = Hotel::all();
            $categoryResponse = TourCategory::all();

            $tourItineiryResponse = TourItinery::where('tour_id', $id)->get();


            $tourResponse = Tour::where("tours_id", $id)->with('destinations')->with('hotels')->first();
            $tourResponse->tours_gallery = explode(',', $tourResponse->tours_gallery);
            $tourResponse->select_inclusion = explode(',', $tourResponse->select_inclusion);

            $tours_category  = $tourResponse->tours_category;
            $subcategoryResponse = TourSubcategory::select('*')->where('tour_categories_id', $tours_category)->get();

            return view('admin/tours/edit', [
                'tourResponse' => $tourResponse,
                'destinationResponse' => $destinationResponse,
                'hotelResponse' => $hotelResponse,
                'categoryResponse' => $categoryResponse,
                'subcategoryResponse' => $subcategoryResponse,
                'tourItineiryResponse' => $tourItineiryResponse,
                'tourPreInclusion' => ['Highlights', 'Flights', 'Hotels', 'Sightseeing', 'Visa', 'Meals', 'Transfer', 'Accommodation', 'Tickets']
            ]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/subcategory/edit', ['tourCategory' => []]);
        }
    }

    public function deleleTourById(Request $request, $id)
    {
        try {
            $cruise = Tour::where("tours_id", $id);
            $cruise->delete();
            Session::flash('success', 'tour delete successfully');
            return  redirect()->intended('/admin/tours');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return  redirect()->intended('/admin/tours');
        }
    }


    public function patch_edit_tour(Request $request, $id)
    {
        try {


            $pathGallery = "";
            $pathGalleryArray = [];
            $pathTourSelectInclusionArray = [];
            $pathTourSelectInclusion = [];


            if ($request->file('tourGallery')) {

                for ($i = 0; $i < count($request->file('tourGallery')); $i++) {

                    $imageGallery = $request->file('tourGallery');

                    $pathGalleryArray[] = $imageGallery[$i]->store('images/destination/gallery', 'public');
                }

                $pathGallery = implode(',', $pathGalleryArray);
                $request['tours_gallery'] = $pathGallery;
            }
            if ($request->file('tourBanner')) {

                $imageBanner = $request->file('tourBanner');
                $request['tours_banner'] =  $imageBanner->store('images/tour/banner', 'public');
            }



            if ($request->tourSelectInclusion) {

                for ($i = 0; $i < count($request->tourSelectInclusion); $i++) {


                    $pathTourSelectInclusionArray[] = $request->tourSelectInclusion[$i];
                }

                $pathTourSelectInclusion = implode(',', $pathTourSelectInclusionArray);
                $request['select_inclusion'] = $pathTourSelectInclusion;
            }

            $request['ismegamenu'] = $request->isMegaMenu == 'on' ? true : false;






            //tour destination pivot and hotel pivot
            $request['tours_url'] = Str::slug($request->tours_url);
            $tour = Tour::where('tours_id', $id)->first();
            $tourdestination = DB::table('tour_destination')->where('tour_id', $id)->delete();
            $tourhotel = DB::table('tour_hotel')->where('tour_id', $id)->delete();
            $tour->destinations()->attach($request->tourDestinations);
            $tour->hotels()->attach($request->tourHotels);

            //tour_itineary
            $tour_itenerary = TourItinery::where('tour_id', $id)->delete();
            for ($i = 0; $i < count($request->plan_title); $i++) {
                $tourIte = new TourItinery();
                $tourIte->tour_id = $id;
                $tourIte->tours_itineries_title = $request->plan_title[$i];
                $tourIte->tours_itineries_desc = $request->plan_desc[$i];
                $tourIte->save();
            }

            $destinationResponse = Tour::where('tours_id', $id)->update($request->except(['_token', '_method', 'tourDestinations', 'tourHotels', 'tourSelectInclusion', 'plan_title', 'plan_desc', 'isMegaMenu', 'tourBanner', 'tourGallery']));

            Session::flash('success', 'Tour created successfully');
            return  redirect()->intended('/admin/tours');
        } catch (Exception $e) {
            print_r($e->getMessage());
            die;
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/tours');
        }
    }


    public function post_create_tour(Request $request)
    {
        try {

            $imageBanner = $request->file('tourBanner');
            $pathBanner = $imageBanner->store('images/tour/banner', 'public');

            $pathGallery = "";
            $pathGalleryArray = [];
            $pathTourSelectInclusionArray = [];
            $pathTourSelectInclusion = [];

            for ($i = 0; $i < count($request->file('tourGallery')); $i++) {

                $imageGallery = $request->file('tourGallery');

                $pathGalleryArray[] = $imageGallery[$i]->store('images/destination/gallery', 'public');
            }

            $pathGallery = implode(',', $pathGalleryArray);

            for ($i = 0; $i < count($request->tourSelectInclusion); $i++) {


                $pathTourSelectInclusionArray[] = $request->tourSelectInclusion[$i];
            }

            $pathTourSelectInclusion = implode(',', $pathTourSelectInclusionArray);


            $tour = new Tour();
            $tour->tours_name = $request->tourName;
            $tour->tours_url = Str::slug($request->tourUrl);
            $tour->tours_price = $request->tourPrice;
            $tour->tours_duration = $request->tourDuration;
            $tour->tours_description = $request->tourShortDescription;
            $tour->tours_banner = $pathBanner;
            $tour->tours_gallery = $pathGallery;
            $tour->select_inclusion = $pathTourSelectInclusion;
            $tour->tours_category = $request->tourCategory;
            $tour->tours_subcategory = $request->tourSubCategory;
            $tour->tours_overview = $request->tourOverview;
            $tour->tours_inclusion = $request->tourInclusion;
            $tour->tours_exclusion = $request->tourExclusion;
            $tour->tours_disclaimer = $request->tourDisclaimer;
            $tour->destination_cover = $request->destination_cover;
            $tour->tour_type = $request->tour_type;
            $tour->save();
            // print_r($tour);
            // die;
            $tour->destinationsby()->attach($request->tourDestinations);
            $tour->hotelsby()->attach($request->tourHotels);


            for ($i = 0; $i < count($request->plan_title); $i++) {
                $tourIte = new TourItinery();
                $tourIte->tour_id = $tour->id;
                $tourIte->tours_itineries_title = $request->plan_title[$i];
                $tourIte->tours_itineries_desc = $request->plan_desc[$i];
                $tourIte->save();
            }


            Session::flash('success', 'Tour created successfully');
            // return  redirect()->intended('/admin/tours');
        } catch (Exception $e) {
            print_r($e->getMessage());
            die;
            Session::flash('error', $e->getMessage());
            // return redirect()->intended('/admin/tours');
        }
    }
    public function patch_update_tour(Request $request, $id)
    {
        try {
            // return response()->json(["status" => 200, "message" => " Successfully", "data" => $request->all()], 200);

            $tourCategoryResponse = Tour::where('tours_id', $id)->update($request->all());
            Session::flash('success', 'Status changed');
            return response()->json(["status" => 200, "message" => " Successfully", "data" => $tourCategoryResponse], 200);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }
    public function get_read_all_tours(Request $request)
    {
        try {
            $tourResponse = Tour::with(['hotels', 'destinations'])->get();
            return view('admin/tours/list', ['tourResponse' => $tourResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/tours/list', ['tourResponse' => 'notdata']);
        }
    }


    //api

    public function getApiTourDetail(Request $request)
    {
        try {

            $tour = Tour::where('tours_id', request()->query('id'))->with('tour_itineries')->with('hotels')->first();
            $tour->tours_gallery = explode(',', $tour->tours_gallery);
            $tour->select_inclusion = explode(',', $tour->select_inclusion);

            $tour['latest_blog'] = Blog::orderBy('created_at', 'desc')->limit(5)->get();

            $popUpAds = Ads::where("type", 'POPUP');
            $sideBarAds = Ads::where("type", 'SIDEBAR');


            return response()->json(["status" => 200, "message" => "Success", "data" =>  $tour, "ads" => ['POPUPAD' => $popUpAds, 'SIDEBAR' => $sideBarAds]], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
        }
    }
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
