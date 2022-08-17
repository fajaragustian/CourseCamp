<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
            'password' => 'required',
        ]);
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
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
            return redirect()->route('login')->with('error', 'Error email or password');
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
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        $role = new UserRole(['role_id' => 3]);
        $user->userRole()->save($role);
        Auth::login($user, true);
        return redirect(route('welcome'));
    }
}
