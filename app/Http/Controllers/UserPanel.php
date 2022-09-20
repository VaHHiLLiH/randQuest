<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserPanel extends Controller
{
    public function showAuthorization()
    {
        return view('login');
    }

    public function showRegistration()
    {
        return view('register');
    }

    public function home()
    {

        return view('home');
    }

    public function authorization()
    {

    }

    public function registration(RegistrationRequest $request)
    {

        dd($request->all());
        User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => Hash::make($request->get('password')),
            'role'      => 'user',
        ]);

        $user = [
            'email'     => $request->get('email'),
            'password'  => $request->get('password'),
        ];

        if (Auth::attempt($user, true)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
    }
}