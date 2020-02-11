<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    function authenticated(Request $request, $user)
    {
        if($user->lastTimeLogin()->where('user_id',$user->id)->get()->isEmpty()) {

            $user->lastTimeLogin()->create([
                'user_id' => $user->id,
                'last_time' => Carbon::now()->toDateTimeString(),
                'ip' => $request->getClientIp(),
            ]);
        } else {
            $user->lastTimeLogin()->update([
                'last_time' => Carbon::now()->toDateTimeString(),
                'ip' => $request->getClientIp(),
            ]);
        }
        

    }
}
