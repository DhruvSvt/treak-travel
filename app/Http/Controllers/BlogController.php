<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function post_create_blog(Request $request)
    {
        try {

            $imageBanner = $request->file('featured_image');

            $pathBanner = $imageBanner->store('images/blog', 'public');

            $blog = new Blog();
            $blog->featured_image = $pathBanner;
            $blog->title = $request->title;
            $blog->page_url = $request->page_url;
            $blog->description = $request->description;
            $blog->short_description = $request->short_description;
            $blog->save();

            Session::flash('success', 'Blog created successfully');
            return  redirect()->intended('/admin/blogs');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/blogs');
        }
    }

    public function get_read_all_blog(Request $request)
    {
        try {
            $blogResponse = Blog::all();
            return view('admin/blog/list', ['blogResponse' => $blogResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/homeBanner/list', ['blogResponse' => []]);
        }
    }

    public function get_edit_blog(Request $request, $id)
    {
        try {
            $blogResponse = Blog::where('id', $id)->first();
            return view('admin/blog/edit', ['blogResponse' => $blogResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/blog/edit', ['blogResponse' => []]);
        }
    }

    public function delete_blog(Request $request, $id)
    {
        try {

            $response = Blog::where('id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('/admin/blogs');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/blogs');
        }
    }

    public function patch_update_blog(Request $request, $id)
    {
        try {

            if ($request->file('media')) {
                $imageBanner = $request->file('media');

                $request['featured_image'] = $imageBanner->store('images/blog', 'public');
            }

            $tourCategoryResponse = Blog::where('id', $id)->update($request->except(['_token', '_method', 'media']));
            // return $tourCategoryResponse;
            Session::flash('success', 'update success');
            return redirect()->intended('/admin/blog-edit/' . $id);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            // return $e->getMessage();

            return redirect()->intended('/admin/blog-edit/' . $id);
        }
    }


    public function allBlogApi(Request $request)
    {
        try {

            $data = Blog::orderBy('created_at', 'desc')->paginate(10);

            return response()->json(["status" => 200, "message" => "Success", "data" =>  $data], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
        }
    }

    public function blogDetailById(Request $request, $id)
    {
        try {

            $data = Blog::where("id", $id)->first();
            $popUpAds = Ads::where("type", 'POPUP');
            $sideBarAds = Ads::where("type", 'SIDEBAR');

            return response()->json(["status" => 200, "message" => "Success", "data" =>  $data, "ads" => ['POPUPAD' => $popUpAds, 'SIDEBAR' => $sideBarAds]], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
        }
    }
}
