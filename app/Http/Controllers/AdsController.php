<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdsController extends Controller
{
    public function post_create_ads(Request $request,$id)
    {
        try {

            $imageBanner = $request->file('ads_image');

            $pathBanner = $imageBanner->store('images/ads', 'public');

            $blog = new Ads();
            $blog->ads_image = $pathBanner;
            $blog->type=$id;
            $blog->save();

            Session::flash('success', 'Ads created successfully');
            return  redirect()->intended('/admin/ads');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/ads');
        }
    }

    public function get_ads(Request $request)
    {
        try {
            return view('admin/ads/list',["response"=>Ads::all()]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/ads/list');
        }
    }

    public function patch_update_ads(Request $request, $id)
    {
        try {

            if ($request->file('adImage')) {
                $imageBanner = $request->file('adImage');

                $request['ads_image'] = $imageBanner->store('images/blog', 'public');
            }

            $tourCategoryResponse = Ads::where('id', $id)->update($request->except(['_token', '_method','adImage']));
            // return $tourCategoryResponse;
            Session::flash('success', 'update success');
            return redirect()->intended('/admin/ads');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            // return $e->getMessage();

            return redirect()->intended('/admin/ads');
        }
    }

    // public function get_edit_blog(Request $request, $id)
    // {
    //     try {
    //         $blogResponse = Blog::where('id', $id)->first();
    //         return view('admin/blog/edit', ['blogResponse' => $blogResponse]);
    //     } catch (Exception $e) {
    //         Session::flash('error', $e->getMessage());
    //         return view('admin/blog/edit', ['blogResponse' => []]);
    //     }
    // }

    // public function delete_blog(Request $request, $id)
    // {
    //     try {

    //         $response = Blog::where('id', $id)->delete();
    //         Session::flash('success', 'deleted successfully');
    //         return redirect()->intended('blogs');
    //     } catch (Exception $e) {
    //         Session::flash('error', $e->getMessage());
    //         return redirect()->intended('blogs');
    //     }
    // }

}
