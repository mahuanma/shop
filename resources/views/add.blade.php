<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
</head>
<body>
	@if ($errors->any())
	@foreach($errors->all() as $error)
		{{$error}}<br>
	@endforeach
	@endif
	<form action="" method="post">
		@csrf
		姓名:<input type="text" name="name"><br>
		年龄:<input type="text" name="age"><br>
	     <input type="submit">
	</form>
</body>
</html>