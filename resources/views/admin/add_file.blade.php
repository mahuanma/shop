                                @extends('layout.hanrd')
								@section('content')
<form role="form" action="{{url('admin/do_file')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>商品名称</label>
                <input class="form-control" type="text" name="goods_name">
            </div>
            <div class="form-group">
                <label>商品价格</label>
                <input class="form-control" type="text" name="goods_price">
          
            </div>
            <div class="form-group">
                <label>商品图片</label>
                <input  type="file" name="goods_img">
            </div>
        
        
            <button type="submit" class="btn btn-info">添加 </button>


        </form>
@endsection














<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>微商城添加</title>
</head>
<body>
	@if ($errors->any())
	@foreach($errors->all() as $error)
		{{$error}}<br>
	@endforeach
	@endif
	<form action="{{url('admin/do_file')}}" method="post" enctype="multipart/form-data">
		@csrf
		商品图片:<input type="file" name="goods_img" ><br>		
		商品名称:<input type="text" name="goods_name"><br>
		商品价格:<input type="text" name="goods_price"><br>
	     <input type="submit" value="添加">
	</form>
</body>
</html> -->