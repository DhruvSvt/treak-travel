<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\FeaturedDestination;
use App\Models\HomePageBanner;
use App\Models\IndianDestination;
use App\Models\InternationalDestination;
use App\Models\OurAccreditations;
use App\Models\OurClient;
use App\Models\PromotionalBanner;
use App\Models\ShortBrakeDestination;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{

    public function post_create_homepage_banner(Request $request)
    {
        try {

            $imageBanner = $request->file('homePageBanner');

            $pathBanner = $imageBanner->store('images/home/banner', 'public');

            $homePageBanner = new HomePageBanner();
            $homePageBanner->banner_position = $request->bannerPosition;
            $homePageBanner->page_url = $request->bannerSlug;
            $homePageBanner->banner_image = $pathBanner;
            $homePageBanner->save();

            Session::flash('success', 'HomePage Banner created successfully');
            return  redirect()->intended('/admin/homepage-banner');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/homepage-banner');
        }
    }

    public function get_read_all_homepage_banner(Request $request)
    {
        try {
            $homePageBannerResponse = HomePageBanner::all();
            return view('admin/homeBanner/list', ['homePageBannerResponse' => $homePageBannerResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/homeBanner/list', ['homePageBannerResponse' => []]);
        }
    }

    public function delete_homepage_banner(Request $request, $id)
    {
        try {

            $response = HomePageBanner::where('id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('/admin/homepage-banner');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/homepage-banner');
        }
    }

    public function get_edit_homepage_banner(Request $request, $id)
    {
        try {
            $homePageBannerResponse = HomePageBanner::where("id", $id)->first();

            return view(
                'admin.homeBanner.edit',
                [
                    'homePageBannerResponse' => $homePageBannerResponse,

                ]
            );
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin.destination.edit', ['destination_type' => []]);
        }
    }

    public function patch_update_web_homepage_banner(Request $request, $id)
    {
        try {

            if ($request->file('homePageBanner')) {
                $imageBanner = $request->file('homePageBanner');
                $pathBanner = $imageBanner->store('images/home/banner', 'public');
                $request['banner_image'] = $pathBanner;
            }

            $destinationResponse = HomePageBanner::where('id', $id)->update($request->except(['_token', '_method', 'homePageBanner']));
            Session::flash('success', 'update success');
            return redirect()->intended('/admin/homepage-banner');
        } catch (Exception $e) {
            // $tourCategoryResponse = HomePageBanner::where('id', $id)->first();
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/homepage-banner');
        }
    }



    public function post_create_promotional_banner(Request $request)
    {
        try {

            $imageBanner = $request->file('homePageBanner');

            $pathBanner = $imageBanner->store('images/promotional/banner', 'public');

            $homePageBanner = new PromotionalBanner();
            $homePageBanner->banner_position = $request->bannerPosition;
            $homePageBanner->page_url = $request->bannerSlug;
            $homePageBanner->banner_image = $pathBanner;
            $homePageBanner->save();

            Session::flash('success', 'Promotional Banner created successfully');
            return  redirect()->intended('/admin/promotional-banner');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/promotional-banner');
        }
    }

    public function get_read_all_promotional_banner(Request $request)
    {
        try {
            $homePageBannerResponse = PromotionalBanner::all();
            return view('admin/promationalBanner/list', ['homePageBannerResponse' => $homePageBannerResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/promationalBanner/list', ['homePageBannerResponse' => []]);
        }
    }

    public function delete_promotional_banner(Request $request, $id)
    {
        try {

            $response = PromotionalBanner::where('id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('/admin/promotional-banner');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/promotional-banner');
        }
    }

    //featured destinations
    public function get_view_add_featured_destination(Request $request)
    {
        try {
            $destinationResponse = Destination::all();
            return view('admin/featured/add', ['destinationResponse' => $destinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/featured/add', ['destinationResponse' => '']);
        }
    }

    public function post_create_featured_destination(Request $request)
    {
        try {

            $imageBanner = $request->file('featureDestinationCardImage');

            $pathBanner = $imageBanner->store('images/home/featuredDestination', 'public');

            $featureDestination = new FeaturedDestination();
            $featureDestination->featured_destination_name = $request->featureDestinationName;
            $featureDestination->destination_id = $request->destination;
            $featureDestination->featured_destination_image = $pathBanner;
            $featureDestination->save();

            Session::flash('success', 'HomePage Banner created successfully');
            return  redirect()->intended('/admin/homepage-featured-destination');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/homepage-featured-destination');
        }
    }

    public function get_read_all_featured_destination(Request $request)
    {
        try {
            $featuredDestinationResponse = FeaturedDestination::with('destinations')->get();
            return view('admin/featured/list', ['featuredDestinationResponse' => $featuredDestinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/featured/list', ['featuredDestinationResponse' => []]);
        }
    }
    public function get_edit_featured_destination(Request $request, $id)
    {
        try {
            $homePageBannerResponse = FeaturedDestination::where("featured_destination_id", $id)->first();
            $destinationResponse = Destination::all();

            return view(
                'admin.featured.edit',
                [
                    'homePageBannerResponse' => $homePageBannerResponse,
                    'destinationResponse' => $destinationResponse

                ]
            );
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin.featured.edit', ['destination_type' => []]);
        }
    }

    public function patch_update_featuredBanner(Request $request, $id)
    {
        try {

            if ($request->file('featureDestinationCardImage')) {
                $imageBanner = $request->file('featureDestinationCardImage');
                $pathBanner = $imageBanner->store('images/home/featuredDestination', 'public');
                $request['featured_destination_image'] = $pathBanner;
            }

            FeaturedDestination::where('featured_destination_id', $id)->update($request->except(['_token', '_method', 'featureDestinationCardImage']));
            Session::flash('success', 'update success');
            return redirect()->intended('/admin/homepage-featured-destination');
        } catch (Exception $e) {
            // $tourCategoryResponse = HomePageBanner::where('id', $id)->first();
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/homepage-featured-destination');
        }
    }

    public function delete_featured_destination(Request $request, $id)
    {
        try {

            $response = FeaturedDestination::where('featured_destination_id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('/admin/homepage-featured-destination');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/homepage-featured-destination');
        }
    }

    //best international destinations

    public function get_view_add_international_destination(Request $request)
    {
        try {
            $internationalDestinationResponse = Destination::select('*')->get();
            return view('admin/international-destinations/add', ['internationalDestinationResponse' => $internationalDestinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            print_r($e->getMessage());
            die;
            return view('admin/international-destinations/add', ['internationalDestinationResponse' => '']);
        }
    }

    public function post_create_international_destination(Request $request)
    {
        try {

            $imageBanner = $request->file('destionationCard');

            $pathBanner = $imageBanner->store('images/home/interDestination', 'public');

            $featureDestination = new InternationalDestination();
            $featureDestination->international_destination_name = $request->destinationName;
            $featureDestination->destination_id = $request->destination;
            $featureDestination->seo_descr = $request->seoDescr;
            $featureDestination->international_price = $request->destinationPrice;
            $featureDestination->international_destination_image = $pathBanner;
            $featureDestination->save();

            Session::flash('success', 'Destinations created successfully');
            return  redirect()->intended('/admin/best-international-destination');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/best-international-destination');
        }
    }

    public function get_read_all_international_destination(Request $request)
    {
        try {
            $featuredDestinationResponse = InternationalDestination::with('destinations')->get();
            return view('admin/international-destinations/list', ['featuredDestinationResponse' => $featuredDestinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/international-destinations/list', ['featuredDestinationResponse' => []]);
        }
    }
    //best indian destinations


    public function get_view_add_indian_destination(Request $request)
    {
        try {
            $indianDestinationResponse = Destination::where('destination_type_id', 2)->get();
            return view('admin/indian-destinations/add', ['indianDestinationResponse' => $indianDestinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            print_r($e->getMessage());
            die;
            return view('admin/indian-destinations/add', ['indianDestinationResponse' => '']);
        }
    }

    public function post_create_indian_destination(Request $request)
    {
        try {

            $imageBanner = $request->file('destionationCard');

            $pathBanner = $imageBanner->store('images/home/indianDestination', 'public');

            $featureDestination = new IndianDestination();
            $featureDestination->indian_destination_name = $request->destinationName;
            $featureDestination->destination_id = $request->destination;
            $featureDestination->seo_descr = $request->seoDescr;
            $featureDestination->indian_price = $request->destinationPrice;
            $featureDestination->indian_destination_image = $pathBanner;
            $featureDestination->save();

            Session::flash('success', 'Destinations created successfully');
            return  redirect()->intended('/admin/best-indian-destination');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/best-indian-destination');
        }
    }

    public function get_read_all_indian_destination(Request $request)
    {
        try {
            $indianDestinationResponse = IndianDestination::with('destinations')->get();
            return view('admin/indian-destinations/list', ['indianDestinationResponse' => $indianDestinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/indian-destinations/list', ['indianDestinationResponse' => []]);
        }
    }

    //best shortbrake destinations


    public function get_view_add_shortbrake_destination(Request $request)
    {
        try {
            $shortbrakeDestinationResponse = Destination::all();
            return view('admin/shortbrake-destinations/add', ['shortbrakeDestinationResponse' => $shortbrakeDestinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            print_r($e->getMessage());
            die;
            return view('admin/indian-destinations/add', ['shortbrakeDestinationResponse' => '']);
        }
    }

    public function post_create_shortbrake_destination(Request $request)
    {
        try {

            $imageBanner = $request->file('destionationCard');

            $pathBanner = $imageBanner->store('images/home/indianDestination', 'public');

            $shortbrakeDestination = new ShortBrakeDestination();
            $shortbrakeDestination->shortbrake_destination_name = $request->destinationName;
            $shortbrakeDestination->destination_id = $request->destination;
            $shortbrakeDestination->seo_descr = $request->seoDescr;
            $shortbrakeDestination->shortbrake_price = $request->destinationPrice;
            $shortbrakeDestination->shortbrake_destination_image = $pathBanner;
            $shortbrakeDestination->save();

            Session::flash('success', 'Destinations created successfully');
            return  redirect()->intended('/admin/best-shortbrake-destination');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/best-shortbrake-destination');
        }
    }

    public function get_read_all_shortbrake_destination(Request $request)
    {
        try {
            $shortbrakeDestinationResponse = ShortBrakeDestination::with('destinations')->get();
            return view('admin/shortbrake-destinations/list', ['shortbrakeDestinationResponse' => $shortbrakeDestinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/shortbrake-destinations/list', ['shortbrakeDestinationResponse' => []]);
        }
    }

    public function get_read_our_client(Request $request)
    {
        try {
            $ourClientResponse = OurClient::all();
            return view('admin/ourclient/list', ['ourClientResponse' => $ourClientResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/ourclient/list', ['ourClientResponse' => []]);
        }
    }

    public function get_view_add_our_client(Request $request)
    {
        try {

            return view('admin/ourclient/add');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            print_r($e->getMessage());
            die;
            return view('admin/ourclient/add');
        }
    }

    public function post_create_our_client(Request $request)
    {
        try {

            $imageBanner = $request->file('ourclientimage');

            $pathBanner = $imageBanner->store('images/home/ourclient', 'public');

            $ourClient = new OurClient();
            $ourClient->our_client_image = $pathBanner;
            $ourClient->save();

            Session::flash('success', 'Our Client created successfully');
            return  redirect()->intended('/admin/our-client');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/our-client');
        }
    }

    public function delete_our_client(Request $request, $id)
    {
        try {

            $response = OurClient::where('id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('/admin/our-client');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/our-client');
        }
    }


    public function get_read_our_accreditations(Request $request)
    {
        try {
            $ourClientResponse = OurAccreditations::all();
            return view('admin/ouraccreditations/list', ['ourClientResponse' => $ourClientResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/ouraccreditations/list', ['ourClientResponse' => []]);
        }
    }

    public function get_view_add_our_accreditations(Request $request)
    {
        try {

            return view('admin/ouraccreditations/add');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            print_r($e->getMessage());
            die;
            return view('admin/ouraccreditations/add');
        }
    }

    public function post_create_our_accreditations(Request $request)
    {
        try {

            $imageBanner = $request->file('ourclientimage');

            $pathBanner = $imageBanner->store('images/home/ourclient', 'public');

            $ourClient = new OurAccreditations();
            $ourClient->our_accreditation_image = $pathBanner;
            $ourClient->save();

            Session::flash('success', 'Our Accreditations created successfully');
            return  redirect()->intended('/admin/our-accreditations');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/our-accreditations');
        }
    }

    public function delete_our_accreditations(Request $request, $id)
    {
        try {

            $response = OurAccreditations::where('id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('/admin/our-accreditations');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/our-accreditations');
        }
    }
}
