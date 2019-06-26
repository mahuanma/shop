<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Tools\Tools;
class add_file extends Controller
{
    public function add_file()
    {
    	 return view('admin/add_file');
    }
    public function do_file(Request $request)
    {
          $data=$request->all();
           // dd($data);         
           $path = $request->file('goods_img')->store('');
           // dd($path);
        	$file= asset('storage'.'/'.$path);
            // dd($file);
            $res=DB::table('zhuce')->insert([
                'goods_name'=>$data['goods_name'],
                'goods_price'=>$data['goods_price'],
                'goods_img'=>$file,
                'create_time'=>time()
            ]);
        if($res){
            return redirect()->action('admin\add_file@list');
        }
        // return $path;
    }
    public function list(Request $request ,Tools $tools)
    {
        $redis = $tools->getRedis();
        $num = $redis->incr(1);
        echo "浏览量"."$num"."次";
        $res=$request->all();
    // var_dump($res['file']);
     if(isset($res['file'])){
        $data=DB::table('zhuce')->orderBy('create_time','desc')->where('goods_name','like','%'.$res['file'].'%')->paginate(2);
     
     }else{
        $res['file']="";
        $data=DB::table('zhuce')->orderBy('create_time','desc')->paginate(2);
     }
    // dd($data);die;,['file'=>$file]
    return view('admin/list',['data'=>$data],['file'=>$res['file']]);
        
    }
    //删除
   public function del(Request $request)
   {
        $res=$request->all();
        // dd($res);die;
        $data=DB::table('zhuce')->delete($res);
        if($data){
            return redirect('/admin/list');
        }
   }
  //修改试图页面
   public function upda(Request $request)
   {
    $res=$request->all();
    // dd($res);die;
    $data=DB::table('zhuce')->where('id',$res['id'])->first();
    // dd($data);
    return view('admin/upda',['data'=>$data]);
   }
   //修改
   public function doupda(Request $request)
   {
    $id=$request->all();
     // dd($id);die;
     $path = $request->file('goods_img')->store('');
        // dd($path);
    $file= asset('storage'.'/'.$path);
    $data=DB::table('zhuce')->where('id',$id['id'])->update([
        'goods_name'=>$id['goods_name'],
        'goods_price'=>$id['goods_price'],
        'goods_img'=>$file,
        'create_time'=>time()
        ]);
    if($data){
        return redirect('/admin/list');
    }
   }
  

}