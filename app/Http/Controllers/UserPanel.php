<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use App\Http\Requests\RegistrationRequest;
use App\Jobs\RegistrationForEmail;
use App\Mail\ConfirmationOfRegistration;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

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

        $token = Str::random(32);

        $user = User::create([
            'name'                  => $request->get('name'),
            'email'                 => $request->get('email'),
            'password'              => Hash::make($request->get('password')),
            'role'                  => 'guest',
            'registration_token'    => $token,
        ]);

        dispatch(new RegistrationForEmail($user, $token));

        return redirect()->route('confirm', $user->id);
    }

    public function regConfirm(Request $request)
    {
        $user = User::where('registration_token', $request->token)->first();

        if (empty($user)){
            return redirect()->route('registration');
        } else {
            $user->update(['role' => 'user']);

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->route('home');
        }
    }
}
