<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorizationRequest;
use App\Http\Requests\RegistrationRequest;
use App\Jobs\RegistrationForEmail;
use App\Mail\ConfirmationOfRegistration;
use App\Models\Post;
use App\Models\User;
use App\Services\ValidateToken;
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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
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
            'email' => 'Введенные вами данные не корректны',
        ]);
    }

    public function registration(RegistrationRequest $request)
    {
        $token = ValidateToken::generateToken();

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
            $user->update(['role' => 'user', 'email_verified_at' => NOW(), '']);

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->route('home');
        }
    }

    public function restorePassword()
    {

    }

    public function TelegramBot(Request $request)
    {
        $thToken = '5761861939:AAEVa_BxqDr7rBUoYKWiS-m5oOmGXLXilGA';
        $method = 'getMe';
        $url = 'https://api.telegram.org/bot' . $thToken . '/' . $method;
        var_dump($url);echo'<br/><br/>';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $output = curl_exec ($ch);
        var_dump($output);echo'<br/><br/>';
        $info = curl_getinfo($ch);
        var_dump($info);echo'<br/><br/>';
        $http_result = $info ['http_code'];
        var_dump($http_result);echo'<br/><br/>';
        curl_close ($ch);

    }
}
