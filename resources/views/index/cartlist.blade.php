
	@extends('layout.index')
	@section('content')
	<!-- cart -->
	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>CART</h3>
			</div>
			@foreach($data as $v)
			<div class="content">
				<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>商品图片</h5>
						</div>
						<div class="col s7">
							<img src="{{$v->goods_pic}}" alt="">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>商品名</h5>
						</div>
						<div class="col s7">
							<h5><a href="">{{$v->goods_name}}</a></h5>
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
							<h5>价格</h5>
						</div>
						<div class="col s7">
							<h5>{{$v->goods_price}}</h5>
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
			<div class="total">
				
				<div class="row">
					<div class="col s7">
						<h6>总价</h6>
					</div>
					<div class="col s5">
						<h6>${{$prices}}</h6>
					</div>
				</div>
			</div>
			<!-- <a href="{{url('/pay')}}?price={{$prices}}"><button class="btn button-default">去支付</button></a> -->
			
			<a href="{{url('/index/order')}}?price={{$prices}}"><button class="btn button-default">去下单</button></a>
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
	