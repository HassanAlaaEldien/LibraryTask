<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index']);
    }

    public function index(){
        return view('welcome');
    }
    
    public function loginPage(){
        return Auth::check() ? redirect()->route('home') : view('login');
    }

    public function login(UserLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return redirect()->back()->with(['fail' => 'invalid credentials!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
