
	








	@extends('layout.index')
	@section('content')
	<!-- wishlist -->
	<div class="wishlist section">
		<div class="container">
			<div class="pages-head">
				<h3>WISHLIST</h3>
			</div>
			<div class="content">
				<div class="cart-1">
				
					<div class="row">
						<div class="col s5">
							<h5>图片</h5>
						</div>
						<div class="col s7">
							<img src="{{$data->goods_img}}" alt="">
						</div>
					</div>
					
					<div class="row">
						<div class="col s5">
							<h5>商品名</h5>
						</div>
						<div class="col s7">
							<h5><a href="">{{$data->goods_name}}</a></h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>数量</h5>
						</div>
						<div class="col s7">
							<h5>1</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>价格</h5>
						</div>
						<div class="col s7">
							<h5>{{$data->goods_price}}</h5>
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
					
					<div class="row">
						<div class="col 12">
							<a href="{{url('index/cart')}}?id={{$data->id}}"><button class="btn button-default">加入购物车</button></a>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				
			</div>
		</div>
	</div>
	<!-- end wishlist -->

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
