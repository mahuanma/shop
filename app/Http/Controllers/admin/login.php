<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\model\User;
use DB;
class login extends Controller
{
    public function login()
    {
    	return view('admin/login');
    }
    public function do_login(Request $request)
    {
    	$res=$request->all();
      // dd($res);
    	$data=user::where('name',$res['name'])->where('pwd',$res['pwd'])->first();
    	if(empty($data)){
         return redirect()->action('admin\login@login');
      }else{
         session(['nameinfo'=>$res['name']]);  
         // dd(session('nameinfo'));
         return redirect()->action('admin\add_file@list');
      }
    }
    public function loginout(Request $request)
    {
      $request->session()->forget('nameinfo');
      return redirect('/admin/login');
    }
    public function list(Request $request) 
    {
        $res=$request->all();
    // var_dump($res['file']);
     if(isset($res['file'])){
      $data=DB::table('zhuce')->where('name','like','%'.$res['file'].'%')->paginate(2);
     
     }else{
      $res['file']="";
      $data=DB::table('zhuce')->paginate(2);
     }
    // dd($data);die;,['file'=>$file]
    return view('admin/list',['data'=>$data],['file'=>$res['file']]);
     
    }
    //退出登录
    public function deletelogin(Request $request)
   {
      $request->session()->forget('nameinfo');
      return redirect()->action('admin\login@login');
   }
   //注册
   public function zhuce()
   {
    return view('admin/zhuce');
   }
   public function dozhuce(Request $request)
   {
    $res=$request->all();
      $data=DB::table('zhuce_do')->insert([
         'name'=>$res['name'],
         'pwd'=>$res['pwd']
         ]);
      if($data){
         return redirect()->action('admin\login@login');
      }
   }
   
   
}
