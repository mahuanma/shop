<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生列表</title>
</head>
<body>
	<table border="1">
	<form action="" method="post">
	
		<input type="text" name="file">
		<input type="submit" value="搜索">
	</form>
		<tr>
			<td>ID</td>
			<td>姓名</td>
			<td>编号</td>
			<td>操作</td>
		</tr>
		@foreach($data as $v)
		<tr>
			<td>{{$v->id}}</td>
			<td>{{$v->name}}</td>
			<td>{{$v->bian}}</td>
			<td><a href="{{url('/student/upda')}}?id={{$v->id}}">修改</a>
				<a href="{{url('/student/dete')}}?id={{$v->id}}">删除</a></td>
		</tr>
		@endforeach
		<tr>
			<td cosplay="2">{{ $data->appends(['file' => $file])->links() }}</td>
		</tr>
	</table>
</body>
</html>