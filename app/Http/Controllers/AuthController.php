<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getWelcomePage(){
        return view('welcome');
    }

    public function getLoginPage(){
        return view('login');
    }

    public function getSignUpPage(){
        return view('signup');
    }

    public function register(Request $request){
        $request->validate([
            'name' => [
                'required',
                'min:3',
                'max:40',
            ],
            'phone_number' => [
                'required',
                'regex:/^08/',
                'numeric',
                'min:10'],
            'email' => [
                'required',
                'email',
                'ends_with:@gmail.com'
            ],
            'password' => [
                'required',
                'min: 6',
                'max: 12'
            ]
    ], [
        'name.required' => 'Your name is required.',
        'name.min' => 'Your name must be minimally 3 letters',
        'name.max' => 'Your name must be maximally 40 letters',

        'phone_number.required' => 'The phone number is required.',
        'phone_number.regex' => 'The phone number must start with "08".',
        'phone_number.numeric' => 'The phone number must contain only digits.',
        'phone_number.min' => 'The phone number must be at least 10 digits long.',

        'email.required' => 'Your email is required.',
        'email.email' => 'Your email must be a valid email address.',
        'email.ends_with' => 'Your email must ends with @gmail.com',

        'password.required' => 'Your password is required.',
        'password.min' => 'Your password must be minimally 6 letters',
        'password.max' => 'Your password must be maximally 12 letters',
    ]);
    
        // Hashing
        // Data - data sensitif itu kita enkripsi
        $user = User::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        Auth::login($user);
        return redirect()->route('user.page');
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin'){
                return redirect()->route('admin.page');
            }
            return redirect()->route('user.page');
        }
        return redirect()->route('login')->with(['message' => 'Please try again.']);
    }
}
