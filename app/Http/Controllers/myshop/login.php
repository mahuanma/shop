<?php

namespace App\Http\Controllers\myshop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\model\User;
class login extends Controller
{
    public function login()
    {
    	return view('myshop/login');
    }
    public function do_login(Request $request)
    {
    	$res=$request->all();
    	$data=user::where('name',$res['name'])->where('pwd',$res['pwd'])->first();
    	if(empty($data)){
         return redirect()->action('myshop\login@login');
      }else{

         session(['nameinfo'=>1]);  
         // dd(session('nameinfo'));
         return redirect()->action('myshop\login@list');
      }
    }
    public function list()
    {
    	return view('myshop/list');
    }
}
