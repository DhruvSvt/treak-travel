<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\FeaturedDestination;
use App\Models\HomePageBanner;
use App\Models\Job;
use App\Models\InternationalDestination;
use App\Models\Blog;
use App\Models\DestinationType;
use App\Models\PromotionalBanner;
use App\Models\Ads;
use App\Models\Hotel;
use App\Models\Tour;
use App\Models\TourCategory;
use App\Models\TourItinery;
use App\Models\TourSubcategory;
use App\Models\Enquiry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{

    public function index(Request $request)
    {
        $topBanner = HomePageBanner::select('*')->orderBy('banner_position', 'ASC')->get();
        $promoBanner = PromotionalBanner::select('*')->orderBy('banner_position', 'ASC')->get();
        $first_fd = FeaturedDestination::with('destinations')->skip(0)->take(1)->get();
        $next_fd = FeaturedDestination::with('destinations')->skip(1)->take(6)->get();
        $trending_d = Destination::select('*')->where('istrending', '=', '1')->orderBy('destination_id', 'DESC')->get();
        $interest_d = Destination::select('*')->join('destination_types', 'destination_types.id', '=', 'destinations.destination_type_id')->groupBy('destinations.destination_type_id')->get();
        $weekend_d = InternationalDestination::with('destinations')->skip(0)->take(8)->get();
        $feedback = Job::select('*')->orderBy('id', 'DESC')->skip(0)->take(6)->get();
        $blog = Blog::select('*')->orderBy('id', 'DESC')->skip(0)->take(3)->get();
        return view('web/index', ['topBanner' => $topBanner, 'promoBanner' => $promoBanner, 'first_fd' => $first_fd, 'next_fd' => $next_fd, 'trending_d' => $trending_d, 'interest_d' => $interest_d, 'weekend_d' => $weekend_d, 'feedback' => $feedback, 'blog' => $blog]);
    }

    public function packages(Request $request, $slug)
    {
        $destination = Destination::select('*')->where('destination_slug', $slug)->first();
        $desid = $destination->destination_id;
        $tour = Tour::select('tours.tours_id', 'tours.select_inclusion', 'tours.tours_price', 'tours.tour_type', 'tours.tours_name', 'tours.tours_duration', 'tours.tours_banner', 'tours.tours_description', 'tours.tours_url')->join('tour_destination', 'tour_destination.tour_id', '=', 'tours.tours_id')->where('tour_destination.destination_id', $desid)->whereStatus(true)->get();
        $weekend_d = InternationalDestination::with('destinations')->skip(0)->take(8)->get();
        return view('web/packages', ['destination' => $destination, 'tour' => $tour, 'weekend_d' => $weekend_d]);
    }
    public function category(Request $request, $slug)
    {
        $subcategory = TourSubcategory::select('*')->where('slug', $slug)->first();
        $sid = $subcategory->tour_subcategories_id;
        $tour = Tour::select('tours.tours_id', 'tours.select_inclusion', 'tours.tours_price', 'tours.tours_name', 'tours.tours_duration', 'tours.tours_banner', 'tours.tours_description', 'tours.tours_url')->where('tours.tours_subcategory', $sid)->get();
        $weekend_d = InternationalDestination::with('destinations')->skip(0)->take(8)->get();
        return view('web/category', ['subcategory' => $subcategory, 'tour' => $tour, 'weekend_d' => $weekend_d]);
    }
    public function types(Request $request, $id)
    {
        $destType = DestinationType::select('*')->where('id', $id)->first();
        $tour = Tour::select('tours.tours_id', 'tours.select_inclusion', 'tours.tours_price', 'tours.tours_name', 'tours.tours_duration', 'tours.tours_banner', 'tours.tours_description', 'tours.tours_url', 'destinations.destination_slug')->join('tour_destination', 'tour_destination.tour_id', '=', 'tours.tours_id')->join('destinations', 'destinations.destination_id', '=', 'tour_destination.destination_id')->where('destinations.destination_type_id', $id)->groupBy('tours.tours_id')->get();
        $weekend_d = InternationalDestination::with('destinations')->skip(0)->take(8)->get();
        return view('web/types', ['destType' => $destType, 'tour' => $tour, 'weekend_d' => $weekend_d]);
    }
    public function search(Request $request)
    {
        if (isset($request->search) && $request->search != '') {
            $search = $request->search;
            $tour = Tour::select('tours.tours_id', 'tours.select_inclusion', 'tours.tours_price', 'tours.tour_type', 'tours.tours_name', 'tours.tours_duration', 'tours.tours_banner', 'tours.tours_description', 'tours.tours_url', 'destinations.destination_slug')->join('tour_destination', 'tour_destination.tour_id', '=', 'tours.tours_id')->join('destinations', 'destinations.destination_id', '=', 'tour_destination.destination_id')->where('destinations.destination_name', 'like', '%' . $search . '%')
                ->orWhere('destinations.destination_seo_description', 'LIKE', '%' . $search . '%')
                ->orWhere('tours.tours_name', 'LIKE', '%' . $search . '%')
                ->groupBy('tours.tours_id')->get();
            $weekend_d = InternationalDestination::with('destinations')->skip(0)->take(8)->get();
            return view('web/search', ['search' => $search, 'tour' => $tour, 'weekend_d' => $weekend_d]);
        } else {
            return redirect()->back()->with('message', 'Search Keyword Not found');
        }
    }
    public function tour(Request $request, $dest, $slug)
    {
        $destination = Destination::select('*')->where('destination_slug', $dest)->first();
        if ($destination == null) {
            $subcategory = TourSubcategory::select('*')->where('slug', $dest)->first();
        } else {
            $subcategory = array();
        }

        $tour = Tour::select('*')->where('tours_url', $slug)->first();
        $tour_id = $tour->tours_id;
        $tourItineiry = TourItinery::where('tour_id', $tour_id)->get();
        $tourhotels = Hotel::select('hotels.*')->join('tour_hotel', 'tour_hotel.hotel_id', '=', 'hotels.id')->where('tour_hotel.tour_id', $tour_id)->get();

        $destinations = Destination::select('destinations.destination_name')->join('tour_destination', 'tour_destination.tour_id', '=', 'destinations.destination_id')->where('tour_destination.destination_id', $tour_id)->get();
        $feedback = Job::select('*')->orderBy('id', 'DESC')->skip(0)->take(6)->get();
        return view('web/tour', ['tour' => $tour, 'destination' => $destination, 'destinations' => $destinations, 'tourItineiry' => $tourItineiry, 'feedback' => $feedback, 'subcategory' => $subcategory, 'tourhotels' => $tourhotels]);
    }
    public function planTripAction(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'name' => 'required|string|max:50',
                'phone' => 'required'
            ]);

            $enquiry = new Enquiry();
            $enquiry->name = $request->name;
            $enquiry->country = $request->country;
            $enquiry->email = $request->email;
            $enquiry->detail = $request->detail;
            $enquiry->tdate = $request->tdate;
            $enquiry->stay = $request->stay;
            $enquiry->person = $request->person;
            $enquiry->phone = $request->phone;
            $enquiry->save();
            // Mail::to("info@alctravels.com")->send(new MyMail($request->full_name, $request->mobile_number, $request->email, $request->description));

            Session::flash('success', 'Thankyou! Your Enquiry Received successfully');
            return redirect()->back();
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
    public function blogs(Request $request)
    {

        $blog = Blog::select('*')->orderBy('id', 'DESC')->skip(0)->take(30)->get();
        return view('web/blogs', ['blog' => $blog]);
    }
    public function blog(Request $request, $slug)
    {
        $blog = Blog::select('*')->where('page_url', $slug)->first();
        return view('web/blog', ['blog' => $blog]);
    }
}
