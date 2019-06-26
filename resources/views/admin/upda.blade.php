<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>微商城-修改</title>
</head>
<body>
	@if ($errors->any())
	@foreach($errors->all() as $error)
		{{$error}}<br>
	@endforeach
	@endif
	<form action="{{url('admin/doupda')}}" method="post" enctype="multipart/form-data">
		@csrf
		商品名称:<input type="text" name="goods_name" value="{{$data->goods_name}}"><br>
		商品价格:<input type="text" name="goods_price" value="{{$data->goods_price}}"><br>
		商品图片:<img src="{{$data->goods_img}}"><br>
		<input type="file" name="goods_img"><br>	
		<input type="hidden" name ="id" value="{{$data->id}}">
	     <input type="submit" value="修改">
	</form>
</body>
</html>