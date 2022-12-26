<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Premium;
use App\Models\Verify;
use App\Models\Quiz;
use File;
use Response;
use Auth;
use DB;

class AdminController extends Controller
{
    public function data()
    {
       
    //    $verify = verify::all()->where('role',1)->get();
    //     return $verify;
       if (Auth::user()->role == 0)
        
        return redirect('home'); 
        
        if (Auth::user()->role == 2)
        
        return redirect('admin/admin'); 
        $authh=Auth::user()->id;
        $quiz = DB::table('quizzes')->select('user_id');
        //return $quiz;
        $verify = DB::table('verifies')->select('*')->where('user_id', Auth::user()->id)->pluck('role');
            //return $verify;
            if ($verify == '[0]')
            return redirect('admin/verify'); 
        
       $view = Premium::all()->where('user_id', Auth::user()->id) ;
       $users = User::all();
        
        return view('admin/dashboard' , compact('view','users','quiz'));
    }

  
    public function book(Request $request)
     {
        if (Auth::user()->role == 0)
        {
        return redirect('home'); 
        } 
        $request->validate( [
            
            'image' => 'mimes:jpeg,png,bmp,gif,svg,mp4,qt',
            "book" => "required|mimetypes:application/pdf|max:2048"
        ]);

            if ($request->hasFile('image')) 
            {
            $image = $request->file('image');
            $books = $request->file('book');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $book_name = time().'.'.$books->getClientOriginalExtension();
            $destinationPath = public_path('files');
            $image->move($destinationPath, $image_name);
            $books->move($destinationPath, $book_name);

            $book = new Premium([
            'title'      =>  $request->get('title'),
            'author'       =>  $request->get('author'),
            'user_id'       =>  $request->get('user_id'),
            'description'       =>  $request->get('description'),
            'avb'       =>  $request->get('avb'),
            'value'          =>  $request->get('value'),
            'image'            =>  $image_name,
            'book'        =>   $book_name,
            ]);

            $book->save();
            return redirect()->back();
        }
            }

    public function viewpdf()
        {
            $book = Premium::get('book');
                    //return $book;
            return Response::make(file_get_contents('files/1672078025.pdf'), 200, [
                'content-type'=>'application/pdf',
            ]);
        }

    public function verifying()
        {
            if (Auth::user()->role == 0)
            return redirect('home'); 
            elseif (Auth::user()->role == 2)
            return redirect('admin/admin');        
            $verify = DB::table('verifies')->select('*')->where('user_id', Auth::user()->id)->pluck('role');
            //return $verify;
            if ($verify == '[1]')
            return redirect('admin/dashboard'); 
            elseif (Auth::user()->role == 1 && $verify == '[0]')
            return redirect('admin/done'); 

            

           $view = Premium::all();
           $user = User::all();
           return view('admin/verify', compact('view','user'));
        
        }

    public function verify(Request $request)
        {
           
            if (Auth::user()->role == 0)
                 return redirect('home'); 
            elseif (Auth::user()->role == 2)
                 return redirect('admin/admin'); 
                       
        $user = User::all();

        $author = new Verify;
            
        $author -> sub = $request->input('sub');
        $author -> dur = $request->input('dur');
        $author -> free = $request->input('free');
        $author -> copy = $request->input('copy');
        $author -> share = $request->input('share');
        $author -> user_id = Auth::user()->id;
        $author -> user_role = Auth::user()->role;
        $author -> role = $request->input('role');

        $author->save();
        return view('admin/done', compact('user'));
        
        }

    public function done()
        {
            if (Auth::user()->role == 0)
            return redirect('home'); 
            elseif (Auth::user()->role == 2)
            return redirect('admin/admin');


           $user = User::all();
            return view('admin/done', compact('user'));
        
        }

        public function admin()
        {
            //return $verification;
            if (Auth::user()->role == 0)
            
            return redirect('home'); 
            
            elseif (Auth::user()->role == 1)

            return redirect('admin/dashboard'); 
           
            $users = User::all()->where('role',1);
            $verify = Verify::all()->where('user_role',1);

            return view('admin/admin', compact('users','verify'));

        
        }
        public function verification(Request $request)
        {
           
            if (Auth::user()->role == 0)
            
            return redirect('home'); 
            
            elseif (Auth::user()->role == 1)

            return redirect('admin/dashboard'); 
                       
            $users = User::all()->where('role',1);
            $verify = Verify::all()->where('user_role',1);
                      
            $ver = Verify::find($request->id);
                
            $ver -> user_id = $request->user_id;
            $ver -> sub = $request->sub;
            $ver -> dur = $request->dur;
            $ver -> free = $request->free;
            $ver -> copy = $request->copy;
            $ver -> share = $request->share;
            $ver -> role = $request->role;
           
            $ver->save();
            
            return redirect()->back();
        
        }

        public function quiz(Request $request)
        {
           if (Auth::user()->role == 0)
           {
           return redirect('home'); 
           } 
                   

           $quiz = new Quiz;
            
           $quiz -> q1 = $request->input('q1');
           $quiz -> q2 = $request->input('q2');
           $quiz -> q3 = $request->input('q3');
           $quiz -> q4 = $request->input('q4');
           $quiz -> q5 = $request->input('q5');
           $quiz -> a1 = $request->input('a1');
           $quiz -> a2 = $request->input('a2');
           $quiz -> a3 = $request->input('a3');
           $quiz -> a4 = $request->input('a4');
           $quiz -> a5 = $request->input('a5');        
           $quiz -> user_id = Auth::user()->id;
           $quiz -> book_id = $request->input('book_id');
          
           $quiz->save();
           return redirect()->back();
           
        }


        public function delete($id)
        {
            $book= Premium::find($id);
            $book->delete();
            return redirect('admin/dashboard');
        }


}