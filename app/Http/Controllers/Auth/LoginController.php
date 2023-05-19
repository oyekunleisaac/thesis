<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Verify;
use DB;

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
    
    
    
     //protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectTo() {

     
        $role = Auth::user()->role; 

         switch ($role) {
           case '1':
             return '/admin/verify';
             break;

          case '2':
            return '/admin/admin';
            break;
                
           default:
             return '/home'; 
           break;
        }
          if ($done == Auth::user()->id)
          return redirect('admin/done'); 
          else if ($perm == 0)   
          return redirect('admin/done'); 
          else            
          return redirect('admin/dashboard'); 
       
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
    public function logout(Request $request) {
      Auth::logout();
      return redirect('/login');
    }
}
