<?php

namespace App\Http\Controllers;

use App\Models\Massages;
use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        if(Auth::check()){
            $massages = Massages::all();
            return view('chat', ['massages' => $massages]);
        }else {
           return redirect('login');
        }
        

    }
    public function add(Request $req){
        
       $email = Auth::user()->email;

        $massage = [
            'email' => $email,
            'message' =>  $req['massage']
        ];


        DB::insert('insert into massages (email, massage) values (?, ?)', [$email, $req['massage']]);
        $massages = Massages::all();
        return view('chat', ['massages' => $massages]);
        
    }
    public function get(){
        $massages = Massages::all();
        return view('data', ['massages' => $massages]);
    }


}
