<?php
namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\model\User;
use DB;
class zhuce extends Controller
{

	public function zhuce()
	{
		return view('index/zhuce');
	}
	public function dozhuce(Request $request)
	{
		$res=$request->all();
      $data=DB::table('qian_zhuce')->insert([
         'name'=>$res['name'],
         'pwd'=>$res['pwd']
         ]);
      if($data){
         return redirect()->action('index\zhuce@login');
      }
	}
	public function login()
	{
		return view('index/login');
	}
	public function login_do(Request $request)
   {
      $res=$request->all();
        // dd($res);
      $data=DB::table('qian_zhuce')->where('name',$res['name'])->where('pwd',$res['pwd'])->first();
      // dd($data->id);
      if(empty($data)){
         return redirect()->action('index\zhuce@login');
      }else{

         session(['nameinfo'=>$res['name'],'userid'=>$data->id]);  
           // dd(session('userid'));
         return redirect('/index/list');
      }
   }
   public function loginout(Request $request)
   {
      $request->session()->forget('nameinfo');
      return redirect('/index/login');
   }

}





?>