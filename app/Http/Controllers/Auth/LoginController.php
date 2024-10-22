<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    protected function authenticated(Request $request, $user)
    {

        /* 
        * Roles
        *
        * Gerencia->id = 1
        * Logistica->id = 2
        * Contabilidad->id = 3
        * Residente de obra->id = 4
        * Administrador de almacen->id = 5 
        */
        
        $work_id = $user->work_id;
        
        if ($user->role_id == 4 || $user->role_id == 5) {
            return redirect()->route('works.dashboard', ['work' => $work_id]);
        }
        elseif ($user->role_id == 2) {
            return redirect()->route('logistics.dashboard');
        }
        elseif ($user->role_id == 1) {
            return redirect()->route('managements.dashboard');
        } 
    }

    public function logout(Request $request){
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
