<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Tools\Tools;
class user extends Controller
{
   public function index(Tools $Tools)
   {
   	$Rendis=$Tools->getRedis();
   	$num=$Rendis->incr('num');
   	print_r($num);
   	return view('add');
   }
   //添加
   public function doadd(Request $request)
   {
   		$data=$request->all();
   		 // dd($data);die;
   		$validate = $request->validate([
   			'name'=>'required',
   			'age'=>'required'
   			],[
   			'name.required'=>'名字不能为空',
   			'age.required'=>'年龄不能为空'
   			]
   			);
   		$res=DB::table('zhuce')->insert([
				'name'=>$data['name'],
				'age'=>$data['age'],
				'create_time'=>time()
   			]);
   		if($res){
   			return redirect()->action('user@list');
   		}
   }
   //列表
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
   	return view('list',['data'=>$data],['file'=>$res['file']]);
   }
   //删除
   public function del(Request $request)
   {
   		$res=$request->all();
   		// dd($res);die;
   		$data=DB::table('zhuce')->delete($res);
   		if($data){
   			return redirect()->action('user@list');
   		}
   }
   //修改试图页面
   public function upda(Request $request)
   {
   	$res=$request->all();
   	// dd($res);die;
   	$data=DB::table('zhuce')->find($res);
   	return view('upda',['data'=>$data]);
   }
   //修改
   public function doupda(Request $request)
   {
   	$id=$request->all();
   	// dd($id);die;
   	$data=DB::table('zhuce')->where('id',$id['id'])->update([
   		'name'=>$id['name'],
   		'age'=>$id['age']
   		]);
   	if($data){
   		return redirect()->action('user@list');
   	}
   }
   //注册
   public function zhuce()
   {
      return view('zhuce');
  }
  public function zhuce_do(Request $request)
  {
      $res=$request->all();
      $data=DB::table('zhuce_do')->insert([
         'name'=>$res['name'],
         'pwd'=>$res['pwd']
         ]);
      if($data){
         return redirect()->action('user@login');
      }
  }
  //登录
  public function login()
  {
   return view('login');
  }
  public function login_do(Request $request)
  {
      
      $res=$request->all();
       // dd($res);
      $data=DB::table('zhuce_do')->where('name',$res['name'])->where('pwd',$res['pwd'])->first();
      if(empty($data)){
         return redirect()->action('user@login');
      }else{

         session(['nameinfo'=>1]);  
         // dd(session('nameinfo'));
         return redirect()->action('user@list');
      }
  }
  public function deletelogin(Request $request)
  {
      $request->session()->forget('nameinfo');
      return redirect()->action('user@login');
  }
  //模板继承
  public function any()
  {
    return view('1');
  }
}
