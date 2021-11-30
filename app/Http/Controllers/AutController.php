<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AutController extends Controller
{

    public function reg_index()
    {
       
       return view('signup');

    }
    public function login_index()
    {
       
       return view('login');

    }
    public function save(Request $request)
    {
        
        $user = [
            'email' => $request['email'],
            'password' =>  $request['password']
        ];
 

       $user = User::create($user);
     
      if($user){
        // Auth::login($user);
         return redirect('login');
      }

      return redirect('/reg')->withErrors(['FormError' => 'asdasdasd']);

    }
    public function login(Request $request){

       
        $user = DB::select('select * from users where email = :email LIMIT 1', 
        [
         'email' => $request['email'],
        ]);
        if($user){

            if($user[0]->password ==  $request['password']){     
               
                $us = User::find($user[0]->id);
                Auth::login($us);
                return redirect('/');
            }      
        }
         

    }
    
    public function logout(){
      Auth::logout();
      return redirect('login');
    }

 

}
