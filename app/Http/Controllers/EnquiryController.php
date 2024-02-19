<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Exception;
use App\Mail\MyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    public function post_enquiry(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'full_name' => 'required|string|max:50',
                'mobile_number' => 'required'
            ]);

            $enquiry = new Enquiry();
            $enquiry->full_name = $request->full_name;
            $enquiry->mobile_number = $request->mobile_number;
            $enquiry->email = $request->email;
            $enquiry->description = $request->description;
            $enquiry->save();
            Mail::to("info@alctravels.com")->send(new MyMail($request->full_name, $request->mobile_number, $request->email, $request->description));

            return response()->json(["status" => 200, "message" => "Request submited successfully. Our Team contact you shortly", "data" =>  []], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
        }
    }

    public function get_all_enquiry(Request $request)
    {
        try {
            $homePageBannerResponse = Enquiry::all();
            return view('admin/index', ['homePageBannerResponse' => $homePageBannerResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/index', ['homePageBannerResponse' => []]);
        }
    }

    public function patch_update(Request $request, $id)
    {
        try {
            // return response()->json(["status" => 200, "message" => " Successfully", "data" => $request->all()], 200);

            $tourCategoryResponse = Enquiry::where('id', $id)->update($request->all());
            Session::flash('success', 'Status changed');
            return response()->json(["status" => 200, "message" => " Successfully", "data" => $tourCategoryResponse], 200);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function deleleById(Request $request, $id)
    {
        try {

            $response = Enquiry::where('id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('/admin');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin');
        }
    }
}
