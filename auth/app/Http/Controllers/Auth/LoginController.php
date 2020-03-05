<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;


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

    /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function login(Request $request)
        {
            $input = $request->all();

Log::emergency('An informational message00.');
           /*  $this->validate($request, [
                'username' => 'required',
                'password' => 'required',
            ]); */
Log::emergency('An informational message01.');

            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        Log::emergency('An informational message1.');

            if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
            {
                Log::emergency('An informational message2.');
                return redirect()->route('home');
            }else{
                Log::emergency('An informational message3.');
                return redirect()->route('login')
                    ->with('error','Email-Address And Password Are Wrong.');
            }

        }
}
