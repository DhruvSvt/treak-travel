<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DestinationController extends Controller
{

    public function get_view_add_destination(Request $request)
    {
        try {
            $destinationTypeResponse = DestinationType::all();
            $isTrendingShow = count(Destination::where("istrending", 1)->get()) > 24 ? false : true;
            return view('admin/destination/add', ['destinationTypeResponse' => $destinationTypeResponse, 'isTrendingShow' => $isTrendingShow]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/destination/add', ['destinationTypeResponse' => []]);
        }
    }


    public function post_create(Request $request)
    {
        try {

            $imageBanner = $request->file('destinationBanner');
            $imageCard = $request->file('destionationCard');

            $pathBanner = $imageBanner->store('images/destination/banner', 'public');
            $pathCard = $imageCard->store('images/destination/card', 'public');

            $destination = new Destination();
            $destination->destination_name = $request->destinationName;
            $destination->destination_slug = $request->destionationSlug;
            $destination->destination_type_id = $request->destinationType;
            $destination->destination_seo_description = $request->destinationSeo;
            $destination->destination_starting_price = $request->destinationPrice;
            $destination->destination_banner_image = $pathBanner;
            $destination->destination_card_image = $pathCard;
            $destination->istrending = $request->istrendingshow == 'on' ? 1 : 0;
            $destination->save();
            Session::flash('success', 'Destination created successfully');
            return  redirect()->intended('/admin/destination-add');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/destination-add');
        }
    }

    public function get_read_all(Request $request)
    {
        try {
            $destinationResponse = Destination::with('destination_type')->get();
            return view('admin/destination/list', ['destinationResponse' => $destinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/destination/list', ['destinationResponse' => []]);
        }
    }

    public function get_edit_destination(Request $request, $id)
    {
        try {
            $destinationTypeResponse = DestinationType::all();
            $destinationResponse = Destination::where('destination_id', $id)->first();

            return view(
                'admin.destination.edit',
                [
                    'destinationTypeResponse' => $destinationTypeResponse,
                    'destinationResponse' => $destinationResponse
                ]
            );
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin.destination.edit', ['destination_type' => []]);
        }
    }

    public function patch_update(Request $request, $id)
    {
        try {

            $tourCategoryResponse = Destination::where('destination_id', $id)->update($request->all());
            Session::flash('success', 'Status changed');
            return response()->json(["status" => 200, "message" => " Successfully", "data" => $tourCategoryResponse], 200);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function patch_update_web_destination(Request $request, $id)
    {
        
        try {

            if ($request->file('destinationBanner')) {
                $imageBanner = $request->file('destinationBanner');
                $pathBanner = $imageBanner->store('images/destination/banner', 'public');
                $request['destination_banner_image'] = $pathBanner;
            }

            if ($request->file('destionationCard')) {
                $imageCard = $request->file('destionationCard');

                $pathCard = $imageCard->store('images/destination/card', 'public');
                $request['destination_card_image'] = $pathCard;
            }

            $request['istrending'] = $request->istrendingshow == 'on' ? 1 : 0;
            

            Destination::where('destination_id', $id)->update($request->except(['_token', '_method','istrendingshow','destinationBanner','destionationCard']));
           
            Session::flash('success', 'update success');
            return redirect()->intended('/admin/destination-edit/' . $id);
        } catch (Exception $e) {
            $tourCategoryResponse = Destination::where('destination_id', $id)->first();
            Session::flash('error', $e->getMessage());
            
            return redirect()->intended('/admin/destination-edit/' . $id);
        }
    }

    public function delete_destination(Request $request, $id)
    {
        try {

            $destinationResponse = Destination::where('destination_id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('admin/destination');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('admin/destination');
        }
    }

    public function search_destination(Request $request)
    {
        try {
            $destinationResponse = Destination::where('destination_name', 'like', '%' . $request->query('search') . '%')->get();

            return response()->json(["status" => 200, "message" => "Success", "data" =>  $destinationResponse], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
        }
    }
}
