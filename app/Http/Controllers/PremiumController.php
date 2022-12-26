<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Auth;
use DB;
class PremiumController extends Controller
{
    public function data()
    {
        if (Auth::user()->role == 0)
        {
            return redirect('premium'); 
        }
        if (Auth::user()->role == 1)
        {
            return redirect('admin/dashboard'); 
        }
        
        return view('premium');
    }


}
