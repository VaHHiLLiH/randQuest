<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPanel extends Controller
{
    public function index()
    {
        return view('adminWelcome');
    }

    public function authorization(AuthorizationRequest $request)
    {


        /*if (Auth::attempt($request->except('_token'), true)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }*/
    }
}
