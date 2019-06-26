<?php
namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\model\User;
use DB;
class add extends Controller
{
	public function index(Request $request)
	{
		$file=$request->all();
		// dd($file);
		$res=DB::table('zhuce')->orderBy('create_time','desc')->paginate(4);
		if(isset($file['file'])){
			$data=DB::table('zhuce')->where('goods_name','like','%'.$file['file'].'%')->paginate(8);
		}else{
			$file['file']="";
			$data=DB::table('zhuce')->paginate(8);
		}
		//倒计时
		//查询用户的订单
		$userid=session('userid');
		$order=DB::table('order')->where('uid',$userid)->orderBy('add_time','desc')->first();
		 // dd($order);
		$add_time=$order->add_time;
		// dd($add_time);
		$end_time=($add_time+1200);
		$a_time=date('Y/m/d h:i:s',$end_time);
		// dd($a_time);
		return view('index/list',['data'=>$data],['res'=>$res,'file'=>$file['file'],'a_time'=>$a_time]);
	}
	public function wishlist(Request $request)
	{
		
		$id=$request->all();
		// dd($id);
		$data=DB::table('zhuce')->where('id',$id)->first(); 
		// dd($data);

		return view('index/wishlist',['data'=>$data]);
	}
	public function cart(Request $request)
	{
		$id=$request->all();

		$userid=session('userid');
		  // dd($userid);
		$data=DB::table('zhuce')->where('id',$id)->first(); 
		 // dd($data);
		 // dd(session('userid'));
		$res=DB::table('cart')->insert([
			'userid'=>$userid,
			'goods_name'=>$data->goods_name,
			'goods_id'=>$id['id'],
			'goods_pic'=>$data->goods_img,
			'goods_price'=>$data->goods_price,
			'add_time'=>time()
			]);
		
		if($res){
			return redirect('index/cartlist');
		}
		
	}
	//购物车
	public function cartlist()
	{
		$userid=session('userid');
		$data=DB::table('cart')->where('userid',$userid)->get()->toArray();
		$prices=DB::table('cart')->where('userid',$userid)->pluck('goods_price')->toArray();
		// dd($datas);
		$price=array_sum($prices);
		// dd($price);
		return view('index/cartlist',['data'=>$data],['prices'=>$price]);
	}
	//订单
	public function order(Request $request)
	{
		$price=$request->input('price');
		  // dd($price);
		$userid=session('userid');
		$username=session('nameinfo');
		$data=DB::table('cart')->where('userid',$userid)->get()->toArray();
		 //添加到订单表 
		$oid = time().mt_rand(1000,1111);
		DB::table('order')->insert([
			'oid'=>$oid,
			'uid'=>$userid,
			'pay_money'=>$price,
			'add_time'=>time()
			]);

		//添加到订单详情
		foreach($data as $k=>$v){
			DB::table('order_detail')->insert([
			'oid'=>$oid,
			'goods_id'=>$v->goods_id,
			'goods_name'=>$v->goods_name,
			'goods_pic'=>$v->goods_pic,
			'add_time'=>time(),
			'uid'=>$userid,

			]);

		}
		
		// return view('index/order');
		return view('index/order',['username'=>$username],['oid'=>$oid,'prices'=>$price,'data'=>$data]);
	}
	//	订单详情
	public function orderlist()
	{
		$userid=session('userid');
		// dd($userid);
		$data=DB::table('order')->where('uid',$userid)->orderBy('add_time','desc')->get()->toArray();
		 // dd($data);
		foreach($data as $k=>$v){
			$a=DB::table('order_detail')->where('oid',$v->oid)->get();
			$data[$k]->detail=$a;
		}
		// dd($data);
		// $order=DB::table('order_detail')->where('uid',$userid)->orderBy('add_time','desc')->first();
		 // dd($order);
		// $add_time=$order->add_time;
		// dd($add_time);
		// $end_time=($add_time+130);
		// $a_time=date('Y/m/d H:i:s',$end_time);
		// dd($a_time);
		$res=DB::table('order')->get()->toArray();

		return view('index/orderlist',['data'=>$data],['res'=>$res]);
	}

	//支付过期
	public function orderdata(Request $request)
	{
		$res=$request->input('oid');
		$data=DB::table('order')->where('oid',$res)->update([
			'state'=>3,
			]);


			
		
	}

}