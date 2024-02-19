<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->put('user', $credentials);
                Session::flash('success', 'Login Successfully');
            return redirect()->intended('/admin/');

        } else {
            return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function registerPost(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
            ], [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email address is already registered.',
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least 8 characters.',
            ]);

            // Create a new user record
            $user = new User();
            $user->name = $request->query('name');
            $user->email = $request->query('email');
            $user->password = Hash::make($request->query('password'));
            $user->save();

            // Log in the newly registered user
            Auth::login($user);

            // Redirect the user to the home page or any other desired page
            return redirect()->intended('/admin/');
        } catch (Exception $e) {
            print_r($e->getMessage());
            die;
        }
    }

    public function logout()
    {
        Session::forget('user');
        Auth::logout();
        return redirect('/login');
    }

}

