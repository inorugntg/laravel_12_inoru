<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller
{
    public function index(){
        if (auth()->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'email' => ':attribute harus berupa email'
        ];

        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],$messages);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        
        return back()->withErrors([
            'email'=>'The providers credentials do not match out records',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}