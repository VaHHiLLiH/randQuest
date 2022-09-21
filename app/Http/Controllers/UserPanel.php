<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use App\Http\Requests\RegistrationRequest;
use App\Mail\ConfirmationOfRegistration;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Type\Integer;

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

    public function authorization(AuthorizationRequest $request)
    {
        if (Auth::attempt([
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        ])) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registration(RegistrationRequest $request)
    {
        Mail::to($request->get('email'))->send(new ConfirmationOfRegistration($request->get('email'), $request->get('name'), 228));
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

            return redirect()->route('home');
        }
    }
}
