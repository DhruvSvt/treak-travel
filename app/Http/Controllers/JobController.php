<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JobController extends Controller
{
    public function post_create(Request $request)
    {
        try {
            $job = new Job();
            $job->title = $request->title;
            $job->sub_title = $request->sub_title;
            $job->description = $request->description;
            $job->save();
            Session::flash('success', 'Feedback created successfully');
            return  redirect()->intended('/admin/jobs');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/jobs');
        }
    }

    public function get_read_all(Request $request)
    {
        try {
            $tourCategoryResponse = Job::all();
            return view('admin/job/list', ['jobs' => $tourCategoryResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/job/list', ['jobs' => []]);
        }
    }

    public function get_edit_job(Request $request, $id)
    {
        try {
            $tourCategoryResponse = Job::where('id', $id)->first();

            return view('admin/job/edit', ['job' => $tourCategoryResponse]);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/job/edit', ['job' => []]);
        }
    }

    public function patch_update_web(Request $request, $id)
    {
        try {
            $tourCategoryResponse = Job::where('id', $id)->update($request->except(['_token', '_method',]));
            $tourCategoryResponse = Job::where('id', $id)->first();
            Session::flash('success', 'update success');
            return redirect()->intended('/admin/job-edit/' . $id);
        } catch (Exception $e) {
            $tourCategoryResponse = Job::where('id', $id)->first();
            Session::flash('error', $e->getMessage());
            return redirect()->intended('/admin/job-edit/' . $id);
        }
    }

    public function delete_job(Request $request, $id)
    {
        try {
            // return response()->json(["status" => 200, "message" => " Successfully", "data" => $request->all()], 200);
            // print_r($request->all());
            // die;
            $tourCategoryResponse = Job::where('id', $id)->delete();
            Session::flash('success', 'deleted successfully');
            return redirect()->intended('jobs');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->intended('admin/jobs');
        }
    }
    public function get_add_job(Request $request)
    {
        try {
            return view('admin/job/add');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return view('admin/job/add');
        }
    }

    public function getApiJob(Request $request)
    {
        try {

            $tour = Job::all();

            return response()->json(["status" => 200, "message" => "Success", "data" =>  $tour], 200);
        } catch (Exception $e) {
            return response()->json(["status" => 500, "message" => $e->getMessage(), "data" => []], 500);
        }
    }

}
