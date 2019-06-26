<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\model\Student as Stu;
use DB;
class student extends Controller
{
    public function add()
    {
    	return view('student/add');
    }
    public function doadd(Request $request)
    {
    	$res=$request->all();
    	$data=Stu::insert([
    		'name'=>$res['name'],
    		'bian'=>$res['bian'],
    		]);
    	if($data){
    		return redirect('student/list');
    	}
    }
    public function list(Request $request)
    {
    	$file=$request->all();
    	 // dd($file);
    	// $data=Stu::paginate(2);
    	 // $data=Stu::where('name','limit','%'.$file['file'].'%')->paginate(2);
    	if(isset($file['file'])){
   	 	$data=Stu::where('name','like','%'.$file['file'].'%')->paginate(2);
   	 
   	 }else{
   	 	$file['file']="";
   	 	$data=Stu::paginate(2);
   	 }
    	return view('student/list',['data'=>$data],['file'=>$file['file']]);
    }
    public function upda(Request $request)
    {
    	$res=$request->all();
    	// dd($res);
    	$data=Stu::where('id',$res['id'])->first();
    	return view('student/upda',['data'=>$data]);
    }
    public function doupda(Request $request)
    {
    	$res=$request->all();
    	  // dd($res);
    	$data=Stu::where('id',$res['id'])->update([
    		'name'=>$res['name'],
    		'bian'=>$res['bian']
    		
    		]);

    	if($data){
    		return redirect('student/list');
    	}
    }
    public function dete(Request $request)
    {
    	$data=$request->all();
    	$res=Stu::where('id',$data['id'])->delete($data['id']);
    	if($res){
    		return redirect('student/list');
    	}
    }
}
