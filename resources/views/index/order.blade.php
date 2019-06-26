

	@extends('layout.index')
	@section('content')
	<!-- checkout -->
	<div class="checkout pages section">
		<div class="container">
			<div class="pages-head">
				<h3>订单支付</h3>
			</div>
			<div class="checkout-content">
				<div class="row">
					<div class="col s12">
						<ul class="collapsible" data-collapsible="accordion">
							
							<li>
								<div class="collapsible-header"><h5>5我的订单</h5></div>
								<div class="collapsible-body">
									<div class="order-review">
										<div class="row">
											<div class="col s12">
											
												@foreach($data as $v)
												<div class="divider"></div>
												<div class="row">
													<div class="col s5">
														<h5>商品图片</h5>
													</div>
													<div class="col s7">
														<img src="{{$v->goods_pic}}  " height='50' alt="">
													</div>
												</div>
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>商品名称</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<span>{{$v->goods_name}}</span>
														</div>
													</div>
												</div>
												@endforeach
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>用户名</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<span>{{$username}}</span>
														</div>
													</div>
												</div>
												
												<div class="cart-details">
													<div class="col s5">
														<div class="cart-product">
															<h5>编号</h5>
														</div>
													</div>
													<div class="col s7">
														<div class="cart-product">
															<span>{{$oid}}</span>
														</div>
													</div>
												</div>	
												
										</div>
										</div>
									</div>
									<div class="order-review final-price">
										<div class="row">
											<div class="col s12">
												
												<div class="cart-details">
													<div class="col s8">
														<div class="cart-product">
															<h5>总价</h5>
														</div>
													</div>
													<div class="col s4">
														<div class="cart-product">
															<span>{{$prices}}</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<a href="{{url('/pay')}}?price={{$prices}} && oid={{$oid}}" class="btn button-default button-fullwidth">去支付</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end checkout -->
	

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
	