@extends('layout.index')
	@section('content')
	<!-- cart -->
	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>订单详情</h3>
			</div>
			@foreach($data as $v)
			<div class="content">
				<div class="cart-1">
					<div class="row">
						
					</div>
					<div class="row">
						<div class="col s5">
							<h5>订单号</h5>
						</div>
						<div class="col s7">
							<h5><a href="">{{$v->oid}}</a></h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>数量</h5>
						</div>
						<div class="col s7">
							<input value="1" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>状态</h5>
						</div>
						<div class="col s7">
							<h5>
								@if($v->state==1)
								<span class="times" order-state="{{$v->state}}" end-time="{{date('Y-m-d H:i:s',$v->add_time+200)}}" oid="{{$v->oid}}"><a href="{{url('/pay')}}?price={{$v->pay_money}} && oid={{$v->oid}}" class="btn button-default button-fullwidth">去支付</a></span>
								@elseif($v->state==2)
								已支付
								@else
								已过期
								
								@endif
								
							</h5> 

						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>商品价格</h5>
						</div>
						<div class="col s7">
							<h5>{{$v->pay_money}}</h5>
						</div>
					</div>

					
					<div class="row">
						<div class="col s5">
							<h5>Action</h5>
						</div>
						<div class="col s7">
							<h5><i class="fa fa-trash"></i></h5>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				
			</div>
			
		
			
			
			
			
			@endforeach
		</div>
	</div>
	<!-- end cart -->

	<!-- loader -->
	<div id="fakeLoader"></div>
	<!-- end loader -->
	
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="about-us-foot">
				<h6>Mstore</h6>
				<p>is a lorem ipsum dolor sit amet, consectetur adipisicing elit consectetur adipisicing elit.</p>
			</div>
			<div class="social-media">
				<a href=""><i class="fa fa-facebook"></i></a>
				<a href=""><i class="fa fa-twitter"></i></a>
				<a href=""><i class="fa fa-google"></i></a>
				<a href=""><i class="fa fa-linkedin"></i></a>
				<a href=""><i class="fa fa-instagram"></i></a>
			</div>
			<div class="copyright">
				<span>© 2017 All Right Reserved</span>
			</div>
		</div>
	</div>
	<!-- end footer -->
	@endsection('content')
	<!-- scripts -->
	<script type="text/javascript" src="/jquery-3.3.1.js"></script>
  <!-- 倒计时   -->

<script type="text/javascript">
 // alert($);
 $(function(){
 	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
getTime();
		
	
	function getTime(){
		$(".times").each(function(){
		var _this = $(this);
		var end_time = _this.attr('end-time'); //结束时间
		var state = _this.attr('order-state'); //订单状态
		var oid = parseInt(_this.attr('oid'));
		
		var endDate = new Date(end_time);


            endDate = endDate.getTime();//1970-截止时间  从1970年到截止时间有多少毫秒
 
            //获取一个现在的时间
            var nowdate = new Date;
            nowdate = nowdate.getTime(); //现在时间-截止时间  从现在到截止时间有多少毫秒
 
            //获取时间差 把毫秒转换为秒
            var diff = parseInt((endDate - nowdate) / 1000);


            if(diff <= 0){
            	//window.location.reload();
            	
            	// _this.parent().parent().parent().parent().css('display','none');
            	
            	
            	// alert(oid);
            	if(state == 1){
            		$.ajax({

	            		url:"{{url('/index/orderdata')}}",
	            		type:"get",
	            		data:{oid:oid},
	            		dataType:'json',
	            		success:function(msg){
	            		
	            		}
            		});
            	}
            	_this.parent().parent().parent().parents().next().remove();
            	_this.parent().html('已过期');
            	
            }
 
            h = parseInt(diff / 3600);//获取还有小时
            m = parseInt(diff / 60 % 60);//获取还有分钟
            s = diff % 60;//获取多少秒数
 
            //将时分秒转化为双位数
            h = setNum(h);
            m = setNum(m);
            s = setNum(s);
            //输出时分秒
            _this.html("在"+m + "分" + s + "秒"+"支付");
		});
		window.setTimeout(function() {
    		getTime();
  		}, 1000);
	}


	
	
	 //window.setTimeout(getTime, 1000);
        //设置函数 把小于10的数字转换为两位数
        function setNum(num) {
            if (num < 10) {
                num = "0" + num;
            }
            return num;
        }
 });
 

  </script>


