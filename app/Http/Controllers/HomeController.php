<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Premium;
use App\Models\Verify;
use App\Models\Quiz;
use App\Models\Category;
use App\Models\Library;
use File;
use Response;
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
        //$book = table::('premia')->select('id');
        //$book= ;
        $libraries = Library::all();
        //return $libraries;
        //return $book;
        
        $view = Premium::all();        
        $user = User::all();
        return view('home', compact('view','user','libraries'));
    }
    public function science()
    {
       
        if (Auth::user()->role == 1)
        return redirect('admin/verify'); 
        elseif (Auth::user()->role == 2)
        return redirect('admin/admin'); 

        $view = Premium::all()->where('category',1);
        $user = User::all();
        return view('home', compact('view','user'));
    }

    public function art()
    {
       
        if (Auth::user()->role == 1)
        return redirect('admin/verify'); 
        elseif (Auth::user()->role == 2)
        return redirect('admin/admin'); 

        $view = Premium::all()->where('category',2);
        $user = User::all();
        return view('home', compact('view','user'));
    }
    public function business()
    {
       
        if (Auth::user()->role == 1)
        return redirect('admin/verify'); 
        elseif (Auth::user()->role == 2)
        return redirect('admin/admin'); 

        $view = Premium::all()->where('category',3);
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
        $view = Library::all()->where('user_id', Auth::user()->id) ;
        $user = User::all();
        return view('library', compact('view','user'));
    }
    public function postlibrary(Request $request)
    {
        $libs = DB::table('libraries')->select('book')->where('user_id', Auth::user()->id)->pluck('book')->all();
        $req = str_split($request->book,14);
        //$libs = isset($libs) ? $libs : '1111111111.pdf';
        //return $req;
        //return $libs;
        //if($libs->contains($req))
        if (empty($libs)) {
            $library = new Library([
                'title'        => $request->get('title'),
                'author'       =>  $request->get('author'),
                'user_id'      =>  $request->get('user_id'),
                'category'     =>  $request->get('category'),
                'description'  =>  $request->get('description'),
                'avb'          =>  $request->get('avb'),
                'value'        =>  $request->get('value'),
                'image'        =>  $request->get('image'),
                'book'         =>   $request->get('book'),
                'book_id'         =>   $request->get('book_id'),
                ]);
    
                $library->save();
                return back()->with('message', 'Successfully added to your library');
            
        }

        if(count(array_intersect($req,$libs)) === count($req)){
            return back()->with('error', 'This book is already in the library');
       
        }else{
            
            $library = new Library([
                'title'        => $request->get('title'),
                'author'       =>  $request->get('author'),
                'user_id'      =>  $request->get('user_id'),
                'category'     =>  $request->get('category'),
                'description'  =>  $request->get('description'),
                'avb'          =>  $request->get('avb'),
                'value'        =>  $request->get('value'),
                'image'        =>  $request->get('image'),
                'book'         =>   $request->get('book'),
                'book_id'         =>   $request->get('book_id'),
                ]);
    
                $library->save();
                return back()->with('message', 'Successfully added to your library');

        }
            return back()->with('message', 'Something went wrong');
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
    public function delete($id)
    {
        $book= Library::find($id);
        $book->delete();
        return redirect('library');
    }

 }
