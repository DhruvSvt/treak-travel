<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Blog;
use App\Models\Destination;
use App\Models\FeaturedDestination;
use App\Models\HomePageBanner;
use App\Models\IndianDestination;
use App\Models\InternationalDestination;
use App\Models\OurAccreditations;
use App\Models\OurClient;
use App\Models\PromotionalBanner;
use App\Models\ShortBrakeDestination;
use App\Models\TourCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageApiController extends Controller
{
    public function homeData(Request $request)
    {
        try {

            $data = [];
            $paginationWithData = [];

            $data['navigation'] = TourCategory::with('tour_subcategory')->where('showinheader',1)->orderBy('order', 'ASC')->get();
            $data['bannerSliders'] = HomePageBanner::all();
            $data['featuredDestinations'] = FeaturedDestination::with('destinations')->get();
            $data['internationalDestinations'] = InternationalDestination::with('destinations')->get();
            $data['indianDestinations'] = IndianDestination::with('destinations')->get();
            $data['shortBrakeDestinations'] = ShortBrakeDestination::with('destinations')->get();
            $data['promotionalBanner'] = PromotionalBanner::all();
            $data['ourClient'] = OurClient::all();
            $data['ourAccreditation'] = OurAccreditations::all();
            $data['trendingDestinations'] = Destination::where("istrending",1)->get();
            $data['blogs'] = Blog::orderBy('created_at', 'ASC')->where('status',1)->get();

            return response()->json(["status" => 200, "message" => "Success", "data" =>  $data], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
        }
    }

    public function destinationById(Request $request)
    {
        try {

            $data = Destination::with('destination_type')->where(["destination_id"=>request()->query('id'),'status'=>1])->get();

            return response()->json(["status" => 200, "message" => "Success", "data" =>  $data], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
        }
    }

    public function packagesDestinationById(Request $request)
    {
        try {

            $tour =DB::table('tour_destination')->join('tours','tours.tours_id','tour_destination.tour_id')
            ->where('destination_id', request()->query('id'))
            ->select('tours.*')
            ->get();

            $popUpAds = Ads::where("type", 'POPUP')->get()->first();
            $sideBarAds = Ads::where("type", 'SIDEBAR')->get()->first();

            foreach ($tour as $value) {
                $value->select_inclusion = explode(',', $value->select_inclusion);
            }

            return response()->json(["status" => 200, "message" => "Success", "data" =>  $tour, "ads" => ['POPUPAD' => $popUpAds, 'SIDEBAR' => $sideBarAds]], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
        }
    }





}
