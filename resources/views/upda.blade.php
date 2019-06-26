<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改</title>
</head>
<body>
	@if ($errors->any())
	@foreach($errors->all() as $error)
		{{$error}}<br>
	@endforeach
	@endif
	<form action="{{url('doupda')}}" method="post">
		@csrf
		姓名:<input type="text" name="name" value="{{$data->name}}"><br>
		年龄:<input type="text" name="age" value="{{$data->age}}"><br>
		<input type="hidden" name ="id" value="{{$data->id}}">
	     <input type="submit" value="修改">
	</form>
</body>
</html>