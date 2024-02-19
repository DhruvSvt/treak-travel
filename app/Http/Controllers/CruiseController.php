<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Cruise;
use App\Models\Destination;
use App\Models\DestinationType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CruiseController extends Controller
{
    public function get_view_add_cruise(Request $request)
    {
        try {
            $destinationResponse = Destination::where("destination_type_id", 4)->get();
            return view('admin/cruise/add', ['destinationResponse' => $destinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/cruise/add', ['destinationResponse' => []]);
        }
    }


    public function post_create(Request $request)
    {
        try {

            $imageBanner = $request->file('cruiseImage');
            $pdf = $request->file('documentUrl');

            $pathBanner = $imageBanner->store('images/cruise/banner', 'public');
            $pathPdf = $pdf->store('document/cruise', 'public');

            $cruise = new Cruise();
            $cruise->cruise_title = $request->cruiseTitle;
            $cruise->cruise_price = $request->cruisePrice;
            $cruise->cruise_image = $pathBanner;
            $cruise->cruise_document = $pathPdf;
            $cruise->cruise_daynight = $request->dayNight;
            $cruise->save();
            Session::flash('success', 'cruise created successfully');
            return  redirect()->intended('/cruise-add');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/cruise-add');
        }
    }

    public function get_read_all(Request $request)
    {
        try {
            $destinationResponse = Cruise::get();
            return view('admin/cruise/list', ['destinationResponse' => $destinationResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/cruise/list', ['destinationResponse' => []]);
        }
    }

    public function deleleById(Request $request, $id)
    {
        try {
            $cruise = Cruise::where("cruise_id", $id);
            $cruise->delete();
            Session::flash('success', 'cruise delete successfully');
            return  redirect()->intended('/cruise');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return  redirect()->intended('/cruise');
        }
    }

    public function get_edit_cruise(Request $request, $id)
    {
        try {
            $destinationResponse = Cruise::where('cruise_id', $id)->first();

            return view(
                'admin.cruise.edit',
                [
                    'cruiseResponse' => $destinationResponse
                ]
            );
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin.destination.edit', ['destination_type' => []]);
        }
    }

    public function patch_edit_cruise(Request $request, $id)
    {
        try {


            if ($request->file('cruiseImage')) {
                $imageBanner = $request->file('cruiseImage');
                $pathBanner = $imageBanner->store('images/cruise/banner', 'public');
                $request['cruise_image'] = $pathBanner;
            }
            if ($request->file('documentUrl')) {
                $pdf = $request->file('documentUrl');
                $pathPdf = $pdf->store('document/cruise', 'public');
                $request['cruise_document'] = $pathPdf;
            }
            $destinationResponse = Cruise::where('cruise_id', $id)->update($request->except(['_token', '_method']));

            Session::flash('success', 'Cruise created successfully');
            return  redirect()->intended('/cruise');
        } catch (Exception $e) {
            print_r($e->getMessage());
            die;
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/cruise');
        }
    }


    public function get_cruise(Request $request)
    {
        try {
            $cruise = Cruise::paginate(16, ['*'], 'page', request()->query('page') ?? 1);
            $popUpAds = Ads::where("type", 'POPUP')->get()->first();
            $sideBarAds = Ads::where("type", 'SIDEBAR')->get()->first();


            return response()->json(["status" => 200, "message" => "Success", "data" =>  $cruise, "ads" => ['POPUPAD' => $popUpAds, 'SIDEBAR' => $sideBarAds]], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
        }
    }
}
