<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AfterRegister;
use App\Models\User;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            $request->session()->regenerate();
            if (Auth::user()->userRole->role_id == 1) {
                return redirect()->route('admin.index');
            } else if (Auth::user()->userRole->role_id == 2) {
                return redirect()->route('menthor.index');
            } else if (Auth::user()->userRole->role_id == 3) {
                // Jika ingin kedalam dashboard
                // return redirect()->route('member.index');
                // Jika ingin kedalam homepage
                return redirect()->route('welcome');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->user();;
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getAvatar(),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];
        // $user = User::firstOrCreate(['email' => $data['email']], $data);
        // sistem akan mengecek apakah ada email yang sudah terdaftar
        $user = User::whereEmail($data['email'])->first();
        // jika tidak ada maka akan dibuat user berdasarkan role
        if (!$user) {
            // membuat akun user
            $user = User::create($data);
            // memhuat akun dengan default role member
            $role = new UserRole(['role_id' => 3]);
            $user->userRole()->save($role);
            // lalu akan dikirim kan email dengan data parameter yang sudah ditentukan
            // sending email
            Mail::to($user->email)->send(new AfterRegister($user));
        }
        Auth::login($user, true);
        return redirect(route('welcome'));
    }
}
