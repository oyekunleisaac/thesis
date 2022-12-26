<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Premium;
use App\Models\Verify;
use App\Models\Quiz;

use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        if (Auth::user()->role == 1)
        return redirect('admin/verify'); 
        elseif (Auth::user()->role == 2)
        return redirect('admin/admin'); 

        $view = Premium::all();
        $user = User::all();
        return view('home', compact('view','user'));
    }

    public function library()
    {
       
        if (Auth::user()->role == 1)
        {
            return redirect('admin/dashboard'); 
        }
        // $view = Premium::all()->where('avb', 0) ;
        $view = Premium::all();
        $user = User::all();
        return view('library', compact('view','user'));
    }

    public function royalty()
    {
       
        if (Auth::user()->role == 1)
        {
            return redirect('admin/dashboard'); 
        }
       $view = Premium::all()->where('avb', 1) ;
       $user = User::all();
        return view('royalty', compact('view','user'));
    }
    public function quiz()
    {
       
        if (Auth::user()->role == 1)
        {
            return redirect('admin/dashboard'); 
        }
       $view = Premium::all()->where('avb', 0) ;
       $user = User::all();
       $quiz = Quiz::all();
        return view('quiz', compact('view','user','quiz'));
    }
}
