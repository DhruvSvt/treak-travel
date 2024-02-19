<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HotelController extends Controller
{
    public function post_create(Request $request)
    {
        try {
            $image = $request->file('hotel_banner');

            $path = $image->store('images', 'public');

            $hotel = new Hotel();
            $hotel->hotel_name = $request->hotel_name;
            $hotel->hotel_location = $request->hotel_location;
            $hotel->hotel_banner = $path;
            $hotel->hotel_rate = $request->hotel_rate;
            $hotel->save();
            Session::flash('success', 'Hotel created successfully');
            return  redirect()->intended('/admin/hotels-add');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/hotels-add');
        }
    }

    public function get_read_all(Request $request)
    {
        try {
            $hotelResponse = Hotel::all();
            return view('admin.hotels.list', ['hotels' => $hotelResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin.hotels.list', ['hotels' => []]);
        }
    }

    public function get_edit_hotel(Request $request, $id)
    {
        try {
            $tourCategoryResponse = Hotel::where('id', $id)->first();

            return view('admin.hotels.edit', ['hotels' => $tourCategoryResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin.hotels.edit', ['hotels' => []]);
        }
    }

    public function patch_update_hotel(Request $request, $id)
    {
        try {
            // return response()->json(["status" => 200, "message" => " Successfully", "data" => $request->all()], 200);

            $tourCategoryResponse = Hotel::where('id', $id)->update($request->all());
            Session::flash('success', 'Status changed');
            return response()->json(["status" => 200, "message" => " Successfully", "data" => $tourCategoryResponse], 200);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function patch_update_web_hotel(Request $request, $id)
    {
        try {

            // return $request->file('hotel_banner');

            if ($request->hotel_image!=null) {
                $image = $request->file('hotel_image');
                $path = $image->store('images', 'public');
                $request['hotel_banner'] = $path;
            }



            $tourCategoryResponse = Hotel::where('id', $id)->update($request->except(['_token', '_method','hotel_image']));
            // return $tourCategoryResponse;
            Session::flash('success', 'update success');
            return redirect()->intended('/admin/hotel-edit/' . $id);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            // return $e->getMessage();

            return redirect()->intended('/admin/hotel-edit/' . $id);
        }
    }

    public function delete_hotel(Request $request, $id)
    {
        try {
            $tourCategoryResponse = Hotel::where('id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('/admin/hotels');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/hotels');
        }
    }
}
