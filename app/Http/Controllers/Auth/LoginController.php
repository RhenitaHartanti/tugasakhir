<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Mail;

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
    // protected $redirectTo = '/home';
     protected function authenticated(Request $request, $user)
    {
        if($user->level=='admin'){
            return redirect('oauth');
        }
        return redirect('/landingpage_beranda');
    }
    public function username()
    {
        return 'username';
    }
    public function resetPassword(Request $request)
    {

        $reset=User::where('email',$request->email)->first();
        if($reset)
        {
           $random = $this->random_str(10);
           
           Mail::to($reset->email)->send(new \App\Mail\ResetPassword($random));
           
           $reset->password=bcrypt($random);
           $reset->save();
           return redirect('/landingpage_beranda');
        }
        return back()->withErrors('email','email not found');
    }
    public function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
  {
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
  }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
}
