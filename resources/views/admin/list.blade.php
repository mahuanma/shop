
                                @extends('layout.hanrd')
								@section('content')
                                <hr class="my-5">

                                

                                <div class="row p-5">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">商品名称</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">商品价格</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">时间</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">图片</th>
                                                <th class="border-0 text-uppercase small font-weight-bold">操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            
                                           @foreach($data as $k=>$v)
											<tr>
												<td>{{$v->id}}</td>
												<td>{{$v->goods_name}}</td>
												<td>{{$v->goods_price}}</td>
												<td>{{date('Y-m-d H:i:s',$v->create_time)}}</td>
												<td>
													<img src="{{asset($v->goods_img)}}" height="50">
												</td>
												<td><a href="{{url('/admin/del')}}?id={{$v->id}}">删除</a>
													<a href="{{url('/admin/upda')}}?id={{$v->id}}">修改</a></td>
											</tr>
											@endforeach
											<tr>
												<td colspan="6">{{ $data->appends(['file' => $file])->links() }}</td>

											</tr>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
								@endsection
                               
                           















<!-- 
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>列表展示</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
	<form action="" method="">
		<input type="text" name="file" value="{{$file}}">
		<input type="submit" value="搜索">
	</form>
	<table border="2">
	<a href="{{url('/admin/deletelogin')}}"><h1>退出登录</h1></a>
		<tr>
			<td>ID</td>
			<td>商品名称</td>
			<td>商品价格</td>
			<td>时间</td>
			<td>图片</td>
			<td>操作</td>
		</tr>
		@foreach($data as $k=>$v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->goods_name}}</td>
			<td>{{$v->goods_price}}</td>
			<td>{{date('Y-m-d H:i:s',$v->create_time)}}</td>
			<td>
				<img src="{{$v->goods_img}}" height="50">
			</td>
			<td><a href="{{url('/admin/del')}}?id={{$v->id}}">删除</a>
				<a href="{{url('/admin/upda')}}?id={{$v->id}}">修改</a></td>
		</tr>
		@endforeach
		<tr>
			<td colspan="6">{{ $data->appends(['file' => $file])->links() }}</td>

		</tr>
	</table>
</body>
</html> -->
